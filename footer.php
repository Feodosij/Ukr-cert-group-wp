<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ukr-cert-group
 */

?>

	<footer class="site-footer">
    <div class="container">
        
        <div class="footer-grid">
            
            <div class="footer-col brand-col">
                <h2 class="footer-logo">Ukrainian Certification</h2>
                <p class="footer-desc">
                    Ваш надійний партнер у світі міжнародних стандартів та ефективного менеджменту.
                </p>
                <p class="footer-copyright">
                    &copy; <?php echo date('Y'); ?> Всі права захищено.
                </p>
            </div>

            <div class="footer-col menu-col">
                <h3 class="footer-title">Навігація</h3>
                <nav class="footer-nav">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'footer_menu', // Потрібно зареєструвати або використовувати 'primary'
                        'container'      => false,
                        'menu_class'     => 'footer-menu-list',
                        'fallback_cb'    => false, // Якщо меню не створено, нічого не виводити
                        'depth'          => 1
                    ) ); 
                    ?>
                    <?php if ( ! has_nav_menu( 'footer_menu' ) ) : ?>
                        <ul class="footer-menu-list">
                            <li><a href="/">Головна</a></li>
                            <li><a href="/certifications/">Сертифікації</a></li>
                            <li><a href="/about/">Про нас</a></li>
                            <li><a href="/contact/">Контакти</a></li>
                        </ul>
                    <?php endif; ?>
                </nav>
            </div>

            <div class="footer-col contact-col">
                <h3 class="footer-title">Контакти</h3>
                
                <ul class="contact-list">
                    <li><a href="tel:+380123456789">+38 (012) 345-67-89</a></li>
                    <li><a href="mailto:info@ukrcert.com">info@ukrcert.com</a></li>
                    <li>м. Київ, вул. Прикладна, 10</li>
                </ul>

                <div class="social-links">
                    <a href="#" class="social-btn" aria-label="Instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="#" class="social-btn" aria-label="Facebook">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="#" class="social-btn" aria-label="Telegram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </a>
                    <a href="#" class="social-btn" aria-label="LinkedIn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
