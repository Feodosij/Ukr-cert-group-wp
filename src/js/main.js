import '../scss/main.scss';

document.addEventListener('DOMContentLoaded', () => {

    // BURGER MENU
    const header  = document.getElementById('site-header');
    const burger  = document.getElementById('burger');
    const overlay = document.getElementById('js-menu-overlay');

    if (!header || !burger || !overlay) return;

    function openMenu() {
        header.classList.add('is-menu-open');
        burger.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        header.classList.remove('is-menu-open');
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    burger.addEventListener('click', () => {
        header.classList.contains('is-menu-open') ? closeMenu() : openMenu();
    });

    overlay.addEventListener('click', closeMenu);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeMenu();
    });

    document.querySelectorAll('[data-contact-link]').forEach(link => {
        link.addEventListener('click', (e) => {
            const section = document.getElementById('contact');
            if (section) {
                e.preventDefault();
                closeMenu();
                section.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

});
