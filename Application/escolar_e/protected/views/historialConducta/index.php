<?php
/* @var $this HistorialConductaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Historial Conductas',
);

$this->menu=array(
	array('label'=>'Create HistorialConducta', 'url'=>array('create')),
	array('label'=>'Manage HistorialConducta', 'url'=>array('admin')),
);
?>

<h1>Historial Conductas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
