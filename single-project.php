<?php
get_header();

$title = preg_replace('/\//', '/<br>', get_the_title());

?>

<div class="parallax">
      <div class="content project__content">
          <div class="content__bg">
		      <?php the_post_thumbnail() ?>
          </div>
        <div class="sidebar__bg"></div>
        <?php get_template_part('template-parts/header/header'); ?>

        <div class="container">
          <div class="row">
            <div class="project__texts">
              <h1><?php echo $title; ?></h1>
              <?php if (get_field('project_info')): ?>
                <p> <?php echo get_field('project_info') ?> </p>
              <?php endif; ?>
            </div>
            <aside class="sidebar content__sidebar">
              <div class="sidebar__in">
                <div class="content__news news sidebar__content">
                  <div class="project-sidebar">
                    <p class="sidebar__title">Projekte</p>
                    <div class="project-sidebar__block">
                      <p class="project-sidebar__title">PROJEKT</p>
                      <p class="project-sidebar__text"> <?php echo $title; ?> </p>
                    </div>
                    <div class="project-sidebar__block">
                      <p class="project-sidebar__title">LEISTUNG</p>
                      <p class="project-sidebar__text"><?php echo get_field('project_leistung') ?></p>
                    </div>
                    <div class="project-sidebar__block">
                      <p class="project-sidebar__title">projektart</p>
                      <p class="project-sidebar__text"><?php echo get_field('project_art') ?></p>
                    </div>
                    <div class="project-sidebar__footer">
                      <p class="nav-text"><a href="/projekte/" style="color: rgb(255,255,255)">ÜBERSICHT</a></p>
                    </div>
                  </div>


                  <?php get_template_part('template-parts/sidebar/menu'); ?>

                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
      <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>


    </div>





<div class="section section1">
      <div class="content">

        <div class="container">
          <div class="row">
            <div class="page-content">
              <h1 class="article__title"><?php echo $title; ?></h1>
              <?php
              while (have_posts()) : the_post();
                the_content();
              endwhile; ?>

              <div class="project">
                <div class="project__row">
                  <div class="project__col">
                    <p class="project__title">Projekt</p>
                    <p class="project__text"><?php echo $title; ?></p>
                  </div>
                  <div class="project__col">
                    <p class="project__title">Leistung</p>
                    <p class="project__text"><?php echo get_field('project_leistung') ?></p>
                  </div>
                </div>
                <div class="project__row">
                  <div class="project__col">
                    <p class="project__title">Standort</p>
                    <p class="project__text"><?php the_title() ?></p>
                  </div>
                  <div class="project__col">
                    <p class="project__title">Umsetzungszeitraum</p>
                    <p class="project__text"><?php echo get_field('project_umsetzungszeitraum') ?></p>
                  </div>
                </div>
                <div class="project__row">
                  <div class="project__col">
                    <p class="project__title">Objektumfang</p>
                    <p class="project__text"><?php echo get_field('project_objektumfang1') ?></p>
                  </div>
                  <div class="project__col">
                    <p class="project__text"><?php echo get_field('project_objektumfang2') ?></p>
                  </div>
                </div>
              </div>

              <div class="project-slider">
                <?php
                $slides = get_field('project_slider');
                if ($slides) : ?>
                  <div class="slider-with-nav project-slider__slides">
                    <?php foreach ($slides as $slide): ?>
                      <div><img src="<?php echo $slide['url'] ?>" alt="" width="780"></div>
                    <?php endforeach; ?>
                  </div>
                  <div class="article__imgs-slider slider-nav project-slider__nav">
                    <?php foreach ($slides as $slide): ?>
                      <div><img src="<?php echo $slide['url'] ?>" alt="" width="180"></div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>

              <div class="post-nav">
                <div class="row">
                  <div class="alignleft prev-next-post-nav nav-text"><?php previous_post_link('%link', 'vorheriges') ?></div>
                  <p class="nav-text"><a href="/projekte/" style="color: rgb(0,0,0)">ÜBERSICHT</a></p>
                  <div class="alignright prev-next-post-nav nav-text"><?php next_post_link('%link', 'nächstes') ?></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

<?php get_footer();
