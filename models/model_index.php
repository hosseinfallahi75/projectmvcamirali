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
  
}


?>











