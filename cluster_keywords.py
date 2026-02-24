"""
Keyword Clustering для SEO
==========================
Читает commercial_keywords.xlsx + gap_analysis.xlsx,
кластеризует ключи → предлагает статьи.

Уровни:
  intent  — commercial / informational / navigational
  topic   — рассылки / crm / лояльность / автоматизация / ...
  cluster — конкретная страница (один URL = одна статья)

Запуск:
  python3 cluster_keywords.py
"""

import re
import pandas as pd
import numpy as np
from pathlib import Path
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.cluster import AgglomerativeClustering
from sklearn.metrics.pairwise import cosine_similarity

OUTPUT_DIR = Path("/Users/ivanilin/Documents/ivanilin/01-crmgroup/seo_output")

# ──────────────────────────────────────────────
# 1. INTENT: коммерческий / информационный / навигационный
# ──────────────────────────────────────────────

COMMERCIAL_SIGNALS = [
    "агентство", "заказать", "заказ", "купить", "услуг", "аутсорс",
    "под ключ", "внедрение", "настройка", "разработка", "стоимость",
    "цена", "стоит", "прайс", "москва", "спб", "найти", "нанять",
    "аутсорсинг", "компания", "подрядчик", "специалист", "фриланс",
    "crm для", "email для", "рассылка для", "маркетинг для",
]

INFORMATIONAL_SIGNALS = [
    "что такое", "как ", "зачем", "почему", "когда", "где",
    "примеры", "пример", "шаблон", "гайд", "руководство",
    "инструкция", "советы", "лучшие", "топ", "обзор",
    "отличие", "разница", "сравнение", "vs", "плюсы",
    "минусы", "преимущества", "недостатки", "для чего",
    "как работает", "как настроить", "как написать",
    "метрики", "показатели", "формула", "расчёт",
]

def classify_intent(word: str) -> str:
    w = word.lower()
    for sig in COMMERCIAL_SIGNALS:
        if sig in w:
            return "commercial"
    for sig in INFORMATIONAL_SIGNALS:
        if sig in w:
            return "informational"
    return "informational"  # default


# ──────────────────────────────────────────────
# 2. TOPIC: тематический блок
# ──────────────────────────────────────────────

TOPIC_RULES = [
    ("email / рассылки",    r"email|рассылк|письм|inbox|newsletter"),
    ("crm-маркетинг",       r"\bcrm\b"),
    ("программы лояльности",r"лоялн|бонус|cashback|кэшбэк|кешбэк|loyalty"),
    ("автоматизация",       r"автомат|триггер|trigger|сценари|workflow"),
    ("омниканальность",     r"омни|omni|пуш|push|sms|смс|viber|whatsapp|мессенджер"),
    ("аналитика / метрики", r"аналитик|метрик|kpi|or\b|ctr\b|конверси|open.rate|click"),
    ("персонализация",      r"персонал|segmen|сегмент|таргет|рекоменд"),
    ("base / база",         r"базa|базу|базе|базы|подписчик|список|base"),
    ("roi / эффективность", r"\broi\b|окупаем|выручк|доход|прибыл|profit|эффект"),
    ("доставляемость",      r"доставля|deliverabil|спам|spam|репутац|dkim|spf"),
    ("b2b",                 r"\bb2b\b|b-2-b|корпоратив"),
    ("e-commerce / ритейл", r"ecomm|e.comm|ритейл|интернет.магаз|магазин|retail"),
    ("контент письма",      r"тема письма|subject|заголовок|копирайт|дизайн письм"),
    ("маркетинг общий",     r"маркетинг"),
]

def classify_topic(word: str) -> str:
    w = word.lower()
    for topic, pattern in TOPIC_RULES:
        if re.search(pattern, w):
            return topic
    return "прочее"


# ──────────────────────────────────────────────
# 3. КЛАСТЕРИЗАЦИЯ внутри topic через TF-IDF + агломеративная
# ──────────────────────────────────────────────

