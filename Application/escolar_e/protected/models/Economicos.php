<?php

/**
 * This is the model class for table "economicos".
 *
 * The followings are the available columns in table 'economicos':
 * @property integer $id_economico
 * @property integer $hermanos
 * @property integer $lugar
 * @property integer $personas_casa
 * @property integer $tipo_casa
 * @property integer $cuartos
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 */
class Economicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'economicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hermanos, lugar, personas_casa, cuartos', 'numerical', 'integerOnly'=>true),
			array('tipo_casa', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_economico, hermanos, lugar, personas_casa, tipo_casa, cuartos', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'economico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_economico' => 'Id Economico',
			'hermanos' => 'No Hermanos',
			'lugar' => 'Lugar que ocupa',
			'personas_casa' => 'Personas en casa',
			'tipo_casa' => 'Tipo de Casa',
			'cuartos' => 'No Cuartos',
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

		$criteria->compare('id_economico',$this->id_economico);
		$criteria->compare('hermanos',$this->hermanos);
		$criteria->compare('lugar',$this->lugar);
		$criteria->compare('personas_casa',$this->personas_casa);
		$criteria->compare('tipo_casa',$this->tipo_casa);
		$criteria->compare('cuartos',$this->cuartos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Economicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
