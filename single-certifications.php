<?php
// single-certifications.php
get_header();

$hero_bg_acf = get_field( 'arch_hero_bg', 'option' );
$hero_bg     = $hero_bg_acf ?: get_template_directory_uri() . '/src/img/cert-fon.webp';

$benefits_intro      = get_field( 'cert_intro' );
$benefits_conclusion = get_field( 'cert_benefits_conclusion', 'option' );
$cert_cta_desc       = get_field( 'cert_cta_desc', 'option' );
$cert_cta_btn        = get_field( 'cert_cta_btn', 'option' ) ?: 'Отримати розрахунок';
$sidebar_title       = get_field( 'arch_sidebar_title', 'option' ) ?: 'Стандарти';
?>
<main>

<section class="page-hero" style="--hero-bg: url('<?php echo esc_url( $hero_bg ); ?>');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title">Сертифікація <?php the_title(); ?> - тільки з нами!</h1>
    </div>
</section>

<div class="cert-page-wrapper">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?php echo home_url(); ?>">Головна</a> /
            <a href="<?php echo get_post_type_archive_link( 'certifications' ); ?>">Сертифікації</a> /
            <span><?php the_title(); ?></span>
        </nav>

        <div class="cert-layout">

            <aside class="cert-sidebar">
                <div class="cert-sidebar__inner">
                    <h3 class="cert-sidebar__title"><?php echo esc_html( $sidebar_title ); ?></h3>
                    <nav class="cert-menu">
                        <?php
                        $current_id    = get_the_ID();
                        $sidebar_query = new WP_Query( array(
                            'post_type'      => 'certifications',
                            'posts_per_page' => -1,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order title',
                        ) );

                        if ( $sidebar_query->have_posts() ) :
                            while ( $sidebar_query->have_posts() ) : $sidebar_query->the_post();
                                $active_class = ( $post->ID == $current_id ) ? 'active' : '';
                                ?>
                                <a href="<?php the_permalink(); ?>" class="cert-menu__link <?php echo $active_class; ?>">
                                    <span class="cert-menu__text"><?php the_title(); ?></span>
                                    <span class="cert-menu__icon">→</span>
                                </a>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </nav>

                    <div class="cert-sidebar__contact">
                        <p>Потрібна консультація?</p>
                        <a href="#contact" class="btn btn--small btn--full-width">Зв'язатись</a>
                    </div>
                </div>
            </aside>

            <div class="cert-content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article class="cert-article">
                        <?php
                        $cert_image = get_field( 'cert_image' );
                        $cert_quote = get_field( 'cert_quote' );
                        ?>
                        <div class="cert-article__header">
                            <div class="cert-article__header-text">
                                <h2 class="cert-article__title"><?php the_title(); ?></h2>
                                <?php if ( $cert_quote ) : ?>
                                    <p class="cert-article__quote"><?php echo esc_html( $cert_quote ); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ( $cert_image ) : ?>
                                <div class="cert-article__header-image">
                                    <img src="<?php echo esc_url( $cert_image['url'] ); ?>"
                                         alt="<?php echo esc_attr( $cert_image['alt'] ); ?>"
                                         class="cert-article__image">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="cert-article__body user-content">
                            <?php the_content(); ?>
                        </div>

                        <?php if ( $benefits_intro || have_rows( 'cert_benefits' ) ) : ?>
                            <div class="benefits-section">
                                <?php if ( $benefits_intro ) : ?>
                                    <div class="benefits-intro">
                                        <p><?php echo esc_html( $benefits_intro ); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if ( have_rows( 'cert_benefits' ) ) : ?>
                                    <div class="benefits-list">
                                        <?php while ( have_rows( 'cert_benefits' ) ) : the_row();
                                            $sb_title = get_sub_field( 'sb_title' );
                                            $sb_text  = get_sub_field( 'sb_text' );
                                            if ( $sb_title ) : ?>
                                                <div class="benefit-item">
                                                    <div class="benefit-icon">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                            <polyline points="9 11 12 14 22 4"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="benefit-content">
                                                        <h4><?php echo esc_html( $sb_title ); ?></h4>
                                                        <?php if ( $sb_text ) : ?>
                                                            <p><?php echo esc_html( $sb_text ); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif;
                                        endwhile; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $benefits_conclusion ) : ?>
                                    <div class="benefits-conclusion">
                                        <p><strong><?php echo esc_html( $benefits_conclusion ); ?></strong></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="cert-cta-block">
                            <h3>Замовити <?php the_title(); ?></h3>
                            <?php if ( $cert_cta_desc ) : ?>
                                <p><?php echo esc_html( $cert_cta_desc ); ?></p>
                            <?php endif; ?>
                            <a href="#contact" class="btn btn--hero"><?php echo esc_html( $cert_cta_btn ); ?></a>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

        </div>
    </div>

    <?php get_template_part( 'template-parts/contact-section' ); ?>

</div>
</main>

<?php get_footer(); ?>
