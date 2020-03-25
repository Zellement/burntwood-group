<?php 

if ( is_front_page() ) { 

/* -----------------------------------------------------------------
Home page
----------------------------------------------------------------- */

?>

	<div class="hero">

		<div class="grid grid6_12 hero-image">

			<?php

			/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

			$thumb_id = get_post_thumbnail_id();

			$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'hero-600', true);
			$thumb_url_small = $thumb_url_array_small[0];

			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'hero-1200', true);
			$thumb_url = $thumb_url_array[0];

			if ( $thumb_id ) : ?>

				<style scoped>
					.hero-image {
				      background-image: url(<?php echo $thumb_url_small; ?>);
				    }
				    @media (min-width: 600px) {
						.hero-image {
					       background-image: url(<?php echo $thumb_url; ?>);
					    }
				    }
				</style>

			<?php else : ?>

				<style scoped>
					.hero-image {
				      background-color: #eee;
				    }
				</style>

			<?php endif; ?>

		</div>

		<div class="grid grid6_12 hero-content">

			<div class="margin-auto">

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

<?php } elseif (is_page('contact') || is_page('contact-us')) {

/* -----------------------------------------------------------------
Contact page
----------------------------------------------------------------- */

?>



<?php } elseif (is_page()) {

/* -----------------------------------------------------------------
Internal page
----------------------------------------------------------------- */

?>



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