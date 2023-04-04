<?php
    $model = new Model;
    $options = Model::getoption();
    define('URL',$options['root']);
    define('body_color',$options['body_color']);
    define('menu_color',$options['menu_color']);
    define('mohatPay',$options['mohlatPay']);




    $zarinpalErrors = array(
        '-1'=>'اطلاعات ارسال شده ناقص می باشد!',
        '-2' => 'IP یا مرچنت کد صحیح نیست',
        '-3' => 'سطح تایید پذیرنده کمتر از نقره ای است',
    );

    $errorForm   = [
        'errorname' => 'لطفا نام خودتان را وارد کنید!' 
    ]



?>