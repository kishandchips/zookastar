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
			<div class="container">
				<div class="alpha span seven">
					<div class="newsletter">
						<?php gravity_form(2); ?>
					</div>
					<nav role="navigation" class="site-navigation main-navigation">
						<h5 class="uppercase light-grey"><?php _e("Quick Links", 'zookastar'); ?></h5>
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'clearfix', 'container' => false ) ); ?>
					</nav>
				</div>
				<div class="omega three span">
					<h5 class="uppercase light-grey"><?php _e("Quick Links", 'zookastar'); ?></h5>
					<h3 class="uppercase green"><?php _e("tocks available soon", 'zookastar'); ?></h3>
				</div>
				<!-- <div class="omega eight span alpha">
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'clearfix', 'container' => false ) ); ?>
					</nav>
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
							<?php //gravity_form(1); ?>
						</div>
					</div>
				</div> -->
			</div>
		</div>

		 <div class="bottom">
			<div class="inner container">
				<div class="span eight alpha">
					<p clas="no-margin">&copy; <?php bloginfo( 'name' ); ?> <?php echo date('Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink(190); ?>"><?php _e("Terms &amp; Conditions", 'zookastar') ?></a></p>
				</div>
			</div>
		</div>
	</footer><!-- #footer .site-footer -->
</div><!-- #wrap -->

<?php wp_footer(); ?>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
// var _gaq = _gaq || [];_gaq.push(["_setAccount", "UA-3620331-1"]);
// _gaq.push(["_trackPageview"]);
// (function() {
// 	var ga = document.createElement("script");
// 	ga.type = "text/javascript";ga.async = true;
// 	ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";var s = document.getElementsByTagName("script")[0];
// 	s.parentNode.insertBefore(ga, s);
// })();
//--><!]]>
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-518931043bb53fb1"></script>

</body>
</html>