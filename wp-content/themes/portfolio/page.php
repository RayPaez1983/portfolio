<?php
    get_header();
    global $post;
?>

<section class="Page content-wp">
    <article class="Page__container">
        
        <div class="container">
            <?php the_content(); ?>
        </div>

        <?php get_template_part( 'src/atom/button-top/button-top' ); ?>
    </article>
</section>

<?php get_footer(); ?>
