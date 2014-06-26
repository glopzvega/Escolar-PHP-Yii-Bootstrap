<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs=array(
	'Profesores'=>array('index'),
	'Registro',
);

$this->menu=array(
// 	array('label'=>'Ver Profesores', 'url'=>array('index')),
	array('label'=>'Gestion de Profesores', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registro de Profesores</h2></div>
<div class="box-content">  

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('profesores', file_get_contents('js/profesores/profesores.js')); ?>
<?php Yii::app()->clientScript->registerScript('profesores_create', file_get_contents('js/profesores/create.js')); ?>

</div>
</div>