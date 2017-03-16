<?php 
header("content-type:text/html;charset=utf-8"); 
error_reporting(7); //0：关闭提醒 255：所有提醒 7：部分提醒
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once "configs.php";
require_once 'admin.inc.php';
require_once 'cate.inc.php';
require_once 'pro.inc.php';
require_once 'album.inc.php';
require_once 'upload.func.php';
require_once 'user.inc.php';
require_once 'order.inc.php';
require_once 'shop.inc.php';

