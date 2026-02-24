# crmgroup.ru — Theme Structure & FTP Workflow

## FTP Доступ

| | |
|---|---|
| **Host** | `5.188.159.40` |
| **User** | `s.sychev` |
| **Pass** | `mnesfcfqk2` |
| **Root** | `/www/` |
| **Сайт** | `/www/crmgroup.ru/` |
| **Тема** | `/www/crmgroup.ru/wp-content/themes/content_hub/` |

```bash
# Список файлов в папке темы
curl ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/ --list-only

# Скачать файл
curl ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/src/styles/sections/header.scss -o header.scss

# Загрузить файл
curl -T local-file.scss ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/src/styles/sections/header.scss
```

---

## Структура темы `content_hub`

```
/www/crmgroup.ru/wp-content/themes/content_hub/
│
├── header.php                   # Шапка — HTML разметка + 2 меню (desktop/mobile)
├── footer.php                   # Подвал
├── functions.php                # Регистрация меню, хуки, стили
├── index.php                    # Fallback шаблон
├── single.php                   # Одиночный пост (blog)
├── page.php                     # Стандартный шаблон страниц
├── archive.php                  # Архивные страницы
├── archive-blog.php             # Архив блога
├── archive-cases.php            # Архив кейсов
├── archive-glossary.php         # Архив глоссария
├── archive-whitepapers.php      # Архив методичек
├── category.php                 # Категория
├── search.php / searchform.php  # Поиск
├── sidebar.php / comments.php   # Виджеты
├── 404.php                      # Страница ошибки
│
├── ── Page Templates ──
├── page-services.php            # /services/
├── page-cases.php               # /cases/
├── page-contenthub.php          # /blog/ (хаб контента)
├── page-contacts.php            # /contacts/
├── page-calendar.php            # /calendar/ (скрыт из меню)
├── page-emailmarketing.php
├── page-crmmarketing.php
├── page-marketing-audit.php
├── page-marketing-trends.php
├── page-special-projects.php
├── page-design-support.php
├── page-uxaudit.php
├── page-telegram-chatbot.php
├── page-clientnps.php
├── page-questionnaire.php
├── page-newyear-quiz.php
├── page-custom-template.php
├── page-header.php
├── crm-marketing-send.php       # Отправка из CRM
│
├── ── Build / Config ──
├── gulpfile.js                  # Build-система: SCSS → min.css
├── package.json                 # npm зависимости
├── style.css                    # Мета-файл темы WP (не стили!)
├── style-rtl.css                # RTL (не используется)
├── admin.css                    # Стили WP Admin
├── phpcs.xml.dist               # PHP CodeSniffer config
├── sitemap.xml                  # Статичный sitemap
├── robots.txt
├── screenshot.png               # Превью темы в WP Admin
│
├── ── Directories ──
├── src/                         # Исходники
│   ├── styles/
│   │   ├── styles.min.css       # ⭐ COMPILED OUTPUT (публичный URL)
│   │   ├── sections/
│   │   │   ├── header.scss      # ⭐ Меню, дропдауны, мобильное меню
│   │   │   ├── main.scss        # Основные секции страниц
│   │   │   └── footer.scss      # Подвал
│   │   ├── components/
│   │   │   ├── form.scss        # Формы
│   │   │   ├── card-case.scss   # Карточка кейса
│   │   │   └── card-case-slider.scss
│   │   ├── blocks/
│   │   │   └── block-form.scss  # WP-блок формы подписки
│   │   ├── pages/
│   │   │   ├── main.scss        # Главная страница
│   │   │   ├── cases.scss       # Страница кейсов
│   │   │   └── marketing-trends.css
│   │   └── modules/
│   │       └── popup.css        # Попапы
│   ├── js/                      # JS исходники
│   ├── scripts/                 # Доп. скрипты
│   ├── fonts/                   # Шрифты
│   ├── img/                     # Изображения
│   ├── video/                   # Видео
│   └── audio/                   # Аудио
│
├── dist/                        # Скомпилированные assets (альтернативный output)
├── js/                          # Скомпилированный JS
├── template-parts/              # PHP партиалы (header, footer, loops)
├── includes/                    # PHP-хелперы, кастомные типы постов
├── functions/                   # Модули functions.php (разбиты по файлам)
├── vue-apps/                    # Vue.js приложения (квиз, NPS и т.д.)
├── languages/                   # Переводы (.po/.mo)
├── 404/                         # Assets для 404
└── access/                      # Ограничения доступа
```

> **ВАЖНО:** `src/styles/styles.min.css` — СКОМПИЛИРОВАННЫЙ файл.
> Редактировать надо `.scss` исходники, затем пересобирать через Gulp.
> Для мелких срочных правок — патчить `styles.min.css` напрямую (откатить легко).
> Для CSS без правки темы — использовать `wp-custom.css` через WP Additional CSS.

---

## Build System (Gulp)

