<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package zookastar
 * @since zookastar 1.0
 */
?>
<div id="sidebar" class="widget-area span three omega" role="complementary">
	<?php 
	global $sidebar_id;
	$sidebar = (isset($sidebar_id)) ? $sidebar_id : 'default';
	dynamic_sidebar( $sidebar );  ?>
</div><!-- #sidebar -->