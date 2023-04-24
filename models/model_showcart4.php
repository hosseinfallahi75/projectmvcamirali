<?php
    class model_showcart4 extends Model{
        function __construct(){
            parent::__construct();
        }
        function checkCode($code){
            $sql = "select * from tbl_code where code=? and used=0";
            $result = $this->doSelect($sql,array($code));
            if(sizeof($result) > 0){
                return $result[0]['darsad'];

            }else{
                return 0;
            }
        }
        function calculateTotalPrice($code){
            $basketInfo = $this->getBasket();
            $basketPrice = $basketInfo[1];
            $basketDiscount = $basketInfo[2];
            self::sesseionInit();
            $addressInfo = self::sessinGet('addressInfo');
            $addressInfo = unserialize($addressInfo);
            $cityId = $addressInfo['city'];
            $postPriceBoth = $this->calculatePostPrice($cityId);
            $postType = self::sessionGet('postType');
            $postPrice = 0;
            if($postType == 1){
                $postPrice = $postPriceBoth['pishtaz'];
            }else if($postType == 2){
                $postPrice = $postPriceBoth['sefareshi'];
            }
            $check = $this->checkCode($code);
            $codeDiscount = 0;
            if($check != 0){
                $codeDiscount = ($check * $basketPrice) / 100;
                $codeDiscount = intval($codeDiscount);
            }
            $priceTotal = $basketPrice - $basketDiscount + $postPrice - $codeDiscount;
            return $priceTotal;
        }
        function saveOrder($data)
        {
            self::sessionInit();
            $addressInfo = self::sessionGet('addressInfo');
            $addressInfo = unserialize($addressInfo);
            $family = $addressInfo['family'];
            $ostan  = $addressInfo['ostan_name'];
            $city = $addressInfo['city_name'];
            $mobile = $addressInfo['mobile'];
            $tel = $addressInfo['tel'];
            $codeposti = $addressInfo['codeposti'];
            $address = $addressInfo['address'];
            $basketInfo = $this->getBasket();
            $basket     = $basketInfo[0];
            $basket = serialize($basket);
            $basketPrice = $basketInfo[1];
            $basketDiscount = $basketInfo[2];




            $postpice = $this->calculatePostPrice($addressInfo['city']);
            $postType = self::sessionGet('postType');
            if($postType == 1){
                $postPrice = $postPriceBoth['pishtaz'];
            }else if($postType == 2){
                $postPrice = $postPriceBoth['sefareshi'];
            }
            $code = $data['code'];
            $darsadDiscount = $this->checkCode($code);
            $amountDiscount = ($darsadDiscount * $basketPrice) / 100;
            $priceTotal = $basketPrice - $basketDiscount + $postPrice - $codeDiscount;
            return $priceTotal;


        }
    }



?>