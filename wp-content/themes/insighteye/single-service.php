<?php get_header();
    $data    = \INSIGHTEYE\Includes\Classes\Common::instance()->data('single-service')->get();

    $layout = $data->get('layout');
    $sidebar = $data->get('sidebar');
    $layout = ($layout) ? $layout : 'right';
    $sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
    if (is_active_sidebar($sidebar)) {
        $layout = 'right';
    } else {
        $layout = 'full';
    }
    $class = (!$layout || $layout == 'full') ? 'col-xl-12 col-lg-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
    $options = insighteye_WSH()->option();

    do_action('insighteye_banner', $data);
    $allowed_tags = wp_kses_allowed_html('post');
?>

<!-- service-details -->
<section class="service-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">
            
            <?php if( $data->get( 'layout' ) == 'left' ): ?>
			<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
            	<div class="service-sidebar mr_40">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php endif; ?>
            
            <?php 
				while (have_posts()) : the_post(); 
			?>
            <div class="<?php echo esc_attr( $class ); ?> content-side">
            	<div class="service-details-content">
                    <?php if( has_post_thumbnail() ){?>
                    <div class="content-one">
                        <figure class="image-box mb_35"><?php the_post_thumbnail('insighteye_790x500'); ?></figure>
                    </div>
                    <?php } ?>
                    <?php the_content(); ?>
                </div>
            </div>
			<?php endwhile; ?>
            
            <?php if( $data->get( 'layout' ) == 'right' ): ?>
			<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
            	<div class="service-sidebar mr_40">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php endif; ?>
            
        </div>
    </div>
</section>

<?php get_footer(); ?>
