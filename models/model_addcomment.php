<?php
    class model_addcomment extends Model{
        function __construct(){
            parent::__construct();
        }
        function productInfo($productId){
            $sql = "selcet * from tbl_product where id=?";
            $result = $this->doSelect($sql,array($productId),1);
            return $result;

        }
        function getParam($productId){
            $productInfo = $this>productInfo($productId);
            $categoryId = $productInfo['cat'];
            $sql = "select * from tbl_commment_param where idcategory=?";
            $result = $this->doSelect($sql,array($categoryId));
            return $result;
        }
    }




?>