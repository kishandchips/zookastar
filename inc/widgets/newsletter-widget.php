<?php 

class Newsletter extends WP_Widget {
	
	function Newsletter() {
		$widget_opts = array( 'description' => __('Use this widget is to show the Newsletter') );
		parent::WP_Widget(false, 'Newsletter', $widget_opts);
	}
	function form($instance) {
		
		$content = (isset($instance['content'])) ? esc_attr($instance['content']) : '';  
        echo '<p><label>';
		echo _e('Content:').'<textarea class="widefat" rows="16" cols="20" name="'. $this->get_field_name('content').'" >'. $content.'</textarea>';
        echo '</label></p>';

	}
	function update($new_instance, $old_instance){
		return $new_instance;
	}
	
	function widget($args, $instance) {
		$args['content'] = $instance['content'];
		echo $args['before_widget'] . '<div class="inner">';
		echo $args['content'];
		echo '</div>'.$args['after_widget'];
	}
}

register_widget('Newsletter');



?>
