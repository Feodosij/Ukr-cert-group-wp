<?php
/**
 * Template Name: About Us (Про нас)
 */

get_header(); 

// Логіка для фонової картинки (якщо не задана, ставимо дефолтну)
$bg_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if (!$bg_img) {
    // Замініть на шлях до вашої картинки для сторінки "Про нас"
    $bg_img = get_template_directory_uri() . '/src/img/about-hero.jpg'; 
}
?>
<main>
<section class="page-hero" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title">Українська Сертифікаційна Група</h1>
        <div class="page-hero__desc">
            Ваш партнер у стійкому розвитку, ефективному управлінні та впровадженні міжнародних стандартів.
        </div>
    </div>
</section>

<div class="about-page-wrapper section-padding">
    <div class="container">
        
        <div class="about-grid">

            <section class="about-card glass-panel intro-card">
                <div class="about-card__header">
                    <h2 class="section-title">Провідний орган сертифікації систем менеджменту в Україні</h2>
                </div>
                <div class="about-card__body">
                    <p class="text-lg">
                        Ми забезпечуємо бізнес і організації будь-якого масштабу можливістю сертифікації та безперервного вдосконалення систем менеджменту. Ми інтегруємо найкращі міжнародні практики в діяльність компаній для підвищення результативності, прозорості та сталого розвитку.
                    </p>
                    <div class="mission-box">
                        <strong>Наш підхід:</strong> Ваші можливості довгострокової ефективності, формування культури системного управління, що змінює майбутнє бізнесу.
                    </div>
                </div>
            </section>

            <section class="about-card glass-panel">
                <div class="about-card__header">
                    <div class="icon-box">📜</div>
                    <h3>Ключові напрями діяльності</h3>
                </div>
                <div class="about-card__body">
                    <ul class="styled-list">
                        <li>
                            <strong>Сертифікація за міжнародними стандартами:</strong> 
                            ISO 9001, 14001, 45001, 50001, 37001, 22301, IATF 16949 та інші.
                        </li>
                        <li>
                            <strong>Інтегровані системи:</strong> 
                            Створюємо умови розвитку систем, що поєднують вимоги кількох стандартів та відповідають світовим практикам.
                        </li>
                        <li>
                            <strong>Науково обґрунтована допомога:</strong> 
                            Експертиза у сферах ESG, Lean (Ощадливе виробництво) та сталого розвитку.
                        </li>
                        <li>
                            <strong>Навчання:</strong> 
                            Професійна підготовка керівників, менеджерів та аудиторів.
                        </li>
                    </ul>
                </div>
            </section>

            <section class="about-card glass-panel esg-card">
                <div class="about-card__header">
                    <div class="icon-box">🌱</div>
                    <h3>ESG та Сталий розвиток</h3>
                </div>
                <div class="about-card__body">
                    <p>
                        Комплексне впровадження <strong>ESG-підходу</strong> (екологія, соціальна відповідальність, корпоративне управління) та розробка індивідуальних стратегій відповідно до цілей ООН.
                    </p>
                    <div class="esg-features">
                        <div class="esg-item">
                            <span class="check-icon">✔</span>
                            <div>
                                <strong>Актуальність:</strong> Прозоре управління та екологічна ефективність — ключ до інвестицій.
                            </div>
                        </div>
                        <div class="esg-item">
                            <span class="check-icon">✔</span>
                            <div>
                                <strong>Стратегія:</strong> Розробка KPI, інтеграція ESG у довгострокові бізнес-цілі.
                            </div>
                        </div>
                        <div class="esg-item">
                            <span class="check-icon">✔</span>
                            <div>
                                <strong>Фінанси:</strong> Доступ до пільгового фінансування та грантів для еко-проєктів.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-card glass-panel benefits-card">
                <div class="about-card__header">
                    <h2 class="section-title text-center">Чому обирають нас?</h2>
                </div>
                
                <div class="benefits-grid">
                    <div class="benefit-box">
                        <div class="benefit-number">20+</div>
                        <p>Років практики в галузі систем менеджменту</p>
                    </div>
                    <div class="benefit-box">
                        <div class="benefit-icon">👥</div>
                        <p>Досвідчена команда аудиторів та експертів міжнародного рівня</p>
                    </div>
                    <div class="benefit-box">
                        <div class="benefit-icon">🚀</div>
                        <p>Орієнтація на результативність та реальний розвиток бізнесу</p>
                    </div>
                    <div class="benefit-box">
                        <div class="benefit-icon">🌍</div>
                        <p>Визнання серед українських та іноземних компаній</p>
                    </div>
                </div>
            </section>

        </div>

        <div class="about-cta glass-panel">
            <h3>Почніть зміни вже сьогодні</h3>
            <p>Українська сертифікаційна група — ваш партнер у стратегічному управлінні.</p>
            <div class="cta-contacts">
                <a href="tel:+380990109001" class="btn btn--hero">📞 +38 09 9010 9001</a>
                <a href="mailto:ukr.cert.group@ukr.net" class="btn btn--outline">✉️ ukr.cert.group@ukr.net</a>
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
</div>
</main>
<?php get_footer(); ?>