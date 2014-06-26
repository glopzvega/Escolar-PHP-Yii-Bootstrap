<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
	'GRUPOS'=>array('index'),
	'REGISTRAR',
);

$this->menu=array(
// 	array('label'=>'Listar Grupo', 'url'=>array('index')),
	array('label'=>'Gestion de Grupos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registrar Grupo</h2></div>
<div class="box-content">  

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('inscripcion', file_get_contents('js/grupo/grupo.js')); ?>
<?php Yii::app()->clientScript->registerScript('inscripcion_create', file_get_contents('js/grupo/create.js')); ?>

</div>
</div>