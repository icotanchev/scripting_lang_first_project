jQuery(function($) {
  initialize();
  ListenForShowAreaButton();
  // listenForInsertAreaButton();
});

var globalMap;
var count = 0;
var points = [];
var markers = [];
// This example creates a simple polygon representing the Bermuda Triangle.

function initialize() {
  var mapOptions = {
    zoom: 30,
    center: new google.maps.LatLng(42.697708, 23.321868),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  globalMap = map;

  google.maps.event.addListener(map,'click',function(event){
    placeMarker(event);
  });
}

function placeMarker(event) {
  count++;

  var s = document.createElement("div");
  s.setAttribute('class', 'form-group');
  s.setAttribute('style', 'margin-left:8px;margin-top:10px');

  var l = document.createElement("label");
  l.innerHTML = "Ponint"+count;
  s.appendChild(l)

  var lat = document.createElement("input");
  lat.type = "text";
  lat.className =  "form-control";
  lat.placeholder = "Enter Lat";
  lat.id = "point"+count+"Lat";
  lat.setAttribute('style', 'margin-left:4px');
  lat.setAttribute('disabled', 'disabled');

  s.appendChild(lat);

  var ln = document.createElement("input");
  ln.type = "text";
  ln.className =  "form-control";
  ln.placeholder = "Enter Lng";
  ln.id = "point"+count+"Lng";
  ln.setAttribute('style', 'margin-left:4px');
  ln.setAttribute('disabled', 'disabled');

  s.appendChild(ln);

  document.getElementById("area-form").appendChild(s);

  document.getElementById("point" + count + "Lat").value = event.latLng.lat();
  document.getElementById("point" + count + "Lng").value = event.latLng.lng();

  var marker = new google.maps.Marker({
      position: event.latLng,
  });

  markers.push(marker);
  marker.setAnimation(google.maps.Animation.BOUNCE);
  marker.setMap(globalMap);

  points.push(event.latLng);
}

function ListenForShowAreaButton(){
  jQuery('#show_zone_id').bind('click', function(){
    showArea();
  });
}

function showArea() {
  var newArea = new google.maps.Polygon({
    paths: points,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });

  newArea.setMap(globalMap);
  count = 0;

  // for (var k = 0; k < markers.length; k++) {
  //   k[i].setMap(NULL);
  // }

  jQuery('#Area_name').val = "GeomFromText('POLYGON("+ points + ")')";

  points = [];
  markers = [];
  count = 0;
}

google.maps.event.addDomListener(window, 'load', initialize);

// function listenForInsertAreaButton() {
//   jQuery('#add_zone_id').bind('click', function(){
//     jQuery.ajax({
//       type: 'POST',
//       url: "<?php echo Yii::app()->createUrl('area/create'); ?>",
//       data: {"points":points},
//       dataType: "text",
//       success: alert(points)
//     });
//     points = [];
//   }); 
// }
