"""
SEO Content Gap + Skyscraper Analysis via Keys.so API
======================================================
Два сценария:
  1. GAP — ключи по которым конкуренты ранжируются, а мы нет → темы для новых статей
  2. SKYSCRAPER — топ-страницы конкурентов по трафику → статьи где можно написать лучше

Документация API: https://apidoc.keys.so/
Auth: header X-Keyso-TOKEN
Rate limit: 10 req / 10 сек

Запуск:
  pip install requests pandas openpyxl
  python seo_gap_analysis.py
"""

import subprocess
import pandas as pd
import time
import json
from pathlib import Path

# ──────────────────────────────────────────────
# НАСТРОЙКИ
# ──────────────────────────────────────────────

API_TOKEN = "699db3c64d1f39.83781556faa89d06f13a4d55eeb785aa412a1007"

# Наши домены
OWN_DOMAINS = [
    "emailsoldiers.ru",
    "crmgroup.ru",
]

# Конкуренты — агентства
AGENCY_COMPETITORS = [
    "emailmatrix.ru",
    "outofcloud.ru",
    "wim.agency",
    "mailfit.ru",
    "inboxmarketing.ru",
    "dirservice.ru",
    "dau.agency",
]

# Конкуренты — платформы (сильные, но другой угол)
PLATFORM_COMPETITORS = [
    "mindbox.ru",
    "retailcrm.ru",
    "retailrocket.ru",
]

ALL_COMPETITORS = AGENCY_COMPETITORS + PLATFORM_COMPETITORS

# Фильтры
MIN_FREQ = 100        # минимальная частота запроса (отсекаем мусор)
MAX_POSITION = 20     # берём только топ-20 у конкурентов
MIN_POSITION_OWN = 21 # у нас должна быть позиция хуже 20 (или отсутствовать)

OUTPUT_DIR = Path("/Users/ivanilin/Documents/ivanilin/01-crmgroup/seo_output")
OUTPUT_DIR.mkdir(exist_ok=True)

BASE_URL = "https://api.keys.so"

# ──────────────────────────────────────────────
# API CLIENT
# ──────────────────────────────────────────────

COOKIE_JAR = "/tmp/keyso_cookies_local.txt"

