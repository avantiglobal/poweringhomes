<?php
/* 
 * Main model class. Extends SQLQuery class
 */

class Model extends SQLQuery {
    protected $_model;
    protected $_table;
 
    function __construct() {
        $env = (getenv('REMOTE_ADDR') == '127.0.0.1') ? 'development' : 'production' ;
        $this->connect(Application::getConfig($env.'.db.host'),Application::getConfig($env.'.db.user'),
                       Application::getConfig($env.'.db.pass'),Application::getConfig($env.'.db.name'));
        $this->_model = get_class($this);
        $this->_table = strtolower($this->_model);//."s";
    }
 
    function __destruct() {
    }
}