<?php
// header.php
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ukr-cert-group' ); ?></a>

    <header class="site-header" id="site-header">
        <div class="container header-grid">

            <div class="header-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo__link">
                    <?php
                    $site_logo = get_field( 'site_logo', 'option' );
                    if ( ! empty( $site_logo ) ) : ?>
                        <img src="<?php echo esc_url( $site_logo['url'] ); ?>"
                             alt="<?php echo esc_attr( $site_logo['alt'] ?: 'UkrCertGroup Logo' ); ?>"
                             class="logo-image">
                    <?php else : ?>
                        <span class="logo-text">UkrCertGroup</span>
                    <?php endif; ?>
                </a>
            </div>

            <nav class="header-nav" aria-label="<?php esc_attr_e( 'Головне меню', 'ukr-cert-group' ); ?>">
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'main-menu',
                    'fallback_cb'    => '__return_false',
                    'depth'          => 1,
                ) ); ?>
            </nav>

            <div class="header-actions">
                <a href="#contact" class="btn btn--small">Зв'язок</a>
            </div>

            <button class="burger" id="burger" aria-label="Відкрити меню" aria-expanded="false" aria-controls="mobile-menu">
                <span class="burger__line"></span>
                <span class="burger__line"></span>
                <span class="burger__line"></span>
            </button>

        </div>

        <nav class="mobile-menu" id="mobile-menu" aria-label="<?php esc_attr_e( 'Мобільне меню', 'ukr-cert-group' ); ?>">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mobile-menu__list',
                'fallback_cb'    => '__return_false',
                'depth'          => 1,
            ) ); ?>
            <div class="mobile-menu__footer">
                <a href="#contact" class="btn btn--small btn--full-width">Зв'язатись</a>
            </div>
        </nav>

        <div class="mobile-menu-overlay" id="js-menu-overlay" aria-hidden="true"></div>

    </header>
