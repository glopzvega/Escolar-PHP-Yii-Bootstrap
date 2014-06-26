Conducta = function(){	

	this.prepareFecha = function(fecha){		
		
		if(fecha != null){
			var f = new Date(fecha)
			f.setDate(f.getDate() + 1);
			return f;
		}		
		
		return new Date();
	}
	
	this.getFecha = function(){	
		
		var f = this.prepareFecha();
		var m = ["01","02","03","04","05","06","07","08","09","10","11","12"];
		
		var day = (f.getDate() < 10) ? "0" + f.getDate() : f.getDate();	
		var mes = m[f.getMonth()];
		var year = f.getFullYear();	
				
		var fecha = year + "-" + mes + "-" + day;	
		//fecha = fecha + " " + f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds()
				
		return fecha;
	};
	
}