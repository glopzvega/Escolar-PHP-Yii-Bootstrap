<?php
/* @var $this HistorialConductaController */
/* @var $model HistorialConducta */

$this->breadcrumbs=array(
	'Historial Conducta'=>array('index'),
	'Gestion',
);

$this->menu=array(
// 	array('label'=>'Lista HistorialConducta', 'url'=>array('index')),
	array('label'=>'Agregar Registro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#historial-conducta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Historial de Conducta de los Alumnos</h2></div>
<div class="box-content"> 

<?php echo CHtml::link('Busqueda Avanzada (Filtros) ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'historial-conducta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_conducta',
		'fecha',
		'descripcion',		
		array( 'name'=>'alumno', 'value'=>'$data->alumno0->folio', 
				'filter' => CHtml::listData(Alumno::model()->findAll(), 'id_alumno', 'folio') ),
		'nombre',
		array(
			'class'=>'CButtonColumn',
			'template'=>"{delete}"
		),
	),
)); ?>

</div>
</div>