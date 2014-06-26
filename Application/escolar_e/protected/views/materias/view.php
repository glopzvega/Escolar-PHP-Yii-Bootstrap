<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'MATERIAS'=>array('index'),
	$model->materia,
);

$this->menu=array(
// 	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Registrar Materias', 'url'=>array('create')),
	array('label'=>'Editar Materias', 'url'=>array('update', 'id'=>$model->id_materia)),
// 	array('label'=>'Delete Materias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_materia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Materias', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Datos Materia #<?php echo $model->materia; ?></h2></div>
<div class="box-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_materia',
		'materia',
// 		'grado',
		array( "name"=>"seccion", "value"=>$model->grado0->seccion0->seccion),
		array( "name"=>"grado", "value"=>$model->grado0->grado0->grado),
	),
)); ?>

</div>
</div>