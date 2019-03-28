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

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<?php dynamic_sidebar('sidebar-news'); ?>
<aside class="sidebar content__sidebar">
  <div class="sidebar__in">
    <div class="content__news news">
      <h1 class="news__heading">NEWS</h1>
      <div class="news__list">
      <?php $query_args = ['category_name' => 'news',  'posts_per_page' => 3];
      $query = new WP_Query($query_args);
      while ($query->have_posts()):
          $query->the_post();
          $cat = get_the_category();
      ?>
        <div class="news__item">
          <div class="news__in">
            <div class="news__top">
              <p class="news__category"><?php echo $cat[0]->name; ?></p>
              <time class="news__date"><?php echo get_the_date(); ?></time>
            </div>
            <h2 class="news__title"><?php the_title(); ?></h2>
            <p class="news__text"><?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), 18); ?></p>
            <p class="text-right">
              <a class="news__more" href="<?php get_permalink() ?>">// MEHR</a>
            </p>
          </div>
        </div>
      <?php
        wp_reset_postdata();
        endwhile;
      ?>
      </div>
      <p class="text-right">
        <?php
            // Get the ID of a given category
            $category_id = get_cat_ID('news');

            // Get the URL of this category
            $category_link = get_category_link($category_id);
        ?>

        <!-- Print a link to this category -->
        <a class="news__all" href="<?php echo esc_url($category_link); ?>" title="weitere NEWS">weitere NEWS</a>
      </p>
    </div>
  </div>
</aside>
