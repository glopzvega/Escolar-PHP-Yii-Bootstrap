<?php
/* @var $this AulasController */
/* @var $model Aulas */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->aula=>array('view','id'=>$model->id_aula),
	'Edicion',
);

$this->menu=array(
// 	array('label'=>'List Aulas', 'url'=>array('index')),
	array('label'=>'Registro Aulas', 'url'=>array('create')),
	array('label'=>'Ver Aula', 'url'=>array('view', 'id'=>$model->id_aula)),
	array('label'=>'Gestion de Aulas', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Editar Aula # <?php echo $model->aula; ?></h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
</div>