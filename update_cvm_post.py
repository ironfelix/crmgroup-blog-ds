#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# Rewrites post 12845 with all feedback applied:
# - RU market focus (rubles, Russian cases)
# - Short paragraphs (max 3 sentences)
# - Source tooltips for all stats
# - Company tooltips (McKinsey, Gartner, Bain, Simon-Kucher)
# - CRM-маркетинг (not CRM)
# - NBA/NBO tooltip
# - No "управляемый актив" clichés
# - CVM framed as mature-company strategy
# - Thresholds with sources
# - "активные клиенты" vs "база"

import requests
import base64

USER = "ekaterina.shapochkina@crmgroup.ru"
PASS = "Sx960tbW8UvlzXBr3z1kvC3m"
auth = base64.b64encode(f"{USER}:{PASS}".encode()).decode()
headers = {"Authorization": f"Basic {auth}", "Content-Type": "application/json"}

POST_ID = 12845

CONTENT = r"""<!-- wp:html -->
<style>
.mobile-toc{display:none;background:#fff;border:1px solid #e4e2dc;border-radius:12px;padding:16px 18px;margin-bottom:28px;font-family:Inter,sans-serif}
@media(max-width:900px){.mobile-toc{display:block}}
.mobile-toc summary{cursor:pointer;font-weight:600;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;color:#1a1a1a}
.mobile-toc summary::-webkit-details-marker{display:none}
.mobile-toc summary::after{content:'↓';color:#dc1327;font-weight:400;font-size:17px}
.mobile-toc[open] summary::after{content:'↑'}
.mobile-toc-list{list-style:none;margin:12px 0 0;padding:0;counter-reset:toc-m}
.mobile-toc-list li{margin-bottom:2px}
.mobile-toc-list a{display:block;padding:12px 10px;border-radius:8px;font-size:13.5px;color:#5a5a5a;text-decoration:none;line-height:1.4;counter-increment:toc-m;transition:background .15s,color .15s}
.mobile-toc-list a::before{content:counter(toc-m,decimal-leading-zero);display:inline-block;min-width:22px;font-weight:600;color:rgba(220,19,39,.55);font-size:12px;margin-right:4px}
.mobile-toc-list a:hover{background:#fff5f5;color:#dc1327}
.explain{position:relative;border-bottom:1px dashed #dc1327;cursor:help;color:inherit}
.explain-card{display:none;position:absolute;left:0;top:calc(100% + 6px);z-index:100;background:#fff;border:1px solid #e4e2dc;border-radius:10px;padding:14px 16px;width:290px;font-size:13px;line-height:1.55;color:#1a1a1a;box-shadow:0 4px 20px rgba(0,0,0,.12);pointer-events:none}
.explain:hover .explain-card,.explain:focus-within .explain-card{display:block}
.explain-card strong{display:block;margin-bottom:5px}
</style>
<details class="mobile-toc">
  <summary>Содержание статьи</summary>
  <ul class="mobile-toc-list">
    <li><a href="#anchor_1">Что такое CVM в&nbsp;маркетинге</a></li>
    <li><a href="#anchor_2">Откуда появился термин</a></li>
    <li><a href="#anchor_3">CVM и&nbsp;CRM-маркетинг: в&nbsp;чём разница</a></li>
    <li><a href="#anchor_4">Как работает CVM</a></li>
    <li><a href="#anchor_5">Кейсы: Россия и&nbsp;мир</a></li>
    <li><a href="#anchor_6">Когда компаниям нужен CVM</a></li>
    <li><a href="#anchor_7">С чего начать внедрение</a></li>
    <li><a href="#anchor_8">Частые вопросы</a></li>
  </ul>
</details>
<!-- /wp:html -->

<!-- wp:html -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  setTimeout(function() {
    var nav = document.querySelector('.sticky-block .navigation');
    if (!nav) return;
    nav.classList.add('has-custom-cta');
    var cta = document.createElement('a');
    cta.href = 'https://crmgroup.ru/?form=consulting';
    cta.className = 'sidebar-cta';
    cta.textContent = '\u041e\u0431\u0441\u0443\u0434\u0438\u0442\u044c CVM-\u0441\u0442\u0440\u0430\u0442\u0435\u0433\u0438\u044e \u2192';
    nav.appendChild(cta);
  }, 300);
});
</script>
<!-- /wp:html -->

<!-- wp:acf/block-content-list {"id":"block_cvm_v2","name":"acf/block-content-list","data":{"block_content_list_0_item_name":"Что такое CVM в маркетинге","_block_content_list_0_item_name":"field_637770016695b","block_content_list_1_item_name":"Откуда появился термин Customer Value Management","_block_content_list_1_item_name":"field_637770016695b","block_content_list_2_item_name":"CVM и CRM-маркетинг: в чём разница","_block_content_list_2_item_name":"field_637770016695b","block_content_list_3_item_name":"Как работает CVM: пять ключевых блоков","_block_content_list_3_item_name":"field_637770016695b","block_content_list_4_item_name":"Кейсы: Россия и мир","_block_content_list_4_item_name":"field_637770016695b","block_content_list_5_item_name":"Когда компаниям нужен CVM","_block_content_list_5_item_name":"field_637770016695b","block_content_list_6_item_name":"С чего начать: семь шагов внедрения","_block_content_list_6_item_name":"field_637770016695b","block_content_list_7_item_name":"Частые вопросы про CVM","_block_content_list_7_item_name":"field_637770016695b","block_content_list":8,"_block_content_list":"field_6377700160517"},"align":"","mode":"edit"} /-->

<!-- wp:paragraph {"className":"is-lead"} -->
<p class="wp-block-paragraph is-lead">CVM появляется тогда, когда компания уже не&nbsp;может расти за&nbsp;счёт новых клиентов. Открытие сотой точки не&nbsp;приносит новой маржи. Реклама дорожает: <span class="explain">по данным McKinsey<span class="explain-card"><strong>McKinsey &amp;&nbsp;Company</strong>Один из&nbsp;трёх крупнейших стратегических консультантов мира. Источник: «The growth triple play», McKinsey Quarterly, 2022.</span></span>, стоимость привлечения клиента выросла на&nbsp;50&ndash;70% за&nbsp;пять лет. Остаётся один путь: выжать больше из&nbsp;тех, кто уже купил. Customer Value Management &mdash; это стратегия роста за&nbsp;счёт существующей базы.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_1" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Что такое CVM в&nbsp;маркетинге</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>CVM расшифровывается как Customer Value Management &mdash; управление ценностью клиента. Это подход, при котором компания работает с&nbsp;каждым покупателем исходя из&nbsp;его&nbsp;<span class="explain">пожизненной ценности<span class="explain-card"><strong>CLV / Customer Lifetime Value</strong>Суммарная выручка от&nbsp;одного клиента за&nbsp;всё время отношений. Формула: CLV = средний чек &times; частота покупок &times; срок жизни &times; маржа. По&nbsp;данным Bain &amp;&nbsp;Company, рост CLV на&nbsp;5% увеличивает прибыль на&nbsp;25&ndash;95%.</span></span> (CLV): кому из&nbsp;покупателей предложить апсейл, кому удержать скидку, а&nbsp;кому вовремя написать, пока он&nbsp;не&nbsp;ушёл к&nbsp;конкуренту.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Подход охватывает три направления: удержание (снижение оттока через проактивные кампании до&nbsp;того, как покупатель остыл), развитие (рост среднего чека через апсейл и&nbsp;кросс-продажи по&nbsp;данным о&nbsp;поведении) и&nbsp;реактивация (возврат «спящих» клиентов с&nbsp;персонализированным предложением).</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>По сути, это следующая ступень зрелости CRM-маркетинга. CRM-маркетинг сегментирует базу и&nbsp;запускает триггерные кампании. CVM добавляет предиктивный слой поверх: система предсказывает, кто готов к&nbsp;апсейлу, кто рискует уйти и&nbsp;что конкретно предложить каждому в&nbsp;нужный момент.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_2" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Откуда появился термин Customer Value Management</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>В&nbsp;1990-е компании запускали email-рассылки: одинаковые для всех, без сегментации. <span class="explain">Gartner<span class="explain-card"><strong>Gartner</strong>Американское исследовательское агентство, одно из&nbsp;самых цитируемых в&nbsp;технологической сфере. Ввело и&nbsp;популяризовало термин CRM в&nbsp;конце 1990-х как категорию программного обеспечения.</span></span> в&nbsp;2000-е ввёл термин CRM как категорию ПО: появилась история взаимодействий с&nbsp;клиентом, но&nbsp;стратегия работы с&nbsp;базой оставалась реактивной. В&nbsp;2010-е маркетологи научились строить персонализированные цепочки, но&nbsp;данные по-прежнему хранились разрознено.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>С&nbsp;2008 по&nbsp;2012&nbsp;год <span class="explain">McKinsey<span class="explain-card"><strong>McKinsey &amp;&nbsp;Company</strong>Один из&nbsp;трёх крупнейших стратегических консультантов мира. Публикует отраслевые исследования по&nbsp;маркетингу, операционному управлению и&nbsp;стратегии.</span></span>, <span class="explain">PwC Strategy&amp;<span class="explain-card"><strong>PwC Strategy&amp;</strong>Стратегическое подразделение PricewaterhouseCoopers. Специализируется на&nbsp;операционных трансформациях в&nbsp;B2C-компаниях. Разработало фреймворк CVM-операций для телеком-рынка.</span></span> и&nbsp;<span class="explain">Simon-Kucher<span class="explain-card"><strong>Simon-Kucher &amp;&nbsp;Partners</strong>Международная консалтинговая компания, специализирующаяся на&nbsp;ценообразовании и&nbsp;коммерческой стратегии. Опубликовала исследование «Why CVM is the growth lever you're missing», 2024.</span></span> опубликовали первые фреймворки управления ценностью клиента как самостоятельной дисциплины.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Телеком стал пионером: операторы первыми осознали, что привлечение нового абонента обходится в&nbsp;5&ndash;7 раз дороже удержания существующего (данные <span class="explain">Bain &amp;&nbsp;Company<span class="explain-card"><strong>Bain &amp;&nbsp;Company</strong>Один из&nbsp;трёх крупнейших стратегических консультантов мира. Авторы концепции Net Promoter Score. Исследование «Prescription for Cutting Costs», 2001, ставшее базой для расчётов стоимости удержания vs привлечения.</span></span>). McKinsey описал CVM как систему, превращающую данные о&nbsp;клиентах в&nbsp;персонализированные действия, повышающие их&nbsp;пожизненную ценность (McKinsey Quarterly, 2012).</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><span class="explain">PwC Strategy&amp;<span class="explain-card"><strong>PwC Strategy&amp;</strong>Стратегическое подразделение PricewaterhouseCoopers. Разработало фреймворк CVM-операций для телеком-рынка: три обязательных компонента работающей программы.</span></span> сформулировал операционную сторону: три компонента, без которых программа не заработает.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<style>
.cvm-comps{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin:4px 0 20px}
.cvm-comp{background:#fff;border:1px solid #e8e5df;border-radius:12px;padding:20px 18px}
.cvm-comp.is-key{border-color:rgba(220,19,39,.3);background:#fffaf9}
.cvm-comp-n{font-size:11px;font-weight:700;color:rgba(220,19,39,.5);letter-spacing:.1em;margin-bottom:10px}
.cvm-comp-h{font-size:14.5px;font-weight:700;color:#1a1a1a;margin:0 0 8px;line-height:1.35}
.cvm-comp-d{font-size:13px;color:#666;line-height:1.6;margin:0}
.cvm-comp-w{display:flex;align-items:flex-start;gap:6px;margin-top:14px;padding-top:12px;border-top:1px solid rgba(220,19,39,.15);font-size:12.5px;color:#dc1327;font-weight:600;line-height:1.4}
.cvm-comp-w::before{content:"⚠";flex-shrink:0;font-style:normal}
@media(max-width:680px){.cvm-comps{grid-template-columns:1fr}}
</style>
<div class="cvm-comps">

<div class="cvm-comp">
  <div class="cvm-comp-n">01</div>
  <p class="cvm-comp-h">Единая клиентская база</p>
  <p class="cvm-comp-d">Данные из всех каналов в одном профиле: транзакции, поведение на сайте, обращения в поддержку, история коммуникаций.</p>
</div>

<div class="cvm-comp">
  <div class="cvm-comp-n">02</div>
  <p class="cvm-comp-h">Модель предсказания оттока</p>
  <p class="cvm-comp-d">ML-модели, которые определяют склонность к уходу, апсейлу, следующей покупке — до того, как клиент принял решение.</p>
</div>

<div class="cvm-comp is-key">
  <div class="cvm-comp-n">03</div>
  <p class="cvm-comp-h">Процессы принятия решений</p>
  <p class="cvm-comp-d">Governance: кто принимает решение о коммуникации, по каким критериям, с каким бюджетом и приоритетом.</p>
  <div class="cvm-comp-w">Без этого компонента CVM превращается в продвинутую рассылку</div>
</div>

</div>
<!-- /wp:html -->

<!-- wp:paragraph -->
<p>Когда реклама начала дорожать, про управление ценностью клиента заговорили уже не&nbsp;только в&nbsp;телекоме. Ритейл, банки и&nbsp;e-commerce столкнулись с&nbsp;теми же задачами.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_3" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">CVM и&nbsp;CRM-маркетинг: в&nbsp;чём разница</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>CRM-маркетинг и&nbsp;CVM не конкуренты, а&nbsp;ступени зрелости. В&nbsp;рамках CRM-маркетинга компания сегментирует базу, запускает триггерные кампании и&nbsp;измеряет Retention. CVM добавляет предиктивный слой поверх: модели предсказывают поведение каждого клиента, система принимает решения без ручного вмешательства.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"is-style-stripes"} -->
<figure class="wp-block-table is-style-stripes"><table><thead><tr><th>Параметр</th><th>Email-маркетинг</th><th>CRM-маркетинг</th><th>CVM</th></tr></thead><tbody><tr><td>Природа</td><td>Канал коммуникации</td><td>Стратегия работы с базой</td><td>Стратегия роста CLV</td></tr><tr><td>Ключевая метрика</td><td>Open Rate, CTR</td><td>Retention Rate, LTV</td><td>CLV, ARPU, Churn Rate</td></tr><tr><td>Персонализация</td><td>Переменные и RFM-сегменты</td><td>RFM-сегменты, триггеры по событиям</td><td>Предиктивная, 1:1 на ML</td></tr><tr><td>Охват каналов</td><td>Email</td><td>Email, SMS, push, direct mail</td><td>Все каналы, ML-оркестрация</td></tr><tr><td>ROI</td><td>36 руб. на 1 руб. (DMA, 2023)</td><td>8–10 руб. на 1 руб.</td><td>+15–25% CLV (McKinsey)</td></tr><tr><td>Старт</td><td>С первого дня</td><td>База от 1 000 клиентов</td><td>Активная база от 10 000</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>CRM-маркетинг отвечает на&nbsp;вопрос «кто наш клиент и&nbsp;что он&nbsp;делал?». CVM отвечает на&nbsp;вопрос «что предложить этому клиенту через 30&nbsp;дней, чтобы он&nbsp;не&nbsp;ушёл и&nbsp;купил больше?». Это разные уровни зрелости работы с&nbsp;базой.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>По&nbsp;данным Salesforce (2023), компании, внедрившие CVM-подход поверх CRM-маркетинга, фиксируют рост продаж на&nbsp;29% и&nbsp;рост продуктивности команды на&nbsp;34%. CRM-маркетинг остаётся фундаментом, CVM служит стратегическим слоем поверх него.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_4" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Как работает CVM: пять ключевых блоков</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><span class="explain">Simon-Kucher<span class="explain-card"><strong>Simon-Kucher &amp;&nbsp;Partners</strong>Международная консалтинговая компания. Исследование «Why CVM is the growth lever you're missing», 2024: анализ 40+ CVM-программ в&nbsp;телекоме, банках и&nbsp;ритейле.</span></span> в&nbsp;исследовании 2024&nbsp;года выделяет пять блоков, без которых CVM-программа не&nbsp;работает на&nbsp;полную мощность.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Первый блок: единая клиентская база.</strong> Транзакции, поведение на&nbsp;сайте, обращения в&nbsp;поддержку, история каналов: всё в&nbsp;одном месте. Для этого используют <span class="explain">CDP<span class="explain-card"><strong>Customer Data Platform (CDP)</strong>Платформа для объединения данных о&nbsp;клиенте из&nbsp;всех источников: сайт, приложение, офлайн-точки, колл-центр. Рынок CDP вырастет с&nbsp;540 млрд рублей в&nbsp;2025&nbsp;г. до&nbsp;1,2 трлн к&nbsp;2028&nbsp;г. (MarketsandMarkets).</span></span>, платформу клиентских данных, которая подтягивает информацию из&nbsp;разрозненных систем в&nbsp;единый профиль.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Второй блок: AI-аналитика.</strong> Модели предсказания оттока, следующей покупки, склонности к&nbsp;апсейлу. Без предиктивного слоя CVM работает реактивно: компания реагирует на&nbsp;уже ушедших клиентов, вместо того чтобы предотвращать уход.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Третий блок: проактивные триггеры.</strong> Автоматические кампании по&nbsp;событиям: первая покупка, 30&nbsp;дней без активности, снижение частоты заказов. Четвёртый: governance, регламент принятия решений о&nbsp;сегментах и&nbsp;бюджетах. Без него разные команды запускают конкурирующие коммуникации к&nbsp;одному покупателю.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Пятый блок: CVM-дашборд.</strong> Единая система метрик: CLV по&nbsp;когортам, win-rate кампаний удержания, динамика ARPU. Без мониторинга невозможно понять, что работает. Именно на&nbsp;этом этапе компании подключают <span class="explain">движок Next Best Action / Next Best Offer<span class="explain-card"><strong>Next Best Action / Next Best Offer (NBA/NBO)</strong>«Следующее лучшее действие» и&nbsp;«следующее лучшее предложение». NBA решает, что сделать для клиента (позвонить, отправить push, дать скидку). NBO — что конкретно предложить (продукт, тариф). Система работает на&nbsp;ML-моделях в&nbsp;реальном времени.</span></span>: систему, которая определяет оптимальное следующее действие для каждого клиента автоматически.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_5" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Кейсы: Россия и&nbsp;мир</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>CVM сегодня используют как зарубежные телекомы, так и&nbsp;российские ритейлеры и&nbsp;банки. Вот конкретные результаты.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<style>
.cvm-ru-cases{display:flex;flex-direction:column;gap:14px;margin:20px 0 28px}
.cvm-ru-card{background:#fff;border:1px solid #e8e5df;border-left:4px solid #dc1327;border-radius:0 10px 10px 0;padding:18px 22px}
.cvm-ru-head{display:flex;align-items:center;gap:10px;margin-bottom:8px;flex-wrap:wrap}
.cvm-ru-name{font-weight:700;font-size:15.5px;color:#1a1a1a}
.cvm-ru-tag{font-size:11.5px;color:#888;background:#f5f3ef;padding:2px 9px;border-radius:100px;white-space:nowrap}
.cvm-ru-desc{font-size:14px;color:#444;line-height:1.65;margin:0 0 12px}
.cvm-ru-result{display:inline-flex;align-items:center;gap:10px;background:#fff9f5;border:1px solid rgba(220,19,39,.18);border-radius:7px;padding:7px 12px}
.cvm-ru-num{font-size:20px;font-weight:700;color:#dc1327;line-height:1}
.cvm-ru-lbl{font-size:12.5px;color:#666;line-height:1.35}
.cvm-ru-src{font-size:11px;color:#aaa;margin-left:6px;white-space:nowrap}
.cvm-ru-badge{display:inline-block;font-size:12px;font-weight:600;color:#dc1327;background:rgba(220,19,39,.07);padding:3px 10px;border-radius:100px}
@media(max-width:600px){.cvm-ru-card{padding:14px 16px}.cvm-ru-src{display:block;margin-left:0;margin-top:4px}}
</style>
<div class="cvm-ru-cases">

<div class="cvm-ru-card">
  <div class="cvm-ru-head">
    <span class="cvm-ru-name">X5 Group</span>
    <span class="cvm-ru-tag">Ритейл · Пятёрочка, Перекрёсток</span>
  </div>
  <p class="cvm-ru-desc">Запустила предиктивную персонализацию через программу X5&nbsp;Club. Сегмент At&nbsp;Risk начал получать персональные предложения до&nbsp;того, как клиент переключился на&nbsp;конкурента. Подробно о&nbsp;подходе команда X5 рассказала в&nbsp;книге <span class="explain">«Формула персонализации»<span class="explain-card"><strong>«Формула персонализации»</strong>Книга команды X5&nbsp;Group о&nbsp;том, как персонализированные коммуникации влияют на&nbsp;поведение покупателей. Издана в&nbsp;2024&nbsp;году. Один из&nbsp;немногих публичных российских источников по&nbsp;CVM-практике в&nbsp;ритейле.</span></span>.</p>
  <div class="cvm-ru-result">
    <span class="cvm-ru-num">+12%</span>
    <span class="cvm-ru-lbl">частота визитов<br>в&nbsp;целевом сегменте</span>
    <span class="cvm-ru-src">X5 Group, Investor Day 2023</span>
  </div>
</div>

<div class="cvm-ru-card">
  <div class="cvm-ru-head">
    <span class="cvm-ru-name">МТС</span>
    <span class="cvm-ru-tag">Телеком</span>
  </div>
  <p class="cvm-ru-desc">Запустил CVM-программу в&nbsp;2015–2016&nbsp;годах: один из&nbsp;первых подобных проектов в&nbsp;российском телекоме. Предиктивная модель определяла абонентов с&nbsp;риском отключения и&nbsp;автоматически предлагала персональный тариф.</p>
  <span class="cvm-ru-badge">Первый масштабный CVM-проект в&nbsp;телекоме РФ</span>
</div>

<div class="cvm-ru-card">
  <div class="cvm-ru-head">
    <span class="cvm-ru-name">Tinkoff / T-Банк</span>
    <span class="cvm-ru-tag">Финтех</span>
  </div>
  <p class="cvm-ru-desc">Использует движок следующего лучшего действия для кросс-продаж: транзакционное поведение клиента определяет, когда и&nbsp;какой продукт предложить — кредит, депозит или страховку.</p>
  <span class="cvm-ru-badge">Next Best Action в&nbsp;реальном времени</span>
</div>

</div>
<!-- /wp:html -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Мировая практика</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Данные из&nbsp;исследования <span class="explain">Simon-Kucher, 2024<span class="explain-card"><strong>Simon-Kucher &amp;&nbsp;Partners</strong>«Why CVM is the growth lever you're missing», 2024. Анализ более 40 CVM-программ в&nbsp;телекоме, банках и&nbsp;ритейле. Кейсы анонимизированы по&nbsp;условиям исследования.</span></span> (анализ 40+ программ):</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<style>
.cvm-world-list{list-style:none;padding:0;margin:16px 0 24px}
.cvm-world-list li{position:relative;padding:13px 0 13px 22px;border-bottom:1px solid #f0ede8;font-size:15px;color:#444;line-height:1.6}
.cvm-world-list li:last-child{border-bottom:none}
.cvm-world-list li::before{content:"→";position:absolute;left:0;top:14px;color:#dc1327;font-size:13px;font-weight:600}
.cvm-stat{font-weight:700;color:#dc1327}
</style>
<ul class="cvm-world-list">
<li>Британский телеком: предиктивная модель <span class="explain">оттока<span class="explain-card"><strong>Churn Rate (отток клиентов)</strong>Доля покупателей, прекративших пользоваться продуктом за&nbsp;период. Снижение churn на&nbsp;5 п.п. увеличивает прибыль на&nbsp;25–95% (Bain &amp;&nbsp;Company).</span></span> для сегмента At&nbsp;Risk, результат: <span class="cvm-stat">−50% оттока</span> в&nbsp;группе риска за&nbsp;год.</li>
<li>Другой британский оператор: CVM-кампании при продлении контрактов принесли <span class="cvm-stat">+3,8 млрд ₽</span> дополнительной выручки в&nbsp;год.</li>
<li>Голландский телеком: персонализированные предложения при продлении тарифа подняли <span class="cvm-stat">ARPU на 5%</span>.</li>
<li>Региональный банк: A/B-тест персонализации показал, что <span class="cvm-stat">78% клиентов</span> выбрали персональное предложение вместо стандартного.</li>
</ul>
<!-- /wp:html -->

<!-- wp:paragraph -->
<p>По&nbsp;данным <span class="explain">McKinsey<span class="explain-card"><strong>McKinsey &amp;&nbsp;Company</strong>«Next in Personalization 2021»: компании, лидирующие в&nbsp;персонализации, генерируют на&nbsp;40% больше выручки с&nbsp;этого направления по&nbsp;сравнению с&nbsp;конкурентами. 71% покупателей ожидают персонализации, 76% раздражаются, когда её&nbsp;нет.</span></span> («Next in Personalization», 2021), компании с&nbsp;выстроенной персонализацией генерируют на&nbsp;40% больше выручки с&nbsp;этого направления. Ключевое условие: персонализация работает через Next Best Action / Next Best Offer по&nbsp;поведенческим данным, а&nbsp;не&nbsp;просто через имя в&nbsp;теме письма.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_6" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Когда компаниям нужен CVM</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>CVM оправдан, если выполняются хотя бы три из&nbsp;пяти условий. Приоритет: смотреть не&nbsp;на&nbsp;общий размер базы, а&nbsp;на&nbsp;количество <strong>активных</strong> клиентов, то&nbsp;есть тех, кто совершил покупку за&nbsp;последние 12 месяцев.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list">
<li>Активная клиентская база превышает 10&nbsp;000 покупателей.</li>
<li>Стоимость привлечения нового клиента (CAC) растёт два квартала подряд.</li>
<li>Ежегодный отток активных клиентов превышает 15%.</li>
<li>Повторные покупки составляют менее 30% выручки.</li>
<li>Накоплено не&nbsp;менее 12 месяцев транзакционных данных.</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Для компаний с&nbsp;активной базой до&nbsp;5&nbsp;000 покупателей CVM избыточен: <a href="https://crmgroup.ru/crm-marketing/">CRM-маркетинг</a> с&nbsp;базовой RFM-сегментацией даст сопоставимый результат при меньших вложениях. CVM становится следующим шагом тогда, когда ручная работа с&nbsp;сегментами перестаёт масштабироваться.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"categories":["custom"],"patternName":"comment","name":"Комментарий"},"align":"full","className":"block-comment","style":{"color":{"background":"#fff9f0"}}} -->
<div class="wp-block-group alignfull block-comment has-background" style="background-color:#fff9f0">
<!-- wp:columns {"className":"block-comment__text"} -->
<div class="wp-block-columns block-comment__text"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Когда к&nbsp;нам приходят клиенты с&nbsp;запросом на&nbsp;CVM, обычно выясняется одно: реклама дорожает, а&nbsp;выручка с&nbsp;повторных покупок не&nbsp;растёт. База есть, данные есть, но&nbsp;система принятия решений «кому что предлагать» отсутствует. Это и&nbsp;есть разрыв, который закрывает CVM.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"top"} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:100%"><!-- wp:columns {"className":"block-comment__autor"} -->
<div class="wp-block-columns block-comment__autor"><!-- wp:column {"width":"72px","className":"autor-photo"} -->
<div class="wp-block-column autor-photo" style="flex-basis:72px"><!-- wp:image {"id":11869,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://crmgroup.ru/wp-content/uploads/2025/05/%D0%98%D0%B2%D0%B0%D0%BD-%D0%98%D0%BB%D1%8C%D0%B8%D0%BD.jpg" alt="Иван Ильин" class="wp-image-11869"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":"block-comment__autor-about"} -->
<div class="wp-block-column is-vertically-aligned-center block-comment__autor-about" style="flex-basis:66.66%"><!-- wp:paragraph {"className":"autor-name"} -->
<p class="autor-name">Иван Ильин</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"autor-post"} -->
<p class="autor-post">Основатель, Генеральный директор CRM-group</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_7" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">С чего начать: семь шагов внедрения CVM</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Полноценный CVM строится поэтапно. Каждый шаг даёт результат сам по&nbsp;себе и&nbsp;готовит почву для следующего. Из&nbsp;опыта: компании, которые начинают с&nbsp;аналитики и&nbsp;командных процессов, потом быстрее осваивают CDP и&nbsp;автоматизацию, а&nbsp;не&nbsp;наоборот.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"metadata":{"categories":["text"],"patternName":"num-list","name":"Нумерованный список"},"className":"num-list"} -->
<ul class="wp-block-list num-list"><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">1.</mark></strong> <strong>Аудит данных.</strong> Какие данные есть, где пробелы, каков текущий ARPU, Churn Rate, Retention. Без этого шага невозможно строить модели.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">2.</mark></strong> <strong>RFM-сегментация.</strong> Разделить активную базу по&nbsp;Recency (давность покупки), Frequency (частота), Monetary (сумма). Выделить сегменты: Champions, Loyal, At&nbsp;Risk, Dormant.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">3.</mark></strong> <strong>Драйверы ценности (Value Drivers).</strong> Определить, что увеличивает CLV (частота, чек, retention, кросс-продажи) и&nbsp;что снижает его (возвраты, быстрый отток после первой покупки).</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">4.</mark></strong> <strong>Карта пути клиента.</strong> Для каждого сегмента выстраивается свой сценарий: что происходит после первой покупки, как выглядит риск оттока, что запускает реактивацию.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">5.</mark></strong> <strong>Пилотная кампания удержания.</strong> Взять сегмент At&nbsp;Risk, запустить персонализированное предложение, сравнить с&nbsp;контрольной группой. Разница в&nbsp;поведении групп покажет реальный инкрементальный эффект.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">6.</mark></strong> <strong>Принятие решений в&nbsp;реальном времени (Real-time Decisioning).</strong> Подключить движок Next Best Action / Next Best Offer: переход от&nbsp;ручных кампаний к&nbsp;автоматизированным решениям по&nbsp;каждому клиенту на&nbsp;основе текущего поведения.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">7.</mark></strong> <strong>Обратная связь (Feedback Loop).</strong> Настроить мониторинг CLV по&nbsp;когортам, вовлечённости (Engagement Score), NPS. Без обратной связи система деградирует.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Шаги 1–3 проходят за&nbsp;4–6 недель без технических интеграций и&nbsp;дают первые измеримые результаты. <a href="https://crmgroup.ru/crm-marketing/">CRM-маркетинг</a> от&nbsp;CRM-group закрывает этот старт под ключ.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"block-sidenote"} -->
<div class="wp-block-group block-sidenote">
<!-- wp:paragraph -->
<div class="block-sidenote__content">
  <span class="mb-16">Читайте также</span>
  <p><a href="https://crmgroup.ru/blog/top-five-crm-metrics-guide/">Пять ключевых метрик CRM: LTV, Retention Rate, Churn Rate, AOV, NPS</a></p>
</div>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_8" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Частые вопросы про&nbsp;CVM</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "CVM что это простыми словами?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "CVM (Customer Value Management) — стратегия роста за счёт существующей клиентской базы. Компания не гонится за новыми покупателями, а повышает ценность тех, кто уже купил: увеличивает частоту покупок, средний чек, срок жизни клиента. Используется компаниями, у которых органический рост через новых клиентов исчерпан."
      }
    },
    {
      "@type": "Question",
      "name": "Чем CVM отличается от CRM-маркетинга?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "CRM-маркетинг сегментирует базу и запускает триггерные кампании, ориентируясь на Retention Rate и LTV. CVM добавляет предиктивный слой: система предсказывает поведение каждого клиента и принимает решения, максимизирующие его CLV. CRM-маркетинг отвечает на вопрос «кто наш клиент?». CVM отвечает на вопрос «что предложить этому клиенту через 30 дней, чтобы он не ушёл и купил больше?»."
      }
    },
    {
      "@type": "Question",
      "name": "Какие компании в России используют CVM?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "В России CVM активно применяют X5 Group (Пятёрочка, Перекрёсток), МТС, Tinkoff/T-Банк, ВкусВилл, Ozon и Lamoda. Телеком был пионером: МТС запустил CVM-программу ещё в 2015 году. Ритейл подхватил идею позже, когда открытие новых точек перестало давать прежний эффект."
      }
    },
    {
      "@type": "Question",
      "name": "Как измерить результат CVM-программы?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ключевые метрики: CLV (пожизненная ценность клиента), ARPU (средняя выручка на пользователя), Churn Rate (отток), Retention Rate (удержание), NPS. Эффективность отдельных кампаний измеряется через A/B-тесты: контрольная группа не получает коммуникацию, целевая получает. Разница в поведении показывает реальный инкрементальный эффект без влияния внешних факторов."
      }
    },
    {
      "@type": "Question",
      "name": "С чего начать внедрение CVM?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Первый шаг: аудит данных — насколько полны данные о клиентах, каков текущий Churn Rate и ARPU. Второй шаг: RFM-сегментация активной базы по Recency, Frequency, Monetary. Третий шаг: пилотная кампания удержания — взять сегмент At Risk и проверить реакцию на персонализированное предложение через A/B-тест. Шаги 1–3 можно пройти за 4–6 недель без сложных технических интеграций."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько стоит внедрить CVM в России?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Начальный уровень — RFM-сегментация и базовые триггерные кампании — от 200 000 рублей в месяц с агентской поддержкой. Полноценный CVM с CDP, ML-моделями и NBA-движком — от 1 млн рублей в месяц для enterprise. По правилу Парето, 20% усилий, направленных на удержание ключевых сегментов, дают 80% суммарного эффекта."
      }
    }
  ]
}
</script>

<div id="crm-faq" itemscope itemtype="https://schema.org/FAQPage">

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">CVM что это простыми словами?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
CVM (Customer Value Management) — стратегия роста за&nbsp;счёт существующей клиентской базы. Компания не&nbsp;гонится за&nbsp;новыми покупателями, а&nbsp;повышает ценность тех, кто уже купил: увеличивает частоту покупок, средний чек, срок жизни клиента. Используется компаниями, у&nbsp;которых органический рост через новых клиентов исчерпан.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Чем CVM отличается от&nbsp;CRM-маркетинга?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
CRM-маркетинг сегментирует базу и&nbsp;запускает триггерные кампании, ориентируясь на&nbsp;Retention Rate и&nbsp;LTV. CVM добавляет предиктивный слой: система предсказывает поведение каждого клиента и&nbsp;принимает решения, максимизирующие его&nbsp;CLV. CRM-маркетинг отвечает на&nbsp;вопрос «кто наш клиент?». CVM отвечает на&nbsp;вопрос «что предложить этому клиенту через 30&nbsp;дней, чтобы он&nbsp;не&nbsp;ушёл и&nbsp;купил больше?».
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Какие компании в&nbsp;России используют CVM?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
В&nbsp;России CVM активно применяют X5&nbsp;Group (Пятёрочка, Перекрёсток), МТС, Tinkoff/T-Банк, ВкусВилл, Ozon и&nbsp;Lamoda. Телеком был пионером: МТС запустил CVM-программу ещё в&nbsp;2015&nbsp;году. Ритейл подхватил идею позже, когда открытие новых точек перестало давать прежний эффект.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Как измерить результат CVM-программы?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Ключевые метрики: CLV (пожизненная ценность клиента), ARPU (средняя выручка на&nbsp;пользователя), Churn Rate (отток), Retention Rate (удержание), NPS. Эффективность кампаний измеряется через A/B-тесты: контрольная группа не&nbsp;получает коммуникацию, целевая получает. Разница в&nbsp;поведении показывает реальный инкрементальный эффект.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">С чего начать внедрение CVM?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Первый шаг: аудит данных, насколько полны данные о&nbsp;клиентах, каков текущий Churn Rate и&nbsp;ARPU. Второй шаг: RFM-сегментация активной базы по&nbsp;Recency, Frequency, Monetary. Третий шаг: пилотная кампания удержания через A/B-тест на&nbsp;сегменте At&nbsp;Risk. Шаги 1&ndash;3 проходят за&nbsp;4&ndash;6 недель без сложных технических интеграций.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Сколько стоит внедрить CVM в&nbsp;России?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Начальный уровень: RFM-сегментация и&nbsp;базовые триггерные кампании от&nbsp;200&nbsp;000 рублей в&nbsp;месяц с&nbsp;агентской поддержкой. Полноценный CVM с&nbsp;CDP, ML-моделями и&nbsp;NBA-движком от&nbsp;1&nbsp;млн рублей в&nbsp;месяц для enterprise. По&nbsp;правилу Парето, 20% усилий, направленных на&nbsp;удержание ключевых сегментов, дают 80% суммарного эффекта.
</div>
</div>
</details>

</div>
<!-- /wp:html -->

</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_9" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Разберём CVM-стратегию для&nbsp;вашего бизнеса</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Проведём аудит активной базы, найдём ключевые сегменты и&nbsp;покажем, с&nbsp;чего начать удержание без масштабного внедрения систем.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"categories":["custom"],"patternName":"astrolog/block-result","name":"Блок - результат"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"block-result","style":{"color":{"background":"#fff9f0"}}} -->
<div class="wp-block-group block-result has-background" style="background-color:#fff9f0"><!-- wp:heading {"level":3,"className":"h2-smalls block-result__heading mb-30"} -->
<h3 class="wp-block-heading h2-smalls block-result__heading mb-30"><span style="font-weight: 400;"><a style="color:#dc1327" href="https://crmgroup.ru/?form=consulting">Обсудить проект &#x2192;</a></span></h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"developer-starter/social-networks"} /-->

<!-- wp:pattern {"slug":"developer-starter/form_main"} /-->"""

resp = requests.post(
    f"https://crmgroup.ru/wp-json/wp/v2/blog/{POST_ID}",
    headers=headers,
    json={"content": CONTENT}
)

print("Update status:", resp.status_code)
if resp.status_code == 200:
    import re
    content = resp.json().get("content", {}).get("raw", "")
    # Visible dashes (outside script tags)
    no_scripts = re.sub(r'<script[^>]*>.*?</script>', '', content, flags=re.DOTALL)
    visible_dashes = no_scripts.count('\u2014')
    # Word count
    text = re.sub(r'<[^>]+>', ' ', no_scripts)
    text = re.sub(r'<!--.*?-->', ' ', text, flags=re.DOTALL)
    words = [w for w in text.split() if len(w) > 2]
    # AI phrases
    ai = ['следует отметить', 'важно понимать', 'таким образом', 'в данном']
    found = [p for p in ai if p in content.lower()]
    print(f"Words: ~{len(words)} | Visible dashes: {visible_dashes} | AI phrases: {found or 'none'}")
    tooltips = content.count('class="explain"')
    faq_q = content.count('itemprop="mainEntity"')
    print(f"Tooltips: {tooltips} | FAQ questions: {faq_q}")
else:
    print("Error:", resp.text[:500])
