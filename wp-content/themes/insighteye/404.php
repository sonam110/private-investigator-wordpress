<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Insighteye
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );

$error_img   = $options->get( 'error_image' );
$error_img   = insighteye_set( $error_img, 'url', INSIGHTEYE_URI . 'assets/images/icons/error-1.png' );

?>
<?php get_header();
$data = \INSIGHTEYE\Includes\Classes\Common::instance()->data( '404' )->get();
$options = insighteye_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'insighteye_banner', $data );?>
<?php else:?>

<!-- page-title -->
<section class="page-title p_relative centred">
    <div class="bg-layer" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></h1>
            <ul class="bread-crumb clearfix">
                <?php echo insighteye_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<?php endif;?>    



<!-- error-section -->
<section class="error-section centred sec-pad-3">
    <div class="auto-container">
        <div class="content-box">
            <?php if($error_img): ?> 
            <figure class="image-box"><img src="<?php echo esc_url($error_img); ?>" alt="<?php esc_attr_e('Awesome Image', 'insighteye'); ?>"></figure>
            <?php endif; ?>
            <h2>
				<?php 
					if( $options->get( '404_page_title' ) ){
						echo wp_kses( $options->get( '404_page_title' ), true );
					}else{
						{esc_html_e( 'Oops! That Page Can Not', 'insighteye' );}?><br />
						<?php {esc_html_e( 'be Found.', 'insighteye' );}
					}
				?>
             </h2>
            <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-one">
            <?php 
				if( $options->get( 'back_home_btn_label' ) ){
					echo wp_kses( $options->get( 'back_home_btn_label' ), true );
				}else{
					esc_html_e( ' Back to Homepage', 'insighteye' );
				}
			?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- error-section end -->
         
<?php }
get_footer(); ?>
