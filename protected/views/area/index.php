<?php

$this->breadcrumbs=array(
	'Areas',
);

$this->menu=array(
	array('label'=>'Create Area', 'url'=>array('create'), 'itemOptions'=>array('id' => 'create_area_side_menu')),
	array('label'=>'Manage Area', 'url'=>array('admin'), 'itemOptions'=>array('id' => 'manage_area_side_menu')),
);
?>
<?php $this->widget(
    'yiibooster.widgets.TbLabel',
    array(
        'context' => 'default',
        'label' => 'Areas'
    )
); ?>

<?php $this->widget('yiibooster.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    )
); ?>

<script>
    update_area();
</script>