```bash
# Установка зависимостей (нужен Node.js на сервере или локально)
npm install

# Компиляция SCSS → CSS
gulp styles        # или просто gulp

# Watch режим (авто-компиляция при изменениях)
gulp watch
```

**Текущая ситуация:** На production-сервере Gulp, скорее всего, не запущен в watch-режиме. Изменения SCSS требуют ручной пересборки или прямого патча `styles.min.css`.

---

## Два меню: Desktop vs Mobile

Это главная ловушка при написании CSS! На странице рендерятся **два** `<ul class="header-menu-ul">`:

### Desktop меню
```html
<header class="header [--white]">
  <div class="content">
    <nav class="header-menu">
      <ul class="header-menu-ul">
        <li class="header-menu__item services-menu">
          <a>Услуги</a>
          <div class="second-div-menu">
            <ul>  <!-- дропдаун -->
              <li class="bottom-sep">...</li>
              <li>...</li>
            </ul>
          </div>
        </li>
        <li class="header-menu__item">Блог</li>
        <!-- НЕТ "Календарь" — скрыт через CSS -->
      </ul>
    </nav>
  </div>
</header>
```

### Mobile меню (отдельная структура!)
```html
<div class="menu-wrapper">  <!-- position: fixed; slide-out -->
  <nav class="menu">
    <ul class="menu-list header-menu-ul">  <!-- ← тот же класс!!! -->
      <li>
        <a class="menu-list__item">Услуги</a>  <!-- другой класс ссылок -->
      </li>
    </ul>
  </nav>
</div>
```

**Правило:** Любой CSS на `.header-menu-ul` бьёт по обоим меню.
- Скоупить desktop: `.header .content .header-menu-ul`
- Скоупить mobile: `.menu-wrapper .header-menu-ul`

---

## header.scss — Ключевые блоки

### Desktop дропдаун
```scss
// Контейнер дропдауна (скрыт по умолчанию)
.header-menu-ul .services-menu .second-div-menu {
  position: absolute;
  opacity: 0;
  visibility: hidden;
  transition: opacity .2s, visibility .2s;
}

// Показывается при ховере
.header-menu-ul .services-menu:hover .second-div-menu {
  opacity: 1;
  visibility: visible;
}

// Список в дропдауне
.header-menu-ul .services-menu ul {
  background: #000;
  width: 380px;
  display: flex;
  flex-wrap: wrap;
  gap: 0;
}

// Элементы — 2 колонки
.header-menu-ul .services-menu ul li {
  width: calc(50% - 20px);
  padding-bottom: 16px;
}

// Ссылки в дропдауне
.header-menu-ul .services-menu ul li a {
  color: #fff;
  &:hover { color: var(--color-accent-red); }
}

// Разделитель между группами
.bottom-sep {
  border-bottom: 1px solid #595959;
}
```

### Белый вариант хедера (`.--white`, страницы блога)
```scss
// На страницах блога хедер получает класс --white
.--white .header-menu-ul .services-menu ul {
  background: #FFF;  // белый фон дропдауна
}
.--white .header-menu-ul .services-menu ul a {
  color: #000 !important;  // тёмный текст
}
.--white .header-menu-ul .services-menu ul a:hover {
  color: var(--color-accent-red) !important;
}
```

### Mobile меню
```scss
.menu-wrapper {
  position: fixed;
  // ... slide-out panel
}

.menu-list__item {
  color: white;
  &:hover { color: var(--color-accent-red); }
}
```

---

## Известные Баги

### Баг 1: Hover невидимый в дропдауне на страницах блога
**Симптом:** При наведении на ссылки в дропдауне на страницах `/blog/` ссылки становятся белыми (невидимыми).

**Причина:** В `wp-custom.css` есть строка:
```css
body.single-blog .header-menu-ul li a:hover { color: #ffffff !important; }
```
Она перебивает стиль ховера в дропдауне.

**Исправление (в wp-custom.css):**
```css
/* Восстановить ховер в дропдауне на страницах блога */
body.single-blog .header .content .header-menu-ul .services-menu ul li a:hover {
  color: var(--color-accent-red, #dc1327) !important;
}
```

### Баг 2: Блог-дропдаун — отсутствуют разделители
**Симптом:** В дропдауне "Блог" нет `border-bottom` между "Статьями" и "Глоссарием".

**Причина:** В `header.php` пункт "Статьи" не имеет класса `bottom-sep`.

**Исправление:** Нужно добавить класс в `header.php`:
```html
<li class="bottom-sep">Статьи</li>
```
Или через `wp-custom.css` по позиции (хрупко).

### Баг 3: Шрифты в дропдауне
**Симптом:** Шрифт в дропдауне отличается от основного текста навигации.

**Исправление (в wp-custom.css, desktop только):**
```css
.header .content .header-menu-ul .services-menu ul li a {
  font-family: inherit;
  font-size: 14px;
  font-weight: 400;
}
```

---

