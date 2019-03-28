<?php
/**
 * Template Name: Simple Page
 * The template for displaying simple pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="parallax">
  <div class="content">
  <div class="sidebar__bg"></div>
  <?php get_template_part('template-parts/header/header'); ?>

  <div class="content__bg">
    <?php
    the_post_thumbnail()
    ?>

  </div>
  <div class="container">
    <div class="row content__row">
        <div class="page-content"></div>

      <?php get_sidebar('categories'); ?>
    </div>
  </div>

  </div>
  <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>

</div> <!-- /.parallax1 -->



<div class="section section1">
 <div class="content">
  <?php get_template_part('template-parts/header/header'); ?>

  <div class="container">
    <div class="row content__row">
        <div class="page-content">
        <?php while (have_posts()) : the_post();
          the_content();

          endwhile; // End of the loop.
        ?>

        </div>
    </div>
  </div>
</div>
</div>


<?php get_footer();
