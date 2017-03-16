<?php 
/**
 * 添加商品
 * @return string
 */
function addPro(){
	$arr=$_POST;
	$arr['pSn']=getMilliSeconds();
	$arr['adminName']=$_SESSION['adminName'];
	$arr['pubTime']=time();
	$path="./upload";
	//上传
	$uploadFiles=uploadFile($path,$arr['pSn']);
	//生成缩略图
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	
	if($uploadFiles){
		$arr['icon']=$uploadFiles[0]['name']; 
		$res=insert("dfz_pro",$arr);
	}
	
	if($res){ 
		header("location:listPro.php");
	}else{
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
		
	}
	return $mes;
}
/**
 *编辑商品
 * @param int $id
 * @return string
 */
function editPro($id,$pSn){
	$arr=$_POST;
	$path="./upload"; 
	if(!empty($_FILES['myFile']['tmp_name'])){  
		$uploadFiles=uploadFile($path,$pSn);
		if(is_array($uploadFiles)&&$uploadFiles){
			foreach($uploadFiles as $key=>$uploadFile){
				thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
				thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
				thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
				thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
			}
		}
	}
	
	$where="id={$id}";
	if($uploadFiles){
		$arr['icon']=$uploadFiles[0]['name'];  
	}
	$res=update("dfz_pro",$arr,$where);
	if($res){
		$mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
		if(is_array($uploadFiles)&&$uploadFiles){
			foreach($uploadFiles as $uploadFile){
				if(file_exists("../image_800/".$uploadFile['name'])){
					unlink("../image_800/".$uploadFile['name']);
				}
				if(file_exists("../image_50/".$uploadFile['name'])){
					unlink("../image_50/".$uploadFile['name']);
				}
				if(file_exists("../image_220/".$uploadFile['name'])){
					unlink("../image_220/".$uploadFile['name']);
				}
				if(file_exists("../image_350/".$uploadFile['name'])){
					unlink("../image_350/".$uploadFile['name']);
				}
			}
		}
		$mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}

function delPro($id){
	$where="id=$id";
	$res=delete("dfz_pro",$where);

	if($res){
		header("location:listPro.php"); 
	}else{
		$mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
	}
	return $mes;
}


/**
 * 得到商品的所有信息
 * @return array
 */
function getAllProByAdmin(){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id){
	$sql="select a.albumPath from imooc_album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 根据id得到商品的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){
		$sql="select p.*,c.cName from dfz_pro as p join dfz_cate as c on p.pCateId=c.id where p.id={$id}";
		$row=fetchOne($sql);
		return $row;
}
/**
 * 检查分类下是否有产品
 * @param int $cid
 * @return array
 */
function checkProExist($cid){
	$sql="select * from dfz_pro where pCateId={$cid}";
	$rows=fetchAll($sql);
	return $rows;
}

//根据shopId
function checkProExistByShopId($shopId){
	$sql="select * from dfz_pro where shopId={$shopId}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有商品
 * @return array
 */
function getAllPros(){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id ";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据cid得到4条产品
 * @param int $cid
 * @return Array
 */
function getProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到下4条产品
 * @param int $cid
 * @return array
 */
function getSmallProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到商品ID和商品名称
 * @return array
 */
function getProInfo(){
	$sql="select id,pName from imooc_pro order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}
