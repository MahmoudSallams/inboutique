<?php
// Navigations field for metaboxs
defined( 'ABSPATH' ) || exit;

class RWMB_Navs_Field extends RWMB_Field {
	/**
	 * Get field HTML
	 *
	 * @param mixed $meta
	 * @param array $field
	 *
	 * @return string
	 */
	static function html( $meta, $field )
	{
		// Prepare meta value
		$meta = $meta == '' ? $field['std'] : $meta;

		// Print HTML
		ob_start();
		?>
		<div id="<?php echo esc_attr( $field['id'] ); ?>-container">
			<select name="<?php echo esc_attr( $field['id'] ); ?>" id="<?php echo esc_attr( $field['id'] ); ?>">
				<option value="none" <?php echo ( $meta == 'none' ) ? 'selected="selected"' : '' ?>><?php echo esc_html__('None', 'zoo-kodo'); ?></option>
				<?php
					$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

					foreach ( $menus as $menu ) { ?>
						<option value="<?php echo ent2ncr( $menu->slug ); ?>" <?php echo ( $meta == $menu->slug ) ? 'selected="selected"' : '' ?>><?php echo esc_attr( $menu->name ); ?></option>
					<?php }
				?>
			</select>
			<script>
				( function( $ ) {
				    "use strict";
				        $( document ).ready( function() {
				        	$( 'select#<?php echo esc_attr( $field['id'] ) ?>' ).on( 'change', function() {
				        		var value = $( this ).val();

				        		$( this ).parent().find( 'input[type="hidden"]' ).val( value );
				        	} );
				        } )
				} ) ( jQuery )
			</script>
			<input type="hidden" id="<?php echo esc_attr( $field['id'] ); ?>" name="<?php echo esc_attr( $field['id'] ); ?>" value="<?php echo esc_attr( $meta ); ?>">
		</div>
		<?php
		return ob_get_clean();
	}
}
