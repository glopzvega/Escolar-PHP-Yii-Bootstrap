<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'ALUMNOS'=>array('index'),
	$model->folio,
);

$this->menu=array(
// 	array('label'=>'Listar Alumnos', 'url'=>array('index')),
	array('label'=>'Registrar Alumno', 'url'=>array('alumno/create')),
	array('label'=>'Editar Alumno', 'url'=>array('alumno/update', 'id'=>$model->id_alumno)),
// 	array('label'=>'Eliminar Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_alumno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion de Alumnos', 'url'=>array('inscripcion/index')),
);
?>

<div class="box grid_10"> 
<div class="box-head "><h2>Perfil del Alumno #<?php echo $model->folio; ?></h2></div>
<div class="box-content">

	<div class="grid_12">&nbsp;</div>

	<div class="grid_12">

		<div class="grid_2">
		
			<input type="hidden" name="folio" value="<?php echo $model->folio; ?>">
			<label class="filebutton">	
				<img class="img_profile" alt="" src="<?php echo $model->foto_perfil; ?>" width="150px" height="200px">
				<span><input id="archivos" type="file" name="archivos[]" accept="image/*" value="Subir Imagen de Perfil"/></span>
			</label>	
		</div>
		
		<div class="grid_9">
		
		<?php 
			$personales = $model->personales;
			$nombre = $personales->nombre;
			$paterno = $personales->apellido_pat;
			$materno = $personales->apellido_mat;
			$fecha = explode(" ", $model->fecha_registro);
			$fecha_inscripcion = explode(" ", $inscripcion->fecha_inscripcion);
			
			$direccion = $personales->direccion;
			$colonia = $personales->colonia;
			$municipio = $personales->municipio;
			$estado = $personales->estados->nombre;
			?>
		
			<div class="grid_6">
				Nombre:<h2> <?php echo $nombre . " " . $paterno . " " . $materno; ?></h2>
			</div>
		
			<div class="grid_3">
				Folio:<h2># <?php echo $model->folio; ?></h2>
			</div>
			
			<div class="grid_3">
				Fecha de Registro:<h2> <?php echo $fecha[0]; ?></h2>
			</div>
			
			<div class="grid_12">&nbsp;</div>
			
			<div class="grid_3">
				Estatus del Alumno: <h2> <?php echo ($model->estatus == 1) ? "Habilitado" : "Deshabilitado"; ?></h2>
			</div>
			
			<div class="grid_3">
				Edad: <h2> <?php echo $model->personales->edad . " a&ntilde;os"; ?></h2>
			</div>
			
			<div class="grid_3">
				Sexo: <h2> <?php echo ($model->personales->sexo == "M") ? "Mujer" : "Hombre"; ?></h2>
			</div>
			
			<div class="grid_3">
				Fecha de Inscripcion:<h2> <?php echo $fecha_inscripcion[0]; ?></h2>
			</div>
			
			<div class="grid_12">&nbsp;</div>
			
			<div class="grid_12">
				Direccion:<h2> <?php echo $direccion.", ".$colonia.", ".$municipio.", ".$estado; ?></h2>
			</div>
			
			<div class="grid_12">&nbsp;</div>
			
			<div class="grid_3">
				Telefono:<h2># <?php echo $personales->telefono; ?></h2>
			</div>
			
			<div class="grid_3">
				Celular:<h2># <?php echo $personales->celular; ?></h2>
			</div>
			
		</div>
	
	</div>
	
	<div class="grid_12">&nbsp;</div>
	
	<hr>	
	
	<?php if($inscripcion->estatus == "4"){?>
	<h3><a href="images/formatos/beneficio_<?php echo $inscripcion->beneficio;?>.pdf" target="_blank">Documento de Inscripcion</a></h3>
	<?php }  ?>
	
			

<?php Yii::app()->clientScript->registerScript('ciclo_create', file_get_contents('js/inscripcion/perfil.js')); ?>

<a href="javascript:history.back()"><img src="imagenes/iconos/grid/back.png">Regresar</a>

</div>
</div>