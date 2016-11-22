<?php get_header(); ?>

<script>
    var url_link_ ="<?php echo bloginfo('template_url') ?>";
</script>

        <!-- ..............................page............................... -->
        <?php if(isset($_GET['page'])){
            $page= $_GET['page'];
        ?>



                <?php if($page=='categoria_'){ ?>  <!-- .................page categoria.................. -->

                                <script>
                                    var v1='<?php if(isset($_GET['cat'])){ echo $_GET['cat']; } ?>';
                                    var v2='<?php if(isset($_GET['subcat'])){ echo $_GET['subcat']; } ?>';
                                </script>

                                <!-- .....................header del document y nav.................................... -->
                                <?php
                                  require_once(dirname(__FILE__) . "/include/categoria.php");
                                ?>


                <?php }else if($page=='post_'){ ?>    <!-- .................page post................... -->

                                <script type="text/javascript">
                                    var v_id='<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>';
                                    

                                    var dir = window.document.URL;
                                    var dir_URL_Code = encodeURIComponent(dir); //url del post
                                </script>

                                <!-- .....................header del document y nav.................................... -->
                                <?php
                                  require_once(dirname(__FILE__) . "/include/post.php");
                                ?>

                <?php }else if($page=='terminos_'){ ?>

                                <?php
                                  require_once(dirname(__FILE__) . "/include/terminos.php");
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
                    <?php }else if($page=='terminos_'){ ?>
                                  <script src="<?php bloginfo('template_directory');?>/js/function_template/function_terminos.js" type="text/javascript" charset="utf-8"></script>
                    <?php } ?>


          <?php }else{ ?>
                    <script src="<?php bloginfo('template_directory');?>/js/function_template/function_index.js" type="text/javascript" charset="utf-8"></script>
          <?php } ?>





<?php get_footer(); ?>
