<?php

include("../models/db.php");
include("../models/payment.php");//Es el nombre que va a llevar mi tabla de la base de datos

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
    // if(array_key_exists("id",$_GET)){
    //     //Obtener un solo registro
    //     try{
    //         $id = $_GET["id"];

    //         $query = $connection->prepare('SELECT * FROM opinions WHERE id = :id');//Se le cambia el nombre ya sea photocard, cds, etc
    //         $query->bindParam(':id',$id,PDO::PARAM_INT);
    //         $query->execute();
    
    //         $opinion;
    
    
    //         while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    //             $opinion = new Opinion($row['id'],$row['text'],$row['active'],$row['name']);
    
    //         }
    //         // var_dump($tweets);
    //         echo json_encode($opinion->getArray());
    //     }
    //     catch(PDOException $e){
    //         echo $e;
    //     }
    // }
        //Obtener todos los registros
        try{
            session_start();
            $user_id = $_SESSION["id"];
            $query = $connection->prepare('SELECT * FROM payments WHERE user_id = :id');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->bindParam(':id',$user_id,PDO::PARAM_INT);
            $query->execute();
    
            $payments = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $payment = new Payment($row['id'],$row['name'],$row['lastname'],$row['address'],$row['state'],$row['city'],$row['zipcode'],$row['cardnumber'],$row['cardname'],$row['expire'],$row['cvv'],$row['user_id']);
    
                $payments[] = $payment->getArray();//Push
            }
            // var_dump($tweets);
            echo json_encode($payments);
        }
        catch(PDOException $e){
            echo $e;
        }
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){//Llevaba else
    if(array_key_exists("nombre_cliente",$_POST)){//Si se envia por formulario
        //Utilizar el arreglo $_POST
        session_start();
        $exists;
        $verify = $_SESSION["id"];
        $query = $connection->prepare('SELECT * FROM payments WHERE user_id = :id');//Se le cambia el nombre ya sea photocard, cds, etc
        $query->bindParam(':id',$verify,PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        // var_dump($query->columnCount());
        // var_dump(5);
        // var_dump("Hola");
        // exit();

        if($row['name']!== NULL){
            $_POST["_method"] = "PUT";
        }
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            // session_start();
            $name = $_SESSION["id"];
            postPayment($_POST["nombre_cliente"],$_POST["apellidos_cliente"],$_POST["direccion_cliente"],$_POST["estado_usuario"],$_POST["ciudad_usuario"],$_POST["codigo_postal_usuario"],$_POST["numero_tarjeta"],$_POST["nombre_tarjeta"],$_POST["fecha_expiracion"],$_POST["cvv_tarjeta"],$name,true);
        }
        else if($_POST["_method"] === "PUT"){
            $name = $_SESSION["id"];
            putPayment($_POST["nombre_cliente"],$_POST["apellidos_cliente"],$_POST["direccion_cliente"],$_POST["estado_usuario"],$_POST["ciudad_usuario"],$_POST["codigo_postal_usuario"],$_POST["numero_tarjeta"],$_POST["nombre_tarjeta"],$_POST["fecha_expiracion"],$_POST["cvv_tarjeta"],$name,true);
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

function postPayment($client_name,$last_name,$address,$state,$city,$zipcode,$cardnumber,$cardname,$expire,$cvv,$name,$redirect){
    global $connection;

    // $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);

    try{
        $query = $connection->prepare('INSERT INTO payments VALUES(NULL, :client_name,:last_name,:address,:state,:city,:zipcode,:cardnumber,:cardname,:expire,:cvv,:name)');//Se le cambia el nombre a cds, photocards, etc dependiendo
        $query->bindParam(':client_name', $client_name, PDO::PARAM_STR);
        $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
        $query->bindParam(':cardnumber', $cardnumber, PDO::PARAM_INT);
        $query->bindParam(':cardname', $cardname, PDO::PARAM_STR);
        $query->bindParam(':expire', $expire, PDO::PARAM_STR);
        $query->bindParam(':cvv', $cvv, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0){
            redirectError("404: Error en la inserción");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: ' . $_SERVER['HTTP_REFERER']);//Aqui se le cambia la ruta a la página de productos actual
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

function putPayment($client_name,$last_name,$address,$state,$city,$zipcode,$cardnumber,$cardname,$expire,$cvv,$name,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE payments SET name = :client_name, lastname = :last_name, address = :address, state = :state, city = :city, zipcode = :zipcode, cardnumber = :cardnumber, cardname = :cardname, expire = :expire, cvv = :cvv WHERE user_id = :name');//Para actualizar es con una coma
        $query->bindParam(':client_name', $client_name, PDO::PARAM_STR);
        $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
        $query->bindParam(':cardnumber', $cardnumber, PDO::PARAM_INT);
        $query->bindParam(':cardname', $cardname, PDO::PARAM_STR);
        $query->bindParam(':expire', $expire, PDO::PARAM_STR);
        $query->bindParam(':cvv', $cvv, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0){
            redirectError("404: Error en la actualización");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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