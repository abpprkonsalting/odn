-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: odnconsu_gestion
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB-1:10.4.24+maria~buster

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
-- Table structure for table `affiliates`
--

DROP TABLE IF EXISTS `affiliates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliates`
--

LOCK TABLES `affiliates` WRITE;
/*!40000 ALTER TABLE `affiliates` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current` int(10) unsigned NOT NULL,
  `vessel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on_date` date NOT NULL,
  `sign_off_date` date NOT NULL,
  `dtw` int(11) NOT NULL,
  `gross_tonnage` int(11) NOT NULL,
  `engine_types_id` int(10) unsigned NOT NULL,
  `bph` int(11) NOT NULL,
  `power_kw` int(11) NOT NULL,
  `ranks_id` int(10) unsigned NOT NULL,
  `flags_id` int(10) unsigned NOT NULL,
  `total_salary` decimal(8,2) NOT NULL,
  `leave_pay` decimal(8,2) NOT NULL,
  `basic_salary` decimal(8,2) NOT NULL,
  `fix_over_time` decimal(8,2) NOT NULL,
  `contract_period` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companies_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `companies_engine_types_id_foreign` (`engine_types_id`),
  KEY `companies_ranks_id_foreign` (`ranks_id`),
  KEY `companies_flags_id_foreign` (`flags_id`),
  CONSTRAINT `companies_engine_types_id_foreign` FOREIGN KEY (`engine_types_id`) REFERENCES `engine_types` (`id`),
  CONSTRAINT `companies_flags_id_foreign` FOREIGN KEY (`flags_id`) REFERENCES `flags` (`id`),
  CONSTRAINT `companies_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `companies_ranks_id_foreign` FOREIGN KEY (`ranks_id`) REFERENCES `ranks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Cuba','2020-12-05 03:35:44','2020-12-05 03:35:44',NULL),(2,'Panamá','2020-12-05 03:35:52','2020-12-05 03:35:52',NULL),(3,'Rusia','2020-12-05 03:35:57','2020-12-05 03:35:57',NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_numbers`
--

DROP TABLE IF EXISTS `course_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_numbers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_numbers`
--

LOCK TABLES `course_numbers` WRITE;
/*!40000 ALTER TABLE `course_numbers` DISABLE KEYS */;
INSERT INTO `course_numbers` VALUES (1,'1.13 Medical Care','2020-11-16 00:30:54','2021-02-08 08:30:43','2021-02-08 08:30:43',0),(2,'1.14 Lorem Course','2020-11-16 00:31:15','2021-02-08 08:30:33','2021-02-08 08:30:33',0),(3,'Navegación por Radar al Nivel de Gestión / Radar Navigation at Management Level','2021-02-08 08:22:00','2021-02-08 08:22:00',NULL,0),(4,'Navegación por Radar a Nivel Operacional / Radar Navigation at Operational Level','2021-02-08 08:22:54','2021-02-08 08:22:54',NULL,0),(5,'Observador de Radar y Punteo / Radar and Plotting Observer','2021-02-08 08:23:43','2021-02-08 08:23:43',NULL,0),(6,'1. Uso operacional del SIVCE, SIP y SIA / Operational use of ECDIS, IBM and AIS','2021-02-08 08:25:18','2021-03-03 22:27:15',NULL,1),(7,'Simulador de Maniobras y Gestión de los Recursos del Puente / Manoeuvering Simulator and Bridge Resource Management (BRM). Chapter II Reg.AII/1 parag 1-5, Section A-II/1, Rule A-II/2, parag 1 to 7, Table A-II/2 and Rules A-VIII/1, A VIII/2 Part 4-1..','2021-02-08 08:30:12','2021-02-08 08:30:12',NULL,0),(8,'Ingles Marítimo / Maritime English','2021-02-08 08:31:44','2021-02-08 08:31:44',NULL,0),(9,'Liderazgo y Trabajo en Equipo / Leadership and Teamwork (Chapter II, Rule II/1 Section A-II/1 and Table A-II/1 and Rule II/2. Section A-II/2 and Table A-II/2','2021-02-08 08:34:23','2021-02-08 08:34:23',NULL,0),(10,'8- Sensibilización con el Medio Marino / Marine Environment Awareness. Chapter II, Rule II/1, Section A-II/1, Table A-II/1, Rule II/2, Section A-II/2, Table A-II/2','2021-02-08 08:41:14','2021-02-08 08:41:14',NULL,0),(11,'9- Mercancías y Cargas Peligrosas / Dangerous , Harzardous and Harmful Cargoes. Rule A-II/1, Section A-II/1, Table A-II/1, Rule A-II/3 Table A-II/3 Section B-II/3, Rule II/12, Section A-III/2, Table A-III/2 Rule A-II/3, Table A-A-II/3 Section B-II/3','2021-02-08 09:07:41','2021-02-08 09:07:41',NULL,0),(12,'10- Formación Básica Aspectos de Seguridad / Safety Basic Training (Charter VI, Regla VI/1,Parag 1, Section A-VI/1, Parag 1 to 2, Table A-VI/1-1 to A-VI/1-4)','2021-02-08 09:12:27','2021-02-08 09:12:27',NULL,0),(13,'11- Embarcaciones Superviviencia / Proficiency in Survival Craft and Rescue Boats (Chapter VI, Rule VI/2, parag 1 to 2, Section A-V/2, parag 1, 2 and 4 Table A-VI/2-1)','2021-02-08 09:14:48','2021-02-08 09:14:48',NULL,0),(14,'12- Técnicas Avanzadas de Lucha Contra Incendios / Training in Advanced Fire Fighting (Chapter VI, Rule, VI/3 parag 1, Section A-VI3, parag 1 to 6, Table A-VI/-3)','2021-02-08 09:17:57','2021-02-08 09:17:57',NULL,0),(15,'13- Cuidados Médicos / Medical Care (Chapter VI, Reg VI/4, Parag 2, Section A-VI/4, Parag 4-6, Table AVI/4-2)','2021-02-08 09:20:02','2021-02-08 09:20:02',NULL,0),(16,'14- Primeros Auxilios / Medical First Aid (Chapter VI, Reg VI/4, Parag 1 Section A-VI/4, Parag 1-3, Table AVI/4-1)','2021-02-08 09:23:33','2021-02-08 09:23:33',NULL,0),(17,'15- Prevención y Control de Estupefacientes / Control and Prevention of Narcotics and Psychoactive Substances','2021-02-08 09:34:05','2021-02-08 09:34:05',NULL,0),(18,'16- Código Internacional de Gestión de la Seguridad (IGS) / International Safety Management Code (ISM)','2021-02-08 09:35:21','2021-02-08 09:35:21',NULL,0);
/*!40000 ALTER TABLE `course_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `course_numbers_id` int(10) unsigned NOT NULL,
  `provinces_id` int(10) unsigned NOT NULL,
  `issue_date` date NOT NULL,
  `certificate_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `courses_course_numbers_id_foreign` (`course_numbers_id`),
  KEY `courses_provinces_id_foreign` (`provinces_id`),
  CONSTRAINT `courses_course_numbers_id_foreign` FOREIGN KEY (`course_numbers_id`) REFERENCES `course_numbers` (`id`),
  CONSTRAINT `courses_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `courses_provinces_id_foreign` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,3,2,3,'2020-11-24','243454','2020-11-25 16:39:43','2021-03-01 22:14:42','2021-03-01 22:14:42'),(2,3,1,1,'2020-12-31','344556777','2020-11-25 16:51:35','2020-11-25 17:00:07','2020-11-25 17:00:07'),(3,3,1,1,'2020-10-27','121313','2020-11-28 04:08:28','2021-03-01 22:14:50','2021-03-01 22:14:50'),(4,7,3,2,'2019-03-18','946','2021-02-08 09:42:05','2021-02-08 09:42:05',NULL),(5,7,4,2,'2019-03-18','946','2021-02-08 09:42:33','2021-02-08 09:42:33',NULL),(6,7,5,2,'2019-03-18','946','2021-02-08 09:43:06','2021-02-08 09:43:06',NULL),(7,7,3,2,'2019-03-18','946','2021-02-08 09:43:26','2021-02-08 09:44:01','2021-02-08 09:44:01'),(8,7,6,2,'2019-03-18','946','2021-02-08 09:44:33','2021-02-08 09:44:33',NULL),(9,7,7,2,'2019-03-18','946','2021-02-08 09:45:17','2021-02-08 09:45:17',NULL),(10,7,8,2,'2019-03-18','946','2021-02-08 09:45:51','2021-02-08 09:45:51',NULL),(11,7,9,2,'2019-03-18','946','2021-02-08 09:46:20','2021-02-08 09:46:20',NULL),(12,7,10,2,'2019-03-18','946','2021-02-08 09:47:19','2021-02-08 09:47:19',NULL),(13,7,11,2,'2019-03-18','946','2021-02-08 09:47:58','2021-02-08 09:47:58',NULL),(14,7,12,2,'2019-03-18','946','2021-02-08 09:48:27','2021-02-08 09:48:27',NULL),(15,7,13,2,'2019-03-18','946','2021-02-08 09:48:59','2021-02-08 09:48:59',NULL),(16,7,14,2,'2019-03-18','946','2021-02-08 09:49:35','2021-02-08 09:49:35',NULL),(17,7,15,2,'2019-03-18','946','2021-02-08 09:50:34','2021-02-08 09:50:34',NULL),(18,7,16,2,'2019-03-18','946','2021-02-08 09:51:10','2021-02-08 09:51:10',NULL),(19,7,17,2,'2019-03-18','946','2021-02-08 09:53:12','2021-02-08 09:53:12',NULL),(20,7,18,2,'2019-03-18','946','2021-02-08 09:54:07','2021-02-08 09:54:07',NULL),(21,3,10,1,'2021-03-01','123456','2021-03-03 22:27:58','2021-03-03 22:27:58',NULL),(22,6,16,1,'2022-02-16','7','2022-02-21 00:39:37','2022-02-21 00:39:37',NULL),(23,6,11,1,'2022-02-14','9','2022-02-21 00:40:01','2022-02-21 00:40:01',NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engine_types`
--

DROP TABLE IF EXISTS `engine_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `engine_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engine_types`
--

LOCK TABLES `engine_types` WRITE;
/*!40000 ALTER TABLE `engine_types` DISABLE KEYS */;
INSERT INTO `engine_types` VALUES (1,'Engine Type 1','2020-12-07 17:36:00','2020-12-07 17:36:00',NULL),(2,'Engine Type 2','2020-12-07 17:36:08','2020-12-07 17:36:08',NULL);
/*!40000 ALTER TABLE `engine_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eyes_colors`
--

DROP TABLE IF EXISTS `eyes_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eyes_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eyes_colors`
--

LOCK TABLES `eyes_colors` WRITE;
/*!40000 ALTER TABLE `eyes_colors` DISABLE KEYS */;
INSERT INTO `eyes_colors` VALUES (1,'Black','2020-11-12 09:24:26','2020-11-12 09:24:26',NULL),(2,'Blue','2020-11-12 09:24:32','2020-11-12 09:24:32',NULL),(3,'Brown','2021-02-08 07:37:08','2021-02-08 07:37:08',NULL);
/*!40000 ALTER TABLE `eyes_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family_informations`
--

DROP TABLE IF EXISTS `family_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kins_id` int(10) unsigned NOT NULL,
  `birth_date` date NOT NULL,
  `same_address_as_marine` int(10) unsigned NOT NULL,
  `provinces_id` int(10) unsigned NOT NULL,
  `municipalities_id` int(10) unsigned NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `family_status_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `family_informations_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `family_informations_next_of_kins_id_foreign` (`next_of_kins_id`),
  KEY `family_informations_provinces_id_foreign` (`provinces_id`),
  KEY `family_informations_municipalities_id_foreign` (`municipalities_id`),
  KEY `family_informations_family_status_id_foreign` (`family_status_id`),
  CONSTRAINT `family_informations_family_status_id_foreign` FOREIGN KEY (`family_status_id`) REFERENCES `family_statuses` (`id`),
  CONSTRAINT `family_informations_municipalities_id_foreign` FOREIGN KEY (`municipalities_id`) REFERENCES `municipalities` (`id`),
  CONSTRAINT `family_informations_next_of_kins_id_foreign` FOREIGN KEY (`next_of_kins_id`) REFERENCES `next_of_kins` (`id`),
  CONSTRAINT `family_informations_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `family_informations_provinces_id_foreign` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family_informations`
--

LOCK TABLES `family_informations` WRITE;
/*!40000 ALTER TABLE `family_informations` DISABLE KEYS */;
INSERT INTO `family_informations` VALUES (1,3,'Efrain Losada Buchillon',1,'1958-10-08',1,3,4,'2323232323','Colon #203 e\\ Hidalgo y Marino','2020-12-06 20:46:17','2020-12-06 20:46:17',NULL,1);
/*!40000 ALTER TABLE `family_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family_statuses`
--

DROP TABLE IF EXISTS `family_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family_statuses`
--

LOCK TABLES `family_statuses` WRITE;
/*!40000 ALTER TABLE `family_statuses` DISABLE KEYS */;
INSERT INTO `family_statuses` VALUES (1,'Alive','2020-12-06 18:24:09','2020-12-06 18:24:09',NULL),(2,'Passed Away','2020-12-06 18:24:20','2020-12-06 18:24:20',NULL);
/*!40000 ALTER TABLE `family_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flags`
--

DROP TABLE IF EXISTS `flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flags`
--

LOCK TABLES `flags` WRITE;
/*!40000 ALTER TABLE `flags` DISABLE KEYS */;
INSERT INTO `flags` VALUES (1,'Cuba','2020-12-05 03:32:00','2020-12-05 03:32:00',NULL),(2,'Panamá','2020-12-05 03:32:09','2020-12-05 03:32:09',NULL),(3,'Rusia','2020-12-05 03:32:14','2020-12-05 03:32:14',NULL);
/*!40000 ALTER TABLE `flags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hair_colors`
--

DROP TABLE IF EXISTS `hair_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hair_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hair_colors`
--

LOCK TABLES `hair_colors` WRITE;
/*!40000 ALTER TABLE `hair_colors` DISABLE KEYS */;
INSERT INTO `hair_colors` VALUES (1,'Black','2020-11-12 16:11:19','2020-11-12 16:11:19',NULL);
/*!40000 ALTER TABLE `hair_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `license_endorsement_names`
--

DROP TABLE IF EXISTS `license_endorsement_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `license_endorsement_names` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_endorsement_types_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `license_endorsement_names_license_endorsement_types_id_foreign` (`license_endorsement_types_id`),
  CONSTRAINT `license_endorsement_names_license_endorsement_types_id_foreign` FOREIGN KEY (`license_endorsement_types_id`) REFERENCES `license_endorsement_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license_endorsement_names`
--

LOCK TABLES `license_endorsement_names` WRITE;
/*!40000 ALTER TABLE `license_endorsement_names` DISABLE KEYS */;
INSERT INTO `license_endorsement_names` VALUES (1,'Test Foreign Licence 1',1,'2020-12-05 03:46:09','2020-12-05 03:46:09',NULL),(2,'First National Licence',2,'2020-12-05 03:46:23','2020-12-05 03:46:23',NULL);
/*!40000 ALTER TABLE `license_endorsement_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `license_endorsement_types`
--

DROP TABLE IF EXISTS `license_endorsement_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `license_endorsement_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license_endorsement_types`
--

LOCK TABLES `license_endorsement_types` WRITE;
/*!40000 ALTER TABLE `license_endorsement_types` DISABLE KEYS */;
INSERT INTO `license_endorsement_types` VALUES (1,'Foreigner License','2020-12-05 03:34:34','2020-12-05 03:34:34',NULL),(2,'National License','2020-12-05 03:34:49','2020-12-05 03:34:49',NULL);
/*!40000 ALTER TABLE `license_endorsement_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `license_endorsements`
--

DROP TABLE IF EXISTS `license_endorsements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `license_endorsements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `countries_id` int(10) unsigned NOT NULL,
  `license_endorsement_types_id` int(10) unsigned NOT NULL,
  `license_endorsement_names_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `license_endorsements_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `license_endorsements_countries_id_foreign` (`countries_id`),
  KEY `license_endorsements_license_endorsement_types_id_foreign` (`license_endorsement_types_id`),
  KEY `license_endorsements_license_endorsement_names_id_foreign` (`license_endorsement_names_id`),
  CONSTRAINT `license_endorsements_countries_id_foreign` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `license_endorsements_license_endorsement_names_id_foreign` FOREIGN KEY (`license_endorsement_names_id`) REFERENCES `license_endorsement_names` (`id`),
  CONSTRAINT `license_endorsements_license_endorsement_types_id_foreign` FOREIGN KEY (`license_endorsement_types_id`) REFERENCES `license_endorsement_types` (`id`),
  CONSTRAINT `license_endorsements_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license_endorsements`
--

LOCK TABLES `license_endorsements` WRITE;
/*!40000 ALTER TABLE `license_endorsements` DISABLE KEYS */;
INSERT INTO `license_endorsements` VALUES (1,3,'2020-12-01','2020-12-31',3,1,1,1,'2020-12-06 17:59:53','2020-12-06 17:59:53',NULL);
/*!40000 ALTER TABLE `license_endorsements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licenses`
--

DROP TABLE IF EXISTS `licenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licenses`
--

LOCK TABLES `licenses` WRITE;
/*!40000 ALTER TABLE `licenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `licenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marital_statuses`
--

DROP TABLE IF EXISTS `marital_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marital_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marital_statuses`
--

LOCK TABLES `marital_statuses` WRITE;
/*!40000 ALTER TABLE `marital_statuses` DISABLE KEYS */;
INSERT INTO `marital_statuses` VALUES (1,'Single','2020-11-12 16:10:05','2020-11-12 16:10:05',NULL),(2,'Married','2020-11-12 16:10:10','2020-11-12 16:10:10',NULL);
/*!40000 ALTER TABLE `marital_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_informations`
--

DROP TABLE IF EXISTS `medical_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_informations`
--

LOCK TABLES `medical_informations` WRITE;
/*!40000 ALTER TABLE `medical_informations` DISABLE KEYS */;
INSERT INTO `medical_informations` VALUES (1,'ILO','2020-11-16 01:02:36','2020-11-16 01:02:36',NULL),(2,'Soberana 01','2020-11-16 01:02:57','2020-11-16 01:02:57',NULL),(3,'CMI','2021-04-02 05:58:19','2021-04-02 05:58:19',NULL);
/*!40000 ALTER TABLE `medical_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memos`
--

DROP TABLE IF EXISTS `memos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `memos_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `memos_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memos`
--

LOCK TABLES `memos` WRITE;
/*!40000 ALTER TABLE `memos` DISABLE KEYS */;
INSERT INTO `memos` VALUES (3,3,'Lorem ipsum dolor sit amed 1.','2020-11-08','2020-11-18 07:23:17','2020-11-23 07:15:49',NULL),(4,3,'Lorem ipsum dolor sit amed 2!!','2020-11-26','2020-11-23 05:30:51','2020-11-23 05:30:51',NULL),(5,3,'Lorem ipsum dolor sit amed 3/ Este es un test de edicion.','2020-11-30','2020-11-23 05:35:09','2020-11-23 07:15:59','2020-11-23 07:15:59'),(6,7,'1. Se encuentra navegando en el buque TELMO.\r\n2. Revisar su documentación. \r\n3. Llamarlo para el tema del pago a Senen.','2021-02-01','2021-02-08 08:11:14','2021-02-08 08:11:14',NULL);
/*!40000 ALTER TABLE `memos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_11_06_173104_create_provinces_table',2),(5,'2020_11_06_175950_create_municipalities_table',3),(6,'2020_11_06_180703_create_eyes_colors_table',3),(7,'2020_11_06_203046_create_hair_colors_table',3),(8,'2020_11_06_204437_create_marital_statuses_table',3),(9,'2020_11_06_205042_create_school_grades_table',3),(10,'2020_11_06_205655_create_political_integrations_table',3),(11,'2020_11_06_210158_create_ranks_table',3),(12,'2020_11_06_210350_create_statuses_table',3),(13,'2020_11_06_211030_create_course_numbers_table',3),(14,'2020_11_06_211308_create_medical_informations_table',3),(15,'2020_11_06_211624_create_licenses_table',3),(16,'2020_11_06_212138_create_next_of_kins_table',3),(17,'2020_11_06_212716_create_engine_types_table',3),(18,'2020_11_06_213517_create_flags_table',3),(19,'2020_11_06_214058_create_affiliates_table',3),(20,'2020_11_06_215018_create_languages_table',3),(21,'2020_11_06_215209_create_levels_table',3),(22,'2020_11_09_005656_create_permission_tables',4),(23,'2020_11_11_223416_create_personal_informations_table',5),(24,'2020_11_15_151004_create_operational_informations_table',6),(25,'2020_11_15_183944_create_memos_table',7),(26,'2020_11_15_191440_create_courses_table',8),(27,'2020_11_15_194400_create_personal_medical_informations_table',9),(28,'2020_11_15_202237_create_passports_table',10),(29,'2020_11_15_211727_create_family_informations_table',11),(30,'2020_11_15_214146_create_other_skills_table',12),(31,'2020_11_15_223209_create_companies_table',13),(32,'2020_11_17_235043_create_skin_colors_table',14),(33,'2020_11_18_000224_add_skin_color_to_personal_information',15),(34,'2020_12_02_135946_create_license_endorsement_types_table',16),(35,'2020_12_02_143900_create_countries_table',16),(36,'2020_12_02_150102_create_license_endorsement_names_table',16),(37,'2020_12_02_153711_create_license_endorsements_table',16),(38,'2020_12_03_165310_create_visa_types_table',16),(39,'2020_12_03_170425_create_visas_table',16),(40,'2020_12_03_173535_add_nre_field_to_visas_table',16),(41,'2020_12_04_150340_create_shore_experiencies_table',16),(42,'2020_12_04_180604_create_seaman_books_table',16),(43,'2020_12_06_131133_create_family_statuses_table',17),(44,'2020_12_06_132622_fix_family_information_table',18),(45,'2020_12_08_043547_change_external_number_to_nullable',19),(46,'2021_02_23_193725_change_operationnal_information_nullable_fields',19),(47,'2021_02_23_204436_change_coure_number_field_lenght',19),(48,'2021_02_24_164820_create_sort_field',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (3,'App\\User',5),(4,'App\\User',5),(5,'App\\User',5),(6,'App\\User',5),(7,'App\\User',5),(8,'App\\User',5),(9,'App\\User',5),(10,'App\\User',5),(11,'App\\User',5),(12,'App\\User',5),(13,'App\\User',5),(14,'App\\User',5),(15,'App\\User',5),(16,'App\\User',5),(17,'App\\User',5),(18,'App\\User',5),(19,'App\\User',5),(20,'App\\User',5),(21,'App\\User',5),(22,'App\\User',5),(23,'App\\User',5),(24,'App\\User',5),(25,'App\\User',5),(27,'App\\User',5),(28,'App\\User',5),(29,'App\\User',5);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(1,'App\\User',2),(1,'App\\User',3),(2,'App\\User',5);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipalities`
--

DROP TABLE IF EXISTS `municipalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipalities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int(10) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipalities_province_id_foreign` (`province_id`),
  CONSTRAINT `municipalities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipalities`
--

LOCK TABLES `municipalities` WRITE;
/*!40000 ALTER TABLE `municipalities` DISABLE KEYS */;
INSERT INTO `municipalities` VALUES (1,2,'Cerro','2020-11-13 16:43:10','2020-11-13 16:43:10',NULL),(2,2,'Plaza de la Revolución','2020-11-13 16:45:43','2020-11-13 16:45:43',NULL),(3,2,'Centro Habana','2020-11-13 16:46:08','2020-11-13 16:46:08',NULL),(4,3,'Ciego de Avila','2020-11-16 05:00:33','2020-11-16 05:00:33',NULL),(5,3,'Morón','2020-11-17 15:44:45','2020-11-17 15:44:45',NULL),(6,3,'Chambas','2020-11-17 15:44:57','2020-11-17 15:44:57',NULL),(7,1,'Pinar del Rio','2020-11-17 15:45:15','2020-11-17 15:45:15',NULL),(8,1,'Consolación del Sur','2020-11-17 15:46:07','2020-11-17 15:46:07',NULL),(9,2,'Marianao','2020-12-08 09:44:52','2020-12-08 09:44:52',NULL);
/*!40000 ALTER TABLE `municipalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `next_of_kins`
--

DROP TABLE IF EXISTS `next_of_kins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `next_of_kins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `next_of_kins`
--

LOCK TABLES `next_of_kins` WRITE;
/*!40000 ALTER TABLE `next_of_kins` DISABLE KEYS */;
INSERT INTO `next_of_kins` VALUES (1,'Father','2020-11-16 02:03:41','2020-11-16 02:03:41',NULL),(2,'Mother','2020-11-16 02:03:48','2020-11-16 02:03:48',NULL),(3,'Brother','2020-11-16 02:03:54','2020-11-16 02:03:54',NULL),(4,'Son','2020-11-16 02:04:02','2020-11-16 02:04:02',NULL);
/*!40000 ALTER TABLE `next_of_kins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operational_informations`
--

DROP TABLE IF EXISTS `operational_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operational_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `disponibility_date` date DEFAULT NULL,
  `ranks_id` int(10) unsigned NOT NULL,
  `statuses_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operational_informations_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `operational_informations_ranks_id_foreign` (`ranks_id`),
  KEY `operational_informations_statuses_id_foreign` (`statuses_id`),
  CONSTRAINT `operational_informations_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `operational_informations_ranks_id_foreign` FOREIGN KEY (`ranks_id`) REFERENCES `ranks` (`id`),
  CONSTRAINT `operational_informations_statuses_id_foreign` FOREIGN KEY (`statuses_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operational_informations`
--

LOCK TABLES `operational_informations` WRITE;
/*!40000 ALTER TABLE `operational_informations` DISABLE KEYS */;
INSERT INTO `operational_informations` VALUES (6,3,'2020-09-24',2,2,'Lorem ipsum dolor sit amed. Updated!!!!','2020-11-18 07:04:45','2021-03-03 07:00:00',NULL),(7,6,'2022-02-20',1,3,NULL,'2022-02-20 07:00:00','2022-02-20 07:00:00',NULL);
/*!40000 ALTER TABLE `operational_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `other_skills`
--

DROP TABLE IF EXISTS `other_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `other_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `skill_or_knowledge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_or_school` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `knowledge_date` date NOT NULL,
  `empirical` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `other_skills_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `other_skills_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_skills`
--

LOCK TABLES `other_skills` WRITE;
/*!40000 ALTER TABLE `other_skills` DISABLE KEYS */;
INSERT INTO `other_skills` VALUES (1,3,'Skill 1','My Own School','2020-12-16',1,'2020-12-07 17:28:25','2020-12-07 17:28:25',NULL),(2,3,'Skill 1','My Own School','2020-12-24',0,'2020-12-07 17:35:19','2020-12-07 17:35:19',NULL);
/*!40000 ALTER TABLE `other_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passports`
--

DROP TABLE IF EXISTS `passports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `expedition_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `extension_date` date DEFAULT NULL,
  `expiry_extension_date` date DEFAULT NULL,
  `no_passport` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `passports_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `passports_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passports`
--

LOCK TABLES `passports` WRITE;
/*!40000 ALTER TABLE `passports` DISABLE KEYS */;
/*!40000 ALTER TABLE `passports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (3,'province','web','2020-11-09 17:51:59','2020-11-11 23:34:31'),(4,'municipality','web','2020-11-12 00:07:53','2020-11-12 00:07:53'),(5,'eye','web','2020-11-12 00:08:03','2020-11-12 00:08:03'),(6,'hair','web','2020-11-12 00:08:12','2020-11-12 00:08:12'),(7,'marital','web','2020-11-12 00:08:20','2020-11-12 00:08:20'),(8,'schoolGrade','web','2020-11-12 00:08:42','2020-11-12 00:08:42'),(9,'politicalIntegration','web','2020-11-12 00:08:58','2020-11-12 00:08:58'),(10,'rank','web','2020-11-12 00:09:07','2020-11-12 00:09:07'),(11,'status','web','2020-11-12 00:09:14','2020-11-12 00:09:14'),(12,'courseNumber','web','2020-11-12 00:09:22','2020-11-12 00:09:22'),(13,'medicalInformation','web','2020-11-12 00:09:30','2020-11-12 00:09:30'),(14,'license','web','2020-11-12 00:09:39','2020-11-12 00:09:39'),(15,'nextOfKin','web','2020-11-12 00:09:48','2020-11-12 00:09:48'),(16,'engineType','web','2020-11-12 00:09:56','2020-11-12 00:09:56'),(17,'flag','web','2020-11-12 00:10:09','2020-11-12 00:10:09'),(18,'affiliate','web','2020-11-12 00:10:14','2020-11-12 00:10:14'),(19,'languages','web','2020-11-12 00:10:22','2020-11-12 00:10:22'),(20,'level','web','2020-11-12 00:10:28','2020-11-12 00:10:28'),(21,'role','web','2020-11-12 00:10:39','2020-11-12 00:10:39'),(22,'permissions','web','2020-11-12 00:10:43','2020-11-12 00:10:43'),(23,'user','web','2020-11-12 00:10:50','2020-11-12 00:10:50'),(24,'personalInformation','web','2020-11-12 03:44:07','2020-11-12 03:44:07'),(25,'skinColors','web','2020-11-18 05:38:07','2020-11-18 05:38:07'),(27,'licenseEndorsementTypes','web','2020-12-05 03:20:12','2020-12-05 03:20:12'),(28,'countries','web','2020-12-05 03:26:04','2020-12-05 03:26:04'),(29,'visaTypes','web','2020-12-05 03:26:38','2020-12-05 03:26:38');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_informations`
--

DROP TABLE IF EXISTS `personal_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `internal_file_number` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_file_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relevant_action` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `particular_sings` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` int(10) unsigned NOT NULL,
  `municipality_id` int(10) unsigned NOT NULL,
  `political_integration_id` int(10) unsigned NOT NULL,
  `eyes_color_id` int(10) unsigned NOT NULL,
  `hair_color_id` int(10) unsigned NOT NULL,
  `marital_status_id` int(10) unsigned NOT NULL,
  `school_grade_id` int(10) unsigned NOT NULL,
  `avatar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `skin_color_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_informations_province_id_foreign` (`province_id`),
  KEY `personal_informations_municipality_id_foreign` (`municipality_id`),
  KEY `personal_informations_political_integration_id_foreign` (`political_integration_id`),
  KEY `personal_informations_eyes_color_id_foreign` (`eyes_color_id`),
  KEY `personal_informations_hair_color_id_foreign` (`hair_color_id`),
  KEY `personal_informations_marital_status_id_foreign` (`marital_status_id`),
  KEY `personal_informations_school_grade_id_foreign` (`school_grade_id`),
  KEY `personal_informations_skin_color_id_foreign` (`skin_color_id`),
  CONSTRAINT `personal_informations_eyes_color_id_foreign` FOREIGN KEY (`eyes_color_id`) REFERENCES `eyes_colors` (`id`),
  CONSTRAINT `personal_informations_hair_color_id_foreign` FOREIGN KEY (`hair_color_id`) REFERENCES `hair_colors` (`id`),
  CONSTRAINT `personal_informations_marital_status_id_foreign` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_statuses` (`id`),
  CONSTRAINT `personal_informations_municipality_id_foreign` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`),
  CONSTRAINT `personal_informations_political_integration_id_foreign` FOREIGN KEY (`political_integration_id`) REFERENCES `political_integrations` (`id`),
  CONSTRAINT `personal_informations_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  CONSTRAINT `personal_informations_school_grade_id_foreign` FOREIGN KEY (`school_grade_id`) REFERENCES `school_grades` (`id`),
  CONSTRAINT `personal_informations_skin_color_id_foreign` FOREIGN KEY (`skin_color_id`) REFERENCES `skin_colors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_informations`
--

LOCK TABLES `personal_informations` WRITE;
/*!40000 ALTER TABLE `personal_informations` DISABLE KEYS */;
INSERT INTO `personal_informations` VALUES (3,'2233668','333366','Efrain Losada León','86092416669','86092416669','2020-09-24','Ciego de Avila','Colon #203 e\\ Hidalgo y Marino','78837874','53029238','52712155','Lorem ipsum dolor sit amed.','Male',175,190,'None','losada24@gmail.com',3,4,2,2,1,2,1,'/uploads/5fcedc892e9a8.jpg','2020-11-18 05:00:00','2020-12-08 07:00:00',NULL,1),(4,'22336688','33336688','Test User 2','852245678','852245678','2020-12-30','La Habana','Ave 25 test.','2323232323','2323232323','2323232323','Lorem ipsum dolor.','Female',175,25,'None','newemail@gmail.com',2,1,2,2,1,2,2,'/uploads/5fcedbc8c67c9.jpg','2020-12-07 07:00:00','2021-03-03 07:00:00','2021-03-03 07:00:00',3),(5,'15252',NULL,'Orlando Jorge de la Nuez Ruiz','76072040709','489-53','1976-07-20','Havana','Humboldt 54 Entre Infanta y Hospital Centro Habana, La Habana','+5378787605','+5372095690','+5358477721',NULL,'Male',170,144,NULL,NULL,2,1,1,1,1,2,1,'/uploads/6008fc7b5e29a.jpg','2020-12-08 07:00:00','2021-02-08 07:00:00','2021-02-08 07:00:00',1),(6,'15253',NULL,'Orlando Jorge de la Nuez Ruiz','76072040708','489-53','1976-07-20','Havana','Humboldt 54 Entre Infanta y Hospital Centro Habana, La Habana','+5378787605','+5372095690','+5358477721',NULL,'Male',170,165,'Nil','orlandojorge42@hotmail.com',2,1,3,3,1,2,1,'/uploads/60208a18888c5.jpg','2021-02-08 07:00:00','2021-02-08 07:00:00',NULL,1),(7,'5964',NULL,'Gustavo Gonzalez Marten','54051012763','190-66','1954-05-10','Havana','Calle Sta Ana entre Avenida Boyeros y Calzada','+5378835665',NULL,'+5352582615',NULL,'Male',170,170,'Nil','kapmarten@gmail.com',2,2,1,1,1,2,1,'/uploads/60208bff223aa.jpg','2021-02-08 07:00:00','2021-02-08 07:00:00',NULL,2),(8,'333','334','Efrain','852245678','852245678','2021-03-15','Guines','calle 23 / 2 y 4 #1234','1234568','1234568','1234568',NULL,'Male',234,56,NULL,'katiuska28@gmail.com',2,1,1,1,1,1,1,'/uploads/603fa36940673.jpg','2021-03-03 07:00:00','2021-04-02 06:00:00',NULL,1);
/*!40000 ALTER TABLE `personal_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_medical_informations`
--

DROP TABLE IF EXISTS `personal_medical_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_medical_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `medical_informations_id` int(10) unsigned NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_medical_informations_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `personal_medical_informations_medical_informations_id_foreign` (`medical_informations_id`),
  CONSTRAINT `personal_medical_informations_medical_informations_id_foreign` FOREIGN KEY (`medical_informations_id`) REFERENCES `medical_informations` (`id`),
  CONSTRAINT `personal_medical_informations_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_medical_informations`
--

LOCK TABLES `personal_medical_informations` WRITE;
/*!40000 ALTER TABLE `personal_medical_informations` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_medical_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `political_integrations`
--

DROP TABLE IF EXISTS `political_integrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `political_integrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `political_integrations`
--

LOCK TABLES `political_integrations` WRITE;
/*!40000 ALTER TABLE `political_integrations` DISABLE KEYS */;
INSERT INTO `political_integrations` VALUES (1,'PCC','2020-11-12 09:26:40','2020-11-12 09:26:40',NULL),(2,'UJC','2020-11-12 09:26:45','2020-11-12 09:26:45',NULL),(3,'Nil','2021-02-08 07:48:15','2021-02-08 07:48:15',NULL);
/*!40000 ALTER TABLE `political_integrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Pinar del Rio','2020-11-12 09:04:53','2020-11-12 09:04:53',NULL),(2,'La Habana','2020-11-12 09:04:59','2020-11-12 09:04:59',NULL),(3,'Ciego de Avila','2020-11-16 04:59:59','2020-11-16 04:59:59',NULL),(4,'SANTIAGO DE CUBA','2021-04-02 06:01:40','2021-04-02 06:01:40',NULL);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT INTO `ranks` VALUES (1,'2do Oficial','2020-11-15 21:14:45','2020-11-15 21:14:45',NULL),(2,'Almirante','2020-11-15 21:14:56','2020-11-15 21:14:56',NULL),(3,'Master','2021-02-08 08:00:16','2021-02-08 08:00:16',NULL);
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (3,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `roles` VALUES (1,'Admin','web','2020-11-09 08:51:27','2020-11-09 08:51:27'),(2,'Writer','web','2020-11-09 15:58:21','2020-11-09 15:58:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_grades`
--

DROP TABLE IF EXISTS `school_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_grades`
--

LOCK TABLES `school_grades` WRITE;
/*!40000 ALTER TABLE `school_grades` DISABLE KEYS */;
INSERT INTO `school_grades` VALUES (1,'Academic','2020-11-12 16:18:50','2020-11-12 16:18:50',NULL),(2,'Bachelor','2020-11-12 16:19:16','2020-11-12 16:19:16',NULL);
/*!40000 ALTER TABLE `school_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seaman_books`
--

DROP TABLE IF EXISTS `seaman_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seaman_books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seaman_books_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `seaman_books_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seaman_books`
--

LOCK TABLES `seaman_books` WRITE;
/*!40000 ALTER TABLE `seaman_books` DISABLE KEYS */;
/*!40000 ALTER TABLE `seaman_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shore_experiencies`
--

DROP TABLE IF EXISTS `shore_experiencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shore_experiencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shore_experiencies_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `shore_experiencies_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shore_experiencies`
--

LOCK TABLES `shore_experiencies` WRITE;
/*!40000 ALTER TABLE `shore_experiencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `shore_experiencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skin_colors`
--

DROP TABLE IF EXISTS `skin_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skin_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skin_colors`
--

LOCK TABLES `skin_colors` WRITE;
/*!40000 ALTER TABLE `skin_colors` DISABLE KEYS */;
INSERT INTO `skin_colors` VALUES (1,'White','2020-11-18 05:41:46','2020-11-18 05:41:46',NULL),(2,'Black','2020-11-18 05:41:53','2020-11-18 05:41:53',NULL),(3,'Brown','2020-11-18 05:41:58','2020-11-18 05:41:58',NULL);
/*!40000 ALTER TABLE `skin_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Ready','2020-11-15 21:15:08','2020-11-15 21:15:08',NULL),(2,'Vacations','2020-11-15 21:15:20','2020-11-15 21:15:20',NULL),(3,'On board','2021-02-08 08:00:48','2021-02-08 08:00:48',NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Efrain Losada','losada24@gmail.com',NULL,'$2y$10$f/H60e7pMkSkTuhZZBOHKept/4nC.cy3Ax1JzHKHGtT9fqpVjso8G',NULL,'2020-10-28 16:36:16','2020-11-12 00:19:12'),(2,'Katiuska Cuba','katiuska28@gmail.com',NULL,'$2y$10$ME5./ZKZq6tBDlSYrNSVTeyb6j6S1NCqvb8bRycpf9/myxStU/9Xm',NULL,'2020-11-09 17:25:00','2020-11-09 17:38:29'),(3,'orlando','orlandojorge42@hotmail.com',NULL,'$2y$10$KWCXKa2OJQ5WHoNXMc5ZEu5v.lrQoA8gPK2IB64kJvdVa0ayN7Dl.',NULL,'2020-11-16 05:04:14','2020-12-08 02:26:24'),(5,'Castell','easy.tg@gmail.com',NULL,'$2y$10$HPlZnmGgcleASpSyL7ad0O1zkOITfIeIkIME4bjhtrLgiri7jt3Im',NULL,'2021-04-02 05:51:49','2021-04-02 05:51:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visa_types`
--

DROP TABLE IF EXISTS `visa_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visa_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visa_types`
--

LOCK TABLES `visa_types` WRITE;
/*!40000 ALTER TABLE `visa_types` DISABLE KEYS */;
INSERT INTO `visa_types` VALUES (1,'Schengen','2020-12-07 17:48:34','2020-12-07 17:48:34',NULL),(2,'Panamanian','2020-12-07 17:49:15','2020-12-07 17:49:15',NULL);
/*!40000 ALTER TABLE `visa_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visas`
--

DROP TABLE IF EXISTS `visas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visa_types_id` int(10) unsigned NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `personal_informations_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `visas_visa_types_id_foreign` (`visa_types_id`),
  KEY `visas_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `visas_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `visas_visa_types_id_foreign` FOREIGN KEY (`visa_types_id`) REFERENCES `visa_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visas`
--

LOCK TABLES `visas` WRITE;
/*!40000 ALTER TABLE `visas` DISABLE KEYS */;
/*!40000 ALTER TABLE `visas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-10  9:38:20
