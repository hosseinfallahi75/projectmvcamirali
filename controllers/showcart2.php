<?php
    class Showcart2 extends Controller{
        function __construct(){
            parent::__construct();
        }
        function index(){
            $address = $this->model->getAddress();
            $postType = $this->model->getPostType();
            $data = array('address' => $address,'postType' => $postType);
            $this->view('showcart2/index',$data);
        }
    }




?>