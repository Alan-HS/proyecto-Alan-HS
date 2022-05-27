<?php
    //El nombre del archivo es el singular del nombre de la tabla de la base de datos
    class Payment {
        //Columna de la tabla
        private $_id;
        private $_name;
        private $_lastname;
        private $_address;
        private $_state;
        private $_city;
        private $_zipcode;
        private $_cardnumber;
        private $_cardname;
        private $_expire;
        private $_cvv;
        private $_user_id;

        //Constructor de php
        public function __construct($id, $name, $lastname, $address, $state, $city, $zipcode, $cardnumber, $cardname, $expire, $cvv, $user_id){
            $this->setId($id);
            $this->setName($name);
            $this->setLastname($lastname);
            $this->setAddress($address);
            $this->setState($state);
            $this->setCity($city);
            $this->setZipcode($zipcode);
            $this->setCardnumber($cardnumber);
            $this->setCardname($cardname);
            $this->setExpire($expire);
            $this->setCvv($cvv);
            $this->setUser_id($user_id);
            
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
        public function getLastname(){
            return $this->_lastname;//Como es variable normal es this->
        }

        public function setLastname($lastname){
            $this->_lastname = $lastname;
        }
        public function getAddress(){
            return $this->_address;//Como es variable normal es this->
        }

        public function setAddress($address){
            $this->_address = $address;
        }
        public function getState(){
            return $this->_state;//Como es variable normal es this->
        }

        public function setState($state){
            $this->_state = $state;
        }
        public function getCity(){
            return $this->_city;//Como es variable normal es this->
        }

        public function setCity($city){
            $this->_city = $city;
        }
        public function getZipcode(){
            return $this->_zipcode;//Como es variable normal es this->
        }

        public function setZipcode($zipcode){
            $this->_zipcode = $zipcode;
        }
        public function getCardnumber(){
            return $this->_cardnumber;//Como es variable normal es this->
        }

        public function setCardnumber($cardnumber){
            $this->_cardnumber = $cardnumber;
        }
        public function getCardname(){
            return $this->_cardname;//Como es variable normal es this->
        }

        public function setCardname($cardname){
            $this->_cardname = $cardname;
        }
        public function getExpire(){
            return $this->_expire;//Como es variable normal es this->
        }

        public function setExpire($expire){
            $this->_expire = $expire;
        }
        public function getCvv(){
            return $this->_cvv;//Como es variable normal es this->
        }

        public function setCvv($cvv){
            $this->_cvv = $cvv;
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
            $array["name"] = $this->getName();
            $array["lastname"] = $this->getLastname();
            $array["address"] = $this->getAddress();
            $array["state"] = $this->getState();
            $array["city"] = $this->getCity();
            $array["zipcode"] = $this->getZipcode();
            $array["cardnumber"] = $this->getCardnumber();
            $array["cardname"] = $this->getCardname();
            $array["expire"] = $this->getExpire();
            $array["cvv"] = $this->getCvv();
            $array["user_id"] = $this->getUser_id();
            
    
            return $array;
        }
    }

?>