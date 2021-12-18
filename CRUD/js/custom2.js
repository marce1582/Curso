	
function validar(e){
  var nombre = document.login.nombre.value;
  var clave = document.login.clave.value;
  var correo = document.login.correo.value;
  
  var exp =/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
  


  if(nombre==0){
  alert("Debes completar el campo Nombre");
    document.login.nombre.focus();
   // return 0;
   e.preventDefault();
  }else if(clave==0){
    alert("Debes completar el campo Clave");
    document.login.clave.focus();
   // return 0;
   e.preventDefault();
  }else if(!exp.test(correo)){
    alert("Debes completar el campo correo");
    document.login.correo.focus();
   // return 0;
   e.preventDefault();
 }else{
    

 var ajax = new XMLHttpRequest();
 var data = document.getElementById('formRegistro');
 
	data.addEventListener('submit', (e) =>{
    	var datos = new FormData(data);
  		ajax.open('POST', '../php/validar.php');

  	ajax.onload = () => {
    	if(ajax.status === 200){
    		
    	window.location.replace("../index.php");
      	//console.log(ajax.responseText);
      	//console.log(datos);
        }else{
     		 console.log("error en la peticion: " + ajax.status);
    		}
	  }
  
	ajax.send(datos);
  	e.preventDefault();
		});
   } 
 }



