<?php

class SQLQuery {
    // public $_link;
    // public $id;
    // protected $_result;
    public $_link;
    public $_mysqli;
    protected $_result;
    protected $_table;
    
    /** Connects to database **/
    function connect($address, $account, $pwd, $name) {
        $this->_mysqli = mysqli_connect($address, $account, $pwd, $name) or die('Fail to Connect to Database: '.mysqli_connect_error());
    }
 
    /** Disconnects from database **/
    function disconnect() {
        if (@mysqli_close($this->_mysqli) != 0) {
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
        $query = 'SELECT * FROM `'.$this->_table.'` WHERE `id` = \''.mysqli_real_escape_string($this->_mysqli, $id).'\'';
        return $this->query($query);    
    }
    
    /** Custom SQL Query **/
    function query($sql, $singleResult = false) {
        $data  = array();
        if ($this->_result = $this->_mysqli->query($sql)) {
            if ($this->_result->num_rows == 1){
                $data = $this->_result->fetch_assoc();
            }else{
                while($obj = $this->_result->fetch_assoc()){
                    $data[] = $obj;
                }
            }
            //$this->_result->close();
        }
        unset($obj);
        unset($sql);

        return $data;
    }

    function insert($arrCols, $arrValues){
        return $this->_mysqli->real_query('INSERT INTO '.$this->_table.' ('.implode(',',$arrCols).') VALUES ("'.implode('","', $arrValues).'")');
    }

    function update($arrCols, $arrValues, $id){
        if (count($arrCols) == count($arrValues)){
            for ($i=0; $i < count($arrCols); $i++) { 
                $updateValues[] = $arrCols[$i] .' = "' .$arrValues[$i] . '"';
            }
            $result = $this->_mysqli->real_query('UPDATE '.$this->_table.' SET '.implode(',',$updateValues).' WHERE id = '. $id);
            if ($result){
                return $result;
            }else{
                error_log('[UPDATE][MYSQL ERROR] ' . $this->getError());
                exit;
            }
        }else{
            error_log('[UPDATE] The amount of fields should match the amount of values.');
            exit;
        }
        // error_log('[UPDATE VALUES]: ' . 'UPDATE '.$this->_table.' SET '.implode(',',$updateValues).' WHERE id = '. $id);
        
    }
 
    /** Get number of rows **/
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }

    /** Get last insert ID **/
    function getLastInsertID() {
        return mysqli_insert_id($this->_mysqli);
    }
 
    /** Free resources allocated by a query **/
    function freeResult() {
        mysqli_free_result($this->_result);
    }
 
    /** Get error string **/
    function getError() {
        return mysqli_error($this->_mysqli_error);
    }
}