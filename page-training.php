<?php
/**
 * Template Name: Training Page (Підготовка персоналу)
 */

get_header();

$bg_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $bg_img ) {
    $bg_img = get_field( 'training_hero_bg' ) ?: get_template_directory_uri() . '/src/img/training-hero.webp';
}

$hero_desc = get_field( 'training_hero_desc' );
?>
<main>

<section class="page-hero" style="background-image: url('<?php echo esc_url( $bg_img ); ?>');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title"><?php the_title(); ?></h1>
        <?php if ( $hero_desc ) : ?>
            <div class="page-hero__desc"><?php echo esc_html( $hero_desc ); ?></div>
        <?php endif; ?>
    </div>
</section>

<div class="training-page-wrapper section-padding">
    <div class="container">

        <?php if ( have_rows( 'training_cards' ) ) : ?>
            <div class="training-grid">
                <?php while ( have_rows( 'training_cards' ) ) : the_row();
                    $card_icon        = get_sub_field( 'card_icon' );
                    $card_anchor      = get_sub_field( 'card_anchor' );
                    $card_title       = get_sub_field( 'card_title' );
                    $card_description = get_sub_field( 'card_description' );
                    $card_extra_text  = get_sub_field( 'card_extra_text' );
                    $card_extra_class = get_sub_field( 'card_extra_class' );
                    if ( ! $card_title ) { continue; }
                    $anchor_attr = $card_anchor ? ' id="' . esc_attr( $card_anchor ) . '"' : '';
                    ?>

                    <article class="training-card glass-panel"<?php echo $anchor_attr; ?>>
                        <div class="training-card__header">
                            <?php if ( $card_icon ) : ?>
                                <div class="training-icon">
                                    <img src="<?php echo esc_url( $card_icon['url'] ); ?>" alt="<?php echo esc_attr( $card_icon['alt'] ); ?>" loading="lazy">
                                </div>
                            <?php endif; ?>
                            <h2 class="training-title"><?php echo esc_html( $card_title ); ?></h2>
                        </div>

                        <div class="training-card__body">
                            <?php if ( $card_description ) : ?>
                                <p class="training-desc"><?php echo esc_html( $card_description ); ?></p>
                            <?php endif; ?>

                            <?php if ( have_rows( 'card_list' ) ) : ?>
                                <ul class="check-list">
                                    <?php while ( have_rows( 'card_list' ) ) : the_row();
                                        $list_label = get_sub_field( 'list_label' );
                                        $list_text  = get_sub_field( 'list_text' );
                                        if ( $list_label || $list_text ) : ?>
                                            <li>
                                                <?php if ( $list_label ) : ?><strong><?php echo esc_html( $list_label ); ?></strong><?php if ( $list_text ) : ?>: <?php endif; ?><?php endif; ?><?php if ( $list_text ) : ?><?php echo esc_html( $list_text ); ?><?php endif; ?>
                                            </li>
                                        <?php endif;
                                    endwhile; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if ( $card_extra_text && $card_extra_class && $card_extra_class !== '' ) : ?>
                                <div class="<?php echo esc_attr( $card_extra_class ); ?>">
                                    <?php echo esc_html( $card_extra_text ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php
        $cta_title = get_field( 'training_cta_title' );
        $cta_text  = get_field( 'training_cta_text' );
        $phone     = get_field( 'site_phone', 'option' );
        $email     = get_field( 'site_email', 'option' );

        if ( $cta_title ) :
            $phone_href = $phone ? preg_replace( '/[^+\d]/', '', $phone ) : '';
        ?>
            <div class="training-contact glass-panel">
                <h3><?php echo esc_html( $cta_title ); ?></h3>
                <?php if ( $cta_text ) : ?>
                    <p><?php echo esc_html( $cta_text ); ?></p>
                <?php endif; ?>
                <div class="contact-buttons">
                    <?php if ( $phone ) : ?>
                        <a href="tel:<?php echo esc_attr( $phone_href ); ?>" class="btn btn--hero">📞 <?php echo esc_html( $phone ); ?></a>
                    <?php endif; ?>
                    <?php if ( $email ) : ?>
                        <a href="mailto:<?php echo esc_attr( $email ); ?>" class="btn btn--outline">📧 <?php echo esc_html( $email ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php get_template_part( 'template-parts/contact-section' ); ?>

</main>
<?php get_footer(); ?>
