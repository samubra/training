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

<h2>
	<?php echo Yii::t('LookupModule.ui','Lookup Names'); ?>
</h2>
<div class="row-fluid">

	<div class="span6">
		<div class="block-fluid without-head">
			<div class="toolbar nopadding-toolbar clear clearfix">
				<h4>类别列表</h4>
			</div>
			<?php $this->widget('zii.widgets.CMenu', array(
					'items'=>Lookup::model()->menu,
					'htmlOptions'=>array('class'=>'list nol'),
							)); ?>

		</div>
	</div>
	<div class="span6">
		<?php if(Yii::app()->user->canAccess(8)):?>
		<div class="block-fluid nm without-head">
			<div class="toolbar nopadding-toolbar clear clearfix">
				<h4>添加数据</h4>
			</div>

				<?php $this->renderPartial('_indexForm',array(
						'model'=>$model,
								)); ?>

		</div>
		<?php endif; ?>
		<br>
			<div class="block-fluid without-head">
				<?php if($adminMode!=null){?>
				<div class="toolbar nopadding-toolbar clear clearfix">
					<h4><?php echo $adminMode->getTypeText($adminMode->type); ?></h4>
				</div>
				<?php

			$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped condensed',
					'id'=>'lookup-grid',
					'htmlOptions'=>array('calss'=>'block-fluid'),
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
									'htmlOptions'=>array('style'=>'width:80px'),
									'header'=>'操作',
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
				 }else{?>
				 没有数据
				 <?php }?>
			</div>
		</div>
		
</div>


