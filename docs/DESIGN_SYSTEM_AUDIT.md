# CRM Group Design System Audit
**Дата:** 2026-02-22
**Файлы:** `styles.min.css` (тема), `wp-custom.css` (блог), [ironfelix DS doc](https://ironfelix.github.io/crmgroup-blog-ds/)

---

## Общая проблема: два визуальных языка

Сайт crmgroup.ru содержит **две параллельные дизайн-системы**, которые не согласованы между собой:

| Параметр | Сайт (тема `content_hub`) | Блог (CRM DS v6, `wp-custom.css`) |
|----------|---------------------------|-------------------------------------|
| Шрифты | TTSmalls + TTRuns | Inter |
| Акцентный красный | `#FD3939` | `#c01020` (ранее `#dc1327`, заменён) |
| Border-radius кнопок | 4px | 8px |
| Фон инпутов | `#F5F5F5` | `#ffffff` |
| Body font-size | 22px | 17px |
| Фон страницы | `#ffffff` | `#f7f6f3` |

При переходе пользователя между разделами меняется гарнитура, цвет акцента, стиль кнопок и общее ощущение.

---

# Часть 1. САЙТ — Главная и страницы услуг

## 1.1. Типографика сайта

### Шрифтовые семейства

**Основной текст:** `TTSmalls-400`, sans-serif (400, 500, 600, 700 — каждый вес как отдельный font-family)
**Заголовки:** `TTRuns-700` (bold), `TTRuns-600` (demibold), `TTRuns-500` (medium)
**Fallback:** `Inter-Regular`, `Inter-Bold` (woff2, загружается локально)
**Google Fonts:** `Inter:400,500,600,700` (загружается параллельно с локальными — избыточность)

**Проблема font-family:** каждый вес объявлен как отдельное имя (`TTSmalls-400`, `TTSmalls-600`), а не `font-family: TTSmalls; font-weight: 400/600`. Это антипаттерн, усложняющий поддержку.

**Проблема TTRuns-700:** объявлен дважды — `TT_Runs_Bold.woff` и `TT_Runs_ExtraBold.woff`. Второй перезаписывает первый, фактически Bold = ExtraBold.

### Типографическая шкала (сайт)

| Элемент | Desktop | Mobile (768px) | Шрифт | Weight |
|---------|---------|----------------|-------|--------|
| H1 hero (`._h1--big`) | 78px | 40px | TTRuns-700 | 700 |
| H1 (.h1) | 60px | 40px | TTRuns-700 | 700 |
| H2 (.h2) | 42px | — | TTRuns-700 | 700 |
| H3 (.h3) | 32px | 24px | TTRuns-600 | 600 |
| H4 (.h4) | 24px | — | TTRuns-600 | 600 |
| Body | 22px (--text-size) | 18px | TTSmalls-400 | 400 |
| Slider title | 50px | 24px | TTRuns-600 | 600 |
| Article card heading | 32px | 23px | TTRuns-600 | 600 |
| Meta / info | 16px | 14px | TTSmalls-400 | 400 |
| Кнопка "Читать" | 18px | 16px | — | — |
| Labels | 12px | — | TTSmalls-600 | 600 |

**Проблема:** 27 уникальных значений font-size в теме. Значения 22, 23, 24, 25, 26px визуально неразличимы. Нет чёткой шкалы.

### Line-height (сайт)
`1`, `1.05`, `1.1`, `1.12`, `1.15`, `1.2`, `1.23`, `1.25`, `1.3`, `1.32`, `1.4`, `1.45`, `normal` — 13 значений без системы.

### Letter-spacing (сайт)
`-0.125rem`, `-0.1rem`, `-0.089rem`, `-0.07rem`, `-0.02rem`, `0.025rem` — 6 значений.

---

## 1.2. Цвета сайта

### CSS Custom Properties (`:root`)
```css
--bg-main:                    #FFF
--bg-button-form:             #262626
--bg-block-comment:           #FFF9F0
--bg-social-network-button:   #FEDDDD
--bg-header-table:            #FFF9F0
--input-border:               #D9D9D9
--input-color:                #999
--input-error:                #FD3939
--input-bg:                   #F5F5F5
--input-radius:               4px
--button-bg:                  #FD3939
--button-bg-hover:            #CB2D2D
--text-color:                 #000
--text-color-grey:            #999
--text-size:                  22px
--bd-color:                   #D9D9D9
--bd-dark-color:              #A6A6A6
--color-accent-red:           #FD3939
--color-accent-orange:        #FFA800
--color-gray:                 #595959
--border-color-light-gray:    #E1E1E1
```

### Палитра серых (17 оттенков — проблема)
`#F5F5F5`, `#ebebeb`, `#e9e9e9`, `#E1E1E1`, `#D9D9D9`, `#cbcbcb`, `#A6A6A6`, `#999`, `#7f7f7f`, `#595959`, `#4c4c4c`, `#2e2e2e`, `#262626`, `#191919`, `#1c1b1f`, `#1a1a1a`, `#000`

`#ebebeb` vs `#e9e9e9` — разница 2 единицы, визуально идентичны.

### Палитра cream (3 оттенка)
`#FFF9F0`, `#fdf9f5`, `#fff4e2` — визуально неразличимы, но используются в разных контекстах.

### 3 красных → 2 красных (после P0.1)
- `#FD3939` — основной акцент сайта (кнопки, hover, маркеры)
- ~~`#dc1327`~~ — **заменён на `#c01020`** во всём `wp-custom.css` (P0.1, 2026-02-22). WCAG AA 7.2:1 на белом.
- `#CB2D2D` — hover кнопок сайта
- `#c01020` — ссылки, CTA, маркеры в блоге. Hover: `#b10e1d`

### WCAG контрастность
| Комбинация | Ratio | WCAG AA |
|-----------|-------|---------|
| `#FD3939` на `#FFF` | 4.0:1 | FAIL (нужно 4.5:1) |
| `#999` на `#FFF` | 2.85:1 | FAIL |
| `rgba(255,255,255,.55)` на `#1a1a1a` | ~8.2:1 | PASS |
| `rgba(255,255,255,.3)` на `#1a1a1a` | ~4.5:1 | На границе |

---

## 1.3. Компоненты сайта

### Кнопки

**Основная (`.btn-black`):**
- Background: `#262626`, hover: `#FD3939`, focus: `#000` + border `#FD3939`
- Border-radius: `4px`, font-size: `16px`, transition: `.25s ease-in-out`

**CTA хедера (блог-контекст `.to-form`):**
- Background: `#c01020`, hover: `#b10e1d`
- Border-radius: `8px`, padding: `12px 26px`, font-size: `15px`, weight: 600

**"Подробнее" (`.button-read`):**
- Текстовая ссылка + стрелка SVG (15x15 → 19x19 при hover)
- Color: `#FD3939`, font-size: `18px`

**Слайдер-навигация:**
- 50x50px, border: `1px solid #FD3939`, border-radius: `4px`

### Карточки

**Материал / услуга (`.material`):**
- Hover: border-radius `14px`, красная рамка, заголовок → `#FD3939`
- Без тени, без фона — "плоский" стиль, разделение через `border-bottom: 1px solid #A6A6A6`

**Статья (`#blog .article`):**
- Фото: высота `320px`, border-radius `21px`, object-fit: cover
- Заголовок: TTRuns-600, 32px (desktop) → 23px (mobile)
- Info: gap `24px`, цвет `#595959`, font-size `16px`

### Формы (тема)
- Input bg: `#F5F5F5`, border: `1px solid #D9D9D9`, border-radius: `4px`
- Placeholder: `rgba(0,0,0,.4)`
- Error: `#FD3939`
- Чекбокс checked: background `#DC1327`, border `3px solid #191919`

### Навигация / Хедер
- **Класс:** `.header` (стили НЕ в `styles.min.css` — вероятно, в отдельном файле или JS)
- Высота: `82px`
- Логотип: SVG background-image (`logo.svg` белый, `logo-dark.svg` тёмный)
- Класс `.--white` переключает на светлую тему
- Dropdown (`.services-menu .services-menu-div`): pills с `background: rgba(255,255,255,.1)`, `border: rgba(255,255,255,.18)`

### Футер
- Background: `#1a1a1a`
- Текст: `rgba(255,255,255,.55)`, ссылки: `rgba(255,255,255,.7)` → hover `#fff`
- Copyright: `rgba(255,255,255,.3)`, `13px`

### Модальные окна
- Backdrop: `blur(10px)`, `rgba(0,0,0,.3)`
- Popup: background `#fff`, border-radius `12px`, max-width `622px`
- Анимация: `translateY(50%) scale(0.8)` → `translateY(0) scale(1)`

---

## 1.4. Страница услуг (например, `/crm-marketing/`)

**Важно:** страница услуг использует шаблон `single-blog` (класс на `<body>`), а не отдельный шаблон. Это означает:
- Reading progress bar присутствует (нетипично для сервисной страницы)
- TOC-сайдбар со sticky навигацией
- Двухколоночный layout (784px + 280px)

### Специфичные компоненты услуги

**Табы категорий (7 шт):**
- Anchor-ссылки (`#category_00` - `#category_06`), НЕ JS-табы
- Все секции загружены одновременно — длинный скролл (~8-10 экранов)

**Карточки кейсов:**
- Фон `#ffffff`, border `1px solid #e4e2dc`, border-radius `12px`, padding `20px`
- Метрики: крупный шрифт, красный акцент
- Ссылка "Подробный кейс" + стрелка

**Блок процесса (4 фазы):**
- Вертикальная раскладка (не timeline)
- Аватары 52px, ролевые метки-pills
- Длительность как badge

**Блок "Готовы к общению":**
- Dark section (`#1a1a1a`)

### Отличия от стандартной B2B SaaS-страницы
1. Нет hero-изображения/иллюстрации — только текст
2. Нет pricing/тарифов
3. Нет социального доказательства в hero (логотипы, рейтинги)
4. Нет видео или интерактивных демо
5. Длинный формат "статьи" вместо секционного лендинга с CTA после каждого блока
6. Минимум иконок и визуальных элементов

---

## 1.5. Лейаут и сетка (сайт)

### Контейнеры
| Класс | Max-width | Padding |
|-------|-----------|---------|
| `.container` / `.content` | 1400px | 0 30px |
| `.container-min` | 775px | centered |
| `.container-columns` | — | gap: 40px |

### Брейкпоинты (13 шт — проблема)
`1410`, `1200`, `1024`, `990`, `968`, `768`, `765`, `680`, `520`, `425`, `376`, `340`, `325`

**Проблема:** `768px` vs `765px` — конфликт, зона 765-768px с непредсказуемым поведением.

### Responsive-утилиты
```css
.isDescktop  → display:none на max-width:768px
.notDescktop → display:none на min-width:769px
.isTablet    → display:none на min-width:769px И max-width:426px
.isMobile    → display:none на min-width:426px
```

### Z-index (хаотичный)
`-999`, `-100`, `-1`, `1`, `2`, `10`, `11`, `100`, `999`, `9999` — без системы.

---

## 1.6. Spacing (сайт)

### Gap (20 уникальных значений)
`0`, `4`, `5`, `7`, `8`, `10`, `13`, `16`, `17`, `18`, `20`, `24`, `30`, `34`, `40`, `45`, `50` px — без модульного шага.

### Секционные отступы
| Класс | Padding-top | Margin-bottom | Mobile |
|-------|-------------|---------------|--------|
| `.indent-section` | 96px | 96px | 48px |
| `.indent-section--max` | 128px | 128px | — |
| `.indent-section--min` | 64px | 64px | — |

### Border-radius (10 значений)
`4`, `8`, `12`, `14`, `16`, `21`, `30`, `32`, `48`, `400` px + `9999px` (pills) + `50%` (аватарки)

### Box-shadow
Единственная тень в теме: `0 0 18px -1px rgba(0,0,0,.1)` — минимальное использование.

---

## 1.7. Анимации (сайт)

### Transitions
| Длительность | Easing | Назначение |
|-------------|--------|------------|
| .07s | linear | Микро-анимации |
| .15s | linear / ease-in-out | Стандартные hover |
| .25s | ease-in / ease-in-out | Кнопки, карточки |
| .45s | ease-in-out | Zoom изображений |
| .95s | linear | Медленная анимация фото |

### Keyframes
- `show_popup` / `hide_popup` — модалки
- `arrow_before` / `arrow_after` — анимация стрелок
- `animationName` — **placeholder-название, забыли переименовать**

---

# Часть 2. БЛОГ-ХАБ (`/blog/`)

## 2.1. Типографика хаба (ОБНОВЛЕНО 2026-02-22, P0.2)

| Элемент | Шрифт (было) | Шрифт (стало, P0.2) | Desktop | Mobile |
|---------|-------------|---------------------|---------|--------|
| H1 (`._h1--big`) | TTRuns-700 | TTRuns-700 (без изменений) | 78px | 40px |
| Slider title | TTRuns-600 | TTRuns-600 (без изменений) | 50px | 24px |
| Card heading (`._h3`) | TTRuns-600 | **Inter 700** | 32px | 23px |
| Card description | TTSmalls-400 | **Inter 400** | 18px | 18px |
| Meta-info | TTSmalls-400 | **Inter 400** | 16px | 14px |
| Categories sidebar | TTSmalls-400 | **Inter 400** | 16px | 16px |
| Pagination | TTSmalls-400 | **Inter 400** | 16px | 16px |
| Body (тема) | TTSmalls-400 | TTSmalls-400 (тема, не перекрыт) | 22px | 18px |

**P0.2 (2026-02-22):** Хаб `/blog/` переведён на Inter через `wp-custom.css` (блок "P0.2 BLOG HUB FONT PARITY"). Это убирает главный визуальный скачок при переходе хаб -> статья. H1 hero и slider title остаются на TTRuns (тема, не перекрыты).

## 2.2. Цвета хаба

Хаб наследует **палитру темы**, а не блога:
- Акцент: `#FD3939` (тема; пока не заменён на `#c01020` — нужен отдельный override)
- Фон: `#FFFFFF` (а не `#f5f5f5`)
- Серый: `#595959` / `#999`

## 2.3. Сетка листинга

```css
#blog .articles-list {
  display: grid;
  grid-template-columns: 1fr 1fr;  /* 2 колонки */
  grid-gap: 64px 32px;
}
/* <=768px → 1fr */
```

### Боковая навигация категорий
- Desktop (>=1025px): `position: sticky; top: 20px; width: 205px`
- Mobile: аккордеон с dropdown

### Пагинация
- Числа: 40x40px, border-radius `4px`, цвет `#595959`
- Текущая: `background: #595959; color: #fff`
- Prev/Next: абсолютное позиционирование по краям

## 2.4. Hover-эффекты карточек

```css
#blog .materials .material:hover::before {
  /* Красная рамка вокруг карточки */
  border: 1px solid var(--color-accent-red);  /* #FD3939 */
  border-radius: 14px;
}
```
Заголовок при hover → `color: #FD3939`. Стрелка-ссылка с анимацией.

## 2.5. Контраст хаб -> статья (ОБНОВЛЕНО после P0.1-P0.3)

| Параметр | Хаб `/blog/` (до P0.2) | Хаб `/blog/` (после P0.2) | Статья |
|----------|------------------------|---------------------------|--------|
| Шрифт заголовков | TTRuns (700/600) | **Inter 700** (карточки) | Inter (700) |
| Шрифт текста | TTSmalls-400 | **Inter 400** | Inter |
| Акцентный цвет | `#FD3939` | `#FD3939` (тема, не заменён) | `#c01020` |
| Фон страницы | `#FFFFFF` | `#FFFFFF` | `#f5f5f5` |
| Body font-size | 22px / 18px mob | 22px / 18px mob | 17px/1.58 / 16px/1.72 mob |
| Карточки | Плоские, border-bottom | Плоские, border-bottom | Border-radius 12px, border |
| Тени | Нет | Нет | box-shadow на TOC |

**Прогресс:** P0.2 устранил главный скачок шрифтов (TTRuns -> Inter). Остаётся разница в цвете акцента (`#FD3939` vs `#c01020`) и фоне (`#FFF` vs `#f5f5f5`). Эти различия менее заметны, чем смена гарнитуры.

---

# Часть 3. БЛОГ-СТАТЬЯ (уже задокументировано в DS)

Детали блог-статьи уже есть в [ironfelix DS doc](https://ironfelix.github.io/crmgroup-blog-ds/). Ниже — ключевые токены и дополнения.

## 3.1. Ключевые токены статьи (CRM DS v6 + v4 overrides)

```css
/* Layout */
--crm-content-w: 784px;
--crm-sidebar-w: 280px;
--crm-gap: 48px;
--crm-shell: max(24px, calc((100vw - 784px - 280px - 48px) / 2));

/* Colors — ОБНОВЛЕНО 2026-02-22 (P0.1) */
Accent:         #c01020          /* #dc1327 полностью заменён */
Accent hover:   #b10e1d
Gold:           #e8a838
Background:     #f5f5f5          /* было #f7f6f3 в v6, обновлено в v4 overrides */
Cards:          #ffffff
Borders:        #e4e2dc
Quote bg:       #fffbf5
Meta gray:      #8a8a8a
Text:           #1a1a1a
H3 color:       #242424          /* новый, усиленная иерархия */

/* Typography — ОБНОВЛЕНО (P0.3) */
Font:           Inter, -apple-system, sans-serif
H1:             38px/1.2, 700, letter-spacing -0.3px
H2:             24px/1.25, 700, border-top 2px solid #e4e2dc  /* было 26px */
H3:             19px/1.32, 700, border-left 3px solid #d7d3ca, color #242424
Body:           17px/1.58        /* было 1.78, снижено для кириллицы */
Lead:           18.5px/1.72
Comment:        16px/1.65        /* исключение: цитата требует больше воздуха */
```

## 3.2. Статус компонентов в DS doc

Компоненты задокументированы в [DS v3](https://ironfelix.github.io/crmgroup-blog-ds/) и [DS v4 updated](https://ironfelix.github.io/crmgroup-blog-ds/ds-updated.html):

1. **Breadcrumbs** — `font-size: 13px, color: #8a8a8a, hover: #c01020` -- DONE (DS v3)
2. **Карточка статьи (Article Card)** — для листингов и "Читайте также" -- DONE (DS v3)
3. **Пагинация** — числа 40x40, текущая `bg: #595959` -- DONE (DS v3)
4. **Код/pre-блоки** — для технических статей -- DONE (DS v3)
5. **Аккордеон (FAQ)** — `#crm-faq details/summary`, border `#e4e2dc`, radius `10px` -- DONE (DS v3 + v4)
6. **Progress bar чтения** — `position: fixed; height: 3px; bg: #c01020` -- DONE (DS v4)
7. **Тултипы (.crm-term / .crm-tip)** — `bg: #1a1a1a, color: #fff, radius: 8px, max-width: 260px` -- DONE (DS v3 + wp-custom.css)
8. **Мобильный TOC** — `details.mobile-toc` с `arrow down/up`, скрывается >=900px -- DONE (DS v4)
9. **Модальные окна** — backdrop blur, анимация -- pending (тема, не блог)
10. **Блок изображения (`.block-picture`)** — border `#e4e2dc`, radius `12px`, padding `20px` -- DONE (DS v3)
11. **Авторский блок (.block-autor)** — grid 52px + 1fr, аватарка, имя, должность -- DONE (DS v3 + v4)
12. **Сетка экспертов (.block-experts)** — `repeat(auto-fill, minmax(130px, 1fr))`, gap `12px` -- DONE (DS v3 + v4)
13. **Мобильные состояния** — 4 брейкпоинта: 1200px, 900px, 640px, 768px -- DONE (wp-custom.css)

### 3.2.1. Новые компоненты (добавлены в wp-custom.css, февраль 2026)

14. **Tooltip inline (.explain / .explain-card)** — glossary tooltips, mobile: `position: relative` (inline expand вместо fixed), desktop: `max-width: min(290px, calc(100vw - 32px))`
15. **CVM кейс-карточки (.cvm-ru-cases / .cvm-ru-card)** — карточки компаний с метриками (.cvm-ru-num), бейджами (.cvm-ru-badge), результатами (.cvm-ru-result). Цвет: `#c01020`. Mobile: вертикальная раскладка result-блока.
16. **World cases list (.cvm-world-list)** — список с `li::before { color: #c01020 }` (arrow-prefix), stat highlights (.cvm-stat)
17. **FAQ accordion (#crm-faq)** — `details/summary`, border `#e4e2dc`, radius `10px`, `+` icon → `rotate(45deg)` on open. Body: `.fb` class. Font: Inter, 15px.
18. **Form block (.block-form / .block-result)** — light bg `#f7f5f0`, border `#e8e4dc`, input focus: `box-shadow: 0 0 0 3px rgba(192,16,32,.1)`. CF7 integration.
19. **Expert cards (.block-experts)** — grid layout, fixed height `190px`, transparent bg (no warm background). Heading `.block-experts__heading` spans full row.
20. **Contributors v2 (.contributors)** — inline flex layout, `border-right` separator between persons. Replaces deprecated author-block + experts-section pattern.
21. **Empty image handling** — CSS `:has()` rules: `.new_article__author:has(img[src=""])`, `.card-article__visual:has(img[src=""])` — скрывает пустые блоки на хабе и главной.
22. **Sticky sidebar TOC** — `position: sticky; top: 96px` с `IntersectionObserver`. Active state: `background: #fff5f5; color: #c01020`. Counter: `decimal-leading-zero`. CTA кнопка `::after`.

---

# Часть 4. РЕКОМЕНДАЦИИ

## Критичные (P0) — ВЫПОЛНЕНЫ

### 1. ~~Унифицировать красный цвет~~ -- DONE (2026-02-22, P0.1)
- **Было:** `#FD3939` (сайт), `#dc1327` (DS doc), `#c01020` (wp-custom.css)
- **Сделано:** `#dc1327` полностью заменён на `#c01020` во всём `wp-custom.css`. Hover: `#b10e1d`. WCAG AA 7.2:1 на белом.
- `#FD3939` остаётся в теме сайта (главная, услуги) — отдельная задача.

### 2. ~~Унифицировать шрифты на хабе~~ -- DONE (2026-02-22, P0.2)
- **Было:** хаб = TTRuns/TTSmalls, статья = Inter
- **Сделано:** Блок "P0.2 BLOG HUB FONT PARITY" в `wp-custom.css` переводит `#blog` на `Inter !important`. Карточки, мета, пагинация, сайдбар категорий — всё Inter.
- H1 hero и slider title остаются на TTRuns (тема).

### 3. ~~Исправить line-height body текста~~ -- DONE (2026-02-22, P0.3)
- **Было:** 1.78 (блог), 1.4-1.45 (сайт)
- **Сделано:** `line-height: 1.58` (desktop), `1.72` (mobile <=640px). Комментарий эксперта: `1.65` (исключение). Блок "CRM DS v4 OVERRIDES" в `wp-custom.css`.

## Важные (P1)

### 4. Консолидировать серые
- **Сейчас:** 17 оттенков
- **Решение:** 5 ступеней: `#f5f5f5` (bg), `#e4e2dc` (border), `#999` (muted), `#595959` (secondary), `#1a1a1a` (primary)
- **Статус:** Частично — в блоге DS использует эти 5 ступеней, но тема не тронута.

### 5. Стандартизировать border-radius
- **Сейчас:** 10 значений (4, 8, 12, 14, 16, 21, 30, 32, 48, 400 px)
- **Решение:** 4 ступени: `4px` (инпуты), `8px` (кнопки), `12px` (карточки), `50%` (аватарки)
- **Статус:** Частично — блог DS использует 4px/8px/10px/12px/50%.

### 6. Сузить типографическую шкалу
- **Сейчас:** 27 уникальных font-size
- **Решение:** 8 ступеней: `12, 14, 16, 18, 22, 28, 38, 60` px
- **Статус:** Частично — блог DS: 11px/11.5px/12px/13px/13.5px/14px/15px/16px/17px/19px/24px/38px.

### 7. Починить TTRuns-700 дубль
- **Сейчас:** Bold и ExtraBold оба на weight 700 -> второй перезаписывает первый
- **Решение:** ExtraBold -> weight 800
- **Статус:** Не сделано (тема).

### 8. Убрать конфликт брейкпоинтов 768 vs 765
- **Решение:** Один порог `768px`
- **Статус:** Не сделано (тема).

## Улучшения (P2)

### 9. ~~Добавить модульную шкалу отступов~~ -- PARTIAL
- **Было:** 20 уникальных gap-значений
- **Сделано:** CSS-переменные `--s1:8px --s2:16px --s3:24px --s4:40px --s5:64px` в DS doc. В `wp-custom.css` отступы стандартизированы, но без переменных (WP Additional CSS не поддерживает `:root` переменные).

### 10. Привести z-index к системе
- **Решение:** 5 уровней: `base: 0`, `dropdown: 10`, `sticky: 100`, `modal: 1000`, `toast: 9999`
- **Статус:** Не сделано (тема).

### 11. Сервисные страницы -- отдельный шаблон
- **Сейчас:** услуги используют `single-blog` -> reading progress bar, TOC, статейный layout
- **Решение:** Секционный лендинг с hero, CTA после каждого блока, JS-табы вместо anchor-скролла
- **Статус:** Не сделано (тема).

### 12. ~~Обновить DS doc (ironfelix)~~ -- DONE (2026-02-22)
- Все 13 компонентов добавлены в DS v3 (`index.html`) и DS v4 (`ds-updated.html`)
- Цветовые токены обновлены: `#dc1327` -> `#c01020`
- Секция "Сайт vs Блог" добавлена в DS v3
- Новые компоненты (tooltip, CVM cases, FAQ, experts, form, empty image handling) задокументированы

---

## Приложение: Хедер (screenshot-based)

Стили хедера **отсутствуют** в `styles.min.css`. Вероятно, определены в отдельном JS-файле или инлайновых стилях. Из наблюдений:

- Класс: `.header`
- Высота: ~82px
- Фон: прозрачный (главная) или `#1a1a1a` (блог)
- Логотип: CSS background-image
- Dropdown (services-menu): большие отступы между пунктами, горизонтальные разделители
- CTA "Оставить заявку": красная кнопка справа
- На mobile: бургер-меню
