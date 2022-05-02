-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: odn_8
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flags_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type_id` int(10) unsigned NOT NULL,
  `company_mission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companies_flags_id_foreign` (`flags_id`),
  KEY `companies_company_type_id_foreign` (`company_type_id`),
  KEY `companies_company_mission_id_foreign` (`company_mission_id`),
  CONSTRAINT `companies_company_mission_id_foreign` FOREIGN KEY (`company_mission_id`) REFERENCES `company_mission` (`id`),
  CONSTRAINT `companies_company_type_id_foreign` FOREIGN KEY (`company_type_id`) REFERENCES `company_type` (`id`),
  CONSTRAINT `companies_flags_id_foreign` FOREIGN KEY (`flags_id`) REFERENCES `flags` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Caribe',1,'2022-04-18 00:45:10','2022-04-18 00:45:10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_mission`
--

DROP TABLE IF EXISTS `company_mission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_mission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_mission`
--

LOCK TABLES `company_mission` WRITE;
/*!40000 ALTER TABLE `company_mission` DISABLE KEYS */;
INSERT INTO `company_mission` VALUES (1,'MERCANTE',NULL,NULL,NULL),(2,'CRUCERO',NULL,NULL,NULL),(3,'YATE',NULL,NULL,NULL),(4,'PESCA',NULL,NULL,NULL);
/*!40000 ALTER TABLE `company_mission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_type`
--

DROP TABLE IF EXISTS `company_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_type`
--

LOCK TABLES `company_type` WRITE;
/*!40000 ALTER TABLE `company_type` DISABLE KEYS */;
INSERT INTO `company_type` VALUES (1,'NACIONAL','N',NULL,NULL,NULL),(2,'EXTRANJERA','E',NULL,NULL,NULL),(3,'MIXTA','M',NULL,NULL,NULL);
/*!40000 ALTER TABLE `company_type` ENABLE KEYS */;
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Cuba','2022-04-28 22:51:07','2022-04-28 22:51:07',NULL,'Cu'),(2,'Francia','2022-04-28 22:51:15','2022-04-28 22:51:15',NULL,'Fr');
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_numbers`
--

LOCK TABLES `course_numbers` WRITE;
/*!40000 ALTER TABLE `course_numbers` DISABLE KEYS */;
INSERT INTO `course_numbers` VALUES (1,'1','1','2022-04-28 22:50:46','2022-04-28 22:50:46',NULL,1),(2,'2','2','2022-04-28 22:50:52','2022-04-28 22:50:52',NULL,2);
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
  `country_id` int(10) unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `certificate_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `courses_course_numbers_id_foreign` (`course_numbers_id`),
  KEY `courses_country_id_foreign` (`country_id`),
  CONSTRAINT `courses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `courses_course_numbers_id_foreign` FOREIGN KEY (`course_numbers_id`) REFERENCES `course_numbers` (`id`),
  CONSTRAINT `courses_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,1,1,1,'2022-04-27','2022-04-30','1','2022-04-28 04:00:00','2022-04-29 04:00:00',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engine_types`
--

LOCK TABLES `engine_types` WRITE;
/*!40000 ALTER TABLE `engine_types` DISABLE KEYS */;
INSERT INTO `engine_types` VALUES (1,'Diesel','2022-04-28 21:43:41','2022-04-28 21:43:41',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eyes_colors`
--

LOCK TABLES `eyes_colors` WRITE;
/*!40000 ALTER TABLE `eyes_colors` DISABLE KEYS */;
INSERT INTO `eyes_colors` VALUES (1,'black','2022-04-18 00:45:23','2022-04-18 00:45:23',NULL);
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
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kins_id` int(10) unsigned NOT NULL,
  `birth_date` date DEFAULT NULL,
  `same_address_as_marine` int(10) unsigned NOT NULL,
  `provinces_id` int(10) unsigned DEFAULT NULL,
  `municipalities_id` int(10) unsigned DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family_informations`
--

