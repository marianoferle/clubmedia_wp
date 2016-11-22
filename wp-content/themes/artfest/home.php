<!-- Archivo de cabecera global de Wordpress -->
<?php get_header(); ?>







							<?php
							include('includes/header_slider.php');
							?>




<?php



//$response = wp_remote_get( 'http://localhost/devCode/wordpress/wp-json/wp/v2/posts');
//$response = wp_remote_get( 'http://admin:71ydMHdLjVERYPzdRvS8gk@localhost/devCode/wordpress/wp-json/wp/v2/posts?filter=date');
//$posts = json_encode($response);
//echo $posts;

?>

<script>
/*(function($) {
	$.getJSON('http://admin:71ydMHdLjVERYPzdRvS8gk@localhost/devCode/wordpress/wp-json/wp/v2/posts', {format: "json"}, function(data) {
		$.each(data, function( key, value ) {
		//	console.log(data[key], key,value);
			console.log(data[key].content);
			});
		});
	})(jQuery);*/
</script>


<script>
/*
(function($) {
	$.getJSON('http://localhost/devCode/wordpress/wp-json/wp/v2/posts', {format: "json"}, function(data) {
		$.each(data, function( key, value ) {
		//	console.log(data[key], key,value);
  		console.log(data[key].date, "----------> date");
			console.log(data[key].date_gmt, "----------> date_gmt");
			console.log(data[key].guid.rendered, "----------> guid");
			console.log(data[key].id, "----------> id");
			console.log(data[key].link, "----------> link");
			console.log(data[key].modified, "----------> modified");
			console.log(data[key].modified_gmt, "----------> modified_gmt");
			console.log(data[key].slug, "----------> slug");
			console.log(data[key].status, "----------> status");
			console.log(data[key].type, "----------> type");
			console.log(data[key].title.rendered , "----------> title");
			console.log(data[key].content.rendered, "----------> content");
			console.log(data[key].author, "----------> author");
			console.log(data[key].excerpt.rendered, "----------> excerpt");
			console.log(data[key].featured_media, "----------> featured_media");
			console.log(data[key].comment_status, "----------> comment_status");
			console.log(data[key].ping_status, "----------> ping_status");
			console.log(data[key].format, "----------> format");
			console.log(data[key].sticky, "----------> sticky");
			console.log(data[key].categories , "----------> categories");
			console.log(data[key].tags, "----------> tags");

			console.log("-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.--.-.-.-.-.--.-.-.-.-..-.-.-.-.");






			var tot_cat_=data[key].categories;
			function verResult(item, index){
				//console.log("cat:"+item);
		  }
	  	tot_cat_.forEach(verResult);
		  //console.log(data[key]); //contenido
			});

		});
	})(jQuery);
*/

/*
	(function($) {
		$.getJSON('http://localhost/devCode/wordpress/wp-json/wp/v2/categories', {format: "json"}, function(data2){
				$.each(data2, function(key,value){
							console.log(data2[key].name,"----------> name");
							console.log(data2[key].id,"----------> id");
							console.log(data2[key].count,"----------> count");
							console.log(data2[key].description,"----------> description");
							console.log(data2[key].link,"----------> link");
							console.log(data2[key].slug,"----------> slug");
							console.log(data2[key].taxonomy,"----------> taxonomy");
							console.log(data2[key].parent,"----------> parent");
							console.log(data2[key].order,"----------> order");

							console.log("-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.--.-.-.-.-.--.-.-.-.-..-.-.-.-.");
				});
		});
	})(jQuery);
*/

