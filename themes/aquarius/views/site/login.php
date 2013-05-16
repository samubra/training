<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

Yii::import('bootstrap.widgets.input.*');
?>


<div class="loginBlock" id="login" style="display: block;">
        <h1>欢迎，请先登陆！</h1>
        <div class="dr"><span></span></div>
        <div class="loginForm">
        <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'loginForm',
		'type'=>'horizontal',
		'clientOptions'=>array(
		 'validateOnSubmit'=>true,
		    ),
	    )); ?>

                <div class="control-group">
                    <div class="input-prepend">
                        <span class="add-on"><span class="icon-user"></span></span>
                        <?php echo $form->textField($model, 'username', array('placeholder'=>'用户名','class'=>'validate[required]')); ?>
                    </div>                
                </div>
                <div class="control-group">
                    <div class="input-prepend">
                        <span class="add-on"><span class="icon-lock"></span></span>
                        <?php echo $form->passwordField($model, 'password', array('placeholder'=>'密码','class'=>'validate[required]')); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group" style="margin-top: 5px;padding-left:21px ">
                            <label class="checkbox"><input type="checkbox" name="LoginForm[rememberMe]">记住我</label>                                                
                        </div>                    
                    </div>
                    <div class="span4">
                        <button type="submit" class="btn btn-block">登  入</button>       
                    </div>
                </div>
            <?php $this->endWidget(); ?>   
            <div class="dr"><span></span></div>
            <div class="controls">
                <div class="row-fluid">
                    <div class="span6">
                        <a class="btn btn-link btn-block" href="<?php echo url('/site/registration')?>">忘记密码?</a>
                    </div>
                    <div class="span2"></div>
                    <div class="span4">
                        <a class="btn btn-link btn-block" href="<?php echo url('/site/registration')?>">注册</a>
                    </div>
                </div>
            </div>
        </div>
</div>      
    
<?php
Yii::app()->clientScript->registerScript('valueform', "
$(document).ready(function() { 
$('#loginForm').validationEngine() 
});
");
?>
