-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: escolar_e
-- ------------------------------------------------------
-- Server version	5.1.60-community

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
-- Current Database: `escolar_e`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `escolar_e` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `escolar_e`;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(45) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `estatus` varchar(1) NOT NULL DEFAULT '1',
  `Personales_id_personales` int(11) NOT NULL,
  `perfil_medico` int(11) DEFAULT NULL,
  `padres` int(11) DEFAULT NULL,
  `economico` int(11) DEFAULT NULL,
  `laboral` int(11) DEFAULT NULL,
  `foto_perfil` varchar(45) DEFAULT 'images/profile.png',
  PRIMARY KEY (`id_alumno`),
  KEY `fk_Alumno_Personales1_idx` (`Personales_id_personales`),
  KEY `fk_estatus_id_idx` (`estatus`),
  KEY `Medico_perfil_medico_idx` (`perfil_medico`),
  KEY `Padres_id_padres_idx` (`padres`),
  KEY `Economico_id_economico_idx` (`economico`),
  KEY `Laboral_id_laboral` (`laboral`),
  CONSTRAINT `Economico_id_economico` FOREIGN KEY (`economico`) REFERENCES `economicos` (`id_economico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Alumno_Personales1` FOREIGN KEY (`Personales_id_personales`) REFERENCES `personales` (`id_personales`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estatus_id` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Laboral_id_laboral` FOREIGN KEY (`laboral`) REFERENCES `laboral` (`id_laboral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Medico_perfil_medico` FOREIGN KEY (`perfil_medico`) REFERENCES `medico` (`id_medico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Padres_id_padres` FOREIGN KEY (`padres`) REFERENCES `padres` (`id_padre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `aula` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'601');
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficios`
--

DROP TABLE IF EXISTS `beneficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficios` (
  `id_beneficio` int(11) NOT NULL AUTO_INCREMENT,
  `beneficio` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_beneficio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficios`
--

LOCK TABLES `beneficios` WRITE;
/*!40000 ALTER TABLE `beneficios` DISABLE KEYS */;
INSERT INTO `beneficios` VALUES (1,'Normal',''),(2,'Beneficio',''),(3,'Beca','');
/*!40000 ALTER TABLE `beneficios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campus` (
  `id_campus` int(11) NOT NULL AUTO_INCREMENT,
  `campus` varchar(45) NOT NULL,
  PRIMARY KEY (`id_campus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campus`
--

LOCK TABLES `campus` WRITE;
/*!40000 ALTER TABLE `campus` DISABLE KEYS */;
INSERT INTO `campus` VALUES (1,'Diamante'),(2,'Chilpancingo'),(3,'Progreso');
/*!40000 ALTER TABLE `campus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciclo`
--

DROP TABLE IF EXISTS `ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciclo` (
  `id_ciclo` varchar(2) NOT NULL,
  `ciclo` varchar(45) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `estatus` varchar(1) NOT NULL DEFAULT '1',
  `alumnos` int(11) NOT NULL DEFAULT '0',
  `fecha_limite` datetime NOT NULL,
  PRIMARY KEY (`id_ciclo`),
  KEY `Estatus_id` (`estatus`),
  CONSTRAINT `Estatus_id` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclo`
--

LOCK TABLES `ciclo` WRITE;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
INSERT INTO `ciclo` VALUES ('13','Ene13-Dic13','2013-01-01 00:00:00','2013-12-31 00:00:00','1',2,'2013-01-31 00:00:00');
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credencial`
--

DROP TABLE IF EXISTS `credencial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credencial` (
  `id_credencial` int(11) NOT NULL AUTO_INCREMENT,
  `credencial` varchar(45) NOT NULL,
  PRIMARY KEY (`id_credencial`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credencial`
--

LOCK TABLES `credencial` WRITE;
/*!40000 ALTER TABLE `credencial` DISABLE KEYS */;
INSERT INTO `credencial` VALUES (1,'Azul'),(2,'Roja');
/*!40000 ALTER TABLE `credencial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `economicos`
--

DROP TABLE IF EXISTS `economicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `economicos` (
  `id_economico` int(11) NOT NULL AUTO_INCREMENT,
  `hermanos` int(11) DEFAULT '0',
  `lugar` int(11) DEFAULT '1',
  `personas_casa` int(11) DEFAULT '0',
  `tipo_casa` varchar(45) DEFAULT NULL,
  `cuartos` int(11) DEFAULT '1',
  PRIMARY KEY (`id_economico`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `economicos`
--

LOCK TABLES `economicos` WRITE;
/*!40000 ALTER TABLE `economicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `economicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterarse`
--

DROP TABLE IF EXISTS `enterarse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterarse` (
  `id_enterarse` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_enterarse`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterarse`
--

LOCK TABLES `enterarse` WRITE;
/*!40000 ALTER TABLE `enterarse` DISABLE KEYS */;
INSERT INTO `enterarse` VALUES (1,'Internet'),(2,'Periodico'),(3,'Amigo'),(4,'Vive cerca');
/*!40000 ALTER TABLE `enterarse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(45) NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'Sistemas Computacionales'),(2,'Administracion'),(3,'Arquitectura'),(4,'Contaduria'),(5,'Comunicacion y Relaciones Publicas'),(6,'Decoracion de Interiores y Paisajismo'),(7,'Derecho'),(8,'Diseño y Comunicacion Grafica'),(9,'Mercadotecnia y Publicidad'),(10,'Psicologia'),(11,'Desarrollo y Admon. de Bienes Raices'),(12,'Gestion y Administracion Turistica'),(13,'Gestion Financiera y de Seguros'),(14,'Negocios Internacionales y Servicios Aduanale'),(15,'Periodismo');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `codigo` int(11) NOT NULL,
  `ISO` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'MX','Aguascalientes'),(2,'MX','Baja California'),(3,'MX','Baja California Sur'),(4,'MX','Coahuila'),(5,'MX','Chihuahua'),(6,'MX','Colima'),(7,'MX','Campeche'),(8,'MX','Chiapas'),(9,'MX','Distrito Federal'),(10,'MX','Durango'),(11,'MX','Guanajuato'),(12,'MX','Guerrero'),(13,'MX','Hidalgo'),(14,'MX','Jalisco'),(15,'MX','Michoacan'),(16,'MX','Morelos'),(17,'MX','Mexico'),(18,'MX','Nayarit'),(19,'MX','Nuevo Leon'),(20,'MX','Oaxaca'),(21,'MX','Puebla'),(22,'MX','Queretaro'),(23,'MX','Quintana Roo'),(24,'MX','Sinaloa'),(25,'MX','San Luis Potosi'),(26,'MX','Sonora'),(27,'MX','Tabasco'),(28,'MX','Tlaxcala'),(29,'MX','Tamaulipas'),(30,'MX','Veracruz'),(31,'MX','Yucatan'),(32,'MX','Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus` (
  `id_estatus` varchar(1) NOT NULL,
  `estatus` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES ('1','Habilitado (a)',''),('2','Bloqueado (a)',''),('3','Pendiente','Inscripcion'),('4','Inscrito (a)','Inscripcion'),('5','Entregado','Requisitos');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(45) NOT NULL,
  `licenciatura` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'Primero',2),(2,'Segundo',2),(3,'Tercero',2),(4,'Cuarto',2),(5,'Quinto',2),(6,'Sexto',2),(7,'Septimo',2),(8,'Octavo',2),(9,'Noveno',2),(10,'1er Semestre',1),(11,'2do Semestre',1),(12,'3ro Semestre',1),(13,'4to Semestre',1),(14,'5to Semestre',1),(15,'6to Semestre',1),(16,'7 Semestre ',1),(17,'8 Semestre',1),(18,'9 Semestre',1),(19,'10 Semestre',1),(20,'11 Semestre',1),(21,'12 Semestre',1);
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grados`
--

DROP TABLE IF EXISTS `grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(2) NOT NULL,
  `grado` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_grado`),
  KEY `id_seccion_idx` (`seccion`),
  KEY `fk_grado_idx` (`grado`),
  CONSTRAINT `fk_grado` FOREIGN KEY (`grado`) REFERENCES `grado` (`id_grado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_seccion` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
INSERT INTO `grados` VALUES (1,'1',1,1),(2,'2',2,1),(3,'3',3,1),(4,'4',4,1),(5,'5',5,1),(6,'6',6,1),(7,'1',1,2),(8,'2',2,2),(9,'3',3,2),(10,'1',1,3),(11,'2',2,3),(12,'3',3,3),(13,'1',1,4),(14,'2',2,4),(15,'3',3,4),(16,'1',10,5),(17,'2',11,5),(18,'3',12,5),(19,'4',13,5),(20,'5',14,5),(21,'6',15,5),(22,'7',16,5),(23,'8',17,5),(24,'9',18,5),(25,'10',19,5),(26,'11',20,5),(27,'12',21,5);
/*!40000 ALTER TABLE `grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `id_grupo` varchar(45) NOT NULL,
  `ciclo` varchar(2) NOT NULL,
  `grado` int(11) NOT NULL,
  `grupo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `Ciclo_id_ciclo_idx` (`ciclo`),
  KEY `Grado_id_grado_idx` (`grado`),
  KEY `Grupos_id_grupos_idx` (`grupo`),
  CONSTRAINT `Ciclo_id_ciclo` FOREIGN KEY (`ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Grado_id_grado` FOREIGN KEY (`grado`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Grupos_id_grupos` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`clave`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES ('13P1A','13',1,'A'),('13P1B','13',1,'B'),('13P1C','13',1,'C');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `clave` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES ('A','A'),('B','B'),('C','C');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_conducta`
--

DROP TABLE IF EXISTS `historial_conducta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_conducta` (
  `id_conducta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `alumno` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_conducta`),
  KEY `fk_alumno_idx` (`alumno`),
  CONSTRAINT `fk_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_conducta`
--

LOCK TABLES `historial_conducta` WRITE;
/*!40000 ALTER TABLE `historial_conducta` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_conducta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` datetime NOT NULL,
  `reinscripcion` varchar(1) NOT NULL DEFAULT '0',
  `activa` int(11) NOT NULL DEFAULT '1',
  `ciclo` varchar(45) NOT NULL,
  `grado` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `estatus` varchar(1) NOT NULL DEFAULT '3',
  `credencial` int(11) NOT NULL DEFAULT '1',
  `beneficio` int(11) DEFAULT '1',
  `campus` int(11) NOT NULL DEFAULT '1',
  `plan_pago` int(11) NOT NULL DEFAULT '1',
  `modalidad` int(11) NOT NULL DEFAULT '1',
  `enterarse` int(11) NOT NULL DEFAULT '1',
  `facturacion_rfc` int(11) NOT NULL DEFAULT '1',
  `email_factura` varchar(45) NOT NULL,
  `especialidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `grado_idx` (`grado`),
  KEY `alumno_idx` (`alumno`),
  KEY `ciclo_idx` (`ciclo`),
  KEY `status_idx` (`estatus`),
  KEY `Campus_id_campus` (`campus`),
  KEY `Mod_id_mod` (`modalidad`),
  KEY `Plan_pago` (`plan_pago`),
  KEY `Cred_id_cred` (`credencial`),
  KEY `Enterarse_id` (`enterarse`),
  KEY `fk_beneficios_id_idx` (`beneficio`),
  KEY `fk_benef_idx` (`beneficio`),
  KEY `especialidad_id` (`especialidad`),
  CONSTRAINT `especialidad_id` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `alumno` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Campus_id_campus` FOREIGN KEY (`campus`) REFERENCES `campus` (`id_campus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ciclo` FOREIGN KEY (`ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Cred_id_cred` FOREIGN KEY (`credencial`) REFERENCES `credencial` (`id_credencial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Enterarse_id` FOREIGN KEY (`enterarse`) REFERENCES `enterarse` (`id_enterarse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_benef` FOREIGN KEY (`beneficio`) REFERENCES `beneficios` (`id_beneficio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grado` FOREIGN KEY (`grado`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Mod_id_mod` FOREIGN KEY (`modalidad`) REFERENCES `modalidad` (`id_modalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Plan_pago` FOREIGN KEY (`plan_pago`) REFERENCES `plan_pago` (`id_plan_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `status` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripcion`
--

LOCK TABLES `inscripcion` WRITE;
/*!40000 ALTER TABLE `inscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboral`
--

DROP TABLE IF EXISTS `laboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboral` (
  `id_laboral` int(11) NOT NULL AUTO_INCREMENT,
  `trabaja` int(11) DEFAULT '1',
  `empresa` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_laboral`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboral`
--

LOCK TABLES `laboral` WRITE;
/*!40000 ALTER TABLE `laboral` DISABLE KEYS */;
/*!40000 ALTER TABLE `laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(45) NOT NULL,
  `grado` int(11) NOT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `fk_grado_idx` (`grado`),
  CONSTRAINT `fk_grados_id` FOREIGN KEY (`grado`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (1,'Matematicas I',1);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `peso` varchar(45) DEFAULT NULL,
  `estatura` varchar(45) DEFAULT NULL,
  `tipo_sangre` varchar(45) DEFAULT NULL,
  `alergia` int(11) DEFAULT '0',
  `discapacidad` int(11) DEFAULT '0',
  `parto` int(11) DEFAULT '1',
  `padecimiento` int(11) DEFAULT '0',
  `des_alergia` varchar(120) DEFAULT NULL,
  `des_discapacidad` varchar(120) DEFAULT NULL,
  `des_parto` varchar(120) DEFAULT NULL,
  `des_padecimiento` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalidad`
--

DROP TABLE IF EXISTS `modalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalidad` (
  `id_modalidad` int(11) NOT NULL AUTO_INCREMENT,
  `modalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`id_modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalidad`
--

LOCK TABLES `modalidad` WRITE;
/*!40000 ALTER TABLE `modalidad` DISABLE KEYS */;
INSERT INTO `modalidad` VALUES (1,'Escolarizado'),(2,'Semi Escolarizado'),(3,'Abierto'),(4,'Virtual');
/*!40000 ALTER TABLE `modalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padres`
--

DROP TABLE IF EXISTS `padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padres` (
  `id_padre` int(11) NOT NULL AUTO_INCREMENT,
  `padre` varchar(45) DEFAULT NULL,
  `madre` varchar(45) DEFAULT NULL,
  `parentesco_padre` varchar(45) DEFAULT NULL,
  `parentesco_madre` varchar(45) DEFAULT NULL,
  `dir_padre` varchar(45) DEFAULT NULL,
  `dir_madre` varchar(45) DEFAULT NULL,
  `tel_padre` varchar(45) DEFAULT NULL,
  `tel_madre` varchar(45) DEFAULT NULL,
  `cel_padre` varchar(45) DEFAULT NULL,
  `cel_madre` varchar(45) DEFAULT NULL,
  `email_padre` varchar(45) DEFAULT NULL,
  `email_madre` varchar(45) DEFAULT NULL,
  `esc_padre` varchar(45) DEFAULT NULL,
  `esc_madre` varchar(45) DEFAULT NULL,
  `ocu_padre` varchar(45) DEFAULT NULL,
  `ocu_madre` varchar(45) DEFAULT NULL,
  `emp_padre` varchar(45) DEFAULT NULL,
  `emp_madre` varchar(45) DEFAULT NULL,
  `tel_emp_padre` varchar(45) DEFAULT NULL,
  `tel_emp_madre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_padre`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
/*!40000 ALTER TABLE `padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personales`
--

DROP TABLE IF EXISTS `personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personales` (
  `id_personales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido_pat` varchar(45) NOT NULL,
  `apellido_mat` varchar(45) NOT NULL,
  `lugar_nac` varchar(45) NOT NULL,
  `fecha_nac` datetime NOT NULL,
  `edad` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL DEFAULT 'H',
  `direccion` varchar(45) NOT NULL,
  `colonia` varchar(45) NOT NULL,
  `cp` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '12',
  `nacionalidad` varchar(45) NOT NULL DEFAULT 'Mexicano (a)',
  `telefono` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_personales`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personales`
--

LOCK TABLES `personales` WRITE;
/*!40000 ALTER TABLE `personales` DISABLE KEYS */;
/*!40000 ALTER TABLE `personales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_pago`
--

DROP TABLE IF EXISTS `plan_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_pago` (
  `id_plan_pago` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plan_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_pago`
--

LOCK TABLES `plan_pago` WRITE;
/*!40000 ALTER TABLE `plan_pago` DISABLE KEYS */;
INSERT INTO `plan_pago` VALUES (1,'10 meses'),(2,'12 meses');
/*!40000 ALTER TABLE `plan_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL DEFAULT 'H',
  `fecha_nac` datetime NOT NULL,
  `edad` varchar(45) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `foto_perfil` varchar(45) DEFAULT 'images/profile.png',
  `estatus` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_profesor`),
  KEY `Estatus_id_estatus_idx` (`estatus`),
  CONSTRAINT `Estatus_id_estatus` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitos`
--

DROP TABLE IF EXISTS `requisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitos` (
  `id_requisito` int(11) NOT NULL AUTO_INCREMENT,
  `requisito` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_requisito`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitos`
--

LOCK TABLES `requisitos` WRITE;
/*!40000 ALTER TABLE `requisitos` DISABLE KEYS */;
INSERT INTO `requisitos` VALUES (1,'Acta de Nacimiento','Actualizada'),(2,'Curp','Ampliada 200%'),(3,'Certificado Primaria',''),(4,'Certificado Secundaria',''),(5,'Certificado de Preparatoria',''),(6,'Cartilla de Vacunacion',''),(7,'Comprobante de Domicilio',''),(8,'Fotografias t. Infantil','6'),(9,'Carta Buena Conducta',''),(10,'Certificado Medico','Reciente'),(11,'Credencial de Elector','Copia'),(12,'Constancia de Trabajo','Cuando aplique'),(13,'Pago de Inscripcion','');
/*!40000 ALTER TABLE `requisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitos_inscripcion`
--

DROP TABLE IF EXISTS `requisitos_inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitos_inscripcion` (
  `id_ri` int(11) NOT NULL AUTO_INCREMENT,
  `requisito` int(11) NOT NULL,
  `inscripcion` int(11) NOT NULL,
  `estatus` varchar(1) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id_ri`),
  KEY `fk_requisito_idx` (`requisito`),
  KEY `fk_inscripcion_idx` (`inscripcion`),
  KEY `fk_status_idx` (`estatus`),
  CONSTRAINT `fk_inscripcion` FOREIGN KEY (`inscripcion`) REFERENCES `inscripcion` (`id_inscripcion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ri_status` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rs` FOREIGN KEY (`requisito`) REFERENCES `requisitos_seccion` (`id_rs`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitos_inscripcion`
--

LOCK TABLES `requisitos_inscripcion` WRITE;
/*!40000 ALTER TABLE `requisitos_inscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisitos_inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitos_seccion`
--

DROP TABLE IF EXISTS `requisitos_seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitos_seccion` (
  `id_rs` int(11) NOT NULL,
  `requisito` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `estatus` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rs`),
  KEY `fk_seccion_idx` (`seccion`),
  KEY `fk_requisito_idx` (`requisito`),
  KEY `fk_estatus_idx` (`estatus`),
  CONSTRAINT `fk_estatus` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisito` FOREIGN KEY (`requisito`) REFERENCES `requisitos` (`id_requisito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seccion` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitos_seccion`
--

LOCK TABLES `requisitos_seccion` WRITE;
/*!40000 ALTER TABLE `requisitos_seccion` DISABLE KEYS */;
INSERT INTO `requisitos_seccion` VALUES (11,1,1,'1'),(12,1,2,'1'),(13,1,3,'1'),(14,1,4,'1'),(15,1,5,'1'),(21,2,1,'1'),(22,2,2,'1'),(23,2,3,'1'),(24,2,4,'1'),(25,2,5,'1'),(32,3,2,'1'),(43,4,3,'1'),(45,4,5,'1'),(55,5,5,'1'),(61,6,1,'1'),(62,6,2,'1'),(64,6,4,'1'),(72,7,2,'1'),(73,7,3,'1'),(74,7,4,'1'),(75,7,5,'1'),(81,8,1,'1'),(82,8,2,'1'),(83,8,3,'1'),(84,8,4,'1'),(85,8,5,'1'),(92,9,2,'1'),(93,9,3,'1'),(103,10,3,'1'),(105,10,5,'1'),(113,11,3,'1'),(115,11,5,'1'),(121,7,1,'1'),(123,12,3,'1'),(125,12,5,'1'),(131,13,1,'1'),(132,13,2,'1'),(133,13,3,'1'),(134,13,4,'1'),(135,13,5,'1');
/*!40000 ALTER TABLE `requisitos_seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'Primaria','P'),(2,'Secundaria','S'),(3,'Preparatoria','B'),(4,'Kinder','K'),(5,'Licenciatura','L');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-29 23:32:22
