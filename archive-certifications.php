<?php
/**
 * Template Name: Archive certification
 */
get_header();

$page_id         = get_the_ID();

$hero_title      = get_field( 'arch_hero_title', $page_id ) ?: 'Сертифікація систем менеджменту';
$hero_desc       = get_field( 'arch_hero_desc', $page_id );
$hero_bg_acf     = get_field( 'arch_hero_bg', $page_id );
$hero_bg_url     = ( is_array( $hero_bg_acf ) && ! empty( $hero_bg_acf['url'] ) )
    ? $hero_bg_acf['url']
    : get_template_directory_uri() . '/src/img/cert-fon.webp';

$sidebar_title   = get_field( 'arch_sidebar_title', $page_id ) ?: 'Стандарти';
$article_title   = get_field( 'arch_article_title', $page_id );
$article_content = get_field( 'arch_article_content', $page_id );
$cta_title       = get_field( 'arch_cta_title', $page_id );
$cta_text        = get_field( 'arch_cta_text', $page_id );
$cta_btn         = get_field( 'arch_cta_btn', $page_id ) ?: 'Безкоштовна консультація';
?>
<main>

<section class="page-hero" style="--hero-bg: url('<?php echo esc_url( $hero_bg_url ); ?>');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
        <?php if ( $hero_desc ) : ?>
            <div class="page-hero__desc"><?php echo esc_html( $hero_desc ); ?></div>
        <?php endif; ?>
    </div>
</section>

<div class="cert-page-wrapper">
    <div class="container">
        <div class="cert-layout">

            <aside class="cert-sidebar">
                <div class="cert-sidebar__inner">
                    <h3 class="cert-sidebar__title"><?php echo esc_html( $sidebar_title ); ?></h3>
                    <nav class="cert-menu">
                        <?php
                        $sidebar_query = new WP_Query( array(
                            'post_type'      => 'certifications',
                            'posts_per_page' => -1,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order title',
                        ) );

                        if ( $sidebar_query->have_posts() ) :
                            while ( $sidebar_query->have_posts() ) : $sidebar_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="cert-menu__link">
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
                <article class="cert-article">
                    <?php if ( $article_title ) : ?>
                        <h2 class="cert-article__title"><?php echo esc_html( $article_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $article_content ) : ?>
                        <div class="cert-article__body user-content">
                            <?php echo wp_kses_post( $article_content ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $cta_title ) : ?>
                        <div class="cert-cta-block">
                            <h3><?php echo esc_html( $cta_title ); ?></h3>
                            <?php if ( $cta_text ) : ?>
                                <p><?php echo esc_html( $cta_text ); ?></p>
                            <?php endif; ?>
                            <a href="#contact" class="btn btn--hero"><?php echo esc_html( $cta_btn ); ?></a>
                        </div>
                    <?php endif; ?>
                </article>
            </div>

        </div>
    </div>

    <?php get_template_part( 'template-parts/contact-section' ); ?>

</div>
</main>
<?php get_footer(); ?>
