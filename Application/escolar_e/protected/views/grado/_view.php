<?php
/* @var $this GradoController */
/* @var $data Grado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->grado), array('view', 'id'=>$data->id_grado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion0->seccion); ?>
	<br />


</div>