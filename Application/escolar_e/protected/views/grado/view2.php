<?php
/* @var $this GradoController */
/* @var $model Grado */

$this->breadcrumbs=array(
	'GRADOS'=>array('index'),
	$model->id_grado,
);

$this->menu=array(
// 	array('label'=>'Listar Grado', 'url'=>array('index')),
	array('label'=>'Crear Grado', 'url'=>array('create')),
	array('label'=>'Editar Grado', 'url'=>array('update', 'id'=>$model->id_grado)),
	//array('label'=>'Eliminar Grado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_grado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Grados', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Detalles del Grado #<?php echo $model->grado; ?></h2></div>
<div class="box-content"> 
<h3>El Grado ya existe para esta seccion</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_grado',
		'grado',
		'seccion0.seccion',
	),
)); ?>
</div>
</div>