<?php

/**
 * 接单
 */
function takeOrder($id){
    $where="orderId=".$id." and received=0";  
    $arr['received']="1";
    $arr['receivedTime']=time();
    //先检索
    $sql="select id from dfz_order where ".$where;
    $row=fetchOne($sql);
    if(!$row){
        $mes="2";//订单已处理过
        return $mes;
    }
    if(update("dfz_order", $arr,$where)){
        $mes="0";//接单成功
    }else{
        $mes="1";//接单失败
    }
    return $mes;
}

/**
 * 取消订单
 */
function cancelOrder($id,$received){
    $where="orderId=".$id;  
    $arr['received']=$received;
    $arr['receivedTime']=time();
    //先检索
    $sql="select id from dfz_order where orderId=".$id." and received=0";
    $row=fetchOne($sql);
    if(!$row){
        $mes="2";//订单已处理
        return $mes;
    }
    if(update("dfz_order", $arr,$where)){
        $mes="0";//订单已取消
    }else{
        $mes="1";//取消失败
    }
    return $mes;
}