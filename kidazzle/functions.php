<?php
/**
 * KIDazzle Academy Theme Functions
 *
 * @package KIDazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function kidazzle_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add image sizes
    add_image_size('kidazzle-hero', 1200, 800, true);
    add_image_size('kidazzle-card', 600, 400, true);
    add_image_size('kidazzle-team', 400, 400, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'kidazzle'),
        'footer'  => esc_html__('Footer Menu', 'kidazzle'),
    ));

    // Switch default core markup to HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for wide and full alignment
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'kidazzle_setup');

/**
 * Enqueue scripts and styles
 */
function kidazzle_scripts() {
    // Google Fonts
    wp_enqueue_style('kidazzle-google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap', array(), null);
    
    // Theme stylesheet
    wp_enqueue_style('kidazzle-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Lucide Icons (for SVG icons)
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js', array(), null, true);
    
    // Custom JS
    wp_enqueue_script('kidazzle-main', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'kidazzle_scripts');

/**
 * Register widget areas
 */
function kidazzle_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 1', 'kidazzle'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'kidazzle'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column 2', 'kidazzle'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'kidazzle'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'kidazzle_widgets_init');

/**
 * Custom template tags
 */
function kidazzle_get_svg_icon($icon_name, $class = '') {
    $class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
    return '<i data-lucide="' . esc_attr($icon_name) . '"' . $class_attr . '></i>';
}

/**
 * Helper function to get theme colors
 */
function kidazzle_get_colors() {
    return array(
        'primary'          => 'hsl(235, 75%, 52%)',
        'primary-light'    => 'hsl(232, 68%, 62%)',
        'secondary'        => 'hsl(45, 93%, 50%)',
        'secondary-light'  => 'hsl(45, 96%, 58%)',
    );
}

/**
 * Add custom body classes
 */
function kidazzle_body_classes($classes) {
    // Add page slug as class
    if (is_page()) {
        $classes[] = 'page-' . sanitize_html_class(get_post_field('post_name', get_queried_object_id()));
    }
    
    return $classes;
}
add_filter('body_class', 'kidazzle_body_classes');

/**
 * Customizer settings
 */
function kidazzle_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('kidazzle_contact', array(
        'title'    => esc_html__('Contact Information', 'kidazzle'),
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('kidazzle_phone', array(
        'default'           => '1-800-KIDAZZLE',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kidazzle_phone', array(
        'label'   => esc_html__('Phone Number', 'kidazzle'),
        'section' => 'kidazzle_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('kidazzle_email', array(
        'default'           => 'hello@kidazzle.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('kidazzle_email', array(
        'label'   => esc_html__('Email Address', 'kidazzle'),
        'section' => 'kidazzle_contact',
        'type'    => 'email',
    ));

    // Hours
    $wp_customize->add_setting('kidazzle_hours', array(
        'default'           => 'Mon-Fri: 6:30am - 6:30pm',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kidazzle_hours', array(
        'label'   => esc_html__('Business Hours', 'kidazzle'),
        'section' => 'kidazzle_contact',
        'type'    => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('kidazzle_social', array(
        'title'    => esc_html__('Social Media Links', 'kidazzle'),
        'priority' => 35,
    ));

    $social_platforms = array('facebook', 'instagram', 'twitter', 'youtube');
    foreach ($social_platforms as $platform) {
        $wp_customize->add_setting('kidazzle_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('kidazzle_' . $platform, array(
            'label'   => ucfirst($platform) . ' URL',
            'section' => 'kidazzle_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'kidazzle_customize_register');

/**
 * Add excerpt support to pages
 */
function kidazzle_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'kidazzle_add_excerpts_to_pages');
