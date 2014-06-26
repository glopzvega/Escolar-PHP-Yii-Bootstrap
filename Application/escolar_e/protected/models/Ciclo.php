<?php

/**
 * This is the model class for table "ciclo".
 *
 * The followings are the available columns in table 'ciclo':
 * @property integer $id_ciclo
 * @property string $ciclo
 * @property string $inicio
 * @property string $fin
 * @property string $estatus
 * @property string $fecha_limite
 *
 * The followings are the available model relations:
 * @property Estatus $status
 *
 *
 */
class Ciclo extends CActiveRecord
{
	public $status_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciclo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ciclo, inicio, fin, estatus, fecha_limite', 'required'),
			array('id_ciclo, ciclo, fecha_limite', 'length', 'max'=>45),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ciclo, ciclo, inicio, fin, status_search', 'safe', 'on'=>'search'),
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
			'status' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ciclo' => 'Id Ciclo',
			'ciclo' => 'Ciclo',
			'inicio' => 'Inicio',
			'fin' => 'Fin',
			'status_search' => 'Estatus',
			'fecha_limite' => 'Fecha Limite',
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
		$criteria->with = array("status");

		$criteria->compare('status.estatus',$this->status_search, true);
		$criteria->compare('id_ciclo',$this->id_ciclo);
		$criteria->compare('ciclo',$this->ciclo,true);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('fin',$this->fin,true);
		$criteria->compare('estatus',$this->estatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
						'status_search'=>array(
								'asc'=>'status.estatus',
								'desc'=>'status.estatus DESC',
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
	 * @return Ciclo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
