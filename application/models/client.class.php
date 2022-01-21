<?php

class Client extends Model {
    
    protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }

    public function getQuoteRequests($limit = 5){
        $cWhere = " ORDER BY id DESC LIMIT 0, " . $limit;
        return $this->query("SELECT * FROM ".$this->_table." ".$cWhere );
    }
    
 
}