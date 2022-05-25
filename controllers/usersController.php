<?php 

include("../models/db.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Obtener información del POST
    $username = trim($_POST["nombre_usuario"]);
    $password = trim($_POST["password_usuario"]);
    $password = password_hash($password,PASSWORD_DEFAULT);//Encriptar contraseña
    // $photo = $_POST["photo"];
    // $type = $_POST["type"];
    $type = "normal";


    try {
        $query = $connection->prepare('INSERT INTO users VALUES(NULL, :username, :password, :type)');
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            redirectError("404: Error en la inserción");
        }
        else {
                header('Location: http://localhost/Proyecto/views/login.php');
        }
    }
    catch(PDOException $e) {
        echo $e;
    }

}

function redirectError($error){

    $url = "Location: http://localhost/Proyecto/views/error.php?error=" . $error;
    
    header($url);
            
}

?>