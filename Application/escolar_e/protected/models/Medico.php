<?php

/**
 * This is the model class for table "medico".
 *
 * The followings are the available columns in table 'medico':
 * @property integer $id_medico
 * @property string $peso
 * @property string $estatura
 * @property string $tipo_sangre
 * @property integer $discapacidad
 * @property integer $alergia
 * @property integer $parto
 * @property integer $padecimiento
 * @property String $des_padecimiento
 * @property String $des_alergia
 * @property String $des_discapacidad
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 */
class Medico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('discapacidad, alergia, parto, padecimiento', 'numerical', 'integerOnly'=>true),
			array('peso, estatura, tipo_sangre, des_alergia, des_padecimiento, des_discapacidad', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_medico, peso, estatura, tipo_sangre, discapacidad, alergia, parto', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'perfil_medico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_medico' => 'Id Medico',
			'peso' => 'Peso',
			'estatura' => 'Estatura',
			'tipo_sangre' => 'Tipo Sangre',
			'discapacidad' => 'Discapacidad',
			'alergia' => 'Alergia',
			'parto' => 'Parto',
			'padecimiento' => 'Padecimiento',
			'des_padecimiento' => 'Especifique',
			'des_alergia' => 'Especifique',
			'des_discapacidad' => 'Especifique',
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

		$criteria->compare('id_medico',$this->id_medico);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('estatura',$this->estatura,true);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('discapacidad',$this->discapacidad);
		$criteria->compare('alergia',$this->alergia);
		$criteria->compare('parto',$this->parto);
		$criteria->compare('padecimiento',$this->padecimiento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Medico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
