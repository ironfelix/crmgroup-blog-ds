# crmgroup.ru — Локальный справочник

**Обновлено:** 2026-02-23
**Цель:** Единый файл с токенами, структурой и путями. Claude НЕ скачивает ничего с сервера — всё здесь.

## Локальные файлы

### Кэш страниц: `cache/pages/` (53 файла, 5.7 MB)

**Основные:**
| Файл | Описание |
|------|----------|
| `homepage.html` | Главная (196 KB) |
| `services.html` | Услуги (55 KB, redirect с /ux-audit/) |
| `crm-marketing.html` | CRM-маркетинг (77 KB) |
| `email-marketing-pod-klyuch.html` | Email-маркетинг (99 KB) |
| `glossary.html` | Глоссарий (49 KB) |
| `conditions.html` | Условия (64 KB) |

**Блог:** `cache/pages/blog/` — 36 статей (3.9 MB)
- `index.html` — хаб /blog/
- `top-five-crm-metrics-guide.html` — наша статья CRM Metrics
- `customer-value-management.html` — наша статья CVM
- + 33 других статьи

**Кейсы:** `cache/pages/cases/` — 11 кейсов (1.2 MB)
- `index.html` — хаб /cases/
- `burger-king-challenges.html`, `tinkoff-special-project.html`, etc.

### Прототипы
| Файл | Описание |
|------|----------|
| `prototypes/` | Прототипы компонентов |

### CSS
| Файл | Описание |
|------|----------|
| `css/wp-custom-global.css` | **Наш CSS** — глобальный (14 KB), деплой через FTP |
| `css/wp-custom-blog.css` | **Наш CSS** — блог (70 KB), деплой через FTP |
| `css/wp-custom.css` | **Наш CSS** — оригинал до split (92 KB), backup |
| `css/styles.min.css` | **Тема** — styles.min.css (~588 KB) |

### Шрифты (локально)
| Путь | Семейства |
|------|-----------|
| `fonts/TT_Runs/` | TTRuns: Regular, Medium, DemiBold, Bold |
| `fonts/TT_Smalls/` | TTSmalls: ExtraLight, Regular, Medium, DemiBold, Bold |
| `fonts/Inter/` | Inter: Regular, Bold |

### Логотипы клиентов (34 SVG)
Путь: `img/logos/`
```
puma_2  loreal  tinkoff_2  vtb  miele_2  metro  lenta  ashan
dodo  hyndai  vichy_2  kerastase_2  samolet  burger_2  premier
benetton_2  laroche  amediateka  pic  level  fck  skan  zenit_2
nordman  gulliver  spadream  banki  klutchauto  totogroup
ecco  okko  magnit  interfacs  otkritie
```

---

## Секции главной (порядок сверху вниз)

| # | Класс | Заголовок | bg |
|---|-------|-----------|-----|
| 1 | `.page-header` | Увеличиваем возвращаемость клиентов | тёмный |
| 2 | `.services-section` | (без заголовка, карточки услуг) | тёмный |
| 3 | `.cases-section` | Доказываем делом | белый |
| 4 | `.expert-experience-section` | Делимся опытом экспертов | белый |
| 5 | `.awards-section` | Доказываем делом | белый/тёмные карточки |
| 6 | `.about-section` | Собираем лучших | белый |
| 7 | `#clients .section.--white` | **Работаем с лучшими** ← переделываем | белый |
| 8 | `.form-section.--white` | Готовы к общению | белый |

---

## Текущая структура секции #clients

```html
<section class="section --white" id="clients">
  <div class="container">
    <div class="content">               <!-- flex, gap: 50px -->
      <section class="split-container clients-section">
        <div class="split-hero">        <!-- max-width ~410px -->
          <h2 class="h2 heading">Работаем<br>с лучшими</h2>
          <div class="desc --color-grey">
            <p>Мы ценим долгосрочное сотрудничество...</p>
          </div>
        </div>
        <div class="split-content">
          <div class="clients-logo">    <!-- inline SVGs -->
            <div class="logo grey-block">[SVG]</div> × 11
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
```

**Скрытая альтернатива** — в теме есть `.clients-logos` (display: none) с 29 брендами через CSS `background-image`. Не используется.

---

## Дизайн-токены (выжимка)

### Контейнер
```
.container: max-width: 1400px; padding: 0 30px;
  @425px: padding 0 20px
  @325px: padding 0 15px
```

