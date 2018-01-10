<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package bizwhoop
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div class="wrapper">
<!--
<?php esc_html_e( 'Skip to content', 'bizwhoop' ); ?>
<div class="wrapper">
<header class="bizwhoop-trhead">
	<!--==================== Header ====================-->
  <div class="bizwhoop-main-nav" style="display: none;">
      <nav class="navbar navbar-default navbar-wp">
        <div class="container">
          <div class="navbar-header">
            <!-- Logo -->
            <?php
            if(has_custom_logo())
            {
            // Display the Custom Logo
            the_custom_logo();
            }
             else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?>
			<br>
            <span class="site-description"><?php echo  get_bloginfo( 'description', 'display' ); ?></span>   
            </a>      
            <?php } ?>
            <!-- Logo -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#wp-navbar"> <span class="sr-only">
			<?php echo 'Toggle Navigation'; ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
        <!-- /navbar-toggle --> 
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="wp-navbar">
         <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'bizwhoop_custom_navwalker::fallback' , 'walker' => new bizwhoop_custom_navwalker() ) ); ?>
        </div>
        <!-- /Navigation --> 
      </div>
    </nav>
  </div>
</header>
<!-- #masthead --> 


<header class="bizwhoop-headwidget"> 
  <!--==================== TOP BAR ====================-->
  <div class="bizwhoop-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
         <ul class="info-left">
            <?php 
              $bizwhoop_head_info_one = get_theme_mod('bizwhoop_head_info_one','<a><i class="fa fa-clock-o "></i>Open-Hours:10 am to 7pm</a>','bizwhoop');
              $bizwhoop_head_info_two = get_theme_mod('bizwhoop_head_info_two','<a href="mailto:info@themeansar.com" title="Mail Me"><i class="fa fa-envelope"></i> info@themeansar.com</a>','bizwhoop');
            ?>
            <li><?php echo $bizwhoop_head_info_one; ?></li>
            <li><?php echo $bizwhoop_head_info_two; ?></li>
          </ul>
        </div>
        <div class="col-md-6 col-xs-12">
        <?php if ( has_nav_menu( 'social' ) ) : ?>
          <nav class="bizwhoop-social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'bizwhoop' ); ?>">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'social',
                'menu_class'     => 'social-links-menu info-right',
                'depth'          => 1,
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>' . bizwhoop_include_svg_icons( array( 'icon' => 'chain' ) ),
              ) );
            ?>
          </nav><!-- .social-navigation -->
          <?php endif; ?>
       
          </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="bizwhoop-nav-widget-area">
      <div class="container">
      <div class="row">
          <div class="col-md-3 col-sm-4 text-center-xs">
           <div class="navbar-header">
            <!-- Logo -->
            <?php
            if(has_custom_logo())
            {
            // Display the Custom Logo
            the_custom_logo();
            }
             else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?>
      <br>
            <span class="site-description"><?php echo  get_bloginfo( 'description', 'display' ); ?></span>   
            </a>      
            <?php } ?>
            <!-- Logo -->
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="header-widget">
              <div class="col-md-3 col-sm-3 col-xs-6 hidden-sm hidden-xs">
                <div class="bizwhoop-header-box wow animated flipInX">
                  <div class="bizwhoop-header-box-icon">
                    <?php $bizwhoop_header_widget_one_icon = get_theme_mod('bizwhoop_header_widget_one_icon',__('fa-map-marker','bizwhoop'));
                    if( !empty($bizwhoop_header_widget_one_icon) ):
                      echo '<i class="fa '.$bizwhoop_header_widget_one_icon.'">'.'</i>';
                    endif; ?>
                   </div>
                  <div class="bizwhoop-header-box-info">
                    <?php $bizwhoop_header_widget_one_title = get_theme_mod('bizwhoop_header_widget_one_title',__('1240 Park Avenue','bizwhoop')); 
                    if( !empty($bizwhoop_header_widget_one_title) ):
                      echo '<h4>'.$bizwhoop_header_widget_one_title.'</h4>';
                    endif; ?>
                    <?php $bizwhoop_header_widget_one_description = get_theme_mod('bizwhoop_header_widget_one_description',__('NYC, USA 256323','bizwhoop'));
                    if( !empty($bizwhoop_header_widget_one_description) ):
                      echo '<p>'.$bizwhoop_header_widget_one_description.'</p>';
                    endif; ?> 
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 hidden-sm hidden-xs">
                <div class="bizwhoop-header-box">
                  <div class="bizwhoop-header-box-icon">
                    <?php $bizwhoop_header_widget_two_icon = get_theme_mod('bizwhoop_header_widget_two_icon',__('fa-clock-o','bizwhoop'));
                    if( !empty($bizwhoop_header_widget_two_icon) ):
                      echo '<i class="fa '.$bizwhoop_header_widget_two_icon.'">'.'</i>';
                    endif; ?>
                   </div>
                  <div class="bizwhoop-header-box-info">
                    <?php $bizwhoop_header_widget_two_title = get_theme_mod('bizwhoop_header_widget_two_title',__('7:30 AM - 7:30 PM','bizwhoop')); 
                    if( !empty($bizwhoop_header_widget_two_title) ):
                      echo '<h4>'.$bizwhoop_header_widget_two_title.'</h4>';
                    endif; ?>
                    <?php $bizwhoop_header_widget_two_description = get_theme_mod('bizwhoop_header_widget_two_description',__('Monday to Saturday','bizwhoop'));
                    if( !empty($bizwhoop_header_widget_two_description) ):
                      echo '<p>'.$bizwhoop_header_widget_two_description.'</p>';
                    endif; ?> 
                  </div>
                </div>
              </div>
			  <div class="col-md-3 col-sm-6 col-xs-6 hidden-sm hidden-xs">
                <div class="bizwhoop-header-box">
                  <div class="bizwhoop-header-box-icon">
                    <?php $bizwhoop_header_widget_three_icon = get_theme_mod('bizwhoop_header_widget_three_icon',__('fa-phone','bizwhoop'));
                    if( !empty($bizwhoop_header_widget_three_icon) ):
                      echo '<i class="fa '.$bizwhoop_header_widget_three_icon.'">'.'</i>';
                    endif; ?>
                   </div>
                  <div class="bizwhoop-header-box-info">
                    <?php $bizwhoop_header_widget_three_title = get_theme_mod('bizwhoop_header_widget_three_title',__('+ 007 548 58','bizwhoop')); 
                    if( !empty($bizwhoop_header_widget_three_title) ):
                      echo '<h4>'.$bizwhoop_header_widget_three_title.'</h4>';
                    endif; ?>
                    <?php $bizwhoop_header_widget_three_description = get_theme_mod('bizwhoop_header_widget_three_description',__('Hot Line Number','bizwhoop'));
                    if( !empty($bizwhoop_header_widget_three_description) ):
                      echo '<p>'.$bizwhoop_header_widget_three_description.'</p>';
                    endif; ?> 
                  </div>
                </div>
              </div>
              
              <div class="col-md-3 col-sm-6 col-xs-12 hidden-sm hidden-xs">
                <div class="bizwhoop-header-box wow animated flipInX text-right"> 
                  <?php $bizwhoop_header_widget_four_label = get_theme_mod('bizwhoop_header_widget_four_label',__('Get Quote','bizwhoop')); 
                  $bizwhoop_header_widget_four_link = get_theme_mod('bizwhoop_header_widget_four_link',__('#','bizwhoop'));
                  $bizwhoop_header_widget_four_target = get_theme_mod('bizwhoop_header_widget_four_target',__('true','bizwhoop')); 

                    if( !empty($bizwhoop_header_widget_four_label) ):?>
                      <a href="<?php echo $bizwhoop_header_widget_four_link; ?>" <?php if( $bizwhoop_header_widget_four_target ==true) { echo "target='_blank'"; } ?> class="btn btn-theme"><?php echo $bizwhoop_header_widget_four_label; ?></a> 
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div></div>

    <div class="container"> 
    <div class="bizwhoop-menu-full">
      <nav class="navbar navbar-default navbar-static-top navbar-wp">
          <!-- navbar-toggle -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <!-- /navbar-toggle --> 
          <!-- Navigation -->
          
          <div class="collapse navbar-collapse" id="navbar-wp">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'bizwhoop_custom_navwalker::fallback' , 'walker' => new bizwhoop_custom_navwalker() ) ); ?>
            <!-- Right nav -->
            
            <!-- /Right nav -->
          </div>

          <!-- /Navigation --> 
      </nav>
      </div>
  </div>
</header>
<!-- #masthead --> 



