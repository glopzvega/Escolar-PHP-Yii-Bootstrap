$(function(){
	
	var rs = new RequisitosSeccion();
	
	var seccion = $("#RequisitosSeccion_seccion");
	var requisito = $("#RequisitosSeccion_requisito");
	var id_rs = $("#RequisitosSeccion_id_rs");
	
	requisito.on("change", function(){
		
		var clave = rs.generarClaveByRequisito(seccion, requisito);
		id_rs.val(clave);		
	});
	
});