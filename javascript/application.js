jQuery(function($) {
	initialize();
});

// This example creates a simple polygon representing the Bermuda Triangle.

function initialize() {
  var mapOptions = {
    zoom: 30,
    center: new google.maps.LatLng(42.697708, 23.321868),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  var bermudaTriangle;

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Define the LatLng coordinates for the polygon's path.
  var triangleCoords = [
    new google.maps.LatLng(42.697708, 23.321868),
    new google.maps.LatLng(42.694896, 23.320842),
    new google.maps.LatLng(42.698854, 23.315756),
    new google.maps.LatLng(42.697708, 23.321868)
  ];

  // Construct the polygon.
  bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });

  bermudaTriangle.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

