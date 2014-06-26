<?php
/* @var $this RequisitosSeccionController */
/* @var $model RequisitosSeccion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'requisitos-seccion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<!-- 	<div class="grid_12"> -->
		<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model); ?>
<!-- 	</div> -->
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">		
		<?php echo $form->textField($model,'id_rs', array("hidden"=>true, "readonly"=>true)); ?>		
	</div>

	<div class="grid_12">		
		<?php echo $form->labelEx($model,'seccion'); ?>
		<br>
		<?php echo $form->dropDownList($model,'seccion', 
		CHtml::listData(Seccion::model()->findAll(), 'id_seccion', 'seccion'), 
		array("style" => "width:160px")); ?>		
	</div>
	
	<div class="grid_12">		
		<?php echo $form->labelEx($model,'requisito'); ?>
		<br>
		<?php echo $form->dropDownList($model,'requisito', 
		CHtml::listData(Requisitos::model()->findAll(), 'id_requisito', 'requisito'), 
		array("empty"=> " ", "style" => "width:200px")); ?>
		
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="">		
		<?php if(!$model->isNewRecord){ ?>
		
		<div class="grid_12 compactRadioGroup">
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
		<?php echo $form->error($model,'estatus'); ?>
	</div>

	<div class="grid_12">&nbsp;</div>

	<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 10px;")); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->