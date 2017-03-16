<html>
<body>

<?php
header("content-type:text/html;charset=utf-8"); 
error_reporting(7); //0：关闭提醒 255：所有提醒 7：部分提醒
date_default_timezone_set("PRC");

if(isset($_POST['url'])){
    $url=$_POST['url'];
    echo "提交的URL:<br>".$url."<br><br>";
    $urls = array( $url);
    $api = 'http://data.zz.baidu.com/urls?site=www.dingfanzu.com&token=O7Z0nOiNqQVZ7ET3';
    $ch = curl_init();
    $options =  array(
        CURLOPT_URL => $api,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => implode("\n", $urls),
        CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    echo "提交结果是：<br>".$result."<br>";
}else{
    echo "请输入URL！";
}

?>


<form action="" method="post">
    <br><br><br><br>
    <input type="text" name="url" style="width:300px;" placeholder="请输入url"/><br><br>
    <input type="submit" value="提交" />
</form>
</body>
</html>