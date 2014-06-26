<?php
/* @var $this HistorialConductaController */
/* @var $model HistorialConducta */

$this->breadcrumbs=array(
	'Historial de Conducta'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List HistorialConducta', 'url'=>array('index')),
	array('label'=>'Gestion de Reportes', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registro de Reportes de Conducta</h2></div>
<div class="box-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('conducta', file_get_contents('js/conducta/conducta.js')); ?>
<?php Yii::app()->clientScript->registerScript('conducta_create', file_get_contents('js/conducta/create.js')); ?>

</div>
</div>