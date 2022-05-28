<?php

include("../models/db.php");
include("../models/compra.php");//Es el nombre que va a llevar mi tabla de la base de datos

try{
    $connection = DBConnection::getConnection();

    // var_dump($connection);
}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

/*if($_SERVER["REQUEST_METHOD"] === "GET"){
    // var_dump($_GET);
    if(array_key_exists("id",$_GET)){
        //Obtener un solo registro
        try{
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM discos WHERE id = :id');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $product;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new Product($row['id'],$row['titulo'],$row['feature1'],$row['feature2'],$row['feature3'],$row['price'],$row['image'],$row['href'],$row['active']);
    
            }
            // var_dump($tweets);
            echo json_encode($product->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM discos WHERE active = 1');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->execute();
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new Product($row['id'],$row['titulo'],$row['feature1'],$row['feature2'],$row['feature3'],$row['price'],$row['image'],$row['href'],$row['active']);
    
                $products[] = $product->getArray();//Push
            }
            // var_dump($tweets);
            echo json_encode($products);
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    
}*/
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("price",$_POST)){//Si se envia por formulario
        //Utilizar el arreglo $_POST
        
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            postCompra($_POST["price"],true);
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

function postCompra($price,$redirect){
    global $connection;

    $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);

    session_start();

    $user_id = $_SESSION["id"];
    try{
        $query = $connection->prepare('INSERT INTO compras VALUES(NULL, :timestamp, :price, :user_id)');//Se le cambia el nombre a cds, photocards, etc dependiendo
        $query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();
        if($query->rowCount() === 0){
            redirectError("404: Error en la inserción");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/views/successful_order.php');//Aqui se le cambia la ruta a la página de productos actual
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

function redirectError($error){

    $url = "Location: http://localhost/Proyecto/views/error.php?error=" . $error;
    
    header($url);
            
}
?>