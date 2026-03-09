<?php
/*
 * Template Name: Front page
 * Template Post Type: page
 */

get_header(); ?>

<main>

<?php
// HERO SECTION
$hero_title = get_field( 'hero_title' );

if ( $hero_title ) :
    $main_bg_image = get_field( 'main_background_image' );
    $hero_logo_text     = get_field( 'hero_logo_text' );
    $hero_description   = get_field( 'hero_description' );
    $hero_form_title    = get_field( 'hero_form_title' );
    $hero_form_subtitle = get_field( 'hero_form_subtitle' );
    $marquee_label      = get_field( 'marquee_label' );
    $marquee_items      = get_field( 'marquee_items' );
?>

    <section class="hero"<?php if ( ! empty( $main_bg_image['url'] ) ) : ?> style="--hero-bg: url('<?php echo esc_url( $main_bg_image['url'] ); ?>')"<?php endif; ?>>
        <div class="hero__bg-layer"></div>

        <div class="container hero__container">

            <div class="hero__top-row">

                <div class="hero__text-col">
                    <?php if ( $hero_logo_text ) : ?>
                        <div class="hero__logo-text"><?php echo esc_html( $hero_logo_text ); ?></div>
                    <?php endif; ?>

                    <h1 class="hero__title"><?php echo esc_html( $hero_title ); ?></h1>

                    <?php if ( $hero_description ) : ?>
                        <p class="hero__desc"><?php echo esc_html( $hero_description ); ?></p>
                    <?php endif; ?>
                </div>

                <div class="hero__form-col">
                    <div class="request-card">
                        <?php if ( $hero_form_title ) : ?>
                            <h3 class="request-card__title"><?php echo esc_html( $hero_form_title ); ?></h3>
                        <?php endif; ?>
                        <?php if ( $hero_form_subtitle ) : ?>
                            <p class="request-card__subtitle"><?php echo esc_html( $hero_form_subtitle ); ?></p>
                        <?php endif; ?>

                        <form class="hero-form-vertical">
                            <input type="text" placeholder="Ваше ім'я" class="input-glass">
                            <input type="tel" placeholder="+38 (0__) ___ __ __" class="input-glass">
                            <button type="submit" class="btn btn--hero btn--full">Отримати консультацію</button>
                        </form>
                    </div>
                </div>

            </div>

            <?php if ( have_rows( 'hero_cards' ) ) : ?>
                <div class="hero__bottom-panel">
                    <?php while ( have_rows( 'hero_cards' ) ) : the_row();
                        $card_icon  = get_sub_field( 'hero_card_icon' );
                        $card_title = get_sub_field( 'hero_card_title' );
                        if ( $card_title ) : ?>
                            <div class="hero-card">
                                <?php if ( $card_icon ) : ?>
                                    <div class="hero-card__icon">
                                        <img src="<?php echo esc_url( $card_icon['url'] ); ?>" alt="<?php echo esc_attr( $card_icon['alt'] ); ?>">
                                    </div>
                                <?php endif; ?>
                                <h3 class="hero-card__title"><?php echo esc_html( $card_title ); ?></h3>
                            </div>
                        <?php endif;
                    endwhile; ?>
                </div>
            <?php endif; ?>

        </div>

        <?php if ( $marquee_label && $marquee_items ) : ?>
            <div class="marquee-section">
                <div class="marquee-header">
                    <span class="marquee-label"><?php echo esc_html( $marquee_label ); ?></span>
                </div>

                <div class="marquee-wrapper">
                    <?php foreach ( array( false, true ) as $is_hidden ) : ?>
                        <div class="marquee-group"<?php echo $is_hidden ? ' aria-hidden="true"' : ''; ?>>
                            <?php foreach ( $marquee_items as $m_item ) :
                                $m_text = ! empty( $m_item['marquee_text'] ) ? $m_item['marquee_text'] : '';
                                $m_sep  = ! empty( $m_item['marquee_separator'] ) ? $m_item['marquee_separator'] : '';
                                if ( $m_text ) : ?>
                                    <span class="text"><?php echo esc_html( $m_text ); ?></span>
                                    <?php if ( $m_sep ) : ?>
                                        <span class="sep-symbol"><?php echo esc_html( $m_sep ); ?></span>
                                    <?php endif; ?>
                                <?php endif;
                            endforeach; ?>
                            <span class="sep-block"></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </section>

<?php endif; ?>


<?php
// WHY CHOOSE SECTION
$why_title = get_field( 'why_title' );

if ( $why_title ) :
    $why_description = get_field( 'why_description' );
    $why_footer_text = get_field( 'why_footer_text' );
