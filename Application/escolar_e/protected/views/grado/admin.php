<?php
/* @var $this GradoController */
/* @var $model Grado */

$this->breadcrumbs=array(
	'GRADOS'=>array('index'),
	'GESTION DE GRADOS',
);

$this->menu=array(
// 	array('label'=>'Listar Grado', 'url'=>array('index')),
	array('label'=>'Crear Grado', 'url'=>array('create')),
);

?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Grados</h2></div>
<div class="box-content">   

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			
// 		'id_grado',

		array('name'=>'seccion_search', 'value'=>'$data->seccion0->seccion',
		'filter' => CHtml::listData(Seccion::model()->findAll(), 'seccion', 'seccion')), 		

		array('name'=>'grado_search',
		'type'=>'raw',
		'filter' => CHtml::listData(Grados::model()->findAll(), 'grado', 'grado'),
		'value'=>'CHtml::link($data->grado0->grado, array("grado/view","id"=>$data->id_grado))'),
			
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>

</div>
</div>
