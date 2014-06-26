<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */

$this->breadcrumbs=array(
	'ALUMNOS'=>array('index'),
	$model->id_inscripcion=>array('view','id'=>$model->id_inscripcion),
	'EDITAR INSCRIPCION',
);

$this->menu=array(
// 	array('label'=>'Lista Inscripcion', 'url'=>array('index')),
	//array('label'=>'Create Inscripcion', 'url'=>array('create')),
	//array('label'=>'Ver Inscripcion', 'url'=>array('view', 'id'=>$model->id_inscripcion)),
	array('label'=>'Registrar Alumno', 'url'=>array('alumno/create')),
	array('label'=>'Perfil del Alumno', 'url'=>array('perfil', 'id'=>$model->id_inscripcion)),
	array('label'=>'Gestion de Alumnos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Inscripcion #<?php echo $alumno->folio; ?></h2></div>
<div class="box-content">

<?php $this->renderPartial('_form', array('model'=>$model, 
		'alumno'=>$alumno, 
		'personal'=>$personal,
		'requisitos'=>$requisitos)); ?>

<?php Yii::app()->clientScript->registerScript('inscripcion', file_get_contents('js/inscripcion/inscripcion.js')); ?>
<?php Yii::app()->clientScript->registerScript('inscripcion_create', file_get_contents('js/inscripcion/update.js')); ?>

</div>
</div>