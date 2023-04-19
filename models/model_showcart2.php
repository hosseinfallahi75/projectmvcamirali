<?php

    class model_showcart2 extends Model{
        function __construct(){
            parent::__construct();
        }
        function getAddress(){
            $sql = "select * from tbl_user_address where userid=?";
            Model::sessionInit();
            $userId = Model::sessionGet('userId');
            $params = array($userId);
            $result = $this->doSelect($sql,$params,1);
            return $result;
        }
        function getPostType(){
            $sql = "select * from tbl_post_type";
            $result = $this->doSelect($sql);
            return $result;
        }
    }



?>