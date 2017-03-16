<html><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-cn">
<title>微信支付</title>
<script>document.domain="qcloud.com";</script>
<link href="//qzonestyle.gtimg.cn/open_proj/proj_qcloud_v2/css/shop_cart/wechat_pay.css?v=201605201" rel="stylesheet" media="screen">
</head>
<body>
<script>
var PTLOGIN_DOMAIN="http://ui.ptlogin2.qcloud.com",
    WIKI_DOMAIN="http://wiki.qcloud.com",
    SUPPORT_DOMAIN="http://exp.qq.com/ur/?urid=13383",
    BBS_DOMAIN="http://bbs.qcloud.com",
    OPEN_DOMAIN="http://open.qq.com",
    OP_OPEN_DOMAIN="http://op.open.qq.com",
    WIKI_OPEN_DOMAIN="http://wiki.open.qq.com",
    MANAGE_DOMAIN="http://manage.qcloud.com",
    MAIN_DOMAIN="http://www.qcloud.com",
    CAPI_DOC_DOMAIN="http://doc.qcloud.com",
    MONITOR_DOMAIN="https://cm.qcloud.com",
    COOKIE_DOMAIN=".qcloud.com",
    CSS_DOMAIN="//qzonestyle.gtimg.cn/open_proj/qcloud",
    CSS_DOMAIN_NEW="//qzonestyle.gtimg.cn/open_proj/proj_qcloud_v2",
    JS_DOMAIN='//qzonestyle.gtimg.cn',
    MOBILESPEEDUP_DOMAIN="https://mna.qcloud.com";
var JS_ONLINE_FLAG = ("1"==="1"),
    cur_uin=0,
    vcodeUrl="http://captcha.qcloud.com/getimage/vcode_sig/?appid=543009503";
</script>
<div class="body">
    <h1 class="mod-title">
        <span class="ico-wechat"></span><span class="text">微信支付</span>
    </h1>
    <div class="mod-ct">
        <div class="order">
        </div>
        <div class="amount">￥68.00</div>
        <div class="qr-image" style="">
            <img style="width:230px;height:230px;" id="billImage" src="data:image/jpg;base64,iVBORw0KGgoAAAANSUhEUgAAAKsAAACrAQMAAAAjJv5aAAAABlBMVEX///8AAABVwtN+AAACtUlEQVRIie2WvY3kMAyFaShQJjcgQG04U0ueBvzTgN2SMrUhwA3YmQLBvKfxzu3hLjkqXmOS/byQRfLxkUQ/z79Pz7xn5lAMlVFb4/mWY0Nqj6mLjvOxDOoeQOTYH3s8mN0aqA9pGnhrw+w2rxbiK9uxFa/RLR7HH4smasOkNsKRCNHOePMdvAAj39twfP++yyDA9dF2DmoZeI00/lH9/8d94DXbjhWiXLNatLvl2AzlFWrdcLtTF4PiyzFptXKao7uYr1j6zA3YUCJvJ1LnABnW7yxy3GUHsHgcXwOFnO8WTD1Atrjppg9c85RjqgcfVygTFERQgSU5Nt52IXVcJio9chZ4keMO4iWFZupjmggfUQ24/qV50dCOnbyl4UmVDBsN4TCagNk+32nAiG/0ChK+ou1zQmu24Fwt4RWYo9sGaPDY5BgCHGvdCmnew3H6RHKMvrx9Mt4hzD1Ahk/RZLjjBLu66/FuzzTRc7YQ52MPZa7ui8onM3xSJcHQncHBxAv6Ei+JW3CsUUK/nN2tEWUZ5fjdDcVoO3qaIKKPzYhwXwuFPPEJv9RgrgGTLjTAIZByBl7DlyBEuM9qD/B+WJ1bNIzzMTwZ7jIWhNJFXBMTUq2BNzl+l7o2AUf4FnXhM0kkGK5JsJlaNDviguHTaTLMUDGWhYsteRjGU3kZNkOa83Eh35ixkev2Icc4+4oJUwjzeY61vRY5Nj69Mtc5wOitA/8yyjESvGYEh33BoWjA1ICZXgxjcDfkjHGdMVLEGBq8MgwGWxi0rHZuwe83mKhwCHQDnOb3AiXA2MJWJoRY5wnwkIwcv3dkbNlIOYHh7K0BeyiX35spbKbup2cTRpo505xrK9yf5UyMoaBQrfequ9iTPiFGlBmLGNYNrO0JE/uU47ojY6BVszk41GRPcvzz/P38AhirpVZ6j8auAAAAAElFTkSuQmCC">
        </div>
        <!--detail-open 加上这个类是展示订单信息，不加不展示-->
        <div class="detail detail-open" id="orderDetail" style="">
            <dl class="detail-ct" style="display: block;">
                <dt>商家</dt>
                <dd id="storeName">腾讯云</dd>
                <dt>商品名称</dt>
                <dd id="productName">912750350账户充值</dd>
                <dt>交易单号</dt>
                <dd id="billId">20160904010000022476570553059860</dd>
                <dt>创建时间</dt>
                <dd id="createTime">2016-09-04 16:24:51</dd>
            </dl>
            <a href="javascript:void(0)" class="arrow"><i class="ico-arrow"></i></a>
        </div>
        <div class="tip">
            <span class="dec dec-left"></span>
            <span class="dec dec-right"></span>
            <div class="ico-scan"></div>
            <div class="tip-text">
                <p>请使用微信扫一扫</p>
                <p>扫描二维码完成支付</p>
            </div>
        </div>
     </div>

    <div class="foot">
        <div class="inner">
            <p>您若对上述交易有疑问</p>
            <p>请联系腾讯云企业QQ <a href="javascript:void(0);" class="link">800033878</a></p>
        </div>
    </div>

