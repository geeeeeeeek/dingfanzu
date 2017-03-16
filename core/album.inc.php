<?php 

function addAlbum($arr){
	insert("imooc_album", $arr);
}

/**
 * 根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
	$sql="select albumPath from imooc_album where pid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据商品id得到所有图片
 * @param int $id
 * @return array
 */
function getProImgsById($id){
	$sql="select albumPath from imooc_album where pid={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 文字水印的效果
 * @param int $id
 * @return string
 */
function doWaterText($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterText($filename);
	}
	$mes="操作成功";
	return $mes;
}

/**
 *图片水印
 * @param int $id
 * @return string
 */
function doWaterPic($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterPic($filename);
	}
	$mes="操作成功";
	return $mes;
}




