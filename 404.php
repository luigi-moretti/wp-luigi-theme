<?php
/**
 * Template para página 404 - Não encontrado
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <div class="error-404 text-center py-12">
            <div class="error-content">
                <h1 class="text-[#131516] tracking-light text-[64px] font-bold leading-tight mb-4">404</h1>
                
                <h2 class="text-[#131516] text-[32px] font-bold leading-tight tracking-[-0.015em] mb-6">
                    Página não encontrada
                </h2>
                
                <p class="text-[#6c757a] text-lg font-normal leading-normal mb-8 max-w-md mx-auto">
                    A página que você está procurando não existe ou foi movida para outro endereço.
                </p>
                
                <div class="error-actions flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       class="flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-[#293338] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#131516] transition-colors">
                        <span class="truncate">Voltar ao Início</span>
                    </a>
                    
                    <button onclick="history.back()" 
                            class="flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-[#eceeee] text-[#131516] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#d1d5db] transition-colors">
                        <span class="truncate">Página Anterior</span>
                    </button>
                </div>
                
                <!-- Formulário de busca -->
                <div class="search-form-container max-w-md mx-auto">
                    <h3 class="text-[#131516] text-lg font-bold mb-4">Ou tente buscar:</h3>
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="flex gap-2">
                            <input 
                                type="search" 
                                class="form-input flex-1 rounded-lg text-[#131516] focus:outline-0 focus:ring-0 border-none bg-[#eceeee] focus:border-none h-12 placeholder:text-[#6c757a] p-4 text-base font-normal leading-normal"
                                placeholder="Digite sua busca..." 
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
                
                <!-- Posts recentes -->
                <div class="recent-posts mt-12">
                    <h3 class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] mb-6">
                        Posts Recentes
                    </h3>
                    
                    <div class="posts-grid grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <?php
                        $recent_posts = get_posts(array(
                            'numberposts' => 3,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_posts) {
                            foreach ($recent_posts as $post) {
                                setup_postdata($post);
                                ?>
                                <article class="post-card bg-white rounded-lg shadow-sm p-4">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="post-thumbnail mb-3">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('blog-thumbnail', array('class' => 'w-full h-32 object-cover rounded-lg')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <h4 class="text-[#131516] text-base font-bold leading-tight mb-2">
                                        <a href="<?php the_permalink(); ?>" class="hover:text-[#293338]">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    
                                    <p class="text-[#6c757a] text-sm font-normal leading-normal">
                                        <?php echo wp_trim_words(get_the_excerpt(), 12); ?>
                                    </p>
                                </article>
                                <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<p class="text-[#6c757a] col-span-full text-center">Nenhum post encontrado.</p>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Seções de navegação -->
                <div class="site-navigation mt-12">
                    <h3 class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] mb-6">
                        Explorar o Site
                    </h3>
                    
                    <div class="navigation-links grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" 
                           class="nav-link bg-white rounded-lg shadow-sm p-4 text-center hover:shadow-md transition-shadow">
                            <div class="nav-icon text-[#293338] text-2xl mb-2">🏠</div>
                            <h4 class="text-[#131516] font-bold mb-1">Início</h4>
                            <p class="text-[#6c757a] text-sm">Página principal</p>
                        </a>
                        
                        <a href="<?php echo esc_url(home_url('/blog')); ?>" 
                           class="nav-link bg-white rounded-lg shadow-sm p-4 text-center hover:shadow-md transition-shadow">
                            <div class="nav-icon text-[#293338] text-2xl mb-2">📝</div>
                            <h4 class="text-[#131516] font-bold mb-1">Blog</h4>
                            <p class="text-[#6c757a] text-sm">Artigos e tutoriais</p>
                        </a>
                        
                        <a href="<?php echo esc_url(home_url('/#habilidades')); ?>" 
                           class="nav-link bg-white rounded-lg shadow-sm p-4 text-center hover:shadow-md transition-shadow">
                            <div class="nav-icon text-[#293338] text-2xl mb-2">💻</div>
                            <h4 class="text-[#131516] font-bold mb-1">Habilidades</h4>
                            <p class="text-[#6c757a] text-sm">Tecnologias e skills</p>
                        </a>
                        
                        <a href="<?php echo esc_url(home_url('/#contato')); ?>" 
                           class="nav-link bg-white rounded-lg shadow-sm p-4 text-center hover:shadow-md transition-shadow">
                            <div class="nav-icon text-[#293338] text-2xl mb-2">📧</div>
                            <h4 class="text-[#131516] font-bold mb-1">Contato</h4>
                            <p class="text-[#6c757a] text-sm">Entre em contato</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>