(function($){
    //是否已登录
    checkIfLogin();
    //解决IE的trim问题
    if(!String.prototype.trim) {
      String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g,'');
      };
    }
     //点击创建
    $('#register').click(function(){
        $('#loginform').hide();
        $('#registerform').fadeIn(300);
    });
    //点击登录
    $('#login').click(function(){ 
        $('#registerform').hide(); 
        $('#loginform').fadeIn(300);
    });
    //点击忘记密码
    $('#forget-password').click(function(){
        $('#loginform').hide(); 
        $('#chpwdform').fadeIn(300);
    });
    //点击返回
    $('#back-login').click(function(){
        $('#chpwdform').hide();  
        $('#loginform').fadeIn(300);
    });

    //点击顶部登录
    $('.header .login').click(function(){
         $('#registerform').hide();
         $('#chpwdform').hide();
         $('#loginform').show();
    });
  

    //注册账号
    $('#create').click(function(){ 
        var phone=$('#phone-2').val().trim();
        var code=$('#register-confirm-code').val().trim();
        var code2=$('#register-hid-code').val().trim();
        var pwd=$('#register-pwd').val().trim();
        $('#register-phone-error,#register-code-error,#register-pwd-error,#register-code-error').text("");
        if(phone==""){ 
            $('#register-phone-error').text('手机号不能为空');
            return;
        }
        if(code==""){ 
            $('#register-code-error').text('验证码不能为空');
            return;
        }
        if(pwd==""){
            $('#register-pwd-error').text('密码不能为空');
            return;
        }  
        var md5Code=$.md5(code);
        if(md5Code!=code2){
            $('#register-code-error').text('验证码不正确');
            return;
        }
        create(phone,pwd,code);
    });

    //登录账号
    $('#checkin').click(function(event){ 
          if (event && event.preventDefault) {//如果是FF下执行这个 
                event.preventDefault(); 
            }else{  
                window.event.returnValue = false;//如果是IE下执行这个 
            }
        
        var phone=$('#phone-1').val().trim(); 
        var pwd=$('#login-pwd').val().trim(); 
        $('#login-phone-error,#login-pwd-error').text("");
        if(phone==""){ 
            $('#login-phone-error').text('手机号不能为空');
            return;
        }
        if(pwd==""){
            $('#login-pwd-error').text('密码不能为空');
            return;
        }
        checkin(phone,pwd);
    });

    //忘记密码
    $('#chpwd').click(function(event) {
        var phone=$('#phone-3').val().trim();
        var code=$('#chpwd-confirm-code').val().trim();
        var code2=$('#chpwd-hid-code').val().trim();
        var pwd=$('#chpwd-pwd').val().trim(); 
        $('#chpwd-phone-error,#chpwd-pwd-error,#chpwd-code-error').text("");
        if(phone==""){ 
            $('#chpwd-phone-error').text('手机号不能为空');
            return;
        }
        if(code==""){ 
            $('#chpwd-code-error').text('验证码不能为空');
            return;
        }  
        var md5Code=$.md5(code);
        if(md5Code!=code2){
            $('#chpwd-code-error').text('验证码不正确');
            return;
        }
        if(pwd==""){
            $('#chpwd-pwd-error').text('密码不能为空');
            return;
        }
        chpwd(phone,pwd);
    });

    //注册验证码
    $('#register-code').click(function(){
        //合法性
        var phone=$('#phone-2').val().trim();
        $('#register-phone-error').text("");
        if(phone==""){ 
            $('#register-phone-error').text('手机号不能为空');
            return;
        }else if(isNaN(phone)){
            $('#register-phone-error').text('手机号格式不正确');
            return;
        }else if(phone.length!=11){
            $('#register-phone-error').text('请输入11位手机号');
            return;
        } 
        //倒计时
        setCodeTime(); 
        getCode(phone);
    });

    //忘记密码的验证码
    $('#chpwd-code').click(function(){
        //合法性
        var phone=$('#phone-3').val().trim();
        if(phone==""){ 
            $('#chpwd-phone-error').text('手机号不能为空');
            return;
        }else{
            $('#chpwd-phone-error').text("");
        }
        //倒计时
        setCodeTime(); 
        getCode(phone);
    });

    //点击退出
    $('#sub-logout').click(function(event) { 
       event.preventDefault();  
        logout();
    });
    

    
})(jQuery);


var leftSeconds=60;
function setCodeTime(){  
    $('.phone-code-btn').attr('disabled',"true");
    $('.phone-code-btn').text(leftSeconds+"s");
    leftSeconds--;
    if(leftSeconds<0){
        leftSeconds=60;
        $('.phone-code-btn').text("重新获取");
        $('.phone-code-btn').removeAttr("disabled");
    }else{
        setTimeout("setCodeTime()", 1000); 
    }
}

