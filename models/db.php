<?php

class DBConnection{
    private static $connection;
    //Como es variable estatica se usa self::
    public static function getConnection(){
        if(self::$connection == null){//Si la conexion es nula, se crea
            //Crear objeto conexion
            self::$connection = new PDO('mysql:host=localhost;dbname=daebakgaming;charset=utf8', 'root', '');
            //Para añadir atrubutos
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$connection;
    }
}

?>