?>

    <section class="why-choose section-padding">
        <div class="container">

            <header class="why-header">
                <h2 class="section-title"><?php echo esc_html( $why_title ); ?></h2>
                <?php if ( $why_description ) : ?>
                    <p class="section-desc"><?php echo esc_html( $why_description ); ?></p>
                <?php endif; ?>
            </header>

            <?php if ( have_rows( 'why_cards' ) ) : ?>
                <div class="why-cards layout-grid">
                    <?php while ( have_rows( 'why_cards' ) ) : the_row();
                        $wcard_icon  = get_sub_field( 'why_card_icon' );
                        $wcard_title = get_sub_field( 'why_card_title' );
                        $wcard_desc  = get_sub_field( 'why_card_description' );
                        if ( $wcard_title ) : ?>
                            <div class="why-card glass-panel">
                                <?php if ( $wcard_icon ) : ?>
                                    <img class="why-card__icon" src="<?php echo esc_url( $wcard_icon['url'] ); ?>" alt="<?php echo esc_attr( $wcard_icon['alt'] ); ?>">
                                <?php endif; ?>
                                <div class="why-content">
                                    <h3><?php echo esc_html( $wcard_title ); ?></h3>
                                    <?php if ( $wcard_desc ) : ?>
                                        <p><?php echo esc_html( $wcard_desc ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif;
                    endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if ( $why_footer_text ) : ?>
                <footer class="why-footer">
                    <div class="glass-panel text-block">
                        <p><?php echo esc_html( $why_footer_text ); ?></p>
                    </div>
                </footer>
            <?php endif; ?>

        </div>
    </section>

<?php endif; ?>


<?php
// CERTIFICATIONS SECTION
$cert_title = get_field( 'cert_title' );

if ( $cert_title ) :
    $cert_description = get_field( 'cert_description' );
    $cert_image       = get_field( 'cert_image' );
    $cert_list_label  = get_field( 'cert_list_label' );
?>

    <section class="certifications-section">
        <div class="container">

            <div class="cert-top-row">
                <div class="cert-top-left">
                    <h2 class="section-title"><?php echo esc_html( $cert_title ); ?></h2>
                    <?php if ( $cert_description ) : ?>
                        <p class="section-desc"><?php echo esc_html( $cert_description ); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ( $cert_image ) : ?>
                    <div class="cert-top-image">
                        <img src="<?php echo esc_url( $cert_image['url'] ); ?>"
                             alt="<?php echo esc_attr( $cert_image['alt'] ?: $cert_title ); ?>">
                    </div>
                <?php endif; ?>
            </div>

            <div class="cert-list-wrapper">
                <?php if ( $cert_list_label ) : ?>
                    <h3 class="cert-list-label"><?php echo esc_html( $cert_list_label ); ?></h3>
                <?php endif; ?>

                <div class="cert-cloud">
                    <?php
                    $cert_query = new WP_Query( array(
                        'post_type'      => 'certifications',
                        'posts_per_page' => -1,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order title',
                    ) );

                    if ( $cert_query->have_posts() ) :
                        while ( $cert_query->have_posts() ) : $cert_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="cert-pill">
                                <span class="cert-pill__text"><?php the_title(); ?></span>
                                <span class="cert-pill__arrow">→</span>
                            </a>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>

        </div>
    </section>

<?php endif; ?>


<?php
// SERVICES SECTION
$services_title = get_field( 'services_title' );

if ( $services_title && have_rows( 'services' ) ) :
?>

    <section class="services-detail section-padding">
        <div class="container">
            <h2 class="section-title"><?php echo esc_html( $services_title ); ?></h2>

            <div class="services-list">
                <?php while ( have_rows( 'services' ) ) : the_row();
                    $svc_icon  = get_sub_field( 'service_icon' );
                    $svc_title = get_sub_field( 'service_title' );
                    $svc_desc  = get_sub_field( 'service_description' );
                    if ( $svc_title ) : ?>
                        <article class="service-item card">
                            <?php if ( $svc_icon ) : ?>
                                <div class="service-item__icon-box"><img class="service-item__image" src="<?php echo esc_url( $svc_icon['url'] ); ?>" alt="<?php echo esc_attr( $svc_icon['alt'] ); ?>"></div>
                            <?php endif; ?>
                            <div class="service-item__content">
                                <h3><?php echo esc_html( $svc_title ); ?></h3>
                                <?php if ( $svc_desc ) : ?>
                                    <p><?php echo esc_html( $svc_desc ); ?></p>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endif;
                endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_template_part( 'template-parts/contact-section' ); ?>

</main>

<?php get_footer(); ?>
