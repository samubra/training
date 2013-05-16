<?php

class VentureController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VentureClass'),
		));
	}

	public function actionCreate() {
		$model = new VentureClass;


		if (isset($_POST['VentureClass'])) {
			$model->setAttributes($_POST['VentureClass']);
			$relatedData = array(
				'course' => $_POST['VentureClass']['course'] === '' ? null : $_POST['VentureClass']['course'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'VentureClass');


		if (isset($_POST['VentureClass'])) {
			$model->setAttributes($_POST['VentureClass']);
			$relatedData = array(
				'course' => $_POST['VentureClass']['course'] === '' ? null : $_POST['VentureClass']['course'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'VentureClass')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VentureClass');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VentureClass('search');
		$model->unsetAttributes();

		if (isset($_GET['VentureClass']))
			$model->setAttributes($_GET['VentureClass']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}