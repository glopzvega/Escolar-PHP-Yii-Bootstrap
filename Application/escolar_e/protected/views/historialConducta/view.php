<?php
/* @var $this HistorialConductaController */
/* @var $model HistorialConducta */

$this->breadcrumbs=array(
	'Historial Conductas'=>array('index'),
	$model->id_conducta,
);

$this->menu=array(
	array('label'=>'List HistorialConducta', 'url'=>array('index')),
	array('label'=>'Create HistorialConducta', 'url'=>array('create')),
	array('label'=>'Update HistorialConducta', 'url'=>array('update', 'id'=>$model->id_conducta)),
	array('label'=>'Delete HistorialConducta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_conducta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HistorialConducta', 'url'=>array('admin')),
);
?>

<h1>View HistorialConducta #<?php echo $model->id_conducta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_conducta',
		'fecha',
		'descripcion',
		'alumno',
		'nombre',
	),
)); ?>