/*
	(function($) {
		$.getJSON('http://localhost/devCode/wordpress/wp-json/wp/v2/pages', {format: "json"}, function(data2){
				$.each(data2, function(key,value){
							console.log(data2[key].date,"----------> date");
							console.log(data2[key].date_gmt,"----------> date_gmt");
							console.log(data2[key].guid.rendered,"----------> guid");
							console.log(data2[key].id,"----------> id");
							console.log(data2[key].link,"----------> link");
							console.log(data2[key].modified,"----------> modified");
							console.log(data2[key].modified_gmt,"----------> modified_gmt");
							console.log(data2[key].password,"----------> password");
							console.log(data2[key].slug,"----------> slug");
							console.log(data2[key].status,"----------> status");
							console.log(data2[key].type,"----------> type");
							console.log(data2[key].parent,"----------> parent");
							console.log(data2[key].title.rendered,"----------> title");
							console.log(data2[key].content.rendered,"----------> content");
							console.log(data2[key].author,"----------> author");
							console.log(data2[key].excerpt,"----------> excerpt");
							console.log(data2[key].featured_media,"----------> featured_media");
							console.log(data2[key].comment_status,"----------> comment_status");
							console.log(data2[key].ping_status,"----------> ping_status");
							console.log(data2[key].menu_order,"----------> menu_order");
							console.log(data2[key].template,"----------> template");
							console.log(data2[key].context,"----------> context");
							console.log(data2[key].page,"----------> page");
							console.log(data2[key].per_page,"----------> per_page");
							console.log(data2[key].search,"----------> search");
							console.log(data2[key].after,"----------> after");
							console.log(data2[key].author,"----------> author");
							console.log(data2[key].author_exclude,"----------> author_exclude");
							console.log(data2[key].before,"----------> before");
							console.log(data2[key].before,"----------> before");

							console.log("-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.--.-.-.-.-.--.-.-.-.-..-.-.-.-.");
				});
		});
	})(jQuery);

	*/


	(function($) {
		$.getJSON('http://localhost/devCode/wordpress/wp-json/wp/v2/media', {format: "json"}, function(data2){
				$.each(data2, function(key,value){
				    //	console.log(data2[key], key,value, "-.-.-.-.-.-");

	 	    			console.log(data2[key].guid.rendered,"----------> guid");
							console.log(data2[key].media_details.width,"----------> media_details width");
							console.log(data2[key].media_details.height,"----------> media_details height");
							console.log(data2[key].media_details.file,"----------> media_details file");

					  	console.log(data2[key].date,"----------> date");
							console.log(data2[key].date_gmt,"----------> date_gmt");
							console.log(data2[key].guid.rendered,"----------> guid");
							console.log(data2[key].id,"----------> id");
							console.log(data2[key].link,"----------> link");
							console.log(data2[key].modified,"----------> modified");
							console.log(data2[key].modified_gmt,"----------> modified_gmt");
							console.log(data2[key].password,"----------> password");
							console.log(data2[key].slug,"----------> slug");
							console.log(data2[key].status,"----------> status");
							console.log(data2[key].type,"----------> type");
							console.log(data2[key].title.rendered,"----------> title");
							console.log(data2[key].author,"----------> author");
							console.log(data2[key].comment_status,"----------> comment_status");
							console.log(data2[key].ping_status,"----------> ping_status");
							console.log(data2[key].alt_text,"----------> alt_text");
							console.log(data2[key].caption,"----------> caption");
							console.log(data2[key].description,"----------> description");
							console.log(data2[key].media_type,"----------> media_type");
							console.log(data2[key].mime_type,"----------> mime_type");
							console.log(data2[key].media_details,"----------> media_details");
							console.log(data2[key].media_details.width,"----------> media_details width");
							console.log(data2[key].media_details.height,"----------> media_details height");
							console.log(data2[key].media_details.file,"----------> media_details file");
			if(data2[key].post==180){
				    	console.log(data2[key].post,"----------> post");
							console.log(data2[key].source_url,"----------> source_url");
						}
							console.log(data2[key].author_exclude,"----------> author_exclude");

							console.log("-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.--.-.-.-.-.--.-.-.-.-..-.-.-.-.");
				});
		});
	})(jQuery);




		(function($) {

			$.getJSON('http://localhost/devCode/wordpress/wp-json/wp/v2/posts/', {format: "json"}, function(data2){


			$.each(data2, function(key,value){
				    		console.log(data2[key], value);
						/*	  console.log(data2[key].id, "------> id");
								console.log(data2[key].post, "------> post");
								console.log(data2[key].link, "------> link");
								console.log(data2[key].page, "------> page");*/


								console.log("-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.--.-.-.-.-.--.-.-.-.-..-.-.-.-.");
					});
			});
		})(jQuery);



