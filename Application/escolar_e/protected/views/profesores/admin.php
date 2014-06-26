<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs=array(
	'Profesores'=>array('index'),
	'Gestion',
);

$this->menu=array(
// 	array('label'=>'Listar Profesores', 'url'=>array('index')),
	array('label'=>'Registrar Profesor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#profesores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Profesores</h2></div>
<div class="box-content">

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profesores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'nombre',
		'sexo',
		'fecha_nac',
		'cedula',		
		array( 'name'=>'estatus_search', 'value'=>'$data->estatus0->estatus' ),			
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>

</div>
</div>