<?php
    if (function_exists('add_filter')) {
        add_filter('wpseo_title', function ($title) {
            if (is_front_page()) {
                return 'CRM- и email-маркетинг для роста повторных продаж | CRM Group';
            }
            return $title;
        }, 999);

        add_filter('wpseo_metadesc', function ($description) {
            if (is_front_page()) {
                return 'CRM Group помогает выстроить CRM- и email-маркетинг: сегментация базы, триггерные и регулярные рассылки, автоматизация коммуникаций и рост удержания клиентов.';
            }
            return $description;
        }, 999);

        add_filter('wpseo_opengraph_title', function ($title) {
            if (is_front_page()) {
                return 'CRM- и email-маркетинг для роста повторных продаж | CRM Group';
            }
            return $title;
        }, 999);

        add_filter('wpseo_opengraph_desc', function ($description) {
            if (is_front_page()) {
                return 'CRM Group помогает выстроить CRM- и email-маркетинг: сегментация базы, триггерные и регулярные рассылки, автоматизация коммуникаций и рост удержания клиентов.';
            }
            return $description;
        }, 999);

        add_filter('wpseo_twitter_title', function ($title) {
            if (is_front_page()) {
                return 'CRM- и email-маркетинг для роста повторных продаж | CRM Group';
            }
            return $title;
        }, 999);

        add_filter('wpseo_twitter_description', function ($description) {
            if (is_front_page()) {
                return 'CRM Group помогает выстроить CRM- и email-маркетинг: сегментация базы, триггерные и регулярные рассылки, автоматизация коммуникаций и рост удержания клиентов.';
            }
            return $description;
        }, 999);

        add_filter('wpseo_schema_webpage', function ($data) {
            if (is_front_page()) {
                $data['name'] = 'CRM- и email-маркетинг для роста повторных продаж | CRM Group';
                $data['description'] = 'CRM Group помогает выстроить CRM- и email-маркетинг: сегментация базы, триггерные и регулярные рассылки, автоматизация коммуникаций и рост удержания клиентов.';
            }
            return $data;
        }, 999);

        add_filter('wpseo_schema_website', function ($data) {
            if (is_front_page()) {
                $data['description'] = 'CRM-маркетинг и email-маркетинг для роста повторных продаж и удержания клиентов.';
            }
            return $data;
        }, 999);

        add_filter('wpseo_metakey', function ($keywords) {
            if (is_front_page()) {
                return 'crm-маркетинг, email-маркетинг, e-mail маркетинг, автоматизация маркетинга, триггерные рассылки, удержание клиентов, повторные продажи, сегментация базы';
            }
            return $keywords;
        }, 999);
    }

    if (function_exists('add_action')) {
        add_action('wp_head', function () {
            if (!is_front_page()) {
                return;
            }
            echo '<meta name="keywords" content="crm-маркетинг, email-маркетинг, e-mail маркетинг, автоматизация маркетинга, триггерные рассылки, удержание клиентов, повторные продажи, сегментация базы">' . "\n";
        }, 1);
    }

    get_header();
