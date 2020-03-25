<?php
    get_header();
    include('_parts/hero-bgcover.php');
?>

<div class="container" role="main">

	<div class="grid grid8_12 box-padding">

		<article>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	            <h1><?php the_title(); ?></h1>

                <div class="post-info">

                    <?php the_category('&middot;'); ?> &middot; <?php echo get_the_date(); ?>

                </div>

				<?php the_content(); ?>

			<?php endwhile; ?>

		</article>

        <div class="prev-next">

			<div class="prev"><?php previous_posts_link(); ?></div>
			<div class="next"><?php next_posts_link(); ?></div>
			
        </div>

	</div>

	<aside class="grid grid4_12 news-aside">

		<?php get_sidebar(); ?>

	</aside>

</div><!-- /.main-->
	
<?php get_footer(); ?>

<?php if (is_single()) {   //  displaying a single blog post ?>
<script type="text/javascript">
  jQuery("a[href$='news/']").parent().addClass('current-menu-item');
</script>
<?php } ?>
