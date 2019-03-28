<?php
/**
 * Template Name: Uber Page
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
	  <?php
	  $slides = get_field('slider_images');
	  if (!$slides) : ?>
          <div class="content__bg">
			  <?php the_post_thumbnail() ?>
          </div>
	  <?php else: ?>
          <div class="bg-slider">
			  <?php foreach ($slides as $slide): ?>
                  <div class="bg-slide"><img src="<?php echo $slide['url'] ?>" alt=""></div>
			  <?php endforeach; ?>
          </div>
	  <?php endif; ?>
  <div class="sidebar__bg"></div>
  <?php get_template_part('template-parts/header/header'); ?>

<!--  <div class="content__bg">-->
<!--    --><?php
//    //the_post_thumbnail()
//    ?>
<!---->
<!--  </div>-->
  <div class="container">
    <div class="row content__row">
        <div class="page-content"></div>

        <aside class="sidebar content__sidebar">
                <div class="sidebar__in">
                  <div class="content__news news sidebar__content">
                  <?php
                  wp_nav_menu([
                    'theme_location' => 'sidebar',
                    'sub_menu' => true,
                    'menu_class' => 'sidebar-menu'
                  ]);
                  ?>
                   <?php get_template_part('template-parts/sidebar/menu'); ?>

                  </div>
                </div>
              </aside>

    </div>
  </div>

  </div>
  <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>

</div> <!-- /.parallax1 -->


<div class="section1">
 <div class="content">

  <div class="container">
    <div class="row content__row">
        <div class="page-content">
        <?php
          while (have_posts()) : the_post();
            the_content();
          endwhile;
         ?>




          <article class="article">

            <div class="article__timeline">
          <?php

          // check if the repeater field has rows of data
          if (have_rows('timeline')):

            // loop through the rows of data
              while (have_rows('timeline')) : the_row();
                  ?>
                    <div class="article__timeline-row">
                      <date class="article__timeline-date"><span><?php the_sub_field('date') ?></span></date>
                      <div>
                        <div class="article__timeline-text"><?php the_sub_field('text') ?></div>
                      </div>
                    </div>
<?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>
          </div>
          </article>



        </div>
    </div>
  </div>
</div>
</div>


<?php get_footer();
