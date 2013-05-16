
    <?php
    /** @var BootActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'item-form',
        'type' => 'horizontal',
        'action'=>url($action),
        'enableAjaxValidation' => true,
        'htmlOptions'=>array('class'=>'form-horizontal')
    ));
    ?>
<fieldset>
 
<?php echo $form->dropDownListRow($model, 'type',  Item::getTypeList(), array('maxlength' => 32,'options'=>array(isset($_GET['type'])?$_GET['type']:'industry'=>array('selected'=>'selected')))); ?>
<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 200)); ?>
<?php echo $form->textFieldRow($model, 'slug', array('maxlength' => 200)); ?>
<?php echo $form->textFieldRow($model,'other',array('maxlength'=>200));?>



    
</fieldset>
<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'保存')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'重置')); ?>
    </div>
<?php
    $this->endWidget();
    ?>