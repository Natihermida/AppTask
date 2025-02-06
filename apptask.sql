-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: apptask
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tareas` (
  `tareas_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(105) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `Usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`tareas_id`),
  KEY `fk_idx` (`Usuarios_id`),
  CONSTRAINT `fk` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`Usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (1,'hola','ia a hola','2005-06-25','2006-07-26',NULL,2),(6,'Casa','Ir a casa',NULL,NULL,NULL,2),(7,'Gimnasio','del parque',NULL,NULL,'pendiente',2),(8,'Gimnasio','ayer',NULL,NULL,'finalizado',2),(9,'pepe','corre',NULL,NULL,'en proceso',2),(10,'sdfsdf','sfsfsd','2025-02-01','2025-02-07','finalizado',2),(11,'Correr','En el monte','1977-10-25','0000-00-00','pendiente',2),(17,'sdg','sdsg','2025-02-08','0000-00-00','pendiente',11),(18,'sdfsdg','sdsgs','2025-02-08','0000-00-00','pendiente',11),(19,'Casa','Ir a casa','2025-02-07','0000-00-00','pendiente',11);
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `Usuarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Usuarios_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'prueba','prueba','prueba@gmail.com','1234'),(2,'Pepe','Pérez','pepe@pepe.es','$2y$10$zM.woe8GNuVKIGhaltNY8u57B/L9jBN6kigLeI'),(4,'Juan','González','gonzalez@gonzalez.es','$2y$10$3mFAmQR8KQTnnflVP9uFe.JJFRAYvc1OLyQNP6'),(5,'Maria','García','maria@maria.es','$2y$10$UF.A8eg2F0OK550d.ZLby.LgOdzMI2fpDlZKeq'),(6,'Tomás','Fermoso','fermoso@fermoso.com','$2y$10$LufSrOKC.95uAO4bQzCzFe4tXvTOqcUeXE.Lgg'),(7,'Juan','Troncal','juan@juan.es','$2y$10$miEXnMGJXKpqeJYAwn4dKOPAacOdESGUeBoKnQ'),(8,'toni','toni','toni@toni.es','$2y$10$km9vPbP8HY7xLBvmr98bwOYwWIdu9ppj4afHgD'),(10,'nati','nati','nati@nati.es','$2y$10$/UBaV1imvgEZUQCcqyI/C.Qztdafgsh2QZ//zdOKsrdJ9y4maCzJ2'),(11,'admin','admin','admin@admin.es','$2y$10$caJ23FwmWKV2nYKz5JNjSeZKCsvlSmp3RtuG3GGw0lEjgzqrPasii');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-06 16:06:22