def cluster_within_topic(words: list[str], n_clusters: int = None) -> list[int]:
    """Возвращает список int меток кластера для каждого слова."""
    if len(words) <= 2:
        return list(range(len(words)))

    # TF-IDF по символьным n-gram (хорошо для русского)
    vec = TfidfVectorizer(analyzer="char_wb", ngram_range=(2, 4))
    X = vec.fit_transform(words)

    # Авто-количество кластеров: √N / 1.5, минимум 1, максимум 15
    if n_clusters is None:
        n_clusters = max(1, min(15, int(np.sqrt(len(words)) / 1.5)))

    if n_clusters == 1:
        return [0] * len(words)

    model = AgglomerativeClustering(n_clusters=n_clusters, metric="cosine", linkage="average")
    sim = cosine_similarity(X)
    labels = model.fit_predict(1 - sim)  # distance matrix
    return labels.tolist()


# ──────────────────────────────────────────────
# 4. НАЗВАНИЕ КЛАСТЕРА: берём самое частотное слово
# ──────────────────────────────────────────────

def name_cluster(cluster_words: list[str], freq_col: pd.Series) -> str:
    """Название = ключ с наибольшей частотой в кластере."""
    if freq_col is None or len(cluster_words) == 0:
        return cluster_words[0] if cluster_words else "—"
    idx = freq_col.idxmax()
    return cluster_words[freq_col.index.get_loc(idx)]


# ──────────────────────────────────────────────
# 5. TITLE статьи: генерируем из кластерного имени
# ──────────────────────────────────────────────

TITLE_TEMPLATES = {
    "commercial":    "Заказать {kw}: агентство CRM-group",
    "informational": "{kw}: полное руководство {year}",
}

def suggest_title(cluster_name: str, intent: str, topic: str) -> str:
    template = TITLE_TEMPLATES.get(intent, "{kw} — руководство")
    name = cluster_name.capitalize()
    return template.format(kw=name, year=2026)


# ──────────────────────────────────────────────
# 6. MAIN
# ──────────────────────────────────────────────

def process_df(df: pd.DataFrame, source_label: str) -> pd.DataFrame:
    """Добавляет колонки: source, intent, topic, cluster_id, cluster_name, article_title."""
    if df.empty:
        return df

    # Нормализуем название колонки с ключом
    word_col = None
    for c in ["word", "Ключ", "keyword", "query", "Keyword"]:
        if c in df.columns:
            word_col = c
            break
    if word_col is None:
        print(f"  [!] Не найдена колонка с ключом в {source_label}: {list(df.columns)}")
        return df

    freq_col = None
    for c in ["ws", "Частота WS", "freq", "Frequency"]:
        if c in df.columns:
            freq_col = c
            break

    words = df[word_col].fillna("").astype(str).tolist()

    df = df.copy()
    df["source"]  = source_label
    df["intent"]  = [classify_intent(w) for w in words]
    df["topic"]   = [classify_topic(w) for w in words]

    # Кластеризация внутри каждой (topic, intent) группы
    cluster_global = []
    cluster_name_col = []

    group_counter = {}  # topic → counter

    for i, row in df.iterrows():
        cluster_global.append(None)  # placeholder
        cluster_name_col.append(None)

    # group by (topic, intent)
    global_id = 0
    for (topic, intent), grp in df.groupby(["topic", "intent"]):
        idxs = list(grp.index)
        grp_words = [words[df.index.get_loc(i)] for i in idxs]
        freq_series = grp[freq_col] if freq_col else None

        labels = cluster_within_topic(grp_words)

        # Субкластерные имена
        sub_to_name = {}
        sub_to_words = {}
        for local_label, (idx, w) in zip(labels, zip(idxs, grp_words)):
            sub_to_words.setdefault(local_label, []).append(w)

        # Имя = самое частотное слово в подкластере
        for sub_label, sub_words in sub_to_words.items():
            if freq_series is not None:
                sub_freq = freq_series.loc[[i for i, l in zip(idxs, labels) if l == sub_label]]
                best_word = sub_words[sub_freq.values.argmax()] if len(sub_freq) > 0 else sub_words[0]
            else:
                # Берём самое длинное (обычно более информативно)
                best_word = max(sub_words, key=len)
            sub_to_name[sub_label] = best_word

        # Назначаем глобальные ID
        for local_label, idx in zip(labels, idxs):
            gid = f"{topic} | {intent} | {global_id + local_label}"
            cluster_global[df.index.get_loc(idx)] = gid
            name = sub_to_name[local_label]
            cluster_name_col[df.index.get_loc(idx)] = name

        global_id += max(labels) + 1 if labels else 1

    df["cluster_id"]   = cluster_global
    df["cluster_name"] = cluster_name_col
    df["article_title"] = [
        suggest_title(cn, intent, topic)
        for cn, intent, topic in zip(df["cluster_name"], df["intent"], df["topic"])
    ]

    return df


