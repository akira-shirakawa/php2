<?php
ini_set('display_errors', 1);
require_once 'dbc.php';
require_once 'Message.php';
Class User extends Db{
    protected $table_name;
    function __construct(){
        $this->table_name = strtolower(get_class($this)).'s';
    }
    public static function check(){
        if(!empty($_SESSION['user_id'])){
            return true;
        }
        return false;
    }
    public static function bay(){
        $_SESSION = array();
        session_destroy();
        return;
    }
    public static function redirect($dir){
        if(self::check()){
            header("Location:$dir");
            return;
        }
    }
}