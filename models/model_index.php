<?php

class model_index extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getSlider1(){
        $sql = "select * from tbl_slider1";
        $result = $this->doSelect($sql);
        return $result;
    }
    function onlyasanbiamoz(){
        $sql = "select * from tbl_product where onlyasanbiamozcom=1";
        $result = $this->doSelect($sql);
        return $result;

    }
    function mostviewd(){
        $sql = "select * from tbl_option where setting='limit_slider'";
        $result = $this->doSelect($sql,array(),1);
        $limit = $result['value'];
        $sql = 'select * from tbl_product order by viewd desc limit '. $limit . '';
        $result = $this->doSelect($sql);
        return $result;
    }
  
}


?>











