<?php
/* @var $this AulasController */
/* @var $model Aulas */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	'Gestion de Aulas',
);

$this->menu=array(
	//array('label'=>'List Aulas', 'url'=>array('index')),
	array('label'=>'Registrar Aula', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#aulas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Aulas</h2></div>
<div class="box-content"> 

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'aulas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_aula',
		'aula',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div>