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

<?php dynamic_sidebar('sidebar-categories'); ?>
<aside class="sidebar content__sidebar">
  <div class="sidebar__in">
    <div class="content__news news sidebar__content">
      <h1 class="news__heading sidebar__heading">TECHNO PARK</h1>
        <?php if (has_nav_menu('modal')) :
          wp_nav_menu([
          'theme_location' => 'modal',
          'menu_class' => 'home-menu',
        ]);
        endif; ?>
      <ul class="news__list sidebar__menu sidebar-menu">
        <li class="sidebar-menu__item sidebar-menu__item--active"><a href="">ÜBER UNS</a></li>
        <li class="sidebar-menu__item"><a href="">leistungen</a></li>
        <li class="sidebar-menu__item"><a href="">STANDORT</a></li>
        <li class="sidebar-menu__item"><a href="">FIRMENGRUPPE</a></li>
        <li class="sidebar-menu__item"><a href="">MIETER</a></li>
        <li class="sidebar-menu__item"><a href="">MITARBEITER</a></li>
        <li class="sidebar-menu__item"><a href="">stellenangebote</a></li>
      </ul>
      <ul class="sidebar__icons">
        <li class="sidebar__icon sidebar__icon--active"><a href=""><img src="img/icon-map.png" alt="" width="24"></a></li>
        <li class="sidebar__icon"><a href=""><img src="img/icon-home.png" alt="" width="24"></a></li>
        <li class="sidebar__icon"><a href=""><img src="img/icon-document.png" alt="" width="24"></a></li>
        <li class="sidebar__icon"><a href=""><img src="img/icon-computer.png" alt="" width="24"></a></li>
      </ul>
    </div>
  </div>
</aside>
