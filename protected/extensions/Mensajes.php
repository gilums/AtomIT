<?php

class Mensajes extends CApplicationComponent {
	
	public function init(){}

	public function getMensajes(){

        $criteria=new CDbCriteria;
        $criteria->condition='visto=:variable';
        $criteria->params=array(':variable'=>false);

        //$activos=Historial::model()->find()

		$dataProvider=new CActiveDataProvider('Historial',array(
                                                        'criteria'=>array(
                                                                'condition'=>'visto=false',
                                                                'order'=>'id DESC',
                                                                        ),
                                                        'pagination'=>array(
                                                                'pageSize'=>5,),
                                                                        )
                                                        );
		
        return $dataProvider;
	}
}
