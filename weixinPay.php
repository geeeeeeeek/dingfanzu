<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="scripts/jquery-1.8.3.js"></script>
        <script src="scripts/jquery.reveal.js"></script>
        <script src="scripts/jquery.cookie.js"></script>
        <link rel=stylesheet href="style/reset.css">
        <link rel=stylesheet href="style/common.css">
        <link rel=stylesheet href="style/base.css"> 
        <link rel=stylesheet href="style/header.css">
        <link rel=stylesheet href="style/footer_1.css"> 
        <link rel=stylesheet href="style/reveal.css">
        <link rel=stylesheet href="style/login.css">
        <link rel=stylesheet href="style/weixinPay.css">
        <title>订饭组</title>
    </head>
    <body>
        <!--header部分-->
        <div class="header shadow">
            <div class="search-result"> 
            </div>
            <div class="header-left fl">
                <div class="icon fl"></div>
                <a class="weixin-dingfan fw" href="#">微信订饭</a>
                <a class="logo" href="/"></a>
                <div class="search">
                <img class="search-icon" src="/images/icon_search.png" width="22" height="22">
                <input class="search-input" type="text" placeholder="请输入楼名" onkeypress="onKeySearch()">
                </div>
                <div class="clear"></div>
            </div>
            <div class="header-right fr">
                <div class="login fl">

                    <span class="header-operater">
                    <a href="/">外卖</a>
                    <a href="/account/order">我的订单</a>
                    <a href="/about.html?p=lianxiwomen">联系我们</a> 
                    </span> 
                    <a id="header-login" class="navBtn f-radius f-select n" data-reveal-id="myModal" data-animation="fade">
                    登录
                    </a>
                </div>
                <div id="cart" class="cart fr"> 
                    <img class="cart-icon" src="images/icon_cart_22_22.png">
                </div>
                <div id="user" class="user fr n">
                    <img class="user-icon" src="images/icon_my.png"> 
                </div> 
            </div> 
        </div>
        <div class="content-wrap">
            <div class="content">
                <div class="w-title">
                    <span class="w-title-left">使用微信支付：</span>
                    <span class="w-title-right">￥12.50</span>
                </div>
                <div class="w-qrcode">
                    <img src="/images/qrcode.png" width="250" height="250">
                </div>
                <div class="w-footer">
                    <img src="/images/w_footer.png" width="250">
                </div>
            </div>
        </div>

        <script src="scripts/common.js"></script>
        <script src="scripts/md5.js"></script>
        <script src="scripts/myInfo.js"></script>
        <script src="scripts/login.js"></script>
        <script src="scripts/header.js"></script>
        <script src="scripts/footer.js"></script>
    </body>

</html>