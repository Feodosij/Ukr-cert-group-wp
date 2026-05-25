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
        'footer_menu' => __( 'Footer menu', 'ucg' )
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
        'name' => 'Сертификации',
        'singular_name' => 'Сертификация',
        'add_new' => 'Добавить стандарт',
        'add_new_item' => 'Добавить новый стандарт (напр. ISO 9001)',
        'edit_item' => 'Редактировать стандарт',
        'new_item' => 'Новий стандарт',
        'view_item' => 'Посмотреть',
        'search_items' => 'Поиск стандартов',
        'not_found' => 'Стандартов не найдено',
        'not_found_in_trash' => 'В корзине пусто',
        'menu_name' => 'Сертификации',
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
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes' ),        
        'show_in_rest' => true,
    );

    register_post_type( 'certifications', $args );
}
add_action( 'init', 'create_certifications_cpt' );

// Drag-and-drop sorting for certifications in admin
function ucg_certifications_admin_order() {
    add_action( 'admin_enqueue_scripts', function ( $hook ) {
        if ( $hook !== 'edit.php' || ( $_GET['post_type'] ?? '' ) !== 'certifications' ) {
            return;
        }
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_add_inline_script( 'jquery-ui-sortable', '
            jQuery(function($){
                var $tbody = $("table.wp-list-table tbody#the-list");
                if (!$tbody.length) return;
                $tbody.sortable({
                    axis: "y",
                    handle: "td",
                    cursor: "grabbing",
                    placeholder: "ui-sortable-placeholder",
                    opacity: 0.7,
                    update: function(){
                        var order = [];
                        $tbody.find("tr").each(function(i){
                            order.push($(this).attr("id").replace("post-","") + ":" + i);
                        });
                        $.post(ajaxurl, {
                            action: "ucg_sort_certifications",
                            order: order.join(","),
                            _ajax_nonce: "' . wp_create_nonce( 'ucg_sort_certs' ) . '"
                        });
                    }
                });
                $tbody.find("td").css("cursor","grab");
            });
        ' );
        wp_add_inline_style( 'wp-admin', '
            .ui-sortable-placeholder { height: 60px; background: #fef9c3 !important; visibility: visible !important; }
        ' );
    });

    add_action( 'wp_ajax_ucg_sort_certifications', function () {
        check_ajax_referer( 'ucg_sort_certs' );
        $order = sanitize_text_field( $_POST['order'] ?? '' );
        foreach ( explode( ',', $order ) as $item ) {
            list( $id, $pos ) = explode( ':', $item );
            wp_update_post( array( 'ID' => absint( $id ), 'menu_order' => absint( $pos ) ) );
        }
        wp_send_json_success();
    });
}
ucg_certifications_admin_order();

function ucg_certifications_default_orderby( $query ) {
    if ( is_admin() && $query->is_main_query() && ( $query->get( 'post_type' ) === 'certifications' ) && ! $query->get( 'orderby' ) ) {
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'ucg_certifications_default_orderby' );

// ACF: Options Page «Настройка сайта»
add_action( 'acf/init', function () {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'page_title'  => 'Настройка сайта',
            'menu_title'  => 'Настройка сайта',
            'menu_slug'   => 'site-settings',
            'capability'  => 'manage_options',
            'position'    => '6',
            'icon_url'    => 'dashicons-admin-settings',
            'redirect'    => false,
        ) );
    }
} );

// ACF: зберігати JSON у папці теми
add_filter( 'acf/settings/save_json', function () {
    return get_template_directory() . '/acf-json';
} );

// ACF: завантажувати JSON із папки теми
add_filter( 'acf/settings/load_json', function ( $paths ) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
} );

// Оборачиваем <table> в скроллируемый контейнер
add_filter( 'the_content', function ( $content ) {
    return preg_replace(
        '/<table/i',
        '<div class="table-responsive" style="overflow-x: auto;"><table',
        preg_replace(
            '/<\/table>/i',
            '</table></div>',
            $content
        )
    );
} );


// Регистрируем шорткод для вывода таблицы ACF
add_shortcode( 'custom_acf_table', 'render_acf_table_shortcode' );

