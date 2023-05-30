<?php 
require_once '../include.php';
checkLogined();
$adminName=$_SESSION['adminName'];
$shops=getAllShop($adminName);
if(!$shops){
    alertMes("没有店铺，请先添加店铺!!", "addShop.php");
}
$rows=getAllCate($adminName);
if(!$rows){
	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
$id=$_REQUEST['id'];
$pSn=$_REQUEST['pSn'];
$proInfo=getProById($id);
//print_r($proInfo);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel=stylesheet href="styles/reset.css">
<link rel=stylesheet href="styles/bootstrap-admin.css"> 
<link rel=stylesheet href="styles/global.css"    />
<link rel=stylesheet href="styles/backstage.css"   />


 
</head>
<body>
<span class="main-title">商品列表 &gt; 编辑商品</span>
<div class="form-add">
<form action="doAdminAction.php?act=editPro&id=<?php echo $id;?>&pSn=<?php echo $pSn;?>" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">

    <tr>
        <td align="right" width="15%"><span class="td-txt">商品编号</span></td>
        <td><input class="gray" type="text" disabled="true" readonly name="pSn" value="<?php echo $proInfo['pSn'];?>"/></td>
    </tr>
	<tr>
		<td align="right"><span class="td-txt">商品名称</span></td>
		<td><input type="text" name="pName"  value="<?php echo $proInfo['pName'];?>"/></td>
	</tr>
    <tr>
        <td align="right"><span class="td-txt">所属店铺</span></td>
        <td>
        <select name="shopId" class="">
            <?php foreach($shops as $shop):?>
                <option value="<?php echo $shop['shopId'];?>" <?php echo $proInfo['shopId']==$shop['shopId']? "selected='selected'":null; ?>><?php echo $shop['shopName'];?></option>
            <?php endforeach;?>
        </select>
        </td>
    </tr>
	<tr>
		<td align="right"><span class="td-txt">商品分类</span></td>
		<td>
		<select name="pCateId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$proInfo['pCateId']?"selected='selected'":null;?>><?php echo $row['cName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr> 
	<tr>
		<td align="right"><span class="td-txt">商品价格</span></td>
		<td><input type="text" name="priceB"  value="<?php echo $proInfo['priceB'];?>"/></td>
	</tr> 
	<tr>
        <td align="right"><span class="td-txt">商品图像</span></td>
        <td> 
            <img style="margin:12px;" src="<?php echo IMG_50.$proInfo['icon'].'?v='.time();?>"/>
            <input class="btn btn-file" type="file" name="myFile"/>
        </td>
    </tr> 
</table>
<input class="btn btn-primary" type="submit"  value="编辑完成"/>
</form>
</div>
</body>
</html>