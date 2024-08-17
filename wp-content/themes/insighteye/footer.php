<?php
/**
 * Footer Main File.
 *
 * @package INSIGHTEYE
 * @author  Template Path
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php insighteye_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
     <!--Scroll to top-->
    <div class="scroll-to-top">
        <div>
            <div class="scroll-top-inner">
                <div class="scroll-bar">
                    <div class="bar-inner"></div>
                </div>
                <div class="scroll-bar-text"><?php esc_html_e('Go To Top', 'insighteye'); ?></div>
            </div>
        </div>
    </div>
    <!-- Scroll to top end -->
	
</div>

<?php wp_footer(); ?>
</body>
</html>
