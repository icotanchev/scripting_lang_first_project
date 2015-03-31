<?php

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

<h1 id="client_info_id">View Client #<?php echo $model->id; ?></h1>

<div id="map-canvas" style="width: 50.6em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);"></div>

<?php $this->widget('yiibooster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'info',
	),
)); ?>

<div class="client_label"
  <b>Client cordinates:</b>
  <div id="client_position">
    <?php echo Client::model()->getClientPosition($model->id); ?>
  </div>
</div>

<script>
  client = jQuery("#client_position")[0].innerText.replace('POINT(', '').replace(')', '').split(' ');
  initMap = new Map().initializeClientPosition(client);

  setTimeout(update_client_movment, 1000);
</script>
