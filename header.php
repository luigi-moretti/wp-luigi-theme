<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="relative flex h-auto min-h-screen w-full flex-col bg-neutral-50 group/design-root overflow-x-hidden" style='font-family: "Space Grotesk", "Noto Sans", sans-serif;'>
    <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#eceeee] px-10 py-3">
            <div class="flex items-center gap-4 text-[#131516]">
                <div class="size-4">
                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-[#131516] text-lg font-bold leading-tight tracking-[-0.015em]">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h2>
            </div>
            
            <div class="flex flex-1 justify-end gap-8">
                <div class="flex items-center gap-9">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'flex items-center gap-9',
                        'container' => false,
                        'fallback_cb' => false,
                        'add_li_class' => 'text-[#131516] text-sm font-medium leading-normal',
                        'link_before' => '<span class="text-[#131516] text-sm font-medium leading-normal">',
                        'link_after' => '</span>',
                    ));
                    ?>
                    
                    <?php if (!wp_nav_menu(array('theme_location' => 'primary', 'echo' => false))): ?>
                        <a class="text-[#131516] text-sm font-medium leading-normal" href="#sobre">Sobre Mim</a>
                        <a class="text-[#131516] text-sm font-medium leading-normal" href="#habilidades">Habilidades</a>
                        <a class="text-[#131516] text-sm font-medium leading-normal" href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
                        <a class="text-[#131516] text-sm font-medium leading-normal" href="#contato">Contato</a>
                    <?php endif; ?>
                </div>
                
                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#293338] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em]">
                    <span class="truncate">Currículo</span>
                </button>
            </div>
        </header>