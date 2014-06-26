<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profesores-form',
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
		
		<?php if(!$model->isNewRecord){ ?>
		
		<div class="compactRadioGroup">
		<?php echo $form->labelEx($model,'estatus'); ?>				
		<?php echo $form->radioButtonList($model,'estatus', 
				array("1"=>'Habilitado', "2"=>'Bloqueado'),																
				array('labelOptions' => array('style'=>'display:inline'), 
				'separator'=>' ')); ?> </div>			
		<?php }
		else{
			echo $form->textField($model,'estatus',array("readonly"=>true, "hidden"=>true)); 
		}		
		?>		
	</div>
	
	<div class="grid_12">&nbsp;</div>

	<div class="grid_12">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<br>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		
	</div>
	
	<div class="grid_12">	
	
		<?php echo $form->labelEx($model,'fecha_nac'); ?>
		<br>
		<?php echo $form->textField($model,'fecha_nac',
				array("hidden"=>true)); ?>
				
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
		    'name'=>'Profesores[fecha_nac_2]',
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
		
		<?php echo $form->labelEx($model,'edad', array("style"=>"width:103px")); ?>
		<br>
		<?php echo $form->textField($model,'edad', 
					array('maxlength'=>45, "readonly"=>false)); ?>		
	
	</div>

	<div class="grid_12">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<br>
		<?php echo $form->textField($model,'cedula',array('size'=>45,'maxlength'=>45)); ?>
		
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12 compactRadioGroup">		
		
		<?php echo $form->labelEx($model,'sexo'); ?>
				
		<?php echo $form->radioButtonList($model,'sexo', 
				array("H"=>'Hombre', "M"=>'Mujer'),																
				array('labelOptions' => array('style'=>'display:inline'), 
				'separator'=>' ')); 
		?>			
	</div>	
	
	<div class="grid_12">&nbsp;</div>

	<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 10px;")); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->