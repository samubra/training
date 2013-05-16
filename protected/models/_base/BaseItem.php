<?php

/**
 * This is the model base class for the table "item".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Item".
 *
 * Columns in table "item" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $uid
 * @property string $parent
 * @property string $name
 * @property string $slug
 * @property string $type
 *
 */
abstract class BaseItem extends BaseActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'item';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Item|Items', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('uid, parent', 'length', 'max'=>10),
			array('name, slug', 'length', 'max'=>200),
			array('type', 'length', 'max'=>32),
			array('uid, parent, name, slug, type', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, uid, parent, name, slug, type', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'uid' => Yii::t('app', 'Uid'),
			'parent' => Yii::t('app', 'Parent'),
			'name' => Yii::t('app', 'Name'),
			'slug' => Yii::t('app', 'Slug'),
			'type' => Yii::t('app', 'Type'),
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