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
document.getElementById("compraTicket").reset();
document.getElementById("total").innerHTML ="Total a Pagar: $";

}
