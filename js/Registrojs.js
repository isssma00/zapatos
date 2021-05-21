//Declaramos las constantes
const usuario = document.getElementById('usuario');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const nombre = document.getElementById('nombre');
const apellido1 = document.getElementById('apellido1');
const apellido2 = document.getElementById('apellido2');
const telefono = document.getElementById('telefono');
const correo = document.getElementById('correo');
const direccion = document.getElementById('direccion');
const CP = document.getElementById('CP');
const provincia = document.getElementById('provincia');
const comunidad = document.getElementById('comunidad');
const DNI = document.getElementById('DNI');
//errores
const errorusuario = document.getElementById('errorusuario');
const errorpassword = document.getElementById('errorpassword');
const errorpassword2 = document.getElementById('errorpassword2');
const errortelefono = document.getElementById('errortelefono');
const errorcorreo = document.getElementById('errorcorreo');
const errordireccion = document.getElementById('errordireccion');
const errorCP = document.getElementById('errorCP');
const errorDNI = document.getElementById('errorDNI');
const errorFOL= document.getElementById('errorFOL');
//ocultamos los errores
errorusuario.style.visibility = "hidden";
errorpassword.style.visibility = "hidden";
errorpassword2.style.visibility = "hidden";
errortelefono.style.visibility = "hidden";
errorcorreo.style.visibility = "hidden";
errordireccion.style.visibility = "hidden";
errorCP.style.visibility = "hidden";
errorDNI.style.visibility = "hidden";
errorFOL.style.visibility = "hidden";
//declaramos un array campos para validar que todos los campos sean correctos
const campos = {
	usuario: false,
	password: false,
	password2: false,
	telefono: false,
	correo: false,
	CP: false,
	DNI: false,
	direccion: false,
}
//Escribimos los pattern
let usuariov = /^([a-z]+[0-9]{0,2}){5,12}$/;
let passwordv = /^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$€¿?¡*#&]|[^ ]){8,45}$/;
let DNIv = /^\d{8}[a-zA-Z]$/;
let correov = /[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}/;
let telefonov = /^(\+34|0034|34)?[6789]\d{8}$/;
let direccionv = /^[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*/;
let cpv = /^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$/;
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

function validarTelefono(){
	if (telefonov.test(telefono.value)) {
		console.log("Es correcto");
		document.getElementById("telefono").className = "form-control is-valid";
		errortelefono.style.visibility = "hidden";
		campos['telefono'] = true;
	} else {
		errortelefono.style.visibility = "visible";
		document.getElementById("telefono").className = "form-control is-invalid";
		console.log("Es incorrecto");
		campos['telefono'] = false;
	}
}

function validarCorreo(){
	if (correov.test(correo.value)) {
		console.log("Es correcto");
		document.getElementById("correo").className = "form-control is-valid";
		errorcorreo.style.visibility = "hidden";
		campos['correo'] = true;
	} else {
		errorcorreo.style.visibility = "visible";
		document.getElementById("correo").className = "form-control is-invalid";
		console.log("Es incorrecto");
		campos['correo'] = false;
	}
}

function validarDireccion(){
	if (direccionv.test(direccion.value)) {
		console.log("Es correcto");
		document.getElementById("direccion").className = "form-control is-valid";
		errordireccion.style.visibility = "hidden";
		campos['direccion'] = true;
	} else {
		errordireccion.style.visibility = "visible";
		document.getElementById("direccion").className = "form-control is-invalid";
		console.log("Es incorrecto");
		campos['direccion'] = false;
	}
}

function validarCP(){
	if (cpv.test(CP.value)) {
		console.log("Es correcto");
		document.getElementById("CP").className = "form-control is-valid";
		errorCP.style.visibility = "hidden";
		campos['CP'] = true;
	} else {
		errorCP.style.visibility = "visible";
		document.getElementById("CP").className = "form-control is-invalid";
		console.log("Es incorrecto");
		campos['CP'] = false;
	}
}
//funcion para rellenar provincio con un array que coge los 2 primeros valores 
//del codigo postal y los equivale con una provincia
function validarProvincia(cpostal){
    let cp_provincias = {
      1: "\u00C1lava", 2: "Albacete", 3: "Alicante", 4: "Almer\u00EDa", 5: "\u00C1vila",
      6: "Badajoz", 7: "Baleares", 08: "Barcelona", 09: "Burgos", 10: "C\u00E1ceres",
      11: "C\u00E1diz", 12: "Castell\u00F3n", 13: "Ciudad Real", 14: "C\u00F3rdoba", 15: "Coruña",
      16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guip\u00FAzcoa",
      21: "Huelva", 22: "Huesca", 23: "Ja\u00E9n", 24: "Le\u00F3n", 25: "L\u00E9rida",
      26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "M\u00E1laga", 30: "Murcia",
      31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas",
      36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
      41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
      46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
      51: "Ceuta", 52: "Melilla"
    };
    if(cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000)
      return cp_provincias[parseInt(cpostal.substring(0,2))];
    else
      return "----";
  }
//funcia para rellenar provincio con un array que coge los 2 primeros valores 
//del codigo postal y los equivale con una comunidad
  function validarComunidad(cpostal){
    let cp_comunidad = {
      1: "Pa\u00EDs Vasco", 2: "Castilla-La Mancha", 3: "Comunidad Valenciana", 4: "Andaluc\u00EDa", 5: "Castilla y Le\u00F3n",
      6: "Extremadura", 7: "Islas Baleares", 08: "Catalu\u00F1a", 09: "Castilla y Le\u00F3n", 10: "Extremadura",
      11: "Andaluc\u00EDa", 12: "Comunidad Valenciana", 13: "Castilla-La Mancha", 14: "Andaluc\u00EDa", 15: "Galicia",
      16: "Castilla-La Mancha", 17: "Catalu\u00F1a", 18: "Andaluc\u00EDa", 19: "Castilla-La Mancha", 20: "Pa\u00EDs Vasco",
      21: "Andaluc\u00EDa", 22: "Arag\u00F3n", 23: "Andaluc\u00EDa", 24: "Castilla y Le\u00F3n", 25: "Catalu\u00F1a",
      26: "La Rioja", 27: "Galicia", 28: "Comunidad de Madrid", 29: "Andaluc\u00EDa", 30: "Regi\u00F3n de Murcia",
      31: "Comunidad de Navarra", 32: "Galicia", 33: "Principado de Asturias", 34: "Castilla y Le\u00F3n", 35: "Islas Canarias",
      36: "Galicia", 37: "Castilla y Le\u00F3n", 38: "Islas Canarias", 39: "Cantabria", 40: "Castilla y Le\u00F3n",
      41: "Andaluc\u00EDa", 42: "Castilla y Le\u00F3n", 43: "Catalu\u00F1a", 44: "Arag\u00F3n", 45: "Castilla-La Mancha",
      46: "Comunidad Valenciana", 47: "Castilla y Le\u00F3n", 48: "Pa\u00EDs Vasco", 49: "Castilla y Le\u00F3n", 50: "Arag\u00F3n",
      51: "Ceuta", 52: "Melilla"
    };
    if(cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000)
      return cp_comunidad[parseInt(cpostal.substring(0,2))];
    else
      return "----";
  }
  //cada vez que se pulsa una tecla se ejecuta las funciones validarProvincia y validarComunidad
  //y las rellena automáticamente
  CP.onkeyup = function(){
    comunidad.value = validarComunidad(CP.value);
	provincia.value = validarProvincia(CP.value);
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
	if (campos.usuario && campos.password && campos.password2 && campos.telefono && campos.correo && campos.direccion && campos.CP  && campos.DNI) {
		registro.submit();
	} else {
		errorFOL.style.visibility = "visible";
		return false;
	}
}

//Llamamos a todos los oyentes de eventos
usuario.addEventListener("keyup", validarUsuario);
password.addEventListener("keyup", validarpassword);
password2.addEventListener("keyup", validarpassword2);
telefono.addEventListener("keyup", validarTelefono);
correo.addEventListener("keyup", validarCorreo);
direccion.addEventListener("keyup", validarDireccion);
CP.addEventListener("keyup", validarCP);
provincia.addEventListener("keyup", validarProvincia);
comunidad.addEventListener("keyup", validarComunidad);
DNI.addEventListener("keyup", validarDNI);

usuario.addEventListener("blur", validarUsuario);
password.addEventListener("blur", validarpassword);
password2.addEventListener("blur", validarpassword2);
telefono.addEventListener("blur", validarTelefono);
correo.addEventListener("blur", validarCorreo);
direccion.addEventListener("blur", validarDireccion);
CP.addEventListener("blur", validarCP);
provincia.addEventListener("blur", validarProvincia);
comunidad.addEventListener("blur", validarComunidad);
DNI.addEventListener("blur", validarDNI);