<?php
/* @var $this InscripcionController */
/* @var $model Inscripcion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inscripcion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		
)); ?>

	<div class="grid_12">
		<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary(array($model)); ?>
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">
		<?php echo $form->labelEx($personal,'nombre', array("style"=>"width:80px")); ?>
		<h2>
		<?php echo $personal->nombre; ?>
		<?php echo $personal->apellido_pat; ?>
		<?php echo $personal->apellido_mat; ?>
		</h2>
	</div>		
	
	<div class="grid_12">
		<?php echo $form->labelEx($alumno,'folio', array("style"=>"width:80px")); ?>
		<h2>#<?php echo $alumno->folio; ?></h2>		
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<?php //if($model->estatus == "3"){?>
	
	<div class="grid_12">
		<label>Referencia: # </label><h2> &nbsp; 0000-0000-0000-0001-2385</h2>				
	</div>
	
	<?php //}?>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_4">
	
	<div class="grid_12">
	<?php echo $form->labelEx($model,'fecha_inscripcion'); ?> :
	
	<?php 	
	$fecha = explode(" ", $model->fecha_inscripcion);
	echo $fecha[0];
	?>
		
	<?php /*echo $form->textField($model,'fecha_inscripcion',
			array("hidden"=>true)); ?>
			
	<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
	    'name'=>'Inscripcion[fecha_inscripcion_2]',
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
	));*/ ?>
	</div>	
	
	
	<div class="grid_12">&nbsp;</div>
	
	
	<div class="grid_12">
	
<!-- 		<span class="field"> -->
		<?php echo $form->labelEx($model,'ciclo', array("style"=>"width:80px")); ?> 
		<?php echo $model->ciclo0->ciclo; ?>
		
		<?php //echo $form->dropDownList($model,'ciclo', 
		//CHtml::listData(Ciclo::model()->findAll("estatus=1"), 'id_ciclo', 'ciclo')); ?>
		<?php //echo $form->error($model,'ciclo'); ?>
<!-- 		</span>		 -->
	
	</div>
	
	
	
	<div class="grid_12">
	
<!-- 		<span class="field"> -->
		<?php echo $form->labelEx(Seccion::model(),'seccion', array("style"=>"width:80px")); ?> 
		<?php echo $model->grado0->seccion0->seccion; ?>
		
		<?php //echo $form->dropDownList(Seccion::model(),'id_seccion', 
				//CHtml::listData(Seccion::model()->findAll(), 'id_seccion', 'seccion'), 
				//array("style" => "width:120px")); ?>
<!-- 		</span> -->
	
	</div>
		
	<div class="grid_12">		
	
<!-- 		<span class="field"> -->
		<?php echo $form->labelEx($model,'grado', array("style"=>"width:80px")); ?>
		<?php echo $model->grado0->grado0->grado; ?>
		<?php //echo $form->dropDownList($model,'grado', 
				//CHtml::listData(Grado::model()->findAll(), "id_grado", "grado"), 
				//array("style" => "width:120px")); ?>		
