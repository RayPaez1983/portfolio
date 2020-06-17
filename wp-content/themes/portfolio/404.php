<?php 
    get_header();
    global $post, $project_options;
?>

<section class="Page Page404 grid-noGutter-middle-center">
    <?php $class_lang = ICL_LANGUAGE_CODE == 'es' ? 'es' : 'en' ?>
    <article class="Page404__container content-wp <?php echo $class_lang; ?>">
        <h1><?php _e('Lo sentimos, la página que estas buscando, no existe', 'agathostechnology'); ?></h1>

        <figure class="Page404__container__image"></figure>

        <p><?php _e('Por favor intente con otra página, o vuelva al Inicio', 'agathostechnology'); ?></p>
        <a href="<?php echo home_url(); ?>"><?php _e('Ir al Inicio', 'agathostechnology'); ?></a>
    </article>

</section>

<?php get_footer(); ?>
