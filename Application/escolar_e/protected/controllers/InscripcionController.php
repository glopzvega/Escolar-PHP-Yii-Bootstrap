<?php

class InscripcionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'report', 'perfil'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionReport($id){
		
		$model=$this->loadModel($id);
		$alumno = Alumno::model()->find("id_alumno=:id", array(":id"=>$model->alumno));
		$personal = Personales::model()->find("id_personales=:id", array(":id"=>$alumno->Personales_id_personales));
				
		$this->renderPartial("reportview",
				array(	'model' => $model,
						'alumno' => $alumno,
						'personal' => $personal
				));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionPerfil($id)
	{
	
		$inscripcion = $this->loadModel($id);
		
		if(!empty($_FILES) && isset($_POST["folio"])){
	
			$result = $this->subirImagenPerfil($_POST["folio"], "images/");
				
			if($result["success"]){
				$ruta = "images/" . $_POST["folio"] . "/";
				$model = $this->loadModel($id);
				$model->alumno0->foto_perfil = $result["archivo"];
	
				$model->alumno0->save();
			}
				
			echo CJSON::encode($result);
		}
		else{
	
			$this->render('perfil',array(
					'inscripcion'=>$inscripcion,
					'model'=>$inscripcion->alumno0,
			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Inscripcion;
		$personales = new Personales;
		$alumno = new Alumno;
		//$seccion = new Seccion;

		if(isset($_POST['Inscripcion'], $_POST["Personales"]))
		{							
			$model->attributes = $_POST["Inscripcion"];		
			$personales->attributes = $_POST["Personales"];		

			$transaction=$model->dbConnection->beginTransaction();
			
			try {				
			
				if($personales->save()){				
					
					$alumno->Personales_id_personales = $personales->id_personales;				
					$alumno->fecha_registro = $model->fecha_inscripcion;
					$alumno->folio = $this->generarFolio($model->ciclo);
	
					if($alumno->save()){
						
						$model->alumno = $alumno->id_alumno;	
						
						if($model->save()){
							$transaction->commit();
							$this->redirect(array('view','id'=>$model->id_inscripcion));							
						}
						else{
							$transaction->rollback();
						}				
					}
					else{
						$transaction->rollback();
					}					
				}
			}
			
			catch(Exception $e){
				$transaction->rollback();
				throw $e;
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'personal'=>$personales,
			'alumno'=>$alumno,
			'seccion'=> new Seccion,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$alumno = Alumno::model()->find("id_alumno=:id", array(":id"=>$model->alumno));
		$personal = Personales::model()->find("id_personales=:id", array(":id"=>$alumno->Personales_id_personales));
		$requisitos = RequisitosInscripcion::model()->findAll("inscripcion=:id", array(":id"=>$id));

		if(isset($_POST['Inscripcion']))
		{
			
			$inscrito = ($model->estatus == "4") ? true : false;						
			
			$model->attributes=$_POST['Inscripcion'];			
			
			//Si no esta inscrito y se esta inscribiendo
			//se calcula en automatico el beneficio que tendra			
			if(!$inscrito && $model->estatus == "4"){
			
				date_default_timezone_set('America/Mexico_City');
				
				$fecha_actual = new DateTime("now");
				$model->fecha_inscripcion = $fecha_actual->format("Y-m-d H:i:s");				
				
				$model->beneficio = $this->obtenerBeneficio($model);				
			}
			
// 			var_dump($model);exit();	
			
			$requisitos = $_POST["req_inscripcion"];
			$pendientes = $_POST["req_inscripcion_pend"];
			
			$this->actualizarRequisitos($requisitos, $pendientes, $model);			
			
			if($model->save())
				$this->redirect(array('perfil','id'=>$model->id_inscripcion));
		}

		$this->render('update',array(
			'model'=>$model,
			'alumno'=>$alumno,
			'personal'=>$personal,
			'requisitos'=>$requisitos
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Inscripcion('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Inscripcion'])){
			
			$model->attributes=$_GET['Inscripcion'];
			
			$this->render('admin',array(
					'model'=>$model,
			));
		}
		else{
			
			$this->render('adminSearch',array(
					'model'=>$model,
			));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inscripcion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inscripcion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inscripcion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inscripcion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actualizarRequisitos($requisitos, $pendientes, $model){		
		
		$requisitos = explode(",", $requisitos);
		$pendientes = explode(",", $pendientes);
		
		foreach ($requisitos as $r){
			$ri = RequisitosInscripcion::model()->findByPk($r);
			if($ri != null){
				
				if($this->subirRequisito($r, $model)){
					$ri->estatus = "5";
					$ri->save();
				}				
			}
		}

		foreach ($pendientes as $p){
			$ri = RequisitosInscripcion::model()->findByPk($p);
			if($ri != null){
				
				if($this->subirRequisito($p, $model)){
					$ri->estatus = "3";
					$ri->save();
				}				
				
			}			
		}
	}
	
	public function obtenerBeneficio($model){

		date_default_timezone_set('America/Mexico_City');
		
		$fecha_limite = new DateTime($model->ciclo0->fecha_limite);
		$fecha_actual = new DateTime("now");	
		
		$BENEFICIO_NO = "1";
		$BENEFICIO_SI = "2";	
		
		if($fecha_actual <= $fecha_limite){
			return $BENEFICIO_SI;
		}
		else{
			return $BENEFICIO_NO;
		}		
	}
	
	public function subirRequisito($id_requisito, $model){
		
		$req = (isset($_FILES['requisito_' . $id_requisito])) ? $_FILES['requisito_' . $id_requisito] : null;
		$name = 'requisito_' . $id_requisito . '.jpg';
		$folio = $model->alumno0->folio;
		$ruta = "images/".$folio."/requisitos/";
		
		if(!empty($req) && $req['error'] == UPLOAD_ERR_OK){			

			$type = $req['type'];
				
			if (strpos($type, "jpeg") || strpos($type,"jpg") || strpos($type,"png")){
										
				$temporal = $req['tmp_name'];
				$tamano= ($req['size'] / 1000)."Kb";
							
				if(file_exists($ruta)){				
					move_uploaded_file($temporal, $ruta . $name);
				}
				else{				
					mkdir ($ruta);
					move_uploaded_file($temporal, $ruta . $name);				
				}
				
				$mask = $ruta . "tmp_*";
				array_map("unlink", glob( $mask ) );			

				return true;				
			}
		
		}		
		
		return false;
				
	}
	
	public function contarAlumnos($ciclo)
	{
		$count = Inscripcion::model()->count("ciclo = :ciclo",
						array(":ciclo"=>$ciclo));
			
		return $count;
	}
	
	public function generarFolio($ciclo)	
	{
		$count = $this->contarAlumnos($ciclo);
		
		if(strlen($count) < 3){
				
			$c = 3 - strlen($count);
			for($i = 0; $i < $c; $i++){
				$count = "0".$count;
			}
		}
		
		return $ciclo . $count;
	}
	
	public function subirImagenPerfil($file_name, $ruta){
	
		foreach ($_FILES as $key) {
	
			if($key['error'] == UPLOAD_ERR_OK ){
	
				$type = $key['type'];
					
				if (((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type,"jpg")) || strpos($type,"png") )){
						
					$nombre = "perfil_" . $file_name . ".jpg";
						
					$temporal = $key['tmp_name'];
					$tamano= ($key['size'] / 1000)."Kb";
	
					$ruta = $ruta . $file_name ."/";
					$tmp = rand(0,9).rand(100,9999).rand(100,9999).".jpg";
						
					if(file_exists($ruta)){
	
						move_uploaded_file($temporal, $ruta . $nombre);
	
						$mask = $ruta . "tmp_*";
						array_map("unlink", glob( $mask ) );
	
						copy($ruta.$nombre, $ruta."tmp_".$tmp);
					}
					else{
	
						mkdir ($ruta);
						move_uploaded_file($temporal, $ruta . $nombre);
	
						$mask = $ruta . "tmp_*";
						array_map("unlink", glob( $mask ) );
	
						copy($ruta.$nombre, $ruta."tmp_".$tmp);
					}
	
						
					$result = array("success"=>true, "archivo" => $ruta.$nombre, "tmp" => $ruta."tmp_".$tmp);
					return $result;
				}
	
				else{
					$result = array("success"=>false, "error" => "El formato de la imagen no es correcto");
					return $result;
				}
	
			}
			else{
				$result = array("success"=>false, "error" => $key['error']);
				return $result;
			}
		}
	}
}
