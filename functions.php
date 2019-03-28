<?php
/**
 * Technopark functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since 1.0
 */

if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function technopark_setup()
{
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain('technopark');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    add_image_size('technopark-featured-image', 2000, 1200, true);

    add_image_size('technopark-thumbnail-avatar', 100, 100, true);
    add_image_size('technopark-project-thumbnail', 300, 300, true);

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus([
        'home' => __('Home Menu', 'technopark'),
        'social' => __('Social Links Menu', 'technopark'),
        'modal' => __('Modal Menus', 'technopark'),
        'sidebar' => __('Sidebar Menu', 'technopark'),
    ]);


	add_action( 'init', 'codex_property_init' );
	/**
	 * Register a book post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	function codex_property_init() {
		$labels = array(
			'name'               => _x( 'Properties', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Property', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Properties', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Property', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'property', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Property', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Property', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Property', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Property', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Properties', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Properties', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Properties:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No properties found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No properties found in Trash.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'property' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'property', $args );
	}

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', [
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', [
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ]);

    // Add theme support for Custom Logo.
    add_theme_support('custom-logo', [
        'width' => 250,
        'height' => 250,
        'flex-width' => true,
    ]);

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    add_editor_style(['assets/css/editor-style.css', technopark_fonts_url()]);

    // Define and register starter content to showcase the theme on new sites.
    $starter_content = [
        'widgets' => [
            // Place three core-defined widgets in the sidebar area.
            'sidebar-news' => [
                'blog',
            ],

            // Add the core-defined business info widget to the footer 1 area.
            'sidebar-2' => [
                'text_business_info',
            ],

            // Put two core-defined widgets in the footer 2 area.
            'sidebar-3' => [
                'text_about',
                'search',
            ],
        ],

        // Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts' => [
            'home',
            'about' => [
                'thumbnail' => '{{image-sandwich}}',
            ],
            'contact' => [
                'thumbnail' => '{{image-espresso}}',
            ],
            'blog' => [
                'thumbnail' => '{{image-coffee}}',
            ],
            'homepage-section' => [
                'thumbnail' => '{{image-espresso}}',
            ],
        ],

        // Create the custom image attachments used as post thumbnails for pages.
        'attachments' => [
            'image-espresso' => [
                'post_title' => _x('Espresso', 'Theme starter content', 'technopark'),
                'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
            ],
            'image-sandwich' => [
                'post_title' => _x('Sandwich', 'Theme starter content', 'technopark'),
                'file' => 'assets/images/sandwich.jpg',
            ],
            'image-coffee' => [
                'post_title' => _x('Coffee', 'Theme starter content', 'technopark'),
                'file' => 'assets/images/coffee.jpg',
            ],
        ],

        // Default to a static front page and assign the front and posts pages.
        'options' => [
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ],

        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods' => [
            'panel_1' => '{{homepage-section}}',
            'panel_2' => '{{about}}',
            'panel_3' => '{{blog}}',
            'panel_4' => '{{contact}}',
        ],

        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => [
            // Assign a menu to the "top" location.
            'top' => [
                'name' => __('Top Menu', 'technopark'),
                'items' => [
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ],
            ],

            // Assign a menu to the "social" location.
            'social' => [
                'name' => __('Social Links Menu', 'technopark'),
                'items' => [
                    'link_yelp',
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_email',
                ],
            ],
        ],
    ];

    /**
     * Filters Technopark array of starter content.
     *
     * @since Technopark 1.1
     *
     * @param array $starter_content Array of starter content.
     */
    $starter_content = apply_filters('technopark_starter_content', $starter_content);

    add_theme_support('starter-content', $starter_content);
}
add_action('after_setup_theme', 'technopark_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function technopark_content_width()
{
    $content_width = $GLOBALS['content_width'];

    // Get layout.
    $page_layout = get_theme_mod('page_layout');

    // Check if layout is one column.
    if ('one-column' === $page_layout) {
        if (technopark_is_frontpage()) {
            $content_width = 644;
        } elseif (is_page()) {
            $content_width = 740;
        }
    }

    // Check if is single post and there is no sidebar.
    if (is_single() && !is_active_sidebar('sidebar-news')) {
        $content_width = 740;
    }

    /**
     * Filter Technopark content width of the theme.
     *
     * @since Technopark 1.0
     *
     * @param int $content_width Content width in pixels.
     */
    $GLOBALS['content_width'] = apply_filters('technopark_content_width', $content_width);
}
add_action('template_redirect', 'technopark_content_width', 0);

/**
 * Register custom fonts.
 */
function technopark_fonts_url()
{
    $fonts_url = '';

    /*
     * Translators: If there are characters in your language that are not
     * supported by Libre Franklin, translate this to 'off'. Do not translate
     * into your own language.
     */
    $cinzel = _x('on', 'Libre Franklin font: on or off', 'technopark');

    if ('off' !== $cinzel) {
        $font_families = [];

        $font_families[] = 'Cinzel:300,300i,400,400i,600,600i,800,800i';

        $query_args = [
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        ];

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Technopark 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function technopark_resource_hints($urls, $relation_type)
{
    if (wp_style_is('technopark-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = [
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        ];
    }

    return $urls;
}
add_filter('wp_resource_hints', 'technopark_resource_hints', 10, 2);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function technopark_widgets_init()
{
    register_sidebar([
        'name' => __('Blog Sidebar', 'technopark'),
        'id' => 'sidebar-news',
        'description' => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'technopark'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => __('Footer 1', 'technopark'),
        'id' => 'sidebar-2',
        'description' => __('Add widgets here to appear in your footer.', 'technopark'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => __('Footer 2', 'technopark'),
        'id' => 'sidebar-3',
        'description' => __('Add widgets here to appear in your footer.', 'technopark'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'technopark_widgets_init');

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Technopark 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function technopark_excerpt_more($link)
{
    if (is_admin()) {
        return $link;
    }

    $link = sprintf(
        '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url(get_permalink(get_the_ID())),
        /* translators: %s: Name of current post */
        sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'technopark'), get_the_title(get_the_ID()))
    );
    return ' &hellip; ' . $link;
}
add_filter('excerpt_more', 'technopark_excerpt_more');

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Technopark 1.0
 */
function technopark_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'technopark_javascript_detection', 0);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function technopark_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
    }
}
add_action('wp_head', 'technopark_pingback_header');

/**
 * Display custom color CSS.
 */
function technopark_colors_css_wrap()
{
    if ('custom' !== get_theme_mod('colorscheme') && !is_customize_preview()) {
        return;
    }

    require_once get_parent_theme_file_path('/inc/color-patterns.php');
    $hue = absint(get_theme_mod('colorscheme_hue', 250)); ?>
    <style type="text/css" id="custom-theme-colors" <?php if (is_customize_preview()) {
        echo 'data-hue="' . $hue . '"';
    } ?>>
        <?php echo technopark_custom_colors_css(); ?>
    </style>
<?php
}
add_action('wp_head', 'technopark_colors_css_wrap');

/**
 * Enqueue scripts and styles.
 */
function technopark_scripts()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('technopark-fonts', technopark_fonts_url(), [], null);

    // Theme stylesheet.
    wp_enqueue_style('technopark-theme-styles', get_stylesheet_uri());
    wp_enqueue_style('technopark-styles', get_theme_file_uri('/assets/css/app.css'));
    wp_enqueue_style('technopark-custom-styles', get_theme_file_uri('/assets/css/custom.css'));

    // Load the dark colorscheme.
    if ('dark' === get_theme_mod('colorscheme', 'light') || is_customize_preview()) {
        wp_enqueue_style('technopark-colors-dark', get_theme_file_uri('/assets/css/colors-dark.css'), ['technopark-style'], '1.0');
    }

    // Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
    if (is_customize_preview()) {
        wp_enqueue_style('technopark-ie9', get_theme_file_uri('/assets/css/ie9.css'), ['technopark-style'], '1.0');
        wp_style_add_data('technopark-ie9', 'conditional', 'IE 9');
    }

    wp_enqueue_script('technopark-skip-link-focus-fix', get_theme_file_uri('/assets/js/skip-link-focus-fix.js'), [], '1.0', true);

    $technopark_l10n = [
        'quote' => technopark_get_svg(['icon' => 'quote-right']),
    ];

    if (has_nav_menu('top')) {
        wp_enqueue_script('technopark-navigation', get_theme_file_uri('/assets/js/navigation.js'), ['jquery'], '1.0', true);
        $technopark_l10n['expand'] = __('Expand child menu', 'technopark');
        $technopark_l10n['collapse'] = __('Collapse child menu', 'technopark');
        $technopark_l10n['icon'] = technopark_get_svg(['icon' => 'angle-down', 'fallback' => true]);
    }

    wp_enqueue_script('technopark-global', get_theme_file_uri('/assets/js/app.js'), ['jquery'], '1.0', true);

    wp_enqueue_script('technopark-global', get_theme_file_uri('/assets/js/global.js'), ['jquery'], '1.0', true);

    wp_enqueue_script('jquery-scrollto', get_theme_file_uri('/assets/js/jquery.scrollTo.js'), ['jquery'], '2.1.2', true);

    wp_localize_script('technopark-skip-link-focus-fix', 'technoparkScreenReaderText', $technopark_l10n);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'technopark_scripts');

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Technopark 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function technopark_content_image_sizes_attr($sizes, $size)
{
    $width = $size[0];

    if (740 <= $width) {
        $sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
    }

    if (is_active_sidebar('sidebar-news') || is_archive() || is_search() || is_home() || is_page()) {
        if (!(is_page() && 'one-column' === get_theme_mod('page_options')) && 767 <= $width) {
            $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
        }
    }

    return $sizes;
}
add_filter('wp_calculate_image_sizes', 'technopark_content_image_sizes_attr', 10, 2);

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Technopark 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function technopark_header_image_tag($html, $header, $attr)
{
    if (isset($attr['sizes'])) {
        $html = str_replace($attr['sizes'], '100vw', $html);
    }
    return $html;
}
add_filter('get_header_image_tag', 'technopark_header_image_tag', 10, 3);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Technopark 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function technopark_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
    if (is_archive() || is_search() || is_home()) {
        $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
    } else {
        $attr['sizes'] = '100vw';
    }

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'technopark_post_thumbnail_sizes_attr', 10, 3);

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Technopark 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function technopark_front_page_template($template)
{
    return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'technopark_front_page_template');

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Technopark 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function technopark_widget_tag_cloud_args($args)
{
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    $args['format'] = 'list';

    return $args;
}
add_filter('widget_tag_cloud_args', 'technopark_widget_tag_cloud_args');

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path('/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path('/inc/template-tags.php');

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path('/inc/template-functions.php');

/**
 * Customizer additions.
 */
require get_parent_theme_file_path('/inc/customizer.php');

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path('/inc/icon-functions.php');

function custom_mtypes($m)
{
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter('upload_mimes', 'custom_mtypes');

add_filter('wp_nav_menu_objects', 'technopark_wp_nav_menu_objects', 10, 2);

function technopark_wp_nav_menu_objects($items, $args)
{
    // loop
    foreach ($items as &$item) {
        // vars
        $icon = get_field('icon_menu', $item);
        $title = $item->title;
        $item->title = '';

        // append icon
        if ($icon) {
            $item->title .= '<div class="menu-item-icon"><img src="' . $icon['url'] . '" alt=""></div>';
        }

        $item->title .= '<span>' . $title . '</span>';
    }

    // return
    return $items;
}

// add hook
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2);

// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu($sorted_menu_items, $args)
{
    if (isset($args->sub_menu)) {
        $root_id = 0;
        // find the current menu item
        foreach ($sorted_menu_items as $menu_item) {
            if ($menu_item->current) {
                // set the root id based on whether the current menu item has a parent or not
                $root_id = ($menu_item->menu_item_parent) ? $menu_item->menu_item_parent : $menu_item->ID;
                break;
            }
        }
        // find the top level parent
        if (!isset($args->direct_parent)) {
            $prev_root_id = $root_id;
            while ($prev_root_id != 0) {
                foreach ($sorted_menu_items as $menu_item) {
                    if ($menu_item->ID == $prev_root_id) {
                        $prev_root_id = $menu_item->menu_item_parent;
                        // don't set the root_id to 0 if we've reached the top of the menu
                        // if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
                        // break;
                    }
                }
            }
        }

        $menu_item_parents = [];
        foreach ($sorted_menu_items as $key => $item) {
            // init menu_item_parents
            if ($item->ID == $root_id) {
                $menu_item_parents[] = $item->ID;
            }

            if (in_array($item->menu_item_parent, $menu_item_parents) || $item->current_item_parent) {
                // part of sub-tree: keep!
                $menu_item_parents[] = $item->ID;
            } elseif (!(isset($args->show_parent) && in_array($item->ID, $menu_item_parents))) {
                // not part of sub-tree: away with it!
                unset($sorted_menu_items[$key]);
            }
        }
        return $sorted_menu_items;
    } else {
        return $sorted_menu_items;
    }
}

// Before VC Init
add_action('vc_before_init', 'vc_before_init_actions');

function vc_before_init_actions()
{
    /*
    VC Info Box with Icon
     */

    class vcBlockwithicon extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_blockwithicon_mapping']);
            add_shortcode('vc_blockwithicon', [$this, 'vc_blockwithicon_html']);
        }

        public function vc_blockwithicon_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('Block With Icon', 'technopark'),
                    'base' => 'vc_blockwithicon',
                    'description' => __('Block with Icon', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                    'params' => [
                        [
                            'type' => 'attach_image',
                            'holder' => 'img',
                            'class' => 'img-class',
                            'heading' => __('Icon', 'technopark'),
                            'param_name' => 'icon',
                            'value' => '',
                            'group' => 'General',
                            'admin_label' => false,
                        ],

                        [
                            'type' => 'textfield',
                            'holder' => 'h3',
                            'class' => 'title-class',
                            'heading' => __('Title', 'technopark'),
                            'param_name' => 'title',
                            'value' => '',
                            'group' => 'General',
                        ],

                        [
                            'type' => 'textarea',
                            'holder' => 'div',
                            'class' => 'text-class',
                            'value' => '',
                            'heading' => __('Text', 'technopark'),
                            'param_name' => 'text',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'checkbox',
                            'class' => 'checkbox-class',
                            'heading' => __('Use Small Font Size?', 'technopark'),
                            'param_name' => 'is_small',
                            'value' => ['yes' => 'yes'],
                            'group' => 'General',
                        ],
                    ],
                ]
            );
        }

        public function vc_blockwithicon_html($atts)
        {
            // Params extraction
            extract(
                shortcode_atts(
                    [
                        'title' => '',
                        'text' => '',
                        'icon' => '',
                        'is_small' => ''
                    ],
                    $atts
                )
            );

            $title = preg_replace('/m2/', '<span>m<sup>2</sup><span>', $title);
            $is_small = $is_small ? 'vc-icon-block--small' : '';

            // Fill $html var with data
            $html = '
                <div class="vc-icon-block ' . $is_small . '">
                    ' . wp_get_attachment_image($icon, 'full') . '

                    <h2 class="vc-icon-block__title">' . $title . '</h2>

                    <div class="vc-icon-block__text">' . $text . '</div>

                </div>';

            return $html;
        }
    }

    class vcExpBlock extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_expblock_mapping']);
            add_shortcode('vc_expblock', [$this, 'vc_expblock_html']);
        }

        public function vc_expblock_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('Experience Block', 'technopark'),
                    'base' => 'vc_expblock',
                    'description' => __('Experience Block', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                    'params' => [
                        [
                            'type' => 'textfield',
                            'holder' => 'h3',
                            'class' => 'article-info__title',
                            'heading' => __('Title', 'technopark'),
                            'param_name' => 'title',
                            'value' => '',
                            'group' => 'General',
                        ],

                        [
                            'type' => 'textarea_html',
                            'holder' => 'div',
                            'class' => 'text-class',
                            'heading' => __('Text', 'technopark'),
                            'param_name' => 'content',
                            'group' => 'General',
                        ],
                    ],
                ]
            );
        }

        public function vc_expblock_html($atts, $content)
        {
            // Params extraction
            extract(
                shortcode_atts(
                    [
                        'title' => '',
                        // 'content' => ''
                    ],
                    $atts
                )
            );

            // Fill $html var with data
            $html = '
            <div class="article-info__block">
                                    <p class="article-info__title"><strong>' . $title . '</strong></p>
                                    <div class="article-info__text text-normal">' . $content . '</div>
                </div>';

            return $html;
        }
    }

    class vcArticleSlider extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_articleslider_mapping']);
            add_shortcode('vc_articleslider', [$this, 'vc_articleslider_html']);
        }

        public function vc_articleslider_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('Article Slider', 'technopark'),
                    'base' => 'vc_articleslider',
                    'description' => __('Article Slider Block', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                    'params' => [
                        [
                            'type' => 'attach_images',
                            'class' => 'article-info__title',
                            'heading' => __('Images', 'technopark'),
                            'param_name' => 'imgs',
                            'group' => 'General',
                        ]
                    ],
                ]
            );
        }

        public function vc_articleslider_html($atts, $content)
        {
            // Params extraction
            extract(
                shortcode_atts(
                    [
                        'imgs' => [],
                    ],
                    $atts
                )
            );

            $images = explode(',', $imgs);

            // Fill $html var with data
            $html = '
            <div class="article-slider">

              <div class="slider-with-nav">';
            foreach ($images as $img):
                  $html .= '<div>' . wp_get_attachment_image($img, 'full') . '</div>';
            endforeach;
            $html .= '</div>
              <div class="article__imgs-slider slider-nav">';
            foreach ($images as $img):
                  $html .= '<div>' . wp_get_attachment_image($img, 'full') . '</div>';
            endforeach;
            $html .= '
                </div>
              </div>';

            return $html;
        }
    }

    class vcFirmengruppeBlock extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_firmengruppeblock_mapping']);
            add_shortcode('vc_firmengruppeblock', [$this, 'vc_firmengruppeblock_html']);
        }

        public function vc_firmengruppeblock_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('Firmengruppe Block', 'technopark'),
                    'base' => 'vc_firmengruppeblock',
                    'description' => __('Firmengruppe Block', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                    'params' => [
                        [
                            'type' => 'textfield',
                            'class' => 'company__title',
                            'heading' => __('Title', 'technopark'),
                            'param_name' => 'title',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textarea',
                            'class' => 'company__name',
                            'heading' => __('Name', 'technopark'),
                            'param_name' => 'name',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textfield',
                            'class' => 'company__text',
                            'heading' => __('Address', 'technopark'),
                            'param_name' => 'address',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textfield',
                            'class' => 'company__text',
                            'heading' => __('Telephone', 'technopark'),
                            'param_name' => 'phone',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textfield',
                            'class' => 'company__text',
                            'heading' => __('Faq', 'technopark'),
                            'param_name' => 'fax',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textfield',
                            'class' => 'company__site',
                            'heading' => __('Email', 'technopark'),
                            'param_name' => 'email',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textfield',
                            'class' => 'company__site',
                            'heading' => __('Site', 'technopark'),
                            'param_name' => 'site',
                            'group' => 'General',
                        ],
                    ],
                ]
            );
        }

        public function vc_firmengruppeblock_html($atts, $content)
        {
            // Params extraction
            extract(
                shortcode_atts(
                    [
                      'title' => '',
                      'name' => '',
                      'site' => '',
                      'phone' => '',
                      'fax' => '',
                      'email' => '',
                      'address' => ''
                    ],
                    $atts
                )
            );

            // Fill $html var with data
            $html = '
            <div class="company">
              <p class="company__title">' . $title . '</p>
              <div class="company__info">
                <p class="company__name">' . $name . '</p>
                <p class="company__text">' . $address . '</p>
                <p class="company__text">Telephon: ' . $phone . '</p>
                <p class="company__text">Fax: ' . $fax . '</p>
                <p class="company__email"><a href="' . $email . '">' . $email . '</a></p>
                <p class="company__site"><a href="' . $site . '">' . $site . '</a></p>
              </div>
            </div>
            ';

            return $html;
        }
    }

    class vcPartnerBlock extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_partnerblock_mapping']);
            add_shortcode('vc_partnerblock', [$this, 'vc_partnerblock_html']);
        }

        public function vc_partnerblock_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('Partner Block', 'technopark'),
                    'base' => 'vc_partnerblock',
                    'description' => __('Firmengruppe Block', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                    'params' => [
                        [
                            'type' => 'textarea_html',
                            'class' => 'company__title',
                            'heading' => __('Post Type', 'technopark'),
                            'param_name' => 'content',
                            'group' => 'General',
                        ]
                    ],
                ]
            );
        }

        public function vc_partnerblock_html($atts, $content)
        {
            $html = '
              <div class="partners__block">
                <div class="partner">' . $content . '</div>
              </div>
            ';

            return $html;
        }
    }

    class vcPartnersSlider extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_partnersslider_mapping']);
            add_shortcode('vc_partnersslider', [$this, 'vc_partnersslider_html']);
        }

        public function vc_partnersslider_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('partners Slider', 'technopark'),
                    'base' => 'vc_partnersslider',
                    'description' => __('partners Slider Block', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                ]
            );
        }

        public function vc_partnersslider_html($atts, $content)
        {
            $query = new WP_Query(['post_type' => 'mieter']);

            $html = '<div class="brand-slider">';

            while ($query->have_posts()) {
                $query->the_post();

                $html .= '<div class="brand-slide"><img src="' . get_the_post_thumbnail_url() . '"></div>';
            }
            wp_reset_postdata();

            $html .= '</div>';

            return $html;
        }
    }

    class vcMitarbeiterblock extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_mitarbeiterblock_mapping']);
            add_shortcode('vc_mitarbeiterblock', [$this, 'vc_mitarbeiterblock_html']);
        }

        public function vc_mitarbeiterblock_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('Mitarbeiter Block With Image', 'technopark'),
                    'base' => 'vc_mitarbeiterblock',
                    'description' => __('Mitarbeiter Block With Image', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                    'params' => [
                        [
                            'type' => 'attach_image',
                            'holder' => 'img',
                            'class' => 'img-class',
                            'heading' => __('Image', 'technopark'),
                            'param_name' => 'image',
                            'value' => '',
                            'group' => 'General',
                            'admin_label' => false,
                        ],

                        [
                            'type' => 'textfield',
                            'holder' => 'h3',
                            'class' => 'title-class',
                            'heading' => __('Title', 'technopark'),
                            'param_name' => 'name',
                            'value' => '',
                            'group' => 'General',
                        ],

                        [
                            'type' => 'textfield',
                            'holder' => 'p',
                            'class' => 'text-class',
                            'value' => '',
                            'heading' => __('Position', 'technopark'),
                            'param_name' => 'position',
                            'group' => 'General',
                        ],
                        [
                            'type' => 'textfield',
                            'class' => '',
                            'heading' => __('Telefon:', 'technopark'),
                            'param_name' => 'phone',
                            'group' => 'General',
                        ]
                    ],
                ]
            );
        }

        public function vc_mitarbeiterblock_html($atts)
        {
            // Params extraction
            extract(
                shortcode_atts(
                    [
                        'name' => '',
                        'position' => '',
                        'phone' => '',
                        'image' => ''
                    ],
                    $atts
                )
            );

            // Fill $html var with data
            $html = '
                <div class="person">
                    <div class="person__img">' . wp_get_attachment_image($image, 'full') . '</div>
                    <p class="person__name">' . $name . '</p>
                    <p class="person__pos">' . $position . '</p>
                    <p class="person__info">Telefon: ' . $phone . '</p>
                </div>';

            return $html;
        }
    }

    class vcActuelleProjects extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_aktuelle_mapping']);
            add_shortcode('vc_aktuelle', [$this, 'vc_aktuelle_html']);
        }

        public function vc_aktuelle_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('AKTUELLE PROJEKTE', 'technopark'),
                    'base' => 'vc_aktuelle',
                    'description' => __('AKTUELLE PROJEKTE', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                ]
            );
        }

        public function vc_aktuelle_html($atts)
        {
            $query1 = new WP_Query(
                ['post_type' => 'project', 'project_categories' => 'aktuelle-projekte']
            );

            $html = '
            <div class="page-content__block actuelle__block">
                <p class="article__subtitle project-sub">AKTUELLE PROJEKTE</p>
                <div class="row">';
            if ($query1->have_posts()) :
                    while ($query1->have_posts()) :
                        $query1->the_post();
            $html .= '
            <a href="' . get_the_permalink() . '" class="project-item article__col4">
              <div class="project-item__img"><img width="180" height="180" src="' . get_the_post_thumbnail_url(null, 'large') . '"></div>
              <p class="project-item__name">' . get_the_title() . '</p>
              <p class="project-item__date">' . the_field(' project_complete_date ') . '</p>
            </a>';
            endwhile;
            wp_reset_postdata();
            endif;
            $html .= '</div></div>';

            return $html;
        }
    }

    class vcRealProjects extends WPBakeryShortCode
    {
        public function __construct()
        {
            add_action('init', [$this, 'vc_real_mapping']);
            add_shortcode('vc_real', [$this, 'vc_real_html']);
        }

        public function vc_real_mapping()
        {
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            vc_map(
                [
                    'name' => __('REALISIERTE PROJEKTE', 'technopark'),
                    'base' => 'vc_real',
                    'description' => __('REALISIERTE PROJEKTE', 'technopark'),
                    'category' => __('Technopark Elements', 'technopark'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc/element-icon-single-image.svg',
                ]
            );
        }

        public function vc_real_html($atts)
        {
            $query_all = new WP_Query(
                ['post_type' => 'project', 'posts_per_page' => 20, 'project_categories' => 'realisierte-projekte']
            );

            $query2 = new WP_Query(
                [
                    'project_categories' => 'realisierte-projekte'
                ]
            );

            $posts_intern = get_posts([
                'numberposts' => -1,
                'post_type' => 'project',
                'project_categories' => 'realisierte-projekte',
                'meta_key' => 'project_type',
                'meta_value' => 'intern'
            ]);

            $posts_extern = get_posts([
                'numberposts' => -1,
                'post_type' => 'project',
                'project_categories' => 'realisierte-projekte',
                'meta_key' => 'project_type',
                'meta_value' => 'extern'
            ]);

            $html = '
            <div class="page-content__block">
                <p class="article__subtitle project-sub">REALISIERTE projekte</p>
                <div class="project-tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="pills-Alle-tab" data-toggle="pill" href="#pills-Alle" role="tab" aria-controls="pills-Alle" aria-selected="true">Alle</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="pills-intern-tab" data-toggle="pill" href="#pills-intern" role="tab" aria-controls="pills-intern" aria-selected="false">intern</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="pills-extern-tab" data-toggle="pill" href="#pills-extern" role="tab" aria-controls="pills-extern" aria-selected="false">extern</a>
                    </li>
                </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-Alle" role="tabpanel" aria-labelledby="pills-Alle-tab">
                        <div class="row">';
            if ($query_all->have_posts()) :
                while ($query_all->have_posts()) :
            $query_all->the_post();
            $html .= '
                            <a href="' . get_the_permalink() . '" class="project-item article__col4">
                            <div class="project-item__img"><img width="180" height="180" src="' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '"></div>
                            <p class="project-item__name">' . get_the_title() . '</p>
                            <p class="project-item__date">' . the_field(' project_complete_date ') . '</p>
                            </a>';
            endwhile;
            wp_reset_postdata();
            endif;
            $html .= '</div></div>';

            $html .= '
                    <div class="tab-pane fade" id="pills-intern" role="tabpanel" aria-labelledby="pills-intern-tab">
                        <div class="row">';
            if ($posts_intern) : foreach ($posts_intern as $post) : setup_postdata($post);
            $html .= '
                            <a href="' . get_the_permalink($post) . '" class="project-item article__col4">
                            <div class="project-item__img"><img width="180" height="180" src="' . get_the_post_thumbnail_url($post, 'large') . '"></div>
                            <p class="project-item__name">' . get_the_title($post) . '</p>
                            <p class="project-item__date">' . the_field(' project_complete_date ') . '</p>
                            </a>';
            endforeach;
            wp_reset_postdata();
            endif;
            $html .= '</div></div>';

            $html .= '
                    <div class="tab-pane fade" id="pills-extern" role="tabpanel" aria-labelledby="pills-extern-tab">
                        <div class="row">';
            if ($posts_extern) : foreach ($posts_extern as $post) : setup_postdata($post);
            $html .= '
                            <a href="' . get_the_permalink() . '" class="project-item article__col4">
                            <div class="project-item__img"><img width="180" height="180" src="' . get_the_post_thumbnail_url($post, 'medium') . '"></div>
                            <p class="project-item__name">' . get_the_title($post) . '</p>
                            <p class="project-item__date">' . the_field(' project_complete_date ') . '</p>
                            </a>';
            endforeach;
            wp_reset_postdata();
            endif;
            $html .= '</div></div></div></div>';

            return $html;
        }
    }

    new vcRealProjects();
    new vcActuelleProjects();
    new vcPartnerBlock();
    new vcMitarbeiterblock();
    new vcArticleSlider();
    new vcPartnersSlider();
    new vcFirmengruppeBlock();
    new vcBlockwithicon();
    new vcExpBlock();
}

add_shortcode('technopark_icons_block', 'technopark_icons_block_shortcode');

add_filter('tablepress_use_default_css', '__return_false');


add_filter('query_vars', 'rlv_add_qv');
function rlv_add_qv($qv) {
	$qv[] = '_sf_s';
	return $qv;
}
add_filter('relevanssi_match', 'rlv_and_boost');
function rlv_and_boost($match) {
	global $rlv_and_database;
	if (!isset($rlv_and_database[$match->doc])) {
		$rlv_and_database[$match->doc] = true;
	}
	else {
		$match->weight = $match->weight * 2;
	}
	return $match;
}
