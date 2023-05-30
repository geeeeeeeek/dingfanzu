<?php 
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];

if($username){
	$sql="select a.*,b.shopId from dfz_admin as a join dfz_shop as b where a.username='{$username}' and a.password='{$password}' and b.adminName='{$username}'";
	 
	$row=fetchOne($sql);
	if($row){
		//如果选了自动登陆，30天
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+30*24*3600);
			setcookie("adminName",$row['username'],time()+30*24*3600);
			setcookie("shopId",$row['shopId'],time()+30*24*3600);
		}else{//7天
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
			setcookie("shopId",$row['shopId'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		$_SESSION['shopId']=$row['shopId'];
		header("location:index.php");
	}else{
		alertMes("登陆失败，重新登陆","login.php");
	}
}
