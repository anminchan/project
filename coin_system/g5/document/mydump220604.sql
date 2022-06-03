-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: coinmktgogo77
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `g5_accesslog`
--

DROP TABLE IF EXISTS `g5_accesslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_accesslog` (
  `index_no` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL,
  `log_ip` varchar(100) NOT NULL DEFAULT '',
  `log_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_referer` text NOT NULL,
  `log_memo` text,
  `log_gubun` varchar(255) DEFAULT '',
  PRIMARY KEY (`index_no`)
) ENGINE=MyISAM AUTO_INCREMENT=418 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_accesslog`
--

LOCK TABLES `g5_accesslog` WRITE;
/*!40000 ALTER TABLE `g5_accesslog` DISABLE KEYS */;
INSERT INTO `g5_accesslog` VALUES (390,'zx01','45.67.97.54','2022-06-02 19:13:10','http://gc-gogo777.com/','계좌확인요청','account view'),(391,'zx01','45.67.97.54','2022-06-02 19:27:36','http://gc-gogo777.com/','계좌확인요청','account view'),(392,'zx01','45.67.97.54','2022-06-02 19:30:14','http://gc-gogo777.com/bbs/coin_request_form.php','코인구매요청','buy'),(393,'zx01','45.67.97.54','2022-06-02 19:33:12','http://gc-gogo777.com/','코인전환요청','balance'),(394,'zx01','45.67.97.54','2022-06-02 19:34:17','http://gc-gogo777.com/bbs/coin_change_form.php','코인전환요청','balance'),(395,'zx01','45.67.97.54','2022-06-02 19:39:01','http://gc-gogo777.com/','계좌확인요청','account view'),(396,'zx01','45.67.97.54','2022-06-02 19:40:43','http://gc-gogo777.com/','코인전환요청','balance'),(397,'zx01','45.67.97.54','2022-06-02 19:40:45','http://gc-gogo777.com/','코인전환요청','balance'),(398,'zx01','45.67.97.54','2022-06-03 11:42:31','http://gc-gogo777.com/','계좌확인요청','account view'),(399,'bong6607','45.67.97.54','2022-06-03 16:10:19','http://gc-gogo777.com/','계좌확인요청','account view'),(400,'krheo9853','45.67.97.54','2022-06-03 16:31:03','http://gc-gogo777.com/','계좌확인요청','account view'),(401,'krheo9853','45.67.97.54','2022-06-03 16:31:57','http://gc-gogo777.com/bbs/coin_request_form.php','코인구매요청','buy'),(402,'bong6607','45.67.97.54','2022-06-03 16:33:23','http://gc-gogo777.com/','계좌확인요청','account view'),(403,'bong6607','45.67.97.54','2022-06-03 16:34:18','http://gc-gogo777.com/bbs/coin_request_form.php','코인구매요청','buy'),(404,'krheo9853','45.67.97.54','2022-06-03 16:35:18','http://gc-gogo777.com/','계좌확인요청','account view'),(405,'bong6607','45.67.97.54','2022-06-03 16:35:40','http://gc-gogo777.com/','계좌확인요청','account view'),(406,'bong6607','45.67.97.54','2022-06-03 16:39:10','http://gc-gogo777.com/bbs/coin_request.php','계좌확인요청','account view'),(407,'bong6607','45.67.97.54','2022-06-03 16:39:13','http://gc-gogo777.com/','코인전환요청','balance'),(408,'bong6607','45.67.97.54','2022-06-03 16:39:19','http://gc-gogo777.com/bbs/coin_change_form.php','코인전환요청','balance'),(409,'krheo9853','45.67.97.54','2022-06-03 16:40:14','http://gc-gogo777.com/','코인전환요청','balance'),(410,'krheo9853','45.67.97.54','2022-06-03 16:40:30','http://gc-gogo777.com/bbs/coin_change_form.php','코인전환요청','balance'),(411,'ssim1004','45.67.97.54','2022-06-03 18:06:02','http://gc-gogo777.com/','계좌확인요청','account view'),(412,'ssim1004','45.67.97.54','2022-06-03 18:07:47','http://gc-gogo777.com/bbs/coin_request_form.php','코인구매요청','buy'),(413,'ssim1004','45.67.97.54','2022-06-03 18:12:05','http://gc-gogo777.com/','계좌확인요청','account view'),(414,'ssim1004','45.67.97.54','2022-06-03 18:14:15','http://gc-gogo777.com/','계좌확인요청','account view'),(415,'ssim1004','45.67.97.54','2022-06-03 18:14:19','http://gc-gogo777.com/','코인전환요청','balance'),(416,'ssim1004','45.67.97.54','2022-06-03 18:14:31','http://gc-gogo777.com/bbs/coin_change_form.php','코인전환요청','balance'),(417,'ssim1004','194.5.49.165','2022-06-03 18:40:07','http://gc-gogo777.com/','계좌확인요청','account view');
/*!40000 ALTER TABLE `g5_accesslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_account`
--

DROP TABLE IF EXISTS `g5_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_account` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_name` varchar(255) NOT NULL DEFAULT '',
  `ac_holder` varchar(100) NOT NULL,
  `account` varchar(255) NOT NULL DEFAULT '',
  `ac_state` tinyint(4) NOT NULL DEFAULT '1',
  `ac_memo` text,
  `mb_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_account`
--

