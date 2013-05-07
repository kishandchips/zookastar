<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package zookastar
 * @since zookastar 1.0
 */
?>
	</div><!-- #main .site-main -->
	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="top">
			<div class="inner container">
				<div class="alpha two span">
					<h1 class="no-margin">
						<a class="ir logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				</div>
				<div class="omega eight span alpha">
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'clearfix', 'container' => false ) ); ?>
					</nav><!-- .site-navigation .main-navigation -->
					<div class="clearfix">
						<div class="span four alpha social-links">
							<p class="uppercase white no-margin">
								<span class="title"><?php _e("Follow Us", 'zookastar'); ?>&nbsp;&nbsp;&nbsp;</span>
								<a href="#" class="linkedin-btn"></a>
								<a href="#" class="twitter-btn"></a>
								<a href="#" class="youtube-btn"></a>
								<a href="#" class="facebook-btn"></a>
							</p>
						</div>
						<div class="span six omega alpha newsletter">
							<?php gravity_form(1); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<div class="inner container">
				<div class="span eight alpha push-two">
					<p clas="no-margin">&copy; 2013 Magma Group&trade; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink(190); ?>">Privacy Policy</a></p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
var _gaq = _gaq || [];_gaq.push(["_setAccount", "UA-3620331-1"]);
_gaq.push(["_trackPageview"]);
(function() {
	var ga = document.createElement("script");
	ga.type = "text/javascript";ga.async = true;
	ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";var s = document.getElementsByTagName("script")[0];
	s.parentNode.insertBefore(ga, s);
})();
//--><!]]>
</script>

</body>
</html>