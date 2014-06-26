<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
	'GRUPOS'=>array('index'),
	'GESTION DE GRUPOS',
);

$this->menu=array(
// 	array('label'=>'Listar Grupos', 'url'=>array('index')),
	array('label'=>'Crear Grupo', 'url'=>array('create')),
);

?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Grupos</h2></div>
<div class="box-content">  

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php Yii::app()->clientScript->registerScript('inscripcion', file_get_contents('js/grupo/grupo.js')); ?>
<?php Yii::app()->clientScript->registerScript('inscripcion_create', file_get_contents('js/grupo/search.js')); ?>

</div>
</div>