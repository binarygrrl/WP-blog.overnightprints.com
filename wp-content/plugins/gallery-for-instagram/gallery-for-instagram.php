<?php
/**
 * Plugin Name: Gallery For Instagram
 * Version: 1.4.5
 * Description: Instagram Gallery is a Wordpress plugin designed to provide a beautiful and highly customized Instagram Gallery with amazing and inovative effects.
 * Author: Weblizar
 * Author URI: https://weblizar.com/plugins/instagram-gallery-pro/
 * Plugin URI: https://weblizar.com/plugins/instagram-gallery-pro/
 */
 
/**
 * Constant Variable
 */
define("IMGF_TEXT_DOMAIN","IMGF_TEXT_DOMAIN" );
define("IMGF_PLUGIN_URL", plugin_dir_url(__FILE__));

add_action('plugins_loaded', 'IMGF_GetReadyTranslation');
function IMGF_GetReadyTranslation() {
	load_plugin_textdomain(IMGF_TEXT_DOMAIN, FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

// Apply default settings on activation
register_activation_hook( __FILE__, 'IMGF_DefaultSettingsPro' );
function IMGF_DefaultSettingsPro(){
    $DefaultSettingsProArray = serialize( array(
		'IMGF_Access_Id'          	=> "",
		'IMGF_Access_Token'         => "",
		'IMGF_Show_In_Gallery'      => "recent",
		
		'IMGF_Profile_Show'			=> "yes",
		'IMGF_Profile_bg_color'		=> "#147ebd",
		'IMGF_post_bg_color'		=> "#c9262e",
		'IMGF_Profile_text_color'	=> "#ffffff",
		'IMGF_P_Img_Border_Color'	=> "#ffffff",
		'IMGF_Profile_Image_Size'	=> "large",
		'IMGF_Button_bg_Color'  	=> "#c9262e",
		'IMGF_Button_Text_Color'   	=> "#ffffff",
		'IMGF_Show_Profile_Image'	=> "true",
		'IMGF_Show_Follow_Button'   => "true",
		'IMGF_Show_Post_count' 		=> "true",
		'IMGF_Show_Website_Link'	=> "true",
		'IMGF_Show_Bio'     		=> "true",
		
		'IMGF_Effect'          		=> "effect2",
		'IMGF_Effect_animation'     => "right_to_left",
		'IMGF_Color'         		=> "#147ebd",
		'IMGF_Hover_Text_Color'		=> "#ffffff",
		'IMGF_M_Hover_Text_Color'	=> "#000000",
		'IMGF_Hover_Text_Caps'		=> "yes",
		'IMGF_Show_Image_Label'     => "true",
		'IMGF_Show_Date'     		=> "true",
		'IMGF_Show_Like'     		=> "true",
		'IMGF_Show_Comment'     	=> "true",
        'IMGF_Gallery_Layout'      	=> "col-xs-12 col-sm-4 col-md-4 col-lg-4",
        'IMGF_Color_Opacity'		=> "yes",
        'IMGF_Font_Style'			=> "Arial",
		'IMGF_Image_Border'    		=> "yes",
		
		'IMGF_Image_Load_Count'		=> 6,
        'IMGF_Load_Button_Text'   	=> "Load More",
		'IMGF_Load_Button_Float'   	=> "center"
    ));
    add_option("IMGF_Settings", $DefaultSettingsProArray);	
}


function admin_content_IGF_144936() { 
	if(get_post_type()=="imgf_instagram") { ?>
		<style>
		.wlTBlock{
			background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?php echo IMGF_PLUGIN_URL.'/images/bg2.jpg'; ?>') no-repeat fixed;
			background-position: 50% 0 !important;
			padding: 27px 0 23px 0;
			margin-left: -20px;
			font-family: Myriad Pro ;
			cursor: pointer;
			text-align: center;
		}
		.wlTBlock .wlTBig{
			color: white;
			font-size: 30px;
			font-weight: bolder;
			padding: 0 0 15px 0;
		}
		.wlTBlock .wlTBig .dashicons{
			font-size: 40px;
			position: absolute;
			margin-left: -45px;
			margin-top: -10px;
		}
		.wlTBlock .WlTSmall{
			font-weight: bolder;
			color: white;
			font-size: 18px;
			padding: 0 0 15px 15px;
		}

		.wlTBlock a{
		text-decoration: none;
		}
		@media screen and ( max-width: 600px ) {
			.wlTBlock{ padding-top: 60px; margin-bottom: -50px; }
			.wlTBlock .WlTSmall { display: none; }
			
		}
		</style>
		<div class="wlTBlock ">
			<a href="http://weblizar.com/plugins/instagram-gallery-pro/" target="_new">
				<div class="wlTBig"><span class="dashicons dashicons-cart"></span>Get Pro version</div>
				<div class="WlTSmall">with PRO version you get more advanced functionality and even more flexibility in settings </div>
				</a>
		</div>
		<?php
	}
}
add_action('in_admin_header','admin_content_IGF_144936');



// Function To Remove Feature Image
function IMGF_remove_image_box() {
	remove_meta_box('postimagediv','imgf_instagram','side');
}
add_action('do_meta_boxes', 'IMGF_remove_image_box');


add_action('admin_menu' , 'IMGF_SettingsPage');
function IMGF_SettingsPage() {
    add_submenu_page('edit.php?post_type=imgf_instagram', __('Pro Screenshots', IMGF_TEXT_DOMAIN), __('Pro Screenshots', IMGF_TEXT_DOMAIN), 'administrator', 'IMGF-get-instagram-shortcode-pro', 'IMGF_get_instagram_shortcode_pro_page');
	add_submenu_page('edit.php?post_type=imgf_instagram', __('Help and Support', IMGF_TEXT_DOMAIN), __('Help and Support', IMGF_TEXT_DOMAIN), 'administrator', 'IMGF-help-page', 'IMGF_Help_and_Support_page');
	add_submenu_page('edit.php?post_type=imgf_instagram', __('Our Products', IMGF_TEXT_DOMAIN), __('Our Products', IMGF_TEXT_DOMAIN), 'administrator', 'IMGF-Our-Products-page', 'IMGF_Our_Products_page');
}

function IMGF_get_instagram_shortcode_pro_page() {
    //css
	wp_enqueue_style('imgf-font-awesome', IMGF_PLUGIN_URL.'css/font-awesome.css');
	wp_enqueue_style('imgf-pricing-table-css', IMGF_PLUGIN_URL.'css/pricing-table.css');
    wp_enqueue_style('bootstrap.min.css-1', IMGF_PLUGIN_URL.'css/bootstrap.css');
    require_once("get-instagram-gallery-pro.php");
}

function IMGF_Help_and_Support_page() {
	wp_enqueue_style('bootstrap.min.css-1', IMGF_PLUGIN_URL.'css/bootstrap.css');
    require_once("help_and_support.php");
}

function IMGF_Our_Products_page() {
	wp_enqueue_style('bootstrap.min.css', IMGF_PLUGIN_URL.'css/bootstrap.css');
    require_once("our_product.php");
}

/**
* Short Code Detach Function To UpLoad JS And CSS
*/  
function IMGF_ShortCodeDetect() {
    global $wp_query;
    $Posts = $wp_query->posts;
    $Pattern = get_shortcode_regex();
		
		/**   
         * css scripts
         */
		wp_enqueue_style('bootstrap.css', IMGF_PLUGIN_URL.'css/bootstrap.css');
		wp_enqueue_style('pongstagr.am.css', IMGF_PLUGIN_URL.'css/pongstagr.am.css');
		wp_enqueue_style('font-awesome.css', IMGF_PLUGIN_URL.'css/font-awesome.css');
		
		/**
         * js scripts
         */
		wp_enqueue_script('jquery');
		wp_enqueue_script('pongstagr.am.js', IMGF_PLUGIN_URL.'js/pongstagr.am.js', array('jquery'), '', true);
				
		/**
		 * Load Light Box 1 Nivobox JS CSS
		 */
		wp_enqueue_style('imgf-nivo-lightbox-min-css', IMGF_PLUGIN_URL.'lightbox/nivo/nivo-lightbox.min.css');
		wp_enqueue_script('imgf-nivo-lightbox-min-js', IMGF_PLUGIN_URL.'lightbox/nivo/nivo-lightbox.min.js',  array('jquery'), '', true);
			
        /**
         * Load Light Box 2  pretty photo JS CSS
         */  
		wp_enqueue_style('pretty-css', IMGF_PLUGIN_URL.'lightbox/prettyphoto/prettyPhoto.css');
		wp_enqueue_script('pretty-js', IMGF_PLUGIN_URL.'lightbox/prettyphoto/jquery.prettyPhoto.js', array('jquery'), '', true);
        
		/**
         * Load Light Box 3 Swipebox JS CSS
         */   
		wp_enqueue_style('swipe-css', IMGF_PLUGIN_URL.'lightbox/swipebox/swipebox.css');
		wp_enqueue_script('swipe-js', IMGF_PLUGIN_URL.'lightbox/swipebox/jquery.swipebox.min.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'IMGF_ShortCodeDetect' );
//add_filter( 'widget_text', 'do_shortcode' );

class IMGF {
    private static $instance;
	var $counter;

    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		$this->counter = 0;
        add_action('admin_print_scripts-post.php', array(&$this, 'imgf_admin_print_scripts'));
        add_action('admin_print_scripts-post-new.php', array(&$this, 'imgf_admin_print_scripts'));
        add_shortcode('imgfgallery', array(&$this, 'shortcode'));
        if (is_admin()) {
			add_action('init', array(&$this, 'InstagramMegaGalelryPro'), 1);
			add_action('add_meta_boxes', array(&$this, 'add_all_imgf_meta_boxes'));
			add_action('admin_init', array(&$this, 'add_all_imgf_meta_boxes'), 1);
			
			add_action('save_post', array(&$this, 'IMGF_settings_meta_save'), 9, 1);
		}
    }
	
	//Required JS & CSS
	public function imgf_admin_print_scripts() {
		if ( 'imgf_instagram' == $GLOBALS['post_type'] ) {		
					
			//color-picker css n js
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'imgf-color-picker-script', plugins_url('js/wl-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			
			//font awesome css
			wp_enqueue_style('font-awesome.css', IMGF_PLUGIN_URL.'css/font-awesome.css');
			
			wp_enqueue_script( 'imgf-media-upload-script', IMGF_PLUGIN_URL.'js/media-upload-script.js');
			
			//tool-tip js & css
			wp_enqueue_script('imgf-tool-tip-js',IMGF_PLUGIN_URL.'tooltip/jquery.darktooltip.min.js', array('jquery'));
			wp_enqueue_style('imgf-tool-tip-css', IMGF_PLUGIN_URL.'tooltip/darktooltip.min.css');
		}
	}
	
	// Register Custom Post Type
	public function InstagramMegaGalelryPro() {
		$labels = array(
			'name' => __('Instagram Gallery','IMGF_TEXT_DOMAIN' ),
			'singular_name' => __('Instagram Gallery','IMGF_TEXT_DOMAIN' ),
			'add_new' => __('Add New Instagram', 'IMGF_TEXT_DOMAIN' ),
			'add_new_item' => __('Add New Instagram', 'IMGF_TEXT_DOMAIN' ),
			'edit_item' => __('Edit Instagram', 'IMGF_TEXT_DOMAIN' ),
			'new_item' => __('New Instagram', 'IMGF_TEXT_DOMAIN' ),
			'view_item' => __('View Instagram', 'IMGF_TEXT_DOMAIN' ),
			'search_items' => __('Search Instagram', 'IMGF_TEXT_DOMAIN' ),
			'not_found' => __('No Instagram found', 'IMGF_TEXT_DOMAIN' ),
			'not_found_in_trash' => __('No Instagram found in Trash', 'IMGF_TEXT_DOMAIN' ),
			'parent_item_colon' => __('Parent Instagram:', 'IMGF_TEXT_DOMAIN' ),
			'all_items' => __('All Instagram', 'IMGF_TEXT_DOMAIN' ),
			'menu_name' => __('Instagram Gallery', 'IMGF_TEXT_DOMAIN' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title','thumbnail'),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-format-gallery',
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => false,
			'capability_type' => 'post'
		);

        register_post_type( 'imgf_instagram', $args );
        add_filter( 'manage_edit-imgf_instagram_columns', array(&$this, 'imgf_cpt_columns' )) ;
        add_action( 'manage_imgf_instagram_posts_custom_column', array(&$this, 'imgf_gallery_manage_columns' ), 10, 2 );
	}

	function imgf_cpt_columns( $columns ){
        $columns = array(
             'cb' => '<input type="checkbox" />'
            ,'title' => __( 'Instagram Gallery','IMGF_TEXT_DOMAIN' )
            ,'shortcode' => __( 'Instagram Gallery Shortcode','IMGF_TEXT_DOMAIN' )
            ,'date' => __( 'Date','IMGF_TEXT_DOMAIN' )
        );
        return $columns;
    }

	function imgf_gallery_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[IGF id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	
	public function add_all_imgf_meta_boxes() {
		add_meta_box( __('Instagram Setting', 'IMGF_TEXT_DOMAIN'), __('Instagram Setting', 'IMGF_TEXT_DOMAIN'), array(&$this, 'IMGF_aceess_setting_metabox_function'), 'imgf_instagram', 'normal', 'low' );
		add_meta_box( __('Instragram Profile Settings', 'IMGF_TEXT_DOMAIN'), __('Instragram Profile Settings', 'IMGF_TEXT_DOMAIN'), array(&$this, 'IMGF_Profile_setting_metabox_function'), 'imgf_instagram', 'normal', 'low' );
		add_meta_box( __('Instragram Gallery Settings', 'IMGF_TEXT_DOMAIN'), __('Instragram Gallery Settings', 'IMGF_TEXT_DOMAIN'), array(&$this, 'IMGF_settings_meta_box_function'), 'imgf_instagram', 'normal', 'low');
		add_meta_box( __('Instragram Other Settings', 'IMGF_TEXT_DOMAIN'), __('Instragram Other Settings', 'IMGF_TEXT_DOMAIN'), array(&$this, 'IMGF_other_settings_metabox_function'), 'imgf_instagram', 'normal', 'low');
		add_meta_box ( __('Instagram Gallery Shortcode', 'IMGF_TEXT_DOMAIN'), __('Instagram Gallery Shortcode', 'IMGF_TEXT_DOMAIN'), array(&$this, 'IMGF_shotcode_meta_box_function'), 'imgf_instagram', 'side', 'low');
		
		// Rate Us Meta Box
		add_meta_box(__('Show us some love, Rate Us', 'IMGF_TEXT_DOMAIN') , __('Show us some love, Rate Us', 'IMGF_TEXT_DOMAIN'), array(&$this,'IMGF_Rate_us_meta_box_function'), 'imgf_instagram', 'side', 'low');
		// Upgrade To Pro Version Meta Box
		add_meta_box(__('Upgrade To Pro Version', 'IMGF_TEXT_DOMAIN') , __('Upgrade To Pro Version', 'IMGF_TEXT_DOMAIN'), array(&$this,'IMGF_upgrade_to_pro_function'), 'imgf_instagram', 'side', 'low');
		// Pro Features Meta Box
		add_meta_box(__('Pro Features', 'IMGF_TEXT_DOMAIN') , __('Pro Features', 'IMGF_TEXT_DOMAIN'), array(&$this,'IMGF_pro_features'), 'imgf_instagram', 'side', 'low');
	}

	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into gallery
	 */
	public function IMGF_aceess_setting_metabox_function($post) { 
	require_once('get-save-settings.php');
	?>
		<table class="form-table">
			<tbody>
				<?php _e('Get Your Instagram Client ID & Access Token ','IMGP_TEXT_DOMAIN')?><a href="https://weblizar.com/get-instagram-user-id-and-access-token/" target="_new"><?php _e('Click Here','IMGP_TEXT_DOMAIN')?></a> .
				<tr>
					<th scope="row"><label><?php _e('User Id','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<input type="text" id="IMGF_Access_Id" name="IMGF_Access_Id" class="" value="<?php echo $IMGF_Access_Id; ?>" style="width:80%">
						<p class="description">
							<?php _e('Enter Instagram User Id.','IMGF_TEXT_DOMAIN')?><br>
						</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label><?php _e('Access Token','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<input type="text" id="IMGF_Access_Token" name="IMGF_Access_Token" type="text" class="" value="<?php echo $IMGF_Access_Token; ?>" style="width:80%">
						<p class="description">
							<?php _e('Enter Instagram Access Token.','IMGF_TEXT_DOMAIN')?><br>
						</p>
					</td>
				</tr>
				
			</tbody>
		</table>	
        <?php
    }
	
	public function IMGF_Profile_setting_metabox_function($post) { 
	require('get-save-settings.php'); ?>
		<table class="form-table">
			<tbody>
				<!-- Hide & Show Profile -->
				<tr>
					<th scope="row"><label><?php _e('Show profile','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Profile_Show == "") $IMGF_Profile_Show = "yes"; ?>
						<input type="radio" name="IMGF_Profile_Show" id="IMGF_Profile_Show1" value="yes" <?php if($IMGF_Profile_Show == 'yes' ) { echo "checked"; } ?>> </i><?php _e(' yes','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Profile_Show" id="IMGF_Profile_Show2" value="no" <?php if($IMGF_Profile_Show == 'no' ) { echo "checked"; } ?>> <?php _e(' No','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select Yes or No for Hide & Show Profile.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p1" data-tooltip="#s1"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Profile Content Background Color -->
				<tr>
					<th scope="row"><label><?php _e('Profile Section Background Color','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Profile_bg_color == "") $IMGF_Profile_bg_color = "#147ebd"; ?>
						<input type="radio" name="IMGF_Profile_bg_color" id="IMGF_Profile_bg_color1" value="transparent" <?php if($IMGF_Profile_bg_color == 'transparent' ) { echo "checked"; } ?>><?php _e('None','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Profile_bg_color" id="IMGF_Profile_bg_color2" value="#147ebd" <?php if($IMGF_Profile_bg_color == '#147ebd' ) { echo "checked"; } ?>></i><?php _e('Blue','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Profile_bg_color" id="IMGF_Profile_bg_color3" value="#c9262e" <?php if($IMGF_Profile_bg_color == '#c9262e' ) { echo "checked"; } ?>><?php _e('Red','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Profile_bg_color" id="IMGF_Profile_bg_color4" value="#ffffff" <?php if($IMGF_Profile_bg_color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Profile_bg_color" id="IMGF_Profile_bg_color5" value="#000000" <?php if($IMGF_Profile_bg_color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select any given color to apply for Profile Section Background Color.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p2" data-tooltip="#s2"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Post Background Color -->
				<tr>
					<th scope="row"><label><?php _e('Post Count Background','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_post_bg_color == "") $IMGF_post_bg_color = "#c9262e"; ?>
						<input type="radio" name="IMGF_post_bg_color" id="IMGF_post_bg_color1" value="#147ebd" <?php if($IMGF_post_bg_color == '#147ebd' ) { echo "checked"; } ?>></i><?php _e('Blue','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_post_bg_color" id="IMGF_post_bg_color2" value="#c9262e" <?php if($IMGF_post_bg_color == '#c9262e' ) { echo "checked"; } ?>><?php _e('Red','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_post_bg_color" id="IMGF_post_bg_color3" value="#ffffff" <?php if($IMGF_post_bg_color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_post_bg_color" id="IMGF_post_bg_color4" value="#000000" <?php if($IMGF_post_bg_color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select any given color to apply for Post Count Background.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p3" data-tooltip="#s3"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Profile Text Color -->
				<tr>
					<th scope="row"><label><?php _e('Profile Text Color','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Profile_text_color == "") $IMGF_Profile_text_color = "#ffffff"; ?>
						<input type="radio" name="IMGF_Profile_text_color" id="IMGF_Profile_text_color1" value="#ffffff" <?php if($IMGF_Profile_text_color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Profile_text_color" id="IMGF_Profile_text_color2" value="#000000" <?php if($IMGF_Profile_text_color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select any given color to apply for Profile Text Color','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p4" data-tooltip="#s4"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Profile Image Border Color -->
				<tr>
					<th scope="row"><label><?php _e('Profile Image Border Color','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_P_Img_Border_Color == "") $IMGF_P_Img_Border_Color = "#c9262e"; ?>
						<input type="radio" name="IMGF_P_Img_Border_Color" id="IMGF_P_Img_Border_Color1" value="#147ebd" <?php if($IMGF_P_Img_Border_Color == '#147ebd' ) { echo "checked"; } ?>></i><?php _e('Blue','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_P_Img_Border_Color" id="IMGF_P_Img_Border_Color2" value="#c9262e" <?php if($IMGF_P_Img_Border_Color == '#c9262e' ) { echo "checked"; } ?>><?php _e('Red','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_P_Img_Border_Color" id="IMGF_P_Img_Border_Color3" value="#ffffff" <?php if($IMGF_P_Img_Border_Color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_P_Img_Border_Color" id="IMGF_P_Img_Border_Color4" value="#000000" <?php if($IMGF_P_Img_Border_Color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select any given color to apply for Profile Image Border Color.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p5" data-tooltip="#s5"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Profile Image Size -->
				<tr>
					<th scope="row"><label><?php _e('Profile Image Size','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Profile_Image_Size == "") $IMGF_Profile_Image_Size = "medium"; ?>
						<input type="radio" name="IMGF_Profile_Image_Size" id="IMGF_Profile_Image_Size1" value="medium" <?php if($IMGF_Profile_Image_Size == 'medium' ) { echo "checked"; } ?>><i class="fa fa-picture-o fa-lg"></i>&nbsp;  &nbsp;
						<input type="radio" name="IMGF_Profile_Image_Size" id="IMGF_Profile_Image_Size2" value="large" <?php if($IMGF_Profile_Image_Size == 'large' ) { echo "checked"; } ?>><i class="fa fa-picture-o fa-2x"></i>
						<p class="description">
							<?php _e('Select Profile Image Size.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p6" data-tooltip="#s6"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Button Background Color -->
				<tr>
					<th scope="row"><label><?php _e('Button Background Color','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Button_bg_Color == "") $IMGF_Button_bg_Color = "#c9262e"; ?>
						<input type="radio" name="IMGF_Button_bg_Color" id="IMGF_Button_bg_Color1" value="#147ebd" <?php if($IMGF_Button_bg_Color == '#147ebd' ) { echo "checked"; } ?>></i><?php _e('Blue','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Button_bg_Color" id="IMGF_Button_bg_Color2" value="#c9262e" <?php if($IMGF_Button_bg_Color == '#c9262e' ) { echo "checked"; } ?>><?php _e('Red','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Button_bg_Color" id="IMGF_Button_bg_Color3" value="#ffffff" <?php if($IMGF_Button_bg_Color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Button_bg_Color" id="IMGF_Button_bg_Color4" value="#000000" <?php if($IMGF_Button_bg_Color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select any given color to apply for Button Backgound Color.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p7" data-tooltip="#s7"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Button Text Color -->
				<tr>
					<th scope="row"><label><?php _e('Button Text Color','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Button_Text_Color == "") $IMGF_Button_Text_Color = "#ffffff"; ?>
						<input type="radio" name="IMGF_Button_Text_Color" id="IMGF_Button_Text_Color1" value="#ffffff" <?php if($IMGF_Button_Text_Color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
						<input type="radio" name="IMGF_Button_Text_Color" id="IMGF_Button_Text_Color2" value="#000000" <?php if($IMGF_Button_Text_Color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
						<p class="description">
							<?php _e('Select any given color to apply for Button Text Color.','IMGF_TEXT_DOMAIN')?>&nbsp;
							<a href="#" id="p8" data-tooltip="#s8"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Show Profile Image -->
				<tr>
					<th scope="row"><label><?php _e('Show Profile Image','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Show_Profile_Image == "") $IMGF_Show_Profile_Image = "true"; ?>
						<input type="radio" name="IMGF_Show_Profile_Image" id="IMGF_Show_Profile_Image1" value="true" <?php if($IMGF_Show_Profile_Image == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
						<input type="radio" name="IMGF_Show_Profile_Image" id="IMGF_Show_Profile_Image2" value="false" <?php if($IMGF_Show_Profile_Image == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
						<p class="description">
							<?php _e('Select Yes/No option to hide or show Profile Image.','IMGF_TEXT_DOMAIN')?>
							<a href="#" id="p9" data-tooltip="#s9"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Show Follow Button -->
				<tr>
					<th scope="row"><label><?php _e('Show Follow Button','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Show_Follow_Button == "") $IMGF_Show_Follow_Button = "true"; ?>
						<input type="radio" name="IMGF_Show_Follow_Button" id="IMGF_Show_Follow_Button1" value="true" <?php if($IMGF_Show_Follow_Button == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
						<input type="radio" name="IMGF_Show_Follow_Button" id="IMGF_Show_Follow_Button2" value="false" <?php if($IMGF_Show_Follow_Button == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
						<p class="description">
							<?php _e('Select Yes/No option to hide or show Follow Button.','IMGF_TEXT_DOMAIN')?>
							<a href="#" id="p10" data-tooltip="#s10"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Show Post Count -->
				<tr>
					<th scope="row"><label><?php _e('Show Post Count','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Show_Post_count == "") $IMGF_Show_Post_count = "true"; ?>
						<input type="radio" name="IMGF_Show_Post_count" id="IMGF_Show_Post_count1" value="true" <?php if($IMGF_Show_Post_count == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
						<input type="radio" name="IMGF_Show_Post_count" id="IMGF_Show_Post_count2" value="false" <?php if($IMGF_Show_Post_count == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
						<p class="description">
							<?php _e('Select Yes/No option to hide or show Post Count.','IMGF_TEXT_DOMAIN')?>
							<a href="#" id="p11" data-tooltip="#s11"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Show Website Link -->
				<tr>
					<th scope="row"><label><?php _e('Show Website Link','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Show_Website_Link == "") $IMGF_Show_Website_Link = "true"; ?>
						<input type="radio" name="IMGF_Show_Website_Link" id="IMGF_Show_Website_Link1" value="true" <?php if($IMGF_Show_Website_Link == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
						<input type="radio" name="IMGF_Show_Website_Link" id="IMGF_Show_Website_Link2" value="false" <?php if($IMGF_Show_Website_Link == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
						<p class="description">
							<?php _e('Select Yes/No option to hide or show Website Link.','IMGF_TEXT_DOMAIN')?>
							<a href="#" id="p12" data-tooltip="#s12"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
				
				<!-- Show Bio -->
				<tr>
					<th scope="row"><label><?php _e('Show Bio','IMGF_TEXT_DOMAIN')?></label></th>
					<td>
						<?php if($IMGF_Show_Bio == "") $IMGF_Show_Bio = "true"; ?>
						<input type="radio" name="IMGF_Show_Bio" id="IMGF_Show_Bio1" value="true" <?php if($IMGF_Show_Bio == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
						<input type="radio" name="IMGF_Show_Bio" id="IMGF_Show_Bio2" value="false" <?php if($IMGF_Show_Bio == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
						<p class="description">
							<?php _e('Select Yes/No option to hide or show Bio.','IMGF_TEXT_DOMAIN')?>
							<a href="#" id="p13" data-tooltip="#s13"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
						</p>
					</td>
				</tr>
			</tbody>
		</table>	
        <?php
    }
	
    public function IMGF_settings_meta_box_function($post) { 
		require_once('instagram-setting-metabox.php');
	}
	
	public function IMGF_other_settings_metabox_function($post) { 
	require('get-save-settings.php');
	?>
	<table class="form-table">
		<tbody>
			<!-- Load Image Counter -->
			<tr>
				<th scope="row"><label><?php _e('Load Image Counter','IMGF_TEXT_DOMAIN')?></label></th>
				<td>
					<?php if($IMGF_Image_Load_Count == "") $IMGF_Image_Load_Count = "7"; ?>
					<select name="IMGF_Image_Load_Count" id="IMGF_Image_Load_Count">
						<optgroup label="Select Gallery Layout">
							<option value="1" <?php if($IMGF_Image_Load_Count == '1') echo "selected=selected"; ?>><?php _e('One - 1','IMGF_TEXT_DOMAIN')?></option>
							<option value="2" <?php if($IMGF_Image_Load_Count == '2') echo "selected=selected"; ?>><?php _e('Two - 2','IMGF_TEXT_DOMAIN')?></option>
							<option value="3" <?php if($IMGF_Image_Load_Count == '3') echo "selected=selected"; ?>><?php _e('Three - 3','IMGF_TEXT_DOMAIN')?></option>
							<option value="4" <?php if($IMGF_Image_Load_Count == '4') echo "selected=selected"; ?>><?php _e('Four - 4','IMGF_TEXT_DOMAIN')?></option>
							<option value="5" <?php if($IMGF_Image_Load_Count == '5') echo "selected=selected"; ?>><?php _e('Five - 5','IMGF_TEXT_DOMAIN')?></option>
							<option value="6" <?php if($IMGF_Image_Load_Count == '6') echo "selected=selected"; ?>><?php _e('Six - 6','IMGF_TEXT_DOMAIN')?></option>
							<option value="7" <?php if($IMGF_Image_Load_Count == '7') echo "selected=selected"; ?>><?php _e('Seven - 7','IMGF_TEXT_DOMAIN')?></option>
							<option value="8" <?php if($IMGF_Image_Load_Count == '8') echo "selected=selected"; ?>><?php _e('Eight - 8','IMGF_TEXT_DOMAIN')?></option>
							<option value="9" <?php if($IMGF_Image_Load_Count == '9') echo "selected=selected"; ?>><?php _e('Nine - 9','IMGF_TEXT_DOMAIN')?></option>
							<option value="10" <?php if($IMGF_Image_Load_Count == '10') echo "selected=selected"; ?>><?php _e('Ten - 10','IMGF_TEXT_DOMAIN')?></option>
						</optgroup>
					</select>
					<p class="description">
						<?php _e('Choose Load Image Counter.','IMGF_TEXT_DOMAIN')?>&nbsp;
						<a href="#" id="p27" data-tooltip="#s27"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
					</p>
				</td>
			</tr>
			
			<!-- Load Button Text -->
			<tr>
				<th scope="row"><label><?php _e('Load Button Text','IMGF_TEXT_DOMAIN')?></label></th>
				<td>
					<input type="text" id="IMGF_Load_Button_Text" name="IMGF_Load_Button_Text" class="" value="<?php echo $IMGF_Load_Button_Text; ?>" style="width:80%">
					
					<p class="description">
						<?php _e('Enter Load Button Text.','IMGF_TEXT_DOMAIN')?>&nbsp;
						<a href="#" id="p28" data-tooltip="#s28"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
					</p>
				</td>
			</tr>
			
			<!-- Load Button Floating -->
			<tr>
				<th scope="row"><label><?php _e('Load Button Floating','IMGF_TEXT_DOMAIN')?></label></th>
				<td>
					<?php if($IMGF_Load_Button_Float == "") $IMGF_Load_Button_Float = "center"; ?>
					<input type="radio" name="IMGF_Load_Button_Float" id="IMGF_Load_Button_Float1" value="left" <?php if($IMGF_Load_Button_Float == 'left' ) { echo "checked"; } ?>> </i><?php _e(' Left','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
					<input type="radio" name="IMGF_Load_Button_Float" id="IMGF_Load_Button_Float2" value="center" <?php if($IMGF_Load_Button_Float == 'center' ) { echo "checked"; } ?>> <?php _e(' Center','IMGF_TEXT_DOMAIN')?>
					<input type="radio" name="IMGF_Load_Button_Float" id="IMGF_Load_Button_Float3" value="right" <?php if($IMGF_Load_Button_Float == 'right' ) { echo "checked"; } ?>> <?php _e(' Right','IMGF_TEXT_DOMAIN')?>
					<p class="description">
						<?php _e('Select Load Button Floating.','IMGF_TEXT_DOMAIN')?>&nbsp;
						<a href="#" id="p29" data-tooltip="#s29"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
					</p>
				</td>
			</tr>
		</tbody>
	</table>	
	<?php
	}
	public function IMGF_shotcode_meta_box_function() { ?>
		<p><?php _e("Use below shortcode in any Page/Post to publish your Instagram Gallery", IMGF_TEXT_DOMAIN);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[IGF id=".get_the_ID()."]"; ?>">
		<?php 
	}
	
	// Rate Us Meta Box Function
	function IMGF_Rate_us_meta_box_function() { ?>
		<style>
		.fag-rate-us span.dashicons{
			width: 30px;
			height: 30px;
		}
		.fag-rate-us span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
		}
		</style>
		<div align="center">
			<p>Please Review & Rate Us On WordPress</p>
			<a class="upgrade-to-pro-demo .fag-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/plugins/gallery-for-instagram/" target="_blank">
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
			</a>
		</div>
		<div class="upgrade-to-pro-demo" style="text-align:center;margin-bottom:10px;margin-top:10px;">
			<a href="https://wordpress.org/plugins/gallery-for-instagram/" target="_blank" class="button button-primary button-hero">RATE US</a>
		</div>
		<?php
	}
	
	// Upgarde to Pro Meta Box Function
	function IMGF_upgrade_to_pro_function(){
		?>
		<div class="upgrade-to-pro-demo" style="text-align:center;margin-bottom:10px;margin-top:10px;">
			<a href="http://demo.weblizar.com/instagram-gallery-pro-demo/"  target="_new" class="button button-primary button-hero">View Live Demo</a>
		</div>
		<div class="upgrade-to-pro-admin-demo" style="text-align:center;margin-bottom:10px;">
			<a href="http://demo.weblizar.com/instagram-gallery-pro-admin-demo" target="_new" class="button button-primary button-hero">View Admin Demo</a>
		</div>
		<div class="upgrade-to-pro" style="text-align:center;margin-bottom:10px;">
			<a href="http://weblizar.com/plugins/instagram-gallery-pro/" target="_new" class="button button-primary button-hero">Upgarde To Pro</a>
		</div>
		<?php
	}
	
	// Pro Features Meta Box Function
	function IMGF_pro_features(){ ?>
		<ul style="">
			<li class="plan-feature">Responsive Design</li>
			<li class="plan-feature">Recent, Feeds and #Hashtag Option</li>
			<li class="plan-feature">Three Light Box</li>
			<li class="plan-feature">11 beautiful Image Transition Effects</li>
			<li class="plan-feature">Rectangle/Circle Image Design Layout</li>
			<li class="plan-feature">500+ Google Fonts</li>
			<li class="plan-feature">7 Gallery Layout</li>
			<li class="plan-feature">Profile background Image Option</li>
			<li class="plan-feature">Unlimited Profile background color</li>
			<li class="plan-feature">Unlimited Text color Option</li>
			<li class="plan-feature">Unlimited Hover Color Scheme</li>
			<li class="plan-feature">Instagram has Unique Shortcode</li>
			<li class="plan-feature">Shortcode Button on post or page</li>
			<li class="plan-feature">Unique settings for each Instagram</li>
			<li class="plan-feature">Hide/Show Profile</li>
		</ul>
		<?php 
	}	
	
	//save settings meta box values
	public function IMGF_settings_meta_save($PostID) {		
	  if(isset($PostID) && isset($_POST['IMGF_Access_Id'])){
		
		$IMGF_Access_Id				= $_POST['IMGF_Access_Id'];
		$IMGF_Access_Token			= $_POST['IMGF_Access_Token'];
		$IMGF_Show_In_Gallery		= $_POST['IMGF_Show_In_Gallery'];
		$IMGF_Profile_Show			= $_POST['IMGF_Profile_Show'];
		$IMGF_Profile_bg_color		= $_POST['IMGF_Profile_bg_color'];
		$IMGF_post_bg_color			= $_POST['IMGF_post_bg_color'];
		$IMGF_Profile_text_color	= $_POST['IMGF_Profile_text_color'];
		$IMGF_P_Img_Border_Color	= $_POST['IMGF_P_Img_Border_Color'];
		$IMGF_Profile_Image_Size	= $_POST['IMGF_Profile_Image_Size'];
		$IMGF_Button_bg_Color		= $_POST['IMGF_Button_bg_Color'];
		$IMGF_Button_Text_Color		= $_POST['IMGF_Button_Text_Color'];	
		$IMGF_Show_Profile_Image	= $_POST['IMGF_Show_Profile_Image'];
		$IMGF_Show_Follow_Button	= $_POST['IMGF_Show_Follow_Button'];
		$IMGF_Show_Post_count		= $_POST['IMGF_Show_Post_count'];
		$IMGF_Show_Website_Link		= $_POST['IMGF_Show_Website_Link'];
		$IMGF_Show_Bio				= $_POST['IMGF_Show_Bio'];
		
		$IMGF_Effect  				= $_POST['IMGF_Effect'];
		switch ($IMGF_Effect) {
			case "effect2":
				$IMGF_Effect_animation=$_POST['IMGF_effect2_anim'];
				break;
			case "effect3":
				$IMGF_Effect_animation=$_POST['IMGF_effect3_anim'];
				break;
			case "effect4":
				$IMGF_Effect_animation=$_POST['IMGF_effect4_anim'];
				break;
			case "effect6":
				$IMGF_Effect_animation=$_POST['IMGF_effect6_anim'];
				break;
			case "effect7":
				$IMGF_Effect_animation=$_POST['IMGF_effect7_anim'];
				break;
			case "effect8":
				$IMGF_Effect_animation=$_POST['IMGF_effect8_anim'];
				break;
			case "effect9":
				$IMGF_Effect_animation=$_POST['IMGF_effect9_anim'];
				break;
			case "effect10":
				$IMGF_Effect_animation=$_POST['IMGF_effect10_anim'];
				break;
			case "effect11":
				$IMGF_Effect_animation=$_POST['IMGF_effect11_anim'];
				break;
			case "effect12":
				$IMGF_Effect_animation=$_POST['IMGF_effect12_anim'];
				break;
			case "effect13":
				$IMGF_Effect_animation=$_POST['IMGF_effect13_anim'];
				break;				
			case "effect14":
				$IMGF_Effect_animation=$_POST['IMGF_effect14_anim'];
				break;	
			case "effect15":
				$IMGF_Effect_animation=$_POST['IMGF_effect15_anim'];
				break;
			case "effect16":
				$IMGF_Effect_animation=$_POST['IMGF_effect16_anim'];
				break;
			case "effect18":
				$IMGF_Effect_animation=$_POST['IMGF_effect18_anim'];
				break;
			case "effect20":
				$IMGF_Effect_animation=$_POST['IMGF_effect20_anim'];
				break;	
			default:
				$IMGF_Effect_animation="";
		}
		$IMGF_Color 				= $_POST['IMGF_Color'];
		$IMGF_Hover_Text_Color 		= $_POST['IMGF_Hover_Text_Color'];
		$IMGF_M_Hover_Text_Color	=$_POST['IMGF_M_Hover_Text_Color'];
		$IMGF_Hover_Text_Caps 		= $_POST['IMGF_Hover_Text_Caps'];
		$IMGF_Show_Image_Label      = $_POST['IMGF_Show_Image_Label'];
		$IMGF_Show_Date      		= $_POST['IMGF_Show_Date'];
		$IMGF_Show_Like     		= $_POST['IMGF_Show_Like'];
		$IMGF_Show_Comment      	= $_POST['IMGF_Show_Comment'];
		$IMGF_Gallery_Layout        = $_POST['IMGF_Gallery_Layout'];
		$IMGF_Color_Opacity         = $_POST['IMGF_Color_Opacity'];
		$IMGF_Font_Style           	= $_POST['IMGF_Font_Style'];
		$IMGF_Image_Border          = $_POST['IMGF_Image_Border'];
		$IMGF_Custom_CSS    		= $_POST['IMGF_Custom_CSS'];
		$IMGF_Image_Load_Count    	= $_POST['IMGF_Image_Load_Count'];
		$IMGF_Load_Button_Text    	= $_POST['IMGF_Load_Button_Text'];
		$IMGF_Load_Button_Float    	= $_POST['IMGF_Load_Button_Float'];

		$IMGF_Settings_Array = serialize( array(
		
			'IMGF_Access_Id'			=> $IMGF_Access_Id,
			'IMGF_Access_Token'			=> $IMGF_Access_Token,
			'IMGF_Show_In_Gallery'		=> $IMGF_Show_In_Gallery,
			
			'IMGF_Profile_Show'			=> $IMGF_Profile_Show,
			'IMGF_Profile_bg_color'     => $IMGF_Profile_bg_color,
			'IMGF_post_bg_color'        => $IMGF_post_bg_color,
			'IMGF_Profile_text_color'   => $IMGF_Profile_text_color,
			'IMGF_P_Img_Border_Color'   => $IMGF_P_Img_Border_Color,
			'IMGF_Profile_Image_Size'   => $IMGF_Profile_Image_Size,
			'IMGF_Button_bg_Color' 		=> $IMGF_Button_bg_Color,
			'IMGF_Button_Text_Color'    => $IMGF_Button_Text_Color,
			'IMGF_Show_Profile_Image'   => $IMGF_Show_Profile_Image,
			'IMGF_Show_Follow_Button'   => $IMGF_Show_Follow_Button,
			'IMGF_Show_Post_count'    	=> $IMGF_Show_Post_count,
			'IMGF_Show_Website_Link'    => $IMGF_Show_Website_Link,
			'IMGF_Show_Bio'    			=> $IMGF_Show_Bio,
			
			'IMGF_Effect'          		=> $IMGF_Effect,
			'IMGF_Effect_animation'    	=> $IMGF_Effect_animation,
			'IMGF_Color'         		=> $IMGF_Color,
			'IMGF_Hover_Text_Color'		=> $IMGF_Hover_Text_Color,
			'IMGF_M_Hover_Text_Color'	=> $IMGF_M_Hover_Text_Color,
			'IMGF_Hover_Text_Caps'		=> $IMGF_Hover_Text_Caps,
			'IMGF_Show_Image_Label'     => $IMGF_Show_Image_Label,
			'IMGF_Show_Date'    		=> $IMGF_Show_Date,
			'IMGF_Show_Like'     		=> $IMGF_Show_Like,
			'IMGF_Show_Comment'     	=> $IMGF_Show_Comment,
			'IMGF_Gallery_Layout'      	=> $IMGF_Gallery_Layout,
			'IMGF_Color_Opacity'		=> $IMGF_Color_Opacity,
			'IMGF_Font_Style'			=> $IMGF_Font_Style,
			'IMGF_Image_Border'         => $IMGF_Image_Border,
			'IMGF_Custom_CSS'   		=> $IMGF_Custom_CSS,
			'IMGF_Image_Load_Count'   	=> $IMGF_Image_Load_Count,
			'IMGF_Load_Button_Text'   	=> $IMGF_Load_Button_Text,
			'IMGF_Load_Button_Float'   	=> $IMGF_Load_Button_Float
		) );
		$IMGF_Gallery_Settings = "IMGF_Gallery_Settings_".$PostID;
		update_post_meta($PostID, $IMGF_Gallery_Settings, $IMGF_Settings_Array);

	  }
	}
}

global $IMGF;
$IMGF = IMGF::forge();

/**
 * Instagram Mega Gallery Short Code [IMGF].
 */
require_once("instagram-gallery-shortcode.php");
//add_action('media_buttons_context', 'imgf_add_custom_button');
//add_action('admin_footer', 'imgf_inline_popup_content');


function imgf_add_custom_button($context) {
 $img = plugins_url( '/images/gallery.png' , __FILE__ );
  $container_id = 'IMGF';
  $title =  __('Select Gallery to insert into post','IMGF_TEXT_DOMAIN') ;
  $context = '<a class="button button-primary thickbox"  title="'. __("Select Gallery to insert into post",IMGF_TEXT_DOMAIN).'"  
  href="#TB_inline?width=400&inlineId='.$container_id.'">
		<span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
	'. __("Instagram Gallery Shortcode","IMGF_TEXT_DOMAIN").'
	</a>';
  return $context;
}

function imgf_inline_popup_content() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#imgf_galleryinsert').on('click', function() {
			var id = jQuery('#imgf-gallery-select option:selected').val();
			window.send_to_editor('<p>[IGF id=' + id + ']</p>');
			tb_remove();
		})
	});
	</script>

	<div id="IMGF" style="display:none;">
	  <h3><?php _e('Select Instagram Gallery To Insert Into Post','IMGF_TEXT_DOMAIN');?></h3>
	  <?php 
		$all_posts = wp_count_posts( 'imgf_instagram')->publish;
		$args = array('post_type' => 'imgf_instagram', 'posts_per_page' =>$all_posts);
		global $imgf_galleries;
		$imgf_galleries = new WP_Query( $args );			
		if( $imgf_galleries->have_posts() ) { ?>	
			<select id="imgf-gallery-select">
				<?php
				while ( $imgf_galleries->have_posts() ) : $imgf_galleries->the_post(); ?>
				<option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
				<?php
				endwhile; 
				?>
			</select>
			<button class='button primary' id='imgf_galleryinsert'><?php _e('Insert Gallery Shortcode','IMGF_TEXT_DOMAIN');?></button>
			<?php
		} else { 
			_e('No Gallery found','IMGF_TEXT_DOMAIN');
		}
		?>
	</div>
	<?php
}
?>