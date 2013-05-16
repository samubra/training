<?php

class ItemController extends GxController {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('minicreate', 'create', 'update', 'admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Item'),
        ));
    }

    public function actionCreate() {
        $model = new Item;

        $this->performAjaxValidation($model, 'item-form');

        if (isset($_POST['Item'])) {
            $model->setAttributes($_POST['Item']);
            $model->uid = app()->user->id;
            
            if ($model->save()) {
                user()->setFlash('success', '数据添加成功！');
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('index','type'=>$model->type));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Item');

        $this->performAjaxValidation($model, 'item-form');

        if (isset($_POST['Item'])) {
            $model->setAttributes($_POST['Item']);

            if ($model->save()) {
                user()->setFlash('success', '数据保存成功！');
                $this->redirect(array('index','type'=>$model->type));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Item')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex($id = null) {
        $model = $id === null ? new Item : $model = $this->loadModel((int) $id, 'Item');
        $data['createModel']=$model;
        //dump($data);
        $this->render('index',$data);
    }

    public function actionAdmin() {
        $model = new Item('search');
        $model->unsetAttributes();

        if (isset($_GET['Item']))
            $model->setAttributes($_GET['Item']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function getActiveDataProvider($type){
            return new CActiveDataProvider('Item', array(
            'criteria' => array(
                'condition' => 'type=:type',
                'params'=>array(':type'=>$type),
                'order' => 'id DESC',
               // 'with' => array('parent'),
            ),
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));
        }
    

}