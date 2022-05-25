<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Opinion {
        //Columna de la tabla
        private $_id;
        private $_text;
        private $_active;
        private $_name;

        //Constructor de php
        public function __construct($id, $text, $active,$name){
            $this->setId($id);
            $this->setText($text);
            $this->setActive($active);
            $this->setName($name);
        }


        public function getId(){
            return $this->_id;//Como es variable normal es this->
        }

        public function setId($id){
            $this->_id = $id;
        }

        public function getText(){
            return $this->_text;//Como es variable normal es this->
        }

        public function setText($text){
            $this->_text = $text;
        }

        public function getActive(){
            return $this->_active;//Como es variable normal es this->
        }

        public function setActive($active){
            $this->_active = $active;
        }

        public function getName(){
            return $this->_name;//Como es variable normal es this->
        }

        public function setName($name){
            $this->_name = $name;
        }

        public function getArray(){
            $array = array();
    
            $array["id"] = $this->getId();
            $array["text"] = $this->getText();           
            $array["active"] = $this->getActive();
            $array["name"] = $this->getName();
    
            return $array;
        }
    }

?>