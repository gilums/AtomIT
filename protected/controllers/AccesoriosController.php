<?php

class AccesoriosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/principal';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','create','update','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
/*	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
*/
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Accesorios;
        $historial = new Historial;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Accesorios']))
		{
			$model->attributes=$_POST['Accesorios'];
            
            $historial->id_usuario=Yii::app()->user->getId();
			$historial->tipo="Create";
			$historial->estilo="Success";
			$historial->descripcion="Creo el accesorio: " . $model->nombre;
            
			if($model->save()){
                $historial->save();
                Yii::app()->user->setFlash('Success ', 'Se creo correctamente el accesorio');
				$this->redirect(array('index'));
				//$this->redirect(array('view','id'=>$model->id));
            }else{
                Yii::app()->user->setFlash('Error', '<strong>Error!!</strong> al crear accesorio');
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $historial= new Historial;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Accesorios']))
		{
			$model->attributes=$_POST['Accesorios'];
            
            $historial->id_usuario=Yii::app()->user->getId();
			$historial->tipo="Update";
			$historial->estilo="Warning";
			$historial->descripcion="Modifico el accesorio: " . $model->nombre;
            
			if($model->save()){
                $historial->save();
                Yii::app()->user->setFlash('Info', 'Se modifico correctamente el accesorio');
				$this->redirect(array('index'));
				//$this->redirect(array('view','id'=>$model->id));
            }else{
                Yii::app()->user->setFlash('Error', '<strong>Error!!</strong> al modificar accesorio');
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $cpy=$this->loadModel($id);
		$this->loadModel($id)->delete();
        
        $historial = new Historial;
		$historial->id_usuario=Yii::app()->user->getId();
        $historial->tipo="Delete";
        $historial->estilo="Error";
		$historial->descripcion="Elimino el accesorio: " . $cpy->nombre;
		$historial->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	/*
		$dataProvider=new CActiveDataProvider('Accesorios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		
		$model=new Accesorios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Accesorios']))
			$model->attributes=$_GET['Accesorios'];

		$this->render('index',array(
			'model'=>$model,
		));
	
	}

	/*
	public function actionAdmin()
	{
		$model=new Accesorios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Accesorios']))
			$model->attributes=$_GET['Accesorios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	*/
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Accesorios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Accesorios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Accesorios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='accesorios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
