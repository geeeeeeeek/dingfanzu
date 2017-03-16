<?php 

 

echo cutImage("11.jpg","22.jpg",800,800);


function cutImage($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true){
    list($src_w,$src_h,$imagetype)=getimagesize($filename);
    if($src_w>$src_h){
        $src_x=($src_w-$src_h)/2;
        $src_y=0;
        $src_w=$src_h;
    }else{
        $src_x=0;
        $src_y=($src_h-$src_w)/2;
        $src_h=$src_w;
    }
    if(is_null($dst_w)||is_null($dst_h)){
        $dst_w=$src_h;
        $dst_h=$src_h;
    }

    $mime=image_type_to_mime_type($imagetype);
    $createFun=str_replace("/", "createfrom", $mime);
    $outFun=str_replace("/", null, $mime);
    $src_image=$createFun($filename);
    $dst_image=imagecreatetruecolor($dst_w, $dst_h);
    
    
    imagecopyresampled($dst_image, $src_image, 0,0,$src_x,$src_y, $dst_w, $dst_h, $src_w, $src_h);
    if($destination&&!file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    $dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
    $outFun($dst_image,$dstFilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$isReservedSource){
        unlink($filename);
    }
    return $dstFilename;
}


 







function getMilliSeconds() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}


function getIP(){
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
    $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
    $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}

function get_real_ip(){
    static $realip;
    if(isset($_SERVER)){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $realip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $realip=$_SERVER['HTTP_CLIENT_IP'];
        }else{
            $realip=$_SERVER['REMOTE_ADDR'];
        }
    }else{
        if(getenv('HTTP_X_FORWARDED_FOR')){
            $realip=getenv('HTTP_X_FORWARDED_FOR');
        }else if(getenv('HTTP_CLIENT_IP')){
            $realip=getenv('HTTP_CLIENT_IP');
        }else{
            $realip=getenv('REMOTE_ADDR');
        }
    }
    return $realip;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name=description content="">
<meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<form action="doUpload.php" method="post" enctype="multipart/form-data">
     <input type="file" name="myFile"/>
     <input type="submit" value="ok"/>
</form>
</body>
</html>
 