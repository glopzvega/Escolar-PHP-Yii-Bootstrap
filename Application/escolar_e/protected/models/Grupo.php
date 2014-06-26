<?php

/**
 * This is the model class for table "grupo".
 *
 * The followings are the available columns in table 'grupo':
 * @property string $id_grupo
 * @property string $ciclo
 * @property integer $grado
 * @property string $grupo
 *
 * The followings are the available model relations:
 * @property Ciclo $ciclo0
 * @property Grados $grado0
 * @property Grupos $grupo0
 */
class Grupo extends CActiveRecord
{
	public $grado_search;
	public $seccion_search;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ciclo, grado, grupo', 'required'),
			array('grado', 'numerical', 'integerOnly'=>true),
			array('id_grupo', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_grupo, ciclo, grado_search, seccion_search, grupo', 'safe', 'on'=>'search'),
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
			'ciclo0' => array(self::BELONGS_TO, 'Ciclo', 'ciclo'),
			'grado0' => array(self::BELONGS_TO, 'Grado', 'grado'),
			'grupo0' => array(self::BELONGS_TO, 'Grupos', 'grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grupo' => 'Clave del Grupo',
			'ciclo' => 'Ciclo',
			'grado_search' => 'Grado',
			'seccion_search' => 'Seccion',
			'grupo' => 'Grupo',
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
		
		$criteria->with = array( "grado0", "grado0.seccion0" );

		$criteria->compare('grado0.grado',$this->grado_search, true);
		$criteria->compare('seccion0.id_seccion',$this->seccion_search, true);
		$criteria->compare('id_grupo',$this->id_grupo,true);	
		$criteria->compare('grupo',$this->grupo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'sort'=>array(
					'attributes'=>array(
							'grado_search'=>array(
									'asc'=>'grado0.grado',
									'desc'=>'grado0.grado DESC',
							),
							'seccion_search'=>array(
									'asc'=>'seccion0.id_seccion',
									'desc'=>'seccion0.id_seccion DESC',
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
	 * @return Grupo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
