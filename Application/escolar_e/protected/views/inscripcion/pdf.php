<?php 

$nombre = $personal->nombre;
$paterno = $personal->apellido_pat;
$materno = $personal->apellido_mat;
$fecha_nac = explode(" ", $personal->fecha_nac);
$fecha_nac = $fecha_nac["0"];
$sexo = ($personal->sexo == "H") ? "Hombre" : "Mujer";
$direccion = $personal->direccion;
$cp = $personal->cp;
$colonia = $personal->colonia;
$municipio = $personal->municipio;
$estado = $personal->estados->nombre;

?> 

<link rel="stylesheet" href="css/report.css" type="text/css">

<style type="text/css">

h1{
    color:red;
    text-align: center;
}

table{
    /*margin: auto;*/
	/*border: 1px solid gray;*/
}

table td,table th{
    /*border: 1px solid gray;*/
    border-collapse: collapse;
    padding: 5px;
	height: auto;
	text-align: left;
	float:left;
}

.border{
	border: 1px solid gray;
}

</style>


<table align="center">

	<tr>
		<td><img class="img_logo" src="images/logo.png" /></td>
		<td><h4>SOLICITUD DE INSCRIPCION Y REINSCRIPCION DEL ASPIRANTE</h4></td>
		<!--<td><img class="img_foto" src="images/profile_small.png" /></td>-->
		<td><img width=80 height=80 class="img_foto" src="<?php echo $alumno->foto_perfil;  ?>" /></td>
	</tr>

</table>

<br>

<table align="center">

	<tr>
		<td style="width:535px;"><b>Indica la Seccion y el grado a ingresar</b></td>
		<td class="">Campus: </td>		
		<td class=""><b> <?php echo $model->campus0->campus; ?></b></td>		
	</tr>

</table>

<table align="left" style="margin-left:20px;">

	<tr>
		<td>
			<table>
				<tr>
					<td>Ciclo</td>
					<td><b> <?php echo $model->ciclo0->ciclo; ?> </b></td>
				</tr>
				<tr>
					<td>Seccion</td>
					<td><b> <?php echo $model->grado0->seccion0->seccion; ?> </b></td>
				</tr>
				<tr>
					<td>Grado</td>					
					<td><b> <?php echo $model->grado0->grado0->grado; ?> </b></td>
				</tr>
			</table>
		</td>

		<td>
			<table>
				<tr>
					<td>Plan de Pago</td>
					<td><b> <?php echo $model->planpago->plan; ?> </b></td>
				</tr>
				<tr>
					<td>Facturacion con RFC</td>
					<td><b> <?php echo ($model->facturacion_rfc == "1") ? "Si" : "No"; ?> </b></td>
				</tr>
				<tr>
					<td>Credencial</td>					
					<td><b> <?php echo $model->cred->credencial; ?> </b></td>
				</tr>
			</table>
		</td>
		<td rowspan="2">
			<table>
				<tr><td>Observaciones de la direccion</td></tr>
				<tr>			
					<td>
					<textarea rows="7" cols="30"></textarea>
					</td>
				</tr>				
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<table>
				
				<tr>
					<td>Modalidad</td>
					<td><b> <?php echo $model->mod->modalidad; ?> </b></td>
				</tr>
				<tr>
					<td>Email Factura Electronica</td>
					<td><b> <?php echo $model->email_factura; ?> </b></td>
				</tr>
				<tr>
					<td>Como se entero de nosotros :</td>					
					<td><b> <?php echo $model->enterar->descripcion; ?> </b></td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>

<br>

<table align="center">
	<tr><td style="width:700px;"><b>DATOS DEL SOLICITANTE</b></td></tr>
</table>

<br>