class KeysSoAPI:
    def __init__(self, token: str):
        self.token = token
        self._last_requests = []
        # Warm up: get DDoS-guard cookies
        self._warmup()

    def _warmup(self):
        """Первый запрос для получения cookies от DDoS-guard"""
        subprocess.run([
            "curl", "-s", "-c", COOKIE_JAR, "-b", COOKIE_JAR,
            "-H", f"X-Keyso-TOKEN: {self.token}",
            "-H", "Accept: application/json",
            f"{BASE_URL}/report/simple/domain_dashboard?domain=emailsoldiers.ru"
        ], capture_output=True, text=True, timeout=15)
        time.sleep(1)

    def _rate_limit(self):
        """10 запросов в 10 секунд"""
        now = time.time()
        self._last_requests = [t for t in self._last_requests if now - t < 10]
        if len(self._last_requests) >= 10:
            sleep_time = 10 - (now - self._last_requests[0]) + 0.1
            if sleep_time > 0:
                print(f"  ⏳ rate limit, жду {sleep_time:.1f}с...")
                time.sleep(sleep_time)
        self._last_requests.append(time.time())

    def get(self, endpoint: str, params: dict = None, retries: int = 3) -> dict:
        self._rate_limit()
        qs = "&".join(f"{k}={v}" for k, v in (params or {}).items())
        url = f"{BASE_URL}/{endpoint.lstrip('/')}?{qs}"

        for attempt in range(retries):
            result = subprocess.run([
                "curl", "-s",
                "-c", COOKIE_JAR, "-b", COOKIE_JAR,
                "-H", f"X-Keyso-TOKEN: {self.token}",
                "-H", "Accept: application/json",
                "-H", "Content-Type: application/json",
                "-H", "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36",
                url
            ], capture_output=True, text=True, timeout=30)

            body = result.stdout.strip()
            if not body:
                wait = (attempt + 1) * 5
                print(f"    ⚠️ Пустой ответ (попытка {attempt+1}/{retries}), жду {wait}с...")
                time.sleep(wait)
                self._warmup()
                continue

            data = json.loads(body)

            # 202 = отчёт готовится, ждём и повторяем
            if isinstance(data, dict) and data.get("code") == 202:
                wait = 30 if attempt == 0 else 60
                print(f"    ⏳ Отчёт готовится ({attempt+1}/{retries}), жду {wait}с...")
                time.sleep(wait)
                continue

            return data

        raise ValueError(f"No data after {retries} retries: {url}")

    def get_context_keywords(self, domain: str, page: int = 1, per_page: int = 100) -> dict:
        """Ключи из Яндекс.Директ — самые коммерческие запросы"""
        return self.get("report/simple/context/keywords", params={
            "domain": domain,
            "base": "ru",
            "current_page": page,
            "per_page": per_page,
        })

    def get_all_context_keywords(self, domain: str, max_pages: int = 5) -> list[dict]:
        """Все контекстные ключи домена"""
        all_kws = []
        for p in range(1, max_pages + 1):
            try:
                data = self.get_context_keywords(domain, page=p)
            except Exception:
                break
            items = data.get("data", [])
            if not items:
                break
            all_kws.extend(items)
            if len(items) < 100:
                break
            time.sleep(0.5)
        return all_kws

    def get_organic_keywords(self, domain: str, page: int = 1, per_page: int = 100) -> dict:
        """Органические ключевые слова домена"""
        return self.get("report/simple/organic/keywords", params={
            "domain": domain,
            "base": "ru",
            "current_page": page,
            "per_page": per_page,
        })

    def get_top_pages(self, domain: str, page: int = 1, per_page: int = 50) -> dict:
        """Топ страниц домена по количеству ключей"""
        return self.get("report/simple/organic/pages", params={
            "domain": domain,
            "base": "ru",
            "current_page": page,
            "per_page": per_page,
        })

    def get_all_keywords(self, domain: str, max_pages: int = 5) -> list[dict]:
        """Собрать все ключи домена (с пагинацией)"""
        all_kws = []
        for p in range(1, max_pages + 1):
            print(f"  {domain}: страница {p}...")
            data = self.get_organic_keywords(domain, page=p)
            items = data.get("data", [])
            if not items:
                break
            all_kws.extend(items)
            if len(items) < 100:
                break
            time.sleep(0.5)
        return all_kws

    def get_all_pages(self, domain: str, max_pages: int = 3) -> list[dict]:
        """Собрать топ страницы домена"""
        all_pages = []
        for p in range(1, max_pages + 1):
            data = self.get_top_pages(domain, page=p)
            items = data.get("data", [])
            if not items:
                break
            all_pages.extend(items)
            if len(items) < 50:
                break
        return all_pages


# ──────────────────────────────────────────────
# СЦЕНАРИЙ 1: GAP-АНАЛИЗ
# Ключи конкурентов которых нет у нас
# ──────────────────────────────────────────────

