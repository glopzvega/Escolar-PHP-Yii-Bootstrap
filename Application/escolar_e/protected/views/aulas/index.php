<?php
/* @var $this AulasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aulases',
);

$this->menu=array(
	array('label'=>'Create Aulas', 'url'=>array('create')),
	array('label'=>'Manage Aulas', 'url'=>array('admin')),
);
?>

<h1>Aulases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
