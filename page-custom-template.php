<?php
    
    $GLOBALS['hide_breadcrumbs'] = true;
    
    get_header();

?>

<div class="page page-custom-template">
    <?php
        /*# The Page header */
        get_template_part('template-parts/content-page', 'header', [
            "heading"     => '<h1 class="h1 section-heading">Фирменный шаблон письма за 3 дня</h1>',
            "description" => 'Экономьте время и ресурсы. Сделайте рассылки запоминающимися. Увеличивайте конверсию.',
            "actions"     => '<a class="button button--bg" href="#form-request">Заказать шаблон</a>',
            "visual"      => '<div class="visual-content">' . get_the_post_thumbnail(get_the_ID(), 'full') . '</div>',
        ]);
    ?>
   <main class="page-content">
      <section class="section showcase-section">
         <div class="container">
            <div class="content">
               <div class="showcase-card dark-block">
                  <img class="showcase-card__icon" src="<?= get_template_directory_uri(); ?>/access/img/icons/cards/Inside-Icon-14.svg" alt="Иконка - Шаблон по вашему дизайну"/>
                  <p class="showcase-card__name">Шаблон по вашему дизайну</p>
                  <p class="showcase-card__price">от 30 000 ₽</p>
               </div>
               <div class="showcase-card dark-block">
                  <img class="showcase-card__icon" src="<?= get_template_directory_uri(); ?>/access/img/icons/cards/Inside-Icon-14.svg" alt="Иконка - Дизайн + шаблон"/>
                  <p class="showcase-card__name">Дизайн + шаблон</p>
                  <p class="showcase-card__price">от 60 000₽</p>
               </div>
            </div>
         </div>
      </section>
      <section class="section offerings-section">
         <div class="container">
            <div class="content">
               
               <div class="heading-block">
                  <h2 class="h2">Разработаем за&nbsp;3&nbsp;дня</h2>
               </div>
               
               <div class="offer-details">
                  <div class="offer-features">
                     <div class="feature-item">
                        <div class="feature-visual">
                           <video autoplay loop muted playsinline src="https://service.crmgroup.ru/video/Main1.mp4"></video>
                        </div>
                        <h4 class="h4 feature-title">Проверим на&nbsp;совместимость со&nbsp;100+ почтовыми клиентами</h4>
                     </div>
                     <div class="feature-item">
                        <div class="feature-visual">
                           <video autoplay loop muted playsinline src="https://service.crmgroup.ru/video/Main2.mp4"></video>
                        </div>
                        <h4 class="h4 feature-title">Создадим все&nbsp;необходимые блоки</h4>
                     </div>
                     <div class="feature-item">
                        <div class="feature-visual">
                           <video autoplay loop muted playsinline src="https://service.crmgroup.ru/video/Main3.mp4"></video>
                        </div>
                        <h4 class="h4 feature-title">Адаптируем шаблон под&nbsp;нишу и&nbsp;бизнес-задачи</h4>
                     </div>
                  </div>
               </div>
            
            </div>
         </div>
      </section>
       <?php get_template_part('template-parts/content-clients', null, [
           "new"         => true,
           "theme"       => "white",
           "title"       => '<h2 class="h2 heading">За десять лет мы поработали<br>с&nbsp;400+ брендами</h2>',
           "description" => '<a class="button button--bg" href="#form-request">Заказать шаблон</a>',
       ]); ?>
      <section class="section email-examples-section">
         <div class="container">
            <div class="content">
               <div class="heading-block">
                  <h2 class="h2 heading">Примеры писем, созданных по нашим шаблонам</h2>
                  <div class="actions">
                     <a class="details-link" href="https://ru.pinterest.com/crm_group/template-email/" target="_blank">Больше работ</a>
                  </div>
               </div>
               <div class="visual">
                  <div class="loop-carousel">
                      <?php
                          $base = get_template_directory_uri() . '/access/img/email-examples/';
                          $items = [];
                          
                          for ($i = 0; $i <= 9; $i++) {
                              $src = esc_url($base . "example-{$i}.jpg");
                              $items[] = '
                                   <div class="slide swiper-slide">
                                       <picture class="picture">
                                           <img src="' . $src . '"
                                                alt="Пример письма"
                                                rel="preload"
                                                class="img">
                                       </picture>
                                   </div>
                               ';
                          }
                          
                          get_template_part('template-parts/content-slider/content', 'slider', [
                              'slider_id'       => 'email-examples-carousel',
                              'slider_type'     => 'email-examples',
                              'items'           => $items,
                              'actions'         => null,
                              'show_navigation' => false,
                          ]);
                      ?>
                  </div>
                  <div class="actions">
                     <a class="details-link" href="https://ru.pinterest.com/crm_group/template-email/" target="_blank">Больше работ</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section form-section --white">
         <div class="container">
             <?php ob_start(); ?>
            <h2 class="h2 form-request__heading">Готовы к
               <br>
               общению
            </h2>
             <?php get_template_part("template-parts/content", "form-contacts", ["widget" => false]); ?>
             <?php
                 $slot_content = ob_get_clean();
                 
                 $params = [
                     "id"          => "main-form",
                     "slot"        => $slot_content,
                     "mindbox-key" => "crmgroup_main_footer",
                     "name-form"   => "Главная (в префутере)",
                 ];
                 get_template_part("template-parts/contact-forms/content", "form-request", $params);
             ?>
         </div>
      </section>
      <section class="section workflow-section">
         <div class="container">
            <div class="content split-container">
               <div class="heading-block">
                  <h2 class="h2">Как будем работать</h2>
               </div>
               <ol class="workflow-steps grey-block">
                  <li class="workflow-step">
                     <p>Вместе разбираем вашу задачу, находим лучшее решение.</p>
                  </li>
                  <li class="workflow-step">
                     <p>Мы верстаем адаптивный шаблон, тестируем его&nbsp;во&nbsp;всехпочтовиках.</p>
                  </li>
                  <li class="workflow-step">
                     <p>Вы получаете мастер-шаблон в&nbsp;фирменном стиле</p>
                  </li>
                  <li class="workflow-step">
                     <p>Мы оказываем поддержку, помогаем при&nbsp;необходимости обновлять шаблон или тестировать
                        новыеидеи
                     </p>
                  </li>
               </ol>
            </div>
         </div>
      </section>
       
       <?php
           /*# The FAQ section */
           $faq_items = [
               [
                   'title'   => 'Сколько времени занимает разработка шаблона?',
                   'content' => 'Обычно 3 дня, но всё зависит от сложности дизайна.',
               ],
               [
                   'title'   => 'Смогу ли я использовать шаблон в Mailchimp, Unisender, GetResponse и т.д.?',
                   'content' => 'Да, шаблон совместим практически со всеми известными ESP и CRM.',
               ],
               [
                   'title'   => 'Нужно ли платить за обновления?',
                   'content' => 'Нет, вы платите один раз за разработку, а шаблон остаётся в вашем распоряжении.',
               ],
               [
                   'title'   => 'Вы можете сделать несколько вариантов дизайна?',
                   'content' => 'Можем, это оговаривается отдельно.',
               ],
           ];
           
           get_template_part('template-parts/sections/faq/section-faq', null, [
               'items' => $faq_items,
               'mode'  => 'multiple',
           ]);
       ?>
   
   </main>
</div>

<?php
    get_footer();
?>

