
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'venture-class-form',
	'enableAjaxValidation' => true,
	'type'=>'horizontal',
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>
	<fieldset>
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->textFieldRow($model, 'code', array('maxlength' => 20)); ?>
		<?php echo $form->textFieldRow($model, 'phone', array('maxlength' => 11)); ?>
		<?php echo $form->textFieldRow($model, 'manager', array('maxlength' => 20)); ?>
		<?php echo $form->datepickerRow($model, 'start',
						array(
						      'hint'=>'Click inside! This is a super cool date field.',
						      'prepend'=>'<i class="icon-calendar"></i>',
						      'options'=>array(
								       'format'=>'yyyy-mm-dd',
								       'language'=>'zh-CN',
								       'weekStart'=>'1',
								       'showButtonPanel' => true,
				'changeYear' => true,
								       )
						      )
						); ?>
		<?php echo $form->datepickerRow($model, 'end',
						array(
						      'hint'=>'Click inside! This is a super cool date field.',
						      'prepend'=>'<i class="icon-calendar"></i>',
						      'options'=>array(
								       'format'=>'yyyy-mm-dd',
								       'language'=>'zh-CN',
								       'weekStart'=>'1'
								       )
						      )
						); ?>
		

		<label><?php echo GxHtml::encode($model->getRelationLabel('course')); ?></label>
		<?php echo $form->checkBoxList($model, 'course', GxHtml::encodeEx(GxHtml::listDataEx(Course::model()->findAllAttributes(null, true)), false, true)); ?>
		</fieldset>
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		    </div>
<?php
$this->endWidget();
?>