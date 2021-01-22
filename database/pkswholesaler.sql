-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kmminventory
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'kmm TV','TCL','2020-12-11 11:42:44','2020-12-11 11:42:44'),(2,'Mobile Phone','Redmi','2020-12-17 13:54:19','2020-12-17 13:54:19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article` int(11) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `nis` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Anonymous','0000000000','Mila','Nothing','1000000',1000000,1000000,1000000,'2020-12-11 11:36:51','2020-12-11 11:36:51'),(2,'kmm customer','9003152804','suraikayur','TV','12345',123,1233,11233,'2020-12-11 11:46:45','2020-12-11 11:46:45'),(3,'Aravinth','9852525252','Pattukottai','Lenovo Ideapad','00000',0,0,0,'2020-12-17 14:57:33','2020-12-17 15:04:05');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `investment_capital` double NOT NULL,
  `rc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` int(11) NOT NULL,
  `nif` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings`
--

LOCK TABLES `general_settings` WRITE;
/*!40000 ALTER TABLE `general_settings` DISABLE KEYS */;
INSERT INTO `general_settings` VALUES (1,'Bestshine Electronic Store','Bestshine Digital Shop','9003152804','1/141, kambur,kodavasal-tk, thiruvarur-dt','2020-12-12','gMRsYQogW1oz1teXfyxmxjOUfN2TAC1abK4csWEj.png',1000000,'1000000',1000000,1000000,1000000,'2020-12-11 11:36:51','2020-12-12 00:29:50');
/*!40000 ALTER TABLE `general_settings` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_01_23_160015_laratrust_setup_tables',2),(3,'2019_02_06_130106_create_categories_table',2),(4,'2019_02_09_123449_create_products_table',2),(5,'2019_02_20_145357_create_clients_table',2),(6,'2019_02_21_131740_create_providers_table',2),(7,'2019_03_17_115012_create_sales_table',2),(8,'2019_03_17_130734_product_sale',2),(9,'2019_04_20_115426_create_purchases_table',2),(10,'2019_04_20_120300_product_purchase',2),(11,'2019_05_23_102749_create_spendings_table',2),(12,'2019_06_17_111712_create_general_settings_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  KEY `password_resets_email_index` (`email`(191))
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
INSERT INTO `permission_user` VALUES (7,2,'App\\User'),(11,2,'App\\User'),(23,2,'App\\User'),(27,2,'App\\User'),(13,2,'App\\User'),(19,2,'App\\User'),(30,2,'App\\User'),(34,2,'App\\User'),(13,3,'App\\User'),(14,3,'App\\User'),(15,3,'App\\User'),(1,2,'App\\User'),(2,2,'App\\User'),(3,2,'App\\User'),(2,4,'App\\User'),(6,4,'App\\User'),(10,4,'App\\User'),(22,4,'App\\User'),(14,4,'App\\User'),(18,4,'App\\User');
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create_users','Create Users','Create Users','2020-12-11 11:36:47','2020-12-11 11:36:47'),(2,'read_users','Read Users','Read Users','2020-12-11 11:36:47','2020-12-11 11:36:47'),(3,'update_users','Update Users','Update Users','2020-12-11 11:36:47','2020-12-11 11:36:47'),(4,'delete_users','Delete Users','Delete Users','2020-12-11 11:36:47','2020-12-11 11:36:47'),(5,'create_categories','Create Categories','Create Categories','2020-12-11 11:36:47','2020-12-11 11:36:47'),(6,'read_categories','Read Categories','Read Categories','2020-12-11 11:36:47','2020-12-11 11:36:47'),(7,'update_categories','Update Categories','Update Categories','2020-12-11 11:36:47','2020-12-11 11:36:47'),(8,'delete_categories','Delete Categories','Delete Categories','2020-12-11 11:36:47','2020-12-11 11:36:47'),(9,'create_products','Create Products','Create Products','2020-12-11 11:36:47','2020-12-11 11:36:47'),(10,'read_products','Read Products','Read Products','2020-12-11 11:36:47','2020-12-11 11:36:47'),(11,'update_products','Update Products','Update Products','2020-12-11 11:36:47','2020-12-11 11:36:47'),(12,'delete_products','Delete Products','Delete Products','2020-12-11 11:36:47','2020-12-11 11:36:47'),(13,'create_sales','Create Sales','Create Sales','2020-12-11 11:36:47','2020-12-11 11:36:47'),(14,'read_sales','Read Sales','Read Sales','2020-12-11 11:36:47','2020-12-11 11:36:47'),(15,'update_sales','Update Sales','Update Sales','2020-12-11 11:36:47','2020-12-11 11:36:47'),(16,'delete_sales','Delete Sales','Delete Sales','2020-12-11 11:36:48','2020-12-11 11:36:48'),(17,'create_purchases','Create Purchases','Create Purchases','2020-12-11 11:36:48','2020-12-11 11:36:48'),(18,'read_purchases','Read Purchases','Read Purchases','2020-12-11 11:36:48','2020-12-11 11:36:48'),(19,'update_purchases','Update Purchases','Update Purchases','2020-12-11 11:36:48','2020-12-11 11:36:48'),(20,'delete_purchases','Delete Purchases','Delete Purchases','2020-12-11 11:36:48','2020-12-11 11:36:48'),(21,'create_clients','Create Clients','Create Clients','2020-12-11 11:36:48','2020-12-11 11:36:48'),(22,'read_clients','Read Clients','Read Clients','2020-12-11 11:36:48','2020-12-11 11:36:48'),(23,'update_clients','Update Clients','Update Clients','2020-12-11 11:36:48','2020-12-11 11:36:48'),(24,'delete_clients','Delete Clients','Delete Clients','2020-12-11 11:36:48','2020-12-11 11:36:48'),(25,'create_providers','Create Providers','Create Providers','2020-12-11 11:36:48','2020-12-11 11:36:48'),(26,'read_providers','Read Providers','Read Providers','2020-12-11 11:36:48','2020-12-11 11:36:48'),(27,'update_providers','Update Providers','Update Providers','2020-12-11 11:36:48','2020-12-11 11:36:48'),(28,'delete_providers','Delete Providers','Delete Providers','2020-12-11 11:36:48','2020-12-11 11:36:48'),(29,'create_spendings','Create Spendings','Create Spendings','2020-12-11 11:36:48','2020-12-11 11:36:48'),(30,'read_spendings','Read Spendings','Read Spendings','2020-12-11 11:36:48','2020-12-11 11:36:48'),(31,'update_spendings','Update Spendings','Update Spendings','2020-12-11 11:36:48','2020-12-11 11:36:48'),(32,'delete_spendings','Delete Spendings','Delete Spendings','2020-12-11 11:36:48','2020-12-11 11:36:48'),(33,'create_moneybox','Create Moneybox','Create Moneybox','2020-12-11 11:36:48','2020-12-11 11:36:48'),(34,'read_moneybox','Read Moneybox','Read Moneybox','2020-12-11 11:36:48','2020-12-11 11:36:48'),(35,'update_moneybox','Update Moneybox','Update Moneybox','2020-12-11 11:36:48','2020-12-11 11:36:48'),(36,'delete_moneybox','Delete Moneybox','Delete Moneybox','2020-12-11 11:36:49','2020-12-11 11:36:49'),(37,'create_generalsetting','Create Generalsetting','Create Generalsetting','2020-12-11 11:36:49','2020-12-11 11:36:49'),(38,'read_generalsetting','Read Generalsetting','Read Generalsetting','2020-12-11 11:36:49','2020-12-11 11:36:49'),(39,'update_generalsetting','Update Generalsetting','Update Generalsetting','2020-12-11 11:36:49','2020-12-11 11:36:49'),(40,'delete_generalsetting','Delete Generalsetting','Delete Generalsetting','2020-12-11 11:36:49','2020-12-11 11:36:49');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_purchase`
--

