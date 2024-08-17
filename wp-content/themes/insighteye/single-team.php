<?php get_header();
$data = \INSIGHTEYE\Includes\Classes\Common::instance()->data('single-team')->get(); ?>

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

<?php while (have_posts()) : the_post();

$show_imges = get_post_meta(get_the_id(), 'show_imges', true);
$bg_img = get_post_meta(get_the_id(), 'bg_img', true);
$bg_img   = insighteye_set( $bg_img, 'url', INSIGHTEYE_URI . 'assets/images/shape/shape-18.png' );

$signature_img = get_post_meta(get_the_id(), 'signature_img', true);
$signature_img   = insighteye_set( $signature_img, 'url', INSIGHTEYE_URI . 'assets/images/icons/signature-1.png' );

$show_experience_box = get_post_meta(get_the_id(), 'show_experience_box', true);
$show_team_info = get_post_meta(get_the_id(), 'show_team_info', true);
 ?>

<!--
=====================================================
    Team Details
=====================================================
-->

 <!-- team-details -->
<section class="team-details sec-pad-2">
    <?php if($show_imges){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url($bg_img); ?>);"></div><?php } ?>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <?php if(has_post_thumbnail()):?>
                <div class="image-box mr_20">
                    <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-17.png);"></div>
                    <figure class="image"><?php the_post_thumbnail('insighteye_610x600'); ?></figure>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <?php if(get_post_meta( get_the_id(), 'designation', true )) { ?><span class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span><?php } ?>
                    <?php the_content();?>
                    <?php if($show_imges){ ?>
                    <div class="signature"><img src="<?php echo esc_url($signature_img); ?>" alt="<?php esc_attr_e('Awesome Image', 'insighteye'); ?>"></div>
					<?php } ?>
                    <div class="inner-box">
                        <?php if($show_experience_box){ ?>
                        <div class="experience-box">
                            <?php if(get_post_meta( get_the_id(), 'experience_title', true )) { ?><h2><?php echo (get_post_meta( get_the_id(), 'experience_title', true ));?></h2><?php } ?>
                            <?php if(get_post_meta( get_the_id(), 'experience_text', true )) { ?><p><?php echo (get_post_meta( get_the_id(), 'experience_text', true ));?></p><?php } ?>
                        </div>
                        <?php } ?>
                        <?php if($show_team_info){ ?>
                        <?php if(get_post_meta( get_the_id(), 'contact_title', true )) { ?><h4><?php echo (get_post_meta( get_the_id(), 'contact_title', true ));?></h4><?php } ?>
                        <ul class="info-list clearfix mb_20">
                           <?php if(get_post_meta( get_the_id(), 'skill_title', true ) || get_post_meta( get_the_id(), 'skill', true )) { ?><li><span><?php echo (get_post_meta( get_the_id(), 'skill_title', true ));?></span> <?php echo (get_post_meta( get_the_id(), 'skill', true ));?></li><?php } ?>
                           <?php if(get_post_meta( get_the_id(), 'email_title', true ) || get_post_meta( get_the_id(), 'email_address', true )) { ?><li><span><?php echo (get_post_meta( get_the_id(), 'email_title', true ));?></span> <a href="mailto:<?php echo (get_post_meta( get_the_id(), 'email_address', true ));?>"><?php echo (get_post_meta( get_the_id(), 'email_address', true ));?></a></li><?php } ?>
                           <?php if(get_post_meta( get_the_id(), 'phone_title', true ) || get_post_meta( get_the_id(), 'phone_no', true )) { ?><li><span><?php echo (get_post_meta( get_the_id(), 'phone_title', true ));?></span> <a href="tel:<?php echo (get_post_meta( get_the_id(), 'phone_no', true ));?>"><?php echo (get_post_meta( get_the_id(), 'phone_no', true ));?></a></li><?php } ?>
                        </ul>
                        <?php } ?>
                       	<?php if(get_post_meta( get_the_id(), 'social_profile', true )){ ?>
                        <ul class="social-links clearfix">
                            <?php echo (get_post_meta( get_the_id(), 'social_profile', true ));?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-details end -->


<?php endwhile; ?>

<?php get_footer(); ?>