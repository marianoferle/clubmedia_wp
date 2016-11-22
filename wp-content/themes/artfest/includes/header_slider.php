
    <header class="">
        <div class="col s12 m12 l12">
              <?php echo do_shortcode('[sp_responsiveslider design="design-2"]'); ?>
        </div>



        <!-- ...............................modulo dinamico de destacados.............................................-->
        <script id="template_destacado_index" type="text/x-handlebars-template">
              {{#each videos}}
              {{#ifCond @index '<' 4}}
                 <li class="col s12 m6 l3">
                     <div class="cont_destacado_header_moduloCont">

                         <a href="{{ moduloDestacado_index_linkPost this.categorias }}"target='_self' title=''>
                             <img src="{{srcImg}}" alt=""/>
                             <div class="cont_destacado_header_moduloCont_fondo_opacity{{@key}}"></div>
                             <div class="cont_info_destacado_header">
                               {{#each this.categorias}}
                                    {{moduloDestacado_index this.categorias}}
                               {{/each}}
                               <p>{{titulo}}</p>
                             </div>
                         </a>
                     </div>
                 </li>
                 {{/ifCond}}
              {{/each}}
        </script>


        <!-- ..........contenido de resultado de destacados index...................... -->
        <div id="cont_destacado_header" class="col s12 m12 l12">
            <ul class="row"></ul>
        </div>





                  	<!-- ..........contenido de resultado de destacados index...................... -->
        		        <div id="cont_destacado_header" class="col s12 m12 l12">
        		            <ul class="row">

                          	<?php query_posts( array ( 'category_name' => 'cat-destacados', 'posts_per_page' => 4 ) ); ?>
                          		<?php if ( have_posts() ) : ?>
                              	<?php
        												$count_post_dest_head=0;
        												while ( have_posts() ) : the_post();
        												$count_post_dest_head++;
        												 ?>

                               <li class="col s12 m6 l3">
                                   <div class="cont_destacado_header_moduloCont">
                                       <a href="<?php the_permalink(); ?>" target='_self' title=''>
        																 	<img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url();} ?>" />
                                           <div class="cont_destacado_header_moduloCont_fondo_opacity<?php echo	$count_post_dest_head-1 ?>"></div>
                                           <div class="cont_info_destacado_header">
        																		 <div class="cont_destacado_header_moduloCont_item1"><?php the_category();?></div>
        																     <p><?php the_title(); ?></p>
                                           </div>
                                       </a>
                                   </div>
                               </li>

                             	<?php endwhile; ?>
                             <?php else : ?>
                                <p><?php _e('Ups!, no hay entradas.'); ?></p>
                             <?php endif; ?>
        		            </ul>
        		        </div>




  </header>
