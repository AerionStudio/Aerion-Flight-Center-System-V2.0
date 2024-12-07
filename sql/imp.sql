-- MySQL dump 10.13  Distrib 8.0.24, for Linux (x86_64)
--
-- Host: localhost    Database: efb
-- ------------------------------------------------------
-- Server version	8.0.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_user`
--

DROP TABLE IF EXISTS `activity_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_user` (
  `user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `route` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aircraft` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `activity_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_user`
--

LOCK TABLES `activity_user` WRITE;
/*!40000 ALTER TABLE `activity_user` DISABLE KEYS */;
INSERT INTO `activity_user` VALUES ('akarry','温州龙湾 ~ 三亚凤凰','A225','1500','2023-06-17'),('CPA0374','温州龙湾 ~ 三亚凤凰','B77W','1500','2023-06-17'),('6067','温州龙湾 ~ 三亚凤凰','A320','1610','2023-06-17'),('2270','温州龙湾 ~ 三亚凤凰','319','1900','2023-06-17'),('19516072102','宁波栎社 ~ 厦门高崎','','','2023-06-22'),('9621','宁波栎社 ~ 厦门高崎','A320','1900','2023-06-22'),('2270','宁波栎社 ~ 厦门高崎','b738','1900','2023-06-22'),('3145','宁波栎社 ~ 厦门高崎','A320','1930','2023-06-22'),('3696','宁波栎社 ~ 厦门高崎','','','2023-06-22'),('3696','宁波栎社 ~ 厦门高崎','A320N','2130',''),('CPA0374','南宁吴圩 ~ 广州白云','B739','1945','2023-06-30'),('CPA0374','南宁吴圩 ~ 广州白云','B789','1940','2023-06-30'),('8312','南宁吴圩 ~ 广州白云','B773','1950','2023-06-30'),('CSN4248','广州白云 ~ 长沙黄花','B738','2015','2023-07-04'),('6067','广州白云 ~ 长沙黄花','B738','1935','2023-07-04'),('CPA0374','广州白云 ~ 长沙黄花','B739','1950','2023-07-04'),('2270','长沙黄花 ~ 成都双流','a320','1930','2023-07-11'),('1275','长沙黄花 ~ 成都双流','B738','2000','2023-07-11'),('6067','长沙黄花 ~ 成都双流','A320','2010','2023-07-11'),('CPA0374','长沙黄花 ~ 成都双流','B752','2020','2023-07-11'),('2270','成都双流 ~ 西安咸阳','32n','19:30','2023-07-18'),('2270','广州白云 ~ 桂林两江','A32N','1915','2023-07-23'),('6459','广州白云 ~ 桂林两江','B787','1925','2023-07-23'),('6067','广州白云 ~ 桂林两江','B738','1910','2023-07-23'),('CPA0374','广州白云 ~ 桂林两江','C32A','1910','2023-07-23'),('0310','广州白云 ~ 桂林两江','b764er','1935','2023-07-23'),('0222','广州白云 ~ 桂林两江','B738','1935','2023-07-23'),('3579','广州白云 ~ 桂林两江','B744F','1940','2023-07-23'),('2057','广州白云 ~ 桂林两江','MD82','1950','2023-07-23'),('6067','广州白云 ~ 桂林两江','B738','2015',''),('3611','西安咸阳 ~ 兰州中川','B738','2000','2023-07-30'),('2270','西安咸阳 ~ 兰州中川','','1930','2023-07-30'),('CPA0374','兰州中川 ~ 济南遥墙','A333','1930','2023-08-06'),('CCA3117','兰州中川 ~ 济南遥墙','A321','1950','2023-08-06'),('6067','兰州中川 ~ 济南遥墙','','',''),('1256','济南遥墙 ~ 武汉天河','B738','2040','2023-08-20'),('6067','武汉天河 ~ 福州长乐','B738','2023-08-22 12:14:04','%2023-08-27%');
/*!40000 ALTER TABLE `activity_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airlines` (
  `airlines_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `airlines_chinese_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `airlines_english_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `airlines_icao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `airlines_introduce` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dir_ma` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `as_ma` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `airlines_iata` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airlines`
--

LOCK TABLES `airlines` WRITE;
/*!40000 ALTER TABLE `airlines` DISABLE KEYS */;
INSERT INTO `airlines` VALUES ('https://attachment-1308533719.cos.ap-shanghai.myqcloud.com/logo1.png','云端模拟飞行社区','Cloud Flight Community','CFC','CFC云端飞行社区成立于2020年5月17日，以模拟飞行为主，致力于成为一个团结进取、和谐友爱、飞行氛围浓厚的平台。我们奉行“天下飞友一家亲”的原则，只要热爱飞行，我们就是一家人。 我们不是最专业的，但我们致力于成为最专业的。在这里，你可以找到心仪的插件，可以学习专业的飞行理论，参加定期的联飞活动，与亲切的飞友一起聊天讨论，一起逐梦，成为具备专业，知识，技术，责任的机长！ 飞行路漫漫，云端常相伴，让我们一起飞行，一起学习，一起成长，一起在CFC见证祖国民航业的繁荣昌盛！ 云端飞行，没你不行！','CFC6067','CFC6067','#2C82D1','#67BFFF','721768928','CF','ZGKL'),('https://imp.cfcsim.cn/res/CCA.jpg','中国国际航空','Air China','CCA','“国航腾飞，万众一心铸辉煌；中华振兴，百年大计展宏图”欢迎各位CFC云端会员加入国航大家庭','CCA5250','CCA5482','#1177b0','#fffef9','752085392 ','CA','ZBAA'),('https://imp.cfcsim.cn/res/CES.png','中国东方航空','China Eastern Airlines','CES','CFC中国东方航空，是一家具有资深管理经验的骨干级航空公司。成员与管理团队具有超高飞行技术与理论知识。','CES1275','CES6067','#FF1158','#CB0000','438982123','MU','ZSPD'),('https://static.sinofsx.com//image/sinofsx/va/CHH.png','中国海南航空','Hainan Airlines','CHH','内修中华传统文化精粹，外融西方先进科学技术。以民航强国战略为主导，加速国际化布局，倾力打造规模和运营能力居世界前列的航空公司。','CHH2057','CHH5702','#fecc11','#CB0000','759297806|CFC飞院','HU','ZGKL'),('https://imp.cfcsim.cn/res/DKH.png','CFC虚拟吉祥航空','JUNYAO Airlines','DKH','天地一线间，吉祥航空牵。','DKH3117','DKH1896','#ed5a65','#c04851','907313041','HO','ZSSS'),('https://imp.cfcsim.cn/res/HBH.png','河北航空','Hebei Airlines','HBH','随心启航，快乐飞翔！','HBH1302','HBH4083','#0059CE','#009EC1','291080173','NS','ZBSJ');
/*!40000 ALTER TABLE `airlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airlines_wait`
--

DROP TABLE IF EXISTS `airlines_wait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airlines_wait` (
  `user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airlines_wait`
--

LOCK TABLES `airlines_wait` WRITE;
/*!40000 ALTER TABLE `airlines_wait` DISABLE KEYS */;
/*!40000 ALTER TABLE `airlines_wait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `route` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Publisher` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dep` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `app` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dep_icao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `app_icao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `takeoff_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `atc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `atc_fq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES ('JCS DCT OVGOT R200 BIGRO G221 WL','2023-06-10','CES2502','3','揭阳潮汕','三亚凤凰','','','','','',''),('DST B221 LJG A470 BEBEM R200 BIGRO G221 WLL','2023-06-17','CES2502','0','温州龙湾','三亚凤凰','ZSWZ','ZJSY','1900,1910,1920,1930,1940,1950,2000,2010,2020,2030,2040,2050,2100,2110,2120,2130,2140,2150,2200','1','',''),('SHZ B221 LJG','2023-06-22','CES6067','0','宁波栎社','厦门高崎','ZSNB','ZSAM','1900,1910,1920,1930,1940,1950,2000,2010,2020,2030,2040,2050,2100,2110,2120,2130,2140,2150,2200','2','',''),('GYA','2023-06-30','CES2502','0','南宁吴圩','广州白云','ZGNN','ZGGG','1930,1935,1940,1945,1950,1955,2000,2005,2010,2015,2020,2025,2030','2','',''),('YIN A461 BUBDA W56 UKLUK','2023-07-04','CES2502','0','广州白云','长沙黄花','ZGGG','ZGHA','1930,1935,1940,1945,1950,1955,2000,2005,2010,2015,2020,2025,2030','1','',''),('GURET W233 AGULU W81 NSH','2023-07-18','CES1275','0','成都双流','西安咸阳','ZUUU','ZLXY','19:30,19:40,19:50,20:00,20:10,20:20,20:30,20:40,20:50,21:00','2','ZUUU_DEL,ZUUU_APN,ZUUU_GND,ZUUU_TWR,ZUUU_APP,ZUUU_CTR,ZLXY_CTR,ZLXY_APP,ZLXY_TWR,ZLXY_GND','121.600,121.900,121.850,123.000,124.850,120.900,125.300,125.100,130.450,121.650'),('SUMIB W24 OSNOV G586 QP','2023-07-23','CHH5702','0','广州白云','桂林两江','ZGGG','ZGKL','1910,1910,1910,1915,1915,1915,1920,1920,1925,1925,1930,1930,1935,1935,1940,1940,1950,1950,2000,2000,2000,2000,2010,2015,2030,2030','1','ZGGG_02_TWR,ZGGG_01_APP,ZGGG_23_CTR,ZGNN_09_CTR,ZGKL_APP,ZGKL_TWR,ZGGG_DEL,ZGGG_E_APN,ZGGG_E_GND,ZGKL_GND','118.100,126.550,125.750,134.375,120.850,118.000,121.950,121.825,121.750,121.650'),('TEBIB W541 ADNEN W94 QIY W213 OVTIB','2023-07-30','CHH5702','0','西安咸阳','兰州中川','ZLXY','ZLLL','1930,1930,1930,1935,1940,1945,1950,1955,2000,2005,2010','1','ZLXY_S_TWR,ZLXY_02_APP,ZLLL_08_CTR,ZLLL_01_APP,ZLLL_TWR,ZLXY_DEL,ZLXY_S_GND,ZLXY_S_APN,ZLLL_APN','130.450,119.050,134.200,120.250,118.100,121.600,121.650,121.850,121.650'),('GULEK W4 EKORO W37 ENLAB','2023-08-20','CES6067','0','济南遥墙','武汉天河','ZSJN','ZHHH','1930,1940,1950,2000,2010,2020,2030,2040,2050,2100,2120,2130,2140,2150,2200','1','ZSJN_TWR,ZSJN_DEP,ZSJN_CTR,ZHHH_APP,ZHHH_TWR','管制自定,管制自定,管制自定,管制自定,管制自定'),('BIVIP R343 UPLEL W95 SAPIN V143 EMRID A470 BZ','2023-08-27','CSN1012','0','武汉天河','福州长乐','ZHHH','ZSFZ','1930,1940,1950,2000,2010,2020,2030,2040,2050,2100,2110,2120,2130','2','ZHHH_TWR,ZHHH_DEP,ZHHH_CTR,ZSFZ_CTR,ZSFZ_APP,ZSFZ_TWR','自定,自定,自定,自定,自定,自定'),('ODULO B221 XDX W174 TAO W103 JDW V89 DOVIV W55 DUMAP','2023-08-26','CES6067','3','东方航空 “空中慢线” 上海浦东','北京首都','ZSPD','ZBAA','1930,1940,1950,2000,2010,2020,2030,2040,2050,2100,2110,2120,2130','2','ZSPD_TWR,ZSPD_DEP,ZSPD_CTR,ZBAA_CTR,ZBAA_APP,ZBAA_TWR','管制自定,管制自定,管制自定,管制自定,管制自定,管制自定');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_atc`
--

DROP TABLE IF EXISTS `event_atc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_atc` (
  `time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `atc_user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `atc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_atc`
--

LOCK TABLES `event_atc` WRITE;
/*!40000 ALTER TABLE `event_atc` DISABLE KEYS */;
INSERT INTO `event_atc` VALUES ('1970-01-01','6067','ZBAD_GND'),('1970-01-01','6067','ZBAA_APP'),('1970-01-01','6067','ZBAA_CTR'),('1970-01-01','6067','ZBAD_APP'),('1970-01-01','6067','ZBAA_TWR'),('1970-01-01','6067','TSET_TWR'),('1970-01-01','6067','TEST_CTR'),('1970-01-01','6067','TSET_APN'),('2023-07-04','5702',''),('1970-01-01','5702','TSET_APP'),('1970-01-01','5702','TSET_GND'),('2023-07-11','9621','ZGHA_GND'),('1970-01-01','6067','test'),('2023-07-11','5702','ZUUU_TWR'),('2023-07-11','9621','ZGHA_TWR'),('2023-07-23','5702','ZGGG_02_TWR'),('2023-07-23','5702','ZGKL_TWR'),('2023-07-23','5702','ZGGG_DEL'),('2023-07-23','9621','ZGGG_E_GND'),('2023-07-23','9621','ZGGG_E_APN'),('2023-07-23','CFC6620','ZGNN_09_CTR'),('2023-07-30','5702','ZLXY_S_TWR'),('2023-07-30','5702','ZLXY_DEL'),('2023-07-30','5702','ZLLL_TWR'),('2023-06-22','6067',''),('2023-06-22','6067',''),('2023-07-30','9621','ZLXY_S_GND'),('2023-07-30','9621','ZLXY_S_APN'),('2023-08-06','1275','ZLLL_TWR'),('2023-08-06','1275','ZLLL_TWR'),('2023-08-27','5702','ZHHH_TWR');
/*!40000 ALTER TABLE `event_atc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history` (
  `client_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `depairport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `destairport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aircraft` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `online_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('CCA4350','VHHH','RJTT','H/A346','2270','20230626104705',''),('SWR3201','EKCH','ENBR','A320','3648','20230626175811',''),('DLH322','ENBR','EGPH','A320','3648','20230628180641',''),('CPA0374','ZSHC','ZSSS','B739','CPA0374','20230629005713',''),('CHH2057','ZGGG','ZGGG','B738','CHH2057','20230708144447',''),('CPA0374','ZGGG','ZLXY','B788','CPA0374','20230710115555',''),('CGH5702','ZGGG','ZLXY','B77W','CHH5702','20230710120330',''),('CHH2057','ZGGG','ZLXY','A333','CHH2057','20230710120504',''),('CGH5702','ZGGG','ZLXY','B77W','CHH5702','20230710120643',''),('CHH2057','ZGGG','ZLXY','A333','CHH2057','20230710120937',''),('CGH5702','ZGGG','ZLXY','B77W','CHH5702','20230710121017',''),('CGH5702','ZGGG','ZLXY','B77W','CHH5702','20230710121043',''),('CHH2057','ZGGG','ZLXY','A333','CHH2057','20230710121041',''),('CHH2057','ZGGG','ZLXY','A333','CHH2057','20230710122103',''),('CBJ3611','ZLXX','ZLLL','B738','3611','2023-07-30T19:31:15.0000000Z',''),('CES4350','ZLXY','ZLLL','A320','2270','2023-07-30T19:34:20.0000000Z',''),('CPA0374','ZSSS','RJFF','A333','CPA0374','2023-08-01T09:32:33.0000000Z',''),('DKH3117','ZLLL','ZSJN','A321','CCA3117','2023-08-06T19:52:21.0000000Z',''),('CPA0374','ZLLL','ZSJN','A333','CPA0374','2023-08-06T19:35:44.0000000Z',''),('DKH3117','ZLLL','ZSJN','A21N','CCA3117','2023-08-06T20:01:32.0000000Z',''),('DKH3117','ZLLL','ZSJN','A21N','CCA3117','2023-08-06T20:04:54.0000000Z',''),('CPA0374','ZLLL','ZSJN','A333','CPA0374','2023-08-06T20:12:34.0000000Z',''),('DKH3117','ZLLL','ZSJN','A21N','CCA3117','2023-08-06T20:12:35.0000000Z',''),('DKH3117','ZLLL','ZSJN','A21N','CCA3117','2023-08-06T20:16:17.0000000Z',''),('SKY0995','ZBAA','ZGGG','CL60','0995','2023-08-13T17:52:35.0000000Z',''),('CCA0995','ZBAA','ZGGG','CL60','0995','2023-08-13T17:59:19.0000000Z',''),('CCA0995','ZBAA','ZGGG','CL60','0995','2023-08-13T18:11:13.0000000Z',''),('CCA0995','ZBAA','ZGGG','CL60','0995','2023-08-13T18:19:08.0000000Z',''),('CPA0374','ZSHC','ZSPD','B752','CPA0374','2023-08-14T20:22:18.0000000Z',''),('CES1275','ZSHC','ZSPD','B738','1275','2023-08-14T20:32:07.0000000Z',''),('CES1275','ZSHC','ZSPD','B738','1275','2023-08-14T20:46:02.0000000Z',''),('CES6067','ZSNJ','ZUUU','B78X','6067','2023-08-15T17:03:17.0000000Z','5380'),('CES6067','ZSNJ','ZUUU','B78X','6067','2023-08-15T18:33:03.0000000Z','1762'),('CXA5250','ZSFZ','ZSNB','B789','5250','2023-08-19T14:08:59.0000000Z','5173'),('CSN4456','ZSOF','ZGNN','B77W','1275','2023-08-19T19:02:08.0000000Z','488'),('HBH3615','ZSOF','ZSFZ','B738','1275','2023-08-19T19:02:09.0000000Z','487'),('CSN3835','ZSOF','ZSPD','A321','1275','2023-08-19T19:02:10.0000000Z','486'),('CQH8917','ZSSS','ZGSZ','A333','1275','2023-08-19T21:16:18.0000000Z','116'),('DKH1087','ZSSS','ZSAM','A359','1275','2023-08-19T21:16:19.0000000Z','115'),('CSN6180','ZGGG','ZSSS','B738','1275','2023-08-19T21:16:20.0000000Z','114'),('CES5389','ZSSS','ZBAA','A321','1275','2023-08-19T22:37:47.0000000Z','2713'),('CQH8909','ZSSS','ZGGG','A20N','1275','2023-08-19T22:37:48.0000000Z','2712'),('CQH8821','ZSSS','ZSQD','A320','1275','2023-08-19T22:37:49.0000000Z','2711'),('CES2901','ZGGG','ZSSS','A319','1275','2023-08-19T22:56:47.0000000Z','1573'),('CQN3915','ZGSZ','ZSSS','A321','1275','2023-08-19T23:00:21.0000000Z','1359'),('CCA4915','ZUCK','ZSSS','A321','1275','2023-08-19T23:03:23.0000000Z','195'),('CES6815','ZGSZ','ZSSS','A321','1275','2023-08-19T23:06:23.0000000Z','997'),('CSS6846','ZLLL','ZSSS','A321','1275','2023-08-19T23:09:23.0000000Z','61'),('CCA5646','ZUUU','ZSSS','A320','1275','2023-08-19T23:12:24.0000000Z','103'),('CCA1386','ZLXY','ZSSS','A320','1275','2023-08-19T23:15:24.0000000Z','456'),('CSN1012','NOPE','NOPE','B114','1012','20230709153839','6666'),('CES4350','ZSJN','ZHHH','H/A359','2270','2023-08-20T19:13:39.0000000Z','8985'),('CPA0374','ZSJN','ZHHH','B752','CPA0374','2023-08-20T19:39:23.0000000Z','765'),('CPA0374','ZSJN','ZHHH','B752','CPA0374','2023-08-20T19:58:49.0000000Z','2385'),('CPA0374','ZSJN','ZHHH','B752','CPA0374','2023-08-20T20:38:44.0000000Z','132'),('CPA0374','ZSJN','ZHHH','B752','CPA0374','2023-08-20T20:40:59.0000000Z','321'),('CPA0374','ZSJN','ZHHH','B752','CPA0374','2023-08-20T20:46:26.0000000Z','45'),('CQH8917','ZSSS','ZGSZ','A333','CDC4148','2023-08-20T21:14:32.0000000Z','3148'),('DKH1087','ZSSS','ZSAM','A359','CDC4148','2023-08-20T21:14:33.0000000Z','3147'),('CSN6180','ZGGG','ZSSS','B738','CDC4148','2023-08-20T21:14:34.0000000Z','3146'),('CES2901','ZGGG','ZSSS','A319','CDC4148','2023-08-20T21:26:56.0000000Z','191'),('CQN3915','ZGSZ','ZSSS','A321','CDC4148','2023-08-20T21:29:56.0000000Z','123'),('CCA4915','ZUCK','ZSSS','A321','CDC4148','2023-08-20T21:32:56.0000000Z','2044'),('CES6815','ZGSZ','ZSSS','A321','CDC4148','2023-08-20T21:35:56.0000000Z','1864'),('CSS6846','ZLLL','ZSSS','A321','CDC4148','2023-08-20T21:38:56.0000000Z','1684'),('CCA5646','ZUUU','ZSSS','A320','CDC4148','2023-08-20T21:41:56.0000000Z','1504'),('CCA1386','ZLXY','ZSSS','A320','CDC4148','2023-08-20T21:44:56.0000000Z','1324'),('CCA1896','ZLXY','ZSSS','A318','CDC4148','2023-08-20T21:47:57.0000000Z','1143'),('CHH7815','ZGSZ','ZSSS','A321','CDC4148','2023-08-20T21:50:57.0000000Z','963'),('CXA5250','ZSNB','ZBAD','B789','5250','2023-08-21T14:24:10.0000000Z','8763'),('CXA5250','ZBAD','ZBAA','B789','5250','2023-08-21T20:56:28.0000000Z','6091'),('CES6067','ZSNJ','ZUUU','B738','6067','2023-08-21T22:50:54.0000000Z','2270'),('CXA5250','ZBAA','ZSOF','B789','5250','2023-08-22T19:31:34.0000000Z','6902'),('CXA3366','ZLLL','ZLDH','B789','3366','2023-08-22T20:00:36.0000000Z','4443'),('CSN7418','ZGGG','ZSSS','SR71','6067','2023-08-22T20:55:17.0000000Z','879'),('DKH6067','ZSOF','ZBAA','A320','6067','2023-08-22T21:16:54.0000000Z','148'),('CSN7418','ZGGG','ZSSS','SR71','6067','2023-08-22T21:11:51.0000000Z','7191'),('CES6067','ZSOF','ZBAA','A320','6067','2023-08-22T21:19:43.0000000Z','232'),('CXA3366','ZLDH','ZLLL','B789','3366','2023-08-22T21:27:02.0000000Z','3451'),('CXA3366','ZLDH','ZLLL','B789','3366','2023-08-22T22:26:01.0000000Z','4247'),('CES6067','ZSPD','ZBAA','A20N','6067','2023-08-22T23:47:18.0000000Z','773'),('DKH3117','ZSJN','ZSSS','A21N','3117','2023-08-23T19:28:49.0000000Z','12477'),('DKH3117','ZSSS','ZSWZ','A21N','3117','2023-08-24T08:41:06.0000000Z','7740'),('CCA5250','ZBAA','ZSPD','B738','5250','2023-08-24T13:05:02.0000000Z','11220'),('CES6067','ZBAA','ZSYA','A20N','6067','2023-08-24T21:42:32.0000000Z','3605'),('CES9030','ZUUU','ZBAA','A320','9030','2023-08-25T21:36:09.0000000Z','877'),('DKH3117','ZSSS','ZPPP','A21N','3117','2023-08-25T21:43:35.0000000Z','5087'),('CSN5522','ZGNN','ZUMY','A20N','7700','2023-08-25T22:03:52.0000000Z','194'),('DKH3117','ZSSS','ZPPP','A21N','3117','2023-08-25T23:08:33.0000000Z','869');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_atc`
--

DROP TABLE IF EXISTS `history_atc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_atc` (
  `cid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `callsign` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `frequency` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logon_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `online_time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_atc`
