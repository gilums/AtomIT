<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $nombre
 * @property string $rut
 * @property string $razon_social
 * @property string $direccion
 * @property string $email
 * @property string $web
 * @property integer $telefono
 * @property string $agencia
 * @property string $nota
 * @property integer $id_departamento
 * @property integer $id_ciudad
 * @property integer $id_barrio
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property Barrio $idBarrio
 * @property Contactos[] $contactoses
 * @property Ordenes[] $ordenes
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		// return array(
		// 	array('telefono, id_barrio', 'numerical', 'integerOnly'=>true),
		// 	array('nombre, razon_social, email, web, agencia', 'length', 'max'=>50),
		// 	array('rut', 'length', 'max'=>30),
		// 	array('direccion', 'length', 'max'=>100),
		// 	array('nota, fecha_creacion', 'safe'),
		// 	// The following rule is used by search().
		// 	// @todo Please remove those attributes that should not be searched.
		// 	array('id, nombre, rut, razon_social, direccion, email, web, telefono, agencia, nota, id_barrio, fecha_creacion', 'safe', 'on'=>'search'),
		// );

		return array(
            array('id_departamento, id_ciudad, rut', 'required'),
            array('id_empresa, telefono, id_departamento, id_ciudad, id_barrio', 'numerical', 'integerOnly'=>true),
            array('nombre, razon_social, email, web, agencia', 'length', 'max'=>50),
            array('rut', 'length', 'max'=>30),
            array('direccion', 'length', 'max'=>100),
            array('nota, fecha_creacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_empresa, nombre, rut, razon_social, direccion, email, web, telefono, agencia, nota, id_departamento, id_ciudad, id_barrio, fecha_creacion', 'safe', 'on'=>'search'),
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
			'barrio' => array(self::BELONGS_TO, 'Barrio', 'id_barrio'),
			'contactos' => array(self::HAS_MANY, 'Contactos', 'id_cliente'),
			'ordenes' => array(self::HAS_MANY, 'Ordenes', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_empresa' => 'Id Empresa',
            'nombre' => 'Nombre',
            'rut' => 'CI/Rut',
            'razon_social' => 'Razon Social',
            'direccion' => 'Direccion',
            'email' => 'Email',
            'web' => 'Web',
            'telefono' => 'Telefono',
            'agencia' => 'Agencia',
            'nota' => 'Nota',
            'id_departamento' => 'Id Departamento',
            'id_ciudad' => 'Id Ciudad',
            'id_barrio' => 'Id Barrio',
            'fecha_creacion' => 'Fecha Creacion',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('agencia',$this->agencia,true);
		$criteria->compare('nota',$this->nota,true);
		$criteria->compare('id_barrio',$this->id_barrio);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getMenuDepartamentos(){
		$departamentos=Departamento::model()->findAll();
		return CHtml::listData($departamentos, 'id','nombre');
	}

	public function getMenuCuidades($defaultDepartamento=1){
		 return CHtml::listData(Ciudad::model()->findAll('id_departamento=?',array($defaultDepartamento)), 'id','nombre');
	}

	public function getMenuBarrios($defaultCiudad=0,$defaultDepartamento=0){
		 return CHtml::listData(Barrio::model()->findAll('id_ciudad=? AND id_departamento=?',array($defaultCiudad,$defaultDepartamento)), 'id','nombre');
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
