<?php
/* @var $this HistorialConductaController */
/* @var $model HistorialConducta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historial-conducta-form',
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
	
		<?php echo $form->labelEx($model,'fecha'); ?>
		<br>
		<?php echo $form->textField($model,'fecha',
				array("hidden"=>true)); ?>
				
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
		    'name'=>'fecha_2',
			'language'=>'es',		
		    
		    'options'=>array(
	
				'showOn' => 'both',
	 			'dateFormat' => 'yy-mm-dd',
	 			'changeYear' => true, 
	 			'changeMonth' => true,
				'yearRange' => '1980:2030',
				'showButtonPanel' => true,
	
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;',
				'readonly' => true
		    ),
		));?>		
		
	</div>	
	
	<div class="grid_12">
		<?php echo $form->labelEx($model,'alumno'); ?>
		<br>
		<?php echo $form->dropDownList($model,'alumno', 
				CHtml::listData(Alumno::model()->findAll(), "id_alumno", "folio")); ?>	
	</div>
	
	<div class="grid_12">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<br>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>45)); ?>		
	</div>

	<div class="grid_12">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<br>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>100)); ?>		
	</div>
	
	<div class="grid_12">&nbsp;</div>

	<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 10px;")); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->