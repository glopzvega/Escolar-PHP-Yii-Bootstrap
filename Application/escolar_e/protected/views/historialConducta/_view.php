<?php
/* @var $this HistorialConductaController */
/* @var $data HistorialConducta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conducta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_conducta), array('view', 'id'=>$data->id_conducta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumno')); ?>:</b>
	<?php echo CHtml::encode($data->alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>