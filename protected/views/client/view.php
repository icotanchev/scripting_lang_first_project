<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Client', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Update Client', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Client', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Client', 'url'=>array('admin')),
);
?>

<h1>View Client #<?php echo $model->id; ?></h1>

<div id="map_card" style="width: 50em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223); margin-bottom: 20px;"></div>

<?php $this->widget('yiibooster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'info',
	),
)); ?>

<input type="hidden" name="client_pos" id="client_position" value="<?php echo Client::model()->getClientPosition($model->id);?>">

<script>
    var clients_position = jQuery("#client_position")[0].value.replace('POINT(', '').replace(')', '').split(' ');
    var myPosition = new google.maps.LatLng(clients_position[0], clients_position[1]);
    
    var mapOptions = {
        zoom: 16,
        center: myPosition,
    };

    var map = new google.maps.Map(document.getElementById('map_card'), mapOptions);
    
    var contentString = '<div id="content">'+
      '<b> Lat: '+clients_position[0]+'</b><br>'+
      '<b> Lng: '+clients_position[1]+'</b>'+
      '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 200
    });
    
    var client_marker = new google.maps.Marker({
        position: myPosition,//new google.maps.LatLng(clients_position[0], clients_position[1]),
        icon: {
          path: google.maps.SymbolPath.CIRCLE,
          scale: 10
        },
        map: map
    });
    
     
    
    google.maps.event.addListener(client_marker, 'click', function() {
        infowindow.open(map,client_marker);
      });
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
