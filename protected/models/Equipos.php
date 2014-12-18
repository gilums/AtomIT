<?php

/**
 * This is the model class for table "equipos".
 *
 * The followings are the available columns in table 'equipos':
 * @property integer $id
 * @property string $modelo
 * @property string $nro_serie
 * @property string $tipo
 * @property integer $id_marca
 *
 * The followings are the available model relations:
 * @property Accesorios[] $accesorioses
 * @property Marcas $idMarca
 * @property Ordenes[] $ordenes
 */
class Equipos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'equipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_marca', 'required'),
			array('id_marca', 'numerical', 'integerOnly'=>true),
			array('modelo, nro_serie', 'length', 'max'=>50),
			array('tipo', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modelo, nro_serie, tipo, id_marca', 'safe', 'on'=>'search'),
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
			'accesorios' => array(self::MANY_MANY, 'Accesorios', 'equipo_accesorio(id_equipo, id_accesorio)'),
			'marcas' => array(self::BELONGS_TO, 'Marcas', 'id_marca'),
			'ordenes' => array(self::HAS_MANY, 'Ordenes', 'id_equipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'modelo' => 'Modelo',
			'nro_serie' => 'Nro Serie',
			'tipo' => 'Tipo',
			'id_marca' => 'Marca',
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
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('nro_serie',$this->nro_serie,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('id_marca',$this->id_marca);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Equipos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
