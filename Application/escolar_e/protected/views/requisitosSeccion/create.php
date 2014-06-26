<?php
/* @var $this RequisitosSeccionController */
/* @var $model RequisitosSeccion */

$this->breadcrumbs=array(
	'Requisitos por Seccion'=>array('index'),
	'Registro',
);

$this->menu=array(	
	array('label'=>'Gestion de Requisitos', 'url'=>array('index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Registro de Requisito por Seccion</h2></div>
<div class="box-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php Yii::app()->clientScript->registerScript('rs', file_get_contents('js/requisitosSeccion/requisitosSeccion.js')); ?>
<?php Yii::app()->clientScript->registerScript('rs_create', file_get_contents('js/requisitosSeccion/create.js')); ?>

</div>
</div>