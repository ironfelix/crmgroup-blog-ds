# CRM-group Blog Design System (v5)
> Updated: 2026-02-21
> Scope: WordPress `content_hub`, article pages with `body.single-blog`

## Source Of Truth (Priority)
1. `01-crmgroup/draft-wp-metrics-v2.txt`  
   Content structure, anchors, FAQ+Schema, repeated block patterns.
2. `01-crmgroup/draft-crm-metrics.html`  
   Production-like TOC behavior (desktop sticky + mobile + active state JS).
3. `01-crmgroup/ds-updated.html`  
   Updated visual tokens and typographic fixes (`#c01020`, `1.58`, `660px`).
4. `01-crmgroup/crmgroup-blog-components.html`  
   Legacy reference only.

---

## What Is Updated In v5
- **Contributors v2** — единый блок авторов+экспертов, Mindbox-style (без коробок, без лейблов).
  Заменяет отдельные `author-block` карточки + `experts-section` grid.
- v4 (без изменений): real production TOC, accent `#c01020`, body `17px/1.58`, reading `660px`, H3 fix.

### Deprecated в v5
- `.author-block` + `.author-block__label/name/post` → заменить на `.contributors`
- `.experts-section` + `.experts-grid` + `.expert-card` → заменить на `.contributors`

---

## Design Tokens

```css
--crm-page-bg:       #f5f5f5;
--crm-surface:       #ffffff;
--crm-surface-warm:  #fff9f0;
--crm-border:        #e4e2dc;
--crm-text:          #1a1a1a;
--crm-text-muted:    #8a8a8a;
--crm-red:           #c01020;  /* was #dc1327 */
--crm-red-soft:      #fde8e8;
--crm-radius:        12px;
--crm-font:          Inter, -apple-system, BlinkMacSystemFont, sans-serif;
```

---

## Typography

| Element | Size | Weight | Line-height | Notes |
|---|---:|---:|---:|---|
| Body text | 17px | 400 | 1.58 | long-read baseline |
| Lead | 18px | 400 | 1.65 | left border accent |
| H2 | 24-26px | 700 | 1.25 | top divider allowed |
| H3 | 17px | 600 | 1.35 | `#3d3d3d`, `border-left: 2px solid #e8e8e8` |
| TOC item | 13.5-14px | 400/600 | 1.4-1.45 | active state required |
| FAQ Q | 15.5-16px | 600 | 1.4 | summary row |
| FAQ A | 15-15.5px | 400 | 1.7-1.75 | answer text |

Reading width target: about `660px` (65-75 chars in RU).

---

## Layout (WordPress / content_hub)

```text
body.single-blog
  main.singlepost
    .column:nth-of-type(1)   -> hidden spacer
    .column:nth-of-type(2)   -> article content column
    .column:nth-of-type(3)   -> sticky right aside (.navigation + subscription)
```

Rules:
- Keep right sticky aside TOC as primary desktop navigation.
- Keep separate mobile TOC (`<details class="mobile-toc">`) inside content.
- Hide in-content theme TOC (`.navigation-page`) to avoid duplicates.

---

## TOC Contract (Production)

Desktop TOC selectors:
- `.single-blog .singlepost .sticky-block .navigation`
- `.single-blog .singlepost .sticky-block .navigation__item`
- `.single-blog .singlepost .sticky-block .navigation__item.active`

Mobile TOC selectors:
- `.mobile-toc`
- `.mobile-toc-list a`

Active-state logic:
- Use `IntersectionObserver`.
- Observe `[id^="anchor_"]`.
- Match links by `href="#anchor_N"`.

---

## Content Structure Contract (From `draft-wp-metrics-v2.txt`)

Required anchors and sections:
1. `anchor_1`: LTV
2. `anchor_2`: Retention Rate
3. `anchor_3`: Churn Rate
4. `anchor_4`: AOV
5. `anchor_5`: NPS
6. `anchor_6`: Как метрики связаны
7. `anchor_7`: Как улучшить метрики (8 инструментов)
8. `anchor_8`: FAQ по метрикам CRM
9. `anchor_9`: Бесплатная консультация

Stable reusable patterns:
- `acf/block-content-list`
- `acf/block-sidenote` (multiple inserts across article, not intro-only)
- `block-comment` (`block-comment__text`, `block-comment__autor`, `autor-photo`, `autor-name`, `autor-post`)
- `block-result` + `block-result__heading`
- `wp-block-table`

---

## FAQ + Schema Requirement

For FAQ section:
1. JSON-LD block with `@type: FAQPage`.
2. Visible FAQ markup in body (`details/summary`) with Schema microdata.

Minimum policy:
- At least 5 Q&A items.
- Content in visible FAQ and JSON-LD must be semantically aligned.
- FAQ section must have stable anchor (`anchor_8`).

---

## Additional CSS (v4, production baseline)

