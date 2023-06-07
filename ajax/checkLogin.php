<?php
require_once '../include.php';
checkIfLogin();

function checkIfLogin(){
    if(isset($_COOKIE['userId'])&&$_COOKIE['userId']!=""){
        $_SESSION['userId']=$_COOKIE['userId'];
        $obj = new stdClass();
        $obj->code="0"; //已登录
        echo json_encode($obj);
    }else{
        $obj = new stdClass();
        $obj->code="1"; //未登录
        echo json_encode($obj);
    }
}
