<?php
/* @var $this MateriasController */
/* @var $model Materias */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'materias-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="grid_12">
		<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model); ?>
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">
		<?php echo $form->labelEx($model,'materia'); ?>
		<br>
		<?php echo $form->textField($model,'materia',array('size'=>45,'maxlength'=>45)); ?>		
	</div>

	<div class="grid_12">
		<?php echo "<label>Seccion</label>"; ?>
		<br>	
		<?php echo $form->dropDownList(Seccion::model(),'seccion', 
				CHtml::listData(Seccion::model()->findAll(), "id_seccion", "seccion")); ?>		
	</div>
	
	<div class="grid_12">
		<?php echo $form->labelEx($model,'grado'); ?>
		<br>
		<?php //echo $form->textField($model,'grado'); ?>
		
		<?php echo $form->dropDownList($model,'grado', 
				CHtml::listData(Grado::model()->findAll(), "id_grado", "grado0.grado")); ?>		
	</div>

	<div class="grid_12">&nbsp;</div>
	
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 10px;")); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->