```css
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

.single-blog {
  background: #f5f5f5 !important;
}

/* Layout normalization */
.single-blog .column:nth-of-type(1) { display: none !important; }
.single-blog .column:nth-of-type(2) { max-width: 860px !important; }
.single-blog .section-content .navigation-page { display: none !important; }

/* Base typography */
.single-blog .section-content,
.single-blog .section-content p,
.single-blog .section-content li,
.single-blog .section-content td {
  font-family: Inter, -apple-system, BlinkMacSystemFont, sans-serif;
  font-size: 17px;
  line-height: 1.58;
  color: #1a1a1a;
}

.single-blog .section-content a {
  color: #c01020 !important;
}

.single-blog .section-content li::marker {
  color: #c01020;
  opacity: .75;
}

/* Lead paragraph */
.single-blog .section-content .block-sidenote__container:first-child .block-sidenote__text > p:first-child {
  font-size: 18px !important;
  line-height: 1.65 !important;
  color: #4a4a4a !important;
  border-left: 3px solid #c01020 !important;
  padding-left: 16px !important;
  margin-bottom: 28px !important;
}

/* Headings */
.single-blog .section-content h2.wp-block-heading {
  font-size: 24px !important;
  font-weight: 700 !important;
  line-height: 1.25 !important;
  color: #1a1a1a !important;
  border-top: 2px solid #e4e2dc !important;
  padding-top: 24px !important;
  margin-top: 52px !important;
  margin-bottom: 18px !important;
}

.single-blog .section-content h3.wp-block-heading {
  font-size: 17px !important;
  font-weight: 600 !important;
  line-height: 1.35 !important;
  color: #3d3d3d !important;
  margin-top: 32px !important;
  margin-bottom: 12px !important;
  border-left: 2px solid #e8e8e8 !important;
  padding-left: 12px !important;
}

/* Sidenote */
.single-blog .section-content .block-sidenote {
  position: static !important;
  transform: none !important;
  left: auto !important;
  max-width: 100% !important;
  background: #fff8f0 !important;
  border: 1px solid #f0e4d0 !important;
  border-left: 3px solid #c01020 !important;
  border-radius: 0 8px 8px 0 !important;
  padding: 12px 18px !important;
  margin: 8px 0 24px !important;
}

.single-blog .section-content .block-sidenote__content .mb-16 {
  display: block !important;
  margin-bottom: 6px !important;
  font-size: 11px !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  letter-spacing: .8px !important;
  color: #8a8a8a !important;
}

/* Expert comment */
.single-blog .section-content .block-comment {
  background: #fffbf5 !important;
  border: 1px solid #f0e8d4 !important;
  border-left: 4px solid #e8a838 !important;
  border-radius: 0 12px 12px 0 !important;
  padding: 22px 24px 18px !important;
  margin: 28px 0 !important;
}

.single-blog .section-content .block-comment__text p {
  font-size: 16px !important;
  line-height: 1.65 !important;
  color: #1a1a1a !important;
}

.single-blog .section-content .block-comment__autor {
  display: flex !important;
  align-items: center !important;
  gap: 12px !important;
  margin-top: 16px !important;
  padding-top: 14px !important;
  border-top: 1px solid #f0e8d4 !important;
}

.single-blog .section-content .block-comment__autor img {
  width: 44px !important;
  height: 44px !important;
  border-radius: 50% !important;
}

/* Tables */
.single-blog .section-content .wp-block-table,
.single-blog .section-content .table-wrapper {
  overflow-x: auto !important;
}

.single-blog .section-content .wp-block-table table,
.single-blog .section-content .table-wrapper table {
  width: 100%;
  border-collapse: collapse !important;
  font-size: 15px !important;
  background: #fff !important;
}

.single-blog .section-content .wp-block-table thead th,
.single-blog .section-content .table-wrapper thead th {
  background: #f4f3ef !important;
  border-bottom: 2px solid #e4e2dc !important;
  padding: 12px 16px !important;
  font-size: 13.5px !important;
  font-weight: 600 !important;
}

.single-blog .section-content .wp-block-table tbody td,
.single-blog .section-content .table-wrapper tbody td {
  padding: 12px 16px !important;
  border-bottom: 1px solid #e4e2dc !important;
}

.single-blog .section-content .wp-block-table tbody tr:hover td,
.single-blog .section-content .table-wrapper tbody tr:hover td {
  background: rgba(192,16,32,.04) !important;
}

/* Sticky TOC (real production TOC in right aside) */
.single-blog .singlepost .sticky-block .navigation {
  border-left-color: #e4e2dc !important;
}

.single-blog .singlepost .sticky-block .navigation__item {
  font-family: Inter, sans-serif !important;
  font-size: 14px !important;
  line-height: 1.45 !important;
  color: #8a8a8a !important;
  padding: 7px 0 7px 16px !important;
  transition: color .2s !important;
}

.single-blog .singlepost .sticky-block .navigation__item:hover {
  color: #1a1a1a !important;
}

.single-blog .singlepost .sticky-block .navigation__item.active {
  border-left: 2px solid #c01020 !important;
  color: #1a1a1a !important;
  font-weight: 600 !important;
}

/* FAQ (works for both #crm-faq and inline Schema FAQ markup) */
.single-blog .section-content #crm-faq details,
.single-blog .section-content [itemtype="https://schema.org/FAQPage"] details {
  border: 1px solid #e4e2dc !important;
  border-radius: 10px !important;
  margin-bottom: 8px !important;
  overflow: hidden !important;
}

.single-blog .section-content #crm-faq summary,
.single-blog .section-content [itemtype="https://schema.org/FAQPage"] summary {
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  gap: 12px !important;
  cursor: pointer !important;
  padding: 14px 18px !important;
  font-size: 15.5px !important;
  font-weight: 600 !important;
  line-height: 1.4 !important;
  color: #1a1a1a !important;
  list-style: none !important;
}

.single-blog .section-content #crm-faq summary::-webkit-details-marker,
.single-blog .section-content [itemtype="https://schema.org/FAQPage"] summary::-webkit-details-marker {
  display: none !important;
}

.single-blog .section-content #crm-faq summary::after,
.single-blog .section-content [itemtype="https://schema.org/FAQPage"] summary::after {
  content: '+' !important;
  color: #c01020 !important;
  font-size: 22px !important;
  font-weight: 300 !important;
  transition: transform .2s !important;
}

.single-blog .section-content #crm-faq details[open] summary::after,
.single-blog .section-content [itemtype="https://schema.org/FAQPage"] details[open] summary::after {
  transform: rotate(45deg) !important;
}

.single-blog .section-content #crm-faq [itemprop="text"],
.single-blog .section-content [itemtype="https://schema.org/FAQPage"] [itemprop="text"],
.single-blog .section-content #crm-faq .fb {
  color: #555 !important;
  font-size: 15px !important;
  line-height: 1.7 !important;
}

/* CTA block-result */
.single-blog .section-content .block-result {
  background: #fff9f0 !important;
  border-radius: 12px !important;
}

.single-blog .section-content .block-result__heading a {
  color: #c01020 !important;
  text-decoration: none !important;
}
```