</div>
<script>
 document.write(['<script src="//qzonestyle.gtimg.cn/c/=/open/qcloud/jquery-1.7.1.min.js,/open/qcloud/qcloud_util.js?v=201605201"><\/script>'].join(''));
</script><script src="//qzonestyle.gtimg.cn/c/=/open/qcloud/jquery-1.7.1.min.js,/open/qcloud/qcloud_util.js?v=201605201"></script><div style="width:720px;height:380px;display:none;"><div id="video-dialog"></div><a href="javascript:void(0);" onclick="return false;" style="position:absolute;right:-25px;top:-20px;" id="close_video_btn" class="ico-video-close"></a></div>

<script>
var rechargedata={"retcode":0,"data":{"uin":912750350,"ownerUin":912750350,"storeName":"\u817e\u8baf\u4e91","productName":"912750350\u8d26\u6237\u5145\u503c","QRCode":"iVBORw0KGgoAAAANSUhEUgAAAKsAAACrAQMAAAAjJv5aAAAABlBMVEX\/\/\/8AAABVwtN+AAACtUlEQVRIie2WvY3kMAyFaShQJjcgQG04U0ueBvzTgN2SMrUhwA3YmQLBvKfxzu3hLjkqXmOS\/byQRfLxkUQ\/z79Pz7xn5lAMlVFb4\/mWY0Nqj6mLjvOxDOoeQOTYH3s8mN0aqA9pGnhrw+w2rxbiK9uxFa\/RLR7HH4smasOkNsKRCNHOePMdvAAj39twfP++yyDA9dF2DmoZeI00\/lH9\/8d94DXbjhWiXLNatLvl2AzlFWrdcLtTF4PiyzFptXKao7uYr1j6zA3YUCJvJ1LnABnW7yxy3GUHsHgcXwOFnO8WTD1Atrjppg9c85RjqgcfVygTFERQgSU5Nt52IXVcJio9chZ4keMO4iWFZupjmggfUQ24\/qV50dCOnbyl4UmVDBsN4TCagNk+32nAiG\/0ChK+ou1zQmu24Fwt4RWYo9sGaPDY5BgCHGvdCmnew3H6RHKMvrx9Mt4hzD1Ahk\/RZLjjBLu66\/FuzzTRc7YQ52MPZa7ui8onM3xSJcHQncHBxAv6Ei+JW3CsUUK\/nN2tEWUZ5fjdDcVoO3qaIKKPzYhwXwuFPPEJv9RgrgGTLjTAIZByBl7DlyBEuM9qD\/B+WJ1bNIzzMTwZ7jIWhNJFXBMTUq2BNzl+l7o2AUf4FnXhM0kkGK5JsJlaNDviguHTaTLMUDGWhYsteRjGU3kZNkOa83Eh35ixkev2Icc4+4oJUwjzeY61vRY5Nj69Mtc5wOitA\/8yyjESvGYEh33BoWjA1ICZXgxjcDfkjHGdMVLEGBq8MgwGWxi0rHZuwe83mKhwCHQDnOb3AiXA2MJWJoRY5wnwkIwcv3dkbNlIOYHh7K0BeyiX35spbKbup2cTRpo505xrK9yf5UyMoaBQrfequ9iTPiFGlBmLGNYNrO0JE\/uU47ojY6BVszk41GRPcvzz\/P38AhirpVZ6j8auAAAAAElFTkSuQmCC","billId":"20160904010000022476570553059860","createTime":"2016-09-04 16:24:51","amount":6800,"payChoice":"wechatpay","attach":"{\"uin\":\"912750350\",\"ownerUin\":\"912750350\",\"dealIds\":[2173561],\"from\":\"newPayPage\",\"rechargeForDeal\":1,\"payMode\":1}","payMode":1,"rechargeForDeal":0,"dealIds":[]}};
if(!rechargedata){
    $('.amount').html('充值异常请稍后重试！');
}
if(rechargedata.retcode!=0){
    $('.amount').html(rechargedata.errmsg||"充值异常请稍后重试");
}else{
    if(rechargedata.data && parseFloat(rechargedata.data.amount) > 0 && rechargedata.data.billId){
        $('#orderDetail .arrow').click(function(event){
            if($('#orderDetail').hasClass('detail-open')){
                $('#orderDetail .detail-ct').slideUp(500,function(){
                    $('#orderDetail').removeClass('detail-open');
                });
            }else{
                $('#orderDetail .detail-ct').slideDown(500,function(){
                    $('#orderDetail').addClass('detail-open');
                });
            }
        });
        var amount = rechargedata.data.amount;
        var storeName = rechargedata.data.storeName;
        var productName = rechargedata.data.productName;
        var billId = rechargedata.data.billId;
        var createTime = rechargedata.data.createTime;
        var qrCode = rechargedata.data.QRCode;
        var attach = rechargedata.data.attach;
        try{
            attach = decodeURIComponent(attach);
            attach = $.evalJSON(attach);
        }catch(e){
            attach = '';
        }
        var payMode = rechargedata.data.payMode;
        var amountForYuan = amount/100;
        $('.amount').html('￥'+amountForYuan.toFixed(2));
        $('#storeName').html(storeName);
        $('#productName').html(productName);
        $('#billId').html(billId);
        $('#createTime').html(createTime);
        $('#billImage').attr('src','data:image/jpg;base64,'+qrCode);
        $('#billImage').parent().show();
        $('#orderDetail').show();
        var timer = setInterval(function(){
            $.jsonGetter({
                url: "/ajax/deal/getBillStatus.php?from=qcloud",
                data: {'billId':billId},
                sucCb: function(ret) {
                    if(ret.data.billStatus == 3){//支付完成跳转
                        clearInterval(timer);
                        if(attach && attach.rechargeForDeal){
                            if (attach.from && attach.from == 'newPayPage') {
                                setTimeout(function() {
                                    location.href= 'https://buy.qcloud.com/order/done?from=rechargePage&billId='+billId+'&payMode='+payMode;
                                }, 5000);
                            } else {
                                location.href= '/deal/rechargeSucc.php?payMode='+payMode+'';
                            }
                        }else{
                            if(attach && attach.itemDetails){
                                var form=$("<form></form>").attr({
                                    'action':'/deal/dealsConfirmDirect.php',
                                    'target':'_self',
                                    'method':'post',
                                }).appendTo($("body"));
                                
                                $("<input type='hidden'>").attr({
                                    'name':'itemDetails',
                                    'value':attach.itemDetails
                                }).appendTo(form);
                                $("<input type='hidden'>").attr({
                                    'name':'isRechargeReturn',
                                    'value':1
                                }).appendTo(form);
                                form.submit();
                            }else if(attach && attach.dealIds){
                                var params = 'isRechargeReturn=1&payMode='+payMode;
                                for(var i=0;i<attach.dealIds.length;i++){
                                    params += '&dealList[]='+attach.dealIds[i];
                                }
                                window.location.href = '/deal/dealsConfirm.php?'+params+'';
                            }else if(attach && attach.showPage == 20) {
                                $.cookie('userRechargeResult', 1, {'domain':COOKIE_DOMAIN,'path':'/'});
                                location.href= 'https://console.qcloud.com/account/recharge?amount='+parseInt(amountForYuan);
                            }else{
                                $.cookie('userRechargeResult', 1, {'domain':COOKIE_DOMAIN,'path':'/'});
                                location.href= 'http://manage.qcloud.com/account/account.php#act=recharge';
                            }
                        }
                    }
                },
                errCb: function(ret) {
                }
            });
        },3000);
    }else{
        $('.amount').html('充值参数异常请稍后重试！');
    }
}
</script>
</body></html>