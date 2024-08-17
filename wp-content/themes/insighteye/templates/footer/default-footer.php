<?php
/**
 * Footer Template  File
 *
 * @package INSIGHTEYE
 * @author  Template Path
 * @version 1.0
 */

$options = insighteye_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$footer_bg_v1 = $options->get( 'footer_bg_image_v1' );
$footer_bg_v1 = insighteye_set( $footer_bg_v1, 'url');

?>
    <!-- main-footer -->
        <footer class="main-footer" id="footer">
           	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
            <div class="widget-section">
                <?php if($footer_bg_v1){ ?>
                <div class="bg-layer" style="background-image: url(<?php echo esc_url($footer_bg_v1); ?>);"></div>
                <?php } ?>
                <div class="auto-container">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="footer-bottom centred">
                <div class="auto-container">
                    <div class="copyright">
                        <p><?php echo wp_kses($options->get('copyright_text', 'Copyrights &copy; 2023 <a href="#">Insighteye</a>. All rights reserved '), true); ?></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->