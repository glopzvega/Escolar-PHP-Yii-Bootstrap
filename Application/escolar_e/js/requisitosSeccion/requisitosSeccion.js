RequisitosSeccion = function(){
	
	this.generarClaveByRequisito = function(seccion, requisito){
	
		var value_seccion = seccion.val();
		var value_requisito = requisito.val();
		
		if(value_seccion == "" || value_requisito == "")
			return "";
		
		return value_requisito + value_seccion;		
	}	
}