<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="parallax">
                <?php get_template_part('template-parts/header/header'); ?>
                <div class="content">
                    <div class="sidebar__bg"></div>
                    <div class="container">
                        <div class="row">
                            <div class="page-content">
                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    get_template_part('template-parts/post/content', get_post_format());


                                endwhile; // End of the loop.
                                ?>
                            </div>
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
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
