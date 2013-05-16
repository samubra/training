<?php
Yii::import('zii.widgets.CBreadcrumbs');
class Breadcrumbs extends CBreadcrumbs{
		/**
         * @var string the tag name for the breadcrumbs container tag. Defaults to 'div'.
         */
        public $tagName='ul';
        /**
         * @var array the HTML attributes for the breadcrumbs container tag.
         */
        public $htmlOptions=array('class'=>'breadcrumb','style'=>'background:none');
        /**
         * @var boolean whether to HTML encode the link labels. Defaults to true.
         */
        public $encodeLabel=true;
        /**
         * @var string the first hyperlink in the breadcrumbs (called home link).
         * If this property is not set, it defaults to a link pointing to {@link CWebApplication::homeUrl} with label 'Home'.
         * If this property is false, the home link will not be rendered.
         */
        public $homeLink;
        /**
         * @var array list of hyperlinks to appear in the breadcrumbs. If this property is empty,
         * the widget will not render anything. Each key-value pair in the array
         * will be used to generate a hyperlink by calling CHtml::link(key, value). For this reason, the key
         * refers to the label of the link while the value can be a string or an array (used to
         * create a URL). For more details, please refer to {@link CHtml::link}.
         * If an element's key is an integer, it means the element will be rendered as a label only (meaning the current page).
         *
         * The following example will generate breadcrumbs as "Home > Sample post > Edit", where "Home" points to the homepage,
         * "Sample post" points to the "index.php?r=post/view&id=12" page, and "Edit" is a label. Note that the "Home" link
         * is specified via {@link homeLink} separately.
         *
         * <pre>
         * array(
         *     'Sample post'=>array('post/view', 'id'=>12),
         *     'Edit',
         * )
         * </pre>
         */
        public $links=array();
        /**
         * @var string the separator between links in the breadcrumbs. Defaults to ' &raquo; '.
         */
        public $separator='<span class="divider">></span>';

        /**
         * Renders the content of the portlet.
         */
        public function run()
        {
                if(empty($this->links))
                        return;

                echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
                $links=array();
                if($this->homeLink===null)
                        $links[]=CHtml::openTag('li')."\n".
                    			CHtml::link(Yii::t('zii','Home'),Yii::app()->homeUrl).
                    			CHtml::closeTag('li');
                else if($this->homeLink!==false)
                        $links[]=CHtml::openTag('li')."\n".$this->homeLink.CHtml::closeTag('li');
                foreach($this->links as $label=>$url)
                {
                        if(is_string($label) || is_array($url))
                                $links[]=CHtml::openTag('li')."\n".CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url).CHtml::closeTag('li');
                        else
                                $links[]=CHtml::openTag('li',array('class'=>'active'))."\n".'<span>'.($this->encodeLabel ? CHtml::encode($url) : $url).'</span>'.CHtml::closeTag('li');
                }
                echo implode($this->separator,$links);
                echo CHtml::closeTag($this->tagName);
        }
	}