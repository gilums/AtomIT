<?php

class OrdenesController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
/*			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','create','update','index','view','orden','crearPdf','pdfUpdate'),
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
	public function actionView($id)
	{
/*		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
*/
		$this->render('pdfView',array(
			'model'=>$this->loadModel($id),
		));


	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ordenes;
		$equipo=new Equipos;
        $historial = new Historial;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
		$this->performAjaxValidation(array ($model,$equipo)); 
        
		if(isset ($_POST['Equipos'])) 
		{
			$equipo->attributes=$_POST['Equipos'];
			if($equipo->save())
			{	
				echo "<script>alert('".$equipo->id."');</script>";

				/*
				$sql='select max(id) from equipos;';
				$connection=Yii::app()->db; 
				$command=$connection->createCommand($sql); 
				$row=$command->queryRow(); 
				$row["max"]++; 
				$model->id_equipo=$row["max"];
				echo "<script>alert('".$model->id_equipo."');</script>";*/
				if(isset($_POST['Ordenes']))
				{	
					$model->id_equipo=$equipo->id;
					$model->fecha_ingreso=date('Y-m-d');
					$model->attributes=$_POST['Ordenes'];
                    
                    $historial->id_usuario=Yii::app()->user->getId();
                    $historial->tipo="Create";
                    $historial->estilo="Success";
                    $historial->descripcion="Creo la orden: " . $model->id;

					if ($_POST['Ordenes']['finalizada']==true) {
						$model->fecha_cierre=date('Y-m-d');
					}
					if ($_POST['Ordenes']['transporte']=='Enviado' || $_POST['Ordenes']['transporte']=='Entregado') {
						$model->fecha_retiro=date('Y-m-d');
					}
					if($model->save()){
                        $historial->save();
                        Yii::app()->user->setFlash('Success', 'Se creo correctamente la orden');
                        $this->redirect(array('site/index'));
                    }else{
                        Yii::app()->user->setFlash('Error', '<strong>Error!!</strong> al crear orden');
                    }
				}
			}
		}
		/*
		if(isset($_POST['Ordenes']))
		{
			$model->attributes=$_POST['Ordenes'];
			if($model->save())
				$this->redirect(array('index'));
		}
		*/

		$this->render('create',array(
			'model'=>$model,'equipo'=>$equipo
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
		// $this->performAjaxValidation($model);
		
        if(isset($_POST['upandimp']))
		{
			$model->attributes=$_POST['upandimp'];
            
            $historial->id_usuario=Yii::app()->user->getId();
			$historial->tipo="Update";
			$historial->estilo="Warning";
			$historial->descripcion="Modifico la orden: " . $model->id;

			$this->pdfUpdate($model->id);

			if($model->save()){
                $historial->save();
                Yii::app()->user->setFlash('Info', 'Se modifico correctamente la orden');
				$this->redirect(array('site/index'));
				//$this->redirect(array('view','id'=>$model->id));
            }else{
                Yii::app()->user->setFlash('Error', '<strong>Error!!</strong> al crear orden');
            }
		}
        
		if(isset($_POST['Ordenes']))
		{
			$model->attributes=$_POST['Ordenes'];
            
            $historial->id_usuario=Yii::app()->user->getId();
			$historial->tipo="Update";
			$historial->estilo="Warning";
			$historial->descripcion="Modifico la orden: " . $model->id;
            
			if($model->save()){
                $historial->save();
                Yii::app()->user->setFlash('Info', 'Se modifico correctamente la orden');
				$this->redirect(array('site/index'));
				//$this->redirect(array('view','id'=>$model->id));
            }else{
                Yii::app()->user->setFlash('Error', '<strong>Error!!</strong> al crear orden');
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
        
        $equipo=Equipos::model()->findByPk($cpy->equipo->id);
        if($equipo!=null){
            $equipo->delete();
        }
        
        $historial = new Historial;
		$historial->id_usuario=Yii::app()->user->getId();
        $historial->tipo="Delete";
        $historial->estilo="Error";
		$historial->descripcion="Elimino la orden: " . $cpy->id;
		$historial->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Ordenes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordenes']))
			$model->attributes=$_GET['Ordenes'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
/*	public function actionAdmin()
	{
		$model=new Ordenes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordenes']))
			$model->attributes=$_GET['Ordenes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ordenes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ordenes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ordenes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
   /*    public function actionSo($id){

        $model=$this->loadModel($id);
        $mPDF1 = Yii::app()->ePdf->mpdf();

        $mPDF1->WriteHTML(

            $this->render('pdf',array(

                'model'=>$model, true

            ))

        );

        $mPDF1->Output();

    }*/

    public function pdfUpdate($id){
    	//system.out.println("id: ".$id);
    	echo "<script>alert('".$id."');</script>";
    	$this->debug_to_console('id: '.$id);
        $model=$this->loadModel($id);
        /*$mPDF1 = Yii::app()->ePdf->mpdf();

        $mPDF1->WriteHTML(

            $this->render('pdfView_2',array(

                'model'=>$model, true

            ))

        );

        $mPDF1->Output();*/
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->render('pdfView_2', array('model'=>$model), true));
        $html2pdf->Output();

    }
    
/*    public function actionOrden(){

        $this->render('pdfView');

    }*/
    
    public function actionCrearPdf(){

        $mPDF1 = Yii::app()->ePdf->mpdf();

        $mPDF1->WriteHTML(

            $this->render('pdfView_2')

        );

        $mPDF1->Output();
    }


    public function debug_to_console( $data ) {

	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	    echo $output;
	}

}
