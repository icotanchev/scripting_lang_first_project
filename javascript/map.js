var Map = new function() {
  this.points = [];
  this.markers = [];
  this.map = new Object();

  this.initialize = function() {
    mapOptions = {
      zoom: 13,
      center: new google.maps.LatLng(42.697708, 23.321868),
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };

    Map.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    google.maps.event.addListener(Map.map, 'click', function(event){
      Map.placeMarker(event.latLng);
    });
  };

  this.initializeWithPoints = function(points) {
    mapOptions = {
      zoom: 10,
      center: new google.maps.LatLng(points[0].replace("(", "").replace(")", "").split(' ')[0], points[0].replace("(", "").replace(")", "").split(' ')[1]),
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };

    Map.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    for(k = 0; k < points.length - 1; k++){
      Map.placeMarker(new google.maps.LatLng(points[k].replace("(", "").replace(")", "").split(' ')[0], points[k].replace("(", "").replace(")", "").split(' ')[1]));
    }

    Map.showArea();
  };

  this.placeMarker = function(event) {
    marker = new google.maps.Marker({
      position: event,
    });

    Map.markers.push(marker);
    marker.setAnimation(google.maps.Animation.BOUNCE);
    marker.setMap(Map.map);
    Map.points.push(event);
    Map.drowPoints();
  };

  this.drowPoints = function() {
    count = Map.points.length;
    current_point = Map.points[Map.points.length-1];
    points_lat_lng = ['Lat', 'Lng']

    points_container = document.createElement("div");
    setAttributes(points_container, {"class": "form-group", 'style': 'margin-left:8px;margin-top:10px}'});

    label = document.createElement("label");
    label.innerHTML = "Point "+count;
    points_container.appendChild(label);

    for(element = 0; element < points_lat_lng.length; element++) {
      create_and_stylized_point(points_container, points_lat_lng[element], count);
    }

    document.getElementById("area-form").appendChild(points_container);
    document.getElementById("point" + count + "Lat").value = current_point.lat();
    document.getElementById("point" + count + "Lng").value = current_point.lng();
  };

  this.showArea = function() {
    newArea = new google.maps.Polygon({
      paths: Map.points,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35
    });
    
    newArea.setMap(Map.map);
  }

  function create_and_stylized_point(parant_element, element, count){
    input_element = document.createElement("input");
    setAttributes(input_element, {'id': 'point'+count+element, 'class': 'form-control', 'type': 'text', 'style': 'margin-left:4px', 'disabled': 'disabled'});

    parant_element.appendChild(input_element);
  }

  function setAttributes(element, attrs) {
    for(key in attrs) {
      element.setAttribute(key, attrs[key]);
    }
  };

  google.maps.event.addDomListener(window, 'load', this.initialize);
}
