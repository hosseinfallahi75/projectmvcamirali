<?php
    class model_showcart extends Model{
        function __construct(){
            parent::__construct();
        }
        function getBasket2(){
            $basketInfo = parent::getBasket();
            return $basketInfo;
        }
        function deleteBasket($productId){
            $sql = "delete from tbl_basket where id=?";
            $params = [$productId];
            $this->doQuery($sql,$params);

        }
        function updateBasket($data){
            $tedad = $data['tedad'];
            $basketRow = $data['basketRow'];
            $sql = "update tbl_basket set tedad=? where id=?";
            $params = [$tedad,$basketRow];
            $this->doQuery($sql,$params);
        }
    }







?>