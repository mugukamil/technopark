<?php
	$args = array('post_type' => 'projects');
	$args['search_filter_id'] = 883;
	$query = new WP_Query($args);
?>
    <h2 class='search__heading'>
        <span class='js-project-count'><?php echo $query->post_count;?></span>
        <span class='js-project-category'>IMMOBILIE(N) GEFUNDEN</span>
        <span class='js-project-type'></span>
    </h2>
<!--    <div class='filter__wrapper'>-->
<!--        <div class="js-filter-category"><span class="filter-text">WOHNUNG</span> <span class="js-checkmark"></span> /</div>-->
<!--        <div class="js-filter-type"><span class="filter-text">&nbsp;KAUF</span> <span class="js-checkmark"></span> /</div>-->
<!--        <div class="js-filter-area"><span class="filter-text">&nbsp;FLÄCHE AB 120 m<sup>2</sup></span> <span class="js-checkmark"></span></div>-->
<!--    </div>-->
    <?php if($query->have_posts()) : while ( $query->have_posts() ) : $query->the_post();?>
    <?php
        $post_cf = get_fields($query->ID);
        $property_area = ($post_cf['property_exact_area']) ? $post_cf['property_exact_area'] . ' m² / ' : '';
        $property_rooms = ($post_cf['property_rooms']) ? $post_cf['property_rooms'] . ' Zimmer  /' : '';
        $property_move_date = ($post_cf['property_move_date']) ? ' ' . $post_cf['property_move_date'] . ' ' : '';
        $property_price = ($post_cf['property_price']) ? ' <span class="project__info__price">€  ' . $post_cf['property_price'] . '</span>' : '';
        $property_info = $property_area . $property_rooms . $property_move_date . $property_price;
        $property_contact_name = ($post_cf['property_contact_name']) ? 'Kontakt: ' . $post_cf['property_contact_name'] : '';
        $property_contact_phone = ($post_cf['property_contact_phone']) ? $post_cf['property_contact_phone'] : '';
        $property_contact_email = ($post_cf['property_contact_email']) ? $post_cf['property_contact_email'] : '';
        $property_contacts = $property_contact_phone . ', <a href="mailto:'. $property_contact_email .'">' . $property_contact_email . '</a>';
    ?>
        <article class="search__project">
            <a href="<?php the_permalink(); ?>">
                <div class="project__tmb"><?php echo get_the_post_thumbnail( $query->ID, 'medium');?></div>
            </a>
            <div class="search__project__content">
                <div class="project__header">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="project__info">
                        <?php echo $property_info; ?>
                    </div>
                </div>

                <div class="project__text">
                    <?php the_excerpt(); ?>
                </div>

                <div class="project__footer">
                    <div class="project__person"><?php echo $property_contact_name; ?></div>
                    <div class="project__contacts"><?php echo $property_contacts; ?></div>
                </div>
            </div>

        </article>


    <?php endwhile; else : ?>
        <p>No posts found</p>
    <?php endif;
?>