<?php 
/**
 * 添加分类的操作
 * @return string
 */
function addCate(){
	//$arr=$_POST;
	if(empty($_POST['cname'])||empty($_POST['weight'])){
		$mes="不能为空！<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
		return $mes;
	}
	$arr=$_POST;
	
	$adminName=$_SESSION['adminName'];
	
	$arr['adminName']=$adminName;
	
	if(insert("dfz_cate",$arr)){
		$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
	}else{
		$mes="分类添加失败！<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
	}
	return $mes;
}

/**
 * 根据ID得到指定分类信息
 * @param int $id
 * @return array
 */
function getCateById($id){
	$sql="select * from dfz_cate where id={$id}";
	return fetchOne($sql);
}

/**
 * 修改分类的操作
 * @param string $where
 * @return string
 */
function editCate($where){
	$arr=$_POST;
	if(update("dfz_cate", $arr,$where)){
		$mes="分类修改成功!<br/><a href='listCate.php'>查看分类</a>";
	}else{
		$mes="分类修改失败!<br/><a href='listCate.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除分类
 * @param string $where
 * @return string
 */
function delCate($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("dfz_cate",$where)){
			header("Location:listCate.php"); 
		}else{
			$mes="删除失败！<br/><a href='listCate.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的商品", "listPro.php");
	}
}

/**
 * 得到所有分类
 * @return array
 */
function getAllCate($adminName){ 
	$sql="select * from dfz_cate where adminName='{$adminName}'";
	$rows=fetchAll($sql);
	return $rows;
}