--

LOCK TABLES `history_atc` WRITE;
/*!40000 ALTER TABLE `history_atc` DISABLE KEYS */;
INSERT INTO `history_atc` VALUES ('6067','PRC_OBS','199.998','2023-08-15T18:47:58.0000000Z ',857),('1275','ZBAA_TWR','199.998','2023-08-19T18:51:36.0000000Z ',378),('1275','ZSOF_TWR','199.998','2023-08-19T18:59:22.0000000Z ',652),('1275','ZSOF_APP','199.998','2023-08-19T19:01:17.0000000Z ',30),('1275','ZSOF_APP','119.850','2023-08-19T19:02:07.0000000Z ',489),('5250','ZBAD_TWR','199.998','2023-08-19T19:14:04.0000000Z ',337),('5250','ZBYN_TWR','199.998','2023-08-19T20:44:31.0000000Z ',127),('1275','ZSSS_APP','199.998','2023-08-19T21:16:18.0000000Z ',116),('5250','ZSSS_TWR','199.998','2023-08-19T22:37:21.0000000Z ',2739),('1275','ZSSS_APP','199.998','2023-08-19T22:37:46.0000000Z ',2714),('1275','ZSJN_TWR','199.998','2023-08-20T18:59:58.0000000Z ',5329),('CDC4148','4148_OBS','199.998','2023-08-20T20:16:59.0000000Z ',48),('CDC4148','4148_OBS','199.998','2023-08-20T20:18:06.0000000Z ',254),('CDC4148','ZHHH_CTR','199.998','2023-08-20T20:22:44.0000000Z ',118),('CDC4148','ZSSS_CTR','134.350','2023-08-20T20:24:56.0000000Z ',16),('CDC4148','ZSJN_CTR','120.950','2023-08-20T20:25:37.0000000Z ',6),('CDC4148','ZHHH_CTR','199.998','2023-08-20T20:29:10.0000000Z ',2162),('CES6259','ZSHA_CTR','199.998','2023-08-20T20:30:06.0000000Z ',2),('CES6259','ZSHA_CTR','124.550','2023-08-20T20:30:19.0000000Z ',576),('CES6259','ZSHA_CTR','124.550','2023-08-20T20:39:57.0000000Z ',312),('CES6259','ZSHA_CTR','199.998','2023-08-20T20:46:01.0000000Z ',59),('CFC6259','ZSHA__CTR','199.998','2023-08-20T20:47:33.0000000Z ',129),('CES6259','PRC_FSS','199.998','2023-08-20T20:51:31.0000000Z ',13),('1275','ZSSS_GND','199.998','2023-08-20T21:08:26.0000000Z ',3838),('5250','ZSSS_TWR','199.998','2023-08-20T21:08:35.0000000Z ',3536),('CDC4148','ZSSS_APP','120.300','2023-08-20T21:14:32.0000000Z ',3148),('CES6259','ZSSS_CTR','120.300','2023-08-20T21:20:54.0000000Z ',2),('CES6259','ZSSS_I_CTR','120.950','2023-08-20T21:21:13.0000000Z ',738),('CES6259','ZSSS_APN','120.950','2023-08-20T21:33:44.0000000Z ',1945),('2270','CES4350','199.998','2023-08-20T21:43:51.0000000Z ',6370),('6067','ZSSS_OBS','199.998','2023-08-20T21:45:50.0000000Z ',1372),('1012','ZSSS_CNM','111.451','2023-08-20T21:54:03.0000000Z ',777),('1012','ZSSS_CNM','111.451','2023-08-20T22:07:12.0000000Z ',181),('CDC4148','ZSSS_APP','120.300','2023-08-20T22:07:22.0000000Z ',100),('6067','ZSSS_OBS','199.998','2023-08-21T22:15:10.0000000Z ',25),('6067','ZSSS_OBS','199.998','2023-08-21T22:49:36.0000000Z ',2610),('robo','ZSNJ_ATIS','126.250','2023-08-21T22:54:18.0000000Z ',2076),('robo','ZUUU_ATIS','128.600','2023-08-21T22:54:29.0000000Z ',2065),('1275','ZBAA_TWR','199.998','2023-08-22T13:48:28.0000000Z ',9383),('1275','ZBAD_TWR','118.500','2023-08-22T16:25:08.0000000Z ',3315),('robo','ZBAA_ATIS','127.600','2023-08-22T19:32:47.0000000Z ',5050),('robo','ZBYN_ATIS','199.999','2023-08-22T19:33:03.0000000Z ',5034),('robo','ZSOF_ATIS','128.850','2023-08-22T19:33:08.0000000Z ',5029),('robo','ZLDH_ATIS','199.999','2023-08-22T20:02:04.0000000Z ',3293),('robo','ZLLL_ATIS','199.999','2023-08-22T20:02:09.0000000Z ',3288),('1275','ZSOF_TWR','118.750','2023-08-22T20:58:02.0000000Z ',1745),('robo','ZSSS_ATIS','132.250','2023-08-22T21:19:14.0000000Z ',473),('robo','ZGGG_ATIS','128.600','2023-08-22T21:19:35.0000000Z ',452),('6067','ZGGG_OBS','199.998','2023-08-22T21:20:28.0000000Z ',399),('1012','ZGGG_APP','126.550','2023-08-22T21:20:28.0000000Z ',399),('robo','ZSNJ_ATIS','126.250','2023-08-23T18:59:49.0000000Z ',12954),('robo','ZSJN_ATIS','127.050','2023-08-23T19:31:49.0000000Z ',11034),('robo','ZSSS_ATIS','132.250','2023-08-23T19:32:04.0000000Z ',11019),('robo','ZSPD_ATIS','127.850','2023-08-24T08:47:00.0000000Z ',14),('robo','ZBAA_ATIS','127.600','2023-08-24T13:05:40.0000000Z ',10),('1275','ZBAA_TWR','118.500','2023-08-24T21:31:01.0000000Z ',13),('robo','ZBAA_ATIS','127.600','2023-08-24T21:44:11.0000000Z ',2687),('robo','ZSPD_ATIS','127.850','2023-08-24T21:44:27.0000000Z ',2671),('robo','ZSYA_ATIS','199.999','2023-08-24T21:45:04.0000000Z ',2634),('1275','ZSYA_TWR','130.450','2023-08-24T22:16:50.0000000Z ',728),('1275','ZBAA_TWR','118.500','2023-08-24T22:28:57.0000000Z ',1),('1275','ZBAA_TWR','118.500','2023-08-25T00:09:42.0000000Z ',26267),('robo','ZBAA_ATIS','127.600','2023-08-25T21:42:59.0000000Z ',11),('robo','ZPPP_ATIS','128.450','2023-08-25T21:44:27.0000000Z ',419),('robo','ZSSS_ATIS','132.250','2023-08-25T21:44:48.0000000Z ',398),('CHH5702','ZPPP_02_APP','123.800','2023-08-25T22:57:14.0000000Z ',698),('1275','ZPPP_TWR','118.100','2023-08-25T22:58:35.0000000Z ',617),('robo','ZPPP_ATIS','128.450','2023-08-25T23:09:16.0000000Z ',805),('robo','ZSSS_ATIS','132.250','2023-08-25T23:09:32.0000000Z ',789),('1275','补时常','补时常','2023-08-26T23:09:32.0000000Z \r\n',108000);
/*!40000 ALTER TABLE `history_atc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notice` (
  `tittle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `push` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES ('功能恢复','飞控系统全部功能均已恢复','2023-07-28','DKH6067'),('论坛链接','•平台重要地址一览\r\n论坛 bbs.cfcsim.cn\r\n呼号注册 https://imp.cfcsim.cn/register.php/\r\n联飞地图 https://imp.cfcsim.cn/map/\r\n微信公众号：fly_cfcsim\r\n•联飞专区一览\r\n语音服务器：ts.cfcsim.cn\r\n联飞服务器(ECHO/SWIFT):fly.cfcsim.cn\r\n','2023-08-14','CFCSIM'),('虚航系统已迁移至VA系统','虚航系统已迁移至VA系统，VA地址：va.cfcsim.cn','2023-08-30','CFCSIM技术组-6067');
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test` (
  `user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pwd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_num` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_grade` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pwd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_num` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_grade` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Ariven','157fd42534a1a058a8ee3de1104dfbbfee6d37b1a3930157b25b24b8da4d680a','6067','3208629021@qq.com','12','CES'),('markzhang','dd207d7b3cdc9e89531d9f8add356a5e00ab56ba0c4aed6865272da66ca0099b','2270','mark20090227@outlook.com','1','CES'),('1012','5197f6e3d2eee5eb6ea3dd91d28b86d3eff1e19ecc65d7867bb14d92a6ffda6c','1012','1156393759@qq.com','12','CFC'),('Dreamlifter','a1205e621409600f989dab4ebecf38b5e6e284b8366228916efaac0e9b273465','CPA0374','3267720582@qq.com','1','CFC'),('8312','a1205e621409600f989dab4ebecf38b5e6e284b8366228916efaac0e9b273465','8312','199@163.com','1','CFC'),('4248','b6332fbf04a1ff5b6fc0c486f7b24cd088a16712f3c754ad7046da5869dc8160','CSN4248','bingslke@gmail.com','1','CFC'),('3617','e4f164675429522a17ba9f3814b103c671ca41ba7ec230b88000a79f64a9dc44','3617','1848519298@qq.com','3','CFC'),('1275','131b64dd63a2e18f558bfda4d74c8ff6e706f93a0668d8c4db977fb01d0231ac','1275','1697117428@qq.com','4','CES'),('LingFeng1212','4de877be3a8f71b6f66f475d277652bae6dbb9566d3fe2e055102bf463bb1158','0666','735806388@qq.com','3','CFC'),('6459','39ab7993eb429bcfbd3a4ad9ae632e16f7aefd2ca07a1c9b6ba18f7fbb41368b','6459','2606285384@qq.com','1','CFC'),('Quarkchen','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','3045','1530541242@qq.com','1','CFC'),('BOCCHI','007b5cdd64fe9baa045cc869c8bb12c0a48e0f1dd6164c0c663c63d4927af954','0222','2549794806@qq.com','1','CFC'),('Similing','12d26951ea2988742c7b6a6c0d141fb9a687a2e2b19fa6b2e50469b0f5b66edc','7011','3500140348@qq.com','1','CFC'),('0310','44b74ef8ad62df89b5763e961d292d8a8efbe7a1378e6d475ad4ed3f12282293','0310','2470889949@qq.com','1','CFC'),('3579','774d637ac7cd4925df5cc874f4d7b3de43e8ca806a2364ce2a1d4a9b78ee17d2','3579','haodoudou777@163.com','1','CFC'),('leaf','b22e6401bcdafcb42f1fa1b7f699065e538c8a0240862c747e6e5401de7a3c94','2057','776993911@qq.com','1','CHH'),('Boyan Gu','f969248d621bcded4a3582a1c3b17a71eedfefa9120c36ee3bd1957438cd55b9','8247','2272982105@qq.com','1','CFC'),('BeamNG','6f450ff784e4c3ca108d8e1e3250568784e3252bb9b1bbcfd38c23a81b39fdd9','9621','1151338048@qq.com','3','CFC'),('3611','cfa8b7668036e0ecbafccf7557b614cdf19908a20d3ed874acbbebde12855c64','3611','1354287187@qq.com','1','CFC'),('XWTX','516616953ed241b53be6b8a5a9e2b4b66f80916311abca010a34b597a662de9f','5250','xiaowutongxue5250@qq.com','1','CCA'),('whjsh123','cb05fa2a5e2b7378faa49406a924a4f2113dd5d9e28c60df3e428e45857b3920','CSN327','601708709@qq.com','1','CFC'),('艾瑞克','9268b80f91adc2f493d7e62e42e5a8332d60b36c05652085371ada73beb4339e','CES2502','jackyan2007@126.com','12','CES'),('Kvaratskhelia77','384fde3636e6e01e0194d2976d8f26410af3e846e573379cb1a09e2f0752d8cc','EMA7777','hurricane331@qq.com','1','CFC'),('mikeos','8c91989366e0a771b67f9b0c032c0fcf6a53e9333f756f36574122fe60924505','1150','fdzdjcs194@inbox.wep.email','1','CFC'),('zhanghulu','6b05f57ba00b7354c76df6603cc264b14defe3c11efa9fa464a27bdfb81645dd','4151','i@zhanghulu.cn','1','CFC'),('zhanghulu','3328417e39642a57d6dfd83e282c69d4eab9d964225dbf467be4b80a2249419c','4151','i@zhanghulu.cn','1','CFC'),('wang','c390de165191b27f0bd59604bba93b558ef23e612e6421b10792841a1e4ab742','CES 7520','2118158701@qq.com','1','CFC'),('miaoshulin','d31f40c1f29fd0952e566f77ed5490b01cb0fb2c324480046deadbbd40b0486e','9030','26865997@qq.com','1','CES'),('司念凡','41bfae6ab5a962188e0d9771f98afe99713d5109a8995f94b7c820e39a6095c0','0915','1955161058@qq.com','1','CFC'),('羊不过二月','b3df056b30cfde03ab3ddfda5d4d8dcb2c41e6e1093a36a926fcdec312a69a03','7557','3270552484@qq.com','1','CFC'),('3117','2b411804a63e4ba3e4113caed83c99d1545adfbbd03a311756350d678abab3df','3117','481752682@qq.com','12','DKH'),('3117','2b411804a63e4ba3e4113caed83c99d1545adfbbd03a311756350d678abab3df','3117','481752682@qq.com','12','DKH'),('Cheng.','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','5702','3117372879@qq.com','12','CHH'),('明川','08728c3c644f55877aabd76e78fb411e75469be0d3e28b84fce6f31db73e2b68','6860','3566286740@qq.com','1','CFC'),('明川','2fd3a9ace7bc3cf24bbf352845247b51dd294d95a2c15830015cea6bb3585a7c','6860','3566286740@qq.com','1','CFC'),('YangqingZeng','729bd615285ac069c8a2a4dc6596b296471f52a6b601d62612dec17557d460bb','6486','3104556326@qq.com','1','CES'),('chushaobin','61f7bbc5e3fbdf88fa726f06a786497ee6d3aed70b3bbb455982752ef032f483','CDC4148','2641734236@qq.com','8','CFC'),('Dream1018','3d33389c21d66d1f2f1a0572ff620e76a94c8a2eef348ba585dd3900dfb3a170','1018','3165764632@qq.com','1','CCA'),('Airched','f86e0ef3ae4045d213432e5b7b597b426627425e4b64a1a4f241592de3e58b11','5482','2359127545@qq.com','1','CCA'),('刘华强','6d2a6abf26117d760eef154c884b91718cf0e7d1ee5110bb5573a0113ec15688','3366','yuyuansuancai@126.com','1','CFC'),('Maladjustment','901d5546e0682ce474ec0bd12f9844b80fdab68ecd91e42b995b505b8e2e2559','CI6639','13421702167@163.com','1','CFC'),('ElliotSebastian','df90032fb2c39159463d4556c85f27660714d5db179a94a8adbe16cf9c8e4e5b','5312','2507287078@qq.com','1','CFC'),('zhuhongyu','a326ac10477a154800fb2defea810150ce179bb989e90a283f4a394eee1c1d5a','CUA4735','zhuhongyu1232022@outlook.com','1','CFC'),('zhuhongyu','a326ac10477a154800fb2defea810150ce179bb989e90a283f4a394eee1c1d5a','4735','zhuhongyu1232022@outlook.com','1','CCA'),('SuYYN','63151373749ff2a85b8088d8c9235dbdcb6bfda0dc31a185af716c84443e39e9','1575','2792955157@qq.com','1','DKH'),('见秋天','2ab806d455d083da9acdd8ef6ec40fd397363121036d772f57403a9966c2358a','5778','2642698062@qq.com','1','CFC'),('ASDF','e37325a56b8def28ea62cdb1ee8fea1ac68a29e07e4c91b4d89bc302ad8b8b11','CI9995','dfghhhh@163.com','1','CFC'),('Texet_V','8d4347c31990099c6a39edd3aa7f444862fa30b9db8f290621342b443832c60f','8920','alan_zhen@126.com','1','CFC'),('Houcyun','d6281c86b3cd4b8b6e4485bdfd3f874206504e6419b1123c2daab3e2d5b7e604','3325','airalien@qq.com','1','CFC'),('Houcyun','d6281c86b3cd4b8b6e4485bdfd3f874206504e6419b1123c2daab3e2d5b7e604','3325','airalien@qq.com','1','CFC'),('0624','44fc2f62bafe33f96b6544d908eead91470a0fb1573b483be23145dbae19ed68','KNA0417','3173993699@qq.com','1','CCA'),('Devil.','9a01efa7d3ee526e63d65091f7ad3eb5d8bedf2247e26e5a625a41dee673ff77','3622','3489373447@qq.com','1','CFC'),('晋旭','40074995af80995471fd67981afcbee98c5b564021a7baf4d4da6164f1ecc6f0','0717','2399814465@qq.com','1','CFC'),('zuckmodern','384fde3636e6e01e0194d2976d8f26410af3e846e573379cb1a09e2f0752d8cc','2101','9573936511@qq.com','1','CFC'),('jdjdjdjdj','ce551b0da04d4412e05d613a23322c95456a266c1658e24cb794c6bc404c1425','1014','sajak@smsk.sksk','1','CFC'),('dnzjssj','088ea190a93cae12383a41d7cba337b237dc320fe5821bf964e0106e22eab236','2382','wjwjwj@sksks.sk','1','CFC'),('dndjdj','1ac566be31377824079002840c7ae8566fe67baac5f05871fb2e1741695be359','1145','Jaj@8228.sksk','1','CFC'),('dndjdj','1ac566be31377824079002840c7ae8566fe67baac5f05871fb2e1741695be359','1145','Jaj@8228.sksk','1','CFC'),('dndjdj','1ac566be31377824079002840c7ae8566fe67baac5f05871fb2e1741695be359','1145','Jaj@8228.sksk','1','CFC'),('zuckderg','384fde3636e6e01e0194d2976d8f26410af3e846e573379cb1a09e2f0752d8cc','1919','szj@2818.so','1','CFC'),('地狱前台莫尼卡','f7829398680f9fa12109bca4488b4e20c1caca5cb288a9485d65a4d951af6673','4083','sdfsshvw@qq.com','1','HBH'),('ZBSN_1302','84c9e25261ffa2bafcfddad431a839be2b9b9b934cd8424d7d84f8cdc486a53c','1302','syh1105@yeah.net','1','HBH'),('余鲲','94e1630ee1b26b6a62c0f19cce83e6a339463e4c2aa1407720677516e98d0aa8','0770','3427602947@qq.com','1','CFC'),('test','157fd42534a1a058a8ee3de1104dfbbfee6d37b1a3930157b25b24b8da4d680a','8521','3208629021@qq.com','1','CFC'),('1235','157fd42534a1a058a8ee3de1104dfbbfee6d37b1a3930157b25b24b8da4d680a','2487','3208629021@qq.com','1','CFC'),('慕容','59341edb6c43b9d9e51a5644f4278b499c4581cc50a2b3f9b7a553dbf71cb2bd','DKH1033','310394932@qq.com','1','CFC'),('fhx2632989','cf4d4bc67cb14e0ee2fb394f3d9e3b2c4f64a66356ec364f2ce6516557a0d417','7764','399171238@qq.com','1','CFC');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'efb'
--

--
-- Dumping routines for database 'efb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-08 23:43:35
