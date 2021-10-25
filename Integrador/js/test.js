/*  Declaracion de funciones
*/
function descuento(){

   var cantidad = document.getElementById("cantidad").value;
   var descuento = document.getElementById("tipo").value;
   document.getElementById("total").innerHTML ="Total a Pagar: $";

   cantidad = cantidad*200;

   if(descuento == "estudiante" ){
       
   	 var pago = (cantidad*80)/100;

   } else if(descuento == "trainee"){
   	
       var pago = (cantidad*50)/100;
   }else{
   	
       var pago = (cantidad*15)/100;
   }
   
   document.getElementById("total").innerHTML += cantidad - pago;
    return cantidad - pago;
}

function borrar(){
document.getElementById("formTicket").reset();
document.getElementById("total").innerHTML ="Total a Pagar: $";

}


function valida(){
  let nombre = document.compraTicket.nombre.value;
  let apellido = document.compraTicket.apellido.value;
  let correo = document.compraTicket.correo.value;
  let exp =/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
  let cantidad = document.compraTicket.cantidad.value;
  
	if(nombre==0){
		alert("Debe completar el campo Nombre");
		document.compraTicket.nombre.focus();
		return 0;
	}else if(apellido==0){
		alert("Debe completar el campo Apellido");
		document.compraTicket.apellido.focus();
		return 0;
	}else if(correo==0){
		alert("Debe completar el campo Correo");
		document.compraTicket.correo.focus();
			return 0;
		}else if(!exp.test(correo)){
			alert("El correo ingresado  \"" + correo  +  "\" no tiene un formato valido" );
			document.compraTicket.correo.focus();
		return 0;
		}
		else if(cantidad==0 ){
			alert("Debe completar el campo Cantidad");
			document.compraTicket.cantidad.focus();
		return 0;

		}else {

			btnResumen.addEventListener('click',descuento);
		}


}
/*Fin funciones */

/*Variables*/
let bntBorrar = document.getElementById("borrar");
let btnResumen = document.getElementById("resumen");


/*Eventos */
btnResumen.addEventListener('click',valida);
bntBorrar.addEventListener('click',borrar);