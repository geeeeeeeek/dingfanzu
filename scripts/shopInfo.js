(function($){  

})(jQuery);





//------------------------------下面3个函数：初始化、存、取------------------------------
//初始化json
function intShopInfo(){
    var shopInfo=$.cookie('shopInfo');
    if(!shopInfo){
        shopInfo='{"shopId":"","shopName":"","shopPhone":"","shopTip":"","shopState":"","shopIcon":"","shopBlock":"","shopFloor":""}'; 
        $.cookie('shopInfo',shopInfo,{expires:720,path:'/'});
    }
}

//存
function shop_SaveValue(key,value){
    intShopInfo();//先初始化
    var shopInfo=$.cookie('shopInfo');
    if(shopInfo){
        var obj=eval('('+shopInfo+')');
        obj[''+key+'']=value;
        shopInfo=JSON.stringify(obj);
        $.cookie('shopInfo',shopInfo,{expires:720,path:'/'});
    }
}

//取
function shop_GetValue(key){
    intShopInfo();//先初始化
    var shopInfo=$.cookie('shopInfo');
    if(shopInfo){
        var obj=eval('('+shopInfo+')');
        return obj[''+key+''];
    }
    return "";
}