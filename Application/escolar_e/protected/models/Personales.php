<?php

/**
 * This is the model class for table "personales".
 *
 * The followings are the available columns in table 'personales':
 * @property integer $id_personales
 * @property string $nombre
 * @property string $apellido_pat
 * @property string $apellido_mat
 * @property string $fecha_nac
 * @property string $lugar_nac
 * @property string $edad
 * @property string $sexo
 * @property string $direccion
 * @property string $colonia
 * @property string $cp
 * @property string $municipio
 * @property string $estado
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $nacionalidad
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Padres[] $padres
 * @property Referencias[] $referenciases
 */
class Personales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
// 			array('nombre, apellido_pat, apellido_mat, fecha_nac, edad, sexo, direccion, colonia, cp, municipio, estado, telefono, celular, email, nacionalidad', 'required'),
			array('nombre, apellido_pat, apellido_mat, fecha_nac, edad, direccion, colonia, municipio, estado, nacionalidad', 'required'),
			array('nombre, apellido_pat, apellido_mat, lugar_nac, fecha_nac, edad, sexo, direccion, colonia, cp, municipio, estado, telefono, celular, email, nacionalidad', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_personales, nombre, apellido_pat, apellido_mat, fecha_nac, edad, sexo, direccion, colonia, cp, municipio, estado, telefono, celular, email, nacionalidad', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'Personales_id_personales'),
			'padres' => array(self::HAS_MANY, 'Padres', 'Personales_id_personales'),
			'referenciases' => array(self::HAS_MANY, 'Referencias', 'Personales_id_personales'),
			'estados' => array(self::BELONGS_TO, 'Estado', 'estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_personales' => 'Id Personales',
			'nombre' => 'Nombre',
			'apellido_pat' => 'Apellido Paterno',
			'apellido_mat' => 'Apellido Materno',
			'lugar_nac' => 'Lugar de Nacimiento',
			'fecha_nac' => 'Fecha de Nacimiento',
			'edad' => 'Edad',
			'sexo' => 'Sexo',
			'direccion' => 'Direccion',
			'colonia' => 'Colonia',
			'cp' => 'Codigo Postal',
			'municipio' => 'Municipio',
			'estado' => 'Estado',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'email' => 'Email',
			'nacionalidad' => 'Nacionalidad',
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

		$criteria->compare('id_personales',$this->id_personales);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_pat',$this->apellido_pat,true);
		$criteria->compare('apellido_mat',$this->apellido_mat,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('edad',$this->edad,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
