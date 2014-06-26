<?php
/* @var $this RequisitosSeccionController */
/* @var $model RequisitosSeccion */

$this->breadcrumbs=array(
	'Requisitos por Seccion'=>array('index'),
	$model->id_rs=>array('view','id'=>$model->id_rs),
	'Editar Registro',
);

$this->menu=array(	
	array('label'=>'Registrar Nuevo', 'url'=>array('create')),
	array('label'=>'Detalles', 'url'=>array('view', 'id'=>$model->id_rs)),
	array('label'=>'Gestion de Requisitos', 'url'=>array('index')),
);
?>


<div class="box grid_10"> 
<div class="box-head "><h2>Editar Registro # <?php echo $model->id_rs; ?></h2></div>
<div class="box-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
</div>