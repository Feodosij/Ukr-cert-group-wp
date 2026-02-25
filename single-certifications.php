<?php get_header(); ?>

<?php 
// Логика для фоновой картинки
// 1. Пробуем взять установленную миниатюру записи
$bg_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );

// 2. Если миниатюры нет, берем картинку по умолчанию (путь исправлен на src)
if (!$bg_img) {
    $bg_img = get_template_directory_uri() . '/src/img/certification.png';
}
?>
<main>
<section class="page-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/cert-fon.webp');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title">Сертифікація <?php the_title(); ?> - тільки з нами!</h1> 
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
                        // Получаем ID текущей страницы, чтобы подсветить её в меню
                        $current_id = get_the_ID(); 
                        
                        $sidebar_query = new WP_Query( array(
                            'post_type'      => 'certifications',
                            'posts_per_page' => -1,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order title'
                        ) );

                        if ( $sidebar_query->have_posts() ) :
                            while ( $sidebar_query->have_posts() ) : $sidebar_query->the_post(); 
                                // Проверяем: если это текущая страница -> добавляем класс active
                                $active_class = ($post->ID == $current_id) ? 'active' : '';
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

            <main class="cert-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article class="cert-article">
                        <div class="breadcrumbs" style="margin-bottom: 20px; color: #666;">
                            <a href="<?php echo home_url(); ?>">Головна</a> / 
                            <a href="<?php echo get_post_type_archive_link('certifications'); ?>">Сертифікації</a> / 
                            <span><?php the_title(); ?></span>
                        </div>

                        <h2 class="cert-article__title"><?php the_title(); ?></h2>
                        
                        <div class="cert-article__body user-content">
                            <?php the_content(); ?>
                        </div>

                        <div class="benefits-section">
                            <div class="benefits-intro">
                                <p>Покращуйте ефективність та відповідальність вашої компанії, оптимізуйте процеси управління та зміцнюйте конкурентні переваги разом із Провідним органом сертифікації систем менеджменту в Україні — <strong>Українською сертифікаційною групою</strong>.</p>
                            </div>

                            <div class="benefits-list">
                                
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <div class="benefit-content">
                                        <h4>Відповідальність та відповідність</h4>
                                        <p>Сертифікат підтверджує дотримання найкращих світових практик та стандартів, підвищуючи довіру до бренду.</p>
                                    </div>
                                </div>

                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <div class="benefit-content">
                                        <h4>Оптимізація процесів</h4>
                                        <p>Впровадження стандарту допомагає зменшити витрати ресурсів, мінімізувати ризики та усунути зайві операції.</p>
                                    </div>
                                </div>

                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <div class="benefit-content">
                                        <h4>Системне управління</h4>
                                        <p>Ефективний менеджмент підвищує керованість компанією, покращує репутацію та інвестиційну привабливість.</p>
                                    </div>
                                </div>

                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <div class="benefit-content">
                                        <h4>Міжнародне визнання</h4>
                                        <p>Сертифікація визнається у всьому світі, що відкриває нові ринки та спрощує участь у тендерах.</p>
                                    </div>
                                </div>

                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <div class="benefit-content">
                                        <h4>Професійний супровід</h4>
                                        <p>Наші експерти проведуть вас через увесь процес сертифікації: від аудиту до отримання документу.</p>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="benefits-conclusion">
                                <p><strong>Не відкладайте на завтра те, що може зробити ваш бізнес успішнішим вже сьогодні!</strong></p>
                            </div>
                        </div>

                        <div class="cert-cta-block">
                            <h3>Замовити <?php the_title(); ?></h3>
                            <p>Залиште заявку для розрахунку вартості та термінів.</p>
                            <a href="#contact" class="btn btn--hero">Отримати розрахунок</a>
                        </div>
                    </article>

                <?php endwhile; ?>
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