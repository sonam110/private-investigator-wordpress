<?php
$options = insighteye_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Dark Logo Settings
$dark_logo = $options->get( 'dark_logo' );
$dark_logo_dimension = $options->get( 'dark_logo_dimension' );

//Light Logo Settings
$light_logo = $options->get( 'light_logo' );
$light_logo_dimension = $options->get( 'light_logo_dimension' );

//Mobile Logo Settings
$mobile_logo = $options->get( 'mobile_logo' );
$mobile_logo_dimension = $options->get( 'mobile_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

    
   		<!-- main header -->
        <header class="main-header">
            <?php if($options->get('show_header_topbar_v4')){ ?>
            <!-- header-top -->
            <div class="header-top">
                <div class="outer-container">
                    <div class="top-inner">
                        <ul class="info-list clearfix">
                        	<?php if($options->get('show_header_email_v4')) { ?>
                            <li><i class="icon-1 gradient-color"></i><a href="mailto:<?php echo esc_attr($options->get('header_email_v4'), true); ?>"><?php echo wp_kses($options->get('header_email_v4'), true); ?></a></li>
                            <?php } ?>
							<?php if($options->get('show_header_address_v4')) { ?>
                            <li><i class="icon-3 gradient-color"></i><?php echo wp_kses($options->get('header_address_v4'), true); ?></li>
                        	<?php } ?>
                        </ul>
                        <div class="top-right">
                        	<?php if( $options->get('show_header_login_v4') ){ ?>
                            <div class="login-box"><a href="<?php echo esc_url($options->get('login_link_v4')); ?>"><i class="icon-4 gradient-color"></i> <?php echo wp_kses($options->get('login_title_v4'), true); ?></a></div>
                            <?php } ?>
							<?php if( $options->get('show_header_social_icon_v4') ){ ?>
                            <ul class="social-links clearfix">
                                <?php echo wp_kses($options->get('header_social_icon_v4'), true); ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-1.png);"></div>
                        <div class="menu-area">
                            <div class="logo-box">
                                <figure class="logo"><?php echo insighteye_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
                            </div>
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
										<?php wp_nav_menu( array( 'theme_location' => 'onepage_menu', 'container_id' => 'navbar-collapse-1',
                                            'container_class'=>'navbar-collapse collapse navbar-right',
                                            'menu_class'=>'nav navbar-nav',
                                            'fallback_cb'=>false,
                                            'items_wrap' => '%3$s',
                                            'container'=>false,
                                            'depth'=>'3',
                                            'walker'=> new Bootstrap_walker()
                                        )); ?>
                                    </ul>  
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <?php if( $options->get('show_header_phone_no_v4') ){ ?>
                            <div class="support-box">
                                <div class="icon-box gradient-color"><i class="icon-2"></i></div>
                                <a href="tel:<?php echo esc_attr($options->get('phone_no_v4'), true); ?>"><?php echo wp_kses($options->get('phone_no_v4'), true); ?></a>
                            </div>
                            <?php } ?>
                            <?php if( $options->get( 'show_button_v4' )){ ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url($options->get('btn_link_v4')); ?>" class="theme-btn btn-one"><span><?php echo wp_kses($options->get('btn_title_v4'), true); ?></span></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="menu-area">
                            <div class="logo-box">
                                <figure class="logo"><?php echo insighteye_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
                            </div>
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <?php if( $options->get('show_header_phone_no_v4') ){ ?>
                            <div class="support-box">
                                <div class="icon-box gradient-color"><i class="icon-2"></i></div>
                                <a href="tel:<?php echo esc_attr($options->get('phone_no_v4'), true); ?>"><?php echo wp_kses($options->get('phone_no_v4'), true); ?></a>
                            </div>
                            <?php } ?>
                            <?php if( $options->get( 'show_button_v4' )){ ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url($options->get('btn_link_v4')); ?>" class="theme-btn btn-one"><span><?php echo wp_kses($options->get('btn_title_v4'), true); ?></span></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->
        
		<?php get_template_part('templates/header/mobile_settings'); ?>