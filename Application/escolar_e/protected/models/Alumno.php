<?php

/**
 * This is the model class for table "alumno".
 *
 * The followings are the available columns in table 'alumno':
 * @property integer $id_alumno
 * @property string $fecha_registro
 * @property string $folio
 * @property string $foto_perfil
 * @property integer $estatus
 * @property integer $Personales_id_personales
 * @property integer $perfil_medico
 * @property integer $economico 
 * @property integer $laboral 
 *
 * The followings are the available model relations:
 * @property Laboral $laborales
 * @property Medico $medicos
 * @property Personales $personales 
 * @property Economicos $economicos
 * @property Padres $parents 
 */
class Alumno extends CActiveRecord
{
	
	public $status_search;	
	public $nombre_search;
	public $paterno_search;
	public $materno_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_registro, estatus', 'required'), 			
			
			array('foto_perfil', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fecha_registro, folio, status_search, nombre_search, paterno_search, materno_search', 'safe', 'on'=>'search'),
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
			
			'personales' => array(self::BELONGS_TO, 'Personales', 'Personales_id_personales'),			
			'inscripciones' => array(self::HAS_MANY, 'Inscripcion', 'alumno'),
			'status' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
			'laborales' => array(self::BELONGS_TO, 'Laboral', 'laboral'),
			'medicos' => array(self::BELONGS_TO, 'Medico', 'perfil_medico'),
			'parents' => array(self::BELONGS_TO, 'Padres', 'padres'),
			'economicos' => array(self::BELONGS_TO, 'Economicos', 'economico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(			
			'fecha_registro' => 'Fecha Registro',
			'folio' => 'Folio',			
			'status_search' => "Estatus",
			'nombre_search' => "Nombre",
			'paterno_search' => "Apellido Paterno",
			'materno_search' => "Apellido Materno", 
			"foto_perfil" => "Fotografia"
				
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
		$criteria->with = array( 'personales', "status" );
				
		$criteria->compare( 'status.estatus', $this->status_search, true );
		$criteria->compare( 'personales.nombre', $this->nombre_search, true );
		$criteria->compare( 'personales.apellido_pat', $this->paterno_search, true );
		$criteria->compare( 'personales.apellido_mat', $this->materno_search, true );
		
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('folio',$this->folio,true);		
		
		$a = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
					'attributes'=>array(
							'status_search'=>array(
									'asc'=>'status.estatus',
									'desc'=>'status.estatus DESC',
							),	
							'nombre_search'=>array(
									'asc'=>'personales.nombre',
									'desc'=>'personales.nombre DESC',
							),
							'paterno_search'=>array(
									'asc'=>'personales.apellido_pat',
									'desc'=>'personales.apellido_pat DESC',
							),
							'materno_search'=>array(
									'asc'=>'personales.apellido_mat',
									'desc'=>'personales.apellido_mat DESC',
							),
							'*',
					),
			),
		));
		
// 		var_dump($a);
// 		exit();
		
		return $a;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