function render_acf_table_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'field' => 'costom_table', 
    ), $atts );

    $table = get_field( $atts['field'], get_the_ID() );

    if ( empty( $table ) ) {
        return '';
    }

    ob_start();
    ?>
    
    <div class="custom-table-wrapper glass-panel">
        <table class="custom-table">
            
            <?php if ( ! empty( $table['caption'] ) ) : ?>
                <caption><?php echo esc_html( $table['caption'] ); ?></caption>
            <?php endif; ?>

            <?php if ( ! empty( $table['header'] ) ) : ?>
                <thead>
                    <tr>
                        <?php foreach ( $table['header'] as $th ) : ?>
                            <th><?php echo esc_html( $th['c'] ); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
            <?php endif; ?>

            <?php if ( ! empty( $table['body'] ) ) : ?>
                <tbody>
                    <?php foreach ( $table['body'] as $tr ) : ?>
                        <tr>
                            <?php foreach ( $tr as $td ) : ?>
                                <td><?php echo esc_html( $td['c'] ); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>

        </table>
    </div>

    <?php
    // Возвращаем собранный HTML-код
    return ob_get_clean();
}


function custom_cyrillic_transliterate( $title ) {
    $cyrillic = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',   'г' => 'h',   'ґ' => 'g',
        'д' => 'd',   'е' => 'e',   'є' => 'ie',  'ж' => 'zh',  'з' => 'z',
        'и' => 'y',   'і' => 'i',   'ї' => 'i',   'й' => 'i',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',   'о' => 'o',   'п' => 'p',
        'р' => 'r',   'с' => 's',   'т' => 't',   'у' => 'u',   'ф' => 'f',
        'х' => 'kh',  'ц' => 'ts',  'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shch',
        'ь' => '',    'ю' => 'iu',  'я' => 'ia',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',   'Г' => 'H',   'Ґ' => 'G',
        'Д' => 'D',   'Е' => 'E',   'Є' => 'Ye',  'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'Y',   'І' => 'I',   'Ї' => 'Yi',  'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',   'О' => 'O',   'П' => 'P',
        'Р' => 'R',   'С' => 'S',   'Т' => 'T',   'У' => 'U',   'Ф' => 'F',
        'Х' => 'Kh',  'Ц' => 'Ts',  'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Shch',
        'Ь' => '',    'Ю' => 'Yu',  'Я' => 'Ya',
        
        // Русские буквы (на всякий случай, если попадутся)
        'ы' => 'y', 'ъ' => '', 'э' => 'e', 'ё' => 'yo',
        'Ы' => 'Y', 'Ъ' => '', 'Э' => 'E', 'Ё' => 'Yo'
    );

    return strtr( $title, $cyrillic );
}

// Применяем фильтр к созданию ссылок постов
add_filter( 'sanitize_title', 'custom_cyrillic_transliterate', 9 );
// Применяем фильтр к названиям загружаемых файлов (картинок)
add_filter( 'sanitize_file_name', 'custom_cyrillic_transliterate', 10 );

// CPT: Заявки (Leads)
function ucg_register_leads_cpt() {
    register_post_type( 'leads', array(
        'labels' => array(
            'name'               => 'Заявки',
            'singular_name'      => 'Заявка',
            'add_new'            => 'Додати заявку',
            'add_new_item'       => 'Нова заявка',
            'edit_item'          => 'Переглянути заявку',
            'view_item'          => 'Переглянути',
            'search_items'       => 'Пошук заявок',
            'not_found'          => 'Заявок не знайдено',
            'not_found_in_trash' => 'В кошику порожньо',
            'menu_name'          => 'Заявки',
        ),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-email-alt',
        'supports'            => array( 'title' ),
        'capability_type'     => 'post',
        'capabilities'        => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap'        => true,
    ) );
}
add_action( 'init', 'ucg_register_leads_cpt' );

