(function() {
    document.querySelectorAll('.new_article').forEach(function(slide) {
        var img = slide.querySelector('.new_article__author-photo img');
        var src = img ? (img.getAttribute('data-src') || img.getAttribute('src')) : '';
        if (!src) {
            slide.classList.add('no-image');
        }
    });
    document.querySelectorAll('.card-article').forEach(function(card) {
        var img = card.querySelector('.card-article__visual img');
        var src = img ? (img.getAttribute('data-src') || img.getAttribute('src')) : '';
        if (!src) {
            card.classList.add('no-image');
        }
    });
})();
