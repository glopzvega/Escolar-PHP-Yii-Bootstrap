<?php Yii::app()->clientScript->registerScript('uniqueid', file_get_contents('js/ciclo/view.js')); ?>
<?php
/* @var $this CicloController */
/* @var $model Ciclo */

$this->breadcrumbs=array(
	'CICLOS'=>array('index'),
	$model->id_ciclo,
);

$this->menu=array(
// 	array('label'=>'Listar Ciclos', 'url'=>array('index')),
	array('label'=>'Crear Ciclo', 'url'=>array('create')),
	array('label'=>'Editar Ciclo', 'url'=>array('update', 'id'=>$model->id_ciclo)),
	//array('label'=>'Eliminar Ciclo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ciclo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Ciclos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Ciclo <?php echo $model->ciclo; ?></h2></div>
<div class="box-content"> 

<?php 

function renderEstatus($estatus){

	if($estatus == "1")
		return "Abierto";
	return "Cerrado";
}


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_ciclo',
		'ciclo',
		'inicio',
		'fin',
		'fecha_limite',
		array(	
			"name"=>"Estatus", 
			"value"=>renderEstatus($model->estatus)
		)		
	),
)); ?>

</div>
</div>