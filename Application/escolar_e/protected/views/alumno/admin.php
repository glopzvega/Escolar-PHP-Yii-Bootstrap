<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Gestion de Alumnos',
);

$this->menu=array(
// 	array('label'=>'Listar Alumno', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('create')),
);

function render($data){

	switch($data["property"]){

		case "estatus" :
			if($data["value"] == "1")
				$data = "Habilitado";
			else $data = "Bloqueado";
			break;

		case "sexo" :

			if($data["value"] == "M")
				$data = "Mujer";
			else $data = "Hombre";
			break;
				
		case "nombre" :
				
			$ape_pat = $data["value"]->personales->apellido_pat;
			$ape_mat = $data["value"]->personales->apellido_mat;
			$data = $data["value"]->personales->nombre . " " . $ape_pat . " " . $ape_mat;
				
			break;
	}

	return $data;
}

?>
<?php 
Yii::app()->clientScript->registerScript('search', "

var folio = $('#Alumno_folio');
var nombre = $('#Alumno_nombre_search');
var paterno = $('#Alumno_paterno_search');
var materno = $('#Alumno_materno_search');
				
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
		
$('.search-form form').submit(function(){
		
	var datos = $(this).serialize();
		
	$('#alumno-grid').yiiGridView('update', {
		data: datos
	});
		
	
	return false;
});

");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Alumnos</h2></div>
<div class="box-content"> 

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alumno-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(	

		'fecha_registro',				
		
		array('name'=>'folio',
		'type'=>'raw',
		'value'=>'CHtml::link($data->folio, array("alumno/perfil","id"=>$data->id_alumno))'),

		array( 'name'=>'nombre_search', 'value'=>'$data->personales->nombre' ),
		array( 'name'=>'paterno_search', 'value'=>'$data->personales->apellido_pat' ),
		array( 'name'=>'materno_search', 'value'=>'$data->personales->apellido_mat' ),		
		array( 'name'=>'status_search', 'value'=>'$data->status->estatus' ),					
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}'
		),

	),
)); ?>

</div>
</div>
<?php

Yii::app()->clientScript->registerScript('search2', "		
	
		
	$('#alumno-grid').yiiGridView('update', {
		data: $('.search-form form').serialize()
	});

");

?>