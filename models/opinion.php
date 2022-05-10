<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Tweet {
        //Columna de la tabla
        private $_id;
        private $_name;
        private $_text;
        private $_timestamp;
        private $_active;

        //Constructor de php
        public function __construct($id, $name, $text, $timestamp, $active){
            $this->setId($id);
            $this->setName($name);
            $this->setText($text);
            $this->setTimestamp($timestamp);
            $this->setActive($active);
        }


        public function getId(){
            return $this->_id;//Como es variable normal es this->
        }

        public function setId($id){
            $this->_id = $id;
        }

        public function getName(){
            return $this->_name;//Como es variable normal es this->
        }

        public function setName($name){
            $this->_name = $name;
        }

        public function getText(){
            return $this->_text;//Como es variable normal es this->
        }

        public function setText($text){
            $this->_text = $text;
        }

        public function getTimestamp(){
            return $this->_timestamp;//Como es variable normal es this->
        }

        public function setTimestamp($timestamp){
            $this->_timestamp = $timestamp;
        }

        public function getActive(){
            return $this->_id;//Como es variable normal es this->
        }

        public function setActive($active){
            $this->_active = $active;
        }

    }

?>