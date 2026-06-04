<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json; charset=UTF-8");

    //Traemos nuestras herramientas
    require_once 'dataBase.php';
    require_once 'classUser.php';
    require_once 'UserDAO.php';

    //iniciamos la conexion a la base de datos
   $database = new DataBase();
   $db = $database->getConnection();
   $userDAO = new UserDAO($db);

   //Buscamos al usuario en la base de datos
   if(isset($_POST['Login-NombreDeUsuario']) && isset($_POST['Login-password'])) {
    //buscamos al usuario en la base de datos
    $loggedUser = $userDAO->validateUser($_POST['Login-NombreDeUsuario'],$_POST['Login-password']);

    if($loggedUser !=null) {
        //si las credenciales coinciden, devolvemos exito
        echo json_encode("Correcto");
    }else{
        //si el usuario no existe o la clave es incorrecta, disparamos el else del JS
        echo json_encode("Usuario no reconocido");

    }
   }else{
    //si dejaron campos vacios, podemos mandar el correo al Error1 de tu validacion 
    echo json_encode("Error1");
    
   }
?>