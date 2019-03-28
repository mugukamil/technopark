<?php
get_header();

$title = preg_replace( '/\//', '/<br>', get_the_title() );

$property = get_fields($post->ID);
$property_type = ($property['property_type'][0] == 'MIETEN') ? 'MIETE' : 'KAUF';
//echo "<pre>";
//print_r($property['property_content']['location']);
//echo "</pre>";
?>

<div class="parallax">
    <div class="content">
        <div class="sidebar__bg"></div>
		<?php get_template_part( 'template-parts/header/header' ); ?>
        <div class="content__bg">
			<?php the_post_thumbnail() ?>
        </div>
        <div class="container">
            <div class="row">
                <aside class="sidebar content__sidebar">
                    <div class="sidebar__in">
                        <div class="content__news news sidebar__content">
                            <div class="project-sidebar">
                                <h1 class="news__heading sidebar__heading sidebar__search">OBJEKT INFO</h1>
                                <div class="project-sidebar__block property-sidebar__block">
                                    <p class="project-sidebar__title">REFERENZNUMMER</p>
                                    <p class="project-sidebar__text property-sidebar__text"><?php echo $property['ref_number']; ?></p>
                                </div>
                                <div class="project-sidebar__block property-sidebar__block">
                                    <p class="project-sidebar__title">OBJEKTART</p>
                                    <p class="project-sidebar__text property-sidebar__text"><?php echo $property_type; ?></p>
                                </div>
                                <div class="project-sidebar__block property-sidebar__block">
                                    <p class="project-sidebar__title">PREIS</p>
                                    <p class="project-sidebar__text property-sidebar__text">ab € <?php echo $property['property_price']; ?></p>
                                </div>
                                <?php if($property['property_content']['location']) : ?>
                                    <div class="project-sidebar__block standort__block">
                                        <p class="project-sidebar__title">STANDORT</p>
                                        <p class="project-sidebar__text property-sidebar__text property__adress">
                                            <?php
                                                foreach ($property['property_content']['location'] as $adress) {
                                                    echo "<span>{$adress['location_row']}</span>";
                                                }
                                            ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                                <div class="project-sidebar__block">
                                    <p class="project-sidebar__title">KONTAKT</p>
                                    <p class="project-sidebar__text property-sidebar__text property__contact">
                                        <span><?php echo ($property['property_contact_name']) ? $property['property_contact_name'] : ''; ?></span>
                                        <span><?php echo ($property['property_contact_phone']) ? 'Telefon:' . $property['property_contact_phone'] : ''; ?></span>
                                        <span><?php echo ($property['property_contact_phone']) ? 'Fax:' . $property['property_contact_phone'] : ''; ?></span>
                                        <span><a href="mailto:<?php echo ($property['property_contact_email']) ? $property['property_contact_email'] : ''; ?>"><?php echo ($property['property_contact_email']) ? $property['property_contact_email'] : ''; ?></a></span></p>
                                </div>
                            </div>


                            <div class="sidebar-icons-menu">
		                        <?php wp_nav_menu(['menu' => 'search-menu', 'menu_class' => 'home-menu']); ?>
                            </div>

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title>
        <g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2">
            <g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1">
                <polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round"
                          stroke-width="4"/>
            </g>
        </g>
    </svg>


</div>

<div class="section section1">
    <div class="content">

        <div class="container">
            <div class="row">
                <div class="page-content property-content">
                    <div class="ref__number">REF.-NR. <?php echo $property['ref_number']; ?></div>
                    <h1 class="article__title"><?php the_title(); ?></h1>
					<?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    ?>
                    <div class="property">
                        <?php if($property['property_content']['property_info']): ?>
                        <div class="property__row">
                            <div class="property__title">Objektinformation</div>
                            <div class="property__content property__info">
                                <?php
                                    $prop_info = $property['property_content']['property_info'];
                                    foreach ( $prop_info as $item ) {
                                        echo "<span>{$item['info_title']}: {$item['info_text']}</span>";
                                    }
                                ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($property['property_content']['equipment']) : ?>
                        <div class="property__row">
                            <div class="property__title">Ausstattung</div>
                            <div class="property__content property__info">
			                    <?php
			                    $prop_equip = $property['property_content']['equipment'];
			                    foreach ( $prop_equip as $item ) {
				                    echo "<span>{$item['equipment_item']}</span>";
			                    }
			                    ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="property__row additional__row">
                            <div class="additional__item">
                                <div class="property__title">Energieausweis</div>
                                <div class="property__content property__info">
		                            <?php echo $property['property_content']['energy_cert']; ?>
                                </div>
                            </div>
                            <div class="additional__item">
                                <div class="property__title">Preis</div>
                                <div class="property__content property__info">
                                    € <?php echo $property['property_price']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="property__row additional__row">
                            <?php if($property['property_content']['location']): ?>
                            <div class="additional__item">
                                <div class="property__title">Standort</div>
                                <div class="property__content property__info">
				                    <?php
				                        foreach ( $property['property_content']['location'] as $item ) {
					                        echo "<span>{$item['location_row']}</span>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php endif; ?>
	                        <?php if($property['property_contact_name']) : ?>
                            <div class="additional__item">
                                <div class="property__title">Kontakt</div>
                                <div class="property__content property__info">
                                    <span><?php echo ($property['property_contact_name']) ? $property['property_contact_name'] : ''; ?></span>
                                    <span><?php echo ($property['property_contact_phone']) ? 'Telefon:' . $property['property_contact_phone'] : ''; ?></span>
                                    <span><?php echo ($property['property_contact_phone']) ? 'Fax:' . $property['property_contact_phone'] : ''; ?></span>
                                    <span><a href="mailto:<?php echo ($property['property_contact_email']) ? $property['property_contact_email'] : ''; ?>"><?php echo ($property['property_contact_email']) ? $property['property_contact_email'] : ''; ?></a></span></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php
                            $all_files = get_field("property_all_files");
                            if($all_files):
                        ?>
                        <div class="property__row additional__row">
                            <div class="additional__item document__item">
                                <div class="property__title">Dokumente</div>
                                <div class="property__content download__documents">
                                    <?php $all_files = get_field("property_all_files");
                                        foreach ($all_files as $file) :
                                    ?>

                                            <div class="file__download">
                                                <a href="<?php echo $file["document"]["url"];?>" download>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/download_icon.svg" alt="">
                                                    <?php echo $file["document"]["filename"]; ?></a>
                                            </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="project-slider">
						<?php
						$slides = get_field( 'property_slider' );
						if ( $slides ) : ?>
                            <div class="slider-with-nav project-slider__slides">
								<?php foreach ( $slides as $slide ): ?>
                                    <div><img src="<?php echo $slide['url'] ?>" alt="" width="780"></div>
								<?php endforeach; ?>
                            </div>
                            <div class="article__imgs-slider slider-nav project-slider__nav">
								<?php foreach ( $slides as $slide ): ?>
                                    <div><img src="<?php echo $slide['url'] ?>" alt="" width="180"></div>
								<?php endforeach; ?>
                            </div>
						<?php endif; ?>
                    </div>

                    <div class="post-nav">
                        <div class="row">
                            <div class="alignleft prev-next-post-nav nav-text"><?php previous_post_link( '%link', 'vorheriges' ) ?></div>
<!--                            <p class="nav-text"><a href="/projekte/" style="color: rgb(0,0,0)">ÜBERSICHT</a></p>-->
                            <div class="alignright prev-next-post-nav nav-text"><?php next_post_link( '%link', 'nächstes' ) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
<script>
    jQuery("#menu-search-menu li:nth-child(3)").addClass("current-menu-item");
</script>
