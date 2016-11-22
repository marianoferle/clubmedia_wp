<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head>


		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <meta charset="<?php bloginfo('charset'); ?>">

		<title><?php bloginfo('name'); ?></title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>



    <script src="<?php bloginfo('template_url') ?>/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php bloginfo('template_url') ?>/js/handlebars-v4.0.5.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <?php wp_head(); ?>



  </head>
	<body id="body_">
	<div id="cont1">





    <div class="row noMargBot">
       <nav id="nav_header_1" class="col s12 m12 l12 nav_off_top">
         <div class="nav-wrapper">
               <!-- .............logo y nav mobile........... -->
               <a href="index.php" class="col s2 m2 l2">
                   <img src="<?php bloginfo('template_url') ?>/img/template/logo_media_moob.jpg" class="img_logo_head_mobile" />
               </a>

               <a href="#" data-activates="mobile-nav" class="col s9 m9 l9 button-collapse right">
                   <i class="fa fa-bars right" aria-hidden="true"></i>
               </a>

               <!-- .............menu desktop........... -->
               <ul id="nav_desktop_cont" class="hide-on-med-and-down brand-logo center">
                 <li><a href="categoria.php?cat=humor">Humor</a></li>
                 <li><a href="categoria.php?cat=belleza">Belleza</a></li>
                 <!--li id="logo_nav">  <img src="img/template/logo_media_moob.jpg" class="img_logo_head" />  </li-->
                 <li><a href="categoria.php?cat=musica">Música</a></li>
                 <li><a href="categoria.php?cat=gamers">Gamers</a></li>
                 <li><a href="categoria.php?cat=lifestyle">Lifestyle</a></li>
                 <li><a href="categoria.php?cat=clubmediafest">ClubMediaFest</a></li>
                 <li>
                   <div id="icon_social_nav" class="">
                     <div class=""><a href="#!" title=""><i class="fa fa-search" aria-hidden="true"></i></a></div>
                     <div class=""><a href="#!" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                     <div class=""><a href="#!" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                     <div class=""><a href="#!" title=""><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
                     <div class=""><a href="#!" title=""><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                   </div>
                 </li>
               </ul>


               <!-- ..............nav mobile............. -->
               <ul class="side-nav" id="mobile-nav">
                 <li><a class="side-nav-link" href="index.php"><img src="<?php bloginfo('template_url') ?>/img/template/logo_media_moob.jpg" class="img_logo_head_mobile_sidenav" /></a></li>
                 <li><a class="side-nav-link" href="categoria.php?cat=humor">Humor</a></li>
                 <li><a class="side-nav-link" href="categoria.php?cat=belleza">Belleza</a></li>
                 <li><a class="side-nav-link" href="categoria.php?cat=musica">Música</a></li>
                 <li><a class="side-nav-link" href="categoria.php?cat=gamers">Gamers</a></li>
                 <li><a class="side-nav-link" href="categoria.php?cat=lifestyle">Lifestyle</a></li>
                 <li><a class="side-nav-link" href="#!">ClubMediaFest</a></li>
                 <li>
                         <div id="icon_social_nav_mobile" class="center">
                           <div class=""><a href="#!" title=""><i class="fa fa-search" aria-hidden="true"></i></a></div>
                           <div class=""><a href="#!" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                           <div class=""><a href="#!" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                           <div class=""><a href="#!" title=""><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
                           <div class=""><a href="#!" title=""><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                         </div>
                 </li>
               </ul>

         </div>
       </nav>
   </div>
