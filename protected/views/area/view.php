<?php
/* @var $this AreaController */
/* @var $model Area */

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

<h1>View Area #<?php echo $model->id; ?></h1>

<div id="map_card" style="width: 50em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);"></div>

<b><?php echo CHtml::encode($model->getAttributeLabel('area_name')); ?>:</b>
<?php echo CHtml::encode($model->area_name); ?><br />
        
<b><?php echo CHtml::encode($model->getAttributeLabel('client_id')); ?>:</b>
<?php echo array_values(Client::getClientName($model->client_id))[0]['name'];?><br />

<b><?php echo CHtml::encode($model->getAttributeLabel('geo')); ?>:</b>
<div id="points_location_id"><?php echo $points; ?></div>
<input type="hidden" name="client_pos" id="client_position" value="<?php echo Client::model()->getClientPosition($model->client_id);?>">
<script>
    var points = jQuery("#points_location_id").html().slice(0, -1).split(',');
    
    function pointsFromString(array){
        var arr = [];

        for(k = 0; k< array.length; k++){
            ar = {};
            ar["lat"] = points[k].replace("(", "").replace(")", "").split(' ')[0];
            ar["lot"] = points[k].replace("(", "").replace(")", "").split(' ')[1];
            arr.push(ar);
        }
        return arr;
    }
   
    var positions = pointsFromString(points);
    
    var myPosition = new google.maps.LatLng(positions[0]["lat"], positions[0]["lot"]);
    
    var mapOptions = {
        zoom: 16,
        center: myPosition,
    };

    var map = new google.maps.Map(document.getElementById('map_card'), mapOptions);
    var poligon_points = [];
    
    for(k=0; k< positions.length; k++) {
        var currentPosition = new google.maps.LatLng(positions[k]["lat"], positions[k]["lot"])
        var marker = new google.maps.Marker({
          position: currentPosition,
          map: map
        });
        poligon_points.push(new google.maps.LatLng(positions[k]["lat"], positions[k]["lot"]));
    }
    
    var newArea = new google.maps.Polygon({
        paths: poligon_points,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });

    newArea.setMap(map);
    
    //client position
    var clients_position = jQuery("#client_position")[0].value.replace('POINT(', '').replace(')', '').split(' ');
    var client_marker = new google.maps.Marker({
        position: new google.maps.LatLng(clients_position[0], clients_position[1]),
        icon: {
          path: google.maps.SymbolPath.CIRCLE,
          scale: 10
        },
        map: map
    });
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
    
<?php var_dump($model->areaContainsPoint($model->client_id));

