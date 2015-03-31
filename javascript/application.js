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
    type: 'GET',
    url: 'clientlocation/',
    data: {client_id: find_client_id},
    dataType: 'json',
    success: function (data) {
      new Map().listenForClientPositionChange(data)
      $("#client_position")[0].innerHTML = "POINT(" + data.join(' ') + ")";
    },
    complete: function (data) {
      setTimeout(update_client_movment, 1000);
    }
  });
}

function update_area() {
  client_ids = [];
  area_ids = [];

  jQuery.each($('.class_for_client_id'), function(index, value) {
    client_ids.push(value.innerHTML);
  });

  jQuery.each($('.class_for_area_id'), function(index, value) {
    area_ids.push(value.innerHTML);
  });

  for (k = 0; k < area_ids.length; k++) {
    $.ajax({
      type: 'GET',
      url: 'index.php/area/areacontainclient',
      data: {client_id: client_ids[k], area_id: area_ids[k]},
      dataType: 'json',
      success: function (data) {
        if(data[0])
        {
          $('#area_header_'+data[1]).removeClass('panel-warning');
          $('#area_header_'+data[1]).addClass('panel-success');
        } else {
          $('#area_header_'+data[1]).addClass('panel-warning');
          $('#area_header_'+data[1]).removeClass('panel-success');
        }
      },
    });
  }
  setTimeout(update_area, 1000);   
}