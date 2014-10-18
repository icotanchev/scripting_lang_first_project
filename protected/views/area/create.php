<?php
/* @var $this AreaController */
/* @var $model Area */

$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('index')),
	array('label'=>'Manage Area', 'url'=>array('admin')),
);
?>

<h1>Create Area</h1>

<div id="map-canvas" style="width: 50em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);"></div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>