LOCK TABLES `g5_account` WRITE;
/*!40000 ALTER TABLE `g5_account` DISABLE KEYS */;
INSERT INTO `g5_account` VALUES (9,'테스트','테스트','7777777',0,'테스트중입니다.','seller_yyeh9'),(10,'토스뱅크','조승희','100000340292',1,'※ 입금 후 신청 부탁드립니다 (신청 후 입금시 늦어질수 있음)\r\n※ 최소 입금 금액은 10,000원 부터이며 클릭하여 설정가능합니다.\r\n※ 입금 전 입금계좌정보 필수로 확인해주세요.\r\n※ 수표입금은 받지않습니다. 입금시 환불불가\r\n※ 입금자명과 회원정보가 일치해야 입금확인 가능합니다.\r\n※ 토스나 각종 페이 등 입금대행 어플을 사용하여 입금할시 거래내역을 확인할 수가 없습니다.ex) 토스, 카카오페이 등','seller_z3mi10');
/*!40000 ALTER TABLE `g5_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_auth`
--

DROP TABLE IF EXISTS `g5_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_auth` (
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `au_menu` varchar(20) NOT NULL DEFAULT '',
  `au_auth` set('r','w','d') NOT NULL DEFAULT '',
  PRIMARY KEY (`mb_id`,`au_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_auth`
--

LOCK TABLES `g5_auth` WRITE;
/*!40000 ALTER TABLE `g5_auth` DISABLE KEYS */;
INSERT INTO `g5_auth` VALUES ('nimda1','300900','r,w,d'),('nimda1','200810','r'),('nimda1','200100','r,w,d'),('nimda1','200800','r'),('nimda1','100600','r'),('nimda1','300950','r,w,d'),('nimda1','300910','r,w,d'),('nimda1','300920','r,w,d'),('nimda1','300930','r'),('nimda1','300940','r'),('nimda1','300960','r'),('nimda1','300970','r,w,d'),('nimda1','300980','r'),('nimda1','300990','r'),('nimda2','300900','r,w,d'),('nimda2','200810','r'),('nimda2','200100','r,w,d'),('nimda2','200800','r'),('nimda2','100600','r'),('nimda2','300950','r,w,d'),('nimda2','300910','r,w,d'),('nimda2','300920','r,w,d'),('nimda2','300930','r'),('nimda2','300940','r'),('nimda2','300960','r'),('nimda2','300970','r,w,d'),('nimda2','300980','r'),('nimda2','300990','r'),('mng365','300900','r'),('mng365','200810','r'),('mng365','200100','r'),('mng365','200800','r'),('mng365','100600','r'),('mng365','300950','r'),('mng365','300910','r'),('mng365','300920','r'),('mng365','300930','r'),('mng365','300940','r'),('mng365','300960','r'),('mng365','300970','r'),('mng365','300980','r'),('mng365','300990','r'),('view_adm','200100','r,w'),('view_adm','300910','r'),('view_adm','300920','r'),('view_adm','300930','r'),('view_adm','300940','r'),('view_adm','300980','r,w,d'),('seller_yyeh9','200100','r'),('seller_yyeh9','300910','r'),('seller_yyeh9','300920','r'),('seller_yyeh9','300930','r'),('seller_yyeh9','300940','r'),('seller_z3mi10','200100','r'),('seller_z3mi10','300910','r'),('seller_z3mi10','300920','r'),('seller_z3mi10','300930','r'),('seller_z3mi10','300940','r'),('view','200100','r,w'),('view','300910','r'),('view','300920','r'),('view','300930','r'),('view','300940','r'),('view','300980','r,w,d');
/*!40000 ALTER TABLE `g5_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_autosave`
--

DROP TABLE IF EXISTS `g5_autosave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_autosave` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL,
  `as_uid` bigint(20) unsigned NOT NULL,
  `as_subject` varchar(255) NOT NULL,
  `as_content` text NOT NULL,
  `as_datetime` datetime NOT NULL,
  PRIMARY KEY (`as_id`),
  UNIQUE KEY `as_uid` (`as_uid`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_autosave`
--

LOCK TABLES `g5_autosave` WRITE;
/*!40000 ALTER TABLE `g5_autosave` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_autosave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_board`
--

DROP TABLE IF EXISTS `g5_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_board` (
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `gr_id` varchar(255) NOT NULL DEFAULT '',
  `bo_subject` varchar(255) NOT NULL DEFAULT '',
  `bo_mobile_subject` varchar(255) NOT NULL DEFAULT '',
  `bo_device` enum('both','pc','mobile') NOT NULL DEFAULT 'both',
  `bo_admin` varchar(255) NOT NULL DEFAULT '',
  `bo_list_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_read_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_write_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_reply_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_comment_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_upload_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_download_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_html_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_link_level` tinyint(4) NOT NULL DEFAULT '0',
  `bo_count_delete` tinyint(4) NOT NULL DEFAULT '0',
  `bo_count_modify` tinyint(4) NOT NULL DEFAULT '0',
  `bo_read_point` int(11) NOT NULL DEFAULT '0',
  `bo_write_point` int(11) NOT NULL DEFAULT '0',
  `bo_comment_point` int(11) NOT NULL DEFAULT '0',
  `bo_download_point` int(11) NOT NULL DEFAULT '0',
  `bo_use_category` tinyint(4) NOT NULL DEFAULT '0',
  `bo_category_list` text NOT NULL,
  `bo_use_sideview` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_file_content` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_secret` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_dhtml_editor` tinyint(4) NOT NULL DEFAULT '0',
  `bo_select_editor` varchar(50) NOT NULL DEFAULT '',
  `bo_use_rss_view` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_good` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_nogood` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_name` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_signature` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_ip_view` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_list_view` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_list_file` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_list_content` tinyint(4) NOT NULL DEFAULT '0',
  `bo_table_width` int(11) NOT NULL DEFAULT '0',
  `bo_subject_len` int(11) NOT NULL DEFAULT '0',
  `bo_mobile_subject_len` int(11) NOT NULL DEFAULT '0',
  `bo_page_rows` int(11) NOT NULL DEFAULT '0',
  `bo_mobile_page_rows` int(11) NOT NULL DEFAULT '0',
  `bo_new` int(11) NOT NULL DEFAULT '0',
  `bo_hot` int(11) NOT NULL DEFAULT '0',
  `bo_image_width` int(11) NOT NULL DEFAULT '0',
  `bo_skin` varchar(255) NOT NULL DEFAULT '',
  `bo_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `bo_include_head` varchar(255) NOT NULL DEFAULT '',
  `bo_include_tail` varchar(255) NOT NULL DEFAULT '',
  `bo_content_head` text NOT NULL,
  `bo_mobile_content_head` text NOT NULL,
  `bo_content_tail` text NOT NULL,
  `bo_mobile_content_tail` text NOT NULL,
  `bo_insert_content` text NOT NULL,
  `bo_gallery_cols` int(11) NOT NULL DEFAULT '0',
  `bo_gallery_width` int(11) NOT NULL DEFAULT '0',
  `bo_gallery_height` int(11) NOT NULL DEFAULT '0',
  `bo_mobile_gallery_width` int(11) NOT NULL DEFAULT '0',
  `bo_mobile_gallery_height` int(11) NOT NULL DEFAULT '0',
  `bo_upload_size` int(11) NOT NULL DEFAULT '0',
  `bo_reply_order` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_search` tinyint(4) NOT NULL DEFAULT '0',
  `bo_order` int(11) NOT NULL DEFAULT '0',
  `bo_count_write` int(11) NOT NULL DEFAULT '0',
  `bo_count_comment` int(11) NOT NULL DEFAULT '0',
  `bo_write_min` int(11) NOT NULL DEFAULT '0',
  `bo_write_max` int(11) NOT NULL DEFAULT '0',
  `bo_comment_min` int(11) NOT NULL DEFAULT '0',
  `bo_comment_max` int(11) NOT NULL DEFAULT '0',
  `bo_notice` text NOT NULL,
  `bo_upload_count` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_email` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_cert` enum('','cert','adult','hp-cert','hp-adult') NOT NULL DEFAULT '',
  `bo_use_sns` tinyint(4) NOT NULL DEFAULT '0',
  `bo_use_captcha` tinyint(4) NOT NULL DEFAULT '0',
  `bo_sort_field` varchar(255) NOT NULL DEFAULT '',
  `bo_1_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_2_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_3_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_4_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_5_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_6_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_7_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_8_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_9_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_10_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_1` varchar(255) NOT NULL DEFAULT '',
  `bo_2` varchar(255) NOT NULL DEFAULT '',
  `bo_3` varchar(255) NOT NULL DEFAULT '',
  `bo_4` varchar(255) NOT NULL DEFAULT '',
  `bo_5` varchar(255) NOT NULL DEFAULT '',
  `bo_6` varchar(255) NOT NULL DEFAULT '',
  `bo_7` varchar(255) NOT NULL DEFAULT '',
  `bo_8` varchar(255) NOT NULL DEFAULT '',
  `bo_9` varchar(255) NOT NULL DEFAULT '',
  `bo_10` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`bo_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_board`
--

LOCK TABLES `g5_board` WRITE;
/*!40000 ALTER TABLE `g5_board` DISABLE KEYS */;
INSERT INTO `g5_board` VALUES ('notice','community','공지사항','','both','',1,1,1,1,1,1,1,1,1,1,1,-1,5,1,-20,0,'',0,0,0,0,'',0,0,0,0,0,0,0,0,0,100,60,30,15,15,24,100,835,'basic','basic','_head.php','_tail.php','','','','','',4,202,150,125,100,1048576,1,0,0,0,0,0,0,0,0,'',2,0,'',0,0,'','','','','','','','','','','','','','','','','','','','',''),('qa','community','질문답변','','both','',1,1,1,1,1,1,1,1,1,1,1,-1,5,1,-20,0,'',0,0,0,0,'',0,0,0,0,0,0,0,0,0,100,60,30,15,15,24,100,835,'basic','basic','_head.php','_tail.php','','','','','',4,202,150,125,100,1048576,1,0,0,0,0,0,0,0,0,'',2,0,'',0,0,'','','','','','','','','','','','','','','','','','','','',''),('free','community','자유게시판','','both','',1,1,1,1,1,1,1,1,1,1,1,-1,5,1,-20,0,'',0,0,0,0,'',0,0,0,0,0,0,0,0,0,100,60,30,15,15,24,100,835,'basic','basic','_head.php','_tail.php','','','','','',4,202,150,125,100,1048576,1,0,0,0,0,0,0,0,0,'',2,0,'',0,0,'','','','','','','','','','','','','','','','','','','','',''),('gallery','community','갤러리','','both','',1,1,1,1,1,1,1,1,1,1,1,-1,5,1,-20,0,'',0,0,0,0,'',0,0,0,0,0,0,0,0,0,100,60,30,15,15,24,100,835,'gallery','gallery','_head.php','_tail.php','','','','','',4,202,150,125,100,1048576,1,0,0,0,0,0,0,0,0,'',2,0,'',0,0,'','','','','','','','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `g5_board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_board_file`
--

DROP TABLE IF EXISTS `g5_board_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_board_file` (
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int(11) NOT NULL DEFAULT '0',
  `bf_no` int(11) NOT NULL DEFAULT '0',
  `bf_source` varchar(255) NOT NULL DEFAULT '',
  `bf_file` varchar(255) NOT NULL DEFAULT '',
  `bf_download` int(11) NOT NULL,
  `bf_content` text NOT NULL,
  `bf_fileurl` varchar(255) NOT NULL DEFAULT '',
  `bf_thumburl` varchar(255) NOT NULL DEFAULT '',
  `bf_storage` varchar(50) NOT NULL DEFAULT '',
  `bf_filesize` int(11) NOT NULL DEFAULT '0',
  `bf_width` int(11) NOT NULL DEFAULT '0',
  `bf_height` smallint(6) NOT NULL DEFAULT '0',
  `bf_type` tinyint(4) NOT NULL DEFAULT '0',
  `bf_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`bo_table`,`wr_id`,`bf_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_board_file`
--

LOCK TABLES `g5_board_file` WRITE;
/*!40000 ALTER TABLE `g5_board_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_board_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_board_good`
--

DROP TABLE IF EXISTS `g5_board_good`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_board_good` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `bg_flag` varchar(255) NOT NULL DEFAULT '',
  `bg_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`bg_id`),
  UNIQUE KEY `fkey1` (`bo_table`,`wr_id`,`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_board_good`
--

LOCK TABLES `g5_board_good` WRITE;
/*!40000 ALTER TABLE `g5_board_good` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_board_good` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_board_new`
--

DROP TABLE IF EXISTS `g5_board_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_board_new` (
  `bn_id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int(11) NOT NULL DEFAULT '0',
  `wr_parent` int(11) NOT NULL DEFAULT '0',
  `bn_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`bn_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_board_new`
--

LOCK TABLES `g5_board_new` WRITE;
/*!40000 ALTER TABLE `g5_board_new` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_board_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_cert_history`
--

DROP TABLE IF EXISTS `g5_cert_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_cert_history` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `cr_company` varchar(255) NOT NULL DEFAULT '',
  `cr_method` varchar(255) NOT NULL DEFAULT '',
  `cr_ip` varchar(255) NOT NULL DEFAULT '',
  `cr_date` date NOT NULL DEFAULT '0000-00-00',
  `cr_time` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`cr_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_cert_history`
--

LOCK TABLES `g5_cert_history` WRITE;
/*!40000 ALTER TABLE `g5_cert_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_cert_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_coin_req`
--

DROP TABLE IF EXISTS `g5_coin_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_coin_req` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL DEFAULT '' COMMENT '신청아이디',
  `mb_name` varchar(255) DEFAULT NULL,
  `cr_state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '신청상태(0:요청,1:승인,2:취소,3:증감,4:차감,5:전환,6:전환요청,7:전환취)',
  `cr_price` int(11) NOT NULL DEFAULT '0' COMMENT '신청금액',
  `cr_coin` int(11) NOT NULL COMMENT '신청코인',
  `cr_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cr_ip` varchar(25) NOT NULL DEFAULT '',
  `cr_account` varchar(255) DEFAULT NULL COMMENT '신청계좌번호',
  `cr_uptime` datetime DEFAULT NULL COMMENT '처리일자',
  `cr_paymethod` varchar(100) DEFAULT NULL,
  `cr_cancel_date` datetime DEFAULT NULL COMMENT '취소일시',
  `cr_approval_date` datetime DEFAULT NULL COMMENT '승인일시',
  `cr_convert_date` datetime DEFAULT NULL COMMENT '전환일시',
  `cr_memo` text,
  `cr_balance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cr_id`),
  KEY `g5_coin_req_cr_state_idx` (`cr_state`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_coin_req`
--

LOCK TABLES `g5_coin_req` WRITE;
/*!40000 ALTER TABLE `g5_coin_req` DISABLE KEYS */;
INSERT INTO `g5_coin_req` VALUES (58,'zx01','제트엑스',1,100000,10,'2022-06-02 19:30:14','45.67.97.54','카카오뱅크/123456456456/제트엑스','2022-06-02 19:31:35','현금',NULL,'2022-06-02 19:31:35',NULL,NULL,NULL),(59,'zx01','제트엑스',7,0,10,'2022-06-02 19:34:17','45.67.97.54','카카오뱅크/123456456456/제트엑스','2022-06-02 19:35:13',NULL,NULL,NULL,'2022-06-02 19:34:17',NULL,NULL),(60,'krheo9853','허경란',1,1000000,100,'2022-06-03 16:31:57','45.67.97.54','우리은행/14114672502201/허경란','2022-06-03 16:39:14','현금',NULL,'2022-06-03 16:39:14',NULL,NULL,NULL),(61,'bong6607','김봉수',1,2000000,200,'2022-06-03 16:34:18','45.67.97.54','농협은행/20115251073129/김봉수','2022-06-03 16:38:38','현금',NULL,'2022-06-03 16:38:38',NULL,NULL,NULL),(62,'bong6607','김봉수',5,0,200,'2022-06-03 16:39:19','45.67.97.54','농협은행/20115251073129/김봉수','2022-06-03 16:39:32',NULL,NULL,NULL,'2022-06-03 16:39:19',NULL,NULL),(63,'krheo9853','허경란',5,0,100,'2022-06-03 16:40:30','45.67.97.54','우리은행/14114672502201/허경란','2022-06-03 16:40:36',NULL,NULL,NULL,'2022-06-03 16:40:30',NULL,NULL),(64,'ssim1004','이효심',1,8000000,800,'2022-06-03 18:07:47','45.67.97.54','국민은행/32210426926/이효심','2022-06-03 18:14:13','현금',NULL,'2022-06-03 18:14:13',NULL,NULL,NULL),(65,'ssim1004','이효심',5,0,800,'2022-06-03 18:14:31','45.67.97.54','국민은행/32210426926/이효심','2022-06-03 18:14:42',NULL,NULL,NULL,'2022-06-03 18:14:31',NULL,NULL);
/*!40000 ALTER TABLE `g5_coin_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_coin_seller_mng_sum`
--

DROP TABLE IF EXISTS `g5_coin_seller_mng_sum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_coin_seller_mng_sum` (
  `cc_date` date NOT NULL,
  `cc_sum0` int(11) DEFAULT '0' COMMENT '요청',
  `cc_sum1` int(11) DEFAULT '0' COMMENT '승인',
  `cc_sum2` int(11) DEFAULT '0' COMMENT '취소',
  `cc_sum3` int(11) DEFAULT '0' COMMENT '증감',
  `cc_sum4` int(11) DEFAULT '0' COMMENT '차감',
  `cc_sum5` int(11) DEFAULT '0' COMMENT '전환',
  `cc_sum6` int(11) DEFAULT '0' COMMENT '미전환',
  `cc_sum_price0` int(11) DEFAULT '0' COMMENT '요청금액',
  `cc_sum_price1` int(11) DEFAULT '0' COMMENT '승인금액',
  `cc_sum_price2` int(11) DEFAULT '0' COMMENT '취소금액',
  `seller_id` varchar(100) NOT NULL COMMENT '업체아이디',
  KEY `g5_coin_mng_sum_cc_date_IDX` (`cc_date`) USING BTREE,
  KEY `g5_coin_seller_mng_sum_seller_id_IDX` (`seller_id`) USING BTREE
) ENGINE=FEDERATED DEFAULT CHARSET=utf8 CONNECTION='mysql://coinmktcomlink:coinmktcomlink@175.126.73.232:3306/coinmktcompany/g5_coin_seller_mng_sum';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `g5_coin_sum`
--

DROP TABLE IF EXISTS `g5_coin_sum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_coin_sum` (
  `cc_date` date NOT NULL,
  `mb_id` varchar(100) NOT NULL,
  `mb_name` varchar(100) NOT NULL,
  `cc_sum0` int(11) DEFAULT '0' COMMENT '요청',
  `cc_sum1` int(11) DEFAULT '0' COMMENT '승인',
  `cc_sum2` int(11) DEFAULT '0' COMMENT '취소',
  `cc_sum3` int(11) DEFAULT '0' COMMENT '증감',
  `cc_sum4` int(11) DEFAULT '0' COMMENT '차감',
  `cc_sum5` int(11) DEFAULT '0' COMMENT '전환',
  `cc_sum6` int(11) DEFAULT '0' COMMENT '미전환',
  `cc_sum_price0` int(11) DEFAULT '0' COMMENT '요청금액',
  `cc_sum_price1` int(11) DEFAULT '0' COMMENT '승인금액',
  `cc_sum_price2` int(11) DEFAULT '0' COMMENT '취소금액',
  KEY `g5_coin_sum_cc_date_idx` (`cc_date`) USING BTREE,
  KEY `g5_coin_sum_mb_id_idx` (`mb_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_coin_sum`
--

LOCK TABLES `g5_coin_sum` WRITE;
/*!40000 ALTER TABLE `g5_coin_sum` DISABLE KEYS */;
INSERT INTO `g5_coin_sum` VALUES ('2022-06-02','zx01','제트엑스',0,10,0,0,0,0,10,0,100000,0),('2022-06-03','zx01','제트엑스',0,0,0,0,0,0,10,0,0,0),('2022-06-03','krheo9853','허경란',0,100,0,0,0,100,0,0,1000000,0),('2022-06-03','ssim1004','이효심',0,800,0,0,0,800,0,0,8000000,0),('2022-06-03','bong6607','김봉수',0,200,0,0,0,200,0,0,2000000,0);
/*!40000 ALTER TABLE `g5_coin_sum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_config`
--

DROP TABLE IF EXISTS `g5_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_config` (
  `cf_title` varchar(255) NOT NULL DEFAULT '',
  `cf_theme` varchar(100) NOT NULL DEFAULT '',
  `cf_admin` varchar(100) NOT NULL DEFAULT '',
  `cf_admin_email` varchar(100) NOT NULL DEFAULT '',
  `cf_admin_email_name` varchar(100) NOT NULL DEFAULT '',
  `cf_add_script` text NOT NULL,
  `cf_use_point` tinyint(4) NOT NULL DEFAULT '0',
  `cf_point_term` int(11) NOT NULL DEFAULT '0',
  `cf_use_copy_log` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_email_certify` tinyint(4) NOT NULL DEFAULT '0',
  `cf_login_point` int(11) NOT NULL DEFAULT '0',
  `cf_cut_name` tinyint(4) NOT NULL DEFAULT '0',
  `cf_nick_modify` int(11) NOT NULL DEFAULT '0',
  `cf_new_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_new_rows` int(11) NOT NULL DEFAULT '0',
  `cf_search_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_connect_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_faq_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_read_point` int(11) NOT NULL DEFAULT '0',
  `cf_write_point` int(11) NOT NULL DEFAULT '0',
  `cf_comment_point` int(11) NOT NULL DEFAULT '0',
  `cf_download_point` int(11) NOT NULL DEFAULT '0',
  `cf_write_pages` int(11) NOT NULL DEFAULT '0',
  `cf_mobile_pages` int(11) NOT NULL DEFAULT '0',
  `cf_link_target` varchar(50) NOT NULL DEFAULT '',
  `cf_bbs_rewrite` tinyint(4) NOT NULL DEFAULT '0',
  `cf_delay_sec` int(11) NOT NULL DEFAULT '0',
  `cf_filter` text NOT NULL,
  `cf_possible_ip` text NOT NULL,
  `cf_intercept_ip` text NOT NULL,
  `cf_analytics` text NOT NULL,
  `cf_add_meta` text NOT NULL,
  `cf_syndi_token` varchar(255) NOT NULL,
  `cf_syndi_except` text NOT NULL,
  `cf_member_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_use_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `cf_req_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_tel` tinyint(4) NOT NULL DEFAULT '0',
  `cf_req_tel` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_hp` tinyint(4) NOT NULL DEFAULT '0',
  `cf_req_hp` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_addr` tinyint(4) NOT NULL DEFAULT '0',
  `cf_req_addr` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_signature` tinyint(4) NOT NULL DEFAULT '0',
  `cf_req_signature` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_profile` tinyint(4) NOT NULL DEFAULT '0',
  `cf_req_profile` tinyint(4) NOT NULL DEFAULT '0',
  `cf_register_level` tinyint(4) NOT NULL DEFAULT '0',
  `cf_register_point` int(11) NOT NULL DEFAULT '0',
  `cf_icon_level` tinyint(4) NOT NULL DEFAULT '0',
  `cf_use_recommend` tinyint(4) NOT NULL DEFAULT '0',
  `cf_recommend_point` int(11) NOT NULL DEFAULT '0',
  `cf_leave_day` int(11) NOT NULL DEFAULT '0',
  `cf_search_part` int(11) NOT NULL DEFAULT '0',
  `cf_email_use` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_wr_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_wr_group_admin` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_wr_board_admin` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_wr_write` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_wr_comment_all` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_mb_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_mb_member` tinyint(4) NOT NULL DEFAULT '0',
  `cf_email_po_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `cf_prohibit_id` text NOT NULL,
  `cf_prohibit_email` text NOT NULL,
  `cf_new_del` int(11) NOT NULL DEFAULT '0',
  `cf_memo_del` int(11) NOT NULL DEFAULT '0',
  `cf_visit_del` int(11) NOT NULL DEFAULT '0',
  `cf_popular_del` int(11) NOT NULL DEFAULT '0',
  `cf_optimize_date` date NOT NULL DEFAULT '0000-00-00',
  `cf_use_member_icon` tinyint(4) NOT NULL DEFAULT '0',
  `cf_member_icon_size` int(11) NOT NULL DEFAULT '0',
  `cf_member_icon_width` int(11) NOT NULL DEFAULT '0',
  `cf_member_icon_height` int(11) NOT NULL DEFAULT '0',
  `cf_member_img_size` int(11) NOT NULL DEFAULT '0',
  `cf_member_img_width` int(11) NOT NULL DEFAULT '0',
  `cf_member_img_height` int(11) NOT NULL DEFAULT '0',
  `cf_login_minutes` int(11) NOT NULL DEFAULT '0',
  `cf_image_extension` varchar(255) NOT NULL DEFAULT '',
  `cf_flash_extension` varchar(255) NOT NULL DEFAULT '',
  `cf_movie_extension` varchar(255) NOT NULL DEFAULT '',
  `cf_formmail_is_member` tinyint(4) NOT NULL DEFAULT '0',
  `cf_page_rows` int(11) NOT NULL DEFAULT '0',
  `cf_mobile_page_rows` int(11) NOT NULL DEFAULT '0',
  `cf_visit` varchar(255) NOT NULL DEFAULT '',
  `cf_max_po_id` int(11) NOT NULL DEFAULT '0',
  `cf_stipulation` text NOT NULL,
  `cf_privacy` text NOT NULL,
  `cf_open_modify` int(11) NOT NULL DEFAULT '0',
  `cf_memo_send_point` int(11) NOT NULL DEFAULT '0',
  `cf_mobile_new_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_search_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_connect_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_faq_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_member_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_captcha_mp3` varchar(255) NOT NULL DEFAULT '',
  `cf_editor` varchar(50) NOT NULL DEFAULT '',
  `cf_cert_use` tinyint(4) NOT NULL DEFAULT '0',
  `cf_cert_find` tinyint(4) NOT NULL DEFAULT '0',
  `cf_cert_ipin` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_hp` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_simple` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kg_cd` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kg_mid` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kcb_cd` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kcp_cd` varchar(255) NOT NULL DEFAULT '',
  `cf_lg_mid` varchar(100) NOT NULL DEFAULT '',
  `cf_lg_mert_key` varchar(100) NOT NULL DEFAULT '',
  `cf_cert_limit` int(11) NOT NULL DEFAULT '0',
  `cf_cert_req` tinyint(4) NOT NULL DEFAULT '0',
  `cf_sms_use` varchar(255) NOT NULL DEFAULT '',
  `cf_sms_type` varchar(10) NOT NULL DEFAULT '',
  `cf_icode_id` varchar(255) NOT NULL DEFAULT '',
  `cf_icode_pw` varchar(255) NOT NULL DEFAULT '',
  `cf_icode_server_ip` varchar(50) NOT NULL DEFAULT '',
  `cf_icode_server_port` varchar(50) NOT NULL DEFAULT '',
  `cf_icode_token_key` varchar(100) NOT NULL DEFAULT '',
  `cf_googl_shorturl_apikey` varchar(50) NOT NULL DEFAULT '',
  `cf_social_login_use` tinyint(4) NOT NULL DEFAULT '0',
  `cf_social_servicelist` varchar(255) NOT NULL DEFAULT '',
  `cf_payco_clientid` varchar(100) NOT NULL DEFAULT '',
  `cf_payco_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_facebook_appid` varchar(100) NOT NULL,
  `cf_facebook_secret` varchar(100) NOT NULL,
  `cf_twitter_key` varchar(100) NOT NULL,
  `cf_twitter_secret` varchar(100) NOT NULL,
  `cf_google_clientid` varchar(100) NOT NULL DEFAULT '',
  `cf_google_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_naver_clientid` varchar(100) NOT NULL DEFAULT '',
  `cf_naver_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_kakao_rest_key` varchar(100) NOT NULL DEFAULT '',
  `cf_kakao_client_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_kakao_js_apikey` varchar(100) NOT NULL,
  `cf_captcha` varchar(100) NOT NULL DEFAULT '',
  `cf_recaptcha_site_key` varchar(100) NOT NULL DEFAULT '',
  `cf_recaptcha_secret_key` varchar(100) NOT NULL DEFAULT '',
  `cf_1_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_2_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_3_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_4_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_5_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_6_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_7_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_8_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_9_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_10_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_1` varchar(255) NOT NULL DEFAULT '',
  `cf_2` varchar(512) NOT NULL DEFAULT '',
  `cf_3` varchar(512) NOT NULL DEFAULT '',
  `cf_4` varchar(255) NOT NULL DEFAULT '',
  `cf_5` varchar(255) NOT NULL DEFAULT '',
  `cf_6` varchar(255) NOT NULL DEFAULT '',
  `cf_7` varchar(255) NOT NULL DEFAULT '',
  `cf_8` varchar(255) NOT NULL DEFAULT '',
  `cf_9` varchar(255) NOT NULL DEFAULT '',
  `cf_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_config`
--

LOCK TABLES `g5_config` WRITE;
/*!40000 ALTER TABLE `g5_config` DISABLE KEYS */;
INSERT INTO `g5_config` VALUES ('GOGO777코인','basic','nimdasys','admin@domain.com','그누보드5','',1,0,1,0,100,15,60,'basic',15,'basic','basic','basic',0,0,0,0,10,5,'_blank',0,30,'18아,18놈,18새끼,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,씹,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐,ㅅㅂㄹㅁ','','','','','','','basic',0,0,0,0,0,0,0,0,0,0,0,0,2,1000,2,0,0,30,10000,1,0,0,0,0,0,0,0,0,'admin,administrator,관리자,운영자,어드민,주인장,webmaster,웹마스터,sysop,시삽,시샵,manager,매니저,메니저,root,루트,su,guest,방문객','',30,180,180,180,'2022-06-04',2,5000,22,22,50000,60,60,10,'gif|jpg|jpeg|png','swf','asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3',1,15,15,'오늘:28,어제:86,최대:133,전체:322',0,'해당 홈페이지에 맞는 회원가입약관을 입력합니다.','해당 홈페이지에 맞는 개인정보처리방침을 입력합니다.',0,500,'basic','basic','basic','basic','basic','basic','smarteditor2',0,0,'','','','','','','','','',2,0,'','','','','211.172.232.124','7295','','',0,'','','','','','','','','','','','','','','kcaptcha','6Lf5f84eAAAAADL_FIVHhmZpLmNtlJLUez1HvPgO','6Lf5f84eAAAAAMgBZPmEKUX7viSNmySWsEk9aDrK','Wallet_Addr','Refresh_Token','access_token','client_server_ip','1회구매한도','1일구매한도','','','','','eI8OW1vrPXhDcssrRdUd6tlNqxK6uAuIjD','eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifS57ImV4cCI6Ijk5OTk5OTk5OTkiLCJpYXQiOjE2NTM5ODI0OTYsImlkIjoiY29pbm1hcmtldCIsImVtYWlsIjoiWVdSdGFXNUFaRzl0WVdsdUxtTnZiUT09IiwicGFzc3dvcmQiOiJjWGRsTVRJeklVQWoifS5mYzFjYjBiN2I2NmI3MzU1ZDk4ZWUyYjFiNWRjZmU4OGZmZWUzY2M3MWUzZmQ2N2Y3ZjRmNWM3ZmVmYmE3OTNk','','127.0.0.1,211.230.48.26','8000000','','','','','');
/*!40000 ALTER TABLE `g5_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_content`
--

DROP TABLE IF EXISTS `g5_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_content` (
  `co_id` varchar(20) NOT NULL DEFAULT '',
  `co_html` tinyint(4) NOT NULL DEFAULT '0',
  `co_subject` varchar(255) NOT NULL DEFAULT '',
  `co_content` longtext NOT NULL,
  `co_seo_title` varchar(255) NOT NULL DEFAULT '',
  `co_mobile_content` longtext NOT NULL,
  `co_skin` varchar(255) NOT NULL DEFAULT '',
  `co_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `co_tag_filter_use` tinyint(4) NOT NULL DEFAULT '0',
  `co_hit` int(11) NOT NULL DEFAULT '0',
  `co_include_head` varchar(255) NOT NULL,
  `co_include_tail` varchar(255) NOT NULL,
  PRIMARY KEY (`co_id`),
  KEY `co_seo_title` (`co_seo_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_content`
--

LOCK TABLES `g5_content` WRITE;
/*!40000 ALTER TABLE `g5_content` DISABLE KEYS */;
INSERT INTO `g5_content` VALUES ('company',1,'회사소개','<p align=center><b>회사소개에 대한 내용을 입력하십시오.</b></p>','회사소개','','basic','basic',0,0,'',''),('privacy',1,'개인정보 처리방침','<p align=center><b>개인정보 처리방침에 대한 내용을 입력하십시오.</b></p>','개인정보-처리방침','','basic','basic',0,0,'',''),('provision',1,'서비스 이용약관','<p align=center><b>서비스 이용약관에 대한 내용을 입력하십시오.</b></p>','서비스-이용약관','','basic','basic',0,0,'','');
/*!40000 ALTER TABLE `g5_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_faq`
--

DROP TABLE IF EXISTS `g5_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_faq` (
  `fa_id` int(11) NOT NULL AUTO_INCREMENT,
  `fm_id` int(11) NOT NULL DEFAULT '0',
  `fa_subject` text NOT NULL,
  `fa_content` text NOT NULL,
  `fa_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fa_id`),
  KEY `fm_id` (`fm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_faq`
--

LOCK TABLES `g5_faq` WRITE;
/*!40000 ALTER TABLE `g5_faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_faq_master`
--

DROP TABLE IF EXISTS `g5_faq_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_faq_master` (
  `fm_id` int(11) NOT NULL AUTO_INCREMENT,
  `fm_subject` varchar(255) NOT NULL DEFAULT '',
  `fm_head_html` text NOT NULL,
  `fm_tail_html` text NOT NULL,
  `fm_mobile_head_html` text NOT NULL,
  `fm_mobile_tail_html` text NOT NULL,
  `fm_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_faq_master`
--

LOCK TABLES `g5_faq_master` WRITE;
/*!40000 ALTER TABLE `g5_faq_master` DISABLE KEYS */;
INSERT INTO `g5_faq_master` VALUES (1,'자주하시는 질문','','','','',0);
/*!40000 ALTER TABLE `g5_faq_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_group`
--

DROP TABLE IF EXISTS `g5_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_group` (
  `gr_id` varchar(10) NOT NULL DEFAULT '',
  `gr_subject` varchar(255) NOT NULL DEFAULT '',
  `gr_device` enum('both','pc','mobile') NOT NULL DEFAULT 'both',
  `gr_admin` varchar(255) NOT NULL DEFAULT '',
  `gr_use_access` tinyint(4) NOT NULL DEFAULT '0',
  `gr_order` int(11) NOT NULL DEFAULT '0',
  `gr_1_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_2_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_3_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_4_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_5_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_6_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_7_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_8_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_9_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_10_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_1` varchar(255) NOT NULL DEFAULT '',
  `gr_2` varchar(255) NOT NULL DEFAULT '',
  `gr_3` varchar(255) NOT NULL DEFAULT '',
  `gr_4` varchar(255) NOT NULL DEFAULT '',
  `gr_5` varchar(255) NOT NULL DEFAULT '',
  `gr_6` varchar(255) NOT NULL DEFAULT '',
  `gr_7` varchar(255) NOT NULL DEFAULT '',
  `gr_8` varchar(255) NOT NULL DEFAULT '',
  `gr_9` varchar(255) NOT NULL DEFAULT '',
  `gr_10` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`gr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_group`
--

LOCK TABLES `g5_group` WRITE;
/*!40000 ALTER TABLE `g5_group` DISABLE KEYS */;
INSERT INTO `g5_group` VALUES ('community','커뮤니티','both','',0,0,'','','','','','','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `g5_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_group_member`
--

DROP TABLE IF EXISTS `g5_group_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_group_member` (
  `gm_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_id` varchar(255) NOT NULL DEFAULT '',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `gm_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`gm_id`),
  KEY `gr_id` (`gr_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_group_member`
--

LOCK TABLES `g5_group_member` WRITE;
/*!40000 ALTER TABLE `g5_group_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_group_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_login`
--

DROP TABLE IF EXISTS `g5_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_login` (
  `lo_ip` varchar(100) NOT NULL DEFAULT '',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `lo_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lo_location` text NOT NULL,
  `lo_url` text NOT NULL,
  PRIMARY KEY (`lo_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_login`
--

LOCK TABLES `g5_login` WRITE;
/*!40000 ALTER TABLE `g5_login` DISABLE KEYS */;
INSERT INTO `g5_login` VALUES ('177.152.28.131','','2022-06-04 06:48:55','오류안내 페이지','/'),('121.182.215.88','nimda1','2022-06-04 08:08:25','코인 구매관리',''),('123.60.83.110','','2022-06-04 06:45:46','오류안내 페이지','/');
/*!40000 ALTER TABLE `g5_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_mail`
--

DROP TABLE IF EXISTS `g5_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_mail` (
  `ma_id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_subject` varchar(255) NOT NULL DEFAULT '',
  `ma_content` mediumtext NOT NULL,
  `ma_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ma_ip` varchar(255) NOT NULL DEFAULT '',
  `ma_last_option` text NOT NULL,
  PRIMARY KEY (`ma_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_mail`
--

LOCK TABLES `g5_mail` WRITE;
/*!40000 ALTER TABLE `g5_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_member`
--

DROP TABLE IF EXISTS `g5_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_member` (
  `mb_no` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `mb_password` varchar(255) NOT NULL DEFAULT '',
  `mb_password2` varchar(255) NOT NULL DEFAULT '',
  `mb_name` varchar(255) NOT NULL DEFAULT '',
  `mb_nick` varchar(255) NOT NULL DEFAULT '',
  `mb_nick_date` date NOT NULL DEFAULT '0000-00-00',
  `mb_email` varchar(255) NOT NULL DEFAULT '',
  `mb_homepage` varchar(255) NOT NULL DEFAULT '',
  `mb_level` tinyint(4) NOT NULL DEFAULT '0',
  `mb_sex` char(1) NOT NULL DEFAULT '',
  `mb_birth` varchar(255) NOT NULL DEFAULT '',
  `mb_tel` varchar(255) NOT NULL DEFAULT '',
  `mb_hp` varchar(255) NOT NULL DEFAULT '',
  `mb_certify` varchar(20) NOT NULL DEFAULT '',
  `mb_adult` tinyint(4) NOT NULL DEFAULT '0',
  `mb_dupinfo` varchar(255) NOT NULL DEFAULT '',
  `mb_zip1` char(3) NOT NULL DEFAULT '',
  `mb_zip2` char(3) NOT NULL DEFAULT '',
  `mb_addr1` varchar(255) NOT NULL DEFAULT '',
  `mb_addr2` varchar(255) NOT NULL DEFAULT '',
  `mb_addr3` varchar(255) NOT NULL DEFAULT '',
  `mb_addr_jibeon` varchar(255) NOT NULL DEFAULT '',
  `mb_signature` text NOT NULL,
  `mb_recommend` varchar(255) NOT NULL DEFAULT '',
  `mb_point` int(11) NOT NULL DEFAULT '0',
  `mb_today_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_login_ip` varchar(255) NOT NULL DEFAULT '',
  `mb_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_ip` varchar(255) NOT NULL DEFAULT '',
  `mb_leave_date` varchar(8) NOT NULL DEFAULT '',
  `mb_intercept_date` varchar(8) NOT NULL DEFAULT '',
  `mb_email_certify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_email_certify2` varchar(255) NOT NULL DEFAULT '',
  `mb_memo` text NOT NULL,
  `mb_lost_certify` varchar(255) NOT NULL,
  `mb_mailling` tinyint(4) NOT NULL DEFAULT '0',
  `mb_sms` tinyint(4) NOT NULL DEFAULT '0',
  `mb_open` tinyint(4) NOT NULL DEFAULT '0',
  `mb_open_date` date NOT NULL DEFAULT '0000-00-00',
  `mb_profile` text NOT NULL,
  `mb_memo_call` varchar(255) NOT NULL DEFAULT '',
  `mb_memo_cnt` int(11) NOT NULL DEFAULT '0',
  `mb_scrap_cnt` int(11) NOT NULL DEFAULT '0',
  `mb_1` varchar(255) NOT NULL DEFAULT '',
  `mb_2` varchar(255) NOT NULL DEFAULT '',
  `mb_3` varchar(255) NOT NULL DEFAULT '',
  `mb_4` varchar(255) NOT NULL DEFAULT '',
  `mb_5` varchar(255) NOT NULL DEFAULT '',
  `mb_6` varchar(255) NOT NULL DEFAULT '',
  `mb_7` varchar(255) NOT NULL DEFAULT '',
  `mb_8` varchar(255) NOT NULL DEFAULT '',
  `mb_9` varchar(255) NOT NULL DEFAULT '',
  `mb_10` varchar(255) NOT NULL DEFAULT '',
  `mb_bank_account` varchar(100) DEFAULT NULL COMMENT '계좌번호',
  `mb_bank_nm` varchar(100) DEFAULT NULL COMMENT '은행명',
  `mb_bank_holder` varchar(100) DEFAULT NULL COMMENT '예금주',
  `mb_wallet_addr` varchar(100) DEFAULT NULL COMMENT '지갑',
  `mb_coin` int(11) DEFAULT '0' COMMENT '보유코인',
  PRIMARY KEY (`mb_no`),
  UNIQUE KEY `mb_id` (`mb_id`),
  KEY `mb_today_login` (`mb_today_login`),
  KEY `mb_datetime` (`mb_datetime`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_member`
--

LOCK TABLES `g5_member` WRITE;
/*!40000 ALTER TABLE `g5_member` DISABLE KEYS */;
INSERT INTO `g5_member` VALUES (1,'admin','sha256:12000:9jLrNqUxHPD8DqKBHgsNQUWgov8nSAXo:0Hn84wLOabvpGIpG72herGHmztIaULEw','*89D7BD71DC445863350CAFF1C3ED93389081D29D','최고관리자','최고관리자','2021-11-19','admin@domain.com','',10,'','','','','',0,'','','','','','','','','',100,'2022-03-04 14:43:05','211.230.48.26','2021-11-19 14:43:16','1.209.128.223','','','2021-11-19 14:43:16','','','',1,0,1,'0000-00-00','','',0,0,'','','','','','','','','','',NULL,NULL,NULL,NULL,0),(2,'nimdasys','sha256:12000:SM+VL5U58xqsj/JLJMSkLs1ugUuZxQ7L:mU6t1E1wQqWnj2IzA7l6cS94WM17A5Ac','','최고관리자','최관자','0000-00-00','nimdasys@domain.com','',10,'','','','','',0,'','','','','','','','','',0,'2022-06-04 01:55:25','121.152.209.223','2022-03-04 15:23:49','211.230.48.26','','','2022-03-04 15:23:49','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','','','','',0),(11,'nimda1','sha256:12000:X6rtbckVcKqmNnbs+La4WJdCuA4B+Fmx:FgOuixxqTTbDFJJJYjpRo9+TyLtgc2on','','관리자1','관리자1','0000-00-00','','',9,'','','','','',0,'','','','','','','','','',0,'2022-06-04 00:00:05','121.182.215.88','2022-03-23 17:36:25','211.230.48.26','','','2022-03-23 17:36:25','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','',NULL,NULL,NULL,'cLxhKMmXXPPMKlv4NaAC1V6J19n93Kfxa9',0),(12,'nimda2','sha256:12000:6y5PbSf5il1tDdU5w023wfucbp/j2G+t:Eex7vWctcMClgDTVd4ZThZNTLjZPvSoH','','관리자2','관리자2','0000-00-00','','',9,'','','','','',0,'','','','','','','','','',0,'2022-04-20 13:06:00','211.230.48.26','2022-03-23 17:36:25','211.230.48.26','','','2022-03-23 17:36:25','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','',NULL,NULL,NULL,'AJEhyMymBQr6MO3LKT6QX1GaCOoUyGoDzl',0),(34,'mng365','sha256:12000:bBuHdlPEK0zQIozknlY+8rM5I3/55guO:rvgZMu3xVD0drvSnQwTxTiaUktT/vuGk','','mng365','mng365','0000-00-00','','',9,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-05-31 16:36:30','211.230.48.26','','','2022-05-31 16:36:30','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','0','기업','운영자','jpkFB4NxrAsWy0GEyZR72dPWhWxSY8nhxH',0),(35,'view_adm','sha256:12000:rOSIF/hIBpVCmvhEWwUCwvbxgDlo4/OQ:I5140iCfclINUaDKlUknyovCALp18cjn','','view_adm','view_adm','0000-00-00','','',4,'','','','','',0,'','','','','','','','','',0,'2022-06-03 00:00:24','194.5.49.175','2022-05-31 16:56:50','211.194.230.190','','','0000-00-00 00:00:00','','','',0,0,1,'0000-00-00','','',0,0,'manager','','','','','','','','','',NULL,NULL,NULL,NULL,0),(36,'zx01','sha256:12000:ynuE1V8p7CmfJz4sdTRV33VPAC4wWv4L:HpLxtAc/8e4ucf7dXqjmz7Iokzg2zVlr','','제트엑스','제트엑스','0000-00-00','zx0101@gmail.com','',2,'','','','','',0,'','','','','','','','','',0,'2022-06-03 11:42:29','45.67.97.54','2022-05-31 21:16:53','194.5.49.167','','','2022-05-31 21:16:53','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','123456456456','카카오뱅크','제트엑스','qTwL0YrbBTrFGkeaJzG3zhtqTaLvlMcMFI',10),(37,'seller_yyeh9','sha256:12000:Q3OnyPz7rdyd2GOMwZvxCIHZFJhtR8MX:br1Uf6muhXUQ4NEdznGUuRrYPmohQ9wG','','seller_yyeh9','seller_yyeh9','0000-00-00','','',5,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:05:05','119.202.192.16','','20220603','0000-00-00 00:00:00','','','',0,0,0,'0000-00-00','','',0,0,'seller','','','','','','','','','',NULL,NULL,NULL,'b9003a0e7bc3545a5409c7f82f6744e4',90),(38,'bsh9204','sha256:12000:A6s/aHicQ+gomFF2c1Rt1YftzF+utdh2:Kj5IGSuuG/uYvP+JkxgXQl7u8mMkAnV4','','박승호','박승호','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','110389205717','신한은행','박승호','fA2sdyY7ZSdfNhRc3wb1SJLKvO64xUBNvE',0),(39,'kdy4you','sha256:12000:ezrJ1V+DXc5W1ILLw6H+ajTqL3JL9U8M:k8FfQCcUxjIlaxkb9HFtzm/njnEN8dY8','','김도연','김도연','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','14306069902701','우리은행','김도연','fJceQb64rUlj7pPirH2csy1yCztemYSCH4',0),(40,'pws4882','sha256:12000:Pew1YIcgEURSfVhOLCd6RQP3xbGr4M7X:dMLG4YQBzQMp2/zt3XJShlfLCLnvBYJd','','이재명','이재명','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','110008262999','신한은행','이재명','QxgXBHRX0YnPhOxk1ZS3yuC1JZZBBHFsfV',0),(41,'gapland','sha256:12000:+iT+21cgztakMKhUAf/ap2OUpzhQhiVa:D03r54NmbSk+Uel1SuZfYpS3NnVetu3U','','정현갑','정현갑','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','28909867501014','기업은행','정현갑','pRChOCgcsx00R20J5zeIAXHAyjheLxaboM',0),(42,'choys95','sha256:12000:cJcwvap8K17ZcbF9xTtqOkf2C5WOKvT2:J5n5C1kqS0tHPC6hj34qYx+MztgzJEEu','','조영석','조영석','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','823240244634','국민은행','조영석','sdpIpSgqT8sTRys6g34YDDhVR2t1dSOG5e',0),(43,'jaeak99','sha256:12000:qMEalHZqSMbT1DJg2YslekeaLniwFy8R:dwud/XwcT/pjchILsO/CvmyzR7SgUaHz','','최민수','최민수','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','17936856007597','농협은행','최민수','ov6FW0NpTFXmMdqQc3utZlvsnJkcpqqOWx',0),(44,'jubb6036','sha256:12000:Y0BWEAz5AVN8lex79ag/qEp2Ighg8PT6:Al1U1IyPI8DlcER4/N9PRXdyyGIFGvgH','','정주호','정주호','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3521080887073','지역농․축협','정주호','tTxhirWfOJtezFi49iqELNo50OwrCtY6mw',0),(45,'sumi7464','sha256:12000:7DAGX3YFY6Aai7V1zRvBW1fM/FviAPPj:Z79VsIklJY2MIFUqS5Y42OYa5gCXR3mj','','권수미','권수미','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','6813097680','대구은행','권수미','nFYkUN3o1D4kHdC7SnVgtV40mHulOQScwQ',0),(46,'bongbaby','sha256:12000:l8Eqj6Z1KuKP1+Vii84Fnsrapo9sQuLg:+kkZs2BLwP8oDnd9AzgYqU5xT5prnfz+','','문선혜','문선혜','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','400144138690','미래에셋대우','문선혜','wqEAPGeU0W7D4000guWlvj3ZERQx3moAM2',0),(47,'rjp9748','sha256:12000:ooKaHtgO+14XeYBrFtqpVsTOQ4XmoMj8:L6f1UVs5KHPm6j3/jWyo+Z8qwP7POk29','','유정필','유정필','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','95404355110','신한은행','유정필','bCIqwJnEmrEnsVRohmHkmmccTgyiRlk3X3',0),(48,'aglssi','sha256:12000:fYgD2wNxOZMNcYr1A6xrccVX+HMVDr9T:h7JtmoV9S1pquNdyKcV0kVIJYwhU0x4j','','김정현','김정현','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','73704248001','신한은행','김정현','uuMR88jNvLInaZKRk6exj8NRqFcLIaOcFA',0),(49,'ds5lri','sha256:12000:95X7pM5yKS+RJ+LZZp9zf6oeHW4bKpGm:2Ee2fcS9RETtt8Fh+rzkOlUJ9LkWhTaf','','우산진','우산진','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','80102151024130','농협은행','우산진','4OJnBf9jCjjnbEuqbNyZFZESKn2yAI9EwS',0),(50,'bong7871','sha256:12000:BGWchjAQMachowWfjh0VioWQpVlUA7q5:panJRZ42QWWx5bZ8viR3Z1PjHWTr/G+R','','이봉선','이봉선','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','20220603','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3560902639263','농협은행','이봉선','287bsKvL8GqC7BqFB5EfXpD0XdJ7Sf0Un7',0),(51,'okss9631','sha256:12000:Xl97uD77fviX+jW/Adk/LAUYVhKq2yMG:QhEfTf21oyMNr0yMHlW+d4hYzic5ifxL','','윤상식','윤상식','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','71702271950','농협은행','윤상식','6PSBB0i1DpD35e8Ju69777lQed5e7tmeje',0),(52,'kelly00','sha256:12000:o/5v5OVk8EwStc9pYfqnYPvcrAnOxmXi:6vbN4I+7DW2SsiRhoYe08GlU8VsbWEM8','','최선애','최선애','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3520719386403','농협은행','최선애','PUe7WRxzVCN4mhavphCK7QXd55Hrj1G9WV',0),(53,'eodud891','sha256:12000:xUNd/rbj4vfS/a3KjzOvpK/nvBGRFpoe:x8tpt8xyNBLnIOysPbmIOCrKebfheIAa','','윤대영','윤대영','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3020538381391','농협은행','윤대영','hSMOsIqfMMxWhWeUHmLFAQLhi5iYeeTv7G',0),(54,'krheo9853','sha256:12000:69eVS1OGmtFnRhJog4rs1TW2k5uFqyiS:J66zivg0lKtFI6cL1N5WBTeD+BcXbbQ0','','허경란','허경란','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'2022-06-03 16:31:02','45.67.97.54','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','14114672502201','우리은행','허경란','jzoKPawn7OkmJ1JuHjksBCxUAL9uhgaBQy',0),(55,'dotory','sha256:12000:JwaKSryO7H7o+sh326gf2lCN8h/TRwdi:gvHBlBAVmz4haV0XwxLVQzTI4iO4y79G','','최희준','최희준','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3333049505989','카카오뱅크','최희준','lFJS3QHndqoWU5ffyRS5LtRVX8c7J2G5Ip',0),(56,'kwonhalee','sha256:12000:2UPfsT1scpc7SZUl0v0dqCdUnXLgzm08:M0fliwfVjRRrlyjRuk1BiZuFL0SKmIDZ','','이권하','이권하','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','1002949170463','우리은행','이권하','XLgF8u5xq0DGgbx8hjC8ezhqH1so6bN4X4',0),(57,'sn6963','sha256:12000:jkGM5KotD7GyzdjFXtnAcRhAS2OdV5rt:NnMbZe7dLIUn9F1LHo2PuIZaXV94+qzP','','최난용','최난용','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','75860100050279','국민은행','최난용','J5yPDYPhF5sceKvQSJq9a7bCvhOjlLo5RX',0),(58,'mansion','sha256:12000:lynsC7y5ejPPusPUQ2t8DZgddUzQJ0LS:N5PvsIar9GCe97gAb8iJCJwGPPvL11J6','','송은수','송은수','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','20220603','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3524236653413','농협은행','송은수','UvWKMBPfN4ZjUR2k1cscPYuEiQpGVhDQMz',0),(59,'cyj1227','sha256:12000:0pNP5Cz1qHWi0YWvnsF7EjXOR3d4yDmm:6A3IAPqZmJL8SgD8JblBx0csW/NYXVe2','','천연주','천연주','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','110220705888','신한은행','천연주','AybqOYuNhpEkKGxdTnbn1ueraaJO0voB4z',0),(60,'kyc191411','sha256:12000:GWEtNzn01VitjTCscENahjr2DUBVQi9d:xPsUgeGg47zLlGD2Qmxl2onI684OTM9U','','김영창','김영창','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3550031620293','지역농․축협','김영창','1SywFQVkaF1ISU54i7yxzJHiyHOXiSxkL5',0),(61,'lim9224','sha256:12000:fCbVjnpcpxIigJmy6guteBLoYdsmaPae:Nt5uY72LEKN1dx1ay3xORNEgdsRGaQFd','','임정일','임정일','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','49504036648','신한은행','임정일','QrVMM6sNOlIUp12YyBHfTgXHdgAKAmPrNL',0),(62,'mjchan','sha256:12000:ZhdEXJnRUyOFFvue637lwuEQNlu/l81q:MzUooIDMCYqDh3gPPGlZGwQjf/xV09Sm','','문종찬','문종찬','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','1002846917221','우리은행','문종찬','dzSFnH16Bq7EoFf6V8mTQz9qkKM9bAVpaN',0),(63,'park5830','sha256:12000:gwuxNdiJTLOquWAgS31qkPEpBwFVBsBM:GBJJGOfYaiMRQA+FV7jR1sYNUEcqx2Da','','양혜정','양혜정','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','110057836526','신한은행','양혜정','5xv6D6xLKWr02n9pgZZpqj9dslNoLXcQvH',0),(64,'kcj0510','sha256:12000:ap9IWB4ojBr/9TLMR8xkWg6mFbSPIeA7:lOb0W47UCKFdHncpnt2JWtRwtCASDpvZ','','오정숙','오정숙','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3561459273113','농협은행','오정숙','X9OuVzqmztJISZHRp8bzlDV92G7exCVvMJ',0),(65,'ckh9894','sha256:12000:aKyADDOQEvA5aX8Vf0ttTRJkMihkoX8Z:9BbhbVstxiPsboWh1CtOf/dxLupHY3h+','','최기현','최기현','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','48504013667','신한은행','최기현','0Hiq4RUNANNhFdpQNLuIUwp1LXEGsqqs7I',0),(66,'obhoon0110','sha256:12000:GTnqc6oilZKT6CNwkZvR+bhUn/lPZ93l:wHYeUdR9vSMKDnTRPDbntcWBssjCzYaX','','김경훈','김경훈','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','48501086002010','기업은행','김경훈','TbAOZaBNsh0S7NECwy8VAUTeAlE0OMJHYk',0),(67,'givenam','sha256:12000:pru9C7W8BmW5JOI5bN96ONlnq1n0sIFt:WV/UbhWDFfBHXCP0YTXuUWeuOkUhx64h','','문남주','문남주','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','1086981005','기업은행','문남주','vYv7LYoMRwAv863g2DbVSLhxM5jwNiRigm',0),(68,'dy2328','sha256:12000:y9OjL9IYBIwxRcXAaEUIVgzER7X8YF39:shKdftCM0LWOMi48OYbmw7YaeMLe6Poa','','장대림','장대림','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','66460101246426','국민은행','장대림','q2kOObkoGsvKJyoUuhGLOtR7ZEqQWGdnIy',0),(69,'gray3','sha256:12000:j0lZHdWa873s55cAA5WNUqI2isCj3H9Y:Fm6WOqUHLCT8aZze8SE2/3coHoC7lkI4','','이승호','이승호','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','81515652040107','농협은행','이승호','bxJwVqZrbI0ADuRjgFM7NMLdDITQ5Coh98',0),(70,'ssim1004','sha256:12000:jtwkRwEd/HbzUafWlt/4Ts9bNGLR/kEh:WE5kqSzRnTuAe9HvHbPiPxCg1c+8bMq2','','이효심','이효심','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'2022-06-03 18:05:36','45.67.97.54','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','32210426926','국민은행','이효심','N5zMxKvxl82csiSfpF2bTFTMwZpUgy34EC',0),(71,'yan731','sha256:12000:2CRRqgWm6x9a2WLs+rc8RjXHsjMgCuHL:hlMTY1kBw1K69cOJeBLRr3XzThV8mXhB','','안영희','안영희','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','10012456128685','농협은행','안영희','RbnmJIvLVY3NettgEmVy9ryzmP7pTM2LXp',0),(72,'tdr250','sha256:12000:2ro6f9sbwB8FBn+EK4DinhN3TstcOzo5:fKZS9V7AFcD3622VI9MILW4pnHQ0vGNK','','신상철','신상철','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','44990101191350','국민은행','신상철','8G7Ds3CwRQZk6EH2dRuLqRAygukigiIoZQ',0),(73,'pws4882a','sha256:12000:ZSnUC6KGbLcO7bGDYyIEJuoLYrYAACVw:KZRB86loPlSFe69s2gpfApC2muMHW8wb','','이진규','이진규','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-02 19:10:33','45.67.97.54','','','2022-06-02 19:10:33','','','',0,0,0,'0000-00-00','','',0,0,'','','','','','','','','','','3561371697323','농협은행','이진규','2rTEXKvX5CBNEPE9B40cDhGXAWgilf9nG2',0),(74,'Qwer','sha256:12000:F4XJKSRtDLQ8hMUO8B4C1esAA9tMTfy7:7yp1euJSMjbPVlJGhLlUCqcQYDofYbYq','','배지숙','배지숙','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-03 11:45:34','45.67.97.54','','','2022-06-03 11:45:34','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','3124124291801','농협은행','배지숙','DD2OyZnLYdinB5tNJ1vKpaMDOCQEonK11N',0),(75,'jkjk4949','sha256:12000:Ja5VrZy2/UCghpc3kXdQipphRRXRw5cz:hQyOSvSEwdMbPlKr+dIZ1WvgMOdmGzbc','','김영훈','김영훈','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-03 11:46:27','45.67.97.54','','','2022-06-03 11:46:27','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','63160201390236','국민은행','김영훈','zVfkY1mvDbTYEo4u77jLDfJm793F0elz9B',0),(76,'seller_z3mi10','sha256:12000:8M17o99wreE62OaLd6Vm8FVm+sNU6q97:i/QajLYB6A0B/1+wdx5n9eIVRl8ad6w1','','seller_z3mi10','seller_z3mi10','0000-00-00','','',5,'','','','','',0,'','','','','','','','','',0,'0000-00-00 00:00:00','','2022-06-03 16:00:33','121.182.215.146','','','0000-00-00 00:00:00','','','',0,0,0,'0000-00-00','','',0,0,'seller','','','','','','','','','',NULL,NULL,NULL,'3fa94c91cb5232c508e0d39e4c24ffd9',8900),(77,'bong6607','sha256:12000:L4MxUVVGHSYYAH4R799VbztCiVcOWbbm:FF2FbD360Gfys3yvnzGVG91qFLSpb5Wn','','김봉수','김봉수','0000-00-00','','',2,'','','','','',0,'','','','','','','','','',0,'2022-06-03 16:10:18','45.67.97.54','2022-06-03 16:09:23','45.67.97.54','','','2022-06-03 16:09:23','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','20115251073129','농협은행','김봉수','gsxf7VkC2rVO4axrhHuXIIjiSUc0xuEOXb',0),(78,'view','sha256:12000:3XJyfIMl7PQOW4iNqYLXc50Wmb17Lc65:02/l7+2d1Tewvdgld5PaGnop1nZMIRaO','','view','view','0000-00-00','','',4,'','','','','',0,'','','','','','','','','',0,'2022-06-03 16:14:34','45.67.97.54','2022-06-03 16:13:11','121.182.215.88','','','0000-00-00 00:00:00','','','',0,0,1,'0000-00-00','','',0,0,'manager','','','','','','','','','',NULL,NULL,NULL,NULL,0),(79,'hjdmwh','sha256:12000:rQkcQMO1J2+78VAH7A8U8gfSAB6Vkx9H:5wRQ5eDkW0H9UNiOG+55FDacnZbCRCqt','','현대원','현대원','0000-00-00','hjdmwh@naver.com','',2,'','','','010-6372-7813','',0,'','','','','','','','','',0,'2022-06-03 21:13:58','194.5.49.162','2022-06-03 21:13:38','194.5.49.162','','','2022-06-03 21:13:38','','','',0,0,1,'0000-00-00','','',0,0,'','','','','','','','','','','69902000598','농협','현대원','EjmXTmFjr88yaSmx074FdoO5YFEAHJLl28',0);
/*!40000 ALTER TABLE `g5_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_member_cert_history`
--

DROP TABLE IF EXISTS `g5_member_cert_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_member_cert_history` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `ch_name` varchar(255) NOT NULL DEFAULT '',
  `ch_hp` varchar(255) NOT NULL DEFAULT '',
  `ch_birth` varchar(255) NOT NULL DEFAULT '',
  `ch_type` varchar(20) NOT NULL DEFAULT '',
  `ch_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ch_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_member_cert_history`
--

LOCK TABLES `g5_member_cert_history` WRITE;
/*!40000 ALTER TABLE `g5_member_cert_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_member_cert_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_member_social_profiles`
--

DROP TABLE IF EXISTS `g5_member_social_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_member_social_profiles` (
  `mp_no` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `provider` varchar(50) NOT NULL DEFAULT '',
  `object_sha` varchar(45) NOT NULL DEFAULT '',
  `identifier` varchar(255) NOT NULL DEFAULT '',
  `profileurl` varchar(255) NOT NULL DEFAULT '',
  `photourl` varchar(255) NOT NULL DEFAULT '',
  `displayname` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `mp_register_day` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mp_latest_day` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `mp_no` (`mp_no`),
  KEY `mb_id` (`mb_id`),
  KEY `provider` (`provider`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_member_social_profiles`
--

LOCK TABLES `g5_member_social_profiles` WRITE;
/*!40000 ALTER TABLE `g5_member_social_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_member_social_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_memo`
--

DROP TABLE IF EXISTS `g5_memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_memo` (
  `me_id` int(11) NOT NULL AUTO_INCREMENT,
  `me_recv_mb_id` varchar(20) NOT NULL DEFAULT '',
  `me_send_mb_id` varchar(20) NOT NULL DEFAULT '',
  `me_send_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `me_memo` text NOT NULL,
  `me_send_id` int(11) NOT NULL DEFAULT '0',
  `me_type` enum('send','recv') NOT NULL DEFAULT 'recv',
  `me_send_ip` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`me_id`),
  KEY `me_recv_mb_id` (`me_recv_mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_memo`
--

LOCK TABLES `g5_memo` WRITE;
/*!40000 ALTER TABLE `g5_memo` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_menu`
--

DROP TABLE IF EXISTS `g5_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_menu` (
  `me_id` int(11) NOT NULL AUTO_INCREMENT,
  `me_code` varchar(255) NOT NULL DEFAULT '',
  `me_name` varchar(255) NOT NULL DEFAULT '',
  `me_link` varchar(255) NOT NULL DEFAULT '',
  `me_target` varchar(255) NOT NULL DEFAULT '',
  `me_order` int(11) NOT NULL DEFAULT '0',
  `me_use` tinyint(4) NOT NULL DEFAULT '0',
  `me_mobile_use` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`me_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_menu`
--

LOCK TABLES `g5_menu` WRITE;
/*!40000 ALTER TABLE `g5_menu` DISABLE KEYS */;
INSERT INTO `g5_menu` VALUES (6,'10','구매현황','http://gc-gogo777.com/bbs/coin_request.php','self',0,1,1),(7,'20','코인구매','http://gc-gogo777.com/bbs/coin_request_form.php','self',0,1,1),(8,'30','코인전환','http://gc-gogo777.com/bbs/coin_change_form.php','self',0,1,1);
/*!40000 ALTER TABLE `g5_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_new_win`
--

DROP TABLE IF EXISTS `g5_new_win`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_new_win` (
  `nw_id` int(11) NOT NULL AUTO_INCREMENT,
  `nw_division` varchar(10) NOT NULL DEFAULT 'both',
  `nw_device` varchar(10) NOT NULL DEFAULT 'both',
  `nw_begin_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nw_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nw_disable_hours` int(11) NOT NULL DEFAULT '0',
  `nw_left` int(11) NOT NULL DEFAULT '0',
  `nw_top` int(11) NOT NULL DEFAULT '0',
  `nw_height` int(11) NOT NULL DEFAULT '0',
  `nw_width` int(11) NOT NULL DEFAULT '0',
  `nw_subject` text NOT NULL,
  `nw_content` text NOT NULL,
  `nw_content_html` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_new_win`
--

LOCK TABLES `g5_new_win` WRITE;
/*!40000 ALTER TABLE `g5_new_win` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_new_win` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_point`
--

DROP TABLE IF EXISTS `g5_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_point` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `po_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `po_content` varchar(255) NOT NULL DEFAULT '',
  `po_point` int(11) NOT NULL DEFAULT '0',
  `po_use_point` int(11) NOT NULL DEFAULT '0',
  `po_expired` tinyint(4) NOT NULL DEFAULT '0',
  `po_expire_date` date NOT NULL DEFAULT '0000-00-00',
  `po_mb_point` int(11) NOT NULL DEFAULT '0',
  `po_rel_table` varchar(20) NOT NULL DEFAULT '',
  `po_rel_id` varchar(20) NOT NULL DEFAULT '',
  `po_rel_action` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`po_id`),
  KEY `index1` (`mb_id`,`po_rel_table`,`po_rel_id`,`po_rel_action`),
  KEY `index2` (`po_expire_date`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_point`
--

LOCK TABLES `g5_point` WRITE;
/*!40000 ALTER TABLE `g5_point` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_poll`
--

DROP TABLE IF EXISTS `g5_poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_poll` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_subject` varchar(255) NOT NULL DEFAULT '',
  `po_poll1` varchar(255) NOT NULL DEFAULT '',
  `po_poll2` varchar(255) NOT NULL DEFAULT '',
  `po_poll3` varchar(255) NOT NULL DEFAULT '',
  `po_poll4` varchar(255) NOT NULL DEFAULT '',
  `po_poll5` varchar(255) NOT NULL DEFAULT '',
  `po_poll6` varchar(255) NOT NULL DEFAULT '',
  `po_poll7` varchar(255) NOT NULL DEFAULT '',
  `po_poll8` varchar(255) NOT NULL DEFAULT '',
  `po_poll9` varchar(255) NOT NULL DEFAULT '',
  `po_cnt1` int(11) NOT NULL DEFAULT '0',
  `po_cnt2` int(11) NOT NULL DEFAULT '0',
  `po_cnt3` int(11) NOT NULL DEFAULT '0',
  `po_cnt4` int(11) NOT NULL DEFAULT '0',
  `po_cnt5` int(11) NOT NULL DEFAULT '0',
  `po_cnt6` int(11) NOT NULL DEFAULT '0',
  `po_cnt7` int(11) NOT NULL DEFAULT '0',
  `po_cnt8` int(11) NOT NULL DEFAULT '0',
  `po_cnt9` int(11) NOT NULL DEFAULT '0',
  `po_etc` varchar(255) NOT NULL DEFAULT '',
  `po_level` tinyint(4) NOT NULL DEFAULT '0',
  `po_point` int(11) NOT NULL DEFAULT '0',
  `po_date` date NOT NULL DEFAULT '0000-00-00',
  `po_ips` mediumtext NOT NULL,
  `mb_ids` text NOT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_poll`
--

LOCK TABLES `g5_poll` WRITE;
/*!40000 ALTER TABLE `g5_poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_poll_etc`
--

DROP TABLE IF EXISTS `g5_poll_etc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_poll_etc` (
  `pc_id` int(11) NOT NULL DEFAULT '0',
  `po_id` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `pc_name` varchar(255) NOT NULL DEFAULT '',
  `pc_idea` varchar(255) NOT NULL DEFAULT '',
  `pc_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_poll_etc`
--

LOCK TABLES `g5_poll_etc` WRITE;
/*!40000 ALTER TABLE `g5_poll_etc` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_poll_etc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_popular`
--

DROP TABLE IF EXISTS `g5_popular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_popular` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_word` varchar(50) NOT NULL DEFAULT '',
  `pp_date` date NOT NULL DEFAULT '0000-00-00',
  `pp_ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pp_id`),
  UNIQUE KEY `index1` (`pp_date`,`pp_word`,`pp_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_popular`
--

LOCK TABLES `g5_popular` WRITE;
/*!40000 ALTER TABLE `g5_popular` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_popular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_qa_config`
--

DROP TABLE IF EXISTS `g5_qa_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_qa_config` (
  `qa_title` varchar(255) NOT NULL DEFAULT '',
  `qa_category` varchar(255) NOT NULL DEFAULT '',
  `qa_skin` varchar(255) NOT NULL DEFAULT '',
  `qa_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `qa_use_email` tinyint(4) NOT NULL DEFAULT '0',
  `qa_req_email` tinyint(4) NOT NULL DEFAULT '0',
  `qa_use_hp` tinyint(4) NOT NULL DEFAULT '0',
  `qa_req_hp` tinyint(4) NOT NULL DEFAULT '0',
  `qa_use_sms` tinyint(4) NOT NULL DEFAULT '0',
  `qa_send_number` varchar(255) NOT NULL DEFAULT '0',
  `qa_admin_hp` varchar(255) NOT NULL DEFAULT '',
  `qa_admin_email` varchar(255) NOT NULL DEFAULT '',
  `qa_use_editor` tinyint(4) NOT NULL DEFAULT '0',
  `qa_subject_len` int(11) NOT NULL DEFAULT '0',
  `qa_mobile_subject_len` int(11) NOT NULL DEFAULT '0',
  `qa_page_rows` int(11) NOT NULL DEFAULT '0',
  `qa_mobile_page_rows` int(11) NOT NULL DEFAULT '0',
  `qa_image_width` int(11) NOT NULL DEFAULT '0',
  `qa_upload_size` int(11) NOT NULL DEFAULT '0',
  `qa_insert_content` text NOT NULL,
  `qa_include_head` varchar(255) NOT NULL DEFAULT '',
  `qa_include_tail` varchar(255) NOT NULL DEFAULT '',
  `qa_content_head` text NOT NULL,
  `qa_content_tail` text NOT NULL,
  `qa_mobile_content_head` text NOT NULL,
  `qa_mobile_content_tail` text NOT NULL,
  `qa_1_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_2_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_3_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_4_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_5_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_1` varchar(255) NOT NULL DEFAULT '',
  `qa_2` varchar(255) NOT NULL DEFAULT '',
  `qa_3` varchar(255) NOT NULL DEFAULT '',
  `qa_4` varchar(255) NOT NULL DEFAULT '',
  `qa_5` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_qa_config`
--

LOCK TABLES `g5_qa_config` WRITE;
/*!40000 ALTER TABLE `g5_qa_config` DISABLE KEYS */;
INSERT INTO `g5_qa_config` VALUES ('1:1문의','회원|포인트','basic','basic',1,0,1,0,0,'0','','',1,60,30,15,15,600,1048576,'','','','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `g5_qa_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_qa_content`
--

DROP TABLE IF EXISTS `g5_qa_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_qa_content` (
  `qa_id` int(11) NOT NULL AUTO_INCREMENT,
  `qa_num` int(11) NOT NULL DEFAULT '0',
  `qa_parent` int(11) NOT NULL DEFAULT '0',
  `qa_related` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `qa_name` varchar(255) NOT NULL DEFAULT '',
  `qa_email` varchar(255) NOT NULL DEFAULT '',
  `qa_hp` varchar(255) NOT NULL DEFAULT '',
  `qa_type` tinyint(4) NOT NULL DEFAULT '0',
  `qa_category` varchar(255) NOT NULL DEFAULT '',
  `qa_email_recv` tinyint(4) NOT NULL DEFAULT '0',
  `qa_sms_recv` tinyint(4) NOT NULL DEFAULT '0',
  `qa_html` tinyint(4) NOT NULL DEFAULT '0',
  `qa_subject` varchar(255) NOT NULL DEFAULT '',
  `qa_content` text NOT NULL,
  `qa_status` tinyint(4) NOT NULL DEFAULT '0',
  `qa_file1` varchar(255) NOT NULL DEFAULT '',
  `qa_source1` varchar(255) NOT NULL DEFAULT '',
  `qa_file2` varchar(255) NOT NULL DEFAULT '',
  `qa_source2` varchar(255) NOT NULL DEFAULT '',
  `qa_ip` varchar(255) NOT NULL DEFAULT '',
  `qa_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `qa_1` varchar(255) NOT NULL DEFAULT '',
  `qa_2` varchar(255) NOT NULL DEFAULT '',
  `qa_3` varchar(255) NOT NULL DEFAULT '',
  `qa_4` varchar(255) NOT NULL DEFAULT '',
  `qa_5` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`qa_id`),
  KEY `qa_num_parent` (`qa_num`,`qa_parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_qa_content`
--

LOCK TABLES `g5_qa_content` WRITE;
/*!40000 ALTER TABLE `g5_qa_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_qa_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_scrap`
--

DROP TABLE IF EXISTS `g5_scrap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_scrap` (
  `ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` varchar(15) NOT NULL DEFAULT '',
  `ms_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ms_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_scrap`
--

LOCK TABLES `g5_scrap` WRITE;
/*!40000 ALTER TABLE `g5_scrap` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_scrap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_banner`
--

DROP TABLE IF EXISTS `g5_shop_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_banner` (
  `bn_id` int(11) NOT NULL AUTO_INCREMENT,
  `bn_alt` varchar(255) NOT NULL DEFAULT '',
  `bn_url` varchar(255) NOT NULL DEFAULT '',
  `bn_device` varchar(10) NOT NULL DEFAULT '',
  `bn_position` varchar(255) NOT NULL DEFAULT '',
  `bn_border` tinyint(4) NOT NULL DEFAULT '0',
  `bn_new_win` tinyint(4) NOT NULL DEFAULT '0',
  `bn_begin_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_hit` int(11) NOT NULL DEFAULT '0',
  `bn_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_banner`
--

LOCK TABLES `g5_shop_banner` WRITE;
/*!40000 ALTER TABLE `g5_shop_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_cart`
--

DROP TABLE IF EXISTS `g5_shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_cart` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `od_id` bigint(20) unsigned NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `it_name` varchar(255) NOT NULL DEFAULT '',
  `it_sc_type` tinyint(4) NOT NULL DEFAULT '0',
  `it_sc_method` tinyint(4) NOT NULL DEFAULT '0',
  `it_sc_price` int(11) NOT NULL DEFAULT '0',
  `it_sc_minimum` int(11) NOT NULL DEFAULT '0',
  `it_sc_qty` int(11) NOT NULL DEFAULT '0',
  `ct_status` varchar(255) NOT NULL DEFAULT '',
  `ct_history` text NOT NULL,
  `ct_price` int(11) NOT NULL DEFAULT '0',
  `ct_point` int(11) NOT NULL DEFAULT '0',
  `cp_price` int(11) NOT NULL DEFAULT '0',
  `ct_point_use` tinyint(4) NOT NULL DEFAULT '0',
  `ct_stock_use` tinyint(4) NOT NULL DEFAULT '0',
  `ct_option` varchar(255) NOT NULL DEFAULT '',
  `ct_qty` int(11) NOT NULL DEFAULT '0',
  `ct_notax` tinyint(4) NOT NULL DEFAULT '0',
  `io_id` varchar(255) NOT NULL DEFAULT '',
  `io_type` tinyint(4) NOT NULL DEFAULT '0',
  `io_price` int(11) NOT NULL DEFAULT '0',
  `ct_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ct_ip` varchar(25) NOT NULL DEFAULT '',
  `ct_send_cost` tinyint(4) NOT NULL DEFAULT '0',
  `ct_direct` tinyint(4) NOT NULL DEFAULT '0',
  `ct_select` tinyint(4) NOT NULL DEFAULT '0',
  `ct_select_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ct_id`),
  KEY `od_id` (`od_id`),
  KEY `it_id` (`it_id`),
  KEY `ct_status` (`ct_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_cart`
--

LOCK TABLES `g5_shop_cart` WRITE;
/*!40000 ALTER TABLE `g5_shop_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_category`
--

DROP TABLE IF EXISTS `g5_shop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_category` (
  `ca_id` varchar(10) NOT NULL DEFAULT '0',
  `ca_name` varchar(255) NOT NULL DEFAULT '',
  `ca_order` int(11) NOT NULL DEFAULT '0',
  `ca_skin_dir` varchar(255) NOT NULL DEFAULT '',
  `ca_mobile_skin_dir` varchar(255) NOT NULL DEFAULT '',
  `ca_skin` varchar(255) NOT NULL DEFAULT '',
  `ca_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `ca_img_width` int(11) NOT NULL DEFAULT '0',
  `ca_img_height` int(11) NOT NULL DEFAULT '0',
  `ca_mobile_img_width` int(11) NOT NULL DEFAULT '0',
  `ca_mobile_img_height` int(11) NOT NULL DEFAULT '0',
  `ca_sell_email` varchar(255) NOT NULL DEFAULT '',
  `ca_use` tinyint(4) NOT NULL DEFAULT '0',
  `ca_stock_qty` int(11) NOT NULL DEFAULT '0',
  `ca_explan_html` tinyint(4) NOT NULL DEFAULT '0',
  `ca_head_html` text NOT NULL,
  `ca_tail_html` text NOT NULL,
  `ca_mobile_head_html` text NOT NULL,
  `ca_mobile_tail_html` text NOT NULL,
  `ca_list_mod` int(11) NOT NULL DEFAULT '0',
  `ca_list_row` int(11) NOT NULL DEFAULT '0',
  `ca_mobile_list_mod` int(11) NOT NULL DEFAULT '0',
  `ca_mobile_list_row` int(11) NOT NULL DEFAULT '0',
  `ca_include_head` varchar(255) NOT NULL DEFAULT '',
  `ca_include_tail` varchar(255) NOT NULL DEFAULT '',
  `ca_mb_id` varchar(255) NOT NULL DEFAULT '',
  `ca_cert_use` tinyint(4) NOT NULL DEFAULT '0',
  `ca_adult_use` tinyint(4) NOT NULL DEFAULT '0',
  `ca_nocoupon` tinyint(4) NOT NULL DEFAULT '0',
  `ca_1_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_2_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_3_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_4_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_5_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_6_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_7_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_8_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_9_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_10_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_1` varchar(255) NOT NULL DEFAULT '',
  `ca_2` varchar(255) NOT NULL DEFAULT '',
  `ca_3` varchar(255) NOT NULL DEFAULT '',
  `ca_4` varchar(255) NOT NULL DEFAULT '',
  `ca_5` varchar(255) NOT NULL DEFAULT '',
  `ca_6` varchar(255) NOT NULL DEFAULT '',
  `ca_7` varchar(255) NOT NULL DEFAULT '',
  `ca_8` varchar(255) NOT NULL DEFAULT '',
  `ca_9` varchar(255) NOT NULL DEFAULT '',
  `ca_10` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ca_id`),
  KEY `ca_order` (`ca_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_category`
--

LOCK TABLES `g5_shop_category` WRITE;
/*!40000 ALTER TABLE `g5_shop_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_coupon`
--

DROP TABLE IF EXISTS `g5_shop_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_coupon` (
  `cp_no` int(11) NOT NULL AUTO_INCREMENT,
  `cp_id` varchar(100) NOT NULL DEFAULT '',
  `cp_subject` varchar(255) NOT NULL DEFAULT '',
  `cp_method` tinyint(4) NOT NULL DEFAULT '0',
  `cp_target` varchar(255) NOT NULL DEFAULT '',
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `cz_id` int(11) NOT NULL DEFAULT '0',
  `cp_start` date NOT NULL DEFAULT '0000-00-00',
  `cp_end` date NOT NULL DEFAULT '0000-00-00',
  `cp_price` int(11) NOT NULL DEFAULT '0',
  `cp_type` tinyint(4) NOT NULL DEFAULT '0',
  `cp_trunc` int(11) NOT NULL DEFAULT '0',
  `cp_minimum` int(11) NOT NULL DEFAULT '0',
  `cp_maximum` int(11) NOT NULL DEFAULT '0',
  `od_id` bigint(20) unsigned NOT NULL,
  `cp_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cp_no`),
  UNIQUE KEY `cp_id` (`cp_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_coupon`
--

LOCK TABLES `g5_shop_coupon` WRITE;
/*!40000 ALTER TABLE `g5_shop_coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_coupon_log`
--

DROP TABLE IF EXISTS `g5_shop_coupon_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_coupon_log` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_id` varchar(100) NOT NULL DEFAULT '',
  `mb_id` varchar(100) NOT NULL DEFAULT '',
  `od_id` bigint(20) NOT NULL,
  `cp_price` int(11) NOT NULL DEFAULT '0',
  `cl_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cl_id`),
  KEY `mb_id` (`mb_id`),
  KEY `od_id` (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_coupon_log`
--

LOCK TABLES `g5_shop_coupon_log` WRITE;
/*!40000 ALTER TABLE `g5_shop_coupon_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_coupon_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_coupon_zone`
--

DROP TABLE IF EXISTS `g5_shop_coupon_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_coupon_zone` (
  `cz_id` int(11) NOT NULL AUTO_INCREMENT,
  `cz_type` tinyint(4) NOT NULL DEFAULT '0',
  `cz_subject` varchar(255) NOT NULL DEFAULT '',
  `cz_start` date NOT NULL DEFAULT '0000-00-00',
  `cz_end` date NOT NULL DEFAULT '0000-00-00',
  `cz_file` varchar(255) NOT NULL DEFAULT '',
  `cz_period` int(11) NOT NULL DEFAULT '0',
  `cz_point` int(11) NOT NULL DEFAULT '0',
  `cp_method` tinyint(4) NOT NULL DEFAULT '0',
  `cp_target` varchar(255) NOT NULL DEFAULT '',
  `cp_price` int(11) NOT NULL DEFAULT '0',
  `cp_type` tinyint(4) NOT NULL DEFAULT '0',
  `cp_trunc` int(11) NOT NULL DEFAULT '0',
  `cp_minimum` int(11) NOT NULL DEFAULT '0',
  `cp_maximum` int(11) NOT NULL DEFAULT '0',
  `cz_download` int(11) NOT NULL DEFAULT '0',
  `cz_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_coupon_zone`
--

LOCK TABLES `g5_shop_coupon_zone` WRITE;
/*!40000 ALTER TABLE `g5_shop_coupon_zone` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_coupon_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_default`
--

DROP TABLE IF EXISTS `g5_shop_default`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_default` (
  `de_admin_company_owner` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_name` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_saupja_no` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_tel` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_fax` varchar(255) NOT NULL DEFAULT '',
  `de_admin_tongsin_no` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_zip` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_addr` varchar(255) NOT NULL DEFAULT '',
  `de_admin_info_name` varchar(255) NOT NULL DEFAULT '',
  `de_admin_info_email` varchar(255) NOT NULL DEFAULT '',
  `de_shop_skin` varchar(255) NOT NULL DEFAULT '',
  `de_shop_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type1_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_type1_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type1_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_type1_list_row` int(11) NOT NULL DEFAULT '0',
  `de_type1_img_width` int(11) NOT NULL DEFAULT '0',
  `de_type1_img_height` int(11) NOT NULL DEFAULT '0',
  `de_type2_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_type2_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type2_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_type2_list_row` int(11) NOT NULL DEFAULT '0',
  `de_type2_img_width` int(11) NOT NULL DEFAULT '0',
  `de_type2_img_height` int(11) NOT NULL DEFAULT '0',
  `de_type3_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_type3_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type3_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_type3_list_row` int(11) NOT NULL DEFAULT '0',
  `de_type3_img_width` int(11) NOT NULL DEFAULT '0',
  `de_type3_img_height` int(11) NOT NULL DEFAULT '0',
  `de_type4_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_type4_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type4_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_type4_list_row` int(11) NOT NULL DEFAULT '0',
  `de_type4_img_width` int(11) NOT NULL DEFAULT '0',
  `de_type4_img_height` int(11) NOT NULL DEFAULT '0',
  `de_type5_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_type5_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type5_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_type5_list_row` int(11) NOT NULL DEFAULT '0',
  `de_type5_img_width` int(11) NOT NULL DEFAULT '0',
  `de_type5_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_mobile_type1_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type1_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_mobile_type2_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type2_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_mobile_type3_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type3_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_mobile_type4_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type4_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_mobile_type5_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type5_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_img_height` int(11) NOT NULL DEFAULT '0',
  `de_rel_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_rel_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_rel_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_rel_img_width` int(11) NOT NULL DEFAULT '0',
  `de_rel_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_rel_list_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_mobile_rel_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_rel_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_rel_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_rel_img_height` int(11) NOT NULL DEFAULT '0',
  `de_search_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_search_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_search_list_row` int(11) NOT NULL DEFAULT '0',
  `de_search_img_width` int(11) NOT NULL DEFAULT '0',
  `de_search_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_search_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_search_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_search_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_search_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_search_img_height` int(11) NOT NULL DEFAULT '0',
  `de_listtype_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_listtype_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_listtype_list_row` int(11) NOT NULL DEFAULT '0',
  `de_listtype_img_width` int(11) NOT NULL DEFAULT '0',
  `de_listtype_img_height` int(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_listtype_list_mod` int(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_list_row` int(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_img_width` int(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_img_height` int(11) NOT NULL DEFAULT '0',
  `de_bank_use` int(11) NOT NULL DEFAULT '0',
  `de_bank_account` text NOT NULL,
  `de_card_test` int(11) NOT NULL DEFAULT '0',
  `de_card_use` int(11) NOT NULL DEFAULT '0',
  `de_card_noint_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_card_point` int(11) NOT NULL DEFAULT '0',
  `de_settle_min_point` int(11) NOT NULL DEFAULT '0',
  `de_settle_max_point` int(11) NOT NULL DEFAULT '0',
  `de_settle_point_unit` int(11) NOT NULL DEFAULT '0',
  `de_level_sell` int(11) NOT NULL DEFAULT '0',
  `de_delivery_company` varchar(255) NOT NULL DEFAULT '',
  `de_send_cost_case` varchar(255) NOT NULL DEFAULT '',
  `de_send_cost_limit` varchar(255) NOT NULL DEFAULT '',
  `de_send_cost_list` varchar(255) NOT NULL DEFAULT '',
  `de_hope_date_use` int(11) NOT NULL DEFAULT '0',
  `de_hope_date_after` int(11) NOT NULL DEFAULT '0',
  `de_baesong_content` text NOT NULL,
  `de_change_content` text NOT NULL,
  `de_point_days` int(11) NOT NULL DEFAULT '0',
  `de_simg_width` int(11) NOT NULL DEFAULT '0',
  `de_simg_height` int(11) NOT NULL DEFAULT '0',
  `de_mimg_width` int(11) NOT NULL DEFAULT '0',
  `de_mimg_height` int(11) NOT NULL DEFAULT '0',
  `de_sms_cont1` text NOT NULL,
  `de_sms_cont2` text NOT NULL,
  `de_sms_cont3` text NOT NULL,
  `de_sms_cont4` text NOT NULL,
  `de_sms_cont5` text NOT NULL,
  `de_sms_use1` tinyint(4) NOT NULL DEFAULT '0',
  `de_sms_use2` tinyint(4) NOT NULL DEFAULT '0',
  `de_sms_use3` tinyint(4) NOT NULL DEFAULT '0',
  `de_sms_use4` tinyint(4) NOT NULL DEFAULT '0',
  `de_sms_use5` tinyint(4) NOT NULL DEFAULT '0',
  `de_sms_hp` varchar(255) NOT NULL DEFAULT '',
  `de_pg_service` varchar(255) NOT NULL DEFAULT '',
  `de_kcp_mid` varchar(255) NOT NULL DEFAULT '',
  `de_kcp_site_key` varchar(255) NOT NULL DEFAULT '',
  `de_inicis_mid` varchar(255) NOT NULL DEFAULT '',
  `de_inicis_admin_key` varchar(255) NOT NULL DEFAULT '',
  `de_inicis_sign_key` varchar(255) NOT NULL DEFAULT '',
  `de_iche_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_easy_pay_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_samsung_pay_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_inicis_lpay_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_inicis_kakaopay_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_inicis_cartpoint_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_item_use_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_item_use_write` tinyint(4) NOT NULL DEFAULT '0',
  `de_code_dup_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_cart_keep_term` int(11) NOT NULL DEFAULT '0',
  `de_guest_cart_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_admin_buga_no` varchar(255) NOT NULL DEFAULT '',
  `de_vbank_use` varchar(255) NOT NULL DEFAULT '',
  `de_taxsave_use` tinyint(4) NOT NULL,
  `de_taxsave_types` set('account','vbank','transfer') NOT NULL DEFAULT 'account',
  `de_guest_privacy` text NOT NULL,
  `de_hp_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_escrow_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_tax_flag_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_kakaopay_mid` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_key` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_enckey` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_hashkey` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_cancelpwd` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_mid` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_cert_key` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_button_key` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_test` tinyint(4) NOT NULL DEFAULT '0',
  `de_naverpay_mb_id` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_sendcost` varchar(255) NOT NULL DEFAULT '',
  `de_member_reg_coupon_use` tinyint(4) NOT NULL DEFAULT '0',
  `de_member_reg_coupon_term` int(11) NOT NULL DEFAULT '0',
  `de_member_reg_coupon_price` int(11) NOT NULL DEFAULT '0',
  `de_member_reg_coupon_minimum` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_default`
--

LOCK TABLES `g5_shop_default` WRITE;
/*!40000 ALTER TABLE `g5_shop_default` DISABLE KEYS */;
INSERT INTO `g5_shop_default` VALUES ('대표자명','회사명','123-45-67890','02-123-4567','02-123-4568','제 OO구 - 123호','123-456','OO도 OO시 OO구 OO동 123-45','정보책임자명','정보책임자 E-mail','basic','basic',1,'main.10.skin.php',5,1,160,160,1,'main.20.skin.php',4,1,215,215,1,'main.40.skin.php',4,1,215,215,1,'main.50.skin.php',5,1,215,215,1,'main.30.skin.php',4,1,215,215,1,'main.30.skin.php',2,4,230,230,1,'main.10.skin.php',2,2,230,230,1,'main.10.skin.php',2,4,300,300,1,'main.20.skin.php',2,2,80,80,1,'main.10.skin.php',2,2,230,230,1,'relation.10.skin.php',5,215,215,1,'relation.10.skin.php',3,230,230,'list.10.skin.php',5,5,225,225,'list.10.skin.php',2,5,230,230,'list.10.skin.php',5,5,225,225,'list.10.skin.php',2,5,230,230,1,'OO은행 12345-67-89012 예금주명',1,0,0,0,5000,50000,100,1,'','차등','20000;30000;40000','4000;3000;2000',0,3,'배송 안내 입력전입니다.','교환/반품 안내 입력전입니다.',7,230,230,300,300,'{이름}님의 회원가입을 축하드립니다.\nID:{회원아이디}\n{회사명}','{이름}님 주문해주셔서 고맙습니다.\n{주문번호}\n{주문금액}원\n{회사명}','{이름}님께서 주문하셨습니다.\n{주문번호}\n{주문금액}원\n{회사명}','{이름}님 입금 감사합니다.\n{입금액}원\n주문번호:\n{주문번호}\n{회사명}','{이름}님 배송합니다.\n택배:{택배회사}\n운송장번호:\n{운송장번호}\n{회사명}',0,0,0,0,0,'','kcp','','','','','',0,0,0,0,0,0,1,0,1,15,0,'12345호','0',0,'account','',0,0,0,'','','','','','','','',0,'','',0,0,0,0);
/*!40000 ALTER TABLE `g5_shop_default` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_event`
--

DROP TABLE IF EXISTS `g5_shop_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_event` (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_skin` varchar(255) NOT NULL DEFAULT '',
  `ev_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `ev_img_width` int(11) NOT NULL DEFAULT '0',
  `ev_img_height` int(11) NOT NULL DEFAULT '0',
  `ev_list_mod` int(11) NOT NULL DEFAULT '0',
  `ev_list_row` int(11) NOT NULL DEFAULT '0',
  `ev_mobile_img_width` int(11) NOT NULL DEFAULT '0',
  `ev_mobile_img_height` int(11) NOT NULL DEFAULT '0',
  `ev_mobile_list_mod` int(11) NOT NULL DEFAULT '0',
  `ev_mobile_list_row` int(11) NOT NULL DEFAULT '0',
  `ev_subject` varchar(255) NOT NULL DEFAULT '',
  `ev_subject_strong` tinyint(4) NOT NULL DEFAULT '0',
  `ev_head_html` text NOT NULL,
  `ev_tail_html` text NOT NULL,
  `ev_use` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ev_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_event`
--

LOCK TABLES `g5_shop_event` WRITE;
/*!40000 ALTER TABLE `g5_shop_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_event_item`
--

DROP TABLE IF EXISTS `g5_shop_event_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_event_item` (
  `ev_id` int(11) NOT NULL DEFAULT '0',
  `it_id` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ev_id`,`it_id`),
  KEY `it_id` (`it_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_event_item`
--

LOCK TABLES `g5_shop_event_item` WRITE;
/*!40000 ALTER TABLE `g5_shop_event_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_event_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_inicis_log`
--

DROP TABLE IF EXISTS `g5_shop_inicis_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_inicis_log` (
  `oid` bigint(20) unsigned NOT NULL,
  `P_TID` varchar(255) NOT NULL DEFAULT '',
  `P_MID` varchar(255) NOT NULL DEFAULT '',
  `P_AUTH_DT` varchar(255) NOT NULL DEFAULT '',
  `P_STATUS` varchar(255) NOT NULL DEFAULT '',
  `P_TYPE` varchar(255) NOT NULL DEFAULT '',
  `P_OID` varchar(255) NOT NULL DEFAULT '',
  `P_FN_NM` varchar(255) NOT NULL DEFAULT '',
  `P_AUTH_NO` varchar(255) NOT NULL DEFAULT '',
  `P_AMT` int(11) NOT NULL DEFAULT '0',
  `P_RMESG1` varchar(255) NOT NULL DEFAULT '',
  `post_data` text NOT NULL,
  `is_mail_send` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_inicis_log`
--

LOCK TABLES `g5_shop_inicis_log` WRITE;
/*!40000 ALTER TABLE `g5_shop_inicis_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_inicis_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_item`
--

DROP TABLE IF EXISTS `g5_shop_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_item` (
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `ca_id` varchar(10) NOT NULL DEFAULT '0',
  `ca_id2` varchar(255) NOT NULL DEFAULT '',
  `ca_id3` varchar(255) NOT NULL DEFAULT '',
  `it_skin` varchar(255) NOT NULL DEFAULT '',
  `it_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `it_name` varchar(255) NOT NULL DEFAULT '',
  `it_seo_title` varchar(200) NOT NULL DEFAULT '',
  `it_maker` varchar(255) NOT NULL DEFAULT '',
  `it_origin` varchar(255) NOT NULL DEFAULT '',
  `it_brand` varchar(255) NOT NULL DEFAULT '',
  `it_model` varchar(255) NOT NULL DEFAULT '',
  `it_option_subject` varchar(255) NOT NULL DEFAULT '',
  `it_supply_subject` varchar(255) NOT NULL DEFAULT '',
  `it_type1` tinyint(4) NOT NULL DEFAULT '0',
  `it_type2` tinyint(4) NOT NULL DEFAULT '0',
  `it_type3` tinyint(4) NOT NULL DEFAULT '0',
  `it_type4` tinyint(4) NOT NULL DEFAULT '0',
  `it_type5` tinyint(4) NOT NULL DEFAULT '0',
  `it_basic` text NOT NULL,
  `it_explan` mediumtext NOT NULL,
  `it_explan2` mediumtext NOT NULL,
  `it_mobile_explan` mediumtext NOT NULL,
  `it_cust_price` int(11) NOT NULL DEFAULT '0',
  `it_price` int(11) NOT NULL DEFAULT '0',
  `it_point` int(11) NOT NULL DEFAULT '0',
  `it_point_type` tinyint(4) NOT NULL DEFAULT '0',
  `it_supply_point` int(11) NOT NULL DEFAULT '0',
  `it_notax` tinyint(4) NOT NULL DEFAULT '0',
  `it_sell_email` varchar(255) NOT NULL DEFAULT '',
  `it_use` tinyint(4) NOT NULL DEFAULT '0',
  `it_nocoupon` tinyint(4) NOT NULL DEFAULT '0',
  `it_soldout` tinyint(4) NOT NULL DEFAULT '0',
  `it_stock_qty` int(11) NOT NULL DEFAULT '0',
  `it_stock_sms` tinyint(4) NOT NULL DEFAULT '0',
  `it_noti_qty` int(11) NOT NULL DEFAULT '0',
  `it_sc_type` tinyint(4) NOT NULL DEFAULT '0',
  `it_sc_method` tinyint(4) NOT NULL DEFAULT '0',
  `it_sc_price` int(11) NOT NULL DEFAULT '0',
  `it_sc_minimum` int(11) NOT NULL DEFAULT '0',
  `it_sc_qty` int(11) NOT NULL DEFAULT '0',
  `it_buy_min_qty` int(11) NOT NULL DEFAULT '0',
  `it_buy_max_qty` int(11) NOT NULL DEFAULT '0',
  `it_head_html` text NOT NULL,
  `it_tail_html` text NOT NULL,
  `it_mobile_head_html` text NOT NULL,
  `it_mobile_tail_html` text NOT NULL,
  `it_hit` int(11) NOT NULL DEFAULT '0',
  `it_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `it_update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `it_ip` varchar(25) NOT NULL DEFAULT '',
  `it_order` int(11) NOT NULL DEFAULT '0',
  `it_tel_inq` tinyint(4) NOT NULL DEFAULT '0',
  `it_info_gubun` varchar(50) NOT NULL DEFAULT '',
  `it_info_value` text NOT NULL,
  `it_sum_qty` int(11) NOT NULL DEFAULT '0',
  `it_use_cnt` int(11) NOT NULL DEFAULT '0',
  `it_use_avg` decimal(2,1) NOT NULL,
  `it_shop_memo` text NOT NULL,
  `ec_mall_pid` varchar(255) NOT NULL DEFAULT '',
  `it_img1` varchar(255) NOT NULL DEFAULT '',
  `it_img2` varchar(255) NOT NULL DEFAULT '',
  `it_img3` varchar(255) NOT NULL DEFAULT '',
  `it_img4` varchar(255) NOT NULL DEFAULT '',
  `it_img5` varchar(255) NOT NULL DEFAULT '',
  `it_img6` varchar(255) NOT NULL DEFAULT '',
  `it_img7` varchar(255) NOT NULL DEFAULT '',
  `it_img8` varchar(255) NOT NULL DEFAULT '',
  `it_img9` varchar(255) NOT NULL DEFAULT '',
  `it_img10` varchar(255) NOT NULL DEFAULT '',
  `it_1_subj` varchar(255) NOT NULL DEFAULT '',
  `it_2_subj` varchar(255) NOT NULL DEFAULT '',
  `it_3_subj` varchar(255) NOT NULL DEFAULT '',
  `it_4_subj` varchar(255) NOT NULL DEFAULT '',
  `it_5_subj` varchar(255) NOT NULL DEFAULT '',
  `it_6_subj` varchar(255) NOT NULL DEFAULT '',
  `it_7_subj` varchar(255) NOT NULL DEFAULT '',
  `it_8_subj` varchar(255) NOT NULL DEFAULT '',
  `it_9_subj` varchar(255) NOT NULL DEFAULT '',
  `it_10_subj` varchar(255) NOT NULL DEFAULT '',
  `it_1` varchar(255) NOT NULL DEFAULT '',
  `it_2` varchar(255) NOT NULL DEFAULT '',
  `it_3` varchar(255) NOT NULL DEFAULT '',
  `it_4` varchar(255) NOT NULL DEFAULT '',
  `it_5` varchar(255) NOT NULL DEFAULT '',
  `it_6` varchar(255) NOT NULL DEFAULT '',
  `it_7` varchar(255) NOT NULL DEFAULT '',
  `it_8` varchar(255) NOT NULL DEFAULT '',
  `it_9` varchar(255) NOT NULL DEFAULT '',
  `it_10` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`it_id`),
  KEY `ca_id` (`ca_id`),
  KEY `it_name` (`it_name`),
  KEY `it_seo_title` (`it_seo_title`),
  KEY `it_order` (`it_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_item`
--

LOCK TABLES `g5_shop_item` WRITE;
/*!40000 ALTER TABLE `g5_shop_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_item_option`
--

DROP TABLE IF EXISTS `g5_shop_item_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_item_option` (
  `io_no` int(11) NOT NULL AUTO_INCREMENT,
  `io_id` varchar(255) NOT NULL DEFAULT '0',
  `io_type` tinyint(4) NOT NULL DEFAULT '0',
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `io_price` int(11) NOT NULL DEFAULT '0',
  `io_stock_qty` int(11) NOT NULL DEFAULT '0',
  `io_noti_qty` int(11) NOT NULL DEFAULT '0',
  `io_use` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`io_no`),
  KEY `io_id` (`io_id`),
  KEY `it_id` (`it_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_item_option`
--

LOCK TABLES `g5_shop_item_option` WRITE;
/*!40000 ALTER TABLE `g5_shop_item_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_item_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_item_qa`
--

DROP TABLE IF EXISTS `g5_shop_item_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_item_qa` (
  `iq_id` int(11) NOT NULL AUTO_INCREMENT,
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `iq_secret` tinyint(4) NOT NULL DEFAULT '0',
  `iq_name` varchar(255) NOT NULL DEFAULT '',
  `iq_email` varchar(255) NOT NULL DEFAULT '',
  `iq_hp` varchar(255) NOT NULL DEFAULT '',
  `iq_password` varchar(255) NOT NULL DEFAULT '',
  `iq_subject` varchar(255) NOT NULL DEFAULT '',
  `iq_question` text NOT NULL,
  `iq_answer` text NOT NULL,
  `iq_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iq_ip` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`iq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_item_qa`
--

LOCK TABLES `g5_shop_item_qa` WRITE;
/*!40000 ALTER TABLE `g5_shop_item_qa` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_item_qa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_item_relation`
--

DROP TABLE IF EXISTS `g5_shop_item_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_item_relation` (
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `it_id2` varchar(20) NOT NULL DEFAULT '',
  `ir_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`it_id`,`it_id2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_item_relation`
--

LOCK TABLES `g5_shop_item_relation` WRITE;
/*!40000 ALTER TABLE `g5_shop_item_relation` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_item_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_item_stocksms`
--

DROP TABLE IF EXISTS `g5_shop_item_stocksms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_item_stocksms` (
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `ss_hp` varchar(255) NOT NULL DEFAULT '',
  `ss_send` tinyint(4) NOT NULL DEFAULT '0',
  `ss_send_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ss_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ss_ip` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`ss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_item_stocksms`
--

LOCK TABLES `g5_shop_item_stocksms` WRITE;
/*!40000 ALTER TABLE `g5_shop_item_stocksms` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_item_stocksms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_item_use`
--

DROP TABLE IF EXISTS `g5_shop_item_use`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_item_use` (
  `is_id` int(11) NOT NULL AUTO_INCREMENT,
  `it_id` varchar(20) NOT NULL DEFAULT '0',
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `is_name` varchar(255) NOT NULL DEFAULT '',
  `is_password` varchar(255) NOT NULL DEFAULT '',
  `is_score` tinyint(4) NOT NULL DEFAULT '0',
  `is_subject` varchar(255) NOT NULL DEFAULT '',
  `is_content` text NOT NULL,
  `is_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_ip` varchar(25) NOT NULL DEFAULT '',
  `is_confirm` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`is_id`),
  KEY `index1` (`it_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_item_use`
--

LOCK TABLES `g5_shop_item_use` WRITE;
/*!40000 ALTER TABLE `g5_shop_item_use` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_item_use` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_order`
--

DROP TABLE IF EXISTS `g5_shop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_order` (
  `od_id` bigint(20) unsigned NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `od_name` varchar(20) NOT NULL DEFAULT '',
  `od_email` varchar(100) NOT NULL DEFAULT '',
  `od_tel` varchar(20) NOT NULL DEFAULT '',
  `od_hp` varchar(20) NOT NULL DEFAULT '',
  `od_zip1` char(3) NOT NULL DEFAULT '',
  `od_zip2` char(3) NOT NULL DEFAULT '',
  `od_addr1` varchar(100) NOT NULL DEFAULT '',
  `od_addr2` varchar(100) NOT NULL DEFAULT '',
  `od_addr3` varchar(255) NOT NULL DEFAULT '',
  `od_addr_jibeon` varchar(255) NOT NULL DEFAULT '',
  `od_deposit_name` varchar(20) NOT NULL DEFAULT '',
  `od_b_name` varchar(20) NOT NULL DEFAULT '',
  `od_b_tel` varchar(20) NOT NULL DEFAULT '',
  `od_b_hp` varchar(20) NOT NULL DEFAULT '',
  `od_b_zip1` char(3) NOT NULL DEFAULT '',
  `od_b_zip2` char(3) NOT NULL DEFAULT '',
  `od_b_addr1` varchar(100) NOT NULL DEFAULT '',
  `od_b_addr2` varchar(100) NOT NULL DEFAULT '',
  `od_b_addr3` varchar(255) NOT NULL DEFAULT '',
  `od_b_addr_jibeon` varchar(255) NOT NULL DEFAULT '',
  `od_memo` text NOT NULL,
  `od_cart_count` int(11) NOT NULL DEFAULT '0',
  `od_cart_price` int(11) NOT NULL DEFAULT '0',
  `od_cart_coupon` int(11) NOT NULL DEFAULT '0',
  `od_send_cost` int(11) NOT NULL DEFAULT '0',
  `od_send_cost2` int(11) NOT NULL DEFAULT '0',
  `od_send_coupon` int(11) NOT NULL DEFAULT '0',
  `od_receipt_price` int(11) NOT NULL DEFAULT '0',
  `od_cancel_price` int(11) NOT NULL DEFAULT '0',
  `od_receipt_point` int(11) NOT NULL DEFAULT '0',
  `od_refund_price` int(11) NOT NULL DEFAULT '0',
  `od_bank_account` varchar(255) NOT NULL DEFAULT '',
  `od_receipt_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_coupon` int(11) NOT NULL DEFAULT '0',
  `od_misu` int(11) NOT NULL DEFAULT '0',
  `od_shop_memo` text NOT NULL,
  `od_mod_history` text NOT NULL,
  `od_status` varchar(255) NOT NULL DEFAULT '',
  `od_hope_date` date NOT NULL DEFAULT '0000-00-00',
  `od_settle_case` varchar(255) NOT NULL DEFAULT '',
  `od_other_pay_type` varchar(100) NOT NULL DEFAULT '',
  `od_test` tinyint(4) NOT NULL DEFAULT '0',
  `od_mobile` tinyint(4) NOT NULL DEFAULT '0',
  `od_pg` varchar(255) NOT NULL DEFAULT '',
  `od_tno` varchar(255) NOT NULL DEFAULT '',
  `od_app_no` varchar(20) NOT NULL DEFAULT '',
  `od_escrow` tinyint(4) NOT NULL DEFAULT '0',
  `od_casseqno` varchar(255) NOT NULL DEFAULT '',
  `od_tax_flag` tinyint(4) NOT NULL DEFAULT '0',
  `od_tax_mny` int(11) NOT NULL DEFAULT '0',
  `od_vat_mny` int(11) NOT NULL DEFAULT '0',
  `od_free_mny` int(11) NOT NULL DEFAULT '0',
  `od_delivery_company` varchar(255) NOT NULL DEFAULT '0',
  `od_invoice` varchar(255) NOT NULL DEFAULT '',
  `od_invoice_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_cash` tinyint(4) NOT NULL,
  `od_cash_no` varchar(255) NOT NULL,
  `od_cash_info` text NOT NULL,
  `od_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_pwd` varchar(255) NOT NULL DEFAULT '',
  `od_ip` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`od_id`),
  KEY `index2` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_order`
--

LOCK TABLES `g5_shop_order` WRITE;
/*!40000 ALTER TABLE `g5_shop_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_order_address`
--

DROP TABLE IF EXISTS `g5_shop_order_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_order_address` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `ad_subject` varchar(255) NOT NULL DEFAULT '',
  `ad_default` tinyint(4) NOT NULL DEFAULT '0',
  `ad_name` varchar(255) NOT NULL DEFAULT '',
  `ad_tel` varchar(255) NOT NULL DEFAULT '',
  `ad_hp` varchar(255) NOT NULL DEFAULT '',
  `ad_zip1` char(3) NOT NULL DEFAULT '',
  `ad_zip2` char(3) NOT NULL DEFAULT '',
  `ad_addr1` varchar(255) NOT NULL DEFAULT '',
  `ad_addr2` varchar(255) NOT NULL DEFAULT '',
  `ad_addr3` varchar(255) NOT NULL DEFAULT '',
  `ad_jibeon` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ad_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_order_address`
--

LOCK TABLES `g5_shop_order_address` WRITE;
/*!40000 ALTER TABLE `g5_shop_order_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_order_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_order_data`
--

DROP TABLE IF EXISTS `g5_shop_order_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_order_data` (
  `od_id` bigint(20) unsigned NOT NULL,
  `cart_id` bigint(20) unsigned NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `dt_pg` varchar(255) NOT NULL DEFAULT '',
  `dt_data` text NOT NULL,
  `dt_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `od_id` (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_order_data`
--

LOCK TABLES `g5_shop_order_data` WRITE;
/*!40000 ALTER TABLE `g5_shop_order_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_order_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_order_delete`
--

DROP TABLE IF EXISTS `g5_shop_order_delete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_order_delete` (
  `de_id` int(11) NOT NULL AUTO_INCREMENT,
  `de_key` varchar(255) NOT NULL DEFAULT '',
  `de_data` longtext NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `de_ip` varchar(255) NOT NULL DEFAULT '',
  `de_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`de_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_order_delete`
--

LOCK TABLES `g5_shop_order_delete` WRITE;
/*!40000 ALTER TABLE `g5_shop_order_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_order_delete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_order_post_log`
--

DROP TABLE IF EXISTS `g5_shop_order_post_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_order_post_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` bigint(20) unsigned NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `post_data` text NOT NULL,
  `ol_code` varchar(255) NOT NULL DEFAULT '',
  `ol_msg` text NOT NULL,
  `ol_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ol_ip` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_order_post_log`
--

LOCK TABLES `g5_shop_order_post_log` WRITE;
/*!40000 ALTER TABLE `g5_shop_order_post_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_order_post_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_personalpay`
--

DROP TABLE IF EXISTS `g5_shop_personalpay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_personalpay` (
  `pp_id` bigint(20) unsigned NOT NULL,
  `od_id` bigint(20) unsigned NOT NULL,
  `pp_name` varchar(255) NOT NULL DEFAULT '',
  `pp_email` varchar(255) NOT NULL DEFAULT '',
  `pp_hp` varchar(255) NOT NULL DEFAULT '',
  `pp_content` text NOT NULL,
  `pp_use` tinyint(4) NOT NULL DEFAULT '0',
  `pp_price` int(11) NOT NULL DEFAULT '0',
  `pp_pg` varchar(255) NOT NULL DEFAULT '',
  `pp_tno` varchar(255) NOT NULL DEFAULT '',
  `pp_app_no` varchar(20) NOT NULL DEFAULT '',
  `pp_casseqno` varchar(255) NOT NULL DEFAULT '',
  `pp_receipt_price` int(11) NOT NULL DEFAULT '0',
  `pp_settle_case` varchar(255) NOT NULL DEFAULT '',
  `pp_bank_account` varchar(255) NOT NULL DEFAULT '',
  `pp_deposit_name` varchar(255) NOT NULL DEFAULT '',
  `pp_receipt_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pp_receipt_ip` varchar(255) NOT NULL DEFAULT '',
  `pp_shop_memo` text NOT NULL,
  `pp_cash` tinyint(4) NOT NULL DEFAULT '0',
  `pp_cash_no` varchar(255) NOT NULL DEFAULT '',
  `pp_cash_info` text NOT NULL,
  `pp_ip` varchar(255) NOT NULL DEFAULT '',
  `pp_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pp_id`),
  KEY `od_id` (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_personalpay`
--

LOCK TABLES `g5_shop_personalpay` WRITE;
/*!40000 ALTER TABLE `g5_shop_personalpay` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_personalpay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_sendcost`
--

DROP TABLE IF EXISTS `g5_shop_sendcost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_sendcost` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(255) NOT NULL DEFAULT '',
  `sc_zip1` varchar(10) NOT NULL DEFAULT '',
  `sc_zip2` varchar(10) NOT NULL DEFAULT '',
  `sc_price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sc_id`),
  KEY `sc_zip1` (`sc_zip1`),
  KEY `sc_zip2` (`sc_zip2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_sendcost`
--

LOCK TABLES `g5_shop_sendcost` WRITE;
/*!40000 ALTER TABLE `g5_shop_sendcost` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_sendcost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_shop_wish`
--

DROP TABLE IF EXISTS `g5_shop_wish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_shop_wish` (
  `wi_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `it_id` varchar(20) NOT NULL DEFAULT '0',
  `wi_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wi_ip` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`wi_id`),
  KEY `index1` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_shop_wish`
--

LOCK TABLES `g5_shop_wish` WRITE;
/*!40000 ALTER TABLE `g5_shop_wish` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_shop_wish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_uniqid`
--

DROP TABLE IF EXISTS `g5_uniqid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_uniqid` (
  `uq_id` bigint(20) unsigned NOT NULL,
  `uq_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`uq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_uniqid`
--

LOCK TABLES `g5_uniqid` WRITE;
/*!40000 ALTER TABLE `g5_uniqid` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_uniqid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_visit`
--

DROP TABLE IF EXISTS `g5_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_visit` (
  `vi_id` int(11) NOT NULL DEFAULT '0',
  `vi_ip` varchar(100) NOT NULL DEFAULT '',
  `vi_date` date NOT NULL DEFAULT '0000-00-00',
  `vi_time` time NOT NULL DEFAULT '00:00:00',
  `vi_referer` text NOT NULL,
  `vi_agent` varchar(200) NOT NULL DEFAULT '',
  `vi_browser` varchar(255) NOT NULL DEFAULT '',
  `vi_os` varchar(255) NOT NULL DEFAULT '',
  `vi_device` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`vi_id`),
  UNIQUE KEY `index1` (`vi_ip`,`vi_date`),
  KEY `index2` (`vi_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_visit`
--

LOCK TABLES `g5_visit` WRITE;
/*!40000 ALTER TABLE `g5_visit` DISABLE KEYS */;
INSERT INTO `g5_visit` VALUES (1,'211.230.48.26','2022-05-31','16:34:08','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68','','',''),(2,'211.194.230.190','2022-05-31','16:56:24','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.62 Safari/537.36','','',''),(3,'104.140.188.26','2022-05-31','18:05:00','','https://gdnplus.com:Gather Analyze Provide.','','',''),(4,'184.105.247.254','2022-05-31','18:12:51','','','','',''),(5,'95.130.176.18','2022-05-31','18:19:23','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36','','',''),(6,'167.94.138.60','2022-05-31','18:26:15','','','','',''),(7,'37.0.10.187','2022-05-31','19:07:17','','','','',''),(8,'106.101.1.152','2022-05-31','19:36:48','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.2 Mobile/15E148 Safari/604.1','','',''),(9,'149.154.161.20','2022-05-31','20:17:35','','TelegramBot (like TwitterBot)','','',''),(10,'118.235.4.132','2022-05-31','20:18:43','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Mobile/15E148 Safari/604.1','','',''),(11,'186.43.87.93','2022-05-31','21:01:30','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7','','',''),(12,'194.5.49.166','2022-05-31','21:09:07','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36','','',''),(13,'149.154.161.4','2022-05-31','21:10:53','','TelegramBot (like TwitterBot)','','',''),(14,'211.36.158.236','2022-05-31','21:10:57','','Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.1 Mobile/15E148 Safari/604.1','','',''),(15,'194.5.49.167','2022-05-31','21:15:33','http://gc-gogo777.com/adm/member_list.php','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36','','',''),(16,'20.247.96.144','2022-05-31','22:42:58','','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0','','',''),(17,'151.248.1.125','2022-05-31','23:02:27','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 YaBrowser/18.10.1.872 Yowser/2.5 Safari/537.36','','',''),(18,'202.102.144.122','2022-05-31','23:30:40','','','','',''),(19,'157.245.71.118','2022-05-31','23:52:08','https://www.bing.com','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1623.0 Safari/537.36','','',''),(20,'187.208.90.217','2022-05-31','23:57:00','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(21,'167.248.133.61','2022-06-01','00:11:56','','','','',''),(22,'178.128.248.162','2022-06-01','01:37:52','https://www.bing.com','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.517 Safari/537.36','','',''),(23,'37.0.10.187','2022-06-01','02:29:06','','','','',''),(24,'136.144.41.202','2022-06-01','02:36:04','','Mozilla/5.0 zgrab/0.x','','',''),(25,'31.7.58.162','2022-06-01','02:46:22','','Linux Gnu (cow)','','',''),(26,'119.60.104.56','2022-06-01','02:52:55','','Mozilla/5.01717655 Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.20 (KHTML, like Gecko) Chrome/11.0.672.2 Safari/534.20','','',''),(27,'180.95.231.180','2022-06-01','02:53:07','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(28,'119.60.105.26','2022-06-01','02:53:07','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(29,'110.177.183.4','2022-06-01','02:53:08','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(30,'123.145.10.195','2022-06-01','02:53:10','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(31,'171.34.178.40','2022-06-01','02:53:11','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(32,'124.227.31.169','2022-06-01','02:53:11','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(33,'111.162.139.198','2022-06-01','02:53:11','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(34,'175.184.165.201','2022-06-01','02:53:11','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(35,'123.245.24.206','2022-06-01','02:53:11','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(36,'154.89.5.77','2022-06-01','03:08:02','','','','',''),(37,'2.57.122.35','2022-06-01','03:16:52','','','','',''),(38,'83.142.11.135','2022-06-01','07:11:08','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(39,'5.188.62.76','2022-06-01','12:08:18','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36','','',''),(40,'85.198.133.182','2022-06-01','12:26:50','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7','','',''),(41,'54.176.51.210','2022-06-01','12:39:11','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36','','',''),(42,'23.91.96.133','2022-06-01','13:05:22','','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36','','',''),(43,'143.198.12.184','2022-06-01','13:46:18','','Mozilla/5.0 (X11; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0','','',''),(44,'34.140.248.32','2022-06-01','13:48:31','','python-requests/2.27.1','','',''),(45,'164.90.174.17','2022-06-01','14:05:07','','Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240','','',''),(46,'14.102.61.242','2022-06-01','15:50:06','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(47,'20.36.137.35','2022-06-01','16:22:20','','Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36','','',''),(48,'216.73.161.176','2022-06-01','16:26:18','','Mozilla/4.0 (compatible; Win32; WinHttp.WinHttpRequest.5)','','',''),(49,'18.215.241.174','2022-06-01','16:58:04','','Mozilla/5.0 (Windows NT 4.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36','','',''),(50,'161.35.181.60','2022-06-01','17:39:31','','Mozilla/5.0 (X11; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0','','',''),(51,'134.209.146.89','2022-06-01','18:33:02','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36','','',''),(52,'123.60.83.110','2022-06-01','18:58:27','','Mozilla/5.0 (Windows NT 7.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2481.88 Safari/537.36','','',''),(53,'35.85.61.45','2022-06-01','19:01:52','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(54,'18.237.231.175','2022-06-01','19:02:07','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(55,'162.142.125.210','2022-06-01','19:03:04','','','','',''),(56,'34.211.115.9','2022-06-01','19:03:58','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(57,'34.219.164.97','2022-06-01','19:04:27','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(58,'54.212.87.247','2022-06-01','19:05:42','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(59,'20.213.21.190','2022-06-01','19:05:51','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36','','',''),(60,'34.218.239.193','2022-06-01','19:06:23','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(61,'54.149.218.89','2022-06-01','19:07:13','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(62,'185.180.143.75','2022-06-01','19:29:28','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36','','',''),(63,'173.249.24.73','2022-06-01','19:47:46','','Python/3.6 aiohttp/3.5.4','','',''),(64,'116.202.134.81','2022-06-01','20:04:13','gc-gogo777.com','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0','','',''),(65,'65.21.206.42','2022-06-01','20:06:06','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 Edg/91.0.864.54','','',''),(66,'64.62.197.32','2022-06-01','20:24:36','','','','',''),(67,'35.165.215.140','2022-06-01','21:18:22','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36','','',''),(68,'54.189.230.128','2022-06-01','21:18:37','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36','','',''),(69,'72.46.129.179','2022-06-01','21:34:03','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','','',''),(70,'178.128.127.29','2022-06-01','21:55:20','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(71,'139.99.61.171','2022-06-01','22:02:50','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','','',''),(72,'20.242.21.134','2022-06-01','22:27:32','','Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36','','',''),(73,'139.59.72.1','2022-06-01','22:44:52','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36','','',''),(74,'45.90.63.193','2022-06-01','22:47:39','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(75,'20.92.74.250','2022-06-01','23:43:50','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','','',''),(76,'161.35.132.169','2022-06-02','00:18:05','','Mozilla/5.0 (X11; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0','','',''),(77,'177.131.126.238','2022-06-02','00:27:08','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(78,'51.210.182.66','2022-06-02','01:09:02','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','','',''),(79,'107.23.250.149','2022-06-02','01:18:49','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36','','',''),(80,'20.29.119.240','2022-06-02','01:49:58','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','','',''),(81,'54.172.73.16','2022-06-02','02:04:16','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36','','',''),(82,'3.92.189.6','2022-06-02','02:05:11','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36','','',''),(83,'128.199.104.77','2022-06-02','02:30:40','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','','',''),(84,'20.243.26.1','2022-06-02','02:31:53','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','','',''),(85,'54.37.233.116','2022-06-02','02:51:45','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','','',''),(86,'54.227.212.14','2022-06-02','03:06:31','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36','','',''),(87,'137.184.35.23','2022-06-02','03:16:05','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36','','',''),(88,'178.79.172.91','2022-06-02','03:18:22','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36','','',''),(89,'128.199.137.233','2022-06-02','03:19:53','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36','','',''),(90,'192.241.221.236','2022-06-02','03:58:37','','Mozilla/5.0 zgrab/0.x','','',''),(91,'123.60.83.110','2022-06-02','04:21:03','','Mozilla/5.0 (Windows NT 7.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.1869.88 Safari/537.36','','',''),(92,'157.230.240.208','2022-06-02','04:26:54','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(93,'139.59.140.177','2022-06-02','04:35:47','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36','','',''),(94,'202.124.224.164','2022-06-02','05:15:02','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(95,'138.197.130.189','2022-06-02','05:23:05','','','','',''),(96,'65.154.226.169','2022-06-02','05:39:17','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.71 Safari/537.36','','',''),(97,'185.173.35.21','2022-06-02','05:41:48','','NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.com','','',''),(98,'65.154.226.220','2022-06-02','05:48:31','','Apache-HttpClient/4.5.6 (Java/1.8.0_252)','','',''),(99,'20.232.99.71','2022-06-02','05:55:31','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24','','',''),(100,'176.53.222.209','2022-06-02','05:57:17','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(101,'185.196.220.81','2022-06-02','05:59:38','','Linux Gnu (cow)','','',''),(102,'205.169.39.169','2022-06-02','05:59:49','','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36','','',''),(103,'134.209.194.57','2022-06-02','06:21:33','http://gc-gogo777.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36','','',''),(104,'185.220.100.253','2022-06-02','06:29:46','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36','','',''),(105,'94.102.61.10','2022-06-02','06:35:31','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36','','',''),(106,'69.25.58.56','2022-06-02','06:44:27','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36','','',''),(107,'18.117.103.227','2022-06-02','06:45:46','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36','','',''),(108,'176.53.222.108','2022-06-02','06:46:40','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(109,'119.13.202.118','2022-06-02','06:55:19','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(110,'216.19.199.120','2022-06-02','06:57:35','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(111,'168.151.119.67','2022-06-02','06:59:02','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(112,'152.39.148.108','2022-06-02','07:02:22','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(113,'203.109.60.188','2022-06-02','07:04:35','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(114,'54.237.250.240','2022-06-02','07:05:58','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36','','',''),(115,'120.43.31.190','2022-06-02','07:06:05','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36','','',''),(116,'38.108.182.5','2022-06-02','07:30:49','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36','','',''),(117,'104.165.187.232','2022-06-02','07:32:34','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36','','',''),(118,'20.109.126.100','2022-06-02','07:56:19','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(119,'51.195.232.197','2022-06-02','08:01:24','','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','','',''),(120,'20.89.140.207','2022-06-02','08:05:48','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(121,'128.199.183.131','2022-06-02','08:43:08','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','','',''),(122,'139.59.252.74','2022-06-02','08:48:52','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(123,'66.240.192.82','2022-06-02','08:56:18','','\'Mozilla/5.0 project_patchwatch\'','','',''),(124,'74.15.187.76','2022-06-02','08:59:14','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(125,'151.106.120.184','2022-06-02','09:00:20','','Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1','','',''),(126,'210.211.16.178','2022-06-02','09:08:49','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7','','',''),(127,'54.227.32.154','2022-06-02','09:12:57','','Mozilla/5.0 (Windows NT 10.0; rv:91.0) Gecko/20100101 Firefox/91.0','','',''),(128,'66.249.66.40','2022-06-02','09:15:15','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(129,'34.221.139.80','2022-06-02','09:24:35','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(130,'54.203.0.121','2022-06-02','09:24:56','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(131,'2.57.122.35','2022-06-02','10:37:44','','','','',''),(132,'66.249.66.220','2022-06-02','10:53:34','','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(133,'143.244.138.26','2022-06-02','11:43:49','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36','','',''),(134,'116.203.211.224','2022-06-02','11:56:24','','Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 7.0; .NET CLR 3.1.40767; Trident/6.0; en-US)','','',''),(135,'66.249.66.128','2022-06-02','12:00:03','http://eom.eevee.moe/','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(136,'66.249.66.37','2022-06-02','12:00:07','http://eom.eevee.moe/bbs/login.php?url=','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(137,'66.249.66.159','2022-06-02','12:00:08','http://eom.eevee.moe/bbs/login.php?url=','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(138,'66.249.66.218','2022-06-02','12:00:49','','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(139,'66.249.66.94','2022-06-02','12:00:51','http://eom.eevee.moe/','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Chrome/101.0.4951.64 Safari/537.36','','',''),(140,'103.141.91.152','2022-06-02','12:49:07','','','','',''),(141,'18.236.159.53','2022-06-02','12:50:03','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(142,'35.90.75.0','2022-06-02','12:50:21','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(143,'52.25.162.59','2022-06-02','13:03:00','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(144,'54.218.67.38','2022-06-02','13:03:29','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(145,'35.89.228.115','2022-06-02','13:03:37','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(146,'54.202.55.233','2022-06-02','13:19:05','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(147,'35.164.119.55','2022-06-02','13:20:17','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','','',''),(148,'34.140.248.32','2022-06-02','13:24:50','','python-requests/2.27.1','','',''),(149,'66.249.66.88','2022-06-02','13:29:56','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(150,'66.249.66.93','2022-06-02','13:31:43','http://eevee.moe/','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Chrome/101.0.4951.64 Safari/537.36','','',''),(151,'66.249.66.91','2022-06-02','13:31:47','http://eevee.moe/bbs/login.php?url=','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Chrome/101.0.4951.64 Safari/537.36','','',''),(152,'66.249.66.92','2022-06-02','13:32:14','http://eevee.moe/','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(153,'183.136.225.35','2022-06-02','14:27:10','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0','','',''),(154,'104.210.65.239','2022-06-02','14:43:32','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','','',''),(155,'45.90.63.155','2022-06-02','14:46:36','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(156,'20.68.108.98','2022-06-02','15:39:58','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36','','',''),(157,'167.249.102.245','2022-06-02','15:58:59','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(158,'211.230.48.26','2022-06-02','16:02:22','','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0','','',''),(159,'20.28.149.205','2022-06-02','16:11:45','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(160,'107.181.189.144','2022-06-02','16:12:22','http://gc-gogo777.com/','Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)','','',''),(161,'106.215.81.9','2022-06-02','16:19:56','','','','',''),(162,'52.79.77.58','2022-06-02','16:22:36','','CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)','','',''),(163,'130.255.166.98','2022-06-02','16:30:53','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36','','',''),(164,'64.62.197.182','2022-06-02','17:30:46','','','','',''),(165,'171.255.197.37','2022-06-02','17:46:04','','go-resty/2.6.0 (https://github.com/go-resty/resty)','','',''),(166,'15.204.142.133','2022-06-02','17:54:54','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36','','',''),(167,'20.119.227.245','2022-06-02','18:33:00','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(168,'178.128.95.64','2022-06-02','18:41:42','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(169,'59.52.101.152','2022-06-02','18:49:52','','Mozilla/5.01669615 Mozilla/5.0 (Linux; Android 5.1; S900PROBT Build/LMY47I) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/39.0.0.0 Safari/537.36','','',''),(170,'124.117.194.4','2022-06-02','18:49:54','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(171,'171.116.45.6','2022-06-02','18:49:54','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(172,'14.204.44.138','2022-06-02','18:49:55','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(173,'123.145.29.192','2022-06-02','18:49:56','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(174,'171.37.59.132','2022-06-02','18:49:56','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(175,'124.31.107.195','2022-06-02','18:49:57','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(176,'112.80.139.169','2022-06-02','18:49:57','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(177,'183.128.222.117','2022-06-02','18:49:57','','PycURL/7.43.0 libcurl/7.47.0 GnuTLS/3.4.10 zlib/1.2.8 libidn/1.32 librtmp/2.3','','',''),(178,'221.14.174.130','2022-06-02','18:49:57','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36','','',''),(179,'45.67.97.54','2022-06-02','19:02:24','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53','','',''),(180,'119.202.192.16','2022-06-02','19:04:43','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36','','',''),(181,'45.83.65.100','2022-06-02','19:14:02','','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0','','',''),(182,'194.5.49.179','2022-06-02','19:50:01','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(183,'66.249.64.165','2022-06-02','19:56:54','','Googlebot-Image/1.0','','',''),(184,'194.5.49.149','2022-06-02','20:00:30','http://gc-gogo777.com/adm/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(185,'17.121.112.110','2022-06-02','20:01:35','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(186,'17.121.112.81','2022-06-02','20:08:27','http://www.gc-gogo777.com/','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(187,'17.121.113.141','2022-06-02','20:08:32','http://www.gc-gogo777.com/bbs/login.php?url=','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(188,'66.249.70.76','2022-06-02','20:11:54','','Googlebot-Image/1.0','','',''),(189,'171.255.197.33','2022-06-02','20:34:34','','MAndroid','','',''),(190,'17.121.114.70','2022-06-02','20:40:31','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(191,'17.121.115.203','2022-06-02','20:46:32','http://gc-gogo777.com/','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(192,'17.121.113.56','2022-06-02','20:46:37','http://gc-gogo777.com/bbs/login.php?url=','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(193,'159.65.241.103','2022-06-02','21:04:37','','Mozilla/5.0 (X11; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0','','',''),(194,'106.101.3.70','2022-06-02','21:23:05','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(195,'119.172.126.96','2022-06-02','21:33:12','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/262F11','','',''),(196,'165.22.53.146','2022-06-02','21:45:21','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36','','',''),(197,'104.244.74.181','2022-06-02','22:16:14','','','','',''),(198,'167.94.138.62','2022-06-02','22:44:51','','','','',''),(199,'176.53.220.101','2022-06-02','22:50:21','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(200,'51.141.35.108','2022-06-02','22:55:54','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0 Safari/537.36','','',''),(201,'23.111.114.116','2022-06-02','23:03:28','','Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.127 Mobile Safari/537.36','','',''),(202,'196.44.191.52','2022-06-02','23:07:21','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(203,'144.217.135.160','2022-06-02','23:22:48','','Mozilla/5.0 (compatible; Dataprovider.com)','','',''),(204,'144.217.135.217','2022-06-02','23:22:55','','Mozilla/5.0 (compatible; Dataprovider.com)','','',''),(205,'149.56.160.177','2022-06-02','23:23:13','','Mozilla/5.0 (compatible; Dataprovider.com)','','',''),(206,'149.56.160.145','2022-06-02','23:23:40','','Mozilla/5.0 (compatible; Dataprovider.com)','','',''),(207,'149.56.150.45','2022-06-02','23:24:10','','Mozilla/5.0 (compatible; Dataprovider.com)','','',''),(208,'194.5.49.146','2022-06-02','23:48:47','http://gc-gogo777.com/adm/login.php?url=http%3A%2F%2Fgc-gogo777.com%2Fadm%2F','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(209,'194.5.49.175','2022-06-03','00:00:24','http://gc-gogo777.com/adm/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(210,'80.120.129.210','2022-06-03','00:09:34','','Mozilla/5.0 Firefox/26.0','','',''),(211,'194.5.49.184','2022-06-03','00:15:25','http://gc-gogo777.com/adm/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(212,'46.4.33.48','2022-06-03','00:35:12','','Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.1) Gecko/2008070208','','',''),(213,'104.244.74.181','2022-06-03','00:55:34','','','','',''),(214,'167.94.138.45','2022-06-03','00:59:51','','Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)','','',''),(215,'156.96.154.202','2022-06-03','01:26:03','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(216,'3.135.9.76','2022-06-03','01:32:55','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36','','',''),(217,'106.101.0.97','2022-06-03','02:17:40','','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-N950N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/17.0 Chrome/96.0.4664.104 Mobile Safari/537.36','','',''),(218,'54.227.32.154','2022-06-03','02:52:16','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Edg/96.0.1054.29','','',''),(219,'45.95.55.27','2022-06-03','03:18:22','','','','',''),(220,'175.196.127.111','2022-06-03','03:30:48','','Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36','','',''),(221,'138.219.201.59','2022-06-03','03:41:56','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(222,'104.206.128.42','2022-06-03','04:25:25','','https://gdnplus.com:Gather Analyze Provide.','','',''),(223,'69.70.75.46','2022-06-03','04:53:31','','Wget/1.14 (linux-gnu)','','',''),(224,'194.5.49.150','2022-06-03','05:04:21','http://gc-gogo777.com/adm/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(225,'2.57.122.35','2022-06-03','05:04:47','','','','',''),(226,'66.249.70.68','2022-06-03','06:01:05','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(227,'109.235.18.8','2022-06-03','06:11:14','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(228,'66.249.70.72','2022-06-03','06:24:40','http://eom.eevee.moe/bbs/login.php?url=','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Chrome/101.0.4951.64 Safari/537.36','','',''),(229,'66.249.64.168','2022-06-03','06:27:52','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(230,'176.53.219.75','2022-06-03','06:48:51','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(231,'128.199.90.184','2022-06-03','06:53:58','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0 Safari/537.36','','',''),(232,'66.249.70.111','2022-06-03','06:54:40','','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(233,'67.213.122.147','2022-06-03','06:55:27','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(234,'180.149.2.118','2022-06-03','06:57:41','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(235,'206.204.16.99','2022-06-03','06:59:57','','Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/95.0.4638.50 Mobile/15E148 Safari/604.1','','',''),(236,'38.90.148.110','2022-06-03','07:02:29','','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:82.0) Gecko/20100101 Firefox/82.0','','',''),(237,'46.101.164.72','2022-06-03','07:38:39','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36','','',''),(238,'45.141.157.180','2022-06-03','07:44:13','','Mozilla/5.0 (Linux; Android 11; M2003J15SC) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.58 Mobile Safari/537.36','','',''),(239,'52.11.34.13','2022-06-03','07:57:27','','Mozilla/5.0 (X11; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0','','',''),(240,'165.22.53.146','2022-06-03','08:10:07','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36','','',''),(241,'176.53.219.17','2022-06-03','08:14:47','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36','','',''),(242,'66.249.64.22','2022-06-03','08:24:40','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(243,'195.201.41.238','2022-06-03','08:27:57','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.9 Safari/536.5','','',''),(244,'8.41.221.52','2022-06-03','09:24:10','','Mozilla/5.0 Firefox/33.0','','',''),(245,'66.249.64.24','2022-06-03','09:24:40','','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(246,'182.132.192.114','2022-06-03','09:30:22','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36','','',''),(247,'193.118.53.202','2022-06-03','09:43:53','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','','',''),(248,'77.222.109.128','2022-06-03','10:32:59','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(249,'178.128.95.64','2022-06-03','10:46:45','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(250,'104.140.188.46','2022-06-03','10:47:20','','https://gdnplus.com:Gather Analyze Provide.','','',''),(251,'192.241.205.231','2022-06-03','10:52:58','','Mozilla/5.0 zgrab/0.x','','',''),(252,'223.33.181.123','2022-06-03','11:10:45','','Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1','','',''),(253,'94.241.228.91','2022-06-03','11:22:36','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(254,'54.213.61.182','2022-06-03','11:26:27','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','','',''),(255,'185.27.99.126','2022-06-03','11:55:14','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36','','',''),(256,'181.214.107.109','2022-06-03','12:11:56','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36','','',''),(257,'123.60.83.110','2022-06-03','12:21:44','','Mozilla/5.0 (Windows NT 9.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.1645.88 Safari/537.36','','',''),(258,'130.211.54.158','2022-06-03','12:56:31','','python-requests/2.27.1','','',''),(259,'143.198.136.88','2022-06-03','13:50:13','','l9tcpid/v1.1.0','','',''),(260,'103.139.44.159','2022-06-03','14:15:38','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36','','',''),(261,'113.83.145.208','2022-06-03','14:17:20','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(262,'5.9.55.228','2022-06-03','15:26:47','','serpstatbot/2.1 (advanced backlink tracking bot; https://serpstatbot.com/; abuse@serpstatbot.com)','','',''),(263,'65.154.226.220','2022-06-03','15:30:49','','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36','','',''),(264,'121.182.215.146','2022-06-03','15:59:18','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36','','',''),(265,'121.182.215.88','2022-06-03','16:05:35','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(266,'45.67.97.54','2022-06-03','16:32:19','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(267,'103.30.198.129','2022-06-03','17:23:30','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','','',''),(268,'37.0.10.187','2022-06-03','18:16:45','','','','',''),(269,'188.166.208.251','2022-06-03','18:26:52','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(270,'164.68.96.236','2022-06-03','18:37:53','','Python/3.6 aiohttp/3.5.4','','',''),(271,'194.5.49.165','2022-06-03','18:38:27','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30','','',''),(272,'194.5.49.149','2022-06-03','18:45:42','http://gc-gogo777.com/adm/member_list.php','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(273,'46.161.11.83','2022-06-03','20:00:53','http://eevee.moe/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4099.2 Safari/537.36','','',''),(274,'149.104.64.159','2022-06-03','20:12:31','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/18.17763','','',''),(275,'17.121.115.236','2022-06-03','20:12:46','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(276,'17.121.114.237','2022-06-03','20:18:15','','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(277,'17.121.115.187','2022-06-03','20:22:10','http://www.gc-gogo777.com/','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(278,'107.23.244.47','2022-06-03','20:25:37','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36','','',''),(279,'54.237.250.240','2022-06-03','20:27:44','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36','','',''),(280,'17.121.113.197','2022-06-03','20:40:47','http://gc-gogo777.com/','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(281,'17.121.115.180','2022-06-03','20:40:52','http://gc-gogo777.com/bbs/login.php?url=','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','','',''),(282,'196.77.9.185','2022-06-03','20:54:58','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(283,'194.5.49.162','2022-06-03','21:10:57','http://gc-gogo777.com/bbs/login.php','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30','','',''),(284,'221.2.155.200','2022-06-03','21:28:02','','Mozilla/5.0','','',''),(285,'196.240.237.166','2022-06-03','21:34:02','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36','','',''),(286,'213.168.250.195','2022-06-03','21:57:27','','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0','','',''),(287,'185.158.115.77','2022-06-03','22:13:54','http://eevee.moe/','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','','',''),(288,'66.249.73.79','2022-06-03','22:26:00','','Googlebot-Image/1.0','','',''),(289,'52.89.148.45','2022-06-03','22:50:41','','Mozilla/5.0 (X11; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0','','',''),(290,'141.147.45.186','2022-06-03','22:59:49','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36','','',''),(291,'62.171.147.55','2022-06-03','23:16:29','','','','',''),(292,'194.5.49.187','2022-06-03','23:42:37','http://gc-gogo777.com/adm/member_list.php','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(293,'73.235.228.209','2022-06-03','23:43:43','','','','',''),(294,'40.77.29.61','2022-06-03','23:55:40','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36','','',''),(295,'2.57.122.35','2022-06-04','00:46:05','','','','',''),(296,'66.249.73.246','2022-06-04','00:50:59','','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(297,'66.249.73.244','2022-06-04','00:51:05','http://www.gc-gogo777.com/','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(298,'66.249.73.242','2022-06-04','00:51:10','http://www.gc-gogo777.com/bbs/login.php?url=','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(299,'71.6.158.166','2022-06-04','01:20:25','','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36','','',''),(300,'34.140.248.32','2022-06-04','01:20:33','','python-requests/2.27.1','','',''),(301,'62.171.147.55','2022-06-04','01:21:06','','','','',''),(302,'66.249.65.165','2022-06-04','01:35:59','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(303,'66.249.65.166','2022-06-04','01:36:06','http://eevee.moe/','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Chrome/101.0.4951.64 Safari/537.36','','',''),(304,'54.237.250.240','2022-06-04','01:37:38','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36','','',''),(305,'59.168.132.144','2022-06-04','01:37:39','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/E1FD64','','',''),(306,'165.154.6.57','2022-06-04','01:40:23','','','','',''),(307,'51.254.199.11','2022-06-04','01:50:44','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36','','',''),(308,'121.152.209.223','2022-06-04','01:55:14','','Mozilla/5.0 (Linux; Android 7.0; SAMSUNG SM-N920S) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/17.0 Chrome/96.0.4664.104 Mobile Safari/537.36','','',''),(309,'51.141.35.108','2022-06-04','02:01:49','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','','',''),(310,'64.62.197.32','2022-06-04','02:10:18','','','','',''),(311,'54.227.32.154','2022-06-04','02:15:27','','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36','','',''),(312,'54.36.148.154','2022-06-04','02:26:06','','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','','',''),(313,'66.249.73.79','2022-06-04','03:50:59','','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(314,'66.249.73.81','2022-06-04','03:51:02','http://gc-gogo777.com/','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(315,'175.202.4.228','2022-06-04','04:20:53','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/017BFF','','',''),(316,'194.5.49.161','2022-06-04','05:00:18','http://gc-gogo777.com/adm/coin_reqlist.php','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','','',''),(317,'54.36.148.100','2022-06-04','05:47:33','','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','','',''),(318,'66.249.65.52','2022-06-04','06:05:37','','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','','',''),(319,'137.184.125.204','2022-06-04','06:28:59','','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36','','',''),(320,'123.60.83.110','2022-06-04','06:45:46','','Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3126.88 Safari/537.36','','',''),(321,'177.152.28.131','2022-06-04','06:48:55','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','','',''),(322,'185.196.220.81','2022-06-04','07:00:50','','','','','');
/*!40000 ALTER TABLE `g5_visit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_visit_sum`
--

DROP TABLE IF EXISTS `g5_visit_sum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_visit_sum` (
  `vs_date` date NOT NULL DEFAULT '0000-00-00',
  `vs_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vs_date`),
  KEY `index1` (`vs_count`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_visit_sum`
--

LOCK TABLES `g5_visit_sum` WRITE;
/*!40000 ALTER TABLE `g5_visit_sum` DISABLE KEYS */;
INSERT INTO `g5_visit_sum` VALUES ('2022-05-31',20),('2022-06-01',55),('2022-06-02',133),('2022-06-03',86),('2022-06-04',28);
/*!40000 ALTER TABLE `g5_visit_sum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_write_free`
--

DROP TABLE IF EXISTS `g5_write_free`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_write_free` (
  `wr_id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_num` int(11) NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int(11) NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint(4) NOT NULL DEFAULT '0',
  `wr_comment` int(11) NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int(11) NOT NULL DEFAULT '0',
  `wr_link2_hit` int(11) NOT NULL DEFAULT '0',
  `wr_hit` int(11) NOT NULL DEFAULT '0',
  `wr_good` int(11) NOT NULL DEFAULT '0',
  `wr_nogood` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint(4) NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL,
  PRIMARY KEY (`wr_id`),
  KEY `wr_seo_title` (`wr_seo_title`),
  KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  KEY `wr_is_comment` (`wr_is_comment`,`wr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_write_free`
--

LOCK TABLES `g5_write_free` WRITE;
/*!40000 ALTER TABLE `g5_write_free` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_write_free` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_write_gallery`
--

DROP TABLE IF EXISTS `g5_write_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_write_gallery` (
  `wr_id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_num` int(11) NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int(11) NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint(4) NOT NULL DEFAULT '0',
  `wr_comment` int(11) NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int(11) NOT NULL DEFAULT '0',
  `wr_link2_hit` int(11) NOT NULL DEFAULT '0',
  `wr_hit` int(11) NOT NULL DEFAULT '0',
  `wr_good` int(11) NOT NULL DEFAULT '0',
  `wr_nogood` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint(4) NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL,
  PRIMARY KEY (`wr_id`),
  KEY `wr_seo_title` (`wr_seo_title`),
  KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  KEY `wr_is_comment` (`wr_is_comment`,`wr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_write_gallery`
--

LOCK TABLES `g5_write_gallery` WRITE;
/*!40000 ALTER TABLE `g5_write_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_write_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_write_notice`
--

DROP TABLE IF EXISTS `g5_write_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_write_notice` (
  `wr_id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_num` int(11) NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int(11) NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint(4) NOT NULL DEFAULT '0',
  `wr_comment` int(11) NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int(11) NOT NULL DEFAULT '0',
  `wr_link2_hit` int(11) NOT NULL DEFAULT '0',
  `wr_hit` int(11) NOT NULL DEFAULT '0',
  `wr_good` int(11) NOT NULL DEFAULT '0',
  `wr_nogood` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint(4) NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL,
  PRIMARY KEY (`wr_id`),
  KEY `wr_seo_title` (`wr_seo_title`),
  KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  KEY `wr_is_comment` (`wr_is_comment`,`wr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_write_notice`
--

LOCK TABLES `g5_write_notice` WRITE;
/*!40000 ALTER TABLE `g5_write_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_write_notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g5_write_qa`
--

DROP TABLE IF EXISTS `g5_write_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `g5_write_qa` (
  `wr_id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_num` int(11) NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int(11) NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint(4) NOT NULL DEFAULT '0',
  `wr_comment` int(11) NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int(11) NOT NULL DEFAULT '0',
  `wr_link2_hit` int(11) NOT NULL DEFAULT '0',
  `wr_hit` int(11) NOT NULL DEFAULT '0',
  `wr_good` int(11) NOT NULL DEFAULT '0',
  `wr_nogood` int(11) NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint(4) NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL,
  PRIMARY KEY (`wr_id`),
  KEY `wr_seo_title` (`wr_seo_title`),
  KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  KEY `wr_is_comment` (`wr_is_comment`,`wr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g5_write_qa`
--

LOCK TABLES `g5_write_qa` WRITE;
/*!40000 ALTER TABLE `g5_write_qa` DISABLE KEYS */;
/*!40000 ALTER TABLE `g5_write_qa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-04  8:09:10
