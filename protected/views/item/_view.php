
<li class="clearfix">
    <div class="txt">
        <?php echo CHtml::link(GxHtml::encode($data->name),array('index','id'=>$data->id),array('class'=>'tip','data-original-title'=>'编辑')); ?>
    </div>
    
    <div class="pull-right">
        <?php echo CHtml::link('<i class="icon-remove"></i>',"#", array('data-original-title'=>'删除',"submit"=>array('delete', 'id'=>$data->id), 'confirm' => '你确定要删除它么？','class'=>'tip')); ?>
        
    
    </div>
</li>