<table align="center" class="border">
	<tr>
		<td style="width:220px;">Ap. Paterno : <b> <?php echo $paterno; ?> </b></td>
		<td style="width:220px;">Ap. Materno : <b> <?php echo $materno; ?> </b></td>		
		<td style="width:220px;">Nombre (s) : <b> <?php echo $nombre; ?> </b></td>		
	</tr>
	
	<tr>
		<td style="width:220px;">Lugar Nac. : <b> Acapulco, Gro.</b></td>
		<td style="width:220px;">Fecha Nac. : <b> <?php echo $fecha_nac; ?> </b></td>		
		<td style="width:220px;">Sexo : <b> <?php echo $sexo; ?> </b></td>		
	</tr>

	<tr>
		<td colspan="2" style="width:440px;">Direccion: <b> <?php echo $direccion; ?></b></td>		
		<td colspan="1" style="width:220px;">CP: <b> <?php echo $cp; ?></b></td>		
	</tr>

	<tr>
		<td style="width:220px;">Colonia: <b> <?php echo $colonia; ?></b></td>
		<td style="width:220px;">Municipio: <b> <?php echo $municipio; ?></b></td>		
		<td style="width:220px;">Estado: <b> <?php echo $estado; ?></b></td>		
	</tr>
	
	<tr>
		<td style="width:220px;">Telefono: <b><?php echo $personal->telefono; ?></b></td>
		<td style="width:220px;">Celular: <b> <?php echo $personal->celular; ?></b></td>		
		<td style="width:220px;">Email: <b> <?php echo $personal->email; ?></b></td>		
	</tr>

	<tr>
		<td style="width:220px;">Trabaja : <b><?php echo ($alumno->laborales->trabaja == 1) ? "Si" : "No"; ?></b></td>
		<td style="width:440px;" colspan="2">Empresa : <b><?php echo $alumno->laborales->empresa; ?></b></td>				
		
	</tr>
	
	<tr>
		<td style="width:220px;">Puesto : <b> <?php echo $alumno->laborales->puesto; ?> </b></td>
		<td style="width:220px;">Horario : <b> <?php echo $alumno->laborales->horario; ?></b></td>		
		<td style="width:220px;">Telefono: <b><?php echo $alumno->laborales->telefono; ?></b></td>		
	</tr>
</table>

<br>

<table align="center">
	<tr><td style="width:700px;"><b>DATOS FAMILIARES DE CONTACTO</b></td></tr>
</table>

<br>

<table align="center">
	<tr><td style="width:700px;"><h4 style="margin-left:20px;">Referencia #1</h4></td></tr>
</table>

<table align="center" class="border">
	<tr>
		<td style="width:220px;">Nombre : <b><?php echo $alumno->parents->padre; ?></b></td>		
		<td style="width:220px;">Parentesco: <b><?php echo $alumno->parents->parentesco_padre; ?></b></td>		
		<td style="width:220px;">Escolaridad: <b><?php echo $alumno->parents->esc_padre; ?></b></td>		
	</tr>
	
	<tr>
		<td style="width:660px;" colspan="3">Direccion: <b><?php echo $alumno->parents->dir_padre; ?></b></td>				
	</tr>
	
	<tr>
		<td style="width:220px;">Telefono: <b> <?php echo $alumno->parents->tel_padre; ?></b></td>		
		<td style="width:220px;">Celular: <b><?php echo $alumno->parents->cel_padre; ?></b></td>		
		<td style="width:220px;">Email: <b><?php echo $alumno->parents->email_padre; ?></b></td>		
	</tr>
	
	<tr>
		<td style="width:220px;">Empresa: <b><?php echo $alumno->parents->emp_padre; ?></b></td>		
		<td style="width:220px;">Puesto:<b><?php echo $alumno->parents->ocu_padre; ?></b></td>		
		<td style="width:220px;">Telefono: <b><?php echo $alumno->parents->tel_emp_padre; ?></b></td>		
	</tr>
</table>

<br>

<table align="center">
	<tr><td style="width:700px;"><h4 style="margin-left:20px;">Referencia #2</h4></td></tr>
</table>

<table align="center" class="border">
	<tr>
		<td style="width:220px;">Nombre : <b><?php echo $alumno->parents->madre; ?></b></td>		
		<td style="width:220px;">Parentesco: <b><?php echo $alumno->parents->parentesco_madre; ?></b></td>		
		<td style="width:220px;">Escolaridad: <b><?php echo $alumno->parents->esc_madre; ?></b></td>		
	</tr>
	
	<tr>
		<td style="width:660px;" colspan="3">Direccion: <b><?php echo $alumno->parents->dir_madre; ?></b></td>				
	</tr>
	
	<tr>
		<td style="width:220px;">Telefono: <b> <?php echo $alumno->parents->tel_madre; ?></b></td>		
		<td style="width:220px;">Celular: <b><?php echo $alumno->parents->cel_madre; ?></b></td>		
		<td style="width:220px;">Email: <b><?php echo $alumno->parents->email_madre; ?></b></td>		
	</tr>
	
	<tr>
		<td style="width:220px;">Empresa: <b><?php echo $alumno->parents->emp_madre; ?></b></td>		
		<td style="width:220px;">Puesto:<b><?php echo $alumno->parents->ocu_madre; ?></b></td>		
		<td style="width:220px;">Telefono: <b><?php echo $alumno->parents->tel_emp_madre; ?></b></td>		
	</tr>
</table>