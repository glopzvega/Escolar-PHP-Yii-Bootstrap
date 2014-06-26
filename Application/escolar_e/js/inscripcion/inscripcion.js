Inscripcion = function(){
	
	this.getFecha = function(){
		
		var f = new Date();
		var m = ["01","02","03","04","05","06","07","08","09","10","11","12"];
		
		var day = (f.getDate() < 10) ? "0" + f.getDate() : f.getDate();	
		var mes = m[f.getMonth()];
		var year = f.getFullYear();	
				
		var fecha = year + "-" + mes + "-" + day;	
		//fecha = fecha + " " + f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds()
				
		return fecha;
	};	
	
	this.generarListaBySeccion = function(seccion, obj){		
		
		$.getJSON("index.php?r=grado/findGrados&seccion=" + seccion, function(data){
			
			var options = "";
			var c = 0;
			$.each(data, function(index, option){
				options += "<option value='" + option.id_grado + "'>" + option.grado + "</option>";
				c++;
				
				if(data.length == c)
					$("#Inscripcion_grado").html(options);
			});			
		});
	}
	
	this.getRequisitosEntregados = function(obj, noEntregados){
			
		var ids = "";
		var count = 0;		
		
		if(!noEntregados){
			
			obj.find(":checked").each(function(index, checked){
				
				ids += $(checked).attr("id");			
				count++;
				
				if(count < obj.find(":checked").length){
					ids += ",";
				}	
			});
		}
		else{			
		
			obj.find(":checkbox").not(":checked").each(function(index, checked){
				
				ids += $(checked).attr("id");			
				count++;
				
				if(count < obj.find(":checkbox").not(":checked").length){
					ids += ",";
				}	
			});	
		}
		
		return ids;
	}
	
}