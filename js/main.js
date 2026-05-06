//Abrir Formularios
const boton = document.getElementById("Registro-InicioSesion");

if (boton) {
    boton.addEventListener("click", function () {
        window.location.href = "Login/login.html";
    });
}

//Registro de Usuario
const inputs = document.querySelectorAll("#formularioRegistro input");
const botonRegistro = document.getElementById("Registro");

if (botonRegistro) {
    botonRegistro.addEventListener("click", function (e) {
        let campoVacio = false;
        inputs.forEach(input => {
            if (input.value.trim() === "") {
                input.classList.add("error");
                campoVacio = true;
                e.preventDefault();
            }
            else {
                input.classList.remove("error");    
            }
        });

        if(campoVacio){
            e.preventDefault();
            alert("Por favor llene todos los campos")
        }
        else{
            alert("Registro Exitoso.")
        }
    });
}
//Inicio de Sesion
const inputsLogin = document.querySelectorAll("#formularioIniciodesesion input");
const botonLogin = document.getElementById("InicioSesion");

if (botonLogin) {
    botonLogin.addEventListener("click", function (e) {
        let campVacio = false;
        inputsLogin.forEach(input => {
            if (input.value.trim() === "") {
                input.classList.add("error");
                e.preventDefault();
                campVacio = true; 
            }
            else {
                input.classList.remove("error"); 
            }
        });
        if(campVacio){
            e.preventDefault();
            alert("Por favor llene todos los campos")
        }
        else{
            alert("Iniciando Sesion.")
        }
    });
}