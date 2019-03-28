<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
    <div class="post-thumbnail">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( '360', '265' ); ?>
      </a>
    </div><!-- .post-thumbnail -->
  <?php endif; ?>

  <header class="entry-header">
    <?php
    if ( 'post' === get_post_type() ):
      $cat = get_the_category();
      ?>
      <div class="entry-meta cat_date_wrapper">
        <div class="entry-meta__cat"><?php echo $cat[0]->name ?></div>
        <div class="entry-meta__date"><?php echo get_the_date(); ?></div>
      </div>
      <?php endif; ?>

    <?php

    if ( is_single() ) {
    } elseif ( is_front_page() && is_home() ) {
      the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
    } else {
      the_title( '<h2 class="entry-title news__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }
    ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
    /* translators: %s: Name of current post */
    the_content( sprintf(
      __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'technopark' ),
      get_the_title()
    ) );

    wp_link_pages( array(
      'before'      => '<div class="page-links">' . __( 'Pages:', 'technopark' ),
      'after'       => '</div>',
      'link_before' => '<span class="page-number">',
      'link_after'  => '</span>',
    ) );
    ?>
  </div><!-- .entry-content -->

  <?php
  if ( is_single() ) {
    technopark_entry_footer();
  }
  ?>
    <a class="read__more" href="<?php the_permalink(); ?>">// mehr</a>

</article><!-- #post-## -->
