Profesores = function(){
	
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
	
	this.calcular_edad = function(dia_nacim, mes_nacim, anio_nacim)
	{
	    fecha_hoy = new Date();
	    ahora_anio = fecha_hoy.getYear();
	    ahora_mes = fecha_hoy.getMonth();
	    ahora_dia = fecha_hoy.getDate();
	    edad = (ahora_anio + 1900) - anio_nacim;
	    if ( ahora_mes < (mes_nacim - 1))
	    {
	      edad--;
	    }
	    if (((mes_nacim - 1) == ahora_mes) && (ahora_dia < dia_nacim))
	    { 
	      edad--;
	    }
	    if (edad > 1900)
	    {
	    edad -= 1900;
	    }
	  return edad;
	}
}