## Безопасный Workflow для FTP-изменений

### Вариант A: Патч `styles.min.css` (быстро, только CSS)

1. **Скачать** актуальный `styles.min.css`
   ```bash
   curl ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/src/styles/styles.min.css -o styles.min.css.bak
   ```

2. **Создать патч** — добавить нужный CSS в конец файла (не трогать существующий код)
   ```bash
   cat styles.min.css.bak > styles.min.css
   echo "/* PATCH: fix dropdown hover */" >> styles.min.css
   echo ".header .content .header-menu-ul .services-menu ul li a:hover{color:#dc1327!important}" >> styles.min.css
   ```

3. **Загрузить** и проверить
   ```bash
   curl -T styles.min.css "ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/src/styles/styles.min.css"
   # Проверить в браузере (Ctrl+Shift+R для hard refresh)
   ```

4. **Rollback** (если что-то сломалось)
   ```bash
   curl -T styles.min.css.bak "ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/src/styles/styles.min.css"
   ```

**Минусы:** При следующей сборке через Gulp патч будет потерян.

---

### Вариант B: SCSS + Gulp rebuild (правильно, для капитального рефакторинга)

1. **Скачать нужный .scss**
   ```bash
   curl ftp://s.sychev:mnesfcfqk2@5.188.159.40/.../header.scss -o header.scss.bak
   cp header.scss.bak header.scss
   ```

2. **Редактировать** `header.scss` локально

3. **Пересобрать** на сервере (нужен SSH или Node.js на сервере):
   ```bash
   # SSH: cd /www/crmgroup.ru/wp-content/themes/content_hub && gulp styles
   ```
   > **Проблема:** FTP-доступа для запуска команд нет, нужен SSH или cPanel с терминалом.
   > Если нет SSH — использовать Вариант A или Вариант C.

---

### Вариант C: wp-custom.css через WP Admin (рекомендуется для CSS)

Это самый безопасный способ для стилей — не трогаем тему вообще.

1. Редактировать `/Users/ivanilin/Documents/ivanilin/01-crmgroup/css/wp-custom.css` локально
2. Загрузить через WP Admin Additional CSS **ИЛИ** через REST API:
   ```python
   import urllib.request, json, base64
   USER = "ekaterina.shapochkina@crmgroup.ru"
   PASS = "Sx960tbW8UvlzXBr3z1kvC3m"
   token = base64.b64encode(f"{USER}:{PASS}".encode()).decode()

   with open("/Users/ivanilin/Documents/ivanilin/01-crmgroup/css/wp-custom.css") as f:
       css = f.read()

   payload = json.dumps({"custom_css": css}).encode()
   req = urllib.request.Request(
       "https://crmgroup.ru/wp-json/wp/v2/settings",
       data=payload,
       headers={"Authorization": f"Basic {token}", "Content-Type": "application/json"},
       method="POST"
   )
   urllib.request.urlopen(req)
   ```

**Ограничения:** CSS из дополнительного CSS не может переопределить `!important` из темы, если специфичность ниже. Используй более конкретные селекторы.

---

### Вариант D: Редактировать `header.php` через FTP (для разметки)

Только для изменений в HTML (например, добавить класс `bottom-sep`):

1. **Скачать**
   ```bash
   curl ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/header.php -o header.php.bak
   ```

2. **Редактировать** Python-скриптом (безопаснее):
   ```python
   with open("header.php.bak") as f:
       content = f.read()

   fixed = content.replace('<li>Статьи</li>', '<li class="bottom-sep">Статьи</li>')

   with open("header.php", "w") as f:
       f.write(fixed)
   ```

3. **Загрузить**
   ```bash
   curl -T header.php "ftp://s.sychev:mnesfcfqk2@5.188.159.40/www/crmgroup.ru/wp-content/themes/content_hub/header.php"
   ```

4. **Проверить** → откатить `.bak` если нужно.

---

## Приоритет исправлений

| # | Баг | Метод | Файл | Сложность |
|---|---|---|---|---|
| 1 | Hover белый в дропдауне | wp-custom.css (Вариант C) | `wp-custom.css` | Просто |
| 2 | Шрифты в дропдауне | wp-custom.css (Вариант C) | `wp-custom.css` | Просто |
| 3 | Разделители в Блог-дропдауне | header.php (Вариант D) | `header.php` | Средне |
| 4 | SCSS рефакторинг всего хедера | SCSS + Gulp | `header.scss` | Требует SSH |

**Рекомендация:** Начать с Варианта C (wp-custom.css) — безопасно, без риска, откат мгновенный.

---

## CSS переменные темы

```scss
--color-accent-red: #dc1327;   // или близкое значение
--font-primary: ...;            // основной шрифт (нужно уточнить из styles.min.css)
```

> Точные значения: `curl -s https://crmgroup.ru/wp-content/themes/content_hub/src/styles/styles.min.css | grep -o 'var(--[^)]*)'`
