<?php
/* @var $this InscripcionController */
/* @var $data Inscripcion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inscripcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_inscripcion), array('view', 'id'=>$data->id_inscripcion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->ciclo0->ciclo); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('grado0.seccion')); ?>:</b>
	<?php echo CHtml::encode($data->grado0->seccion0->seccion); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('grado')); ?>:</b>
	<?php echo CHtml::encode($data->grado0->grado); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('alumno0.folio')); ?>:</b>
	<?php echo CHtml::encode($data->alumno0->folio); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('status.estatus')); ?>:</b>
	<?php echo CHtml::encode($data->status->estatus); ?>
	<br />
	
	
	<b></b><?php /*echo CHtml::encode($data->getAttributeLabel('alumno')); ?>:</b>
	<?php
	$personales = $data->alumno0->personales;
	$nombre = $personales->nombre . " " . $personales->apellido_pat . " " . $personales->apellido_mat;
	echo CHtml::encode($nombre); ?>
	<br />*/?>


</div>