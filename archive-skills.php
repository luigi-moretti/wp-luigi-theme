<?php
/**
 * Template para archive de habilidades
 */

get_header(); ?>

<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        
        <header class="skills-header mb-8">
            <h1 class="text-[#131516] tracking-light text-[32px] font-bold leading-tight px-4 text-left pb-3 pt-6">
                Minhas Habilidades
            </h1>
            <p class="text-[#6c757a] text-base font-normal leading-normal px-4">
                Tecnologias e ferramentas que domino para criar experiências incríveis.
            </p>
        </header>

        <?php if (have_posts()): ?>
            <div class="skills-grid flex gap-3 p-3 flex-wrap pr-4">
                <?php while (have_posts()): the_post(); ?>
                    <div class="skill-item flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#eceeee] pl-4 pr-4 hover:bg-[#293338] hover:text-white transition-colors cursor-pointer">
                        <p class="text-sm font-medium leading-normal"><?php the_title(); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="no-skills p-4">
                <p class="text-[#6c757a] text-base font-normal leading-normal">
                    Nenhuma habilidade cadastrada ainda.
                </p>
            </div>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>