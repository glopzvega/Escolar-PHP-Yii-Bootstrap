$(function(){
	
	var g = new Grupo();	
	
	var seccion = $("#Grupo_seccion_search");
	var grado = $("#Grupo_grado_search");
	
	var lista = g.generarListaBySeccion(seccion.val(), grado);	
	
	console.log(lista)
	seccion.on("change", function(){		
		
		g.generarListaBySeccion($(this).val(), grado);
		
	});
	
	
});