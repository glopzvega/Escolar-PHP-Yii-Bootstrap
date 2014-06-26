<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->folio,
);

$this->menu=array(
// 	array('label'=>'Listar Alumnos', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('create')),
	array('label'=>'Editar Alumno', 'url'=>array('update', 'id'=>$model->id_alumno)),
// 	array('label'=>'Eliminar Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_alumno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Alumnos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Detalles del Alumno #<?php echo $model->folio; ?></h2></div>
<div class="box-content">

<?php 

function render($data){

	switch($data["property"]){

		case "estatus" :
			if($data["value"] == "1")
				$data = "Habilitado";
			else $data = "Bloqueado";
			break;

		case "sexo" :

			if($data["value"] == "M")
				$data = "Mujer";
			else $data = "Hombre";
			break;
			
		case "nombre" : 
			
			$ape_pat = $data["value"]->personales->apellido_pat;
			$ape_mat = $data["value"]->personales->apellido_mat;
			$data = $data["value"]->personales->nombre . " " . $ape_pat . " " . $ape_mat;
			
			break;
	}

	return $data;
}

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		
		array(
			"name"=>"personales.nombre",
			"value"=>render(array("property"=>"nombre", "value"=>$model))
		),
		'folio',
		'fecha_registro',
		array(
			"name"=>"estatus",
			"value"=>render(array("property"=>"estatus", "value"=>$model->estatus))
		),
		"personales.fecha_nac",
		"personales.edad",
		array(
			"name"=>"personales.sexo",
			"value"=>render(array("property"=>"sexo", "value"=>$model->personales->sexo))
		),
		"personales.direccion",
		"personales.colonia",
		"personales.municipio",
		array(
			"name"=>"personales.estado",
			"value"=>$model->personales->estados->nombre
		),
		"personales.nacionalidad",
		"personales.cp",
		"personales.telefono",
		"personales.celular",
		"personales.email"
			
	),
)); ?>

</div>
</div>