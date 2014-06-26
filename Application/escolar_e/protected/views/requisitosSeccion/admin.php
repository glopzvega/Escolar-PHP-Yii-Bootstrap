<?php
/* @var $this RequisitosSeccionController */
/* @var $model RequisitosSeccion */

$this->breadcrumbs=array(
	'Requisitos por Seccion'=>array('index'),
	'Gestion de Requisitos',
);

$this->menu=array(	
	array('label'=>'Registrar nuevo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#requisitos-seccion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Requisitos por Seccion</h2></div>
<div class="box-content">

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'requisitos-seccion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_rs',

		array('name'=>'seccion', 'value'=>'$data->seccion0->seccion',
			'filter' => CHtml::listData(Seccion::model()->findAll(), 'id_seccion', 'seccion')),

		array('name'=>'requisito', 'value'=>'$data->requisito0->requisito',
			'filter' => CHtml::listData(Requisitos::model()->findAll(), 'id_requisito', 'requisito')),

		array('name'=>'estatus', 'value'=>'$data->estatus0->estatus',
			'filter' => CHtml::listData(Estatus::model()->findAll("id_estatus=1 OR id_estatus=2"), 'id_estatus', 'estatus')),		

		array(
			'class'=>'CButtonColumn',
			'template'=>"{view}{update}"
		),
	),
)); ?>

</div>
</div>