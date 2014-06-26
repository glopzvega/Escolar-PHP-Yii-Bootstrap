<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */

$this->breadcrumbs=array(
	'Inscripciones'=>array('index'),
	$model->id_inscripcion,
);

$this->menu=array(
// 	array('label'=>'Listar Inscripcion', 'url'=>array('index')),
	//array('label'=>'Registrar Inscripcion', 'url'=>array('create')),
	array('label'=>'Editar Inscripcion', 'url'=>array('update', 'id'=>$model->id_inscripcion)),
	array('label'=>'Eliminar Inscripcion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_inscripcion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Inscripciones', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Detalles de Inscripcion #<?php echo $model->id_inscripcion; ?></h2></div>
<div class="box-content">

<?php 

$personales = $model->alumno0->personales;
$nombre = $personales->nombre . " " . $personales->apellido_pat . " " . $personales->apellido_mat;

$activa = ($model->activa == "2") ? "INACTIVA" : "ACTIVA";

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'fecha_inscripcion',
		'ciclo0.ciclo',
		'grado0.seccion0.seccion',
		'grado0.grado0.grado',		
		array(
		"name"=>"alumno0.personales.nombre",
		"value"=>$nombre
		),
		'alumno0.folio',
		'status.estatus',
// 		array(
// 		"name"=>"activa",
// 		"value"=>$activa
// 		),
	),
)); ?>


<?php echo CHtml::link(CHtml::encode("Imprimir Formato en PDF"), array('report', 'id'=>$model->id_inscripcion)); ?>

</div>
</div>