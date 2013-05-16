<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'manager'); ?>
		<?php echo $form->textField($model, 'manager', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'start'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'start',
			'value' => $model->start,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'end'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'end',
			'value' => $model->end,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_time'); ?>
		<?php echo $form->textField($model, 'create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
