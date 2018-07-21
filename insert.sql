-- MySQL dump 10.13  Distrib 5.7.21, for osx10.13 (x86_64)
--
-- Host: localhost    Database: WelcomeCTF
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `act_log`
--

DROP TABLE IF EXISTS `act_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `act_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `is_open` tinyint(4) NOT NULL DEFAULT '0',
  `is_solve` tinyint(4) NOT NULL DEFAULT '0',
  `open_at` timestamp NULL DEFAULT NULL,
  `solve_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act_log`
--

LOCK TABLES `act_log` WRITE;
/*!40000 ALTER TABLE `act_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `act_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'smicle','https://twitter.com/smicle_cl'),(2,'somebody_gp','https://twitter.com/somebody_gp'),(3,'miyagaw61','https://twitter.com/miyagaw61'),(4,'iria_piyo','https://twitter.com/iria_piyo'),(5,'8ayac','https://twitter.com/8ayac'),(6,'cha1aza','https://twitter.com/cha1aza'),(7,'haniwasanndayo','https://twitter.com/haniwasanndayo'),(8,'A`zara_','https://twitter.com/ROT13bhxnfnxhen'),(9,'no1zy','https://twitter.com/no1zy_sec');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Misc',NULL,NULL),(2,'Forensics',NULL,NULL),(3,'Crypt',NULL,NULL),(4,'Forensics',NULL,NULL),(5,'Web',NULL,NULL),(6,'PPC',NULL,NULL),(7,'Network',NULL,NULL),(8,'bin',NULL,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_03_30_100119_create__users__table',1),(2,'2018_03_30_102429_create__problems__table',1),(3,'2018_03_30_125052_create__act_log__table',1),(4,'2018_03_30_152207_create__author__table',1),(5,'2018_06_28_014201_create_problem_flags_table',1),(6,'2018_06_28_014332_create_problem_files_table',1),(7,'2018_06_28_020404_create_social_account_table',1),(8,'2018_07_15_163521_create_category_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem_files`
--

DROP TABLE IF EXISTS `problem_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem_files` (
  `id` int(11) NOT NULL,
  `first_data` mediumtext COLLATE utf8mb4_unicode_ci,
  `second_data` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem_files`
--

LOCK TABLES `problem_files` WRITE;
/*!40000 ALTER TABLE `problem_files` DISABLE KEYS */;
INSERT INTO `problem_files` VALUES (2,'Strings_Message.jpg',NULL,NULL,NULL),(4,'WhoIsThis.png',NULL,NULL,NULL),(5,'findfind.txt',NULL,NULL,NULL),(8,'flag',NULL,NULL,NULL),(9,'very_easy_forensics.docx',NULL,NULL,NULL),(10,'Infomation.jpg',NULL,NULL,NULL),(11,'you_are_web_developer.zip',NULL,NULL,NULL),(12,'Use_your_eyes',NULL,NULL,NULL),(14,'image_file.7z',NULL,NULL,NULL),(15,'extraction.png',NULL,NULL,NULL),(17,'Final_task.zip',NULL,NULL,NULL),(18,'File_Recovery.png',NULL,NULL,NULL),(19,'flag.pcap',NULL,NULL,NULL),(20,'hide_and_seek',NULL,NULL,NULL);
/*!40000 ALTER TABLE `problem_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem_flags`
--

DROP TABLE IF EXISTS `problem_flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem_flags` (
  `id` int(11) NOT NULL,
  `correct_flag` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `solve_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem_flags`
--

LOCK TABLES `problem_flags` WRITE;
/*!40000 ALTER TABLE `problem_flags` DISABLE KEYS */;
INSERT INTO `problem_flags` VALUES (1,'welcomeCTF{Let\'s_enjoy_CTF}',0,NULL,NULL),(2,'welcomeCTF{easy_forensics_COM}',0,NULL,NULL),(3,'welcomeCTF{Efini_RX-7}',0,NULL,NULL),(4,'welcomeCTF{TUX}',0,NULL,NULL),(5,'welcomeCTF{ctrl+F}',0,NULL,NULL),(6,'welcomeCTF{EZ_J50N_W36_T0K3N}',0,NULL,NULL),(7,'welcomeCTF{FREEDOM}',0,NULL,NULL),(8,'welcomeCTF{brainfack}',0,NULL,NULL),(9,'welcomeCTF{4r3 y0u 3nj0y1n6 f0r3n51c5?}',0,NULL,NULL),(10,'welcomeCTF{Chick_UserComment}',0,NULL,NULL),(11,'welcomeCTF{Hi_d3v3l0p3r!_1s_th15_t00_e45y?}',0,NULL,NULL),(12,'welcomeCTF{USS_Zumwalt}',0,NULL,NULL),(13,'welcomeCTF{BABY_SIMPLE_BINARY}',0,NULL,NULL),(14,'welcomeCTF{GarakutaDollPlay:)}',0,NULL,NULL),(15,'welcomeCTF{MOFUMOFU_is_cute}',0,NULL,NULL),(16,'welcomeCTF{obfuscation}',0,NULL,NULL),(17,'welcomeCTF{Someday_you_will_see}',0,NULL,NULL),(18,'welcomeCTF{PNG_Magic}',0,NULL,NULL),(19,'welcomeCTF{packet_oisii}',0,NULL,NULL),(20,'',0,NULL,NULL),(21,'welcomeCTF{console.log(!0,1e4,2<<20)}',0,NULL,NULL),(22,'welcomeCTF{THE_NORTH_WIND_AND_THE_SUN}',0,NULL,NULL),(23,'welcomeCTF{pasopi}',0,NULL,NULL),(24,'welcomeCTF{C0n6r4tul4ti0n5!!Y0u_4repr0!!}',0,NULL,NULL);
/*!40000 ALTER TABLE `problem_flags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `statement` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `hint` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `make_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `reserve_at` timestamp NULL DEFAULT NULL,
  `hint_open_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (1,'Opening',1,'<p>CTFは問題からflagの文字列を探し出し、flagをsubmitすれば得点が入ります。<br>\nwelcomeCTFのflag形式はwelcomeCTF{}です。<br>\nこの問題は練習問題です。<br>\n下の入力欄にflagを入力してSubmitボタンを押して、答えを送信しましょう！</p>\n<code>welcomeCTF{Let\'s_enjoy_CTF}</code>',50,'flagをコピー&ペーストすると打ち間違いがなくなります。',1,'https://qiita.com/smicle/private/d60012341e806d9916ff','2018-07-15 17:30:17',NULL,NULL,NULL),(2,'Strings_Message ',2,'<p>この写真の中にflagを残しておいたよ！</p>',50,'バイナリ！',4,'https://qiita.com/iria_piyo/private/3a1c7c0b970bf9d5979b','2018-07-15 17:30:17',NULL,NULL,NULL),(3,'Let\'s_decode',1,'<p>何と書かれているのでしょうか?</p><code>d2VsY29tZUNURntFZmluaV9SWC03fQ==</code>',50,'',6,'https://qiita.com/cha1aza/private/08470a9dcb2a87c93393','2018-07-15 17:30:17',NULL,NULL,NULL),(4,'Who is this?',1,'<p>こいつの名前を答えよ。<br>flagの形式: welcomeCTF{XXX(全部大文字)}</p>',50,'',5,'https://qiita.com/8ayac/private/7dbd7d4c112a64d893cc','2018-07-15 17:30:17',NULL,NULL,NULL),(5,'Find!Find!Find!!!!! ',1,'<p>次のテキストからFlagを探せ!!!<br><br>\n約500万文字のテキスト中にFlagが隠されている</p>',50,'',7,'','2018-07-15 17:30:17',NULL,NULL,NULL),(6,'rfc7519',1,'<p><code>eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.\neyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6Ik5vTmFtZSIsImlhdCI6MTUxNjIzOTAyMiwiRmxhZyI6IndlbGNvbWVDVEZ7RVpfSjUwTl9XMzZfVDBLM059In0.\nCDdP-sKmOeidcEpQTlYZI0rM36qjZ1MZgmM9zdYuFGPbJTta6uNYJuWJT9x9O580noty1mJ_0Gw2GEJIzzc5XQ</code></p>',50,'',8,'','2018-07-15 17:30:17',NULL,NULL,NULL),(7,'Easy_Cipher',3,'<p>暗号文を解読して下さい。flagは全て大文字です。<br>暗号文:21421515143432</p>\n<p>Flag形式:welcomeCTF{~~~}</p>',100,'暗号文には規則性があります。',1,'https://qiita.com/smicle/private/484462397d97e5c87c18','2018-07-15 17:30:17',NULL,NULL,NULL),(8,'F*ck!',1,'<p>this file flag.</p>',100,'これはプログラミング言語です。',2,'https://qiita.com/somebody_gp/private/9d1fba7d202311ead515','2018-07-15 17:30:17',NULL,NULL,NULL),(9,'very_easy_forensics',4,'<p>このファイルは壊れていて見ることができない。この中にflagが入っているはずなんだけど...</p>',100,'docxファイルのマジックナンバーを調べてみよう！<br>同じマジックナンバーを持つファイル形式があるらしい...',4,'https://qiita.com/iria_piyo/private/e3112faff3a871d3ea15','2018-07-15 17:30:17',NULL,NULL,NULL),(10,'Information',4,'<p>このJPEG形式の画像の中に残された情報からflagを見つけてください。</p>',100,'',4,'https://qiita.com/iria_piyo/private/ebb5071901715f4b10e2','2018-07-15 17:30:17',NULL,NULL,NULL),(11,'To be developer',5,'<p>自明</p>',100,'',5,'https://qiita.com/8ayac/private/4415aadedef8a46b082b','2018-07-15 17:30:17',NULL,NULL,NULL),(12,'Use_your_eyes!',1,'<p>この2枚の画像にどんな秘密が隠れているのでしょう？</p>',100,'',6,'https://qiita.com/cha1aza/private/4b3564511376737c70e2','2018-07-15 17:30:17',NULL,NULL,NULL),(13,'Emoticon',3,'<code>:(:):):):(:):):):(:):):(:(:):(:):(:):):(:):):(:(:(:):):(:(:(:):):(:):):(:):):):):(:):):(:):):(:):(:):):(:(:):(:):(:):(:(:(:(:):):(:):(:):(:):(:(:(:):(:(:(:):):(:(:):):):):(:):):(:):(:(:(:(:):(:(:):(:(:(:(:(:):(:):(:(:(:(:):(:(:):(:):):(:(:):(:):(:):):):):):(:):(:):(:(:):):(:):(:(:):(:(:):(:):(:(:):):(:):(:):(:):(:(:(:(:(:):(:(:):):(:(:(:):(:(:(:):(:):(:):(:):):):):):(:):(:(:(:(:):(:(:):(:(:):(:(:):(:):(:(:):):):(:(:):(:(:(:(:(:):(:):(:):(:(:):(:(:):(:):):(:(:):(:):):):):):(:)</code>',100,'',5,'https://qiita.com/8ayac/private/f2ae0db30d1fa23c7fc3','2018-07-15 17:30:17',NULL,NULL,NULL),(14,'Image_file',1,'<p>zipファイルの中に問題があります、Flagが見えないように隠されているので頑張って見てね。</p>',100,'Photoshopを使わなくてもいけます。',1,'https://qiita.com/smicle/private/d73662608e0b64ba8dfc','2018-07-15 17:30:17',NULL,NULL,NULL),(15,'Extraction',4,'<p>この画像の中にflagの画像を隠したよ！見つけてね！</p>',100,'',4,'https://qiita.com/iria_piyo/private/8e96fc2a179b8148fcdd','2018-07-15 17:30:17',NULL,NULL,NULL),(16,'Difficult_Code_To_Read ',6,'<p>読みにくいコードですね。</p>\n<code>console.log(`welcomeCTF{${(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(+(+!+[]+[+!+[]]))[(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(+![]+([]+[])[([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([![]]+[][[]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(+![]+[![]]+([]+[])[([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]]](!+[]+!+[]+[+[]])+(![]+[])[+[]]+([][[]]+[])[+[]]+(![]+[])[!+[]+!+[]+!+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]}}`);</code>',150,'沢山の記号に惑わされないで！読める文字がちゃんとあります。',1,'https://qiita.com/smicle/private/e0f04c65585fcd64d8f5','2018-07-15 17:30:17',NULL,NULL,NULL),(17,'Final_Task',5,'<p>次のWebサイトからflagを探し出して下さい。<br>\nflagは画面に見えない所にあります。<br>\nhttp:// ~~~</p>',150,'ソースコードはhtmlだけではありません。',1,'https://qiita.com/smicle/private/313708be9e237eb71208','2018-07-15 17:30:17',NULL,NULL,NULL),(18,'File_Recovery ',4,'<p>pngファイルが壊れて画像を見ることができないので修正してflagを見つけて下さい。\n</p>',150,'ファイルを識別する数字',4,'https://qiita.com/iria_piyo/private/effed373046973a2f23c','2018-07-15 17:30:17',NULL,NULL,NULL),(19,'Reading packets ',7,'<p>USBの通信を見てflagを取得してください。</p>',150,'pcapファイルを開くツールの一つにWiresharkというものがあります。',2,'https://qiita.com/somebody_gp/private/0bf770935e49d71396a2','2018-07-15 17:30:17',NULL,NULL,NULL),(20,'hide_and_seek',8,'',150,'',3,'https://qiita.com/miyagaw61/private/252885c2802c5eb3246d','2018-07-15 17:30:17',NULL,NULL,NULL),(21,'Baby golf',6,'<p>このJavaScriptのコードを出来るだけ短くしましょう。\n<br>\n<code>console.log(true,10000,2097152)</code>\n最少コードがflagの中身です。\n</p>',150,':2097152は2の20乗です。',1,'https://qiita.com/smicle/private/ef38d2170c9e3befa02b','2018-07-15 17:30:17',NULL,NULL,NULL),(22,'Vigenere_cipher ',3,'<p>とある童話がヴィジュネル暗号で暗号化されています。\nflagはwelcomeCTF{この童話の原題}です。\n単語間のスペースは_(半角下線符号)に変換し、全て半角大文字で解答して下さい。</p>\n<code>TIGNPTTIYIOFAOFTIGSVPHBFARWASTEMCBPWTXJIDJOGVHFOWBUTIGSUTOOIESYHJNEUJEZYESGDJUPVVIOIWJVHNWCIJEBVAOFBMWSUGRBVRBXEMGRQCSTGDBNOOITIGRPCDXTAQREEKNBELPCKMGTVUAHTEFUAJFTIGSVPTICTIGITVHFUTSQNHGRXJODCNTVRJRTICTUTAWGLFTOGJITELPCKWGRZYEMNGSQWMGDUJEOQRUJWJPDBPDBVOOEETGNUCCPNDIQWMKNHDLBUTBIAJPSUVHFVRBXEMGRXKTIVHFHISUTHWSUQFXKNEVHFGNEUOGVHFELPCKXJIQREECBPWTUJEUTAWGLFTSCQDZDUUJEJOMFFIBVEMAWSCPQGDJVCMQSFNYBTOVPDIKMBPDUJEICREGRUJEXKNEDLFYTIGTJIHUGRIGHFNDJVTPJINVHFPOSVHXKNEVOSGAOIRJNYBVTIGCMQALDUUCLMJITGFGQRUUWFTEJPVBKNUJEOVHFUUODEHCNUQSIKNFCTGKRTVHJUBFCMTYESGGFPTMGAOFIOVHFRLFCSBPTXCRNVHBHTFTTIGBJVTFTCPNDPHTIGNPTTIYIOFTIGTSCVFNESWNGCSUGNFFHJUCMQALCNENEUKTICNHNOPUEMAFSQMIKSTJOVNDFTSUJETWNTTAZUGSGWXCRNGRBPDXCRNGRUJENCNUQOLQFGJITEAQCNEOOQREEJITDRPYAUNATVHFDEDCMFUOIGAUGDUJAUJEQWLMGDPHFIKSDNOBMAOFTPGSDCPFVHFDLBBIOISVPSIKNFVHSGWIKMTGLGFOXPIOVHFYEMEONGSICDFQFBVRFGBZVHFTOBFSJFEHGNUNEOGSTCNEMIOFPFTSVCSJQNXKNXJESGFPTCFCNEDLVUTFTFBKL</code>',200,'<p>この暗号は単純な頻度解析では解読できません。<br>\nまずは鍵の長さを求めてみましょう。<br>\n繰り返し出現する文字列とその間隔に着目してみると...?</p>',6,'https://qiita.com/cha1aza/private/35f05791a1d3dc0abc6f','2018-07-15 17:30:17',NULL,NULL,NULL),(23,'obfuscation Linux command ',3,'<p>この問題は難読化シェル芸なのでLinuxコマンドです。<br>\nwelcomeCTF{***}の***が隠されていて、形式はflag:***の***です。<br>\nターミナル上に貼り付けてEnterを押すと動きます。</p>\n<code>OiBkdW1teQ== | $\'u0062x61163u0065x3664\' -`echo $\'x64\'` | `echo $\'x67x72x65x70\'` -$(printf \"%b\" $(printf \'%s%x\' \'x\' $((0x80 ^ 0xf1)))) `echo \\x$(printf \"%d\n\" $(expr $(echo \"白鳥\"|base64|tr -d Oomg=DC9Qb5l) / $(echo \"武藤\"|base64|tr -d =gD5JkeqQm6oC)))$(echo \"ずっとも\"|base64|tr -d o4gKCjG=)`&&echo $(echo \"たらこ　IPhone　綾鷹\"|base64|tr -d AGKJTC=4VBob25S76e+)$\'x3a\'$(echo \"maimai\"|base64|tr -d bWFCg=|awk \'{print substr($0,(length($0)+1)-1,2)}\')$(uname|md5sum|cut -c7)$\'163\'$(ls --help|grep ^G|cut -c6)p$(uname|awk \'{print substr($0,index($0,\"i\"),1)}\')||`base64 --v|sed -n 1p|cut -b 1-4``uname --version|sed -n 1p|cut -b 2-5` \"$(echo RmluZCB0aGUgZmxhZyBieSBkZWNpcGhlcmluZw==|$\'u0062x61163u0065x3664\' -`echo $\'x64\'`)\"</code>',200,'難読化シェル芸はあるコマンドにとても弱いです。',1,'https://qiita.com/smicle/private/75476e3b14cb6bc811ca','2018-07-15 17:30:17',NULL,NULL,NULL),(24,'First_Pwn',8,'<p>問題のバイナリをダウンロードしてflagを探して下さい！<br>\nこの問題は難しいので無理せず解ける問題を解いて下さい。</p>',300,'64bit用のLinuxで32bitファイルが実行出来ない場合はsudo apt install -y lib32z1を実行すると、ファイルが実行出来るようになります。',1,'https://qiita.com/smicle/private/b00208884014b42763be','2018-07-15 17:30:17',NULL,NULL,NULL);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider_id` bigint(20) NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '10',
  `icon` text COLLATE utf8mb4_unicode_ci,
  `icon_small` text COLLATE utf8mb4_unicode_ci,
  `point` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reserved_at` timestamp NULL DEFAULT NULL,
  `hint_open_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-16  2:38:28
