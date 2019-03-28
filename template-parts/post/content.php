<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <header class="entry-header">
        <?php
        if (is_single()) {
            the_title('<h1 class="entry-title article__title">', '</h1>');
        } elseif (is_front_page() && is_home()) {
            the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
        ?>
    </header><!-- .entry-header -->

    <?php if ('' !== get_the_post_thumbnail()) : ?>
        <div class="post-thumbnail post-thumbnail--news">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('technopark-featured-image'); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>

    <div class="entry-content article__text">
        <?php
        /* translators: %s: Name of current post */
        the_content(sprintf(
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'technopark'),
            get_the_title()
        ));

        wp_link_pages([
            'before'      => '<div class="page-links">' . __('Pages:', 'technopark'),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ]);
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