---

## Minimal JS For TOC Active State

```js
const headings = document.querySelectorAll('[id^="anchor_"]');
const links = document.querySelectorAll('.toc-list a, .navigation__item');

const observer = new IntersectionObserver((entries) => {
  entries.forEach((e) => {
    if (!e.isIntersecting) return;
    links.forEach((l) => l.classList.remove('active'));
    const selector = `[href="#${e.target.id}"]`;
    document.querySelectorAll(selector).forEach((el) => el.classList.add('active'));
  });
}, { rootMargin: '-20% 0px -70% 0px' });

headings.forEach((h) => observer.observe(h));
```

---

## Contributors v2 — Unified Block (Mindbox-style)

Все участники статьи (авторы + редактор + эксперты) в одной горизонтальной полосе.
Без коробок, без лейблов «Автор» / «Эксперты». Аватарка 40px + имя + роль.

```html
<div class="contributors">
  <div class="contributors__person">
    <img class="contributors__photo" src="…" alt="Имя">
    <div>
      <div class="contributors__name">Имя Фамилия</div>
      <div class="contributors__role">должность</div>
    </div>
  </div>
  <!-- повторить для каждого участника -->
</div>
```

```css
/* Contributors v2 (Mindbox-style) */
.contributors {
  display: flex;
  flex-wrap: wrap;
  gap: 4px 0;
  align-items: center;
  max-width: var(--measure, 660px);
  padding-top: 20px;
  border-top: 1px solid #e4e4e4;
}
.contributors__person {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 8px 16px 8px 0;
  border-right: 1px solid #e4e4e4;
  margin-right: 16px;
}
.contributors__person:last-child {
  border-right: none;
  margin-right: 0;
}
.contributors__photo {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
  flex-shrink: 0;
}
.contributors__name {
  font-size: 13px;
  font-weight: 600;
  color: #1a1a1a;
  line-height: 1.3;
  white-space: nowrap;
}
.contributors__role {
  font-size: 11.5px;
  color: #8a8a8a;
  line-height: 1.3;
  margin-top: 1px;
  white-space: nowrap;
}
```

Порядок участников: Автор → Редактор → Эксперты (по количеству упоминаний в статье).

---

## Practical Checklist Before Publish
1. `block-content-list` matches current anchors and section order.
2. TOC links point to existing `anchor_N` ids only.
3. FAQ has both JSON-LD and visible HTML.
4. Sticky TOC active state works on scroll.
5. Mobile TOC is present and usable.
6. Colors and link accents use `#c01020`.
7. Contributors block uses `.contributors` (не старые author-block / expert-card).

