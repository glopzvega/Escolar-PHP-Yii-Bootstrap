<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */

$this->breadcrumbs=array(
	'ALUMNOS'=>array('index'),
	'GESTION DE ALUMNOS',
);

$this->menu=array(
// 	array('label'=>'Listar Inscripciones', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('alumno/create')),
);
?>

<?php 
Yii::app()->clientScript->registerScript('search', "

var folio = $('#Inscripcion_folio_search');
var nombre = $('#Inscripcion_nombre_search');
var paterno = $('#Inscripcion_paterno_search');
var materno = $('#Inscripcion_materno_search');
				
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
		
$('.search-form form').submit(function(){
		
	var datos = $(this).serialize();
		
	$('#inscripcion-grid').yiiGridView('update', {
		data: datos
	});		
	
	return false;
});

");
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Inscripciones</h2></div>
<div class="box-content"> 

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inscripcion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
					
		'fecha_inscripcion',
			
		array( 'name'=>'ciclo_search', 'value'=>'$data->ciclo0->ciclo',
			'htmlOptions'=>array('style'=>'text-align: center','width'=>'80px'),
			'filter' => CHtml::listData(Ciclo::model()->findAll("estatus=1"), 'ciclo', 'ciclo'), ),
			
		array( 'name'=>'seccion_search', 'value'=>'$data->grado0->seccion0->seccion',
			'htmlOptions'=>array('style'=>'text-align: center','width'=>'80px'),
			'filter' => CHtml::listData(Seccion::model()->findAll(), 'seccion', 'seccion'), ),

// 		array( 'name'=>'grado_search', 'value'=>'$data->grado0->grado' ),

		array('name'=>'grado_search', 'value'=>'$data->grado0->grado0->grado',
		'htmlOptions'=>array('style'=>'text-align: center','width'=>'80px'),
		'filter' => CHtml::listData(Grados::model()->findAll(), 'id_grado', 'grado')),


		array( 'name'=>'folio_search', 'value'=>'$data->alumno0->folio' ),	
		array( 'name'=>'nombre_search', 'value'=>'$data->alumno0->personales->nombre' ),
		array( 'name'=>'paterno_search', 'value'=>'$data->alumno0->personales->apellido_pat' ),
		array( 'name'=>'materno_search', 'value'=>'$data->alumno0->personales->apellido_mat' ),
// 		array( 'name'=>'estatus_search', 'value'=>'$data->status->estatus' ),

		array( 'name'=>'estatus_search', 'value'=>'$data->alumno0->status->estatus',
		'htmlOptions'=>array('style'=>'text-align: center','width'=>'80px'),
		'filter' => CHtml::listData(Estatus::model()->findAll("id_estatus=1 OR id_estatus=2"), 'estatus', 'estatus'),
		'header'=>'Estatus'),

		array( 'name'=>'inscripcion_search', 'value'=>'$data->status0->estatus',
		'htmlOptions'=>array('style'=>'text-align: center','width'=>'80px'),
		'filter' => CHtml::listData(Estatus::model()->findAll("id_estatus=3 OR id_estatus=4"), 'estatus', 'estatus'),
		'header'=>'Inscripcion'),

		array(
			'class'=>'CButtonColumn',
			'template'=>"{user}{user_edit}{update}{file}{delete}",

			'buttons' => array(
				
				'update' => array
				(
						'label'=>'Editar Datos de Inscripcion',
						'imageUrl'=>Yii::app()->request->baseUrl.'/imagenes/iconos/grid/edit.png',
						'url'=>'Yii::app()->createUrl("inscripcion/update", array("id"=>$data->id_inscripcion))',
				),

				'user' => array
				(
						'label'=>'Ver Perfil del Alumno',
						'imageUrl'=>Yii::app()->request->baseUrl.'/imagenes/iconos/grid/user.png',
						'url'=>'Yii::app()->createUrl("inscripcion/perfil", array("id"=>$data->id_inscripcion))',
				),
				'user_edit' => array
				(
						'label'=>'Editar Datos del Alumno',
						'imageUrl'=>Yii::app()->request->baseUrl.'/imagenes/iconos/grid/edit_user.png',
						'url'=>'Yii::app()->createUrl("alumno/update", array("id"=>$data->alumno0->id_alumno))',
				),

				'file' => array
				(
						'label'=>'Solicitud de Inscripcion',
						'imageUrl'=>Yii::app()->request->baseUrl.'/imagenes/iconos/grid/print.png',
						'url'=>'Yii::app()->createUrl("inscripcion/report", array("id"=>$data->id_inscripcion))',
				),

				'delete' => array
				(
						'label'=>'Borrar',
						'imageUrl'=>Yii::app()->request->baseUrl.'/imagenes/iconos/grid/trash.png',
						'url'=>'Yii::app()->createUrl("inscripcion/delete", array("id"=>$data->id_inscripcion))',
				),
				
				
			),
			'htmlOptions'=>array(
					'style'=>'width: 80px',
			),
		),
	),
)); ?>

<?php 

Yii::app()->clientScript->registerScript('search2', "


	$('#inscripcion-grid').yiiGridView('update', {
		data: $('.search-form form').serialize()
	});

");
?>
</div>
</div>