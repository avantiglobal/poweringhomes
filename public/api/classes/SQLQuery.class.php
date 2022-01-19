<?php

class SQLQuery {
    public $_link;
    public $_mysqli;
    protected $_result;
    protected $_table;

    public $id;

    function __construct($db_host, $db_user, $db_password, $db_name, $table) {   
        $this->connect($db_host, $db_user, $db_password, $db_name);
        $this->_table = $table;
    }
    
    function test(){
        // echo "entrando en el metodo test de la clase SQLQuery <br>";
    }
 
    /** Connects to database **/
 
    function connect($address, $account, $pwd, $name) {
        
        $this->_mysqli  = new mysqli($address, $account, $pwd, $name) or die('Fail to Connect to Database: '.mysqli_connect_error());
        
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
        $query = "SELECT * FROM ". $this->_table . " LIMIT 3";
        return $this->query($query);
    }
     
    function select($id = null, $fieldName = 'id') {
        $query  = 'SELECT * FROM `'.$this->_table.'` WHERE `'.$fieldName.'` = \''.$this->_mysqli->real_escape_string($id).'\'';
        $this->_result = $this->query($query);
        return $this->_result;
    }

    public function add($arrKeys, $arrValues){
        $strQuery = "INSERT INTO ".$this->_table." (".implode(",", $arrKeys).") VALUES ('".implode("','", $arrValues)."')";
        $this->_mysqli->query($strQuery);
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
        }else{
            $data[] = "Record not found";
        }
        //$this->_result->close();
        unset($obj);
        unset($sql);

        return $data;
    }
 
    /** Get number of rows **/
    function getNumRows() {
        //echo "entra";
        return mysqli_num_rows($this->_result);
    }

    /** Get last insert ID **/
    function getLastInsertID() {
        //echo 'last insert ID';
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

?>