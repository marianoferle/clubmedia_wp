<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="<?php bloginfo('charset'); ?>">

<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="shortcut icon" type="image/ico" href="https://s3-sa-east-1.amazonaws.com/club.media/template/favicon.ico" />


<!--link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" /></link>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/materialize.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" /></link>




<?php wp_head(); ?>


</head>
<body id="body_">

<div id="fondo_fixed_tot"></div>

<div id="cont1">



  <?php
    require_once(dirname(__FILE__) . "/include/nav.php");
  ?>
