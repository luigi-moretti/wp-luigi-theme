<?php
/**
 * Template para busca
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <header class="search-header mb-8">
            <h1 class="text-[#131516] tracking-light text-[32px] font-bold leading-tight px-4 text-left pb-3 pt-6">
                <?php
                printf(
                    esc_html__('Resultados da busca por: %s', 'frontend-dev-portfolio'),
                    '<span class="text-[#293338]">' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()): ?>
            <div class="search-results">
                <?php while (have_posts()): the_post(); ?>
                    <article class="search-result-item p-4 mb-6 bg-white rounded-lg shadow-sm">
                        
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
                                <span class="post-type"><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?></span>
                                <span class="separator"> • </span>
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="separator"> • </span>
                                <span class="post-author">Por <?php the_author(); ?></span>
                            </div>
                            
                            <div class="post-excerpt text-[#131516] text-base font-normal leading-normal mb-4">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" 
                               class="inline-flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#eceeee] text-[#131516] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#293338] hover:text-white transition-colors">
                                <span class="truncate">Ver mais</span>
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
            <div class="no-results p-4">
                <h2 class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3">
                    Nenhum resultado encontrado
                </h2>
                <p class="text-[#131516] text-base font-normal leading-normal mb-4">
                    Sua busca por "<?php echo get_search_query(); ?>" não retornou nenhum resultado. Tente palavras-chave diferentes ou mais gerais.
                </p>
                
                <!-- Formulário de busca -->
                <div class="search-form-container">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="flex gap-2">
                            <input 
                                type="search" 
                                class="form-input flex-1 rounded-lg text-[#131516] focus:outline-0 focus:ring-0 border-none bg-[#eceeee] focus:border-none h-12 placeholder:text-[#6c757a] p-4 text-base font-normal leading-normal"
                                placeholder="Digite sua busca..." 
                                value="<?php echo get_search_query(); ?>" 
                                name="s" 
                            />
                            <button 
                                type="submit" 
                                class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-[#293338] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em]"
                            >
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>