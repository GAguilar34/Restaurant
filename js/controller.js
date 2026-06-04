//Abrir Formularios
const boton = document.getElementById("Registro-InicioSesion");

if (boton) {
    boton.addEventListener("click", function () {
        window.location.href = "Login/login.html";
    });
}

function agregarUsuario(event) {
    event.preventDefault();
    var formularioAgregar = document.getElementById('formularioRegistro');
    var respuesta = document.getElementById('message');
    //Validar Fetch a PHP
    var datos = new FormData(formularioAgregar);
    fetch('http://localhost/Proyectos Personales/Restaurante/agregar.php', {
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if (data == "Correcto") {
                respuesta.innerHTML = '<div>¡Datos Insertados con exito!</div>';
                document.getElementById('formularioRegistro').reset();
                setTimeout(function () { respuesta.innerHTML = ''; }, 4000);
            }
            else {
                respuesta.innerHTML = '<div>¡Ocurrio un error verifica tu informacion!</div>';
                setTimeout(function () { respuesta.innerHTML = ''; }, 4000);
            }
        });
}

function autenticarUsuario(event) {
    event.preventDefault();
    var formularioAutenticar = document.getElementById('formularioIniciodesesion');
    var respuesta = document.getElementById('message');
    //Validar Fetch a PHP
    var datos = new FormData(formularioAutenticar);
    fetch('http://localhost/Proyectos Personales/Restaurante/autenticar.php', {
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if (data == "Correcto") {
                respuesta.innerHTML = '<div>¡Usuario Aceptado con Exito!</div>';
                document.getElementById('formularioLogin').reset();
                setTimeout(function () { respuesta.innerHTML = ''; }, 4000);
            }
            else if (data == "Error1") {
                respuesta.innerHTML = '<div>¡Ocurrio un error verifica tu informacion!</div>';
                setTimeout(function () { respuesta.innerHTML = ''; }, 4000);
            }
            else {
                setTimeout(function () { respuesta.innerHTML = ''; }, 4000);
            }
        });
}
