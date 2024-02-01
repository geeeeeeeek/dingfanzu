/*
MySQL Backup 
Source Server Version: 5.6.17
Source Database: dfz
Date: 2017/3/18 星期六 22:12:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `dfz_admin`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_admin`;
CREATE TABLE `dfz_admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `shopPhone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_advice`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_advice`;
CREATE TABLE `dfz_advice` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `advice` varchar(150) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `time` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_cate`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_cate`;
CREATE TABLE `dfz_cate` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(20) DEFAULT NULL,
  `cName` varchar(30) DEFAULT NULL,
  `weight` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_hotel`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_hotel`;
CREATE TABLE `dfz_hotel` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `hotelName` varchar(30) DEFAULT NULL,
  `hotelPhone` varchar(15) DEFAULT NULL,
  `hotelLocation` varchar(30) DEFAULT NULL,
  `hotelIntroduction` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `time` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_order`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_order`;
CREATE TABLE `dfz_order` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `orderId` varchar(20) DEFAULT NULL,
  `items` text,
  `price` varchar(10) DEFAULT NULL,
  `orderAddress` varchar(30) DEFAULT NULL,
  `orderName` varchar(10) DEFAULT NULL,
  `orderPhone` varchar(13) DEFAULT NULL,
  `orderArrivedTime` varchar(20) DEFAULT NULL,
  `orderRemark` varchar(30) DEFAULT NULL,
  `pay` int(1) DEFAULT NULL,
  `paymethod` int(1) DEFAULT NULL,
  `payTime` varchar(13) DEFAULT NULL,
  `orderTime` varchar(13) DEFAULT NULL,
  `shopId` varchar(9) DEFAULT NULL,
  `shopName` varchar(20) DEFAULT NULL,
  `shopPhone` varchar(20) DEFAULT NULL,
  `urgeCount` int(5) DEFAULT NULL,
  `received` int(1) DEFAULT NULL,
  `receivedTime` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_pro`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_pro`;
CREATE TABLE `dfz_pro` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `pSn` varchar(13) DEFAULT NULL,
  `pName` varchar(40) DEFAULT NULL,
  `adminName` varchar(30) DEFAULT NULL,
  `shopId` varchar(9) DEFAULT NULL,
  `pCateId` varchar(30) DEFAULT NULL,
  `priceA` varchar(8) DEFAULT NULL,
  `priceB` varchar(8) DEFAULT NULL,
  `pNum` int(5) DEFAULT NULL,
  `pDesc` text,
  `isHot` varchar(3) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `pubTime` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pCate` (`pCateId`) USING BTREE,
  KEY `username` (`adminName`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_shop`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_shop`;
CREATE TABLE `dfz_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(20) DEFAULT NULL,
  `shopId` int(9) NOT NULL,
  `shopName` varchar(20) DEFAULT NULL,
  `shopPhone` varchar(20) DEFAULT NULL,
  `shopTip` varchar(100) DEFAULT NULL,
  `shopState` int(1) DEFAULT NULL,
  `shopIcon` varchar(30) DEFAULT NULL,
  `shopBlock` varchar(50) DEFAULT NULL,
  `shopFloor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_user`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_user`;
CREATE TABLE `dfz_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(32) DEFAULT NULL,
  `regTime` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dfz_userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `dfz_userinfo`;
CREATE TABLE `dfz_userinfo` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `building` varchar(30) NOT NULL DEFAULT '',
  `addressDetail` varchar(30) DEFAULT NULL,
  `block` varchar(5) DEFAULT NULL,
  `floor` varchar(4) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `jifen` varchar(5) DEFAULT NULL,
  `balance` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`building`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `dfz_admin` VALUES ('11','admin','21232f297a57a5a743894a0e4a801fc3','fff',''), ('14','xiao','d2bf7126723ea8f6005ba141ea3c3e2c','net936@163.com','12222222222'), ('16','liu','9d4d6204ee943564637f06093236b181','net936@163.com','12222222222');
INSERT INTO `dfz_advice` VALUES ('2','fccc','aaa',NULL), ('3','a','aaa',NULL), ('4','cccccccccccc','aaa','1471185036'), ('5','cccccccccccc','aaa','1471185178'), ('6','aaaaaaa','aaa','1471185201'), ('7','eee','aaa','1471185248'), ('8','本宝宝','aaa','1472984466'), ('9','kkk','aaa','1472984642'), ('10','hh','aaa','1472984679'), ('11','bb','aaa','1472984694'), ('12','bb','aaa','1472984823'), ('13','000','aaa','1472984829'), ('14','aa','aaa','1472985032');
INSERT INTO `dfz_cate` VALUES ('27','xiao','素菜','10'), ('28','xiao','盖饭1','2'), ('29','xiao','哈哈','9'), ('30','liu','哈哈','1');
INSERT INTO `dfz_hotel` VALUES ('1','fff','133','','','aaa','1471186586'), ('2','aaa','1444444','aa','fff','aaa','1471186607'), ('3','bbb','133333333333333','aaaaaaaaaaaaaaaaaa','df','aaa','1471186667'), ('4','aaa','ff','','','aaa','1472984881');
INSERT INTO `dfz_order` VALUES ('132','aaa','1472995834232','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"},{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','22:00-22:30','','0','2',NULL,'1472995834','0001','济南大厦','15888888888',NULL,'5',NULL), ('133','aaa','1473170531447','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"},{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','23:00-23:30','kkk','0','2',NULL,'1473170531','0001','济南大厦','15888888888',NULL,'1','1473170576'), ('134','aaa','1473170902143','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:00-23:30','','0','2',NULL,'1473170902','0001','济南大厦','15888888888',NULL,'5',NULL), ('135','aaa','1473172582211','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:00-23:30','','0','2',NULL,'1473172582','0001','济南大厦','15888888888',NULL,'1','1473172600'), ('136','aaa','1473174190660','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473174190','0001','济南大厦','15888888888','3','1','1473174228'), ('137','aaa','1473174270538','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473174270','0001','济南大厦','15888888888',NULL,'2','1473174314'), ('138','aaa','1473174343649','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473174343','0001','济南大厦','15888888888',NULL,'1','1473174414'), ('139','aaa','1473174444983','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473174444','0001','济南大厦','15888888888',NULL,'2','1473174451'), ('140','aaa','1473174473773','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473174473','0001','济南大厦','15888888888',NULL,'5',NULL), ('141','aaa','1473175577658','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473175577','0001','济南大厦','15888888888',NULL,'1','1473175589'), ('142','aaa','1473175613630','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473175613','0001','济南大厦','15888888888',NULL,'5',NULL), ('143','aaa','1473175759276','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473175759','0001','济南大厦','15888888888',NULL,'5',NULL), ('144','aaa','1473175797208','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','23:30-24:00','','0','2',NULL,'1473175797','0001','济南大厦','15888888888',NULL,'2','1473175806'), ('145','aaa','1473175833346','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','24:00-24:30','','0','2',NULL,'1473175833','0001','济南大厦','15888888888',NULL,'5',NULL), ('146','aaa','1473175986426','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','24:00-24:30','','0','0',NULL,'1473175986','0001','济南大厦','15888888888',NULL,'5',NULL), ('147','aaa','1473176030658','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','24:00-24:30','','0','2',NULL,'1473176030','0001','济南大厦','15888888888',NULL,'2','1473176049'), ('148','aaa','1473434523067','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":2,\"price\":\"15\"}]','20','济南大厦B座4层','哈哈','13333333333','24:00-24:30','','0','2',NULL,'1473434523','0001','济南大厦','15888888888','4','1','1473436647'), ('149','aaa','1474296736122','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','23:00-23:30','','0','2',NULL,'1474296736','0001','济南大厦','15888888888',NULL,'1','1476632771'), ('150','aaa','1476611795559','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":3,\"price\":\"15\"},{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','35','济南大厦B座4层','哈哈','13333333333','18:30-19:00','','0','2',NULL,'1476611795','0001','济南大厦','15888888888',NULL,'1','1476611940'), ('151','aaa','1476619979974','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','20:30-21:00','','0','2',NULL,'1476619979','0001','济南大厦','15888888888',NULL,'1','1476620362'), ('152','aaa','1476620437851','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"},{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','20:30-21:00','','0','2',NULL,'1476620437','0001','济南大厦','15888888888',NULL,'1','1476620451'), ('153','aaa','1476620642132','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','20:30-21:00','','0','2',NULL,'1476620642','0001','济南大厦','15888888888',NULL,'1','1476620663'), ('154','aaa','1476620731630','[{\"itemId\":\"1466524398193\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','10','济南大厦B座4层','哈哈','13333333333','20:30-21:00','','0','2',NULL,'1476620731','0001','济南大厦','15888888888',NULL,'1','1476620754'), ('155','aaa','1476620870871','[{\"itemId\":\"104\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\\u002b\\u9e21\\u86cb\\u7092\\u9ec4\\u74dc\\u002b\\u897f\\u7ea2\\u67ff\\u6284\\u725b\\u8169\",\"count\":1,\"price\":\"15\"}]','0','济南大厦B座4层','哈哈','13333333333','20:30-21:00','','0','2',NULL,'1476620870','0001','济南大厦','15888888888',NULL,'1','1476620902'), ('156','aaa','1476622396595','[{\"itemId\":\"1466606555960\",\"name\":\"\\u5bab\\u4fdd\\u9e21\\u4e01\",\"count\":1,\"price\":\"15\"}]','5','济南大厦B座4层','哈哈','13333333333','21:00-21:30','','0','2',NULL,'1476622396','0001','济南大厦','15888888888',NULL,'1','1476622463');
INSERT INTO `dfz_pro` VALUES ('33','1476975298474','鸡蛋炒西红柿','xiao','0005','27','2','2','2',NULL,'1','1476975298474.jpg','1476975298'), ('34','1476976718517','本宝宝','xiao','0002','27','1','1','3',NULL,'1','1476976718517.jpg','1476976718'), ('35','1477116629070','韭菜','xiao','0002','28','13','1','3',NULL,'1','1477116629070.jpg','1477116629'), ('36','1477116903446','啊啊啊000','xiao','0002','27',NULL,'30',NULL,NULL,NULL,'1477116903446.jpg','1477116903'), ('38','1477120811680','鸡蛋炒西红柿','liu','1000','30',NULL,'3',NULL,NULL,NULL,'1477120811680.jpg','1477120811');
INSERT INTO `dfz_shop` VALUES ('4','liu','1000','齐鲁大厦',NULL,'哈哈333哈哈333哈哈333哈哈333哈哈333哈哈333哈哈333哈哈333哈哈333','0','1000.jpg','?#A#B#','?#1#2#3'), ('5','liu','1001','湖北大厦',NULL,'哈哈','1','1001.jpg','?#A#B#','?#1#2#3');
INSERT INTO `dfz_user` VALUES ('39','aaa','0b4e7a0e5fe84ad35fb5f95b9ceeac79','1467898260');
INSERT INTO `dfz_userinfo` VALUES ('6','aaa','本宝宝','haha@qq.com','济南大厦','555','B','4','333','30',NULL);