LOCK TABLES `family_informations` WRITE;
/*!40000 ALTER TABLE `family_informations` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family_statuses`
--

LOCK TABLES `family_statuses` WRITE;
/*!40000 ALTER TABLE `family_statuses` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flags`
--

LOCK TABLES `flags` WRITE;
/*!40000 ALTER TABLE `flags` DISABLE KEYS */;
INSERT INTO `flags` VALUES (1,'Cubana','2022-04-18 00:44:52','2022-04-18 00:44:52',NULL);
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
INSERT INTO `hair_colors` VALUES (1,'black','2022-04-18 00:45:46','2022-04-18 00:45:46',NULL);
/*!40000 ALTER TABLE `hair_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_informations`
--

DROP TABLE IF EXISTS `language_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_informations_id` int(10) unsigned NOT NULL,
  `languages_id` int(10) unsigned NOT NULL,
  `language_skills_id` int(10) unsigned NOT NULL,
  `levels_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_informations_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `language_informations_languages_id_foreign` (`languages_id`),
  KEY `language_informations_language_skills_id_foreign` (`language_skills_id`),
  KEY `language_informations_levels_id_foreign` (`levels_id`),
  CONSTRAINT `language_informations_language_skills_id_foreign` FOREIGN KEY (`language_skills_id`) REFERENCES `language_skills` (`id`),
  CONSTRAINT `language_informations_languages_id_foreign` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `language_informations_levels_id_foreign` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `language_informations_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_informations`
--

LOCK TABLES `language_informations` WRITE;
/*!40000 ALTER TABLE `language_informations` DISABLE KEYS */;
/*!40000 ALTER TABLE `language_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_skills`
--

DROP TABLE IF EXISTS `language_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_skills`
--

LOCK TABLES `language_skills` WRITE;
/*!40000 ALTER TABLE `language_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `language_skills` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license_endorsement_names`
--

LOCK TABLES `license_endorsement_names` WRITE;
/*!40000 ALTER TABLE `license_endorsement_names` DISABLE KEYS */;
INSERT INTO `license_endorsement_names` VALUES (1,'Name 1',1,'2022-04-28 22:55:29','2022-04-28 22:55:29',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license_endorsement_types`
--

LOCK TABLES `license_endorsement_types` WRITE;
/*!40000 ALTER TABLE `license_endorsement_types` DISABLE KEYS */;
INSERT INTO `license_endorsement_types` VALUES (1,'Tipo 1','2022-04-28 22:54:25','2022-04-28 22:54:25',NULL);
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
INSERT INTO `license_endorsements` VALUES (1,1,'2022-04-01','2023-04-01',1,1,1,1,'2022-04-28 22:55:56','2022-04-28 22:55:56',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marital_statuses`
--

LOCK TABLES `marital_statuses` WRITE;
/*!40000 ALTER TABLE `marital_statuses` DISABLE KEYS */;
INSERT INTO `marital_statuses` VALUES (1,'Casado','2022-04-18 00:46:01','2022-04-18 00:46:01',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_informations`
--

LOCK TABLES `medical_informations` WRITE;
/*!40000 ALTER TABLE `medical_informations` DISABLE KEYS */;
INSERT INTO `medical_informations` VALUES (1,'Certificado Covid','2022-04-28 22:53:22','2022-04-28 22:53:22',NULL);
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
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `memos_personal_informations_id_foreign` (`personal_informations_id`),
  CONSTRAINT `memos_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memos`
--

LOCK TABLES `memos` WRITE;
/*!40000 ALTER TABLE `memos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2020_11_06_173104_create_provinces_table',1),(6,'2020_11_06_175950_create_municipalities_table',1),(7,'2020_11_06_180703_create_eyes_colors_table',1),(8,'2020_11_06_203046_create_hair_colors_table',1),(9,'2020_11_06_204437_create_marital_statuses_table',1),(10,'2020_11_06_205042_create_school_grades_table',1),(11,'2020_11_06_205655_create_political_integrations_table',1),(12,'2020_11_06_210158_create_ranks_table',1),(13,'2020_11_06_210350_create_statuses_table',1),(14,'2020_11_06_211030_create_course_numbers_table',1),(15,'2020_11_06_211308_create_medical_informations_table',1),(16,'2020_11_06_211624_create_licenses_table',1),(17,'2020_11_06_212138_create_next_of_kins_table',1),(18,'2020_11_06_212716_create_engine_types_table',1),(19,'2020_11_06_213517_create_flags_table',1),(20,'2020_11_06_214058_create_affiliates_table',1),(21,'2020_11_06_215018_create_languages_table',1),(22,'2020_11_06_215209_create_levels_table',1),(23,'2020_11_09_005656_create_permission_tables',1),(24,'2020_11_11_223416_create_personal_informations_table',1),(25,'2020_11_15_151004_create_operational_informations_table',1),(26,'2020_11_15_183944_create_memos_table',1),(27,'2020_11_15_191440_create_courses_table',1),(28,'2020_11_15_194400_create_personal_medical_informations_table',1),(29,'2020_11_15_202237_create_passports_table',1),(30,'2020_11_15_211727_create_family_informations_table',1),(31,'2020_11_15_214146_create_other_skills_table',1),(32,'2020_11_15_223209_create_companies_table',1),(33,'2020_11_17_235043_create_skin_colors_table',1),(34,'2020_11_18_000224_add_skin_color_to_personal_information',1),(35,'2020_12_02_135946_create_license_endorsement_types_table',1),(36,'2020_12_02_143900_create_countries_table',1),(37,'2020_12_02_150102_create_license_endorsement_names_table',1),(38,'2020_12_02_153711_create_license_endorsements_table',1),(39,'2020_12_03_165310_create_visa_types_table',1),(40,'2020_12_03_170425_create_visas_table',1),(41,'2020_12_03_173535_add_nre_field_to_visas_table',1),(42,'2020_12_04_150340_create_shore_experiencies_table',1),(43,'2020_12_04_180604_create_seaman_books_table',1),(44,'2020_12_06_131133_create_family_statuses_table',1),(45,'2020_12_06_132622_fix_family_information_table',1),(46,'2020_12_08_043547_change_external_number_to_nullable',1),(47,'2021_02_23_193725_change_operationnal_information_nullable_fields',1),(48,'2021_02_23_204436_change_coure_number_field_lenght',1),(49,'2021_02_24_164820_create_sort_field',1),(50,'2021_09_05_040958_add_code_to_status',1),(51,'2021_09_05_045752_add_code_to_rank',1),(52,'2021_09_05_051129_add_code_to_province_and_municipality',1),(53,'2021_09_05_061014_add_code_to_school_grade',1),(54,'2021_09_05_122836_add_code_to_political_integrations',1),(55,'2021_09_05_144629_change_serial_number_lenght',1),(56,'2021_09_11_105347_add_code_to_course_number',1),(57,'2021_09_11_162952_add_code_to_country',1),(58,'2021_09_11_173320_update_course_table_to_import',1),(59,'2021_09_17_132911_add_group_to_passport',1),(60,'2021_10_21_131838_create_skill_or_knowledges_table',1),(61,'2021_10_21_134939_add_column_code_to_skill_or_knowledges',1),(62,'2021_10_22_043603_update_other_skill_table',1),(63,'2021_10_22_141224_update_other_skill_date_to_nullable_table',1),(64,'2021_10_22_145125_add_title_to_other_skill_table',1),(65,'2021_10_26_115839_fix_company_table',1),(66,'2021_10_28_165747_create_vessels_table',1),(67,'2021_10_29_121052_create_vessel_types_table',1),(68,'2021_10_29_134202_add_foreign_key_to_vessel',1),(69,'2021_10_30_003808_add_dates_to_vessels_table',1),(70,'2022_03_11_164214_create_sea_going_experiences_table',1),(71,'2022_03_25_212115_add_is_on_board_to_status',1),(72,'2022_03_27_153028_modify_operational_information',1),(73,'2022_04_05_151543_change_engine_and_machine_field',1),(74,'2022_04_08_152626_create_language_skills_table',1),(75,'2022_04_08_153117_create_language_informations_table',1),(76,'2022_04_17_173901_add_company_to_personal_information',1),(77,'2022_04_30_164758_add_country_to_passport',2);
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
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(1,'App\\User',2),(1,'App\\User',3),(1,'App\\User',6),(2,'App\\User',5);
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `municipalities_code_unique` (`code`),
  KEY `municipalities_province_id_foreign` (`province_id`),
  CONSTRAINT `municipalities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipalities`
--

LOCK TABLES `municipalities` WRITE;
/*!40000 ALTER TABLE `municipalities` DISABLE KEYS */;
INSERT INTO `municipalities` VALUES (1,1,'Playa','Pl','2022-04-18 00:46:27','2022-04-18 00:46:27',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `next_of_kins`
--

LOCK TABLES `next_of_kins` WRITE;
/*!40000 ALTER TABLE `next_of_kins` DISABLE KEYS */;
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
  `vessel_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operational_informations_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `operational_informations_ranks_id_foreign` (`ranks_id`),
  KEY `operational_informations_statuses_id_foreign` (`statuses_id`),
  KEY `operational_informations_vessel_id_foreign` (`vessel_id`),
  CONSTRAINT `operational_informations_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `operational_informations_ranks_id_foreign` FOREIGN KEY (`ranks_id`) REFERENCES `ranks` (`id`),
  CONSTRAINT `operational_informations_statuses_id_foreign` FOREIGN KEY (`statuses_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `operational_informations_vessel_id_foreign` FOREIGN KEY (`vessel_id`) REFERENCES `vessels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operational_informations`
--

LOCK TABLES `operational_informations` WRITE;
/*!40000 ALTER TABLE `operational_informations` DISABLE KEYS */;
INSERT INTO `operational_informations` VALUES (1,1,'2022-12-16',2,4,NULL,'2022-04-28 04:00:00','2022-04-29 04:00:00',NULL,1),(2,2,'2022-07-31',1,3,NULL,'2022-04-28 04:00:00','2022-04-29 04:00:00',NULL,1);
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
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_or_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `knowledge_date` date DEFAULT NULL,
  `empirical` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `skill_or_knowledge_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `other_skills_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `other_skills_skill_or_knowledge_id_foreign` (`skill_or_knowledge_id`),
  CONSTRAINT `other_skills_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `other_skills_skill_or_knowledge_id_foreign` FOREIGN KEY (`skill_or_knowledge_id`) REFERENCES `skill_or_knowledges` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_skills`
--

LOCK TABLES `other_skills` WRITE;
/*!40000 ALTER TABLE `other_skills` DISABLE KEYS */;
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
  `passport_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `countries_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `passports_personal_informations_id_foreign` (`personal_informations_id`),
  KEY `passports_countries_id_foreign` (`countries_id`),
  CONSTRAINT `passports_countries_id_foreign` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `passports_personal_informations_id_foreign` FOREIGN KEY (`personal_informations_id`) REFERENCES `personal_informations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passports`
--

LOCK TABLES `passports` WRITE;
/*!40000 ALTER TABLE `passports` DISABLE KEYS */;
INSERT INTO `passports` VALUES (2,1,'2022-04-01','2024-04-30',NULL,NULL,'A1817',NULL,'2022-04-30 21:37:06','2022-04-30 21:37:06',NULL,1),(3,1,'2022-04-01','2023-04-30',NULL,NULL,'A1818',NULL,'2022-04-30 22:33:51','2022-04-30 22:33:51',NULL,1);
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
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
  `serial_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `companies_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_informations_province_id_foreign` (`province_id`),
  KEY `personal_informations_municipality_id_foreign` (`municipality_id`),
  KEY `personal_informations_political_integration_id_foreign` (`political_integration_id`),
  KEY `personal_informations_eyes_color_id_foreign` (`eyes_color_id`),
  KEY `personal_informations_hair_color_id_foreign` (`hair_color_id`),
  KEY `personal_informations_marital_status_id_foreign` (`marital_status_id`),
  KEY `personal_informations_school_grade_id_foreign` (`school_grade_id`),
  KEY `personal_informations_skin_color_id_foreign` (`skin_color_id`),
  KEY `personal_informations_companies_id_foreign` (`companies_id`),
  CONSTRAINT `personal_informations_companies_id_foreign` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  CONSTRAINT `personal_informations_eyes_color_id_foreign` FOREIGN KEY (`eyes_color_id`) REFERENCES `eyes_colors` (`id`),
  CONSTRAINT `personal_informations_hair_color_id_foreign` FOREIGN KEY (`hair_color_id`) REFERENCES `hair_colors` (`id`),
  CONSTRAINT `personal_informations_marital_status_id_foreign` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_statuses` (`id`),
  CONSTRAINT `personal_informations_municipality_id_foreign` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`),
  CONSTRAINT `personal_informations_political_integration_id_foreign` FOREIGN KEY (`political_integration_id`) REFERENCES `political_integrations` (`id`),
  CONSTRAINT `personal_informations_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  CONSTRAINT `personal_informations_school_grade_id_foreign` FOREIGN KEY (`school_grade_id`) REFERENCES `school_grades` (`id`),
  CONSTRAINT `personal_informations_skin_color_id_foreign` FOREIGN KEY (`skin_color_id`) REFERENCES `skin_colors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_informations`
--

LOCK TABLES `personal_informations` WRITE;
/*!40000 ALTER TABLE `personal_informations` DISABLE KEYS */;
INSERT INTO `personal_informations` VALUES (1,'001','001','Armando','001','001','2022-04-01','Habana',NULL,NULL,NULL,NULL,NULL,'Male',165,100,NULL,NULL,1,1,1,1,1,1,1,'/img/default-image.png','2022-04-28 04:00:00','2022-04-28 04:00:00',NULL,1,1),(2,'0002','0002','Adrian','0002','0002','2022-04-01','Habana',NULL,NULL,NULL,NULL,NULL,'Male',100,120,NULL,NULL,1,1,1,1,1,1,1,'/img/default-image.png','2022-04-28 04:00:00','2022-04-28 04:00:00',NULL,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_medical_informations`
--

LOCK TABLES `personal_medical_informations` WRITE;
/*!40000 ALTER TABLE `personal_medical_informations` DISABLE KEYS */;
INSERT INTO `personal_medical_informations` VALUES (1,1,1,'2022-04-01','2023-04-01','2022-04-28 22:53:45','2022-04-28 22:53:45',NULL);
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `political_integrations`
--

LOCK TABLES `political_integrations` WRITE;
/*!40000 ALTER TABLE `political_integrations` DISABLE KEYS */;
INSERT INTO `political_integrations` VALUES (1,'PCC','PCC','2022-04-18 00:46:43','2022-04-18 00:46:43',NULL);
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinces_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Habana','Hav','2022-04-18 00:46:15','2022-04-18 00:46:15',NULL);
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ranks_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT INTO `ranks` VALUES (1,'Almirante','A','2022-04-28 21:44:50','2022-04-28 21:44:50',NULL),(2,'Capitan','C','2022-04-28 21:44:59','2022-04-28 21:44:59',NULL);
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_grades_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_grades`
--

LOCK TABLES `school_grades` WRITE;
/*!40000 ALTER TABLE `school_grades` DISABLE KEYS */;
INSERT INTO `school_grades` VALUES (1,'Universitario','U','2022-04-18 00:47:07','2022-04-18 00:47:07',NULL);
/*!40000 ALTER TABLE `school_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sea_going_experiences`
--

DROP TABLE IF EXISTS `sea_going_experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sea_going_experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_information_id` int(10) unsigned NOT NULL,
  `rank_id` int(10) unsigned NOT NULL,
  `vessel_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contract_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sea_going_experiences_personal_information_id_foreign` (`personal_information_id`),
  KEY `sea_going_experiences_rank_id_foreign` (`rank_id`),
  KEY `sea_going_experiences_vessel_id_foreign` (`vessel_id`),
  KEY `sea_going_experiences_status_id_foreign` (`status_id`),
  CONSTRAINT `sea_going_experiences_personal_information_id_foreign` FOREIGN KEY (`personal_information_id`) REFERENCES `personal_informations` (`id`),
  CONSTRAINT `sea_going_experiences_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`),
  CONSTRAINT `sea_going_experiences_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `sea_going_experiences_vessel_id_foreign` FOREIGN KEY (`vessel_id`) REFERENCES `vessels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sea_going_experiences`
--

LOCK TABLES `sea_going_experiences` WRITE;
/*!40000 ALTER TABLE `sea_going_experiences` DISABLE KEYS */;
INSERT INTO `sea_going_experiences` VALUES (1,1,1,1,3,'2022-04-01','2022-03-31',NULL,'2022-04-28 04:00:00','2022-04-28 04:00:00',NULL),(2,1,1,1,3,'2022-04-01','2022-03-31',NULL,'2022-04-28 04:00:00','2022-04-28 04:00:00',NULL),(3,1,1,1,3,'2022-04-28','2022-04-27',NULL,'2022-04-28 04:00:00','2022-04-28 04:00:00',NULL),(4,1,1,2,3,'2022-04-28','2023-04-27',NULL,'2022-04-28 04:00:00','2022-04-28 04:00:00',NULL),(5,1,2,1,3,'2023-04-28','2022-12-15',NULL,'2022-04-28 04:00:00','2022-04-28 04:00:00',NULL),(6,2,1,1,3,'2022-04-07','2022-07-30',NULL,'2022-04-28 04:00:00','2022-04-28 04:00:00',NULL),(7,2,1,1,3,'2022-07-31','2022-07-30',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(8,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(9,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(10,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(11,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(12,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(13,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(14,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(15,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(16,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(17,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL),(18,1,2,1,3,'2022-12-16','2022-12-15',NULL,'2022-04-29 04:00:00','2022-04-29 04:00:00',NULL);
/*!40000 ALTER TABLE `sea_going_experiences` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seaman_books`
--

LOCK TABLES `seaman_books` WRITE;
/*!40000 ALTER TABLE `seaman_books` DISABLE KEYS */;
INSERT INTO `seaman_books` VALUES (1,'1','2022-04-01','2023-04-01',1,'2022-04-28 22:56:32','2022-04-28 22:56:32',NULL);
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
-- Table structure for table `skill_or_knowledges`
--

DROP TABLE IF EXISTS `skill_or_knowledges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_or_knowledges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_or_knowledges`
--

LOCK TABLES `skill_or_knowledges` WRITE;
/*!40000 ALTER TABLE `skill_or_knowledges` DISABLE KEYS */;
/*!40000 ALTER TABLE `skill_or_knowledges` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skin_colors`
--

LOCK TABLES `skin_colors` WRITE;
/*!40000 ALTER TABLE `skin_colors` DISABLE KEYS */;
INSERT INTO `skin_colors` VALUES (1,'black','2022-04-18 00:47:18','2022-04-18 00:47:18',NULL);
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `statuses_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Non Ready','R',NULL,NULL,NULL),(2,'Ready','OB',NULL,NULL,NULL),(3,'On Board','NR',NULL,NULL,NULL),(4,'Dismissed','D',NULL,NULL,NULL),(5,'On Vacation','OV',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Efrain Losada','losada24@gmail.com',NULL,'$2y$10$f/H60e7pMkSkTuhZZBOHKept/4nC.cy3Ax1JzHKHGtT9fqpVjso8G',NULL,'2020-10-28 16:36:16','2020-11-12 00:19:12'),(2,'Katiuska Cuba','katiuska28@gmail.com',NULL,'$2y$10$ME5./ZKZq6tBDlSYrNSVTeyb6j6S1NCqvb8bRycpf9/myxStU/9Xm',NULL,'2020-11-09 17:25:00','2020-11-09 17:38:29'),(3,'orlando','orlandojorge42@hotmail.com',NULL,'$2y$10$KWCXKa2OJQ5WHoNXMc5ZEu5v.lrQoA8gPK2IB64kJvdVa0ayN7Dl.',NULL,'2020-11-16 05:04:14','2020-12-08 02:26:24'),(5,'Castell','easy.tg@gmail.com',NULL,'$2y$10$HPlZnmGgcleASpSyL7ad0O1zkOITfIeIkIME4bjhtrLgiri7jt3Im',NULL,'2021-04-02 05:51:49','2021-04-02 05:51:49'),(6,'armando','armbp1972@gmail.com',NULL,'$2y$10$B6XRj5kAdg1zm8yylxibBOWUaU5ZNHPNQC3AX/VNqcI4UaVuU0ne6',NULL,'2022-03-10 20:35:39','2022-03-10 20:35:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vessel_types`
--

DROP TABLE IF EXISTS `vessel_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vessel_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vessel_types`
--

LOCK TABLES `vessel_types` WRITE;
/*!40000 ALTER TABLE `vessel_types` DISABLE KEYS */;
INSERT INTO `vessel_types` VALUES (1,'Pesquero','2022-04-28 21:42:54','2022-04-28 21:42:54',NULL),(2,'Mercante','2022-04-28 21:42:59','2022-04-28 21:42:59',NULL);
/*!40000 ALTER TABLE `vessel_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vessels`
--

DROP TABLE IF EXISTS `vessels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vessels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_tank` int(11) DEFAULT NULL,
  `omi_number` int(11) DEFAULT NULL,
  `active` int(10) unsigned NOT NULL,
  `dwt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vessel_type_id` bigint(20) unsigned NOT NULL,
  `flags_id` int(10) unsigned DEFAULT NULL,
  `sign_on_date` date DEFAULT NULL,
  `sign_off_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `companies_id` bigint(20) unsigned NOT NULL,
  `engine_type_id` int(10) unsigned NOT NULL,
  `engine_power` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vessels_companies_id_foreign` (`companies_id`),
  KEY `vessels_flags_id_foreign` (`flags_id`),
  KEY `vessels_vessel_type_id_foreign` (`vessel_type_id`),
  KEY `vessels_engine_type_id_foreign` (`engine_type_id`),
  CONSTRAINT `vessels_companies_id_foreign` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `vessels_engine_type_id_foreign` FOREIGN KEY (`engine_type_id`) REFERENCES `engine_types` (`id`),
  CONSTRAINT `vessels_flags_id_foreign` FOREIGN KEY (`flags_id`) REFERENCES `flags` (`id`),
  CONSTRAINT `vessels_vessel_type_id_foreign` FOREIGN KEY (`vessel_type_id`) REFERENCES `vessel_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vessels`
--

LOCK TABLES `vessels` WRITE;
/*!40000 ALTER TABLE `vessels` DISABLE KEYS */;
INSERT INTO `vessels` VALUES (1,'Pilar','P',100,100,0,'100',1,1,NULL,NULL,'2022-04-28 21:44:05','2022-04-28 21:44:05',NULL,1,1,100),(2,'Playa Girón','PY',1000,1000,0,'1000',1,1,NULL,NULL,'2022-04-29 00:17:59','2022-04-29 00:17:59',NULL,1,1,1000);
/*!40000 ALTER TABLE `vessels` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visa_types`
--

LOCK TABLES `visa_types` WRITE;
/*!40000 ALTER TABLE `visa_types` DISABLE KEYS */;
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

-- Dump completed on 2022-04-30 14:47:26
