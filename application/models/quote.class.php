<?php

class Quote extends Model {
    
    protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }

    public function add($arrKeys){
        // Must name the inputs in the contact form like the field names in the table
        $arrValues = array();
        foreach ($arrKeys as $key => $value) {
            array_push($arrValues, $_REQUEST[$value]);
        }
        
        $strQuery = "INSERT INTO ".$this->_table." (".implode(',', $arrKeys).") VALUES (\"".implode("\",\"", $arrValues)."\")";
        return $this->query($strQuery, true);
    }

    public function countUnreadMessages(){
        $strQuery = "SELECT COUNT(id) AS total FROM ".$this->_table." WHERE message_read = 0";
        return $this->query($strQuery)["total"];
    }
 
}