<?php
   class Admincategory extends Controller{
    function __construct(){
        parent::__construct();
            $level = Model::getUserLevel();
            if($level != 1){
                header('location:'.URL.'adminlogin');
            }
       }
       function index(){
        $category = $this->model->getChildren(0);
        $data = ['category' => $category];
        $this->view('admin/category/index',$data);
       }
       function showchildren($idcategory = 0){
        $categoryInfo = $this->model->categoryInfo($idcategory);
        $children = $this->model->getChildren($idcategory);
        $parents = $this->model->getParents($idcategory);
        $data = ['categoryInfo' => $categoryInfo,'category' => $children,'parents' => $parents];
        $this->view('admin/category/index',$data);

       }
   }






?>