<!-- 		</span>	 -->
	</div>
	
	</div>	
		
	<div class="grid_4">
	
	<div class="grid_12 compactRadioGroup">		
		<?php echo $form->labelEx($model,'estatus'); ?>				
		<?php echo $form->radioButtonList($model,'estatus', 
				array("3"=>'Pendiente', "4"=>'Inscrito'),																
				array('labelOptions' => array('style'=>'display:inline'), 
				'separator'=>' ')); ?>		
		<?php echo $form->error($model,'estatus'); ?>		
	</div>	
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12 compactRadioGroup">
	
		<?php		
			
			$inscrito = ($model->estatus == "4") ? true : false;
			$valores = array("1"=>"Normal", "2"=>'Beneficio', "3"=>'Beca');
			
			if($inscrito){
				
				$id_beneficio = $model->beneficio;
				$beneficio = $model->beneficio0->beneficio;			
				
				if($id_beneficio != "3"){
					$valores = array($id_beneficio=>$beneficio, "3"=>'Beca');	
				}				
			}
		?>
			
		<?php echo $form->labelEx($model,'beneficio'); ?>		
		<?php echo $form->radioButtonList($model,'beneficio', 
				$valores,																	
				array("disabled"=>!$inscrito, 'labelOptions' => array('style'=>'display:inline'), 
				'separator'=>' ')); ?>	
			
	</div>
	
	</div>
	
	<div class="grid_4">
	
		<div class="grid_12 compactRadioGroup">		
		<?php echo $form->labelEx($model,'credencial'); ?>		
		<?php echo $form->radioButtonList($model,'credencial', 
				array("1"=>'Azul', "2"=>'Roja'),																
				array('labelOptions' => array('style'=>'display:inline'), 
				'separator'=>' ')); ?>			
		</div>	
			
		<div class="grid_12">&nbsp;</div>
	
		<div class="grid_12 compactRadioGroup">		
		<?php echo $form->labelEx($model,'facturacion_rfc'); ?>		
		<?php echo $form->radioButtonList($model,'facturacion_rfc', 
				array("1"=>'Si', "2"=>'No'),																
				array('labelOptions' => array('style'=>'display:inline'), 
				'separator'=>' ')); ?>
		</div>
							
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">
	
		<div class="grid_2">	
			<?php echo $form->labelEx($model,'campus'); ?>
			<br>
			<?php echo $form->dropDownList($model,'campus', 
					CHtml::listData(Campus::model()->findAll(), 'id_campus', 'campus')); ?>		
		</div>
		
		<div class="grid_2">
			<?php echo $form->labelEx($model,'modalidad'); ?>
			<br>
			<?php echo $form->dropDownList($model,'modalidad', 
					CHtml::listData(Modalidad::model()->findAll(), 'id_modalidad', 'modalidad'), 
					array("style" => "width:120px")); ?>		
		</div>
		
		<div class="grid_2">
			<?php echo $form->labelEx($model,'plan_pago'); ?>
			<br>
			<?php echo $form->dropDownList($model,'plan_pago', 
					CHtml::listData(PlanPago::model()->findAll(), 'id_plan_pago', 'plan'), 
					array("style" => "width:120px")); ?>		
		</div>
		
		<div class="grid_2">
			<?php echo $form->labelEx($model,'email_factura'); ?>
			<br>
			<?php echo $form->textField($model,'email_factura',array('maxlength'=>45, "size"=>"15px;")); ?>
		</div>
		
		<div class="grid_3">
		<?php echo $form->labelEx($model,'enterarse'); ?>
		<br>
		<?php echo $form->dropDownList($model,'enterarse', 
				CHtml::listData(Enterarse::model()->findAll(), 'id_enterarse', 'descripcion')); ?>		
		</div>
		
	</div>	
	
	<div class="grid_12">&nbsp;</div>	
	
	<div id="RequisitosContainer">	
	
	<br><h4>Requisitos</h4>
		
	<input name="req_inscripcion" type="hidden" readonly="readonly">
	<input name="req_inscripcion_pend" type="hidden" readonly="readonly">
		
	<?php foreach($requisitos as $req){ ?>
	<div class="row">		
	<?php 		
		$id_ri = $req->id_ri;
		$estatus = $req->estatus;
		$req = $req->requisito0->requisito0;
		$des = ($req->descripcion != null) ? "(" . $req->descripcion . ")" : "";
		
		echo "<div class='req_inscripcion pointer'>
				<input type='checkbox' 
				style='margin-left: 20px' "; 
			
		echo ($estatus == "5") ? "checked='checked' disabled='disabled'"  : "";
				
		echo "id='" . $id_ri . "'> ";
			if($estatus == "5"){
				echo "<a href='images/" . $alumno->folio . "/requisitos/requisito_" . $id_ri . ".jpg' target='_blank' class='entregado'>".$req->requisito . " " . $des."</a>";				
			}
			else {
				echo $req->requisito . " " . $des;
			}
		echo "</div>";
		
		if($estatus == "5"){
			echo "<input name='requisito_" . $id_ri . "' type='file' disabled='disabled'>";
		}
		else{
			echo "<input name='requisito_" . $id_ri . "' type='file'>";
		}
	
	?>
	</div>				
	
	<?php }?>
			
	</div>	
	
	<div class="grid_12">&nbsp;</div>
	
	<a href="javascript:history.back()"><img src="imagenes/iconos/grid/back.png">Regresar</a>
	
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 10px;")); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->