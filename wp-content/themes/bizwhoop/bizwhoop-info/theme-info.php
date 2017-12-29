<?php
/**
 * Welcome Screen Class
 */
class bizwhoop_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'bizwhoop_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'bizwhoop_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'bizwhoop_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'bizwhoop_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'bizwhoop_info_screen', array( $this, 'bizwhoop_getting_started' ), 	    10 );
		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_bizwhoop_dismiss_required_action', array( $this, 'bizwhoop_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_bizwhoop_dismiss_required_action', array($this, 'bizwhoop_dismiss_required_action_callback') );

	}

	public function bizwhoop_register_menu() {
		add_theme_page( 'bizwhoop Theme', 'Bizwhoop Theme', 'activate_plugins', 'bizwhoop-info', array( $this, 'bizwhoop_welcome_screen' ) );
	}

	public function bizwhoop_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'bizwhoop_admin_notice' ), 99 );
			add_action( 'admin_notices', array( $this, 'bizwhoop_admin_video_notice' ), 99 );
			add_action( 'admin_notices', array( $this, 'bizwhoop_admin_import_notice' ), 99 );
			
		}
	}

	/**
	 * Load welcome screen css and javascript
	 * @sfunctionse  1.8.2.4
	 */
	public function bizwhoop_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_bizwhoop-info' == $hook_suffix ) {
			
			
			wp_enqueue_style( 'bizwhoop-info-css', get_template_directory_uri() . '/bizwhoop-info/css/bootstrap.css' );
			
			wp_enqueue_style( 'bizwhoop-info-screen-css', get_template_directory_uri() . '/bizwhoop-info/css/welcome.css' );

			global $bizwhoop_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('bizwhoop_show_required_actions') ):
				$bizwhoop_show_required_actions = get_option('bizwhoop_show_required_actions');
			else:
				$bizwhoop_show_required_actions = array();
			endif;

			if( !empty($bizwhoop_required_actions) ):
				foreach( $bizwhoop_required_actions as $bizwhoop_required_action_value ):
					if(( !isset( $bizwhoop_required_action_value['check'] ) || ( isset( $bizwhoop_required_action_value['check'] ) && ( $bizwhoop_required_action_value['check'] == false ) ) ) && ((isset($bizwhoop_show_required_actions[$bizwhoop_required_action_value['id']]) && ($bizwhoop_show_required_actions[$bizwhoop_required_action_value['id']] == true)) || !isset($bizwhoop_show_required_actions[$bizwhoop_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'bizwhoop-info-screen-js', 'bizwhoopLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','bizwhoop' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @sfunctionse  1.8.2.4
	 */
	public function bizwhoop_scripts_for_customizer() {

		wp_enqueue_style( 'bizwhoop-info-screen-customizer-css', get_template_directory_uri() . '/bizwhoop-info/css/welcome_customizer.css' );
		global $bizwhoop_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('bizwhoop_show_required_actions') ):
			$bizwhoop_show_required_actions = get_option('bizwhoop_show_required_actions');
		else:
			$bizwhoop_show_required_actions = array();
		endif;

		if( !empty($bizwhoop_required_actions) ):
			foreach( $bizwhoop_required_actions as $bizwhoop_required_action_value ):
				if(( !isset( $bizwhoop_required_action_value['check'] ) || ( isset( $bizwhoop_required_action_value['check'] ) && ( $bizwhoop_required_action_value['check'] == false ) ) ) && ((isset($bizwhoop_show_required_actions[$bizwhoop_required_action_value['id']]) && ($bizwhoop_show_required_actions[$bizwhoop_required_action_value['id']] == true)) || !isset($bizwhoop_show_required_actions[$bizwhoop_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'bizwhoop-info-screen-customizer-js', 'bizwhoopLiteWelcomeScreenObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=bizwhoop-info#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','bizwhoop'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @sfunctionse 1.8.2.4
	 */
	public function bizwhoop_dismiss_required_action_callback() {

		global $bizwhoop_required_actions;

		$bizwhoop_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $bizwhoop_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($bizwhoop_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('bizwhoop_show_required_actions') ):

				$bizwhoop_show_required_actions = get_option('bizwhoop_show_required_actions');

				$bizwhoop_show_required_actions[$bizwhoop_dismiss_id] = false;

				update_option( 'bizwhoop_show_required_actions',$bizwhoop_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$bizwhoop_show_required_actions_new = array();

				if( !empty($bizwhoop_required_actions) ):

					foreach( $bizwhoop_required_actions as $bizwhoop_required_action ):

						if( $bizwhoop_required_action['id'] == $bizwhoop_dismiss_id ):
							$bizwhoop_show_required_actions_new[$bizwhoop_required_action['id']] = false;
						else:
							$bizwhoop_show_required_actions_new[$bizwhoop_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'bizwhoop_show_required_actions', $bizwhoop_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @sfunctionse 1.8.2.4
	 */
	public function bizwhoop_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<ul class="bizwhoop-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'How To Create Homepage','bizwhoop'); ?></a></li>
			
		</ul>
		</div>
		</div>
		</div>

		<div class="bizwhoop-tab-content">

			<?php do_action( 'bizwhoop_info_screen' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 *
	 */
	public function bizwhoop_getting_started() {
		require_once( get_template_directory() . '/bizwhoop-info/sections/homepage.php' );
	}

}

$GLOBALS['bizwhoop_screen'] = new bizwhoop_screen();