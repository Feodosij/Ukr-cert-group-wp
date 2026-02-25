<?php
/**
 * Template Name: Training Page (Підготовка персоналу)
 */

get_header(); 

// Логіка для картинки героя: або мініатюра сторінки, або фолбек
$bg_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if (!$bg_img) {
    // Вставте сюди шлях до картинки, яка підходить для навчання
    $bg_img = get_template_directory_uri() . '/src/img/training-hero.webp'; 
}
?>
<main>
<section class="page-hero" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1 class="page-hero__title"><?php the_title(); ?></h1>
        <div class="page-hero__desc">
            Професійне навчання для ефективного впровадження вимог міжнародних стандартів ISO 9001, 14001, 45001 та інструментів Lean.
        </div>
    </div>
</section>

<div class="training-page-wrapper section-padding">
    <div class="container">
        
        <div class="training-grid">

            <article class="training-card glass-panel" id="managers">
                <div class="training-card__header">
                    <div class="training-icon">👨‍💼</div>
                    <h2 class="training-title">Підготовка менеджерів систем менеджменту</h2>
                </div>
                <div class="training-card__body">
                    <p class="training-desc">
                        Українська сертифікаційна група пропонує професійне навчання менеджерів для ефективного впровадження вимог міжнародних стандартів (ISO 9001, ISO 14001, ISO 45001).
                    </p>
                    <ul class="check-list">
                        <li><strong>Сучасні методики навчання:</strong> інтерактивні тренінги, кейс-стаді, практичні заняття та симуляції реальних управлінських ситуацій.</li>
                        <li><strong>Практична орієнтація:</strong> навчання побудоване на реальних прикладах впровадження систем менеджменту в організаціях різних галузей.</li>
                        <li><strong>Комплексний підхід:</strong> менеджери отримують знання про нормативну базу, внутрішні процедури, аудит та покращення процесів.</li>
                        <li><strong>Підвищення конкурентоспроможності:</strong> підготовлені менеджери здатні оптимізувати процеси та зменшувати ризики.</li>
                    </ul>
                </div>
            </article>

            <article class="training-card glass-panel" id="internal-auditors">
                <div class="training-card__header">
                    <div class="training-icon">🔍</div>
                    <h2 class="training-title">Підготовка внутрішніх аудиторів</h2>
                </div>
                <div class="training-card__body">
                    <p class="training-desc">
                        Ключ до ефективної системи менеджменту. Внутрішні аудитори забезпечують контроль за ефективністю системи, виявляють ризики та недоліки.
                    </p>
                    <ul class="check-list">
                        <li><strong>Чому це важливо:</strong> аудитори допомагають організації постійно вдосконалювати процеси.</li>
                        <li><strong>Сучасні методики:</strong> симуляції внутрішніх аудитів у реальних умовах.</li>
                        <li><strong>Практична орієнтація:</strong> навчання дає навички планування, проведення аудитів та підготовки звітів.</li>
                        <li><strong>Професійний супровід:</strong> наші експерти підтримують учасників під час навчання.</li>
                    </ul>
                    <div class="training-result">
                        💡 Результат: фахівці, які успішно підвищують безпеку процесів у своїх організаціях.
                    </div>
                </div>
            </article>

            <article class="training-card glass-panel" id="lead-auditors">
                <div class="training-card__header">
                    <div class="training-icon">🏆</div>
                    <h2 class="training-title">Підготовка провідних аудиторів</h2>
                </div>
                <div class="training-card__body">
                    <p class="training-desc">
                        Просунутий рівень компетенцій. Підготовка аудиторів, здатних очолювати аудиторські команди та проводити аудити другої сторони (аудит постачальників).
                    </p>
                    <ul class="check-list">
                        <li><strong>Що це означає:</strong> провідний аудитор володіє високим рівнем знань, здатен давати рекомендації для стратегічного поліпшення.</li>
                        <li><strong>Просунутий рівень:</strong> методи аналізу ризиків, оцінка ефективності систем та підготовка детальних звітів.</li>
                        <li><strong>Робота з командою:</strong> навички керування аудиторськими групами.</li>
                    </ul>
                    <div class="training-cta">
                        Підніміть свої компетенції на новий рівень — станьте майстром аудиту!
                    </div>
                </div>
            </article>

            <article class="training-card glass-panel" id="lean">
                <div class="training-card__header">
                    <div class="training-icon">⚡</div>
                    <h2 class="training-title">Підготовка Lean менеджерів</h2>
                </div>
                <div class="training-card__body">
                    <p class="training-desc">
                        Ефективне управління та оптимізація процесів. Впровадження принципів Lean Management для зменшення витрат.
                    </p>
                    <ul class="check-list">
                        <li><strong>Що це дає:</strong> системний підхід до усунення втрат та підвищення продуктивності.</li>
                        <li><strong>Інструменти:</strong> навчання включає Lean, Kaizen, 5S, Kanban та інші методи оптимізації.</li>
                        <li><strong>Результат:</strong> понад 7 000 прокачаних спеціалістів, які успішно впроваджують Lean-підходи.</li>
                    </ul>
                </div>
            </article>

        </div>

        <div class="training-contact glass-panel">
            <h3>Готові навчати свою команду?</h3>
            <p>Понад 7 000 спеціалістів вже пройшли наше навчання. Приєднуйтесь до професіоналів!</p>
            <div class="contact-buttons">
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