<?php
/* @var $this CicloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ciclos',
);

$this->menu=array(
	array('label'=>'Crear Ciclo', 'url'=>array('create')),
	array('label'=>'Gestion de Ciclos', 'url'=>array('admin')),
);

function renderEstatus($estatus){

	if($estatus == "1")
		return "Abierto";
	return "Cerrado";
}

?>

<h1>Listado de Ciclos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
