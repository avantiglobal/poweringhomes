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

    public function countNewQuotes(){
        $strQuery = "SELECT COUNT(id) AS total FROM ".$this->_table." WHERE quote_status = 'NEW'";
        return $this->query($strQuery)["total"];
    }

    public function getQuoteRequests($limit = 5){
        $cWhere = " WHERE quote.quote_status = 'NEW' ORDER BY quote.id DESC LIMIT 0, " . $limit;
        
        return $this->query("SELECT quote.id, CONCAT(name, ' ', lastname) AS name, city, state, DATE_FORMAT(quote.created_on,'%m/%d/%Y') AS quote_date, bill_amount, quote_status 
                             FROM ".$this->_table." 
                             INNER JOIN client ON quote.client_id = client.id ".
                             $cWhere );
    }
}