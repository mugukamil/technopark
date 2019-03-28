<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<?php dynamic_sidebar('sidebar-search'); ?>
<aside class="sidebar content__sidebar">
	<div class="sidebar__in">
		<div class="content__news news sidebar__content">
			<h1 class="news__heading sidebar__heading sidebar__search">IMMOBILIEN SUCHE</h1>
			<?php echo do_shortcode('[searchandfilter id="883"]'); ?>
            <div class="sidebar-icons-menu">
				<?php wp_nav_menu(['menu' => 'search-menu', 'menu_class' => 'home-menu']); ?>
            </div>
		</div>
	</div>
</aside>
