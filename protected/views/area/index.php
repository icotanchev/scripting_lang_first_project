<?php
/* @var $this AreaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Areas',
);

$this->menu=array(
	array('label'=>'Create Area', 'url'=>array('create')),
	array('label'=>'Manage Area', 'url'=>array('admin')),
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
