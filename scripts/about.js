(function($){
    $("#tousu-commit").click(function(event) {
        commitAdvice();
    });

    $("#hotel-commit").click(function(event) {
        commitHotel();
    });
})(jQuery);


//投诉或建议
function commitAdvice(){
    var tousuTxt=$("#tousu-txt").val();
    var username=$.cookie('userId');
    if(tousuTxt==""||tousuTxt.length<=0){
        showAlert("不能为空");
        return;
    } 
    if(!username){
        showAlert("请先登录");
        return;
    }
    var postUrl="/ajax/commitAdvice.php";  
    $.post(postUrl,  
        {advice:tousuTxt,
         username:username},
        function(data,status,xhr) {     
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){   
                    showAlert("提交成功","/about.html?p=tousujianyi");
                    // window.location.reload();
                } 
           }else{
                showAlert("服务器异常");
           }
       }); 
}

//提交餐馆
function commitHotel(){ 
    var hotelName=$("#hotelName").val();
    var hotelPhone=$("#hotelPhone").val();
    var hotelLocation=$("#hotelLocation").val();
    var hotelIntroduction=$("#hotelIntroduction").val();
    var username=$.cookie('userId');
    if(hotelName==""||hotelName.length<=0){
        showAlert("名称不能为空");
        return;
    } 
    if(hotelPhone==""||hotelPhone.length<=0){
        showAlert("联系方式不能为空");
        return;
    } 
    if(!username){
        showAlert("请先登录");
        return;
    }
    var postUrl="/ajax/commitHotel.php";  
    $.post(postUrl,  
        {hotelName:hotelName,
         hotelPhone:hotelPhone,
         hotelLocation:hotelLocation,
         hotelIntroduction:hotelIntroduction,
         username:username},
        function(data,status,xhr) {     
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){   
                    showAlert("提交成功","/about.html?p=shangjiaruzhu");
                 //   window.location.reload();
                } 
           }else{
                showAlert("服务器异常");
           }
       }); 
}