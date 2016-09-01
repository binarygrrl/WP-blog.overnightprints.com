<script>
jQuery(document).ready(function(){
effect_change();
});
function effect_change() {
	var optionvalue = jQuery( "#IMGF_Effect option:selected" ).val();
	jQuery('.tr_effect').hide();
	jQuery('#tr_'+optionvalue+'').show();
	if(optionvalue == "effect2" || optionvalue == "effect19"){
		jQuery('.opacity').show();
	}else{
		jQuery('.opacity').hide();
	}
}
</script>
<tr id="tr_effect2" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect2_anim" id="IMGF_effect2_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect3" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect3_anim" id="IMGF_effect3_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect4" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect4_anim" id="IMGF_effect4_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect6" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect6_anim" id="IMGF_effect6_anim">
			<optgroup label="Select Animation">
				<option value="scale_up" <?php if($IMGF_Effect_animation == 'scale_up') echo "selected=selected"; ?>><?php _e('Scale Up','IMGF_TEXT_DOMAIN')?></option>
				<option value="scale_down" <?php if($IMGF_Effect_animation == 'scale_down') echo "selected=selected"; ?>><?php _e('Scale Down','IMGF_TEXT_DOMAIN')?></option>
				<option value="scale_down_up" <?php if($IMGF_Effect_animation == 'scale_down_up') echo "selected=selected"; ?>><?php _e('Scale Down Up','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect7" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect7_anim" id="IMGF_effect7_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>

<tr id="tr_effect9" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect9_anim" id="IMGF_effect9_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>

<tr id="tr_effect11" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect11_anim" id="IMGF_effect11_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect12" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect12_anim" id="IMGF_effect12_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>

<tr id="tr_effect14" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect14_anim" id="IMGF_effect14_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($IMGF_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','IMGF_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($IMGF_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','IMGF_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($IMGF_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect15" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','IMGF_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="IMGF_effect15_anim" id="IMGF_effect15_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($IMGF_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','IMGF_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','IMGF_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
