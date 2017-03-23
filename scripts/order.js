(function($){
    checkIfLogin(); 
         

    //初始化商家信息
    initShopInfo();
    //初始化订单
    initOrder();
    //初始化地址
    initAddress();
    //初始化支付方式
    initPayMethod();  
    //初始化积分
    initJifen();
    //初始化送达时间
    initArrivedTime();
    //计算实付价格
    initPayPrice();
    //保存地址
    $('.save-btn').click(function() {
        saveAddress();
    });
    //提交订单
    $('.commit-btn').click(function(event) {

        var paymethod=my_GetValue("paymethod"); 
        
        var price=$('.checkout-bottom-price').text();   //总价 
        var orderArrivedTime=$('.select-arrived-time').val(); //到货时间
        var orderRemark=$('.liuyan-txt').val(); //留言
        //存必要信息
        my_SaveValue("price",price);
        my_SaveValue("orderArrivedTime",orderArrivedTime);
        my_SaveValue("orderRemark",orderRemark);

        //货到付款，则当页提交
        if(paymethod==2){
            commitOrder();
            return;
        }
        //否则跳转到支付页
        $(this).attr("href","/pay.php");
    });

    //支付方式切换
    $(".checkout-pay").click(function() {
        if($(this).hasClass('disabled')){ 
            $(this).removeClass('disabled');
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            $(this).siblings().addClass('disabled');
        }
        //存cookie
        if($('.weixin-pay').parent().hasClass('active')){
            my_SaveValue("paymethod","0"); 
        }else if($('.alipay-pay').parent().hasClass('active')){
            my_SaveValue("paymethod","1"); 
        }else if($('.no-pay').parent().hasClass('active')){ 
            my_SaveValue("paymethod","2"); 
        }
    });
})(jQuery);

function checkIfLogin(){
    var userId=$.cookie('userId');
    if(!userId){ 
        location.href="/place.html";//跳到首页
    }
}

//初始化商家信息
function initShopInfo(){
    var shopName=shop_GetValue("shopName");
    if(shopName){ 
        $(".info-place").html(shopName);
    }
}

//初始化购物车
function initOrder(){ 
    var shopId=shop_GetValue("shopId"); 
    if(shopId){  
        var arrObj=selectAll(shopId);
        if(arrObj&&arrObj.length>0){
            var price3=0;
            var count2=0;
            var htmlTxt="<li class='checkout-tablerow'>"
                +"<div class='cell itemname'>$name</div>"
                +"<div class='cell itemquantity'>$count</div>"
                +"<div class='cell itemtotal'>￥$price</div></li>";  
            for(var i=0;i<arrObj.length;i++){
                var itemId=arrObj[i].itemId;
                var name=hexToString(arrObj[i].name);
                var count=arrObj[i].count;
                var price=arrObj[i].price;
                var price2=price*count;//单价*个数
                price3+=price2;
                count2+=count;

                var newTxt=htmlTxt.replace("$name",name).replace("$count",count).replace("$price",price2); 

                $('.checkout-body').append(newTxt); 
            }
            //合计
           var newTxt=htmlTxt.replace("$name","合计").replace("$count",count2).replace("$price",price3);  
                $('.checkout-body').append(newTxt); 
            
        }else{
            window.location.href="/shop/"+shopId;
        }
        
    }
}




//初始化地址
function initAddress(){

    var pn=my_GetValue("pn");
    var name=my_GetValue("name");
    var place=my_GetValue("place");
    var addressDetail=my_GetValue("address-detail"); 

 
    //初始化place选择器
    var shopName=shop_GetValue("shopName");
    if(shopName!=place){//新商家时
        $("#place").html(shopName);
        return;
    }else{
        $("#place").html(place);
    }

    if(!addressDetail){
        return; //没写地址详情
    }


    if(!pn)return; 
    $('#address-name').val(name);
    $('#address-pn').val(pn);
    $('#place').text(place); 
    $('#address-detail').val(addressDetail);
    var address=name+" "+pn+" "+place+addressDetail; 
    $('.address-npa').html(address); 
    $('.close-reveal-modal').click();
    $('.checkout-address').show();
    $('.checkout-noaddress').hide();
}

function initPayMethod(){ 
        //拿cookie
        var pm=my_GetValue("paymethod");
        if(pm){
            if(pm=="0"){
                $('.weixin-pay').parent().removeClass('disabled').addClass('active');
                $('.alipay-pay,.no-pay').parent().removeClass('active').addClass('disabled'); 
            }else if(pm=="1"){
                $('.alipay-pay').parent().removeClass('disabled').addClass('active');
                $('.weixin-pay,.no-pay').parent().removeClass('active').addClass('disabled');
            }else if(pm=="2"){
                $('.no-pay').parent().removeClass('disabled').addClass('active');
                $('.weixin-pay,.alipay-pay').parent().removeClass('active').addClass('disabled'); 
            }
        } else{
            $('.weixin-pay').parent().removeClass('disabled').addClass('active');
            $('.alipay-pay,.no-pay').parent().removeClass('active').addClass('disabled');
        }
}

function initJifen(){
    var jifen=my_GetValue("jifen");
    $('.jifen-label').text("我的积分："+jifen);
    var xianjin=parseInt(jifen/100,10);
    $('.jifen-value').text("积分抵现：￥"+xianjin); 
}

