<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
	'GRUPOS'=>array('index'),
	$model->id_grupo,
);

$this->menu=array(
// 	array('label'=>'Listar Grupos', 'url'=>array('index')),
	array('label'=>'Registrar Grupo', 'url'=>array('create')),
	array('label'=>'Editar Grupo', 'url'=>array('update', 'id'=>$model->id_grupo)),
// 	array('label'=>'Delete Grupo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_grupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Grupos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Detalles del Grupo #<?php echo $model->id_grupo; ?></h2></div>
<div class="box-content">  

<h3>Este Grupo ya existe para este ciclo escolar</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_grupo',
		
		array(
				"name"=>"ciclo",
				"value"=>$model->ciclo0->ciclo
		),	
		array(
				"name"=>"seccion",
				"value"=>$model->grado0->seccion0->seccion
		),
		array(
				"name"=>"grado",
				"value"=>$model->grado0->grado0->grado
		),
		'grupo',
	),
)); ?>

</div>
</div>