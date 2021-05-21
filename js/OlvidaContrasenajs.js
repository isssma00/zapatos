//Declaramos las constantes
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const DNI = document.getElementById('DNI');
//errores
const errorpassword = document.getElementById('errorpassword');
const errorpassword2 = document.getElementById('errorpassword2');
const errorDNI = document.getElementById('errorDNI');
const errorFOL= document.getElementById('errorFOL');

errorpassword.style.visibility = "hidden";
errorpassword2.style.visibility = "hidden";
errorDNI.style.visibility = "hidden";
errorFOL.style.visibility = "hidden";

const campos = {
	password: false,
	password2: false,
	DNI: false
}
//Escribimos los pattern
let passwordv = /^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$€¿?¡*#&]|[^ ]){8,45}$/;
let DNIv = /^\d{8}[a-zA-Z]$/;
//validamos los campos
function validarpassword(){
	if (passwordv.test(password.value)) {
		console.log("Es correcto");
		document.getElementById("password").className = "form-control is-valid";
		errorpassword.style.visibility = "hidden";
		campos['password'] = true;
	} else {
		console.log("Es incorrecto");
		document.getElementById("password").className = "form-control is-invalid";
		errorpassword.style.visibility = "visible";
		campos['password'] = false;
	}
}

function validarpassword2(){
	
	if(password.value !== password2.value){
		console.log("Es incorrecto");
		document.getElementById("password2").className = "form-control is-invalid";
		errorpassword2.style.visibility = "visible";
		campos['password2'] = false;
	} else {
		console.log("Es correcto");
		document.getElementById("password2").className = "form-control is-valid";
		errorpassword2.style.visibility = "hidden";
		campos['password2'] = true;
	}
}
//funcia para validar letra del DNI, pone la ultima letra en mayusculas, la selecciona 
//y comprueba que esxista en la variable letra
function validarDNI() {
  let numero;
  let letr;
  let letra;
  let dni = DNI.value;
  DNI.value = DNI.value.slice(0, 8) + DNI.value.charAt(8).toUpperCase();
  if(DNIv.test (dni) == true){
     numero = dni.substr(0,dni.length-1);
     letr = dni.substr(dni.length-1,1);
     numero = numero % 23;
     letra='TRWAGMYFPDXBNJZSQVHLCKET';
     letra=letra.substring(numero,numero+1);
    if (letra!=letr.toUpperCase()) {
       errorDNI.style.visibility = "visible";
	   document.getElementById("DNI").className = "form-control is-invalid";
       campos['DNI'] = false;
    }else{
     	errorDNI.style.visibility = "hidden";
		document.getElementById("DNI").className = "form-control is-valid";
     	campos['DNI'] = true;
    }
  }else{
     errorDNI.style.visibility = "visible";
	 document.getElementById("DNI").className = "form-control is-invalid";
     campos['DNI'] = false;
   }
}
//validamos que los campos sean true
function validarBoton() {
	let registro = document.registro;
	if (campos.password && campos.password2 && campos.DNI) {
		registro.submit();
	} else {
		errorFOL.style.visibility = "visible";
		return false;
	}
}
//Llamamos a todos los oyentes de eventos
password.addEventListener("keyup", validarpassword);
password2.addEventListener("keyup", validarpassword2);
DNI.addEventListener("keyup", validarDNI);

password.addEventListener("blur", validarpassword);
password2.addEventListener("blur", validarpassword2);
DNI.addEventListener("blur", validarDNI);