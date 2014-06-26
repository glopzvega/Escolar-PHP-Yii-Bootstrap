<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Gestion de Alumnos',
);

$this->menu=array(
// 	array('label'=>'Listar Alumno', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('create')),
);

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

?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Alumnos</h2></div>
<div class="box-content">

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

</div>
</div>