-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cosmic_fashion
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

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
-- Table structure for table `api_product_paths`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_product_paths` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `path` enum('userdetails','products','transactions','auth') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `api_product_paths_user_id_foreign` (`user_id`),
  CONSTRAINT `api_product_paths_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_product_paths`
--

/*!40000 ALTER TABLE `api_product_paths` DISABLE KEYS */;
INSERT INTO `api_product_paths` VALUES (1,NULL,'auth','2022-01-27 21:52:13','2022-01-27 21:52:13',0),(2,NULL,'auth','2022-01-27 21:56:13','2022-01-27 21:56:13',0),(3,NULL,'auth','2022-01-27 21:56:21','2022-01-27 21:56:21',0),(4,NULL,'auth','2022-01-27 22:03:43','2022-01-27 22:03:43',0),(5,NULL,'auth','2022-01-27 22:05:32','2022-01-27 22:05:32',0),(6,NULL,'auth','2022-01-27 22:05:42','2022-01-27 22:05:42',0),(7,NULL,'auth','2022-01-27 22:10:10','2022-01-27 22:10:10',0),(8,NULL,'auth','2022-01-27 22:19:23','2022-01-27 22:19:23',0),(9,NULL,'auth','2022-01-27 22:19:41','2022-01-27 22:19:41',0),(10,NULL,'auth','2022-01-27 22:23:33','2022-01-27 22:23:33',0),(11,NULL,'auth','2022-01-27 22:24:00','2022-01-27 22:24:00',0),(12,NULL,'auth','2022-01-27 22:25:42','2022-01-27 22:25:42',0),(13,NULL,'userdetails','2022-01-27 22:26:42','2022-01-27 22:26:42',0),(14,NULL,'userdetails','2022-01-27 22:50:27','2022-01-27 22:50:27',0),(15,NULL,'auth','2022-01-29 10:57:15','2022-01-29 10:57:15',0),(16,NULL,'userdetails','2022-01-29 10:57:48','2022-01-29 10:57:48',0),(17,NULL,'auth','2022-01-29 10:58:42','2022-01-29 10:58:42',0),(18,NULL,'auth','2022-01-29 10:58:44','2022-01-29 10:58:44',0),(19,NULL,'auth','2022-01-29 11:11:45','2022-01-29 11:11:45',0),(20,NULL,'auth','2022-01-29 11:11:54','2022-01-29 11:11:54',0),(21,NULL,'auth','2022-01-29 11:15:07','2022-01-29 11:15:07',0),(22,NULL,'auth','2022-01-29 11:15:23','2022-01-29 11:15:23',0),(23,NULL,'auth','2022-01-29 11:17:19','2022-01-29 11:17:19',0),(24,NULL,'auth','2022-01-29 11:17:48','2022-01-29 11:17:48',0),(25,NULL,'auth','2022-01-29 11:18:05','2022-01-29 11:18:05',0),(26,NULL,'auth','2022-01-29 11:18:11','2022-01-29 11:18:11',0),(27,NULL,'auth','2022-01-29 11:19:58','2022-01-29 11:19:58',0),(28,NULL,'auth','2022-01-29 11:20:12','2022-01-29 11:20:12',0),(29,NULL,'auth','2022-01-29 11:28:05','2022-01-29 11:28:05',0),(30,NULL,'auth','2022-01-29 11:28:43','2022-01-29 11:28:43',0);
/*!40000 ALTER TABLE `api_product_paths` ENABLE KEYS */;

--
-- Table structure for table `api_products`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `api_products_user_id_foreign` (`user_id`),
  CONSTRAINT `api_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_products`
--

/*!40000 ALTER TABLE `api_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_products` ENABLE KEYS */;

--
-- Table structure for table `api_tokens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(40) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `api_product_id` int unsigned DEFAULT NULL,
  `client_id` varchar(80) NOT NULL,
  `scope` varchar(4000) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `api_tokens_user_id_foreign` (`user_id`),
  KEY `api_tokens_api_product_id_foreign` (`api_product_id`),
  CONSTRAINT `api_tokens_api_product_id_foreign` FOREIGN KEY (`api_product_id`) REFERENCES `api_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `api_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `api_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_tokens`
