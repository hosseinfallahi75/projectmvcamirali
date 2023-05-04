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
        function doQuery($sql,$values=[]){
            $stmt = self::$conn->prepare();
            foreach($values as  $key => $value){
                $stmt->bindValue($key + 1 , $value);
            }
            $stmt->execute();

        }



        public static function sessionInit(){
            @session_start();
        }
        public static function sessionSet($name,$value){
            $_SESSION[$name] = $value;
        }
        public static function sessionGet($name){
            if(isset($_SESSION[$name])){
                return $_SESSION[$name];
            }else{
                return false;
            }
        }
        public static function getBasketCookie(){
            if(isset($_COOKIE['basket'])){
                $cookie = $_COOKIE['basket'];
            }else{
                $expire  = time() + 7 * 24 * 3600;
                $value = time();
                setcookie('basket',$value,$expire,'/');
                $cookie = $value;
            }

        }
        function getBasket(){
        
        }
        function getMenu($parentId = 0){
            $sql = "select * from tbl_category where parent=?";
            $result = $this->doSelect($sql,[$parentId]);
            foreach($result as $row){
                $children = $this->getMenu($row['id']);
                $row['children'] = $children;

            }
            $data[] = $row;
            return $data;
        }
    }
   
   



?>