<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Opinion {
        //Columna de la tabla
        private $_id;
        private $_text;
        private $_active;

        //Constructor de php
        public function __construct($id, $text, $active){
            $this->setId($id);
            $this->setText($text);
            $this->setActive($active);
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

        public function getArray(){
            $array = array();
    
            $array["id"] = $this->getId();
            $array["text"] = $this->getText();           
            $array["active"] = $this->getActive();
    
            return $array;
        }
    }

?>