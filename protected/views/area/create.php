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

<div class="area-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<?php echo $form->labelEx($model,'area_name'); ?>
		<?php echo $form->textField($model,'area_name',array('size'=>25,'maxlength'=>25)); ?>
		
	</div>

	<!-- <div class="row" id="points_id">
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->error($model,'area_name'); ?>
		<?php echo $form->labelEx($model,'geo'); ?>
		<?php echo $form->textField($model,'geo'); ?>
		<?php echo $form->error($model,'geo'); ?>
	</div> -->

	<button type="button" class="btn btn-primary" name="show" id="show" onclick="showArea()">Show Zone</button>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->