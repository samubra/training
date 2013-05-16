<?php
/**
 * Controller.php
 *
 *@author: spiros kabasakalis <kabasakalis@gmail.com>
  * Date: 11/15/12
  * Time: 22:46 PM
 */
class Controller extends CController
{

    public function  init(){
        $this->registerJs();
        $this->registerCss();
    }

    public function registerJs(){
        cs()->registerScriptFile(bu().'/js/libs/modernizr-2.6.2.min.js',CClientScript::POS_HEAD);
        //cs()->registerScriptFile(bu().'/js/libs/jquery-1.8.2.min.js',CClientScript::POS_BEGIN);
        cs()->registerScriptFile(bu().'/js/plugins.js',CClientScript::POS_END);
       // cs()->registerScriptFile(bu().'/js/main.js',CClientScript::POS_END);
    }

    public function registerCss(){
      //cs()->registerCssFile(bu() .'/css/main.css');
       // cs()->registerCssFile(bu() .'/css/responsive_custom.css');
     }

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
    public $layout = '//layouts/col2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $headTitle='';
	public $headInfo='';
	
	public $blockIcon='aaa';
	public $blockTitle='demo';
	
	/**
	 *
	 * @param string $view 请求的视图文件
	 * @param array $data 传递的参数
	 * @param boolen $return 是否直接输出，默认为false表示不直接显示返回为需要显示的字符串
	 * @return max
	 */
	public function renderPartialWithHisOwnClientScript($view,$data=null, $return=false)
	{
	
		$mainClientScript=Yii::app()->clientScript;
		Yii::app()->setComponent('clientScript', new ZClientScript);
		$output=$this->renderPartial($view, $data,  true);
		$output.=Yii::app()->clientScript->renderOnRequest();
		Yii::app()->setComponent('clientScript', $mainClientScript);
	
		if ($return)
			return $output;
		else
			echo $output;
	}
}

class ZClientScript extends CClientScript
{
	/**
	 * Inserts the scripts at the beginning of the body section.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderOnRequest()
	{
		$html='';
		foreach($this->scriptFiles as $scriptFiles)
		{
			foreach($scriptFiles as $scriptFile)
				$html.=CHtml::scriptFile($scriptFile)."\n";
		}
		foreach($this->scripts as $script)
			$html.=CHtml::script(implode("\n",$script))."\n";

		if($html!=='')
			return $html;
	}

}