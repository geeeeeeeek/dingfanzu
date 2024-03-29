## 介绍

一个基于php的外卖订餐网站，包括前端和后台。  

### 运行环境：Apache+PHP+Mysql

### 演示地址

101.43.124.118:8001/

101.43.124.118:8001/admin

### 代码说明
* htaccess Rewrite配置文件，需要放入到项目根目录
* configs.php 需要配置数据库连接信息（主机、用户名、密码），系统常量，debug模式等
* data.sql 位于data目录中，是数据库备份文件，需要提前导入到mysql中
* sendCode.php 短信接口，需要用到appkey和secret，可到alidayu.com申请。


### 技术架构：后台PHP+Mysql 前台jQuery、html、CSS、Bootstrap

### 网站结构：首页index.html 菜品展示页shop.html 

### 个人中心：我的地址；余额；代金券；订单；我的积分；设置。

### 网站目录
* account 个人中心（我的地址、余额、订单、积分、设置等）
* admin 商家后台系统（完整的后台系统）
* ajax 各种前台请求接口
* configs 各种配置文件
* core 各种核心函数
* data 数据库sql文件
* images 网站图片资源
* lib 各种常用函数库
* scripts 各种js文件
* style 各种css文件

### 运行步骤
1. 安装apache
2. 安装php
3. 安装mysql 5.7
4. 将源码复制到apache目录
5. 配置vhost
6. 访问



### 界面预览

##### 首页
![](https://github.com/geeeeeeeek/dingfanzu/blob/master/images/demo01.png)

##### 点餐页面
![](https://github.com/geeeeeeeek/dingfanzu/blob/master/images/demo02.png)

##### 后台管理页面
![](https://github.com/geeeeeeeek/dingfanzu/blob/master/images/demo03.jpg)


### 赞助作者

微信：lengqin1024
