# PageSpeed Optimization Backlog — crmgroup.ru

**Дата аудита:** 2026-02-23
**Текущие скоры:** Mobile 50 / Desktop 80 (Performance)
**CWV:** LCP 2.9s, FCP 2.3s, CLS 1.11 — FAILED

## Сделано (2026-02-23)

- [x] **P0.2** Google Fonts → non-blocking (`preload` + `onload` swap) — **-200ms FCP**
- [x] **P0.3** `loading="lazy"` на 24 картинки + `fetchpriority="high"` на LCP + `decoding="async"` — **CLS fix**
- [x] **P1.3** Split CSS: 92 KB → global 14 KB + blog 70 KB — **-78 KB на главной**

## Backlog

### P0 — Высокий приоритет

#### P0.1: nginx gzip для CSS/JS
**Проблема:** nginx отдаёт CSS/JS БЕЗ сжатия. 784 KB CSS + 557 KB JS = 1.3 MB несжатых.
**Решение:** Тикет хостеру (Selectel) — добавить в nginx конфиг:
```
gzip_types text/css application/javascript application/json image/svg+xml;
gzip_min_length 256;
gzip_comp_level 6;
```
**Эффект:** ~1.3 MB → ~260 KB. **+20 баллов Performance.**
**Усилия:** 30 мин (тикет). Зависит от скорости ответа хостера.

---

### P1 — Средний приоритет

#### P1.1: Cloudflare Free Tier
**Проблема:** Нет CDN, нет edge-кэширования, нет Brotli.
**Решение:** Подключить Cloudflare free (сменить DNS nameservers).
- Автоматически: gzip/Brotli, кэш, HTTP/2, WebP
- Все 1.3 MB CSS+JS → ~240 KB с Brotli
**Эффект:** **+15-25 баллов.** Решает P0.1 автоматически.
**Усилия:** 2-3 часа. Нужен доступ к DNS домена.

#### P1.2: Critical CSS + async loading
**Проблема:** 11 CSS файлов (784 KB) — ВСЕ render-blocking.
**Решение:** Извлечь ~15 KB critical CSS для above-fold → inline в `<head>`. Остальное — async через `media="print"` pattern.
**Эффект:** FCP 2.3s → ~1.3s mobile.
**Усилия:** 4-6 часов. Нужно тестировать FOUC.

#### P1.4: Видео оптимизация
**Проблема:** 2 autoplay видео (1.1 + 4.3 MB), без `poster`, без `preload="none"`.
**Решение:** mu-plugin output buffer: `poster` атрибут + `preload="none"` на второе видео + Intersection Observer для ленивой загрузки.
**Эффект:** -4 MB bandwidth, -500ms LCP.
**Усилия:** 2-3 часа.

---

### P2 — Низкий приоритет / нужны внешние изменения

#### P2.1: Autoptimize агрегация
**Проблема:** Autoptimize создаёт 6 отдельных CSS + 6 JS файлов вместо агрегации.
**Решение:** WP Admin → Autoptimize → включить "Aggregate CSS/JS files".
**Усилия:** 30 мин. Нужен тест.

#### P2.2: Удалить jquery-migrate.js
**Проблема:** 14 KB jquery-migrate — совместимость с jQuery 1.x, WP 6.9 не нуждается.
**Решение:** mu-plugin: `$scripts->remove('jquery-migrate')`.
**Риск:** Может сломать тему/плагины.
**Усилия:** 15 мин + тестирование.

#### P2.3: Self-host Google Fonts
**Проблема:** DNS lookup к fonts.googleapis.com + CORS overhead.
**Решение:** Скачать Inter woff2 (cyrillic + latin ≈ 40 KB), положить на сервер.
**Эффект:** -100ms, -2 DNS lookup.
**Усилия:** 1-2 часа.

#### P2.4: Theme CSS reduction (588 KB!)
**Проблема:** `styles.min.css` = 588 KB, homepage использует <20%.
**Решение:** PurgeCSS. Но нет доступа к theme source.
**Workaround:** Critical CSS (P1.2) + async load.

#### P2.5: Theme JS reduction (212 KB + GSAP 113 KB)
**Проблема:** scripts.min.js + GSAP + ScrollTrigger + Lenis = 325 KB анимаций.
**Решение:** Нет доступа к theme bundle.
**Workaround:** requestIdleCallback для non-critical scripts.

---

## Ожидаемые скоры после всех оптимизаций

| Метрика | Сейчас (mobile) | После P0-P1 | После ALL |
|---------|----------------|-------------|-----------|
| Performance | 50 | 70-80 | 85-95 |
| LCP | 2.9s | 1.5-2.0s | 1.0-1.5s |
| FCP | 2.3s | 1.0-1.5s | 0.8-1.2s |
| CLS | 1.11 | <0.25 | <0.1 |
| TTFB | 1.0s | 0.6-0.8s | 0.4-0.6s |

## Самый большой ROI

1. **P0.1 или P1.1** (gzip/Cloudflare) — одно действие даёт +15-25 баллов
2. **P1.2** (Critical CSS) — серьёзное улучшение FCP
3. **P1.4** (видео) — -4 MB payload
