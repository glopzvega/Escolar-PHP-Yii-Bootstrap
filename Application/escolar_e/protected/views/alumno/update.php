<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'ALUMNOS'=>array('index'),
	$model->folio=>array('view','id'=>$model->id_alumno),
	'EDITAR ALUMNO',
);

$this->menu=array(
// 	array('label'=>'Listar Alumno', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('create')),
	array('label'=>'Perfil del Alumno', 'url'=>array('inscripcion/perfil', 'id'=>$inscripcion->id_inscripcion)),
	array('label'=>'Gestion de Alumnos', 'url'=>array('inscripcion/index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Datos del Alumno #<?php echo $model->folio; ?></h2></div>
<div class="box-content">


<?php $this->renderPartial('_form', array('model'=>$model, 'personal'=>$personal, 
		'inscripcion'=>$inscripcion, 'laboral'=>$laboral, 'medico'=>$medico, 'parents'=>$parents, 'economicos'=>$economicos)); ?>

<?php Yii::app()->clientScript->registerScript('ciclo', file_get_contents('js/alumno/alumno.js')); ?>
<?php Yii::app()->clientScript->registerScript('ciclo_create', file_get_contents('js/alumno/update.js')); ?>

</div>
</div>