def run_gap_analysis(api: KeysSoAPI):
    print("\n📊 СЦЕНАРИЙ 1: GAP-АНАЛИЗ")
    print("=" * 50)

    # Собираем наши ключи
    print("\n🏠 Собираем наши ключи...")
    own_keywords = set()
    for domain in OWN_DOMAINS:
        print(f"  → {domain}")
        kws = api.get_all_keywords(domain, max_pages=10)
        for kw in kws:
            own_keywords.add(kw.get("word", "").lower())
    print(f"  Итого своих ключей: {len(own_keywords)}")

    # Собираем ключи конкурентов
    print("\n🎯 Собираем ключи конкурентов...")
    competitor_data = []  # [{key, freq, traff, domain, position, url}, ...]

    for domain in ALL_COMPETITORS:
        print(f"  → {domain}")
        try:
            kws = api.get_all_keywords(domain, max_pages=5)
        except Exception as e:
            print(f"    ⚠️ Пропускаем {domain}: {e}")
            continue
        for kw in kws:
            key = kw.get("word", "").lower()
            pos = kw.get("pos", 99)
            freq = kw.get("ws", 0)  # ws = wordstat frequency

            # Только если у конкурента позиция в топ-20
            if pos <= MAX_POSITION and freq >= MIN_FREQ:
                competitor_data.append({
                    "keyword": key,
                    "frequency": freq,
                    "traffic_competitor": kw.get("wsk", 0),
                    "position_competitor": pos,
                    "competitor_domain": domain,
                    "competitor_url": kw.get("url", ""),
                    "we_have_it": key in own_keywords,
                })

    # GAP = ключи конкурентов которых нет у нас
    df = pd.DataFrame(competitor_data)
    if df.empty:
        print("  ⚠️ Нет данных")
        return

    gap_df = df[~df["we_have_it"]].copy()

    # Агрегируем: один ключ может быть у нескольких конкурентов
    gap_agg = (
        gap_df.groupby("keyword")
        .agg(
            frequency=("frequency", "max"),
            max_traffic=("traffic_competitor", "max"),
            competitor_count=("competitor_domain", "nunique"),
            competitors=("competitor_domain", lambda x: ", ".join(sorted(set(x)))),
            best_position=("position_competitor", "min"),
            example_url=("competitor_url", "first"),
        )
        .reset_index()
        .sort_values(["competitor_count", "max_traffic"], ascending=[False, False])
    )

    # Приоритизация: ключ у 2+ конкурентов = высокий приоритет
    gap_agg["priority"] = gap_agg["competitor_count"].apply(
        lambda x: "🔴 Высокий" if x >= 3 else ("🟡 Средний" if x >= 2 else "🟢 Низкий")
    )

    # Сохраняем
    out_path = OUTPUT_DIR / "gap_analysis.xlsx"
    gap_agg.to_excel(out_path, index=False, sheet_name="GAP")
    print(f"\n✅ GAP-анализ сохранён: {out_path}")
    print(f"   Найдено gap-ключей: {len(gap_agg)}")
    print(f"   Высокий приоритет (3+ конкурента): {len(gap_agg[gap_agg['competitor_count'] >= 3])}")

    # Топ-20 для просмотра
    print("\n🔝 Топ-20 gap-ключей (сортировка: конкуренты + трафик):")
    print(f"{'Ключ':<50} {'Частота':>8} {'Конкур.':>7} {'Приоритет'}")
    print("-" * 80)
    for _, row in gap_agg.head(20).iterrows():
        print(f"{row['keyword']:<50} {row['frequency']:>8,} {row['competitor_count']:>7} {row['priority']}")

    return gap_agg


# ──────────────────────────────────────────────
# СЦЕНАРИЙ 2: SKYSCRAPER
# Топ страницы конкурентов → пишем лучше
# ──────────────────────────────────────────────

