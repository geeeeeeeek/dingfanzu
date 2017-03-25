<?php 
/**
 * 连接数据库
 * @return resource
 */
function connect(){
	$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库连接失败");
	mysqli_set_charset($link,DB_CHARSET); 
	return $link;
}

/** 
 * 关闭连接
 */
function close($link){
	mysqli_close($link);
}

/**
 * 完成记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
	if(DEBUG){
		exit("无权限，如使用该权限，请联系客服微信（java2048）");
	}
	$link=connect();
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert into {$table}($keys) values({$vals})";   
	mysqli_query($link,$sql);
	$insertId=mysqli_insert_id($link);//返回id
	close($link);
	return $insertId;
}
//update imooc_admin set username='king' where id=1
/**
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null){
	if(DEBUG){
		exit("无权限，如使用该权限，请联系客服微信（java2048）");
	}
	$link=connect();
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where); 
		$result=mysqli_query($link,$sql);
		//var_dump($result);
		//var_dump(mysql_affected_rows());exit;
		close($link);
		if($result){
			return true;
		}else{
			return false;
		}
}

/**
 *	删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null){
	if(DEBUG){
		exit("无权限，如使用该权限，请联系客服微信（java2048）");
	}
	$link=connect();
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysqli_query($link,$sql);
	$affected_rows=mysqli_affected_rows($link);
	close($link);
	return $affected_rows;
}

/**
 *得到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$link=connect();
	$result=mysqli_query($link,$sql);
	if($result){ 
		$row=mysqli_fetch_array($result,$result_type);
	}
	close($link);
	return $row;
}


/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){ 
	$link=connect();
	$result=mysqli_query($link,$sql);
	if($result){
		while(@$row=mysqli_fetch_array($result,$result_type)){
			$rows[]=$row;
		}
	} 
	close($link);
	return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql){ 
	$link=connect();
	$num=0;
	$result=mysqli_query($link,$sql);
	if($result){
		$num=mysqli_num_rows($result);
	} 
	close($link);
	return $num;
}

 

