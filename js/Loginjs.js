//Declaramos las constantes
const usuario = document.getElementById('usuario');
const password = document.getElementById('password');
//errores
const errorusuario = document.getElementById("errorusuario");
const errorpassword = document.getElementById("errorpassword");
const errorFOL = document.getElementById('errorFOL');

//declaramos un array campos para validar que todos los campos sean correctos
const campos = {
	usuario: false,
	password: false
}
//ocultamos todos los errores iniciales
errorusuario.style.visibility = "hidden";
errorpassword.style.visibility = "hidden";
errorFOL.style.visibility = "hidden";

//Escribimos los pattern
let usuariov = /^([a-z]+[0-9]{0,2}){5,12}$/;
let passwordv = /^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$€¿?¡*#&]|[^ ]){8,15}$/;
//validamos los campos
function validarUsuario(){
	if (usuariov.test(usuario.value)) {
		console.log("Es correcto");
		document.getElementById("usuario").className = "form-control is-valid";
		errorusuario.style.visibility = "hidden";
		campos['usuario'] = true;
	} else {
		errorusuario.style.visibility = "visible";
		document.getElementById("usuario").className = "form-control is-invalid";
		console.log("Es incorrecto");
		campos['usuario'] = false;
	}
}

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
//validamos que los campos sean true
function validarBoton() {
	let registro = document.registro;
	if (campos.usuario && campos.password) {
		registro.submit();
	} else {
		errorFOL.style.visibility = "visible";
		return false;
	}
}

//Llamamos a todos los oyentes de eventos
usuario.addEventListener("keyup", validarUsuario);
password.addEventListener("keyup", validarpassword);

usuario.addEventListener("blur", validarUsuario);
password.addEventListener("blur", validarpassword);