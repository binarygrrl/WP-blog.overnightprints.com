jQuery(document).ready(function(){
	jQuery(document).on('click', '.supsystic-pro-notice .notice-dismiss', function(){
		jQuery.sendFormPps({
			msgElID: 'noMessages'
		,	data: {mod: 'license', action: 'dismissNotice'}
		});
	});
});