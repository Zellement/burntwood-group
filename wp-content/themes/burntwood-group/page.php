<?php
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

	        <?php if ( is_page("contact") ) { include('_includes/forms/contact-form.php'); } ?>
	        
		</article>

	</div>

	<aside class="grid grid4_12">

		<?php include("_parts/gallery.php"); ?>

		<?php include("_parts/children-sibling-menu.php"); ?>
	
	</aside>

	<div class="grid grid2_12">

		<?php include("_parts/theme-parts/accreditations.php"); ?>
	
	</div>

</div><!-- /.main-->
	
<?php get_footer(); ?>
