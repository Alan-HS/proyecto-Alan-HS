<?php

include("../models/db.php");
include("../models/opinion.php");//Es el nombre que va a llevar mi tabla de la base de datos

try{
    $connection = DBConnection::getConnection();

    var_dump($connection);
}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    
}

?>