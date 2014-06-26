<?php

/**
 * This is the model class for table "requisitos_inscripcion".
 *
 * The followings are the available columns in table 'requisitos_inscripcion':
 * @property integer $id_ri
 * @property integer $requisito
 * @property integer $inscripcion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Inscripcion $inscripcion0
 * @property RequisitosSeccion $requisito0
 * @property Estatus $estatus0
 */
class RequisitosInscripcion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requisitos_inscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('requisito, inscripcion', 'required'),
			array('requisito, inscripcion, estatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ri, requisito, inscripcion', 'safe', 'on'=>'search'),
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
			'inscripcion0' => array(self::BELONGS_TO, 'Inscripcion', 'inscripcion'),
			'requisito0' => array(self::BELONGS_TO, 'RequisitosSeccion', 'requisito'),
			'estatus0' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ri' => 'Id Ri',
			'requisito' => 'Requisito',
			'inscripcion' => 'Inscripcion',
			'estatus' => 'Estatus',
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

		$criteria->compare('id_ri',$this->id_ri);
		$criteria->compare('requisito',$this->requisito);
		$criteria->compare('inscripcion',$this->inscripcion);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequisitosInscripcion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
