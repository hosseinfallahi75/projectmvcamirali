<?php
   class Admincategory extends Controller{
    function __construct(){
        parent::__construct();
            $level = Model::getUserLevel();
            if($level != 1){
                header('location:'.URL.'adminlogin');
            }
       }
   }






?>