Grupo = function(){
	
	this.generarListaBySeccion = function(seccion, obj, callback){		
		
		$.getJSON("index.php?r=grado/findGrados&seccion=" + seccion, function(data){
			
			var options = "";
			var c = 0;
			$.each(data, function(index, option){
				options += "<option value='" + option.id_grado + "'>" + option.grado + "</option>";
				c++;
				
				if(data.length == c){
					obj.html(options);
					if(callback != null) callback();
				}
					
			});			
		});
	}	
	
}