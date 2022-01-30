<?php

class Message extends Model {
    
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
        $strQuery = "SELECT COUNT(id) AS total FROM message WHERE message_read = 0";
        return $this->query($strQuery)["total"];
    }

    public function getMessages($limit = 5){
        $cWhere = " ORDER BY message.id DESC LIMIT 0, " . $limit;
        return $this->query("SELECT message.id AS message_id, CONCAT(client.name, ' ', client.lastname) AS sender, message, state, DATE_FORMAT(message.created_on,'%m/%d/%Y') AS message_date, message_read 
                             FROM ".$this->_table." 
                             INNER JOIN client ON ".$this->_table.".client_id = client.id ".
                             $cWhere );
    }

    public function getMessageDetails($id){
        $cWhere = " WHERE ".$this->_table.".id = ".$id;
        
        return $this->query("SELECT * 
                             FROM ".$this->_table." 
                             INNER JOIN client ON ".$this->_table.".client_id = client.id ".
                             $cWhere );
    }
 
}