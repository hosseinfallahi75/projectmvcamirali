<?php
    class model_addcomment extends Model{
        function __construct(){
            parent::__construct();
        }
        function productInfo($productId){
            $sql = "selcet * from tbl_product where id=?";
            $result = $this->doSelect($sql,array($productId),1);
            return $result;

        }
        function getParam($productId){
            $productInfo = $this>productInfo($productId);
            $categoryId = $productInfo['cat'];
            $sql = "select * from tbl_commment_param where idcategory=?";
            $result = $this->doSelect($sql,array($categoryId));
            return $result;
        }

        function saveComment($data,$productId){
            $comment_params = $this->getParam($productId);
            $param_result  = [];
            foreach($comment_params as $row){
                $paramId = $row['id'];
                $value = $_POST['param'.$paramId];
                $param_result[$paramId] = $value;
            }
            $title = $_POST['title'];
            $positive = $_POST['positive'];
            $negative = $_POST['negative'];
            $comment  = $_POST['comment'];
            self::sessionInit();
            $userId = self::sessionGet('userId');
            $sql = "select * from tbl_comment where user=? and idproduct=?";
            $data = [$userId,$productId];
            $result = $this->doSelect($sql,$data);
            if(isset($result[0])){
                $commentId = $result[0]['id'];
                $sql = "update tbl_comment set title=?,matn=?,positive=?,negative=?,param=? where id=?";
                $array = [$title,$comment,$positive,$negative,serialize($param_result),$commentId];
                $this->doQuery($sql,$array);
            }else{
                $sql = "insert into tbl_comment (title,matn,positive,negative,idproduct,param,user) VALUES (?,?,?,?,?,?,?)";
                $array = [$title,$comment,$positive,$negative,$productId,serialize($param_result),$userId];
                $this->doQuery($sql,$array);
            }
            header('location:' . URL . 'addcomment/index' .$productId);   

        }


        function commentInfo($productId){
            self::sessionInit();
            $userId = self::sessionGet('userId');
            $sql = "select * from tbl_comment where idproduct=? and user=?";
            $data  = [$productId,$userId];
            $result = $this->doSelect($sql,$data,1);
            return $result;
        }
    }




?>