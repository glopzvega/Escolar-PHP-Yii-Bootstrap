<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */

$this->breadcrumbs=array(
	'ALUMNOS'=>array('index'),
	'GESTION DE ALUMNOS',
);

$this->menu=array(
// 	array('label'=>'Listar Inscripciones', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('alumno/create')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Inscripciones</h2></div>
<div class="box-content">

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

</div>
</div>