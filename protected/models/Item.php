<?php

Yii::import('application.models._base.BaseItem');

class Item extends BaseItem {

    const TYPE_INDUSTRY = 'industry';//所属行业
    const TYPE_BUSINESS = 'business';//企业类型
    const TYPE_OPERATION = 'operation';//准操项目
    const TYPE_CERTIFICATE = 'certificate';//证书类型
    const TYPE_CATEGORY = 'category';//培训类别

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name,type','required'),
            array('name, slug', 'length', 'max' => 200),
            array('type', 'length', 'max' => 32),
            array('type', 'in', 'range' => self::getConstants('TYPE_', __CLASS__)),
            array('uid, other,parent, slug, type', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, uid, parent, other，name, slug, type', 'safe', 'on' => 'search'),
        );
    }

    public static function getStatuses() {
        return self::getConstants('STATUS_', __CLASS__);
    }

    public static function getTypes() {
        $types=self::getConstants('TYPE_', __CLASS__);
        
        return $types;
    }
    public static function getTypeList(){
        $types=self::getTypes();
        $types['industry']='行业名称';
        $types['business']='企业类型';
        $types['operation']='准操项目';
        $types['certificate']='证书类别';
        $types['category']='培训类别';
        return $types;
    }
    public static function getTypeText($type){
        $typeList=self::getTypeList();
        return isset($typeList[$type])?$typeList[$type]:null;
    }
    
    
    public function relations() {
        return array(
            'parent' => array(self::BELONGS_TO, 'Item', 'parent'),
            'user' => array(self::BELONGS_TO, 'User', 'uid')
        );
    }

    public function pivotModels() {
        return array(
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('uid', $this->uid, true);
        $criteria->compare('parent', $this->parent, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}