<?php

include("../models/db.php");
include("../models/opinion.php");//Es el nombre que va a llevar mi tabla de la base de datos

try{
    $connection = DBConnection::getConnection();

    // var_dump($connection);
}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    // var_dump($_GET);
    if(array_key_exists("id",$_GET)){
        //Obtener un solo registro
        try{
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM opinions WHERE id = :id');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $opinion;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $opinion = new Opinion($row['id'],$row['text'],$row['active'],$row['name']);
    
            }
            // var_dump($tweets);
            echo json_encode($opinion->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM opinions WHERE active = 1');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->execute();
    
            $opinions = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $opinion = new Opinion($row['id'],$row['text'],$row['active'],$row['name']);
    
                $opinions[] = $opinion->getArray();//Push
            }
            // var_dump($tweets);
            echo json_encode($opinions);
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("text",$_POST)){//Si se envia por formulario
        //Utilizar el arreglo $_POST
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            session_start();
            $name = $_SESSION["username"];
            postOpinion($_POST["text"],$name,true);
        }
        else if($_POST["_method"] === "PUT"){
            putOpinion($_POST["id"],$_POST["text"],true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){//AGREGO ESTO Y LA FUNCION, SOLO POR FORMULARIO
            deleteOpinion($_POST["id"],true);
        }
    }
    // else{//Si se envia por ajax
    //     //Utilizar file_get_contents
        
    //     $data = json_decode(file_get_contents('php://input'));
    //     if($data->_method === "POST"){
    //         postProduct($data->titulo,$data->feature1,$data->feature2,$data->feature3,$data->price,$data->image,$data->href,false);
    //     }
    //     else if($data->_method === "PUT"){
    //         // var_dump($data);
    //         putProduct($data->id,$data->titulo,$data->feature1,$data->feature2,$data->feature3,$data->price,$data->image,$data->href,false);
    //     }
    // }
    // var_dump($_POST);
    // var_dump($data);
    exit();


}
// var_dump($_SERVER);

function postOpinion($text,$name,$redirect){
    global $connection;

    // $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);

    try{
        $query = $connection->prepare('INSERT INTO opinions VALUES(NULL, :text, 1, :name)');//Se le cambia el nombre a cds, photocards, etc dependiendo
        $query->bindParam(':text', $text, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            redirectError("404: Error en la inserción");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/index.php');//Aqui se le cambia la ruta a la página de productos actual
            }
            else{
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function putOpinion($id,$text,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE opinions SET text = :text WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':text', $text, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            redirectError("404: Error en la actualización");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/index.php');
            }
            else{
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function deleteOpinion($id,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE opinions SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0){
            redirectError("404: Error en la eliminación");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/index.php');
            }
            else{
                echo "Registro eliminado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }
}

function redirectError($error){

    $url = "Location: http://localhost/Proyecto/views/error.php?error=" . $error;
    
    header($url);
            
}

?>