$(function(){
	
	var i = new Inscripcion();
	
	var fecha = $("#Inscripcion_fecha_inscripcion");
	var fecha_2 = $("#Inscripcion_fecha_inscripcion_2");
	var seccion = $("#Seccion_id_seccion");
	
	var requisitos = $(".req_inscripcion");
	var requisito = $("[name=req_inscripcion]");
	var requisito_pend = $("[name=req_inscripcion_pend]");
	
	fecha.val(i.getFecha());
	fecha_2.val(fecha.val());
	i.generarListaBySeccion(seccion.val(), $("#Seccion_id_seccion"));
	
	var ids = i.getRequisitosEntregados($("#RequisitosContainer"));
	var pend = i.getRequisitosEntregados($("#RequisitosContainer"), true);
	
	requisito.val(ids);	
	requisito_pend.val(pend);
	
	requisitos.on("click", function(){		
		
		var req = $(this);
		
		if(req.find("a.entregado").length == 0){
			
			var check = req.find(":checkbox");
			
			if(check.is(":checked")){
				check.attr("checked", false);
			}
			else{
				check.attr("checked", true);
			}
			
			var ids = i.getRequisitosEntregados($("#RequisitosContainer"));
			var pend = i.getRequisitosEntregados($("#RequisitosContainer"), true);
			
			requisito.val(ids);	
			requisito_pend.val(pend);
		
		}
	});
	
	fecha_2.on("change", function(){
		
		var date = $(this).val();
		fecha.val(date);
		
	});
	
	seccion.on("change", function(){		
		
		i.generarListaBySeccion($(this).val(), $("#Seccion_id_seccion"));
		
	});	
});