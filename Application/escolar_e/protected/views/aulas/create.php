<?php
/* @var $this AulasController */
/* @var $model Aulas */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	'Registrar',
);

$this->menu=array(
// 	array('label'=>'List Aulas', 'url'=>array('index')),
	array('label'=>'Gestion de Aulas', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registro de Aulas</h2></div>
<div class="box-content"> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
</div>