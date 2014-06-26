<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs=array(
	'Profesores'=>array('index'),
	$model->nombre=>array('view','id'=>$model->id_profesor),
	'Edicion',
);

$this->menu=array(
// 	array('label'=>'Listar Profesores', 'url'=>array('index')),
	array('label'=>'Registrar Profesor', 'url'=>array('create')),
	array('label'=>'Ver Profesores', 'url'=>array('view', 'id'=>$model->id_profesor)),
	array('label'=>'Gestion de Profesores', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Profesor #<?php echo $model->nombre; ?></h2></div>
<div class="box-content">  

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('profesores', file_get_contents('js/profesores/profesores.js')); ?>
<?php Yii::app()->clientScript->registerScript('profesores_create', file_get_contents('js/profesores/update.js')); ?>

</div>
</div>