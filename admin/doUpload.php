<?php
require_once '../include.php';
header("content-type:text/html;charset=utf-8");

$mes=uploadImage();
echo $mes;

function uploadImage(){
    var_dump($_FILES['myFile']);
    $fileName=$_FILES['myFile']['name'];
    $type=$_FILES['myFile']['type'];
    $tmp_name=$_FILES['myFile']['tmp_name'];
        echo $tmp_name."----";
    $error=$_FILES['myFile']['error'];
    $size=$_FILES['myFile']['size'];

    $allowExt=array("jpg","jpeg","png");
    $maxSize=1048576;//最大1M
    $imgFlag=true; //必须是图片类型
    $mes=""; 
    $isValid=true;

    // 1.上传检查
    $ext=getExt($fileName);
    if(!in_array($ext,$allowExt)){
        exit("非法文件类型"); 
    }
    if($size>$maxSize){
        exit("文件太大！");
    }
    if($imgFlag){
        $info=getimagesize($tmp_name);
        if(!$info){
            exit("不是图片");
        }
    }

    // 2.检查完毕，开始上传
    if($error==UPLOAD_ERR_OK){ 
        $fileName=getUniName().".".$ext;
        $destination="../upload/".$fileName;
        if(is_uploaded_file($tmp_name)&&move_uploaded_file($tmp_name, $destination)){
            $mes="上传成功！";
        }else{
            $mes="移动图片失败";
        }
        
    }else{
        $mes="上传失败!,错误号：".$error;
    }
    return $mes;
}

