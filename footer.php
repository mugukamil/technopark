<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>

  <?php get_template_part('template-parts/footer/footer'); ?>
</div>

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($){
        //Hide logo when scrolling
        $(window).scroll(function(){
            ($(document).scrollTop() > 200) ? $(".site-header__logo").css("opacity",  0) : $(".site-header__logo").css("opacity",  1);
        });
    });
</script>
</body>
</html>
