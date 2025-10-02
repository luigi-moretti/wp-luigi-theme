<?php
/**
 * Frontend Dev Portfolio Block Theme Functions
 */

// Previne acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Setup do tema de blocos
 */
function frontend_dev_theme_setup() {
    // Suporte a título dinâmico
    add_theme_support('title-tag');
    
    // Suporte a imagens destacadas
    add_theme_support('post-thumbnails');
    
    // Suporte a HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    
    // Suporte a feeds automáticos
    add_theme_support('automatic-feed-links');
    
    // Suporte a logos customizados
    add_theme_support('custom-logo');
    
    // Suporte a editor de estilos de blocos
    add_theme_support('editor-styles');
    
    // Suporte a alinhamento wide/full
    add_theme_support('align-wide');
    
    // Suporte a blocos responsivos
    add_theme_support('responsive-embeds');
    
    // Permitir classes CSS customizadas em blocos
    add_theme_support('custom-line-height');
    add_theme_support('custom-spacing');
    add_theme_support('custom-units');
    
    // Suporte a aparecer na inserção de blocos
    add_theme_support('block-template-parts');
}
add_action('after_setup_theme', 'frontend_dev_theme_setup');

/**
 * Permitir classes CSS personalizadas em blocos
 */
function frontend_dev_allow_custom_classes($block_content, $block) {
    return $block_content;
}
add_filter('render_block', 'frontend_dev_allow_custom_classes', 10, 2);

/**
 * Registrar categorias de blocos personalizadas
 */
function frontend_dev_block_categories($categories) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'frontend-dev',
                'title' => 'Frontend Dev Portfolio',
                'icon'  => 'admin-customizer',
            ),
        )
    );
}
add_filter('block_categories_all', 'frontend_dev_block_categories');

/**
 * Enqueue scripts e styles
 */
function frontend_dev_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?display=swap&family=Noto+Sans:wght@400;500;700;900&family=Space+Grotesk:wght@400;500;700',
        array(),
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'frontend_dev_scripts');