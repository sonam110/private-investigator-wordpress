<?php
/**
 * Blog Post Main File.
 *
 * @package INSIGHTEYE
 * @author  Template Path
 * @version 1.0
 */

get_header();
$options = insighteye_WSH()->option();

$data    = \INSIGHTEYE\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';


if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

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

<!-- sidebar-page-container -->
<section class="sidebar-page-container sec-pad-3">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'insighteye_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>				
                <div class="blog-details-content">           	
                    <div class="thm-unit-test"> 
                    	
                        <div class="blog-details-content">
                        
                          <div class="news-block-one">
                            <div class="inner-box blog">
                                <?php if( has_post_thumbnail() ){?>
                                <figure class="image-box"><?php the_post_thumbnail('full'); ?></figure>
                                <?php } ?>
                                <div class="lower-content">
                                    <?php if(! $options->get('single_post_date')){ ?>
                                    <div class="date"><?php echo get_the_date('d'); ?> <span><?php echo get_the_date('M'); ?></span></div>
                                    <?php }?>
                                    <ul class="post-info mb_25 clearfix">
                                        <?php if(! $options->get('single_post_author')){ ?><li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.svg" alt="<?php esc_attr_e('Awesome Image', 'insighteye'); ?>"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li><?php } ?>
                                        <?php if(! $options->get('single_post_comments')){ ?><li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-5.svg" alt="<?php esc_attr_e('Awesome Image', 'insighteye'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'insighteye'), true), wp_kses(__('01 Comment' , 'insighteye'), true), wp_kses(__('0% Comments' , 'insighteye'), true)); ?></li><?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text">
							<?php the_content(); ?>
                        </div>
                        <div class="clearfix"></div>
                        <?php wp_link_pages(array('before'=>'<div class="paginate-links m-t30">'.esc_html__('Pages: ', 'insighteye'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                       
                        <?php if(has_tag()){ ?>
                        <div class="post-tags mt_50">
                            <ul class="tags-list clearfix">
                                <li><p><?php esc_html_e('Tags:', 'insighteye'); ?></p></li>
                                <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                            </ul>
                        </div>
                        <?php } ?>
                        
                        <?php if( $options->get( 'single_post_author_box' )){ ?>
                        <div class="author-box mb_50">
                            <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
                            <figure class="author-thumb"><?php echo get_avatar(get_the_author_meta('ID'), 120); ?></figure>
                            <?php endif; ?>
                            <h4><?php the_author(); ?></h4>
                            <span class="designation"><?php esc_html_e('About Author', 'insighteye'); ?></span>
                            <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                        </div>
                        <?php } ?>
                          
                        <!--End post-details-->
                        <?php comments_template(); ?>
                        </div>
                	</div>
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'insighteye_sidebar', $data );
				}
			?>
        </div>  
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
