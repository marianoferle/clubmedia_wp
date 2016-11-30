<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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



<!--link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" /></link>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/materialize.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" /></link>








<?php wp_head(); ?>


</head>
<body id="body_">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div id="fondo_fixed_tot"></div>

<div id="cont1">



  <?php
    require_once(dirname(__FILE__) . "/include/nav.php");
  ?>
