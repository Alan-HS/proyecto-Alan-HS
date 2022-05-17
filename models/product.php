<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Product {
        //Columna de la tabla
        private $_id;
        private $_titulo;
        private $_feature1;
        private $_feature2;
        private $_feature3;
        private $_price;
        private $_image;
        private $_href;
        private $_active;

        //Constructor de php
        public function __construct($id, $titulo, $feature1, $feature2, $feature3, $price, $image, $href, $active){
            $this->setId($id);
            $this->setTitulo($titulo);
            $this->setFeature1($feature1);
            $this->setFeature2($feature2);
            $this->setFeature3($feature3);
            $this->setPrice($price);
            $this->setImage($image);
            $this->setHref($href);
            $this->setActive($active);
        }


        public function getId(){
            return $this->_id;//Como es variable normal es this->
        }

        public function setId($id){
            $this->_id = $id;
        }

        public function getTitulo(){
            return $this->_titulo;//Como es variable normal es this->
        }

        public function setTitulo($titulo){
            $this->_titulo = $titulo;
        }

        public function getFeature1(){
            return $this->_feature1;//Como es variable normal es this->
        }

        public function setFeature1($feature1){
            $this->_feature1 = $feature1;
        }

        public function getFeature2(){
            return $this->_feature2;//Como es variable normal es this->
        }

        public function setFeature2($feature2){
            $this->_feature2 = $feature2;
        }

        public function getFeature3(){
            return $this->_feature3;//Como es variable normal es this->
        }

        public function setFeature3($feature3){
            $this->_feature3 = $feature3;
        }

        public function getPrice(){
            return $this->_price;//Como es variable normal es this->
        }

        public function setPrice($price){
            $this->_price = $price;
        }

        public function getImage(){
            return $this->_image;//Como es variable normal es this->
        }

        public function setImage($image){
            $this->_image = $image;
        }

        public function getHref(){
            return $this->_href;//Como es variable normal es this->
        }

        public function setHref($href){
            $this->_href = $href;
        }

        public function getActive(){
            return $this->_active;//Como es variable normal es this->
        }

        public function setActive($active){
            $this->_active = $active;
        }

        public function getArray(){
            $array = array();
    
            $array["id"] = $this->getId();
            $array["titulo"] = $this->getTitulo();
            $array["feature1"] = $this->getFeature1();
            $array["feature2"] = $this->getFeature2();
            $array["feature3"] = $this->getFeature3();
            $array["price"] = $this->getPrice();
            $array["image"] = $this->getImage();
            $array["href"] = $this->getHref();            
            $array["active"] = $this->getActive();
    
            return $array;
        }
    }

?>