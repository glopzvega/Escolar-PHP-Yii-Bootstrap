<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'Materias'=>array('index'),
	'Registrar Materia',
);

$this->menu=array(
// 	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Gestion de Materias', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registro de Materias</h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('materias', file_get_contents('js/materias/materias.js')); ?>
<?php Yii::app()->clientScript->registerScript('materias_create', file_get_contents('js/materias/create.js')); ?>
</div>
</div>