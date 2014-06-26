<?php
/* @var $this GradoController */
/* @var $model Grado */

$this->breadcrumbs=array(
	'GRADOS'=>array('index'),
	$model->id_grado=>array('view','id'=>$model->id_grado),
	'EDITAR GRADO',
);

$this->menu=array(
// 	array('label'=>'Listar Grados', 'url'=>array('index')),
	array('label'=>'Crear Grado', 'url'=>array('create')),
	array('label'=>'Ver Grado', 'url'=>array('view', 'id'=>$model->id_grado)),
	array('label'=>'Gestion de Grados', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Grado <?php echo $model->id_grado; ?></h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
</div>