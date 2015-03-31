<?php

$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('/')),
	array('label'=>'Create Area', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#area-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Areas</h1>

<?php $this->widget('yiibooster.widgets.TbGridView', array(
	'id'=>'area-grid',
        'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'area_name',
		array(
                    'class'=>'yiibooster.widgets.TbButtonColumn'
		),
	),
)); ?>
