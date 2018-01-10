<?php
function shopbiz_homepage_setting( $wp_customize ) { 

	/* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'shopbiz' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }	


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	//callout settings
    class shopbiz_Customize_contact_color_Control extends WP_Customize_Control {

        public $type = 'alphacolor';
        //public $palette = '#3FADD7,#555555,#666666, #F5f5f5,#333333,#404040,#2B4267';
        public $palette = true;
        public $default = '#3FADD7';

        protected function render() {
            $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
            $class = 'customize-control customize-control-' . $this->type; ?>
	        <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
	        	<?php $this->render_content(); ?>
	        </li>
        <?php }

        public function render_content() { ?>
	        <label> 
	        	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        	<input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value() ); ?>" class="pluto-color-control" <?php $this->link(); ?>  />
	        </label>
        <?php }
        }

    //menu prize settings
        class shopbiz_Customize_Color_Control extends WP_Customize_Control {

            public $type = 'alphacolor';
        //public $palette = '#3FADD7,#555555,#666666, #F5f5f5,#333333,#404040,#2B4267';
            public $palette = true;
            public $default = '#3FADD7';

            protected function render() {
                $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
                $class = 'customize-control customize-control-' . $this->type; ?>
		        <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
		            <?php $this->render_content(); ?>
		        </li>
        <?php }

        public function render_content() { ?>
	        <label> 
	        	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	          	<input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value() ); ?>" class="pluto-color-control" <?php $this->link(); ?>  />
	        </label>
        <?php }
            }
            
            $wp_customize->add_panel( 'homepage_setting', array(
                'priority'       => 450,
                'capability'     => 'edit_theme_options',
                'title'      => __('Homepage Settings', 'shopbiz'),
				'description' => __('If you want homepage like slider, service, callout, news. Firstly create a page and assign homepage template then set your homepage using reading setting (Theme Dashboard >> Settings >> Reading), Click a static page (select below) and select your frontPage template like homePage template and set your posts blog page. Then click save changes','shopbiz'),
            ) );

            /* --------------------------------------
            =========================================
            Slider Section
            =========================================
            -----------------------------------------*/ 
            $wp_customize->add_section(
                'shopbiz_slider_section_settings', array(
                'title' => __('Slider Setting','shopbiz'),
                'panel'  => 'homepage_setting',
            ) );
			
			
			//Enable service
			$wp_customize->add_setting(
		    	'shopbiz_slider_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_slider_enable', array(
		    	'label'   => __('Enable Slider Section','shopbiz'),
		    	'section' => 'shopbiz_slider_section_settings',
		    	'type' => 'checkbox',
		    ) );
			
			//Select Post One
			$wp_customize->add_setting('slider_post_one',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('slider_post_one',array(
				'label' => __('Select Post One','shopbiz'),
				'section'=>'shopbiz_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			//Select Post Two
			$wp_customize->add_setting('slider_post_two',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('slider_post_two',array(
				'label' => __('Select Post Two','shopbiz'),
				'section'=>'shopbiz_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			//Select Post Three
			$wp_customize->add_setting('slider_post_three',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('slider_post_three',array(
				'label' => __('Select Post Three','shopbiz'),
				'section'=>'shopbiz_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			

			/* --------------------------------------
		    =========================================
		    Service Section
		    =========================================
		    -----------------------------------------*/  
		    // add section to manage Services
		    $wp_customize->add_section(
		        'shopbiz_service_section_settings', array(
		        'title' => __('Service Setting','shopbiz'),
		        'panel'  => 'homepage_setting',
		    ) );
			
			
			//Enable service
			$wp_customize->add_setting(
		    	'shopbiz_service_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_service_enable', array(
		    	'label'   => __('Enable Service Section','shopbiz'),
		    	'section' => 'shopbiz_service_section_settings',
		    	'type' => 'checkbox',
		    ) );

            //Service Title setting
		   	$wp_customize->add_setting(
                'shopbiz_service_title', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
            ) );	
            $wp_customize->add_control( 
            	'shopbiz_service_title',array(
                'label'   => __('Service Title','shopbiz'),
                'section' => 'shopbiz_service_section_settings',
                'type' => 'text',
            ) );

            //Service SubTitle setting
            $wp_customize->add_setting(
                'shopbiz_service_subtitle', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
            ) );  
            $wp_customize->add_control( 'shopbiz_service_subtitle', array(
                'label'   => __('Service Subtitle','shopbiz'),
                'section' => 'shopbiz_service_section_settings',
                'type' => 'textarea',
            ) );

		    /* --------------------------------------
		    =========================================
		    Callout Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Callout
		    $wp_customize->add_section(
		    	'shopbiz_callout_section_settings', array(
		        'title' => __('Callout Setting','shopbiz'),
		        'panel'  => 'homepage_setting',
		    ) );
			
			
			//Enable contact
			$wp_customize->add_setting(
		    	'shopbiz_callout_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_enable', array(
		    	'label'   => __('Enable Callout Section','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );
			

		    //Callout Background image
		    $wp_customize->add_setting( 
		    	'shopbiz_callout_background', array(
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
		    	'shopbiz_callout_background', array(
		    	'label'    => __( 'Choose Background Image', 'shopbiz' ),
		    	'section'  => 'shopbiz_callout_section_settings',
		    	'settings' => 'shopbiz_callout_background',) 
		    ) );

		    //Callout Overlay 
		    $wp_customize->add_setting(
		    	'shopbiz_overlay_callout_color_control', 
				array('sanitize_callback' => 'esc_url_raw',)
		    );
		    $wp_customize->add_control( new shopbiz_Customize_contact_color_Control( $wp_customize,
		        'shopbiz_overlay_callout_color_control', array(
		        'label'    => 'Overlay Color',
		        'palette' => true,
		        'section'  => 'shopbiz_callout_section_settings')
		    ) );

		    // Callout Title Setting
		    $wp_customize->add_setting(
		    	'shopbiz_callout_title', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_title', array(
		    	'label'   => __('Callout Title','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'text',
		    ) );	

			// Callout Description Setting	    
		    $wp_customize->add_setting(
		    	'shopbiz_callout_description', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_description', array(
		    	'label'   => __('Callout Description','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'textarea',
		    ) );	

		    // Callout Button One Label Setting	 
		    $wp_customize->add_setting(
		    	'shopbiz_callout_button_one_label', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_button_one_label', array(
		    	'label'   => __('Button One Title','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button One Link Setting	
		    $wp_customize->add_setting(
		    	'shopbiz_callout_button_one_link', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_button_one_link',array(
		    	'label'   => __('Button One URL','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button One Target Setting	
		    $wp_customize->add_setting(
		    	'shopbiz_callout_button_one_target', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_button_one_target',array(
		    	'label'   => __('Open Link New window','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );

		    //Callout Button Two Label Setting	
		    $wp_customize->add_setting(
		    	'shopbiz_callout_button_two_label', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_button_two_label', array(
		    	'label'   => __('Button Two Title','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button Two Link Setting
		    $wp_customize->add_setting(
		    	'shopbiz_callout_button_two_link', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_button_two_link', array(
		    	'label'   => __('Button Two URL','shopbiz'),
		    	'type' => 'text',
		    	'section' => 'shopbiz_callout_section_settings',
		    ) );	

		    //Callout Button Two Target Setting
		    $wp_customize->add_setting(
		    	'shopbiz_callout_button_two_target', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_callout_button_two_target', array(
		    	'label'   => __('Open Link New window','shopbiz'),
		    	'section' => 'shopbiz_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );

		    
		    /* --------------------------------------
		    =========================================
		    Latest News Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Latest News
		    $wp_customize->add_section(
		    	'news_section_settings', array(
		        'title' => __('News & Events Setting','shopbiz'),
		        'panel'  => 'homepage_setting'
		    ) );

			//Enable news
			$wp_customize->add_setting(
		    	'shopbiz_news_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_news_enable', array(
		    	'label'   => __('Enable News Section','shopbiz'),
		    	'section' => 'news_section_settings',
		    	'type' => 'checkbox',
		    ) );
			
		    //Latest News Background Image
		    $wp_customize->add_setting( 
		    	'news_background', array(
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
		    	'news_background', array(
		    	'label'    => __( 'Choose Background Image', 'shopbiz' ),
		    	'section'  => 'news_section_settings',
		    	'settings' => 'news_background', ) 
		    ) );

		    //Latest News Overlay Image
		    $wp_customize->add_setting(
		    	'news_section_color',array(
		    	'default' => '#f5f5f5',
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new shopbiz_Customize_Color_Control( $wp_customize,
		        'news_section_color', array(
		        'label'    => 'Overlay Color',
		        'palette' => true,
		        'section'  => 'news_section_settings')
		    ) );

            // hide meta content
            $wp_customize->add_setting(
                'disable_news_meta', array(
                'default' => 'false',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control(
                'disable_news_meta', array(
                'label' => __('Hide/Show Blog Meta:- Like author name,categories', 'shopbiz'),
                'description'   => __('Hide / Show Blog Meta:- Like author name,categories', 'shopbiz'),
                'section' => 'news_section_settings',
                'type' => 'radio',
                'choices' => array('true'=>'On','false'=>'Off'),
            ) );

		    // Latest News Title Setting
		    $wp_customize->add_setting(
		    	'shopbiz_news_title', array(
		        'default' => '',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopbiz_news_title',array(
		    	'label'   => __('Latest News Title','shopbiz'),
		    	'section' => 'news_section_settings',
		    	'type' => 'text',
		    ) );

		    // Latest News Subtitle Setting
		    $wp_customize->add_setting(
		    	'shopbiz_news_subtitle', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopbiz_homepage_title_sanitize_text',
		    ) );  
		    $wp_customize->add_control( 
		    	'shopbiz_news_subtitle',array(
		    	'label'   => __('Latest News Subtitle','shopbiz'),
		    	'section' => 'news_section_settings',
		    	'type' => 'textarea',
		    ) );	

		   
			/* --------------------------------------
		    =========================================
		    Contact Section
		    =========================================
		    -----------------------------------------*/
		    //Contact settings
		    $wp_customize->add_section(
		    	'shopbiz_contact_section_settings', array(
		        'title' => __('Contact Setting','shopbiz'),
		        'panel'  => 'homepage_setting',
		    ) );
			
			
	function shopbiz_pro_version_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	function shopbiz_homepage_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	
	function shopbiz_homepage_title_sanitize_text ( $input ) {

	return wp_kses_post( force_balance_tags( $input ) );

	}		
}

add_action( 'customize_register', 'shopbiz_homepage_setting' );
?>
