<?php
/* @var $this CicloController */
/* @var $model Ciclo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ciclo-form',
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

	<div class="grid_12">		
		<?php echo $form->textField($model,'id_ciclo',
				array('size'=>45,'maxlength'=>45, "hidden"=>true)); ?>		
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">
	<?php echo $form->labelEx($model,'inicio'); ?>
	<br>
	<?php echo $form->textField($model,'inicio',
			array("hidden"=>true)); ?>
			
	<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
	    'name'=>'Ciclo[inicio_2]',
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
			"readonly" => true			
	    ),
	));?>
	<?php echo $form->error($model,'inicio'); ?>
	</div>
	
	<div class="grid_12">
	<?php echo $form->labelEx($model,'fin'); ?>
	<br>
	<?php echo $form->textField($model,'fin',
			array("hidden"=>true)); ?>
			
	<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
	    'name'=>'Ciclo[fin_2]',
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
	<?php echo $form->error($model,'fin'); ?>
	</div>
			
	<div class="grid_12">
	<?php echo $form->labelEx($model,'fecha_limite'); ?>
	<br>
	<?php echo $form->textField($model,'fecha_limite',
			array("hidden"=>true)); ?>
			
	<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
	    'name'=>'Ciclo[fecha_limite_2]',
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
			"readonly" => true			
	    ),
	));?>
	<?php echo $form->error($model,'fecha_limite'); ?>
	</div>
	
	<div class="grid_12">
		<?php echo $form->labelEx($model,'ciclo'); ?>
		<br>
		<?php echo $form->textField($model,'ciclo', 
				array('size'=>45,'maxlength'=>45, "readonly"=>true)); ?>
		<?php echo $form->error($model,'ciclo'); ?>
	</div>
		
	<div class="grid_12 compactRadioGroup">		
		<br>
		<?php echo $form->labelEx($model,'estatus'); ?>		
		<?php echo $form->radioButtonList($model,'estatus', 
				array("1"=>'Abierto', "2"=>'Cerrado'),																
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