<?php

/**
 * This is the model class for table "historial".
 *
 * The followings are the available columns in table 'historial':
 * @property integer $id
 * @property integer $id_usuario
 * @property string $tipo
 * @property string $estilo
 * @property string $descripcion
 * @property integer $visto
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property Usuarios $idUsuario
 */
class Historial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario', 'required'),
			array('id_usuario, visto', 'numerical', 'integerOnly'=>true),
			array('tipo, estilo', 'length', 'max'=>50),
			array('descripcion', 'length', 'max'=>500),
			array('fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_usuario, tipo, estilo, descripcion, visto, fecha_creacion', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'tipo' => 'Tipo',
			'estilo' => 'Estilo',
			'descripcion' => 'Descripcion',
			'visto' => 'Visto',
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
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('estilo',$this->estilo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('visto',$this->visto);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Historial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