</script>






    <div id="contSection">
     <div class="col s12 m12 l12">



          <div class="col s12 m12 l12">
            <div id="contModalSubHead" class="row">

            <div id="contModalCategoria" class="col s12 m8 l8">



                          <div id="contCategoria1" class="col s12 m12 l8">
                                    <!-- ..........categoria 1 grande........ -->
                                    <div class="contGrandeCat col s12 m12 l12">
                                          <a href="#!" target="_self" title="">
                                              <img src="http://localhost/devCode/wordpress/wp-content/uploads/2016/11/categoria_club_media.jpg"/>
                                              <div class="contCat_fondo_opacity"></div>
                                              <div class="contInfoGrandeCat">
                                                    <h1>Club Media Fest</h1>
                                                    <p>Viví desde adentro cada momento de los shows de tus artistas favoritos y participá por Meet&Greet y entradas VIP.</p>
                                                    <div class="contVidInfo"><p>70 Videos</p><div class="contVidInfo_icon"></div></div>
                                              </div>
                                          </a>
                                    </div>
                                    <!-- ..........categoria 2 chicos........ -->
                                    <div class="contChicoCat col s12 m12 l6" style="background:#ffff01;">
                                        <a href="#!" target="_self" title="">
                                            <div class="contInfoChicoCat"  style="color:#000;">
                                                  <h1>Humor</h1>
                                                  <p>Bloopers,retos,desafíos, chistes, trolleos y los encuentros más divertidos. Imposible no reírse con ellos.</p>
                                                  <div class="contVidInfo"><p>70 Videos</p><div class="contVidInfo_icon" style="background:#000;"></div></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="contChicoCat col s12 m12 l6" style="background:#168ce6;">
                                          <a href="#!" target="_self" title="">
                                              <div class="contInfoChicoCat">
                                                  <h1>Música</h1>
                                                  <p>Son las nuevas estrellas de todos los tiempos. Mirá videos exclusivos en Club.Media.</p>
                                                  <div class="contVidInfo"><p>70 Videos</p><div class="contVidInfo_icon"></div></div>
                                              </div>
                                          </a>
                                    </div>
                          </div>

                          <div  id="contCategoria2" class="col s12 m12 l4">
                                  <!-- ..........categoria 3 chicos....... -->
                                  <div class="contChicoCat col s12 m12 l12" style="background:#f4206a;">
                                          <a href="#!" target="_self" title="">
                                              <div class="contInfoChicoCat">
                                                    <h1>Belleza</h1>
                                                    <p>Aprendé sobre moda, look, uñas, tendencias, makeup con las mejores de toda habla hispana.</p>
                                                    <div class="contVidInfo"><p>70 Videos</p><div class="contVidInfo_icon"></div></div>
                                              </div>
                                          </a>
                                  </div>
                                  <div class="contChicoCat col s12 m12 l12" style="background:#35df89;">
                                          <a href="#!" target="_self" title="">
                                                <div class="contInfoChicoCat">
                                                      <h1>Lifestyle</h1>
                                                      <p>Aprendé sobre moda, look, uñas, tendencias, makeup con las mejores de toda habla hispana.</p>
                                                      <div class="contVidInfo"><p>70 Videos</p><div class="contVidInfo_icon"></div></div>
                                                </div>
                                          </a>
                                  </div>
                                  <div class="contChicoCat col s12 m12 l12" style="background:#fe4300;">
                                          <a href="#!" target="_self" title="">
                                                <div class="contInfoChicoCat">
                                                      <h1>Gamers</h1>
                                                      <p>Viví desde adentro cada momento de los shows de tus artistas favoritos y participá por Meet & Greet y entradas VIP</p>
                                                      <div class="contVidInfo"><p>70 Videos</p><div class="contVidInfo_icon"></div></div>
                                                </div>
                                          </a>
                                  </div>
                          </div>



      </div>
			<div id="contModalAside" class="col s12 m4 l4">





                        <div id="contAsideUp" class="col s12 m12 l12">

                        </div>




                        <div id="contAsideBotton" class="col s12 m12 l12">

													<?php query_posts( array ( 'category_name' => 'cat-destacados', 'posts_per_page' => 5 ) ); ?>
													<?php if ( have_posts() ): ?>
															<?php
															$count_post_dest=0;
															while ( have_posts() ) : the_post();
															$count_post_dest++;
															if($count_post_dest==5){
															?>


																<img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url();} ?>" />
																<div class="contAsideBotton_fondo_opacity"></div>
																<div class="contAsideBotton_info">
																			<h1>Dai <br> Hernández</h1>
																			<h4>Humor argentino</h4>
																			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
																				 <?php the_excerpt(); ?>
																	<a href="#!" title="" class="waves-effect waves-light btn">Leer más</a>
															 </div>

														<?php } ?>


														 <?php endwhile; ?>
														 <?php else : ?>
																<p><?php _e('Ups!, no hay entradas.'); ?></p>
														 <?php endif; ?>






                        </div>

                  </div>
            </div>
         </div>









