<?php
/* @var $this AlumnoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alumnos',
);

$this->menu=array(
	array('label'=>'Registar Alumno', 'url'=>array('create')),
	array('label'=>'Gestion de Alumnos', 'url'=>array('admin')),
);
?>

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
?>

<h1>Listado de Alumnos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
