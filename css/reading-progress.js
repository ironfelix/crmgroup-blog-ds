(function() {
    var bar = document.getElementById('reading-progress');
    if (!bar) return;
    var article = document.querySelector('.section-content') || document.querySelector('.singlepost');
    if (!article) return;
    var ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(function() {
                var rect = article.getBoundingClientRect();
                var total = article.offsetHeight - window.innerHeight;
                var scrolled = -rect.top;
                var pct = Math.min(100, Math.max(0, (scrolled / total) * 100));
                bar.style.width = pct + '%';
                ticking = false;
            });
            ticking = true;
        }
    });
})();
