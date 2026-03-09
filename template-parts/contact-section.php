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
                <form action="#" method="POST" class="main-form">

                    <div class="form-group">
                        <label for="f-name">Ваше ім'я</label>
                        <input type="text" id="f-name" name="name" class="form-input" placeholder="Олександр" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="f-phone">Телефон</label>
                            <input type="tel" id="f-phone" name="phone" class="form-input" placeholder="+38 (0__) ___ __ __" required>
                        </div>
                        <div class="form-group">
                            <label for="f-email">Email</label>
                            <input type="email" id="f-email" name="email" class="form-input" placeholder="mail@example.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="f-message">Коментар</label>
                        <textarea id="f-message" name="message" class="form-input" rows="4" placeholder="Текст повідомлення..."></textarea>
                    </div>

                    <button type="submit" class="btn btn--hero btn--full-width">
                        <?php echo esc_html( $btn_text ); ?>
                    </button>

                    <?php if ( $form_note ) : ?>
                        <p class="form-note"><?php echo esc_html( $form_note ); ?></p>
                    <?php endif; ?>

                </form>
            </div>

        </div>
    </div>
</section>
