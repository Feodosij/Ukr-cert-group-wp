<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ukr-cert-group
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ukr-cert-group' ); ?></a>

	
	<header class="site-header">
		<div class="container header-grid">
			<div class="header-logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/src/img/Vector (2).svg" 
						alt="Ukraine Certification Group" 
						class="logo-image">
				</a>
			</div>

			<nav class="header-nav">
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'main-menu',
						'fallback_cb'    => '__return_false',
						'depth'          => 1
					) ); 
				?>
			</nav>
			
			<div class="header-actions">
				<a href="#contact" class="btn btn--small">Зв'язок</a>
			</div>
		</div>
	</header>