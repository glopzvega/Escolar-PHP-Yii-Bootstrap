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
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Gestion de Profesores</h2></div>
<div class="box-content">

<?php echo CHtml::link('Busqueda Avanzada (Filtros)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

</div>
</div>