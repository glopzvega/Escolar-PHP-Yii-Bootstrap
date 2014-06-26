<?php
/* @var $this AulasController */
/* @var $model Aulas */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->aula,
);

$this->menu=array(
// 	array('label'=>'List Aulas', 'url'=>array('index')),
	array('label'=>'Registro de Aulas', 'url'=>array('create')),
	array('label'=>'Edicion de Aulas', 'url'=>array('update', 'id'=>$model->id_aula)),
// 	array('label'=>'Delete Aulas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_aula),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Aulas', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Datos del Aula # <?php echo $model->aula; ?></h2></div>
<div class="box-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_aula',
		'aula',
	),
)); ?>

</div>
</div>