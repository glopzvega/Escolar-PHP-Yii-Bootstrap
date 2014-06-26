<?php
/* @var $this ProfesoresController */
/* @var $data Profesores */
?>

<div class="view">	

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>	
	<?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id'=>$data->id_profesor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	
	<?php 
	
	$sexo = ($data->sexo == "M") ? "Mujer" : "Hombre";
	
	?>
	
	<?php echo CHtml::encode($sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nac')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto_perfil')); ?>:</b>
	<?php echo CHtml::encode($data->foto_perfil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus0->estatus); ?>
	<br />


</div>