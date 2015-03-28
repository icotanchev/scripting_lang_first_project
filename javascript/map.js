function Map(instance) {
  this.instance        = instance;
  this.points          = [];
  this.markers         = [];
  this.client_location = new Object();
  this.map             = new Object();

  this.initialize = function() {
    mapOptions(13, new google.maps.LatLng(42.697708, 23.321868));

    google.maps.event.addListener(Map.map, 'click', function(event){
      placeMarker(event.latLng);
    });
  };

  this.initializeWithPoints = function(points, client_position) {
    mapOptions(11, new google.maps.LatLng(points[0].replace("(", "").replace(")", "").split(' ')[0], points[0].replace("(", "").replace(")", "").split(' ')[1]));

    for(k = 0; k < points.length - 1; k++){
      placeMarker(new google.maps.LatLng(points[k].replace("(", "").replace(")", "").split(' ')[0], points[k].replace("(", "").replace(")", "").split(' ')[1]));
    }

    if(client_position)
      setClientPosition(client_position)

    this.showArea();
  };

  this.initializeClientPosition = function(client_position) {
    mapOptions(11, new google.maps.LatLng(client_position[0], client_position[1]));
    setClientPosition(client_position);
  };

  this.listenForClientPositionChange = function(client_position) {
    Map.client_location.setPosition(new google.maps.LatLng(client_position[0], client_position[1]));
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

    lat_center = 0;
    lng_center = 0;

    for (i = 0; i < newArea.getPath()["j"].length; i++) {
      lat_center = lat_center + newArea.getPath()["j"][i].lat();
      lng_center = lng_center + newArea.getPath()["j"][i].lng();
    };

    Map.map.setCenter(new google.maps.LatLng(lat_center/newArea.getPath()["j"].length, lng_center/newArea.getPath()["j"].length));
  }

  //Private Methods
  function mapOptions(zoom, center){
    mapOptions = {
      zoom: zoom,
      center: center,
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };

    Map.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    Map.points  = [];
    Map.markers = [];
  }

  function setClientPosition(client_position) {
    current_client_position = new google.maps.Marker({
      position: new google.maps.LatLng(client_position[0], client_position[1]),
      icon: {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 10
      },
      title: "client position",
      map: Map.map
    });

    Map.client_location = current_client_position;
  }

  function placeMarker (event) {
    marker = new google.maps.Marker({
      position: event,
    });

    Map.markers.push(marker);
    marker.setAnimation(google.maps.Animation.BOUNCE);
    marker.setMap(Map.map);
    Map.points.push(event);
    drawPoints();
  };

  function drawPoints() {
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

  if(this.instance == 'initialize')
    google.maps.event.addDomListener(window, 'load', this.initialize);
}