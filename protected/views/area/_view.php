<?php
/* @var $this AreaController */
/* @var $data Area */
?>

 <?php
   if(array_values(Area::areaContainsPoint($data->client_id, $data->id)[0])[0] != '1'){
        echo '<div class="panel panel-warning">';
    } else {
        echo '<div class="panel panel-success">';
    }
?>

    <div class="panel-heading"><b><?php echo CHtml::encode($data->getAttributeLabel('area_name')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->area_name), array('view', 'id'=>$data->id)); ?>
            <br /></div>
    <div class="panel-body">
        <div class="view_with_padding">
            <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
            <?php
                echo CHtml::link(CHtml::encode(array_values(Client::getClientName($data->client_id))[0]['name']), array('client/view', 'id' => $data->client_id));
            ?><br />
        </div>
        
        <div class="view_with_padding">
            <b><?php echo CHtml::encode($data->getAttributeLabel('geo')); ?>:</b>
            <?php echo Area::getAreaPoints($data->id);?><br />
        </div>
    </div>
</div>