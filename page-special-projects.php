<?php

   add_filter("body_class", function ($classes) {
      $classes[] = "--white";

      return $classes;
   });

   $GLOBALS["header_type"] = "special-projects";
   get_header();
?>

   <main class="main" id="special-projects-page">

      <section class="section section-entry">
         <div class="container">
            <div class="content">
               <div class="content-text">
                  <h1 class="content-text__heading">
                     <span>Запускаем игровые спецпроекты</span>
                  </h1>
                  <div class="content-text__subheading">
                     <p>Один проект приносит
                        <span>в&nbsp;6&nbsp;раз больше</span>
                        выручки, чем месяц email-маркетинга
                     </p>
                  </div>
               </div>
               <div class="content-decor">
                  <div class="content-decor__snake"></div>
               </div>
            </div>
         </div>
      </section>

      <section class="section section-cases">
         <div class="container">
            <div class="content">
               <?php
                  $cases = [
                     [
                        "id" => "donor_search",
                        "logo" => "donor_search.svg",
                        "title" => "Приводим лидов",
                        "result" => "+4700 контактов по&nbsp;42&nbsp;₽ за&nbsp;месяц",
                        "desc" => [
                           "Запустили для НКО DonorSearch интерактивный лендинг с&nbsp;участием известных актёров, который за&nbsp;месяц принёс в&nbsp;базу 4700 новых контактов по&nbsp;цене 42&nbsp;рубля за&nbsp;лид.",
                           "Это в&nbsp;7&nbsp;раз дешевле, чем контекстная реклама в&nbsp;нише."
                        ],
                        "link" => "https://crmgroup.ru/cases/special-project-for-donorsearch/"
                     ],
                     [
                        "id" => "vichy",
                        "logo" => "nda.png",
                        "title" => "Сегментируем и&nbsp;монетизируем базу",
                        "result" => "+270&nbsp;000 подписчиков и&nbsp;>&nbsp;1&nbsp;млн&nbsp;₽ выручки",
                        "desc" => ["Хеллоуинский квиз принёс новых подписчиков и&nbsp;обогатил базу данными&nbsp;&mdash; о&nbsp;типе кожи, возрасте и&nbsp;желаемом эффекте.", "С&nbsp;их&nbsp;учётом офферы повысили продажи в&nbsp;10&nbsp;раз по&nbsp;сравнению с&nbsp;тем&nbsp;же периодом прошлого года."],
                        "link" => "https://crmgroup.ru/cases/gamification-special-project/"
                     ],
                     [
                        "id" => "tbank",
                        "logo" => "tbank.svg",
                        "title" => "Увеличиваем конверсии",
                        "result" => "х3&nbsp;к конверсии в&nbsp;заявку на&nbsp;кредит",
                        "desc" => ["Команда банка публиковала статьи в&nbsp;блоге и&nbsp;базе знаний, но&nbsp;их&nbsp;читали неохотно&nbsp;&mdash; конверсия на&nbsp;страницу кредита была низкой. Квиз с&nbsp;тем&nbsp;же контентом увеличил её&nbsp;в&nbsp;3&nbsp;раза."],
                        "link" => "https://crmgroup.ru/cases/tinkoff-special-project/"
                     ]
                  ]
               ?>
               <div class="case-list__wrapper">
                  <div class="section-heading">
                     <h2 class="h2">Наши кейсы</h2>
                  </div>
                  <div class="case-list">
                     <?php foreach ($cases as $index => $case): ?>
                        <div class="case-list__item <?= $index == 0 ? 'active' : '' ?>" data-case="<?= $case["id"] ?>">
                           <div class="case-list__item__image">
                              <div class="scroll-container">
                                 <picture class="picture">
                                    <source srcset="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/banners/<?= $case["id"] ?>--mobile.webp" type="image/webp">
                                    <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/banners/<?= $case["id"] ?>--mobile.png" alt>
                                 </picture>
                                 <a class="button by-link" href="<?= $case["link"] ?>" target="_blank">Смотреть полный кейс</a>
                              </div>
                           </div>
                           <img class="case-list__item__logo" src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/<?= $case["logo"] ?>" alt>
                           <p class="case-list__item__title">
                              <span><?= $case['title'] ?></span>
                           </p>
                           <p class="case-list__item__result">
                              <?= $case['result'] ?>
                           </p>
                           <div class="case-list__item__desc">
                              <?php foreach ($case['desc'] as $index_text => $text): ?>
                                 <p><?= $text ?></p>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>
               <div class="case-visual__wrapper">
                  <a class="view-all-cases" href="https://crmgroup.ru/cases/" target="_blank">
                     <span>Смотреть больше кейсов</span>
                  </a>
                  <div class="case-visual">
                     <?php foreach ($cases as $index => $case): ?>
                        <div class="case-visual__image <?= $case["id"] ?> <?= $index == 0 ? 'active' : '' ?> ">
                           <picture class="picture">
                              <source srcset="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/banners/<?= $case["id"] ?>.webp" type="image/webp">
                              <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/banners/<?= $case["id"] ?>.png" alt>
                           </picture>
                           <a class="case-visual__button-view button--black" href="<?= $case["link"] ?>"
                              target="_blank">Смотреть полный кейс
                           </a>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>

            </div>
         </div>
      </section>
      
      <section class="section section-metric" id="game">
         <div class="container">
            <div class="content">
               <div class="metric-text">
                  <h2 class="h2 metric-text__heading">С помощью игровых механик растим ваши crm&#8209;метрики</h2>
                  <p class="metric-text__subheading">LTV, AOV, Retention Rate</p>
                  <ul class="metric-text__list">
                     <li class="metric-text__list-item">Собираем и&nbsp;обогащаем базу</li>
                     <li class="metric-text__list-item">Быстро монетизируем аудиторию</li>
                     <li class="metric-text__list-item">Растим число заказов и&nbsp;средний чек</li>
                     <li class="metric-text__list-item">Реактивируем спящих</li>
                  </ul>
               </div>
               <div class="metric-visual">
                  <div class="drum-container">
                     <div class="drum">
                        <div class="drum-columns">
                           <!--JS-->
                        </div>
                     </div>
                  </div>
                  <a class="button--white" href="#feedback-section">Вырастить метрики!</a>
               </div>
            </div>
         </div>
      </section>
      
      <section class="section section-showcase">
         <div class="container">
            <div class="content">
               <div class="section-heading">
                  <h2 class="h2">Создаём миры,
                     <br>
                     в&nbsp;которых
                     <span style="white-space: nowrap;">хочется
                        <s>жить</s>
                     </span>
                     проводить время и&nbsp;тратить деньги
                  </h2>
               </div>
               <div class="mockups">
                  <picture class="mockup--royalcanin">
                     <source media="(max-width:520px)" srcset="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/section-showcase/mockups/royalcanin/mockup--mobile.png">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/section-showcase/mockups/royalcanin/mockup--desktop.png" alt>
                  </picture>
                  <picture class="mockup--halloween">
                     <source media="(max-width:520px)" srcset="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/section-showcase/mockups/center/mockup--mobile.png">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/section-showcase/mockups/center/mockup--desktop.png" alt>
                  </picture>
                  <picture class="mockup--cosmos">
                     <source media="(max-width:520px)" srcset="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/section-showcase/mockups/right/mockup--mobile.png">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/section-showcase/mockups/right/mockup--desktop.png" alt>
                  </picture>
               </div>
            </div>
         </div>
      </section>
      
      <section class="section section-skills">
         <div class="container">
            <div class="content">
               
               <div class="section-heading">
                  <h2 class="h2">А ещё мы умеем</h2>
               </div>
               
               <div class="skills">
                   <?php
                       $skills = [
                           "Делать коллаборации крупных брендов",
                           "Разрабатывать геймификации под ключ для b2b и&nbsp;e-commerce",
                           "Геймифицировать программу лояльности и&nbsp;CJM",
                           "Добавлять игровые механики в&nbsp;CRM-коммуникации",
                           "Запускать мини-аппы и&nbsp;сюжетные чат-боты в&nbsp;мессенджерах",
                           "Придумывать инфоповоды, о&nbsp;которых расскажет «Кабачковая икра по&nbsp;акции»"
                       ] ?>
                   <?php foreach ($skills as $index => $skill): ?>
                      <div class="skill">
                         <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/skills/<?= $index + 1 ?>.svg" alt>
                         <p><?= $skill ?></p>
                      </div>
                   <?php endforeach; ?>
               </div>
            
            </div>
         </div>
      </section>
      
      <section class="section second-customers" id="customers">
         <div class="container">
            <div class="section-heading">
               <h2 class="h2">Наши клиенты говорят, что&nbsp;мы&nbsp;классные</h2>
            </div>
            <div class="content">
               <div class="text-messages">
                   <?php
                       $messages = [
                           [
                               "text" => ["Для нас важно показывать не&nbsp;только развлекательный контент, скидки и&nbsp;новинки, но&nbsp;и&nbsp;давать пользу читателям. Мы&nbsp;хотим делиться нашими ценностями с&nbsp;аудиторией. Вместе с&nbsp;командой агентства удалось создать микс пользы и&nbsp;развлечения: в&nbsp;игровой форме начать разговор о&nbsp;важной теме переработки мусора."],
                               "link" => "https://emailsoldiers.ru/cases/zenit-design",
                               "logo" => "zenit.png",
                           ],
                           [
                               "text" => ["Приятно было получить от&nbsp;команды CRM-group не&nbsp;просто техническую поддержку проекта, а&nbsp;помощь профессионалов, которые заинтересованы в&nbsp;качественном результате так&nbsp;же, как и&nbsp;мы.", "Коллеги оперативно реагировали на&nbsp;вопросы, предлагали удобные и&nbsp;продуманные решения под наши потребности. Например, реализовали для нас интуитивно понятную панель в&nbsp;админке, которая позволила менять призы, промокоды и&nbsp;даты без лишних обращений к&nbsp;разработчикам."],
                               "link" => "https://crmgroup.ru/cases/advent-calendar-legalbet/",
                               "logo" => "legalbet.png",
                           ],
                           [
                               "text" => ["Со&nbsp;всеми задачами ребята успешно справляются и,&nbsp;несмотря на&nbsp;высокие требования, помогают клубу предлагать своим подписчикам один из&nbsp;лучших продуктов email-маркетинга в&nbsp;своей сфере."],
                               "link" => "https://emailsoldiers.ru/cases/case-dodo-pizza",
                               "logo" => "dodo.png",
                           ],
                           [
                               "text" => ["Спорт&nbsp;&mdash; динамичный бизнес. Здесь нет долгосрочного планирования рекламных активностей, нужны креативные решения, которые можно запустить с&nbsp;колёс. Адвент&#8209;календарь прекрасно решил эту задачу."],
                               "link" => "https://crmgroup.ru/cases/advent-calendar-metallurg/",
                               "logo" => "metalurg.png",
                           ],
                       ]
                   ?>
                   <?php foreach ($messages as $index => $message): ?>
                      <div class="block-message">
                         <div class="block-message__text">
                             <?php foreach ($message['text'] as $index_text => $text): ?>
                                <p><?= $text ?></p>
                             <?php endforeach; ?>
                         </div>
                         <div class="block-message__footer">
                            <a class="block-message__link" href="<?= $message['link'] ?>" target="_blank">Смотреть кейс</a>
                            <img class="block-message__logo" src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/customers/<?=
                                $message['logo'] ?>" alt>
                         </div>
                      </div>
                   <?php endforeach; ?>
               </div>
               <div class="video-messages">
                  <div class="video-messages__title">
                     <h2 class="h2">А&nbsp;самые неравнодушные&nbsp;— записывают видеоотзывы о&nbsp;нашей работе</h2>
                  </div>
                  <div class="video-messages__customers">
                      <?php
                          $customers = [
                              [
                                  "name" => "Руслан Шекуров",
                                  "post" => "CEO&Founder DonorSearch",
                                  "video" => "/src/video/donorsearch.mp4",
                                  "poster" => "/src/img/pages/special_projects/video_posters/donorsearch.jpg",
                                  "duration" => "0:36"
                              ],
                              [
                                  "name" => "Мария Высочанская",
                                  "post" => "Старший координатор по&nbsp;методологии проекта «Профразвитие» президентской платформы «Россия – страна возможностей»",
                                  "video" => "/src/video/profrazvitie.mp4",
                                  "poster" => "/src/img/pages/special_projects/video_posters/profrazvitie.jpg",
                                  "duration" => "0:29"
                              ],
                          ]
                      ?>
                      <?php foreach ($customers as $index => $customer): ?>
                         <div class="customers-item">
                            <div class="customers-item__video">
                               <video src="" poster="<?= get_template_directory_uri() ?><?= $customer['poster'] ?>"
                                      data-video="<?= get_template_directory_uri() ?><?= $customer['video'] ?>"></video>
                               <button class="play"><?= $customer['duration'] ?></button>
                            </div>
                            <div class="customers-item__about">
                               <p class="customers-item__name"><?= $customer['name'] ?></p>
                               <p class="customers-item__post"><?= $customer['post'] ?></p>
                            </div>
                         </div>
                      <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <section class="section section-results" id="results">
         <div class="container">
            <div class="content">
               <div class="content-text">
                  <h2 class="h2 section-heading">Даём клиентам предсказуемый результат</h2>
                  
                  <div class="section-description">
                     <p>С&nbsp;2019 года запускаем спецпроекты для&nbsp;разных сфер бизнеса:</p>
                     <div class="tags">
                        <button class="tags-item">e-commerce</button>
                        <button class="tags-item">банки</button>
                        <button class="tags-item">рестораны</button>
                        <button class="tags-item">бьюти</button>
                        <button class="tags-item">недвижимость</button>
                        <button class="tags-item">фэшн</button>
                     </div>
                     <p>За&nbsp;5&nbsp;лет накопили статистику и&nbsp;собрали бенчмарки по&nbsp;самым популярным механикам.</p>
                  </div>
               
               </div>
               
               <div class="content-logos">
                  <div class="content-logos__line">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/la_rocheposay.svg" alt>
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/kerastase.svg" alt>
                  </div>
                  <div class="content-logos__line">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/vichy.svg" alt>
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/tbank.svg" alt>
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/territoria_fitnesa.svg" alt>
                  </div>
                  <div class="content-logos__line">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/scan.svg" alt>
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/miele.svg" alt>
                  </div>
                  <div class="content-logos__line">
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/beneton.svg" alt>
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/burger_king.svg" alt>
                     <img src="<?= get_template_directory_uri() ?>/src/img/pages/special_projects/logos/partners/puma.svg" alt>
                  </div>
               </div>
            
            </div>
         </div>
      </section>
       
          <section class="section section-feedback" id="feedback-section">
             <div class="container">
                <div class="content">
                   <div class="animated-images-block">
                      <h2 class="h2 section-heading">Находим эффективные решения под любой запрос</h2>
                      <div class="section-description">
                         <p>Давайте назначим встречу и обсудим вашу задачу?</p>
                      </div>
                   </div>
                   <div class="form-container">
                       <?php
                           $params = [
                               "id" => "main-form",
                               "theme" => "black",
                               "mindbox-key" => "crmgroup_main_footer",
                               "name-form" => "Находим эффективные решения под любой запрос",
                               "fields" => ["name", "phone", "email"],
                               "slot" => "<p></p>",
                               "visual" => "minimal",
                           ];
                           get_template_part("template-parts/contact-forms/content", "form-request", $params);
                       ?>
                   </div>
                </div>
             </div>
          </section>
      
      <section class="section section-about-projects">
         <div class="container">
            <div class="content">
               <h2 class="h2">Говорим и&nbsp;показываем всё, что сами знаем о&nbsp;спецпроектах</h2>
               <div class="about-projects">
                   <?php
                       $about_projects = [
                           'with_images' => [
                               [
                                   "image" => "1",
                                   "title" => "Копилка спецпроектов",
                                   "desc" => "Чат-бот, в&nbsp;котором делимся анонсами встреч, статьями и&nbsp;методичками",
                                   "text_link" => "Присоединиться к чат‑боту",
                                   "link" => "https://t.me/crmgroup_event_bot"
                               ],
                               [
                                   "image" => "2",
                                   "title" => "Команда, нужен креатив!",
                                   "desc" => "Телеграм-канал, из&nbsp;которого можно красть креативные идеи",
                                   "text_link" => "Подписаться и&nbsp;красть",
                                   "link" => "https://t.me/team1need1creativity"
                               ],
                               [
                                   "image" => "3",
                                   "title" => "Ультимативный гайд по&nbsp;спецпроектам",
                                   "desc" => "Механики, кейсы, советы по&nbsp;внедрению",
                                   "text_link" => "Читать статью",
                                   "link" => "https://crmgroup.ru/blog/gamification-in-marketing-tips-and-cases/"
                               ],
                               [
                                   "image" => "4",
                                   "title" => "Как зарабатывать с&nbsp;помощью геймификации?",
                                   "desc" => "Про бизнес-задачи, бюджеты и&nbsp;ошибки новичков",
                                   "text_link" => "Читать статью",
                                   "link" => "https://crmgroup.ru/blog/gamification/"
                               ],
                               [
                                   "image" => "5",
                                   "title" => "+270 тысяч лидов для Vichy",
                                   "desc" => "Наш кейс на Ruward",
                                   "text_link" => "Читать кейс",
                                   "link" => "https://ruward.ru/cases/4991/"
                               ]
                           ],
                           'four_items' => [
                               [
                                   "title" => "Как встроить спецпроекты в&nbsp;стратегию продвижения?",
                                   "desc" => "Обсудили бюджеты, цели и&nbsp;прогнозы",
                                   "text_link" => "Скачать запись митапа",
                                   "link" => "https://webinars.crmgroup.ru/gamification-strategy.html"
                               ],
                               [
                                   "title" => "Прожарка спецпроектов",
                                   "desc" => "Разобрали по&nbsp;косточкам громкие запуски 2024-го",
                                   "text_link" => "Скачать запись митапа",
                                   "link" => "https://webinars.crmgroup.ru/gamification-projects-2024-roasting.html"
                               ],
                               [
                                   "title" => "Какими вообще бывают спецпроекты?",
                                   "desc" => "Мы составили свою классификацию",
                                   "text_link" => "Читать статью",
                                   "link" => "https://monk-agency.ru/blog/polza-specproektov-dlya-prodvizheniya-biznesa/"
                               ],
                               [
                                   "title" => "Как больше зарабатывать в&nbsp;праздники?",
                                   "desc" => "И сохранить прибыль в&nbsp;период сезонного спада",
                                   "text_link" => "Читать статью",
                                   "link" => "https://crmgroup.ru/blog/to-make-extra-money-for-the-holidays/"
                               ]
                           ],
                           'remaining' => [
                               [
                                   "title" => "Как самому запустить геймификацию?",
                                   "desc" => "Пошаговый план запуска, лайфхаки, наши кейсы",
                                   "text_link" => "Скачать инструкцию",
                                   "link" => "https://whitepapers.crmgroup.ru/peak-and-low-seasons#form-block"
                               ],
                               [
                                   "title" => "Как объяснить подрядчику задачу?",
                                   "desc" => "Один короткий бриф, чтобы заказать любой спецпроект",
                                   "text_link" => "Скачать бриф",
                                   "link" => "https://whitepapers.crmgroup.ru/special-project-brief"
                               ],
                               [
                                   "title" => "Топ-10 игровых механик",
                                   "desc" => "Чтобы вовлечь аудиторию в&nbsp;продукт",
                                   "text_link" => "Читать статью",
                                   "link" => "https://crmgroup.ru/blog/top10-game-mechanics/"
                               ]
                           ]
                       ];
                       function render_project_group($projects)
                       {
                           foreach ($projects as $project) {
                               ?>
                              <div class="about-projects__item">
                                  <?php if ($project['image']): ?>
                                     <img class="about-projects__item-image"
                                          src="<?= esc_url(get_template_directory_uri() . '/src/img/pages/special_projects/about-projects/' . $project['image'] . '.jpg') ?>"
                                          alt="<?= esc_attr($project['title']) ?>">
                                  <?php endif; ?>
                                 <div class="about-projects__item-text">
                                    <p class="about-projects__item-title"><?= esc_html($project['title']) ?></p>
                                    <p class="about-projects__item-desc"><?= esc_html($project['desc']) ?></p>
                                    <a class="about-projects__item-link" href="<?= esc_url($project['link']) ?>" target="_blank"><?= esc_html($project['text_link']) ?></a>
                                 </div>
                              </div>
                               <?php
                           }
                       }
                   
                   ?>
                   <?php foreach (['with_images', 'four_items', 'remaining'] as $group_key): ?>
                      <div class="about-projects__group">
                          <?php render_project_group($about_projects[$group_key]); ?>
                      </div>
                   <?php endforeach; ?>
               </div>
            </div>
         </div>
      </section>
      
      <div class="popup-message">
         <p>Это наши кейсы. Но не все!</p>
         <a href="https://crmgroup.ru/cases/" target="_blank">Больше кейсов</a>
      </div>
   
   </main>

<!--   --><?php
/*   get_template_part("template-parts/popup/popup", null, [
      'template' => "template-parts/contact-forms/content-form-request",
      '$params' => [
         "id" => "special-project-form-popup",
         "title" => "Заявка на встречу",
         "button" => "Отправить заявку на встречу",
         "action" => "crm_marketing",
         "mindbox-key" => "crmgroup_special_projects",
         "name-form" => "Геймификация",
      ]
   ]); */?>

   <?php
   $easter_popup_content = '
      <div class="heading-block">
          <div class="img">
               <img src="' . get_template_directory_uri() . '/src/img/pages/special_projects/popup/money.png" alt="Монетки">
          </div>
          <h3 class="h3">Официально награждаем тебя за&nbsp;любопытство виртуальными монетками</h3>
      </div>
   
      <button class="button button--white">Спасибо! Но зачем они мне…</button>
      <p>Да мы и сами не знаем ¯\_(ツ)_/¯</p>';

   get_template_part("template-parts/popup/popup", null, [
      'template' => $easter_popup_content,
      'args' => ['id' => 'easter-popup']
   ]); ?>

<?php
   $GLOBALS["footer_theme_type"] = "dark";
   get_footer();
?>



