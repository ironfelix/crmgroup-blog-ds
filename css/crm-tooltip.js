/**
 * CRM-group Blog — Tooltip Script
 *
 * Использование в Gutenberg:
 *   <span class="crm-term" data-tip="пояснение термина">термин</span>
 *
 * Добавить в WP через:
 *   - плагин "Insert Headers and Footers" (секция Footer)
 *   - или functions.php → wp_footer
 *
 * CSS уже есть в wp-custom.css (строки ~371–383): .crm-term / .crm-tip
 */

(function () {
  'use strict';
  const tip = document.createElement('div');
  tip.className = 'crm-tip';
  document.body.appendChild(tip);

  let hideTimer, currentTerm = null;
  const isTouch = 'ontouchstart' in window;

  function showTip(el) {
    clearTimeout(hideTimer);
    const rect = el.getBoundingClientRect();
    tip.textContent = el.dataset.tip;
    tip.style.display = 'block';
    tip.classList.remove('on', 'below');

    const pw = tip.offsetWidth, ph = tip.offsetHeight, m = 12;
    const cx = rect.left + rect.width / 2;
    let left = Math.max(m, Math.min(cx - pw / 2, window.innerWidth - pw - m));
    tip.style.setProperty('--ax', (cx - left) + 'px');

    const below = rect.top < ph + 24;
    tip.classList.toggle('below', below);
    tip.style.top  = (below ? rect.bottom + 10 : rect.top - ph - 10) + 'px';
    tip.style.left = left + 'px';

    requestAnimationFrame(() => tip.classList.add('on'));
    currentTerm = el;
  }

  function hideTip() {
    hideTimer = setTimeout(() => {
      tip.classList.remove('on');
      setTimeout(() => { tip.style.display = 'none'; }, 150);
      currentTerm = null;
    }, 150);
  }

  document.querySelectorAll('.crm-term[data-tip]').forEach(el => {
    if (isTouch) {
      // Мобайл: клик
      el.addEventListener('click', e => {
        e.preventDefault();
        currentTerm === el ? hideTip() : showTip(el);
      });
    } else {
      // Десктоп: hover
      el.addEventListener('mouseenter', () => showTip(el));
      el.addEventListener('mouseleave', () => hideTip());
    }
  });

  // Клик вне тултипа — скрыть
  document.addEventListener('click', e => {
    if (!e.target.closest('.crm-term') && !e.target.closest('.crm-tip')) hideTip();
  });

  // Зависание над тултипом — не скрывать
  tip.addEventListener('mouseenter', () => clearTimeout(hideTimer));
  tip.addEventListener('mouseleave', () => hideTip());
})();
