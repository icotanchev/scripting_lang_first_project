<?php
/* @var $this AreaController */
/* @var $model Area */
/* @var $form CActiveForm */
?>

<div class="form">

<div id="map-canvas" style="width: 50.6em; height: 30em; position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);"></div>

<div class="area-form">
    <?php
        $form = $this->beginWidget(
        'yiibooster.widgets.TbActiveForm',
             array(
                'id' => 'area-form',
                'htmlOptions' => array('class' => 'well', 'onsubmit' => 'return validateClientPresense();'), // for inset effect
                'method'=>'post',
            )
        );
 
        echo $form->textFieldGroup($model, 'area_name');

        echo $form->dropDownListGroup($model, 'client_id',
                                                            array('wrapperHtmlOptions' => array('class' => 'col-sm-5',),
                                                                  'widgetOptions' =>  array('data' => $model->getClients(),
                                                                                             'htmlOptions' => array(),)
                                                            )
                                    ); ?>

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
    
<input type="hidden" name="points" id="points">
<?php $this->endWidget();
unset($form); ?>
</div>