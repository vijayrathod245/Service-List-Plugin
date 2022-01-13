<?php 
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}
		$fields = [
			'hcf_name',
			'hcf_price',
		];
		foreach ( $fields as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
			}
	}