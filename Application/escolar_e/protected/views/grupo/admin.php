<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
	'GRUPOS'=>array('index'),
	'GESTION DE GRUPOS',	
);

$this->menu=array(
// 	array('label'=>'Listar Grupos', 'url'=>array('index')),
	array('label'=>'Registrar Grupo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#grupo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Grupos</h2></div>
<div class="box-content">   

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php //var_dump($model->ciclo0); exit();?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grupo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'id_grupo',

		array('name'=>'ciclo', 'value'=>'$data->ciclo0->ciclo',
				'filter' => CHtml::listData(Ciclo::model()->findAll("estatus=1"), 'id_ciclo', 'ciclo')),


		array('name'=>'seccion_search', 'value'=>'$data->grado0->seccion0->seccion',
				'filter' => CHtml::listData(Seccion::model()->findAll(), 'id_seccion', 'seccion')),

		array('name'=>'grado_search', 'value'=>'$data->grado0->grado0->grado',
				'filter' => CHtml::listData(Grados::model()->findAll(), 'id_grado', 'grado')),

		array('name'=>'grupo', 'value'=>'$data->grupo',
				'filter' => CHtml::listData(Grupos::model()->findAll(), 'clave', 'nombre')),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>

</div>
</div>