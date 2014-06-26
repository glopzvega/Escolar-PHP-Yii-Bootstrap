<?php
/* @var $this RequisitosSeccionController */
/* @var $model RequisitosSeccion */

$this->breadcrumbs=array(
	'Requisitos por Seccion'=>array('index'),
	$model->id_rs,
);

$this->menu=array(
	
	array('label'=>'Registrar Nuevo', 'url'=>array('create')),
	array('label'=>'Editar Registro', 'url'=>array('update', 'id'=>$model->id_rs)),	
	array('label'=>'Gestion de Requisitos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Detalles #<?php echo $model->id_rs; ?></h2></div>
<div class="box-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rs',		
		array( "name"=>"requisito", "value"=>$model->requisito0->requisito),
		array( "name"=>"seccion", "value"=>$model->seccion0->seccion),
		
	),
)); ?>

</div>
</div>