#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# Updates post 12845 with dash-fixed content (max 4 em-dashes in body)
import requests
import base64
import json

USER = "ekaterina.shapochkina@crmgroup.ru"
PASS = "Sx960tbW8UvlzXBr3z1kvC3m"
auth = base64.b64encode(f"{USER}:{PASS}".encode()).decode()
headers = {
    "Authorization": f"Basic {auth}",
    "Content-Type": "application/json"
}

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
.explain-card{display:none;position:absolute;left:0;top:calc(100% + 6px);z-index:100;background:#fff;border:1px solid #e4e2dc;border-radius:10px;padding:14px 16px;width:280px;font-size:13.5px;line-height:1.55;color:#1a1a1a;box-shadow:0 4px 20px rgba(0,0,0,.12);pointer-events:none}
.explain:hover .explain-card,.explain:focus-within .explain-card{display:block}
</style>
<details class="mobile-toc">
  <summary>Содержание статьи</summary>
  <ul class="mobile-toc-list">
    <li><a href="#anchor_1">Что такое CVM в&nbsp;маркетинге</a></li>
    <li><a href="#anchor_2">Откуда появился термин</a></li>
    <li><a href="#anchor_3">CVM, CRM и&nbsp;email: в&nbsp;чём разница</a></li>
    <li><a href="#anchor_4">Как работает CVM</a></li>
    <li><a href="#anchor_5">Кейсы и&nbsp;цифры</a></li>
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

<!-- wp:acf/block-content-list {"id":"block_cvm_v1","name":"acf/block-content-list","data":{"block_content_list_0_item_name":"Что такое CVM в маркетинге","_block_content_list_0_item_name":"field_637770016695b","block_content_list_1_item_name":"Откуда появился термин Customer Value Management","_block_content_list_1_item_name":"field_637770016695b","block_content_list_2_item_name":"Чем CVM отличается от CRM и email-маркетинга","_block_content_list_2_item_name":"field_637770016695b","block_content_list_3_item_name":"Как работает CVM: пять ключевых блоков","_block_content_list_3_item_name":"field_637770016695b","block_content_list_4_item_name":"Кейсы: что даёт CVM на практике","_block_content_list_4_item_name":"field_637770016695b","block_content_list_5_item_name":"Когда компаниям нужен CVM","_block_content_list_5_item_name":"field_637770016695b","block_content_list_6_item_name":"С чего начать: семь шагов внедрения","_block_content_list_6_item_name":"field_637770016695b","block_content_list_7_item_name":"Частые вопросы про CVM","_block_content_list_7_item_name":"field_637770016695b","block_content_list":8,"_block_content_list":"field_6377700160517"},"align":"","mode":"edit"} /-->

<!-- wp:paragraph {"className":"is-lead"} -->
<p class="wp-block-paragraph is-lead">Стоимость привлечения нового клиента росла последние пять лет быстрее выручки большинства компаний: по&nbsp;данным McKinsey, CAC увеличился на&nbsp;50&ndash;70%. Именно поэтому бизнес переходит от&nbsp;погони за&nbsp;новыми покупателями к&nbsp;работе с&nbsp;теми, кто уже купил. CVM (Customer Value Management) &mdash; это стратегия, которая превращает клиентскую базу в&nbsp;управляемый актив. Компания не&nbsp;просто хранит данные, а&nbsp;решает, что предложить каждому покупателю, чтобы он&nbsp;оставался дольше и&nbsp;тратил больше.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_1" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Что такое CVM в&nbsp;маркетинге</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>CVM расшифровывается как Customer Value Management, управление ценностью клиента. Это подход, при котором компания управляет всеми взаимодействиями с&nbsp;покупателем ради роста его&nbsp;<span class="explain">пожизненной ценности<span class="explain-card"><strong>CLV / Customer Lifetime Value</strong>Суммарная выручка, которую компания получает от&nbsp;одного клиента за&nbsp;всё время отношений. Формула: CLV = средний чек &times; частота покупок &times; срок жизни клиента &times; маржа. По&nbsp;данным Bain &amp;&nbsp;Company, рост CLV на&nbsp;5% увеличивает прибыль бизнеса на&nbsp;25&ndash;95%.</span></span> (CLV). Цель не&nbsp;в&nbsp;том, чтобы продать прямо сейчас. Цель CVM: построить отношения, при которых клиент покупает долго и&nbsp;много.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>CVM работает в&nbsp;трёх направлениях. Первое: удержание, то&nbsp;есть снижение оттока через проактивные кампании до&nbsp;того, как покупатель охладел к&nbsp;бренду. Второе: развитие за&nbsp;счёт роста среднего чека через апсейл и&nbsp;кросс-продажи по&nbsp;поведенческим данным. Третье: реактивация — возврат «спящих» клиентов с&nbsp;персонализированным предложением.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ключевое отличие от&nbsp;обычного маркетинга: CVM принимает решения не&nbsp;по&nbsp;интуиции, а&nbsp;по&nbsp;данным. Система предсказывает, кто готов к&nbsp;апсейлу, кто скоро уйдёт, а&nbsp;кого можно вернуть акцией. Это превращает базу из&nbsp;таблицы с&nbsp;контактами в&nbsp;инструмент управляемого роста.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_2" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Откуда появился термин Customer Value Management</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Управление ценностью клиента прошло через четыре эпохи, прежде чем оформилось в&nbsp;отдельную дисциплину. В&nbsp;1990-е компании освоили email-рассылки: одинаковые для всех, без сегментации. В&nbsp;2000-е Gartner ввёл термин CRM: появилась история взаимодействий с&nbsp;клиентом, но&nbsp;стратегия работы с&nbsp;базой оставалась реактивной. В&nbsp;2010-е автоматизация маркетинга позволила настраивать персонализированные цепочки, но&nbsp;данные по-прежнему хранились разрознено по&nbsp;системам.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>С&nbsp;2008 по&nbsp;2012&nbsp;год McKinsey, PwC Strategy&amp; и&nbsp;Simon-Kucher опубликовали первые фреймворки управления ценностью клиента как самостоятельной стратегии. Телекоммуникационная отрасль стала пионером: операторы первыми осознали, что привлечение нового абонента обходится в&nbsp;5&ndash;7 раз дороже удержания существующего (данные Bain &amp;&nbsp;Company). CVM дал инструмент для системного снижения оттока не&nbsp;точечными акциями, а&nbsp;предиктивными программами по&nbsp;всей базе.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>McKinsey описал CVM как систему, которая превращает данные о&nbsp;клиентах в&nbsp;персонализированные действия, повышающие их&nbsp;пожизненную ценность. PwC Strategy&amp; добавил операционную сторону: для работы нужны единая клиентская база, модель предсказания оттока и&nbsp;процессы принятия решений. Без третьего компонента CVM превращается в&nbsp;продвинутую рассылку.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>К&nbsp;2020-м годам рост CAC сделал CVM мейнстримом за&nbsp;пределами телекома. По&nbsp;данным McKinsey, стоимость привлечения клиента выросла на&nbsp;50&ndash;70% за&nbsp;пять лет. Компании, которые раньше закрывали отток новыми покупателями, обнаружили: экономика не&nbsp;сходится. Работа с&nbsp;существующей базой стала не&nbsp;опцией, а&nbsp;необходимостью.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_3" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Чем CVM отличается от&nbsp;CRM и&nbsp;email-маркетинга</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Частая путаница: CRM &mdash; это инструмент хранения данных о&nbsp;клиентах, CVM &mdash; стратегия работы с&nbsp;их&nbsp;ценностью. Email-маркетинг служит одним из&nbsp;каналов коммуникации. Три подхода не&nbsp;конкурируют, а&nbsp;выстраиваются в&nbsp;иерархию. Сравним по&nbsp;ключевым параметрам:</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"is-style-stripes"} -->
<figure class="wp-block-table is-style-stripes"><table><thead><tr><th>Параметр</th><th>Email-маркетинг</th><th>CRM</th><th>CVM</th></tr></thead><tbody><tr><td>Фокус</td><td>Охват и клики</td><td>История взаимодействий</td><td>Рост CLV каждого клиента</td></tr><tr><td>Ключевая метрика</td><td>Open Rate, CTR</td><td>Кол-во сделок, Pipeline</td><td>CLV, ARPU, Churn Rate</td></tr><tr><td>Персонализация</td><td>Имя в письме</td><td>Сегменты по тегам</td><td>Поведенческая + предиктивная</td></tr><tr><td>Горизонт</td><td>Одна кампания</td><td>Стадия воронки</td><td>Полный жизненный цикл</td></tr><tr><td>ROI</td><td>$36 на $1 (DMA, 2023)</td><td>$8.71 на $1 (Nucleus Research)</td><td>+15–25% CLV (McKinsey)</td></tr><tr><td>Старт</td><td>С первого дня</td><td>От 5 продавцов</td><td>База от 10 000 клиентов</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>CRM отвечает на&nbsp;вопрос «кто наш клиент и&nbsp;что он&nbsp;делал?». CVM отвечает на&nbsp;вопрос «что предложить этому клиенту, чтобы он&nbsp;остался и&nbsp;тратил больше?». Это разные уровни зрелости работы с&nbsp;базой.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>По&nbsp;данным Salesforce (2023), компании, внедрившие CVM-подход поверх существующей CRM-системы, фиксируют рост продаж на&nbsp;29% и&nbsp;рост продуктивности команды на&nbsp;34%. CRM остаётся инфраструктурой, CVM служит стратегией поверх неё.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_4" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Как работает CVM: пять ключевых блоков</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Simon-Kucher в&nbsp;исследовании 2024&nbsp;года выделяет пять строительных блоков, без которых CVM-программа не&nbsp;работает на&nbsp;полную мощность. Первый блок: единая клиентская база. Транзакции, поведение на&nbsp;сайте, обращения в&nbsp;поддержку, история каналов — всё в&nbsp;одном месте. Для этого компании используют <span class="explain">CDP<span class="explain-card"><strong>Customer Data Platform (CDP)</strong>Платформа для объединения данных о&nbsp;клиенте из&nbsp;всех источников: сайт, приложение, офлайн-точки, колл-центр. Отличается от&nbsp;CRM тем, что работает с&nbsp;анонимными данными и&nbsp;объединяет онлайн- и&nbsp;офлайн-поведение. Рынок CDP вырастет с&nbsp;$5,4 млрд в&nbsp;2025&nbsp;г. до&nbsp;$11,8 млрд к&nbsp;2028&nbsp;г. (MarketsandMarkets).</span></span>, платформу клиентских данных, которая подтягивает информацию из&nbsp;разрозненных систем в&nbsp;единый профиль.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Второй блок: AI-аналитика. Модели предсказания оттока, следующей покупки, склонности к&nbsp;апсейлу. Без предиктивного слоя CVM работает реактивно: компания реагирует на&nbsp;ушедших клиентов, а&nbsp;не&nbsp;предотвращает их&nbsp;уход. Третий блок: проактивные триггеры. Автоматические кампании запускаются по&nbsp;событиям — первая покупка, 30&nbsp;дней без активности, снижение частоты заказов.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Четвёртый блок: governance, то&nbsp;есть процессы принятия решений. Кто отвечает за&nbsp;сегменты и&nbsp;бюджеты? Как избежать пересечения кампаний для одного клиента? Без внутреннего регламента разные команды запускают конкурирующие коммуникации к&nbsp;одному покупателю. Пятый блок: CVM-дашборд с&nbsp;единой системой метрик: CLV по&nbsp;когортам, win-rate кампаний удержания, динамика ARPU. Без мониторинга невозможно понять, что работает, а&nbsp;что нет.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_5" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Кейсы: что даёт CVM на&nbsp;практике</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Телеком был первой отраслью, где CVM прошёл масштабную проверку боем. Кейсы из&nbsp;исследования Simon-Kucher (2024) показывают конкретные результаты, а&nbsp;не&nbsp;оценки.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list">
<li>Британский оператор запустил CVM-программу с&nbsp;предиктивной моделью <span class="explain">оттока<span class="explain-card"><strong>Churn Rate (отток клиентов)</strong>Доля покупателей, прекративших пользоваться продуктом или услугой за&nbsp;период. Churn 3% в&nbsp;месяц означает потерю трети базы за&nbsp;год. Снижение churn на&nbsp;5 п.п. увеличивает прибыль на&nbsp;25&ndash;95% (Bain &amp;&nbsp;Company).</span></span>. За&nbsp;год отток в&nbsp;сегменте «группы риска» снизился более чем на&nbsp;50%.</li>
<li>Другой британский оператор с&nbsp;помощью CVM-кампаний в&nbsp;период продления контрактов разблокировал &euro;45&nbsp;млн дополнительной выручки в&nbsp;год.</li>
<li>Голландский оператор поднял ARPU на&nbsp;5% за&nbsp;счёт персонализированных предложений при продлении тарифа.</li>
<li>Региональный банк провёл CVM-тест: 78% клиентов предпочли персонализированное предложение стандартному.</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>McKinsey в&nbsp;исследовании data-driven CVM зафиксировал средний рост CLV на&nbsp;25% при полноценном внедрении. Ключевое условие: персонализация должна работать на&nbsp;уровне NBA/NBO (Next Best Action / Next Best Offer) на&nbsp;основе поведенческих данных, а&nbsp;не&nbsp;просто имени в&nbsp;теме письма. По&nbsp;данным McKinsey (2021), 71% покупателей ожидают персонализированного взаимодействия, и&nbsp;76% раздражаются, когда его&nbsp;нет.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="anchor_6" class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Когда компаниям нужен CVM</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>CVM становится оправданным, если выполняются хотя бы три из&nbsp;пяти условий ниже. При меньшем количестве сигналов достаточно <a href="https://crmgroup.ru/crm-marketing/">CRM-маркетинга</a> с&nbsp;базовой сегментацией.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list">
<li>Активная клиентская база превышает 10&nbsp;000 покупателей.</li>
<li>CAC растёт быстрее выручки два квартала подряд.</li>
<li>Ежегодный отток превышает 15&ndash;20%.</li>
<li>Повторные покупки составляют менее 30% выручки.</li>
<li>Компания накопила 12 и&nbsp;более месяцев транзакционных данных.</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Для малого бизнеса с&nbsp;базой до&nbsp;5&nbsp;000 клиентов CVM избыточен: стоимость внедрения не&nbsp;окупится. CVM целесообразен тогда, когда ручная работа с&nbsp;сегментами перестаёт масштабироваться и&nbsp;требует автоматизации принятия решений на&nbsp;уровне каждого покупателя.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"categories":["custom"],"patternName":"comment","name":"Комментарий"},"align":"full","className":"block-comment","style":{"color":{"background":"#fff9f0"}}} -->
<div class="wp-block-group alignfull block-comment has-background" style="background-color:#fff9f0">
<!-- wp:columns {"className":"block-comment__text"} -->
<div class="wp-block-columns block-comment__text"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>На&nbsp;практике компании начинают думать о&nbsp;CVM, когда замечают: реклама дорожает, а&nbsp;выручка с&nbsp;повторных покупок не&nbsp;растёт. Это сигнал, что база не&nbsp;работает. CVM это не&nbsp;технология, это решение навести порядок в&nbsp;отношениях с&nbsp;клиентами: понять, кто ценный, кто уходит, кто ещё не&nbsp;раскрыл потенциал.</p>
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
<p>Полноценный CVM строится поэтапно. Каждый шаг даёт результат сам по&nbsp;себе и&nbsp;создаёт основу для следующего. Пропускать первые шаги ради быстрой покупки CDP типичная ошибка: без данных любая платформа бесполезна.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"metadata":{"categories":["text"],"patternName":"num-list","name":"Нумерованный список"},"className":"num-list"} -->
<ul class="wp-block-list num-list"><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">1.</mark></strong> <strong>Аудит данных.</strong> Какие данные есть, где пробелы, каков текущий ARPU, Churn Rate, Retention. Без этого шага невозможно строить модели и&nbsp;сегменты.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">2.</mark></strong> <strong>RFM-сегментация.</strong> Разделить базу по&nbsp;Recency (давность покупки), Frequency (частота), Monetary (сумма). Выделить сегменты: Champions, Loyal, At&nbsp;Risk, Dormant. Это первичное понимание структуры без сложных инструментов.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">3.</mark></strong> <strong>Value Drivers.</strong> Определить, что увеличивает CLV (частота, чек, retention, кросс-продажи) и&nbsp;что снижает его&nbsp;(возвраты, быстрый отток после первой покупки).</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">4.</mark></strong> <strong>Карта пути клиента.</strong> Для каждого сегмента выстраивается свой сценарий: что происходит после первой покупки, как выглядит риск оттока, что запускает реактивацию.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">5.</mark></strong> <strong>Пилотная кампания удержания.</strong> Взять сегмент At&nbsp;Risk, запустить персонализированное предложение, сравнить с&nbsp;контрольной группой. Разница в&nbsp;поведении групп покажет реальный инкрементальный эффект до&nbsp;масштабирования.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">6.</mark></strong> <strong>Real-time Decisioning.</strong> Подключить NBA/NBO-движок, систему рекомендаций следующего лучшего действия. На&nbsp;этом шаге CVM переходит от&nbsp;ручных кампаний к&nbsp;автоматизированным решениям по&nbsp;каждому клиенту.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">7.</mark></strong> <strong>Feedback Loop.</strong> Настроить мониторинг CLV по&nbsp;когортам, Engagement Score, NPS. Без обратной связи система перестаёт обучаться и&nbsp;постепенно деградирует.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Если задача кажется масштабной, начните с&nbsp;шагов 1&ndash;3 без глубокой технической интеграции. <a href="https://crmgroup.ru/crm-marketing/">CRM-маркетинг под ключ</a> от&nbsp;CRM-group позволяет пройти первые три шага за&nbsp;4&ndash;6 недель и&nbsp;получить первые результаты до&nbsp;масштабного внедрения систем. Главное: не&nbsp;ждать идеальных данных, лучше запустить RFM-сегментацию на&nbsp;том, что есть, и&nbsp;итерировать.</p>
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
        "text": "CVM (Customer Value Management) — это система работы с клиентской базой, при которой компания не просто хранит контакты, а управляет ценностью каждого покупателя. Цель: сделать так, чтобы клиент покупал дольше и больше. Система предсказывает, кто готов к апсейлу, кто рискует уйти, а кому нужна реактивирующая акция."
      }
    },
    {
      "@type": "Question",
      "name": "Чем CVM отличается от CRM?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "CRM — это программное обеспечение для хранения данных о клиентах и истории взаимодействий. CVM — стратегия максимизации пожизненной ценности клиента. CRM отвечает на вопрос «кто наш клиент и что он делал?». CVM отвечает на вопрос «что предложить этому клиенту, чтобы он остался и тратил больше?». CRM служит инструментом внутри CVM-стратегии."
      }
    },
    {
      "@type": "Question",
      "name": "Какие компании используют CVM?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Первопроходцами стали телекоммуникационные компании: Vodafone, МТС, Tele2. Затем CVM освоили банки (Тинькофф, Сбер, Альфа-Банк) и крупный e-commerce (Ozon, Wildberries, Lamoda). Сегодня CVM-программы внедряют ритейл, страхование и SaaS-компании с подписной моделью. Порог входа снизился: облачные CDP и AI-инструменты сделали CVM доступным не только для крупных корпораций."
      }
    },
    {
      "@type": "Question",
      "name": "Как измерить результат CVM-программы?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ключевые метрики CVM: CLV (пожизненная ценность клиента), ARPU (средняя выручка на пользователя), Churn Rate (отток), Retention Rate (удержание) и NPS. Эффективность кампаний измеряется через A/B-тесты: контрольная группа не получает коммуникацию, целевая получает. Разница в поведении групп показывает реальный инкрементальный эффект без влияния внешних факторов."
      }
    },
    {
      "@type": "Question",
      "name": "С чего начать внедрение CVM?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Первый шаг: аудит данных, насколько полны и актуальны данные о клиентах. Второй шаг: RFM-сегментация базы по Recency, Frequency, Monetary. Это даёт первичное понимание структуры без сложных инструментов. Третий шаг: пилотная кампания удержания — взять сегмент At Risk и проверить, реагирует ли он на персонализированное предложение лучше, чем контрольная группа без коммуникации."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько стоит внедрить CVM?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Стоимость зависит от масштаба и зрелости данных. Начальный уровень: RFM-сегментация и базовые триггерные кампании от $2 000 в месяц с агентской поддержкой. Полноценный CVM с CDP, ML-моделями и real-time decisioning от $10 000 в месяц для enterprise. По правилу Парето в CRM, 20% усилий, направленных на удержание ключевых сегментов, дают 80% суммарного эффекта."
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
CVM (Customer Value Management) — это система работы с&nbsp;клиентской базой, при которой компания не&nbsp;просто хранит контакты, а&nbsp;управляет ценностью каждого покупателя. Цель: сделать так, чтобы клиент покупал дольше и&nbsp;больше. Система предсказывает, кто готов к&nbsp;апсейлу, кто рискует уйти, а&nbsp;кому нужна реактивирующая акция.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Чем CVM отличается от&nbsp;CRM?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
CRM это программное обеспечение для хранения данных о&nbsp;клиентах и&nbsp;истории взаимодействий. CVM это стратегия максимизации пожизненной ценности клиента. CRM отвечает на&nbsp;вопрос «кто наш клиент и&nbsp;что он&nbsp;делал?». CVM отвечает на&nbsp;вопрос «что предложить этому клиенту, чтобы он&nbsp;остался и&nbsp;тратил больше?». CRM служит инструментом внутри CVM-стратегии.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Какие компании используют CVM?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Первопроходцами стали телекоммуникационные компании: Vodafone, МТС, Tele2. Затем CVM освоили банки (Тинькофф, Сбер, Альфа-Банк) и&nbsp;крупный e-commerce (Ozon, Wildberries, Lamoda). Сегодня CVM-программы внедряют ритейл, страхование и&nbsp;SaaS-компании с&nbsp;подписной моделью. Порог входа снизился: облачные CDP и&nbsp;AI-инструменты сделали CVM доступным не&nbsp;только для крупных корпораций.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Как измерить результат CVM-программы?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Ключевые метрики CVM: CLV (пожизненная ценность клиента), ARPU (средняя выручка на&nbsp;пользователя), Churn Rate (отток), Retention Rate (удержание) и&nbsp;NPS. Эффективность кампаний измеряется через A/B-тесты: контрольная группа не&nbsp;получает коммуникацию, целевая получает. Разница в&nbsp;поведении групп показывает реальный инкрементальный эффект без влияния внешних факторов.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">С чего начать внедрение CVM?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Первый шаг: аудит данных, насколько полны и&nbsp;актуальны данные о&nbsp;клиентах. Второй шаг: RFM-сегментация базы по&nbsp;Recency, Frequency, Monetary. Это даёт первичное понимание структуры базы без сложных инструментов. Третий шаг: пилотная кампания удержания. Взять сегмент At&nbsp;Risk и&nbsp;проверить, реагирует ли он&nbsp;на&nbsp;персонализированное предложение лучше, чем контрольная группа без коммуникации.
</div>
</div>
</details>

<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
<summary itemprop="name">Сколько стоит внедрить CVM?</summary>
<div class="fb" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
<div itemprop="text">
Стоимость зависит от&nbsp;масштаба и&nbsp;зрелости данных. Начальный уровень: RFM-сегментация и&nbsp;базовые триггерные кампании от&nbsp;$2&nbsp;000 в&nbsp;месяц с&nbsp;агентской поддержкой. Полноценный CVM с&nbsp;CDP, ML-моделями и&nbsp;real-time decisioning от&nbsp;$10&nbsp;000 в&nbsp;месяц для enterprise. По&nbsp;правилу Парето в&nbsp;CRM, 20% усилий, направленных на&nbsp;удержание ключевых сегментов, дают 80% суммарного эффекта.
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
<p>Проведём аудит клиентской базы, найдём ключевые сегменты и&nbsp;покажем, с&nbsp;чего начать удержание без масштабного внедрения систем.</p>
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

# Update the post
resp = requests.post(
    f"https://crmgroup.ru/wp-json/wp/v2/blog/{POST_ID}",
    headers=headers,
    json={"content": CONTENT}
)

print("Update status:", resp.status_code)
if resp.status_code == 200:
    result = resp.json()
    content = result.get("content", {}).get("raw", "")
    dashes = content.count('\u2014')
    print(f"Em-dashes in updated content: {dashes}")
    print("Post ID:", result.get("id"))
    print("Status:", result.get("status"))
else:
    print("Error:", resp.text[:1000])
