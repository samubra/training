<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
                    <div class="span12">                    
                        <div class="head clearfix">
                            <div class="<?php echo $this->blockIcon;?>"></div>
                            <h1><?php echo CHtml::encode($this->blockTitle);?></h1>   
                            <?php if($this->menu){?>
                                <?php 
                                    $this->widget('Menu', array(
										'items'=>$this->menu,
										'htmlOptions'=>array('class'=>'buttons'),
									));
									?>
                            <?php }?>                       
                        </div>
                        <div class="block">
                            <?php echo $content; ?>
                        </div>
                    </div>   


<?php $this->endContent(); ?>