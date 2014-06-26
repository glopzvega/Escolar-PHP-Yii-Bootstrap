function popUp(URL) {
      day = new Date();
      id = day.getTime();
      eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=1,statusbar=1,menubar=0,resizable=0,width=500,height=500,left = 710,top = 290');");
}

function seleccionado(folio){

	var archivos = document.getElementById("archivos");
	var archivo = archivos.files; 

	var data = new FormData();

	for(var i=0; i<archivo.length; i++){
		data.append('archivo'+i,archivo[i]);
	}  

	data.append("folio", folio);

	$.ajax({
	    url:'', 
	    type:'POST',
	    data:data,
	    dataType: 'json',
	    contentType:false, //Debe estar en false para que pase el objeto sin procesar	    
	    processData:false, //Debe estar en false para que JQuery no procese los datos a enviar	    
	    cache:false //Para que el formulario no guarde cache
	})
	.done(function(response){
		  
		$(".img_profile").attr("src", response.tmp);	  
	
	  });
	}

$(function(){
	
	$("#archivos").on("change", function(){
		seleccionado($("[name=folio]").val());
	});
	
	$(".img_profile").on("click", function(){
		//popUp("index.php?r=alumno/perfil&id=13")
	});
	
});