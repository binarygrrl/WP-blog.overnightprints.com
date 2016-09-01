<?php
add_shortcode( 'IGF', 'imgf_ShortCode_function_call' );
function imgf_ShortCode_function_call( $Id ) {
    ob_start();
	
	/**
	 * Load Hex to Rgb color code function
	 */
	require_once("rgb_color_code_function.php");
	
	/**
	 * Load All Image Gallery Custom Post Type
	 */
	$CPT_Name = "imgf_instagram";
	$All_Instagram = array( 'post_id' => $Id['id'], 'post_type' => $CPT_Name, 'orderby' => 'ASC');
	$loop = new WP_Query( $All_Instagram );

	while ( $loop->have_posts() ) : $loop->the_post();
	
	/**
     * Load Saved Photo Gallery Pro Settings
     */

    if(!isset($All_Instagram['post_id'])) {
        $All_Instagram['post_id'] = "";		
    } else {
		$IMGF_Id = $All_Instagram['post_id'];
		$IMGF_Gallery_Settings = "IMGF_Gallery_Settings_".$IMGF_Id;
		$IMGF_Gallery_Settings = unserialize(get_post_meta( $IMGF_Id, $IMGF_Gallery_Settings, true));
		if(count($IMGF_Gallery_Settings)) {
			$IMGF_Access_Id				= $IMGF_Gallery_Settings['IMGF_Access_Id'];
			$IMGF_Access_Token			= $IMGF_Gallery_Settings['IMGF_Access_Token'];
			$IMGF_Show_In_Gallery		= $IMGF_Gallery_Settings['IMGF_Show_In_Gallery'];
			
			$IMGF_Profile_Show			= $IMGF_Gallery_Settings['IMGF_Profile_Show'];
			$IMGF_Profile_bg_color		= $IMGF_Gallery_Settings['IMGF_Profile_bg_color'];
			$IMGF_post_bg_color			= $IMGF_Gallery_Settings['IMGF_post_bg_color'];
			$IMGF_Profile_text_color	= $IMGF_Gallery_Settings['IMGF_Profile_text_color'];
			$IMGF_P_Img_Border_Color	= $IMGF_Gallery_Settings['IMGF_P_Img_Border_Color'];
			$IMGF_Profile_Image_Size	= $IMGF_Gallery_Settings['IMGF_Profile_Image_Size'];
			$IMGF_Button_bg_Color		= $IMGF_Gallery_Settings['IMGF_Button_bg_Color'];
			$IMGF_Button_Text_Color		= $IMGF_Gallery_Settings['IMGF_Button_Text_Color'];
			$IMGF_Show_Profile_Image	= $IMGF_Gallery_Settings['IMGF_Show_Profile_Image'];
			$IMGF_Show_Follow_Button	= $IMGF_Gallery_Settings['IMGF_Show_Follow_Button'];
			$IMGF_Show_Post_count		= $IMGF_Gallery_Settings['IMGF_Show_Post_count'];
			$IMGF_Show_Website_Link		= $IMGF_Gallery_Settings['IMGF_Show_Website_Link'];
			$IMGF_Show_Bio				= $IMGF_Gallery_Settings['IMGF_Show_Bio'];
			
			$IMGF_Effect				= $IMGF_Gallery_Settings['IMGF_Effect'];
			$IMGF_Effect_animation		= $IMGF_Gallery_Settings['IMGF_Effect_animation'];
			$IMGF_Color 				= $IMGF_Gallery_Settings['IMGF_Color'];
			$IMGF_Hover_Text_Color 		= $IMGF_Gallery_Settings['IMGF_Hover_Text_Color'];
			$IMGF_M_Hover_Text_Color 	= $IMGF_Gallery_Settings['IMGF_M_Hover_Text_Color'];
			$IMGF_Hover_Text_Caps 		= $IMGF_Gallery_Settings['IMGF_Hover_Text_Caps'];
			$IMGF_Show_Image_Label		= $IMGF_Gallery_Settings['IMGF_Show_Image_Label'];
			$IMGF_Show_Date				= $IMGF_Gallery_Settings['IMGF_Show_Date'];
			$IMGF_Show_Like				= $IMGF_Gallery_Settings['IMGF_Show_Like'];
			$IMGF_Show_Comment			= $IMGF_Gallery_Settings['IMGF_Show_Comment'];
			$IMGF_Gallery_Layout		= $IMGF_Gallery_Settings['IMGF_Gallery_Layout'];
			$IMGF_Color_Opacity         = $IMGF_Gallery_Settings['IMGF_Color_Opacity'];
			$IMGF_Font_Style			= $IMGF_Gallery_Settings['IMGF_Font_Style'];
			$IMGF_Image_Border			= $IMGF_Gallery_Settings['IMGF_Image_Border'];
			$IMGF_Custom_CSS			= $IMGF_Gallery_Settings['IMGF_Custom_CSS'];
			
			$IMGF_Image_Load_Count    	= $IMGF_Gallery_Settings['IMGF_Image_Load_Count'];
			$IMGF_Load_Button_Text    	= $IMGF_Gallery_Settings['IMGF_Load_Button_Text'];
			$IMGF_Load_Button_Float    	= $IMGF_Gallery_Settings['IMGF_Load_Button_Float'];
		}
	}
	?>
	
	<?php
		$img_inner_shadow =  IMGF_hex2rgb( $IMGF_Color );
		$img_bg_color =  IMGF_hex2rgb( $IMGF_Color );
		$hover_text_color =  IMGF_hex2rgb( $IMGF_Color );
		
	
		if($IMGF_Profile_Image_Size=="medium"){
			$IMGF_Profile_Image_Size = 64;
		} else {
			$IMGF_Profile_Image_Size = 128;
		}
		
	?>

	<!-- Load Effect File -->
	<?php include('css/ohover.php'); ?>
	
	<style>

	.fade {
		opacity: 1;
		transition: opacity 0.15s linear 0s;
	}
	.thumbnail > span.likes, .thumbnail > span.comments,{
		position: static;
		z-index: -1;
	}
	
	.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
		min-height: 1px;
		position: relative;

		<?php if( $IMGF_Gallery_Layout == "col-xs-12 col-sm-4 col-md-4 col-lg-4") { ?>
			padding-left: 12px;
			padding-right:12px;
		<?php } else if( $IMGF_Gallery_Layout == "col-xs-12 col-sm-6 col-md-6 col-lg-6") { ?>
			padding-left: 15px;
			padding-right:15px;
		<?php } ?>
	}
	
	div.ppt, .pp_description {
		display: none !important;
	}
	
	#selector_<?php echo $IMGF_Id; ?> .thumbnail {
		background-color: <?php echo $IMGF_P_Img_Border_Color; ?> !important;
	}
	
	#selector_<?php echo $IMGF_Id; ?>  .counts .h4, #selector_<?php echo $IMGF_Id; ?>  .counts .h4 small{
		background-color: <?php echo $IMGF_post_bg_color; ?>;
		color: <?php echo $IMGF_Profile_text_color; ?>;
	}
	
	#selector_<?php echo $IMGF_Id; ?>{
		margin-bottom:20px;
		font-family: <?php echo $IMGF_Font_Style; ?>;
	}
	
	#selector2_<?php echo $IMGF_Id; ?>
	{
		overflow: hidden ;
	}
	
	#selector_<?php echo $IMGF_Id; ?> .user-data h3 {
		color:<?php echo $IMGF_Profile_text_color; ?>;
		font-family: <?php echo $IMGF_Font_Style; ?>;
	}
	
	#selector_<?php echo $IMGF_Id; ?> .user-data small, #selector_<?php echo $IMGF_Id; ?> .user-data small a, #selector_<?php echo $IMGF_Id; ?> .user-data p{
		color:<?php echo $IMGF_Profile_text_color; ?>;
		text-decoration: none !important;
		border:none;
	}
	
	#selector2_<?php echo $IMGF_Id; ?> .imgf-header-label {
		color: <?php echo $IMGF_Hover_Text_Color ;?> !important;
		text-shadow: <?php echo $IMGF_Hover_Text_Color ;?> !important;
		text-transform: <?php if($IMGF_Hover_Text_Caps == "yes"){ echo "uppercase"; }else { echo "unset";  }?> !important;
		word-wrap: break-word;
		font-family: <?php echo $IMGF_Font_Style; ?>;
	}
	
	#selector2_<?php echo $IMGF_Id; ?> .imgf-footer-label {
		color: <?php echo $IMGF_M_Hover_Text_Color ;?> !important;
		text-shadow: <?php echo $IMGF_M_Hover_Text_Color ;?> !important;
		text-transform: <?php if($IMGF_Hover_Text_Caps == "yes"){ echo "uppercase"; }else { echo "unset";  }?> !important;
		word-wrap: break-word;
		font-family: <?php echo $IMGF_Font_Style; ?>;
		text-align:center;
	}
	
	.position_<?php echo $IMGF_Id; ?> .btn-success {
		background: <?php echo $IMGF_Button_bg_Color; ?> !important;
		border-color: <?php echo $IMGF_Button_bg_Color; ?> !important;
		color: <?php echo $IMGF_Button_Text_Color; ?> !important;
		font-family: <?php echo $IMGF_Font_Style; ?>;
		margin-bottom: 40px;
	}	
	
	.position_<?php echo $IMGF_Id; ?>
	{
		padding-top:20px;
		text-align:<?php echo $IMGF_Load_Button_Float; ?>;
	}
	
	#selector_<?php echo $IMGF_Id; ?> h3, #selector2_<?php echo $IMGF_Id; ?>  h3{
		text-shadow:none !important;
	}
	
	strong{
		font-size:14px;
	}
	
	.likes, .comments{
		font-size:18px;
	}
	
	#selector_<?php echo $IMGF_Id; ?> .user-data p{
		font-size: 15px;
		font-family: <?php echo $IMGF_Font_Style; ?>;
		margin-bottom:10px;
	}
	
	#selector_<?php echo $IMGF_Id; ?> .user-data small{
		font-size: 95%;
	}
	
	.img-thum{	margin-bottom:25px;	}
	.info h3 {
		font-size: 18px !important;
	}
	
	.feature-image
	{
		margin-left:-2%;
	}
	
	#selector_<?php echo $IMGF_Id; ?> .btn{
		background: <?php echo $IMGF_Button_bg_Color; ?> ;
		border-color: <?php echo $IMGF_Button_bg_Color; ?> ;
		color: <?php echo $IMGF_Button_Text_Color; ?> ;
	}
	

	#selector_<?php echo $IMGF_Id; ?> .follow-btn{
			margin-bottom:15px;
	}
	#selector_<?php echo $IMGF_Id; ?> .user-data h3{
			margin-top: 20px ;
			margin-bottom: 10px;
			text-align: center;
	}

	
	@media (min-width: 1000px) {
		#selector2_<?php echo $IMGF_Id; ?> .imgf-footer-label
		{
			display:none;
		}
	}
	@media (max-width: 1000px) {
		#selector2_<?php echo $IMGF_Id; ?> .imgf-header-label
		{
			display:none;
		}
		#selector2_<?php echo $IMGF_Id; ?> h3{
			font-size:16px;
		}
	}
	
	#selector2_<?php echo $IMGF_Id; ?> h3{
		width:auto !important;
		text-align:center !important;
		float: none !important;
	}
	
	<?php echo $IMGF_Custom_CSS; ?>
	</style>

	<!-- Load Effect File -->
	<?php if($IMGF_Profile_Show =="yes"){ ?>
	<div id="selector_<?php echo $IMGF_Id; ?>"></div>
	<?php } ?>
	<div id="selector2_<?php echo $IMGF_Id; ?>"></div>
	<script>
	jQuery(document).ready(function () {
		jQuery('#selector_<?php echo $IMGF_Id; ?>').pongstgrm({
			  accessId:     		'<?php echo $IMGF_Access_Id; ?>'
			, accessToken:  		'<?php echo $IMGF_Access_Token; ?>'
			, show:         		'profile'
			// sets profile picture to 64x64 pixels, no need to add px
			, picture_size:		'<?php echo $IMGF_Profile_Image_Size; ?>'
			, profile_bg_color: '<?php echo $IMGF_Profile_bg_color; ?>'
			, Show_P_Image:   	 <?php echo $IMGF_Show_Profile_Image; ?>
			, Show_F_Button:	 <?php echo $IMGF_Show_Follow_Button; ?>
			, Show_Post:   		 <?php echo $IMGF_Show_Post_count; ?>
			, Show_Website:		 <?php echo $IMGF_Show_Website_Link; ?>
			, Show_Bio:   		 <?php echo $IMGF_Show_Bio; ?>
		});
	});
	</script>

	<script>
	jQuery(document).ready(function () {
	 
	  jQuery('#selector2_<?php echo $IMGF_Id; ?>').pongstgrm({
		accessId:     	'<?php echo $IMGF_Access_Id; ?>',
		accessToken:  	'<?php echo $IMGF_Access_Token; ?>',
		<?php if($IMGF_Show_In_Gallery == "recent") { ?>
		show: 		  	'recent',
		<?php }elseif($IMGF_Show_In_Gallery == "feeds") { ?>
		show: 		  	'feeds',
		<?php }elseif($IMGF_Show_In_Gallery == "liked") { ?>
		show: 		  	'liked',
		<?php } ?>
		hover_effect:   '<?php echo $IMGF_Effect; ?>',
		animation:     	'<?php echo $IMGF_Effect_animation; ?>',
		count:			 <?php echo $IMGF_Image_Load_Count; ?>,
		Image_label:	 <?php echo $IMGF_Show_Image_Label; ?>,
		likes:	         <?php echo $IMGF_Show_Date; ?>,
		comments: 	     <?php echo $IMGF_Show_Like; ?>,
		timestamp:	   	 <?php echo $IMGF_Show_Comment; ?>,
		buttontext:     '<?php echo $IMGF_Load_Button_Text; ?>',
		column: 		'<?php echo $IMGF_Gallery_Layout; ?>',
		id: 			'<?php echo $IMGF_Id; ?>'
	  });
	 
	});
	</script>
	
	<?php
    return ob_get_clean();
	endwhile;
}
?>