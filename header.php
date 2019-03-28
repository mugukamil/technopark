<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Roboto+Condensed:300,300i,400,400i" rel="stylesheet">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <?php get_template_part('template-parts/modals'); ?>
 <?php get_template_part('template-parts/header/header.php'); ?>
 <div class="out">



