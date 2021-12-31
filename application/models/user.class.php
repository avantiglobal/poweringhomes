<?php

class User extends Model {
    
    protected $abstract = true;
    
    function get(){
        return 'user model get';
    }

    public function signup($arrKeys){
        // Must name the inputs in the contact form like the field names in the table
        $arrValues = array();
        foreach ($arrKeys as $key => $value) {
            array_push($arrValues, ($value == 'password') ? hash('md5', $_REQUEST[$value]) : $_REQUEST[$value]);
        }
        
        $strQuery = "INSERT INTO ".$this->_table." (".implode(',', $arrKeys).") VALUES (\"".implode("\",\"", $arrValues)."\")";
        return $this->query($strQuery, true);
    }

    public function emailExists($email){
        $strQuery = "SELECT COUNT(id) AS total FROM ".$this->_table." WHERE email = '".$email."'";
        $result = $this->query($strQuery);
        error_log('[USER CLASS MODEL][RESULT] -- ' . $result[0]['total']);
        return ($result[0]['total']) > 0 ? true : false;
    }

}