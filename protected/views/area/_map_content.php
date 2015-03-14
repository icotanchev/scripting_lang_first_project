<!-- <div id='map_renderer_container'>
    <?php $this->renderPartial('_map_content', array('points'=>$points, 'client_position'=>Client::model()->getClientPosition($model->client_id))); ?>
</div>

<div id="map_card" style="width: 50em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);"></div>

<div id="points_location_id_2"><?php echo $points; ?>"</div>
<div id="client_position"><?php echo $client_position; ?>"</div>

<script>
  // var points = jQuery("#points_location_id_2").html().slice(0, -1).split(',');
  
  // function pointsFromString(array){
  //     var arr = [];
      
  //     for(k = 0; k< array.length - 1; k++){
  //         ar = {};
  //         ar["lat"] = points[k].replace("(", "").replace(")", "").split(' ')[0];
  //         ar["lot"] = points[k].replace("(", "").replace(")", "").split(' ')[1];
  //         arr.push(ar);
  //     }
  //     return arr;
  // }
 
  // var positions = pointsFromString(points);
  
  // var myPosition = new google.maps.LatLng(positions[0]["lat"], positions[0]["lot"]);
  
  // var mapOptions = {
  //     zoom: 10,
  //     center: myPosition
  // };

  // var map = new google.maps.Map(document.getElementById('map_card'), mapOptions);
  // var poligon_points = [];
  
  // for(k=0; k< positions.length; k++) {
  //     var currentPosition = new google.maps.LatLng(positions[k]["lat"], positions[k]["lot"]);
  //     var marker = new google.maps.Marker({
  //       position: currentPosition,
  //       map: map
  //     });
  //     poligon_points.push(new google.maps.LatLng(positions[k]["lat"], positions[k]["lot"]));
  // }
  
  // var newArea = new google.maps.Polygon({
  //     paths: poligon_points,
  //     strokeColor: '#FF0000',
  //     strokeOpacity: 0.8,
  //     strokeWeight: 2,
  //     fillColor: '#FF0000',
  //     fillOpacity: 0.35
  // });

  // newArea.setMap(map);
  
  // //client position
  // var clients_position = jQuery("#client_position").html().replace('POINT(', '').replace(')"', '').split(' ');
  // var client_marker = new google.maps.Marker({
  //     position: new google.maps.LatLng(clients_position[0], clients_position[1]),
  //     icon: {
  //       path: google.maps.SymbolPath.CIRCLE,
  //       scale: 10
  //     },
  //     map: map
  // });
  
  // var count = 0;
  
  // google.maps.event.addDomListener(window, 'load', initialize);
</script> -->