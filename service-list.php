<?php
/**
 * Plugin Name:       Service List
 * Plugin URI:        https://still-garden-44769.herokuapp.com
 * Description:       Service List.
 * Version:           1.0
 * Requires at least: 5.2
 * Author:            Vijay Rathod
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       #
 * Text Domain:       service-list
 * Domain Path:       /languages
 */
 
 /*
 * Exit if accessed directly
 */
if (!defined('ABSPATH')) {
    exit;
}
define('SL_TEXTDOMAIN', 'service-list');
define('SL_DIR', plugin_dir_url( __FILE__ ));

/*
 *Create a class called "Service_List" if it doesn't already exist
 */
if ( !class_exists( 'Service_List' ) ) {

	Class Service_List{
		
		public function __construct() {
			add_action('init', array($this, 'activate_myplugin'));
			add_action( 'admin_menu', array($this, 'service_list_menu'),100);
			add_action('wp_enqueue_scripts', array($this, 'service_list_front_assets'));
			add_shortcode('service_list', array($this, 'view_service_list'));
			register_activation_hook( __FILE__, array($this, 'activate_myplugin' ));
			register_uninstall_hook( __FILE__, array($this, 'my_plugin_uninstall' ));
			
			add_action( 'add_meta_boxes', array($this,'hcf_register_meta_boxes' ));
			add_action( 'save_post', array($this, 'hcf_save_meta_box' ));
		}
		function my_plugin_uninstall() {
            unregister_post_type( 'servicelist' );
        }
		public function service_list_menu(){
			add_menu_page( 'Service List', 'Service List', 'manage_options', 'service-list', 'Service_List', 'dashicons-admin-generic' );	
			//add_submenu_page("range-slider", "Set Price", "Set Price", 0, "range-slider-price", "range_slider_submenu");
			/**
			*@return html Display
			*/
			function Service_List(){
				include_once('includes/service-list-shortcode.php');
			}
		}
		function activate_myplugin() {
            include_once('install/add-service-post.php');
		}
		function service_list_front_assets() {
			wp_enqueue_style( 'custom-style', SL_DIR. '/assets/front/css/style.css',array());
			wp_enqueue_style( 'owl-carousel', SL_DIR. '/assets/front/css/owl.carousel.min.css',array());
			wp_enqueue_style( 'owl-theme', SL_DIR. '/assets/front/css/owl.theme.default.min.css',array());
			wp_enqueue_script( 'jquery-min', SL_DIR. '/assets/front/js/jquery.min.js',array());
			wp_enqueue_script( 'owl-carousel-min', SL_DIR. '/assets/front/js/owl.carousel.min.js',array());
		}
		/*
		 *@ Add table in database
		*/
		public function service_list() {
			include_once('includes/add-service-post.php');
		}		
		function view_service_list(  ) {
			include_once('includes/service-view-slider.php');
		}
		
		/**
		 * Register meta boxes.
		 */
		function hcf_register_meta_boxes() {
			add_meta_box( 'hcf-1', __( 'Button Link', 'hcf' ), 'hcf_display_callback', 'service' );
			
			/**
			 * Meta box display callback.
			 *
			 * @param WP_Post $post Current post object.
			 */
			function hcf_display_callback( $service ) {
				include_once('includes/add-field-post.php');
			}	
		}
		
		/**
		 * Save meta box content.
		 *
		 * @param int $post_id Post ID
		 */
		function hcf_save_meta_box( $post_id ) {
			include_once('includes/metabox-save-value.php');
		}
	}	
}
/*
 * Created new object of the Service_List.
 */
new Service_List();