<?php
/* @var $this RequisitosSeccionController */
/* @var $model RequisitosSeccion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_rs'); ?>
		<?php echo $form->textField($model,'id_rs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requisito'); ?>
		<?php echo $form->textField($model,'requisito'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seccion'); ?>
		<?php echo $form->textField($model,'seccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->