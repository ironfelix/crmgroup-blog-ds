<?php
    add_filter('body_class', 'class_names');
    function class_names($classes) {
        $classes[] = 'is_black_page';
        
        return $classes;
    }
    
    get_header();
?>
<main id="services" class="page">
    <div class="container">
        <section class="page-top">
            <div class="page-top__content">
                <h1 class="main-heading">
                    <?php the_title(); ?>
                </h1>
            </div>
        </section>
        <section class='services-container'>
            <div class="service-block crm-marketing" onclick="window.open('https://crmgroup.ru/crm-marketing/');">
                <h2 class="service-block__heading"> CRM-маркетинг</h2>
                <p class="service-block__desc">
                    Построим персональные коммуникации с&nbsp;тысячами клиентов в&nbsp;разных каналах. Увеличим выручку и&nbsp;лояльность на&nbsp;основе клиентских данных.
                </p>
                <a class="service-block__link" href="https://crmgroup.ru/crm-marketing/" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block ux-audit" onclick="window.open('https://crmgroup.ru/email-marketing-pod-klyuch/');">
                <h2 class="service-block__heading"> Email-маркетинг</h2>
                <p class="service-block__desc">Настроим промо- и&nbsp;триггерные рассылки под ключ. Вырастим базу подписчиков и&nbsp;увеличим количество покупок с&nbsp;email-рассылок.</p>
                <a class="service-block__link" href="https://crmgroup.ru/email-marketing-pod-klyuch/" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block analytics" onclick="window.open('https://crmgroup.ru/telegram-chatbot');">
                <h2 class="service-block__heading"> Мессенджер-маркетинг</h2>
                <p class="service-block__desc">Найдём точки роста сайтов и&nbsp;сервисов. Увеличим конверсию и&nbsp;улучшим пользовательский опыт.</p>
                <a class="service-block__link" href="https://crmgroup.ru/telegram-chatbot" target="_blank">Подробнее про услугу</a>
            </div>
            <!--            <div class="service-block email-marketing" onclick="window.open('https://crmgroup.ru/ux-audit/');">
                            <h2 class="service-block__heading"> UX-аудит</h2>
                            <p class="service-block__desc">Запустим рассылки в&nbsp;мессенджерах, настроим и&nbsp;внедрим чат-боты. Организуем оперативную поддержку клиентов и&nbsp;поможем получить больше лидов.</p>
                            <a class="service-block__link" href="https://crmgroup.ru/ux-audit/" target="_blank">Подробнее про услугу</a>
                        </div>-->
            <div class="service-block messenger-marketing" onclick="window.open('https://emailsoldiers.ru/uslugi/business-analytics?roistat_visit=190845');">
                <h2 class="service-block__heading"> Аналитика для бизнеса</h2>
                <p class="service-block__desc">Профессионально обработаем данные и&nbsp;составим автоматизированные дашборды. Найдём возможности для роста бизнеса на&nbsp;основе реальных показателей.</p>
                <a class="service-block__link" href="https://emailsoldiers.ru/uslugi/business-analytics?roistat_visit=190845" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block content-marketing" onclick="window.open('https://monk-agency.ru/?roistat_visit=190845');">
                <h2 class="service-block__heading"> Контент-маркетинг</h2>
                <p class="service-block__desc">Возьмём на&nbsp;себя всю работу с&nbsp;контентом: от&nbsp;составления контент-стратегии до&nbsp;продвижения&nbsp;&mdash; силами редакции с&nbsp;маркетинговым подходом Monk.</p>
                <a class="service-block__link" href="https://monk-agency.ru/?roistat_visit=190845" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block gamification" onclick="window.open('https://crmgroup.ru/special-projects/?roistat_visit=190845');">
                <h2 class="service-block__heading"> Спецпроекты и&nbsp;геймификация</h2>
                <p class="service-block__desc">Разработаем спецпроект любой сложности от&nbsp;идеи до&nbsp;полной реализации. Поможем привлечь новых пользователей, повысить вовлеченность и&nbsp;увеличить продажи.</p>
                <a class="service-block__link" href="https://crmgroup.ru/special-projects/?roistat_visit=190845" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block audit-of-communications" onclick="window.open('https://crmgroup.ru/marketing-audit/?roistat_visit=190845');">
                <h2 class="service-block__heading"> Аудит коммуникаций</h2>
                <p class="service-block__desc">Проведем анализ ваших маркетинговых коммуникаций и&nbsp;разработаем action-план, который позволит увеличить выручку CRM-направления уже в&nbsp;первый месяц.</p>
                <a class="service-block__link" href="https://crmgroup.ru/marketing-audit/?roistat_visit=190845" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block design-support" onclick="window.open('https://crmgroup.ru/design-support?roistat_visit=190845');">
                <h2 class="service-block__heading"> Дизайн-поддержка</h2>
                <p class="service-block__desc">Берем на&nbsp;себя разработку материалов, соблюдая ваши гайдлайны и&nbsp;брендбук, чтобы ускорить запуск проектов и&nbsp;снизить нагрузку на&nbsp;вашу команду.</p>
                <a class="service-block__link" href="https://crmgroup.ru/design-support?roistat_visit=190845" target="_blank">Подробнее про услугу</a>
            </div>
            <div class="service-block email-template" onclick="window.open('https://crmgroup.ru/custom-template/');">
                <h2 class="service-block__heading"> Email-шаблон</h2>
                <p class="service-block__desc">За&nbsp;3&nbsp;дня создадим фирменный шаблон письма, адаптированный под ваш бизнес.</p>
                <a class="service-block__link" href="https://crmgroup.ru/custom-template/" target="_blank">Подробнее про услугу</a>
            </div>
        </section>
    </div>
    
    <section class="section-form" data-theme="black">
        <div class="container">
            <?php
                $params = [
                    "id"          => "main-form",
                    "theme"       => "black",
                    "title"       => "Если хотите стать нашими клиентами",
                    "mindbox-key" => "crmgroup_services",
                    "name-form"   => "Услуги",
                ];
                get_template_part("template-parts/contact-forms/content", "form-request", $params);
            ?>
        </div>
    </section>

</main>
<?php
    get_footer();
?>









