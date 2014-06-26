<?php
/* @var $this AlumnoController */
/* @var $data Alumno */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('personales.nombre')); ?>:</b>
	<?php echo CHtml::encode(render(array("property"=>"nombre", "value"=>$data))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>	
	<?php echo CHtml::link(CHtml::encode($data->folio), array('perfil', 'id'=>$data->id_alumno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode(render(array("property" => "estatus", "value" => $data->estatus))); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('personales.edad')); ?>:</b>
	<?php echo CHtml::encode($data->personales->edad); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('personales.sexo')); ?>:</b>
	<?php 
		
		$sexo = $data->personales->sexo;
		$sexo = render(array("property" => "sexo", "value" => $sexo));
	
		echo CHtml::encode($sexo); ?>
	<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />	
	

</div>