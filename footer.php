<?php
    /**
     * The template for displaying the footer
     *
     * Contains the closing of the #content div and all content after.
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package content_hub
     */
?>

<footer id="footer" class="footer" data-theme="<?= htmlspecialchars($GLOBALS['footer_theme_type'] ?? 'light') ?>">
   <div class="container">
      <div class="content">
         <div class="social-networking">
            <a href="https://crmgroup.ru/blog/" target="_blank">Блог</a>
            <a href="https://t.me/+kpSTjvOfqvw1NTRi" target="_blank">Телеграм</a>
            <a href="https://www.youtube.com/@crm_group" target="_blank">YouTube</a>
            <a href="https://ru.pinterest.com/crm_group/" target="_blank">Pinterest</a>
            <a href="https://www.behance.net/process_agency" target="_blank">Behance</a>
         </div>

          <?php if (is_page("11522")) { ?>
              <?php /* Для стр. crmgroup.ru/marketing-trends/ */ ?>
             <small>Хотите, чтобы ваши цитаты тоже попали в&nbsp;трендбук? Напишите&nbsp;в&nbsp;Telegram
                <a href="https://t.me/otterfromthecupboard" target="_blank">@otterfromthecupboard</a>
             </small>
          <?php } ?>

         <a href="/conditions/" target="_blank" class="conditions">Условия обработки персональных данных</a>
         <p class="copyright">© 2014–<?php echo date("Y"); ?> CRM—group</p>
      </div>

       <?php if (is_page("11053")) { ?>
           <?php /* Для стр. crmgroup.ru/special-projects */ ?>
          <button class="button-easter-popup" data-popup-id="easter-popup">Опаньки…</button>
       <?php } ?>

   </div>
</footer>

</div>

<?php wp_footer(); ?>
<script id="crm-global-form-fix">
    (function () {
        if (window.__crmGlobalFormFixInstalled) return;
        window.__crmGlobalFormFixInstalled = true;

        function withTimeoutFetch(url, options, timeoutMs) {
            var controller = new AbortController();
            var timer = setTimeout(function () {
                controller.abort();
            }, timeoutMs);
            var req = Object.assign({}, options || {}, { signal: controller.signal });
            return fetch(url, req).finally(function () {
                clearTimeout(timer);
            });
        }

        function ensureAnchors() {
            var form = document.querySelector('form#form-request-main-form, form.form-request__body');
            if (!form) return;

            if (!form.id) {
                form.id = 'form-request-main-form';
            }

            if (!document.getElementById('form-request-main-form')) {
                form.id = 'form-request-main-form';
            }

            var alias = document.getElementById('form-request');
            if (!alias) {
                alias = document.createElement('div');
                alias.id = 'form-request';
                alias.style.position = 'relative';
                alias.style.top = '-1px';
                var section = form.closest('.section-form') || form;
                if (section.parentNode) {
                    section.parentNode.insertBefore(alias, section);
                }
            }

            document.querySelectorAll('a[href="#form-request"]').forEach(function (link) {
                link.setAttribute('href', '#form-request-main-form');
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

        function fireAnalytics(formData) {
            if (typeof window.analyticsRequest !== 'function') return;
            var metric = formData.get('to_ym') || 'main_page_form';
            Promise.race([
                Promise.resolve(window.analyticsRequest(metric)),
                new Promise(function (_, reject) {
                    setTimeout(function () {
                        reject(new Error('analytics timeout'));
                    }, 900);
                })
            ]).catch(function () {});
        }

        function sendToAmo(formData) {
            var headers = new Headers();
            headers.append('Content-Type', 'application/x-www-form-urlencoded');
            return withTimeoutFetch(
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
            }).catch(function () {
                return null;
            });
        }

        function buildMindboxPayload(form, formData) {
            var formType = formData.get('form-type') || 'default';
            var payload = null;
            var operation = 'CRMEMSLeadForm';

            if (formType === 'whitepaper') {
                operation = 'CRMPolychenieRazdatki';
                payload = {
                    customerAction: {
                        customFields: {
                            uRLwhitepaper: window.location.pathname.split('/').filter(Boolean).pop()
                        }
                    },
                    customer: {
                        email: formData.get('email'),
                        mobilePhone: formData.get('phone'),
                        firstName: formData.get('name'),
                        customFields: { CommunicationPersDanny: true },
                        subscriptions: []
                    }
                };
                return { operation: operation, body: payload };
            }

            var subscriptions = [{
                brand: 'CRMgroup',
                pointOfContact: 'Email',
                topic: formType === 'subscription' ? 'MassEmail' : 'Leads'
            }];

            if (formType !== 'subscription') {
                var newsletter = form.querySelector('input[name="subscription"]');
                if (newsletter && newsletter.checked) {
                    subscriptions.push({
                        brand: 'CRMgroup',
                        pointOfContact: 'Email',
                        topic: 'MassEmail'
                    });
                }
            }

            if (formType === 'subscription') {
                operation = 'CRMEMSSubscribeForm';
            }

            payload = {
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

            return { operation: operation, body: payload };
        }

        function sendToMindbox(form, formData) {
            var endpoint = new URL('https://api.mindbox.ru/v3/operations/async');
            endpoint.searchParams.set('endpointId', 'EMS-CRMGroup-wibsite');

            var payload = buildMindboxPayload(form, formData);
            endpoint.searchParams.set('operation', payload.operation);

            var deviceUUID = localStorage.getItem('mindboxDeviceUUID');
            if (deviceUUID) endpoint.searchParams.set('deviceUUID', deviceUUID);

            var headers = new Headers({
                'Content-Type': 'application/json; charset=utf-8',
                'Accept': 'application/json',
                'Authorization': 'SecretKey T6CZnvaYGss8P6Mtckpy'
            });

            return withTimeoutFetch(
                endpoint.toString(),
                {
                    method: 'POST',
                    headers: headers,
                    body: JSON.stringify(payload.body)
                },
                1500
            ).then(function (response) {
                return response.json().catch(function () { return null; });
            }).catch(function () {
                return null;
            });
        }

        function bindFastSubmit(form) {
            if (form.__ultraFastSubmitReady || form.__crmGlobalFastSubmitBound) return;

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
                fireAnalytics(formData);

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

            var requiredNodes = form.querySelectorAll('.required');
            requiredNodes.forEach(function (node) {
                var evt = node.type === 'checkbox' ? 'change' : 'input';
                node.addEventListener(evt, function () {
                    setNodeError(node, false);
                });
            });

            form.__crmGlobalFastSubmitBound = true;
        }

        function initGlobalFormFix() {
            ensureAnchors();
            document.querySelectorAll('form.form-request__body').forEach(bindFastSubmit);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initGlobalFormFix);
        } else {
            initGlobalFormFix();
        }

        window.addEventListener('load', initGlobalFormFix);
        setTimeout(initGlobalFormFix, 800);
    })();
</script>

<!-- Roistat Counter Start -->
<script>
	(function (w, d, s, h, id) {
		w.roistatProjectId = id;
		w.roistatHost = h;
		var p = d.location.protocol == "https:" ? "https://" : "http://";
		var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/" + id + "/init?referrer=" + encodeURIComponent(d.location.href);
		var js = d.createElement(s);
		js.charset = "UTF-8";
		js.async = 1;
		js.src = p + h + u;
		var js2 = d.getElementsByTagName(s)[0];
		js2.parentNode.insertBefore(js, js2);
	})(window, document, 'script', 'cloud.roistat.com', 'b876517e685b6cfc8a8494bee0431122');
</script>
<!-- Roistat Counter End -->

</body>
</html>
