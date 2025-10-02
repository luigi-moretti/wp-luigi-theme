<?php
/**
 * Frontend Dev Portfolio Theme Functions
 */

// Previne acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Setup do tema
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
    
    // Registrar menus
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'frontend-dev-portfolio'),
    ));
    
    // Tamanhos de imagem customizados
    add_image_size('blog-thumbnail', 400, 250, true);
    add_image_size('project-thumbnail', 600, 400, true);
}
add_action('after_setup_theme', 'frontend_dev_theme_setup');

/**
 * Enqueue scripts e styles
 */
function frontend_dev_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?display=swap&family=Noto+Sans:wght@400;500;700;900&family=Space+Grotesk:wght@400;500;700', array(), '1.0.0');
    
    // Tailwind CSS
    wp_enqueue_script('tailwind-config', 'https://cdn.tailwindcss.com?plugins=forms,container-queries', array(), '3.3.0', false);
    
    // Tema principal
    wp_enqueue_style('frontend-dev-style', get_stylesheet_uri(), array('google-fonts'), wp_get_theme()->get('Version'));
    
    // JavaScript customizado
    wp_enqueue_script('frontend-dev-script', get_template_directory_uri() . '/js/main.js', array(), wp_get_theme()->get('Version'), true);
    
    // Localização para AJAX
    wp_localize_script('frontend-dev-script', 'frontend_dev_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('frontend_dev_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'frontend_dev_enqueue_scripts');

/**
 * Registrar sidebars
 */
function frontend_dev_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar Principal', 'frontend-dev-portfolio'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Adicione widgets aqui.', 'frontend-dev-portfolio'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'frontend_dev_widgets_init');

/**
 * Custom Post Type: Habilidades
 */
function create_skills_post_type() {
    register_post_type('skills',
        array(
            'labels' => array(
                'name' => __('Habilidades'),
                'singular_name' => __('Habilidade'),
                'add_new' => __('Adicionar Nova'),
                'add_new_item' => __('Adicionar Nova Habilidade'),
                'edit_item' => __('Editar Habilidade'),
                'new_item' => __('Nova Habilidade'),
                'view_item' => __('Ver Habilidade'),
                'search_items' => __('Buscar Habilidades'),
                'not_found' => __('Nenhuma habilidade encontrada'),
                'not_found_in_trash' => __('Nenhuma habilidade encontrada na lixeira')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-star-filled',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_skills_post_type');

/**
 * Custom Post Type: Projetos
 */
function create_projects_post_type() {
    register_post_type('projects',
        array(
            'labels' => array(
                'name' => __('Projetos'),
                'singular_name' => __('Projeto'),
                'add_new' => __('Adicionar Novo'),
                'add_new_item' => __('Adicionar Novo Projeto'),
                'edit_item' => __('Editar Projeto'),
                'new_item' => __('Novo Projeto'),
                'view_item' => __('Ver Projeto'),
                'search_items' => __('Buscar Projetos'),
                'not_found' => __('Nenhum projeto encontrado'),
                'not_found_in_trash' => __('Nenhum projeto encontrado na lixeira')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_projects_post_type');

/**
 * Adicionar campos customizados para contato
 */
function frontend_dev_customizer($wp_customize) {
    // Seção de contato
    $wp_customize->add_section('contact_section', array(
        'title' => __('Informações de Contato', 'frontend-dev-portfolio'),
        'priority' => 30,
    ));
    
    // Nome do desenvolvedor
    $wp_customize->add_setting('developer_name', array(
        'default' => 'Alex',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('developer_name', array(
        'label' => __('Nome do Desenvolvedor', 'frontend-dev-portfolio'),
        'section' => 'contact_section',
        'type' => 'text',
    ));
    
    // Descrição do desenvolvedor
    $wp_customize->add_setting('developer_description', array(
        'default' => 'Sou um desenvolvedor frontend apaixonado por criar interfaces de usuário interativas e responsivas.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('developer_description', array(
        'label' => __('Descrição do Desenvolvedor', 'frontend-dev-portfolio'),
        'section' => 'contact_section',
        'type' => 'textarea',
    ));
    
    // Email de contato
    $wp_customize->add_setting('contact_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email de Contato', 'frontend-dev-portfolio'),
        'section' => 'contact_section',
        'type' => 'email',
    ));
}
add_action('customize_register', 'frontend_dev_customizer');

/**
 * Processar formulário de contato
 */
function handle_contact_form() {
    if (!wp_verify_nonce($_POST['nonce'], 'frontend_dev_nonce')) {
        wp_die('Segurança falhou');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    
    $to = get_theme_mod('contact_email', get_option('admin_email'));
    $subject = 'Nova mensagem do site - ' . $name;
    $body = "Nome: $name\nEmail: $email\n\nMensagem:\n$message";
    $headers = array('Content-Type: text/html; charset=UTF-8', "From: $name <$email>");
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success('Mensagem enviada com sucesso!');
    } else {
        wp_send_json_error('Erro ao enviar mensagem.');
    }
}
add_action('wp_ajax_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'handle_contact_form');

/**
 * Função para obter habilidades
 */
function get_skills() {
    $skills = get_posts(array(
        'post_type' => 'skills',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    
    return $skills;
}

/**
 * Função para obter projetos
 */
function get_projects($limit = 3) {
    $projects = get_posts(array(
        'post_type' => 'projects',
        'posts_per_page' => $limit,
        'post_status' => 'publish'
    ));
    
    return $projects;
}