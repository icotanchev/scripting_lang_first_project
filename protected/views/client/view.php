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
  <div id="client_position"><?php echo Client::model()->getClientPosition($model->id); ?></div>
</div>

<script>
  client = jQuery("#client_position")[0].innerText.replace('POINT(', '').replace(')', '').split(' ');
  initMap = new Map().initializeClientPosition(client);

  var interval = 1000;  // 1000 = 1 second
  function update_client_movment() {
    find_client_id = jQuery("#client_info_id")[0].innerHTML.split("#")[1];
    
    $.ajax({
      type: 'POST',
      url: 'clientlocation/'+find_client_id,
      dataType: 'json',
      success: function (data) {
        new Map().listenForClientPositionChange(data)
      },
      complete: function (data) {
        setTimeout(update_client_movment, interval);
      }
    });
  }
  setTimeout(update_client_movment, interval);
</script>
