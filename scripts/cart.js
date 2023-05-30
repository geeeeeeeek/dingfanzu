(function($){
    //购物车总高
    var zh=$(window).height();
    var zw=$(window).width();
    var shopHeight=zh-100;
    $(".shop-body").height(shopHeight);
    var mRight='0px'; 
     
    //默认显示购物车
    $(".shop-cart").css("right","0px");
    $(".shop-bottom").css("right","0px");


    //购物车相关
    setTotalPrice();
    //清空购物车
    $(document).on('click','.shop-clear',function(){
        clearCart();
    });
    //加
    $(document).on('click','.plus',function(){
        var itemId=$(this).parents('.shop-item').attr('item-id');
        addCart(itemId);
    }); 
    //减
    $(document).on('click','.minus',function(){
        var itemId=$(this).parents('.shop-item').attr('item-id');
        deleteCart(itemId);
    }); 

    //飞入购物车
    $('.buy').click(function(e){
        var itemId=$(this).parents(".menu-item").attr("item-id"); 
        var explorer =navigator.userAgent ;  
        var startX;
        var startY;
        var spd;
        if (explorer.indexOf("MSIE") >= 0) {  //ie
             startX=e.clientX+12;
             startY=e.clientY-10; 
             spd=1.5;
        }else if(explorer.indexOf("Firefox") >= 0){ //Firefox
             startX=e.clientX;
             startY=e.clientY; 
             spd=1.2;
        }else{ //其他 
             startX=e.originalEvent.x;
             startY=e.originalEvent.y; 
             spd=1.2;
        }
        fly(startX,startY,itemId,spd);//飞入动画
        
    });

    //结算按钮
    $('#cart-pay').click(function(event) {
        var userId=$.cookie('userId');
        if(userId){ //已登录
             location.href="/order_confirm.html";
        }else{ 
            $('#header-login').trigger('click');
        }
    });
    })(jQuery);
        
    //计算总价
    function setTotalPrice(){
        processShopItem();
        var tmp=0;
        $('.item-price label').each(function(){
            tmp=tmp+parseInt($(this).text());
        });
        $('.bottom-price label').text(tmp);
        if(tmp==0){
            $('.bottom-price label').hide();
            $('.bottom-price').text("购物车为空");
        }else{ 
            $('.bottom-price').text("总计：￥");
            $('.bottom-price').append("<label>"+tmp+"</label>");
        }
        //--------------处理空购物车------
        var lc=$('.shop-body').children('.shop-item-wrap').length;
        if(lc<1){
            $('.isnull').show();
            $('.bottom-price').css("width","100%");
            $('.bottom-pay').hide();//隐藏"结算"
        }else{
            $('.isnull').hide();
            $('.bottom-price').css("width","65%");
            $('.bottom-pay').show();//显示"结算"
        }
    }
    //飞入效果
    function fly(startX,startY,itemId,spd){
        var zh=$(window).height();
        var zw=$(window).width();

         
        var img = "images/round_24.png";
        var flyer = $('<img class="u-flyer" src="'+img+'">');
        flyer.fly({
            start: {
                left: startX-10,
                top: startY-10
            },
            end: {
                left:zw-$(".shop-cart").width()+10,
                top: zh-50, 
            }, 
            vertex_Rtop: startY-50,
            speed:spd,
            onEnd: function(){
                addCart(itemId);
                this.destory();
            }
        });
    }

    //初始化购物车
    function initCart(){ 
        var shopId=$.cookie('shopId');
        if(shopId){  
            var arrObj=selectAll(shopId);
            if(arrObj){
                for(var i=0;i<arrObj.length;i++){
                    var itemId=arrObj[i].itemId;
                    var name=hexToString(arrObj[i].name);
                    var count=arrObj[i].count;
                    var price=arrObj[i].price;
                    var price2=price*count;//单价*个数
                    var htmlTxt="<div class='shop-item-wrap'>"
                    +"<div class='shop-item' item-id='"+itemId+"'>"
                    +"<div class='item-name fl'>"
                    +name
                    +"</div>"
                    +"<div class='item-count fl'>"
                    +"<button class='minus'>-</button>"
                    +"<input type='text' value='"+count+"' "
                    +"readonly='readonly' maxlength='3'>"
                    +"<button class='plus'>+</button>"
                    +"</div>"
                    +"<div class='item-price fl' per-price='"+price+"'>"
                    +"￥<label>"+price2+"</label> "
                    +"</div>"
                    +"</div>"
                    +"</div>";
                    $('.shop-body').append(htmlTxt); 
                }
                //--------------底部总价---------
                setTotalPrice();
            }
            
        }
    }

    //添加购物车
    function addCart(itemId){ 
        //buy处的信息
        var obj1=$(".menu-item[item-id='"+itemId+"']");
        var price=obj1.find('.price').attr("item-price");
        var name=obj1.find('.name').text();

        //购物车处的信息
        var obj2=$(".shop-item[item-id='"+itemId+"']");
        //是否已存在
        if(!obj2.html()){
            var htmlTxt="<div class='shop-item-wrap'>"
                +"<div class='shop-item' item-id='"+itemId+"'>"
                +"<div class='item-name fl'>"
                +name
                +"</div>"
                +"<div class='item-count fl'>"
                +"<button class='minus'>-</button>"
                +"<input type='text' value='1' "
                +"readonly='readonly' maxlength='3'>"
                +"<button class='plus'>+</button>"
                +"</div>"
                +"<div class='item-price fl' per-price='"+price+"'>"
                +"￥<label>"+price+"</label> "
                +"</div>"
                +"</div>"
                +"</div>";
            $('.shop-body').append(htmlTxt); 

        } else{
            //-------------个数--------------- 
            var t=obj2.find('.item-count input');
            var count=parseInt(t.val())+1;
            t.val(count);
            //-------------单价---------------
            var perPrice=obj2.find('.item-count').siblings('.item-price').attr("per-price");
            //-------------总价---------------
            var price=obj2.find('.item-count').siblings('.item-price').find('label');
            price.text(count*perPrice);
        }
        //--------------底部总价---------
        setTotalPrice();
        //加到cookie
        var shopId=$.cookie('shopId');
        if(shopId){  
            plusItem(shopId,itemId,name,1,price);
        }
    }

    function deleteCart(itemId){
        //购物车处的信息
        var obj=$(".shop-item[item-id='"+itemId+"']");
        var t=obj.find('.item-count input');
        var count=parseInt(t.val())-1;
        if(count<0)count=0;
        t.val(count);
        //-------------单价---------------
        var perPrice=obj.find('.item-count').siblings('.item-price').attr("per-price");
        //-------------总价---------------
        var price=obj.find('.item-count').siblings('.item-price').find('label');
        price.text(count*perPrice);
        //--------------处理0的情况------
        if(count==0){
            obj.parents('.shop-item-wrap').remove();
        } 
        //--------------底部总价---------
        setTotalPrice();
        //减到cookie
        var shopId=$.cookie('shopId');
        if(shopId){   
            minusItem(shopId,itemId);
        }
    }

    function clearCart(){
        //清界面
        $('.shop-item-wrap').remove();
        setTotalPrice();
        //清空cookie
        var shopId=$.cookie('shopId');
        if(shopId){    
            removeAllItem(shopId);
        }
    }


    //适配购物车
    function processShopItem(){
        var shopItemWidth=$(".shop-item").width();
        var itemCountWidth=$(".item-count").width();
        var itemPriceWidth=$(".item-price").width();
        var itemNameWidth=shopItemWidth-itemCountWidth-itemPriceWidth-2;

        $(".item-name").width(itemNameWidth);
    }

