<?php

/**
 * This is the model class for table "inscripcion".
 *
 * The followings are the available columns in table 'inscripcion':
 * @property integer $id_inscripcion
 * @property string $fecha_inscripcion
 * @property integer $ciclo
 * @property integer $grado
 * @property integer $alumno
 * @property integer $campus
 * @property integer $modalidad
 * @property integer $credencial
 * @property integer $plan_pago
 * @property integer $facturacion_rfc
 * @property integer $enterarse
 * @property integer $especialidad
 * @property String $email_factura
 *
 * The followings are the available model relations:
 * @property Alumno $alumno0
 * @property Ciclo $ciclo0
 * @property Grados $grado0
 * @property Campus $campus0
 * @property Modalidad $mod
 * @property PlanPago $planpago
 * @property Enterarse $enterar
 * @property Beneficios $beneficio0
 * @property Especialidad $especialidad0
 */
class Inscripcion extends CActiveRecord
{	
	
	public $inscripcion_search;
	public $estatus_search;
	public $ciclo_search;
	public $grado_search;
	public $seccion_search;
	public $folio_search;
	public $nombre_search;
	public $paterno_search;
	public $materno_search;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ciclo, grado, alumno', 'required'),
			array('email_factura', 'length', 'max'=>45),
			array('ciclo, grado, alumno, reinscripcion, estatus, activa, campus, modalidad, credencial, plan_pago, 
					facturacion_rfc, enterarse, beneficio, especialidad', 'numerical', 'integerOnly'=>true),
			array('fecha_inscripcion, ciclo_search, seccion_search, grado_search, folio_search, 
					nombre_search, paterno_search, materno_search, inscripcion_search, estatus_search', 'safe', 'on'=>'search'),
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
			'alumno0' => array(self::BELONGS_TO, 'Alumno', 'alumno'),
			'ciclo0' => array(self::BELONGS_TO, 'Ciclo', 'ciclo'),
			'grado0' => array(self::BELONGS_TO, 'Grado', 'grado'),
			'status0' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
			'campus0' => array(self::BELONGS_TO, 'Campus', 'campus'),
			'mod' => array(self::BELONGS_TO, 'Modalidad', 'modalidad'),
			'planpago' => array(self::BELONGS_TO, 'PlanPago', 'plan_pago'),
			'cred' => array(self::BELONGS_TO, 'Credencial', 'credencial'),
			'enterar' => array(self::BELONGS_TO, 'Enterarse', 'enterarse'),
			'beneficio0' => array(self::BELONGS_TO, 'Beneficios', 'beneficio'),
			'especialidad0' => array(self::BELONGS_TO, 'Especialidad', 'especialidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inscripcion' => 'Id Inscripcion',
			'fecha_inscripcion' => 'Fecha Inscripcion',
			'ciclo_search' => 'Ciclo',
			'seccion_search' => 'Seccion',
			'grado_search' => 'Grado',
			'folio_search' => 'Folio',
			'nombre_search' => 'Nombre',
			'paterno_search' => 'A Paterno',
			'materno_search' => 'A Materno',
			'reinscripcion' => 'Reinscripcion',
			'inscripcion_search' => 'Estatus',
			'activa' => 'Activa',
			'campus' => 'Campus',
			'modalidad' => 'Modalidad',
			'credencial' => 'Credencial',
			'plan_pago' => 'Plan de Pago',
			'enterarse' => 'Como se entero de nosotros',
			'facturacion_rfc' => 'Facturacion RFC',
			'email_factura' => 'Email E-Factura',
			'beneficio' => 'Beneficio',
			'especialidad' => 'Especialidad'
				
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
		
		$criteria->with = array( "ciclo0", "grado0", "status0", "grado0.seccion0", "alumno0", "alumno0.personales", "alumno0.status" );
// 		$criteria->with = array( "grado0" );
// 		$criteria->with = array( "status" );

		$criteria->compare( 'ciclo0.ciclo', $this->ciclo_search, true );
		$criteria->compare( 'grado0.grado', $this->grado_search, true );
		$criteria->compare( 'status0.estatus', $this->inscripcion_search, true );
		$criteria->compare( 'seccion0.seccion', $this->seccion_search, true );
		$criteria->compare( 'alumno0.folio', $this->folio_search, true );
		$criteria->compare( 'status.estatus', $this->estatus_search, true );
		$criteria->compare( 'personales.nombre', $this->nombre_search, true );
		$criteria->compare( 'personales.apellido_pat', $this->paterno_search, true );
		$criteria->compare( 'personales.apellido_mat', $this->materno_search, true );
// 		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('fecha_inscripcion',$this->fecha_inscripcion,true);
// 		$criteria->compare('ciclo',$this->ciclo);
// 		$criteria->compare('grado',$this->grado);
// 		$criteria->compare('alumno',$this->alumno);
// 		$criteria->compare('reinscripcion',$this->reinscripcion);
// 		$criteria->compare('estatus',$this->estatus);
// 		$criteria->compare('activa',$this->activa);

		$criteria->together = true;
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
							
						'folio_search'=>array(
								'asc'=>'alumno0.folio',
								'desc'=>'alumno0.folio DESC',
						),
							
						'estatus_search'=>array(
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
													
						'ciclo_search'=>array(
								'asc'=>'ciclo0.ciclo',
								'desc'=>'ciclo0.ciclo DESC',
						),
						'inscripcion_search'=>array(
								'asc'=>'status0.estatus',
								'desc'=>'status0.estatus DESC',
						),

						"*"
					),
				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inscripcion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
