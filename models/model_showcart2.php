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
        function getPostPrice($data){
            $addressId = $data['addressId'];
            $sql = "select * from tbl_user_address where id=?";
            $params = [$addressId];
            $result = $this->doSelect($sql,$params,1);
            self::sessionInit();
            self::sessionSet('addressInfo',serialize($result));
            $cityId = $data['cityId'];
            $postPrice = $this>calculatePostPrice($cityId);
            echo json_encode($postPrice);
        }
        function sessionPostType($data){
            self::sessionInit();
            self::sessionSet('postType',$data['postTypeId']);
            echo self::sessionGet('postType');
        }
        function deleteAddress($id){
            $sql = "delete from tbl_user_address where id=?";
            $this->doQuery($sql,[$id]);
        }
    }



?>