document.addEventListener('DOMContentLoaded', function () {
    var sections = document.querySelectorAll('section[id]');
    var navLinks = document.querySelectorAll('nav a');

    window.addEventListener('scroll', function () {
        var current = '';
        sections.forEach(function (section) {
            if (window.scrollY >= section.offsetTop - 80) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(function (link) {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    });
});