def run_skyscraper_analysis(api: KeysSoAPI, gap_df_raw: list[dict] = None):
    """Skyscraper через группировку keywords по URL — без отдельного pages endpoint"""
    print("\n\n🏗️  СЦЕНАРИЙ 2: SKYSCRAPER (группировка по URL)")
    print("=" * 50)

    # Наши URL из keywords-данных
    print("\n🏠 Собираем наши страницы из keywords...")
    own_topics = set()
    for kw in (gap_df_raw or []):
        if kw.get("_domain") in OWN_DOMAINS:
            url = kw.get("url", "")
            slug = url.rstrip("/").split("/")[-1].lower()
            own_topics.add(slug)
    print(f"  Наших тем: {len(own_topics)}")

    # Группируем keywords конкурентов по URL
    print("\n🎯 Группируем ключи конкурентов по страницам...")
    pages_data = []

    for domain in ALL_COMPETITORS:
        print(f"  → {domain}")
        try:
            kws = api.get_all_keywords(domain, max_pages=3)
        except Exception as e:
            print(f"    ⚠️ Пропускаем {domain}: {e}")
            continue

        # Группируем по URL
        url_groups: dict = {}
        for kw in kws:
            url = kw.get("url", "/")
            if url not in url_groups:
                url_groups[url] = {"keys": 0, "total_ws": 0, "top10": 0}
            url_groups[url]["keys"] += 1
            url_groups[url]["total_ws"] += kw.get("ws", 0)
            if kw.get("pos", 99) <= 10:
                url_groups[url]["top10"] += 1

        for url, stats in url_groups.items():
            if stats["keys"] < 3:
                continue
            slug = url.rstrip("/").split("/")[-1].lower()
            pages_data.append({
                "competitor_domain": domain,
                "url": domain + url,
                "keywords_count": stats["keys"],
                "total_ws": stats["total_ws"],
                "top10_keys": stats["top10"],
                "slug": slug,
                "we_have_topic": slug in own_topics,
                "is_platform": domain in PLATFORM_COMPETITORS,
            })

    df = pd.DataFrame(pages_data)
    if df.empty:
        print("  ⚠️ Нет данных")
        return

    # Разделяем: нет у нас (пиши новое) vs есть у нас (улучши)
    df["action"] = df["we_have_topic"].map({
        False: "📝 Написать новое",
        True:  "⚡ Написать лучше",
    })

    # Агентские статьи которых у нас нет — самый ценный список
    agency_gaps = df[
        (~df["we_have_topic"]) & (~df["is_platform"])
    ].sort_values("traffic", ascending=False)

    # Платформенные статьи с большим трафиком — возможность skyscraper
    platform_skyscraper = df[
        df["is_platform"]
    ].sort_values("traffic", ascending=False).head(30)

    # Сохраняем в Excel с несколькими листами
    out_path = OUTPUT_DIR / "skyscraper_analysis.xlsx"
    with pd.ExcelWriter(out_path, engine="openpyxl") as writer:
        df.sort_values("traffic", ascending=False).to_excel(
            writer, index=False, sheet_name="Все страницы"
        )
        agency_gaps.to_excel(
            writer, index=False, sheet_name="GAP от агентств"
        )
        platform_skyscraper.to_excel(
            writer, index=False, sheet_name="Skyscraper vs платформы"
        )

    print(f"\n✅ Skyscraper-анализ сохранён: {out_path}")
    print(f"   Всего страниц конкурентов: {len(df)}")
    print(f"   Нет у нас (новые статьи): {len(df[~df['we_have_topic']])}")
    print(f"   Есть у нас (улучшить): {len(df[df['we_have_topic']])}")

    print("\n🔝 Топ-15 страниц агентств которых у нас нет:")
    print(f"{'URL':<65} {'Трафик':>8} {'Ключей':>7}")
    print("-" * 85)
    for _, row in agency_gaps.head(15).iterrows():
        print(f"{row['url']:<65} {row['traffic']:>8,} {row['keywords_count']:>7}")

    return df


# ──────────────────────────────────────────────
# СЦЕНАРИЙ 3: КОНТЕНТ-ПЛАН
# Объединяем gap + skyscraper → приоритизированный список статей
# ──────────────────────────────────────────────

