<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */

$this->breadcrumbs=array(
	'Inscripcions'=>array('index'),
	'Create',
);

$this->menu=array(
// 	array('label'=>'List Inscripcion', 'url'=>array('index')),
	array('label'=>'Manage Inscripcion', 'url'=>array('index')),
);
?>

<h1>Create Inscripcion</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'personal'=>$personal, 'alumno'=>$alumno, 'seccion'=>$seccion)); ?>