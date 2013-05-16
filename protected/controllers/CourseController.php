<?php

class CourseController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Course'),
		));
	}

	public function actionCreate() {
		$model = new Course;

		$this->performAjaxValidation($model, 'course-form');

		if (isset($_POST['Course'])) {
			$model->setAttributes($_POST['Course']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Course');

		$this->performAjaxValidation($model, 'course-form');

		if (isset($_POST['Course'])) {
			$model->setAttributes($_POST['Course']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Course')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Course');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Course('search');
		$model->unsetAttributes();

		if (isset($_GET['Course']))
			$model->setAttributes($_GET['Course']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}