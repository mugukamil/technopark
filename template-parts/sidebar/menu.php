<div class="sidebar-icons-menu">
    <?php
    if (has_nav_menu('modal')) :
        wp_nav_menu(['theme_location' => 'modal', 'menu_class' => 'home-menu']);
    endif;
    ?>
</div>
