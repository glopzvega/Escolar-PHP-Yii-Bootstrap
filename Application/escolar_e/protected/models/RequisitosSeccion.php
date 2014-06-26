<?php

/**
 * This is the model class for table "requisitos_seccion".
 *
 * The followings are the available columns in table 'requisitos_seccion':
 * @property integer $id_rs
 * @property integer $requisito
 * @property integer $seccion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Requisitos $requisito0
 * @property Seccion $seccion0
 * @property Estatus $estatus0
 */
class RequisitosSeccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requisitos_seccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rs, requisito, seccion', 'required'),
			array('id_rs, requisito, seccion, estatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rs, requisito, seccion', 'safe', 'on'=>'search'),
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
			'requisito0' => array(self::BELONGS_TO, 'Requisitos', 'requisito'),
			'seccion0' => array(self::BELONGS_TO, 'Seccion', 'seccion'),
			'estatus0' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rs' => 'Clave',
			'requisito' => 'Requisito',
			'seccion' => 'Seccion',
			'estatus' => 'Estatus'
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

		$criteria->compare('id_rs',$this->id_rs);
		$criteria->compare('requisito',$this->requisito);
		$criteria->compare('seccion',$this->seccion);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequisitosSeccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
