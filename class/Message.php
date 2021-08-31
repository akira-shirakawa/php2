<?php
ini_set('display_errors', 1);
require_once 'Dbc.php';
Class Message extends DB{
    protected $table_name;
    function __construct(){
        $this->table_name = strtolower(get_class($this)).'s';
    }
  
}