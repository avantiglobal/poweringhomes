<?php

class Client extends Model {
    
    //protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }

    public function getQuoteRequests($limit = 5){
        $cWhere = " ORDER BY id DESC LIMIT 0, " . $limit;
        return $this->query("SELECT * FROM ".$this->_table." ".$cWhere );
    }

    public function clientExists($email, $phone){
        //error_log("SELECT id FROM client WHERE email = '".$email."' AND phone = '".$phone."' ");
        return $this->query("SELECT id FROM client WHERE email = '".$email."' AND phone = '".$phone."' ");
    }

    public function saveContactInfo($name, $lastname, $email, $phone){
        $isClient = $this->query("SELECT id FROM " . $this->_table ." WHERE email = '" . $email . "' AND phone = '".$phone."'", 1);
        return $isClient;
    }
    
 
}