<?php
/* @var $this CicloController */
/* @var $model Ciclo */

$this->breadcrumbs=array(
	'CICLOS'=>array('index'),
	$model->ciclo=>array('view','id'=>$model->id_ciclo),
	'EDITAR',
);

$this->menu=array(
// 	array('label'=>'Listar Ciclo', 'url'=>array('index')),
	array('label'=>'Crear Ciclo', 'url'=>array('create')),
	array('label'=>'Ver Ciclo', 'url'=>array('view', 'id'=>$model->id_ciclo)),
	array('label'=>'Gestion de Ciclos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Ciclo Escolar</h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('ciclo', file_get_contents('js/ciclo/ciclo.js')); ?>
<?php Yii::app()->clientScript->registerScript('ciclo_update', file_get_contents('js/ciclo/update.js')); ?>

</div>
</div>