### Секции — отступы
```
.indent-section--max: 128px top/bottom → 96px mobile
.indent-section:      96px top/bottom → 48px mobile  ← стандарт
.indent-section--min: 64px top/bottom
```

### Цвета
| Токен | Значение | Назначение |
|-------|----------|------------|
| `--color-accent-red` | `#c01020` (мы override) | Акцент, кнопки, ссылки |
| `--button-bg` | `#c01020` | Кнопки |
| `--button-bg-hover` | `#a80e1c` | Hover кнопок |
| `--text-color` | `#000` | Основной текст |
| `--text-color-grey` | `#999` | Вторичный текст |
| `--bd-color` | `#D9D9D9` | Рамки |
| `--border-color-light-gray` | `#E1E1E1` | Рамки логотипов |
| `--bg-main` | `#fff` | Фон страницы |
| `--input-bg` | `#F5F5F5` | Фон инпутов |
| `body background` | `#000` | Body bg (тёмный!) |
| Тёмные блоки | `#1a1a1a` / `#262626` | Услуги, кейсы |
| Surface | `#f2f2f2` | Карточки, слайдер bg |

### Типографика
| Элемент | Шрифт | Размер | line-height |
|---------|-------|--------|-------------|
| H1 (hero) | TTRuns-700 | 60px (40px mob) | 1.15 |
| H2 | TTRuns-700 | 42px (30px mob) | 1.15, letter-spacing -0.1rem |
| H3 | TTSmalls-400 | 32px (24px mob) | 1.25 |
| H4 | TTRuns-600 | 24px | 1.3 |
| Body (homepage) | TTSmalls-400 | 18px (16px mob) | 1.45 |
| Body (статьи) | Inter | 17px | 1.58 |
| Small | | 18px | 1.35 |
| Very-small | | 16px (14px mob) | 1.5 |
| Menu nav | TTSmalls-500 | 15px (14px @1080) | |
| Menu dropdown | TTSmalls-500 | 14px | 1.4 |

### Breakpoints
```
1400px  — large desktop
1200px  — desktop (sidebar collapse)
1024px  — tablet landscape
768px   — MOBILE (основной)
680px   — small tablet
425px   — phone
325px   — small phone
```

### Лого-сетка (тема)
```css
/* Текущий (inline SVGs): */
.clients-logo .logo.grey-block — grid auto-fill minmax(165px, 1fr), gap 10px

/* Скрытый (CSS bg): */
.clients-logos: grid 3col (2col @1024, 1col @680), gap 10px
.client-logo: height 102px, border-radius 7px, border 1px solid --border-color-light-gray
```

### Z-index стек
```
99999 — reading progress bar
999   — modals
100   — search, mobile menu
10    — sticky, nav
```

---

## CSS-архитектура (наш wp-custom-global.css)

Секции в порядке файла:
1. Reading Progress Bar
2. Global Color Override (:root)
3. Существующий CSS (html/body overflow)
4. Smooth scroll
5. Header Menu (TTSmalls-500, dropdown 460px)
6. Editorial Dark
7. Breadcrumbs
8. **Homepage** (body.home overrides)
9. Hero, Services, Cases, Awards, About, Clients, Form, Footer
10. Checkboxes
11. Mobile (@768px)
12. Extra small (@480px)

---

## Для прототипов — как подключать шрифты локально

```html
<style>
@font-face { font-family: 'TTRuns-700'; src: url('../fonts/TT_Runs/TTRuns-Bold.woff2') format('woff2'); }
@font-face { font-family: 'TTRuns-500'; src: url('../fonts/TT_Runs/TTRuns-Medium.woff2') format('woff2'); }
@font-face { font-family: 'TTSmalls-400'; src: url('../fonts/TT_Smalls/TTSmalls-Regular.woff2') format('woff2'); }
@font-face { font-family: 'TTSmalls-500'; src: url('../fonts/TT_Smalls/TTSmalls-Medium.woff2') format('woff2'); }
@font-face { font-family: 'TTSmalls-600'; src: url('../fonts/TT_Smalls/TTSmalls-DemiBold.woff2') format('woff2'); }
</style>
```

## Для прототипов — логотипы

```javascript
const logos = ['puma_2','loreal','tinkoff_2','vtb','miele_2','metro','lenta','ashan',
  'dodo','hyndai','vichy_2','kerastase_2','samolet','burger_2','premier',
  'benetton_2','laroche','amediateka'];
// Путь: ../img/logos/${name}.svg
```
