<?php
/* @var $this RequisitosSeccionController */
/* @var $data RequisitosSeccion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rs')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rs), array('view', 'id'=>$data->id_rs)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requisito')); ?>:</b>
	<?php echo CHtml::encode($data->requisito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion); ?>
	<br />


</div>