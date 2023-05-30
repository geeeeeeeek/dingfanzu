<?php 
require_once '../include.php';

//得到所有订单
$sql="select * from dfz_order ";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$orderBy="order by orderTime desc ";
$sql="select * from dfz_order  {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){ 
    //还没有订单
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="/scripts/jquery-1.8.3.js"></script>
        <script src="/scripts/jquery.reveal.js"></script>
        <script src="/scripts/jquery.cookie.js"></script>
        <link rel="icon" href="/images/favicon.ico" type="image/x-icon" /> 
        <!--[if lte IE 10]>
        <script src="scripts/requestAnimationFrame.js"></script>
        <![endif]-->
        <link rel=stylesheet href="/style/reset.css">
        <link rel=stylesheet href="/style/common.css">
        <link rel=stylesheet href="/style/base.css">
        <link rel=stylesheet href="/style/account.css">
        <link rel=stylesheet href="/style/header.css">
        <link rel=stylesheet href="/style/reveal.css">
        <link rel=stylesheet href="/style/login.css">
        <link rel=stylesheet href="/style/menu02.css">
        <link rel=stylesheet href="/style/order.css">
        <link rel=stylesheet href="/style/footer_2.css">
        <link rel=stylesheet href="/style/page.css">
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
                <input id="search-input" class="search-input" type="text" placeholder="请输入楼名" onkeypress="onKeySearch()">
                <span id="search-del" class="search-del">&times;</span> 
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
                    <img class="cart-icon" src="/images/icon_cart_22_22.png">
                </div>
                <div id="user" class="user fr n">
                    <img class="user-icon" src="/images/icon_my.png"> 
                </div> 
            </div> 
            
            <ul id="subnav" class="subnav subnav-shadow n">
                <li><a href="/account/setting" target="">账号设置</a></li>
                <li><a href="/account/order" target="">我的订单</a></li>
                <li><a href="/account/balance" target="">我的余额</a></li>
                <li><a href="/account/score" target="">我的积分</a></li>
                <li><a href="/account/address" target="">我的地址</a></li>
                <li><a id="sub-logout" href="" target="">退出</a></li>
            </ul>
        </div>
        <!--主体-->
        <div class="content">
            <!--左侧导航-->
            <div class="content-left fl">
                <div class="menu-left">
                    <dl>
                        <dt>个人中心</dt>
                        <dd class="menu-item active">
                            <span class="left-icon">
                                <img src="/images/icon_order.png" width="18px" height="18px">
                            </span>
                        <a href="order">我的订单</a>
                        </dd>
                        <dd class="menu-item">
                            <span class="left-icon">
                                <img src="/images/icon_address.png" width="18px" height="18px">
                            </span>
                        <a href="address">送餐地址</a>
                        </dd> 
                        <dd class="menu-item">
                            <span class="left-icon">
                                <img src="/images/icon_score.png" width="18px" height="18px">
                            </span>
                        <a href="score">我的积分</a>
                        </dd>
                        <dd class="menu-item">
                            <span class="left-icon">
                                <img src="/images/icon_balance.png" width="18px" height="18px">
                            </span>
                        <a href="balance">我的余额</a>
                        </dd>
                        <dd class="menu-item ">
                            <span class="left-icon">
                                <img src="/images/icon_settings.png" width="18px" height="18px">
                            </span>
                        <a href="setting">账户设置</a>
                        </dd>
                    </dl>
                </div>
            </div>
            <!--右侧内容-->
            <div class="content-right fl">
                <div class="summary fl">
                    <h3 class="summary-header">全部订单</h3>
                </div>
                <div class="order-content-wrap">

                <?php foreach($rows as $row):?>
                    <div class="order-content">
                        <div class="order-meal">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="3">
                                            <a href='/shop/<?php echo $row['shopId'];?>'  class="shop-name"><?php echo $row['shopName'];?></a>
                                            <p class="shop-info">
                                            <span class="phone-icon"></span>商家电话：<?php echo $row['shopPhone'];?>
                                            </p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  
                                     $arrObj=json_decode($row['items']);  
                                      foreach ( $arrObj as $obj ){
                                ?>
                                        <tr>
                                        <td><?php echo $obj->name;?></td>
                                        <td><?php echo $obj->count;?></td>
                                        <td class="text-right">￥<?php echo $obj->price; ?></td>
                                        </tr>
                                <?php     } 
                                ?>
                                    
                                </tbody>
                            </table>
                            <div class="order-price">
                                总价：<span class="ft-red">￥<?php echo $row['price'];?></span>
                            </div>
                            <div class="order-delivery">
                                <div class="receive-info">
                                    <span>订单编号：<?php echo $row['orderId'];?></span>
                                    <span>送餐地址：<?php echo $row['orderAddress'];?></span>
                                    <span>联系人：<?php echo $row['orderName'];?></span>
                                    <span>电话：<?php echo $row['orderPhone'];?></span>
                                    <span>送达时间：<?php echo $row['orderArrivedTime'];?></span>
                                    <span>备注信息：<?php echo $row['orderRemark'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="order-info">
                            <div class="delivery-info">
                                <div class="delivery-card ">
                                    <div class="card-header nick-selected">
                                        <div class="round">
                                        </div>
                                        <div class="line-through ">
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="status-msg">
                                            订单提交成功
                                        </div>
                                        <div class="prompt"> 订单号：<?php echo $row['orderId'];?>
                                        </div>
                                        <div class="time">
                                            <?php echo getDate01($row['orderTime']);
                                            //计算15分钟是否支付
                                            if($row['paymethod']!=2&&$row['pay']==0&&$row['received']==0){
                                                $nowTime=time();
                                                $dis=$nowTime-$row['orderTime'];
                                                if($dis>15*60){
                                                    $row['received']=4;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="delivery-card ">
                                    <div class="card-header nick-selected">
                                        <div class="round">
                                        </div>
                                        <?php echo  $row['received']!=0?"<div class=line-through></div>":"";?>  
                                    </div>
                                    <div class="card-body ">
                                        <div class="status-msg">
                                        <?php 
                                            if($row['paymethod']==2){
                                                echo "已提交订单";
                                            }else{
                                                echo  $row['pay']==0?"等待支付":"已支付";
                                            }
                                        ?> 
                                        </div>
                                        <div class="prompt"> 
                                        <?php 
                                            if($row['paymethod']==2){
                                                echo "等待商家接单";
                                            }else{
                                                echo  $row['pay']==0?"请在提交订单后15分钟内完成支付":"已支付，订单进行中";  
                                            }
                                        ?> 
                                        </div>
                                        <div class="time">
                                            <?php if($row['pay']==1){
                                                if($row['payTime']){
                                                    echo getDate01($row['payTime']);   
                                                }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div <?php echo  $row['received']==0?"class='delivery-card n'":"class='delivery-card'";?>>
                                    <div class="card-header nick-selected">
                                        <div class="round">
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="status-msg">
                                        <?php if($row['received']==1){
                                                echo "商家已接单";
                                            }
                                            elseif($row['received']==2){
                                                echo "商家拒绝接单";
                                            }
                                            elseif ($row['received']==3) {
                                                echo "订单完成";
                                            } 
                                            elseif ($row['received']==4) {
                                                echo "订单取消";
                                            } 
                                            elseif ($row['received']==5) {
                                                echo "订单取消";
                                            }
                                        ?>  
                                        </div>
                                        <div class="prompt"> 
                                        <?php if($row['received']==1){
                                                echo "请您耐心等待";
                                            }
                                            elseif($row['received']==2){
                                                echo "商家忙碌，无法接单";
                                            }
                                            elseif ($row['received']==3) {
                                                echo "订单完成，欢迎下次再来";
                                            }
                                            elseif ($row['received']==4) {
                                                echo "未支付，订单自动取消";
                                            }
                                            elseif ($row['received']==5) {
                                                echo "用户取消订单";
                                            }
                                         ?>  
                                        </div>
                                        <div class="time">
                                            <?php if($row['received']!=0){
                                                if($row['receivedTime']){
                                                    echo getDate01($row['receivedTime']);
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="order-operator " >
                                    <div class="operator-btns">
                                        <?php 
                                        if($row['paymethod']!=2&&$row['pay']==0&&$row['received']==0){
                                            echo "<a class=pay-btn onclick=orderPay(".$row['orderId'].",".$row['orderTime'].")>支付</a><a class=pay-btn onclick=orderCancel(".$row['orderId'].",'".$row['username']."')>取消</a>";
                                        }else if($row['paymethod']==2&&$row['received']==0){
                                            echo "<a class=pay-btn onclick=orderCancel(".$row['orderId'].",'".$row['username']."')>取消</a>";
                                        }
                                        if($row['received']==1){
                                            echo "<a class=pay-btn onclick=urgeOrder(".$row['orderId'].",'".$row['username']."')>催单</a>";
                                        }
                                        if($row['received']==3){
                                            echo "<a class=pay-btn>评价</a><a href='/shop/".$row['shopId']."' class=pay-btn>再买一次</a>";
                                        }

                                        ?>
                                    </div>
                                </div>
                                <div class="clear">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  endforeach;?>
                    <div class="page">
                    <?php 
                    if($totalPage>1){ 
                     echo showPage($page, $totalPage);
                    }
                     ?>
                    </div>
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
       <div class="footer-content">
              <div class="footer-content-entrance">
                <a class="footer-content-link" href="/about.html?p=guanyuwomen">关于我们</a>
                <span class="footer-content-separator">|</span>
                <a class="footer-content-link footer-content-weixing">关注微信
                <img class="weixin-pic" src="/images/qr_code.jpg">
                </a>
                <span class="footer-content-separator">|</span> 
                <a class="footer-content-link" href="/about.html?p=tousujianyi">投诉建议</a>
                <span class="footer-content-separator">|</span>
                <a class="footer-content-link kaidian_address" href="/about.html?p=shangjiaruzhu">商家入驻</a>

              </div>
              <div class="footer-content-copyright">©2016 dingfanzu.com <a target="_blank">京ICP证020666号</a> </div>
        </div>

        <!--提示框-->
        <div id="alertModel" class="alertModel" >
        <a id="alert" data-reveal-id="alertModel" data-animation="fade"></a>
        <span id="alert-msg"></span>
        <button id="btn-ok" class="btn">知道了</button>
        <a id="btn-close" class="close-reveal-modal"><img src="/images/icon_close.png" height="24" width="24"></a>
        </div>

        <script src="/scripts/common.js"></script>
        <script src="/scripts/md5.js"></script>
        <script src="/scripts/login.js"></script>   
        <script src="/scripts/cart.lib.js"></script>
        <script src="/scripts/cart.js"></script>
        <script src="/scripts/common.js"></script>
        <script src="/scripts/header.js"></script>
        <script src="/scripts/account.js"></script>
        <script src="/scripts/footer.js"></script>
        <script type="text/javascript">
        $(function(){
             
        });
        //取消订单
        function orderCancel(orderId,username){
            var postUrl="/ajax/orderCancel.php";  
            $.post(postUrl,  
                {
                    orderId:orderId,
                    username:username
                },
                function(data,status,xhr) {    
                   if(status=="success"){  
                        $res= $.parseJSON(data); 
                        if($res.code=="0"){ 
                            showAlert("取消成功","/account/order"); 
                        }else if($res.code=="1"){
                            showAlert($res.msg,"/account/order"); 
                        }
                   }else{
                        showAlert("服务器异常","/account/order");
                   }
               }); 
        }
        //支付订单。
        function orderPay(orderId,orderTime){
            var timestamp = Date.parse(new Date());
            var nowTime=timestamp/1000;
            var dis=nowTime-orderTime; 
            if(dis>15*60){ 
                showAlert("超过15分钟未支付，订单已取消","/account/order"); 
            }else{
                showAlert("去支付页");
            }
        }

        //催单
        function urgeOrder(orderId,username){
            var postUrl="/ajax/urgeOrder.php";  
            $.post(postUrl,  
                {
                    orderId:orderId,
                    username:username
                },
                function(data,status,xhr) {    
                   if(status=="success"){  
                        $res= $.parseJSON(data); 
                        if($res.code=="0"){ 
                            showAlert("已通知商家"); 
                        }else if($res.code=="1"){
                            showAlert($res.msg);
                        }
                   }else{
                        showAlert("服务器异常");
                   }
               }); 
        }
        </script>
    </body>
</html>