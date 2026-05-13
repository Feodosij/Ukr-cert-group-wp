<?php
/**
 * The template for displaying the footer
 *
 * @package ukr-cert-group
 */

$site_logo = get_field( 'site_logo', 'option' );
$footer_desc  = get_field( 'footer_desc', 'option' );
$site_address = get_field( 'site_address', 'option' );
$phone        = get_field( 'site_phone', 'option' );
$email        = get_field( 'site_email', 'option' );
$phone_href   = $phone ? preg_replace( '/[^+\d]/', '', $phone ) : '';

$social_instagram = get_field( 'social_instagram', 'option' );
$social_facebook  = get_field( 'social_facebook', 'option' );
$social_telegram  = get_field( 'social_telegram', 'option' );
$social_linkedin  = get_field( 'social_linkedin', 'option' );
$social_youtube   = get_field( 'social_youtube', 'option' );
$social_tiktok    = get_field( 'social_tiktok', 'option' );
?>

	<footer class="site-footer">
    <div class="container">

        <div class="footer-grid">

            <div class="footer-col brand-col">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="text-decoration: none; color: inherit;">
                    <?php if ( ! empty( $site_logo ) ) : ?>
                        <img src="<?php echo esc_url( $site_logo['url'] ); ?>"
                                alt="<?php echo esc_attr( $site_logo['alt'] ?: 'UkrCertGroup' ); ?>"
                                class="footer-logo-img">
                    <?php else : ?>
                        <h2>UkrCertGroup</h2>
                    <?php endif; ?>
                </a>
                <?php if ( $footer_desc ) : ?>
                    <p class="footer-desc"><?php echo esc_html( $footer_desc ); ?></p>
                <?php endif; ?>
            </div>

            <div class="footer-col menu-col">
                <h3 class="footer-title">Навігація</h3>
                <nav class="footer-nav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_menu',
                        'container'      => false,
                        'menu_class'     => 'footer-menu-list',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ) );
                    ?>
                
                </nav>
            </div>

            <div class="footer-col contact-col">
                <h3 class="footer-title">Контакти</h3>

                <ul class="contact-list">
                    <?php if ( $phone ) : ?>
                        <li><a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $email ) : ?>
                        <li><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $site_address ) : ?>
                        <li><?php echo esc_html( $site_address ); ?></li>
                    <?php endif; ?>
                </ul>

                <div class="social-links">
                    <?php if ( $social_instagram ) : ?>
                        <a href="<?php echo esc_url( $social_instagram ); ?>" class="social-btn" aria-label="Instagram" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $social_facebook ) : ?>
                        <a href="<?php echo esc_url( $social_facebook ); ?>" class="social-btn" aria-label="Facebook" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $social_telegram ) : ?>
                        <a href="<?php echo esc_url( $social_telegram ); ?>" class="social-btn" aria-label="Telegram" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $social_linkedin ) : ?>
                        <a href="<?php echo esc_url( $social_linkedin ); ?>" class="social-btn" aria-label="LinkedIn" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $social_youtube ) : ?>
                        <a href="<?php echo esc_url( $social_youtube ); ?>" class="social-btn" aria-label="YouTube" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58a2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $social_tiktok ) : ?>
                        <a href="<?php echo esc_url( $social_tiktok ); ?>" class="social-btn" aria-label="TikTok" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.34 6.34 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34l.04-8.69a8.27 8.27 0 0 0 4.84 1.55V6.79a4.85 4.85 0 0 1-1.07-.1z"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">
                &copy; <?php echo date( 'Y' ); ?> <span style="margin-left: 4px;"> Всі права захищено.</span>
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Політика конфіденційності</a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
