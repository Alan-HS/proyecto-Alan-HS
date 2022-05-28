<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Compra {
        //Columna de la tabla
        private $_id;
        private $_timestamp;
        private $_total;
        private $_user_id;

        //Constructor de php
        public function __construct($id, $timestamp, $total,$user_id){
            $this->setId($id);
            $this->setTimestamp($timestamp);
            $this->setTotal($total);
            $this->setUser_id($user_id);
            
        }


        public function getId(){
            return $this->_id;//Como es variable normal es this->
        }

        public function setId($id){
            $this->_id = $id;
        }
        public function getTimestamp(){
            return $this->_timestamp;//Como es variable normal es this->
        }

        public function setTimestamp($timestamp){
            $this->_timestamp = $timestamp;
        }
        public function getTotal(){
            return $this->_total;//Como es variable normal es this->
        }

        public function setTotal($total){
            $this->_total = $total;
        }
        public function getUser_id(){
            return $this->_user_id;//Como es variable normal es this->
        }

        public function setUser_id($user_id){
            $this->_user_id = $user_id;
        }
        

        public function getArray(){
            $array = array();
    
            $array["id"] = $this->getId();
            $array["timestamp"] = $this->getTimestamp();
            $array["total"] = $this->getTotal();
            $array["user_id"] = $this->getUser_id();
            
    
            return $array;
        }
    }

?>