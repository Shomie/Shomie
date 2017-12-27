-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: shomie
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.10.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2017-12-12 22:42:18','2017-12-12 22:42:18'),(2,NULL,1,'Category 2','category-2','2017-12-12 22:42:18','2017-12-12 22:42:18');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'',1),(2,1,'author_id','text','Author',1,0,1,1,0,1,'',2),(3,1,'category_id','text','Category',1,0,1,1,1,0,'',3),(4,1,'title','text','Title',1,1,1,1,1,1,'',4),(5,1,'excerpt','text_area','excerpt',1,0,1,1,1,1,'',5),(6,1,'body','rich_text_box','Body',1,0,1,1,1,1,'',6),(7,1,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(8,1,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}',8),(9,1,'meta_description','text_area','meta_description',1,0,1,1,1,1,'',9),(10,1,'meta_keywords','text_area','meta_keywords',1,0,1,1,1,1,'',10),(11,1,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(12,1,'created_at','timestamp','created_at',0,1,1,0,0,0,'',12),(13,1,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',13),(14,2,'id','number','id',1,0,0,0,0,0,'',1),(15,2,'author_id','text','author_id',1,0,0,0,0,0,'',2),(16,2,'title','text','title',1,1,1,1,1,1,'',3),(17,2,'excerpt','text_area','excerpt',1,0,1,1,1,1,'',4),(18,2,'body','rich_text_box','body',1,0,1,1,1,1,'',5),(19,2,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"}}',6),(20,2,'meta_description','text','meta_description',1,0,1,1,1,1,'',7),(21,2,'meta_keywords','text','meta_keywords',1,0,1,1,1,1,'',8),(22,2,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),(23,2,'created_at','timestamp','created_at',1,1,1,0,0,0,'',10),(24,2,'updated_at','timestamp','updated_at',1,0,0,0,0,0,'',11),(25,2,'image','image','image',0,1,1,1,1,1,'',12),(26,3,'id','number','id',1,0,0,0,0,0,'',1),(27,3,'name','text','name',1,1,1,1,1,1,'',2),(28,3,'email','text','email',1,1,1,1,1,1,'',3),(29,3,'password','password','password',0,0,0,1,1,0,'',4),(30,3,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}',10),(31,3,'remember_token','text','remember_token',0,0,0,0,0,0,'',5),(32,3,'created_at','timestamp','created_at',0,1,1,0,0,0,'',6),(33,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),(34,3,'avatar','image','avatar',0,1,1,1,1,1,'',8),(35,5,'id','number','id',1,0,0,0,0,0,'',1),(36,5,'name','text','name',1,1,1,1,1,1,'',2),(37,5,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),(38,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),(39,4,'id','number','id',1,0,0,0,0,0,'',1),(40,4,'parent_id','select_dropdown','parent_id',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),(41,4,'order','text','order',1,1,1,1,1,1,'{\"default\":1}',3),(42,4,'name','text','name',1,1,1,1,1,1,'',4),(43,4,'slug','text','slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),(44,4,'created_at','timestamp','created_at',0,0,1,0,0,0,'',6),(45,4,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),(46,6,'id','number','id',1,0,0,0,0,0,'',1),(47,6,'name','text','Name',1,1,1,1,1,1,'',2),(48,6,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),(49,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),(50,6,'display_name','text','Display Name',1,1,1,1,1,1,'',5),(51,1,'seo_title','text','seo_title',0,1,1,1,1,1,'',14),(52,1,'featured','checkbox','featured',1,1,1,1,1,1,'',15),(53,3,'role_id','text','role_id',1,1,1,1,1,1,'',9);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy','','',1,0,'2017-12-12 22:07:37','2017-12-12 22:07:37'),(2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,'2017-12-12 22:07:37','2017-12-12 22:07:37'),(3,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','','',1,0,'2017-12-12 22:07:37','2017-12-12 22:07:37'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,'2017-12-12 22:07:37','2017-12-12 22:07:37'),(5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'2017-12-12 22:07:37','2017-12-12 22:07:37'),(6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'2017-12-12 22:07:37','2017-12-12 22:07:37');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landlords`
--

DROP TABLE IF EXISTS `landlords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `landlords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `landlords_id_unique` (`id`),
  UNIQUE KEY `landlords_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landlords`
--

LOCK TABLES `landlords` WRITE;
/*!40000 ALTER TABLE `landlords` DISABLE KEYS */;
INSERT INTO `landlords` VALUES (1,'Olga',968218387,NULL,NULL),(2,'Eugenio',968078402,NULL,NULL),(3,'Antonio Freitas',919676121,NULL,NULL),(4,'Carvalho Ismail',919867102,NULL,NULL),(5,'Paulo Tuga',914781872,NULL,NULL),(6,'Fernanda Vinagre',918793348,NULL,NULL),(7,'Rui Brasileiro',924440360,NULL,NULL),(8,'D.Alice',966249099,NULL,NULL),(9,'Lourenco',966942550,NULL,NULL),(10,'Joia Real ',919526570,NULL,NULL),(11,'Ana Batista ',938371186,NULL,NULL),(12,'Joao Dias',914235623,NULL,NULL),(13,'D.Maria Aveiro',969315340,NULL,NULL),(14,'Sergio Bombeiro',916910583,NULL,NULL),(15,'Alberto Mesquita',917768188,NULL,NULL),(16,'Maria Anunciacao',917830044,NULL,NULL),(17,'Ricardo Senhorio',934200007,NULL,NULL),(18,'Filipe Economia',917874360,NULL,NULL),(19,'Nuno Correia',962892067,NULL,NULL),(20,'Rui Matos',917522354,NULL,NULL),(21,'Manuel Barreiros',917073445,NULL,NULL),(22,'Antonio Pimentel',966286766,NULL,NULL),(23,'Joel Vasconcelos',919855387,NULL,NULL),(24,'Luisa Abreu',963273874,NULL,NULL),(25,'Joaquim Henriques',964061406,NULL,NULL),(26,'Rui Mendes',968520497,NULL,NULL),(27,'Licinia Andrade',917376792,NULL,NULL),(28,'Mario Morais',963387952,NULL,NULL),(29,'Maria Oliveira',966088870,NULL,NULL),(30,'Lucilia Martins',965077148,NULL,NULL),(31,'Joana Costa Lobo',912752254,NULL,NULL),(32,'Ruben Claudia',914629377,NULL,NULL),(33,'Maria Luisa',963939252,NULL,NULL),(34,'Joao T0\'s',918940497,NULL,NULL),(35,'Miguel Falcao',919259279,NULL,NULL),(36,'Luis Artur',911111111,NULL,NULL),(37,'Bruno Benedito',912050128,NULL,NULL),(38,'Miguel Saragoca',911111199,NULL,NULL);
/*!40000 ALTER TABLE `landlords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.media.index',NULL),(3,1,'Posts','','_self','voyager-news',NULL,NULL,6,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.posts.index',NULL),(4,1,'Users','','_self','voyager-person',NULL,NULL,3,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.users.index',NULL),(5,1,'Categories','','_self','voyager-categories',NULL,NULL,8,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.categories.index',NULL),(6,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.pages.index',NULL),(7,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.roles.index',NULL),(8,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2017-12-12 22:07:38','2017-12-12 22:07:38',NULL,NULL),(9,1,'Menu Builder','','_self','voyager-list',NULL,8,10,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.menus.index',NULL),(10,1,'Database','','_self','voyager-data',NULL,8,11,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.database.index',NULL),(11,1,'Compass','','_self','voyager-compass',NULL,8,12,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.compass.index',NULL),(12,1,'Hooks','','_self','voyager-hook',NULL,8,13,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.hooks',NULL),(13,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2017-12-12 22:07:38','2017-12-12 22:07:38','voyager.settings.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2017-12-12 22:07:38','2017-12-12 22:07:38');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_06_23_182428_create_landlords_table',1),(4,'2017_06_23_182455_create_properties_table',1),(5,'2017_07_06_131048_create_requests_table',1),(7,'2017_11_29_131302_add_route_to_properties',2),(8,'2017_12_11_232600_add_new_to_properties',3),(9,'2016_01_01_000000_add_voyager_user_fields',4),(10,'2016_01_01_000000_create_data_types_table',4),(11,'2016_01_01_000000_create_pages_table',4),(12,'2016_01_01_000000_create_posts_table',4),(13,'2016_02_15_204651_create_categories_table',4),(14,'2016_05_19_173453_create_menu_table',4),(15,'2016_10_21_190000_create_roles_table',4),(16,'2016_10_21_190000_create_settings_table',4),(17,'2016_11_30_135954_create_permission_table',4),(18,'2016_11_30_141208_create_permission_role_table',4),(19,'2016_12_26_201236_data_types__add__server_side',4),(20,'2017_01_13_000000_add_route_to_menu_items_table',4),(21,'2017_01_14_005015_create_translations_table',4),(22,'2017_01_15_000000_add_permission_group_id_to_permissions_table',4),(23,'2017_01_15_000000_create_permission_groups_table',4),(24,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',4),(25,'2017_03_06_000000_add_controller_to_data_types_table',4),(26,'2017_04_11_000000_alter_post_nullable_fields_table',4),(27,'2017_04_21_000000_add_order_to_data_rows_table',4),(28,'2017_07_05_210000_add_policyname_to_data_types_table',4),(29,'2017_08_05_000000_add_group_to_settings_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2017-12-12 22:42:18','2017-12-12 22:42:18');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_groups`
--

DROP TABLE IF EXISTS `permission_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_groups`
--

LOCK TABLES `permission_groups` WRITE;
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(2,'browse_database',NULL,'2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(3,'browse_media',NULL,'2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(4,'browse_compass',NULL,'2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(5,'browse_menus','menus','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(6,'read_menus','menus','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(7,'edit_menus','menus','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(8,'add_menus','menus','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(9,'delete_menus','menus','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(10,'browse_pages','pages','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(11,'read_pages','pages','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(12,'edit_pages','pages','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(13,'add_pages','pages','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(14,'delete_pages','pages','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(15,'browse_roles','roles','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(16,'read_roles','roles','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(17,'edit_roles','roles','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(18,'add_roles','roles','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(19,'delete_roles','roles','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(20,'browse_users','users','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(21,'read_users','users','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(22,'edit_users','users','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(23,'add_users','users','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(24,'delete_users','users','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(25,'browse_posts','posts','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(26,'read_posts','posts','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(27,'edit_posts','posts','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(28,'add_posts','posts','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(29,'delete_posts','posts','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(30,'browse_categories','categories','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(31,'read_categories','categories','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(32,'edit_categories','categories','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(33,'add_categories','categories','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(34,'delete_categories','categories','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(35,'browse_settings','settings','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(36,'read_settings','settings','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(37,'edit_settings','settings','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(38,'add_settings','settings','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL),(39,'delete_settings','settings','2017-12-12 22:07:38','2017-12-12 22:07:38',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,0,NULL,'Lorem Ipsum Post',NULL,'This is the excerpt for the Lorem Ipsum Post','<p>This is the body of the lorem ipsum post</p>','posts/post1.jpg','lorem-ipsum-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-12 22:42:18','2017-12-12 22:42:18'),(2,0,NULL,'My Sample Post',NULL,'This is the excerpt for the sample Post','<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>','posts/post2.jpg','my-sample-post','Meta Description for sample post','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-12 22:42:18','2017-12-12 22:42:18'),(3,0,NULL,'Latest Post',NULL,'This is the excerpt for the latest post','<p>This is the body for the latest post</p>','posts/post3.jpg','latest-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-12 22:42:18','2017-12-12 22:42:18'),(4,0,NULL,'Yarr Post',NULL,'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.','<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>','posts/post4.jpg','yarr-post','this be a meta descript','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-12 22:42:18','2017-12-12 22:42:18');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `availibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_wcs` int(11) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `has_living_room` tinyint(1) DEFAULT NULL,
  `has_cleaning` tinyint(1) DEFAULT NULL,
  `expenses_included` tinyint(1) DEFAULT NULL,
  `flatmates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_terrace` tinyint(1) DEFAULT NULL,
  `only_girls` tinyint(1) DEFAULT NULL,
  `landlord_id` int(10) unsigned NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `presentation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stay` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_landlord_id_foreign` (`landlord_id`),
  CONSTRAINT `properties_landlord_id_foreign` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1470 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1176,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','RC','Room',160.00,6,'available',2,0.00,0.00,1,1,0,'pt',1,1,1,'img/RoomPics/01/0101/010101/1.JPG',10101,'Amazing house in','Historic center',1),(1177,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','RC','Room',160.00,6,'available',2,0.00,0.00,1,1,0,'it',1,1,1,'img/RoomPics/01/0101/010102/1.JPG',10102,'Amazing house in','Historic center',1),(1178,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','RC','Room',150.00,6,'available',2,0.00,0.00,1,1,0,'es',1,1,1,'img/RoomPics/01/0101/010103/1.JPG',10103,'Amazing house in','Historic center',1),(1179,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','RC','Room',150.00,6,'available',2,0.00,0.00,1,1,0,'ds',1,1,1,'img/RoomPics/01/0101/010104/2.JPG',10104,'Amazing house in','Historic center',1),(1180,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','RC','Room',150.00,6,'available',2,0.00,0.00,1,1,0,'',1,1,1,'img/RoomPics/01/0101/010105/1.JPG',10105,'Amazing house in','Historic center',1),(1181,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','RC','Room',150.00,6,'available',2,0.00,0.00,1,1,0,'',1,1,1,'img/RoomPics/01/0101/010106/1.JPG',10106,'Amazing house in','Historic center',1),(1182,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','Cave','Room',150.00,3,'available',2,0.00,0.00,0,1,0,'',1,0,1,'img/RoomPics/01/0102/010201/1.JPG',10201,'Great house in','Historic center',1),(1183,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','Cave','Room',150.00,3,'available',2,0.00,0.00,0,1,0,'',1,0,1,'img/RoomPics/01/0102/010202/1.JPG',10202,'Great house in','Historic center',1),(1184,'House very comfortable, located in the historic center of Coimbra.','Largo Augusto Hilario','6','Cave','Room',150.00,3,'available',2,0.00,0.00,0,1,0,'ds',1,0,1,'img/RoomPics/01/0102/010203/1.JPG',10203,'Great house in','Historic center',1),(1185,'Newly built apartment, good looking, close to the center of Coimbra. ','Rua Montarroio','95','','T2',450.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0201/1.JPG',20101,'2 bedroom apartment around','Praça ',0),(1186,'Newly built apartment, good looking, close to the center of Coimbra. ','Rua Montarroio','89','','T2',450.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0202/020202/1.JPG',20201,'2 bedroom apartment around','Praça ',0),(1187,'Newly built, spacious apartment, around center of Coimbra.','Rua Montarroio','93','1-esq','T4',1000.00,4,'available',2,0.00,0.00,1,1,1,'ds',0,0,2,'img/RoomPics/02/0203/020303/1.JPG',20301,'4 bedroom apartment around','Praça ',0),(1188,'Newly built, good looking apartment, very well located.','Rua Montarroio','93','1-dir','T3',800.00,3,'available',2,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0204/020401/1.JPG',20401,'3 bedroom apartment around','Praça ',0),(1189,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','','Room(double)',360.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020501/1.JPG',20501,'Recently built house near','Praça ',0),(1190,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','','Room ',230.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020502/1.JPG',20502,'Recently built house near','Praça ',0),(1191,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020503/1.JPG',20503,'Recently built house near','Praça ',0),(1192,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','','Room',225.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020504/1.JPG',20504,'Recently built house near','Praça ',0),(1193,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','','Room',225.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020504/2.JPG',20505,'Recently built house near','Praça ',0),(1194,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','A','Room ',200.00,7,'available',2,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020601/1.JPG',20601,'Newly built apartment near','Praça ',0),(1195,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','A','Room ',225.00,7,'available',2,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020602/1.JPG',20602,'Newly built apartment near','Praça ',0),(1196,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','A','Room ',225.00,7,'available',2,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020603/1.JPG',20603,'Newly built apartment near','Praça ',0),(1197,'Perfect house for students, with a big kitchen and living room.','Rua da Saragoca','6','A','Room ',225.00,7,'available',2,0.00,0.00,1,1,1,'',0,0,2,'img/RoomPics/02/0205/020604/1.JPG',20604,'Newly built apartment near','Praça ',0),(1198,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',210.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030101/1.JPG',30101,'Big room in','Baixa',0),(1199,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',210.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030103/1.JPG',30102,'Big room in','Baixa',0),(1200,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',230.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030102/1.JPG',30103,'Big room in','Baixa',0),(1201,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',230.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030104/1.JPG',30104,'Big room in','Baixa',0),(1202,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',230.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030105/1.JPG',30105,'Big room in','Baixa',0),(1203,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',230.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030106/1.JPG',30106,'Big room in','Baixa',0),(1204,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',230.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030107/1.JPG',30107,'Big room in','Baixa',0),(1205,'Big house in the downtown of the city. Perfect for those who love to go for a walk near the river.','Rua Adelino Veiga','23','','Room',210.00,10,'available',4,0.00,0.00,0,1,1,'',1,0,3,'img/RoomPics/03/0301/030108/1.JPG',30108,'Big room in','Baixa',0),(1206,'Great house, with really good s, located in the center of Coimbra. ','Rua Antero de Quental','203','','Room(double)',380.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,4,'img/RoomPics/04/0401/040101/1.JPG',40101,'Great double room near','Praça ',0),(1207,'Great house, with really good facilities, located in the center of Coimbra. ','Rua Antero de Quental','203','','Room(double)',380.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,4,'img/RoomPics/04/0401/040101/3.JPG',40102,'Great double room near','Praça ',0),(1208,'Great house, with really good facilities, located in the center of Coimbra. ','Rua Antero de Quental','203','','Room(double)',380.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,4,'img/RoomPics/04/0401/040102/1.JPG',40103,'Great double room near','Praça ',0),(1209,'Great house, with really good facilities, located in the center of Coimbra. ','Rua Antero de Quental','203','','Room(double)',380.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,4,'img/RoomPics/04/0401/040102/4.JPG',40104,'Great double room near','Praça ',0),(1210,'Great house, with really good facilities, located in the center of Coimbra. ','Rua Antero de Quental','203','','Room(double)',380.00,2,'available',1,0.00,0.00,1,1,1,'',0,0,4,'img/RoomPics/04/0401/040101/2.JPG',40105,'Great double room near','Praça ',0),(1211,'Great and spacious house, very well located','Rua Antero de Quental','24','2-esq.','Room',220.00,4,'available',3,0.00,0.00,1,1,1,'',0,0,5,'img/RoomPics/05/0501/050101/1.JPG',50101,'Bedroom well located around','Praça ',0),(1212,'Great and spacious house, very well located','Rua Antero de Quental','24','2-esq.','Room',220.00,4,'available',3,0.00,0.00,1,1,1,'',0,0,5,'img/RoomPics/05/0501/050102/2.JPG',50102,'Bedroom well located around','Praça ',0),(1213,'Great and spacious house, very well located','Rua Antero de Quental','24','2-esq.','Room',220.00,4,'available',3,0.00,0.00,1,1,1,'',0,0,5,'img/RoomPics/05/0501/050103/1.JPG',50103,'Bedroom well located around','Praça ',0),(1214,'Great and spacious house, very well located','Rua Antero de Quental','24','2-esq.','Room',240.00,4,'available',3,0.00,0.00,1,1,1,'',0,0,5,'img/RoomPics/05/0501/050104/1.JPG',50104,'Bedroom well located around','Praça ',0),(1215,'Great and spacious house, very well located','Rua Antero de Quental','24','2-esq.','Room',240.00,4,'available',3,0.00,0.00,1,1,1,'',0,0,5,'img/RoomPics/05/0501/050105/2.JPG',50105,'Bedroom well located around','Praça ',0),(1216,'Small studio near city center','Rua Antero de Quental','54','RC','T0 ',250.00,1,'available',1,0.00,0.00,1,1,1,'',1,0,5,'',50201,'Studio near','Praça ',0),(1217,'Big house, near Hospital, very spacious with terrace and garden, perfect for a barbecue.','Av. Bissaya Barreto','267','Cave','Room',220.00,3,'available',1,0.00,0.00,1,1,1,'',1,0,5,'img/RoomPics/05/0502/050201/1.JPG',50301,'Big room near','Celas',0),(1218,'Big house, near Hospital, very spacious with terrace and garden, perfect for a barbecue.','Av. Bissaya Barreto','267','Cave','Room',220.00,3,'available',1,0.00,0.00,1,1,1,'',1,0,5,'img/RoomPics/05/0502/050202/1.JPG',50302,'Big room near','Celas',0),(1219,'Big house, near Hospital, very spacious with terrace and garden, perfect for a barbecue.','Av. Bissaya Barreto','267','Cave','Room',200.00,3,'available',1,0.00,0.00,1,1,1,'',1,0,5,'img/RoomPics/05/0502/050202/2.JPG',50303,'Big room near','Celas',0),(1220,'2 bedroom apartment near Cruz de Celas, very well located','Rua do Cabido ','9','RC','T0',300.00,1,'available',1,0.00,0.00,1,1,1,'',1,0,5,'img/RoomPics/05/0503/1.JPG',50401,'2 bedroom apartment in','Celas',0),(1221,'3 bedroom apartment near Cruz de Celas, very well located','Rua Eca de Queiros','39','1-andar','Room',280.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0601/060101/1.JPG',60101,'3 bedroom apartment in','Celas',0),(1222,'Studio near the historic Se Velha, a good neighborhood for a student to live','Rua Eca de Queiros','39','1-andar','Room',280.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0601/060102/1.JPG',60102,'Studio in','Se Velha',0),(1223,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','1-andar','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0601/060103/1.JPG',60103,'Good room near','Praça ',0),(1224,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','1-andar','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0601/060104/1.JPG',60104,'Good room near','Praça ',0),(1225,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','1-andar','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0601/060105/1.JPG',60105,'Good room near','Praça ',0),(1226,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','Cave','Room',280.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0605/060501/1.JPG',60201,'Good room near','Praça ',0),(1227,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','Cave','Room',280.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0605/060502/1.JPG',60202,'Good room near','Praça ',0),(1228,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','Cave','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0605/060503/1.JPG',60203,'Great room near','Praça ',0),(1229,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','Cave','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0605/060504/1.JPG',60204,'Great room near','Praça ',0),(1230,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','Cave','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0605/060505/1.JPG',60205,'Great room near','Praça ',0),(1231,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','RC','Room',280.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0604/060401/1.JPG',60301,'Great room near','Praça ',0),(1232,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','RC','Room',280.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0604/060402/1.JPG',60302,'Great room near','Praça ',0),(1233,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','RC','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0604/060403/1.JPG',60303,'Room near','Praça ',0),(1234,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','RC','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0604/060404/1.JPG',60304,'Room near','Praça ',0),(1235,'Amazing house with an outside terrace and very spacious areas.','Rua Eca de Queiros','39','RC','Room',250.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0604/060405/1.JPG',60305,'Room near','Praça ',0),(1236,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room(double)',370.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060201/1.JPG',60401,'Room near','Praça ',0),(1237,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room',240.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060202/1.JPG',60402,'Room near','Praça ',0),(1238,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room',240.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060203/1.JPG',60403,'2 bedroom apartment near','Praça ',0),(1239,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room',260.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060204/1.JPG',60404,'Double room near','Praça ',0),(1240,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room',230.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060205/1.JPG',60405,'Room around','Praça ',0),(1241,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room(double)',350.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060206/1.JPG',60406,'Room around','Praça ',0),(1242,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room',240.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060207/1.JPG',60407,'Room around','Praça ',0),(1243,'Amazing house with an outside terrace and very spacious areas.','Rua Antero de Quental','161','1-andar','Room(double)',350.00,8,'available',1,0.00,0.00,1,1,1,'',1,0,6,'img/RoomPics/06/0602/060208/1.JPG',60408,'Room around','Praça ',0),(1244,'Amazing house with an outside terrace and very spacious areas.','Rua Joao de Deus','5','3-andar','Room',300.00,4,'available',1,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0603/060301/1.JPG',60501,'Room around','Praça ',0),(1245,'Amazing house with an outside terrace and very spacious areas.','Rua Joao de Deus','5','3-andar','Room',260.00,4,'available',1,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0603/060302/1.JPG',60502,'Room around','Praça ',0),(1246,'Amazing house with an outside terrace and very spacious areas.','Rua Joao de Deus','5','3-andar','Room',370.00,4,'available',1,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0603/060303/1.JPG',60503,'Room around','Praça ',0),(1247,'Beautiful house located on a great neighborhood.','Rua Joao de Deus','5','3-andar','Room',370.00,4,'available',1,0.00,0.00,1,1,1,'',0,0,6,'img/RoomPics/06/0603/060304/1.JPG',60504,'Beautiful room near','Praça ',0),(1248,'Beautiful house located on a great neighborhood.','Rua Pedro Monteiro','74','','Room',140.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/2.JPG',70101,'Beautiful room near','Praça ',0),(1249,'Beautiful house located on a great neighborhood.','Rua Pedro Monteiro','74','','Room',220.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/2.JPG',70102,'Beautiful room near','Praça ',0),(1250,'Beautiful house located on a great neighborhood.','Rua Pedro Monteiro','74','','Room',220.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/2.JPG',70103,'Beautiful room near','Praça ',0),(1251,'Amazing house with an outside terrace and very spacious areas.','Rua Pedro Monteiro','74','','Room',200.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/2.JPG',70104,'Room near','Combatentes',0),(1252,'Amazing house with an outside terrace and very spacious areas.','Rua Pedro Monteiro','74','','Room',200.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/2.JPG',70105,'Room near','Combatentes',0),(1253,'Amazing house with an outside terrace and very spacious areas.','Rua Pedro Monteiro','76','','Room',200.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/1.JPG',70201,'Room near','Combatentes',0),(1254,'Perfect house for students, with a big kitchen and living room.','Rua Pedro Monteiro','76','','Room',200.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/1.JPG',70202,'Room in','Praça ',0),(1255,'Perfect house for students, with a big kitchen and living room.','Rua Pedro Monteiro','76','','Room',200.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/1.JPG',70203,'Room in','Praça ',0),(1256,'Perfect house for students, with a big kitchen and living room.','Rua Pedro Monteiro','76','','Room',220.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/1.JPG',70204,'Room in','Praça ',0),(1257,'Perfect house for students, with a big kitchen and living room.','Rua Pedro Monteiro','76','','Room',150.00,6,'available',4,0.00,0.00,1,1,0,'',1,0,7,'img/RoomPics/07/0701/070101/1.JPG',70205,'Room in','Praça ',0),(1258,'Perfect house for students, with a big kitchen and living room.','Rua Antero de Quental','','Cave','Room',230.00,4,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto1',80101,'Room in','Praça ',0),(1259,'Perfect house for students, with a big kitchen and living room.','Rua Antero de Quental','','Cave','Room',230.00,4,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto2',80102,'Room in','Praça ',0),(1260,'Perfect house for students, with a big kitchen and living room.','Rua Antero de Quental','','Cave','Room',230.00,4,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto1',80103,'Room in','Praça ',0),(1261,'Perfect house for students, with a big kitchen and living room.','Rua Antero de Quental','','Cave','Room',230.00,4,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto2',80104,'Room in','Praça ',0),(1262,'Perfect house for students, with a big kitchen and living room.','Rua Antero de Quental','','1-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto1',80105,'Room in','Praça ',0),(1263,'Perfect house for students, with a big kitchen and living room.','Rua Antero de Quental','','1-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto2',80106,'Room in','Praça ',0),(1264,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','1-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto1',80107,'Room around','Praça ',0),(1265,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','1-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto2',80108,'Room around','Praça ',0),(1266,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','1-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto1',80109,'Room around','Praça ',0),(1267,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','2-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto2',80110,'Room around','Praça ',0),(1268,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','2-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto1',80111,'Room around','Praça ',0),(1269,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','2-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'https://www.dropbox.com/home/Quartos%20Site/08%20-%20D%20Alice/quarto2',80112,'Room around','Praça ',0),(1270,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','2-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'',80113,'Room around','Praça ',0),(1271,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','2-andar','Room',230.00,5,'available',2,0.00,0.00,0,1,1,'',0,0,8,'',80114,'Room around','Praça ',0),(1272,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','3-andar','Room',230.00,2,'available',2,0.00,0.00,0,1,1,'',0,0,8,'img/RoomPics/08/0801/080101/1.JPG',80115,'Room around','Praça ',0),(1273,'Great house with daily cleaning in the common areas. ','Rua Antero de Quental','','3-andar','Room',230.00,2,'available',2,0.00,0.00,0,1,1,'',0,0,8,'img/RoomPics/08/0801/080102/1.JPG',80116,'Room around','Praça ',0),(1274,'Great house with daily cleaning in the common areas. ','Rua Padre Manuel da Nobrega','','','Room',230.00,4,'available',2,0.00,0.00,1,1,1,'',0,0,8,'',80201,'Room around','Praça ',0),(1275,'Great house with daily cleaning in the common areas. ','Rua Padre Manuel da Nobrega','','','Room',230.00,4,'available',2,0.00,0.00,1,1,1,'',0,0,8,'',80202,'Room around','Praça ',0),(1276,'Great house with daily cleaning in the common areas. ','Rua Padre Manuel da Nobrega','','','Room',230.00,4,'available',2,0.00,0.00,1,1,1,'',0,0,8,'',80203,'Room around','Praça ',0),(1277,'Great house with daily cleaning in the common areas. ','Rua da Manutencao','9','RC','Room',200.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,9,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto1',90101,'Room around','Praça ',0),(1278,'Great house with daily cleaning in the common areas. ','Rua da Manutencao','9','RC','Room',220.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,9,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto2',90102,'Room around','Praça ',0),(1279,'Great house with daily cleaning in the common areas. ','Rua da Manutencao','9','RC','Room',200.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,9,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto3',90103,'Room around','Praça ',0),(1280,'Great house with daily cleaning in the common areas. ','Rua da Manutencao','9','RC','Room',220.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,9,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto4',90104,'Room around','Celas',0),(1281,'Great house with daily cleaning in the common areas. ','Rua da Manutencao','9','RC','Room',200.00,5,'available',3,0.00,0.00,1,1,1,'',0,0,9,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto5',90105,'Room around','Celas',0),(1282,'Great house with daily cleaning in the common areas. ','Rua da Manutencao','9','1-andar','Room',220.00,5,'available',6,0.00,0.00,1,1,1,'',0,0,9,'img/RoomPics/09/0901/090101/1.JPG',90201,'Room around','Celas',0),(1283,'House very well located, great neighborhood','Rua da Manutencao','9','1-andar','Room',220.00,5,'available',6,0.00,0.00,1,1,1,'',0,0,9,'img/RoomPics/09/0901/090102/1.JPG',90202,'Room in','Praça ',0),(1284,'House very well located, great neighborhood','Rua da Manutencao','9','1-andar','Room',220.00,5,'available',6,0.00,0.00,1,1,1,'',0,0,9,'img/RoomPics/09/0901/090102/2.JPG',90203,'Room in','Praça ',0),(1285,'House very well located, great neighborhood','Rua da Manutencao','9','1-andar','Room',230.00,5,'available',6,0.00,0.00,1,1,1,'',0,0,9,'img/RoomPics/09/0901/090103/1.JPG',90204,'Room in','Praça ',0),(1286,'House very well located, great neighborhood','Rua da Manutencao','9','1-andar','Room',230.00,5,'available',6,0.00,0.00,1,1,1,'',0,0,9,'img/RoomPics/09/0901/090103/2.JPG',90205,'Room in','Praça ',0),(1287,'House very well located, great neighborhood','Rua da Manutencao','9','1-andar','Room',230.00,5,'available',6,0.00,0.00,1,1,1,'',0,0,9,'img/RoomPics/09/0901/090102/3.JPG',90206,'Room in','Praça ',0),(1288,'House with private bathroom','Rua da Manutencao','9','3-andar','Room',240.00,5,'available',2,0.00,0.00,1,1,1,'',1,0,9,'img/RoomPics/09/0902/090201/1.JPG',90301,'Room in','Praça ',0),(1289,'House with private bathroom','Rua da Manutencao','9','3-andar','Room',200.00,5,'available',2,0.00,0.00,1,1,1,'',1,0,9,'img/RoomPics/09/0902/090202/1.JPG',90302,'Room in','Praça ',0),(1290,'House with private bathroom','Rua da Manutencao','9','3-andar','Room',200.00,5,'available',2,0.00,0.00,1,1,1,'',1,0,9,'img/RoomPics/09/0902/090203/1.JPG',90303,'Room in','Praça ',0),(1291,'House with private bathroom','Rua da Manutencao','9','3-andar','Room',220.00,5,'available',2,0.00,0.00,1,1,1,'',1,0,9,'img/RoomPics/09/0902/090204/1.JPG',90304,'Room in','Praça ',0),(1292,'House with private bathroom','Rua da Manutencao','9','3-andar','Room',220.00,5,'available',2,0.00,0.00,1,1,1,'',1,0,9,'img/RoomPics/09/0902/090205/1.JPG',90305,'Room in','Praça ',0),(1293,'House with private bathroom','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto1',100101,'Room in','Praça ',0),(1294,'House very well located, great neighborhood','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto2',100102,'Room in','Praça ',0),(1295,'House very well located, great neighborhood','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto3',100103,'Room in','Praça ',0),(1296,'House very well located, great neighborhood','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto4',100104,'Room in','Praça ',0),(1297,'House very well located, great neighborhood','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto5',100105,'Room in','Praça ',0),(1298,'House very well located, great neighborhood','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto6',100106,'Room in','Praça ',0),(1299,'Charming house, recently built with amazing facilities.','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto6',100107,'Beautiful room in','Solum',0),(1300,'Charming house, recently built with amazing facilities.','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto7',100108,'Beautiful room in','Solum',0),(1301,'Charming house, recently built with amazing facilities.','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto8',100109,'Beautiful room in','Solum',0),(1302,'Charming house, recently built with amazing facilities.','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto9',100110,'Beautiful room in','Solum',0),(1303,'Charming house, recently built with amazing facilities.','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/09%20-%20Louren%C3%A7o/1%20-%20Andar/quarto10',100111,'Beautiful room in','Solum',0),(1304,'Charming house, recently built with amazing facilities.','Rua do Brasil','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20NAvarro%20-%20Female/quarto7',100112,'Beautiful room in','Solum',0),(1305,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1001/100101/1.JPG',100201,'Beautiful room in','Solum',0),(1306,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1001/100102/1.JPG',100202,'Beautiful room in','Solum',0),(1307,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1001/100103/1.JPG',100203,'Beautiful room in','Solum',0),(1308,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1001/100104/1.JPG',100204,'Beautiful room in','Solum',0),(1309,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1001/100105/1.JPG',100205,'Beautiful room in','Solum',0),(1310,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1001/100106/1.JPG',100206,'Beautiful room in','Solum',0),(1311,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'img/RoomPics/10/1002/100201/1.JPG',100207,'Beautiful room in','Baixa',0),(1312,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'img/RoomPics/10/1002/100202/1.JPG',100208,'Beautiful room in','Baixa',0),(1313,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'img/RoomPics/10/1002/100203/1.JPG',100209,'Beautiful room in','Baixa',0),(1314,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'img/RoomPics/10/1002/100204/1.JPG',100210,'Beautiful room in','Baixa',0),(1315,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'img/RoomPics/10/1002/100205/1.JPG',100211,'Beautiful room in','Baixa',0),(1316,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'img/RoomPics/10/1002/100206/1.JPG',100212,'Beautiful room in','Baixa',0),(1317,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto13',100213,'Beautiful room in','Baixa',0),(1318,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto14',100214,'Beautiful room in','Baixa',0),(1319,'Charming house, recently built with amazing facilities.','Avenida Emidio Navarro','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto15',100215,'Beautiful room in','Baixa',0),(1320,'Charming house, recently built with amazing facilities.','Travessa Vila Uniao','','','T0',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto16',100301,'Beautiful room in','Baixa',0),(1321,'Charming house, recently built with amazing facilities.','Travessa Vila Uniao','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto17',100302,'Beautiful room in','Baixa',0),(1322,'Charming house, recently built with amazing facilities.','Travessa Vila Uniao','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto18',100303,'Beautiful room in','Baixa',0),(1323,'Charming house, recently built with amazing facilities.','Travessa Vila Uniao','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto19',100304,'Beautiful room in','Baixa',0),(1324,'Charming house, recently built with amazing facilities.','Travessa Vila Uniao','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto20',100305,'Beautiful room in','Baixa',0),(1325,'Charming house, recently built with amazing facilities.','Travessa Vila Uniao','','','Room',250.00,0,'available',0,0.00,0.00,0,1,1,'',0,1,10,'https://www.dropbox.com/home/Quartos%20Site/10%20-%20Joya%20Real/Emidio%20Navarro%20-%20Male/quarto21',100306,'Beautiful room in','Baixa',0),(1326,'Charming house, recently built with amazing facilities.','Praca da Republica','24','1-andar','Room',240.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110101/1.JPG',110101,'Beautiful room in','Solum',0),(1327,'Charming house, recently built with amazing facilities.','Praca da Republica','24','1-andar','Room',240.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110102/1.JPG',110102,'Beautiful room in','Solum',0),(1328,'Charming house, recently built with amazing facilities.','Praca da Republica','24','1-andar','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110103/1.JPG',110103,'Beautiful room in','Solum',0),(1329,'Charming house, recently built with amazing facilities.','Praca da Republica','24','1-andar','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110104/1.JPG',110104,'Beautiful room in','Solum',0),(1330,'Charming house, recently built with amazing facilities.','Praca da Republica','24','1-andar','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110105/1.JPG',110105,'Beautiful room in','Solum',0),(1331,'Charming house, recently built with amazing facilities.','Praca da Republica','24','1-andar','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110106/1.JPG',110106,'Beautiful room in','Solum',0),(1332,'Recently reshaped house near city center, with good facilities','Praca da Republica','24','1-andar','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110106/1.JPG',110107,'Good room in','Praça ',0),(1333,'Recently reshaped house near city center, with good facilities','Praca da Republica','24','1-andar','Room',250.00,6,'available',3,0.00,0.00,1,1,1,'',0,0,11,'img/RoomPics/11/1101/110105/1.JPG',110108,'Good room in','Praça ',0),(1334,'Recently reshaped house near city center, with good facilities','Rua Nicolau Chanterenne','','','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110101,'Good room in','Praça ',0),(1335,'Recently reshaped house near city center, with good facilities','Rua Nicolau Chanterenne','','','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110102,'Good room in','Praça ',0),(1336,'Recently reshaped house near city center, with good facilities','Rua Nicolau Chanterenne','','','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110103,'Good room in','Praça ',0),(1337,'Recently reshaped house near city center, with good facilities','Rua Nicolau Chanterenne','','','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110104,'Good room in','Praça ',0),(1338,'Recently reshaped house near city center, with good facilities','Rua Nicolau Chanterenne','','','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110105,'Good room in','Praça ',0),(1339,'Recently reshaped house near city center, with good facilities','Rua Nicolau Chanterenne','','','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110106,'Good room in','Praça ',0),(1340,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','RC','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110201,'Good room in','Praça ',0),(1341,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','RC','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110202,'Good room in','Se Velha',0),(1342,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','1-andar','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110301,'Good room in','Se Velha',0),(1343,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','1-andar','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110302,'Good room in','Se Velha',0),(1344,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','3-andar','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110401,'Good room in','Se Velha',0),(1345,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','3-andar','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110402,'Good room in','Se Velha',0),(1346,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','3-andar','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110403,'Good room in','Se Velha',0),(1347,'Recently reshaped house near city center, with good facilities','Rua Eduardo Coelho','','3-andar','Room',1.00,0,'available',0,0.00,0.00,0,1,1,'',0,0,12,'',110404,'Good room in','Praça ',0),(1348,'Recently reshaped house near city center, with good facilities','Rua Antero de Quental','159','','Room',180.00,6,'available',3,0.00,0.00,1,0,0,'',0,0,13,'',120101,'Good room in','Praça ',0),(1349,'Recently reshaped house near city center, with good facilities','Rua Antero de Quental','159','','Room',180.00,6,'available',3,0.00,0.00,1,0,0,'',0,0,13,'',120102,'Good room in','Praça ',0),(1350,'Recently reshaped house near city center, with good facilities','Rua Antero de Quental','159','','Room',160.00,6,'available',3,0.00,0.00,1,0,0,'',0,0,13,'',120103,'Good room in','Praça ',0),(1351,'Great house and amazing areas inside.','Rua Antero de Quental','159','','Room',160.00,6,'available',3,0.00,0.00,1,0,0,'',0,0,13,'',120104,'Good room in','Celas',0),(1352,'Great house and amazing areas inside.','Rua Antero de Quental','159','','Room',160.00,6,'available',3,0.00,0.00,1,0,0,'',0,0,13,'',120105,'Good room in','Celas',0),(1353,'Great house and amazing areas inside.','Praca da Rea','32','','Room',200.00,6,'available',2,0.00,0.00,1,0,0,'',0,1,14,'img/RoomPics/14/1401/140101/1.JPG',130101,'Good room in','Celas',0),(1354,'Great house and amazing areas inside.','Praca da Rea','32','','Room',200.00,6,'available',2,0.00,0.00,1,0,0,'',0,1,14,'img/RoomPics/14/1401/140101/2.JPG',130102,'Good room in','Celas',0),(1355,'Great house and amazing areas inside.','Praca da Rea','32','','Room',190.00,6,'available',2,0.00,0.00,1,0,0,'',0,1,14,'img/RoomPics/14/1401/140101/1.JPG',130103,'Good room in','Celas',0),(1356,'Great house and amazing areas inside.','Praca da Rea','32','','Room',190.00,6,'available',2,0.00,0.00,1,0,0,'',0,1,14,'img/RoomPics/14/1401/140101/2.JPG',130104,'Good room in','Celas',0),(1357,'Great house and amazing areas inside.','Praca da Rea','32','','Room',190.00,6,'available',2,0.00,0.00,1,0,0,'',0,1,14,'img/RoomPics/14/1401/140101/1.JPG',130105,'Good room in','Baixa',0),(1358,'Great house and amazing areas inside.','Praca da Rea','32','','Room',190.00,6,'available',2,0.00,0.00,1,0,0,'',0,1,14,'img/RoomPics/14/1401/140101/2.JPG',130106,'Good room in','Baixa',0),(1359,'Great house and amazing areas inside.','Rua Antonio Nobre','4','','Room',255.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1501/150101/1.JPG',140101,'Good room in','Baixa',0),(1360,'Great house and amazing areas inside.','Rua Antonio Nobre','4','','Room',235.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1501/150102/1.JPG',140102,'Good room in','Baixa',0),(1361,'Great house and amazing areas inside.','Rua Antonio Nobre','4','','Room',250.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1501/150103/1.JPG',140103,'Good room in','Baixa',0),(1362,'Great house and amazing areas inside.','Rua Antonio Nobre','4','','Room',240.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1501/150104/1.JPG',140104,'Good room in','Baixa',0),(1363,'Great house and amazing areas inside.','Rua Antonio Nobre','4','','Room',255.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1501/150105/1.JPG',140105,'Good room in','Baixa',0),(1364,'Great house and amazing areas inside.','Rua Antonio Nobre','4','','Room',230.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1501/150106/1.JPG',140106,'Good room in','Baixa',0),(1365,'House with a big living room, right in the center of the city','Rua Antonio Nobre','4','','Room',255.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1502/150201/1.JPG',140107,'Room near','Praça ',0),(1366,'House with a big living room, right in the center of the city','Rua Antonio Nobre','4','','Room',235.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1502/150202/1.JPG',140108,'Room near','Praça ',0),(1367,'House with a big living room, right in the center of the city','Rua Antonio Nobre','4','','Room',245.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1502/150203/1.JPG',140109,'Room near','Praça ',0),(1368,'House with a big living room, right in the center of the city','Rua Antonio Nobre','4','','Room',240.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1502/150204/1.JPG',140110,'Room near','Praça ',0),(1369,'House with a big living room, right in the center of the city','Rua Antonio Nobre','4','','Room',255.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1502/150205/1.JPG',140111,'Room near','Praça ',0),(1370,'House with a big living room, right in the center of the city','Rua Antonio Nobre','4','','Room',250.00,6,'available',3,0.00,0.00,1,0,1,'',1,1,15,'img/RoomPics/15/1502/150206/1.JPG',140112,'Room near','Praça ',0),(1371,'House with a big living room, right in the center of the city','Avenida Dias da Silva','','','T1',350.00,0,'available',1,0.00,0.00,1,0,0,'',1,0,16,'img/RoomPics/16/1601/1.JPG',150101,'Room near','Praça ',0),(1372,'House with a big living room, right in the center of the city','Av. Calouste Gulbenkian','101','8-andar','Room',250.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1701/170101/1.JPG',160101,'Room near','Praça ',0),(1373,'House with a big living room, right in the center of the city','Av. Calouste Gulbenkian','101','8-andar','Room',250.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1701/170102/1.JPG',160102,'Room near','Praça ',0),(1374,'House with a big living room, right in the center of the city','Av. Calouste Gulbenkian','101','8-andar','Room',250.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1701/170103/1.JPG',160103,'Room near','Praça ',0),(1375,'House with a big living room, right in the center of the city','Av. Calouste Gulbenkian','101','8-andar','Room',250.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1701/170101/1.JPG',160104,'Room near','Praça ',0),(1376,'Great facilities and spaces. Located in a calm neighborhood.','Av. Calouste Gulbenkian','101','8-andar','Room',250.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1701/170102/1.JPG',160105,'Amazing room near','FEUC',0),(1377,'Great facilities and spaces. Located in a calm neighborhood.','Av. Calouste Gulbenkian','101','8-andar','Room',250.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1701/170103/1.JPG',160106,'Amazing room near','FEUC',0),(1378,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170201/1.JPG',160201,'Amazing room near','FEUC',0),(1379,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',220.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170202/1.JPG',160202,'Amazing room near','FEUC',0),(1380,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170203/1.JPG',160203,'Amazing room near','FEUC',0),(1381,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170204/1.JPG',160204,'Amazing room near','FEUC',0),(1382,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170205/1.JPG',160205,'Amazing room near','FEUC',0),(1383,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170206/1.JPG',160206,'Amazing room near','FEUC',0),(1384,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170201/1.JPG',160207,'Amazing room near','FEUC',0),(1385,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170202/1.JPG',160208,'Amazing room near','FEUC',0),(1386,'Great facilities and spaces. Located in a calm neighborhood.','Rua Infanta D.Tereza','29','4- andar','Room',225.00,6,'available',2,0.00,0.00,1,1,1,'',0,0,17,'img/RoomPics/17/1702/170203/1.JPG',160209,'Amazing room near','FEUC',0),(1387,'Great facilities and spaces. Located in a calm neighborhood.','Av. Dias da Silva','49','','Room',170.00,6,'available',2,0.00,0.00,1,1,0,'',1,0,18,'img/RoomPics/18/1801/180101/1.JPG',170101,'Amazing room near','FEUC',0),(1388,'Big apartment in a calm neighborhood.','Av. Dias da Silva','49','','Room',170.00,6,'available',2,0.00,0.00,1,1,0,'',1,0,18,'img/RoomPics/18/1801/180102/1.JPG',170102,'1 bedroom apartment in','FEUC',0),(1389,'House in a calm and student neighborhood','Av. Dias da Silva','49','','Room',170.00,6,'available',2,0.00,0.00,1,1,0,'',1,0,18,'img/RoomPics/18/1801/180103/1.JPG',170103,'Room near','Celas',0),(1390,'House in a calm and student neighborhood','Av. Dias da Silva','49','','Room',170.00,6,'available',2,0.00,0.00,1,1,0,'',1,0,18,'img/RoomPics/18/1801/180104/1.JPG',170104,'Room near','Celas',0),(1391,'House in a calm and student neighborhood','Av. Dias da Silva','49','','Room',170.00,6,'available',2,0.00,0.00,1,1,0,'',1,0,18,'img/RoomPics/18/1801/180105/1.JPG',170105,'Room near','Celas',0),(1392,'House in a calm and student neighborhood','Rua do Brasil','286','3-esq','Room(double)',320.00,4,'available',2,0.00,0.00,1,1,0,'',1,0,18,'img/RoomPics/18/1802/180201/1.JPG',170201,'Room near','Celas',0),(1393,'House in a calm and student neighborhood','Rua do Brasil','286','3-esq','Room',190.00,4,'available',2,0.00,0.00,1,1,0,'',0,0,18,'img/RoomPics/18/1802/180203/1.JPG',170202,'Room near','Celas',0),(1394,'House in a calm and student neighborhood','Rua do Brasil','286','3-esq','Room',190.00,4,'available',2,0.00,0.00,1,1,0,'',0,0,18,'img/RoomPics/18/1802/180204/1.JPG',170203,'Room near','Celas',0),(1395,'House in a calm and student neighborhood','Rua do Brasil','286','3-esq','Room',190.00,4,'available',2,0.00,0.00,1,1,0,'',0,0,18,'img/RoomPics/18/1802/180206/1.JPG',170204,'Room near','Celas',0),(1396,'House in a calm and student neighborhood','Rua do Brasil','286','3-esq','Room',190.00,4,'available',2,0.00,0.00,1,1,0,'',0,0,18,'img/RoomPics/18/1802/180207/1.JPG',170205,'Room near','Celas',0),(1397,'House in a calm and student neighborhood','Rua do Brasil','286','3-dir','Room(double)',320.00,4,'available',2,0.00,0.00,1,1,0,'',0,0,18,'img/RoomPics/18/1801/180105/1.JPG',170206,'Room near','Celas',0),(1398,'House in a calm and student neighborhood','Rua do Brasil','286','3-dir','Room(double)',320.00,4,'available',2,0.00,0.00,1,1,0,'',0,0,18,'img/RoomPics/18/1802/180202/1.JPG',170207,'Room near','Celas',0),(1399,'House in a calm and student neighborhood','Av. Sa da Bandeira','115','','T0',375.00,0,'available',1,0.00,0.00,1,0,1,'',0,0,19,'',180101,'Room near','Celas',0),(1400,'House in a calm and student neighborhood','Rua do Corvo','32','','T0',340.00,0,'available',1,0.00,0.00,1,0,1,'',0,0,20,'img/RoomPics/20/2001/1.JPG',190101,'Room near','Celas',0),(1401,'House in a calm and student neighborhood','Rua do Corvo','32','','T0',360.00,0,'available',1,0.00,0.00,1,0,1,'',0,0,20,'img/RoomPics/20/2002/1.JPG',190102,'Room near','Celas',0),(1402,'House in a calm and student neighborhood','Rua S. Salvador','16','1-andar','Room',165.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200101,'Room near','Celas',0),(1403,'House in a calm and student neighborhood','Rua S. Salvador','16','1-andar','Room',150.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200102,'Room near','Celas',0),(1404,'Very well located house, with a terrace and big outdoor space','Rua S. Salvador','16','1-andar','Room',130.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200103,'Room near','FEUC',0),(1405,'Very well located house, with a terrace and big outdoor space','Rua S. Salvador','16','2-andar','Room',160.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200201,'Room near','FEUC',0),(1406,'Very well located house, with a terrace and big outdoor space','Rua S. Salvador','16','2-andar','Room',130.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200202,'Room near','FEUC',0),(1407,'Very well located house, with a terrace and big outdoor space','Rua S. Salvador','16','Cave','Room',150.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200301,'Room near','FEUC',0),(1408,'Very well located house, with a terrace and big outdoor space','Rua S. Salvador','16','Cave','Room',130.00,0,'available',1,0.00,0.00,1,0,0,'',0,0,21,'',200302,'Room near','FEUC',0),(1409,'Apartment with great spaces and facilities.','Rua General H. Delgado','407','','Room',185.00,3,'available',1,0.00,0.00,0,0,0,'',0,1,22,'img/RoomPics/22/2201/220101/1.JPG',210101,'Great room in','Solum',0),(1410,'Apartment with great spaces and facilities.','Rua General H. Delgado','407','','Room',180.00,3,'available',1,0.00,0.00,0,0,0,'',0,1,22,'img/RoomPics/22/2201/220103/1.JPG',210102,'Great room in','Solum',0),(1411,'Apartment with great spaces and facilities.','Rua General H. Delgado','407','','Room',180.00,3,'available',1,0.00,0.00,0,0,0,'',0,1,22,'img/RoomPics/22/2201/220102/1.JPG',210103,'Great room in','Solum',0),(1412,'Apartment with great spaces and facilities.','Rua Volta das Calcadas de Baixo','2','','Room',220.00,0,'available',3,0.00,0.00,1,1,1,'',1,0,23,'img/RoomPics/23/2301/230101/1.JPG',220101,'Great room in','Solum',0),(1413,'Apartment with great spaces and facilities.','Rua Volta das Calcadas de Baixo','2','','Room',220.00,0,'available',4,0.00,0.00,1,1,1,'',1,0,23,'img/RoomPics/23/2301/230101/1.JPG',220102,'Great room in','Solum',0),(1414,'Apartment with great spaces and facilities.','Rua Volta das Calcadas de Baixo','2','','Room',220.00,0,'available',5,0.00,0.00,1,1,1,'',1,0,23,'img/RoomPics/23/2301/230101/1.JPG',220103,'Great room in','Solum',0),(1415,'Apartment with great spaces and facilities.','Rua Guilherme Gomes Fernandes','36','Cave','Room',170.00,0,'available',3,0.00,0.00,1,0,1,'',0,0,24,'img/RoomPics/18 - Luisa Abreu - Rua do Brasil/Room1/439459255nYn.JPG',230101,'Great room in','Solum',0),(1416,'Quality apartment, located on a prestige shopping mall.','Rua Guilherme Gomes Fernandes','36','Cave','Room',170.00,0,'available',4,0.00,0.00,1,0,1,'',0,0,24,'img/RoomPics/18 - Luisa Abreu - Rua do Brasil/Room3/439459255jl3.JPG',230102,'1 bedroom apartment','Praça ',0),(1417,'Recently built studio with quality facilities.','Rua Guilherme Gomes Fernandes','36','Cave','Room',190.00,0,'available',5,0.00,0.00,1,0,1,'',0,0,24,'img/RoomPics/18 - Luisa Abreu - Rua do Brasil/Room2/439459255aMg.JPG',230103,'Beautiful studio in','Baixa',0),(1418,'Recently built studio with quality facilities.','Rua Nova de Sao Sebastiao','','','Room',200.00,5,'available',2,0.00,0.00,0,1,0,'',0,0,25,'img/RoomPics/25/2501/250101/1.JPG',240101,'Beautiful studio in','Baixa',0),(1419,'House in the historic center of Coimbra','Rua Nicolau Chanterenne','241','2-andar','Room',180.00,5,'available',2,0.00,0.00,1,1,0,'',0,0,26,'img/RoomPics/26/2601/260101/1.JPG',250101,'Room in','Historic center',0),(1420,'House in the historic center of Coimbra','Rua Nicolau Chanterenne','241','2-andar','Room',180.00,5,'available',2,0.00,0.00,1,1,0,'',0,0,26,'img/RoomPics/26/2601/260101/2.JPG',250102,'Room in','Historic center',0),(1421,'House in the historic center of Coimbra','Rua Nicolau Chanterenne','241','2-andar','Room',180.00,5,'available',2,0.00,0.00,1,1,0,'',0,0,26,'img/RoomPics/26/2601/260102/1.JPG',250103,'Room in','Historic center',0),(1422,'House in the historic center of Coimbra','Rua Santo Rocha','21','1-esq','Room',165.00,5,'available',2,0.00,0.00,1,1,0,'',0,0,26,'img/RoomPics/26/2601/260103/2.JPG',250201,'Room in','Historic center',0),(1423,'House in the historic center of Coimbra','Rua Santo Rocha','21','1-esq','Room',165.00,5,'available',2,0.00,0.00,1,1,0,'',0,0,26,'img/RoomPics/26/2601/260103/1.JPG',250202,'Room in','Historic center',0),(1424,'House in the historic center of Coimbra','Rua do Brasil','307','','Room',175.00,3,'available',2,0.00,0.00,1,1,0,'',0,1,27,'',260101,'Room in','Historic center',0),(1425,'House in the historic center of Coimbra','Av.Dias da Silva','116','','Room',210.00,6,'available',2,0.00,0.00,0,1,1,'',1,1,28,'',270101,'Room in','Historic center',0),(1426,'Recently reshaped apartment near Alma shopping mall.','Av.Dias da Silva','116','','Room',210.00,6,'available',2,0.00,0.00,0,1,1,'',1,1,28,'',270102,'Room around','Solum',0),(1427,'Recently reshaped apartment near Alma shopping mall.','Av.Dias da Silva','116','','Room',210.00,6,'available',2,0.00,0.00,0,1,1,'',1,1,28,'',270103,'Room around','Solum',0),(1428,'Recently reshaped apartment near Alma shopping mall.','Av.Dias da Silva','116','','Room',210.00,6,'available',2,0.00,0.00,0,1,1,'',1,1,28,'',270104,'Room around','Solum',0),(1429,'Big house with terrace, living rooms, study rooms, located in Santa Clara','Av.Dias da Silva','116','','Room',210.00,6,'available',2,0.00,0.00,0,1,1,'',1,1,28,'',270105,'Wide room in','Santa Clara',0),(1430,'Big house with terrace, living rooms, study rooms, located in Santa Clara','Av.Dias da Silva','116','','Room',210.00,6,'available',2,0.00,0.00,0,1,1,'',1,1,28,'',270106,'Wide room in','Santa Clara',0),(1431,'Big house with terrace, living rooms, study rooms, located in Santa Clara','Av. Sa Bandeira','115','4-dir','Room',300.00,4,'available',1,0.00,0.00,1,1,1,'',0,0,28,'',270201,'Wide room in','Santa Clara',0),(1432,'Big house located in a calm neighborhood.','Av. Sa Bandeira','115','4-dir','Room',250.00,4,'available',1,0.00,0.00,1,1,1,'',0,0,28,'',270202,'Room in','Conchada',0),(1433,'Big house located in a calm neighborhood.','Rua Dr. Antonio Jose de Almeida','13','','Room',130.00,6,'available',2,0.00,0.00,1,1,1,'',1,1,28,'',270301,'Room in','Conchada',0),(1434,'Big house located in a calm neighborhood.','Rua Dr. Antonio Jose de Almeida','13','','Room',130.00,6,'available',2,0.00,0.00,1,1,1,'',1,1,28,'',270302,'Room in','Conchada',0),(1435,'House with spacious and quality facilities','Rua Dr. Antonio Jose de Almeida','13','','Room',130.00,6,'available',2,0.00,0.00,1,1,1,'',1,1,28,'',270303,'Room in','FEUC',0),(1436,'House with spacious and quality facilities','Rua Dr. Antonio Jose de Almeida','13','','Room',130.00,6,'available',2,0.00,0.00,1,1,1,'',1,1,28,'',270304,'Room in','FEUC',0),(1437,'Good house','Rua Dr. Antonio Jose de Almeida','13','','Room',150.00,6,'available',2,0.00,0.00,1,1,1,'',1,1,28,'',270305,'Room in','Celas',1),(1438,'Good house','Rua Dr. Antonio Jose de Almeida','13','','Room',150.00,6,'available',2,0.00,0.00,1,1,1,'',1,1,28,'',270306,'Room in','Celas',1),(1439,'Good house','Avenida D.Afonso Henriques','65','','Room',250.00,5,'available',2,0.00,0.00,1,0,0,'',0,0,29,'',280101,'Room in','Celas',1),(1440,'Good house','Beco das Condeixeiras','7','3-esq.','Room',180.00,3,'available',2,0.00,0.00,1,0,0,'',0,0,30,'',290101,'Room in','Praça ',1),(1441,'Good house','Beco das Condeixeiras','7','3-esq.','Room',220.00,3,'available',2,0.00,0.00,1,0,0,'',0,0,30,'',290102,'Room in','Praça ',1),(1442,'Good house','Rua dos Coutinhos','22','1-andar','Room',180.00,5,'available',2,0.00,0.00,1,0,0,'',0,0,31,'',300101,'Room in','Solum',0),(1443,'Beautiful house, recently reshaped, with a big outdoor space','Rua dos Coutinhos','22','RC','Room',180.00,5,'available',2,0.00,0.00,1,0,0,'',0,0,31,'',300102,'New room near','FEUC',0),(1444,'Beautiful house, recently reshaped, with a big outdoor space','Rua dos Coutinhos','22','RC','Room',160.00,5,'available',2,0.00,0.00,1,0,0,'',0,0,31,'',300103,'New room near','FEUC',0),(1445,'Beautiful house, recently reshaped, with a big outdoor space','Rua Dr.Antonio Jose Almeida','86','Cave','Room',180.00,4,'available',1,0.00,0.00,1,0,0,'',0,0,32,'',310101,'New room near','FEUC',0),(1446,'Beautiful house, recently reshaped, with a big outdoor space','Rua Dr.Antonio Jose Almeida','86','Cave','Room',180.00,4,'available',1,0.00,0.00,1,0,0,'',0,0,32,'',310102,'New room near','FEUC',0),(1447,'Beautiful house, recently reshaped, with a big outdoor space','Rua Dr.Antonio Jose Almeida','86','Cave','Room',160.00,4,'available',1,0.00,0.00,1,0,0,'',0,0,32,'',310103,'New room near','FEUC',0),(1448,'Beautiful house, recently reshaped, with a big outdoor space','Rua Guerra Junqueiro','55','3-andar','Room',240.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3301/330101/1.JPG',320101,'New room near','FEUC',0),(1449,'Very good house, quality apartment and big spaces.','Rua Guerra Junqueiro','55','3-andar','Room',240.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3301/330102/1.JPG',320102,'Great room near','Praça',0),(1450,'Very good house, quality apartment and big spaces.','Rua Guerra Junqueiro','55','3-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3301/330103/1.JPG',320103,'Great room near','Praça',0),(1451,'Good house, with outdoor spaces','Rua Guerra Junqueiro','55','3-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3301/330104/1.JPG',320104,'Room in','Celas',0),(1452,'Good house, with outdoor spaces','Rua Guerra Junqueiro','55','3-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3301/330105/1.JPG',320105,'Room in','Celas',0),(1453,'Good house, with outdoor spaces','Rua Guerra Junqueiro','55','3-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3301/330106/1.JPG',320106,'Room in','Celas',0),(1454,'Good house, with outdoor spaces','Rua Guerra Junqueiro','55','2-andar','Room',260.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3302/330201/2.JPG',320201,'Room in','Celas',0),(1455,'Good house, with outdoor spaces','Rua Guerra Junqueiro','55','2-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3302/330202/1.JPG',320202,'Room in','Celas',0),(1456,'Good house, with outdoor spaces','Rua Guerra Junqueiro','55','2-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3302/330203/1.JPG',320203,'Room in','Celas',0),(1457,'Great house','Rua Guerra Junqueiro','55','2-andar','Room',220.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3302/330204/1.JPG',320204,'Room in','Praça',0),(1458,'Good house','Rua Guerra Junqueiro','55','2-andar','Room',210.00,5,'available',2,0.00,0.00,1,0,1,'',1,0,33,'img/RoomPics/33/3302/330205/2.JPG',320205,'Room in','Historic center',1),(1459,'Good house','Rua dos Combatentes','25','A','T0',500.00,1,'available',1,0.00,0.00,1,1,1,'',1,0,34,'img/RoomPics/34/3401/340101/1.JPG',330101,'Room in','Historic center',1),(1460,'Good house','Rua dos Combatentes','25','A','T1',500.00,1,'available',2,0.00,0.00,1,1,1,'',1,0,34,'img/RoomPics/34/3401/340101/4.JPG',330201,'Room in','Se Velha',0),(1461,'Good house','Avenida Fernao Magalhaes','276','','T0',500.00,1,'available',3,0.00,0.00,1,1,1,'',1,0,34,'img/RoomPics/34/3401/340101/6.JPG',330301,'Room in','Se Velha',0),(1462,'Good house','Rua Dr. Antonio Jose de Almeida','28','','Room',240.00,3,'available',2,0.00,0.00,1,0,0,'',1,0,35,'img/RoomPics/35/3501/350101/1.JPG',340101,'Room in','Se Velha',0),(1463,'Recently reshaped house, really comfortable and good looking spaces','Rua Dr. Antonio Jose de Almeida','29','','Room',240.00,3,'available',2,0.00,0.00,1,0,0,'',1,0,35,'img/RoomPics/35/3501/350102/1.JPG',340102,'Beautiful room near','Celas',0),(1464,'Recently reshaped house, really comfortable and good looking spaces','Rua Dr. Antonio Jose de Almeida','30','','Room',240.00,3,'available',2,0.00,0.00,1,0,0,'',1,0,35,'img/RoomPics/35/3501/350103/1.JPG',340103,'Beautiful room near','Celas',0),(1465,'Recently reshaped house, really comfortable and good looking spaces','Rua Dr. Antonio Jose de Almeida','31','','Room',240.00,3,'available',2,0.00,0.00,1,0,0,'',1,0,35,'img/RoomPics/35/3501/350104/2.JPG',340104,'Beautiful room near','Celas',0),(1466,'Amazing house with an outside terrace and great views for the whole city','N/A','','','n/a',1.00,0,'available',0,0.00,0.00,0,0,0,'',1,0,36,'',350101,'Room near','Praça',0),(1467,'Amazing house with an outside terrace and great views for the whole city','Rua Teixeira de Carvalho','25','','T1',400.00,0,'available',1,0.00,0.00,1,1,0,'',1,0,37,'img/RoomPics/37/3701/1.JPG',360101,'Room near','Praça',0),(1468,'Amazing house with an outside terrace and great views for the whole city','Rua da Saragoca','5','','T2',475.00,1,'available',1,0.00,0.00,1,1,0,'',1,0,38,'img/RoomPics/38/3801/380101/1.png',370101,'Room near','Praça',0),(1469,'Amazing house with an outside terrace and great views for the whole city','Rua da Saragoca','5','','T2',475.00,1,'available',1,0.00,0.00,1,1,0,'',1,0,38,'img/RoomPics/38/3801/380102/1.png',370201,'Room near','Praça',0);
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `landlord_id` int(10) unsigned NOT NULL,
  `property_id` int(10) unsigned NOT NULL,
  `visit_request` datetime NOT NULL,
  `answer_request` datetime DEFAULT NULL,
  `is_match` tinyint(1) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `promotion_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_user_id_foreign` (`user_id`),
  KEY `requests_landlord_id_foreign` (`landlord_id`),
  KEY `requests_property_id_foreign` (`property_id`),
  CONSTRAINT `requests_landlord_id_foreign` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`),
  CONSTRAINT `requests_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2017-12-12 22:07:38','2017-12-12 22:07:38'),(2,'user','Normal User','2017-12-12 22:07:38','2017-12-12 22:07:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'data_types','display_name_singular',1,'pt','Post','2017-12-12 22:42:18','2017-12-12 22:42:18'),(2,'data_types','display_name_singular',2,'pt','Página','2017-12-12 22:42:18','2017-12-12 22:42:18'),(3,'data_types','display_name_singular',3,'pt','Utilizador','2017-12-12 22:42:18','2017-12-12 22:42:18'),(4,'data_types','display_name_singular',4,'pt','Categoria','2017-12-12 22:42:18','2017-12-12 22:42:18'),(5,'data_types','display_name_singular',5,'pt','Menu','2017-12-12 22:42:18','2017-12-12 22:42:18'),(6,'data_types','display_name_singular',6,'pt','Função','2017-12-12 22:42:18','2017-12-12 22:42:18'),(7,'data_types','display_name_plural',1,'pt','Posts','2017-12-12 22:42:18','2017-12-12 22:42:18'),(8,'data_types','display_name_plural',2,'pt','Páginas','2017-12-12 22:42:18','2017-12-12 22:42:18'),(9,'data_types','display_name_plural',3,'pt','Utilizadores','2017-12-12 22:42:18','2017-12-12 22:42:18'),(10,'data_types','display_name_plural',4,'pt','Categorias','2017-12-12 22:42:18','2017-12-12 22:42:18'),(11,'data_types','display_name_plural',5,'pt','Menus','2017-12-12 22:42:18','2017-12-12 22:42:18'),(12,'data_types','display_name_plural',6,'pt','Funções','2017-12-12 22:42:18','2017-12-12 22:42:18'),(13,'categories','slug',1,'pt','categoria-1','2017-12-12 22:42:18','2017-12-12 22:42:18'),(14,'categories','name',1,'pt','Categoria 1','2017-12-12 22:42:18','2017-12-12 22:42:18'),(15,'categories','slug',2,'pt','categoria-2','2017-12-12 22:42:18','2017-12-12 22:42:18'),(16,'categories','name',2,'pt','Categoria 2','2017-12-12 22:42:18','2017-12-12 22:42:18'),(17,'pages','title',1,'pt','Olá Mundo','2017-12-12 22:42:18','2017-12-12 22:42:18'),(18,'pages','slug',1,'pt','ola-mundo','2017-12-12 22:42:18','2017-12-12 22:42:18'),(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2017-12-12 22:42:18','2017-12-12 22:42:18'),(20,'menu_items','title',1,'pt','Painel de Controle','2017-12-12 22:42:18','2017-12-12 22:42:18'),(21,'menu_items','title',2,'pt','Media','2017-12-12 22:42:18','2017-12-12 22:42:18'),(22,'menu_items','title',3,'pt','Publicações','2017-12-12 22:42:18','2017-12-12 22:42:18'),(23,'menu_items','title',4,'pt','Utilizadores','2017-12-12 22:42:19','2017-12-12 22:42:19'),(24,'menu_items','title',5,'pt','Categorias','2017-12-12 22:42:19','2017-12-12 22:42:19'),(25,'menu_items','title',6,'pt','Páginas','2017-12-12 22:42:19','2017-12-12 22:42:19'),(26,'menu_items','title',7,'pt','Funções','2017-12-12 22:42:19','2017-12-12 22:42:19'),(27,'menu_items','title',8,'pt','Ferramentas','2017-12-12 22:42:19','2017-12-12 22:42:19'),(28,'menu_items','title',9,'pt','Menus','2017-12-12 22:42:19','2017-12-12 22:42:19'),(29,'menu_items','title',10,'pt','Base de dados','2017-12-12 22:42:19','2017-12-12 22:42:19'),(30,'menu_items','title',13,'pt','Configurações','2017-12-12 22:42:19','2017-12-12 22:42:19');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Ruben Gustavo Rita','ruben-god1@hotmail.com','/img/UsersPics/default.png',NULL,'dGMLOMR8SNEMCpRGoMkxYx43bOaf5zvfBth2DbInR0eza0VIigQRPDpEfsKM',NULL,NULL,NULL,'1728893023827449',NULL,NULL,NULL,'2017-11-29 21:31:00','2017-12-12 23:20:24'),(2,NULL,'Luis Miguel','luis.rocha.jacinto@gmail.com','/img/UsersPics/default.png',NULL,'RFY7TUuAAHPP9ou97tWAJM9dXPK4iX29AtjntfJSL3AAnymYc9L7Gb3GVpjp','Portuguese','Male',25,'2028340843842682',NULL,NULL,917674816,'2017-11-29 22:45:12','2017-11-29 22:45:12'),(3,NULL,'Rapha Gonçalves','rapha_gg@hotmail.com','/img/UsersPics/default.png',NULL,'AEBJdffNhsOnQLUT6ccXC5EKW78Mpku9UjJ3JTRQkfWDfFZxGmAXezR0KJ7J',NULL,NULL,NULL,'2012232618792868',NULL,NULL,NULL,'2017-11-30 10:12:44','2017-11-30 10:12:44'),(4,NULL,'Alvaro Ropero Tristell','figuone@hotmail.com','/img/UsersPics/default.png',NULL,'PRax5fm73jquEfmAHEImbUIIODz6W9GQYItDy4yIWZkKouDXFHuuasgj4mFA',NULL,NULL,NULL,'1462775997176660',NULL,NULL,NULL,'2017-11-30 16:53:59','2017-11-30 16:53:59'),(5,NULL,'Rafael Fernandes','raffael91@live.com','/img/UsersPics/default.png',NULL,'CHZmBagWN2JfeauXRKl18yZgH1p7AYTyq277cNSdl1crApa22yCSTuSKdBpt',NULL,NULL,NULL,'2015574838712352',NULL,NULL,NULL,'2017-11-30 19:54:06','2017-11-30 19:54:06'),(6,NULL,'Fu Xu','fuou_xu@hotmail.com','/img/UsersPics/default.png',NULL,'l6gKDXQj0N9UdI3RhpB8pP0sf8giU3qBQ4d4R5dzXdVTFDqmwrVL2WcfS1V8',NULL,NULL,NULL,'1459376810848393',NULL,NULL,NULL,'2017-12-03 15:12:51','2017-12-03 15:12:51'),(8,1,'Shomie1','shomie@hotmail.com','/img/UsersPics/default.png','$2y$10$tjZREM3pAI8eAgjimMPoY.dCUr3CKKKTM0GhOu/S5ofyKEfyf4MwS','Hy4xQPt8hjE7sTXLdTlfJRtNd2lQMLh3zscywdMjmbCnsb6PS8UQiyaKtOrM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-12-12 23:21:08','2017-12-12 23:22:48');
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

-- Dump completed on 2017-12-26  0:06:36