function create(phone,pwd,code){ 
    var postUrl='/ajax/create.php';

       $.post(postUrl, 
        {
            username:phone,
            password:pwd,
            code:code
        }, 
        function(data, status, xhr) { 
           if(status=="success"){ //注册成功
                $res= $.parseJSON(data); 
                if($res.code=="0"){  
                    $('.close-reveal-modal').trigger('click');
                    $.cookie('userId',phone,{expires:30,path:'/'});//写cookie
                    var userId=$.cookie('userId');
                    $('#header-user').html('hi，'+userId);
                    $('#header-user').show();
                    $('#header-login').hide(); 
                    $('#user').show();
                    //加载我的信息
                    loadMyInfo();
                }else if($res.code=="1"){
                    alert($res.msg);
                }else if($res.code=="2"){
                    $('#register-phone-error').text('该用户已注册');
                }
           }else{
                alert("服务器异常");
           }
       });
}

function checkin(phone,pwd){

    var postUrl='/ajax/checkin.php'; 
       $.post(postUrl, 
        {username:phone,
         password:pwd}, 
        function(data, status, xhr) { 
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){  //登录成功
                    $('.close-reveal-modal').trigger('click');
                    $.cookie('userId',phone,{expires:30,path:'/'});//写cookie
                    var userId=$.cookie('userId');
                    $('#header-user').html('hi，'+userId);
                    $('#header-user').show();
                    $('#header-login').hide(); 
                    $('#user').show();
                    //加载我的信息
                    loadMyInfo();
                }else if($res.code=="1"){
                    $('#login-phone-error').text('该用户不存在');
                }else if($res.code=="2"){ 
                    $('#login-pwd-error').text('密码错误');
                }
           }else{
                alert("服务器异常");
           }
       });
}

function chpwd(phone,pwd){
    var postUrl='/ajax/chpwd.php'; 
       $.post(postUrl, 
        {username:phone,
         password:pwd}, 
        function(data, status, xhr) {
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){  
                    $('.close-reveal-modal').trigger('click');
                }else if($res.code=="1"){
                    alert($res.msg);
                }
           }else{
                alert("服务器异常");
           }
       });
}

//获取验证码
function getCode(pn){
    var postUrl="/ajax/getCode.php";
    $.post(postUrl, 
        {phone:pn}, 
        function(data, status, xhr) {
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){  
                    //放到隐藏域
                     $('#register-hid-code,#chpwd-hid-code').val($res.msg);
                }else if($res.code=="1"){
                    alert($res.msg);
                }
           }else{
                alert("服务器异常");
           }
       });
}

function checkIfLogin(){ 
    var postUrl="/ajax/checkLogin.php";
    $.post(postUrl, 
        '', 
        function(data, status, xhr) {  
           if(status=="success"){   
                $res= $.parseJSON(data); 
                if($res.code=="0"){ //已登录 
                    var userId=$.cookie('userId'); 
                    $('#header-login').hide();
                    $('#user').show();
                }else if($res.code=="1"){ //未登录 
                    $('#user').hide();
                    $('#header-login').show();
                }
           }else{
                alert("服务器异常");
           }
       });
}

function logout(){
    var postUrl="/ajax/logout.php";  
    $.post(postUrl,  
        {},
        function(data,status,xhr) {   
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){ //退出成功 
                      $.removeCookie('userId',{expires:7,path:'/'});//删除cookie 

                      location.reload();
                } 
           }else{
                alert("服务器异常");
           }
       }); 

}

//加载基本信息
function loadMyInfo(){
     var username=$.cookie('userId');
    if(username){ 
        var postUrl="/ajax/loadMyInfo.php";   
        //开始加载
        $.post(postUrl,  
        {username:username},
        function(data,status,xhr) {     
           if(status=="success"){  
                $res= $.parseJSON(data); 
                if($res.code=="0"){  
                   my_SaveValue("userId",$res.data['username']);
                   my_SaveValue("pn",$res.data['phone']);
                   my_SaveValue("name",$res.data['name']);
                   my_SaveValue("place",$res.data['building']);
                   my_SaveValue("block",$res.data['block']);
                   my_SaveValue("floor",$res.data['floor']);
                   my_SaveValue("jifen",$res.data['jifen']);
                   my_SaveValue("email",$res.data['email']);
                } 
           }else{
                alert("服务器异常");
           }
       }); 
    }
}