--

/*!40000 ALTER TABLE `api_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_tokens` ENABLE KEYS */;

--
-- Table structure for table `api_users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `username` varchar(40) NOT NULL,
  `key` varchar(60) DEFAULT NULL,
  `scope` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `key` (`key`),
  KEY `api_users_user_id_foreign` (`user_id`),
  CONSTRAINT `api_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_users`
--

/*!40000 ALTER TABLE `api_users` DISABLE KEYS */;
INSERT INTO `api_users` VALUES (3,14,'cosmic.fashion@gmail.com','cf_api-61f31736865f93.78084485',NULL,'2022-01-27 22:05:42','2022-01-29 11:14:44',0),(4,18,'api.cf@gmail.com','cf_api-61f5248e59b565.56574192',NULL,'2022-01-29 11:27:10','2022-01-29 11:27:10',0);
/*!40000 ALTER TABLE `api_users` ENABLE KEYS */;

--
-- Table structure for table `auth_logins`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `success` tinyint(1) NOT NULL,
  `logged_in_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `logged_out_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,1,'nabcellent.dev@gmail.com','127.0.0.1',1,'2022-01-25 02:10:29',NULL,0),(2,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-27 21:21:00',NULL,0),(3,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-27 21:21:11',NULL,0),(4,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-27 21:21:27',NULL,0),(5,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-27 21:21:29',NULL,0),(6,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-27 21:21:35',NULL,0),(7,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-27 21:21:59',NULL,0),(8,1,'nabcellent.dev@gmail.com','127.0.0.1',1,'2022-01-28 00:43:55',NULL,0),(9,NULL,'lil.nabz@gmail.com','127.0.0.1',0,'2022-01-28 00:53:57',NULL,0),(10,1,'nabcellent.dev@gmail.com','127.0.0.1',1,'2022-01-29 13:46:52','2022-01-29 13:51:53',0),(11,15,'admin.cf@gmail.com','127.0.0.1',1,'2022-01-29 13:52:04','2022-01-29 13:54:42',0),(12,15,'admin.cf@gmail.com','127.0.0.1',1,'2022-01-29 13:54:49','2022-01-29 13:54:57',0),(13,16,'customer.cf@gmail.com','127.0.0.1',1,'2022-01-29 13:55:07','2022-01-29 13:55:22',0),(14,17,'api.cf@gmail.com','127.0.0.1',1,'2022-01-29 13:55:31','2022-01-29 14:20:59',0),(15,15,'admin.cf@gmail.com','127.0.0.1',1,'2022-01-29 14:21:04',NULL,0);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;

--
-- Table structure for table `cart`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `quantity` int unsigned NOT NULL DEFAULT '1',
  `price` double unsigned NOT NULL,
  `discount` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cart_user_id_foreign` (`user_id`),
  KEY `cart_product_id_foreign` (`product_id`),
  CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

