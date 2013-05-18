<?php
$this->pageTitle=Yii::app()->name.' - '.Yii::t('LookupModule.ui','Lookup Names');
$this->breadcrumbs=array(
	Yii::t('LookupModule.ui','Lookup Names'),
);
Yii::app()->clientScript->registerScript('search', "
	$('.new-type-button').click(function(){
		$('.new-type-form').toggle();
		return false;
	});
");
?>

<h2><?php echo Yii::t('LookupModule.ui','Lookup Names'); ?></h2>
<div class="row-fluid">
<div class="span6">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th-list"></i></span>
            <h5>类别列表</h5>
          </div>
          <div class="widget-content nopadding">
		<?php $this->widget('zii.widgets.CMenu', array(
			'items'=>Lookup::model()->menu,
			'htmlOptions'=>array('class'=>'activity-list'),
		)); ?>
          </div>
        </div>
</div>
<div class="span6">
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-plus"></i></span>
            <h5>添加类别</h5>
          </div>
          <div class="widget-content nopadding">
		<?php //if(Yii::app()->user->name=='admin'):?>
	<p><?php //echo CHtml::link(Yii::t('LookupModule.ui', 'New'),'#',array('class'=>'new-type-button')); ?></p>
	<div class="new-type-form" style="display:block">
		<?php $this->renderPartial('_indexForm',array(
			'model'=>$model,
		)); ?>
	</div>
	<?php //endif; ?>
          </div>
        </div>
	<?php if($adminMode!=null){?>
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-list"></i></span>
	    <h5><?php echo $adminMode->getTypeText($adminMode->type); ?></h5>
          </div>
	<?php
	
	$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'lookup-grid',
	'htmlOptions'=>array('calss'=>'widget-content nopadding'),
	'template'=>"{items}{pager}",
	'dataProvider'=>$adminMode->search(),
	'enableSorting'=>false,
	'columns'=>array(
		array(
			'name'=>'code',
			'visible'=>Yii::app()->user->canAccess(8),
			'htmlOptions'=>Array('style'=>'width:40px;')
		),
		array(
			'header'=>Yii::t('LookupModule.ui', 'Name'),
			'name'=>'name',
		),
		array(
			'header'=>Yii::t('LookupModule.ui', 'Value'),
			'name'=>'value',
			'htmlOptions'=>Array('style'=>'width:40px;')
		),
		array(
			'name'=>'position',
			'visible'=>Yii::app()->user->canAccess(8),
			'htmlOptions'=>Array('style'=>'width:40px;')
		),
		array(
			'htmlOptions'=>array('style'=>'width:60px'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{up} {down} {update} {delete}',
			'updateButtonUrl'=>'url("lookup/default/index",array("id"=>$data->id))',
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
));
	?>
	</div>
	<?php }?>
</div>
</div>


