<?php
/**
 * ukr-cert-group functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ukr-cert-group
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

show_admin_bar(false);

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ukr_cert_group_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ukr-cert-group, use a find and replace
		* to change 'ukr-cert-group' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ukr-cert-group', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'primary' => __( 'Main Menu', 'ucg' ),
    ) );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ukr_cert_group_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ukr_cert_group_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ukr_cert_group_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ukr_cert_group_content_width', 640 );
}
add_action( 'after_setup_theme', 'ukr_cert_group_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ukr_cert_group_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ukr-cert-group' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ukr-cert-group' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ukr_cert_group_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ukr_cert_group_scripts() {
	wp_enqueue_style( 'ukr-cert-group-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ukr-cert-group-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'ukr_cert_group_scripts' );
function is_vite_active() {
    $port = 5173;

    $connection = @fsockopen('host.docker.internal', $port, $errno, $errstr, 0.1);
    if ($connection) {
        fclose($connection);
        return true;
    }

    return false;
}

/**
 * Подключение ассетов Vite
 */
function vite_assets() {

    $vite_host = 'http://127.0.0.1:5173';
    $dist_path = get_template_directory() . '/dist/';
    $dist_uri  = get_template_directory_uri() . '/dist/';

    if ( is_vite_active() ) {

        // Vite HMR
        wp_enqueue_script(
            'vite-client',
            $vite_host . '/@vite/client',
            [],
            null,
            true
        );

        // Main entry
        wp_enqueue_script(
            'main-js',
            $vite_host . '/src/js/main.js',
            [],
            null,
            true
        );

    } else {

        $manifest_path = $dist_path . '.vite/manifest.json';

        if ( ! file_exists( $manifest_path ) ) {
            return;
        }

        $manifest = json_decode(
            file_get_contents( $manifest_path ),
            true
        );

        if ( empty( $manifest['src/js/main.js'] ) ) {
            return;
        }

        $entry = $manifest['src/js/main.js'];

        // JS
        wp_enqueue_script(
            'main-js',
            $dist_uri . $entry['file'],
            [],
            null,
            true
        );

        // CSS (берётся из JS entry)
        if ( ! empty( $entry['css'][0] ) ) {
            wp_enqueue_style(
                'main-css',
                $dist_uri . $entry['css'][0],
                [],
                null
            );
        }
    }

    // WP vars
    wp_localize_script('main-js', 'landingpad_vars', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('load_more_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'vite_assets');

/**
 * type="module"
 */
function add_module_type_attribute($tag, $handle, $src) {
    if (in_array($handle, ['vite-client', 'main-js'], true)) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_module_type_attribute', 10, 3);

// CPT certifications

function create_certifications_cpt() {
    $labels = array(
        'name' => 'Сертифікації',
        'singular_name' => 'Сертифікація',
        'add_new' => 'Додати стандарт',
        'add_new_item' => 'Додати новий стандарт (напр. ISO 9001)',
        'edit_item' => 'Редагувати стандарт',
        'new_item' => 'Новий стандарт',
        'view_item' => 'Переглянути',
        'search_items' => 'Пошук стандартів',
        'not_found' => 'Стандартів не знайдено',
        'not_found_in_trash' => 'В кошику пусто',
        'menu_name' => 'Сертифікації',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'certification' ), 
        'capability_type' => 'post',
        'has_archive' => 'certifications',
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-awards',
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),        
        'show_in_rest' => true,
    );

    register_post_type( 'certifications', $args );
}
add_action( 'init', 'create_certifications_cpt' );