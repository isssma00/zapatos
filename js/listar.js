//Funcion para mostrar la diferentes listas en el panel de administración
function abrirTabla(evento, abrirTabla) {
  var i, tabcontent, enlace;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  enlace = document.getElementsByClassName("enlace");
  for (i = 0; i < enlace.length; i++) {
    enlace[i].className = enlace[i].className.replace(" active", "");
  }
  document.getElementById(abrirTabla).style.display = "block";
  evento.currentTarget.className += " active";
}

function alerta(){
      let respuesta = confirm("¿Estas seguro?");
      if(respuesta == true)
      {
          return true;
      }
      else{
          return false;
      }
      }