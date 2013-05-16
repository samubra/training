<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('item-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'item-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 40px'),'filter'=>false),
		
		//'parent',
		array('name'=>'name',),
		array('name'=>'other','filter'=>false,'htmlOptions'=>array('style'=>'width: 60px')),
		//'slug',
		array('name'=>'type','value'=>'Item::getTypeText($data->type)','filter'=>Item::getTypeList(),'htmlOptions'=>array('style'=>'width: 100px')),
		//array('name'=>'uid','value'=>'$data->user->username','htmlOptions'=>array('style'=>'width: 100px')),
		array(
			'htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'updateButtonUrl'=>'url("item/index",array("id"=>$data->id))',
		),
	),
)); ?>