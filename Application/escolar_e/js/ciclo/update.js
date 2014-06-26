$(function(){
	
	var c = new Ciclo();	
	
	var inicio = $("#Ciclo_inicio");
	inicio.val(inicio.val().split(" ")[0]);
	var inicio_2 = $("#Ciclo_inicio_2").val(inicio.val().split(" ")[0]);	
		
	var fin = $("#Ciclo_fin");
	fin.val(fin.val().split(" ")[0]);
	var fin_2 = $("#Ciclo_fin_2").val(fin.val().split(" ")[0]);	
	
	var fecha_limite = $("#Ciclo_fecha_limite");
	var fecha_limite_2 = $("#Ciclo_fecha_limite_2").val(fecha_limite.val().split(" ")[0]);
	
	var ciclo = $("#Ciclo_ciclo");
	var id_ciclo = $("#Ciclo_id_ciclo").val(c.getClaveCiclo(c.prepareFecha(inicio.val())));
	
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