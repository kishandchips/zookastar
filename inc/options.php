<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'zookastar_options', 'zookastar_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'zookastar' ), __( 'Theme Options', 'zookastar' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}



/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'zookastar' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'zookastar' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'zookastar_options' ); ?>
			<?php $options = get_option( 'zookastar_theme_options' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'Tickets Page ID', 'zookastar' ); ?></th>
					<td>
						 <input id="zookastar_theme_options[tickets_page_id]" class="regular-text" type="text" name="zookastar_theme_options[tickets_page_id]" value="<?php esc_attr_e( $options['tickets_page_id'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Terms &amp; Conditions Page ID', 'zookastar' ); ?></th>
					<td>
						 <input id="zookastar_theme_options[tnc_page_id]" class="regular-text" type="text" name="zookastar_theme_options[tnc_page_id]" value="<?php esc_attr_e( $options['tnc_page_id'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Date moved Page ID', 'zookastar' ); ?></th>
					<td>
						 <input id="zookastar_theme_options[date_moved_page_id]" class="regular-text" type="text" name="zookastar_theme_options[date_moved_page_id]" value="<?php esc_attr_e( $options['date_moved_page_id'] ); ?>" />
					</td>
				</tr>
				
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'zookastar' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	$input['tickets_page_id'] = wp_filter_nohtml_kses( $input['tickets_page_id'] );
	$input['tnc_page_id'] = wp_filter_nohtml_kses( $input['tnc_page_id'] );
	$input['date_moved_page_id'] = wp_filter_nohtml_kses( $input['date_moved_page_id'] );
	return $input;
}