//初始化送达时间
function initArrivedTime(){
    var myDate = new Date(); 
    var h=myDate.getHours();     
    var m=myDate.getMinutes();
    if(m>=30){
        h=h+1; 
        $(".select-arrived-time").append("<option value='"+h+":00-"+h+":30' >"+h+":00-"+h+":30</option>");
        $(".select-arrived-time").append("<option value='"+h+":30-"+(h+1)+":00' >"+h+":30-"+(h+1)+":00</option>");
    } else if(m<30){ 
        $(".select-arrived-time").append("<option value='"+h+":30-"+(h+1)+":00' >"+h+":30-"+(h+1)+":00</option>");
        $(".select-arrived-time").append("<option value='"+(h+1)+":00-"+(h+1)+":30' >"+(h+1)+":00-"+(h+1)+":30</option>");
    }
}

//计算实付价格
function initPayPrice(){
    var username=my_GetValue("userId");
    var shopId=shop_GetValue("shopId");
    if(shopId){  
        var arrObj=selectAll(shopId);
        if(arrObj&&arrObj.length>0){ 
            var itemsTxt=JSON.stringify(arrObj);
            var postUrl="/ajax/getPayPrice.php";  
            $.post(postUrl,  
                {
                    username:username,
                    shopId:shopId,
                    itemsTxt:itemsTxt},
                function(data,status,xhr) {   
                   if(status=="success"){   
                        $res= $.parseJSON(data); 
                        if($res.code=="0"){  
                            //实付
                            $(".checkout-bottom-price").html($res.payPrice);
                        }else if($res.code=="1"){
                           alert("获取实付价格失败,请刷新页面");
                        } 
                   }else{
                        alert("服务器异常,请刷新页面");
                   }
               }); 
        }
    } 
}

//保存地址
function saveAddress(){
    var address="";
    var name=$('#address-name').val().trim();
    var pn=$('#address-pn').val().trim();
    var place=$('#place').text();
    var addressDetail=$('#address-detail').val().trim(); 
    
    $('#error-name,#error-pn,#error-detail').text("");
    //验证合法性
    if(name==""){
        $('#error-name').text("请输入姓名");
        return;
    } 
    if(pn==""){
        $('#error-pn').text("请输入手机号");
        return;
    } 
    if(addressDetail==""){
        $('#error-detail').text("请输入详细地址");
        return;
    }


    address=name+"   "+pn+"   "+place+addressDetail; 
    
    $('.address-npa').html(address); 
    $('.close-reveal-modal').click();
    $('.checkout-noaddress').hide();
    $('.checkout-address').show();
    saveUserInfo(pn,name,place,addressDetail);//同步到远程
}

function saveUserInfo(pn,name,place,addressDetail){
    $username=$.cookie('userId');
    if(!$username){
        alert("用户未登录");
        return;
    }
    var postUrl="/ajax/saveUserInfo.php";  
    $.post(postUrl,  
        {
            username:$username,
            pn:pn,
            name:name,
            place:place,
            addressDetail:addressDetail
        },
        function(data,status,xhr) {   
           if(status=="success"){   
                $res= $.parseJSON(data); 
                if($res.code=="0"){ 
                    my_SaveValue("pn",pn);
                    my_SaveValue("name",name);
                    my_SaveValue("place",place);
                    my_SaveValue("address-detail",addressDetail); 

                }else if($res.code=="1"){
                    alert("保存失败");
                } 
           }else{
                alert("服务器异常,请重试");
           }
       }); 
}

//提交订单
function commitOrder(){ 

    var postUrl="/ajax/commitOrder.php";
    var username=$.cookie('userId'); 
    var shopId=shop_GetValue("shopId");
    var shopName=shop_GetValue("shopName");
    var shopPhone=shop_GetValue("shopPhone");
    var price=my_GetValue("price"); //价格

    var pn=my_GetValue('pn');
    var name=my_GetValue('name');
    var place=my_GetValue('place');
    var block=my_GetValue('block');
    var floor=my_GetValue('floor');
    var paymethod=my_GetValue('paymethod');

    var orderAddress=getAddress(place,block,floor);
    var orderArrivedTime=my_GetValue("orderArrivedTime");
    var orderRemark=my_GetValue("orderRemark"); 


    if(shopId){  
        var arrObj=selectAll(shopId);
        if(arrObj&&arrObj.length>0){ 
            var itemsTxt=JSON.stringify(arrObj); 
            $.post(postUrl,  
            {
                username:username,
                items:itemsTxt,
                shopId:shopId,
                shopName:shopName,
                shopPhone:shopPhone,
                price:price,
                orderAddress:orderAddress,
                paymethod:paymethod,
                name:name,
                pn:pn,
                orderArrivedTime:orderArrivedTime,
                orderRemark:orderRemark
            },
            function(data,status,xhr) {    
                console.log("order===data："+data);
               if(status=="success"){  
                    $res= $.parseJSON(data); 
                    if($res.code=="0"){   
                         console.log("order===提交方式："+paymethod);
                         //清空购物车
                         removeAllItem(shopId);
                          if(paymethod==0){ //微信支付   
                             window.location.href="/weixinPay.php";//pay.php页才能执行
                         }else if(paymethod==1){ //支付宝支付 
                             window.location.href="/aliPay.php";  //pay.php页才能执行
                         }else if(paymethod==2){ //餐到付款 
                            window.location.href="/account/order";
                         }
                    }else if($res.code=="1"){
                        showAlert($res.msg); 
                    }
               }else{
                    showAlert("服务器异常");  
               }
           }); 
        }else{ 
            showAlert("已提交过该订单","/account/order"); 
        }
    }
}

function getAddress(place,block,floor){
    var address="";
    if(block){
        block=block+"座";
    }else{
        block="";
    }
    if(floor){
        floor=floor+"层";
    }else{
        floor="";
    }
    address=place+block+floor;
    return address;
}