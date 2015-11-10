<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $nick
 * @property string $pass
 * @property integer $pin
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $email
 * @property integer $celular
 * @property string $foto
 * @property integer $estado
 * @property string $sesion
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property Historial[] $historials
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
//		return array(
//			array('nick, pass, pin, sesion', 'required'),
//			array('nick, pass', 'length', 'max'=>20),
//            array('foto', 'file', 'types'=>'jpg, gif, png, bmp, jpeg','maxSize'=>1024 * 1024 * 10, // 10MB
//                'tooLarge'=>'El usuario no puede ser mayor 10MB. Por favor suba un archivo mas pequeño.',
//                'allowEmpty' => true
//            ),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('id, nick, pass, foto, fecha_creacion', 'safe', 'on'=>'search'),
//		);
        
        
        return array(
            array('nick, pass, pin, fecha_creacion', 'required'),
            array('id_empresa, pin, celular, estado', 'numerical', 'integerOnly'=>true),
            array('nick', 'length', 'max'=>20),
            array('nombre, apellido', 'length', 'max'=>50),
            array('direccion', 'length', 'max'=>200),
            array('email', 'length', 'max'=>100),
            array('pass', 'length', 'max'=>125),
            array('sesion', 'length', 'max'=>255),
            array('foto', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_empresa, nick, pass, pin, nombre, apellido, direccion, email, celular, foto, estado, sesion, fecha_creacion', 'safe', 'on'=>'search'),
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
            'historials' => array(self::HAS_MANY, 'Historial', 'id_usuario'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
//		return array(
//			'id' => 'ID',
//			'nick' => 'Nick',
//			'pass' => 'Contraseña',
//            'foto' => 'Foto',
//			'fecha_creacion' => 'Fecha Creacion',
//		);
//        
        return array(
            'id' => 'ID',
            'id_empresa' => 'Id Empresa',
            'nick' => 'Nick',
            'pass' => 'Pass',
            'pin' => 'Pin',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'email' => 'Email',
            'celular' => 'Celular',
            'foto' => 'Foto',
            'estado' => 'Estado',
            'sesion' => 'Sesion',
            'fecha_creacion' => 'Fecha Creacion',
        );
	}

    protected function beforeSave() {
       $this->pass = sha1($this->pass);
       return parent::beforeSave();
    }
    
    /**
    * @param string the password to be validated
    * @return boolean whether the password is valid
    */
    #public function validatePassword($password)
    #{
    #    //return $this->hashPassword($password,$this->salt)===$this->pass;
    #    return $this->hashPassword($password)===$this->pass;
    #}
    
    /**
    * @param string password
    * @param string salt
    * @return strng hash
    */
    //public function hashPassword($password,$salt)
    #public function hashPassword($password)
    #{
    #    //return md5($salt.$password);
    #    return md5($password);
    #}
    
    #public function beforeSave() {
    #    $pass = md5($this->pass);
    #    $this->pass = $pass;
    #    return true;
    #}
    
    /**
    * @return string the salt
    */
    #public function generateSalt()
    #{
    #    return uniqid('',true);
    #}
    
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
        $criteria->compare('id_empresa',$this->id_empresa);
        $criteria->compare('nick',$this->nick,true);
        $criteria->compare('pass',$this->pass,true);
        $criteria->compare('pin',$this->pin);
        $criteria->compare('nombre',$this->nombre,true);
        $criteria->compare('apellido',$this->apellido,true);
        $criteria->compare('direccion',$this->direccion,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('celular',$this->celular);
        $criteria->compare('foto',$this->foto,true);
        $criteria->compare('estado',$this->estado);
        $criteria->compare('sesion',$this->sesion,true);
        $criteria->compare('fecha_creacion',$this->fecha_creacion,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
