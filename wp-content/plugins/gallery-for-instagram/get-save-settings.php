<?php
/**
 * Load Saved Gallery Pro Settings
 */
$PostId = $post->ID;
$IMGF_Gallery_Settings = "IMGF_Gallery_Settings_".$PostId;
$IMGF_Gallery_Settings = unserialize(get_post_meta( $PostId, $IMGF_Gallery_Settings, true));
if($IMGF_Gallery_Settings['IMGF_Access_Id'] && $IMGF_Gallery_Settings['IMGF_Access_Token'] ) {
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
else{
	$IMGF_Gallery_Settings = unserialize(get_option( 'IMGF_Settings' ));
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
		$IMGF_Custom_CSS			= "";
		
		$IMGF_Image_Load_Count    	= $IMGF_Gallery_Settings['IMGF_Image_Load_Count'];
		$IMGF_Load_Button_Text    	= $IMGF_Gallery_Settings['IMGF_Load_Button_Text'];
		$IMGF_Load_Button_Float    	= $IMGF_Gallery_Settings['IMGF_Load_Button_Float'];
	}
}
?>