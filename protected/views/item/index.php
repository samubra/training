<?php
$this->breadcrumbs = array(
    Item::label(2),
    Yii::t('app', 'Index'),
);
$this->headTitle = GxHtml::encode(Item::label(2));
$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Item::label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage') . ' ' . Item::label(2), 'url' => array('admin')),
);
?>
<div class="row-fluid">
    
    <div class='span6'>
    <?php
        $tempTypeList=Item::getTypes();
        foreach($tempTypeList as $value){
            if($value==='category')
                continue;
    ?>
         
        
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list"></i></span>
                <h5><?php echo Item::getTypeText($value);?>列表</h5>
            </div>
           <!-- <div class="widget-content nopadding fix_hgt" style="height:250px">-->
                <div class="widget-content nopadding">
                    <?php
                    $this->widget('bootstrap.widgets.TbListView', array(
                        'dataProvider' => $this->getActiveDataProvider($value),
                        'itemView' => '_view',
                        'enablePagination'=>true,
                        'template'=>'{items}{pager}',
                        'itemsTagName'=>'ul',
                        'itemsCssClass'=>'activity-list',
                        'htmlOptions'=>array(
                            'class'=>'todo'
                        )
                    ));
                    ?>
            </div>
        </div>
    
    <?php        
        }
    ?>
    </div>
    <div class='span6'>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-plus"></i></span>
                <h5>添加数据</h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                $this->renderPartial('_form', array(
                    'model' => $createModel,
                    'action'=>$createModel->isNewrecord?'item/create':'item/update/'.$_GET['id'],
                    'buttons' => 'create'));
                ?>
            </div>
        </div>
    </div>

</div>
