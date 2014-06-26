<?php

/**
 * This is the model class for table "historial_conducta".
 *
 * The followings are the available columns in table 'historial_conducta':
 * @property integer $id_conducta
 * @property string $fecha
 * @property string $descripcion
 * @property integer $alumno
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Alumno $alumno0
 */
class HistorialConducta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historial_conducta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, descripcion, alumno, nombre', 'required'),
			array('alumno', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>100),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_conducta, fecha, descripcion, alumno, nombre', 'safe', 'on'=>'search'),
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
			'alumno0' => array(self::BELONGS_TO, 'Alumno', 'alumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_conducta' => 'Id Conducta',
			'fecha' => 'Fecha',
			'descripcion' => 'Descripcion',
			'alumno' => 'Alumno',
			'nombre' => 'Nombre',
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

		$criteria->compare('id_conducta',$this->id_conducta);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('alumno',$this->alumno);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HistorialConducta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
