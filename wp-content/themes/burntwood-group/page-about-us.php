<?php
	// Template Name: About Us
    get_header();
    include('_parts/hero.php');
    if (is_front_page()){ include('_parts/theme-parts/buckets.php'); };
?>

<div class="container" role="main">

	<div class="grid grid6_12 box-padding">

		<article>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	            <h1><?php the_field('h1'); ?></h1>

				<?php the_content(); ?>

			<?php endwhile; ?>
	        
		</article>

	</div>

	<aside class="grid grid6_12">

		<div class="team">

			<h4 class="title">Meet the Team</h4>

			<ul>

				<?php while( has_sub_field('team_members') ): ?>

					<?php

						$image = get_sub_field('image');
						$size = 'thumbnail';
						$thumb = $image['sizes'][ $size ];

						$large = $image['sizes'][ 'large'];

					?>

					<li>

			 			<a class="swipebox" title="<?php the_sub_field('name'); ?> | <?php the_sub_field('job_title'); ?>" href="<?php echo $large; ?>"><img src="<?php echo $thumb; ?>" alt="<?php the_sub_field('name'); ?>" /></a>

						<p class="name"><?php the_sub_field('name'); ?></p>
						<p class="job-title"><?php the_sub_field('job_title'); ?></p>

			 		</li>

				<?php endwhile; ?>

			 </ul>

		</div>

		<?php include("_parts/gallery.php"); ?>
	
	</aside>

</div><!-- /.main-->
	
<?php get_footer(); ?>
