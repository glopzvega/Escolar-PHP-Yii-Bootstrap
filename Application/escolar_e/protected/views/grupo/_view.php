<?php
/* @var $this GrupoController */
/* @var $data Grupo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grupo), array('view', 'id'=>$data->id_grupo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->ciclo0->ciclo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado0.seccion')); ?>:</b>
	<?php echo CHtml::encode($data->grado0->seccion0->seccion); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('grado')); ?>:</b>
	<?php echo CHtml::encode($data->grado0->grado0->grado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />


</div>