<?php

/**
 * Template Name: Project Page
 * The template for displaying simple pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();

$query_all = new WP_Query(
    [
        'post_type' => 'project',
        'posts_per_page' => 5
    ]
);

//echo "<pre>";
//print_r($query_all);
//echo "</pre>";


$query1 = new WP_Query(
    ['post_type' => 'project', 'project_categories' => 'aktuelle-projekte', 'posts_per_page' => 20]
);

$query2 = new WP_Query(
    [
        'project_categories' => 'realisierte-projekte',
	    'posts_per_page' => 20
    ]
);

?>

<div class="parallax">
    <div class="content">
	    <?php
	    $slides = get_field('slider_images');
	    if (!$slides) : ?>
            <div class="content__bg">
			    <?php the_post_thumbnail() ?>
            </div>
	    <?php else: ?>
            <div class="bg-slider">
			    <?php foreach ($slides as $slide): ?>
                    <div class="bg-slide"><img src="<?php echo $slide['url'] ?>" alt=""></div>
			    <?php endforeach; ?>
            </div>
	    <?php endif; ?>

        <div class="sidebar__bg"></div>
        <?php get_template_part('template-parts/header/header'); ?>

<!--        <div class="content__bg">-->
<!--            --><?php //the_post_thumbnail() ?>
<!--        </div>-->
        <div class="container">
            <div class="row">
                <div class="project__texts">

                </div>
                <aside class="sidebar content__sidebar">
                    <div class="sidebar__in">
                        <div class="content__news news sidebar__content">
                            <div class="project-sidebar">
                                <p class="sidebar__title">Projekte</p>

                                <div class="project-sidebar__block">
                                    <p class="project-sidebar__title">AKTUELLE PROJEKTE</p>
                                    <ul>
                                        <?php
                                          if ($query1->have_posts()) : while ($query1->have_posts()) : $query1->the_post();
                                        ?>

                                        <li class="project-sidebar__prj-name">
                                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>
                                        <?php endwhile; wp_reset_postdata(); endif; ?>
                                    </ul>
                                </div>
                                <div class="project-sidebar__block">
                                    <p class="project-sidebar__title">realisierte PROJEKTE</p>
                                    <ul id="realProjects">
                                        <?php
                                          if ($query2->have_posts()) : while ($query2->have_posts()) : $query2->the_post(); ?>


                                        <li class="project-sidebar__prj-name">
                                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>


                                        <?php endwhile; wp_reset_postdata(); endif; ?>
                                    </ul>
                                </div>

                            </div>


                            <?php get_template_part('template-parts/sidebar/menu'); ?>


                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02">
      <title>Asset 1</title>
      <g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2">
        <g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1">
          <polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round"
          stroke-width="4" />
        </g>
      </g>
    </svg>

</div>


<div class="section">
  <div class="content">

  <div class="container">
    <div class="page-content">
        <?php the_content();
        wp_reset_postdata();
        ?>

    </div>
  </div>
  </div>
</div>



<?php get_footer();?>
<script>
    jQuery(document).ready(function ($) {
        var windowWidth = $(window).width();
        if(windowWidth <= 1400) {
            var projects = $("#realProjects .project-sidebar__prj-name"),
                count = projects.length;
            for(var i = 0; i < count; i++) {
                if(i < 10) continue;
                projects[i].remove();
            }
        }
    });
</script>
