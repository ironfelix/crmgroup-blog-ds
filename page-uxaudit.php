<?php
    /**
     * The main template file
     *
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package content_hub
     */

    get_header();
?>


    <main id="ux-audit" class="page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__content">
                    <h1 class="h1">
                        Находим точки роста ваших сайтов и сервисов
                        <span>с помощью UX-аудита</span>
                    </h1>
                    <a href="#form-request" class="button button--bg">Заказать услугу</a>
                </div>
            </div>
        </div>
        <div class="page-content">
            <section class="section --bg-white" id="advantages">
                <div class="container">
                    <div class="block">
                        <div class="container--max-right">
                            <h4 class="h4 heading">Увеличиваем
                                <br> конверсию
                            </h4>
                            <div class="block-content">
                                <div>
                                    <div class="information">
                                        <div class="information__desc indent-bottom">
                                            По итогам аудита переработали карточки товаров, функциональность корзины и улучшили навигацию на сайте известного бренда обуви.
                                        </div>
                                        <div class="information__blocks">
                                            <div class="block-info">
                                                <p class="block-info__title">На 1,5%</p>
                                                <p class="block-info__desc">выросла конверсия в результате внедрения улучшений по результатам кастдева</p>
                                            </div>
                                            <p class="block-info block-case" style='cursor: default;'>
                                                <span class="block-info__case">Скоро будет кейс</span>
                                            </p>
                                            <!--<a href="#" target="_blank" class="block-info block-case" >
                                                <span class="block-info__case" >Скоро будет кейс</span>
                                            </a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-image__wrapper">
                                <div class="block-image__header">
                                    <div class="browser-url"></div>
                                </div>
                                <div class="block-image">
                                    <div class="picture-wrapper">
                                        <picture class="picture">
                                            <source srcset="/_nuxt/img/img-01-desk.15eab6b.webp" type="image/webp">
                                            <img data-src="/_nuxt/img/img-01-desk.2c481ae.jpg" src="/_nuxt/img/img-01-desk.2c481ae.jpg" alt rel="preload" class="img">
                                        </picture>
                                    </div>
                                    <p class="block-image__sidnote">Пример из реального отчета для клиента: гипотезы + оценка ICE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="container--max-right">
                            <h4 class="h4 heading">Улучшаем
                                <br> пользовательский опыт
                            </h4>
                            <div class="block-content">
                                <div>
                                    <div class="information">
                                        <div class="information__desc indent-bottom">
                                            Для спортивного бренда переработали структуру FAQ и сделали редизайн сайта. Навигация стала более интуитивно понятна.
                                        </div>
                                        <div class="information__blocks">
                                            <div class="block-info">
                                                <p class="block-info__title">На 70%</p>
                                                <p class="block-info__desc">снизили нагрузку на службу поддержки, куда обращались с одними и теми же вопросами.</p>
                                            </div>
                                            <a href="#" target="_blank" class="block-info block-case">
                                                <span class="block-info__case">Скоро будет кейс</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-image__wrapper">
                                <div class="block-image__header">
                                    <div class="browser-url"></div>
                                </div>
                                <div class="block-image after">
                                    <div class="select_img_block" id="after">
                                        <div class="picture-wrapper">
                                            <picture class="picture">
                                                <source srcset="/_nuxt/img/img-02-desk.2d5b08b.webp" type="image/webp">
                                                <img data-src="/_nuxt/img/img-02-desk.058c72f.jpg" src="/_nuxt/img/img-02-desk.058c72f.jpg" alt rel="preload" class="img">
                                            </picture>
                                        </div>
                                        <p class="block-image__sidnote">Обновлённая версия раздела поддержки после аудита</p>
                                    </div>
                                    <div class="select_img_block" id="before">
                                        <div class="picture-wrapper">
                                            <picture class="picture">
                                                <source srcset="/_nuxt/img/img-01-desk.4ae06bc.webp" type="image/webp">
                                                <img data-src="/_nuxt/img/img-01-desk.beeb8a0.jpg" src="/_nuxt/img/img-01-desk.beeb8a0.jpg" alt rel="preload" class="img">
                                            </picture>
                                        </div>
                                        <p class="block-image__sidnote">Версия раздела поддержки до аудита и редизайна</p>
                                    </div>

                                    <div class="block-image__buttons" onclick="this.parentNode.className = (this.parentNode.className == 'block-image after' ? 'block-image before' : 'block-image after')">
                                        <button class="btn_before">До</button>
                                        <button class="btn_after">После</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="stages2" class="section">
                <div class="container">
                    <div class="content">
                        <h2 class="h1">
                            Вовлечёмся в процесс, погрузимся в задачу
                            <br>
                            <span>как инхаус-команды</span>
                        </h2>
                        <div class="stages">
                            <div class="stage">
                                <div class="stage-content container--max-right">
                                    <h4 class="h4 stage-heading">Погружаемся</h4>
                                    <div class="stage-desc">Подготовительный этап, на котором мы изучаем материалы и данные, которые есть у клиента к старту работ.</div>
                                    <div class="stage__more-info">
                                        <div class="stage-team">
                                            <div class="stage-team__members">
                                                <div class="stage-team__member">
                                                    <img data-src="/_nuxt/img/Tyulenev.662d922.jpg" src="/_nuxt/img/Tyulenev.662d922.jpg" alt="Tyulenev" class="img">
                                                </div>
                                                <div class="stage-team__member">
                                                    <img data-src="/_nuxt/img/Filin.c3f6088.jpg" src="/_nuxt/img/Filin.c3f6088.jpg" alt="Filin" class="img">
                                                </div>
                                            </div>
                                            <p class="stage-team__desc">Продакт-менеджер, арт‑директор</p>
                                        </div>
                                        <p class="stage-period">Неделя</p>
                                    </div>
                                    <div class="stage__more-info-blocks">
                                        <div class="stage__more-info-block">
                                            <p class="stage__more-info-block__title">Анализ показателей</p>
                                            <div class="stage__more-info-block__desc">
                                                <p>Изучаем целевую аудиторию сайта, бизнес-нишу.</p>
                                                <p>Фиксируем исходные данные сайта: посещаемость, конверсию и т. д.</p>
                                            </div>
                                        </div>
                                        <div class="stage__more-info-block">
                                            <p class="stage__more-info-block__title">Изучение продукта</p>
                                            <div class="stage__more-info-block__desc">
                                                <p>Изучаем стайлгайд или брендбук компании.</p>
                                                <p>Проводим интервью с клиентом: выясняем цель, задачи проекта.</p>
                                                <p>Конкретизируем проблемы, которые нужно решить.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stage">
                                <div class="stage-content container--max-right">
                                    <h4 class="h4 stage-heading">Исследуем</h4>
                                    <div class="stage-desc">Основной этап: глубже погружаемся в продукт, общаемся с пользователями, изучаем пользовательский путь.</div>
                                    <div class="stage__more-info">
                                        <div class="stage-team">
                                            <div class="stage-team__members">
                                                <div class="stage-team__member">
                                                    <img data-src="/_nuxt/img/Tyulenev.662d922.jpg" src="/_nuxt/img/Tyulenev.662d922.jpg" alt="Tyulenev" class="img">
                                                </div>
                                                <div class="stage-team__member">
                                                    <img data-src="/_nuxt/img/Scorobogatova.f1b8f74.jpg" src="/_nuxt/img/Scorobogatova.f1b8f74.jpg" alt="Scorobogatova" class="img">
                                                </div>
                                            </div>
                                            <p class="stage-team__desc">Продакт-менеджер, продакт-дизайнер</p>
                                        </div>
                                        <p class="stage-period">Неделя</p>
                                    </div>
                                    <div class="stage__more-info-blocks">
                                        <div class="stage__more-info-block">
                                            <p class="stage__more-info-block__title">Глубинное интервью</p>
                                            <div class="stage__more-info-block__desc">
                                                <p>Беседуем с реальными пользователями.</p>
                                                <p>Выделяем неочевидные команде проблемы, которые помогают подтвердить или опровергнуть гипотезы.</p>
                                            </div>
                                        </div>
                                        <div class="stage__more-info-block">
                                            <p class="stage__more-info-block__title">Проработка CJM</p>
                                            <div class="stage__more-info-block__desc">
                                                <p>Проходим путь пользователей. Отмечаем проблемные места. </p>
                                                <p>Изучаем данные вебвизора, карты кликов и других инструментов для отслеживания активности на сайте, чтобы подтвердить гипотезы.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stage">
                                <div class="stage-content container--max-right">
                                    <h4 class="h4 stage-heading">Готовим решения</h4>
                                    <div class="stage-desc">Формулируем продуктовые гипотезы и описываем, что именно нужно сделать, чтобы исправить проблемы.</div>
                                    <div class="stage__more-info">
                                        <div class="stage-team">
                                            <div class="stage-team__members">
                                                <div class="stage-team__member">
                                                    <img data-src="/_nuxt/img/Tyulenev.662d922.jpg" src="/_nuxt/img/Tyulenev.662d922.jpg" alt="Tyulenev" class="img">
                                                </div>
                                                <div class="stage-team__member">
                                                    <img data-src="/_nuxt/img/Scorobogatova.f1b8f74.jpg" src="/_nuxt/img/Scorobogatova.f1b8f74.jpg" alt="Scorobogatova" class="img">
                                                </div>
                                            </div>
                                            <p class="stage-team__desc">Продакт-менеджер, продакт-дизайнер</p>
                                        </div>
                                        <p class="stage-period">Неделя</p>
                                    </div>
                                    <div class="stage__more-info-blocks">
                                        <div class="stage__more-info-block">
                                            <p class="stage__more-info-block__title">Подготовка решений</p>
                                            <div class="stage__more-info-block__desc">
                                                <p>Описываем, что именно нужно сделать, чтобы решить проблемы и отработать каждую гипотезу.</p>
                                            </div>
                                        </div>
                                        <div class="stage__more-info-block">
                                            <p class="stage__more-info-block__title">Формулирование гипотез</p>
                                            <div class="stage__more-info-block__desc">
                                                <p>Сводим полученные данные, итоги анализа и инсайты с интервью.</p>
                                                <p>Формируем итоговые гипотезы.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section --bg-white" id="section1">
                <div class="container">
                    <h2 class="heading h1">
                        <span>Что вы получите</span>
                        <br> после UX‑аудита
                    </h2>
                    <div class="video-container">
                        <div class="container--max-right">
                            <p class="text">Видео с подробным рассказом о результатах работы и другие материалы о проведённом исследовании</p>
                        </div>
                    </div>
                </div>
                <div class="blocks container">
                    <div class="block">
                        <div class="container--max-right">
                            <h4 class="h4 heading">Список интерфейсных проблем, а к нему — список гипотез, которые улучшат пользовательский опыт</h4>
                            <div class="desc">
                                <p>Гипотезы будут представлены в виде матрицы 2×2. Для каждой из них будут прописаны сложность, стоимость внедрения и прогнозируемый эффект.</p>
                            </div>
                            <div class="block-info__wrapper"></div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="container--max-right">
                            <h4 class="h4 heading">Скрипты интервью и расшифровки, которые подтверждают гипотезы</h4>
                            <div class="desc">
                                <p>Вы сможете вернуться к ним на этапе улучшений или передать команде, которая будет ими заниматься.</p>
                            </div>
                            <div class="block-info__wrapper"></div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="container--max-right">
                            <h4 class="h4 heading">Презентацию аудита</h4>
                            <div class="desc">
                                <p>На ней мы расскажем о ходе и итогах аудита и объясним, как эффективно интегрировать рекомендации.</p>
                            </div>
                            <div class="block-info__wrapper"></div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="container--max-right">
                            <h4 class="h4 heading">Пример аудита сайта автомобильного холдинга и его защиты для КЛЮЧАВТО</h4>
                            <div class="desc">
                                <p></p>
                            </div>
                            <div class="block-info__wrapper">
                                <a href="https://www.loom.com/share/842ea68ea4384669b880688cb976c4b8" target="_blank" class="block-info">
                                    <span>Вводная по аудиту</span>
                                </a>
                                <a href="https://www.loom.com/share/89c15b1622a843848343e6dc5df48c97" target="_blank" class="block-info">
                                    <span>Защита аудита дизайнером</span>
                                </a>
                                <a href="https://www.figma.com/file/omrWntGm5RMprlVrG5aE9e/UX---%D0%B0%D1%83%D0%B4%D0%B8%D1%82-%D0%9A%D0%BB%D1%8E%D1%87%D0%B0%D0%B2%D1%82%D0%BE?type=whiteboard&t=1WhA9YBzTfSmufCL-0" target="_blank" class="block-info">
                                    <span>Аудит</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="service-cost" class="--bg-white">
                <div class="container">
                    <h2 class="section-heading h1">
                        <span>120 000 ₽</span>
                        <br> средняя стоимость
                        <br> UX-аудита
                    </h2>
                    <div class="container-min--right">
                        <div class="content">
                            <?php include_once( __DIR__ . '/template-parts/content-clients.php' ); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-form">
                <div class="container">
                    <?php
                        $params = [
                            "id"    => "main-form",
                            "title" => "Давайте обсудим вашу задачу",
                            "mindbox-key" => "crmgroup_ux-audit",
                            "name-form" => "UX-аудит"
                        ];
                        get_template_part( "template-parts/contact-forms/content", "form-request", $params );
                    ?>
                </div>
            </section>

        </div>
        <div class="popup-wrapper">
            <div class="popup">
                <button class="close"></button>
            </div>
        </div>
    </main>
<?php
    get_footer();
