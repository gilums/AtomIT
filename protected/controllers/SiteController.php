<?php

class SiteController extends Controller
{

    
    
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
	}
	/**
	 * Declares class-based actions.
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','logout'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
        
        //Yii::app()->authManager->createRole('super');
        //Yii::app()->authManager->createRole('admin');
        //Yii::app()->authManager->assign('admin',1);
        
//        $usu = new Usuarios;
//        $usu->nick='super';
//        $usu->pass='supera2014';
//        $usu->pin=4681;
//        $usu->nombre='Super';
//        $usu->apellido='Administrador';
//        $usu->direccion='Ficticia 1234';
//        $usu->email='super@dominio.com';
//        $usu->celular=123456;
//        //$usu->estado='1';
//        $usu->sesion='super';
//        $usu->save();
        
        //$model = Usuarios::model()->find('nick="super"');
        //Yii::app()->authManager->assign('super',$model->id);
        
//        $usu2 = new Usuarios;
//        $usu2->nick='admin';
//        $usu2->pass='admina2014';
//        $usu2->pin='4681';
//        $usu2->nombre='Admin';
//        $usu2->apellido='Administrador';
//        $usu2->direccion='Ficticia 1234';
//        $usu2->email='admin@dominio.com';
//        $usu2->celular='123456';
//        $usu2->estado='1';
//        $usu2->sesion='admin';
//        $usu2->save();
        
        $model=new Ordenes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordenes']))
			$model->attributes=$_GET['Ordenes'];

		$this->render('index',array(
			'model'=>$model,
		));
        
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}