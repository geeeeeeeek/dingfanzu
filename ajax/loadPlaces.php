<?php
require_once '../include.php'; 

$sql="select shopId,shopName from dfz_shop";

$rows=fetchAll($sql);

if($rows){
    $obj = new stdClass();
    $obj->code="0";
    $obj->msg=json_encode($rows);
    echo json_encode($obj);
}
