<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="grid_12">
	
		<span class="grid_3">
			<?php echo $form->label($model,'folio_search'); ?>
			<br>
			<?php echo $form->textField($model,'folio_search'); ?>
		</span>
		
		<span class="grid_3">	
			<?php echo $form->label($model,'nombre_search'); ?>
			<br>
			<?php echo $form->textField($model,'nombre_search'); ?>		
		</span>
	</div>
	
	<div class="grid_12">
	
		<div class="grid_3">	
			<?php echo $form->label($model,'paterno_search'); ?>
			<br>
			<?php echo $form->textField($model,'paterno_search'); ?>
		</div>

		<div class="grid_3">
			<?php echo $form->label($model,'materno_search'); ?>
			<br>
			<?php echo $form->textField($model,'materno_search'); ?>
		</div>
		
	</div>

	<div class="grid_12">&nbsp;</div>	
	
	<?php echo CHtml::submitButton("Buscar", 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 20px;")); ?>
			
			

<?php $this->endWidget(); ?>

</div><!-- search-form -->