<?php get_header(); ?>



<h1 class="page-title">
  <?php printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
</h1>

<?php
  $category_description = category_description();
  if ( ! empty( $category_description ) )
  echo '<div class="archive-meta">' . $category_description . '</div>';

  get_template_part( 'loop', 'category' );

?>





<?php
$args = array ( 'category' => ID, 'posts_per_page' => 5);
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post);
 ?>
	  <?php the_content(); ?>
<?php endforeach; ?>



<?php get_footer(); ?>
