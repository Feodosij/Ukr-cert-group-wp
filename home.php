<?php
/**
 * Blog archive (home.php) — список записей блога
 */
get_header();

$blog_page_id = get_option( 'page_for_posts' );
$hero_title   = get_field( 'hero_title', $blog_page_id ) ?: 'Блог';
$hero_desc    = get_field( 'hero_desc', $blog_page_id );
$hero_bg      = get_field( 'hero_bg', $blog_page_id );
?>
<main>

<section class="page-hero"<?php if ( $hero_bg ) : ?> style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');"<?php endif; ?>>
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
        <?php if ( $hero_desc ) : ?>
            <div class="page-hero__desc"><?php echo esc_html( $hero_desc ); ?></div>
        <?php endif; ?>
    </div>
</section>

<div class="blog-archive section-padding">
    <div class="container">
        <div class="blog-list">

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <article class="blog-card glass-panel">
    
                        <?php
                        $blog_page_id = get_queried_object_id();
                        $fallback_img = get_field( 'fallback_thumbnail', $blog_page_id ); 
                        ?>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="blog-card__thumb">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>

                        <?php elseif ( $fallback_img ) : ?>
                            <a href="<?php the_permalink(); ?>" class="blog-card__thumb blog-card__thumb--fallback">
                                <img src="<?php echo esc_url( $fallback_img['url'] ); ?>" alt="<?php echo esc_attr( $fallback_img['alt'] ? $fallback_img['alt'] : get_the_title() ); ?>">
                            </a>
                        <?php endif; ?>

                        <div class="blog-card__body">
                            <time class="blog-card__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>

                            <h2 class="blog-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="blog-card__excerpt">
                                <p>
                                    <?php 
                                    echo wp_trim_words( get_the_excerpt(),22, '...' ); 
                                    ?>
                                </p>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

                <div class="blog-pagination">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ) );
                    ?>
                </div>

            <?php else : ?>
                <p class="blog-empty">Публікацій поки що немає.</p>
            <?php endif; ?>

        </div>
    </div>
</div>

</main>
<?php get_footer(); ?>
