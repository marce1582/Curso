
function updateAction(){
	var frm=document.getElementById("form");
	frm.action ="php/update.php";
	//alert("Informacion actualizada");
	
}

function addAction() {
	var frm=document.getElementById("form");

	frm.action = "php/adduser.php";
	//alert("Nuevo Empleado ingresado");

}

function borrarAction(){

 //alert("Usuario Eliminado");
 
    let frm=document.getElementById("form");
 	frm.action= "php/deluser.php";


}


 function nuevoDto(){
  let frm=document.getElementById("formdto");
 frm.action= "php/nuevodto.php";
 
}
 function updateDto(){
 let frm=document.getElementById("formdto");
 frm.action= "php/updatedto.php";
 

}

function listDto(){
 let frm=document.getElementById("formdto");
 frm.action= "php/listardto.php";
 
}

function listarApellido(){
let frm=document.getElementById("form");
	frm.action= "php/listarapellido.php";
}

function Query(){
let frm=document.getElementById("form");
frm.action = "php/query.php";
}

/*function validar(){
	var nombre = document.usuarioNuevo.nombre.value;
	var apellido = document.usuarioNuevo.apellido.value;
	var dni = document.usuarioNuevo.dni.value;
	if(nombre==0){
 	alert("Debe completar el campo Nombre");
		document.usuarioNuevo.nombre.focus();
		return 0;
	}else if(apellido==0){
		alert("Debe completar el campo Apellido");
		document.usuarioNuevo.apellido.focus();
		return 0;
	}else if(dni==0){
		alert("Debe completar el campo DNI");
		document.usuarioNuevo.dni.focus();
		return 0;
	}else{
		btnUpdate.addEventListener('click',updateAction);
}
}
*/

let btnUpdate = document.getElementById("update");
let btnAdd = document.getElementById("add");
let btnBorrar = document.getElementById("del");
let btnNuevoDto = document.getElementById("nDto");
let bntUpdateDto= document.getElementById("updateDto");
let btnListaApellido = document.getElementById("listarapellido");
let btnListDto = document.getElementById("listardto");
let btnEliminar = document.getElementById("eliminar");
let bntQuery = document.getElementById("query");

btnAdd.addEventListener('click', addAction);
btnListaApellido.addEventListener('click',listarApellido);
btnNuevoDto.addEventListener('click',nuevoDto);
btnListDto.addEventListener('click',listDto);
btnUpdate.addEventListener('click',updateAction);
bntUpdateDto.addEventListener('click',updateDto);
bntQuery.addEventListener('click',Query);

//btnUpdate.addEventListener('click',validar);