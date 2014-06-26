<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'MATERIAS'=>array('index'),
	'GESTION DE MATERIAS',
);

$this->menu=array(
// 	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Registrar Materias', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#materias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Materias</h2></div>
<div class="box-content"> 

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'materias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_materia',
		
		

		'materia',
		
		array('name'=>'grado', 'value'=>'$data->grado0->grado0->grado',
		'filter' => CHtml::listData(Grados::model()->findAll(), 'id_grado', 'grado')),

		array('name'=>'seccion_search', 'value'=>'$data->grado0->seccion0->seccion',
		'filter' => CHtml::listData(Seccion::model()->findAll(), 'seccion', 'seccion')),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div>