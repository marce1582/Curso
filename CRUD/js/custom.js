

function validar(e){
  var nombre = document.login2.nombre.value;
  var clave = document.login2.clave.value;
 
 if(nombre==0){
  //alert("Debes completar el campo Nombre");
    document.login2.nombre.focus();
   // return 0;
   e.preventDefault();
  }else if(clave==0){
    alert("Debes completar el campo Clave");
    document.login2.clave.focus();
   // return 0;
   e.preventDefault();
  }else{
    
   var frm=document.getElementById("form1");
  frm.action ="php/login.php";

    } 
 
  }


function validar2(e){
  var id = document.dtoNuevo.id_dto.value;
  var dto = document.dtoNuevo.nombre_dto.value;
  var presupuesto = document.dtoNuevo.presupuesto.value;
 if(id==0){
  alert("Debes completar el campo numero de Depto");
    document.dtoNuevo.id_dto.focus();
   // return 0;
   e.preventDefault();
  }else if(dto==0){
    alert("Debes completar el campo Depto");
    document.dtoNuevo.nombre_dto.focus();
   // return 0;
      e.preventDefault();
  }else if(presupuesto==0){
    alert("Debes completar el campo presupuesto");
    document.dtoNuevo.presupuesto.focus();
   // return 0;
  e.preventDefault();
 }else{
    updateDto();
  }
}

function valadd(e){
  var nombre = document.usuarioNuevo.nombre.value;
  var apellido = document.usuarioNuevo.apellido.value;
  var dni = document.usuarioNuevo.dni.value;
  var cat = document.usuarioNuevo.cat.value;
 if(nombre==0){
  alert("Debes completar el campo Nombre");
    document.usuarioNuevo.nombre.focus();
   // return 0;
   e.preventDefault();
  }else if(apellido==0){
    alert("Debes completar el campo Apellido");
    document.usuarioNuevo.apellido.focus();
   // return 0;
      e.preventDefault();
  }else if(dni==0){
    alert("Debes completar el campo DNI");
    document.usuarioNuevo.dni.focus();
   // return 0;
  e.preventDefault();
 }else if(cat==0){
    alert("Debes seleccionar departamento");
    document.usuarioNuevo.cat.focus();
   // return 0;
  e.preventDefault();
 }
 else{
    addAction();
  }
}

function validarUpdate(e){
  var nombre = document.usuarioNuevo.nombre.value;
  var apellido = document.usuarioNuevo.apellido.value;
  var dni = document.usuarioNuevo.dni.value;
   var cat = document.usuarioNuevo.cat.value;
 if(nombre==0){
  alert("Debes completar el campo Nombre");
    document.usuarioNuevo.nombre.focus();
   // return 0;
   e.preventDefault();
  }else if(apellido==0){
    alert("Debes completar el campo Apellido");
    document.usuarioNuevo.apellido.focus();
   // return 0;
      e.preventDefault();
  }else if(dni==0){
    alert("Debes completar el campo DNI");
    document.usuarioNuevo.dni.focus();
   // return 0;
  e.preventDefault();
 }else if(cat==0){
    alert("Debes seleccionar departamento");
    document.usuarioNuevo.cat.focus();
   // return 0;
  e.preventDefault();
 }
 else{
  updateuser();
  }
}

function validarAdd(e){
  var id = document.dtoNuevo.id_dto.value;
  var dto = document.dtoNuevo.nombre_dto.value;
  var presupuesto = document.dtoNuevo.presupuesto.value;
 if(id==0){
  alert("Debes completar el campo numero de Depto");
    document.dtoNuevo.id_dto.focus();
   // return 0;
   e.preventDefault();
  }else if(dto==0){
    alert("Debes completar el campo Depto");
    document.dtoNuevo.nombre_dto.focus();
   // return 0;
      e.preventDefault();
  }else if(presupuesto==0){
    alert("Debes completar el campo presupuesto");
    document.dtoNuevo.presupuesto.focus();
   // return 0;
  e.preventDefault();
 }else{
    adddto();
  }
}




 function updateDto(){
 let frm=document.getElementById("formdto");
 frm.action= "updatedto.php";
 
}
function adddto() {
  var frm=document.getElementById("formdto");
  frm.action = "nuevodto.php";
}

function addAction() {
  var frm=document.getElementById("form");
  frm.action = "adduser.php";
}

function updateuser() {
  var frm=document.getElementById("form");
  frm.action = "update.php";
}
function admin() {
  var frm=document.getElementById("formdto");
  frm.action = "solicitud.php";

}


