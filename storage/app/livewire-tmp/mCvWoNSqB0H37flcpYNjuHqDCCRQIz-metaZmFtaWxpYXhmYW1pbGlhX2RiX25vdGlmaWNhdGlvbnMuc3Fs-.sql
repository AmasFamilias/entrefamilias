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
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('0b2595f8-9b35-435e-a2fe-bb18a521bb8c','App\\Notifications\\NuevoMensaje','App\\Models\\User',2,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Probando correo electronico que funcione....\",\"sender_id\":1,\"receiver_id\":2,\"sender_name\":\"Sergio I. Oviedo\"}','2024-10-15 09:37:36','2024-09-02 12:51:47','2024-10-15 09:37:36'),('17c05952-ba82-4e96-be9e-58065e7b3502','App\\Notifications\\NuevoCandidato','App\\Models\\User',1,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"usuario_id\":7}','2024-12-05 10:43:28','2024-12-03 21:15:33','2024-12-05 10:43:28'),('190adb7b-e991-4853-880e-674478fd03a6','App\\Notifications\\NuevoMensaje','App\\Models\\User',2,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"\\u2764\\ufe0f\",\"sender_id\":1,\"receiver_id\":2,\"sender_name\":\"Sergio I. Oviedo\"}','2024-10-15 09:37:36','2024-09-10 23:15:26','2024-10-15 09:37:36'),('1af9aa45-eea0-461c-b59c-437551625752','App\\Notifications\\NuevoMensaje','App\\Models\\User',3,'{\"id_vacante\":4,\"nombre_vacante\":\"Pr\\u00e1cticas Gesti\\u00f3n de Proyectos Sociales\",\"mensaje\":\"Recibido\",\"sender_id\":1,\"receiver_id\":3,\"sender_name\":\"Sergio I. Oviedo\"}','2024-08-28 08:27:09','2024-08-28 08:27:05','2024-08-28 08:27:09'),('20e96cca-cd65-44a2-8cd7-4d394365bba2','App\\Notifications\\NuevoMensaje','App\\Models\\User',1,'{\"id_vacante\":3,\"nombre_vacante\":\"Taller primeros auxilios \",\"mensaje\":\"Hola\\n\",\"sender_id\":2,\"receiver_id\":1,\"sender_name\":\"Merari Sarah\\u00ed Castr\\u00f3 Rapalo\"}','2024-08-22 23:37:30','2024-08-22 23:37:24','2024-08-22 23:37:30'),('389d8755-5ad1-4c31-8fbb-6392b5f3ae48','App\\Notifications\\NuevoMensaje','App\\Models\\User',1,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"cuando es el curso?\",\"sender_id\":6,\"receiver_id\":1,\"sender_name\":\"javier\"}','2024-12-02 12:57:16','2024-12-02 12:56:19','2024-12-02 12:57:16'),('49d929a1-9a71-41e4-9780-61bcd38e6e8a','App\\Notifications\\NuevoMensaje','App\\Models\\User',2,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Te envio un documento para que lo estudies\",\"sender_id\":1,\"receiver_id\":2,\"sender_name\":\"Sergio I. Oviedo\"}','2024-08-20 21:40:37','2024-08-20 21:38:06','2024-08-20 21:40:37'),('5533787b-1e2d-4808-86ac-5275c7318741','App\\Notifications\\NuevoMensaje','App\\Models\\User',2,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"H\",\"sender_id\":1,\"receiver_id\":2,\"sender_name\":\"Sergio I. Oviedo\"}','2024-10-15 09:37:36','2024-09-29 18:07:04','2024-10-15 09:37:36'),('603535f4-1e46-4586-a0cb-971af5e0a1da','App\\Notifications\\NuevoMensaje','App\\Models\\User',7,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Hola, Beatriz\",\"sender_id\":1,\"receiver_id\":7,\"sender_name\":\"Sergio Oviedo\"}',NULL,'2024-12-05 10:43:49','2024-12-05 10:43:49'),('6cc35d36-ef8c-41e5-92bc-f5fe7ff81408','App\\Notifications\\NuevoMensaje','App\\Models\\User',1,'{\"id_vacante\":3,\"nombre_vacante\":\"Taller primeros auxilios \",\"mensaje\":\"Hola cosita\",\"sender_id\":2,\"receiver_id\":1,\"sender_name\":\"Merari Sarah\\u00ed Castr\\u00f3 Rapalo\"}','2024-08-22 23:35:33','2024-08-22 23:35:28','2024-08-22 23:35:33'),('750bfe84-a89d-47e2-bdb6-9992918f2a09','App\\Notifications\\NuevoMensaje','App\\Models\\User',2,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Hola, Merari\",\"sender_id\":1,\"receiver_id\":2,\"sender_name\":\"Sergio I. Oviedo\"}','2024-08-20 21:35:40','2024-08-20 21:35:29','2024-08-20 21:35:40'),('7836defe-462f-46f3-94ec-2d89d31383a6','App\\Notifications\\NuevoMensaje','App\\Models\\User',1,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Hola cosita \",\"sender_id\":2,\"receiver_id\":1,\"sender_name\":\"Merari Sarah\\u00ed Castr\\u00f3 Rapalo\"}','2024-08-20 21:36:12','2024-08-20 21:36:03','2024-08-20 21:36:12'),('798a5a67-015c-4aa6-8312-734ed4d39645','App\\Notifications\\NuevoMensaje','App\\Models\\User',7,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"\\ud83d\\udcbb\\ufe0f\",\"sender_id\":1,\"receiver_id\":7,\"sender_name\":\"Sergio Oviedo\"}',NULL,'2024-12-05 10:44:52','2024-12-05 10:44:52'),('7fefba8b-2960-4b47-9f16-046539ae2078','App\\Notifications\\NuevoCandidato','App\\Models\\User',1,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"usuario_id\":2}','2024-08-20 21:35:14','2024-08-20 21:34:44','2024-08-20 21:35:14'),('ace82d22-3f6e-417c-9006-6260494689c4','App\\Notifications\\NuevoMensaje','App\\Models\\User',2,'{\"id_vacante\":3,\"nombre_vacante\":\"Taller primeros auxilios \",\"mensaje\":\"Que tal... Ya se durmio su marido.?\",\"sender_id\":1,\"receiver_id\":2,\"sender_name\":\"Sergio I. Oviedo\"}','2024-08-22 23:39:48','2024-08-22 23:37:48','2024-08-22 23:39:48'),('ae216a96-dd59-4700-956d-11607f70aea6','App\\Notifications\\NuevoCandidato','App\\Models\\User',6,'{\"id_vacante\":8,\"nombre_vacante\":\"Curso de Penpot\",\"usuario_id\":1}','2024-12-02 12:58:45','2024-12-02 12:58:29','2024-12-02 12:58:45'),('bcfbfbb6-e989-4e8f-b450-5316922c23c8','App\\Notifications\\NuevoCandidato','App\\Models\\User',1,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"usuario_id\":6}','2024-12-02 12:54:54','2024-12-02 12:19:34','2024-12-02 12:54:54'),('d58ac2d0-5be4-4867-af97-b24a4cf9087f','App\\Notifications\\NuevoMensaje','App\\Models\\User',6,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Buen dia\",\"sender_id\":1,\"receiver_id\":6,\"sender_name\":\"Sergio Oviedo\"}','2024-12-02 12:56:00','2024-12-02 12:55:43','2024-12-02 12:56:00'),('d74a4b22-9739-4068-999c-1519152750c8','App\\Notifications\\NuevoMensaje','App\\Models\\User',7,'{\"id_vacante\":1,\"nombre_vacante\":\"Curso Basico de Excel\",\"mensaje\":\"Bienvenida, al curso.\\nPodr\\u00edas contarme que nivel tienes en Excel.\",\"sender_id\":1,\"receiver_id\":7,\"sender_name\":\"Sergio Oviedo\"}',NULL,'2024-12-05 10:44:31','2024-12-05 10:44:31'),('da60f759-c154-48b0-8ef2-14ef3588210c','App\\Notifications\\NuevoMensaje','App\\Models\\User',6,'{\"id_vacante\":8,\"nombre_vacante\":\"Curso de Penpot\",\"mensaje\":\"Nivel Basico, es para estudio nada mas\",\"sender_id\":1,\"receiver_id\":6,\"sender_name\":\"Sergio Oviedo\"}','2024-12-03 16:29:48','2024-12-02 12:59:49','2024-12-03 16:29:48'),('daaaa256-d66f-4dc9-bb56-88601ade141d','App\\Notifications\\NuevoMensaje','App\\Models\\User',1,'{\"id_vacante\":4,\"nombre_vacante\":\"Pr\\u00e1cticas Gesti\\u00f3n de Proyectos Sociales\",\"mensaje\":\"Hola \",\"sender_id\":3,\"receiver_id\":1,\"sender_name\":\"\\u00c1lvaro\"}','2024-08-28 08:26:53','2024-08-28 08:26:43','2024-08-28 08:26:53'),('ebf78d5a-7ec4-42e3-a011-7c81c2ae79d5','App\\Notifications\\NuevoMensaje','App\\Models\\User',3,'{\"id_vacante\":4,\"nombre_vacante\":\"Pr\\u00e1cticas Gesti\\u00f3n de Proyectos Sociales\",\"mensaje\":\"Adjunto\",\"sender_id\":1,\"receiver_id\":3,\"sender_name\":\"Sergio I. Oviedo\"}','2024-08-28 08:28:17','2024-08-28 08:27:53','2024-08-28 08:28:17'),('ee02d122-e5a8-42ce-8d2f-5674adb6f36c','App\\Notifications\\NuevoCandidato','App\\Models\\User',2,'{\"id_vacante\":3,\"nombre_vacante\":\"Taller primeros auxilios \",\"usuario_id\":1}','2024-08-22 23:34:24','2024-08-21 08:01:55','2024-08-22 23:34:24'),('f2a3bd5e-3b1a-4ce8-b538-c66acab266e9','App\\Notifications\\NuevoMensaje','App\\Models\\User',1,'{\"id_vacante\":8,\"nombre_vacante\":\"Curso de Penpot\",\"mensaje\":\"que nivel tienes?\",\"sender_id\":6,\"receiver_id\":1,\"sender_name\":\"javier\"}','2024-12-02 12:59:21','2024-12-02 12:59:15','2024-12-02 12:59:21'),('f7c3bdc2-8d7c-4eef-8b8a-71c2ee3901d9','App\\Notifications\\NuevoCandidato','App\\Models\\User',3,'{\"id_vacante\":4,\"nombre_vacante\":\"Pr\\u00e1cticas Gesti\\u00f3n de Proyectos Sociales\",\"usuario_id\":1}','2024-08-28 08:26:30','2024-08-28 08:25:45','2024-08-28 08:26:30');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-08 19:48:07
