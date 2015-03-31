<?php

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('/')),
	array('label'=>'Manage Area', 'url'=>array('admin')),
);
?>

<h1>Create Area</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>