<?php

class Client extends Model {
    
    protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }
 
}