--
-- Table structure for table `categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Men',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(2,'Women',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(3,'Children',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(4,'Pets',0,'2022-01-24 23:10:26','2022-01-24 23:10:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017-10-18-174855','App\\Database\\Migrations\\Roles','default','App',1643065812,1),(2,'2017-11-20-223112','App\\Database\\Migrations\\CreateAuthTables','default','App',1643065812,1),(3,'2021-10-18-180522','App\\Database\\Migrations\\Categories','default','App',1643065812,1),(4,'2021-10-18-181645','App\\Database\\Migrations\\SubCategories','default','App',1643065813,1),(5,'2021-10-18-181709','App\\Database\\Migrations\\Products','default','App',1643065813,1),(6,'2021-10-18-183105','App\\Database\\Migrations\\ProductImages','default','App',1643065813,1),(7,'2021-10-18-183642','App\\Database\\Migrations\\PaymentTypes','default','App',1643065813,1),(8,'2021-10-18-183848','App\\Database\\Migrations\\Orders','default','App',1643065813,1),(9,'2021-10-18-184600','App\\Database\\Migrations\\OrdersDetails','default','App',1643065813,1),(10,'2021-10-18-184947','App\\Database\\Migrations\\Wallets','default','App',1643065813,1),(11,'2021-10-25-163600','App\\Database\\Migrations\\ApiUsers','default','App',1643065813,1),(12,'2021-10-25-163616','App\\Database\\Migrations\\ApiProducts','default','App',1643065813,1),(13,'2021-10-25-163635','App\\Database\\Migrations\\ApiProductPaths','default','App',1643065813,1),(14,'2021-10-25-163644','App\\Database\\Migrations\\ApiTokens','default','App',1643065813,1),(15,'2021-10-28-084056','App\\Database\\Migrations\\Cart','default','App',1643065814,1),(16,'2021-11-05-062644','App\\Database\\Migrations\\MpesaStkRequests','default','App',1643065814,1),(17,'2021-11-05-062714','App\\Database\\Migrations\\MpesaStkCallbacks','default','App',1643065814,1),(18,'2021-11-06-080319','App\\Database\\Migrations\\PaypalCallbacks','default','App',1643065814,1),(19,'2021-11-11-173717','App\\Database\\Migrations\\Transactions','default','App',1643065814,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `mpesa_stk_callbacks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mpesa_stk_callbacks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `checkout_request_id` varchar(255) NOT NULL,
  `merchant_request_id` varchar(255) NOT NULL,
  `result_code` int NOT NULL,
  `result_desc` varchar(255) NOT NULL,
  `amount` double unsigned DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `balance` int DEFAULT NULL,
  `mpesa_receipt_number` varchar(255) DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mpesa_stk_callbacks_checkout_request_id_foreign` (`checkout_request_id`),
  CONSTRAINT `mpesa_stk_callbacks_checkout_request_id_foreign` FOREIGN KEY (`checkout_request_id`) REFERENCES `mpesa_stk_requests` (`checkout_request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mpesa_stk_callbacks`
--

/*!40000 ALTER TABLE `mpesa_stk_callbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `mpesa_stk_callbacks` ENABLE KEYS */;

--
-- Table structure for table `mpesa_stk_requests`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mpesa_stk_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `amount` double unsigned NOT NULL,
  `reference` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Requested',
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `merchant_request_id` varchar(255) NOT NULL,
  `checkout_request_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `merchant_request_id` (`merchant_request_id`),
  UNIQUE KEY `checkout_request_id` (`checkout_request_id`),
  KEY `mpesa_stk_requests_user_id_foreign` (`user_id`),
  KEY `mpesa_stk_requests_order_id_foreign` (`order_id`),
  CONSTRAINT `mpesa_stk_requests_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mpesa_stk_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mpesa_stk_requests`
--

/*!40000 ALTER TABLE `mpesa_stk_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `mpesa_stk_requests` ENABLE KEYS */;

--
-- Table structure for table `orders`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `payment_type_id` int unsigned NOT NULL,
  `amount` double unsigned NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('pending','paid','pending payment') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_payment_type_id_foreign` (`payment_type_id`),
  CONSTRAINT `orders_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

--
-- Table structure for table `orders_details`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `price` double unsigned NOT NULL,
  `quantity` int unsigned NOT NULL DEFAULT '1',
  `total` double unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `orders_details_order_id_foreign` (`order_id`),
  KEY `orders_details_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;

--
-- Table structure for table `payment_types`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `description` varchar(40) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_types`
--

