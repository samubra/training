<?php
$this->pageTitle=Yii::app()->name. ' - ' . Yii::t('LookupModule.ui','Lookup Names');
$this->breadcrumbs=array(
	Yii::t('LookupModule.ui','Lookup Names')=>array('index'),
	Yii::t('ui',XHtml::labelize($model->type)),
);

?>

<h2><?php echo Yii::t('ui',XHtml::labelize($model->type)); ?></h2>

<?php echo CHtml::link(Yii::t('LookupModule.ui', 'New'), url('/lookup/default/create',array('type'=>$model->type)));?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'lookup-grid',
	'dataProvider'=>$model->search(),
	'enableSorting'=>false,
	'columns'=>array(
		array(
			'name'=>'code',
			'visible'=>Yii::app()->user->canAccess(8),
			'htmlOptions'=>Array('style'=>'width:60px;')
		),
		array(
			'header'=>Yii::t('LookupModule.ui', 'Name'),
			'name'=>'name',
		),
		/*array(
			'header'=>Yii::t('LookupModule.ui', 'Name En'),
			'name'=>'name_en',
		),*/
		array(
			'name'=>'position',
			'visible'=>Yii::app()->user->canAccess(8),
			'htmlOptions'=>Array('style'=>'width:60px;')
		),
		array(
			'htmlOptions'=>array('style'=>'width:150px'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{up} {down} {update} {delete}',
			'updateButtonUrl'=>'url("lookup/default/update",array("id"=>$data->id))',
			'deleteButtonUrl'=>'url("lookup/default/delete",array("id"=>$data->id))',
			'deleteConfirmation'=>Yii::t('LookupModule.ui','Are you sure to delete this item?'),
			'buttons'=>array(
				'delete'=>array(
					'visible'=>'Yii::app()->user->canAccess(8)',
				),
				'up'=>array(
					'label'=>Yii::t('LookupModule.ui','Move up'),
					'url'=>'array("move","move"=>"up","id"=>$data->id)',
					//'imageUrl'=>$this->getModule()->baseScriptUrl.'/images/up.png',
					'icon'=>'icon-arrow-up',
					'click'=>'function() {
						$.fn.yiiGridView.update("lookup-grid", {
							type:"POST",
							url:$(this).attr("href"),
							success:function() {
								$.fn.yiiGridView.update("lookup-grid");
							}
						});
						return false;
					}',
				'visible'=>'$data->position > 1 ? true : false',
			),
			'down'=>array(
				'label'=>Yii::t('LookupModule.ui','Move down'),
				'url'=>'array("move","move"=>"down","id"=>$data->id)',
				//'imageUrl'=>$this->getModule()->baseScriptUrl.'/images/down.png',
				'icon'=>'icon-arrow-down',
				'click'=>'function() {
						$.fn.yiiGridView.update("lookup-grid", {
							type:"POST",
							url:$(this).attr("href"),
							success:function() {
								$.fn.yiiGridView.update("lookup-grid");
							}
						});
						return false;
					}',
				'visible'=>'$this->grid->dataProvider->itemCount > $data->position ? true : false',
			),
		),
		),
	),
)); ?>