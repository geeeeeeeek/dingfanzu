<?php
    require_once '../include.php';
    require_once 'TopSdk.php';
    date_default_timezone_set('Asia/Shanghai'); 

 

    //发送验证码并返回结果
    function sendCode($pn,$code){
        $appkey="23385013";
        // 密钥
        $secret="";

        $c = new TopClient;
        $c->appkey = $appkey;
        $c->secretKey = $secret; 
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req ->setExtend( "2438" );
        $req ->setSmsType( "normal" );
        $req ->setSmsFreeSignName( "订饭组" );
        $req ->setSmsParam( "{code:'$code'}" ); 
        $req ->setRecNum($pn);
        $req ->setSmsTemplateCode( "SMS_10540034" );
        $resp = $c ->execute( $req );
       
        if (isset($resp->code))
        { 
            $obj = new stdClass();
            $obj->code="1";
            $obj->msg=urlencode("发送验证码失败");//中文urlencode一下
            return urldecode(json_encode($obj)); 
        }else{
            $obj = new stdClass();
            $obj->code="0";
            $obj->msg=md5($code); //md5加密
            $_SESSION['confirmCode']=$code;
            return json_encode($obj); 
        }
    }
?>