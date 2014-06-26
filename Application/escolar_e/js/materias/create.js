$(function(){
	
	var m = new Materias();
	
	var seccion = $("#Seccion_seccion");
	var grados = $("#Materias_grado");
	
	m.generarListaBySeccion(seccion.val(), grados);
	
	seccion.on("change",  function(){
		
		m.generarListaBySeccion($(this).val(), grados);
		
	});
	
});