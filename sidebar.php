<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'sidebar-news' ); ?>
<aside class="sidebar content__sidebar">
  <div class="sidebar__bg"></div>
  <div class="sidebar__in">
    <div class="content__news news">
      <h1 class="news__heading">NEWS</h1>
      <div class="news__list">
      <?php $query_args = array('category_name' => 'news');
      $query = new WP_Query( $query_args );
      while ($query->have_posts()):
          $query->the_post();
      ?>
        <div class="news__item">
          <div class="news__in">
            <div class="news__top">
              <p class="news__category"><?php get_the_category(); ?></p>
              <time class="news__date"><?php the_date(); ?></time>
            </div>
            <h2 class="news__title"><?php the_title(); ?></h2>
            <p class="news__text"><?php echo wp_strip_all_tags( get_the_content() ); ?></p>
            <p class="text-right">
              <a class="news__more" href="">// MEHR</a>
            </p>
          </div>
        </div>
      <?php endwhile; ?>
      </div>
      <p class="text-right">
        <a class="news__all" href="">weitere NEWS</a>
      </p>
    </div>
  </div>
</aside>
