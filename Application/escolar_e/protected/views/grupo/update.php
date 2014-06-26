<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
	'Grupos'=>array('index'),
	$model->id_grupo=>array('view','id'=>$model->id_grupo),
	'Edicion',
);

$this->menu=array(
// 	array('label'=>'Listar Grupos', 'url'=>array('index')),
	array('label'=>'Registrar Grupo', 'url'=>array('create')),
	array('label'=>'Ver Grupo', 'url'=>array('view', 'id'=>$model->id_grupo)),
	array('label'=>'Gestion de Grupos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Grupo #<?php echo $model->id_grupo; ?></h2></div>
<div class="box-content">  

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('inscripcion', file_get_contents('js/grupo/grupo.js')); ?>
<?php Yii::app()->clientScript->registerScript('inscripcion_update', file_get_contents('js/grupo/update.js')); ?>

</div>
</div>