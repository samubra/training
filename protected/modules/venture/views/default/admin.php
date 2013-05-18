<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
	array('label'=>'', 'url' => array('create'),'icon' => 'isw-edit',),
	//array('label'=>'','url' => array('admin'),'icon' => 'isw-settings'),
);
$this->blockTitle=GxHtml::encode(VentureClass::label(2)).Yii::t('app', 'List');
$this->blockIcon='isw-list';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('venture-class-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
	


<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'venture-class-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'code',
		'phone',
		'manager',
		'start',
		/*
		'end',
		'create_time',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>