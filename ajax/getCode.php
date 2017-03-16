<?php
require_once '../taobao-sdk-PHP/sendCode.php';
$arr=$_POST;
$phone=$_POST['phone'];

$code=rand(1000,9999);

echo sendCode($phone,$code);