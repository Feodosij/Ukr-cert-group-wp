<?php
/**
 * Single post template
 */
get_header();

while ( have_posts() ) : the_post();

$hero_bg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<main>

<section class="page-hero"<?php if ( $hero_bg ) : ?> style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');"<?php endif; ?>>
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title"><?php the_title(); ?></h1>
    </div>
</section>

<div class="single-post-article section-padding">
    <div class="container">

        <nav class="breadcrumbs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Головна</a> /
            <?php if ( get_option( 'page_for_posts' ) ) : ?>
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Блог</a> /
            <?php endif; ?>
            <span><?php the_title(); ?></span>
        </nav>

        <article class="single-post__article glass-panel">

            <div class="single-post__content user-content">
                <?php the_content(); ?>

                <?php
                $video_iframe = get_field( 'youtube_video' );
                if ( $video_iframe ) : ?>
                    <div class="video-wrapper">
                        <?php echo $video_iframe; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            $tags = get_the_tags();
            if ( $tags ) : ?>
                <div class="single-post__tags">
                    <?php foreach ( $tags as $tag ) :
                        $tag_url = get_tag_link( $tag->term_id ); ?>
                        <a href="<?php echo esc_url( $tag_url ); ?>" class="tag-pill"><?php echo esc_html( $tag->name ); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="single-post__date">
                <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                    <?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?>
                </time>
            </div>

        </article>
    </div>
</div>

</main>
<?php
endwhile;
get_footer();
