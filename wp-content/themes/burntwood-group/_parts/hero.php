<?php 

if ( is_front_page() ) { 

/* -----------------------------------------------------------------
Home page
----------------------------------------------------------------- */


	/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

	$thumb_id = get_post_thumbnail_id();

	$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'hero-500', true);
	$thumb_url_small = $thumb_url_array_small[0];

	$thumb_url_array_med = wp_get_attachment_image_src($thumb_id, 'hero-800', true);
	$thumb_url_med = $thumb_url_array_med[0];

	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'hero-1000', true);
	$thumb_url = $thumb_url_array[0];

	if ( $thumb_id ) : ?>

		<style scoped>
			.hero-image {
		      background-image: url(<?php echo $thumb_url_small; ?>);
		    }
		    @media (min-width: 500px) {
				.hero-image {
			       background-image: url(<?php echo $thumb_url_med; ?>);
			    }
		    }
		    @media (min-width: 1000px) {
				.hero-image {
			       background-image: url(<?php echo $thumb_url; ?>);
			    }
		    }
		</style>

	<?php else : ?>

		<style scoped>
			.hero {
		      background-color: #eee;
		    }
		</style>

	<?php endif; ?>

	<div class="hero">

		<div class="grid grid6_12 hero-image">


		</div>

		<div class="grid grid6_12 hero-content">

			<div class="margin-auto animated slideInLeft">

				<?php /* Hero text */ ?>

					<?php if (get_field('hero_primary_line')) : ?>

						<p class="primary"><?php the_field('hero_primary_line'); ?></p>
						<?php if (get_field('hero_secondary_line')) : ?>
							<p class="secondary"><?php the_field('hero_secondary_line'); ?></p>
						<?php endif; ?>

					<?php else : ?>

						<p class="primary"><?php the_title(); ?></p>

					<?php endif; ?>

				<?php /* Hero CTAs */ ?>

				<?php while( has_sub_field('hero_ctas') ): ?>

					<?php

						$displaytext = get_sub_field('display_text');
						$pagelink = get_sub_field('page_link');
						$buttonclass = get_sub_field('button_class');

					?>

			 		<a class="<?php echo $buttonclass; ?>" href="<?php the_sub_field('page_link') ?>">

			 			<?php echo $displaytext; ?>

					</a>

				<?php endwhile; ?>

			</div>

		</div>

	</div>

<?php //} elseif (is_page('contact') || is_page('contact-us')) {

/* -----------------------------------------------------------------
Contact page
----------------------------------------------------------------- */

?>



<?php } elseif (is_page()) {

/* -----------------------------------------------------------------
Internal page
----------------------------------------------------------------- */



	/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

	$thumb_id = get_post_thumbnail_id();

	$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'hero-500', true);
	$thumb_url_small = $thumb_url_array_small[0];

	$thumb_url_array_med = wp_get_attachment_image_src($thumb_id, 'hero-800', true);
	$thumb_url_med = $thumb_url_array_med[0];

	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'hero-1000', true);
	$thumb_url = $thumb_url_array[0];

	if ( $thumb_id ) : ?>

		<style scoped>
			.hero-image {
		      background-image: url(<?php echo $thumb_url_small; ?>);
		    }
		    @media (min-width: 500px) {
				.hero-image {
			       background-image: url(<?php echo $thumb_url_med; ?>);
			    }
		    }
		    @media (min-width: 1000px) {
				.hero-image {
			       background-image: url(<?php echo $thumb_url; ?>);
			    }
		    }
		</style>

	<?php else : ?>

		<style scoped>
			.hero {
		      background-color: #eee;
		    }
		</style>

	<?php endif; ?>

	<div class="hero">

		<div class="grid grid6_12 hero-image">


		</div>

		<div class="grid grid6_12 hero-content">

			<div class="margin-auto animated slideInLeft">

				<?php /* Hero text */ ?>

					<?php if (get_field('hero_primary_line')) : ?>

						<p class="primary"><?php the_field('hero_primary_line'); ?></p>
						<?php if (get_field('hero_secondary_line')) : ?>
							<p class="secondary"><?php the_field('hero_secondary_line'); ?></p>
						<?php endif; ?>

					<?php else : ?>

						<p class="primary"><?php the_title(); ?></p>

					<?php endif; ?>

					<?php if (get_field('hero_list')) : ?>

					<ul>

						<?php while( has_sub_field('hero_list') ): ?>

							<li><i class="fa fa-check"></i> <?php the_sub_field('hero_item'); ?> </li>

						<?php endwhile; ?>

					</ul>

					<?php endif; ?>

				</div>		

			</div>

		</div>

	</div>



<?php } elseif (is_singular('post')) { 

/* -----------------------------------------------------------------
Single post
----------------------------------------------------------------- */

?>



<?php } elseif (is_search()) {

/* -----------------------------------------------------------------
Search results
----------------------------------------------------------------- */

?>



<?php } else {

/* -----------------------------------------------------------------
Everything else
----------------------------------------------------------------- */

?>

	

<?php } ?>