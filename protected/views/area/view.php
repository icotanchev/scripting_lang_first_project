<?php
  $this->breadcrumbs=array(
  	'Areas'=>array('index'),
  	$model->id,
  );

  $this->menu=array(
  	array('label'=>'List Area', 'url'=>array('index')),
  	array('label'=>'Create Area', 'url'=>array('create')),
  	array('label'=>'Update Area', 'url'=>array('update', 'id'=>$model->id)),
  	array('label'=>'Delete Area', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
  	array('label'=>'Manage Area', 'url'=>array('admin')),
  );

  $points = Area::getAreaPoints($model->id);
?>

<h2>Area "<?php echo $model->area_name; ?>"</h2>

<div id="map-canvas" style="width: 50.6em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);"></div>

<div class="client_label">
    <b><?php echo "Client" ?>:</b>
    <?php echo CHtml::link(CHtml::encode(array_values(Client::getClientName($model->client_id))[0]['name']), array('client/view', 'id' => $model->client_id));?><br />
</div>  


<div class="client_label"
  <b><?php echo "Geo" ?>:</b>
  <div id="points_location_id"><?php echo $points; ?></div>
</div>

<!-- <div id="points_location_id"><?php echo $points; ?></div> -->
<div id="area-form"></div>
<!-- <div id="area_real_loc"></div>
<input type="hidden" name="client_pos" id="client_position" value="<?php echo Client::model()->getClientPosition($model->client_id);?>"> -->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/map.js" ></script>
<script>
    // points = jQuery("#points_location_id").html().slice(0, -1).split(',');
    // // alert(points);
    // Map.initializeWithPoints(points);
    // new Map().initializeWithPoints(points);
    // alert(points);
    
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
    //     addPoint(positions[k]["lat"],positions[k]["lot"]);
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
    // var clients_position = jQuery("#client_position")[0].value.replace('POINT(', '').replace(')', '').split(' ');
    // var client_marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(clients_position[0], clients_position[1]),
    //     icon: {
    //       path: google.maps.SymbolPath.CIRCLE,
    //       scale: 10
    //     },
    //     map: map
    // });
    
    // var count = 0;
    
    // function addPoint(latt, lng) {
    //     count++;
        
    //     var s = document.createElement("div");
    //     s.setAttribute('class', 'form-group');
    //     s.setAttribute('style', 'margin-left:8px;margin-top:10px');

    //     var l = document.createElement("label");
    //     l.innerHTML = "Point "+count;
    //     s.appendChild(l);

    //     var lat = document.createElement("input");
    //     lat.type = "text";
    //     lat.className =  "form-control";
    //     lat.placeholder = "Enter Lat";
    //     lat.id = "point"+count+"Lat";
    //     lat.setAttribute('style', 'margin-left:10px; margin-top:5px;');
    //     lat.setAttribute('disabled', 'disabled');

    //     s.appendChild(lat);

    //     var ln = document.createElement("input");
    //     ln.type = "text";
    //     ln.className =  "form-control";
    //     ln.placeholder = "Enter Lng";
    //     ln.id = "point"+count+"Lng";
    //     ln.setAttribute('style', 'margin-left:10px; margin-top:5px;');
    //     ln.setAttribute('disabled', 'disabled');

    //     s.appendChild(ln);
        
    //     document.getElementById("area_real_loc").appendChild(s);

    //     document.getElementById("point" + count + "Lat").value = latt;
    //     document.getElementById("point" + count + "Lng").value = lng;
    // }
    
    // jQuery('#points_location_id').remove();
    
    // google.maps.event.addDomListener(window, 'load', initialize);
</script>