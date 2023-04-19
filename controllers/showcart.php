<?php
    class Showcart extends Controller{
        function __construct(){
            parent::__construct();
        }
        function index(){
            $basketInfo = $this->model->getBasket2();
            $basket = $basketInfo[0];
            $priceTotalall = $basketInfo[1];
            $data = ['basket' => $basket,'priceTotalall' => $priceTotalall];
            $this->view('showcart/index',$data);
        }
    }






?>