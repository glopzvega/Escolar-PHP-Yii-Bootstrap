<?php
/* @var $this RequisitosSeccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Requisitos por Seccion',
);

$this->menu=array(
	array('label'=>'Registrar nuevo', 'url'=>array('create')),
	array('label'=>'Gestion de Requisitos', 'url'=>array('admin')),
);
?>

<h1>Listado de Requisitos por Seccion</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
