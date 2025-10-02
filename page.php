<?php
/**
 * Template para páginas estáticas
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article class="single-page">
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="page-featured-image mb-6">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover rounded-lg')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <header class="page-header mb-6">
                        <h1 class="text-[#131516] tracking-light text-[32px] font-bold leading-tight px-4 text-left pb-3 pt-6">
                            <?php the_title(); ?>
                        </h1>
                    </header>
                    
                    <div class="page-content text-[#131516] text-base font-normal leading-normal px-4">
                        <?php the_content(); ?>
                    </div>
                    
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>