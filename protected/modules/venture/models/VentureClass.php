<?php

Yii::import('application.modules.venture.models._base.BaseVentureClass');

class VentureClass extends BaseVentureClass
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			$this->create_time=new CDbExpression('NOW()');
		}
		return parent::beforeValidate();
	}
	
	public function relations() {
		return array(
			'course'=>array(
				self::MANY_MANY,'Course','venture_class_course_relationship(class_id,course_id)'
			),
		);
	}
}