DROP TABLE IF EXISTS `product_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_purchase` (
  `product_id` int(10) unsigned NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_id` int(10) unsigned NOT NULL,
  KEY `product_purchase_product_id_foreign` (`product_id`),
  KEY `product_purchase_purchase_id_foreign` (`purchase_id`),
  CONSTRAINT `product_purchase_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_purchase_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_purchase`
--

LOCK TABLES `product_purchase` WRITE;
/*!40000 ALTER TABLE `product_purchase` DISABLE KEYS */;
INSERT INTO `product_purchase` VALUES (2,'20',1),(2,'10',2),(3,'10',4),(5,'4',5),(1,'10',6),(7,'2',7);
/*!40000 ALTER TABLE `product_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sale`
--

DROP TABLE IF EXISTS `product_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_sale` (
  `product_id` int(10) unsigned NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_id` int(10) unsigned NOT NULL,
  KEY `product_sale_product_id_foreign` (`product_id`),
  KEY `product_sale_sale_id_foreign` (`sale_id`),
  CONSTRAINT `product_sale_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_sale_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sale`
--

LOCK TABLES `product_sale` WRITE;
/*!40000 ALTER TABLE `product_sale` DISABLE KEYS */;
INSERT INTO `product_sale` VALUES (2,'2',2),(1,'2',3),(1,'7',4),(1,'1',5),(3,'1',6),(2,'1',7),(3,'1',9),(2,'1',10),(2,'12',11),(4,'6',12),(4,'4',13),(5,'2',14),(6,'1',15);
/*!40000 ALTER TABLE `product_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `codebar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product.png',
  `purchase_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'L','LCD TV','32 inch tv','uVyIT51gi9MaxVk8pf0dzaCi6OM9yq4iXLdgd9iM.jpeg',9000.00,10000.00,1,10,'2020-12-11 11:45:17','2020-12-17 15:00:52'),(2,1,'000000000002','LCD TV small',NULL,'PDHaphJoWNSVn2Xsm7G22bHEjprAzNsjnkWhb8s1.jpeg',5000.00,6000.00,1,14,'2020-12-11 11:51:21','2020-12-16 14:17:34'),(3,1,'000000000003','mobile','samsung','GM33LtWKDN5i3ZlInARcg7t251GXUvM88PUuLpe9.jpeg',10500.00,12500.00,2,18,'2020-12-12 00:12:01','2020-12-16 14:31:47'),(4,1,'000000000004','kkkkk','aaaaa','AQm9t8sdbBu9L1utYjZei89BaHpkjZw33yoyOzE1.jpg',100.00,150.00,5,0,'2020-12-16 14:25:49','2020-12-16 14:26:49'),(5,2,'000000000005','Redmi Note 7 pro','-------','6NvBgiJBhMw9C3yMSQhFnkZEsiPT1NSEhioImssd.jpg',10000.00,15000.00,1,12,'2020-12-17 13:56:25','2020-12-17 14:01:07'),(6,2,'000000000006','Redmi Note 9','kjfdtwefjhdgiuy','5rqAT6Ua6wPZ7WkjMiBpQmvaSty1YWaYYeftn0kr.jpg',15000.00,20000.00,1,9,'2020-12-17 14:54:36','2020-12-17 14:58:06'),(7,1,'000000000007','Lenovo Ideapad',NULL,'product.png',20000.00,25000.00,1,2,'2020-12-17 15:02:50','2020-12-17 15:03:09');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article` int(11) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `nis` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Anonymous','0000000000','Mila','Nothing','1000000',1000000,1000000,1000000,'2020-12-11 11:36:51','2020-12-11 11:36:51'),(2,'kmm supplier','9003152805','ffffffff','hhhhhhhhhhhh','dddd',2222,11111,32,'2020-12-11 12:05:10','2020-12-11 12:05:10'),(3,'Raji Reju & Co','7338836434','Trichy','kgudrts','0222222',2222,220202,2020,'2020-12-17 14:00:27','2020-12-17 14:00:27');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `total_amount` double NOT NULL,
  `status` enum('paid','nopaid','debt') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchases_provider_id_foreign` (`provider_id`),
  CONSTRAINT `purchases_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,'PN : 1 / 2020',100000,0,100000,'nopaid',100000,0,1,'2020-12-11 11:52:04','2020-12-11 11:52:04'),(2,'PN : 2 / 2020',50000,0,50000,'paid',50000,0,2,'2020-12-11 12:09:42','2020-12-11 12:09:42'),(4,'PN : 4 / 2020',105000,0,105000,'debt',50000,55000,1,'2020-12-16 14:31:47','2020-12-16 14:31:47'),(5,'PN : 5 / 2020',40000,0,40000,'paid',40000,0,3,'2020-12-17 14:01:07','2020-12-17 14:01:07'),(6,'PN : 3 / 2020',90000,0,90000,'debt',90000,0,1,'2020-12-17 15:00:52','2020-12-17 15:00:52'),(7,'PN : 4 / 2020',40000,0,40000,'debt',0,40000,3,'2020-12-17 15:03:09','2020-12-17 15:03:09');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,'App\\User'),(2,2,'App\\User'),(2,3,'App\\User'),(2,4,'App\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
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
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','Super Admin','Super Admin','2020-12-11 11:36:47','2020-12-11 11:36:47'),(2,'employer','Employer','Employer','2020-12-11 11:36:50','2020-12-11 11:36:50');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number_sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `total_amount` double NOT NULL,
  `status` enum('paid','nopaid','debt') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_client_id_foreign` (`client_id`),
  CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,'SN : 2 / 2020',12000,0,12000,'debt',12000,0,1,'2020-12-11 12:02:35','2020-12-11 12:02:35'),(3,'SN : 1 / 2020',20000,0,20000,'paid',20000,0,1,'2020-12-11 12:22:17','2020-12-11 12:22:17'),(4,'SN : 2 / 2020',70000,0,70000,'paid',70000,0,1,'2020-12-11 12:23:58','2020-12-11 12:23:58'),(5,'SN : 3 / 2020',10000,0,10000,'paid',10000,0,1,'2020-12-11 12:24:26','2020-12-11 12:24:26'),(6,'SN : 4 / 2020',12500,0,12500,'paid',12500,0,1,'2020-12-12 00:15:25','2020-12-12 00:15:25'),(7,'SN : 5 / 2020',6000,0,6000,'debt',6000,0,1,'2020-12-12 00:20:44','2020-12-12 00:20:44'),(9,'SN : 6 / 2020',12500,0,12500,'debt',12000,500,1,'2020-12-12 00:49:13','2020-12-12 00:49:13'),(10,'SN : 7 / 2020',6000,0,6000,'paid',6000,0,1,'2020-12-14 17:31:18','2020-12-14 17:31:18'),(11,'SN : 8 / 2020',72000,0,72000,'debt',72000,0,1,'2020-12-16 14:17:34','2020-12-16 14:17:34'),(12,'SN : 9 / 2020',900,0,900,'paid',900,0,1,'2020-12-16 14:26:20','2020-12-16 14:26:20'),(13,'SN : 10 / 2020',600,0,600,'paid',600,0,1,'2020-12-16 14:26:49','2020-12-16 14:26:49'),(14,'SN : 11 / 2020',30000,0,30000,'debt',15000,15000,1,'2020-12-17 13:58:06','2020-12-17 13:58:06'),(15,'SN : 12 / 2020',20000,0,20000,'paid',20000,0,3,'2020-12-17 14:58:06','2020-12-17 14:58:06');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spendings`
--

DROP TABLE IF EXISTS `spendings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spendings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spending_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spending_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spending_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spendings`
--

LOCK TABLES `spendings` WRITE;
/*!40000 ALTER TABLE `spendings` DISABLE KEYS */;
INSERT INTO `spendings` VALUES (1,'stationary','paper',500,'2020-12-11 11:54:13','2020-12-11 11:54:13'),(2,'tea stall','dddddd',5000,'2020-12-16 14:34:14','2020-12-16 14:34:14'),(3,'System Repair','Computer 1',2000,'2020-12-17 14:02:20','2020-12-17 14:02:20');
/*!40000 ALTER TABLE `spendings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'super','admin','kmmadmin@app.com','admin.png',NULL,'$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My','wKMpacOejZdwNlX1ihz4CHSpwH5V38XNfFN6iCrScre2NEtwy7QbVdEaNlB4','2020-12-11 11:36:51','2020-12-11 11:36:51'),(2,'Kmm kumar','Kmm','kmm@gmail.com','v2ZFbNkjmT13BHYvykeKSxQ1GQmXN51f6eGr8brK.png',NULL,'$2y$10$fHuLJW1fhPHLr2zXhDElx.bUA/paKAGwPIbu99gju1p7ef9DNFCE6','VqErzGs69ehJjr8p4zruioYhZUABu8qQ1C95EE3IiihJcbRamMchyuvd6GyT','2020-12-11 11:58:59','2020-12-16 14:37:42'),(3,'kmm 1kumar','kmm1','kmm1@gmail.com','sXz5jNIMJLBdR2Y01PoKb0Kv6M1O0toqx0ZRaWhH.jpeg',NULL,'$2y$10$CwdDvqBjgMXxoST9DFVKkOW0qv0uUjRCtzRbut2RQZLNuCl.3qAly',NULL,'2020-12-12 00:18:54','2020-12-12 00:18:54'),(4,'Ajay','S','ajay@gmail.com','default.png',NULL,'$2y$10$A1R./TUkaK1B91OKrNf6neRtdo.l4PEAQ2bbSS3zU9tx6vmsQqyua',NULL,'2020-12-17 14:05:45','2020-12-17 14:05:45');
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

-- Dump completed on 2020-12-21 10:43:07
