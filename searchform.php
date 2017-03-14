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
	<input type="search" class="search-field" placeholder="<?php echo esc_html('type and press enter', 'savoya'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<a href="#" class="icon-close" id="searchClose"></a>
</form>