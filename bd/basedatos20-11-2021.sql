CREATE DATABASE  IF NOT EXISTS `bdappwebunasam` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdappwebunasam`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdappwebunasam
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `accesobasedatos`
--

DROP TABLE IF EXISTS `accesobasedatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accesobasedatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` varchar(2500) DEFAULT NULL,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_accesobasedatos_facultads1_idx` (`facultad_id`),
  KEY `fk_accesobasedatos_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_accesobasedatos_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_accesobasedatos_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesobasedatos`
--

LOCK TABLES `accesobasedatos` WRITE;
/*!40000 ALTER TABLE `accesobasedatos` DISABLE KEYS */;
/*!40000 ALTER TABLE `accesobasedatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `antiplagios`
--

DROP TABLE IF EXISTS `antiplagios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `antiplagios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` varchar(2500) DEFAULT NULL,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_antiplagios_facultads1_idx` (`facultad_id`),
  KEY `fk_antiplagios_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_antiplagios_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_antiplagios_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antiplagios`
--

LOCK TABLES `antiplagios` WRITE;
/*!40000 ALTER TABLE `antiplagios` DISABLE KEYS */;
/*!40000 ALTER TABLE `antiplagios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `posision` int DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL COMMENT 'nivel 1 -> corresponde a facultad\nnivel 2 -> corresponde a programas de estudios',
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_baners_facultads1_idx` (`facultad_id`),
  KEY `fk_baners_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_baners_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_baners_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,1,'nombre 3','banner_fec07-10-2021-14-22-37.jpeg',1,1,'2021-10-07 18:43:38','2021-10-07 19:23:04',1,1,1,NULL),(2,1,'','banner_fec19-11-2021-22-10-40.jpg',1,0,'2021-10-07 18:58:10','2021-11-20 03:10:44',1,1,1,NULL),(3,3,'asdasd','banner_fec19-11-2021-21-49-19.png',1,1,'2021-10-07 19:08:00','2021-11-20 02:50:19',1,1,1,NULL),(4,1,'Banner 1','banner_fec20-10-2021-20-02-39.jpg',1,0,'2021-10-21 00:56:48','2021-10-21 01:04:13',0,1,NULL,NULL),(5,2,'Banner 2','banner_fec-20-10-2021-20-04-02.jpg',1,1,'2021-10-21 01:04:02','2021-10-21 01:04:39',0,1,NULL,NULL),(6,2,'Banner 2','banner_fec-20-10-2021-20-04-55.jpg',1,0,'2021-10-21 01:04:56','2021-10-21 01:04:56',0,1,NULL,NULL),(7,3,'banner prueba','banner_fec-20-10-2021-20-24-02.jpg',1,1,'2021-10-21 01:24:04','2021-10-23 02:54:27',0,1,NULL,NULL),(8,2,'','banner_fec19-11-2021-22-10-55.jpg',1,0,'2021-11-20 02:50:29','2021-11-20 03:10:55',1,1,1,NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campoocupacionals`
--

DROP TABLE IF EXISTS `campoocupacionals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campoocupacionals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> ingreso\n2 -> egreso',
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfiles_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_perfiles_programaestudios100` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campoocupacionals`
--

LOCK TABLES `campoocupacionals` WRITE;
/*!40000 ALTER TABLE `campoocupacionals` DISABLE KEYS */;
/*!40000 ALTER TABLE `campoocupacionals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competencias`
--

DROP TABLE IF EXISTS `competencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competencias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> ingreso\n2 -> egreso',
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfiles_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_perfiles_programaestudios10` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competencias`
--

LOCK TABLES `competencias` WRITE;
/*!40000 ALTER TABLE `competencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `competencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunicados`
--

DROP TABLE IF EXISTS `comunicados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comunicados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `desarrollo` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comunicados_programaestudios1_idx` (`programaestudio_id`),
  KEY `fk_comunicados_facultads1_idx` (`facultad_id`),
  CONSTRAINT `fk_comunicados_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_comunicados_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunicados`
--

LOCK TABLES `comunicados` WRITE;
/*!40000 ALTER TABLE `comunicados` DISABLE KEYS */;
INSERT INTO `comunicados` VALUES (1,'2021-10-12','10:15:00','¡Triunfo celeste! Cristal derrotó 4-3 a Binacional en la Liga 1','<p>El &lsquo;Poderoso del Sur&rsquo; sorprendi&oacute; a los 29&prime;, cuando Fajardo ocasion&oacute; un autogol celeste. El defensa remat&oacute; de cabeza y la pelota choc&oacute; en el defensa Gonz&aacute;les antes de entrar al arco de Cristal. Sin Horacio Calcaterra, al equipo de Mosquera le cost&oacute; encontrar el empate, pero en el segundo tiempo sali&oacute; con todo y remont&oacute; r&aacute;pidamente.</p>\n\n<p>Loyola marc&oacute; el empate a los 56&prime; y, dos minutos m&aacute;s tarde, Percy Liza anot&oacute; un golazo de &lsquo;palomita&rsquo; tras un buen pase de &Aacute;vila. El &lsquo;Cholito&rsquo;, quien jug&oacute; un partidazo esta tarde, volvi&oacute; a dar una asistencia a los 64&prime; para la anotaci&oacute;n de Castillo. El partido parec&iacute;a resuelto, pero Binacional no baj&oacute; los brazos.</p>\n\n<p>El &lsquo;Poderoso del Sur&rsquo; acort&oacute; distancias a los 78&prime; con un gol del colombiano Arango. Luego, el &aacute;rbitro cobr&oacute; penal para Binacional; sin embargo, el ecuatoriano De Jes&uacute;s fall&oacute; el disparo desde los doce pasos. &Aacute;vila cerr&oacute; una tarde perfecta a los 85&prime; marcando el cuarto gol r&iacute;mense. Cerca del pitazo final, Ojeda se encarg&oacute; de anotar el &uacute;ltimo tanto en el Estadio Monumental.</p>\n\n<p>Con este resultado, los &ldquo;rimenses&rdquo; llegan a las 27 unidades en la Fase 2 y, de perder Alianza Lima todos sus partidos restantes, tendr&iacute;an que sumar los 9 puntos que le queda disputar. Por su parte, el Binacional pelea por no descender ya que solamente tiene 24 puntos en la tabla general.</p>',1,1,1,'2021-10-10 23:27:06','2021-10-10 23:27:42',NULL,1,1,1),(2,'2021-10-09','15:13:00','¡Triunfo celeste! Cristal derrotó 4-3 a Binacional en la Liga 1','<p>El &lsquo;Poderoso del Sur&rsquo; sorprendi&oacute; a los 29&prime;, cuando Fajardo ocasion&oacute; un autogol celeste. El defensa remat&oacute; de cabeza y la pelota choc&oacute; en el defensa Gonz&aacute;les antes de entrar al arco de Cristal. Sin Horacio Calcaterra, al equipo de Mosquera le cost&oacute; encontrar el empate, pero en el segundo tiempo sali&oacute; con todo y remont&oacute; r&aacute;pidamente.</p>\n\n<p>Loyola marc&oacute; el empate a los 56&prime; y, dos minutos m&aacute;s tarde, Percy Liza anot&oacute; un golazo de &lsquo;palomita&rsquo; tras un buen pase de &Aacute;vila. El &lsquo;Cholito&rsquo;, quien jug&oacute; un partidazo esta tarde, volvi&oacute; a dar una asistencia a los 64&prime; para la anotaci&oacute;n de Castillo. El partido parec&iacute;a resuelto, pero Binacional no baj&oacute; los brazos.</p>\n\n<p>El &lsquo;Poderoso del Sur&rsquo; acort&oacute; distancias a los 78&prime; con un gol del colombiano Arango. Luego, el &aacute;rbitro cobr&oacute; penal para Binacional; sin embargo, el ecuatoriano De Jes&uacute;s fall&oacute; el disparo desde los doce pasos. &Aacute;vila cerr&oacute; una tarde perfecta a los 85&prime; marcando el cuarto gol r&iacute;mense. Cerca del pitazo final, Ojeda se encarg&oacute; de anotar el &uacute;ltimo tanto en el Estadio Monumental.</p>\n\n<p>Con este resultado, los &ldquo;rimenses&rdquo; llegan a las 27 unidades en la Fase 2 y, de perder Alianza Lima todos sus partidos restantes, tendr&iacute;an que sumar los 9 puntos que le queda disputar. Por su parte, el Binacional pelea por no descender ya que solamente tiene 24 puntos en la tabla general.</p>',1,1,1,'2021-10-10 23:28:38','2021-10-10 23:28:38',NULL,1,1,0),(3,'2021-09-29','22:22:00','UNASAM gana otro fondo concursable del PMESUT en Investigación','<p style=\"text-align:justify\"><strong>El programa financiar&aacute; el mejoramiento y Fortalecimiento de las capacidades para la gesti&oacute;n de la investigaci&oacute;n e Innovaci&oacute;n</strong></p>\n\n<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam) figura entre un selecto grupo de catorce universidades p&uacute;blicas del pa&iacute;s que han resultado ganadoras del Fondo Concursable: &ldquo;Mejora de la gesti&oacute;n de la investigaci&oacute;n, desarrollo e innovaci&oacute;n en universidades p&uacute;blicas&rdquo;, que impulsa el Programa para la Mejora de la Calidad y Pertinencia de los Servicios de Educaci&oacute;n Superior Universitaria y Tecnol&oacute;gica (PMESUT).<br />\n<br />\nConforme a la decisi&oacute;n del Comit&eacute; Ejecutivo del PMESUT, entidad adscrita al Ministerio de Educaci&oacute;n (MINEDU), la Unasam se ubica en el Grupo B destacando junto a la Universidad Tecnol&oacute;gica de Lima Sur, Nacional de Ucayali, Aut&oacute;noma Altoandina de Jun&iacute;n, Intercultural de la Amazon&iacute;a (Ucayali), Nacional del Callao, Nacional de Ja&eacute;n, y la Nacional Agraria de la Selva (Hu&aacute;nuco).<br />\n<br />\nEl fondo consiste en el financiamiento de mejoramiento y fortalecimiento de las capacidades para la gesti&oacute;n de la investigaci&oacute;n e innovaci&oacute;n, incorporaci&oacute;n de equipos de gestores altamente especializados, as&iacute; como el dise&ntilde;o y/o mejora e implementaci&oacute;n de agendas, planes y/o proyectos e impulso de la vinculaci&oacute;n universidad-empresa.<br />\n<br />\nPara participar en este concurso la Unasam cumpli&oacute; con una serie de requisitos como el licenciamiento institucional vigente, herramientas e instrumentos de gesti&oacute;n investigativa implementadas, equipo t&eacute;cnico responsable debidamente identificado, l&iacute;neas de investigaci&oacute;n definidas, entre otros requerimientos exigidos por el programa.<br />\n<br />\nAnte este importante logro, la m&aacute;xima autoridad santiaguina, Dr. Carlos Reyes Pareja, felicit&oacute; al equipo t&eacute;cnico acreditado ante el PMSUT, cuya coordinaci&oacute;n est&aacute; a cargo de la vicerrectora de Investigaci&oacute;n Dra. Consuelo Teresa Valencia Vera e integrado por el Dr. Jos&eacute; Yovera Saldarriaga, Dra. Karina Vilca Mallqui, Dr. Percy Olivera Gonzales y el Dr. Elmer Robles Bl&aacute;cido, quienes desarrollar&aacute;n una labor encomiable en la ejecuci&oacute;n del fondo.<br />\n<br />\nTodo lo se&ntilde;alado permitir&aacute; que esta casa superior de estudio potencie el dise&ntilde;o de los distintos proyectos acad&eacute;mico-cient&iacute;ficos para que sus estudiantes cuenten con una formaci&oacute;n de calidad, de acuerdo a los niveles y est&aacute;ndares que exige el mundo moderno.</p>',1,0,1,'2021-10-23 20:48:24','2021-10-23 20:48:24',NULL,NULL,1,0),(4,'2021-09-30','03:30:00','Jornada Académica - Científico del Bicentenario','<p style=\"text-align:justify\">Al conmemorarse el D&iacute;a del Estudiante Universitario, la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s de la Direcci&oacute;n del Instituto de Investigaci&oacute;n (DII)<br />\ninvita a la comunidad estudiantil a participar de la ',1,0,1,'2021-10-23 20:50:04','2021-10-23 20:50:04',NULL,NULL,1,0),(5,'2021-09-30','13:15:00','UNASAM, primera Universidad en Ancash en iniciar vacunación contra el COVID 19','<p style=\"text-align:justify\">Desde tempranas horas de este jueves 30 de septiembre, la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), inici&oacute; la campa&ntilde;a de vacunaci&oacute;n contra el covid-19 dirigido a sus estudiantes de 20 a&ntilde;os a m&aacute;s, personal administrativo y docente, con la finalidad poner en salvaguardar la salud y prevenir el contagio de la comunidad universitaria.<br />\n<br />\nDicha jornada se realiza en la ciudad universitaria de Shancay&aacute;n, en coordinaci&oacute;n con la Red de Salud Huaylas Sur. Asimismo, el personal de salud suministra la primera y segunda dosis de la vacuna y el personal de Bienestar Universitario de la Unasam realiza la orientaci&oacute;n en prevenci&oacute;n y medidas de bioseguridad.<br />\n<br />\nEn tanto, el rector santiaguino, Dr. Carlos Reyes Pareja, arrib&oacute; a este punto vacunatorio donde verific&oacute; la asistencia ordenada y responsable de los estudiantes a quienes, adem&aacute;s, reiter&oacute; la invitaci&oacute;n a que acudan portando solo el Documento Nacional de Identidad (DNI) y su tarjeta de vacunaci&oacute;n para los que requieran la segunda dosis.<br />\n<br />\nDel mismo modo, agradeci&oacute; y felicit&oacute; al personal de salud por su predisposici&oacute;n en focalizar la inmunizaci&oacute;n de los estudiantes santiaguinos y les requiri&oacute; programar una nueva fecha para que m&aacute;s universitarios accedan a las vacunas.<br />\n<br />\nDe esta manera, la Unasam se prepara para un posible retorno a clases de manera semipresencial, seg&uacute;n las disposiciones del gobierno en marco del estado de emergencia sanitaria que atraviesa el pa&iacute;s.</p>',1,0,1,'2021-10-23 20:51:14','2021-10-23 21:38:34',NULL,NULL,1,0),(6,'2021-10-05','19:00:00','Resultados de la etapa de evaluación curricular del concurso  CAS','<p>Resultados de la etapa de evaluaci&oacute;n curricular del concurso para Contrataci&oacute;n Administrativa del Servicio CAS</p>',1,0,1,'2021-10-23 20:53:19','2021-10-23 21:37:47',NULL,NULL,1,0),(7,'2021-10-07','14:00:00','Resultado Final del concurso para Contratación Administrativa del Servicio CAS','<p>Resultado Final del concurso para Contrataci&oacute;n Administrativa del Servicio CAS</p>',1,0,1,'2021-10-23 20:54:22','2021-10-23 20:54:22',NULL,NULL,1,0),(8,'2021-10-19','08:00:00','II Semana de la Investigación - RPU','<p style=\"text-align:justify\">Se informa a la comunidad universitaria que nuestros docentes investigadores estar&aacute;n presentes en la II Semana de la Investigaci&oacute;n de la Red Peruana de Universidades (RPU), del martes 19 al viernes 22 de octubre del 2021.<br />\n<br />\n&nbsp;En tanto a nuestros docentes investigadores estar&aacute;n: Laura Nivin, Karina Vilca, Carmen Tamariz, Magna Guzm&aacute;n, Ilder Cruz y Marcos Espinoza.</p>',1,0,1,'2021-10-23 20:56:25','2021-10-23 20:56:25',NULL,NULL,1,0),(9,'2021-10-08','19:00:00','Concurso Podcast: Escucha mi historia','<p style=\"text-align:justify\">Acomp&aacute;&ntilde;anos a escuchar las historias de nuestros estudiantes santiaguinos en el concurso de podcast &quot;Escucha mi Historia&quot;</p>\n\n<ul>\n	<li style=\"text-align: justify;\">Fecha: 8 de octubre</li>\n	<li style=\"text-align: justify;\">hora: 07:00 pm</li>\n</ul>',1,0,1,'2021-10-23 20:57:35','2021-10-23 20:58:13',NULL,NULL,1,0),(10,'2021-10-08','00:00:00','Combate de Angamos','<p style=\"text-align:justify\">Un 8 de octubre de 1879, un grupo de hombres, tripulantes del monitor Hu&aacute;scar al mando del Caballero de los Mares Gran Almirante del Per&uacute; Don Miguel Grau Seminario, fueron protagonistas de uno de los Combates Navales m&aacute;s memorables y gloriosos de los que se tenga recuerdo en la historia mar&iacute;tima de las naciones.</p>',1,0,1,'2021-10-23 20:58:07','2021-10-23 20:58:07',NULL,NULL,1,0),(11,'2021-10-21','05:00:00','Capacitación: Uso de la Plataforma Virtual','<p style=\"text-align:justify\">organizado por Recursos Humanos, a trav&eacute;s de la Unidad de Escalaf&oacute;n y Capacitaci&oacute;n.</p>\n\n<p style=\"text-align:justify\">Fechas: 21 y 28 de Octubre - 04 de Noviembre<br />\nHorario: Desde las 05:00 pm - 08:00 pm<br />\n<br />\nInscr&iacute;bete pronto, recuerda que el cierre de inscripciones es el 22 de Octubre.</p>',1,0,1,'2021-10-23 20:59:31','2021-10-23 20:59:31',NULL,NULL,1,0),(12,'2021-10-15','07:00:00','Vacunatón Santiaguina','<p>Vacunat&oacute;n Santiaguina de 18 a&ntilde;os a m&aacute;s COVID 19 1ra y 2da DOSIS.</p>',1,0,1,'2021-10-23 21:00:39','2021-10-23 21:00:39',NULL,NULL,1,0),(13,'2021-10-25','08:00:00','Ceremonia de Incorporación DOcente','<p style=\"text-align:justify\">El rector y los vicerrectores de la Unasam, en cumplimiento con la pol&iacute;tica institucional de Ascenso, Promoci&oacute;n y Nombramiento Docente, les invitan a participar en la transmisi&oacute;n en vivo de la ceremonia especial de Incorporaci&oacute;n de Docentes Principales y Auxiliares a desarrollarse este lunes 25 de octubre.</p>',1,0,1,'2021-10-23 21:01:27','2021-10-23 21:01:27',NULL,NULL,1,0);
/*!40000 ALTER TABLE `comunicados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenidos`
--

DROP TABLE IF EXISTS `contenidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `tipo` tinyint DEFAULT NULL COMMENT '1-> Himno',
  `mediaurl` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_presentacions_facultads1_idx` (`facultad_id`),
  KEY `fk_presentacions_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_presentacions_facultads100` FOREIGN KEY (`facultad_id`) REFERENCES `bdwebfec`.`facultads` (`id`),
  CONSTRAINT `fk_presentacions_programaestudios100` FOREIGN KEY (`programaestudio_id`) REFERENCES `bdwebfec`.`programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenidos`
--

LOCK TABLES `contenidos` WRITE;
/*!40000 ALTER TABLE `contenidos` DISABLE KEYS */;
INSERT INTO `contenidos` VALUES (1,'HIMNO DE LA UNASAM','<h3 style=\"text-align:center\"><strong>CORO</strong></h3>\n\n<p style=\"text-align:center\">Desde el ande iluminas la aurora<br />\n&ldquo;Ant&uacute;nez de Mayolo&rdquo; excelencia,<br />\nalma mater de peruana presencia<br />\ncoronada de esfuerzo y honor.</p>\n\n<h3 style=\"text-align:center\"><strong>Estrofa</strong></h3>\n\n<p style=\"text-align:center\">Santiaguino joyel rutilante<br />\nimbuido de ciencia y talento<br />\nson tus huestes brav&iacute;o portento<br />\nde tu excelso linaje creador.<br />\n<br />\nCon dialecto af&aacute;n humanista<br />\ndesafiaste a&uacute;n a natura<br />\nadalid que rebozas cultura,<br />\nmanantial donde fluye el fervor.<br />\n<br />\nEmulando el destino del santa<br />\nte deslizas por vastas regiones<br />\nconvertido en gestor de legiones<br />\naureoladas de estudio y acci&oacute;n.<br />\n<br />\nProletario eslab&oacute;n de ventura<br />\ncomo costumbres andinas tu nombre<br />\nengalana el acervo del hombre<br />\nen procura de hacerlo mejor.<br />\n<br />\nLoas mil semillero inefable<br />\nen Huaraz gran dintel de prestancia<br />\nel docente se esmera a distancia<br />\nen did&aacute;ctica y sabia misi&oacute;n.<br />\n<br />\nInstruir y formar es la meta<br />\nateneo, may&eacute;utica gu&iacute;a<br />\nconvertido en discreto vig&iacute;a<br />\ncon se&ntilde;era y leal convicci&oacute;n.</p>',1,'contenido_gobierno-26-10-2021-21-57-37.jpg',0,1,0,'2021-10-27 02:40:46','2021-10-27 02:57:37',1,NULL,NULL,1,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VGpSzpiRAIU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');
/*!40000 ALTER TABLE `contenidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datoestadisticos`
--

DROP TABLE IF EXISTS `datoestadisticos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datoestadisticos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> ingresantes\n2 -> matriculados\n3 -> egresados\n4 -> plana docente\n5 -> silabus\n6 -> tramites',
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textourl` varchar(500) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datoestadisticos`
--

LOCK TABLES `datoestadisticos` WRITE;
/*!40000 ALTER TABLE `datoestadisticos` DISABLE KEYS */;
/*!40000 ALTER TABLE `datoestadisticos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalledocentes`
--

DROP TABLE IF EXISTS `detalledocentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalledocentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `especialidad` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `docente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalledocentes_docentes1_idx` (`docente_id`),
  CONSTRAINT `fk_detalledocentes_docentes1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalledocentes`
--

LOCK TABLES `detalledocentes` WRITE;
/*!40000 ALTER TABLE `detalledocentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalledocentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallegradotitulos`
--

DROP TABLE IF EXISTS `detallegradotitulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallegradotitulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `vigente` tinyint DEFAULT NULL COMMENT '0 -> no\n1-> si',
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `gradotitulo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalleplanestudios_copy1_gradotitulos1_idx` (`gradotitulo_id`),
  CONSTRAINT `fk_detalleplanestudios_copy1_gradotitulos1` FOREIGN KEY (`gradotitulo_id`) REFERENCES `gradotitulos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallegradotitulos`
--

LOCK TABLES `detallegradotitulos` WRITE;
/*!40000 ALTER TABLE `detallegradotitulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallegradotitulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleinfraestructuras`
--

DROP TABLE IF EXISTS `detalleinfraestructuras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleinfraestructuras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `vigente` tinyint DEFAULT NULL COMMENT '0 -> no\n1-> si',
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `gradotitulo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalleplanestudios_copy1_gradotitulos1_idx` (`gradotitulo_id`),
  CONSTRAINT `fk_detalleplanestudios_copy1_gradotitulos10` FOREIGN KEY (`gradotitulo_id`) REFERENCES `infraestructuras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleinfraestructuras`
--

LOCK TABLES `detalleinfraestructuras` WRITE;
/*!40000 ALTER TABLE `detalleinfraestructuras` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleinfraestructuras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleplanestudios`
--

DROP TABLE IF EXISTS `detalleplanestudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleplanestudios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `planestudio_id` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `vigente` tinyint DEFAULT NULL COMMENT '0 -> no\n1-> si',
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalleplanestudios_planestudios1_idx` (`planestudio_id`),
  CONSTRAINT `fk_detalleplanestudios_planestudios1` FOREIGN KEY (`planestudio_id`) REFERENCES `planestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleplanestudios`
--

LOCK TABLES `detalleplanestudios` WRITE;
/*!40000 ALTER TABLE `detalleplanestudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleplanestudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorios`
--

DROP TABLE IF EXISTS `directorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directorios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `posision` int DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated-at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_directorios_facultads1_idx` (`facultad_id`),
  KEY `fk_directorios_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_directorios_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_directorios_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorios`
--

LOCK TABLES `directorios` WRITE;
/*!40000 ALTER TABLE `directorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `directorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_planestudios_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_planestudios_programaestudios101` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentesfacultads`
--

DROP TABLE IF EXISTS `docentesfacultads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docentesfacultads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllin` varchar(2500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_docentes_facultads1_idx` (`facultad_id`),
  KEY `fk_docentes_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_docentes_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_docentes_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentesfacultads`
--

LOCK TABLES `docentesfacultads` WRITE;
/*!40000 ALTER TABLE `docentesfacultads` DISABLE KEYS */;
/*!40000 ALTER TABLE `docentesfacultads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentoestatutos`
--

DROP TABLE IF EXISTS `documentoestatutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentoestatutos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `posicion` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estatuto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagenhistorias_copy1_estatutos1_idx` (`estatuto_id`),
  CONSTRAINT `fk_imagenhistorias_copy1_estatutos1` FOREIGN KEY (`estatuto_id`) REFERENCES `estatutos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentoestatutos`
--

LOCK TABLES `documentoestatutos` WRITE;
/*!40000 ALTER TABLE `documentoestatutos` DISABLE KEYS */;
INSERT INTO `documentoestatutos` VALUES (2,'Modificatorias al Estatuto','<p>Modificatorias realziadas al estatuto en sesiones de Asamblea Universitaria</p>','estatuto_mod26-10-2021-19-36-16.pdf',1,1,0,'2021-10-27 00:08:38','2021-10-27 00:40:54',1);
/*!40000 ALTER TABLE `documentoestatutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> Documentos Normativos\n2 -> Resoluciones\n3 -> Actas\n4 -> Tupa',
  `numero` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_documentos_facultads1_idx` (`facultad_id`),
  KEY `fk_documentos_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_documentos_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_documentos_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (1,'Resolución N° 001-2015-AE-UNASAM','documento_29-10-2021-23-30-18.pdf',1,'1','2021-01-31','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Estatuto de la UNASAM</strong></span></p>\n\n<p style=\"text-align:justify\">31 de enero de 2021</p>\n\n<p style=\"text-align:justify\">Documento normativo principal de la UNASAM, aprobado mediante Resoluci&oacute;n N&deg; 001-2015 de la Asamblea Estatutaria.&nbsp;</p>',0,'2021-10-30 04:30:19','2021-10-29 23:45:20',1,0,1,NULL,NULL),(2,'aasd ed','documento_29-10-2021-23-37-52.pdf',1,'3','2021-10-15','<p>asdasd ed</p>',0,'2021-10-30 04:33:39','2021-10-29 23:37:59',1,1,1,NULL,NULL),(3,'asdsa','documento_29-10-2021-23-40-38.pdf',1,'3','2021-10-15','<p>asdasd asd&nbsp;</p>',0,'2021-10-30 04:39:51','2021-10-29 23:40:51',1,1,1,NULL,NULL),(4,'Resolución N° 399-2015-UNASAM','documento_29-10-2021-23-42-00.pdf',1,'2','2021-01-31','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Reglamento General de la UNASAM</strong></span></p>\n\n<p style=\"text-align:justify\">31 de enero de 2021</p>\n\n<p style=\"text-align:justify\">&nbsp;El presente Reglamento General es el cuerpo org&aacute;nico de normas instrumentales que establecen los mecanismos dirigidos a asegurar, en la Universidad Nacional &ldquo;Santiago Ant&uacute;nez de Mayolo&rdquo;, el cumplimiento de los principios, competencias, deberes, derechos y mandatos establecidos por la Constituci&oacute;n, la Ley Universitaria y el Estatuto.</p>',0,'2021-10-30 04:42:00','2021-10-29 23:45:09',1,0,1,NULL,NULL),(5,'Resolución N° 437-2016-UNASAM','documento_29-10-2021-23-44-57.pdf',1,'3','2021-01-31','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Reglamento de Otorgamiento de A&ntilde;o Sab&aacute;tico en la UNASAM</strong></span></p>\n\n<p style=\"text-align:justify\">31 de enero de 2021</p>\n\n<p style=\"text-align:justify\">El presente Reglamento tiene por finalidad establecer los requisitos, procedimientos y condiciones para el goce del beneficio del A&ntilde;o Sab&aacute;tico por los Docentes en la &rdquo;Universidad Nacional Santiago Ant&uacute;nez de Mayolo&quot;.&nbsp;</p>',0,'2021-10-30 04:44:57','2021-10-29 23:44:57',1,0,1,NULL,NULL),(6,'Directiva N° 002-2021-OGTISE-UNASAM','RCU_N_122_2021.pdf',1,'4','2021-03-03','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Directiva que establece procedimientos para la tramitaci&oacute;n virtual a trav&eacute;s del correo institucional</strong></span></p>\n\n<p style=\"text-align:justify\">3 de marzo de 2021</p>\n\n<p style=\"text-align:justify\">La presente directiva establece procedimientos para la tramitaci&oacute;n administrativa virtual a trav&eacute;s del correo institucional debido&nbsp; a la emergencia sanitaria nacional por el coronavirus covid19 en la Unasam</p>',0,'2021-10-30 04:47:45','2021-10-29 23:47:45',1,0,1,NULL,NULL),(7,'Resolución N° 646-2019-UNASAM-RCU','documento_29-10-2021-23-53-50.pdf',1,'5','2021-10-29','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Pol&iacute;tica de Ecoeficiencia de la UNASAM</strong></span></p>\n\n<p style=\"text-align:justify\">29 de octubre de 2021</p>\n\n<p style=\"text-align:justify\">La universidad Nacional &quot;Santiago Antunez de Mayolo&quot;, cuenta con una Pol&iacute;tica de Ecoeficiencia que establece los compromisos asumidos por la instituci&oacute;n en el marco de su rol reactivo en el desarrollo sostenible del pais. Asimismo promueve en todas sus actividades la mejora continua del servicio educativo en funci&oacute;n del uso y gasto eficiente de los recursos respecto al medioambiente y su conservaci&oacute;n.</p>',0,'2021-10-30 04:53:50','2021-10-29 23:53:50',1,0,1,NULL,NULL),(8,'Resolución N° 276-2017-UNASAM-RR','documento_29-10-2021-23-54-48.pdf',1,'6','2021-10-29','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Pol&iacute;tica Ambiental de la UNASAM</strong></span></p>\n\n<p style=\"text-align:justify\">29 de octubre de 2021</p>\n\n<p style=\"text-align:justify\">La universidad Nacional &quot;Santiago Antunez de Mayolo&quot;, presenta la declaraci&oacute;n de su Pol&iacute;tica Ambiental, mostrando el compromiso de adoptar nuevos comportamientos y responsabilidades con respecto a la protecci&oacute;n del ambiente, a trav&eacute;s de su estructura, sus procesos y actividades.&nbsp;<br />\nY ser un referente ambiental para la sociedad.</p>',0,'2021-10-30 04:54:48','2021-10-30 00:08:08',1,0,1,NULL,NULL),(9,'Evaluación del POI -Anual 2020','documento_30-10-2021-00-08-57.pdf',2,'1','2021-03-10','<p style=\"text-align:justify\">El presente informe comprende el cumplimiento del plan operativo anual ejecutado por todas las dependencias de la Administraci&oacute;n Central, Facultades y Centros de Producci&oacute;n, a trav&eacute;s de la entrega de sus correspondientes evaluaciones, al presentar la evaluaci&oacute;n de cada trimestre a la Direcci&oacute;n de Planificaci&oacute;n, &eacute;sta procede a agregar la informaci&oacute;n f&iacute;sica y financiera mediante el Aplicativo CEPLAN- Versi&oacute;n: 1.0.1.33, para as&iacute; obtener los indicadores de cumplimiento de metas&nbsp;</p>',0,'2021-10-30 05:08:57','2021-10-30 00:08:57',1,0,1,NULL,NULL),(10,'Resultados del examen parcial del CPU ciclo intensivo 2021','documento_30-10-2021-00-16-03.pdf',2,'2','2021-04-20','<p style=\"text-align:justify\">Informe</p>\n\n<p style=\"text-align:justify\">20 de abril de 2021</p>\n\n<p style=\"text-align:justify\">VER RESULTADOS AQU&Iacute;:&nbsp;<a href=\"https://bit.ly/RP-CPU-2021?fbclid=IwAR3LJ8wH3M_zkOHVl3VFD4cCLGbFzklPXfWsv4SB7LLe48sk--mDLbSOXQs\" target=\"_blank\">http://bit.ly/RP-CPU-2021</a></p>\n\n<p style=\"text-align:justify\">&nbsp;Vis&iacute;tenos en:<br />\n<a href=\"https://www.admisionunasam.com/?fbclid=IwAR1B1qMz55A5Z0CN45tvldWazREmV-lXTjWfSOs7IUINVvYRvTVZmwQzkhk\" target=\"_blank\">https://www.admisionunasam.com</a></p>\n\n<p style=\"text-align:justify\">Informes e Inscripciones: Oficina General de Admisi&oacute;n (Av. Centenario N&ordm; 200 Independencia - Huaraz)<br />\nInformes e Inscripci&oacute;n: 950 332 646<br />\nInformes e Inscripci&oacute;n: 981 350 205<br />\nSoporte e Inscripci&oacute;n: 930 263 188<br />\nSoporte e Inscripci&oacute;n: 932 198 714<br />\n<a href=\"https://www.facebook.com/hashtag/admisionunasam?__eep__=6&amp;__cft__%5B0%5D=AZVoZ-5mz6BpjoqtQKwSYIq2czRNFEi_3uDPUp3O9QxGrW8Dg1DnJeIf918-S2WxDA_yfj-RPFw9aOKsKPPHAecCXZ0J0lMPSOjUC4CAe7C8-YzYfb_kMIvR9Za-uog3aJUeoDDkKJZRLdqfI8jgdKvZ&amp;__tn__=*NK*F\" target=\"_blank\"><strong>#AdmisionUnasam</strong></a>&nbsp;<a href=\"https://www.facebook.com/hashtag/unasamlicenciada?__eep__=6&amp;__cft__%5B0%5D=AZVoZ-5mz6BpjoqtQKwSYIq2czRNFEi_3uDPUp3O9QxGrW8Dg1DnJeIf918-S2WxDA_yfj-RPFw9aOKsKPPHAecCXZ0J0lMPSOjUC4CAe7C8-YzYfb_kMIvR9Za-uog3aJUeoDDkKJZRLdqfI8jgdKvZ&amp;__tn__=*NK*F\" target=\"_blank\"><strong>#UnasamLicenciada</strong></a>&nbsp;<a href=\"https://www.facebook.com/hashtag/todossomosunasam?__eep__=6&amp;__cft__%5B0%5D=AZVoZ-5mz6BpjoqtQKwSYIq2czRNFEi_3uDPUp3O9QxGrW8Dg1DnJeIf918-S2WxDA_yfj-RPFw9aOKsKPPHAecCXZ0J0lMPSOjUC4CAe7C8-YzYfb_kMIvR9Za-uog3aJUeoDDkKJZRLdqfI8jgdKvZ&amp;__tn__=*NK*F\" target=\"_blank\"><strong>#TodosSomosUnasam</strong></a>&nbsp;<a href=\"https://www.facebook.com/hashtag/yosoyunasam?__eep__=6&amp;__cft__%5B0%5D=AZVoZ-5mz6BpjoqtQKwSYIq2czRNFEi_3uDPUp3O9QxGrW8Dg1DnJeIf918-S2WxDA_yfj-RPFw9aOKsKPPHAecCXZ0J0lMPSOjUC4CAe7C8-YzYfb_kMIvR9Za-uog3aJUeoDDkKJZRLdqfI8jgdKvZ&amp;__tn__=*NK*F\" target=\"_blank\"><strong>#YosoyUnasam</strong></a></p>\n\n<p style=\"text-align:justify\">Vis&iacute;tenos en:<br />\n<a href=\"http://www.admisionunasam.com/?fbclid=IwAR1Qu2xtmO5wVwNpHkSIF9d8s3t_vrIa8G-F4A8YHPLqiTsq_XLwxaRR1F0\" target=\"_blank\">www.admisionunasam.com</a><br />\n<a href=\"http://www.unasam.edu.pe/?fbclid=IwAR3GlXBxgwjCsVX6uXKTTmElCL5GaFiUhLyF4wtdcbmlOUim81wkKO0l0aU\" target=\"_blank\">www.unasam.edu.pe</a></p>',0,'2021-10-30 05:11:21','2021-10-30 00:16:03',1,0,1,NULL,NULL),(11,'Reglamento General de Seguridad y Salud en el Trabajo de la UNASAM','documento_30-10-2021-00-13-01.pdf',2,'3','2021-10-29','<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Lineamiento</strong></span></p>\n\n<p style=\"text-align:justify\">29 de octubre de 2021</p>\n\n<p style=\"text-align:justify\">Este documento de gesti&oacute;n de la UNASAM, tiene el prop&oacute;sito central de desarrollar la cultura de prevenci&oacute;n de riesgos laborales y enfermedades laborales con responsabilidad de las autoridades universitarias y la participaci&oacute;n activa de la comunidad universitaria de la UNASAM, estableciendo los medios y condiciones que protejan la vida, la salud y el bienestar de los trabajadores, y de aquellos que sin serlo se encuentren dentro del recinto universitario.</p>',0,'2021-10-30 05:13:02','2021-10-30 00:13:02',1,0,1,NULL,NULL);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatutos`
--

DROP TABLE IF EXISTS `estatutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatutos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historias_facultads1_idx` (`facultad_id`),
  KEY `fk_historias_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_historias_facultads10` FOREIGN KEY (`facultad_id`) REFERENCES `bdwebfec`.`facultads` (`id`),
  CONSTRAINT `fk_historias_programaestudios10` FOREIGN KEY (`programaestudio_id`) REFERENCES `bdwebfec`.`programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatutos`
--

LOCK TABLES `estatutos` WRITE;
/*!40000 ALTER TABLE `estatutos` DISABLE KEYS */;
INSERT INTO `estatutos` VALUES (1,'Estatuto de la UNASAM','<p>UNIVERSIDAD NACIONAL &ldquo;SANTIAGO ANTUNEZ DE MAYOLO&rdquo;</p>\n\n<p>ASAMBLEA ESTATUTARIA LEY N&deg;30220</p>\n\n<p>ESTATUTO HUARAZ &ndash;PERU 2015</p>',1,1,0,1,'2021-10-26 23:13:43','2021-10-27 00:10:39',NULL,NULL,0,'estatuto-26-10-2021-19-10-39.pdf');
/*!40000 ALTER TABLE `estatutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estudiantes_facultads1_idx` (`facultad_id`),
  KEY `fk_estudiantes_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_estudiantes_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_estudiantes_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `desarrollo` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventos_programaestudios1_idx` (`programaestudio_id`),
  KEY `fk_eventos_facultads1_idx` (`facultad_id`),
  CONSTRAINT `fk_eventos_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_eventos_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'2021-10-10','15:20:00','Abuela pide apoyo de la población para su nieta menor de edad que quedó en orfandad','<ul>\n</ul>\n\n<p>La abuela de un menor pidi&oacute; la&nbsp;<strong>colaboraci&oacute;n</strong>&nbsp;a la colectividad para que lo ayuden con el&nbsp;<strong>sustento de su nieta</strong>; ello en vista de que su madre, que fue&nbsp;<em>trabajadora municipal</em>,&nbsp;<strong>pereci&oacute;</strong>&nbsp;y su padre no asume el gasto de alimentaci&oacute;n.</p>\n\n<p>La se&ntilde;ora Bernardina Bernuy, solicita ayuda de las personas de buen coraz&oacute;n de donar&nbsp;<strong>leche especial</strong>; para la ni&ntilde;a que perdi&oacute; a su madre, que fue extrabajadora de la&nbsp;<em>municipalidad provincial de Huaraz.</em></p>\n\n<p>Bernuy dijo que su nieta de&nbsp;<strong>9 meses</strong>&nbsp;consume&nbsp;<em>ocho tarros de leche especial por mes</em>&nbsp;y con el poco dinero que gana,&nbsp;<strong>no puede solventar el costo de estos insumos</strong>; y es ella casi la &uacute;nica que vela por su nieta.</p>\n\n<p>Indic&oacute; adem&aacute;s que, el&nbsp;<strong>padre</strong>&nbsp;hasta la fecha no cumple con su&nbsp;<strong>obligaci&oacute;n</strong>; por lo que ella como abuela est&aacute; asumiendo los&nbsp;<em>gastos de alimentaci&oacute;n de la ni&ntilde;a</em>, por lo que pide un apoyo de las&nbsp;<strong>autoridades y poblaci&oacute;n en general.</strong></p>\n\n<p>Ella tambi&eacute;n agradece el apoyo brindado por la poblaci&oacute;n, autoridades, diferentes empresas y personas que&nbsp;<strong>meses atr&aacute;s</strong>&nbsp;al enterarse de su caso, le extendieron la ayuda y con ello pudo sustentar los&nbsp;<strong>gastos de la peque&ntilde;a.</strong></p>\n\n<p>Ella pide apoyo porque no cuenta con suficientes recursos, para&nbsp;<em>leche, pa&ntilde;ales, ropita, frazaditas, medicinas, y mucho amo</em>r de las personas de buena voluntad, quienes pueden llamar al&nbsp; n&uacute;mero celular:&nbsp;<strong>940410768</strong>.</p>',1,1,1,'2021-10-10 23:17:14','2021-10-10 23:21:44',NULL,1,1,1),(2,'2021-10-10','00:00:00','Abuela pide apoyo de la población para su nieta menor de edad que quedó en orfandad','<p>La abuela de un menor pidi&oacute; la&nbsp;<strong>colaboraci&oacute;n</strong>&nbsp;a la colectividad para que lo ayuden con el&nbsp;<strong>sustento de su nieta</strong>; ello en vista de que su madre, que fue&nbsp;<em>trabajadora municipal</em>,&nbsp;<strong>pereci&oacute;</strong>&nbsp;y su padre no asume el gasto de alimentaci&oacute;n.</p>\n\n<p>La se&ntilde;ora Bernardina Bernuy, solicita ayuda de las personas de buen coraz&oacute;n de donar&nbsp;<strong>leche especial</strong>; para la ni&ntilde;a que perdi&oacute; a su madre, que fue extrabajadora de la&nbsp;<em>municipalidad provincial de Huaraz</em></p>\n\n<p>Bernuy dijo que su nieta de&nbsp;<strong>9 meses</strong>&nbsp;consume&nbsp;<em>ocho tarros de leche especial por mes</em>&nbsp;y con el poco dinero que gana,&nbsp;<strong>no puede solventar el costo de estos insumos</strong>; y es ella casi la &uacute;nica que vela por su nieta.</p>\n\n<p>Indic&oacute; adem&aacute;s que, el&nbsp;<strong>padre</strong>&nbsp;hasta la fecha no cumple con su&nbsp;<strong>obligaci&oacute;n</strong>; por lo que ella como abuela est&aacute; asumiendo los&nbsp;<em>gastos de alimentaci&oacute;n de la ni&ntilde;a</em>, por lo que pide un apoyo de las&nbsp;<strong>autoridades y poblaci&oacute;n en general.</strong></p>',1,1,1,'2021-10-10 23:22:25','2021-10-10 23:22:28',NULL,1,1,0),(3,'2021-10-22','17:27:00','Comunicado','<p style=\"text-align:justify\"><strong>A la comunidad universitaria y a la poblaci&oacute;n ancashina</strong>, se hace de su conocimiento que, la Comisi&oacute;n Central de Admisi&oacute;n (CAA) de la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (UNASAM), <strong>detect&oacute; y evit&oacute; una posible vulneraci&oacute;n al Examen de Admisi&oacute;n 2021 - II, correspondiente a las &Aacute;reas &quot;C&quot; y &quot;D&quot;</strong>, desarrollado hoy viernes 22 de octubre en la ciudad Universitaria de Shancay&aacute;n.</p>\n\n<p style=\"text-align:justify\">El hecho se registr&oacute; en los primeros minutos de la prueba, cuando el vigilante de aula detect&oacute; un dispositivo tipo reloj inteligente perteneciente al postulante de iniciales Q.H.A.A. quien actu&oacute; al margen del Reglamento General de este proceso.</p>\n\n<p style=\"text-align:justify\">Tras la constataci&oacute;n de lo ocurrido por la Polic&iacute;a Nacional del Per&uacute;, la Comisi&oacute;n Central de Admisi&oacute;n y la Procuradur&iacute;a Universitaria, <strong>DETERMIN&Oacute; ANULAR EL EXAMEN DEL POSTULANTE </strong>y comunic&oacute; el hecho a las autoridades pertinentes para que act&uacute;en seg&uacute;n sus atribuciones.</p>\n\n<p style=\"text-align:justify\">De esta forma, la UNASAM reafirma el fortalecimiento de sus pol&iacute;ticas de control, seguridad y transparenciaen este tipo de ex&aacute;menes y exhorta a la poblaci&oacute;n ancashina a no dejarse sorprender por personas inescrupulosas.</p>',1,0,1,'2021-10-23 15:43:46','2021-10-23 15:46:41',NULL,NULL,1,0),(4,'2021-10-22','21:21:00','Comunicado II','<p><strong>A la comunidad universitaria y a la poblaci&oacute;n ancashina</strong>, se hace de su conocimiento que, la Comisi&oacute;n Central de Admisi&oacute;n (CAA) de la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (UNASAM),&nbsp;<strong>detect&oacute; y evit&oacute; una posible vulneraci&oacute;n al Examen de Admisi&oacute;n 2021 - II, correspondiente a las &Aacute;reas &quot;C&quot; y &quot;D&quot;</strong>, desarrollado hoy viernes 22 de octubre en la ciudad Universitaria de Shancay&aacute;n.</p>\n\n<p>El hecho se registr&oacute; en los primeros minutos de la prueba, cuando el vigilante de aula detect&oacute; un dispositivo tipo reloj inteligente perteneciente al postulante de iniciales Q.H.A.A. quien actu&oacute; al margen del Reglamento General de este proceso.</p>\n\n<p>Tras la constataci&oacute;n de lo ocurrido por la Polic&iacute;a Nacional del Per&uacute;, la Comisi&oacute;n Central de Admisi&oacute;n y la Procuradur&iacute;a Universitaria,&nbsp;<strong>DETERMIN&Oacute; ANULAR EL EXAMEN DEL POSTULANTE&nbsp;</strong>y comunic&oacute; el hecho a las autoridades pertinentes para que act&uacute;en seg&uacute;n sus atribuciones.</p>\n\n<p>De esta forma, la UNASAM reafirma el fortalecimiento de sus pol&iacute;ticas de control, seguridad y transparenciaen este tipo de ex&aacute;menes y exhorta a la poblaci&oacute;n ancashina a no dejarse sorprender por personas inescrupulosas.</p>',1,0,1,'2021-10-23 15:46:26','2021-10-23 15:46:26',NULL,NULL,1,0),(5,'2021-10-23','00:00:00','asdasd','<p>asd</p>',1,0,1,'2021-10-23 15:47:12','2021-10-23 15:48:21',NULL,NULL,1,1),(6,'2021-10-20','10:04:00','Festi UNASAM, El Sabio del Bicentenario','<p>Demuestra tu talento</p>\n\n<p style=\"text-align:justify\">En las categor&iacute;as de canto, danza, teatro y declamaci&oacute;n. Puedes inscribirte hast el d&iacute;a 22 de octubre, mandando un mensaje al 949863116 o acerc&aacute;ndote a la oficina de Responsabilidad Social Universitaria en el local central de Telem&aacute;tica.</p>\n\n<ul>\n	<li>D&iacute;a: 23 de Octubre</li>\n	<li>Hora: 03:00 pm</li>\n	<li>Lugar: Auditorio de telem&aacute;tica</li>\n</ul>',1,0,1,'2021-10-23 15:50:48','2021-10-23 15:50:48',NULL,NULL,1,0),(7,'2021-10-19','13:06:00','Capacitación Barrick','<p style=\"text-align:justify\">Capacitaci&oacute;n para la convocatoria de pr&aacute;cticas profesionales de Barrick Gold Corporation.</p>\n\n<ul>\n	<li>Fechas: viernes 15 de octubre del 2021</li>\n	<li>Horario: A partir de las 02:30 pm</li>\n</ul>',1,0,1,'2021-10-23 15:52:43','2021-10-23 15:52:43',NULL,NULL,1,0),(8,'2021-10-19','11:17:00','Concurso Extraordinario','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p>\n\n<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p>',1,0,1,'2021-10-23 15:53:58','2021-10-23 15:53:58',NULL,NULL,1,0),(9,'2021-10-18','18:27:00','Libro: Ancash, una mirada desde el bicentenario','<p>Se hace una extensiva invictaci&oacute;n a la comunidad universitaria a la presentaci&oacute;n del libro: <em>&Aacute;ncash, una mirada desde el Bicentenario</em></p>\n\n<ul>\n	<li>Viernes 29 de octubre</li>\n	<li>10:30 am</li>\n</ul>',1,0,1,'2021-10-23 15:55:28','2021-10-23 15:55:28',NULL,NULL,1,0);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultads`
--

DROP TABLE IF EXISTS `facultads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facultads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `direccion` varchar(500) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL COMMENT 'nivel 1 -> corresponde a facultad',
  `logourl` varchar(2500) DEFAULT NULL,
  `tipo_vista` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultads`
--

LOCK TABLES `facultads` WRITE;
/*!40000 ALTER TABLE `facultads` DISABLE KEYS */;
INSERT INTO `facultads` VALUES (1,'Facultad de Economía y Contabilidad','descripción facultad','Av. Universitaria s/n - Pabellón F','043-456239','fec@unasam.edu.pe',1,0,NULL,'2021-11-20 01:19:14',1,1,'logo-19-11-2021-20-19-14.png',1),(2,'Facultad de Administración y Turismo','','','','',1,0,'2021-10-30 22:21:45','2021-10-30 22:21:45',1,1,NULL,1),(3,'adasd asdsad','','','','',1,1,'2021-10-30 22:21:49','2021-10-30 22:22:00',1,1,NULL,1),(4,'Facultad de Ciencias','','Av. Universitaria s/n - Pabellón C','','',1,0,'2021-10-30 22:24:14','2021-11-20 04:07:45',1,1,'logo-19-11-2021-19-49-31.jpeg',2),(5,'Facultad de Ciencias Agrarias','','','','',1,0,'2021-10-30 22:24:20','2021-10-30 22:24:20',1,1,NULL,1),(6,'Facultad de Ciencias del Ambiente','','','','',1,0,'2021-10-30 22:24:27','2021-10-30 22:24:27',1,1,NULL,1),(7,'Facultad de Ciencias Médicas','','','','',1,0,'2021-10-30 22:24:36','2021-10-30 22:24:36',1,1,NULL,1),(8,'Facultad de Ciencias Sociales, Educación Comunicación','','','','',1,0,'2021-10-30 22:24:43','2021-10-30 22:24:43',1,1,NULL,1),(9,'Facultad de Derecho y Ciencias Políticas','','','','',1,0,'2021-10-30 22:24:50','2021-10-30 22:24:50',1,1,NULL,1),(10,'Facultad de Ingeniería Civil','','','','',1,0,'2021-10-30 22:25:03','2021-10-30 22:25:03',1,1,NULL,1),(11,'Facultad de Ingeniería de Industrias Alimentarias','','','','',1,0,'2021-10-30 22:25:09','2021-11-20 00:50:49',1,1,'logo-19-11-2021-19-50-49.jpg',1),(12,'Facultad de Ingeniería de Minas, Geología y Metalurgia','','','','',1,0,'2021-10-30 22:25:16','2021-10-30 22:25:16',1,1,NULL,1);
/*!40000 ALTER TABLE `facultads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galerias`
--

DROP TABLE IF EXISTS `galerias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galerias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `posision` int DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` varchar(2500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galerias_facultads1_idx` (`facultad_id`),
  KEY `fk_galerias_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_galerias_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_galerias_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galerias`
--

LOCK TABLES `galerias` WRITE;
/*!40000 ALTER TABLE `galerias` DISABLE KEYS */;
/*!40000 ALTER TABLE `galerias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestioncalidads`
--

DROP TABLE IF EXISTS `gestioncalidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gestioncalidads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` int DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gestioncalidads_facultads1_idx` (`facultad_id`),
  KEY `fk_gestioncalidads_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_gestioncalidads_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_gestioncalidads_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestioncalidads`
--

LOCK TABLES `gestioncalidads` WRITE;
/*!40000 ALTER TABLE `gestioncalidads` DISABLE KEYS */;
/*!40000 ALTER TABLE `gestioncalidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gradotitulos`
--

DROP TABLE IF EXISTS `gradotitulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradotitulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_planestudios_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_planestudios_programaestudios10` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gradotitulos`
--

LOCK TABLES `gradotitulos` WRITE;
/*!40000 ALTER TABLE `gradotitulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gradotitulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historias`
--

DROP TABLE IF EXISTS `historias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `historia` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historias_facultads1_idx` (`facultad_id`),
  KEY `fk_historias_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_historias_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_historias_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historias`
--

LOCK TABLES `historias` WRITE;
/*!40000 ALTER TABLE `historias` DISABLE KEYS */;
INSERT INTO `historias` VALUES (1,'Titulo Historia Titulo Historia Titulo Historia','<p style=\"text-align:justify\">Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...Titulo Historia Titulo Historia historia de la fec.. inicio en 1991...</p>',NULL,1,0,1,'2021-10-12 03:20:40','2021-10-12 03:59:43',1,NULL,1),(2,'Nuestra Historia','<p style=\"text-align:justify\">Hace 40 a&ntilde;os y frente al clamor del pueblo ancashino, el presidente de la rep&uacute;blica de aquel entonces. General de divisi&oacute;n Francisco Morales Berm&uacute;dez Cerruti, promulgo el Decreto Ley creando la Universidad de Ancash, cumpliendo con su promesa el 24 de mayo de 1977, fecha en que se promulgo el Decreto Ley N&ordm; 21856, el mismo que resuelve crear la Universidad Nacional &ldquo;Santiago Ant&uacute;nez de Mayolo&rdquo; encargando al Consejo Nacional de la Universidad Peruana nombrar una comisi&oacute;n organizadora y el 10 de junio de 1977 se nombr&oacute; a dicha Comisi&oacute;n, que estuvo presidida por el Dr. Cesar Carranza Saravia.</p>\n\n<p style=\"text-align:justify\">Fue el 22 de agosto de 1978 que se iniciaron las labores acad&eacute;micas, atendiendo a 150 estudiantes. Durante los tres primeros a&ntilde;os cont&oacute; con cinco Programas Acad&eacute;micos: Ingenier&iacute;a de Minas, Ingenier&iacute;a Agr&iacute;cola, Ingenier&iacute;a civil, Ingenier&iacute;a de Industrias Alimentarias e Ingenier&iacute;a del Medio Ambiente. Con la daci&oacute;n de la Ley universitaria 23733 en diciembre de 1983, el Estatuto de la Unasam en agosto de 1984, cada uno de los programas acad&eacute;micos se convirtieron en Facultades. Variando su denominaci&oacute;n a:</p>\n\n<ul>\n	<li style=\"text-align: justify;\">Facultad de Minas, Geolog&iacute;a y Metalurgia</li>\n	<li style=\"text-align: justify;\">Facultad de Ciencias Agr&iacute;colas</li>\n	<li style=\"text-align: justify;\">Facultad de Ingenier&iacute;a Civil</li>\n	<li style=\"text-align: justify;\">Facultad de Ingenier&iacute;a de Industrias Alimentarias</li>\n	<li style=\"text-align: justify;\">Facultad de Ingenier&iacute;a del ambiente</li>\n</ul>\n\n<p style=\"text-align:justify\">Adem&aacute;s, el Estatuto contempla la creaci&oacute;n el futuro funcionamiento de las facultades de Ciencias M&eacute;dicas, Letras, Ciencias Econ&oacute;micas y Administrativas. Se cre&oacute; el 1 de setiembre de 1985 la Facultad de Letras con la Escuela de Derecho y Ciencias Pol&iacute;ticas y, en 1991 se har&iacute;a se har&iacute;a lo propio con la Facultad de Ciencias Econ&oacute;micas y Administrativas. En ese mismo a&ntilde;o, la Facultad de Ciencias Agr&iacute;colas, actualmente Facultad de Ciencias agrarias, apertura, adem&aacute;s la escuela de Agronom&iacute;a y, se autoriz&oacute; el funcionamiento de la Escuela de enfermer&iacute;a en la Facultad de Ciencias M&eacute;dicas el 22 de mayo de 1991. Dos a&ntilde;os despu&eacute;s se cre&oacute; la Facultad de Educaci&oacute;n y se aprob&oacute; la creaci&oacute;n de las Escuelas&nbsp;de Formaci&oacute;n Profesional de Periodismo dentro de la Facultad Educaci&oacute;n y la de Obstetricia dentro de Ciencias M&eacute;dicas.</p>\n\n<p style=\"text-align:justify\">En Enero de 1994 se crea la escuela de formaci&oacute;n profesional de Ingenier&iacute;a Sanitaria dentro de la facultad de Ciencias del Ambiente. en este misma fecha se hizo lo propio con la escuela de Turismo inscrita en ese entonces a la Faculta de educaci&oacute;n y actualmente a la Facultad de Administraci&oacute;n y turismo; mientras que el 23 de enero de 1995 se autoriza la implementaci&oacute;n para el funcionamiento de las cuetro escuelas de formaci&oacute;n profesional en la ciudad de Barranca: Agronom&iacute;a contabilidad enfermer&iacute;a e Ingenier&iacute;a de Industrias Alimentarias y el 7 de noviembre del mismo a&ntilde;o se autoriza el funcionamiento de la escuela de Ingenier&iacute;a y la de Obstetricia.</p>\n\n<p style=\"text-align:justify\">En la actualidad la Unasam est&aacute; desactivada de la filial Barranca. Ante la necesidad de capacitar a sus egresados y a los de otras universidades, el 29 de noviembre de 1997, se cre&oacute; la Escuela de Posgrado, mediante la Resoluci&oacute;n Rectoral N&ordm; 705 97 UNASAM.&nbsp;</p>\n\n<p style=\"text-align:justify\">Haremos un recuento de quienes han dirigido la UNASAM: Dr. Cesar Carranza Saravia, Dr. V&iacute;ctor Camacho Camacho, Ing. Hugo Ita Robles, Mag. Jaime Minaya Castromonte Dr. Hern&aacute;n Amat Olazabal, Lic. Carlos L&oacute;pez Gonzales, Dr. Enrique Huertas Barrios, el Dr. Fernando Castillo Pic&oacute;n, Dr. Dante S&aacute;nchez Rodr&iacute;guez, posteriormente la Comisi&oacute;n de Orden y Gesti&oacute;n presidida por la Dra. Lida Asencios Trujillo. Dr. Guillermo Gomero Camones, el Dr. Julio Poterico Huamayalli, y hoy en d&iacute;a el Dr. Carlos Reyes Pareja. Hoy en d&iacute;a la primera Universidad del departamento de Ancash, cuenta con aproximadamente 9&nbsp;mil estudiantes, 25&nbsp;carreras profesionales, con m&aacute;s de 473 docentes y 382 trabajadores administrativo, quienes d&iacute;a a d&iacute;a luchan por el desarrollo de la Universidad que tato esfuerzo le ha costado a este pueblo.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>',NULL,1,0,1,'2021-10-25 22:36:24','2021-10-25 22:36:24',NULL,NULL,0);
/*!40000 ALTER TABLE `historias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagencomunicados`
--

DROP TABLE IF EXISTS `imagencomunicados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagencomunicados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `posicion` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comunicado_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imageneventos_copy1_comunicados1_idx` (`comunicado_id`),
  CONSTRAINT `fk_imageneventos_copy1_comunicados1` FOREIGN KEY (`comunicado_id`) REFERENCES `comunicados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagencomunicados`
--

LOCK TABLES `imagencomunicados` WRITE;
/*!40000 ALTER TABLE `imagencomunicados` DISABLE KEYS */;
INSERT INTO `imagencomunicados` VALUES (2,'¡Triunfo celeste! Cristal derrotó 4-3 a Binacional en la Liga 1','<p>El &lsquo;Poderoso del Sur&rsquo; sorprendi&oacute; a los 29&prime;, cuando Fajardo ocasion&oacute; un autogol celeste. El defensa remat&oacute; de cabeza y la pelota choc&oacute; en el defensa Gonz&aacute;les antes de entrar al arco de Cristal. Sin Horacio Calcaterra, al equipo de Mosquera le cost&oacute; encontrar el empate, pero en el segundo tiempo sali&oacute; con todo y remont&oacute; r&aacute;pidamente.</p>\n\n<p>Loyola marc&oacute; el empate a los 56&prime; y, dos minutos m&aacute;s tarde, Percy Liza anot&oacute; un golazo de &lsquo;palomita&rsquo; tras un buen pase de &Aacute;vila. El &lsquo;Cholito&rsquo;, quien jug&oacute; un partidazo esta tarde, volvi&oacute; a dar una asistencia a los 64&prime; para la anotaci&oacute;n de Castillo. El partido parec&iacute;a resuelto, pero Binacional no baj&oacute; los brazos.</p>\n\n<p>El &lsquo;Poderoso del Sur&rsquo; acort&oacute; distancias a los 78&prime; con un gol del colombiano Arango. Luego, el &aacute;rbitro cobr&oacute; penal para Binacional; sin embargo, el ecuatoriano De Jes&uacute;s fall&oacute; el disparo desde los doce pasos. &Aacute;vila cerr&oacute; una tarde perfecta a los 85&prime; marcando el cuarto gol r&iacute;mense. Cerca del pitazo final, Ojeda se encarg&oacute; de anotar el &uacute;ltimo tanto en el Estadio Monumental.</p>\n\n<p>Con este resultado, los &ldquo;rimenses&rdquo; llegan a las 27 unidades en la Fase 2 y, de perder Alianza Lima todos sus partidos restantes, tendr&iacute;an que sumar los 9 puntos que le queda disputar. Por su parte, el Binacional pelea por no descender ya que solamente tiene 24 puntos en la tabla general.</p>','comunicado_fec-20-11-2021-00-52-02.jpg',0,1,0,'2021-10-10 23:28:38','2021-11-20 05:52:03',2),(3,'imagen comunicado','<p>asdasdasdasdas d</p>\n\n<p>sadsad</p>\n\n<p>asdas</p>','comunicado_fec20-11-2021-00-53-05.png',1,1,0,'2021-10-12 00:06:07','2021-11-20 05:53:05',2),(4,'UNASAM gana otro fondo concursable del PMESUT en Investigación','<p style=\"text-align:justify\"><strong>El programa financiar&aacute; el mejoramiento y Fortalecimiento de las capacidades para la gesti&oacute;n de la investigaci&oacute;n e Innovaci&oacute;n</strong></p>\n\n<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam) figura entre un selecto grupo de catorce universidades p&uacute;blicas del pa&iacute;s que han resultado ganadoras del Fondo Concursable: &ldquo;Mejora de la gesti&oacute;n de la investigaci&oacute;n, desarrollo e innovaci&oacute;n en universidades p&uacute;blicas&rdquo;, que impulsa el Programa para la Mejora de la Calidad y Pertinencia de los Servicios de Educaci&oacute;n Superior Universitaria y Tecnol&oacute;gica (PMESUT).<br />\n<br />\nConforme a la decisi&oacute;n del Comit&eacute; Ejecutivo del PMESUT, entidad adscrita al Ministerio de Educaci&oacute;n (MINEDU), la Unasam se ubica en el Grupo B destacando junto a la Universidad Tecnol&oacute;gica de Lima Sur, Nacional de Ucayali, Aut&oacute;noma Altoandina de Jun&iacute;n, Intercultural de la Amazon&iacute;a (Ucayali), Nacional del Callao, Nacional de Ja&eacute;n, y la Nacional Agraria de la Selva (Hu&aacute;nuco).<br />\n<br />\nEl fondo consiste en el financiamiento de mejoramiento y fortalecimiento de las capacidades para la gesti&oacute;n de la investigaci&oacute;n e innovaci&oacute;n, incorporaci&oacute;n de equipos de gestores altamente especializados, as&iacute; como el dise&ntilde;o y/o mejora e implementaci&oacute;n de agendas, planes y/o proyectos e impulso de la vinculaci&oacute;n universidad-empresa.<br />\n<br />\nPara participar en este concurso la Unasam cumpli&oacute; con una serie de requisitos como el licenciamiento institucional vigente, herramientas e instrumentos de gesti&oacute;n investigativa implementadas, equipo t&eacute;cnico responsable debidamente identificado, l&iacute;neas de investigaci&oacute;n definidas, entre otros requerimientos exigidos por el programa.<br />\n<br />\nAnte este importante logro, la m&aacute;xima autoridad santiaguina, Dr. Carlos Reyes Pareja, felicit&oacute; al equipo t&eacute;cnico acreditado ante el PMSUT, cuya coordinaci&oacute;n est&aacute; a cargo de la vicerrectora de Investigaci&oacute;n Dra. Consuelo Teresa Valencia Vera e integrado por el Dr. Jos&eacute; Yovera Saldarriaga, Dra. Karina Vilca Mallqui, Dr. Percy Olivera Gonzales y el Dr. Elmer Robles Bl&aacute;cido, quienes desarrollar&aacute;n una labor encomiable en la ejecuci&oacute;n del fondo.<br />\n<br />\nTodo lo se&ntilde;alado permitir&aacute; que esta casa superior de estudio potencie el dise&ntilde;o de los distintos proyectos acad&eacute;mico-cient&iacute;ficos para que sus estudiantes cuenten con una formaci&oacute;n de calidad, de acuerdo a los niveles y est&aacute;ndares que exige el mundo moderno.</p>','comunicado_fec-23-10-2021-15-48-24.jpg',0,1,0,'2021-10-23 20:48:24','2021-10-23 20:48:24',3),(5,'Jornada Académica - Científico del Bicentenario','<p style=\"text-align:justify\">Al conmemorarse el D&iacute;a del Estudiante Universitario, la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s de la Direcci&oacute;n del Instituto de Investigaci&oacute;n (DII)<br />\ninvita a la comunidad estudiantil a participar de la ','comunicado_fec-23-10-2021-15-50-04.jpg',0,1,0,'2021-10-23 20:50:04','2021-10-23 20:50:04',4),(6,'UNASAM, primera Universidad en Ancash en iniciar vacunación contra el COVID 19','<p style=\"text-align:justify\">Desde tempranas horas de este jueves 30 de septiembre, la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), inici&oacute; la campa&ntilde;a de vacunaci&oacute;n contra el covid-19 dirigido a sus estudiantes de 20 a&ntilde;os a m&aacute;s, personal administrativo y docente, con la finalidad poner en salvaguardar la salud y prevenir el contagio de la comunidad universitaria.<br />\n<br />\nDicha jornada se realiza en la ciudad universitaria de Shancay&aacute;n, en coordinaci&oacute;n con la Red de Salud Huaylas Sur. Asimismo, el personal de salud suministra la primera y segunda dosis de la vacuna y el personal de Bienestar Universitario de la Unasam realiza la orientaci&oacute;n en prevenci&oacute;n y medidas de bioseguridad.<br />\n<br />\nEn tanto, el rector santiaguino, Dr. Carlos Reyes Pareja, arrib&oacute; a este punto vacunatorio donde verific&oacute; la asistencia ordenada y responsable de los estudiantes a quienes, adem&aacute;s, reiter&oacute; la invitaci&oacute;n a que acudan portando solo el Documento Nacional de Identidad (DNI) y su tarjeta de vacunaci&oacute;n para los que requieran la segunda dosis.<br />\n<br />\nDel mismo modo, agradeci&oacute; y felicit&oacute; al personal de salud por su predisposici&oacute;n en focalizar la inmunizaci&oacute;n de los estudiantes santiaguinos y les requiri&oacute; programar una nueva fecha para que m&aacute;s universitarios accedan a las vacunas.<br />\n<br />\nDe esta manera, la Unasam se prepara para un posible retorno a clases de manera semipresencial, seg&uacute;n las disposiciones del gobierno en marco del estado de emergencia sanitaria que atraviesa el pa&iacute;s.</p>','comunicado_fec-23-10-2021-15-54-54.jpg',0,1,0,'2021-10-23 20:51:14','2021-10-23 21:38:34',5),(7,'Resultados de la etapa de evaluación curricular del concurso  CAS','<p>Resultados de la etapa de evaluaci&oacute;n curricular del concurso para Contrataci&oacute;n Administrativa del Servicio CAS</p>','comunicado_fec-23-10-2021-15-55-28.jpg',0,1,0,'2021-10-23 20:53:19','2021-10-23 21:37:47',6),(8,'Resultado Final del concurso para Contratación Administrativa del Servicio CAS','<p>Resultado Final del concurso para Contrataci&oacute;n Administrativa del Servicio CAS</p>','comunicado_fec-23-10-2021-15-54-22.jpg',0,1,0,'2021-10-23 20:54:22','2021-10-23 20:54:22',7),(9,'II Semana de la Investigación - RPU','<p style=\"text-align:justify\">Se informa a la comunidad universitaria que nuestros docentes investigadores estar&aacute;n presentes en la II Semana de la Investigaci&oacute;n de la Red Peruana de Universidades (RPU), del martes 19 al viernes 22 de octubre del 2021.<br />\n<br />\n&nbsp;En tanto a nuestros docentes investigadores estar&aacute;n: Laura Nivin, Karina Vilca, Carmen Tamariz, Magna Guzm&aacute;n, Ilder Cruz y Marcos Espinoza.</p>','comunicado_fec-23-10-2021-15-56-39.jpg',0,1,0,'2021-10-23 20:56:26','2021-10-23 20:56:39',8),(10,'Concurso Podcast: Escucha mi historia','<p style=\"text-align:justify\">Acomp&aacute;&ntilde;anos a escuchar las historias de nuestros estudiantes santiaguinos en el concurso de podcast &quot;Escucha mi Historia&quot;</p>\n\n<ul>\n	<li style=\"text-align: justify;\">Fecha: 8 de octubre</li>\n	<li style=\"text-align: justify;\">hora: 07:00 pm</li>\n</ul>','comunicado_fec-23-10-2021-15-57-35.jpg',0,1,0,'2021-10-23 20:57:35','2021-10-23 20:58:13',9),(11,'Combate de Angamos','<p style=\"text-align:justify\">Un 8 de octubre de 1879, un grupo de hombres, tripulantes del monitor Hu&aacute;scar al mando del Caballero de los Mares Gran Almirante del Per&uacute; Don Miguel Grau Seminario, fueron protagonistas de uno de los Combates Navales m&aacute;s memorables y gloriosos de los que se tenga recuerdo en la historia mar&iacute;tima de las naciones.</p>','comunicado_fec-23-10-2021-15-58-07.jpg',0,1,0,'2021-10-23 20:58:07','2021-10-23 20:58:07',10),(12,'Capacitación: Uso de la Plataforma Virtual','<p style=\"text-align:justify\">organizado por Recursos Humanos, a trav&eacute;s de la Unidad de Escalaf&oacute;n y Capacitaci&oacute;n.</p>\n\n<p style=\"text-align:justify\">Fechas: 21 y 28 de Octubre - 04 de Noviembre<br />\nHorario: Desde las 05:00 pm - 08:00 pm<br />\n<br />\nInscr&iacute;bete pronto, recuerda que el cierre de inscripciones es el 22 de Octubre.</p>','comunicado_fec-23-10-2021-15-59-31.jpg',0,1,0,'2021-10-23 20:59:31','2021-10-23 20:59:31',11),(13,'Vacunatón Santiaguina','<p>Vacunat&oacute;n Santiaguina de 18 a&ntilde;os a m&aacute;s COVID 19 1ra y 2da DOSIS.</p>','comunicado_fec-23-10-2021-16-00-39.jpg',0,1,0,'2021-10-23 21:00:39','2021-10-23 21:00:39',12),(14,'Ceremonia de Incorporación DOcente','<p style=\"text-align:justify\">El rector y los vicerrectores de la Unasam, en cumplimiento con la pol&iacute;tica institucional de Ascenso, Promoci&oacute;n y Nombramiento Docente, les invitan a participar en la transmisi&oacute;n en vivo de la ceremonia especial de Incorporaci&oacute;n de Docentes Principales y Auxiliares a desarrollarse este lunes 25 de octubre.</p>','comunicado_fec-23-10-2021-16-01-27.jpg',0,1,0,'2021-10-23 21:01:27','2021-10-23 21:01:27',13);
/*!40000 ALTER TABLE `imagencomunicados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageneventos`
--

DROP TABLE IF EXISTS `imageneventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imageneventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `posicion` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evento_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imageneventos_eventos1_idx` (`evento_id`),
  CONSTRAINT `fk_imageneventos_eventos1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageneventos`
--

LOCK TABLES `imageneventos` WRITE;
/*!40000 ALTER TABLE `imageneventos` DISABLE KEYS */;
INSERT INTO `imageneventos` VALUES (2,'Abuela pide apoyo de la población para su nieta menor de edad que quedó en orfandad','<p>La abuela de un menor pidi&oacute; la&nbsp;<strong>colaboraci&oacute;n</strong>&nbsp;a la colectividad para que lo ayuden con el&nbsp;<strong>sustento de su nieta</strong>; ello en vista de que su madre, que fue&nbsp;<em>trabajadora municipal</em>,&nbsp;<strong>pereci&oacute;</strong>&nbsp;y su padre no asume el gasto de alimentaci&oacute;n.</p>\n\n<p>La se&ntilde;ora Bernardina Bernuy, solicita ayuda de las personas de buen coraz&oacute;n de donar&nbsp;<strong>leche especial</strong>; para la ni&ntilde;a que perdi&oacute; a su madre, que fue extrabajadora de la&nbsp;<em>municipalidad provincial de Huaraz</em></p>\n\n<p>Bernuy dijo que su nieta de&nbsp;<strong>9 meses</strong>&nbsp;consume&nbsp;<em>ocho tarros de leche especial por mes</em>&nbsp;y con el poco dinero que gana,&nbsp;<strong>no puede solventar el costo de estos insumos</strong>; y es ella casi la &uacute;nica que vela por su nieta.</p>\n\n<p>Indic&oacute; adem&aacute;s que, el&nbsp;<strong>padre</strong>&nbsp;hasta la fecha no cumple con su&nbsp;<strong>obligaci&oacute;n</strong>; por lo que ella como abuela est&aacute; asumiendo los&nbsp;<em>gastos de alimentaci&oacute;n de la ni&ntilde;a</em>, por lo que pide un apoyo de las&nbsp;<strong>autoridades y poblaci&oacute;n en general.</strong></p>','evento_fec-20-11-2021-00-26-46.jpg',0,1,0,'2021-10-10 23:22:25','2021-11-20 05:26:46',2),(3,'Imagen evento 2','<p>datos de la imagen evento</p>\n\n<ul>\n	<li>imagen evento</li>\n</ul>','evento_fec20-11-2021-00-54-02.png',1,1,0,'2021-10-12 00:02:18','2021-11-20 05:54:02',2),(4,'imagen otra','<p>aasdsadasd</p>','evento_fec20-11-2021-00-54-27.png',2,1,0,'2021-10-12 00:04:16','2021-11-20 05:54:27',2),(5,'Comunicado','<p style=\"text-align:justify\"><strong>A la comunidad universitaria y a la poblaci&oacute;n ancashina</strong>, se hace de su conocimiento que, la Comisi&oacute;n Central de Admisi&oacute;n (CAA) de la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (UNASAM), <strong>detect&oacute; y evit&oacute; una posible vulneraci&oacute;n al Examen de Admisi&oacute;n 2021 - II, correspondiente a las &Aacute;reas &quot;C&quot; y &quot;D&quot;</strong>, desarrollado hoy viernes 22 de octubre en la ciudad Universitaria de Shancay&aacute;n.</p>\n\n<p style=\"text-align:justify\">El hecho se registr&oacute; en los primeros minutos de la prueba, cuando el vigilante de aula detect&oacute; un dispositivo tipo reloj inteligente perteneciente al postulante de iniciales Q.H.A.A. quien actu&oacute; al margen del Reglamento General de este proceso.</p>\n\n<p style=\"text-align:justify\">Tras la constataci&oacute;n de lo ocurrido por la Polic&iacute;a Nacional del Per&uacute;, la Comisi&oacute;n Central de Admisi&oacute;n y la Procuradur&iacute;a Universitaria, <strong>DETERMIN&Oacute; ANULAR EL EXAMEN DEL POSTULANTE </strong>y comunic&oacute; el hecho a las autoridades pertinentes para que act&uacute;en seg&uacute;n sus atribuciones.</p>\n\n<p style=\"text-align:justify\">De esta forma, la UNASAM reafirma el fortalecimiento de sus pol&iacute;ticas de control, seguridad y transparenciaen este tipo de ex&aacute;menes y exhorta a la poblaci&oacute;n ancashina a no dejarse sorprender por personas inescrupulosas.</p>','evento_fec-23-10-2021-10-48-09.jpg',0,1,0,'2021-10-23 15:43:46','2021-10-23 15:48:09',3),(6,'Comunicado II','<p><strong>A la comunidad universitaria y a la poblaci&oacute;n ancashina</strong>, se hace de su conocimiento que, la Comisi&oacute;n Central de Admisi&oacute;n (CAA) de la Universidad Nacional Santiago Ant&uacute;nez de Mayolo (UNASAM),&nbsp;<strong>detect&oacute; y evit&oacute; una posible vulneraci&oacute;n al Examen de Admisi&oacute;n 2021 - II, correspondiente a las &Aacute;reas &quot;C&quot; y &quot;D&quot;</strong>, desarrollado hoy viernes 22 de octubre en la ciudad Universitaria de Shancay&aacute;n.</p>\n\n<p>El hecho se registr&oacute; en los primeros minutos de la prueba, cuando el vigilante de aula detect&oacute; un dispositivo tipo reloj inteligente perteneciente al postulante de iniciales Q.H.A.A. quien actu&oacute; al margen del Reglamento General de este proceso.</p>\n\n<p>Tras la constataci&oacute;n de lo ocurrido por la Polic&iacute;a Nacional del Per&uacute;, la Comisi&oacute;n Central de Admisi&oacute;n y la Procuradur&iacute;a Universitaria,&nbsp;<strong>DETERMIN&Oacute; ANULAR EL EXAMEN DEL POSTULANTE&nbsp;</strong>y comunic&oacute; el hecho a las autoridades pertinentes para que act&uacute;en seg&uacute;n sus atribuciones.</p>\n\n<p>De esta forma, la UNASAM reafirma el fortalecimiento de sus pol&iacute;ticas de control, seguridad y transparenciaen este tipo de ex&aacute;menes y exhorta a la poblaci&oacute;n ancashina a no dejarse sorprender por personas inescrupulosas.</p>','evento_fec-23-10-2021-10-46-26.jpg',0,1,0,'2021-10-23 15:46:26','2021-10-23 15:46:26',4),(8,'Festi UNASAM, El Sabio del Bicentenario','<p>Demuestra tu talento</p>\n\n<p style=\"text-align:justify\">En las categor&iacute;as de canto, danza, teatro y declamaci&oacute;n. Puedes inscribirte hast el d&iacute;a 22 de octubre, mandando un mensaje al 949863116 o acerc&aacute;ndote a la oficina de Responsabilidad Social Universitaria en el local central de Telem&aacute;tica.</p>\n\n<ul>\n	<li>D&iacute;a: 23 de Octubre</li>\n	<li>Hora: 03:00 pm</li>\n	<li>Lugar: Auditorio de telem&aacute;tica</li>\n</ul>','evento_fec-23-10-2021-10-50-48.jpg',0,1,0,'2021-10-23 15:50:48','2021-10-23 15:50:48',6),(9,'Capacitación Barrick','<p style=\"text-align:justify\">Capacitaci&oacute;n para la convocatoria de pr&aacute;cticas profesionales de Barrick Gold Corporation.</p>\n\n<ul>\n	<li>Fechas: viernes 15 de octubre del 2021</li>\n	<li>Horario: A partir de las 02:30 pm</li>\n</ul>','evento_fec-23-10-2021-10-52-43.jpg',0,1,0,'2021-10-23 15:52:43','2021-10-23 15:52:43',7),(10,'Concurso Extraordinario','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p>\n\n<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p>','evento_fec-23-10-2021-10-53-58.jpg',0,1,0,'2021-10-23 15:53:58','2021-10-23 15:53:58',8),(11,'Libro: Ancash, una mirada desde el bicentenario','<p>Se hace una extensiva invictaci&oacute;n a la comunidad universitaria a la presentaci&oacute;n del libro: <em>&Aacute;ncash, una mirada desde el Bicentenario</em></p>\n\n<ul>\n	<li>Viernes 29 de octubre</li>\n	<li>10:30 am</li>\n</ul>','evento_fec-23-10-2021-10-55-28.jpg',0,1,0,'2021-10-23 15:55:28','2021-10-23 15:55:28',9),(12,'dsad','<p>asdasd</p>','evento_fec-28-10-2021-23-27-06.jpg',1,1,0,'2021-10-29 04:27:07','2021-10-29 04:27:07',4);
/*!40000 ALTER TABLE `imageneventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagengalerias`
--

DROP TABLE IF EXISTS `imagengalerias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagengalerias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `posicion` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `galeria_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagencomunicados_copy1_galerias1_idx` (`galeria_id`),
  CONSTRAINT `fk_imagencomunicados_copy1_galerias1` FOREIGN KEY (`galeria_id`) REFERENCES `galerias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagengalerias`
--

LOCK TABLES `imagengalerias` WRITE;
/*!40000 ALTER TABLE `imagengalerias` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagengalerias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenhistorias`
--

DROP TABLE IF EXISTS `imagenhistorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagenhistorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `posicion` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `historia_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagencomunicados_copy1_historias1_idx` (`historia_id`),
  CONSTRAINT `fk_imagencomunicados_copy1_historias1` FOREIGN KEY (`historia_id`) REFERENCES `historias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenhistorias`
--

LOCK TABLES `imagenhistorias` WRITE;
/*!40000 ALTER TABLE `imagenhistorias` DISABLE KEYS */;
INSERT INTO `imagenhistorias` VALUES (2,'imagen 1','<p>asddddddddddddd asddddddddddddsad assssssasd sad sadsa d</p>','historia_fec-11-10-2021-23-37-42.jpg',1,1,0,'2021-10-12 04:37:42','2021-10-12 04:37:42',1),(3,'Historia del Sabio Santiago Antúnez de mayolo','<p>Con la finalidad de revalorar el trabajo del sabio Santiago &Aacute;ngel de la Paz Ant&uacute;nez de Mayolo Gomero, ayer la Unasam-casa universitaria que tiene el orgullo de llevar su nombre, inaugur&oacute; la exposici&oacute;n fotogr&aacute;fica: Conociendo mi historia, actividad programada por el Festival Universitario 2021.</p>','historia_fec25-10-2021-17-46-26.jpg',2,1,0,'2021-10-25 22:45:06','2021-10-25 22:52:07',2),(5,'Historia del Sabio Santiago Antúnez de mayolo','','historia_fec-25-10-2021-17-48-29.jpg',3,1,0,'2021-10-25 22:48:29','2021-10-25 22:52:02',2),(6,'Imagen Panorámica de la ciudad universitaria','','historia_fec-25-10-2021-17-49-20.jpg',1,1,0,'2021-10-25 22:49:20','2021-10-25 22:50:32',2);
/*!40000 ALTER TABLE `imagenhistorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagennoticias`
--

DROP TABLE IF EXISTS `imagennoticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagennoticias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `posicion` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `noticia_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagennoticias_noticias1_idx` (`noticia_id`),
  CONSTRAINT `fk_imagennoticias_noticias1` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagennoticias`
--

LOCK TABLES `imagennoticias` WRITE;
/*!40000 ALTER TABLE `imagennoticias` DISABLE KEYS */;
INSERT INTO `imagennoticias` VALUES (2,'Revelan que director del Colegio de Cajamarquilla fue sentenciado por peculado doloso','<p>La Sala de Apelaciones de la Corte Superior de Justicia de Ancash, declar&oacute; infundado la apelaci&oacute;n interpuesta por Bonifacio Telmo Loli Osorio contra el fallo de primera instancia que lo sentenci&oacute;, a cuatro a&ntilde;os de pena privativa de la libertad suspendida y doscientos soles por concepto de reparaci&oacute;n civil por el delito de peculado doloso en agravio de la I.E. N&deg; 86059 Virgen de la Natividad del distrito de La Libertad &ndash;Cajamarquilla, provincia de Huaraz.&nbsp;</p>\n\n<p>Seg&uacute;n el Poder Judicial,&nbsp;<strong>Telmo Loli en su&nbsp;condici&oacute;n de director de la I.E. N&deg; 86059 del distrito de La Libertad &ndash;Cajamarquilla, se apoder&oacute; de S/. 6,324.00 del Programa de Mantenimiento de Locales Escolares</strong>,&nbsp;<strong>de acuerdo a la sentencia que fue consentida y ejecutoriada.</strong></p>\n\n<p>Esta revelaci&oacute;n fue alcanzado por un grupo de ciudadanos que cuestionaron el accionar del ex director y ex alcalde de La Libertad, a quien se sindica como uno de los asesores de la revocatoria del actual burgomaestre William Pic&oacute;n Jamanca.</p>\n\n<p>Asimismo dieron a conocer que el promotor de la revocatoria es un modesto triciclero que no vive en Cajamarquilla y reside permanentemente en Huaraz.</p>\n\n<ul>\n	<li>\n	<p>Mil 230 electores votar&aacute;n en distrito La Libertad &ndash; Huaraz en la consulta popular de revocatoria</p>\n	</li>\n	<li>\n	<p>Municipalidad de la Libertad-Cajamarquilla inaugura reservorio que irrigar&aacute; m&aacute;s de 100 h&aacute;s de terrenos</p>\n	</li>\n	<li>\n	<p>Cajamarquillanos inician ma&ntilde;ana la fiesta patronal de La Virgen de Natividad</p>\n	</li>\n	<li>\n	<p>Eval&uacute;an evacuar a Lima a escolares heridos en accidente de Cajamarquilla</p>\n	</li>\n</ul>\n\n<p>La Sala de Apelaciones de la Corte Superior de Justicia de Ancash, declar&oacute; infundado la apelaci&oacute;n interpuesta por Bonifacio Telmo Loli Osorio contra el fallo de primera instancia que lo sentenci&oacute;, a cuatro a&ntilde;os de pena privativa de la libertad suspendida y doscientos soles por concepto de reparaci&oacute;n civil por el delito de peculado doloso en agravio de la I.E. N&deg; 86059 Virgen de la Natividad del distrito de La Libertad &ndash;Cajamarquilla, provincia de Huaraz.&nbsp;</p>\n\n<p>Seg&uacute;n el Poder Judicial,&nbsp;<strong>Telmo Loli en su&nbsp;condici&oacute;n de director de la I.E. N&deg; 86059 del distrito de La Libertad &ndash;Cajamarquilla, se apoder&oacute; de S/. 6,324.00 del Programa de Mantenimiento de Locales Escolares</strong>,&nbsp;<strong>de acuerdo a la sentencia que fue consentida y ejecutoriada.</strong></p>\n\n<p>Esta revelaci&oacute;n fue alcanzado por un grupo de ciudadanos que cuestionaron el accionar del ex director y ex alcalde de La Libertad, a quien se sindica como uno de los asesores de la revocatoria del actual burgomaestre William Pic&oacute;n Jamanca.</p>\n\n<p>Asimismo dieron a conocer que el promotor de la revocatoria es un modesto triciclero que no vive en Cajamarquilla y reside permanentemente en Huaraz.</p>\n\n<p>Como es de dominio p&uacute;blico ma&ntilde;ana se realizar&aacute; la consulta ciudadana en el distrito huaracino de La Libertad.</p>','noticia_fec-19-11-2021-23-46-38.jpg',0,1,0,'2021-10-10 17:38:10','2021-11-20 04:46:38',2),(3,'Imagen 1','<p>Descripci&oacute;n de la Imagen de la noticia</p>\n\n<ul>\n	<li>Noticia</li>\n</ul>','noticia_19-11-2021-23-46-59.jpg',1,1,0,'2021-10-11 04:21:50','2021-11-20 04:46:59',2),(4,'imagen 2 ed ed x3','<p>datos de la imagen 2 ed</p>\n\n<p>asdadad</p>\n\n<p>&nbsp;</p>','noticia_19-11-2021-23-47-11.jpg',2,1,0,'2021-10-11 04:23:48','2021-11-20 04:47:11',2),(5,'Urgente Comunicarse Estudiantes','<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>','noticia_fec-22-10-2021-00-56-32.jpg',0,1,0,'2021-10-22 03:54:39','2021-10-28 00:48:27',3),(6,'Urgente Comunicarse Estudiantes','<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>','noticia_fec-22-10-2021-00-56-43.jpg',0,1,0,'2021-10-22 04:12:03','2021-10-22 05:56:43',4),(7,'Entrega de Alimentos a Beneficiarios de Comedor','<p>Entrega de alimentos en el comedor universitario 2&deg; grupo del semestre 2021 - I y relaci&oacute;n de beneficiarios.</p>\n\n<ul>\n	<li>Del 19 de octubre al 05 de noviembre.</li>\n	<li>De 8:00 am - 12:30 pm y De 14:00 pm - 15:30 pm.</li>\n	<li>Lugar: Comedor universitario</li>\n	<li>Portar: doble mascarilla, protector facial y lapicero.</li>\n	<li>Lista de estudiantes beneficiarios del comedor universitario - semestre 2021 - I&nbsp;https://cutt.ly/TRkvZq2</li>\n</ul>','noticia_fec-22-10-2021-00-56-51.jpg',0,1,0,'2021-10-22 04:15:09','2021-10-22 05:58:18',5),(8,'image 1','<p>image 1</p>','noticia_21-10-2021-23-27-06.png',1,1,0,'2021-10-22 04:16:45','2021-10-22 04:27:06',3),(11,'Atención Estudiante Universitario!','<p style=\"text-align:justify\">Se comunica a los estudiantes y p&uacute;blico en general que participaron en la campa&ntilde;a de Vacunat&oacute;n Santiaguina del d&iacute;a 30 de setiembre, que en esta oportunidad se les estar&aacute; sumisnistrando la segunda dosis de acuerdo a la fecha programada en el Centro Educativo Jorge Basadre Grohmann.</p>\n\n<p style=\"text-align:justify\">El horario de vacunaci&oacute;n empezar&aacute; a las 08:00 am y terminar&aacute; a las 12:00 pm.</p>\n\n<p style=\"text-align:justify\">El evento es organizado con la colaboraci&oacute;n de la Red de Salud Huaylas Sur.</p>','noticia_fec-22-10-2021-00-57-01.jpg',0,1,0,'2021-10-22 04:30:44','2021-10-23 01:44:47',7),(12,'CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p>\n\n<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p>\n\n<p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>','noticia_fec-22-10-2021-00-57-08.jpg',0,1,0,'2021-10-22 04:41:15','2021-10-22 05:57:08',8);
/*!40000 ALTER TABLE `imagennoticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infraestructuras`
--

DROP TABLE IF EXISTS `infraestructuras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infraestructuras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_planestudios_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_planestudios_programaestudios100` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infraestructuras`
--

LOCK TABLES `infraestructuras` WRITE;
/*!40000 ALTER TABLE `infraestructuras` DISABLE KEYS */;
/*!40000 ALTER TABLE `infraestructuras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licenciamientos`
--

DROP TABLE IF EXISTS `licenciamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licenciamientos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `tieneimagen` tinyint DEFAULT NULL,
  `tienearchivo` tinyint DEFAULT NULL,
  `descripcion` text,
  `url` varchar(2500) DEFAULT NULL,
  `urlfile` varchar(2500) DEFAULT NULL,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> licenciamiento\n2 -> acrditacion',
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `nombrefile` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_objetivos_facultads1_idx` (`facultad_id`),
  KEY `fk_objetivos_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_objetivos_facultads10` FOREIGN KEY (`facultad_id`) REFERENCES `bdwebfec`.`facultads` (`id`),
  CONSTRAINT `fk_objetivos_programaestudios10` FOREIGN KEY (`programaestudio_id`) REFERENCES `bdwebfec`.`programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licenciamientos`
--

LOCK TABLES `licenciamientos` WRITE;
/*!40000 ALTER TABLE `licenciamientos` DISABLE KEYS */;
INSERT INTO `licenciamientos` VALUES (2,'weqwewqe',0,0,'<p>qweqweqwe</p>','','',1,0,'2021-10-27 05:36:42','2021-10-27 05:36:53','1',1,1,NULL,NULL,''),(3,'Logro del Licenciamiento',1,1,'<p style=\"text-align:justify\">La comunidad educativa de la<strong>&nbsp;Universidad Nacional Santiago Ant&uacute;nez de Mayolo de Huaraz (UNASAM)&nbsp;</strong>recibi&oacute; una buena noticia en el primer d&iacute;a de 2019. L<strong>a Superintendencia Nacional de Educaci&oacute;n Superior Universitaria (Sunedu)</strong>&nbsp;inform&oacute; hoy que la referida casa de estudios logr&oacute; el ansiado licenciamiento para funcionar sin ning&uacute;n tipo de riesgo a ser cerrada. Tal decisi&oacute;n convierte a la UNASAM en la primera universidad de &Aacute;ncash y la 61 a nivel nacional en tener la referida acreditaci&oacute;n.&nbsp;</p>\n\n<p style=\"text-align:justify\">&ldquo;El proceso (de licenciamiento) evalu&oacute; la existencia de objetivos acad&eacute;micos, la compatibilidad de la nueva oferta educativa con las necesidades de la regi&oacute;n, la disponibilidad de infraestructura adecuada y segura, la presencia de herramientas de investigaci&oacute;n generadas por la universidad, la disponibilidad de docentes a tiempo completo, el funcionamiento de mecanismos de inserci&oacute;n laboral, as&iacute; como la existencia de sistemas de transparencia universitaria y de servicios complementarios&rdquo;, detalla&nbsp;la Sunedu en su p&aacute;gina oficial.&nbsp;</p>\n\n<p style=\"text-align:justify\">La entidad rectora de la educaci&oacute;n superior precis&oacute; que la universidad huaracina cuenta con 11 facultades y 63 programas acad&eacute;micos (25 de pregrado, 28 de maestr&iacute;a y 10 de doctorado). El proceso de licenciamiento lo inici&oacute; en abril de 2017 y para lograr el visto bueno la UNASAM tuvo que desistir de 11 programas de estudio.&nbsp;</p>\n\n<p style=\"text-align:justify\">La licencia a la UNASAM es por seis a&ntilde;os debido a que cumple con las&nbsp;<strong>Condiciones B&aacute;sicas de Calidad (CBC) exigidas por la Ley Universitaria.</strong></p>','licenciamiento-img_27-10-2021-12-18-04.jpg','licenciamiento-file_27-10-2021-12-19-37.pdf',1,0,'2021-10-27 05:37:08','2021-10-27 17:19:37','1',1,0,NULL,NULL,'Licencia UNASAM'),(4,'Impulso a la investigación',1,0,'<p style=\"text-align:justify\">Para alcanzar las exigencias del licenciamiento, la UNASAM aprob&oacute; su Reglamento General de Investigaci&oacute;n, reglamentos de derechos de autor, de docente investigador, de fondos de investigaci&oacute;n, as&iacute; como del uso de recursos del canon, sobrecanon y regal&iacute;as para tales fines. Tambi&eacute;n aprob&oacute; su C&oacute;digo de &Eacute;tica, sincer&oacute; sus l&iacute;neas de investigaci&oacute;n en base a sus recursos y present&oacute; su reglamento para el registro de trabajos de investigaci&oacute;n para optar por grados y t&iacute;tulos profesionales. Adem&aacute;s, la Universidad ha implementado el RIUNASAM, un registro para fidelizar docentes de investigaci&oacute;n que difundan sus trabajos en publicaciones acad&eacute;micas especializadas.</p>\n\n<p style=\"text-align:justify\">La UNASAM ha mejorado las condiciones de infraestructura, equipamiento y gesti&oacute;n en sus cuatro locales en &Aacute;ncash. As&iacute;, se han establecido protocolos para la disposici&oacute;n de sustancias inflamables y peligrosas para sus 58 laboratorios. Tambi&eacute;n se han optimizado los est&aacute;ndares ambientales mediante la creaci&oacute;n de protocolos para la gesti&oacute;n de residuos s&oacute;lidos y l&iacute;quidos peligrosos, as&iacute; como para la disposici&oacute;n de equipos el&eacute;ctricos y electr&oacute;nicos desechados. La ecoeficiencia de la UNASAM se ve impulsada, adem&aacute;s, por el uso de paneles solares en sus locales.</p>','licenciamiento-img_27-10-2021-12-21-15.jpg','',1,0,'2021-10-27 05:38:23','2021-10-27 17:21:38','1',1,0,NULL,NULL,''),(5,'dasd',1,1,'<p>asdsad</p>','licenciamiento-img_27-10-2021-00-46-17.jpg','licenciamiento-file_27-10-2021-00-46-17.pdf',1,0,'2021-10-27 05:46:17','2021-10-27 05:47:47','1',1,1,NULL,NULL,'asdasdasd'),(6,'Rumbo a la Acreditación de los Programas Profesionales',1,0,'<p style=\"text-align:justify\">Luego de la obtenci&oacute;n del licenciamiento la UNASAM tendr&aacute; que presentar un Plan de Ordinarizaci&oacute;n Docente para incrementar el n&uacute;mero de profesores ordinarios, tambi&eacute;n debe adjuntar una propuesta de acompa&ntilde;amiento de docentes para fortalecer su proceso de aprendizaje y un programa de gesti&oacute;n de investigaci&oacute;n con los profesores con Registro de Investigadores en Ciencia y Tecnolog&iacute;a (REGINA) del Sistema Nacional de Ciencia, Tecnolog&iacute;a e Innovaci&oacute;n Tecnol&oacute;gica (SINACYT). Adem&aacute;s, &nbsp;debe mejorar el proceso de contrataciones de bienes y servicios para los proyectos de investigaci&oacute;n.&nbsp;</p>','licenciamiento-img_27-10-2021-12-04-20.jpg','',2,0,'2021-10-27 05:48:13','2021-10-27 17:13:15','1',1,0,NULL,NULL,'');
/*!40000 ALTER TABLE `licenciamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linkinteres`
--

DROP TABLE IF EXISTS `linkinteres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `linkinteres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `posision` int DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL COMMENT 'nivel 1 -> corresponde a facultad\nnivel 2 -> corresponde a programas de estudios',
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_baners_facultads1_idx` (`facultad_id`),
  KEY `fk_baners_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_baners_facultads10` FOREIGN KEY (`facultad_id`) REFERENCES `bdwebfec`.`facultads` (`id`),
  CONSTRAINT `fk_baners_programaestudios10` FOREIGN KEY (`programaestudio_id`) REFERENCES `bdwebfec`.`programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linkinteres`
--

LOCK TABLES `linkinteres` WRITE;
/*!40000 ALTER TABLE `linkinteres` DISABLE KEYS */;
INSERT INTO `linkinteres` VALUES (1,1,'MINEDU ed','linkinteres_fec24-10-2021-10-55-37.jpg',1,1,'2021-10-24 15:55:26','2021-10-24 15:56:35',0,1,NULL,NULL),(2,1,'https://www.gob.pe/minedu','linkinteres_fec-24-10-2021-10-56-58.jpg',1,0,'2021-10-24 15:56:58','2021-10-24 16:09:33',0,1,NULL,NULL),(3,2,'https://www.gob.pe/sunedu','linkinteres_fec-24-10-2021-10-57-16.jpg',1,0,'2021-10-24 15:57:16','2021-10-24 16:10:04',0,1,NULL,NULL),(4,3,'https://www.gob.pe/sineace','linkinteres_fec-24-10-2021-10-57-31.jpg',1,0,'2021-10-24 15:57:32','2021-10-24 16:10:33',0,1,NULL,NULL),(5,4,'http://portal.concytec.gob.pe/index.php','linkinteres_fec-24-10-2021-10-57-47.jpg',1,0,'2021-10-24 15:57:47','2021-10-24 16:10:49',0,1,NULL,NULL),(6,5,'https://ctivitae.concytec.gob.pe/','linkinteres_fec-24-10-2021-10-58-05.jpg',1,0,'2021-10-24 15:58:05','2021-10-24 16:11:17',0,1,NULL,NULL),(7,6,'https://www.pronabec.gob.pe/beca-18/','linkinteres_fec-24-10-2021-10-58-29.jpg',1,0,'2021-10-24 15:58:29','2021-10-24 16:11:37',0,1,NULL,NULL),(8,7,'http://www.jovenesproductivos.gob.pe/','linkinteres_fec-24-10-2021-10-58-47.jpg',1,0,'2021-10-24 15:58:47','2021-10-24 16:12:34',0,1,NULL,NULL),(9,8,'https://www.gob.pe/mef','linkinteres_fec-24-10-2021-10-59-02.jpg',1,0,'2021-10-24 15:59:02','2021-10-24 16:12:48',0,1,NULL,NULL),(10,9,'https://www.gob.pe/inaigem','linkinteres_fec-24-10-2021-10-59-16.jpg',1,0,'2021-10-24 15:59:16','2021-10-24 16:13:03',0,1,NULL,NULL),(11,10,'https://www.sanciones.gob.pe/rnssc/#/transparencia/acceso','linkinteres_fec-24-10-2021-11-00-02.jpg',1,0,'2021-10-24 16:00:02','2021-10-24 16:13:39',0,1,NULL,NULL),(12,1,'https://www.gob.pe/minedu','linkinteres_fec-20-11-2021-01-17-06.jpg',1,0,'2021-11-20 06:17:06','2021-11-20 06:17:20',1,1,1,NULL);
/*!40000 ALTER TABLE `linkinteres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `misionvisions`
--

DROP TABLE IF EXISTS `misionvisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `misionvisions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> mision\n2 -> vision',
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_misionvisions_facultads1_idx` (`facultad_id`),
  KEY `fk_misionvisions_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_misionvisions_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_misionvisions_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `misionvisions`
--

LOCK TABLES `misionvisions` WRITE;
/*!40000 ALTER TABLE `misionvisions` DISABLE KEYS */;
INSERT INTO `misionvisions` VALUES (3,'MISIÓN DE LA FACULTAD DE ECONOMÍA Y CONTABILIDAD','<p>mision fec lasldalsdlsadlsadl&nbsp;</p>\n\n<p>asdlalsdlsadlsa</p>',1,1,0,1,'misionvision_fec-13-10-2021-11-58-26.jpeg',1,1,'2021-10-13 16:58:10','2021-10-13 16:58:26',1,NULL),(4,'MISIÓN DE LA UNASAM','<p style=\"text-align:justify\">Formar Profesionales l&iacute;deres y emprendedores con valores &eacute;ticos, comprometidos con el desarrollo sostenible de la regi&oacute;n a trav&eacute;s de la investigaci&oacute;n con responsabilidad social.</p>',1,1,0,1,'misionvision_fec-25-10-2021-19-34-40.jpg',0,1,'2021-10-26 00:31:56','2021-10-26 00:34:40',NULL,NULL),(5,'VISIÓN DE LA UNASAM','<p style=\"text-align:justify\">Ser reconocidos nacional e internacionalmente por la calidad en la formaci&oacute;n profesional cient&iacute;fica, tecnol&oacute;gica y human&iacute;stica.</p>',2,1,0,1,'misionvision_fec-25-10-2021-19-34-15.jpg',0,1,'2021-10-26 00:32:08','2021-10-26 00:34:15',NULL,NULL);
/*!40000 ALTER TABLE `misionvisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modulo` varchar(500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Página de Inicio UNASAM',0,1,0,NULL,NULL),(2,'Páginas Portal UNASAM',0,1,0,NULL,NULL),(3,'Gestión de Facultades',0,2,0,NULL,NULL),(4,'Inicio Facultad',1,1,0,NULL,NULL),(5,'Portal Facultad',1,1,0,NULL,NULL),(6,'Inicio Programa de Estudio',2,1,0,NULL,NULL),(7,'Portal Programa de Estudio',2,1,0,NULL,NULL),(8,'Configuraciones',-1,2,0,NULL,NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `titular` varchar(500) DEFAULT NULL,
  `desarrollo` text,
  `tieneimagen` tinyint DEFAULT NULL COMMENT '0 -> no tiene\n1 -> si tiene',
  `nivel` tinyint DEFAULT NULL COMMENT 'nivel 1 -> corresponde a facultad\nnivel 2 -> corresponde a programas de estudios',
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_noticias_facultads1_idx` (`facultad_id`),
  KEY `fk_noticias_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_noticias_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_noticias_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (1,'2021-10-10','04:02:00','Revelan que director del Colegio de Cajamarquilla fue sentenciado por peculado doloso','<p>La Sala de Apelaciones de la Corte Superior de Justicia de Ancash, declar&oacute; infundado la apelaci&oacute;n interpuesta por Bonifacio Telmo Loli Osorio contra el fallo de primera instancia que lo sentenci&oacute;, a cuatro a&ntilde;os de pena privativa de la libertad suspendida y doscientos soles por concepto de reparaci&oacute;n civil por el delito de peculado doloso en agravio de la I.E. N&deg; 86059 Virgen de la Natividad del distrito de La Libertad &ndash;Cajamarquilla, provincia de Huaraz.&nbsp;</p>\n\n<p>Seg&uacute;n el Poder Judicial,&nbsp;<strong>Telmo Loli en su&nbsp;condici&oacute;n de director de la I.E. N&deg; 86059 del distrito de La Libertad &ndash;Cajamarquilla, se apoder&oacute; de S/. 6,324.00 del Programa de Mantenimiento de Locales Escolares</strong>,&nbsp;<strong>de acuerdo a la sentencia que fue consentida y ejecutoriada.</strong></p>\n\n<p>Esta revelaci&oacute;n fue alcanzado por un grupo de ciudadanos que cuestionaron el accionar del ex director y ex alcalde de La Libertad, a quien se sindica como uno de los asesores de la revocatoria del actual burgomaestre William Pic&oacute;n Jamanca.</p>\n\n<p>Asimismo dieron a conocer que el promotor de la revocatoria es un modesto triciclero que no vive en Cajamarquilla y reside permanentemente en Huaraz.</p>\n\n<p>Foto: &Aacute;ncash Noticias</p>\n\n<p>&Aacute;NCASH</p>\n\n<p>Revelan que director del Colegio de Cajamarquilla fue sentenciado por peculado doloso</p>\n\n<p>Telmo Loli Osorio no rindi&oacute; por fondos recibidos para mantenimiento de infraestructura de su colegio.</p>\n\n<p>&nbsp;</p>\n\n<p>Por</p>\n\n<p>Redacci&oacute;n AN</p>\n\n<p>Publicado el&nbsp;octubre 9, 2021</p>\n\n<ul>\n	<li>SHARE</li>\n	<li>TWEET</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n\n<p>Exportar a PDFImprimir</p>\n\n<p>La Sala de Apelaciones de la Corte Superior de Justicia de Ancash, declar&oacute; infundado la apelaci&oacute;n interpuesta por Bonifacio Telmo Loli Osorio contra el fallo de primera instancia que lo sentenci&oacute;, a cuatro a&ntilde;os de pena privativa de la libertad suspendida y doscientos soles por concepto de reparaci&oacute;n civil por el delito de peculado doloso en agravio de la I.E. N&deg; 86059 Virgen de la Natividad del distrito de La Libertad &ndash;Cajamarquilla, provincia de Huaraz.&nbsp;</p>\n\n<p>Seg&uacute;n el Poder Judicial,&nbsp;<strong>Telmo Loli en su&nbsp;condici&oacute;n de director de la I.E. N&deg; 86059 del distrito de La Libertad &ndash;Cajamarquilla, se apoder&oacute; de S/. 6,324.00 del Programa de Mantenimiento de Locales Escolares</strong>,&nbsp;<strong>de acuerdo a la sentencia que fue consentida y ejecutoriada.</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Esta revelaci&oacute;n fue alcanzado por un grupo de ciudadanos que cuestionaron el accionar del ex director y ex alcalde de La Libertad, a quien se sindica como uno de los asesores de la revocatoria del actual burgomaestre William Pic&oacute;n Jamanca.</p>\n\n<p>Asimismo dieron a conocer que el promotor de la revocatoria es un modesto triciclero que no vive en Cajamarquilla y reside permanentemente en Huaraz.</p>\n\n<p>Como es de dominio p&uacute;blico ma&ntilde;ana se realizar&aacute; la consulta ciudadana en el distrito huaracino de La Libertad.</p>',1,1,1,'2021-10-10 17:32:50','2021-10-10 17:36:50',1,NULL,1,1),(2,'2021-10-09','16:37:00','Revelan que director del Colegio de Cajamarquilla fue sentenciado por peculado doloso','<p>La Sala de Apelaciones de la Corte Superior de Justicia de Ancash, declar&oacute; infundado la apelaci&oacute;n interpuesta por Bonifacio Telmo Loli Osorio contra el fallo de primera instancia que lo sentenci&oacute;, a cuatro a&ntilde;os de pena privativa de la libertad suspendida y doscientos soles por concepto de reparaci&oacute;n civil por el delito de peculado doloso en agravio de la I.E. N&deg; 86059 Virgen de la Natividad del distrito de La Libertad &ndash;Cajamarquilla, provincia de Huaraz.&nbsp;</p>\n\n<p>Seg&uacute;n el Poder Judicial,&nbsp;<strong>Telmo Loli en su&nbsp;condici&oacute;n de director de la I.E. N&deg; 86059 del distrito de La Libertad &ndash;Cajamarquilla, se apoder&oacute; de S/. 6,324.00 del Programa de Mantenimiento de Locales Escolares</strong>,&nbsp;<strong>de acuerdo a la sentencia que fue consentida y ejecutoriada.</strong></p>\n\n<p>Esta revelaci&oacute;n fue alcanzado por un grupo de ciudadanos que cuestionaron el accionar del ex director y ex alcalde de La Libertad, a quien se sindica como uno de los asesores de la revocatoria del actual burgomaestre William Pic&oacute;n Jamanca.</p>\n\n<p>Asimismo dieron a conocer que el promotor de la revocatoria es un modesto triciclero que no vive en Cajamarquilla y reside permanentemente en Huaraz.</p>\n\n<ul>\n	<li>\n	<p>Mil 230 electores votar&aacute;n en distrito La Libertad &ndash; Huaraz en la consulta popular de revocatoria</p>\n	</li>\n	<li>\n	<p>Municipalidad de la Libertad-Cajamarquilla inaugura reservorio que irrigar&aacute; m&aacute;s de 100 h&aacute;s de terrenos</p>\n	</li>\n	<li>\n	<p>Cajamarquillanos inician ma&ntilde;ana la fiesta patronal de La Virgen de Natividad</p>\n	</li>\n	<li>\n	<p>Eval&uacute;an evacuar a Lima a escolares heridos en accidente de Cajamarquilla</p>\n	</li>\n</ul>\n\n<p>La Sala de Apelaciones de la Corte Superior de Justicia de Ancash, declar&oacute; infundado la apelaci&oacute;n interpuesta por Bonifacio Telmo Loli Osorio contra el fallo de primera instancia que lo sentenci&oacute;, a cuatro a&ntilde;os de pena privativa de la libertad suspendida y doscientos soles por concepto de reparaci&oacute;n civil por el delito de peculado doloso en agravio de la I.E. N&deg; 86059 Virgen de la Natividad del distrito de La Libertad &ndash;Cajamarquilla, provincia de Huaraz.&nbsp;</p>\n\n<p>Seg&uacute;n el Poder Judicial,&nbsp;<strong>Telmo Loli en su&nbsp;condici&oacute;n de director de la I.E. N&deg; 86059 del distrito de La Libertad &ndash;Cajamarquilla, se apoder&oacute; de S/. 6,324.00 del Programa de Mantenimiento de Locales Escolares</strong>,&nbsp;<strong>de acuerdo a la sentencia que fue consentida y ejecutoriada.</strong></p>\n\n<p>Esta revelaci&oacute;n fue alcanzado por un grupo de ciudadanos que cuestionaron el accionar del ex director y ex alcalde de La Libertad, a quien se sindica como uno de los asesores de la revocatoria del actual burgomaestre William Pic&oacute;n Jamanca.</p>\n\n<p>Asimismo dieron a conocer que el promotor de la revocatoria es un modesto triciclero que no vive en Cajamarquilla y reside permanentemente en Huaraz.</p>\n\n<p>Como es de dominio p&uacute;blico ma&ntilde;ana se realizar&aacute; la consulta ciudadana en el distrito huaracino de La Libertad.</p>',1,1,1,'2021-10-10 17:38:10','2021-10-11 04:53:28',1,NULL,1,0),(3,'2021-10-21','17:16:00','Urgente Comunicarse Estudiantes','<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>\n\n<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>',1,0,1,'2021-10-22 03:54:39','2021-10-28 00:48:27',NULL,NULL,1,0),(4,'2021-10-20','22:11:00','Urgente Comunicarse Estudiantes','<p style=\"text-align:justify\">Los estudiantes que se encuentran en la siguiente lista, comunicarse con urgencia con la Sra. Maritza B&aacute;ez al celular 910516061, para recoger su resoluci&oacute;n de reincorporaci&oacute;n por Amnist&iacute;a.</p>',1,0,1,'2021-10-22 04:12:03','2021-10-22 04:41:24',NULL,NULL,1,0),(5,'2021-10-20','18:25:00','Entrega de Alimentos a Beneficiarios de Comedor','<p>Entrega de alimentos en el comedor universitario 2&deg; grupo del semestre 2021 - I y relaci&oacute;n de beneficiarios.</p>\n\n<ul>\n	<li>Del 19 de octubre al 05 de noviembre.</li>\n	<li>De 8:00 am - 12:30 pm y De 14:00 pm - 15:30 pm.</li>\n	<li>Lugar: Comedor universitario</li>\n	<li>Portar: doble mascarilla, protector facial y lapicero.</li>\n	<li>Lista de estudiantes beneficiarios del comedor universitario - semestre 2021 - I&nbsp;https://cutt.ly/TRkvZq2</li>\n</ul>',1,0,1,'2021-10-22 04:15:09','2021-10-22 05:58:18',NULL,NULL,1,0),(6,'2021-10-21','00:00:00','asdsad','<p>asdsa</p>',1,0,1,'2021-10-22 04:27:37','2021-10-22 04:27:44',NULL,NULL,1,1),(7,'2021-10-19','17:06:00','Atención Estudiante Universitario!','<p style=\"text-align:justify\">Se comunica a los estudiantes y p&uacute;blico en general que participaron en la campa&ntilde;a de Vacunat&oacute;n Santiaguina del d&iacute;a 30 de setiembre, que en esta oportunidad se les estar&aacute; sumisnistrando la segunda dosis de acuerdo a la fecha programada en el Centro Educativo Jorge Basadre Grohmann.</p>\n\n<p style=\"text-align:justify\">El horario de vacunaci&oacute;n empezar&aacute; a las 08:00 am y terminar&aacute; a las 12:00 pm.</p>\n\n<p style=\"text-align:justify\">El evento es organizado con la colaboraci&oacute;n de la Red de Salud Huaylas Sur.</p>',1,0,1,'2021-10-22 04:30:44','2021-10-23 01:44:47',NULL,NULL,1,0),(8,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p>\n\n<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p>\n\n<p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-22 04:41:15','2021-10-22 04:41:15',NULL,NULL,1,0),(9,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(10,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(11,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(12,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(13,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(14,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(15,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(16,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(17,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(18,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(19,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(20,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(21,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(22,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(23,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(24,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(25,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(26,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(27,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(28,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(29,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(30,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(31,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(32,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(33,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(34,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(35,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(36,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(37,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(38,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(39,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(40,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(41,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(42,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(43,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(44,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(45,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(46,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(47,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(48,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(49,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(50,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(51,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(52,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(53,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(54,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(55,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(56,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(57,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(58,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(59,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(60,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(61,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(62,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(63,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(64,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(65,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(66,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(67,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(68,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(69,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(70,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(71,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(72,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(73,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(74,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(75,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(76,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(77,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(78,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(79,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(80,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(81,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(82,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(83,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(84,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(85,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(86,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(87,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(88,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(89,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(90,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(91,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(92,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(93,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(94,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(95,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(96,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(97,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(98,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(99,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(100,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(101,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(102,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(103,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(104,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(105,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(106,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(107,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(108,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(109,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(110,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(111,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(112,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(113,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(114,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(115,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(116,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(117,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(118,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(119,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(120,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(121,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(122,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(123,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(124,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(125,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(126,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(127,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(128,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(129,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(130,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(131,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(132,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(133,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(134,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(135,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(136,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(137,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(138,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(139,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(140,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(141,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(142,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(143,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(144,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(145,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(146,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(147,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(148,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(149,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(150,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(151,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(152,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(153,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(154,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(155,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(156,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(157,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(158,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(159,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(160,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(161,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(162,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(163,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(164,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(165,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(166,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(167,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(168,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(169,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(170,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(171,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(172,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(173,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(174,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(175,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(176,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(177,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(178,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(179,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(180,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(181,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(182,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(183,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(184,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(185,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(186,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(187,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(188,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(189,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(190,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(191,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(192,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(193,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(194,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(195,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(196,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(197,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(198,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(199,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(200,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(201,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(202,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(203,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(204,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(205,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(206,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(207,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(208,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(209,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(210,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(211,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(212,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(213,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(214,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(215,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(216,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(217,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0),(218,'2021-10-19','12:32:00','CONCURSO EXTRAORDINARIO','<p style=\"text-align:justify\"><strong>Proyectos de Investigaci&oacute;n de grupos de Investigaci&oacute;n 2021</strong></p> <p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo (Unasam), a trav&eacute;s del Vicerrectorado de Investigaci&oacute;n y la Direcci&oacute;n del Instituto de Investigaci&oacute;n con el apoyo del Vicerrectorado Acad&eacute;mico y el CCEAD, lleva a cabo la convocatoria del concurso extraordinario de proyectos de investigaci&oacute;n de grupos de investigaci&oacute;n con uso de la fuente de financiamiento de Herramientas de Incentivos 2021 para Grupos de Investigaci&oacute;n formalmente.</p><p style=\"text-align:justify\">M&aacute;s informaci&oacute;n:&nbsp;https://cutt.ly/PRjNDJa</p>',1,0,1,'2021-10-27 05:00:00','2021-10-27 05:00:00',NULL,NULL,1,0);
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objetivos`
--

DROP TABLE IF EXISTS `objetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objetivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` int DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_objetivos_facultads1_idx` (`facultad_id`),
  KEY `fk_objetivos_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_objetivos_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_objetivos_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objetivos`
--

LOCK TABLES `objetivos` WRITE;
/*!40000 ALTER TABLE `objetivos` DISABLE KEYS */;
INSERT INTO `objetivos` VALUES (1,1,'<p style=\"text-align:justify\">La formaci&oacute;n acad&eacute;mica es un conjunto de conocimientos adquiridos, los cuales son una herramienta que ayudar&aacute;n a consolidar las competencias de los futuros profesionales.</p>\n\n<p style=\"text-align:justify\"><strong>Indicador:</strong></p>\n\n<p style=\"text-align:justify\">1. Porcentaje de graduados que culminan sus estudios conforme al programa curricular por escuela profesional.</p>',NULL,'objetivo-26-10-2021-16-11-23.jpg',0,'2021-10-26 21:11:23','2021-10-26 21:14:52','1',1,0,NULL,NULL,'OEI.01 MEJORAR LA FORMACIÓN ACADÉMICA DE LOS ESTUDIANTES SANTIAGUINOS'),(2,2,'<p>asd</p>',NULL,'objetivo26-10-2021-16-13-33.png',0,'2021-10-26 21:13:25','2021-10-26 21:13:37','1',1,1,NULL,NULL,'asd'),(3,2,'<p style=\"text-align:justify\">La investigaci&oacute;n universitaria fortalece la formaci&oacute;n acad&eacute;mica, permite establecer contacto con la realidad a fin de que la conozcamos mejor, la finalidad de esta consiste en formular nuevas teor&iacute;as o aplicar tecnolog&iacute;a en el &aacute;rea de influencia de la universidad.</p>\n\n<p style=\"text-align:justify\"><strong>Indicador:</strong></p>\n\n<p style=\"text-align:justify\">1. Tasa de investigaciones publicadas en revistas indexadas por cada cien docentes.</p>',NULL,'objetivo-26-10-2021-16-14-40.jpg',0,'2021-10-26 21:14:40','2021-10-26 21:16:33','1',1,0,NULL,NULL,'OEI.02 PROMOVER LA INVESTIGACIÓN, CIENTÍFICA Y TECNOLÓGICA EN LA COMUNIDAD UNIVERSITARIA'),(4,3,'<p style=\"text-align:justify\">La responsabilidad social universitaria responde a internalizar los impactos externos que se generan dentro de la instituci&oacute;n como en su entorno.</p>\n\n<p style=\"text-align:justify\"><strong>Indicador:</strong></p>\n\n<p style=\"text-align:justify\">1. Porcentaje de beneficiarios de la extensi&oacute;n y proyecci&oacute;n social universitaria.</p>',NULL,'objetivo26-10-2021-16-19-40.jpg',0,'2021-10-26 21:17:13','2021-10-26 21:19:40','1',1,0,NULL,NULL,'OEI.03 FORTALECER LAS ACTIVIDADES DE EXTENSIÓN CULTURAL Y DE PROYECCIÓN SOCIAL PARA LA COMUNIDAD UNIVERSITARIA'),(5,4,'<p style=\"text-align:justify\">La administraci&oacute;n sirve de soporte al desempe&ntilde;o funcional, coadyuva en el &eacute;xito institucional mediante la coordinaci&oacute;n sistem&aacute;tica de medios.</p>\n\n<p style=\"text-align:justify\"><strong>Indicador:</strong></p>\n\n<p style=\"text-align:justify\">1. Porcentaje de usuarios universitarios satisfechos por tipo de servicio prestado.</p>',NULL,'objetivo26-10-2021-16-19-51.jpg',0,'2021-10-26 21:17:58','2021-10-26 21:19:51','1',1,0,NULL,NULL,'OEI.04 FORTALECER LA GESTIÓN INSTITUCIONAL'),(6,5,'<p style=\"text-align:justify\">La gesti&oacute;n de riesgos es un enfoque estructurado para manejar la incertidumbre relativa a una amenaza, a trav&eacute;s de una secuencia de actividades operativas que incluyen la identificaci&oacute;n, el an&aacute;lisis y la evaluaci&oacute;n de riesgo, para luego establecer las estrategias para su tratamiento, en &aacute;mbito institucional.</p>\n\n<p style=\"text-align:justify\"><strong>Indicador:</strong></p>\n\n<p style=\"text-align:justify\">1. Porcentaje de vulnerabilidad ambiental.</p>',NULL,'objetivo-26-10-2021-16-18-31.jpg',0,'2021-10-26 21:18:31','2021-10-26 21:18:31','1',1,0,NULL,NULL,'OEI.05 IMPLEMENTAR LA GESTIÓN DEL RIESGO DE DESASTRES');
/*!40000 ALTER TABLE `objetivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organigramas`
--

DROP TABLE IF EXISTS `organigramas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organigramas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_organigramas_facultads1_idx` (`facultad_id`),
  KEY `fk_organigramas_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_organigramas_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_organigramas_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organigramas`
--

LOCK TABLES `organigramas` WRITE;
/*!40000 ALTER TABLE `organigramas` DISABLE KEYS */;
/*!40000 ALTER TABLE `organigramas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organos`
--

DROP TABLE IF EXISTS `organos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `tipo` tinyint DEFAULT NULL COMMENT '1->rector\n2->vicerector 1\n3->vicerector 2\n4->asamblea univ\n5->consejo univ\n6->decano\n7->director escuela',
  `subtitulo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_presentacions_facultads1_idx` (`facultad_id`),
  KEY `fk_presentacions_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_presentacions_facultads10` FOREIGN KEY (`facultad_id`) REFERENCES `bdwebfec`.`facultads` (`id`),
  CONSTRAINT `fk_presentacions_programaestudios10` FOREIGN KEY (`programaestudio_id`) REFERENCES `bdwebfec`.`programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organos`
--

LOCK TABLES `organos` WRITE;
/*!40000 ALTER TABLE `organos` DISABLE KEYS */;
INSERT INTO `organos` VALUES (1,'Dr. Carlos Reyes Pareja','<h3><strong>Resumen</strong></h3>\n\n<p>Catedr&aacute;tico den la Unasam&nbsp;<strong>desde el a&ntilde;o 1980.</strong><br />\nDirector del Ciclo B&aacute;sico de la UNASAM - 1981.<br />\nPresidente de la Comisi&oacute;n de Gobierno Transitorio de la Facultad de Educaci&oacute;n<br />\n<strong>Primer Decano de la Facultad de Ciencias</strong>&nbsp;de la UNASAM, en el periodo del 04 de setiembre de 1997<br />\nVice-Rector Administrativo de la UNASAM&nbsp;<br />\nCoordinador General de la Filial UNASAM-Barranca<br />\nDecano de la Facultad de Ciencias del 2013 hasta 2019&nbsp;</p>\n\n<h3><strong>Hoja de Vida</strong></h3>\n\n<h4>Formaci&oacute;n acad&eacute;mica</h4>\n\n<ul>\n	<li><strong>Doctorado</strong><br />\n	F&Iacute;SICA<br />\n	UNIVERSIDAD SAN PEDRO<br />\n	octubre 2017<br />\n	HUARAZ - PE</li>\n	<li><strong>Maestr&iacute;a</strong><br />\n	CIENCIAS E INGENIER&Iacute;A CON MENCI&Oacute;N EN COMPUTACI&Oacute;N E INFORM&Aacute;TICA<br />\n	UNIVERSIDAD NACIONAL SANTIAGO ANT&Uacute;NEZ DE MAYOLO<br />\n	abril 2007<br />\n	HUARAZ - PE</li>\n	<li><strong>Licenciatura</strong><br />\n	F&Iacute;SICA<br />\n	UNIVERSIDAD NACIONAL DE TRUJILLO<br />\n	setiembre 1980<br />\n	TRUJILLO - PE</li>\n</ul>\n\n<p><a href=\"https://dji.pide.gob.pe/consultas-dji/descarga_dni.php?dni=31614036\">Declaraci&oacute;n Jurada de Intereses</a></p>',1,'organo_gobierno-25-10-2021-23-01-18.jpg',0,1,0,'2021-10-26 04:01:18','2021-10-26 04:01:18',1,NULL,NULL,1,'Resolución: R.R. N° 001-UNASAM'),(2,'Dr. Marco Antonio Silva Lindo','<h3><strong>Resumen</strong></h3>\n\n<p>Ingeniero Civil - UNASAM</p>\n\n<p>Mag&iacute;ster en Ingenier&iacute;a</p>\n\n<p>Posgrado en Ingenier&iacute;a Estructural</p>\n\n<p>Doctorado en Ingenier&iacute;a Ambiental<br />\n&nbsp;</p>\n\n<p><strong>&nbsp;LABOR UNIVERSITARIA</strong><br />\n&nbsp;</p>\n\n<p>Catedr&aacute;tico en la UNASAM desde 1990&nbsp;</p>\n\n<p>Jefe de la Oficina de Proyecci&oacute;n Social</p>\n\n<p>Director de la Escuela de Ing. Civil</p>\n\n<p>Director del Departamento Acad&eacute;mico de Ing. Civil</p>\n\n<p>Director del Instituto de Investigaci&oacute;n de la Facultad de Ing. Civil</p>\n\n<p>Jefe del Centro de Calidad Universitaria de la Facultad Ing. Civil&nbsp;</p>\n\n<p>Actual Decano de la Facultad de Ing. Civil<br />\n&nbsp;</p>\n\n<p><strong>PRODUCCI&Oacute;N INTELECTUAL</strong></p>\n\n<p>4 libros y manuales</p>\n\n<p>6 proyectos de investigaci&oacute;n</p>\n\n<p>18 art&iacute;culos publicados en revistas y libros especializados<br />\n&nbsp;</p>\n\n<h3><strong>Hoja de Vida</strong></h3>\n\n<h4>Formaci&oacute;n acad&eacute;mica</h4>\n\n<ul>\n	<li><strong>Maestr&iacute;a</strong><br />\n	Magister en Ingenieria<br />\n	Pontifica Universidad Catolica del Per&uacute;<br />\n	julio 1992<br />\n	Lima - Per&uacute; -</li>\n	<li><strong>T&iacute;tulo</strong><br />\n	Ingeniero Civil<br />\n	Universidad Nacional de Ancash &quot;Santiago Antunez de Mayolo&quot;<br />\n	octubre 1980<br />\n	Huaraz - Ancash - Per&uacute;&nbsp;</li>\n</ul>\n\n<p><a href=\"https://dji.pide.gob.pe/consultas-dji/descarga_dni.php?dni=31621028\">Declaraci&oacute;n Jurada de Intereses</a></p>',1,'organo_gobierno-25-10-2021-23-07-20.jpg',0,1,0,'2021-10-26 04:07:21','2021-10-26 04:07:21',1,NULL,NULL,2,'Resolución: Resolución Rectoral Nº 002-2021-UNASAM'),(3,'Dra. Consuelo Teresa Valencia Vera','<h3><strong>Resumen</strong></h3>\n\n<p>Licenciada en Obstetricia</p>\n\n<p>Maestr&iacute;a en Salud Publica, con menci&oacute;n en Servicios de Salud</p>\n\n<p>Doctorado en Salud P&uacute;blica</p>\n\n<p>&nbsp;</p>\n\n<p><strong>LABOR UNIVERSITARIA</strong></p>\n\n<p>Catedr&aacute;tico en la UNASAM desde el 2000</p>\n\n<p>Jefe de Departamento Acad&eacute;mico de Ciencias de la Salud</p>\n\n<p>Directora de la Escuela de Obstetricia</p>\n\n<p>Decana de la FCM</p>\n\n<p>Secretaria General de la FCM</p>\n\n<p>Directora de la Unidad de Postgrado de la FCM</p>\n\n<p>Miembro del comit&eacute; Autoevaluaci&oacute;n y Acreditaci&oacute;n de la Escuela de Obstetricia&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><strong>TRABAJOS DE INVESTIGACI&Oacute;N:</strong></p>\n\n<p>9 trabajos de investigaci&oacute;n&nbsp;</p>\n\n<p>Reconocimiento por la FENDUP, por sus acciones sindicales por la reivindicaci&oacute;n de los derechos de los Docentes&nbsp;</p>\n\n<p><a href=\"https://dji.pide.gob.pe/consultas-dji/descarga_dni.php?dni=31678026\">Declaraci&oacute;n Jurada de intereses</a></p>',1,'organo_gobierno-25-10-2021-23-10-47.jpg',0,1,0,'2021-10-26 04:10:47','2021-10-26 04:10:47',1,NULL,NULL,3,'Resolución: R.R. N° 003-UNASAM'),(4,'Asamblea Universitaria','<p style=\"text-align:justify\">La Asamblea Universitaria es el m&aacute;ximo &oacute;rgano colegiado de gobierno de la universidad. Se re&uacute;ne en sesiones ordinarias y extraordinarias. Sus integrantes e invitados a las sesiones los determina el Estatuto y el Reglamento Interno de la Asamblea Universitaria, respectivamente. Las comisiones permanentes de la Asamblea son anuales y se constituyen en la primera asamblea ordinaria, bajo responsabilidad del rector y presidente de la Asamblea Universitaria.</p>\n\n<p style=\"text-align:justify\"><strong>Miembros de Asamble Universitaria</strong></p>\n\n<ul>\n	<li style=\"text-align: justify;\">Rector quien la preside (1).</li>\n	<li style=\"text-align: justify;\">Los Vicerrectores (2).</li>\n	<li style=\"text-align: justify;\">Los Decanos de Facultades (11).</li>\n	<li style=\"text-align: justify;\">El Director de la Escuela de Postgrado (01).</li>\n	<li style=\"text-align: justify;\">Treinta (30) representantes de los docentes de las diversas facultades, en n&uacute;mero igual al doble de la suma de las autoridades universitarias a que se refieren los incisos anteriores. Estan representados de la siguiente manera:<br />\n	- 50% o quince (15) profesores principales.<br />\n	- 30% o nueve (09) profesores asociados.<br />\n	- 20% o seis (06) profesores auxiliares.</li>\n	<li style=\"text-align: justify;\">Veintid&oacute;s (22) representantes de los estudiantes de pregrado y Postgrado, que constituyen el tercio del total de los miembros de la Asamble Universitaria. Estan representados de la siguiente manera:<br />\n	- Veinti&uacute;m (21) estudiantes de pregrado.<br />\n	- Un (01) representante de los graduados de la UNASAM, como supernumerario, con derecho a voz y a voto.<br />\n	- Sus miembros docentes son elegidos por dos a&ntilde;os y los estudiantes y graduados por un a&ntilde;o</li>\n	<li style=\"text-align: justify;\">El Director General de Administraci&oacute;n asisten a la Asamblea Universitaria con derecho a voz, sin voto.</li>\n	<li style=\"text-align: justify;\">Los funcionarios administrativos del mas alto nivel, asisten cuando son requeridos por la Asamblea Universitaria como asesores, sin derecho a voto.</li>\n</ul>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Funciones de Asamblea universitaria</strong></p>\n\n<ul>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar las pol&iacute;ticas de desarrollo de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Reformar el Estatuto de la UNASAM con la aprobaci&oacute;n de por lo menos dos tercios del n&uacute;mero de sus miembros h&aacute;biles y remitir el nuevo Estatuto a la SUNEDU.</li>\n	<li style=\"text-align: justify;\">&nbsp;Velar por el adecuado cumplimiento de los instrumentos de planeamiento de la UNASAM, aprobados por el Consejo Universitario.</li>\n	<li style=\"text-align: justify;\">&nbsp;Declarar la revocatoria y vacancia del Rector y los Vicerrectores, de acuerdo a las causales expresamente se&ntilde;aladas en la Ley Universitaria N&deg; 30220 y el Estatuto; y a trav&eacute;s de una votaci&oacute;n calificada de dos tercios del n&uacute;mero de miembros h&aacute;biles.</li>\n	<li style=\"text-align: justify;\">&nbsp;Elegir a los integrantes del Comit&eacute; Electoral Universitario y del Tribunal de Honor Universitario.</li>\n	<li style=\"text-align: justify;\">&nbsp;Designar anualmente entre sus miembros a los integrantes de la Comisi&oacute;n Permanente encargada de fiscalizar la gesti&oacute;n de la UNASAM. Los resultados de dicha fiscalizaci&oacute;n se informar&aacute;n a la Contralor&iacute;a General de la Rep&uacute;blica y a la SUNEDU .</li>\n	<li style=\"text-align: justify;\">&nbsp;Evaluar y aprobar la memoria anual, el informe semestral de gesti&oacute;n del Rector y el informe de rendici&oacute;n de cuentas del presupuesto anual ejecutado.</li>\n	<li style=\"text-align: justify;\">&nbsp;Acordar la constituci&oacute;n, fusi&oacute;n, reorganizaci&oacute;n, separaci&oacute;n y supresi&oacute;n de Facultades, Unidades de Postgrado, Escuelas Profesionales, Departamentos Acad&eacute;micos, Centros e Institutos de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Declarar en receso temporal a la Universidad o a cualquiera de sus unidades acad&eacute;micas, cuando las circunstancias lo requieran, con cargo a informar a la SUNEDU.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aceptar la renuncia del Rector y Vicerrectores.</li>\n	<li style=\"text-align: justify;\">&nbsp;Conocer y ratificar el Presupuesto de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Designar comisiones que establece el Estatuto y las que se consideren convenientes, asignado los medios necesarios para la operatividad de las mismas.</li>\n	<li style=\"text-align: justify;\">&nbsp;Resolver en &uacute;ltima instancia asuntos de emergencia en la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Otras funciones que le otorgan la ley, el Estatuto y los Reglamentos Internos de la UNASAM.</li>\n</ul>',1,'organo_gobierno-25-10-2021-23-30-21.jpg',0,1,0,'2021-10-26 04:30:21','2021-10-26 04:30:21',1,NULL,NULL,4,''),(5,'Concejo Universitario','<p style=\"text-align:justify\">El Consejo Universitario es el &oacute;rgano de direcci&oacute;n superior, de promoci&oacute;n y de ejecuci&oacute;n de la Universidad.</p>\n\n<h4 style=\"text-align:justify\"><strong>Miembros del Consejo Universitario</strong></h4>\n\n<ul>\n	<li style=\"text-align: justify;\">Rector quien la preside (01).</li>\n	<li style=\"text-align: justify;\">Los Vicerrectores (02).</li>\n	<li style=\"text-align: justify;\">Tres (03) Decanos, que representan a un cuarto del total de decanos, elegidos por y entre ellos, convocado por el decano de mayor precedencia, por un periodo de vigencia de un a&ntilde;o. Los dem&aacute;s decanos podr&aacute;n asistir con voz, pero sin voto.</li>\n	<li style=\"text-align: justify;\">El Director de la Escuela de Postgrado (01).</li>\n	<li style=\"text-align: justify;\">Representantes de los estudiantes regulares, que constituyen un tercio del n&uacute;mero total de los miembros de consejo, sin considerar la fracci&oacute;n a favor si la hubiera. Deben pertenecer al tercio superior y haber aprobado como min&iacute;mo (36) treinta y seris cr&eacute;ditos</li>\n	<li style=\"text-align: justify;\">Un (01) representante de los graduados, con voz y voto.</li>\n	<li style=\"text-align: justify;\">El Secretario General de la UNASAM participa en calidad de Secretario del Consejo Universitario, con voz, sin voto.</li>\n	<li style=\"text-align: justify;\">El Director General de Administraci&oacute;n asiste al Consejo Universitario con derecho a voz, sin voto.</li>\n	<li style=\"text-align: justify;\">Podr&aacute;n asistir al Consejo Universitario s&oacute;lo con voz y sin voto, los representantes de los gremios de los docentes, de los estudiantes y de los administrativos debidamente reconocidos</li>\n	<li style=\"text-align: justify;\">Los funcionarios Administrativos, asisten invidos por el Rector cuando los temas a tratar lo requieran con derecho a voz y sin voto.</li>\n</ul>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<h4 style=\"text-align:justify\"><strong>Funciones del Consejo Universitario</strong></h4>\n\n<ul>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar la propuesta del Rector, los instrumentos de planeamiento de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar el reglamento general de la UNASAM, el reglamento de elecciones y otros reglamentos internos especiales, as&iacute; como vigilar su cumplimiento.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar el presupuesto general de la UNASAM, el plan anual de adquisiciones de bienes y servicios, el Manual de Procedimientos Administrativos (MAPRO), autorizar los actos y contratos que ata&ntilde;en a la UNASAM y resolver todo lo pertinente a su econom&iacute;a.</li>\n	<li style=\"text-align: justify;\">&nbsp;Proponer a la Asamblea Universitaria la creaci&oacute;n, fusi&oacute;n, supresi&oacute;n o reorganizaci&oacute;n de unidades acad&eacute;micas e institutos de investigaci&oacute;n.</li>\n	<li style=\"text-align: justify;\">&nbsp;Ratificar los curr&iacute;culos de estudios que conducen al grado acad&eacute;mico o al t&iacute;tulo profesional, en los niveles de pregrado y Postgrado, aprobados por las Facultades o la Escuela de Postgrado.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar las modalidades de ingreso e incorporaci&oacute;n a la UNASAM. Asimismo, se&ntilde;alar anualmente el n&uacute;mero de vacantes para el proceso ordinario de admisi&oacute;n, previa propuesta de las facultades, en concordancia con el presupuesto y el plan de desarrollo de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar las modalidades de ingreso e incorporaci&oacute;n a la universidad, anualmente, el n&uacute;mero de vacantes del concurso de admisi&oacute;n ordinario para estudios de pregrado regulares, previa propuesta de las facultades, en concordancia con el presupuesto y el plan de desarrollo de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aprobar el calendario anual de actividades acad&eacute;micas del pregrado para estudios regulares.</li>\n	<li style=\"text-align: justify;\">&nbsp;Conferir los grados acad&eacute;micos y los t&iacute;tulos profesionales aprobados por las Facultades y la Escuela de Postgrado, as&iacute; como otorgar distinciones honor&iacute;ficas.</li>\n	<li style=\"text-align: justify;\">&nbsp;Ratificar la revalidaci&oacute;n de los estudios, grados y t&iacute;tulos de universidades extranjeras. Los expedientes de revalidaci&oacute;n deben ser aprobados previamente en las Facultades o la Escuela de Postgrado.</li>\n	<li style=\"text-align: justify;\">&nbsp;Designar al Secretario General, Director General de Administraci&oacute;n y Directores Generales de las unidades org&aacute;nicas, de la terna propuesta por el Rector o Vicerrectores.</li>\n	<li style=\"text-align: justify;\">&nbsp;Nombrar, contratar, ratificar, promover y remover a los docentes, a propuesta de los respectivos Consejos de Facultad.</li>\n	<li style=\"text-align: justify;\">&nbsp;Nombrar, contratar, promover y remover al personal administrativo, a propuesta de los respectivos Consejos de Facultad.</li>\n	<li style=\"text-align: justify;\">&nbsp;Ejercer en instancia revisora, el proceso disciplinario sobre los docentes y/o estudiantes, en la forma y grado que lo determinen los reglamentos.</li>\n	<li style=\"text-align: justify;\">&nbsp;Autorizar la celebraci&oacute;n de convenios con universidades, organismos gubernamentales y no gubernamentales, instituciones, nacionales e internacionales y otros sobre investigaci&oacute;n cient&iacute;fica y tecnol&oacute;gica.</li>\n	<li style=\"text-align: justify;\">&nbsp;Autorizar los viajes fuera del pa&iacute;s en comisi&oacute;n de servicio de los miembros de la comunidad universitaria y recibir los informes correspondientes.</li>\n	<li style=\"text-align: justify;\">&nbsp;Aceptar legados y donaciones.</li>\n	<li style=\"text-align: justify;\">&nbsp;Invitar a los Decanos que no conforman el Consejo Universitario vigente para sustentar asuntos de inter&eacute;s presentados por su Facultad y/o de la Universidad.</li>\n	<li style=\"text-align: justify;\">&nbsp;Conocer y resolver todos los dem&aacute;s asuntos que no est&aacute;n encomendados a otras autoridades universitarias.</li>\n	<li style=\"text-align: justify;\">&nbsp;Nombrar comisiones, aquellas que no son competencia de la asamblea.</li>\n	<li style=\"text-align: justify;\">&nbsp;Evaluar, ratificar y remover a los funcionarios responsables de las diferentes unidades org&aacute;nicas de la UNASAM.</li>\n	<li style=\"text-align: justify;\">&nbsp;Pronunciarse en segunda y &uacute;ltima instancia sobre la vacancia de los Decanos, declarada por los Consejos de Facultad.</li>\n	<li style=\"text-align: justify;\">&nbsp;Fijar las remuneraciones y todo concepto de ingresos de las autoridades, docentes y trabajadores de acuerdo a ley.</li>\n	<li style=\"text-align: justify;\">&nbsp;Ratificar el uso de licencias por capacitaci&oacute;n a los docentes y autorizar el uso de licencias del personal administrativo por periodos mayores a treinta d&iacute;as a propuesta del Consejo de Facultad o de su unidad administrativa, respectivamente.</li>\n	<li style=\"text-align: justify;\">&nbsp;Ratificar la licencia por a&ntilde;o sab&aacute;tico a propuesta del Consejo de Facultad.</li>\n	<li style=\"text-align: justify;\">&nbsp;Autorizar la licencia por comisi&oacute;n de servicio a las autoridades y funcionarios por periodos mayores de quince d&iacute;as.</li>\n	<li style=\"text-align: justify;\">&nbsp;Otorgar premios, becas, distinciones a miembros de la comunidad universitaria y/o personalidades que contribuyan al desarrollo de la universidad.</li>\n	<li style=\"text-align: justify;\">&nbsp;Otras que se&ntilde;alen la Ley y el Reglamento de Organizaci&oacute;n y Funciones de la UNASAM.</li>\n</ul>',1,'organo_gobierno-25-10-2021-23-32-21.jpg',0,1,0,'2021-10-26 04:32:21','2021-10-26 04:32:21',1,NULL,NULL,5,'');
/*!40000 ALTER TABLE `organos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tipo` tinyint DEFAULT NULL COMMENT '1 -> ingreso\n2 -> egreso',
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienelink` tinyint DEFAULT NULL,
  `urllink` varchar(2500) DEFAULT NULL,
  `textolink` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudio_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfiles_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_perfiles_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL COMMENT '0->unasam\n1->facultades\n2->escuelas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` tinyint DEFAULT NULL COMMENT '1 -> todos\n0 -> segun rol',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (6,0,1,2,'2021-11-10 04:49:22','2021-11-10 04:49:22',1,8),(13,4,0,1,'2021-11-18 17:11:13','2021-11-18 17:11:13',0,6),(18,0,0,0,'2021-11-18 19:07:51','2021-11-18 19:07:51',0,6),(19,6,0,1,'2021-11-18 19:15:13','2021-11-18 19:15:13',0,6),(20,7,0,1,'2021-11-18 19:15:30','2021-11-18 19:15:30',0,6);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` varchar(20) DEFAULT NULL,
  `apellidos` varchar(500) DEFAULT NULL,
  `nombres` varchar(500) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `cargo` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'99999999','Del Castillo','Max','943852951','Huaraz','Administrador del Sistema',1,0,NULL,NULL),(2,'15985235','Quiroz','Rocío','987458254','Huaraz','Cajera',1,0,'2021-10-03 06:56:34','2021-10-03 06:56:34'),(3,'159753852','Palma','Rosa',NULL,NULL,'Editor',1,0,'2021-10-04 00:01:52','2021-10-04 00:01:52'),(4,'147885256','Torres','Carmen',NULL,NULL,'cargo',1,0,'2021-11-10 04:26:01','2021-11-10 04:26:01'),(5,'75395185','Torres','Javier','9999999999','Huaraz','cargo2',1,0,'2021-11-10 04:27:13','2021-11-10 04:27:13'),(6,'96325874','Chavez','Hector','12345678','Peru','cargo4',1,0,'2021-11-10 04:31:29','2021-11-10 04:31:29'),(7,'74312694','Gonzales','Gloria',NULL,'Huaraz2','cargo5',1,0,'2021-11-10 04:32:48','2021-11-10 04:45:30');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planestudios`
--

DROP TABLE IF EXISTS `planestudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planestudios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programaestudios_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_planestudios_programaestudios1_idx` (`programaestudios_id`),
  CONSTRAINT `fk_planestudios_programaestudios1` FOREIGN KEY (`programaestudios_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planestudios`
--

LOCK TABLES `planestudios` WRITE;
/*!40000 ALTER TABLE `planestudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `planestudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataformas`
--

DROP TABLE IF EXISTS `plataformas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataformas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataformas`
--

LOCK TABLES `plataformas` WRITE;
/*!40000 ALTER TABLE `plataformas` DISABLE KEYS */;
INSERT INTO `plataformas` VALUES (1,'sA ed','as ed',0,1,'2021-10-24 04:04:38','2021-10-24 04:05:42',0,1,NULL,NULL),(2,'Sistema de Actas y Resoluciones (SISRES)','http://sisres.unasam.edu.pe/',1,0,'2021-10-24 04:06:30','2021-10-24 04:06:30',0,1,NULL,NULL),(3,'Sistema Virtual de Aprendizaje - SVA','http://campus.unasam.edu.pe/',1,0,'2021-10-24 04:07:11','2021-10-24 04:07:11',0,1,NULL,NULL),(4,'Sistema de gestión Académica UNASAM','http://sga.unasam.edu.pe/login',1,0,'2021-10-24 04:07:40','2021-10-24 04:07:40',0,1,NULL,NULL),(5,'Sistema Virtual de Biblioteca - KOHA','http://koha.unasam.edu.pe/',1,0,'2021-10-24 04:08:11','2021-10-24 04:08:11',0,1,NULL,NULL),(6,'Repositorio Institucional Digital UNASAM','http://repositorio.unasam.edu.pe/',1,0,'2021-10-24 04:08:44','2021-10-24 04:08:44',0,1,NULL,NULL),(7,'Portal de la Escuela de Postgrado UNASAM','http://postgrado.unasam.edu.pe/',1,0,'2021-10-24 04:09:22','2021-10-24 04:09:22',0,1,NULL,NULL),(8,'Sistema de gestión Académica Postgrado','http://sgapg.unasam.edu.pe/login',1,0,'2021-10-24 04:09:53','2021-10-24 04:43:13',0,1,NULL,NULL),(9,'Centro de Idiomas UNASAM','http://cid.unasam.edu.pe/',1,0,'2021-10-24 04:10:29','2021-10-24 04:10:29',0,1,NULL,NULL),(10,'Centro Pre Universitario UNASAM','http://cpu.unasam.edu.pe/',1,0,'2021-10-24 04:11:05','2021-10-24 04:11:05',0,1,NULL,NULL),(11,'Portal de Investigación UNASAM','http://investigacion.unasam.edu.pe/',1,0,'2021-10-24 04:11:30','2021-10-24 04:11:30',0,1,NULL,NULL),(12,'Educación no Presencial trabajo Remoto GUIAS','http://guias.unasam.edu.pe/',1,0,'2021-10-24 04:12:05','2021-10-24 04:12:05',0,1,NULL,NULL);
/*!40000 ALTER TABLE `plataformas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `politicacalidads`
--

DROP TABLE IF EXISTS `politicacalidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `politicacalidads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` int DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_politicacalidads_facultads1_idx` (`facultad_id`),
  KEY `fk_politicacalidads_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_politicacalidads_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_politicacalidads_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `politicacalidads`
--

LOCK TABLES `politicacalidads` WRITE;
/*!40000 ALTER TABLE `politicacalidads` DISABLE KEYS */;
/*!40000 ALTER TABLE `politicacalidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacions`
--

DROP TABLE IF EXISTS `presentacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presentacions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `subtitulo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_presentacions_facultads1_idx` (`facultad_id`),
  KEY `fk_presentacions_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_presentacions_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_presentacions_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacions`
--

LOCK TABLES `presentacions` WRITE;
/*!40000 ALTER TABLE `presentacions` DISABLE KEYS */;
INSERT INTO `presentacions` VALUES (1,'Bienvenidos al Portal Web de la Facultad de Economía y Contabilidad','<p>Es un grato placer brindarles la bienvenida al portal web de la Facultad de Econom&iacute;a y Contabilidad.</p>\n\n<ul>\n	<li>Es un grato placer brindarles la bienvenida al portal web de la Facultad de Econom&iacute;a y Contabilidad.</li>\n	<li>Es un grato placer brindarles la bienvenida al portal web de la Facultad de Econom&iacute;a y Contabilidad.</li>\n</ul>',1,'presentacion_fec-19-11-2021-22-48-41.jpg',1,1,0,'2021-10-09 21:00:18','2021-11-20 03:48:41',1,1,NULL,'Subtitulo FEC'),(2,'Bienvenido','<p style=\"text-align:justify\">La Universidad Nacional Santiago Ant&uacute;nez de Mayolo les da la bienvenida a su nuevo Portal Web Institucional.&nbsp;Descubre las actividades que tenemos para ti en tu etapa universitaria.</p>\n\n<p style=\"text-align:justify\">La UNASAM es lacasa superior de estudios de la regi&oacute;n &Aacute;ncash. Con 11 facultades y 24 carreras profesionales, licenciada por la SUNEDU. Creado el 24 de mayo de 1977 por Decreto Ley N.&ordm; 21856.&nbsp;Es una instituci&oacute;n que presta un servicio p&uacute;blico de educaci&oacute;n superior mediante el estudio, la docencia y la investigaci&oacute;n, as&iacute; como la generaci&oacute;n, el desarrollo y la difusi&oacute;n del conocimiento al servicio de la sociedad y de la ciudadan&iacute;a.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>',1,'presentacion_fec-27-10-2021-18-09-03.png',0,1,0,'2021-10-21 05:26:08','2021-10-27 23:09:03',1,NULL,NULL,'Al renovado portal de la UNASAM');
/*!40000 ALTER TABLE `presentacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programaestudios`
--

DROP TABLE IF EXISTS `programaestudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programaestudios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `direccion` varchar(500) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL COMMENT 'nivel 2 -> corresponde a programas de estudios',
  `facultad_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_programaestudios_facultads_idx` (`facultad_id`),
  CONSTRAINT `fk_programaestudios_facultads` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programaestudios`
--

LOCK TABLES `programaestudios` WRITE;
/*!40000 ALTER TABLE `programaestudios` DISABLE KEYS */;
INSERT INTO `programaestudios` VALUES (1,'Contabilidad','Contabilidad','Av Universitaria s/n - Shancayan','-','contabilidad@unasam.edu.pe',1,0,NULL,'2021-10-30 22:38:57',1,2,1),(2,'Economía','Economía','Av Universitaria s/n - Shancayan','-','economia@unasam.edu.pe',1,0,NULL,'2021-10-30 22:39:05',1,2,1),(3,'Administración','','','','',1,0,'2021-10-30 22:35:57','2021-10-30 22:35:57',1,2,2),(4,'asdsad ed','','','','',0,1,'2021-10-30 22:36:02','2021-10-30 22:36:19',1,2,5),(5,'Turismo','','','','',1,0,'2021-10-30 22:36:26','2021-10-30 22:36:26',1,2,2),(6,'Estadística e Informática','','','','',1,0,'2021-10-30 22:36:36','2021-10-30 22:36:36',1,2,4),(7,'Ingeniería de Sistemas e Informática','','','','',1,0,'2021-10-30 22:36:42','2021-10-30 22:36:42',1,2,4),(8,'Matemática','','','','',1,0,'2021-10-30 22:36:49','2021-10-30 22:36:49',1,2,4),(9,'Agronomía','','','','',1,0,'2021-10-30 22:36:55','2021-10-30 22:36:55',1,2,5),(10,'Ingeniería agrícola','','','','',1,0,'2021-10-30 22:37:03','2021-10-30 22:37:03',1,2,5),(11,'Ingeniería ambiental','','','','',1,0,'2021-10-30 22:37:16','2021-10-30 22:37:16',1,2,6),(12,'Ingeniería sanitaria','','','','',1,0,'2021-10-30 22:37:23','2021-10-30 22:37:23',1,2,6),(13,'Enfermería','','','','',1,0,'2021-10-30 22:37:35','2021-10-30 22:37:35',1,2,7),(14,'Obstetricia','','','','',1,0,'2021-10-30 22:37:41','2021-10-30 22:37:41',1,2,7),(15,'Arqueología','','','','',1,0,'2021-10-30 22:37:48','2021-10-30 22:37:48',1,2,8),(16,'Ciencias de la comunicación','','','','',1,0,'2021-10-30 22:37:58','2021-10-30 22:37:58',1,2,8),(17,'Comunicación lingüística y literatura','','','','',1,0,'2021-10-30 22:38:11','2021-10-30 22:38:11',1,2,8),(18,'Educación primaria bilingüe intercultural','','','','',1,0,'2021-10-30 22:38:21','2021-10-30 22:38:21',1,2,8),(19,'Lengua extranjera ingles','','','','',1,0,'2021-10-30 22:38:29','2021-10-30 22:38:29',1,2,8),(20,'Matemática e informática','','','','',1,0,'2021-10-30 22:38:38','2021-10-30 22:38:38',1,2,8),(21,'Derecho y ciencias políticas','','','','',1,0,'2021-10-30 22:38:48','2021-10-30 22:38:48',1,2,9),(22,'Arquitectura y urbanismo','','','','',1,0,'2021-10-30 22:39:59','2021-10-30 22:39:59',1,2,10),(23,'Ingeniería civil','','','','',1,0,'2021-10-30 22:40:07','2021-10-30 22:40:07',1,2,10),(24,'Ingeniería de industrias alimentarias','','','','',1,0,'2021-10-30 22:40:19','2021-10-30 22:40:19',1,2,11),(25,'Ingeniería industrial','','','','',1,0,'2021-10-30 22:40:27','2021-10-30 22:40:27',1,2,11),(26,'Ingeniería de minas','','','','',1,0,'2021-10-30 22:40:38','2021-10-30 22:40:38',1,2,12);
/*!40000 ALTER TABLE `programaestudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redsocials`
--

DROP TABLE IF EXISTS `redsocials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `redsocials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `url` varchar(2500) DEFAULT NULL,
  `urlredsocial` varchar(2500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_redsocials_programaestudios1_idx` (`programaestudio_id`),
  KEY `fk_redsocials_facultads1_idx` (`facultad_id`),
  CONSTRAINT `fk_redsocials_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_redsocials_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redsocials`
--

LOCK TABLES `redsocials` WRITE;
/*!40000 ALTER TABLE `redsocials` DISABLE KEYS */;
INSERT INTO `redsocials` VALUES (1,'Faceebook','redsocial_fec10-10-2021-19-13-14.png','https://www.facebook.com/Facultad-de-Econom%C3%ADa-y-Contabilidad-Oficial-789992894440808/',1,1,'2021-10-11 00:09:44','2021-10-11 00:13:24',1,1,NULL,1),(2,'asdas','redsocial_fec10-10-2021-19-39-07.png','adasd',1,1,'2021-10-11 00:34:20','2021-10-11 00:39:24',1,1,NULL,1),(3,'hg','redsocial_fec-10-10-2021-19-39-35.png','ghf',1,1,'2021-10-11 00:39:35','2021-10-11 00:41:38',1,1,NULL,1),(4,'Faceebok','redsocial_20-11-2021-01-05-19.png','https://www.facebook.com/Facultad-de-Econom%C3%ADa-y-Contabilidad-Oficial-789992894440808/',1,0,'2021-10-11 00:41:48','2021-11-20 06:05:56',1,1,NULL,1),(5,'Facebook e','redsocial_fec24-10-2021-00-58-34.jpg','https://www.facebook.com/UnasamOficial d',1,1,'2021-10-24 05:57:54','2021-10-24 05:58:41',0,1,NULL,NULL),(6,'Facebook','redsocial_24-10-2021-01-15-36.png','https://www.facebook.com/UnasamOficial',1,0,'2021-10-24 05:59:09','2021-10-24 06:15:36',0,1,NULL,NULL),(7,'Youtube','redsocial_24-10-2021-01-15-46.png','https://www.youtube.com/channel/UCHUxOdDI4zrMgghSpTDxttw',1,0,'2021-10-24 06:00:43','2021-10-24 06:15:46',0,1,NULL,NULL),(8,'Instagram','redsocial_24-10-2021-01-15-54.png','https://www.instagram.com/unasam_oficial/',1,0,'2021-10-24 06:02:48','2021-10-24 06:15:54',0,1,NULL,NULL),(9,'Youtube','redsocial_-20-11-2021-01-06-40.png','https://www.youtube.com/channel/UCvQ7342ARHLe_DcX8eDfpcw',1,0,'2021-11-20 06:06:41','2021-11-20 06:06:41',1,1,NULL,1);
/*!40000 ALTER TABLE `redsocials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revistas`
--

DROP TABLE IF EXISTS `revistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `revistas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `tieneimagen` tinyint DEFAULT NULL,
  `urlimagen` varchar(2500) DEFAULT NULL,
  `tienerevista` tinyint DEFAULT NULL,
  `urlrevista` varchar(2500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_revistas_facultads1_idx` (`facultad_id`),
  KEY `fk_revistas_programaestudios1_idx` (`programaestudio_id`),
  CONSTRAINT `fk_revistas_facultads1` FOREIGN KEY (`facultad_id`) REFERENCES `facultads` (`id`),
  CONSTRAINT `fk_revistas_programaestudios1` FOREIGN KEY (`programaestudio_id`) REFERENCES `programaestudios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revistas`
--

LOCK TABLES `revistas` WRITE;
/*!40000 ALTER TABLE `revistas` DISABLE KEYS */;
/*!40000 ALTER TABLE `revistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolmodulos`
--

DROP TABLE IF EXISTS `rolmodulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolmodulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `modulo_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rolessub` tinyint DEFAULT NULL COMMENT '1 -> todos\n0 -> segun submodulo',
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `nivel` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rolmodulos_modulos1_idx` (`modulo_id`),
  CONSTRAINT `fk_rolmodulos_modulos1` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolmodulos`
--

LOCK TABLES `rolmodulos` WRITE;
/*!40000 ALTER TABLE `rolmodulos` DISABLE KEYS */;
INSERT INTO `rolmodulos` VALUES (11,6,1,'2021-11-18 19:08:15','2021-11-18 19:08:15',0,0,0,0);
/*!40000 ALTER TABLE `rolmodulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolsubmodulos`
--

DROP TABLE IF EXISTS `rolsubmodulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolsubmodulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nivel` tinyint DEFAULT NULL COMMENT '0->unasam\n1->facultads\n2->escuelas',
  `modulo_id` int DEFAULT NULL,
  `submodulo_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `facultad_id` int DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_roles_submodulos1_idx` (`submodulo_id`),
  CONSTRAINT `fk_roles_submodulos1` FOREIGN KEY (`submodulo_id`) REFERENCES `submodulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolsubmodulos`
--

LOCK TABLES `rolsubmodulos` WRITE;
/*!40000 ALTER TABLE `rolsubmodulos` DISABLE KEYS */;
INSERT INTO `rolsubmodulos` VALUES (8,0,1,2,'2021-11-18 19:08:15','2021-11-18 19:08:15',6,0,0),(9,0,1,1,'2021-11-18 19:08:33','2021-11-18 19:08:33',6,0,0);
/*!40000 ALTER TABLE `rolsubmodulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submodulos`
--

DROP TABLE IF EXISTS `submodulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submodulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `submodulo` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `modulo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_submodulos_modulos_idx` (`modulo_id`),
  CONSTRAINT `fk_submodulos_modulos` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submodulos`
--

LOCK TABLES `submodulos` WRITE;
/*!40000 ALTER TABLE `submodulos` DISABLE KEYS */;
INSERT INTO `submodulos` VALUES (1,'Configuraciones Principales',1,0,NULL,NULL,1),(2,'Gestión de Banners',1,0,NULL,NULL,1),(3,'Gestión de Presentación',1,0,NULL,NULL,1),(4,'Gestión de Datos Generales',1,0,NULL,NULL,1),(5,'Gestión de Noticias',1,0,NULL,NULL,1),(6,'Gestión de Eventos',1,0,NULL,NULL,1),(7,'Gestión de Actividades',1,0,NULL,NULL,1),(8,'Gestión de Plataformas',1,0,NULL,NULL,1),(9,'Gestión de Redes Sociales',1,0,NULL,NULL,1),(10,'Gestión de Links de Interés',1,0,NULL,NULL,1),(11,'Gestión de Historia',1,0,NULL,NULL,2),(12,'Gestión de Misión / Visión',1,0,NULL,NULL,2),(13,'Gestión del Rector',1,0,NULL,NULL,2),(14,'Vicerrector Académico',1,0,NULL,NULL,2),(15,'Vicerrector de Investigación',1,0,NULL,NULL,2),(16,'Asamblea Universitaria',1,0,NULL,NULL,2),(17,'Concejo Universitario',1,0,NULL,NULL,2),(18,'Objetivos Estratégicos',1,0,NULL,NULL,2),(19,'Gestión del Estatuto',1,0,NULL,NULL,2),(20,'Gestión de Licenciamiento',1,0,NULL,NULL,2),(21,'Gestión de Acreditación',1,0,NULL,NULL,2),(22,'Gestión del Himno Institucional',1,0,NULL,NULL,2),(23,'Documentos Normativos',1,0,NULL,NULL,2),(24,'Informes y Publicaciones',1,0,NULL,NULL,2),(25,'Gestión de Facultades',2,0,NULL,NULL,3),(26,'Programas de Estudios',2,0,NULL,NULL,3),(27,'Logo Principal',1,0,NULL,NULL,4),(28,'Gestión de Banners',1,0,NULL,NULL,4),(29,'Gestión de Presentación',1,0,NULL,NULL,4),(30,'Gestión de Datos Generales',1,0,NULL,NULL,4),(31,'Gestión de Noticias',1,0,NULL,NULL,4),(32,'Gestión de Eventos',1,0,NULL,NULL,4),(33,'Gestión de Redes Sociales',1,0,NULL,NULL,4),(34,'Gestión de Links de Interés',1,0,NULL,NULL,4);
/*!40000 ALTER TABLE `submodulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousers`
--

DROP TABLE IF EXISTS `tipousers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipousers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousers`
--

LOCK TABLES `tipousers` WRITE;
/*!40000 ALTER TABLE `tipousers` DISABLE KEYS */;
INSERT INTO `tipousers` VALUES (1,'SuperAdministrador','SA',1,0,NULL,NULL),(2,'Administrador Portal Web','admin',1,0,NULL,NULL),(3,'Gestor Portal Web UNASAM','user portal web unasam',1,0,NULL,NULL),(4,'Gestor Portales Web Facultades','user facultad',1,0,NULL,NULL),(5,'Gestor Portales Web Programas de Estudios','user programas',1,0,NULL,NULL);
/*!40000 ALTER TABLE `tipousers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universidads`
--

DROP TABLE IF EXISTS `universidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `universidads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `direccion` varchar(500) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `horario_lu_vier` varchar(50) DEFAULT NULL,
  `horario_sabado` varchar(50) DEFAULT NULL,
  `horario_domingo` varchar(50) DEFAULT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `tipo_vista` tinyint DEFAULT NULL,
  `logourl` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universidads`
--

LOCK TABLES `universidads` WRITE;
/*!40000 ALTER TABLE `universidads` DISABLE KEYS */;
INSERT INTO `universidads` VALUES (1,'unasam',NULL,'Av. Centenario Nro. 200','(043) 640-020','mesadepartesdigital@unasam.edu.pe','8:30 am a 5:00 pm','9:30 am a 1:00 pm','Cerrado','20166550239',1,0,NULL,'2021-11-08 23:36:15',1,1,'logo-08-11-2021-18-36-15.png');
/*!40000 ALTER TABLE `universidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `remember_token` varchar(500) DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `borrado` tinyint DEFAULT NULL,
  `programaestudio_id` int DEFAULT NULL,
  `tipouser_id` int NOT NULL,
  `persona_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_tipousers1_idx` (`tipouser_id`),
  KEY `fk_users_personas1_idx` (`persona_id`),
  CONSTRAINT `fk_users_personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `fk_users_tipousers1` FOREIGN KEY (`tipouser_id`) REFERENCES `tipousers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@hotmail.com','$2y$10$WqTsJhJoBog/DBoNOVDTsuWlP64SQMXs1l0vu667p/cIPibZSYrd2',NULL,1,0,NULL,1,1,NULL,'2021-10-04 00:28:23'),(2,'admin23','admin2@mail.com','---',NULL,1,1,0,2,2,'2021-10-03 07:05:11','2021-10-03 07:07:41'),(3,'rosa','rosa@mail.com','---',NULL,1,1,1,3,3,'2021-10-04 00:01:52','2021-11-10 04:25:08'),(4,'admin2','admin@unasam.com','$2y$10$nIcGK/EjMu2l/wav/FnvSuYFmw8j2U/2qNhrqNqxwiX6itpMNiB5y',NULL,1,0,NULL,2,4,'2021-11-10 04:26:01','2021-11-10 04:26:01'),(5,'--borrado--admin3a','admin3@unasam.edu.pe','---',NULL,1,1,NULL,3,5,'2021-11-10 04:27:13','2021-11-18 19:04:14'),(6,'admin3','admin3@unasam.edu.pe','$2y$10$d1IEumBs..t6IdF7FuuMj.FGu13AoSMgRx3U/FfLY2fcKLAwJi//i',NULL,1,0,NULL,3,5,'2021-11-10 04:29:24','2021-11-18 19:02:17'),(7,'admin4','admin4@unasam.edu.pe','$2y$10$exPjWwFHPBjIQ2FMvmHut.oLnRdy4cqKRi5TMIKDEs/5a3Tgkc962',NULL,1,0,NULL,4,6,'2021-11-10 04:31:30','2021-11-10 04:31:30'),(8,'admin5','admin5@unasam.edu.pe','$2y$10$ZmiHe3QTBEvoQnEHnb51duJB2UcDspWba3ukjHrEArg10yn/PM6NW',NULL,1,0,NULL,5,7,'2021-11-10 04:32:48','2021-11-10 04:49:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bdappwebunasam'
--

--
-- Dumping routines for database 'bdappwebunasam'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-20  1:18:58
