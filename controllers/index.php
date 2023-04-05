<?php


class Index extends Controller
{

    function __construct()
    {
        //echo 'we are in index controller!<br>';
    }

    function index()
    {
        $slider1 = $this->model->getSlider1();
        $data = array($slider1);
        $this->view('index/index',$data);

    }


}


?>