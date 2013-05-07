<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package zookastar
 * @since zookastar 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- <meta name="viewport" content="width=device-width" /> -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="http://fast.fonts.com/cssapi/ec5383f1-00b1-4fbb-99c1-2c9e5c78b76a.css"/>
    
    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>
    <?php

	if ( ! is_admin() ) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri().'/js/libs/jquery.min.js', false, '1.9.1');
        wp_enqueue_script('jquery');
    }
	
	function load_js() {
		wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
		wp_enqueue_script('jquery', get_template_directory_uri().'/js/libs/jquery.min.js');
		wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js', array('jquery'), '', true);
		wp_enqueue_script('scroller', get_template_directory_uri().'/js/plugins/jquery.scroller.js', array('jquery'), '', true);
		wp_enqueue_script('actual', get_template_directory_uri().'/js/plugins/jquery.actual.js', array('jquery'), '', true);
		wp_enqueue_script('imagesloaded', get_template_directory_uri().'/js/plugins/jquery.imagesloaded.js', array('jquery'), '', true);
		wp_enqueue_script('transit', get_template_directory_uri().'/js/plugins/jquery.transit.js', array('jquery'), '', true);
		wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);
	}
	add_action('wp_enqueue_scripts', 'load_js');
	?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="header" class="site-header" role="banner">
		<div class="inner container">
			<h1 class="logo-container"><a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="navigation-container">
				<button class="mobile-navigation-btn"><div class="line"></div><div class="line"></div><div class="line"></div></button>
				<?php get_search_form(); ?>
				<nav role="navigation" class="site-navigation main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
				</nav><!-- .site-navigation .main-navigation -->
			</div>
			<div class="info">
				<a href="#" class="login-btn">Log In</a>
				<span class="contact"><span class="grey bold"><?php _e("Get in touch:", 'zookastar'); ?></span>&nbsp;&nbsp;<span class="phone din big white">+44 (0)203 036 0013</span></span>
			</div>
		</div>
		<nav role="navigation" class="mobile-navigation site-navigation main-navigation clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
		</nav>
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main" role="main">
		<div id="ajax-page"></div>