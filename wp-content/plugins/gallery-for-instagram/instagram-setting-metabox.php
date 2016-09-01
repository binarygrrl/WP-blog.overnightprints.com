<?php
/**
 * Load Saved Gallery Pro Settings
 */
require('get-save-settings.php');
?>
<style>
@media only screen and (min-width: 970px){
	#post-body.columns-2 #postbox-container-1 {
		float: right;
		margin-right: 15px;
		width: 280px;
		right:0;
		position:absolute;
	}
}
.thumb-pro th, .thumb-pro label, .thumb-pro h3, .thumb-pro{
	color:#31a3dd !important;
	font-weight:bold;
}
.caro-pro th, .caro-pro label, .caro-pro h3, .caro-pro{
	color:#DA5766 !important;
	font-weight:bold;
}
</style>
<?php require_once("tooltip.php"); ?>

<input type="hidden" id="wl_action" name="wl_action" value="wl-save-settings">
<table class="form-table">
	<tbody>
		<!-- Show in Gallery -->
		<tr>
			<th scope="row"><label><?php _e('Show In Gallery','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Show_In_Gallery == "") $IMGF_Show_In_Gallery = "recent"; ?>
				<input type="radio" name="IMGF_Show_In_Gallery" id="IMGF_Show_In_Gallery1" value="recent" <?php if($IMGF_Show_In_Gallery == 'recent' ) { echo "checked"; } ?>> <?php _e(' Recent','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Show_In_Gallery" id="IMGF_Show_In_Gallery2" value="feeds" <?php if($IMGF_Show_In_Gallery == 'feeds' ) { echo "checked"; } ?>> </i><?php _e(' Feeds','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Show_In_Gallery" id="IMGF_Show_In_Gallery3" value="liked" <?php if($IMGF_Show_In_Gallery == 'liked' ) { echo "checked"; } ?>> </i><?php _e(' Likes','IMGF_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select Show In Gallery.','IMGF_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e('Transition Effect','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<select name="IMGF_Effect" id="IMGF_Effect" onchange='effect_change()'>
					<optgroup label="Select Effect">
						<option value="effect11" <?php if($IMGF_Effect == 'effect11') echo "selected=selected"; ?>><?php _e('Effect 1','IMGF_TEXT_DOMAIN')?></option>
						<option value="effect14" <?php if($IMGF_Effect == 'effect14') echo "selected=selected"; ?>><?php _e('Effect 2','IMGF_TEXT_DOMAIN')?></option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose an animation effect apply on images after mouse hover.','IMGF_TEXT_DOMAIN')?>
					
				</p>
			</td>
		</tr>
		<?php require_once("settings.php"); ?>
		
		<tr>
			<th scope="row"><label><?php _e('Image Hover Color','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Color == "") $IMGF_Color = "#147ebd"; ?>
				<input type="radio" name="IMGF_Color" id="IMGF_Color1" value="#147ebd" <?php if($IMGF_Color == '#147ebd' ) { echo "checked"; } ?>></i><?php _e('Blue','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Color" id="IMGF_Color2" value="#c9262e" <?php if($IMGF_Color == '#c9262e' ) { echo "checked"; } ?>><?php _e('Red','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Color" id="IMGF_Color3" value="#ffffff" <?php if($IMGF_Color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Color" id="IMGF_Color4" value="#000000" <?php if($IMGF_Color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select any color to apply on Image Gallery.','IMGF_TEXT_DOMAIN')?>&nbsp;
					<a href="#" id="p15" data-tooltip="#s15"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Hover Text Color','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Hover_Text_Color == "") $IMGF_Hover_Text_Color = "#ffffff"; ?>
				<input type="radio" name="IMGF_Hover_Text_Color" id="IMGF_Hover_Text_Color1" value="#ffffff" <?php if($IMGF_Hover_Text_Color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Hover_Text_Color" id="IMGF_Hover_Text_Color2" value="#000000" <?php if($IMGF_Hover_Text_Color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select any color to apply Text Color on Hover.','IMGF_TEXT_DOMAIN')?>&nbsp;
					<a href="#" id="p16" data-tooltip="#s16"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Text Color on Mobile','IMGP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_M_Hover_Text_Color == "") $IMGF_M_Hover_Text_Color = "#ffffff"; ?>
				<input type="radio" name="IMGF_M_Hover_Text_Color" id="IMGF_M_Hover_Text_Color1" value="#ffffff" <?php if($IMGF_M_Hover_Text_Color == '#ffffff' ) { echo "checked"; } ?>><?php _e('White','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_M_Hover_Text_Color" id="IMGF_M_Hover_Text_Color2" value="#000000" <?php if($IMGF_M_Hover_Text_Color == '#000000' ) { echo "checked"; } ?>><?php _e('Black','IMGF_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select any color to apply Text Color on Mobile.','IMGP_TEXT_DOMAIN')?>
					<a href="#" id="p17" data-tooltip="#s17"><?php _e('Preview','IMGP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Image Hover Text Upper Case','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Hover_Text_Caps == "") $IMGF_Hover_Text_Caps = "no"; ?>
				<input type="radio" name="IMGF_Hover_Text_Caps" id="IMGF_Hover_Text_Caps1" value="yes" <?php if($IMGF_Hover_Text_Caps == 'yes' ) { echo "checked"; } ?>><?php _e(' Yes','IMGF_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="IMGF_Hover_Text_Caps" id="IMGF_Hover_Text_Caps2" value="no" <?php if($IMGF_Hover_Text_Caps == 'no' ) { echo "checked"; } ?>><?php _e(' No','IMGF_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select Yes/No option for set Image Hover Text in Uppercase or lowercase.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p18" data-tooltip="#s18"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Show Image Label','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Show_Image_Label == "") $IMGF_Show_Image_Label = "true"; ?>
				<input type="radio" name="IMGF_Show_Image_Label" id="IMGF_Show_Image_Label1" value="true" <?php if($IMGF_Show_Image_Label == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="IMGF_Show_Image_Label" id="IMGF_Show_Image_Label2" value="false" <?php if($IMGF_Show_Image_Label == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to hide or show label on image.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p19" data-tooltip="#s19"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Show Date','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Show_Date == "") $IMGF_Show_Date = "true"; ?>
				<input type="radio" name="IMGF_Show_Date" id="IMGF_Show_Date1" value="true" <?php if($IMGF_Show_Date == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="IMGF_Show_Date" id="IMGF_Show_Date2" value="false" <?php if($IMGF_Show_Date == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to hide or show Date on image.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p20" data-tooltip="#s20"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Show Like','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Show_Like == "") $IMGF_Show_Like = "true"; ?>
				<input type="radio" name="IMGF_Show_Like" id="IMGF_Show_Like1" value="true" <?php if($IMGF_Show_Like == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="IMGF_Show_Like" id="IMGF_Show_Like2" value="false" <?php if($IMGF_Show_Like == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to hide or show Like on image.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p21" data-tooltip="#s21"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Show Comment','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Show_Comment == "") $IMGF_Show_Comment = "true"; ?>
				<input type="radio" name="IMGF_Show_Comment" id="IMGF_Show_Comment1" value="true" <?php if($IMGF_Show_Comment == 'true' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="IMGF_Show_Comment" id="IMGF_Show_Comment2" value="false" <?php if($IMGF_Show_Comment == 'false' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to hide or show Comment on image.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p22" data-tooltip="#s22"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Gallery Layout','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Gallery_Layout == "") $IMGF_Gallery_Layout = "col-md-6"; ?>
				<select name="IMGF_Gallery_Layout" id="IMGF_Gallery_Layout">
					<optgroup label="Select Gallery Layout">
						<option value="col-xs-12 col-sm-6 col-md-6 col-lg-6" <?php if($IMGF_Gallery_Layout == 'col-xs-12 col-sm-6 col-md-6 col-lg-6') echo "selected=selected"; ?>><?php _e('Two Column','IMGF_TEXT_DOMAIN')?></option>
						<option value="col-xs-12 col-sm-4 col-md-4 col-lg-4" <?php if($IMGF_Gallery_Layout == 'col-xs-12 col-sm-4 col-md-4 col-lg-4') echo "selected=selected"; ?>><?php _e('Three Column','IMGF_TEXT_DOMAIN')?></option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose a column layout for image gallery.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p23" data-tooltip="#s23"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr class="opacity" >
			<th scope="row"><label><?php _e('Color Opacity','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Color_Opacity == "") $IMGF_Color_Opacity = "yes"; ?>
				<input type="radio" name="IMGF_Color_Opacity" id="IMGF_Color_Opacity1" value="yes" <?php if($IMGF_Color_Opacity == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="IMGF_Color_Opacity" id="IMGF_Color_Opacity2" value="no" <?php if($IMGF_Color_Opacity == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Choose hover color opacity on images.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p24" data-tooltip="#s24"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e('Font Style','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Font_Style == "") $IMGF_Font_Style="Arial" ;  ?>
				<select  name="IMGF_Font_Style" class="standard-dropdown" id="IMGF_Font_Style">
					<optgroup label="Default Fonts">
						<option value="Arial" <?php selected($IMGF_Font_Style, 'Arial' ); ?>>Arial</option>
						<option value="_arial_black" <?php selected($IMGF_Font_Style, '_arial_black' ); ?>>Arial Black</option>
						<option value="Courier New" <?php selected($IMGF_Font_Style, 'Courier New' ); ?>>Courier New</option>
						<option value="georgia" <?php selected($IMGF_Font_Style, 'Georgia' ); ?>>Georgia</option>
						<option value="grande" <?php selected($IMGF_Font_Style, 'Grande' ); ?>>Grande</option>
						<option value="_helvetica_neue" <?php selected($IMGF_Font_Style, '_helvetica_neue' ); ?>>Helvetica Neue</option>
						<option value="_impact" <?php selected($IMGF_Font_Style, '_impact' ); ?>>Impact</option>
						<option value="_lucida" <?php selected($IMGF_Font_Style, '_lucida' ); ?>>Lucida</option>
						<option value="_lucida" <?php selected($IMGF_Font_Style, '_lucida' ); ?>>Lucida Grande</option>
						<option value="_OpenSansBold" <?php selected($IMGF_Font_Style, 'OpenSansBold' ); ?>>OpenSansBold</option>
						<option value="_palatino" <?php selected($IMGF_Font_Style, '_palatino' ); ?>>Palatino</option>
						<option value="_sans" <?php selected($IMGF_Font_Style, '_sans' ); ?>>Sans</option>
						<option value="_sans" <?php selected($IMGF_Font_Style, 'Sans-Serif' ); ?>>Sans-Serif</option>
						<option value="_tahoma" <?php selected($IMGF_Font_Style, '_tahoma' ); ?>>Tahoma</option>
						<option value="_times"<?php selected($IMGF_Font_Style, '_times' ); ?>>Times New Roman</option>
						<option value="_trebuchet" <?php selected($IMGF_Font_Style, 'Trebuchet' ); ?>>Trebuchet</option>
						<option value="_verdana" <?php selected($IMGF_Font_Style, '_verdana' ); ?>>Verdana</option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose a caption font style.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p25" data-tooltip="#s25"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e('Image Border','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($IMGF_Image_Border == "") $IMGF_Image_Border = "yes"; ?>
				<input type="radio" name="IMGF_Image_Border" id="IMGF_Image_Border" value="yes" <?php if($IMGF_Image_Border == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i>
				<input type="radio" name="IMGF_Image_Border" id="IMGF_Image_Border" value="no" <?php if($IMGF_Image_Border == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to apply border on instagram image thumbnails.','IMGF_TEXT_DOMAIN')?>
					<a href="#" id="p26" data-tooltip="#s26"><?php _e('Preview','IMGF_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>

		<tr >
			<th scope="row"><label><?php _e('Custom CSS','IMGF_TEXT_DOMAIN')?></label></th>
			<td>
				<textarea id="IMGF_Custom_CSS" name="IMGF_Custom_CSS" type="text" class="" style="width:80%"><?php echo $IMGF_Custom_CSS; ?></textarea>
				<p class="description">
					<?php _e('Enter any custom css you want to apply on this gallery.','IMGF_TEXT_DOMAIN')?><br>
					<?php _e('Note: Please Do Not Use <b>Style</b> Tag With Custom CSS.','IMGF_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>
	</tbody>
</table>