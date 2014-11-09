<?php
/* @var $this AreaController */
/* @var $data Area */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_name')); ?>:</b>
	<?php echo CHtml::encode($data->area_name); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
        <?php
            echo array_values(Client::getClientName($data->client_id))[0]['name'];
        ?><br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('geo')); ?>:</b>
        <?php echo Area::getAreaPoints($data->id);?><br />

</div>