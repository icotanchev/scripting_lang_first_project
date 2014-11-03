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
	'enableAjaxValidation'=>false,
)); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model,'area_name'); ?>
        <?php echo $form->textField($model,'area_name',array('size'=>25,'maxlength'=>25)); ?>
    </div>
    <br>
    <br>
    <!--<?php echo $form->errorSummary($model); ?>

    <?php echo $form->error($model,'area_name'); ?>
    <?php echo $form->labelEx($model,'geo'); ?>
    <?php echo $form->textField($model,'geo'); ?>
    <?php echo $form->error($model,'geo'); ?> -->
    
    <input type="hidden" name="points" id="points">
    <br>
    <br>
    <button type="button" class="btn btn-primary" name="show" id="show" onclick="showArea()">Show Zone</button>
    <br>
    <br>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>