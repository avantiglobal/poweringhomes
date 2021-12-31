<?php

class Page extends Model {
    
    protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }
 
}