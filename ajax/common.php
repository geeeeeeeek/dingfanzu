<?php

//计算原价
function getOriginalPrice($username,$shopId,$itemsTxt){

    $payPrice=0;
    if($username&&$shopId&&$itemsTxt){ 
        $arrayObj=json_decode($itemsTxt,true);
        $count=count($arrayObj);
 
        for($i=0;$i<$count;$i++){
            $itemId= strval($arrayObj[$i]['itemId']);
            $count=$arrayObj[$i]['count'];

            $sql="select priceB from dfz_pro where shopId='{$shopId}' and pSn='{$itemId}' ";
            $row=fetchOne($sql);
            if($row){
                $perPrice=$row['priceB'];
                $payPrice=$payPrice+$perPrice*$count;
            } 
        } 
    }
    return $payPrice;
    
}

//计算实付价格
function getPayPrice($username,$shopId,$itemsTxt){
    if($username&&$shopId&&$itemsTxt){  

        //原价
        $payPrice=getOriginalPrice($username,$shopId,$itemsTxt);  

        //计算积分抵现
        $disCount=0;
        $jifen=getJifen($username);
        if($jifen&&$jifen>0){
            $disCount=floor($jifen/100);//取整 
        } 

        //减去积分优惠
        $payPrice-=$disCount; 
        if($payPrice<=0){
            $payPrice=0;
        }
        return $payPrice; 
    }
}

function getJifen($username){
    if($username){
        $sql="select jifen from dfz_userinfo where username='$username'";
        $row=fetchOne($sql);
        if($row){
            $jifen=$row['jifen']; 
            return $jifen;
        }else{
            return 0;
        }
    }
    return 0; 
}

function minusJifen($username){ 
    if($username){ 
        $allJifen=getJifen($username); //我的全部积分
        $jifenB=floor($allJifen/100)*100; //取整积分

        $leftJifen=$allJifen-$jifenB;
        if($leftJifen<=0)$leftJifen=0;
        $arr['jifen']=$leftJifen;
        update("dfz_userinfo",$arr,"username='{$username}'");
    }
}

?>