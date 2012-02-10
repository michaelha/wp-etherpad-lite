<?php
//display the the wp etherpad options in network settings
add_action('wpmu_options', 'wp_etherpad_lite_settings');

//save settings in network settings
add_action( 'wpmuadminedit' , 'wp_etherpad_lite_settings_update' );

function wp_etherpad_lite_settings_update() {
	update_site_option( 'wp_ep_show_chat', $_POST['wp_ep_show_chat'] );
	update_site_option( 'wp_ep_show_ln', $_POST['wp_ep_show_ln'] );
	
	if ( $_POST['wp_ep_host_url']) {
	
		update_site_option( 'wp_ep_host_url', ($_POST['wp_ep_host_url']));
	
	}
}


function wp_etherpad_lite_settings() {
?>
<h3><?php _e( 'WP Etherpad Lite' ); ?></h3>
	<table id="menu" class="form-table">
		
		
		<tr valign="top">
			<th scope="row"><?php _e( 'Host' ); ?></th>
			<td>
				<input name="wp_ep_host_url" type="text" id="wp_ep_host_url" class="regular-text" value="<?php echo esc_attr( get_site_option('wp_ep_host_url') ) ?>" />
				<br/>
				What is the host URL for the etherpad? See <a href="https://github.com/johnyma22/etherpad-lite-jquery-plugin/blob/master/js/etherpad.js">configuration reference</a>.
			</td>
		
		</tr>

		<tr valign="top">
			<th scope="row"><?php _e( 'Show Chat' ); ?></th>
			<td>
		<?php
		$wp_ep_show_chat_perms = get_site_option( 'wp_ep_show_chat' );
		$wp_ep_show_chat_items = apply_filters( 'mu_wp_ep_show_chat', array( 'wp_ep_show_chat' => __( 'Enable chat in WP Etherpad Lite' ) ) );
		foreach ( (array) $wp_ep_show_chat_items as $key => $val ) {
			echo "<label><input type='checkbox' name='wp_ep_show_chat[" . $key . "]' value='1'" .  ( isset( $wp_ep_show_chat_perms[$key] ) ? checked( $wp_ep_show_chat_perms[$key], '1', false ) : '' ) . " /> " . esc_html( $val ) . "</label><br/>";
		}
		?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Show line numbers' ); ?></th>
			<td>
		<?php
		$wp_ep_show_ln_perms = get_site_option( 'wp_ep_show_ln' );
		$wp_ep_show_ln_items = apply_filters( 'mu_wp_ep_show_ln', array( 'wp_ep_show_ln' => __( 'Enable line numbers in WP Etherpad Lite' ) ) );
		foreach ( (array) $wp_ep_show_ln_items as $key => $val ) {
			echo "<label><input type='checkbox' name='wp_ep_show_ln[" . $key . "]' value='1'" .  ( isset( $wp_ep_show_ln_perms[$key] ) ? checked( $wp_ep_show_ln_perms[$key], '1', false ) : '' ) . " /> " . esc_html( $val ) . "</label><br/>";
		}
		?>
			</td>
		</tr>		
	</table>
<?php


}