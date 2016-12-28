<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>

<meta charset="<?php bloginfo('charset'); ?>">

<link rel="shortcut icon" type="image/ico" href="https://s3-sa-east-1.amazonaws.com/club.media/template/favicon.ico" />

<title><?php bloginfo('name'); ?></title>
<!-- ................. -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="generator" content="WordPress 4.6.1" />
<!-- ................. -->
<meta property="og:url"           content="http://club.media" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="ClubMedia" />
<meta property="og:description"   content="ClubMedia" />
<meta property="og:image"         content="https://s3-sa-east-1.amazonaws.com/club.media/template/logo_media_moob.jpg" />

<noscript>
  <p>Bienvenido a Club.Media</p>
  <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
</noscript>
</body>

<!--link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/materialize.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>try{Modernizr} catch(e) {document.write('<script src="./assets/js/vendor/modernizr-2.8.3.min.js"><\/script>')}</script>






<?php wp_head(); ?>


</head>
<body id="body_">


  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>



<div id="fondo_fixed_tot"></div>

<div id="cont1">



  <?php
    require_once(dirname(__FILE__) . "/include/nav.php");
  ?>
