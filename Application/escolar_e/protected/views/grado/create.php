<?php
/* @var $this GradoController */
/* @var $model Grado */

$this->breadcrumbs=array(
	'GRADOS'=>array('index'),
	'CREAR GRADO',
);

$this->menu=array(
// 	array('label'=>'Listar Grados', 'url'=>array('index')),
	array('label'=>'Gestion de Grados', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Crear Grado</h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
</div>