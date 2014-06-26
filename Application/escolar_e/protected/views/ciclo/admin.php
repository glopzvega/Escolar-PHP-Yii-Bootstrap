<?php
/* @var $this CicloController */
/* @var $model Ciclo */

$this->breadcrumbs=array(	
	'GESTION DE CICLOS',
);

$this->menu=array(
// 	array('label'=>'Listar Ciclos', 'url'=>array('index')),
	array('label'=>'Crear Ciclo', 'url'=>array('create')),
);

?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Ciclos</h2></div>
<div class="box-content">       	
	<?php //echo $content; ?>         		


<!-- <h1>Gestion de Ciclos</h1> -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ciclo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(			
		
		array('name'=>'ciclo',
		'type'=>'raw',
		'filter' => CHtml::listData(Ciclo::model()->findAll(), 'id_ciclo', 'ciclo'),
		'value'=>'CHtml::link($data->ciclo, array("ciclo/view","id"=>$data->id_ciclo))'),	

		'inicio',
		'fin',
// 		'estatus',
		array( 'name'=>'status_search', 'value'=>'$data->status->estatus', 
				'filter' => CHtml::listData(Estatus::model()->findAll("id_estatus<=2"), 'estatus', 'estatus'),),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}'
		),
	),
)); ?>

</div>
</div>
