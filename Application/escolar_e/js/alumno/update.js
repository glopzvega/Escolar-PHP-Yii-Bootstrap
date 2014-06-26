$(function(){
	
	var a = new Alumno();
	
	var fecha_nac = $("#Personales_fecha_nac");
	var fecha_nac_2 = $("#Personales_fecha_nac_2").val(fecha_nac.val().split(" ")[0]);
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
	})
	
	fecha_nac_2.on("change", function(){
		
		var fecha = $(this).val();
		fecha_nac.val(fecha);
		fecha = fecha.split("-");
		
		var edad = a.calcular_edad(fecha[2], fecha[1], fecha[0]);
		$("#Personales_edad").val(edad);
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
			
	}).each(function(i, v){
		
		var id_descripcion = $(this).attr("enable");
		
		if($(this).is(":checked")){					
			$(id_descripcion).attr("readonly", false);
		}
		else{
			$(id_descripcion).attr("readonly", true);
			$(id_descripcion).val("");
		}
	});
});