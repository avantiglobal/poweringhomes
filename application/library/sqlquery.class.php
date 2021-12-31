<?php

class SQLQuery {
    public $_link;
    public $id;
    protected $_result;
    
    /** Connects to database **/
    function connect($address, $account, $pwd, $name) {
        $this->_link = mysqli_connect($address, $account, $pwd, $name) or die('Fail to Connect to Database: '.mysqli_connect_error());
    }
 
    /** Disconnects from database **/
    function disconnect() {
        if (@mysqli_close($this->_link) != 0) {
            return 1;
        }  else {
            return 0;
        }
    }
     
    function selectAll() {
        $query = "SELECT * FROM ".$this->_table.";";
        return $this->query($query);
    }
     
    function select($id = null) {
        //$query = 'select * from `'.$this->_table.'` where `id` = \''.mysqli_real_escape_string($this->_link, $this->id).'\''; (old way: $this->id)
        $query = 'select * from `'.$this->_table.'` where `id` = \''.mysqli_real_escape_string($this->_link, $id).'\'';
        return $this->query($query);    
    }

    // public function add($arrKeys, $arrValues){
    //     $strQuery = "INSERT INTO ".$this->_table." (".implode(',','$arrKeys').") VALUES (".implode(',', $arrValues).")";
    //     error_log("SQL QUERY CLASS [ADD][STR QUERY]" . $strQuery);
    // }
     
    /** Custom SQL Query **/
    function query($query, $singleResult = false) {
        //$this->_result = mysqli_query($this->_link, $query);
        $data  = array();
        if ($this->_result = mysqli_query($this->_link, $query)) {
            /*while ($row = $this->_result->mysqli_fetch_assoc()) {
                $data[] = $row;
            }*/
            if ($singleResult == 0){
                while ($row = mysqli_fetch_assoc($this->_result)) {
                    $data[] = $row;
                }
            }
            else{
                return $this->_result;
            }
        }
        else{
            $data = "Record not found";
        }
        return $data;
    }
 
    /** Get number of rows **/
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }

    /** Get last insert ID **/
    function getLastInsertID() {
        return mysqli_insert_id($this->_link);
    }
 
    /** Free resources allocated by a query **/
    function freeResult() {
        mysqli_free_result($this->_result);
    }
 
    /** Get error string **/
    function getError() {
        return mysqli_error($this->_link);
    }
}