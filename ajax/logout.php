<?php
logout();

function logout(){
    if(isset($_COOKIE['userId'])&&$_COOKIE['userId']!=""){
 
        
        if(isset($_SESSION['userId'])){
            unset($_SESSION[userId]);
        }
        $obj = new stdClass();
        $obj->code="0"; //退出成功
        echo json_encode($obj);
    }else{
        $obj = new stdClass();
        $obj->code="1"; //退出异常
        echo json_encode($obj);
    } 
}