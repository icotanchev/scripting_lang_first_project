<?php
/* @var $this AreaController */
/* @var $data Area */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <?php
            if(array_values(Area::areaContainsPoint($data->client_id, $data->id)[0])[0] != '1'){
                echo "<div class=view>";
            } else {
                echo "<div class=view_with_contain>";
            }
        ?>
            <b><?php echo CHtml::encode($data->getAttributeLabel('area_name')); ?>:</b>
            <?php echo CHtml::encode($data->area_name); ?>
            <br />
        </div>
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
        <?php
            echo array_values(Client::getClientName($data->client_id))[0]['name'];
        ?><br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('geo')); ?>:</b>
        <?php echo Area::getAreaPoints($data->id);?><br />

</div>