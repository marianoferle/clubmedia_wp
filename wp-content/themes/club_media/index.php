<?php get_header(); ?>

<script>
    var url_link_ ="<?php echo bloginfo('template_url') ?>";

    var dir = window.document.URL;
    var dir_URL_Code = encodeURIComponent(dir); //url del post
    //console.log(dir, "window.document.url");
    //console.log(dir_URL_Code, "dir url encode");
</script>


        <!-- ..............................page............................... -->
        <?php if(isset($_GET['page'])){
            $page= $_GET['page'];
        ?>


               <?php if($page=='categoria_'){ ?>  <!-- .................page categoria.................. -->

                                <script>
                                    var v1='<?php if(isset($_GET['cat'])){ echo $_GET['cat']; } ?>';
                                    var v2='<?php if(isset($_GET['subcat'])){ echo $_GET['subcat']; } ?>';
                                    var page_='<?php  echo $_GET['page']; ?>';
                                </script>

                                <!-- .....................header del document y nav.................................... -->
                                <?php
                                  require_once(dirname(__FILE__) . "/include/categoria.php");
                                ?>


                <?php }else if($page=='pages_'){ ?>    <!-- .................page post................... -->

                                <script type="text/javascript">
                                    var v_id='<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>';
                                    var page_='<?php  echo $_GET['page']; ?>';
                                </script>

                                <!-- .....................header del document y nav.................................... -->
                                <?php
                                  require_once(dirname(__FILE__) . "/include/page.php");
                                ?>

                <?php }else if($page=='post_'){ ?>    <!-- .................page post................... -->

                                <script type="text/javascript">
                                    var v_id='<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>';
                                    var page_='<?php  echo $_GET['page']; ?>';
                                </script>

                                <!-- .....................header del document y nav.................................... -->
                                <?php
                                  require_once(dirname(__FILE__) . "/include/post.php");
                                ?>

                <?php }else if($page=='terminos_'){ ?>

                                <?php
                                  require_once(dirname(__FILE__) . "/include/terminos.php");
                                ?>

                <?php }else if($page=='search_'){

                   if(isset($_GET['bus'])){ $cont_busqueda = $_GET['bus']; }
                ?>


                                <script>
                                    var bus_='<?php if(isset($_GET['bus'])){ echo $_GET['bus']; } ?>';
                                    var page_='<?php  echo $_GET['page']; ?>';
                                </script>
                                <style>
                                      #cont_categoria_head{min-height: 100px;}
                                </style>


                                <?php
                                  require_once(dirname(__FILE__) . "/include/categoria.php");
                                ?>


                <?php } ?>

      <?php }else{?>


                      <!-- .....................header del document y nav.................................... -->
                      <?php
                          require_once(dirname(__FILE__) . "/include/index_cont.php");
                      ?>



      <?php }?>








<!-- ..................footer del document y footer de index......................... -->
<?php
    require_once(dirname(__FILE__)."/include/footer_cont.php");
?>



          <?php if(isset($_GET['page'])){  ?>
                    <?php if($page=='categoria_'){ ?>       <!-- .................page categoria.................. -->
                                  <script src="<?php bloginfo('template_directory');?>/js/function_template/function_cat.js" type="text/javascript" charset="utf-8"></script>
                    <?php }else if($page=='post_'){ ?>            <!-- .................page post................... -->
                                  <script src="<?php bloginfo('template_directory');?>/js/function_template/function_post.js" type="text/javascript" charset="utf-8"></script>
                    <?php }else if($page=='pages_'){ ?>            <!-- .................page post................... -->
                                  <script src="<?php bloginfo('template_directory');?>/js/function_template/function_page.js" type="text/javascript" charset="utf-8"></script>
                    <?php }else if($page=='terminos_'){ ?>
                                  <script src="<?php bloginfo('template_directory');?>/js/function_template/function_terminos.js" type="text/javascript" charset="utf-8"></script>
                    <?php }else if($page=='search_'){ ?>
                                  <script src="<?php bloginfo('template_directory');?>/js/function_template/function_search.js" type="text/javascript" charset="utf-8"></script>
                    <?php } ?>


          <?php }else{ ?>
                    <script src="<?php bloginfo('template_directory');?>/js/function_template/function_index.js" type="text/javascript" charset="utf-8"></script>
          <?php } ?>





<?php get_footer(); ?>
