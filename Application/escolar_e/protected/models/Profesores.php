<?php

/**
 * This is the model class for table "profesores".
 *
 * The followings are the available columns in table 'profesores':
 * @property integer $id_profesor
 * @property string $nombre
 * @property string $sexo
 * @property string $fecha_nac
 * @property string $edad
 * @property string $cedula
 * @property string $foto_perfil
 * @property string $estatus
 *
 * The followings are the available model relations:
 * @property Estatus $estatus0
 */
class Profesores extends CActiveRecord
{
	public $estatus_search;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profesores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fecha_nac, edad, cedula', 'required'),
			array('nombre, edad, sexo, cedula, foto_perfil', 'length', 'max'=>45),
			array('estatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombre, sexo, fecha_nac, edad, cedula, estatus_search', 'safe', 'on'=>'search'),
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
			'estatus0' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_profesor' => 'Id Profesor',
			'nombre' => 'Nombre',
			'sexo' => 'Sexo',
			'fecha_nac' => 'Fecha Nac',
			'edad' => 'Edad',
			'cedula' => 'Cedula',
			'foto_perfil' => 'Foto Perfil',
			'estatus_search' => 'Estatus',
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
		
		$criteria->with = array("estatus0");

		$criteria->compare('estatus0.estatus', $this->estatus_search,true);
		
		$criteria->compare('id_profesor',$this->id_profesor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('edad',$this->edad,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('foto_perfil',$this->foto_perfil,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
					'attributes'=>array(
						'estatus_search'=>array(
								'asc'=>'estatus0.estatus',
								'desc'=>'estatus0.estatus DESC',
						),							
						'*',
					),
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profesores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
