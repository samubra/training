<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);
$this->blockTitle=Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label());
$this->blockIcon='isw-edit';
$this->menu = array(
	array('label'=>'','icon'=>'isw-settings', 'url' => array('index')),
);
?>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>