def generate_content_plan(gap_df, skyscraper_df):
    print("\n\n📋 СЦЕНАРИЙ 3: КОНТЕНТ-ПЛАН")
    print("=" * 50)

    rows = []

    # Из GAP — берём высокоприоритетные кластеры
    if gap_df is not None:
        for _, row in gap_df[gap_df["competitor_count"] >= 2].head(30).iterrows():
            rows.append({
                "Тип": "GAP — новая тема",
                "Ключ / Тема": row["keyword"],
                "Частота": row["frequency"],
                "Трафик потенциал": row["max_traffic"],
                "Конкурентов": row["competitor_count"],
                "Пример URL": row["example_url"],
                "Домен для публикации": _suggest_domain(row["keyword"]),
                "Приоритет": row["priority"],
            })

    # Из Skyscraper — топ страницы платформ которых нет у агентств
    if skyscraper_df is not None:
        platform_only = skyscraper_df[
            skyscraper_df["is_platform"] & ~skyscraper_df["we_have_topic"]
        ].head(20)
        for _, row in platform_only.iterrows():
            rows.append({
                "Тип": "SKYSCRAPER — лучше платформы",
                "Ключ / Тема": row["url"].rstrip("/").split("/")[-1].replace("-", " "),
                "Частота": "",
                "Трафик потенциал": row["traffic"],
                "Конкурентов": 1,
                "Пример URL": row["url"],
                "Домен для публикации": "emailsoldiers.ru",
                "Приоритет": "🟡 Средний",
            })

    df = pd.DataFrame(rows)
    if df.empty:
        print("  Нет данных для контент-плана")
        return

    out_path = OUTPUT_DIR / "content_plan.xlsx"
    df.to_excel(out_path, index=False, sheet_name="Контент-план")
    print(f"✅ Контент-план сохранён: {out_path}")
    print(f"   Статей в плане: {len(df)}")


def _suggest_domain(keyword: str) -> str:
    """Простая эвристика: коммерческие ключи → crmgroup, информационные → emailsoldiers"""
    commercial_signals = ["агентство", "заказать", "услуги", "стоимость", "цена", "купить", "под ключ"]
    kw_lower = keyword.lower()
    if any(s in kw_lower for s in commercial_signals):
        return "crmgroup.ru"
    return "emailsoldiers.ru"


# ──────────────────────────────────────────────
# СЦЕНАРИЙ 4: КОММЕРЧЕСКИЕ ЗАПРОСЫ
# Яндекс.Директ конкурентов = горячие ключи
# ──────────────────────────────────────────────

# Сигналы коммерческого интента для фильтрации органики
COMMERCIAL_SIGNALS = [
    "заказать", "заказ", "купить", "стоимость", "цена", "цены", "прайс",
    "агентство", "услуги", "услуга", "под ключ", "аутсорс", "нанять",
    "разработка", "внедрение", "настройка", "настроить", "интеграция",
    "сколько стоит", "тарифы", "тариф", "специалист", "фриланс",
]

