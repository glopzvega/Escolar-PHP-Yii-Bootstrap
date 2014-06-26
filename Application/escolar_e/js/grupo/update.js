$(function(){
	
	var g = new Grupo();	

	var seccion = $("#Grado_seccion");
	var grado = $("#Grupo_grado");
	var grado_id = grado.val();

	g.generarListaBySeccion(seccion.val(), grado, function(){
		grado.find("option[value=" + grado_id + "]").attr("selected", true);
	});
	
	
	seccion.on("change", function(){		
		
		g.generarListaBySeccion($(this).val(), grado);
		
	});
	
	
});