<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'ALUMNOS'=>array('index'),
	'REGISTRAR ALUMNO',
);

$this->menu=array(
// 	array('label'=>'Listar Alumno', 'url'=>array('index')),
	array('label'=>'Gestion de Alumnos', 'url'=>array('inscripcion/index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registro de Alumnos</h2></div>
<div class="box-content">

<?php $this->renderPartial('_form', 
		array(	'model'=>$model, 
				'personal'=>$personal,
				'medico'=>$medico,
				'laboral'=>$laboral,
				'parents'=>$parents,
				'economicos'=>$economicos, 
				'inscripcion'=>$inscripcion)); ?>

<?php Yii::app()->clientScript->registerScript('ciclo', file_get_contents('js/alumno/alumno.js')); ?>
<?php Yii::app()->clientScript->registerScript('ciclo_create', file_get_contents('js/alumno/create.js')); ?>

</div>
</div>