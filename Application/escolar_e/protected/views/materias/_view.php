<?php
/* @var $this MateriasController */
/* @var $data Materias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_materia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_materia), array('view', 'id'=>$data->id_materia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('materia')); ?>:</b>
	<?php echo CHtml::encode($data->materia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado')); ?>:</b>
	<?php echo CHtml::encode($data->grado); ?>
	<br />


</div>