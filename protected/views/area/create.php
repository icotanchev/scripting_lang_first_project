<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/map.js" ></script>

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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>