<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'MATERIAS'=>array('index'),
	$model->materia=>array('view','id'=>$model->id_materia),
	'EDICION',
);

$this->menu=array(
// 	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Registrar Materia', 'url'=>array('create')),
	array('label'=>'Ver Materia', 'url'=>array('view', 'id'=>$model->id_materia)),
	array('label'=>'Gestion de Materias', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Materia # <?php echo $model->materia; ?></h2></div>
<div class="box-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('materias', file_get_contents('js/materias/materias.js')); ?>
<?php Yii::app()->clientScript->registerScript('materias_update', file_get_contents('js/materias/create.js')); ?>
</div>
</div>