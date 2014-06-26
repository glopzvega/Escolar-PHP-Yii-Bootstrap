<?php

/**
 * This is the model class for table "padres".
 *
 * The followings are the available columns in table 'padres':
 * @property integer $id_padre
 * @property string $padre
 * @property string $madre
 * @property string $dir_padre
 * @property string $dir_madre
 * @property string $tel_padre
 * @property string $tel_madre
 * @property string $esc_padre
 * @property string $esc_madre
 * @property string $ocu_padre
 * @property string $ocu_madre
 * @property string $emp_padre
 * @property string $emp_madre
 * @property string $cel_padre
 * @property string $cel_madre
 * @property string $email_padre
 * @property string $email_madre
 * @property string $tel_emp_padre
 * @property string $tel_emp_madre
 * @property string $parentesco_padre
 * @property string $parentesco_madre
 * 
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 */
class Padres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'padres';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('padre, madre, dir_padre, dir_madre, tel_padre, tel_madre, esc_padre, esc_madre, ocu_padre, ocu_madre, emp_padre, emp_madre
					cel_padre, cel_madre, parentesco_padre, parentesco_madre, tel_emp_madre, tel_emp_padre, email_padre, email_madre', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_padre, padre, madre, dir_padre, dir_madre, tel_padre, tel_madre, esc_padre, esc_madre, ocu_padre, ocu_madre, emp_padre, emp_madre', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'padres'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_padre' => 'Id Padre',
			'padre' => 'Nombre Referencia 1',
			'madre' => 'Nombre Referencia 2',
			'dir_padre' => 'Direccion',
			'dir_madre' => 'Direccion',
			'tel_padre' => 'Telefono',
			'tel_madre' => 'Telefono',
			'esc_padre' => 'Escolaridad',
			'esc_madre' => 'Escolaridad',
			'ocu_padre' => 'Ocupacion',
			'ocu_madre' => 'Ocupacion',
			'emp_padre' => 'Empresa',
			'emp_madre' => 'Empresa',
			'cel_padre' => 'Celular',
			'cel_madre' => 'Celular',
			'tel_emp_padre' => 'Telefono Empresa',
			'tel_emp_madre' => 'Telefono Empresa',
			'email_padre' => 'Email Empresa',
			'email_madre' => 'Email Empresa',
			'parentesco_padre' => 'Parentesco',
			'parentesco_madre' => 'Parentesco',
				
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

		$criteria->compare('id_padre',$this->id_padre);
		$criteria->compare('padre',$this->padre,true);
		$criteria->compare('madre',$this->madre,true);
		$criteria->compare('dir_padre',$this->dir_padre,true);
		$criteria->compare('dir_madre',$this->dir_madre,true);
		$criteria->compare('tel_padre',$this->tel_padre,true);
		$criteria->compare('tel_madre',$this->tel_madre,true);
		$criteria->compare('esc_padre',$this->esc_padre,true);
		$criteria->compare('esc_madre',$this->esc_madre,true);
		$criteria->compare('ocu_padre',$this->ocu_padre,true);
		$criteria->compare('ocu_madre',$this->ocu_madre,true);
		$criteria->compare('emp_padre',$this->emp_padre,true);
		$criteria->compare('emp_madre',$this->emp_madre,true);
		$criteria->compare('cel_padre',$this->cel_padre,true);
		$criteria->compare('cel_madre',$this->cel_madre,true);
		$criteria->compare('parentesco_padre',$this->parentesco_padre,true);
		$criteria->compare('parentesco_madre',$this->parentesco_madre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Padres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
