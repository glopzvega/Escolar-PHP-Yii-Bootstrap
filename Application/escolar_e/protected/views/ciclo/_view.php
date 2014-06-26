<?php
/* @var $this CicloController */
/* @var $data Ciclo */

/*function renderEstatus($estatus){

	if($estatus == "1")
		return "Abierto";
	return "Cerrado";
}*/

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ciclo), array('view', 'id'=>$data->id_ciclo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
	<?php echo CHtml::encode($data->inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fin')); ?>:</b>
	<?php echo CHtml::encode($data->fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode(renderEstatus($data->estatus)); ?>
	<?php //echo CHtml::encode($data->estatus); ?>
	<br />


</div>