<!-- ................................................................................. -->







         <!-- .........................modulo resultados cont.................................... -->
         <div class="col s12 m12 l12">
           <div id="contModalResult" class="row">
             <div class="fila1">

               <?php query_posts('posts_per_page=12'); ?>

               <?php
                 $count = 0;
                 while (have_posts()) : the_post();
                 $count++;
                 if ($count<=3||$count>=5&&$count<=6||$count>=7&&$count<=9||$count>=11&&$count<=12) {
               ?>
                   <div class="contChicoResult col s12 m12 l4">
                           <div class="contChicoResult_moduloCont">
                               <a href="#!" target="_self" title="">
                                   <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>"/>
                                   <div class="contChicoResult_moduloContfondo_opacity"></div>
                                   <div class="contChicoResult_moduloContfondo_cont_info">
                                     <div class="contChicoResult_moduloContfondo_cont_info_item1" style="background:#f4206a; color:#fff;"><?php the_category( ' ' ); ?></div>
                                     <h1><a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Permanent Link to %s', 'theme-name' ), the_title_attribute( 'echo=0' ) ); ?>">
																			 <?php the_title(); ?>
																		 </a></h1>

                                     <p><?php the_content(); ?></p>
                                   </div>
                               </a>
                           </div>
                   </div>

               <?php }else if($count==4){  ?>

               <!-- ..........................contenedor grande.......................... -->
               <div class="contGrandeResult col s12 m12 l8">
                       <div class="contGrandeResult_moduloCont">
                           <a href="#!" target="_self" title="">
                               <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>"/>
                               <div class="contGrandeResult_moduloContfondo_opacity"></div>
                               <div class="contGrandeResult_moduloContfondo_cont_info">
                                 <div class="contGrandeResult_moduloContfondo_cont_info_item1" style="background:#f4206a; color:#fff;"><?php the_category( ' ' ); ?></div>
                                 <h1><a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Permanent Link to %s', 'theme-name' ), the_title_attribute( 'echo=0' ) ); ?>">
																	 <?php the_title(); ?>
																 </a></h1>

                                 <p><?php the_content(); ?></p>
                               </div>
                           </a>
                       </div>
               </div>

              <?php }else if($count==10){  ?>

                  <div class="contGrandeResult contGrandeResult_2b col s12 m8 l8">
                        <div class="contGrandeResult_moduloCont">
                            <a href="#!" target="_self" title="">
                                <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>"/>
                                <div class="contGrandeResult_moduloContfondo_opacity"></div>
                                <div class="contGrandeResult_moduloContfondo_cont_info">
                                  <div class="contGrandeResult_moduloContfondo_cont_info_item1" style="background:#f4206a; color:#fff;"><?php the_category( ' ' ); ?></div>
                                  <h1><a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Permanent Link to %s', 'theme-name' ), the_title_attribute( 'echo=0' ) ); ?>">
																		<?php the_title(); ?>
																	</a></h1>

                                  <p><?php the_content(); ?></p>
                                </div>
                            </a>
                        </div>
                  </div>


            <?php } ?>
            <?php endwhile; ?>





           </div>
          </div>
         </div>





	</div>
</div>





<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>
