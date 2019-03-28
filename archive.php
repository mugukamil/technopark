<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="parallax">
<div class="content">
    <div class="sidebar__bg"></div>
<?php get_template_part('template-parts/header/header'); ?>
<div class="container">
  <div class="row content__row">
    <div class="page-content">

      <h1 class="article__title"><?php single_cat_title(); ?></h1>
    <div class="archives">
    <div class="row">



  <?php
    if ( have_posts() ) : ?>
      <?php
      /* Start the Loop */
      while ( have_posts() ) : the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/post/content-news', get_post_format() );

      endwhile;

      the_posts_pagination( array(
        'prev_text' => technopark_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'technopark' ) . '</span>',
        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'technopark' ) . '</span>' . technopark_get_svg( array( 'icon' => 'arrow-right' ) ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'technopark' ) . ' </span>',
      ) );

    else :

      get_template_part( 'template-parts/post/content', 'none' );

    endif; ?>
    </div>
    </div>

    </div>
    <!-- /.page-content -->
      <aside class="sidebar content__sidebar">
          <div class="sidebar__in">
              <div class="content__news news sidebar__content">
				  <?php wp_nav_menu(['menu' => 'sidebar', 'menu_class' => 'sidebar-menu']) ?>
                  <div class="sidebar-icons-menu">
					  <?php wp_nav_menu(['menu' => 'search-menu', 'menu_class' => 'home-menu']); ?>
                  </div>
              </div>
          </div>
      </aside>
  </div>
</div><!-- .wrap -->
</div>
</div>
<?php get_footer();
