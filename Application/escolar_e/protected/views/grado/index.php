<?php
/* @var $this GradoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grados',
);

$this->menu=array(
	array('label'=>'Crear Grado', 'url'=>array('create')),
	array('label'=>'Gestion de Grados', 'url'=>array('admin')),
);
?>

<h1>Grados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
