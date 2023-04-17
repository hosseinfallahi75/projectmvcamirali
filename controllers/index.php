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
        $onlyasanbiamoz = $this->model->onlyasanbiamoz();
        $mostviewd = $this->model->mostviewd();
        $data = array($slider1,$onlyasanbiamoz,$mostviewd);
        $this->view('index/index',$data);

    }


}


?>