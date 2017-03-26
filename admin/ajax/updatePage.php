<?php
require_once '../../include.php'; 

//模板路径
$templateFile="../../template/template_shop.html";

if(isset($_SESSION['adminName'])){
    $adminName=$_SESSION['adminName'];
}


 if(isset($_SESSION['shopId'])){
    $shopId=$_SESSION['shopId'];
    //生成文件
    $shopFile="../../shop/".$shopId.".html";
 }

//-------------------读取模板文件-----------------
$myfile = fopen($templateFile, "r") or die("打开模板失败！");
$fileTxt= fread($myfile,filesize($templateFile));
fclose($myfile);


//--------------------生成新文件-------------------
$myfile = fopen($shopFile, "w") or die("无法打开文件!");

//--------------------组装店铺信息-----------------
$sql="select * from dfz_shop where shopId='$shopId'"; 

$row=fetchOne($sql);
if($row){
    $shopInfoTxt="";
    $shopInfoTemplate="<img class='shop-icon' src='/image_shop/#shopIcon#' >"
                        ."<span class='shop-name' shopId='#shopId#' shopName='#shopName#' shopPhone='13599999999'>"
                        ."#shopName#"
                        ."</span>"
                        ."<span class='switch-address'>"
                        ."<a class='switch-address' href='/place.html'>[切换地址]</a>"
                        ."</span>";
      
        
    $v1=str_replace("#shopIcon#",$row['shopIcon'],$shopInfoTemplate);
    $v2=str_replace("#shopId#",$row['shopId'],$v1);
    $v3=str_replace("#shopName#",$row['shopName'],$v2);
    $shopInfoTxt=$v3."\n"; //基本信息

    $shopTipTxt=$row['shopTip'];//公告
    
}
 

//--------------------组装左menu-------------------
$sql="select * from dfz_cate where adminName='$adminName' order by weight asc"; 
$rows=fetchAll($sql);
if($rows){
    $leftMenuTxt="";
    $leftMenuTemplate="<dd id='i#index#' class='#class# leftmenu-item'><a href='#'>#name#</a></dd>";
    $i=0;
    
    foreach($rows as $row){
        $cates[$i]=$row['id'];//记下分类id
        if($i==0){
            $v0=str_replace("#class#","active",$leftMenuTemplate);
        }else{
            $v0=str_replace("#class#","",$leftMenuTemplate);
        }
        $i++;
        $v1=str_replace("#index#",$i,$v0);
        $v2=str_replace("#name#",$row['cName'],$v1);
        $leftMenuTxt=$leftMenuTxt.$v2."\n"; 
    } 
}

//-------------------组装中间商品----------------------
$middle="";
for($i=0;$i<count($cates);$i++){

    //div头
     $menuWrapTemplate="<div id='m#menuid#' class='menu-wrap #class#'>";
     $menuid=$i+1;
     $menuWrapHeader=str_replace("#menuid#",$menuid,$menuWrapTemplate);
     if($i>0){
        $menuWrapHeader=str_replace("#class#","n",$menuWrapHeader); 
     }else{
        $menuWrapHeader=str_replace("#class#","",$menuWrapHeader);  
     }

    //div中间
    $menuWrapContent="";
    $sql="select * from dfz_pro where shopId='$shopId' and pCateId='$cates[$i]' "; 
    $rows=fetchAll($sql);
    if($rows){
        $menuItemTemplate="<div class='menu-item' item-id='#id#'>"
                    ."<div class='item-wrap'>"
                        ."<img src='/image_220/#icon#' height='130' width='130'> "
                        ."<div class='item-detail'>"
                            ."<span class='name '>#name#</span>"
                            ."<span class='price'  item-price='#price#'>￥#price#</span> "
                            ."<img class='buy' src='/images/icon_buy.png' > "
                            ."<ul class='stars'>" 
                                ."<li data-value='1' class='active'></li>"
                                ."<li data-value='2' class='active'></li>"
                                ."<li data-value='3' class='active'></li>"
                                ."<li data-value='4' class='active'></li>"
                                ."<li data-value='5' class=''></li>"
                            ."</ul>"
                        ."</div>"
                    ."</div>"
                ."</div>";
        

        foreach($rows as $row){ 
            $menuItem=str_replace("#id#",$row['pSn'],$menuItemTemplate);  
            $menuItem=str_replace("#name#",$row['pName'],$menuItem);  
            $menuItem=str_replace("#icon#",$row['icon'],$menuItem);  
            $menuItem=str_replace("#price#",$row['priceB'],$menuItem);  
            $menuWrapContent=$menuWrapContent.$menuItem;
        } 
    }
    //div尾
    $menuWrapFooter="</div>";

    //div头+div中间+div尾
    $v0=$menuWrapHeader.$menuWrapContent.$menuWrapFooter."\n";
    $middle=$middle.$v0;
}


 

//-------------------写入新文件-------------------
$fileTxt=str_replace("#shopInfo#",$shopInfoTxt,$fileTxt);    //替换信息
$fileTxt=str_replace("#shopTip#",$shopTipTxt,$fileTxt);    //替换信息
$fileTxt=str_replace("#leftmenu#", $leftMenuTxt, $fileTxt); //替换分类
$fileTxt=str_replace("#middle#", $middle, $fileTxt);        //替换中间

fwrite($myfile, $fileTxt); 
fclose($myfile);
unset($fileTxt);


$obj = new stdClass();
$obj->code="0";
$obj->msg=urlencode("生成成功");//中文urlencode一下
echo urldecode(json_encode($obj));
