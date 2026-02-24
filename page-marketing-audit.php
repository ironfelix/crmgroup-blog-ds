
<?php
    get_header();
?>

   <div class="page" id="marketing-audit">

       <?php
           /*# The Hero Section */
           $thumbnail = get_the_post_thumbnail(
               get_the_ID(),
               'full',
               ['class' => 'visual-image']
           );
           get_template_part('template-parts/content-page', 'header',
               [
                   "heading" => '<h1 class="h1 section-heading">' . esc_html(get_the_title()) . '</h1>',
                   "description" => '<div class="description">' . get_the_content() . '</div>',
                   "actions" => '<a class="button button--bg" href="#form-request">Оставить заявку</a>',
                   "visual" => '<div class="visual-content">' . $thumbnail . '</div>',
               ]
           );
       ?>

      <main class="page-content">

         <section class="section" id="audit-communications">
            <div class="container">
               <div class="content">

                   <?php
                       /*# Content - split-hero */
                       $split_hero = '<h2 class="h2"> Зачем нужен аудит коммуникаций</h2>';
                   ?>

                   <?php
                       /*# Content - split-content */
                       $cards = [
                           [
                               "title" => "Понять причины низкой конверсии",
                               "description" => [
                                   "И получить чёткий список действий по её увеличению"
                               ],
                           ],
                           [
                               "title" => "Масштабировать CRM-маркетинг",
                               "description" => [
                                   "Если он охватывает не всех клиентов в воронке"
                               ],
                           ],
                           [
                               "title" => "Узнать, как хорошо ведётся CRM-маркетинг",
                               "description" => [
                                   "И определить его работающие и не очень механики"
                               ],
                           ],
                           [
                               "title" => "Увеличить выручку",
                               "description" => [
                                   "За счёт роста доли CRM-канала"
                               ],
                           ],
                           [
                               "title" => "Быстро понять ситуацию на проекте",
                               "description" => [
                                   "И расставить приоритеты"
                               ],
                           ],
                       ];

                       ob_start();
                       foreach ($cards as $card): ?>
                          <div class="card grey-block">
                             <b class="h5 title --color-accent"><?= esc_html($card["title"]) ?></b>
                             <div class="description">
                                 <?php foreach ($card["description"] as $desc): ?>
                                    <p class="--color-grey"><?= esc_html($desc) ?></p>
                                 <?php endforeach; ?>
                             </div>
                          </div>
                       <?php endforeach;
                       $split_content = ob_get_clean();

                   ?>

                   <?php
                       get_template_part(
                           'template-parts/content-split-container',
                           null,
                           [
                               'hero-block' => $split_hero,
                               'content-block' => $split_content,
                           ]
                       );
                   ?>
               </div>
            </div>
         </section>

         <section class="section" id="audit-marketing">
            <div class="container">
               <div class="content">

                  <div class="intro-block">
                     <h2 class="h2">Что входит в аудит CRM-маркетинга</h2>
                  </div>

                  <div class="content-block">
                      <?php
                          $cards = [
                              [
                                  "title" => "Технический аудит",
                                  "icon" => "Inside-Icon-25.svg",
                                  "items" => [
                                      "Изучаем интеграцию, подписки, данные",
                                      "Проверяем отправку рассылок и&nbsp;передачу данных между информационными системами, фиксируем ошибки",
                                      "Смотрим, как настроены технические записи, постмастеры, нет&nbsp;ли адресов бренда в&nbsp;чёрных списках"
                                  ]
                              ],
                              [
                                  "title" => "Аудит коммуникаций",
                                  "icon" => "Inside-Icon-21.svg",
                                  "items" => [
                                      "Анализируем показатели рассылок по&nbsp;сегментам",
                                      "Проверяем email-канал, пуши, СМС, Viber, отдельно аудируем триггерные и&nbsp;массовые рассылки"
                                  ]
                              ],
                              [
                                  "title" => "Аудит дизайна и вёрстки писем",
                                  "icon" => "Inside-Icon-31.svg",
                                  "items" => [
                                      "Анализируем содержание, смысл и&nbsp;логику в&nbsp;текстах",
                                      "Проверяем вёрстку и&nbsp;дизайн писем на&nbsp;соответствие общим правилам и&nbsp;адаптивность"
                                  ]
                              ],
                              [
                                  "title" => "Аудит точек контакта и состава базы",
                                  "icon" => "Inside-Icon-26.svg",
                                  "items" => [
                                      "Изучаем способы подписки",
                                      "Анализируем текущую клиентскую базу и&nbsp;сегменты",
                                      "Проверяем валидность адресов"
                                  ]
                              ]
                          ];
                          foreach ($cards as $card): ?>
                             <div class="card grey-block">
                                <div class="card-icon">
                                   <img src="<?= get_template_directory_uri() . '/access/img/icons/cards/' . $card["icon"]
                                   ?>"
                                        alt="<?= $card["title"] ?>">
                                </div>
                                <b class="h5 card-title"><?= $card["title"] ?></b>
                                <div class="card-description">
                                   <ul class="list" data-marker-color="red">
                                       <?php foreach ($card["items"] as $item): ?>
                                          <li><?= $item ?></li>
                                       <?php endforeach; ?>
                                   </ul>
                                </div>
                             </div>
                          <?php endforeach; ?>
                  </div>

               </div>
            </div>
         </section>

         <section class="section" id="audit-for">
            <div class="container">
               <div class="content">
                  <div class="textual-block">
                     <h2 class="h2">Кому поможет</h2>
                     <div class="tags">
                        <p class="tag">CRM&#8209;маркетологу</p>
                        <p class="tag">Директору по&nbsp;маркетингу</p>
                        <p class="tag">Интернет&#8209;маркетологу</p>
                        <p class="tag">Директору по&nbsp;маркетинговым коммуникациям</p>
                     </div>
                  </div>
                  <div class="visual-block">
                     <img src="<?= get_template_directory_uri() . '/src/img/pages/marketing-audit/image-audit-for.png' ?>"
                          alt>
                  </div>
               </div>
            </div>
         </section>

         <section class="section" id="action-plan">
            <div class="container">
               <div class="content">

                  <div class="intro-block">
                     <p>Что вы получите:</p>
                     <h2 class="h2">Action plan, чтобы увеличить выручку CRM-направления в первый месяц</h2>
                  </div>

                  <div class="content-block">
                      <?php
                          $cards = [
                              [
                                  "description" => [
                                      "Аудит 360° канала и инфраструктуры"
                                  ]
                              ],
                              [
                                  "description" => [
                                      "Комплексный аудит или направление на выбор: технический, аудит коммуникаций, дизайна, текстов, вёрстки, аналитики"
                                  ]
                              ],
                              [
                                  "description" => [
                                      "Консультации по дальнейшим действиям"
                                  ]
                              ],
                              [
                                  "description" => [
                                      "Гипотезы для повышения показателей всех каналов"
                                  ]
                              ],
                              [
                                  "description" => [
                                      "Рекомендации по наращиванию базы, оптимальной сегментации, вовлечению пользователей"
                                  ]
                              ]
                          ];
                          foreach ($cards as $card): ?>
                             <div class="card grey-block">
                                <div class="card-icon">
                                   <img src="<?= get_template_directory_uri() . '/access/img/icons/cards/Inside-Icon-12.svg' ?>"
                                        alt="<?= $card["icon_alt"] ?>">
                                </div>
                                <div class="card-description">
                                    <?php foreach ($card["description"] as $item): ?>
                                       <p><?= $item ?></p>
                                    <?php endforeach; ?>
                                </div>
                             </div>
                          <?php endforeach; ?>
                  </div>

               </div>
            </div>
         </section>

         <section class="section" id="term-offer">
            <div class="container">
               <div class="content">

                  <div class="border-block term-offer term-offer__timing">
                     <p class="h5 term-offer__title">Сроки</p>
                     <div class="term-offer__description">
                        <p>Время анализа и подготовки рекомендации от&nbsp;7 до&nbsp;14дней</p>
                     </div>
                  </div>

                  <div class="border-block term-offer term-offer__pricing">
                     <p class="h5 term-offer__title">Бюджет</p>
                     <div class="term-offer__description">
                        <b>Стоимость комплексного аудита 220&nbsp;000&nbsp;₽</b>
                        <p>Хотите уже до&nbsp;начала сезона улучшить маркетинговые показатели?</p>
                     </div>
                     <div class="term-offer__cta">
                        <a class="button button--bg" href="#form-request">Закажите аудит сейчас</a>
                     </div>
                  </div>

               </div>
            </div>
         </section>

         <section class="section" id="why-we">
            <div class="container">
               <div class="content">

                  <div class="visual-block">
                     <img src="<?= get_template_directory_uri() . '/src/img/pages/marketing-audit/section-why-we/viaual-image.png' ?>"
                          alt="Почему выбирают наш аудит CRM-маркетинга"
                     >
                  </div>

                  <div class="textual-block">
                     <h2 class="h2 heading">Почему мы?</h2>

                     <div class="grey-block">
                        <h3 class="h3 title">10 лет</h3>
                        <div class="context">
                           <p>на рынке</p>
                        </div>
                     </div>

                     <div class="grey-block">
                        <h3 class="h3 title">90+</h3>
                        <div class="context">
                           <p>людей в нашей команде</p>
                        </div>
                     </div>

                  </div>

               </div>
            </div>
         </section>

          <?php
              $args = [
                  "new" => true,
                  "title" => "<h2 class='h2 heading'>За десять лет мы поработали с 400+ брендами</h2>",
                  "description" => null
              ];
              get_template_part('template-parts/content-clients', null, $args); ?>


         <section class="section">
            <div class="container">
                <?php
                    $params = [
                        "id" => "main-form",
                        "title" => "Готовы к <br> общению",
                        "mindbox-key" => "crmgroup_main_footer",
                        "name-form" => "Главная (в префутере)"
                    ];
                    get_template_part("template-parts/contact-forms/content", "form-request", $params);
                ?>
            </div>
         </section>

      </main>

   </div>

<?php
    get_footer();
?>