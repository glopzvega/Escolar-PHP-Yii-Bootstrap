<?php
/* @var $this CicloController */
/* @var $model Ciclo */

$this->breadcrumbs=array(
	'CICLOS'=>array('index'),
	'CREAR',
);

$this->menu=array(
	//array('label'=>'Listar Ciclos', 'url'=>array('index')),
	array('label'=>'Gestion de Ciclos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registrar Ciclo Escolar</h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('ciclo', file_get_contents('js/ciclo/ciclo.js')); ?>
<?php Yii::app()->clientScript->registerScript('ciclo_create', file_get_contents('js/ciclo/create.js')); ?>

</div>
</div>