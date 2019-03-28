<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<div class="parallax parallax1">
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
      <?php if (has_nav_menu('home')) :
          wp_nav_menu([
              'theme_location' => 'home',
              'menu_class' => 'home-menu',
          ]);
      endif; ?>

      <?php get_sidebar('news'); ?>
    </div>
  </div>

  </div>
  <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>
</div> <!-- /.parallax1 -->


<div class="section2">
 <div class="content">
    <div class="container">
      <div class="row">
        <div class="page-content">
          <?php the_content('mehr') ?>

        </div>
      </div>
    </div>
  </div>
</div>



<?php get_footer();
