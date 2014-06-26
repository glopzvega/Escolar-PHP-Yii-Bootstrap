Ciclo = function(){

	this.prepareFecha = function(fecha){		
		
		if(fecha != null){
			var f = new Date(fecha)
			f.setDate(f.getDate() + 1);
			return f;
		}		
		
		return new Date();
	};
	
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
	
	this.getCiclo = function(inicio, fin){
		
		console.log(fin)
		
		var meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
		
		var f = this.prepareFecha(inicio);		
		var mes = meses[f.getMonth()]; 
		inicio = mes + this.getClaveCiclo(f);
		
		f = this.prepareFecha(fin);				
		mes = meses[f.getMonth()];
		fin = mes + this.getClaveCiclo(f);
		
		return inicio + "-" + fin;
	};	
	
	this.getClaveCiclo = function(f){
					
		var year = f.getFullYear();		
		return String(year).substr(2);		
	};
	
	this.validarCiclo = function(inicio, fin){
		
		var inicio = this.prepareFecha(inicio);
		var fin = this.prepareFecha(fin);
		
		if(inicio > fin)
			return false;
		
		return true;
	};
}