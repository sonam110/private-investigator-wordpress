<?php
/**
 * Search Form template
 *
 * @package INSIGHTEYE
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>


<div class="search-widget">
    <div class="search-form">
        <form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="form-group">
                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'insighteye' ); ?>" required>
                <button type="submit"><i class="icon-22"></i></button>
            </div>
        </form>
    </div>
</div>