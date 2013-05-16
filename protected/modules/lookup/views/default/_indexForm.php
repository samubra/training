<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'lookup-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=> array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>false,
	),
)); ?>

		<?php echo $form->textFieldRow($model,'type',array('size'=>32,'disabled'=>(!$model->isNewrecord||isset($_GET['type'])))); ?>
		<?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->textFieldRow($model,'value',array('size'=>60,'maxlength'=>256)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewrecord?Yii::t('LookupModule.ui', 'Create'):Yii::t('LookupModule.ui', 'Update'))); ?>
	</div>

<?php $this->endWidget(); ?>