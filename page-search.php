<?php
/**
 * Template Name: Search page
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

get_header(); ?>

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

<!--			<div class="content__bg">-->
<!--				--><?php
//				the_post_thumbnail()
//				?>
<!---->
<!--			</div>-->
			<div class="container">
				<div class="row content__row">
					<div class="page-content"></div>
					<?php get_sidebar('search'); ?>
				</div>
			</div>

		</div>
		<svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>

	</div> <!-- /.parallax1 -->



	<div class="section section1">
		<div class="content">
            <div class="sidebar__bg"></div>
			<div class="container">
				<div class="row content__row">
					<div class="page-content search_results">
						<?php get_template_part('template-parts/search/search-results'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>

<script>
    jQuery(document).ready(function($){
        // Custom checkmark for input
        var elements = $(".sf-field-post-meta-property_category ul li,.sf-field-post-meta-property_type ul li");
        elements.append("<div class='checkmark'></div>");
        $(".checkmark").on( "click", function(){
            $(this).siblings("input").click();
        });

        //Add text before select
        $(".sf-meta-range-number > label").prepend("<span class='ab'>ab</span>");

        // var searchElem = $(".sf-input-range-number.sf-range-min").val('');
        // searchElem.get(0).type = "text";
        // searchElem.removeAttr("min max step");
        // searchElem.attr("placeholder", "Suche");

        // Getting search form data
        $("#search-filter-form-883").on("submit", function(){
            var somevar = $("#search-filter-form-883 input:checked ~ label, #search-filter-form-883 input[type=text]");
            var filters = [];
            $.each(somevar, function(i, val){
                (val.className === "sf-input-text") ? filters.push(val.value) : filters.push(val.outerText.toLowerCase());
            });
            console.log(filters);
        });

    });
</script>
