<div class="panel panel-success">
    <div class="panel-heading">
        <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />
    </div>
  
    <div class="panel-body">
        <div class="view_with_padding">
            <b><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</b>
            <?php echo CHtml::encode($data->info); ?>
            <br />
        </div>
         <div class="view_with_padding">
            <b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
            <?php echo CHtml::encode($data->position);?><br />
        </div>
    </div>


</div>