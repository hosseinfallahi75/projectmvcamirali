<?php
    class model_admincategory extends Model{
        public $allChildrenIds = [];
        function __construct(){
            parent::__construct();
        }

        function getCategory(){
            $sql = "select * from tbl_category";
            $result = $this->doSelect($sql);
            return $result;
        }


        function getChildren($idcategory){
            $sql = "select * from tbl_category where parent=?";
            $result = $this->doSelect($sql,[$idcategory]);
            return $result;
        }



        function getParents($idcategory){
            $categoryInfo = $this->categoryInfo($idcategory);
            $parent = $categoryInfo['parent'];
            $all_parents = [];
            while($parent != 0){
                $sql = "select * from tbl_category where id=?";
                $parentCategory = $this->doSelect($sql,[$parent],1);
                array_push($all_parents,$parentCategory);
                $parent = $parentCategory['parent'];

            }
            return $all_parents;
        }
    }





?>