function ucg_leads_meta_box() {
    add_meta_box(
        'ucg_lead_details',
        'Деталі заявки',
        'ucg_render_lead_meta_box',
        'leads',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ucg_leads_meta_box' );

function ucg_render_lead_meta_box( $post ) {
    $phone   = get_post_meta( $post->ID, '_lead_phone', true );
    $email   = get_post_meta( $post->ID, '_lead_email', true );
    $message = get_post_meta( $post->ID, '_lead_message', true );
    $source  = get_post_meta( $post->ID, '_lead_source', true );
    ?>
    <table class="form-table">
        <tr>
            <th>Телефон</th>
            <td><?php echo esc_html( $phone ); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo esc_html( $email ?: '—' ); ?></td>
        </tr>
        <tr>
            <th>Повідомлення</th>
            <td><?php echo nl2br( esc_html( $message ?: '—' ) ); ?></td>
        </tr>
        <tr>
            <th>Джерело</th>
            <td><?php echo esc_html( $source ); ?></td>
        </tr>
    </table>
    <?php
}

function ucg_leads_columns( $columns ) {
    $new = array();
    $new['cb']           = $columns['cb'];
    $new['title']        = "Ім'я";
    $new['lead_phone']   = 'Телефон';
    $new['lead_email']   = 'Email';
    $new['lead_source']  = 'Джерело';
    $new['date']         = 'Дата';
    return $new;
}
add_filter( 'manage_leads_posts_columns', 'ucg_leads_columns' );

function ucg_leads_column_data( $column, $post_id ) {
    switch ( $column ) {
        case 'lead_phone':
            echo esc_html( get_post_meta( $post_id, '_lead_phone', true ) );
            break;
        case 'lead_email':
            echo esc_html( get_post_meta( $post_id, '_lead_email', true ) ?: '—' );
            break;
        case 'lead_source':
            $source = get_post_meta( $post_id, '_lead_source', true );
            echo esc_html( $source === 'hero' ? 'Головна (hero)' : 'Контактна форма' );
            break;
    }
}
add_action( 'manage_leads_posts_custom_column', 'ucg_leads_column_data', 10, 2 );

// Save CF7 submissions as Leads
function ucg_cf7_save_lead( $contact_form ) {
    $submission = WPCF7_Submission::get_instance();
    if ( ! $submission ) {
        return;
    }

    $data    = $submission->get_posted_data();
    $name    = sanitize_text_field( $data['your-name'] ?? '' );
    $phone   = sanitize_text_field( $data['your-phone'] ?? '' );
    $email   = sanitize_email( $data['your-email'] ?? '' );
    $message = sanitize_textarea_field( $data['your-message'] ?? '' );

    $form_title = $contact_form->title();
    $source = ( stripos( $form_title, 'hero' ) !== false ) ? 'hero' : 'contact';

    $post_id = wp_insert_post( array(
        'post_type'   => 'leads',
        'post_title'  => $name ?: 'Без імені',
        'post_status' => 'publish',
    ) );

    if ( $post_id && ! is_wp_error( $post_id ) ) {
        update_post_meta( $post_id, '_lead_phone', $phone );
        update_post_meta( $post_id, '_lead_email', $email );
        update_post_meta( $post_id, '_lead_message', $message );
        update_post_meta( $post_id, '_lead_source', $source );
    }
}
add_action( 'wpcf7_mail_sent', 'ucg_cf7_save_lead' );

if ( function_exists( 'acf_add_local_field_group' ) ) {
    add_action( 'acf/init', function () {
        acf_add_local_field_group( array(
            'key'      => 'group_director_greeting',
            'title'    => 'Блок: Звернення директора',
            'fields'   => array(
                array(
                    'key'           => 'field_director_text',
                    'label'         => 'Текст звернення',
                    'name'          => 'director_text',
                    'type'          => 'wysiwyg',
                    'instructions'  => 'Весь контент: заголовки, абзаци, посилання на автора тощо',
                    'tabs'          => 'all',
                    'toolbar'       => 'full',
                    'media_upload'  => 0,
                ),
                array(
                    'key'     => 'field_director_video_source',
                    'label'   => 'Джерело відео',
                    'name'    => 'director_video_source',
                    'type'    => 'select',
                    'choices' => array(
                        'file'    => 'Завантажити відео-файл',
                        'youtube' => 'Посилання з YouTube',
                    ),
                    'default_value' => 'file',
                    'allow_null'    => 1,
                    'ui'            => 1,
                ),
                array(
                    'key'              => 'field_director_video',
                    'label'            => 'Відео-файл',
                    'name'             => 'director_video',
                    'type'             => 'file',
                    'return_format'    => 'array',
                    'mime_types'       => 'mp4,webm,mov',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_director_video_source',
                                'operator' => '==',
                                'value'    => 'file',
                            ),
                        ),
                    ),
                ),
                array(
                    'key'              => 'field_director_youtube',
                    'label'            => 'YouTube URL',
                    'name'             => 'director_youtube',
                    'type'             => 'url',
                    'instructions'     => 'Наприклад: https://www.youtube.com/watch?v=XXXXX',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_director_video_source',
                                'operator' => '==',
                                'value'    => 'youtube',
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param'    => 'page_template',
                        'operator' => '==',
                        'value'    => 'page-about.php',
                    ),
                ),
            ),
            'position'     => 'normal',
            'style'        => 'default',
            'menu_order'   => 10,
        ) );
    } );
}