def run_commercial_analysis(api: KeysSoAPI):
    print("\n\n💰 СЦЕНАРИЙ 4: КОММЕРЧЕСКИЕ ЗАПРОСЫ (Директ)")
    print("=" * 50)

    # Наши контекстные ключи
    print("\n🏠 Наши ключи в Директе...")
    own_context = set()
    for domain in OWN_DOMAINS:
        kws = api.get_all_context_keywords(domain, max_pages=5)
        for kw in kws:
            own_context.add(kw.get("word", "").lower())
    print(f"  Наших контекстных ключей: {len(own_context)}")

    # Контекстные ключи конкурентов
    print("\n🎯 Контекстные ключи конкурентов (Директ)...")
    rows = []
    for domain in ALL_COMPETITORS:
        print(f"  → {domain}")
        try:
            kws = api.get_all_context_keywords(domain, max_pages=5)
        except Exception as e:
            print(f"    ⚠️ {e}")
            continue
        for kw in kws:
            word = kw.get("word", "").lower()
            rows.append({
                "keyword": word,
                "frequency": kw.get("ws", 0),
                "avg_bid_rub": round(kw.get("avbid", 0) / 100, 0),  # копейки → рубли
                "competitor_domain": domain,
                "competitor_url": kw.get("url", ""),
                "we_have_it": word in own_context,
                "is_platform": domain in PLATFORM_COMPETITORS,
            })

    if not rows:
        print("  ⚠️ Нет данных")
        return

    df = pd.DataFrame(rows)

    # Gap: чужие коммерческие ключи которых нет у нас
    gap = df[~df["we_have_it"]].copy()
    gap_agg = (
        gap.groupby("keyword")
        .agg(
            frequency=("frequency", "max"),
            avg_bid=("avg_bid_rub", "max"),
            competitor_count=("competitor_domain", "nunique"),
            competitors=("competitor_domain", lambda x: ", ".join(sorted(set(x)))),
            example_url=("competitor_url", "first"),
            only_platforms=("is_platform", "all"),
        )
        .reset_index()
        .sort_values(["competitor_count", "avg_bid"], ascending=[False, False])
    )

    # Фильтр: только тематические ключи
    signals = "|".join(COMMERCIAL_SIGNALS + ["email", "crm", "рассылк", "маркетинг"])
    relevant = gap_agg[gap_agg["keyword"].str.contains(signals, na=False)].copy()

    # Метка: агентства vs только платформы
    relevant["source"] = relevant["only_platforms"].map({
        True: "Только платформы",
        False: "Агентства конкуренты"
    })

    # Сохраняем
    out_path = OUTPUT_DIR / "commercial_keywords.xlsx"
    with pd.ExcelWriter(out_path, engine="openpyxl") as writer:
        relevant.sort_values(["competitor_count", "frequency"], ascending=[False, False]).to_excel(
            writer, index=False, sheet_name="Коммерческие gap"
        )
        gap_agg.to_excel(
            writer, index=False, sheet_name="Все контекстные gap"
        )
        df[~df["we_have_it"]].sort_values("frequency", ascending=False).to_excel(
            writer, index=False, sheet_name="Сырые данные"
        )

    print(f"\n✅ Коммерческие ключи сохранены: {out_path}")
    print(f"   Всего контекстных gap: {len(gap_agg)}")
    print(f"   Тематических коммерческих: {len(relevant)}")

    print(f"\n💰 Топ-25 коммерческих gap-ключей:")
    print(f"{'Ключ':<55} {'Частота':>7} {'Ставка':>7} {'Конк.':>5} {'Источник'}")
    print("-" * 95)
    for _, r in relevant.sort_values(["competitor_count", "frequency"], ascending=[False, False]).head(25).iterrows():
        print(f"{r['keyword']:<55} {int(r['frequency']):>7,} {int(r['avg_bid']):>6}₽ {r['competitor_count']:>5}  {r['source']}")

    return relevant


# ──────────────────────────────────────────────
# MAIN
# ──────────────────────────────────────────────

if __name__ == "__main__":
    if API_TOKEN == "YOUR_KEYS_SO_TOKEN":
        print("⚠️  Укажи API_TOKEN из ЛК keys.so → Настройки → API")
        print("   https://www.keys.so/ru/settings/api")
        exit(1)

    api = KeysSoAPI(API_TOKEN)

    print("🚀 SEO Gap + Skyscraper Analysis")
    print(f"   Наши домены: {', '.join(OWN_DOMAINS)}")
    print(f"   Конкуренты-агентства: {len(AGENCY_COMPETITORS)}")
    print(f"   Конкуренты-платформы: {len(PLATFORM_COMPETITORS)}")
    print(f"   Результаты будут в: {OUTPUT_DIR}/")

    gap_df = run_gap_analysis(api)
    skyscraper_df = run_skyscraper_analysis(api)
    commercial_df = run_commercial_analysis(api)
    generate_content_plan(gap_df, skyscraper_df)

    print(f"\n\n🎉 Готово!")
    print(f"   📁 {OUTPUT_DIR}/gap_analysis.xlsx      — ключи которых нет у нас")
    print(f"   📁 {OUTPUT_DIR}/skyscraper_analysis.xlsx — топ-страницы конкурентов")
    print(f"   📁 {OUTPUT_DIR}/content_plan.xlsx       — итоговый контент-план")

    print("\n\n🎉 Готово!")
    print(f"   📁 {OUTPUT_DIR}/gap_analysis.xlsx      — ключи которых нет у нас")
    print(f"   📁 {OUTPUT_DIR}/skyscraper_analysis.xlsx — топ-страницы конкурентов")
    print(f"   📁 {OUTPUT_DIR}/content_plan.xlsx       — итоговый контент-план")
