
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'lookup-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p><?php echo Yii::t('LookupModule.ui', 'Fields with {mark} are required',
	array('{mark}'=>'<span class="required">*</span>')); ?>
</p>


	<?php echo $form->hiddenField($model,'type'); ?>

	<?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>256)); ?>
	
	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord ? Yii::t('LookupModule.ui', 'Create') : Yii::t('LookupModule.ui','Save'),)); ?>
	<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnCancel',
			'value'=>'Cancel',
			'caption'=>Yii::t('LookupModule.ui', 'Cancel'),
			'url'=>url('/lookup/default/admin',array('type'=>$model->type)),
		)); ?>
	</div>

<?php $this->endWidget(); ?>