jQuery(function($) {
	listenForSaveAreaButton();
	points = jQuery("#points_location_id").html().slice(0, -1).split(',');
    // alert(points);
  Map.initializeWithPoints(points);
});

function listenForSaveAreaButton(){
	jQuery('#create_area_button').bind('click', function(){
		Map.showArea();
		jQuery("#points").val(Map.points + ',' + Map.points[0]);
	});
}
