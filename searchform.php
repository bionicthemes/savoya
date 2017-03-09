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
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'type and press enter', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" /><a href="#" class="close-btn" id="searchClose"></a>
</form>






