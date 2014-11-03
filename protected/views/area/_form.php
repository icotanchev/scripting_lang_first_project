<?php
/* @var $this AreaController */
/* @var $model Area */
/* @var $form CActiveForm */
?>

<div class="form">

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

    <div class="row">
      <?php 
        echo CHtml::activeDropDownList($model, 'client_id', $model->getClients())
      ?>
    </div>
    <br>
    <br>
    
    <input type="hidden" name="points" id="points">
    <br>
    <br>
    <button type="button" class="btn btn-primary" name="show" id="show" onclick="showArea()">Show Zone</button>
    <br>
    <br>
    <div class="row buttons" id="create_area_button">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->