/*!40000 ALTER TABLE `payment_types` DISABLE KEYS */;
INSERT INTO `payment_types` VALUES (1,'Mpesa','success',0),(2,'PayPal','primary',0),(3,'Cash','danger',0),(4,'Wallet','warning',0);
/*!40000 ALTER TABLE `payment_types` ENABLE KEYS */;

--
-- Table structure for table `paypal_callbacks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paypal_callbacks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `payload_id` varchar(255) DEFAULT NULL,
  `pp_order_id` varchar(255) DEFAULT NULL,
  `payer_email` varchar(100) DEFAULT NULL,
  `amount` double unsigned DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `paypal_callbacks_order_id_foreign` (`order_id`),
  CONSTRAINT `paypal_callbacks_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal_callbacks`
--

/*!40000 ALTER TABLE `paypal_callbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `paypal_callbacks` ENABLE KEYS */;

--
-- Table structure for table `product_images`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `image` varchar(40) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `image` (`image`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

--
-- Table structure for table `products`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `sub_category_id` int unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` double unsigned NOT NULL,
  `stock` int unsigned NOT NULL DEFAULT '1',
  `discount` tinyint NOT NULL DEFAULT '0',
  `image` varchar(40) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `image` (`image`),
  KEY `products_user_id_foreign` (`user_id`),
  KEY `products_sub_category_id_foreign` (`sub_category_id`),
  CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,1,'Cozy Sofa',150,3,0,'3.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(2,1,2,'Fancy Chair',15,3,0,'4.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(3,1,3,'Chinese Teapot',70,3,0,'5.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(4,1,4,'Soft Pillow',50,3,0,'6.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(5,1,5,'Wooden casket',30,3,0,'7.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(6,1,6,'Awesome Armchair',20,3,0,'8.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(7,1,7,'Awesome Lamp',90,3,0,'9.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0),(8,1,8,'Cool Flower',40,3,0,'1.png',NULL,1,'2022-01-24 23:10:26','2022-01-24 23:10:26',0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

--
-- Table structure for table `roles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Red',0),(2,'Admin',0),(3,'Customer',0),(4,'Api User',0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

--
-- Table structure for table `sub_categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` VALUES (1,1,'Formal',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(2,1,'Casual',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(3,1,'Sports',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(4,2,'Formal',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(5,2,'Casual',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(6,2,'Sports',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(7,3,'Formal',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(8,3,'Casual',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(9,3,'Sports',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(10,4,'Dogs',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(11,4,'Cats',0,'2022-01-24 23:10:26','2022-01-24 23:10:26'),(12,4,'Other',0,'2022-01-24 23:10:26','2022-01-24 23:10:26');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;

--
-- Table structure for table `transactions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `payable_id` int NOT NULL,
  `payable_type` varchar(255) NOT NULL,
  `amount` double unsigned DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `type` varchar(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `transactions_order_id_foreign` (`order_id`),
  CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL DEFAULT '3',
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `image` varchar(40) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Re.d','_beard','nabcellent.dev@gmail.com',NULL,'male','2.jpg','$2y$10$YeusfP76CxOlGUYfSxmWs.yU5RalUbsig4WsF5ntxA5TA28tPMwiG',NULL,NULL,0,NULL,NULL,NULL),(2,2,'Cicero','Mosciski','jpadberg@gmail.com',NULL,'male',NULL,'$2y$10$aA.PCreA.1wrsREMJLAoqOjogY/8a/TC7I3RpupqqN8LYDM9FwcqC',NULL,NULL,0,NULL,NULL,NULL),(3,2,'Dovie','Stoltenberg','grimes.haleigh@abernathy.com',NULL,'female',NULL,'$2y$10$G7ho5H9OvGSmMiO/F64yeOmD..k6Vk9YsGtDqZA1rHsTqha59x5xa',NULL,NULL,0,NULL,NULL,NULL),(4,4,'Catherine','Weissnat','osinski.kay@hudson.net',NULL,'female',NULL,'$2y$10$avryoXPX5/mZTbPHq6AUremDMRokCc8xg3dA4QxIrt05EglCaW2pe',NULL,NULL,0,NULL,NULL,NULL),(5,3,'Myrtie','Zieme','candace.schoen@gmail.com',NULL,'male',NULL,'$2y$10$mfo46pAU2UZDY8J9rnA6EegA1peNGbeU8IH6lLLnRkA1.ViF9bJhm',NULL,NULL,0,NULL,NULL,NULL),(6,3,'Federico','Ortiz','mosciski.derick@gmail.com',NULL,'female',NULL,'$2y$10$hnZf73KPbv1R0YuHuWyE7upwW8JHbHERADMdb/2BkPYJgOxbOBJfC',NULL,NULL,0,NULL,NULL,NULL),(7,4,'Ayana','Hegmann','anderson.delphine@monahan.com',NULL,'female',NULL,'$2y$10$HrBFdUtQ65plBFsltoSxZeC.bcBeWkY8/IR.UiVnrbwlBLooVVI9G',NULL,NULL,0,NULL,NULL,NULL),(8,3,'Bobby','Glover','alexie.jacobson@stehr.net',NULL,'female',NULL,'$2y$10$lLTq3gwq/ycL2wFm3xnUuOqzWxj13kwkj.QbjV141.Mn7p.xs6UK2',NULL,NULL,0,NULL,NULL,NULL),(9,3,'Woodrow','Borer','sernser@yahoo.com',NULL,'male',NULL,'$2y$10$iJJkFX9axzfmxB/AiXqce.U8HxY1EzLswZK6uhMwRnGQnoV0UIx42',NULL,NULL,0,NULL,NULL,NULL),(10,2,'Peter','Stark','antonia21@yahoo.com',NULL,'male',NULL,'$2y$10$JlhHPE9bvETlEKxIxjr5XusrMsCOqQxkmDd.e8MVVhP8rBeP45S/i',NULL,NULL,0,NULL,NULL,NULL),(11,4,'Hazel','Effertz','corkery.marcelina@pfeffer.com',NULL,'female',NULL,'$2y$10$m6GWvbZ.4oBzGh77bzKgh.O12Hn80YPGxRhQ.kHn1DEdowa50K.DW',NULL,NULL,0,NULL,NULL,NULL),(14,4,'Cosmic','Fashion','cosmic.fashion@gmail.com','cosmic.fashion@gmail.com','female',NULL,'$2y$10$5FaUl9ism1/nvUC/oftxBujCCLCW8883fuy9fk5JQm3b/k3coddmS',NULL,NULL,0,'2022-01-27 22:05:42','2022-01-29 11:14:38',NULL),(15,2,'Admin','Admin','admin.cf@gmail.com',NULL,'male',NULL,'$2y$10$TEy5JI43.JIWWip6XlaVN.pwEP3lE00DavKy2tNaPUosLbtEw3hkW',NULL,NULL,0,'2022-01-29 10:47:31','2022-01-29 10:51:44',NULL),(16,3,'Customer','Customer','customer.cf@gmail.com',NULL,'male',NULL,'$2y$10$qII3ZnEPSnIpnDsxPhPZxuJJMBLF62R5y5WAN998opO73GIq9LJqu',NULL,NULL,0,'2022-01-29 10:48:42','2022-01-29 10:51:44',NULL),(18,4,'Api','Api','api.cf@gmail.com',NULL,'male',NULL,'$2y$10$/vDDQy3HgNiBvt4m9ILMuOK2fYh4g1AtbmL55HVw6bQvojLKaOq7m',NULL,NULL,0,'2022-01-29 11:27:10','2022-01-29 11:27:57',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Table structure for table `wallets`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `amount` double unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `wallets_user_id_foreign` (`user_id`),
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-29 14:37:50
