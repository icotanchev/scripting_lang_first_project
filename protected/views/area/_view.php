 <?php
    echo "<div class='panel' id='area_header_".$data->id."'>";
?>
    <div class="panel-heading"><b><?php echo CHtml::encode($data->getAttributeLabel('area_name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->area_name), array('view', 'id'=>$data->id)); ?>
        <div class='class_for_area_id', visibility: hidden><?php echo $data->id; ?></div>
        <br />
    </div>
    <div class="panel-body">
        <div class="view_with_padding">
            <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode(array_values(Client::getClientName($data->client_id))[0]['name']), array('client/view', 'id' => $data->client_id)); ?>
            <div class='class_for_client_id', visibility: hidden><?php echo $data->client_id; ?></div>
            <br />
        </div>
        
        <div class="view_with_padding">
            <b><?php echo CHtml::encode($data->getAttributeLabel('geo')); ?>:</b>
            <?php echo Area::getAreaPoints($data->id);?><br />
        </div>
    </div>
</div>