jQuery(function($) {
	listenForSaveAreaButton();
});

function listenForSaveAreaButton(){
	jQuery('#create_area_button').bind('click', function(){
		new Map().showArea;
		jQuery("#points").val(Map.points + ',' + Map.points[0]);
	});
}

function update_client_movment() {
  find_client_id = jQuery("#client_info_id")[0].innerHTML.split("#")[1];
  
  $.ajax({
    type: 'POST',
    url: 'clientlocation/'+find_client_id,
    dataType: 'json',
    success: function (data) {
      new Map().listenForClientPositionChange(data)
    },
    complete: function (data) {
      setTimeout(update_client_movment, 1000);
    }
  });
}