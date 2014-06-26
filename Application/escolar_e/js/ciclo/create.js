$(function(){
	
	var c = new Ciclo();	
	
	var datepickers = $(".hasDatepicker").val(c.getFecha());	
	
	var inicio_2 = $("#Ciclo_inicio_2");
	var inicio = $("#Ciclo_inicio").val(inicio_2.val());
	
	var fin_2 = $("#Ciclo_fin_2");
	var fin = $("#Ciclo_fin").val(fin_2.val());
	
	var fecha_limite_2 = $("#Ciclo_fecha_limite_2");
	var fecha_limite = $("#Ciclo_fecha_limite").val(fecha_limite_2.val());
	
	var ciclo = $("#Ciclo_ciclo").val(c.getCiclo(inicio.val(), fin.val()));
	var id_ciclo = $("#Ciclo_id_ciclo").val(c.getClaveCiclo(c.prepareFecha(inicio.val())));

	var fecha = datepickers.val();
	
	//inicio_2.datepicker("option", "maxDate", fin.val());
	//fin_2.datepicker("option", "minDate", inicio.val());
	
	inicio_2.on("change", function(){	
		
		fecha = $(this).val();		
		//fin_2.datepicker("option", "minDate", $(this).val());		
		
		if(c.validarCiclo(fecha, fin.val())){			
			inicio.val(fecha);
		}		
		else{
			inicio.val(fecha);
			fin.val(inicio.val());
			fin_2.val(inicio.val());
		}		
		ciclo.val(c.getCiclo(inicio.val(), fin.val()));
		id_ciclo.val(c.getClaveCiclo(c.prepareFecha(fecha)))		
	});
	
	fin_2.on("change", function(){
		
		fecha = $(this).val();		
		//inicio_2.datepicker("option", "maxDate", $(this).val());
		
		if(c.validarCiclo(inicio.val(), fecha)){
			fin.val(fecha);
		}		
		else{			
			fin.val(fecha);
			inicio.val(fin.val());
			inicio_2.val(fin.val());
		}		
		ciclo.val(c.getCiclo(inicio.val(), fin.val()));
	});
	
	fecha_limite_2.on("change", function(){
		
		fecha = $(this).val();	
		fecha_limite.val(fecha);		
	});
	
});