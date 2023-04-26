<?php
class model_search extends Model{
    function __construct(){
        parent::__construct();
    }
    function getAttr($categoryId){
        $sql = "select * from tbl_attr where idcategory=? and filter=1";
        $result = $this->doSelect($sql,[$categoryId]);
        foreach($result as $key => $row){
            $sql = "select * from tbl_attr_val where idattr=?";
            $res = $this->doSelect($sql,[$row['id']]);
            $result[$key]['values'] = $res;
        }  
        return $result; 
    }
    function getAttrRight($categoryId){
        $sql = "select * from tbl_attr where idcategory=? and filter_right=1";
        $result = $this->doSelect($sql,[$categoryId]);
        foreach($result as $key => $row){
            $sql = "select * from tbl_attr_val where idattr=?";
            $res = $this->doSelect($sql,[$row['id']]);
            $result[$key]['values'] = $res;
        }
        return $result;
    }

    function getProducts($exist,$keyword,$orderType1,$orderType2){
        $string = ' where 1=1 ';
        $order  = 'order by';
        if($exist == 1){
            $string = $string . ' and tedad_mojod > 0';
        }
        if($keyword != ''){
            $string = $string . ' and title like "%' . $keyword . '%" ';
        }
        if($orderType1 == 1){
            $order = $order . ' price ';
        }
        if($orderType1 == 2){
            $order = $order . ' viewd ';
        }
        if($orderType1 == 3){
            $order = $order . ' id ';
        }


        if($orderType2 == 1){
            $order = $order . ' asc';
        }
        if($orderType2 == 2){
            $order = $order . ' desc';
        }

        $sql = "select * from tbl_product " . $string . " " . $order .  " ";
        $result  = $this->doSelect($sql);
        return $result;
    }
    function getColors(){
        $sql = "select * from tbl_color";
        $result = $this->doSelect($sql);
        return $result;
    }
}

?>