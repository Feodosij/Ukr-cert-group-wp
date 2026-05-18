<?php
/**
 * Template Part: Глобальна секція контактів з формою.
 * Дані беруться з Options Page «Налаштування сайту».
 * Підключення: get_template_part( 'template-parts/contact-section' )
 */

$ct_title  = get_field( 'contact_section_title', 'option' );

// Не виводимо нічого, якщо заголовок не задано
if ( ! $ct_title ) {
    return;
}

$ct_desc   = get_field( 'contact_section_desc', 'option' );
$phone     = get_field( 'site_phone', 'option' );
$email     = get_field( 'site_email', 'option' );
$btn_text  = get_field( 'contact_form_btn', 'option' ) ?: 'Надіслати заявку';
$form_note = get_field( 'contact_form_note', 'option' );
?>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="contact-wrapper">

            <div class="contact-info">
                <h2 class="section-title"><?php echo esc_html( $ct_title ); ?></h2>
                <?php if ( $ct_desc ) : ?>
                    <p class="contact-desc"><?php echo esc_html( $ct_desc ); ?></p>
                <?php endif; ?>

                <?php if ( $phone || $email ) : ?>
                    <div class="contact-details">
                        <?php if ( $phone ) :
                            $phone_href = preg_replace( '/[^+\d]/', '', $phone ); ?>
                            <div class="contact-detail-item">
                                <span class="icon">📞</span>
                                <a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ( $email ) : ?>
                            <div class="contact-detail-item">
                                <span class="icon">📧</span>
                                <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="contact-form-box">
                <?php echo do_shortcode( '[contact-form-7 id="834f10f" html_class="main-form"]' ); ?>

                <?php if ( $form_note ) : ?>
                    <p class="form-note"><?php echo esc_html( $form_note ); ?></p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
