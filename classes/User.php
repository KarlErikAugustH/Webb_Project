<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Representerar ett User objekt
-->


<?php

class User{
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }   
}


?>