<?php
/*
* Template Name: Front page
* Template Post Type: page
*/

get_header(); ?>



<main>
    <section class="hero">
        <div class="hero__bg-layer"></div>

        <div class="container hero__container">
            
            <div class="hero__top-row">
                
                <div class="hero__text-col">
                    <div class="hero__logo-text">Ukraine Certification Group</div> 
                    <h1 class="hero__title">Провідний орган сертифікації систем менеджменту</h1>
                    <p class="hero__desc">Ми допомагаємо бізнесу відповідати міжнародним стандартам та підвищувати ефективність через впровадження ISO та ESG практик.</p>
                </div>

                <div class="hero__form-col">
                    <div class="request-card">
                        <h3 class="request-card__title">Безкоштовна консультація</h3>
                        <p class="request-card__subtitle">Залиште номер, ми передзвонимо за 5 хвилин</p>
                        
                        <form class="hero-form-vertical">
                            <input type="text" placeholder="Ваше ім'я" class="input-glass">
                            <input type="tel" placeholder="+38 (0__) ___ __ __" class="input-glass">
                            <button type="submit" class="btn btn--hero btn--full">Отримати консультацію</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="hero__bottom-panel">
                <div class="hero-card">
                    <div class="hero-card__icon">📜</div> 
                    <h3 class="hero-card__title">Сертифікація систем</h3>
                </div>
                
                <div class="hero-card">
                    <div class="hero-card__icon">👥</div>
                    <h3 class="hero-card__title">Підготовка персоналу</h3>
                </div>
                
                <div class="hero-card">
                    <div class="hero-card__icon">🌱</div>
                    <h3 class="hero-card__title">ESG для бізнесу</h3>
                </div>
                
                <div class="hero-card">
                    <div class="hero-card__icon">⚡</div>
                    <h3 class="hero-card__title">Lean виробництво</h3>
                </div>
            </div>

        </div>

        <div class="marquee-section">
            <div class="marquee-header">
                <span class="marquee-label">НАША ФОРМУЛА:</span>
            </div>

            <div class="marquee-wrapper">
                <div class="marquee-group">
                <span class="text">СИСТЕМНІСТЬ</span>
                <span class="sep-symbol">+</span>
                
                <span class="text">ЛЮДСЬКИЙ ФАКТОР</span>
                <span class="sep-symbol">+</span>
                
                <span class="text">ІННОВАЦІЇ</span>
                <span class="sep-symbol">=</span>
                
                <span class="text">РЕЗУЛЬТАТ</span>
                
                <span class="sep-block"></span>
                </div>

                <div class="marquee-group" aria-hidden="true">
                <span class="text">СИСТЕМНІСТЬ</span>
                <span class="sep-symbol">+</span>
                <span class="text">ЛЮДСЬКИЙ ФАКТОР</span>
                <span class="sep-symbol">+</span>
                <span class="text">ІННОВАЦІЇ</span>
                <span class="sep-symbol">=</span>
                <span class="text">РЕЗУЛЬТАТ</span>
                <span class="sep-block"></span>
                </div>
            </div>
        </div>

    </section>

    <section class="why-choose section-padding">
        <div class="container">
            
            <header class="why-header">
                <h2 class="section-title">Чому обирають нас партнери в Україні та за кордоном</h2>
                <p class="section-desc">
                    Створюємо умови розвитку інтегрованих систем менеджменту, що поєднують вимоги кількох стандартів і відповідають найкращим світовим практикам.
                </p>
            </header>

            <div class="why-cards layout-grid"> 
                
                <div class="why-card glass-panel">
                    <div class="why-icon">🏆</div> <div class="why-content">
                        <h3>20+ років практики</h3>
                        <p>Реальний досвід в галузі систем менеджменту та сертифікації.</p>
                    </div>
                </div>

                <div class="why-card glass-panel">
                    <div class="why-icon">🎓</div>
                    <div class="why-content">
                        <h3>Команда експертів</h3>
                        <p>Аудитори та консультанти національного та міжнародного рівня.</p>
                    </div>
                </div>

                <div class="why-card glass-panel">
                    <div class="why-icon">🚀</div>
                    <div class="why-content">
                        <h3>Результативність</h3>
                        <p>Орієнтація на розвиток бізнесу, а не просто отримання паперів.</p>
                    </div>
                </div>

                <div class="why-card glass-panel">
                    <div class="why-icon">🌍</div>
                    <div class="why-content">
                        <h3>Визнання</h3>
                        <p>Довіра серед українських та іноземних компаній у різних галузях.</p>
                    </div>
                </div>

            </div>

            <footer class="why-footer">
                <div class="glass-panel text-block">
                    <p>Наш підхід – Ваші можливості довгострокової ефективності і стійкий розвиток компаній, формування культури системного управління, що змінює майбутнє бізнесу.</p>
                </div>
            </footer>
        </div>
    </section>

    
    <section class="certifications-section">
        <div class="container">
            
            <div class="cert-top-row">
                <div class="cert-top-left">
                    <h2 class="section-title">Сертифікація систем менеджменту за міжнародними стандартами</h2>
                    <p class="section-desc">Підвищуйте довіру клієнтів та ефективність бізнесу завдяки впровадженню світових практик.</p>
                </div>

                <div class="cert-top-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/certification.png" alt="Сертифікація ISO">
                </div>
            </div>

            <div class="cert-list-wrapper">
                <h3 class="cert-list-label">Наші ключові напрями:</h3>
                
                <div class="cert-cloud">
                    <?php
                    $cert_query = new WP_Query( array(
                        'post_type' => 'certifications',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'orderby' => 'menu_order title'
                    ) );

                    if ( $cert_query->have_posts() ) :
                        while ( $cert_query->have_posts() ) : $cert_query->the_post(); ?>
                            
                            <a href="<?php the_permalink(); ?>" class="cert-pill">
                                <span class="cert-pill__text"><?php the_title(); ?></span>
                                <span class="cert-pill__arrow">→</span>
                            </a>

                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>

        </div>
    </section>

   <section class="services-detail section-padding">
        <div class="container">
            <h2 class="section-title">Наші послуги</h2>
            
            <div class="services-list">
            <article class="service-item card">
                <div class="service-item__icon-box">📜</div>
                <div class="service-item__content">
                <h3>Сертифікація систем менеджменту</h3>
                <p>Впровадження міжнародних стандартів ISO (9001, 14001, 45001). Ми проводимо аудит, готуємо документи та супроводжуємо до отримання сертифікату.</p>
                </div>
            </article>

            <article class="service-item card">
                <div class="service-item__icon-box">👥</div>
                <div class="service-item__content">
                <h3>Підготовка персоналу</h3>
                <p>Навчання співробітників, підвищення кваліфікації, тренінги для внутрішніх аудиторів. Ваші люди — ваш головний капітал.</p>
                </div>
            </article>

            <article class="service-item card">
                <div class="service-item__icon-box">🌱</div>
                <div class="service-item__content">
                <h3>ESG для бізнесу</h3>
                <p>Екологічне, соціальне та корпоративне управління. Допомагаємо будувати стійкий бізнес, привабливий для інвесторів.</p>
                </div>
            </article>

            <article class="service-item card">
                <div class="service-item__icon-box">⚡</div>
                <div class="service-item__content">
                <h3>Ощадливе виробництво (Lean)</h3>
                <p>Оптимізація процесів, усунення втрат та підвищення продуктивності праці за методологією Lean.</p>
                </div>
            </article>
            </div>
        </div>
    </section>


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


</main>

<?php get_footer(); ?>