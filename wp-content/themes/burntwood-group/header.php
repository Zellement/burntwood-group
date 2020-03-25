<?php
	if(!isset($_SESSION)) {
	    session_start();
	}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="IE=Edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title('&raquo;','true','right'); bloginfo('name'); ?></title>
<?php wp_head(); ?>
<?php /* Include marketing fields */ the_field('google_analytics', 'options'); the_field('schema', 'options'); the_field('kenshoo', 'options'); ?>
</head>

<body>

<div class="wrapper">

	<?php include('_parts/sticky-top-bar.php'); ?>

	<header role="banner">

		<div class="container">

			<a class="grid grid3_12" href="<?php echo home_url(); ?>">
				<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/_static/images/logo.svg" alt="<?php the_field('company_name', 'option'); ?> Logo" />
			</a>

			<nav class="grid grid9_12" role="navigation">
				<?php wp_nav_menu( array('menu' => 'Main Nav', 'menu_class' => "main-navigation", 'container' => '' )); ?>
			</nav>

		</div><!-- /.container-->

	</header>
	        
	<div id="mmenu">
		<?php wp_nav_menu( array('menu' => 'Main Nav', 'menu_class' => "mobile-navigation", 'container' => '' )); ?>
	</div>

