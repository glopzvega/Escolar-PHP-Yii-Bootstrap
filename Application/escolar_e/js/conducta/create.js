$(function(){
	
	var c = new Conducta();
	
	var fecha_1 = $("#HistorialConducta_fecha");
	var fecha_2 = $("#fecha_2").val(fecha_1.val());
	
	fecha_2.on("change", function(){
		
		var fecha = $(this).val();
		fecha_1.val(fecha);		
	});
	
	
	
});