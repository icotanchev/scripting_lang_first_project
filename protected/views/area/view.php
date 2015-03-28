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
  <b id="client_info_id">Client #<?php echo $model->id; ?></b>
  <?php echo CHtml::link(CHtml::encode(array_values(Client::getClientName($model->client_id))[0]['name']), array('client/view', 'id' => $model->client_id));?><br />
</div>  


<div class="client_label"
  <b>Geo:</b>
  <div id="points_location_id"><?php echo $points; ?></div>
</div>

<div class="client_label"
  <b>Client cordinates:</b>
  <div id="client_position"><?php echo Client::model()->getClientPosition($model->client_id); ?></div>
</div>

<div id="area-form"></div>

<script>
  points = jQuery("#points_location_id").html().slice(0, -1).split(',');
  client = jQuery("#client_position")[0].innerText.replace('POINT(', '').replace(')', '').split(' ');

  initMap = new Map().initializeWithPoints(points, client);

  setTimeout(update_client_movment, 1000);
</script>