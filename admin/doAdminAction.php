<?php 
require_once '../include.php';
checkLogined();
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
$username=$_REQUEST['username'];
if($act=="logout"){
    logout();
}elseif($act=="addAdmin"){
    $mes=addAdmin();
}elseif($act=="editAdmin"){
    $mes=editAdmin($id);
}elseif($act=="delAdmin"){
    $mes=delAdmin($id);
}elseif($act=="addCate"){
    $mes=addCate();
}elseif($act=="editCate"){
    $username=$_SESSION['adminName'];
    $where="id={$id} and adminName='{$username}'";
    $mes=editCate($where);
}elseif($act=="delCate"){
    $mes=delCate($id);
}elseif($act=="addPro"){
    $mes=addPro();
}elseif($act=="editPro"){
    $pSn=$_REQUEST['pSn'];
    $mes=editPro($id,$pSn);
}elseif($act=="delPro"){
    $mes=delPro($id);
}elseif($act=="addUser"){
    $mes=addUser();
}elseif($act=="delUser"){
        $mes=delUser($username);
}elseif($act=="editUser"){
    $mes=editUser($id); 
}elseif($act=="addShop"){
    $mes=addShop();
}elseif($act=="delShop"){
    $shopId=$_REQUEST['shopId'];
    $mes=delShop($shopId);
}elseif($act=="editShop"){
    $shopId=$_REQUEST['shopId'];
    $mes=editShop($shopId);
}
elseif($act=="waterText"){
    $mes=doWaterText($id);
}elseif($act=="waterPic"){
    $mes=doWaterPic($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
    if($mes){
        echo $mes;
    }
?>
</body>
</html>