?>
    
    <main class="main wrapper" id="main">
        <style id="homepage-three-blocks">
            /* Services: featured layout */
            .services-section .content .services {
                column-count: unset !important;
                display: grid !important;
                grid-template-columns: 1fr 1fr !important;
                grid-template-rows: auto auto auto !important;
                gap: 16px !important;
            }
            .services-section .content .service:first-child {
                grid-column: 1 !important;
                grid-row: 1 / -1 !important;
                position: relative !important;
                overflow: hidden !important;
                padding: 36px 28px 28px !important;
                margin-bottom: 0 !important;
                display: flex !important;
                flex-direction: column !important;
            }
            .services-section .content .service:first-child::before {
                content: '';
                position: absolute;
                left: -40px;
                top: -40px;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(192, 16, 32, 0.2) 0%, transparent 70%);
                pointer-events: none;
                z-index: 0;
            }
            .services-section .content .service:first-child .service-visual,
            .services-section .content .service:first-child .service-textual,
            .services-section .content .service:first-child .service-link {
                position: relative;
                z-index: 1;
            }
            .services-section .content .service:first-child .service-visual::before {
                content: 'Самый частый запрос';
                display: block;
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                color: #c01020;
                font-weight: 600;
                margin-bottom: 16px;
            }
            .services-section .content .service:first-child .service-visual {
                margin-bottom: 24px !important;
            }
            .services-section .content .service:first-child .service-icon {
                width: 56px !important;
                height: 56px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                background: rgba(255, 255, 255, 0.06) !important;
                border-radius: 14px !important;
            }
            .services-section .content .service:first-child .service-icon svg {
                width: 30px !important;
                height: 30px !important;
            }
            .services-section .content .service:first-child .service-title {
                font-size: 28px !important;
                margin-bottom: 14px !important;
            }
            .services-section .content .service:first-child .service-desc,
            .services-section .content .service:first-child .service-desc p {
                font-size: 16px !important;
                line-height: 1.6 !important;
                color: rgba(255, 255, 255, 0.6) !important;
            }
            .services-section .content .service:first-child .service-desc {
                flex: 1 !important;
            }
            .services-section .content .service:first-child .service-link a {
                font-size: 15px !important;
                color: #fff !important;
                transform: none !important;
                display: flex !important;
                align-items: center !important;
                gap: 8px !important;
            }
            .services-section .content .service:first-child .service-link a::after {
                content: '\2192';
                display: inline-block;
            }
            .services-section .content .service:first-child .service-textual {
                flex: 1 !important;
                display: flex !important;
                flex-direction: column !important;
            }
            .services-section .content .service:first-child .service-link {
                margin-top: auto !important;
                padding-top: 20px !important;
                border-top: 1px solid #333 !important;
            }
            .services-section .content .service:not(:first-child) {
                grid-column: 2 !important;
                display: flex !important;
                flex-direction: row !important;
                align-items: flex-start !important;
                gap: 20px !important;
                padding: 24px !important;
                margin-bottom: 0 !important;
            }
            .services-section .content .service:not(:first-child) .service-visual {
                flex-shrink: 0 !important;
                margin-bottom: 0 !important;
            }
            .services-section .content .service:not(:first-child) .service-icon {
                width: 44px !important;
                height: 44px !important;
                min-width: 44px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                background: rgba(255, 255, 255, 0.06) !important;
                border-radius: 11px !important;
            }
            .services-section .content .service:not(:first-child) .service-icon svg {
                width: 24px !important;
                height: 24px !important;
            }
            .services-section .content .service:not(:first-child) .service-icon .main_small_icon {
                display: none !important;
            }
            .services-section .content .service:not(:first-child) .service-textual {
                flex: 1 !important;
                min-width: 0 !important;
            }
            .services-section .content .service:not(:first-child) .service-title {
                font-size: 18px !important;
                margin-bottom: 6px !important;
            }
            .services-section .content .service:not(:first-child) .service-desc,
            .services-section .content .service:not(:first-child) .service-desc p {
                font-size: 14px !important;
                line-height: 1.5 !important;
                color: rgba(255, 255, 255, 0.6) !important;
            }
            .services-section .content .service:not(:first-child) .service-link a {
                font-size: 13px !important;
                color: rgba(255, 255, 255, 0.4) !important;
                transform: none !important;
            }
            .services-section .content .service-link {
                overflow: visible !important;
            }
            .services-section .content .service .details-link::after {
                display: none !important;
                content: none !important;
            }
            .services-section .content .service-title,
            .services-section .content .service-desc {
                transform: none !important;
                will-change: auto !important;
            }
            .services-section .content .service .service-link a {
                transform: none !important;
                will-change: auto !important;
            }
            @media (hover:hover) and (min-width:769px) {
                .services-section .content .service-title,
                .services-section .content .service-desc {
                    transform: none !important;
                }
                .services-section .content .service .service-link a {
                    transform: none !important;
                }
            }
            @media (max-width: 768px) {
                .services-section .content .services {
                    grid-template-columns: 1fr !important;
                    grid-template-rows: auto !important;
                }
                .services-section .content .service:first-child {
                    grid-column: 1 !important;
                    grid-row: auto !important;
                }
                .services-section .content .service:not(:first-child) {
                    grid-column: 1 !important;
                    flex-direction: column !important;
                }
                .services-section .content .service:first-child .service-title {
                    font-size: 24px !important;
                }
            }

            /* Awards strip */
            section.section.awards-section,
            .awards-section {
                padding: 0 !important;
                margin-top: 0 !important;
                margin-bottom: 0 !important;
                background: #1a1a1a !important;
            }
            section.awards-section + .wrapper-section {
                margin-top: 40px !important;
                background: #fff !important;
            }
            section.awards-section + .wrapper-section > .cases-section {
                border-top: none !important;
            }
            /* Trust block typography */
            #clients .split-hero .h2.heading {
                margin: 0 0 20px !important;
            }
            #clients .split-hero .desc {
                margin-top: 0 !important;
            }
            #clients .split-hero .desc p {
                margin: 0 !important;
                line-height: 1.55 !important;
                max-width: 620px !important;
            }
            .awards-strip-new {
                display: grid !important;
                grid-template-columns: repeat(3, 1fr) !important;
                border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
                align-items: stretch !important;
            }
            .awards-strip-slot-new {
                padding: 28px 36px !important;
                border-right: 1px solid rgba(255, 255, 255, 0.08) !important;
                display: flex !important;
                flex-direction: column !important;
                justify-content: center !important;
                min-height: 110px !important;
            }
            .awards-strip-slot-new .slot-content {
                min-height: var(--awards-slot-content-height, 0px);
            }
            .awards-strip-slot-new:last-child {
                border-right: none !important;
            }
            .slot-content-new {
                display: flex;
                flex-direction: column;
                gap: 5px;
                transition: opacity 0.35s ease, transform 0.35s ease;
                min-height: var(--awards-slot-content-height, 0px);
                justify-content: center;
            }
            .slot-content-new.fade-out {
                opacity: 0;
                transform: translateY(-8px);
            }
            .slot-content-new.fade-in {
                opacity: 0;
                transform: translateY(8px);
            }
            .slot-content-new.visible {
                opacity: 1;
                transform: translateY(0);
            }
            .slot-name {
                font-family: "TTRuns", sans-serif;
                font-weight: 700;
                font-size: 18px;
                color: #fff;
                line-height: 1.2;
            }
            .slot-desc {
                font-size: 13px;
                color: rgba(255, 255, 255, 0.45);
                line-height: 1.4;
            }
            .awards-dots-new {
                display: flex;
                gap: 6px;
                padding: 16px 0;
                justify-content: center !important;
            }
            .strip-dot {
                width: 24px;
                height: 3px;
                border-radius: 2px;
                background: rgba(255, 255, 255, 0.15);
                transition: background 0.3s, width 0.3s;
                cursor: pointer;
            }
            .strip-dot.active {
                background: #c01020;
                width: 32px;
            }

            /* Cases cards */
            .cases-section .cases-white-gallery {
                display: grid !important;
                grid-auto-flow: column !important;
                grid-auto-columns: 320px !important;
                gap: 16px !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scrollbar-width: none !important;
                padding-bottom: 4px !important;
            }
            .cases-section .cases-white-gallery::-webkit-scrollbar {
                display: none !important;
            }
            .cases-section .case-white {
                scroll-snap-align: start !important;
                background: #fff !important;
                border-radius: 16px !important;
                border: 1px solid #ececec !important;
                padding: 24px !important;
                display: flex !important;
                flex-direction: column !important;
                min-height: 320px !important;
                cursor: pointer !important;
                transition: transform .3s cubic-bezier(.4, 0, .2, 1), box-shadow .3s cubic-bezier(.4, 0, .2, 1) !important;
            }
            .cases-section .case-white:hover {
                transform: translateY(-4px) !important;
                box-shadow: 0 12px 40px rgba(0, 0, 0, .12) !important;
            }
            .cases-section .case-white__header {
                display: flex !important;
                justify-content: space-between !important;
                gap: 10px !important;
                align-items: center !important;
                margin-bottom: 18px !important;
            }
            .cases-section .case-white__category {
                font-family: "TTSmalls", sans-serif !important;
                font-size: 11px !important;
                font-weight: 700 !important;
                text-transform: uppercase !important;
                letter-spacing: .08em !important;
                color: #c01020 !important;
            }
            .cases-section .case-white__logo {
                height: 24px !important;
                width: auto !important;
                max-width: 100px !important;
                object-fit: contain !important;
                opacity: .35 !important;
            }
            .cases-section .case-white__metric {
                margin: 0 0 8px !important;
                font-family: "TTRuns", sans-serif !important;
                font-size: 44px !important;
                line-height: 1.05 !important;
                color: #1a1a1a !important;
                letter-spacing: -.02em !important;
            }
            .cases-section .case-white__desc {
                margin: 0 0 16px !important;
                font-size: 15px !important;
                line-height: 1.5 !important;
                color: #555 !important;
                display: -webkit-box !important;
                -webkit-line-clamp: 3 !important;
                -webkit-box-orient: vertical !important;
                overflow: hidden !important;
            }
            .cases-section .case-white__divider {
                height: 1px !important;
                background: #e6e6e6 !important;
                margin-bottom: 14px !important;
            }
            .cases-section .case-white__tags {
                display: flex !important;
                flex-wrap: wrap !important;
                gap: 6px !important;
                margin-top: auto !important;
                margin-bottom: 14px !important;
            }
            .cases-section .case-white__tag {
                padding: 4px 10px !important;
                border-radius: 6px !important;
                background: #f5f5f5 !important;
                font-size: 12px !important;
                color: #777 !important;
            }
            .cases-section .case-white__cta {
                color: #c01020 !important;
                font-size: 14px !important;
                font-weight: 600 !important;
            }
            .cases-section .case-white__cta-arrow {
                display: inline-block !important;
                transition: transform .3s ease !important;
            }
            .cases-section .case-white:hover .case-white__cta-arrow {
                transform: translateX(4px) !important;
            }
            .cases-section .slider__action-panel--cases-ref {
                margin-top: 28px !important;
            }
            .cases-section .slider__action-panel--cases-ref .slider__navigation {
                display: flex !important;
                gap: 10px !important;
            }

            /* Expert materials: DS typography */
            .expert-experience-section .split-content .summary .title {
                font-family: "TTRuns", sans-serif !important;
                font-weight: 700 !important;
                font-size: 36px !important;
                line-height: 1.15 !important;
                letter-spacing: 0 !important;
                color: #1a1a1a !important;
                margin: 0 0 20px !important;
            }
            .expert-experience-section .split-content .summary .desc p {
                font-family: "TTSmalls", sans-serif !important;
                font-weight: 500 !important;
                font-size: 15px !important;
                line-height: 1.65 !important;
                color: #555 !important;
                margin: 0 0 12px !important;
            }
            .expert-experience-section .split-content .summary .desc p:last-child {
                margin-bottom: 28px !important;
            }
            @media (max-width: 768px) {
                .page-header .visual {
                    display: none !important;
                }
                .page-header .content {
                    min-height: auto !important;
                    height: auto !important;
                    grid-template-columns: 1fr !important;
                }
                .page-header .headline {
                    max-width: 100% !important;
                    width: 100% !important;
                    min-width: 0 !important;
                }
                .page-header .headline .section-heading {
                    font-size: clamp(32px, 9.4vw, 42px) !important;
                    line-height: .98 !important;
                    letter-spacing: -0.01em !important;
                    margin-bottom: 20px !important;
                    white-space: normal !important;
                    overflow-wrap: anywhere !important;
                    word-break: normal !important;
                    hyphens: auto !important;
                }
                section.awards-section + .wrapper-section {
                    margin-top: 24px !important;
                }
                #clients .split-hero .h2.heading {
                    margin-bottom: 14px !important;
                }
                #clients .split-hero .desc p {
                    max-width: 100% !important;
                }
                .awards-strip-new {
                    grid-template-columns: 1fr !important;
                }
                .awards-strip-slot-new {
                    border-right: none !important;
                    border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
                    padding: 20px !important;
                    min-height: auto !important;
                }
                .awards-strip-slot-new:last-child {
                    border-bottom: none !important;
                }
                .cases-section .cases-white-gallery {
                    grid-auto-columns: 280px !important;
                }
                .cases-section .slider__action-panel--cases-ref .slider__navigation {
                    display: none !important;
                }
                .expert-experience-section .split-content .summary .title {
                    font-size: 30px !important;
                }
            }
        </style>
        
        <?php
            /*# The Page header */
            
            $visual = '<div class="visual-contnet">
                      <video autoplay muted playsinline preload="metadata" class="video-autoplay">
                             <source media="(min-width: 769px)" src="' . get_template_directory_uri() . '/src/video/c1_1.mp4" type="video/mp4">
                         </video>
                         <video muted loop playsinline preload="none" class="video-loop" style="display:none;">
                             <source data-src="' . get_template_directory_uri() . '/src/video/c2_1.mp4" type="video/mp4">
                         </video>
                     </div>';
            
            get_template_part('template-parts/content-page', 'header', [
                "theme"        => "white",
                "name-section" => "intro",
                "heading"      => '<h1 class="h1 section-heading">Делаем клиентов постоянными</h1>',
                "description"  => "",
                "actions"      => '<a class="button button--bg" href="#form-request-main-form">Оставить заявку</a>',
                "visual"       => $visual,
            ]);
        ?>
        
        <section class="section services-section">
            <div class="container">
                <div class="content">
                    <div class="services">
                        <div class="service dark-block">
                            <div class="service-visual">
                                <div class="service-icon">
                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.5 1.875C3.05025 1.875 1.875 3.05025 1.875 4.5V25.5C1.875 26.9497 3.05025 28.125 4.5 28.125H31.5C32.9497 28.125 34.125 26.9497 34.125 25.5V4.5C34.125 3.05025 32.9497 1.875 31.5 1.875H4.5Z"
                                              stroke="white" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M13.7637 28.125H22.2364L29.0582 32.0232C29.5977 32.3315 29.7851 33.0187 29.4768 33.5581C29.1686 34.0976 28.4814 34.285 27.9419 33.9767L19.1251 28.9385V33C19.1251 33.6214 18.6214 34.125 18.0001 34.125C17.3787 34.125 16.8751 33.6214 16.8751 33V28.9385L8.05823 33.9767C7.51877 34.285 6.83156 34.0976 6.5233 33.5581C6.21504 33.0187 6.40246 32.3315 6.94191 32.0232L13.7637 28.125Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M6.375 7.5C6.375 6.87868 6.87868 6.375 7.5 6.375H13.5C14.1213 6.375 14.625 6.87868 14.625 7.5C14.625 8.12132 14.1213 8.625 13.5 8.625H7.5C6.87868 8.625 6.375 8.12132 6.375 7.5Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M6.375 12C6.375 11.3787 6.87868 10.875 7.5 10.875H15C15.6213 10.875 16.125 11.3787 16.125 12C16.125 12.6213 15.6213 13.125 15 13.125H7.5C6.87868 13.125 6.375 12.6213 6.375 12Z"
                                              fill="white"/>
                                        <path d="M19.5 6.375C18.8787 6.375 18.375 6.87868 18.375 7.5V12C18.375 12.6213 18.8787 13.125 19.5 13.125H28.5C29.1213 13.125 29.625 12.6213 29.625 12V7.5C29.625 6.87868 29.1213 6.375 28.5 6.375H19.5Z"
                                              fill="white"/>
                                        <path d="M7.5 15.375C6.87868 15.375 6.375 15.8787 6.375 16.5V22.5C6.375 23.1213 6.87868 23.625 7.5 23.625H15C15.6213 23.625 16.125 23.1213 16.125 22.5V16.5C16.125 15.8787 15.6213 15.375 15 15.375H7.5Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M19.5 16.875C20.1213 16.875 20.625 17.3787 20.625 18V22.5C20.625 23.1213 20.1213 23.625 19.5 23.625C18.8787 23.625 18.375 23.1213 18.375 22.5V18C18.375 17.3787 18.8787 16.875 19.5 16.875Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M24 18.375C24.6213 18.375 25.125 18.8787 25.125 19.5V22.5C25.125 23.1213 24.6213 23.625 24 23.625C23.3787 23.625 22.875 23.1213 22.875 22.5V19.5C22.875 18.8787 23.3787 18.375 24 18.375Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M28.5 15.375C29.1213 15.375 29.625 15.8787 29.625 16.5V22.5C29.625 23.1213 29.1213 23.625 28.5 23.625C27.8787 23.625 27.375 23.1213 27.375 22.5V16.5C27.375 15.8787 27.8787 15.375 28.5 15.375Z"
                                              fill="white"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="service-textual">
                                <p class="h4 service-title">СRM-маркетинг</p>
                                <div class="service-desc">
                                    <p>Построим персональную омниканальную коммуникацию с&nbsp;тысячами клиентов</p>
                                </div>
                                <div class="service-link">
                                    <a class="details-link" href="/crm-marketing/">Подробнее про услугу</a>
                                </div>
                            </div>
                        </div>
                        <div class="service dark-block">
                            <div class="service-visual">
                                <div class="service-icon">
                                    <svg width="29" height="34" viewBox="0 0 29 34" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_1280)">
                                            <path d="M27.625 16.875V6.375C27.625 3.2684 25.1066 0.75 22 0.75H7C3.8934 0.75 1.375 3.2684 1.375 6.375V27.375C1.375 30.4816 3.8934 33 7 33H12.2217"
                                                  stroke="white" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.375 9.375C7.375 8.75368 7.87868 8.25 8.5 8.25H20.5C21.1213 8.25 21.625 8.75368 21.625 9.375C21.625 9.99632 21.1213 10.5 20.5 10.5H8.5C7.87868 10.5 7.375 9.99632 7.375 9.375Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.375 16.875C7.375 16.2537 7.87868 15.75 8.5 15.75H20.5C21.1213 15.75 21.625 16.2537 21.625 16.875C21.625 17.4963 21.1213 18 20.5 18H8.5C7.87868 18 7.375 17.4963 7.375 16.875Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.375 24.375C7.375 23.7537 7.87868 23.25 8.5 23.25H14.5C15.1213 23.25 15.625 23.7537 15.625 24.375C15.625 24.9963 15.1213 25.5 14.5 25.5H8.5C7.87868 25.5 7.375 24.9963 7.375 24.375Z"
                                                  fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1_1280">
                                                <rect width="28.5" height="33.75" fill="white" transform="translate(0.25)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <svg class="main_small_icon" width="17" height="17" viewBox="0 0 17 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_1285)">
                                            <path d="M13.6858 2.7671C12.6392 1.72054 10.9424 1.72054 9.89585 2.7671L7.69691 4.96615C7.25759 5.4055 7.25761 6.11779 7.69694 6.55712L10.9954 9.85555C11.2064 10.0665 11.4926 10.1851 11.7909 10.1851C12.0893 10.185 12.3754 10.0665 12.5864 9.85553L14.7853 7.6565C15.8319 6.60993 15.8319 4.91313 14.7853 3.86657L13.6858 2.7671Z"
                                                  stroke="white" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M9.28789 4.96622C8.84855 4.52689 8.13625 4.52689 7.69691 4.96622L2.19946 10.4636C2.02733 10.6357 1.91568 10.859 1.88125 11.1L1.33151 14.9482C1.28143 15.2987 1.39932 15.6524 1.64971 15.9028C1.90009 16.1532 2.25376 16.271 2.6043 16.221L6.45252 15.6712C6.69348 15.6368 6.91679 15.5252 7.08891 15.353L12.5864 9.85565C12.7973 9.64467 12.9159 9.35852 12.9159 9.06015C12.9159 8.76178 12.7973 8.47563 12.5864 8.26465L9.28789 4.96622Z"
                                                  fill="white" stroke="white" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1_1285">
                                                <rect width="16.5" height="16.5" fill="white"
                                                      transform="translate(0.249939 0.5)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="service-textual">
                                <p class="h4 service-title">Спецпроекты и&nbsp;геймификация</p>
                                <div class="service-desc">
                                    <p>
                                        Придумаем и&nbsp;запустим игру, которая быстро монетизирует вашу базу клиентов
                                    </p>
                                </div>
                                <div class="service-link">
                                    <a class="details-link" href="https://crmgroup.ru/special-projects/">Подробнее про услугу</a>
                                </div>
                            </div>
                        </div>
                        <div class="service dark-block">
                            <div class="service-visual">
                                <div class="service-icon">
                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_1294)">
                                            <path d="M12.2705 20.625C10.9315 20.625 9.61092 20.9368 8.41329 21.5356L2.49688 24.4938C2.11575 24.6843 1.875 25.0739 1.875 25.5C1.875 25.9261 2.11575 26.3157 2.49688 26.5062L17.4969 34.0062C17.8136 34.1646 18.1864 34.1646 18.5031 34.0062L33.5031 26.5062C33.8842 26.3157 34.125 25.9261 34.125 25.5C34.125 25.0739 33.8842 24.6843 33.5031 24.4938L27.5867 21.5356C26.3891 20.9368 25.0685 20.625 23.7295 20.625H12.2705Z"
                                                  stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.98443 14.25L17.4969 19.0062C17.8136 19.1646 18.1864 19.1646 18.5031 19.0062L28.0156 14.25L33.5031 16.9938C33.8842 17.1843 34.125 17.5739 34.125 18C34.125 18.4261 33.8842 18.8157 33.5031 19.0062L18.5031 26.5062C18.1864 26.6646 17.8136 26.6646 17.4969 26.5062L2.49688 19.0062C2.11575 18.8157 1.875 18.4261 1.875 18C1.875 17.5739 2.11575 17.1843 2.49688 16.9938L7.98443 14.25Z"
                                                  fill="white"/>
                                            <path d="M7.98443 14.25L8.43164 13.3556C8.15011 13.2148 7.81874 13.2148 7.53721 13.3556L7.98443 14.25ZM17.4969 19.0062L17.9441 18.1118V18.1118L17.4969 19.0062ZM18.5031 19.0062L18.0559 18.1118V18.1118L18.5031 19.0062ZM28.0156 14.25L28.4628 13.3556C28.1813 13.2148 27.8499 13.2148 27.5684 13.3556L28.0156 14.25ZM33.5031 16.9938L33.9503 16.0993L33.9503 16.0993L33.5031 16.9938ZM33.5031 19.0062L33.9503 19.9007L33.9503 19.9007L33.5031 19.0062ZM18.5031 26.5062L18.0559 25.6118L18.0559 25.6118L18.5031 26.5062ZM17.4969 26.5062L17.9441 25.6118L17.9441 25.6118L17.4969 26.5062ZM2.49688 19.0062L2.04967 19.9007L2.04967 19.9007L2.49688 19.0062ZM2.49688 16.9938L2.04967 16.0993H2.04967L2.49688 16.9938ZM7.53721 15.1444L17.0497 19.9007L17.9441 18.1118L8.43164 13.3556L7.53721 15.1444ZM17.0497 19.9007C17.6479 20.1998 18.3521 20.1998 18.9503 19.9007L18.0559 18.1118C18.0207 18.1294 17.9793 18.1294 17.9441 18.1118L17.0497 19.9007ZM18.9503 19.9007L28.4628 15.1444L27.5684 13.3556L18.0559 18.1118L18.9503 19.9007ZM33.9503 16.0993L28.4628 13.3556L27.5684 15.1444L33.0559 17.8882L33.9503 16.0993ZM35.125 18C35.125 17.1951 34.6702 16.4593 33.9503 16.0993L33.0559 17.8882C33.0982 17.9094 33.125 17.9527 33.125 18H35.125ZM33.9503 19.9007C34.6702 19.5407 35.125 18.8049 35.125 18H33.125C33.125 18.0473 33.0982 18.0906 33.0559 18.1118L33.9503 19.9007ZM18.9503 27.4007L33.9503 19.9007L33.0559 18.1118L18.0559 25.6118L18.9503 27.4007ZM17.0497 27.4007C17.6479 27.6998 18.3521 27.6998 18.9503 27.4007L18.0559 25.6118C18.0207 25.6294 17.9793 25.6294 17.9441 25.6118L17.0497 27.4007ZM2.04967 19.9007L17.0497 27.4007L17.9441 25.6118L2.9441 18.1118L2.04967 19.9007ZM0.875 18C0.875 18.8049 1.32976 19.5407 2.04967 19.9007L2.9441 18.1118C2.90175 18.0906 2.875 18.0473 2.875 18H0.875ZM2.04967 16.0993C1.32976 16.4593 0.875 17.1951 0.875 18H2.875C2.875 17.9527 2.90175 17.9094 2.9441 17.8882L2.04967 16.0993ZM7.53721 13.3556L2.04967 16.0993L2.9441 17.8882L8.43164 15.1444L7.53721 13.3556Z"
                                                  fill="white"/>
                                            <path d="M18.5031 1.99377C18.1864 1.83541 17.8136 1.83541 17.4969 1.99377L2.49688 9.49377C2.11575 9.68434 1.875 10.0739 1.875 10.5C1.875 10.9261 2.11575 11.3157 2.49688 11.5062L17.4969 19.0062C17.8136 19.1646 18.1864 19.1646 18.5031 19.0062L33.5031 11.5062C33.8842 11.3157 34.125 10.9261 34.125 10.5C34.125 10.0739 33.8842 9.68434 33.5031 9.49377L18.5031 1.99377Z"
                                                  stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1_1294">
                                                <rect width="36" height="36" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="service-textual">
                                <p class="h4 service-title">
                                    Дизайн-поддержка
                                </p>
                                <div class="service-desc">
                                    <p>
                                        Единый визуальный язык коммуникаций на сайте, в email и внутри продукта.
                                    </p>
                                </div>
                                <div class="service-link">
                                    <a class="details-link" href="https://crmgroup.ru/design-support">Подробнее
                                        про услугу
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="service dark-block">
                            <div class="service-visual">
                                <div class="service-icon">
                                    <svg width="36" height="36" viewBox="0 0 25 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_6102_1550)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.743 4.12196C24.743 4.12196 24.507 2.41196 23.783 1.65896C22.864 0.668957 21.835 0.664957 21.363 0.607957C17.983 0.355957 12.915 0.355957 12.915 0.355957H12.904C12.904 0.355957 7.83398 0.355957 4.45498 0.607957C3.98298 0.664957 2.95398 0.669957 2.03498 1.65796C1.31098 2.41196 1.07498 4.12196 1.07498 4.12196C1.07498 4.12196 0.833984 6.12996 0.833984 8.13896V10.022C0.833984 12.031 1.07498 14.039 1.07498 14.039C1.07498 14.039 1.31098 15.749 2.03498 16.502C2.95398 17.491 4.16098 17.46 4.69798 17.563C6.62998 17.753 12.909 17.813 12.909 17.813C12.909 17.813 17.984 17.805 21.363 17.553C21.835 17.495 22.865 17.491 23.783 16.502C24.507 15.749 24.743 14.039 24.743 14.039C24.743 14.039 24.985 12.031 24.985 10.022V8.13896C24.985 6.13096 24.743 4.12196 24.743 4.12196ZM1.43298 7.09896C1.25887 7.01011 1.12718 6.85573 1.06689 6.66979C1.0066 6.48385 1.02264 6.28157 1.11148 6.10746C1.20033 5.93334 1.35471 5.80165 1.54065 5.74136C1.72659 5.68107 1.92887 5.69711 2.10298 5.78596L12.377 11.024C12.5173 11.0954 12.6724 11.1328 12.8299 11.1329C12.9873 11.1331 13.1426 11.0961 13.283 11.025L23.64 5.78196C23.8141 5.69686 24.0147 5.68366 24.1985 5.74522C24.3822 5.80677 24.5344 5.93815 24.6221 6.11096C24.7098 6.28377 24.7261 6.48415 24.6673 6.66883C24.6085 6.8535 24.4795 7.00764 24.308 7.09796L13.285 12.699C13.1442 12.7706 12.9884 12.8079 12.8304 12.8077C12.6724 12.8075 12.5166 12.7699 12.376 12.698L1.43198 7.09796L1.43298 7.09896Z" fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_6102_1550">
                                                <rect width="25" height="18" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="service-textual">
                                <p class="h4 service-title">
                                    Email-маркетинг
                                </p>
                                <div class="service-desc">
                                    <p>
                                        Запускаем системные рассылки и цепочки, которые дают повторные продажи.
                                    </p>
                                </div>
                                <div class="service-link">
                                    <a class="details-link" href="https://crmgroup.ru/email-marketing-pod-klyuch/">Подробнее
                                        про услугу
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions-block">
                        <a class="button button--bg" href="#form-request-main-form">Оставить заявку</a>
                    </div>
                </div>
            </div>
        </section>

        <?php
            $awards_home = [
                [ 'name' => 'МИКС Россия — 2024', 'desc' => 'Спецпроект к Национальному дню донора с участием российских актёров' ],
                [ 'name' => 'Ruward', 'desc' => 'CRM-агентство года 2024' ],
                [ 'name' => 'Ruward', 'desc' => 'Лучшее агентское медиа 2024' ],
                [ 'name' => 'Unisender Go 2024', 'desc' => 'Победители в номинации писем, которые читают артисты театра и кино' ],
                [ 'name' => 'Рейтинг работодателей hh.ru', 'desc' => '7 место среди небольших компаний в 2024 году' ],
                [ 'name' => 'Martech Star Awards', 'desc' => 'Рост показателей рассылок в 1,5× через тестирование гипотез' ],
                [ 'name' => 'Perspectum Awards', 'desc' => 'Адвент-календарь ХК Металлург — рост базы на 14%' ],
                [ 'name' => 'Marspo Awards', 'desc' => 'Новогодний спецпроект для болельщиков хоккея' ],
                [ 'name' => 'Апостол Медиа', 'desc' => 'TG канал «Дерзкий Репетитор»' ],
            ];
            $awards_home_groups = (int) ceil(count($awards_home) / 3);
        ?>
        <section class="section awards-section">
            <div class="awards-strip-new awards-strip" id="awardsStripHome">
                <?php for ($slot = 0; $slot < 3; $slot++): ?>
                    <?php $award_item = $awards_home[$slot] ?? null; ?>
                    <div class="awards-strip-slot-new awards-strip-slot">
                        <div class="slot-content visible" id="awards-home-slot-<?php echo $slot; ?>">
                            <?php if (!empty($award_item)): ?>
                                <div class="slot-content-new visible">
                                    <div class="slot-name"><?php echo esc_html($award_item['name']); ?></div>
                                    <div class="slot-desc"><?php echo esc_html($award_item['desc']); ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="awards-dots-new awards-strip-dots" id="awardsDotsHome">
                <?php for ($dot = 0; $dot < $awards_home_groups; $dot++): ?>
                    <button type="button" class="strip-dot<?php echo $dot === 0 ? ' active' : ''; ?>"></button>
                <?php endfor; ?>
            </div>
        </section>
        
        <div class="wrapper-section">
            
            <section class="cases-section">
                <div class="container">
                    
                    <div class="content">
                        
                        <div class="heading-block">
                            <h2 class="h2">Доказываем делом</h2>
                        </div>
                        <div class="cases-slider">
                            <div class="cases-white-gallery" id="casesGalleryB">
                                <article class="case-white" onclick="window.open('https://crmgroup.ru/cases/special-project-for-donorsearch/')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Спецпроекты</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2024/07/DonorSearch-B4znt3UF.png" alt="DonorSearch">
                                    </div>
                                    <p class="case-white__metric">4000+</p>
                                    <p class="case-white__desc">имейлов собрали для НКО без бюджета на&nbsp;продвижение</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Лидогенерация</span>
                                        <span class="case-white__tag">Сайты и лендинги</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://crmgroup.ru/cases/advent-calendar-metallurg/')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Спорт</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2024/01/logo.png" alt="Металлург">
                                    </div>
                                    <p class="case-white__metric">+14,43%</p>
                                    <p class="case-white__desc">выросла база подписчиков ХК&nbsp;&laquo;Металлург&raquo;</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Лидогенерация</span>
                                        <span class="case-white__tag">Спецпроекты</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://crmgroup.ru/cases/tinkoff-special-project/')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Банки и финансы</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/light.png" alt="Tinkoff">
                                    </div>
                                    <p class="case-white__metric">14%</p>
                                    <p class="case-white__desc">конверсия в&nbsp;заявку на&nbsp;кредит</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Спецпроекты</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://crmgroup.ru/cases/design-system/')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Недвижимость</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/samolet_infoblock_rgb-blue.png" alt="Самолёт">
                                    </div>
                                    <p class="case-white__metric">в 3 раза</p>
                                    <p class="case-white__desc">быстрее собираем макет письма после внедрения дизайн-системы</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Бэкстейдж</span>
                                        <span class="case-white__tag">Дизайн-поддержка</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://emailsoldiers.ru/cases/miele')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">E-commerce</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/Miele_Logo_M_Red_sRGB.png" alt="Miele">
                                    </div>
                                    <p class="case-white__metric">94 млн&nbsp;&#8381;</p>
                                    <p class="case-white__desc">принесли рассылки с&nbsp;1448 заказов</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Email-маркетинг</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://emailsoldiers.ru/cases/vichy-triggers')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Бьюти</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/logo.svg" alt="Vichy">
                                    </div>
                                    <p class="case-white__metric">+36%</p>
                                    <p class="case-white__desc">вырос средний чек по триггерным письмам</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Email-маркетинг</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://emailsoldiers.ru/cases/who-the-hell-is-kolya')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">HoReCa</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/Без-названия.png" alt="Burger King">
                                    </div>
                                    <p class="case-white__metric">+75%</p>
                                    <p class="case-white__desc">выросла база адресов за&nbsp;полгода работы</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">CRM-маркетинг</span>
                                        <span class="case-white__tag">Лидогенерация</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://emailsoldiers.ru/cases/spadream-260')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Бьюти</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/spadream.png" alt="SPA Dream">
                                    </div>
                                    <p class="case-white__metric">+260%</p>
                                    <p class="case-white__desc">к&nbsp;продажам в&nbsp;интернет-магазине косметики</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">Email-маркетинг</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                                <article class="case-white" onclick="window.open('https://emailsoldiers.ru/cases/kerastase-widget')">
                                    <div class="case-white__header">
                                        <span class="case-white__category">Бьюти</span>
                                        <img class="case-white__logo" src="https://crmgroup.ru/wp-content/uploads/2023/08/kerastaselogo.png" alt="Kérastase">
                                    </div>
                                    <p class="case-white__metric">+80%</p>
                                    <p class="case-white__desc">к&nbsp;конверсии с&nbsp;помощью маленького виджета для карточки товара</p>
                                    <div class="case-white__divider"></div>
                                    <div class="case-white__tags">
                                        <span class="case-white__tag">CRM-маркетинг</span>
                                        <span class="case-white__tag">Сайты и лендинги</span>
                                    </div>
                                    <span class="case-white__cta">Читать кейс <span class="case-white__cta-arrow">&rarr;</span></span>
                                </article>
                            </div>
                            <div class="slider__action-panel slider__action-panel--cases-ref" data-type="cases">
                                <a class="button button--bg" href="/cases/">Смотреть больше</a>
                                <div class="slider__navigation" data-type="cases">
                                    <button class="button-navigation button-navigation--prev" type="button" onclick="scrollCases(-1)">
                                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 1L1 6L5 11" stroke="#595959"/></svg>
                                    </button>
                                    <button class="button-navigation button-navigation--next" type="button" onclick="scrollCases(1)">
                                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 6L1 11" stroke="#595959"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                
                </div>
            </section>
            
            <section class="expert-experience-section">
                <div class="container">
                    <div class="split-content">
                        <div class="summary">
                            <h2 class="h2 title">
                                Экспертные материалы
                            </h2>
                            <div class="desc">
                                <p>Собрали в контент-хабе практику от команды CRM Group: статьи, гайды и разборы кейсов.</p>
                                <p>Можно скачать PDF с инструкциями и готовыми схемами коммуникаций или подписаться на рассылку: раз в две недели присылаем новые материалы.</p>
                            </div>
                            <div class="actions">
                                <a class="button button--bg" href="/blog/">
                                    Перейти в блог &rarr;
                                </a>
                            </div>
                        </div>
                        
                        <div class="articles">
                            <?php
                                $params = array(
                                    'post_type'   => 'blog',
                                    'numberposts' => 3,
                                );
                                $recent_posts_array = get_posts($params);
                                $i = 1;
                                foreach ($recent_posts_array as $recent_post_single) {
                                    $category = wp_get_post_categories($recent_post_single->ID, array('fields' => 'names'));
                                    $user_photo = get_user_meta($recent_post_single->post_author, 'user_photo', true);
                                    if (!$user_photo) {
                                        $user_photo = 5803;
                                    }
                                    $user_photo_src = wp_get_attachment_image_url($user_photo, 'full');
                                    ?>
                                    
                                    <div class="card-article">
                                        <div class="card-article__textual">
                                            <div class="card-article__textual__data">
                                                <p><?= !empty($category[0]) ? esc_html($category[0]) : 'Контент-маркетинг'; ?></p>
                                                <p><?= date('d.m.Y', strtotime($recent_post_single->post_date)); ?></p>
                                                <p>читать <?= esc_html(est_read_time($recent_post_single->ID)); ?></p>
                                            </div>
                                            <div class="card-article__textual__head">
                                                <?= $recent_post_single->post_title ?>
                                            </div>
                                            <div class="card-article__textual__desc">
                                                <?= $recent_post_single->post_excerpt ?>
                                            </div>
                                            <a class="card-article__textual__link" href="/blog/<?= $recent_post_single->post_name ?>/"></a>
                                        </div>
                                        <?php if ($i == 1 && !empty($user_photo_src)): ?>
                                            <div class="card-article__visual">
                                                <img data-src="<?= $user_photo_src ?>" src="<?= $user_photo_src ?>" alt="<?= esc_attr($recent_post_single->post_title); ?>" class="img">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php $i++;
                                } ?>
                        </div>
                        
                        <div class="articles-slider">
                            
                            <?php
                                $items = [];
                                
                                foreach ($recent_posts_array as $recent_post_single) {
                                    $items[] = '
                                 <div class="gray-block small_article_content">
                                    <div class="card-article__textual__data">
                                        <p>Контент-маркетинг</p>
                                        <p>' . date('d.m.Y', strtotime($recent_post_single->post_date)) . ' · читать ' . esc_html(est_read_time($recent_post_single->ID)) . '</p>
                                    </div>
                                    <div class="card-article__textual__head">
                                        ' . esc_html($recent_post_single->post_title) . '
                                    </div>
                                    <div class="card-article__textual__desc">
                                        ' . esc_html($recent_post_single->post_excerpt) . '
                                    </div>
                                    <div class="main_flex_block_link">
                                        <a href="/blog/' . esc_attr($recent_post_single->post_name) . '/"></a>
                                    </div>
                                 </div>
                              ';
                                }
                                
                                get_template_part('template-parts/content-slider/content', 'slider', [
                                    'slider_id'       => 'swiperArticles',
                                    'slider_type'     => 'articles',
                                    'items'           => $items,
                                    'actions'         => [
                                        "<a class='button button--bg' href='/blog/'>Все статьи</a>",
                                    ],
                                    'show_navigation' => true,
                                ]);
                            ?>
                        
                        </div>
                    
                    </div>
                </div>
            </section>
        
        </div>
        
        <section class="section about-section">
            <div class="container">
                <div class="content">
                    <div class="textual">
                        <h2 class="h2">За каждым проектом —<br>команда</h2>
                        <div class="summary">
                            <p>Чем дольше работаем, тем глубже знаем ваш бизнес. И тем точнее результат.</p>
                        </div>
                    </div>
                    <div class="visual">
                        <div class="loop-carousel">
                            <?php
                                $images = [
                                    get_template_directory_uri() . '/src/img/team/1',
                                    get_template_directory_uri() . '/src/img/team/2',
                                    get_template_directory_uri() . '/src/img/team/3',
                                    get_template_directory_uri() . '/src/img/team/4',
                                    get_template_directory_uri() . '/src/img/team/5',
                                    get_template_directory_uri() . '/src/img/team/6',
                                    get_template_directory_uri() . '/src/img/team/7',
                                ];
                                
                                $items = [];
                                
                                foreach ($images as $image) {
                                    $items[] = '
                                <div class="team-slide swiper-slide">
                                    <picture class="picture">
                                        <source srcset="' . esc_url($image) . '.webp" type="image/webp">
                                        <img src="' . esc_url($image) . '.jpg"
                                             alt="Team member"
                                             rel="preload"
                                             class="img">
                                    </picture>
                                </div>
                            ';
                                }
                                
                                get_template_part('template-parts/content-slider/content', 'slider', [
                                    'slider_id'       => 'team-carousel',
                                    'slider_type'     => 'team',
                                    'items'           => $items,
                                    'actions'         => null,
                                    'show_navigation' => false,
                                ]);
                            ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php
            $args = [
                "new"   => true,
                "theme" => "white",
            ];
            ob_start();
            get_template_part('template-parts/content-clients', null, $args);
            $clients_html = ob_get_clean();
            $clients_html = preg_replace('/<h2 class="h2 heading">\\s*Работаем\\s*<br>\\s*с\\s*&nbsp;лучшими\\s*<\\/h2>/u', '<h2 class="h2 heading">Нам доверяют</h2>', $clients_html);
            $clients_html = str_replace('Мы ценим долгосрочное сотрудничество. За это время мы оказали услуги для более чем 400 клиентов.', 'Работаем с вами вдолгую: уже помогли более 400 компаниям выстроить CRM-коммуникации и расти за счёт удержания клиентов.', $clients_html);
            echo $clients_html; ?>
        
        <section class="section form-section --white" id="form-request">
            <div class="container">
                <?php ob_start(); ?>
                <h2 class="h2 form-request__heading">Обсудим вашу
                    <br>
                    задачу
                </h2>
                <?php get_template_part("template-parts/content", "form-contacts", ["widget" => false]); ?>
                <?php
                    $slot_content = ob_get_clean();
                    $slot_content = str_replace('>Звоните<', '>По телефону<', $slot_content);
                    $slot_content = str_replace('>Пишите<', '>На почту<', $slot_content);
                    
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
        <script id="homepage-three-blocks-js">
            function scrollCases(dir) {
                var el = document.getElementById('casesGalleryB');
                if (!el) return;
                var card = el.querySelector('.case-white');
                var step = (card ? card.getBoundingClientRect().width : 320) + 16;
                el.scrollBy({ left: dir * step, behavior: 'smooth' });
            }

            (function () {
                var awards = <?php echo wp_json_encode($awards_home, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

                var slots = [0, 1, 2];
                var idx = 0;
                var groups = Math.ceil(awards.length / 3);
                var timer = null;
                var resizeTimer = null;
                var stripId = 'awardsStripHome';
                var dotsId = 'awardsDotsHome';
                var slotPrefix = 'awards-home-slot-';
                var dotsInitialized = false;

                /* Remove stray duplicate nodes with legacy IDs outside awards section */
                (function cleanupLegacyAwardsNodes() {
                    var section = document.querySelector('section.awards-section');
                    if (!section) return;
                    var legacyDots = document.querySelectorAll('#awardsDots');
                    legacyDots.forEach(function (el) {
                        if (!section.contains(el)) el.remove();
                    });
                    var legacyStrips = document.querySelectorAll('#awardsStrip');
                    legacyStrips.forEach(function (el) {
                        if (!section.contains(el)) el.remove();
                    });
                })();

                function ensureDots() {
                    var dotsEl = document.getElementById(dotsId);
                    if (!dotsEl || dotsInitialized) return;
                    dotsEl.innerHTML = '';
                    for (var d = 0; d < groups; d++) {
                        var dot = document.createElement('button');
                        dot.type = 'button';
                        dot.className = 'strip-dot' + (d === 0 ? ' active' : '');
                        dot.setAttribute('data-group', d);
                        dot.addEventListener('click', function (e) {
                            var target = e.currentTarget;
                            var group = Number(target.getAttribute('data-group') || 0);
                            idx = group;
                            render(idx, true);
                            resetAuto();
                        });
                        dotsEl.appendChild(dot);
                    }
                    dotsInitialized = true;
                }

                function setActiveDot(group) {
                    var dotsEl = document.getElementById(dotsId);
                    if (!dotsEl) return;
                    Array.prototype.forEach.call(dotsEl.children, function (dot, dotIndex) {
                        dot.classList.toggle('active', dotIndex === group);
                    });
                }

                function lockAwardsHeight() {
                    var section = document.querySelector('section.awards-section');
                    var slot = document.getElementById(slotPrefix + '0');
                    if (!section || !slot || !awards.length) return;

                    var slotWidth = Math.ceil(slot.getBoundingClientRect().width || 0);
                    if (!slotWidth) return;

                    var probe = document.createElement('div');
                    probe.className = 'slot-content-new visible';
                    probe.style.position = 'absolute';
                    probe.style.visibility = 'hidden';
                    probe.style.pointerEvents = 'none';
                    probe.style.left = '-9999px';
                    probe.style.top = '0';
                    probe.style.width = slotWidth + 'px';

                    var nameEl = document.createElement('div');
                    nameEl.className = 'slot-name';
                    var descEl = document.createElement('div');
                    descEl.className = 'slot-desc';
                    probe.appendChild(nameEl);
                    probe.appendChild(descEl);
                    section.appendChild(probe);

                    var maxHeight = 0;
                    awards.forEach(function (item) {
                        nameEl.textContent = item.name || '';
                        descEl.textContent = item.desc || '';
                        maxHeight = Math.max(maxHeight, Math.ceil(probe.getBoundingClientRect().height));
                    });

                    probe.remove();

                    if (maxHeight > 0) {
                        section.style.setProperty('--awards-slot-content-height', maxHeight + 'px');
                    }
                }

                function render(group, animate) {
                    slots.forEach(function (slot, i) {
                        var el = document.getElementById(slotPrefix + slot);
                        var item = awards[(group * 3) + i];
                        if (!el) return;
                        if (!item) {
                            el.innerHTML = '';
                            return;
                        }
                        var html = '<div class="slot-content-new' + (animate ? ' fade-in' : ' visible') + '">' +
                            '<div class="slot-name">' + item.name + '</div>' +
                            '<div class="slot-desc">' + item.desc + '</div>' +
                            '</div>';
                        el.innerHTML = html;
                        if (animate) {
                            var c = el.querySelector('.slot-content-new');
                            setTimeout(function () {
                                c.classList.remove('fade-in');
                                c.classList.add('visible');
                            }, 30);
                        }
                    });
                    setActiveDot(group);
                }

                function next() {
                    idx = (idx + 1) % groups;
                    render(idx, true);
                }

                function resetAuto() {
                    if (timer) clearInterval(timer);
                    timer = setInterval(next, 5000);
                }

                if (document.getElementById(stripId)) {
                    ensureDots();
                    lockAwardsHeight();
                    render(0, false);
                    resetAuto();
                    window.addEventListener('resize', function () {
                        clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(function () {
                            lockAwardsHeight();
                            render(idx, false);
                        }, 150);
                    });
                }
            })();
        </script>
        <script type="application/ld+json" id="homepage-seo-jsonld">
            {
              "@context": "https://schema.org",
              "@graph": [
                {
                  "@type": "Organization",
                  "@id": "https://crmgroup.ru/#organization",
                  "name": "CRM Group",
                  "url": "https://crmgroup.ru/",
                  "logo": "https://crmgroup.ru/opg.png",
                  "sameAs": [
                    "https://t.me/+kpSTjvOfqvw1NTRi",
                    "https://www.youtube.com/@crm_group",
                    "https://www.behance.net/process_agency",
                    "https://vc.ru/u/234439-crm-group"
                  ],
                  "contactPoint": [
                    {
                      "@type": "ContactPoint",
                      "telephone": "+7-495-478-03-62",
                      "contactType": "sales",
                      "areaServed": "RU",
                      "availableLanguage": ["ru"]
                    }
                  ]
                },
                {
                  "@type": "ProfessionalService",
                  "@id": "https://crmgroup.ru/#service",
                  "name": "CRM Group",
                  "url": "https://crmgroup.ru/",
                  "description": "CRM-маркетинг и email-маркетинг для роста повторных продаж и удержания клиентов.",
                  "provider": {
                    "@id": "https://crmgroup.ru/#organization"
                  },
                  "areaServed": {
                    "@type": "Country",
                    "name": "Russia"
                  }
                }
              ]
            }
        </script>
        <script id="hero-video-loop-fix">
            (function () {
                function initHeroVideoLoop() {
                    if (!window.matchMedia('(min-width: 769px)').matches) {
                        return;
                    }

                    var videoAutoplay = document.querySelector('.video-autoplay');
                    var videoLoop = document.querySelector('.video-loop');
                    if (!videoAutoplay || !videoLoop) return;

                    function ensureLoopVideoLoaded() {
                        var source = videoLoop.querySelector('source');
                        if (!source) return;
                        var src = source.getAttribute('src');
                        var dataSrc = source.getAttribute('data-src');
                        if (!src && dataSrc) {
                            source.setAttribute('src', dataSrc);
                            videoLoop.load();
                        }
                    }

                    function switchToLoopVideo() {
                        ensureLoopVideoLoaded();
                        videoLoop.style.display = 'block';
                        videoLoop.play().catch(function () {});
                    }

                    videoAutoplay.addEventListener('ended', switchToLoopVideo, { once: true });

                    // Warm up the loop video after the first paint to reduce first-screen load.
                    if ('requestIdleCallback' in window) {
                        window.requestIdleCallback(function () {
                            ensureLoopVideoLoaded();
                        }, { timeout: 2500 });
                    } else {
                        setTimeout(function () {
                            ensureLoopVideoLoaded();
                        }, 1500);
                    }

                    /* Safari fallback: if autoplay is blocked, switch to loop video */
                    videoAutoplay.play().catch(function () {
                        switchToLoopVideo();
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initHeroVideoLoop);
                } else {
                    initHeroVideoLoop();
                }
            })();
        </script>
        <script id="form-analytics-fast-fallback">
            (function () {
                function installAnalyticsGuard() {
                    if (typeof window.analyticsRequest !== 'function' || window.__analyticsRequestGuardInstalled) {
                        return;
                    }

                    var originalAnalyticsRequest = window.analyticsRequest;
                    var timeoutMs = 900;

                    window.analyticsRequest = function (payload) {
                        Promise.race([
                            Promise.resolve(originalAnalyticsRequest(payload)),
                            new Promise(function (_, reject) {
                                setTimeout(function () {
                                    reject(new Error('analytics timeout'));
                                }, timeoutMs);
                            })
                        ]).catch(function (error) {
                            console.warn('[form] analyticsRequest fallback:', error && error.message ? error.message : error);
                        });

                        // Never block form submit on analytics.
                        return Promise.resolve('Success');
                    };

                    window.__analyticsRequestGuardInstalled = true;
                }

                // analyticsRequest is loaded via deferred data: script; retry until it appears.
                var guardTimer = setInterval(function () {
                    installAnalyticsGuard();
                    if (window.__analyticsRequestGuardInstalled) {
                        clearInterval(guardTimer);
                    }
                }, 200);

                setTimeout(function () {
                    clearInterval(guardTimer);
                }, 10000);

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', installAnalyticsGuard);
                } else {
                    installAnalyticsGuard();
                }
            })();
        </script>
        <script id="form-prevalidate-fast-fail">
            (function () {
                function clearError(node) {
                    var field = node.closest ? node.closest('.form-field') : null;
                    var checkbox = node.closest ? node.closest('.form-checkbox') : null;
                    if (field) field.classList.remove('error');
                    if (checkbox) checkbox.classList.remove('error');
                }

                function setError(node, enabled) {
                    var field = node.closest ? node.closest('.form-field') : null;
                    var checkbox = node.closest ? node.closest('.form-checkbox') : null;
                    if (field) field.classList.toggle('error', enabled);
                    if (checkbox) checkbox.classList.toggle('error', enabled);
                }

                function isRequiredValid(node) {
                    if (node.type === 'checkbox') return !!node.checked;
                    var value = (node.value || '').trim();
                    if (!value) return false;
                    if (node.name === 'phone') {
                        var digits = value.replace(/[^\d]/g, '');
                        return digits.length >= 11;
                    }
                    return true;
                }

                function initFastValidation() {
                    var form = document.getElementById('form-request-main-form');
                    if (!form || form.__fastValidationReady) return;

                    var requiredNodes = form.querySelectorAll('.required');
                    requiredNodes.forEach(function (node) {
                        var evt = node.type === 'checkbox' ? 'change' : 'input';
                        node.addEventListener(evt, function () {
                            clearError(node);
                        });
                    });

                    // Capture phase: stop expensive async flow if local validation already fails.
                    form.addEventListener('submit', function (event) {
                        var hasErrors = false;

                        requiredNodes.forEach(function (node) {
                            var invalid = !isRequiredValid(node);
                            setError(node, invalid);
                            hasErrors = hasErrors || invalid;
                        });

                        if (!hasErrors) return;

                        event.preventDefault();
                        event.stopImmediatePropagation();

                        var submitLabel = form.querySelector("button[type='submit'] span");
                        if (submitLabel) submitLabel.textContent = 'Отправить';

                        if (form.parentNode) {
                            form.parentNode.classList.remove('sending-process');
                        }
                    }, true);

                    form.__fastValidationReady = true;
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initFastValidation);
                } else {
                    initFastValidation();
                }
            })();
        </script>
        <script id="form-submit-network-guard">
            (function () {
                var originalFetch = null;
                var endpointAmo = '/crm-marketing-send.php?action=crm_marketing';
                var endpointMindbox = 'api.mindbox.ru/v3/operations/async';

                function makeFallbackResponse(isMindbox, reason) {
                    if (isMindbox) {
                        return {
                            ok: true,
                            status: 200,
                            text: function () {
                                return Promise.resolve('{"status":"Success","reason":"' + reason + '"}');
                            },
                            json: function () {
                                return Promise.resolve({ status: 'Success', reason: reason });
                            }
                        };
                    }

                    return {
                        ok: true,
                        status: 200,
                        text: function () {
                            return Promise.resolve('ok');
                        },
                        json: function () {
                            return Promise.resolve({ status: 'ok', reason: reason });
                        }
                        };
                }

                function wrapFetchOnce() {
                    if (typeof window.fetch !== 'function') return;
                    if (window.fetch.__crmFormGuardWrapped) return;

                    originalFetch = window.fetch.bind(window);
                    var wrappedFetch = function (input, init) {
                    var url = typeof input === 'string' ? input : ((input && input.url) ? input.url : '');
                    var isAmo = url.indexOf(endpointAmo) !== -1;
                    var isMindbox = url.indexOf(endpointMindbox) !== -1;

                    if (!isAmo && !isMindbox) {
                        return originalFetch(input, init);
                    }

                    var timeoutMs = isMindbox ? 1500 : 3500;

                    return Promise.race([
                        originalFetch(input, init),
                        new Promise(function (resolve) {
                            setTimeout(function () {
                                resolve(makeFallbackResponse(isMindbox, 'timeout'));
                            }, timeoutMs);
                        })
                    ]).catch(function (error) {
                        console.warn('[form] network fallback:', error && error.message ? error.message : error, url);
                        return makeFallbackResponse(isMindbox, 'error');
                    });
                };
                    wrappedFetch.__crmFormGuardWrapped = true;
                    window.fetch = wrappedFetch;
                }

                function keepFetchWrapped() {
                    wrapFetchOnce();
                    if (window.__formSubmitNetworkGuardInstalled) return;
                    window.__formSubmitNetworkGuardInstalled = true;
                    var attempts = 0;
                    var rewrapTimer = setInterval(function () {
                        attempts += 1;
                        wrapFetchOnce();
                        if (attempts > 120) clearInterval(rewrapTimer);
                    }, 500);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', keepFetchWrapped);
                } else {
                    keepFetchWrapped();
                }

                window.addEventListener('load', keepFetchWrapped);
            })();
        </script>
        <script id="form-ultrafast-submit-handler">
            (function () {
                function withTimeout(url, options, timeoutMs) {
                    var controller = new AbortController();
                    var timer = setTimeout(function () {
                        controller.abort();
                    }, timeoutMs);

                    var req = Object.assign({}, options || {}, { signal: controller.signal });
                    return fetch(url, req).finally(function () {
                        clearTimeout(timer);
                    });
                }

                function setNodeError(node, enabled) {
                    var field = node.closest ? node.closest('.form-field') : null;
                    var checkbox = node.closest ? node.closest('.form-checkbox') : null;
                    if (field) field.classList.toggle('error', enabled);
                    if (checkbox) checkbox.classList.toggle('error', enabled);
                }

                function isRequiredValid(node) {
                    if (node.type === 'checkbox') return !!node.checked;
                    var value = (node.value || '').trim();
                    if (!value) return false;
                    if (node.name === 'phone') {
                        var digits = value.replace(/[^\d]/g, '');
                        return digits.length >= 11;
                    }
                    return true;
                }

                function validateForm(form) {
                    var requiredNodes = form.querySelectorAll('.required');
                    var hasErrors = false;

                    requiredNodes.forEach(function (node) {
                        var invalid = !isRequiredValid(node);
                        setNodeError(node, invalid);
                        hasErrors = hasErrors || invalid;
                    });

                    return !hasErrors;
                }

                function setSubmitText(form, text) {
                    var submitLabel = form.querySelector("button[type='submit'] span");
                    if (submitLabel) submitLabel.textContent = text;
                }

                function sendToAmo(formData) {
                    var headers = new Headers();
                    headers.append('Content-Type', 'application/x-www-form-urlencoded');

                    return withTimeout(
                        'https://crmgroup.ru/crm-marketing-send.php?action=crm_marketing',
                        {
                            method: 'POST',
                            headers: headers,
                            body: new URLSearchParams(formData).toString(),
                            redirect: 'follow'
                        },
                        3200
                    ).then(function (response) {
                        return response.text();
                    }).catch(function (error) {
                        console.warn('[form] amo send failed:', error && error.message ? error.message : error);
                        return null;
                    });
                }

                function buildMindboxLeadBody(formData, includeMassEmail) {
                    var subscriptions = [
                        { brand: 'CRMgroup', pointOfContact: 'Email', topic: 'Leads' }
                    ];

                    if (includeMassEmail) {
                        subscriptions.push({ brand: 'CRMgroup', pointOfContact: 'Email', topic: 'MassEmail' });
                    }

                    return {
                        customer: {
                            mobilePhone: formData.get('phone'),
                            firstName: formData.get('name'),
                            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                            email: formData.get('email'),
                            customFields: { communicationPersDanny: 'true' },
                            subscriptions: subscriptions
                        },
                        customerAction: {
                            customFields: {
                                utmCampaignLead: formData.get('utm_campaign'),
                                utmContentLead: formData.get('utm_content'),
                                utmMediumLead: formData.get('utm_medium'),
                                utmSourcelead: formData.get('utm_source'),
                                utmTermLead: formData.get('utm_term'),
                                formname: formData.get('to_mb')
                            }
                        }
                    };
                }

                function sendToMindbox(form, formData) {
                    var endpoint = new URL('https://api.mindbox.ru/v3/operations/async');
                    endpoint.searchParams.set('endpointId', 'EMS-CRMGroup-wibsite');
                    endpoint.searchParams.set('operation', 'CRMEMSLeadForm');

                    var deviceUUID = localStorage.getItem('mindboxDeviceUUID');
                    if (deviceUUID) endpoint.searchParams.set('deviceUUID', deviceUUID);

                    var includeMassEmail = !!(form.querySelector('input[name="subscription"]') || {}).checked;
                    var body = buildMindboxLeadBody(formData, includeMassEmail);

                    var headers = new Headers({
                        'Content-Type': 'application/json; charset=utf-8',
                        'Accept': 'application/json',
                        'Authorization': 'SecretKey T6CZnvaYGss8P6Mtckpy'
                    });

                    return withTimeout(
                        endpoint.toString(),
                        {
                            method: 'POST',
                            headers: headers,
                            body: JSON.stringify(body)
                        },
                        1500
                    ).then(function (response) {
                        return response.json().catch(function () { return null; });
                    }).catch(function (error) {
                        console.warn('[form] mindbox send failed:', error && error.message ? error.message : error);
                        return null;
                    });
                }

                function initUltraFastSubmit() {
                    var form = document.getElementById('form-request-main-form');
                    if (!form || form.__ultraFastSubmitReady) return;

                    form.addEventListener('submit', function (event) {
                        event.preventDefault();
                        event.stopImmediatePropagation();

                        var parent = form.parentNode;
                        if (!validateForm(form)) {
                            setSubmitText(form, 'Отправить');
                            if (parent) parent.classList.remove('sending-process');
                            return;
                        }

                        var formData = new FormData(form);
                        var sendingEvent = new Event('formSending');
                        form.dispatchEvent(sendingEvent);

                        if (parent) parent.classList.add('sending-process');
                        setSubmitText(form, 'Отправка');

                        var amoPromise = sendToAmo(formData);
                        var mindboxPromise = sendToMindbox(form, formData);
                        var uiCompleted = false;

                        function completeUi() {
                            if (uiCompleted) return;
                            uiCompleted = true;

                            if (parent) {
                                parent.classList.remove('sending-process');
                                parent.classList.add('sending-success');
                            }

                            setSubmitText(form, 'Успешно отправлено!');
                            setTimeout(function () {
                                setSubmitText(form, 'Отправить');
                                if (parent) parent.classList.remove('sending-process');
                            }, 3000);

                            var resultEvent = new CustomEvent('formSubmissionResult', { detail: { formData: formData } });
                            form.dispatchEvent(resultEvent);
                            form.reset();
                        }

                        Promise.race([
                            Promise.allSettled([amoPromise, mindboxPromise]),
                            new Promise(function (resolve) { setTimeout(resolve, 1200); })
                        ]).then(completeUi);
                    }, true);

                    form.__ultraFastSubmitReady = true;
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initUltraFastSubmit);
                } else {
                    initUltraFastSubmit();
                }

                window.addEventListener('load', initUltraFastSubmit);
            })();
        </script>
    
    </main>
<?php
    get_footer();
