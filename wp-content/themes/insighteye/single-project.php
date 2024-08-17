<?php get_header();
$data    = \INSIGHTEYE\Includes\Classes\Common::instance()->data('single-project')->get();
//do_action( 'insighteye_banner', $data ); 
?>

<?php while (have_posts()) : the_post();
	$show_project_summery = get_post_meta(get_the_id(), 'show_project_summery', true);
	$show_project_info = get_post_meta(get_the_id(), 'show_project_info', true);
	$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
?>

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

 <!-- case-details -->
<section class="case-details sec-pad-3">
    <div class="auto-container">
        <div class="upper-box pb_80 mb_80">
        	<?php if( has_post_thumbnail() ){?>
            <figure class="image-box mb_60"><?php the_post_thumbnail('insighteye_1290x600'); ?></figure>
            <?php } ?>
            <div class="inner-box">
                <div class="row clearfix">
                	<?php if($show_project_summery){ ?>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="text-box mr_30">
                            <?php if(get_post_meta( get_the_id(), 'project_title', true )){ ?>
                            	<h3><?php echo (get_post_meta( get_the_id(), 'project_title', true ));?></h3>
                            <?php } ?>
                           <?php if(get_post_meta( get_the_id(), 'project_text', true )){ ?>
                           		<?php echo (get_post_meta( get_the_id(), 'project_text', true ));?>
                           <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($show_project_info){ ?>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="info-box">
                            <?php if(get_post_meta( get_the_id(), 'project_info_title', true )){ ?>
                            	<h3><?php echo (get_post_meta( get_the_id(), 'project_info_title', true ));?></h3>
                            <?php } ?>
                            <ul class="info-list clearfix">
                                <?php if(get_post_meta( get_the_id(), 'projrct_client_title', true ) || get_post_meta( get_the_id(), 'project_client_name', true )){ ?>
                                	<li><?php echo (get_post_meta( get_the_id(), 'projrct_client_title', true ));?> <span><?php echo (get_post_meta( get_the_id(), 'project_client_name', true ));?></span></li>
                                <?php } ?>
								<?php if(get_post_meta( get_the_id(), 'project_date_title', true )){ ?>
                                	<li><?php echo (get_post_meta( get_the_id(), 'project_date_title', true ));?> <span><?php echo get_the_date(); ?></span></li>
                                <?php } ?>
								<?php if(get_post_meta( get_the_id(), 'project_address_title', true ) || get_post_meta( get_the_id(), 'project_address', true )){ ?>
                                	<li><?php echo (get_post_meta( get_the_id(), 'project_address_title', true ));?> <span><?php echo (get_post_meta( get_the_id(), 'project_address', true ));?></span></li>
                                <?php } ?>
								<?php if(get_post_meta( get_the_id(), 'project_category_title', true )){ ?>
                                	<li><?php echo (get_post_meta( get_the_id(), 'project_category_title', true ));?> <span><?php echo implode( ', ', (array)$term_list );?></span></li>
                                <?php } ?>
								<?php if(get_post_meta( get_the_id(), 'project_duration_title', true ) || get_post_meta( get_the_id(), 'project_duration', true )){ ?>
                                	<li><?php echo (get_post_meta( get_the_id(), 'project_duration_title', true ));?> <span><?php echo (get_post_meta( get_the_id(), 'project_duration', true ));?></span></li>
                           		<?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="lower-box">
        	<?php the_content(); ?>
        </div>
    </div>
</section>
<!-- case-details end -->




<?php endwhile; ?>
<?php get_footer(); ?>
