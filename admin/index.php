<?php
require_once '../include.php';
checkLogined();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>外卖订餐后台管理系统</title>
<link rel=stylesheet href="styles/reset.css">
<link rel=stylesheet href="styles/bootstrap-admin.css">
<link rel="stylesheet" href="styles/backstage.css">


</head>

<body>
    <div class="head">
            <div class="logo fl" onclick="window.open('index.php','_self')"></div>
            <span class="head_text"></span>

        <!-- <div class="operation_user clearfix"> -->
            <div class="link fr">
                <b>欢迎您
                <?php
    				if(isset($_SESSION['adminName'])){
    					echo $_SESSION['adminName'];
    				}elseif(isset($_COOKIE['adminName'])){
    					echo $_COOKIE['adminName'];
    				}
                ?>
                </b>
                <a href="/" class="">预览前台</a>
                <a href="#" onclick="updatePage()" class="">刷新前台</a>
                <a href="doAdminAction.php?act=logout" class="">退出</a>
            </div>
        <!-- </div> -->
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
      	 		<!-- 嵌套网页开始 -->
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="100%" scrolling="yes"></iframe>
                <!-- 嵌套网页结束 -->
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <ul class="mList">
                    <li>
                        <div class="menu-item-title" onclick="show('menu1','change1')"><span  id="change1" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">商品管理</span>
                        </div>
                        <dl id="menu1" style="display:none;">
                            <dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                            <dd><a href="listPro.php" target="mainFrame">商品列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <div class="menu-item-title" onclick="show('menu2','change2')"><span  id="change2" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">分类管理</span>
                        </div>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <div class="menu-item-title" onclick="show('menu3','change3')"><span  id="change3" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">订单管理</span>
                        </div>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="listOrder.php" target="mainFrame">订单查询</a></dd>
                        </dl>
                    </li>
                    <li>
                        <div class="menu-item-title" onclick="show('menu4','change4')"><span  id="change4" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">用户管理</span>
                        </div>
                        <dl id="menu4" style="display:none;">
                            <dd><a href="listUser.php" target="mainFrame">用户列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <div class="menu-item-title" onclick="show('menu5','change5')"><span  id="change5" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">管理员管理</span>
                        </div>
                        <dl id="menu5" style="display:none;">
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <div class="menu-item-title" onclick="show('menu6','change6')">
                        <span  id="change6" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">店铺管理</span>
                        </div>
                        <dl id="menu6" style="display:none;">
                            <dd><a href="addShop.php" target="mainFrame" class="">添加店铺</a></dd>
                            <dd><a href="listShop.php" target="mainFrame" class="">店铺列表</a></dd>
                        </dl>
                    </li>

                    <li>
                        <div class="menu-item-title" onclick="show('menu7','change7')">
                        <span  id="change7" class="menu-item-icon ico-open"></span>
                        <span class="menu-item-name">接单管理</span>
                        </div>
                        <dl id="menu7" style="display:none;">
                            <dd><a href="moniterOrder.php" target="mainFrame" class="">开始接单</a></dd>
                            <dd><a href="listOrder.php" target="mainFrame">历史订单</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!--提示框-->
    <div class="modal fade" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button id="btn-close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 id="alert-title" class="modal-title">标题</h4>
                </div>
                <div class="modal-body">
                    <p id="alert-body">内容</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-ok" type="button" class="btn btn-default" data-dismiss="modal">知道了</button>
                </div>
            </div>
        </div>
    </div>
    <audio id="player">
        <source src="raw/bg_voice.mp3">
    </audio>

    <script src="scripts/jquery-1.8.3.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/common.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.mList a').click(function(e) {
                $('.title').text($(this).text());
                $('.mList a').removeClass('active');
                $(this).addClass('active');
            });
            isMSIE();

            //轮询查订单
            setInterval("checkOrder()",5000);
        });
        //展开收缩
    	function show(menu,change){
	    	      if($("#"+change).hasClass('ico-open')){
                    $("#"+change).removeClass('ico-open');
                    $("#"+change).addClass('ico-close');
                  }else{
                    $("#"+change).removeClass('ico-close');
                    $("#"+change).addClass('ico-open');
                  }
        		  //隐藏显示
                  $("#"+menu).toggle();
        }
        //判断浏览器
        function isMSIE(){
            var explorer=navigator.userAgent;
            if(explorer.indexOf("MSIE") >= 0){
                alert('请使用Chrome浏览器！');
            }
        }

        //生成html
        function updatePage(){
            var postUrl="ajax/updatePage.php";
            $.post(postUrl,
                '',
                function(data, status, xhr) {
                   if(status=="success"){
                        $res= $.parseJSON(data);
                        if($res.code=="0"){ //
                            showAlert("提示","刷新成功");
                        }else if($res.code=="1"){ //

                        }
                   }else{
                        showAlert("提示","服务器异常，请联系平台人员");
                   }
               });
        }

        //检查订单
         function checkOrder(){
            var shopId='<?php echo $_SESSION['shopId']?>';
            if(!shopId){
                return;
            }
            var requestUrl="checkOrder.php?shopId="+shopId;

           $.ajax({ url:requestUrl,
                    type:'post',
                    async:true,
                    timeout:3000,
                    success:function(data){
                        if(data=="success"){
                            playVoice();
                        }
                    },
                    error:function(data){
                    }
                });
        }
        //播放背景音
        function playVoice(){
            var audio = $("#player")[0];
            audio.play();
        }


    </script>

</body>
</html>
