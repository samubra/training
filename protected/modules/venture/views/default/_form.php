
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'venture-class-form',
		'enableAjaxValidation' => true,
		'type'=>'horizontal',
));
?>

<fieldset>
<?php echo $form->dateRangeRow($model, 'starend',
			array(
					'append'=>'<i class="icon-calendar"></i>',
					'options' => array('format'=>'yyyy-MM-dd',
							'locale'=>array(
            						'applyLabel'=>"确定",
									'fromLabel'=>"开始",
									'toLabel'=>"结束",
									'customRangeLabel'=>"Custom Range",
									'daysOfWeek'=>array('日', '一', '二', '三', '四', '五','六'),
									'monthNames'=>array('一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十', '十一月', '十二月'),
									'firstDay'=>1
        							),
							'callback'=>'js:function(start, end){console.log(start.toString("yyyy-MM-d") + " ~ " + end.toString("yyyy-MM-d"));}')
        )); ?>
	<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 255)); ?>
	<?php echo $form->textFieldRow($model, 'code', array('maxlength' => 20)); ?>
	<?php echo $form->textFieldRow($model, 'phone', array('maxlength' => 11)); ?>
	<?php echo $form->textFieldRow($model, 'manager', array('maxlength' => 20)); ?>
	
</fieldset>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord?t('app','Add'):t('app','Save'))); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>t('app','Reset'))); ?>
</div>
<?php
$this->endWidget();
?>