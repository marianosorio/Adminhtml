 
//Enlazar páginas
function getLogin() {
    window.location.href = "Login.html";
}

function getPrincipal() {
  var usuario = document.getElementById("usuario").value;
  var contrasena = document.getElementById("contrasena").value;

  if (usuario.trim() === "" || contrasena.trim() === "") {
      alert("Por favor, complete todos los campos.");
      return false;
  }

  window.location.href = "principal.html";
}

function getPrincipal1() {
  window.location.href = "principal.html";
}

document.getElementById("formulario").addEventListener("submit", function(event) {
  event.preventDefault();
  getPrincipal(); 
});
  function getInfodemandado() {
    window.location.href = "Infodemandado.html";
  }
 
  function getInfodemandante() {
    window.location.href = "Infodemandante.html";
  }

  function getInfopolicia() {
    window.location.href = "Infopolicia.html";
  }

  function getInfotestigo() {
    window.location.href = "Infotestigo.html";
  }

  $(document).ready(function() {
    $('#delitos').select2();
    $('#delitos').on('change', function() {
        var seleccionadas = $(this).val();
        $('#seleccionadas').text('Delitos seleccionados: ' + seleccionadas.join(', '));
    });
});

function mostrarSeleccion() {
  var select = document.getElementById("opciones");
  var selectedOptions = [];
  for (var i = 0; i < select.options.length; i++) {
      if (select.options[i].selected) {
          selectedOptions.push(select.options[i].value);
      }
  }
  document.getElementById("resultado").innerHTML = "Opciones seleccionadas: " + selectedOptions.join(", ");
}

function buscar() {
  
  var query = document.getElementById("search").value;

  
  var resultados = document.querySelectorAll(".item"); 
  var resultadosEncontrados = [];

  resultados.forEach(function(item) {
      if (item.textContent.toLowerCase().includes(query.toLowerCase())) {
          resultadosEncontrados.push(item.textContent);
      }
  });


  mostrarResultados(resultadosEncontrados);
}

function mostrarResultados(resultados) {
  var resultadosHTML = "<ul>";

  resultados.forEach(function(resultado) {
      resultadosHTML += "<li>" + resultado + "</li>";
  });

  resultadosHTML += "</ul>";

  document.getElementById("resultados").innerHTML = resultadosHTML;
}
