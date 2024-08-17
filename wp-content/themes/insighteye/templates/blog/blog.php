<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage INSIGHTEYE
 * @author     Template Path
 * @version    1.0
 */

$options = insighteye_WSH()->option();
$allowed_tags = wp_kses_allowed_html('post');

?>

<div <?php post_class(); ?>>
	
    <div class="news-block-one">
        <div class="inner-box">
        	<?php if(has_post_thumbnail()){ ?>
            <figure class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('full'); ?></a></figure>
            <?php } ?>
            <div class="lower-content">
                <div class="date"><?php echo get_the_date('d'); ?> <span><?php echo get_the_date('M'); ?></span></div>
                <ul class="post-info mb_25 clearfix">
                    <?php if(! $options->get('blog_post_author')){ ?><li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.svg" alt="<?php esc_attr_e('Awesome Image', 'insighteye'); ?>"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li><?php } ?>
                    <?php if(! $options->get('blog_post_comments')){ ?><li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-5.svg" alt="<?php esc_attr_e('Awesome Image', 'insighteye'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'insighteye'), true), wp_kses(__('01 Comment' , 'insighteye'), true), wp_kses(__('0% Comments' , 'insighteye'), true)); ?></li><?php } ?>
                </ul>
                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <div class="link">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span><?php esc_html_e('Read More', 'insighteye'); ?></span></a>
                </div>
            </div>
        </div>
    </div>
    
</div>