(function($){
    $("#user,#subnav").hover(function() {
        var w=$(window).width();
        var l=$('#user').position().left; 
        var right=w-l-55;
        $('.subnav').css('right',right);
        $('.subnav').show(); 
    }, function() {
        $('.subnav').hide();
    });

    //监听搜索楼名
    $('#search-input').bind('input propertychange', function() {  
         searchPlace();
    });  

    //删除搜索字符
    $("#search-del").click(function(e) {
        $('#search-input').val('');
        $(".search-result").empty();
        $(".search-result").hide();
        $(this).css("visibility","hidden");
    });

    //load所有地点
    var places=$.cookie("places"); 
    // if(!places){ 
        loadPlaces();
    // }

    
    
})(jQuery);


function loadPlaces(){
    var postUrl="/ajax/loadPlaces.php";  
    $.post(postUrl,  
        {},
        function(data,status,xhr) {    
            console.log("header===加载地点"+data);
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){   
                    $.cookie('places',$res.msg,{expires:1,path:'/'});//有效期1天  
                } 
           }else{
                alert("服务器异常");
           }
       }); 

}

function searchPlace(){ 
    $(".search-result").hide();
    var keyword=$('.search-input').val().trim();
    if(keyword==""||keyword.length<=0){
        $(".search-result").empty();
        $("#search-del").css("visibility","hidden");
        return;
    }

    $("#search-del").css("visibility","visible");
    var placesTxt=$.cookie('places');
    var arrObj=eval('('+placesTxt+')'); 
    if(arrObj&&arrObj.length>0){
        $(".search-result").empty();
        for(var i=0;i<arrObj.length;i++){ 
            var shopName=arrObj[i].shopName; 
            var shopId=arrObj[i].shopId;
            if(shopName.indexOf(keyword)>=0){ 
                $(".search-result").append("<a href='/shop.html'>"+shopName+"</a>");
                $(".search-result").show(); 
            }
        }
    } 
}

function onKeySearch(){
    if(event.keyCode==13){
        searchPlace();
    }
}