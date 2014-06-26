<?php

/**
 * This is the model class for table "grados".
 *
 * The followings are the available columns in table 'grados':
 * @property integer $id_grado
 * @property string $grado
 * @property integer $seccion
 *
 * The followings are the available model relations:
 * @property Seccion $seccion0
 */
class Grado extends CActiveRecord
{
	public $seccion_search;
	public $grado_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grado, seccion', 'required'),
			array('seccion', 'numerical', 'integerOnly'=>true),
			array('grado', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_grado, grado_search, seccion_search', 'safe', 'on'=>'search'),
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
				
			'grupos' => array(self::HAS_MANY, 'Grupo', 'grado'),
			'inscripcions' => array(self::HAS_MANY, 'Inscripcion', 'grado'),
			'seccion0' => array(self::BELONGS_TO, 'Seccion', 'seccion'),
			'grado0' => array(self::BELONGS_TO, 'Grados', 'grado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grado' => 'Id Grado',
			'grado_search' => 'Grado',			
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

		$criteria->with = array( "seccion0", "grado0" );
		
		$criteria->compare( 'seccion0.seccion', $this->seccion_search, true );
		
		$criteria->compare('id_grado',$this->id_grado);
		$criteria->compare('grado0.grado',$this->grado_search,true);		
		$criteria->compare('seccion',$this->seccion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
					'attributes'=>array(
							'seccion_search'=>array(
									'asc'=>'seccion0.seccion',
									'desc'=>'seccion0.seccion DESC',
							),
							'grado_search'=>array(
									'asc'=>'grado0.grado',
									'desc'=>'grado0.grado DESC',
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
	 * @return Grado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
