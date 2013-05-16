	<?php

/**
 * This is the model base class for the table "venture_member".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VentureMember".
 *
 * Columns in table "venture_member" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $uid
 * @property string $class_id
 * @property string $class_num
 * @property string $penson_type
 * @property string $gradunm
 * @property integer $status
 * @property string $remark
 * @property string $create_time
 * @property string $modified
 *
 */
abstract class BaseVentureMember extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'venture_member';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'VentureMember|VentureMembers', $n);
	}

	public static function representingColumn() {
		return 'class_num';
	}

	public function rules() {
		return array(
			array('id, uid', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('id, uid, class_id, penson_type', 'length', 'max'=>11),
			array('class_num', 'length', 'max'=>2),
			array('gradunm', 'length', 'max'=>20),
			array('remark', 'length', 'max'=>200),
			array('create_time, modified', 'length', 'max'=>10),
			array('class_id, class_num, penson_type, gradunm, status, remark, create_time, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, uid, class_id, class_num, penson_type, gradunm, status, remark, create_time, modified', 'safe', 'on'=>'search'),
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
			'class_id' => Yii::t('app', 'Class'),
			'class_num' => Yii::t('app', 'Class Num'),
			'penson_type' => Yii::t('app', 'Penson Type'),
			'gradunm' => Yii::t('app', 'Gradunm'),
			'status' => Yii::t('app', 'Status'),
			'remark' => Yii::t('app', 'Remark'),
			'create_time' => Yii::t('app', 'Create Time'),
			'modified' => Yii::t('app', 'Modified'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('uid', $this->uid, true);
		$criteria->compare('class_id', $this->class_id, true);
		$criteria->compare('class_num', $this->class_num, true);
		$criteria->compare('penson_type', $this->penson_type, true);
		$criteria->compare('gradunm', $this->gradunm, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('remark', $this->remark, true);
		$criteria->compare('create_time', $this->create_time, true);
		$criteria->compare('modified', $this->modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}