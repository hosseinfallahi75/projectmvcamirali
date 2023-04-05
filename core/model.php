<?php
    class Model {
        public static $conn  = '';
        public $totalMenu = array();
        function __construct(){
            $servername = 'localhost';
            $username   = 'root';
            $password   = '';
            $dbname     = 'projectamirali';
            $attr   = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname,$username,$password,$attr);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        public static function getoption(){
            $sql = "select * from tbl_option";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $options = $stmt->fetchAll();
        }
        function doSelect($sql,$values = array(),$fetch = '',$fetchStyle = PDO::FETCH_ASSOC){
            $stmt = self::$conn->prepare($sql);
            foreach($values as $key => $value){
                $stmt->bindValue($key+1,$value);
            }
            $stmt->execute();
            if($fetch == ''){
                $result = $stmt->fetchAll($fetchStyle);
            }else{
                $result = $stmt->fetch($fetchStyle);
            }
            return $result;

        }
    }





?>