<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Detalle {
        //Columna de la tabla
        private $_id;
        private $_name_product;
        private $_total;
        private $_buy_id;

        //Constructor de php
        public function __construct($id, $name_product, $total,$buy_id){
            $this->setId($id);
            $this->setNameproduct($name_product);
            $this->setTotal($total);
            $this->setBuyid($buy_id);
            
        }


        public function getId(){
            return $this->_id;//Como es variable normal es this->
        }

        public function setId($id){
            $this->_id = $id;
        }
        public function getNameproduct(){
            return $this->_name_product;//Como es variable normal es this->
        }

        public function setNameproduct($name_product){
            $this->_name_product = $name_product;
        }
        public function getTotal(){
            return $this->_total;//Como es variable normal es this->
        }

        public function setTotal($total){
            $this->_total = $total;
        }
        public function getBuyid(){
            return $this->_buy_id;//Como es variable normal es this->
        }

        public function setBuyid($buy_id){
            $this->_buy_id = $buy_id;
        }

        

        public function getArray(){
            $array = array();
    
            $array["id"] = $this->getId();
            $array["name_product"] = $this->getNameproduct();
            $array["total"] = $this->getTotal();
            $array["buy_id"] = $this->getBuyid();
    
            return $array;
        }
    }

?>