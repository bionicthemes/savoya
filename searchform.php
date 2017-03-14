<?php

/**

 * Template for displaying search forms in Twenty Seventeen

 *

 * @package WordPress

 * @subpackage Twenty_Seventeen

 * @since 1.0

 * @version 1.0

 */

?>



<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<span class="search_info"><?php echo esc_html('Type and press enter to search', 'savoya'); ?></span>
	<span class="icon-close"></span>
</form>