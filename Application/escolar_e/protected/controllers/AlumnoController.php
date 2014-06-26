<?php

class AlumnoController extends Controller
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
				'actions'=>array('index','view', 'perfil'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','adminSearch'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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

		if(!empty($_FILES) && isset($_POST["folio"])){			
						
			$result = $this->subirImagenPerfil($_POST["folio"], "images/");			
			
			if($result["success"]){
				$ruta = "images/" . $_POST["folio"] . "/";
				$model = $this->loadModel($id);
				$model->foto_perfil = $result["archivo"];
				
				$model->save();
			}
			
			echo CJSON::encode($result);
		}
		else{			
		
			$this->render('perfil',array(
					'model'=>$this->loadModel($id),
			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Alumno;
		$personal = new Personales;
		$inscripcion = new Inscripcion;
		$laboral = new Laboral;	
		$medico = new Medico;
		$parents = new Padres;
		$economicos = new Economicos;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Alumno'], $_POST["Personales"], $_POST["Inscripcion"],
					$_POST["Medico"], $_POST["Padres"], $_POST["Economicos"]))
		{		
			$model->attributes=$_POST['Alumno'];
			$personal->attributes=$_POST['Personales'];
			$inscripcion->attributes=$_POST['Inscripcion'];			
			$medico->attributes=$_POST["Medico"];	
			$parents->attributes=$_POST["Padres"];
			$economicos->attributes=$_POST["Economicos"];			
			
			$validate = $model->validate();			
			$validate = $validate && $personal->validate();			
					
			
			if($validate){				
				
				$transaction=$model->dbConnection->beginTransaction();
				
				try{
				
// 					var_dump($personal->save());exit();
					
					if($personal->save()){						
					
						if($laboral->save()){
							$model->laboral = $laboral->id_laboral;
						}
						
						if($medico->save()){
							$model->perfil_medico = $medico->id_medico;
						}
						
						if($parents->save()){
							$model->padres = $parents->id_padre;
						}					
						
						if($economicos->save()){
							$model->economico = $economicos->id_economico;
						}
												
						$model->Personales_id_personales = $personal->id_personales;
						$model->folio = $this->generarFolio($inscripcion->ciclo);

						if($model->save()){
						
							$inscripcion->alumno = $model->id_alumno;
							$inscripcion->fecha_inscripcion = $model->fecha_registro;							
							
							if($inscripcion->save()){
								
								$id_ins = $inscripcion->id_inscripcion;
								$id_seccion = $inscripcion->grado0->seccion0->id_seccion;								
								
								$rs = RequisitosSeccion::model()->findAll("seccion=:id", array(":id"=>$id_seccion));								
								
								if($rs != null && count($rs) > 0){

									foreach($rs as $r){
										
										$ri = new RequisitosInscripcion;
										$ri->inscripcion = $id_ins;
										$ri->requisito = $r->id_rs;
										$ri->save();										
									}									
								}
								
								$transaction->commit();
								$this->redirect(array('inscripcion/perfil','id'=>$inscripcion->id_inscripcion));
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
				}
			}				
		}

		$this->render('create',array(
			'model'=>$model,
			'personal'=>$personal,
			'inscripcion'=>$inscripcion,
			'laboral'=>$laboral,
			'medico'=>$medico, 
			'parents'=>$parents,
			'economicos'=>$economicos
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);	
		$personal = $model->personales;
		$laboral = $model->laborales;
		$medico = $model->medicos;
		$parents = $model->parents;
		$economicos = $model->economicos;
		$inscripcion = Inscripcion::model()->find("alumno=:alumno", array(":alumno" => $model->id_alumno));

		if(isset($_POST['Alumno']))
		{
			$model->attributes=$_POST['Alumno'];
			$personal->attributes=$_POST["Personales"];
			$inscripcion->attributes=$_POST["Inscripcion"];
			$laboral->attributes = $_POST["Laboral"];
			$medico->attributes=$_POST["Medico"];
			$parents->attributes=$_POST["Padres"];
			$economicos->attributes=$_POST["Economicos"];
			
			
			$validate = $model->validate();
			$validate = $validate && $personal->validate();
				
			if($validate){			
				
				$transaction=$model->dbConnection->beginTransaction();
			
				try{
					
					if($personal->save()){	
						
						$laboral->save();
						$medico->save();
						$parents->save();
						$economicos->save();						
												
						//$model->Personales_id_personales = $personal->id_personales;
						
						if($model->save()){
							$transaction->commit();
							$this->redirect(array('inscripcion/perfil','id'=>$inscripcion->id_inscripcion));
						}
						else{
							$transaction->rollback();
						}						
					}
					else{
						$transaction->rollback();
					}					
				}
				catch(Exception $e){
					
					$transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'personal'=>$personal,
			'inscripcion'=>$inscripcion,
			'laboral'=>$laboral,
			'medico'=>$medico,
			'parents'=>$parents,
			'economicos'=>$economicos,
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
		$model=new Alumno('search');
		$model->unsetAttributes(); 
		
		if(isset($_GET['Alumno'])){
			
			$model->attributes=$_GET['Alumno'];
			
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
	 * @return Alumno the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alumno::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alumno $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alumno-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function contarAlumnos($ciclo)
	{
		$count = Inscripcion::model()->count("ciclo = :ciclo",
				array(":ciclo"=>$ciclo));
			
		return $count;
	}
	
	public function generarFolio($ciclo)
	{
		$count = $this->contarAlumnos($ciclo) + 1;
	
		if(strlen($count) < 3){
	
			$c = 3 - strlen($count);
			for($i = 0; $i < $c; $i++){
				$count = "0".$count;
			}
		}
	
		return $count . $ciclo;
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
