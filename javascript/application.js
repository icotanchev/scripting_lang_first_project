jQuery(function($) {
	listenForSaveAreaButton();
});

function listenForSaveAreaButton(){
	jQuery('#create_area_button').bind('click', function(){
		new Map().showArea;
		jQuery("#points").val(Map.points + ',' + Map.points[0]);
	});
}