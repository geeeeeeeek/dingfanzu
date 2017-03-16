(function($){ 
    
    //加载shop信息
    var shopId=$('.shop-name').attr('shopId');
    if(shopId){
        loadShopInfo(shopId);
    }

    //加载my信息 
    loadMyInfo(); 
})(jQuery);


//加载shop信息
function loadShopInfo(shopId){ 
    if(shopId){ 
        var postUrl="/ajax/loadShopInfo.php";    
        //开始加载
        $.post(postUrl,  
        {shopId:shopId},
        function(data,status,xhr) {    
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){  
                    shop_SaveValue("shopId",$res.data['shopId']); 
                    shop_SaveValue("shopName",$res.data['shopName']); 
                    shop_SaveValue("shopPhone",$res.data['shopPhone']); 
                    shop_SaveValue("shopTip",$res.data['shopTip']); 
                    shop_SaveValue("shopState",$res.data['shopState']); 
                    shop_SaveValue("shopIcon",$res.data['shopIcon']); 
                    shop_SaveValue("shopBlock",$res.data['shopBlock']); 
                    shop_SaveValue("shopFloor",$res.data['shopFloor']); 
                } 
           }else{
                //服务器异常时
                setTimeout("loadShopInfo('"+shopId+"')", 2000);//2秒后再请求一次
           }
       }); 
    }
}