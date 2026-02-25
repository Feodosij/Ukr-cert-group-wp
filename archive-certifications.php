<?php 
/**
 * Template Name: Archive Certifications
 */
get_header(); ?>
<main>
<section class="page-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/cert-fon.webp');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title">Сертифікація систем менеджменту</h1>
        <div class="page-hero__desc">
            Оберіть необхідний стандарт у меню, щоб дізнатися деталі, або ознайомтесь із загальною інформацією.
        </div>
    </div>
</section>

<div class="cert-page-wrapper">
    <div class="container">
        <div class="cert-layout">
            
            <aside class="cert-sidebar">
                <div class="cert-sidebar__inner">
                    <h3 class="cert-sidebar__title">Стандарти</h3>
                    <nav class="cert-menu">
                        <?php
                        // Получаем список всех сертификаций для меню
                        $sidebar_query = new WP_Query( array(
                            'post_type'      => 'certifications',
                            'posts_per_page' => -1,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order title'
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

            <main class="cert-content">
                <article class="cert-article">
                    <h2 class="cert-article__title">Чому сертифікація важлива?</h2>
                    
                    <div class="cert-article__body user-content">
                        <p>Сертифікація систем менеджменту є стратегічним рішенням для будь-якої організації. Вона дозволяє:</p>
                        <ul>
                            <li>Підвищити ефективність бізнес-процесів.</li>
                            <li>Вийти на міжнародні ринки.</li>
                            <li>Збільшити довіру клієнтів та партнерів.</li>
                            <li>Зменшити ризики та витрати.</li>
                        </ul>
                        <p>Оберіть стандарт у меню ліворуч, щоб дізнатися більше про конкретний напрямок сертифікації, або залиште заявку на безкоштовну консультацію.</p>
                    </div>

                    <div class="cert-cta-block">
                        <h3>Не знаєте, з чого почати?</h3>
                        <p>Наші експерти допоможуть підібрати стандарт саме для вашого бізнесу.</p>
                        <a href="#contact" class="btn btn--hero">Безкоштовна консультація</a>
                    </div>
                </article>
            </main>

        </div>
    </div>


    <section id="contact" class="contact-section">
        <div class="container">
            <div class="contact-wrapper">
                
                <div class="contact-info">
                    <h2 class="section-title">Готові вивести бізнес на новий рівень?</h2>
                    <p class="contact-desc">
                        Залиште заявку, і наші експерти зв'яжуться з вами для детальної консультації.
                    </p>
                    
                    <div class="contact-details">
                        <div class="contact-detail-item">
                            <span class="icon">📞</span>
                            <a href="tel:+380123456789">+38 (012) 345-67-89</a>
                        </div>
                        <div class="contact-detail-item">
                            <span class="icon">📧</span>
                            <a href="mailto:info@ukrcert.com">info@ukrcert.com</a>
                        </div>
                    </div>
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
                            Надіслати заявку
                        </button>
                        
                        <p class="form-note">Натискаючи кнопку, ви погоджуєтесь на обробку персональних даних.</p>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
</main>
<?php get_footer(); ?>