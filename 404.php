<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ukr-cert-group
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404-page">
			<div class="container">
				<div class="error-404-page__inner">
					<p class="error-404-page__code">404</p>

					<h1 class="error-404-page__title"><?php esc_html_e( 'Сторінку не знайдено', 'ukr-cert-group' ); ?></h1>

					<p class="error-404-page__desc">
						<?php esc_html_e( 'Схоже, ця сторінка не існує або була переміщена. Перевірте правильність адреси або скористайтесь посиланнями нижче.', 'ukr-cert-group' ); ?>
					</p>

					<div class="error-404-page__actions">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="error-404-page__btn error-404-page__btn--primary">
							<?php esc_html_e( 'На головну', 'ukr-cert-group' ); ?>
						</a>
						<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="error-404-page__btn error-404-page__btn--ghost" data-contact-link>
							<?php esc_html_e( "Зв'язатися з нами", 'ukr-cert-group' ); ?>
						</a>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
