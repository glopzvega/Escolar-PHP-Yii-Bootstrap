<?php
/* @var $this HistorialConductaController */
/* @var $model HistorialConducta */

$this->breadcrumbs=array(
	'Historial Conductas'=>array('index'),
	$model->id_conducta=>array('view','id'=>$model->id_conducta),
	'Update',
);

$this->menu=array(
	array('label'=>'List HistorialConducta', 'url'=>array('index')),
	array('label'=>'Create HistorialConducta', 'url'=>array('create')),
	array('label'=>'View HistorialConducta', 'url'=>array('view', 'id'=>$model->id_conducta)),
	array('label'=>'Manage HistorialConducta', 'url'=>array('admin')),
);
?>

<h1>Update HistorialConducta <?php echo $model->id_conducta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>