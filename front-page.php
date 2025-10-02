<?php
/**
 * Template para a página inicial
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <!-- Seção Hero -->
        <h1 class="text-[#131516] tracking-light text-[32px] font-bold leading-tight px-4 text-left pb-3 pt-6">
            Olá, sou <?php echo esc_html(get_theme_mod('developer_name', 'Alex')); ?>
        </h1>
        
        <p class="text-[#131516] text-base font-normal leading-normal pb-3 pt-1 px-4">
            <?php echo esc_html(get_theme_mod('developer_description', 'Sou um desenvolvedor frontend apaixonado por criar interfaces de usuário interativas e responsivas. Com experiência em React, Vue.js e Angular, trago ideias inovadoras para a vida.')); ?>
        </p>

        <!-- Seção Sobre Mim -->
        <h2 id="sobre" class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Sobre Mim</h2>
        
        <?php
        $about_page = get_page_by_path('sobre-mim');
        if ($about_page) {
            echo '<div class="text-[#131516] text-base font-normal leading-normal pb-3 pt-1 px-4">';
            echo apply_filters('the_content', $about_page->post_content);
            echo '</div>';
        } else {
            ?>
            <p class="text-[#131516] text-base font-normal leading-normal pb-3 pt-1 px-4">
                Com uma base sólida em desenvolvimento web, meu foco principal é criar experiências de usuário excepcionais. Minha jornada no mundo da programação começou com um fascínio por resolver problemas e transformar ideias em realidade digital. Ao longo dos anos, aprimorei minhas habilidades em diversas tecnologias frontend, sempre buscando aprender e me adaptar às novas tendências do mercado.
            </p>
            <?php
        }
        ?>

        <!-- Seção Habilidades -->
        <h2 id="habilidades" class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Habilidades</h2>
        
        <div class="flex gap-3 p-3 flex-wrap pr-4">
            <?php
            $skills = get_skills();
            if ($skills) {
                foreach ($skills as $skill) {
                    echo '<div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#eceeee] pl-4 pr-4">';
                    echo '<p class="text-[#131516] text-sm font-medium leading-normal">' . esc_html($skill->post_title) . '</p>';
                    echo '</div>';
                }
            } else {
                // Habilidades padrão se não houver posts
                $default_skills = array('React', 'Vue.js', 'Angular', 'JavaScript', 'HTML', 'CSS');
                foreach ($default_skills as $skill) {
                    echo '<div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#eceeee] pl-4 pr-4">';
                    echo '<p class="text-[#131516] text-sm font-medium leading-normal">' . esc_html($skill) . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <!-- Seção Blog -->
        <h2 class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Blog</h2>
        
        <div class="p-4">
            <?php
            $latest_post = get_posts(array(
                'numberposts' => 1,
                'post_status' => 'publish'
            ));
            
            if ($latest_post) {
                $post = $latest_post[0];
                setup_postdata($post);
                ?>
                <div class="flex items-stretch justify-between gap-4 rounded-lg">
                    <div class="flex flex-col gap-1 flex-[2_2_0px]">
                        <p class="text-[#6c757a] text-sm font-normal leading-normal">Artigo mais recente</p>
                        <p class="text-[#131516] text-base font-bold leading-tight">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                        </p>
                        <p class="text-[#6c757a] text-sm font-normal leading-normal">
                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
                        </p>
                    </div>
                    
                    <?php if (has_post_thumbnail()): ?>
                    <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg flex-1" 
                         style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'blog-thumbnail')); ?>');">
                    </div>
                    <?php else: ?>
                    <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg flex-1" 
                         style='background-image: url("https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80");'>
                    </div>
                    <?php endif; ?>
                </div>
                <?php
                wp_reset_postdata();
            } else {
                ?>
                <div class="flex items-stretch justify-between gap-4 rounded-lg">
                    <div class="flex flex-col gap-1 flex-[2_2_0px]">
                        <p class="text-[#6c757a] text-sm font-normal leading-normal">Artigo mais recente</p>
                        <p class="text-[#131516] text-base font-bold leading-tight">Guia completo para iniciantes em React</p>
                        <p class="text-[#6c757a] text-sm font-normal leading-normal">
                            Um guia passo a passo para começar a construir aplicações com React, desde a configuração do ambiente até a criação de componentes.
                        </p>
                    </div>
                    <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg flex-1" 
                         style='background-image: url("https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80");'>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        
        <div class="flex px-4 py-3 justify-start">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" 
               class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#eceeee] text-[#131516] text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Ver todos os artigos</span>
            </a>
        </div>

        <!-- Seção Contato -->
        <h2 id="contato" class="text-[#131516] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Contato</h2>
        
        <form id="contact-form" class="contact-form">
            <?php wp_nonce_field('frontend_dev_nonce', 'contact_nonce'); ?>
            
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                    <p class="text-[#131516] text-base font-medium leading-normal pb-2">Nome</p>
                    <input
                        name="contact_name"
                        placeholder="Seu nome"
                        required
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131516] focus:outline-0 focus:ring-0 border-none bg-[#eceeee] focus:border-none h-14 placeholder:text-[#6c757a] p-4 text-base font-normal leading-normal"
                    />
                </label>
            </div>
            
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                    <p class="text-[#131516] text-base font-medium leading-normal pb-2">Email</p>
                    <input
                        name="contact_email"
                        type="email"
                        placeholder="Seu email"
                        required
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131516] focus:outline-0 focus:ring-0 border-none bg-[#eceeee] focus:border-none h-14 placeholder:text-[#6c757a] p-4 text-base font-normal leading-normal"
                    />
                </label>
            </div>
            
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                    <p class="text-[#131516] text-base font-medium leading-normal pb-2">Mensagem</p>
                    <textarea
                        name="contact_message"
                        placeholder="Sua mensagem"
                        required
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131516] focus:outline-0 focus:ring-0 border-none bg-[#eceeee] focus:border-none min-h-36 placeholder:text-[#6c757a] p-4 text-base font-normal leading-normal"
                    ></textarea>
                </label>
            </div>
            
            <div class="flex px-4 py-3 justify-start">
                <button
                    type="submit"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#293338] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em]"
                >
                    <span class="truncate">Enviar</span>
                </button>
            </div>
        </form>

        <div id="contact-message" class="px-4 py-2" style="display: none;"></div>
    </div>
</div>

<?php get_footer(); ?>