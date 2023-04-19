<?php
    class model_showcart extends Model{
        function __construct(){
            parent::__construct();
        }
        function getBasket2(){
            $basketInfo = parent::getBasket();
            return $basketInfo;
        }
    }







?>