<?php
/**
 * Template Name: About Us (Про нас)
 */

get_header();

$bg_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $bg_img ) {
    $bg_img = get_field( 'about_hero_bg' ) ?: get_template_directory_uri() . '/src/img/about-hero.jpg';
}

$hero_desc = get_field( 'about_hero_desc' );
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

<div class="about-page-wrapper section-padding">
    <div class="container">
        <div class="about-grid">

            <?php
            // INTRO CARD
            $intro_title   = get_field( 'about_intro_title' );
            if ( $intro_title ) :
                $intro_text    = get_field( 'about_intro_text' );
                $intro_mission = get_field( 'about_intro_mission' );
            ?>
                <section class="about-card glass-panel intro-card">
                    <div class="about-card__header">
                        <h2 class="section-title"><?php echo esc_html( $intro_title ); ?></h2>
                    </div>
                    <div class="about-card__body">
                        <?php if ( $intro_text ) : ?>
                            <p class="text-lg"><?php echo esc_html( $intro_text ); ?></p>
                        <?php endif; ?>
                        <?php if ( $intro_mission ) : ?>
                            <div class="mission-box"><?php echo esc_html( $intro_mission ); ?></div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

             <?php
        $d_text     = get_field( 'director_text' );
        $d_source   = get_field( 'director_video_source' );
        $d_video    = get_field( 'director_video' );
        $d_youtube  = get_field( 'director_youtube' );

        if ( $d_text ) :
            $has_file    = $d_source === 'file' && is_array( $d_video ) && ! empty( $d_video['url'] );
            $has_youtube = $d_source === 'youtube' && $d_youtube;
            $yt_id       = '';
            if ( $has_youtube && preg_match( '/(?:youtu\.be\/|youtube\.com\/(?:watch\?.*v=|embed\/|shorts\/))([a-zA-Z0-9_-]{11})/', $d_youtube, $m ) ) {
                $yt_id = $m[1];
            }
            $section_class = $has_file ? 'director--float' : 'director--wide';
        ?>
            <section class="director-greeting glass-panel <?php echo esc_attr( $section_class ); ?>">

                <?php if ( $has_youtube && $yt_id ) : ?>
                    <div class="director-greeting__youtube">
                        <iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $yt_id ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                    </div>
                <?php endif; ?>

                <?php if ( $has_file ) : ?>
                    <div class="director-greeting__video-float">
                        <video controls playsinline preload="metadata">
                            <source src="<?php echo esc_url( $d_video['url'] ); ?>" type="<?php echo esc_attr( $d_video['mime_type'] ); ?>">
                        </video>
                    </div>
                <?php endif; ?>

                <?php echo wp_kses_post( $d_text ); ?>

            </section>
        <?php endif; ?>

            <?php
            // DIRECTIONS CARD
            $dir_title = get_field( 'about_dir_title' );
            if ( $dir_title ) :
                $dir_icon = get_field( 'about_dir_icon' );
            ?>
                <section class="about-card glass-panel">
                    <div class="about-card__header">
                        <?php if ( is_array( $dir_icon ) && ! empty( $dir_icon['url'] ) ) : ?>
                            <div class="icon-box">
                                <img src="<?php echo esc_url( $dir_icon['url'] ); ?>" alt="<?php echo esc_attr( $dir_icon['alt'] ); ?>" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <h3><?php echo esc_html( $dir_title ); ?></h3>
                    </div>
                    <div class="about-card__body">
                        <?php if ( have_rows( 'about_directions' ) ) : ?>
                            <ul class="styled-list">
                                <?php while ( have_rows( 'about_directions' ) ) : the_row();
                                    $dir_label = get_sub_field( 'dir_label' );
                                    $dir_text  = get_sub_field( 'dir_text' );
                                    if ( $dir_label || $dir_text ) : ?>
                                        <li>
                                            <?php if ( $dir_label ) : ?><strong><?php echo esc_html( $dir_label ); ?>:</strong> <?php endif; ?>
                                            <?php if ( $dir_text ) : ?><?php echo esc_html( $dir_text ); ?><?php endif; ?>
                                        </li>
                                    <?php endif;
                                endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php
            // ESG CARD
            $esg_title = get_field( 'about_esg_title' );
            if ( $esg_title ) :
                $esg_icon = get_field( 'about_esg_icon' );
                $esg_text = get_field( 'about_esg_text' );
            ?>
                <section class="about-card glass-panel esg-card" id="esg-card">
                    <div class="about-card__header">
                        <?php if ( is_array( $esg_icon ) && ! empty( $esg_icon['url'] ) ) : ?>
                            <div class="icon-box">
                                <img src="<?php echo esc_url( $esg_icon['url'] ); ?>" alt="<?php echo esc_attr( $esg_icon['alt'] ); ?>" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <h3><?php echo esc_html( $esg_title ); ?></h3>
                    </div>
                    <div class="about-card__body">
                        <?php if ( $esg_text ) : ?>
                            <p><?php echo esc_html( $esg_text ); ?></p>
                        <?php endif; ?>
                        <?php if ( have_rows( 'about_esg_items' ) ) : ?>
                            <div class="esg-features">
                                <?php while ( have_rows( 'about_esg_items' ) ) : the_row();
                                    $esg_label     = get_sub_field( 'esg_label' );
                                    $esg_item_text = get_sub_field( 'esg_text' );
                                    if ( $esg_label || $esg_item_text ) : ?>
                                        <div class="esg-item">
                                            <span class="check-icon">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 6L5 9L10 3" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <div>
                                                <?php if ( $esg_label ) : ?><strong><?php echo esc_html( $esg_label ); ?>:</strong> <?php endif; ?>
                                                <?php if ( $esg_item_text ) : ?><?php echo esc_html( $esg_item_text ); ?><?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php
            // BENEFITS CARD
            $benefits_title = get_field( 'about_benefits_title' );
            if ( $benefits_title ) :
            ?>
                <section class="about-card glass-panel benefits-card">
                    <div class="about-card__header">
                        <h2 class="section-title"><?php echo esc_html( $benefits_title ); ?></h2>
                    </div>
                    <?php if ( have_rows( 'about_benefits' ) ) : ?>
                        <div class="benefits-grid">
                            <?php while ( have_rows( 'about_benefits' ) ) : the_row();
                                $btype  = get_sub_field( 'benefit_type' );
                                $bvalue = get_sub_field( 'benefit_value' );
                                $bimage = get_sub_field( 'benefit_image' );
                                $btext  = get_sub_field( 'benefit_text' );
                                if ( $bvalue || ( is_array( $bimage ) && ! empty( $bimage['url'] ) ) ) : ?>
                                    <div class="benefit-box">
                                        <?php if ( $btype === 'number' && $bvalue ) : ?>
                                            <div class="benefit-number"><?php echo esc_html( $bvalue ); ?></div>
                                        <?php elseif ( is_array( $bimage ) && ! empty( $bimage['url'] ) ) : ?>
                                            <div class="benefit-icon benefit-icon--about">
                                                <img src="<?php echo esc_url( $bimage['url'] ); ?>" alt="<?php echo esc_attr( $bimage['alt'] ); ?>" loading="lazy">
                                            </div>
                                        <?php endif; ?>
                                        <?php if ( $btext ) : ?><p><?php echo esc_html( $btext ); ?></p><?php endif; ?>
                                    </div>
                                <?php endif;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>

        </div>

        <?php
        // ============================================================
        // CTA-блок
        // ============================================================
        $cta_title = get_field( 'about_cta_title' );
        $cta_text  = get_field( 'about_cta_text' );
        $phone     = get_field( 'site_phone', 'option' );
        $email     = get_field( 'site_email', 'option' );

        if ( $cta_title ) :
            $phone_href = $phone ? preg_replace( '/[^+\d]/', '', $phone ) : '';
        ?>
            <div class="about-cta glass-panel">
                <h3><?php echo esc_html( $cta_title ); ?></h3>
                <?php if ( $cta_text ) : ?>
                    <p><?php echo esc_html( $cta_text ); ?></p>
                <?php endif; ?>
                <div class="cta-contacts">
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
