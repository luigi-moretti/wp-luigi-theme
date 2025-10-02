<?php
/**
 * Template para posts individuais
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article class="single-post">
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-featured-image mb-6">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover rounded-lg')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <header class="post-header mb-6">
                        <h1 class="text-[#131516] tracking-light text-[32px] font-bold leading-tight px-4 text-left pb-3 pt-6">
                            <?php the_title(); ?>
                        </h1>
                        
                        <div class="post-meta text-[#6c757a] text-sm font-normal leading-normal px-4 mb-4">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <span class="separator"> • </span>
                            <span class="post-author">Por <?php the_author(); ?></span>
                            <?php if (has_category()): ?>
                                <span class="separator"> • </span>
                                <span class="post-categories"><?php the_category(', '); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>
                    
                    <div class="post-content text-[#131516] text-base font-normal leading-normal px-4">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if (has_tag()): ?>
                        <div class="post-tags px-4 py-6">
                            <h3 class="text-[#131516] text-lg font-bold mb-3">Tags:</h3>
                            <div class="flex gap-2 flex-wrap">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<span class="inline-block bg-[#eceeee] text-[#131516] text-sm font-medium px-3 py-1 rounded-lg">' . esc_html($tag->name) . '</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-navigation px-4 py-6 border-t border-[#eceeee]">
                        <div class="flex justify-between items-center">
                            <div class="prev-post">
                                <?php
                                $prev_post = get_previous_post();
                                if ($prev_post) {
                                    echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" class="text-[#293338] hover:underline">← ' . esc_html($prev_post->post_title) . '</a>';
                                }
                                ?>
                            </div>
                            <div class="next-post">
                                <?php
                                $next_post = get_next_post();
                                if ($next_post) {
                                    echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '" class="text-[#293338] hover:underline">' . esc_html($next_post->post_title) . ' →</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>