<?php

Yii::import('application.models._base.BaseCourse');

class Course extends BaseCourse
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}