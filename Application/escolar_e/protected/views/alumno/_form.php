<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumno-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="grid_12">
		<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary(array($model, $personal)); ?>	
	</div>	
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">	
		<?php echo $form->textField($model,'fecha_registro', array("hidden"=>true)); ?>						
		<?php echo $form->textField($model,'folio', array("hidden"=>true)); ?>						
	</div>	
	
	<div class="grid_12"><h4>Datos Escolares</h4></div>
	
	<div class="grid_12">
	
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
	
	</div>
	
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">
	
		<div class="grid_3">
			<?php if($model->isNewRecord){ ?>
			<?php echo $form->labelEx($inscripcion,'ciclo'); ?>
			<br>
			<?php echo $form->dropDownList($inscripcion,'ciclo', 
					CHtml::listData(Ciclo::model()->findAll("estatus=1"), 'id_ciclo', 'ciclo'),
					array("style"=>"width:205px")); ?>
			
			<?php } 
				  else{
					echo $form->labelEx($inscripcion,'ciclo');
					echo "<br>";
					echo $inscripcion->ciclo0->ciclo;					
					echo $form->textField($inscripcion,'ciclo', array("readonly"=>true, "hidden"=>true));
				  } ?>	
		</div>
		
		<div class="grid_3">
	
			<?php if($model->isNewRecord){ ?>
			<?php echo $form->labelEx(Seccion::model(),'seccion'); ?>
			<br>
			<?php echo $form->dropDownList(Seccion::model(),'id_seccion', 
					CHtml::listData(Seccion::model()->findAll(), 'id_seccion', 'seccion'), 
					array("style"=>"width:205px")); ?>
			<?php } 
			
			else{
				echo $form->labelEx(Seccion::model(),'seccion');
				echo "<br>";
				echo $inscripcion->grado0->seccion0->seccion;				
			} ?> 
		</div>
		
		<div class="grid_3">
		
			<?php if($model->isNewRecord){ ?>
			<?php echo $form->labelEx($inscripcion,'grado'); ?>
			<br>
			<?php echo $form->dropDownList($inscripcion,'grado', 
					CHtml::listData(Grado::model()->findAll(), "id_grado", "grado"), 
					array("style"=>"width:205px")); ?>
			
			<?php } 
				  else{
					echo $form->labelEx($inscripcion,'grado');
					echo "<br>";
					echo $inscripcion->grado0->grado0->grado;					
					echo $form->textField($inscripcion,'grado', array("readonly"=>true, "hidden"=>true));
				  } ?>		
		</div>		
		
		<div class="grid_3">
		
			<?php if($model->isNewRecord){ ?>
			<?php echo $form->labelEx($inscripcion,'especialidad'); ?>
			<br>
			<?php echo $form->dropDownList($inscripcion,'especialidad', 
					CHtml::listData(Especialidad::model()->findAll(), "id_especialidad", "especialidad"), 
					array("style"=>"width:205px", "empty"=>" ", "disabled" => true)); ?>
			
			<?php } 
				  else{
					echo $form->labelEx($inscripcion,'especialidad');
					echo "<br>";
						
					if($inscripcion->especialidad0 != null)
						echo $inscripcion->especialidad0->especialidad;
					
					echo $form->textField($inscripcion,'especialidad', array("readonly"=>true, "hidden"=>true));					
				  } ?>		
		</div>		
	
	</div>	
	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12"><h4>Datos del Alumno</h4></div>
	
	<div class="grid_12">
		
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'nombre'); ?>			
			<?php echo $form->textField($personal,'nombre',array('size'=>'45', 'maxlength'=>45)); ?>		
		</div>
		
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'apellido_pat'); ?>
			<?php echo $form->textField($personal,'apellido_pat',array('size'=>'45', 'maxlength'=>45)); ?>
		</div>
		
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'apellido_mat', array("style"=>"width:135px")); ?>
			<?php echo $form->textField($personal,'apellido_mat',array('size'=>'45', 'maxlength'=>45)); ?>
		</div>
	
	</div>		

	<div class="grid_12">
		
		<div class="grid_4">
			<?php echo $form->labelEx($personal,'lugar_nac'); ?>		
			<?php echo $form->textField($personal,'lugar_nac',array('size'=>45, 'maxlength'=>45)); ?>				
		</div>
		
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'fecha_nac'); ?>
			<?php echo $form->textField($personal,'fecha_nac',	array('style'=>'width:45', "hidden"=>true)); ?>
				
			<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'Personales[fecha_nac_2]',
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
					'readonly' => true,
					'size'=>'40px'
			    ),
			));?>
		
		</div>
		
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'edad', array("style"=>"width:103px")); ?>
			<?php echo $form->textField($personal,'edad', array('size'=>'45', 'maxlength'=>45, "readonly"=>false)); ?>		
		</div>
		
	</div>
	
	<div class="grid_12">
		<div class="grid_4 compactRadioGroup">
			<?php echo $form->labelEx($personal,'sexo'); ?>	
			<?php echo $form->radioButtonList($personal,'sexo', 
						array('H'=>'Hombre', 'M'=>'Mujer'),  
						array('labelOptions' => array('style'=>'display:inline'),
						'separator' => "  " ));
			?> 	
			
		</div>
	</div>

	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12">
		
		<div class="grid_4">	
			<?php echo $form->labelEx($personal,'direccion'); ?>
			<?php echo $form->textField($personal,'direccion',array('size'=>45, 'maxlength'=>45)); ?>
		</div>		
		
		<div class="grid_4">	
			<?php echo $form->labelEx($personal,'colonia'); ?>			
			<?php echo $form->textField($personal,'colonia',array('size'=>45, 'maxlength'=>45)); ?>
		</div>		
		
		<div class="grid_4">	
			<?php echo $form->labelEx($personal,'municipio'); ?>
			<?php echo $form->textField($personal,'municipio',array('size'=>45, 'maxlength'=>45)); ?>
		</div>
		
	</div>

	<div class="grid_12">
	
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'estado'); ?>		
			<?php echo $form->dropDownList($personal,'estado', 
					CHtml::listData(Estado::model()->findAll(), "codigo", "nombre"), 
					array("style"=>"width:305px")); ?>	
		</div>
		
		
		<div class="grid_4">
			<?php echo $form->labelEx($personal,'nacionalidad'); ?>			
			<?php echo $form->textField($personal,'nacionalidad',array('size'=>'45', 'maxlength'=>45)); ?>		
		</div>
		
		<div class="grid_4">
			<?php echo $form->labelEx($personal,'cp'); ?>
			<?php echo $form->textField($personal,'cp',array('size'=>'45', 'maxlength'=>45)); ?>		
		</div>
	</div>
	
	<div class="grid_12">
	
		<div class="grid_4">		
			<?php echo $form->labelEx($personal,'telefono'); ?>
			<?php echo $form->textField($personal,'telefono',array('size'=>'45', 'maxlength'=>45)); ?>	
		</div>
		
		
		<div class="grid_4">
		<?php echo $form->labelEx($personal,'celular'); ?>
		<?php echo $form->textField($personal,'celular',array('size'=>'45', 'maxlength'=>45)); ?>		
		</div>
		
		<div class="grid_4">
			<?php echo $form->labelEx($personal,'email'); ?>
			<?php echo $form->textField($personal,'email',array('size'=>'45', 'maxlength'=>45)); ?>		
		</div>
	</div>


	
	<div class="grid_12">&nbsp;</div>
	
	<div class="grid_12"><h4><a href="#datos_laborales" class="title_hidden">Datos Laborales</a></h4></div>
	<div class="seccion_group" id="datos_laborales">
	
	
		<div class="grid_12">			
		
			<div class="grid_4 compactRadioGroup">	
			<br>				
				<?php echo $form->radioButtonList($laboral,'trabaja', 
					array("1"=>'Trabaja', "2"=>'No Trabaja'),																				
					array('class'=>'trabaja', 'labelOptions' => array('style'=>'display:inline'), 
					'separator'=>' ')); ?> 
			</div>	
	
			<div class="grid_4">
				<?php echo $form->labelEx($laboral,'empresa'); ?>
				<?php echo $form->textField($laboral,'empresa',array('class'=>'laboral', 'size'=>45, 'maxlength'=>45)); ?>	
			</div>
	
			<div class="grid_4">		
				<?php echo $form->labelEx($laboral,'puesto'); ?>
				<?php echo $form->textField($laboral,'puesto',array('class'=>'laboral', 'size'=>45, 'maxlength'=>45)); ?>	
			</div>
	
			<div class="grid_12">&nbsp;</div>
	
			<div class="grid_4">&nbsp;</div>
	
			<div class="grid_4">		
				<?php echo $form->labelEx($laboral,'horario'); ?>
				<?php echo $form->textField($laboral,'horario',array('class'=>'laboral', 'size'=>45, 'maxlength'=>45)); ?>	
			</div>
	
			<div class="grid_4">		
				<?php echo $form->labelEx($laboral,'telefono'); ?>
				<?php echo $form->textField($laboral,'telefono', array('class'=>'laboral', 'size'=>45, 'maxlength'=>45)); ?>	
			</div>	
	
		</div>
	</div>
	
	<div class="grid_12"><h4><a href="#referencias_familiares" class="title_hidden">Referencias Familiares / Contacto</a></h4></div>	
	<div class="seccion_group" id="referencias_familiares">
	
		<div class="grid_12">
		
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'padre'); ?>
				<?php echo $form->textField($parents,'padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'parentesco_padre'); ?>
				<?php echo $form->textField($parents,'parentesco_padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'esc_padre'); ?>
				<?php echo $form->textField($parents,'esc_padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
		</div>
		
		<div class="grid_12">
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'dir_padre'); ?>
				<?php echo $form->textField($parents,'dir_padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'tel_padre'); ?>
				<?php echo $form->textField($parents,'tel_padre',array('size'=>45, 'maxlength'=>45)); ?>		
			</div>
		
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'cel_padre'); ?>
				<?php echo $form->textField($parents,'cel_padre',array('size'=>45, 'maxlength'=>45)); ?>		
			</div>
		</div>
		
		<div class="grid_12">
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'ocu_padre'); ?>
				<?php echo $form->textField($parents,'ocu_padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'emp_padre'); ?>
				<?php echo $form->textField($parents,'emp_padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
		
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'tel_emp_padre'); ?>
				<?php echo $form->textField($parents,'tel_emp_padre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
		</div>
	
		
		<div class="grid_12">	
			
			<div class="grid_4">		
				<?php echo $form->labelEx($parents,'email_padre'); ?>
				<?php echo $form->textField($parents,'email_padre',array('size'=>45,'maxlength'=>45)); ?>
			</div>
		</div>
	
		
		<div class="grid_12">&nbsp;</div>	
		
		<div class="grid_12">
		
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'madre'); ?>
				<?php echo $form->textField($parents,'madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'parentesco_madre'); ?>
				<?php echo $form->textField($parents,'parentesco_madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'esc_madre'); ?>
				<?php echo $form->textField($parents,'esc_madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
		</div>
		
		<div class="grid_12">
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'dir_madre'); ?>
				<?php echo $form->textField($parents,'dir_madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'tel_madre'); ?>
				<?php echo $form->textField($parents,'tel_madre',array('size'=>45, 'maxlength'=>45)); ?>		
			</div>
		
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'cel_madre'); ?>
				<?php echo $form->textField($parents,'cel_madre',array('size'=>45, 'maxlength'=>45)); ?>		
			</div>
		</div>
		
		<div class="grid_12">
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'ocu_madre'); ?>
				<?php echo $form->textField($parents,'ocu_madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'emp_madre'); ?>
				<?php echo $form->textField($parents,'emp_madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
		
			<div class="grid_4">
				<?php echo $form->labelEx($parents,'tel_emp_madre'); ?>
				<?php echo $form->textField($parents,'tel_emp_madre',array('size'=>45,'maxlength'=>45)); ?>		
			</div>
		</div>

	
		<div class="grid_12">	
			
			<div class="grid_4">		
				<?php echo $form->labelEx($parents,'email_madre'); ?>
				<?php echo $form->textField($parents,'email_madre',array('size'=>45,'maxlength'=>45)); ?>
			</div>
		</div>	
		
	</div>	
		
<!-- 	<div class="row">&nbsp;</div> -->
	<div class="grid_12"><h4><a href="#datos_medicos" class="title_hidden">Datos Medicos</a></h4></div>
	
	<div class="seccion_group" id="datos_medicos">	
		<div class="grid_12">	
		
			<div class="grid_4">
				<?php echo $form->labelEx($medico,'estatura'); ?>
				<?php echo $form->textField($medico,'estatura',array('size'=>45, 'maxlength'=>45)); ?>
			</div>
		
			<div class="grid_4">
				<?php echo $form->labelEx($medico,'peso'); ?>
				<?php echo $form->textField($medico,'peso',array('size'=>45, 'maxlength'=>45)); ?>
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($medico,'tipo_sangre'); ?>
				<?php echo $form->textField($medico,'tipo_sangre',array('size'=>45, 'maxlength'=>45)); ?>
			</div>		
	
		</div>	
	
		<div class="grid_12">
		
			<div class="grid_4">
				<label> Alergias	
				<?php echo $form->checkBox($medico,'alergia', array("class" => "enable_medicos", "enable" => "#Medico_des_alergia")); ?>
				</label>	
				<?php echo $form->textArea($medico, 'des_alergia', array('maxlength' => 300, 'rows' => 3, 'cols' => 35, "readonly" => true)); ?>	
			</div>
		
			<div class="grid_4">
				<label> Padecimientos
				<?php echo $form->checkBox($medico,'padecimiento', array("class" => "enable_medicos", "enable" => "#Medico_des_padecimiento")); ?>
				</label>	
				<?php echo $form->textArea($medico, 'des_padecimiento', array('maxlength' => 300, 'rows' => 3, 'cols' => 35, "readonly" => true)); ?>
			</div>
		
			<div class="grid_4">
				<label> Discapasidad
				<?php echo $form->checkBox($medico,'discapacidad', array("class" => "enable_medicos", "enable" => "#Medico_des_discapacidad")); ?>
				</label>
				<?php echo $form->textArea($medico, 'des_discapacidad', array('maxlength' => 300, 'rows' => 3, 'cols' => 35,"readonly" => true)); ?>
			</div>
		</div>
	</div>
	
<!-- 	<div class="row">&nbsp;</div> -->
	<div class="grid_12"><h4><a href="#socio_economicos" class="title_hidden">Datos Socio-Economicos</a></h4></div>
	
	<div class="seccion_group" id="socio_economicos">
		<div class="grid_12">
	
			<div class="grid_4">
				<?php echo $form->labelEx($economicos,'hermanos'); ?>
				<?php echo $form->textField($economicos,'hermanos',array('size'=>45, 'maxlength'=>45)); ?>
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($economicos,'lugar'); ?>
				<?php echo $form->textField($economicos,'lugar',array('size'=>45, 'maxlength'=>45)); ?>
			</div>
		
		
			<div class="grid_4">
				<?php echo $form->labelEx($economicos,'tipo_casa'); ?>
				<?php echo $form->textField($economicos,'tipo_casa',array('size'=>45, 'maxlength'=>45)); ?>
			</div>		
		</div>

		<div class="grid_12">
		
			<div class="grid_4">
				<?php echo $form->labelEx($economicos,'personas_casa', array("style"=>"width:135px")); ?>
				<?php echo $form->textField($economicos,'personas_casa',array('size'=>45, 'maxlength'=>45)); ?>
			</div>
			
			<div class="grid_4">
				<?php echo $form->labelEx($economicos,'cuartos'); ?>
				<?php echo $form->textField($economicos,'cuartos',array('size'=>45, 'maxlength'=>45)); ?>
			</div>
				
		</div>

	</div>	

	<div class="grid_12">&nbsp;</div>
	
	<a href="javascript:history.back()"><img src="imagenes/iconos/grid/back.png">Regresar</a>
	
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', 
			array("class"=>"button green", 
			"style"=>"color:white; margin-left: 10px;")); ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
