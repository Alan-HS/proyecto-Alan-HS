<?php

include("../models/db.php");
include("../models/product.php");//Es el nombre que va a llevar mi tabla de la base de datos

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

            $query = $connection->prepare('SELECT * FROM microfonos WHERE id = :id');//Se le cambia el nombre ya sea photocard, cds, etc
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
            $query = $connection->prepare('SELECT * FROM microfonos WHERE active = 1');//Se le cambia el nombre ya sea photocard, cds, etc
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
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("titulo",$_POST)){//Si se envia por formulario
        //Utilizar el arreglo $_POST
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            postProduct($_POST["titulo"],$_POST["feature1"],$_POST["feature2"],$_POST["feature3"],$_POST["price"],$_POST["image"],$_POST["href"],true);
        }
        else if($_POST["_method"] === "PUT"){
            putProduct($_POST["id"],$_POST["titulo"],$_POST["feature1"],$_POST["feature2"],$_POST["feature3"],$_POST["price"],$_POST["image"],$_POST["href"],true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){//AGREGO ESTO Y LA FUNCION, SOLO POR FORMULARIO
            deleteProduct($_POST["id"],true);
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

function postProduct($titulo,$feature1,$feature2,$feature3,$price,$image,$href,$redirect){
    global $connection;

    // $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);


    try{
        $query = $connection->prepare('INSERT INTO microfonos VALUES(NULL, :titulo, :feature1, :feature2, :feature3, :price, :image, :href, 1)');//Se le cambia el nombre a cds, photocards, etc dependiendo
        $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $query->bindParam(':feature1', $feature1, PDO::PARAM_STR);
        $query->bindParam(':feature2', $feature2, PDO::PARAM_STR);
        $query->bindParam(':feature3', $feature3, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->bindParam(':href', $href, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo "Error en la inserción";
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/views/microfonos.php');//Aqui se le cambia la ruta a la página de productos actual
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

function putProduct($id,$titulo,$feature1,$feature2,$feature3,$price,$image,$href,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE microfonos SET titulo = :titulo, feature1 = :feature1, feature2 = :feature2, feature3 = :feature3, price = :price, image = :image, href = :href WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $query->bindParam(':feature1', $feature1, PDO::PARAM_STR);
        $query->bindParam(':feature2', $feature2, PDO::PARAM_STR);
        $query->bindParam(':feature3', $feature3, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->bindParam(':href', $href, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo "Error en la actualización";
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/views/microfonos.php');
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

function deleteProduct($id,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE microfonos SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0){
            echo "Error en la eliminación";
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/Proyecto/views/microfonos.php');
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
?>