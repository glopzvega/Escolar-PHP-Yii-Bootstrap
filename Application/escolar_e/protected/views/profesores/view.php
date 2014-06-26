<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs=array(
	'Profesores'=>array('index'),
	$model->nombre,
);

$this->menu=array(
// 	array('label'=>'Listar Profesores', 'url'=>array('index')),
	array('label'=>'Registrar Profesor', 'url'=>array('create')),
	array('label'=>'Editar Profesor', 'url'=>array('update', 'id'=>$model->id_profesor)),
	//array('label'=>'Delete Profesores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_profesor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Profesores', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Detalles del Profesor #<?php echo $model->nombre; ?></h2></div>
<div class="box-content">

<?php $sexo = ($model->sexo == "M") ? "Mujer" : "Hombre"; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'nombre',
		array(
			"name"=>"estatus",
			"value"=>$sexo
		),
		'fecha_nac',
		'cedula',		
		array(
			"name"=>"estatus",
			"value"=>$model->estatus0->estatus
		),
	),
)); ?>

</div>
</div>