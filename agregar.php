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

   //validamos que al menos el correo y el password vengan en el POST
   if (isset($_POST['correo'])&& isset($_POST['password'])) {
       //creamos el objeto User con los datos exactos que vienen en el formulario (FormData)
       $newUser = new User (
       null, 
       $_POST['nombre'] ??'',
       $_POST['nacimiento'] ??'',
       $_POST['telefono'] ??'',
       $_POST['Direccion'] ?? '',
       $_POST['NombreDeUsuario'] ??'',
       $_POST['password']
       );
    //intentamos isertarlo en la base de datos
   if($userDAO ->create($newUser)){
    //si tiene exito, devolvemos el texto que espera tu javascript
    echo json_encode('Correcto');
   }else{
    echo json_encode('Exit');
   }
   }
?>