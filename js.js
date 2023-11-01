document.addEventListener("DOMContentLoaded", function() {
  var contacto = document.getElementById('contacto');

  contacto.addEventListener('submit', (event) => {
    event.preventDefault();

    var campo1 = document.getElementById("campo1").value;
    var campo2 = document.getElementById("campo2").value;
    var campo3 = document.getElementById("campo3").value;

    var datosEnviar = {
      campo1: campo1,
      campo2: campo2,
      campo3: campo3
    };

    fetch('../../conexionbasededatos/cargar.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(datosEnviar)
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      contacto.reset(); 
    })
    .catch(error => {
      console.error(error);
    });
  });
});
