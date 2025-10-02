<?php
/**
 * Template para arquivos (categorias, tags, etc.)
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <header class="archive-header mb-8">
            <h1 class="text-[#131516] tracking-light text-[32px] font-bold leading-tight px-4 text-left pb-3 pt-6">
                <?php the_archive_title(); ?>
            </h1>
            
            <?php if (get_the_archive_description()): ?>
                <div class="archive-description text-[#131516] text-base font-normal leading-normal px-4">
                    <?php the_archive_description(); ?>
                </div>
            <?php endif; ?>
        </header>

        <?php if (have_posts()): ?>
            <div class="archive-posts">
                <?php while (have_posts()): the_post(); ?>
                    <article class="archive-post-item p-4 mb-6 bg-white rounded-lg shadow-sm">
                        
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail mb-4">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('blog-thumbnail', array('class' => 'w-full h-48 object-cover rounded-lg')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h2 class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3">
                                <a href="<?php the_permalink(); ?>" class="hover:text-[#293338]">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="post-meta text-[#6c757a] text-sm font-normal leading-normal mb-3">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="separator"> • </span>
                                <span class="post-author">Por <?php the_author(); ?></span>
                            </div>
                            
                            <div class="post-excerpt text-[#131516] text-base font-normal leading-normal mb-4">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" 
                               class="inline-flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#eceeee] text-[#131516] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#293338] hover:text-white transition-colors">
                                <span class="truncate">Ler mais</span>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
                
                <!-- Paginação -->
                <div class="pagination-wrapper flex justify-center mt-8">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '« Anterior',
                        'next_text' => 'Próximo »',
                        'class' => 'pagination flex gap-2'
                    ));
                    ?>
                </div>
            </div>
            
        <?php else: ?>
            <div class="no-posts p-4">
                <h2 class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3">
                    Nenhum post encontrado
                </h2>
                <p class="text-[#131516] text-base font-normal leading-normal">
                    Não há posts nesta categoria/arquivo ainda.
                </p>
            </div>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>