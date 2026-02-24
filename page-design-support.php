<?php
    
    $GLOBALS['hide_breadcrumbs'] = true;
    
    get_header();

?>


<div class="page page-design-support">
    
    <?php
        $render_form = function ($unique_id, $fields = [
            "name",
            "phone",
            "email",
        ]) {
            ob_start();
	        
	        $name_form = match ( $unique_id ) {
		        'form-quiz' => 'Заявка через попап',
		        'form-p1' => 'Квиз с сайта',
		        default => "Запрос: " . $unique_id,
	        };

            get_template_part("template-parts/contact-forms/content-form-request", null, [
                'id'          => $unique_id,
                "theme"       => "black",
                "mindbox-key" => "crmgroup_main_footer",
                "name-form"   => $name_form,
                "fields"      => $fields,
                "slot"        => "<p></p>",
                "visual"      => "minimal",
            ]);
            return ob_get_clean();
        };
        
        // Генерируем три разных HTML-блока
        $form_popup1 = $render_form('form-p1', [
            "name",
            "company",
            "post",
            "email",
            "message",
        ]);
        $form_quiz = $render_form('form-quiz', [
            "name",
            "phone",
            "email",
            "message",
        ]);
        
        /*# Вывод Попапа 1 */
        get_template_part("template-parts/popup/popup", null, [
            'template' => '<div class="popup-form"><h2 class="h2 popup-form-header">Заполните форму</h2>' . $form_popup1 . '</div>',
            'args'     => ['id' => 'id-popup'],
        ]);
    ?>
    
    <?php
        /*# The Page header */
        $features = array(
            array(
                'icon' => get_template_directory_uri() . '/access/img/icons/cards/Inside-Icon-35.svg',
                'text' => 'Бесплатная техподдержка',
            ),
            array(
                'icon' => get_template_directory_uri() . '/access/img/icons/cards/Inside-Icon-36.svg',
                'text' => 'Гибкие платежи',
            ),
            array(
                'icon' => get_template_directory_uri() . '/access/img/icons/cards/Inside-Icon-37.svg',
                'text' => 'Интеграции с&nbsp;CRM и&nbsp;другими вашими системами',
            ),
        );
        $actions = '
             <div class="features">';
        foreach ($features as $feature) {
            $actions .= '
                         <div class="feature">
                             <img class="feature__icon" src="' . $feature['icon'] . '" alt="Иконка - ' . $feature['text'] . '">
                             <p class="feature__text">' . $feature['text'] . '</p>
                         </div>';
        }
        $actions .= '
             </div>
             <div class="buttons">
                 <a class="button button--bg" href="#quiz">Получить смету</a>
                 <button class="button button--bd" data-popup-id="id-popup">Обсудить проект</button>
             </div>';
        get_template_part('template-parts/content-page', 'header', [
            "heading"     => '<h1 class="h1 section-heading">' . get_the_title() . '</h1>',
            "description" => '<div class="section-subheading">' . get_the_content() . '</div>',
            "actions"     => $actions,
            "visual"      => '<div class="visual-content">' . get_the_post_thumbnail(get_the_ID(), 'full') . '</div>',
        ]);
    ?>
    
    <main class="page-content">
        
        <section class="section solution-section">
            <div class="container">
                
                <div class="heading-block">
                    <h2 class="h2">Проблема → Результат</h2>
                </div>
                
                <div class="content">
                    <div class="solution-block gray-block">
                        <div class="solution-block__header">
                            <h3 class="h3 solution-block__title">Боли</h3>
                            <p class="solution-block__tag tag">
                                <small>Было</small>
                            </p>
                        </div>
                        
                        <ul class="list" data-marker-shape="point">
                            <li>Нет заявок при хорошем трафике</li>
                            <li>Сайт медленный, плохо выглядит на&nbsp;мобильных</li>
                            <li>Сложно вносить правки, нет доступа к&nbsp;данным</li>
                            <li>Непрозрачная аналитика&nbsp;&mdash; непонятно, что работает и&nbsp;как ведут себя пользователи</li>
                        </ul>
                    </div>
                    
                    <div class="solution-block accent-block">
                        <div class="solution-block__header">
                            <h3 class="h3 solution-block__title">Результаты</h3>
                            <p class="solution-block__tag tag" data-color="white">
                                <small>Станет</small>
                            </p>
                        </div>
                        
                        <ul class="list" data-marker-shape="point">
                            <li>Конверсия из&nbsp;трафика в&nbsp;заявки не&nbsp;ниже 1%</li>
                            <li>Загрузка &lt;2&nbsp;сек, Core Web Vitals 90+&nbsp;на мобиле</li>
                            <li>Удобный редактор контента и&nbsp;UI-кит</li>
                            <li>Полная аналитика: события, цели, воронки</li>
                        </ul>
                    
                    </div>
                </div>
            </div>
        </section>
        <section class="section formats-section">
            <div class="container">
                <div class="content">
                    <div class="heading-block">
                        <h2 class="h2">Форматы и&nbsp;объем работ</h2>
                    </div>
                    
                    <div class="formats">
                        <?php
                            $formats = [
                                [
                                    'icon'        => get_template_directory_uri() . '/access/img/icons/outline/analysis.svg',
                                    'title'       => 'Лендинг под рекламу',
                                    'description' => [
                                        'Запуск перформанс&#8209;кампаний: чёткая структура экранов, сильные офферы, быстрый рендер, пиксели и&nbsp;события для&nbsp;Ads.',
                                    ],
                                ],
                                [
                                    'icon'        => get_template_directory_uri() . '/access/img/icons/outline/layers.svg',
                                    'title'       => 'MVP/продуктовый сайт',
                                    'description' => [
                                        'Быстрая гипотеза, метрики активации, итерации спринтами.',
                                    ],
                                ],
                                [
                                    'icon'        => get_template_directory_uri() . '/access/img/icons/outline/notebook_pencil.svg',
                                    'title'       => 'Корпоративный сайт',
                                    'description' => [
                                        'Витрина услуг и&nbsp;экспертизы: разделы, блоги, кейсы, карьеры. Индексация и&nbsp;SEO&#8209;база.',
                                    ],
                                ],
                                [
                                    'icon'        => get_template_directory_uri() . '/access/img/icons/outline/pencil.svg',
                                    'title'       => 'Редизайн',
                                    'description' => [
                                        'Обновляем визуал и&nbsp;UX&nbsp;без потери SEO и&nbsp;миграцией контента.',
                                    ],
                                ],
                            ];
                        ?>
                        <?php foreach ($formats as $item): ?>
                            <div class="format dark-block">
                                <img class="format-icon" src="<?= $item["icon"] ?>" alt="Иконка <?= $item["title"] ?>">
                                <h4 class="h4 format-title"><?= $item["title"] ?></h4>
                                <div class="format-description">
                                    <?php foreach ($item['description'] as $line): ?>
                                        <p><?= $line ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                
                </div>
            </div>
        </section>
        <?php
            $techStack = [
                'Основа'                        => [
                    'HTML5',
                    'CSS3 (SASS / SCSS / LESS / PostCSS)',
                    'JavaScript (ES6+) / TypeScript',
                ],
                'Стилизация'                    => [
                    'Tailwind CSS',
                ],
                'Анимации и&nbsp;геймдев'       => [
                    'GSAP (GreenSock)',
                    'Animajs, Phaser, Three.js',
                ],
                'Фреймворки'                    => [
                    'Vue.js&nbsp;3 / Nuxt.js&nbsp;3 (Composition API)',
                    'CMS: WordPress, Bitrix',
                ],
                'Сборщики и&nbsp;бандлеры'      => [
                    'Gulp, Rollup, Vite',
                ],
                'Контроль версий и&nbsp;DevOps' => [
                    'gitverse.ru (CI/CD)',
                ],
            ];
        ?>
        <section class="section tech-stack-section">
            <div class="container">
                <div class="content">
                    <div class="block-heading">
                        <h2 class="h2">Технологический стек</h2>
                    </div>
                    <div class="tech-stack">
                        <?php foreach ($techStack as $category => $items): ?>
                            <div class="tech-stack__card">
                                <p class="tech-stack__card-title"><?= htmlspecialchars_decode($category) ?></p>
                                <?php if (!empty($items)): ?>
                                    <ul class="tech-stack__card-list list">
                                        <?php foreach ($items as $item): ?>
                                            <li><?= htmlspecialchars_decode($item) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
            /* Секция - "Доказываем делом" */
            $filtered_cases = [
                [
                    'link'     => 'https://www.behance.net/gallery/107036981/Calltraking-Website',
                    'title'    => 'CallTracking',
                    'subtitle' => 'Сайт сквозной аналитики',
                    'type'     => 'Сайт',
                    'desc'     => [
                        'Разработка дизайна и&nbsp;вёрстка сайта для&nbsp;сквозной аналитики и&nbsp;коллтрекинга',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/calltracking.png',
                ],
                [
                    'link'     => 'https://www.behance.net/gallery/156457107/Tinkoff-landing-page',
                    'title'    => 'Тинькофф',
                    'subtitle' => 'Лендинги Black и&nbsp;Platinum',
                    'type'     => 'Лендинг',
                    'desc'     => [
                        'Редизайн лендингов Тинькофф Platinum/Black, разработка 3D&nbsp;и&nbsp;вёрстка сайта',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/tinkoff.png',
                ],
                [
                    'link'     => 'https://test.creativesoldiers.ru/grafen/',
                    'title'    => 'Graphene Valley',
                    'subtitle' => 'Corporation',
                    'type'     => 'Сайт',
                    'desc'     => [
                        'Разработка текста, дизайна, анимаций, вёрстка сайта, настройка backend',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/graphene.png',
                ],
                [
                    'link'     => '',
                    'title'    => 'X-Planet',
                    'subtitle' => 'Сервис грузоперевозок',
                    'type'     => 'Сайт',
                    'desc'     => [
                        'Разработка обновленной концепции дизайна и&nbsp;верстка сайта. Создание 3D‑визуализации.',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/x-planet.png',
                ],
                [
                    'link'     => 'https://www.behance.net/gallery/152305361/Mirontsevo-Website',
                    'title'    => 'Миронцево',
                    'subtitle' => 'Коттеджный поселок',
                    'type'     => 'Лендинг',
                    'desc'     => [
                        'Разработка дизайна и&nbsp;вёрстка сайта. Дальнейшей поддержкой занимается команда клиента',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/mironcevo.png',
                ],
                [
                    'link'     => 'https://monk-agency.ru',
                    'title'    => 'Monk',
                    'subtitle' => 'Маркетинговое агентство',
                    'type'     => 'Сайт',
                    'desc'     => [
                        'Разработка брендинга и&nbsp;дизайна сайта.',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/monk.png',
                ],
                [
                    'link'     => 'https://larta.com',
                    'title'    => 'Larta Glass',
                    'subtitle' => 'Стекольное производство',
                    'type'     => 'Лендинг',
                    'desc'     => [
                        'Дизайн, разработка сайта на Tilda. Дальнейшей поддержкой занимается команда клиента',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/lartaglass.png',
                ],
                [
                    'link'     => 'https://scan-interfax.ru/ratings/',
                    'title'    => 'SCAN',
                    'subtitle' => 'Управление репутацией',
                    'type'     => 'Сайт',
                    'desc'     => [
                        'Обновление дизайна и&nbsp;верстки страниц сайта',
                    ],
                    'img'      => get_template_directory_uri() . '/access/img/cases-pages/scan.png',
                ],
            ];
            
            get_template_part('template-parts/content-slider/slider', null, [
                'is_section'      => true,
                'section_class'   => 'prove-section',
                'heading'         => '<h2 class="h2">Доказываем делом</h2>',
                'show_navigation' => 'top',
                'slider_id'       => 'prove',
                'slider_type'     => 'cases',
                
                'items' => array_map(function ($entry) {
                    $descHtml = '';
                    foreach ($entry['desc'] as $line) {
                        $descHtml .= '<p>' . esc_html($line) . '</p>';
                    }
                    
                    // Класс no-type если нет ссылки
                    $titleClass = empty($entry['link']) ? 'h2 card-case__title no-type' : 'h2 card-case__title';
                    
                    // onclick если ссылка есть
                    $onClickAttr = !empty($entry['link']) ? ' onclick="window.open(\'' . esc_url($entry['link']) . '\', \'_blank\')"' : '';
                    
                    return '
            <div class="card-case" data-name="' . esc_attr($entry['title']) . '"' . $onClickAttr . '>
                <div class="card-case__header">
                    <p class="' . $titleClass . '" data-type="' . esc_attr($entry['type']) . '">' . esc_html($entry['title']) . '</p>
                    <p class="h2 card-case__subtitle">' . esc_html($entry['subtitle']) . '</p>
                    <div class="card-case__description">
                        ' . $descHtml . '
                    </div>
                </div>
                <div class="card-case__content">
                    ' . (!empty($entry['img']) ? '<img src="' . esc_url($entry['img']) . '" alt="">' : '') . '
                </div>
            </div>
        ';
                }, $filtered_cases),
                
                'item_template' => '',
                'actions'       => '',
            ]);
        
        
        ?>
        <section class="section stages-section">
            <div class="container">
                <div class="content">
                    <div class="block-heading">
                        <h2 class="h2">Этапы работ</h2>
                    </div>
                    <?php
                        $stages = [
                            "Бриф/аудит",
                            "Прототип",
                            "Дизайн",
                            "Разработка",
                            "Контент, интеграции",
                            "Тестирование",
                        ];
                    ?>
                    <div class="stages-container">
                        <div class="stages">
                            <?php foreach ($stages as $stage): ?>
                                <div class="stage">
                                    <p><?= $stage ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="stages-description">
                        <p>Сроки проекта рассчитываются после брифа и&nbsp;варьируются от&nbsp;объёма работы. После согласования сметы и&nbsp;общих сроков проекта, Вы&nbsp;получаете гант проекта с&nbsp;подробной разбивкой работ и&nbsp;сроков</p>
                    </div>
                    <div class="chart">
                        <img src="<?= get_template_directory_uri() ?>/access/img/pages/design-support/chart.svg" alt>
                    </div>
                </div>
            </div>
        </section>
        <section class="section packages-section" style="display: none">
            <div class="container">
                <div class="content">
                    <div class="heading-block swipe-icon">
                        <h2 class="h2">Стоимость и&nbsp;пакеты</h2>
                    </div>
                    <div class="content-block">
                        <div class="packages">
                            <div class="package">
                                <h3 class="package-name">Быстрый запуск</h3>
                                <p class="package-term">(2&#8209;4 недели)</p>
                                <p class="package-desc">Лендинг 3&ndash;7&nbsp;экранов, базовая аналитика, деплой.</p>
                                <p class="package-price">цена&nbsp;от 170&nbsp;000&nbsp;руб</p>
                                <a class="button button--bg" href="#quiz">Запросить смету</a>
                            </div>
                            <div class="package">
                                <h3 class="package-name">Корпоративный сайт&nbsp;базовый</h3>
                                <p class="package-term">(2&#8209;6 месяцев)</p>
                                <p class="package-desc">Многоэкранный сайт, UI, интеграции с&nbsp;CRM/оплатой, SEO&#8209;база.</p>
                                <p class="package-price">цена&nbsp;от 500&nbsp;000&nbsp;руб</p>
                                <a class="button button--bg" href="#quiz">Запросить смету</a>
                            </div>
                            <div class="package">
                                <h3 class="package-name">Многостраничный сайт</h3>
                                <p class="package-term">(от&nbsp;5&nbsp;месяцев)</p>
                                <p class="package-desc">Кастомный фронт/бэк, сложные интеграции, миграции, A/B&#8209;тесты.</p>
                                <p class="package-price">цена&nbsp;от 1&nbsp;000&nbsp;000&nbsp;руб</p>
                                <button class="button button--bd" data-popup-id="id-popup">Обсудить проект</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="split-container">
                    <div class="heading-block">
                        <h4 class="h4">Что влияет на&nbsp;стоимость:</h4>
                    </div>
                    <div class="description-block">
                        <p class="h4">объём страниц, сложность и&nbsp;комплексность дизайн концепции, интеграции, контент,
                            сроки.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section cost-calc-section" id="quiz">
            <div class="container">
                <div class="content">
                    <div class="split-container">
                        <div class="textual-block">
                            <div class="heading-block">
                                <h2 class="h2">Рассчитаем стоимость вашего проекта</h2>
                                <p>Ответьте на 7&nbsp;вопросов о&nbsp;вашем проекте, и&nbsp;мы пришлем смету и&nbsp;кейсы работ на&nbsp;почту.</p>
                            </div>
                            <?php $actions_block_html = '<div class="actions-block">
                           <div class="actions-block__textual">
                              <b>Хотите сразу перейти к&nbsp;обсуждению проекта?</b>
                              <p>Заполните форму, и&nbsp;мы свяжемся с&nbsp;вами.</p>
                           </div>
                           <button class="button button--bd" data-popup-id="id-popup">Оставить заявку</button>
                        </div>'; ?>
                            <?php echo do_shortcode($actions_block_html); ?>
                        </div>
                        <div class="widget-container">
                            <?php
                                /*# Вывод Квиза */
                                get_template_part('template-parts/widgets/quiz', null, [
                                    'id'   => 'cost-calc',
                                    'form' => '<div class="form-container">' . '<div class="form-textual">' . '<p class="h4 form-title">Спасибо за ответы!</p>' . '<div class="format-description">' . '<p>Пожалуйста, оставьте свои данные, и&nbsp;мы&nbsp;пришлём вам смету проекта и&nbsp;презентацию с&nbsp;кейсами.</p>' . '</div>' . '<b class="">Срок подготовки предложения&nbsp;—&nbsp;2&nbsp;дня.</b>' . '</div>' . $form_quiz . // Та самая переменная, которую мы подготовили выше
                                        '</div>',
                                ]);
                            ?>
                            <?php echo do_shortcode($actions_block_html); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


<?php
    get_footer();
?>

