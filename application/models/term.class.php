<?php

class Term extends Model {
    
    protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }
 
}