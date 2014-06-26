<?php
/* @var $this MateriasController */
/* @var $model Materias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_materia'); ?>
		<?php echo $form->textField($model,'id_materia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'materia'); ?>
		<?php echo $form->textField($model,'materia',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grado'); ?>
		<?php echo $form->textField($model,'grado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->