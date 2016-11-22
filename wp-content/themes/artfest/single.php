<!-- Archivo de cabecera global de Wordpress -->
<?php get_header(); ?>




<?php the_category( ' ' ); ?>

<!-- Contenido del post -->
<?php if ( have_posts() ) : the_post(); ?>
  <section>
    <h1><?php the_title(); ?></h1>
    <time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time>
    <?php the_content(); ?>
    <address>Por <?php the_author_posts_link() ?></address>
  </section>
<?php else : ?>
  <p><?php _e('Ups!, esta entrada no existe.'); ?></p>
<?php endif; ?>







   <?php
       $cat = get_the_category();
       $cat = $cat[0];
       echo $cat->cat_name;
       echo "<br> cantidad por categoria:  ".$cat->category_count;

   ?>











































<!-- Archivo de barra lateral por defecto -->
<?php get_sidebar(); ?>
<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>
