<div class="form">
    
    <div class="area-form">
    <?php
        $form = $this->beginWidget(
        'yiibooster.widgets.TbActiveForm',
             array(
                'id' => 'client-form',
                'htmlOptions' => array('class' => 'well'), // for inset effect
                'method'=>'post',
            )
        );
 
        echo $form->textFieldGroup($model, 'name');
        echo $form->textAreaGroup($model, 'info');
    ?>

    <div class="row buttons" id="create_area_button">
     <?php   $this->widget('yiibooster.widgets.TbButton',
                                            array(
                                            'label' => $model->isNewRecord ? 'Create' : 'Save',
                                            'context' => 'success',
                                            'buttonType' => 'submit',
                                             'size' => 'default',
                                            )
     ); ?>
     </div>
<?php $this->endWidget();
unset($form); ?>
</div>
</div>    