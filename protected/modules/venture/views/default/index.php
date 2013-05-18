<?php

$this->breadcrumbs = array(
	VentureClass::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>'', 'url' => array('create'),'icon' => 'isw-edit',),
	array('label'=>'','url' => array('admin'),'icon' => 'isw-settings'),
);
$this->blockTitle=GxHtml::encode(VentureClass::label(2)).Yii::t('app', 'List');
$this->blockIcon='isw-list';
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 