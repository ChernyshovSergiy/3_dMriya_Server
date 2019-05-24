-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: 3_d_mriya
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` json NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `is_active`, `section`, `title`, `url`, `parent`, `sort`, `created_at`, `updated_at`) VALUES (1,1,'0','{\"de\": \"Über uns\", \"en\": \"About Us\", \"es\": \"Sobre nosotros\", \"ru\": \"О нас\", \"ua\": \"Про нас\"}','about',0,1,'2019-05-17 13:20:08','2019-05-21 19:24:15'),(2,1,'0','{\"de\": \"Karriere\", \"en\": \"Careers\", \"es\": \"Carreras profesionales\", \"ru\": \"Карьера\", \"ua\": \"Кар\'єра\"}','careers',0,2,'2019-05-17 13:21:28','2019-05-21 19:24:28'),(3,1,'0','{\"de\": \"Presse Medien\", \"en\": \"Press/Media\", \"es\": \"Prensa / Medios\", \"ru\": \"Пресса\", \"ua\": \"Преса / ЗМІ\"}','media',0,3,'2019-05-17 13:51:00','2019-05-21 19:24:38'),(4,1,'0','{\"de\": \"Anlegerbeziehungen\", \"en\": \"Investor relations\", \"es\": \"Relaciones con inversionistas\", \"ru\": \"Инвесторам\", \"ua\": \"Відносини з інвесторами\"}','investors',0,4,'2019-05-17 14:01:50','2019-05-21 19:39:37'),(5,1,'1','{\"de\": \"Inhalte verkaufen\", \"en\": \"Sell content\", \"es\": \"Vender contenido\", \"ru\": \"Продать контент\", \"ua\": \"Продаж вмісту\"}','sell_content',0,5,'2019-05-17 14:05:49','2019-05-22 09:08:01'),(6,1,'1','{\"de\": \"FAQ\", \"en\": \"FAQ\", \"es\": \"Preguntas más frecuentes\", \"ru\": \"Ч.З.Вопросы\", \"ua\": \"Ч.З.Вопроси\"}','faq',0,6,'2019-05-17 14:09:14','2019-05-22 09:08:12'),(7,1,'2','{\"de\": \"Für Entwickler\", \"en\": \"Developers\", \"es\": \"Para desarrolladores\", \"ru\": \"Разработчикам\", \"ua\": \"Розробникам\"}','developer',0,7,'2019-05-17 14:29:08','2019-05-22 09:10:12'),(8,1,'2','{\"de\": \"Partner / Wiederverkäufer\", \"en\": \"Affiliate/Reseller\", \"es\": \"Afiliado / Revendedor\", \"ru\": \"Партнеры/ Посредники\", \"ua\": \"Партнер / Посередники\"}','affiliate',0,8,'2019-05-17 14:34:48','2019-05-22 09:10:25'),(9,1,'2','{\"de\": \"Internationaler Reseller\", \"en\": \"International reseller\", \"es\": \"Revendedor internacional\", \"ru\": \"Международные посредники\", \"ua\": \"Міжнародні посередники\"}','international',0,9,'2019-05-17 14:38:22','2019-05-22 09:12:50'),(10,1,'3','{\"de\": \"Zuhause\", \"en\": \"Home\", \"es\": \"Casa\", \"ru\": \"Главная\", \"ua\": \"Головна\"}','/',0,10,'2019-05-17 14:41:27','2019-05-17 17:37:05'),(11,1,'3','{\"de\": \"Lagermodell\", \"en\": \"Stock models\", \"es\": \"Modelo de stock\", \"ru\": \"Галерея моделей\", \"ua\": \"Галерея моделей\"}','models',0,11,'2019-05-17 15:12:00','2019-05-22 09:14:01'),(12,1,'3','{\"de\": \"Gutscheine\", \"en\": \"Coupons\", \"es\": \"Cupones\", \"ru\": \"Купоны\", \"ua\": \"Купони\"}','coupons',0,12,'2019-05-17 15:15:29','2019-05-22 09:14:14'),(13,1,'3','{\"de\": \"Trend-Themen\", \"en\": \"Trending topics\", \"es\": \"Tendencia de los temas\", \"ru\": \"Актуальные темы\", \"ua\": \"Теми з тенденціями\"}','topics',0,13,'2019-05-17 17:27:06','2019-05-22 09:14:33'),(14,1,'3','{\"de\": \"Persönliches Konto\", \"en\": \"Personal account\", \"es\": \"Cuenta personal\", \"ru\": \"Личный кабинет\", \"ua\": \"Особистий кабінет\"}','sign-in',0,14,'2019-05-17 17:29:56','2019-05-22 09:14:47'),(15,1,'3','{\"de\": \"Anmeldung\", \"en\": \"Registration\", \"es\": \"Registro\", \"ru\": \"Регистрация\", \"ua\": \"Реєстрація\"}','join',0,15,'2019-05-17 17:32:54','2019-05-22 09:14:58');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-22 13:08:37
