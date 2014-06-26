$(function(){
	
	var a = new Alumno();
	
	var fecha_registro = $("#Alumno_fecha_registro").val(a.getFecha());	
	var seccion = $("#Seccion_id_seccion");		
	var fecha_nac = $("#Personales_fecha_nac");
	var fecha_nac_2 = $("#Personales_fecha_nac_2").val(fecha_nac.val())
	var laborales = $(".laborales").parent();	
	
	if(laborales.find(":checked").val() == 2){
		$(".laboral").attr("readonly", true);
		$(".laboral").val("");
	}
	
	laborales.find(".trabaja").on("click", function(){
		
		if($(this).is(":checked")){
			
			if($(this).val() == 2){
				$(".laboral").attr("readonly", true);
				$(".laboral").val("");
			}
			else{
				$(".laboral").attr("readonly", false);				
			}
				
			
		}
	});
	
	//fecha_nac_2.val(fecha_nac.val());
	
	a.generarListaBySeccion(seccion.val(), $("#Seccion_id_seccion"));
	
	if(seccion.val() == "5"){
		$("#Inscripcion_especialidad").attr("disabled", false);
	}
	
	seccion.on("change", function(){
		
		var seccion = $(this).val();
		
		if(seccion == "5"){
			$("#Inscripcion_especialidad").attr("disabled", false);
		}
		else
			$("#Inscripcion_especialidad").attr("disabled", true);
		
		a.generarListaBySeccion(seccion, $(this));		
	});	
	
	fecha_nac_2.on("change", function(){
				
		var fecha = $(this).val();
		fecha_nac.val(fecha);
		fecha = fecha.split("-");
		
		var edad = a.calcular_edad(fecha[2], fecha[1], fecha[0]);
		$("#Personales_edad").val(edad);
	});
	
	$(".seccion_group").hide();
	
	$(".title_hidden").on("click", function(e){
		e.preventDefault();
		
		var id_seccion= $(this).attr("href");		
		$(id_seccion).toggle();
		$(".seccion_group").not($(id_seccion)).hide();
		
	});
	
	$(".enable_medicos").on("click", function(){
		
		var id_descripcion = $(this).attr("enable");
		
		if($(this).is(":checked")){					
			$(id_descripcion).attr("readonly", false);
		}
		else{
			$(id_descripcion).attr("readonly", true);
			$(id_descripcion).val("");
		}
			
	})
	
	
});