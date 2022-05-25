<?php 

// var_dump($_POST);

include("../models/db.php");
include("../models/user.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["_method"] === "POST") {
        $username = trim($_POST["nombre_usuario"]);
        $password = trim($_POST["password_usuario"]);

        try {
            $query = $connection->prepare('SELECT * FROM users WHERE username = :username');
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() === 0) {
                redirectError("404: Usuario no encontrado");
                // header('Location: http://localhost/twitter/');
                exit();
            }

            $user;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $user = new user($row["id"], $row["username"], $row["password"], $row["type"]);
            }

            if (!password_verify($password, $user->getPassword())) {
                redirectError("404: Contraseña inválida");
                exit();
            }

            session_start();

            $_SESSION["id"] = $user->getId();
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["type"] = $user->getType();

            header('Location: http://localhost/Proyecto/index.php');
            exit();
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
    else if($_POST["_method"] === "DELETE") {
        session_start();

        session_destroy();

        header('Location: http://localhost/Proyecto/index.php');

        exit();
    }
}

function redirectError($error){

    $url = "Location: http://localhost/Proyecto/views/error.php?error=" . $error;
    
    header($url);
            
}

?>