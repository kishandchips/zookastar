<?php 

class Twitter_Feed extends WP_Widget {
	
	function Twitter_Feed() {
		$widget_opts = array( 'description' => __('Use this widget is to show the tweets of a specific user.') );
		parent::WP_Widget(false, 'Twitter Feed', $widget_opts);
	}
	function form($instance) {
		
		$title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';  
        echo '<p><label>';
		echo _e('Title:').'<input class="widefat" name="'. $this->get_field_name('title').'" type="text" value="'. $title.'" />';
        echo '</label></p>';
		

		$username = (isset($instance['username'])) ? esc_attr($instance['username']) : '';  
        echo '<p><label>';
		echo _e('Username:').'<input class="widefat" name="'. $this->get_field_name('username').'" type="text" value="'. $username.'" />';
        echo '</label></p>';
	}
	function update($new_instance, $old_instance){
		return $new_instance;
	}
	
	function widget($args, $instance) {
		$args['title'] = $instance['title'];
		
		$args['username'] = (isset($instance['username'])) ? $instance['username'] : 'zookastardotcom';
		echo $args['before_widget'] . '<div class="border">';
		echo '<h5 class="text-center uppercase novecento-bold small widget-title border-bottom"><a href="http://twitter.com/'.$args['username'].'" target="_blank" class="black">' . $args['title'] . '</a></h5>';
		?>
        <script>
        	(function($){
        		var url='http://api.twitter.com/1/statuses/user_timeline.json?count=4&screen_name=<?php echo $args['username']; ?>&callback=?';
				$.getJSON(url,function(tweets){

					var output = [];

					for (i in tweets) {
						var tweet = tweets[i];
						output.push('<li class="tweet clearfix">'+
										'<div class="tweet-authorphoto span two omega">'+
											'<img width="36" src="'+tweet.user.profile_image_url +'" alt="'+''+'">'+
										'</div>'+
										'<div class="tweet-content span eight">'+
											'<div class="tweet-text arial small">'+tweet.text+'</div>'+
											'<div class="tweet-meta">'+
												'<span class="tweet-time tiny grey arial">'+relative_time(tweet.created_at)+' </span><br />'+
												//'<a class="tweet-author tiny red arial bold" href="http://twitter.com/'+tweet.user.screen_name+'">'+tweet.user.screen_name+'</a>'+
											'</div>'+
										'</div>'+
									'</li>');
					}

					$("#twitter-feed").html(output.join(''));
				});
        	})(jQuery);

			function relative_time(timeValue) {
				var values = timeValue.split(" ");
				timeValue = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
				var parsedDate = Date.parse(timeValue);
				var relativeTo = (arguments.length > 1) ? arguments[1] : new Date();
				var delta = parseInt((relativeTo.getTime() - parsedDate) / 1000);
				delta = delta + (relativeTo.getTimezoneOffset() * 60);

				var r = '';
				if (delta < 60) {
					r = 'a minute ago';
				} else if(delta < 120) {
					r = 'couple of minutes ago';
				} else if(delta < (45*60)) {
					r = (parseInt(delta / 60)).toString() + ' minutes ago';
				} else if(delta < (90*60)) {
					r = 'an hour ago';
				} else if(delta < (24*60*60)) {
					r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
				} else if(delta < (48*60*60)) {
					r = '1 day ago';
				} else {
					r = (parseInt(delta / 86400)).toString() + ' days ago';
				}

				return r;
			}
        </script>
        <ul id="twitter-feed">
	        	
        </ul>
            
		<?php echo '</div>'.$args['after_widget'];
	}
}

register_widget('Twitter_Feed');



?>
