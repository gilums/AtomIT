<?php

/**
 * This is the model class for table "ordenes".
 *
 * The followings are the available columns in table 'ordenes':
 * @property integer $id
 * @property integer $id_equipo
 * @property string $fecha_ingreso
 * @property string $fecha_cierre
 * @property string $fecha_retiro
 * @property string $falla
 * @property string $diagnostico
 * @property string $solucion
 * @property string $nota
 * @property string $condicion
 * @property string $estado
 * @property string $transporte
 * @property integer $finalizada
 * @property integer $id_cliente
 *
 * The followings are the available model relations:
 * @property Clientes $idCliente
 * @property Equipos $idEquipo
 */
class Ordenes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_equipo, id_cliente', 'required'),
			array('id_equipo, finalizada, id_cliente', 'numerical', 'integerOnly'=>true),
			array('condicion, estado', 'length', 'max'=>19),
			array('transporte', 'length', 'max'=>9),
			array('fecha_ingreso, fecha_cierre, fecha_retiro, falla, diagnostico, solucion, nota', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_equipo, fecha_ingreso, fecha_cierre, fecha_retiro, falla, diagnostico, solucion, nota, condicion, estado, transporte, finalizada, id_cliente', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'clientes' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'equipo' => array(self::BELONGS_TO, 'Equipos', 'id_equipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_equipo' => 'Equipo',
			'fecha_ingreso' => 'Fecha Ingreso',
			'fecha_cierre' => 'Fecha Cierre',
			'fecha_retiro' => 'Fecha Retiro',
			'falla' => 'Falla',
			'diagnostico' => 'Diagnostico',
			'solucion' => 'Solucion',
			'nota' => 'Presupuesto',
			'condicion' => 'Condicion',
			'estado' => 'Estado',
			'transporte' => 'Transporte',
			'finalizada' => 'Finalizada',
			'id_cliente' => 'Cliente',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_equipo',$this->id_equipo);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_cierre',$this->fecha_cierre,true);
		$criteria->compare('fecha_retiro',$this->fecha_retiro,true);
		$criteria->compare('falla',$this->falla,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('solucion',$this->solucion,true);
		$criteria->compare('nota',$this->nota,true);
		$criteria->compare('condicion',$this->condicion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('transporte',$this->transporte,true);
		$criteria->compare('finalizada',$this->finalizada);
		$criteria->compare('id_cliente',$this->id_cliente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchb()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria(array(
            'order'=>'id DESC',
        ));

        //$criteria->addCondition("finalizada=0");

		$criteria->compare('id',$this->id);
		$criteria->compare('id_equipo',$this->id_equipo);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_cierre',$this->fecha_cierre,true);
		$criteria->compare('fecha_retiro',$this->fecha_retiro,true);
		$criteria->compare('falla',$this->falla,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('solucion',$this->solucion,true);
		$criteria->compare('nota',$this->nota,true);
		$criteria->compare('condicion',$this->condicion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('transporte',$this->transporte,true);
		$criteria->compare('finalizada',$this->finalizada);
		$criteria->compare('id_cliente',$this->id_cliente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ordenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
