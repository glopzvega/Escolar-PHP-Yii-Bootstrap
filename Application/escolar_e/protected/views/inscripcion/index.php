<?php
/* @var $this InscripcionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inscripciones',
);

$this->menu=array(
	//array('label'=>'Registrar Inscripcion', 'url'=>array('create')),
	array('label'=>'Gestion de Inscripciones', 'url'=>array('admin')),
);
?>

<h1>Inscripciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
