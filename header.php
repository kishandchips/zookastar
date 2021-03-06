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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="<?php echo get_template_directory_uri(); ?>/images/misc/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/style.css" />
    <link href="//fonts.googleapis.com/css?family=Open+Sans:600|Roboto+Condensed:400,700" rel="stylesheet" type="text/css" />
    
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
		//wp_enqueue_script('countdown', get_template_directory_uri().'/js/plugins/jquery.countdown.min.js', array('jquery'), '', true);
		wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);
	}
	add_action('wp_enqueue_scripts', 'load_js');
	?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="header" role="banner">
		<div class="inner container">
			<h1 class="logo-container span three pull-one">
				<a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</h1>
			<div class="span eight push-two info omega break-on-mobile">
				<div class="social-container clearfix">
					<!-- AddThis Button BEGIN -->
					<div class="span five alpha addthis_toolbox addthis_default_style ">
						<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet"></a>
						<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
					</div>
					<!-- AddThis Button END -->
					<div class="span five omega social text-right">
						<p class="no-margin white roboto">
							<span class=" follow-us uppercase"><?php _e("Follow Us:", 'zookastar'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="https://www.facebook.com/ZookastarFestival" target="_blank" class="facebook-btn"><?php _e("on Facebook"); ?></a>&nbsp;&nbsp;
							<a href="http://www.twitter.com/zookastar" target="_blank" class="twitter-btn"><?php _e("@Zookastar"); ?></a>
						</p>
					</div>
				</div>
				<div class="countdown-container">
					<h4 class="title uppercase no-margin"><?php _e('The <span class="white">movie-culture festival</span> with a twist', 'zookastar'); ?></h4>
					<div class="countdown clearfix">
						<header class="countdown-header span ten">
							<h2 class="date uppercase no-margin"><a href="<?php echo get_permalink(get_zookastar_option('date_moved_page_id')); ?>"><?php _e("Zookastar moved to 2014", 'zookastar'); ?></a></h2>
							<h5 class="location uppercase no-margin"><?php _e("First festival’s date pushed forward to Easter 2014", 'zookastar'); ?></h5>
							<img src="<?php echo get_template_directory_uri(); ?>/images/misc/countdown_tower.png"  class="tower"/>
						</header>
						<!-- <div id="countdown" class="span three omega">

						</div> -->
					</div>
				</div>
				<div class="navigation-container">
					<button class="mobile-navigation-btn"><div class="line"></div><div class="line"></div><div class="line"></div></button>
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
					</nav><!-- .site-navigation .main-navigation -->
				</div>
				
			</div>
		</div>
	</header><!-- #header -->

	<div id="main" class="site-main" role="main">
		<div id="ajax-page"></div>