def make_articles_summary(df: pd.DataFrame) -> pd.DataFrame:
    """Одна строка = один кластер = одна статья."""
    if df.empty:
        return pd.DataFrame()

    rows = []
    for cid, grp in df.groupby("cluster_id"):
        intent = grp["intent"].iloc[0]
        topic  = grp["topic"].iloc[0]
        name   = grp["cluster_name"].iloc[0]
        title  = grp["article_title"].iloc[0]
        n_keys = len(grp)

        freq_col = None
        for c in ["ws", "Частота WS", "freq"]:
            if c in grp.columns:
                freq_col = c
                break

        total_freq = int(grp[freq_col].sum()) if freq_col else 0
        keywords_list = " | ".join(sorted(grp.iloc[:, 0].tolist(), key=len))

        rows.append({
            "Статья (предл. заголовок)": title,
            "Тема (topic)":   topic,
            "Интент":         intent,
            "Ключей в кластере": n_keys,
            "Σ частота (WS)": total_freq,
            "Ключи":          keywords_list,
        })

    result = pd.DataFrame(rows)
    result = result.sort_values(["Интент", "Σ частота (WS)"], ascending=[True, False])
    return result


def main():
    print("=== Keyword Clustering ===\n")

    all_dfs = []

    # ── commercial_keywords.xlsx ──
    comm_path = OUTPUT_DIR / "commercial_keywords.xlsx"
    if comm_path.exists():
        print(f"Читаю {comm_path.name}...")
        xls = pd.ExcelFile(comm_path)
        if "Коммерческие" in xls.sheet_names:
            df = xls.parse("Коммерческие")
            print(f"  Коммерческие: {len(df)} строк")
            df = process_df(df, "Директ-конкуренты")
            all_dfs.append(df)
    else:
        print(f"[!] Не найден {comm_path}")

    # ── gap_analysis.xlsx ──
    gap_path = OUTPUT_DIR / "gap_analysis.xlsx"
    if gap_path.exists():
        print(f"Читаю {gap_path.name}...")
        xls = pd.ExcelFile(gap_path)
        # Берём релевантные (если есть лист)
        for sheet in xls.sheet_names:
            df = xls.parse(sheet)
            print(f"  {sheet}: {len(df)} строк")
            df = process_df(df, "GAP-анализ")
            all_dfs.append(df)
    else:
        print(f"[!] Не найден {gap_path}")

    if not all_dfs:
        print("[!] Нет данных для кластеризации.")
        return

    combined = pd.concat(all_dfs, ignore_index=True)
    print(f"\nИтого ключей для кластеризации: {len(combined)}")

    articles = make_articles_summary(combined)
    print(f"Итого кластеров (статей): {len(articles)}")

    # ── Сохраняем в новый файл ──
    out_path = OUTPUT_DIR / "keyword_clusters.xlsx"
    with pd.ExcelWriter(out_path, engine="openpyxl") as writer:
        articles.to_excel(writer, sheet_name="Статьи (кластеры)", index=False)
        combined.to_excel(writer, sheet_name="Все ключи", index=False)

        # Авто-ширина колонок
        for sheet_name, df_sheet in [("Статьи (кластеры)", articles), ("Все ключи", combined)]:
            ws = writer.sheets[sheet_name]
            for col in ws.columns:
                max_len = max((len(str(cell.value)) for cell in col if cell.value), default=10)
                ws.column_dimensions[col[0].column_letter].width = min(max_len + 2, 60)

    print(f"\nСохранено: {out_path}")
    print("\nПревью кластеров (топ-20 по Σ частоте):")
    print(articles.head(20).to_string(index=False, max_colwidth=60))


if __name__ == "__main__":
    main()
