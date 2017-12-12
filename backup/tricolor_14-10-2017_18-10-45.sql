-- MySQL dump 10.13  Distrib 5.7.14, for Win32 (AMD64)
--
-- Host: localhost    Database: tricolor
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'MAESTRO DE OBRA'),(2,'AYUDANTE DE ABAÑIL'),(3,'PINTOR'),(4,'LATONERO');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casa`
--

DROP TABLE IF EXISTS `casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casa` (
  `id_casa` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_casa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casa`
--

LOCK TABLES `casa` WRITE;
/*!40000 ALTER TABLE `casa` DISABLE KEYS */;
INSERT INTO `casa` VALUES (1,9080,'petare. Carpintero'),(2,43233,'23 de enero. EL plan yaju yaju'),(3,323,'rfafasdfas'),(4,232,'asdfasdfasd');
/*!40000 ALTER TABLE `casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casa_trabajo`
--

DROP TABLE IF EXISTS `casa_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casa_trabajo` (
  `id_casa` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  KEY `id_casa` (`id_casa`),
  KEY `id_trabajo` (`id_trabajo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casa_trabajo`
--

LOCK TABLES `casa_trabajo` WRITE;
/*!40000 ALTER TABLE `casa_trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `casa_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (1,'Activo'),(2,'Inactivo'),(3,'Devuelto'),(4,'Prestado'),(5,'No se devuelve'),(6,'Eliminado');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herramienta`
--

DROP TABLE IF EXISTS `herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herramienta` (
  `id_herramienta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_herramienta`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herramienta`
--

LOCK TABLES `herramienta` WRITE;
/*!40000 ALTER TABLE `herramienta` DISABLE KEYS */;
INSERT INTO `herramienta` VALUES (1,'pala',50),(2,'pistola',49),(10,'maquillaje',40),(11,'njnjnjn',45);
/*!40000 ALTER TABLE `herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_recurso` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inventario`),
  UNIQUE KEY `id_recurso` (`id_recurso`),
  KEY `id_trabajador` (`id_recurso`) USING BTREE,
  CONSTRAINT `inventario_ibfk_4` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (28,1,153),(31,6,322),(32,5,122),(39,8,592),(42,10,172),(57,11,4),(80,3,1213),(81,4,22),(147,23,1000),(148,7,35);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_recibida` int(11) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Arena colada',100),(2,'bloques',2000),(3,'qsda',23);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obra`
--

DROP TABLE IF EXISTS `obra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_obra`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obra`
--

LOCK TABLES `obra` WRITE;
/*!40000 ALTER TABLE `obra` DISABLE KEYS */;
INSERT INTO `obra` VALUES (1,'Limpieza plaza');
/*!40000 ALTER TABLE `obra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obra_trabajador`
--

DROP TABLE IF EXISTS `obra_trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obra_trabajador` (
  `id_obra` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  PRIMARY KEY (`id_obra`,`id_trabajador`),
  UNIQUE KEY `id_trabajador` (`id_trabajador`),
  UNIQUE KEY `id_obra` (`id_obra`),
  UNIQUE KEY `id_obra_2` (`id_obra`,`id_trabajador`),
  CONSTRAINT `obra_trabajador_ibfk_1` FOREIGN KEY (`id_obra`) REFERENCES `obra` (`id_obra`),
  CONSTRAINT `obra_trabajador_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obra_trabajador`
--

LOCK TABLES `obra_trabajador` WRITE;
/*!40000 ALTER TABLE `obra_trabajador` DISABLE KEYS */;
INSERT INTO `obra_trabajador` VALUES (1,5);
/*!40000 ALTER TABLE `obra_trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `fecha_salida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_entrada` timestamp NULL DEFAULT NULL,
  `estatus` int(11) DEFAULT '4',
  PRIMARY KEY (`id_prestamo`),
  KEY `id_recurso` (`id_recurso`),
  KEY `id_trabajador` (`id_trabajador`),
  KEY `estatus` (`estatus`),
  CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`),
  CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`),
  CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
INSERT INTO `prestamo` VALUES (1,3,8,2,'2017-01-15 00:53:26',NULL,5),(2,12,8,2,'2017-01-15 00:38:29',NULL,4),(3,5,8,1,'2017-01-15 00:37:13',NULL,5),(4,3,8,21,'2017-01-12 05:55:04','2017-01-15 07:25:23',3),(5,3,10,22,'2017-01-12 05:55:15',NULL,5),(6,5,8,5,'2017-01-15 03:37:35',NULL,4),(7,12,8,1,'2017-01-12 06:47:14',NULL,5),(8,5,10,50,'2017-01-15 01:18:05','2017-01-17 00:26:55',3),(9,12,8,3,'2017-01-15 01:19:15','2017-01-15 07:25:17',3),(10,21,10,1,'2017-01-12 07:18:02',NULL,4),(11,3,8,3,'2017-01-12 16:17:05',NULL,5),(12,3,10,172,'2017-01-16 20:28:57','2017-01-17 00:29:14',3);
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recurso`
--

DROP TABLE IF EXISTS `recurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_recurso` int(11) DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_recurso`),
  KEY `estatus` (`estatus`),
  KEY `id_tipo_recurso` (`id_tipo_recurso`),
  CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`),
  CONSTRAINT `recurso_ibfk_2` FOREIGN KEY (`id_tipo_recurso`) REFERENCES `tipo_recurso` (`id_tipo_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recurso`
--

LOCK TABLES `recurso` WRITE;
/*!40000 ALTER TABLE `recurso` DISABLE KEYS */;
INSERT INTO `recurso` VALUES (1,2,'Arena colada',1),(3,2,'ooooo',1),(4,2,'jdhyasdj',1),(5,2,'jujujaaaa',1),(6,2,'qsda',6),(7,2,'bloques',1),(8,1,'Martillo',1),(10,1,'cuchillo',1),(11,1,'licuadora',1),(19,2,'jijjujiju',1),(21,1,'tyttytytyt',6),(23,1,'Pala',1);
/*!40000 ALTER TABLE `recurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ADMINISTRADOR','2017-01-11 04:36:36',NULL),(2,'REGISTRADOR','2017-01-11 05:11:32',NULL);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_recurso`
--

DROP TABLE IF EXISTS `tipo_recurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_recurso` (
  `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_recurso`
--

LOCK TABLES `tipo_recurso` WRITE;
/*!40000 ALTER TABLE `tipo_recurso` DISABLE KEYS */;
INSERT INTO `tipo_recurso` VALUES (1,'HERRAMIENTA'),(2,'MATERIAL');
/*!40000 ALTER TABLE `tipo_recurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_transaccion`
--

DROP TABLE IF EXISTS `tipo_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_transaccion` (
  `id_tipo_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_transaccion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_transaccion`
--

LOCK TABLES `tipo_transaccion` WRITE;
/*!40000 ALTER TABLE `tipo_transaccion` DISABLE KEYS */;
INSERT INTO `tipo_transaccion` VALUES (1,'ENTRADA'),(2,'SALIDA');
/*!40000 ALTER TABLE `tipo_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `id_trabajador` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(11) NOT NULL,
  `ci` int(13) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) DEFAULT '1',
  PRIMARY KEY (`id_trabajador`),
  UNIQUE KEY `ci` (`ci`),
  KEY `id_cargo` (`id_cargo`),
  KEY `estatus` (`estatus`),
  CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `trabajador_ibfk_2` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (3,1,12341233,'Harley ','Moseguileman','021286','ASJDIFLAJSDIF',1),(5,3,1234123,'Juanito ','Alimaña','234123','ASJDIFLAJSDIF ñññññññ',1),(12,1,12341234,'Paolo','Mula','213242343','ajsidfjlads',6),(21,1,4,'mario bros Górila','Gi','12341234','Urb. la salita',1),(22,1,1234234,'élio','´´Eééááá','11234','ññññññññññ',1),(23,2,23,'ááááá','á´hó´rá','555555','asdf Ã‚Â´{Ã‚Â´{Ã‚Â´Ã‚Â´{Ã‚Â¨ ',1),(33,3,44,'fjdijiij','fjei','3','asdf',1),(34,1,48,'f','f','3','e',1),(35,4,23232323,'Pyuuuuu','drdrdrdrd','23333','huhu',6);
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador_casa`
--

DROP TABLE IF EXISTS `trabajador_casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador_casa` (
  `id_trabajador` int(11) NOT NULL,
  `id_casa` int(11) NOT NULL,
  KEY `id_trabajador` (`id_trabajador`),
  KEY `id_casa` (`id_casa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador_casa`
--

LOCK TABLES `trabajador_casa` WRITE;
/*!40000 ALTER TABLE `trabajador_casa` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajador_casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador_herramienta`
--

DROP TABLE IF EXISTS `trabajador_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador_herramienta` (
  `id_trabajador` int(11) NOT NULL,
  `id_herramienta` int(11) NOT NULL,
  KEY `id_trabajador` (`id_trabajador`),
  KEY `id_herramienta` (`id_herramienta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador_herramienta`
--

LOCK TABLES `trabajador_herramienta` WRITE;
/*!40000 ALTER TABLE `trabajador_herramienta` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajador_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajo` (
  `id_trabajo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_trabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajo`
--

LOCK TABLES `trabajo` WRITE;
/*!40000 ALTER TABLE `trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion_recurso`
--

DROP TABLE IF EXISTS `transaccion_recurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion_recurso` (
  `id_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_recurso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tipo_transaccion` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaccion`),
  KEY `id_recurso` (`id_recurso`),
  KEY `id_tipo_transaccion` (`id_tipo_transaccion`),
  CONSTRAINT `transaccion_recurso_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`),
  CONSTRAINT `transaccion_recurso_ibfk_2` FOREIGN KEY (`id_tipo_transaccion`) REFERENCES `tipo_transaccion` (`id_tipo_transaccion`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion_recurso`
--

LOCK TABLES `transaccion_recurso` WRITE;
/*!40000 ALTER TABLE `transaccion_recurso` DISABLE KEYS */;
INSERT INTO `transaccion_recurso` VALUES (2,1,1,1,233,'2017-01-10 19:30:29'),(4,1,1,1,234,'2017-01-10 19:32:58'),(5,7,1,1,5558,'2017-01-10 19:37:29'),(7,1,1,1,7,'2017-01-10 19:39:34'),(8,1,1,1,451,'2017-01-10 19:42:50'),(9,6,1,1,6,'2017-01-10 19:43:40'),(10,5,1,1,4,'2017-01-10 19:53:09'),(11,5,1,1,559,'2017-01-10 19:54:31'),(12,5,1,1,563,'2017-01-10 19:54:43'),(13,5,1,1,567,'2017-01-10 19:57:54'),(14,5,1,1,571,'2017-01-10 19:58:00'),(15,5,1,1,575,'2017-01-10 19:58:20'),(16,5,1,1,75,'2017-01-10 19:58:47'),(17,8,1,1,5,'2017-01-10 20:08:27'),(18,8,1,1,5,'2017-01-10 20:08:27'),(19,8,1,1,10,'2017-01-10 20:09:28'),(20,10,1,1,55,'2017-01-10 20:10:37'),(21,1,1,2,-49,'2017-01-10 20:24:35'),(22,1,1,2,50,'2017-01-10 20:27:17'),(23,1,1,2,149,'2017-01-10 20:27:45'),(24,1,1,2,-298,'2017-01-10 20:28:13'),(25,10,1,1,1,'2017-01-10 20:34:44'),(26,10,1,1,1,'2017-01-10 20:35:03'),(27,8,1,1,1,'2017-01-10 20:35:14'),(28,5,1,2,4,'2017-01-10 21:53:19'),(29,6,1,2,1,'2017-01-10 21:55:25'),(30,5,1,2,2,'2017-01-10 21:56:11'),(31,5,1,2,4,'2017-01-10 21:57:17'),(32,5,1,2,2,'2017-01-10 21:57:32'),(33,8,1,2,1,'2017-01-10 21:57:54'),(34,11,1,1,10,'2017-01-10 21:58:13'),(35,1,1,1,100,'2017-01-10 22:07:11'),(36,1,1,1,2,'2017-01-10 22:08:52'),(37,8,1,1,3,'2017-01-10 22:09:14'),(38,10,1,1,44,'2017-01-10 22:09:25'),(39,8,1,2,2,'2017-01-10 22:35:17'),(40,8,1,2,2,'2017-01-10 22:55:51'),(41,8,1,2,1,'2017-01-10 22:56:56'),(42,1,1,1,3,'2017-01-10 23:07:38'),(43,1,1,1,3,'2017-01-10 23:09:15'),(44,1,1,1,1,'2017-01-10 23:13:23'),(45,1,1,1,8,'2017-01-10 23:14:55'),(46,5,1,1,2,'2017-01-10 23:15:09'),(47,1,1,1,12,'2017-01-11 15:46:02'),(48,8,1,1,44,'2017-01-11 15:46:27'),(49,5,1,2,70,'2017-01-11 15:47:09'),(50,1,1,1,3,'2017-01-11 15:54:56'),(51,8,1,2,21,'2017-01-12 01:55:04'),(52,10,1,2,22,'2017-01-12 01:55:15'),(53,1,1,2,133,'2017-01-12 02:08:15'),(54,3,1,1,32,'2017-01-12 02:13:31'),(55,4,1,1,12,'2017-01-12 02:13:37'),(56,5,1,1,1,'2017-01-12 02:13:43'),(57,5,1,1,11,'2017-01-12 02:13:49'),(58,5,1,2,1,'2017-01-12 02:23:29'),(59,3,1,2,1,'2017-01-12 02:29:50'),(60,5,1,2,7,'2017-01-12 02:29:58'),(61,3,1,2,33,'2017-01-12 02:34:28'),(62,4,1,2,1,'2017-01-12 02:35:57'),(63,1,1,1,231,'2017-01-12 02:40:40'),(64,5,1,1,1234,'2017-01-12 02:40:50'),(65,5,1,1,1234,'2017-01-12 02:40:56'),(66,8,1,2,5,'2017-01-12 02:46:49'),(67,1,1,2,2,'2017-01-12 02:47:03'),(68,8,1,2,1,'2017-01-12 02:47:14'),(69,5,1,1,1,'2017-01-12 02:51:29'),(70,8,1,1,10,'2017-01-12 02:51:44'),(71,1,1,2,1,'2017-01-12 02:52:02'),(72,10,1,2,50,'2017-01-12 02:52:14'),(73,1,1,2,1,'2017-01-12 02:56:42'),(74,8,1,2,3,'2017-01-12 02:56:59'),(75,10,1,2,1,'2017-01-12 03:18:01'),(76,1,1,2,2,'2017-01-12 03:21:03'),(77,1,1,2,2,'2017-01-12 03:21:07'),(78,1,1,2,1,'2017-01-12 03:22:56'),(79,1,1,2,1,'2017-01-12 03:23:24'),(80,1,1,2,12,'2017-01-12 03:27:09'),(81,1,1,2,2,'2017-01-12 03:27:58'),(82,3,1,1,2121,'2017-01-12 03:29:08'),(83,10,1,1,333,'2017-01-12 03:29:16'),(84,3,1,2,1,'2017-01-12 03:29:25'),(85,3,1,2,2,'2017-01-12 03:30:40'),(86,1,1,2,12,'2017-01-12 03:30:47'),(87,1,1,2,1,'2017-01-12 03:38:18'),(88,1,1,2,1,'2017-01-12 03:38:23'),(89,1,1,2,22,'2017-01-12 03:38:28'),(90,1,1,2,55,'2017-01-12 03:38:35'),(91,1,1,2,152,'2017-01-12 03:38:44'),(92,3,1,2,1,'2017-01-12 03:39:11'),(93,4,1,2,12,'2017-01-12 03:39:18'),(94,3,1,2,1,'2017-01-12 03:40:58'),(95,3,1,2,1,'2017-01-12 04:00:15'),(96,3,1,2,1,'2017-01-12 10:42:27'),(97,5,1,2,67786,'2017-01-12 10:51:55'),(98,3,1,2,22222,'2017-01-12 10:52:23'),(99,1,1,1,12,'2017-01-12 10:54:06'),(100,3,1,1,1,'2017-01-12 10:54:10'),(101,4,1,1,1,'2017-01-12 10:54:16'),(102,4,1,1,1,'2017-01-12 10:54:24'),(103,4,1,1,11,'2017-01-12 10:59:23'),(104,5,1,1,1,'2017-01-12 10:59:32'),(105,5,1,1,1,'2017-01-12 10:59:47'),(106,5,1,1,1,'2017-01-12 10:59:53'),(107,5,1,1,10000,'2017-01-12 11:00:58'),(108,5,1,1,1000,'2017-01-12 11:01:06'),(109,5,1,1,60000,'2017-01-12 11:01:16'),(110,4,1,2,11112,'2017-01-12 11:34:10'),(111,5,1,2,22222,'2017-01-12 11:35:54'),(112,1,1,1,1,'2017-01-12 11:36:28'),(113,1,1,1,1111111111,'2017-01-12 11:36:34'),(114,3,1,1,22222222,'2017-01-12 11:36:44'),(115,5,1,1,22222,'2017-01-12 11:36:52'),(116,6,1,1,122222,'2017-01-12 11:36:57'),(117,1,1,2,3,'2017-01-12 12:06:42'),(118,1,1,2,1,'2017-01-12 12:07:58'),(119,3,1,2,9,'2017-01-12 12:09:06'),(120,8,1,2,3,'2017-01-12 12:17:05'),(121,23,1,1,1000,'2017-01-12 12:26:34'),(122,1,1,1,34,'2017-01-12 12:26:50'),(123,1,1,1,1,'2017-01-12 12:26:58'),(124,10,1,2,172,'2017-01-16 16:28:57'),(125,7,1,1,23,'2017-03-30 13:02:52'),(126,7,1,1,12,'2017-03-30 20:14:19');
/*!40000 ALTER TABLE `transaccion_recurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_trabajador` (`id_trabajador`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `estatus` (`estatus`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,3,2,'admin2','7215ee9c7d9dc229d2921a40e899ec5f','harley@gmail.com',1,'2017-01-11 04:15:58','2017-01-15 03:22:36'),(7,23,1,'a',' ','s@asdf.com',1,'2017-01-11 14:54:51','2017-01-11 20:32:16'),(9,12,1,'1',' ','ds@asdf.com',1,'2017-01-11 15:11:50','2017-01-11 20:31:46'),(11,5,1,'admin','c4ca4238a0b923820dcc509a6f75849b','eas@as.comrr',1,'2017-01-11 15:33:20','2017-01-15 03:22:39');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-14 13:40:52
