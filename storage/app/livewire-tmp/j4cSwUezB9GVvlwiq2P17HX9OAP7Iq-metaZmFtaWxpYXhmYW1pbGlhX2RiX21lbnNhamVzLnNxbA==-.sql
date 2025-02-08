-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: nue.domcloud.co    Database: familiaxfamilia_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensajes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `message` text NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vacante_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mensajes_sender_id_foreign` (`sender_id`),
  KEY `mensajes_receiver_id_foreign` (`receiver_id`),
  KEY `mensajes_vacante_id_foreign` (`vacante_id`),
  CONSTRAINT `mensajes_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mensajes_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mensajes_vacante_id_foreign` FOREIGN KEY (`vacante_id`) REFERENCES `vacantes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (1,1,2,'Hola, Merari',NULL,'2024-08-20 21:35:29','2024-08-20 21:35:29',1),(2,2,1,'Hola cosita ',NULL,'2024-08-20 21:36:03','2024-08-20 21:36:03',1),(3,1,2,'Te envio un documento para que lo estudies','vlLnPkKtWdHKfnjBZSV56GnjsQsotpkUmXAcPAmQ.pdf','2024-08-20 21:38:06','2024-08-20 21:38:06',1),(4,2,1,'Hola cosita',NULL,'2024-08-22 23:35:27','2024-08-22 23:35:27',3),(5,2,1,'Hola\n',NULL,'2024-08-22 23:37:23','2024-08-22 23:37:23',3),(6,1,2,'Que tal... Ya se durmio su marido.?',NULL,'2024-08-22 23:37:47','2024-08-22 23:37:47',3),(7,3,1,'Hola ',NULL,'2024-08-28 08:26:43','2024-08-28 08:26:43',4),(8,1,3,'Recibido',NULL,'2024-08-28 08:27:04','2024-08-28 08:27:04',4),(9,1,3,'Adjunto','sO2NWE8UKQ66nuKkvis5acpQehcHnyW40m2bnmgh.pdf','2024-08-28 08:27:53','2024-08-28 08:27:53',4),(10,1,2,'Probando correo electronico que funcione....',NULL,'2024-09-02 12:51:45','2024-09-02 12:51:45',1),(11,1,2,'❤️',NULL,'2024-09-10 23:15:25','2024-09-10 23:15:25',1),(12,1,2,'H',NULL,'2024-09-29 18:07:02','2024-09-29 18:07:02',1),(13,1,6,'Buen dia',NULL,'2024-12-02 12:55:42','2024-12-02 12:55:42',1),(14,6,1,'cuando es el curso?',NULL,'2024-12-02 12:56:17','2024-12-02 12:56:17',1),(15,6,1,'que nivel tienes?',NULL,'2024-12-02 12:59:14','2024-12-02 12:59:14',8),(16,1,6,'Nivel Basico, es para estudio nada mas',NULL,'2024-12-02 12:59:47','2024-12-02 12:59:47',8),(17,1,7,'Hola, Beatriz',NULL,'2024-12-05 10:43:47','2024-12-05 10:43:47',1),(18,1,7,'Bienvenida, al curso.\nPodrías contarme que nivel tienes en Excel.',NULL,'2024-12-05 10:44:30','2024-12-05 10:44:30',1),(19,1,7,'?️',NULL,'2024-12-05 10:44:52','2024-12-05 10:44:52',1);
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-08 19:48:08
