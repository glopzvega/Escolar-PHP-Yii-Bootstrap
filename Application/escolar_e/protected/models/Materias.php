<?php

/**
 * This is the model class for table "materias".
 *
 * The followings are the available columns in table 'materias':
 * @property integer $id_materia
 * @property string $materia
 * @property integer $grado
 *
 * The followings are the available model relations:
 * @property Grados $grado0
 */
class Materias extends CActiveRecord
{
	public $seccion_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'materias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('materia, grado', 'required'),
			array('grado', 'numerical', 'integerOnly'=>true),
			array('materia', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_materia, materia, grado, seccion_search', 'safe', 'on'=>'search'),
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
			'grado0' => array(self::BELONGS_TO, 'Grado', 'grado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_materia' => 'Id Materia',
			'materia' => 'Materia',
			'grado' => 'Grado',
			'seccion_search' => 'Seccion',
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
		
		$criteria->with = array("grado0", "grado0.seccion0");

		$criteria->compare('id_materia',$this->id_materia);
		$criteria->compare('materia',$this->materia,true);
		$criteria->compare('grado0.grado',$this->grado);
		$criteria->compare('seccion0.seccion',$this->seccion_search);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'sort'=>array(
						'attributes'=>array(								
								'seccion_search'=>array(
										'asc'=>'seccion0.id_seccion',
										'desc'=>'seccion0.id_seccion DESC',
								),
								'*',
						),
				)
			)
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Materias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
