(function($){
    //是否已登录
    checkIfLogin();

    //适配左侧高度
    processLeftHeight();

})(jQuery);

function checkIfLogin(){
    var userId=$.cookie('userId');
    if(!userId){ 
        location.href="/place.html";//跳到首页
    }
}


//适配高度
function processLeftHeight(){
    var rightHeight=$(".content-right").height(); 
    rightHeight-=40;
    var screenHeight=window.screen.height; //屏幕高
    if(rightHeight<screenHeight){
        rightHeight=screenHeight;
    }
    $(".content-left,.menu-left").height(rightHeight);
}
