<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<div class="parallax default__search">
		<div class="content">
			<div class="sidebar__bg"></div>
			<?php get_template_part('template-parts/header/header'); ?>
			<div class="container">
				<div class="row content__row">
					<div class="page-content search__content search__results">
                        <h1 class="article__title">SUCHERGEBNIS</h1>
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/post/content', 'excerpt' );

							endwhile; // End of the loop.

							the_posts_pagination( array(
								'prev_text' => technopark_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'technopark' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'technopark' ) . '</span>' . technopark_get_svg( array( 'icon' => 'arrow-right' ) ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'technopark' ) . ' </span>',
							) );

						else : ?>

							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'technopark' ); ?></p>
							<?php
							get_search_form();

						endif;
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
<!--		<svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>-->

	</div> <!-- /.parallax1 -->




<?php get_footer();
