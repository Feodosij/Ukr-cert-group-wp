<?php
/**
 * Template Name: Training Page (Підготовка персоналу)
 */

get_header(); ?>

<main class="privacy-policy-wrapper">
    <div class="container"> 
        
        <?php 
        // Запускаем стандартный цикл WordPress
        while ( have_posts() ) : the_post(); 
        ?>
            
            <h1 class="privacy-title"><?php the_title(); ?></h1>
            
            <div class="privacy-content">
                <?php 
                // Эта функция выведет весь текст, который ты вставил в редакторе в админке
                the_content(); 
                ?>
            </div>

        <?php endwhile; // Конец цикла ?>
        
    </div>
</main>


<?php get_footer(); ?>