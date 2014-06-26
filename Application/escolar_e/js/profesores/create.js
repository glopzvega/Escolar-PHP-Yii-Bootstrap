$(function(){
	
	var p = new Profesores();

	var fecha_nac = $("#Profesores_fecha_nac");
	var fecha_nac_2 = $("#Profesores_fecha_nac_2").val(fecha_nac.val())
		
	//fecha_nac_2.val(fecha_nac.val());
	
	fecha_nac_2.on("change", function(){
				
		var fecha = $(this).val();
		fecha_nac.val(fecha);
		fecha = fecha.split("-");
		
		var edad = p.calcular_edad(fecha[2], fecha[1], fecha[0]);
		$("#Profesores_edad").val(edad);
	});
	
	
});