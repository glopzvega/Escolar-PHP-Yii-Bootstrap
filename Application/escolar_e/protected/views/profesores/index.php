<?php
/* @var $this ProfesoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profesores',
);

$this->menu=array(
	array('label'=>'Registrar Profesor', 'url'=>array('create')),
	array('label'=>'Gestion de Profesores', 'url'=>array('admin')),
);
?>

<h1>Profesores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
