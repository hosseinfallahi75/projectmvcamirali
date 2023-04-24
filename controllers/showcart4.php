<?php
    class Showcart4 extends Controller{
        function __construct(){
            parent::__construct();
        }


        function index($Stutus = ''){
            $data = ['Status' => $Stutus];
            $this->view('showcart4/index',$data);
        }
        function checkcode($code){
            $result = $this->model->checkCode($code);
            $totalPrice = $this->model->calculateTotalPrice($code);
            $array = array($result,$totalPrice);
            echo json_encode($array);
        }
        function calculatetotalprice(){
            echo $totalPrice= $this->model->calculateTotalPrice($_POST['code']);
        }
        function saveorder(){
            $this->model->saveorder($_POST);
        }
        
    }





?>