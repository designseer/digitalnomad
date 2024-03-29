<?php
function get_the_category( $id = false ) {
    $categories = get_the_terms( $id, 'category' );
    if ( ! $categories || is_wp_error( $categories ) )
        $categories = array();
		$categories = array_values( $categories );
		foreach ( array_keys( $categories ) as $key ) 
		{
			_make_cat_compat( $categories[$key] );
		}
    /**
     * Filters the array of categories to return for a post.
     *
     * @since 3.1.0
     * @since 4.4.0 Added `$id` parameter.
     *
     * @param array $categories An array of categories to return for the post.
     * @param int   $id         ID of the post.
     */
    return apply_filters( 'get_the_categories', $categories, $id );
}
?>