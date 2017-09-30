CREATE DATABASE compu;
use compu;
-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: compu
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.17.04.1

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
-- Table structure for table `Personal`
--

DROP TABLE IF EXISTS `Personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Personal` (
  `IDPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(60) NOT NULL,
  `paterno` varchar(60) NOT NULL,
  `materno` varchar(60) NOT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono1` varchar(14) DEFAULT NULL,
  `telefono2` varchar(14) DEFAULT NULL,
  `obs` varchar(200) DEFAULT NULL,
  `fecCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadopor` int(1) DEFAULT NULL,
  PRIMARY KEY (`IDPersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Personal`
--

LOCK TABLES `Personal` WRITE;
/*!40000 ALTER TABLE `Personal` DISABLE KEYS */;
INSERT INTO `Personal` VALUES (1001,'Edgar','Apaza','Choque','40023528','Jr. aaa','9888827267','22','obs','2017-06-13 05:00:00',NULL),(1002,'Julio','Ramos','Cahuana','01234567','Jr. Arequipa 1133','976543212','','','2017-06-19 05:00:00',NULL),(1003,'A','S','D','V','C','X','V','N','2017-08-26 15:00:12',1001),(1004,'Juan','Burgos','Choque','01234587','Sadfj','1122333','','','2017-08-26 15:03:42',1001);
/*!40000 ALTER TABLE `Personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accesosistema`
--

DROP TABLE IF EXISTS `accesosistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesosistema` (
  `idaccesos` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idaccesos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesosistema`
--

LOCK TABLES `accesosistema` WRITE;
/*!40000 ALTER TABLE `accesosistema` DISABLE KEYS */;
INSERT INTO `accesosistema` VALUES (1000,'Atencion al usuario'),(2000,'Ventas'),(3000,'Registro Almacen'),(4000,'Administrador'),(5000,'Usuario');
/*!40000 ALTER TABLE `accesosistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacen` (
  `IDalmacen` int(11) NOT NULL AUTO_INCREMENT,
  `IDproducto` int(11) NOT NULL,
  `fecCompra` date NOT NULL,
  `cantidad` double NOT NULL,
  `IDProveedor` int(11) NOT NULL,
  PRIMARY KEY (`IDalmacen`),
  KEY `IDproducto` (`IDproducto`),
  KEY `IDProveedor` (`IDProveedor`),
  CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`IDproducto`) REFERENCES `productos` (`IDproducto`),
  CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`IDProveedor`) REFERENCES `proveedor` (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacen`
--

LOCK TABLES `almacen` WRITE;
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `IDClientes` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dni` char(8) DEFAULT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecNacimiento` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDClientes`),
  UNIQUE KEY `IDClientes` (`IDClientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventa` (
  `IDdetalle` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `IDventas` int(11) NOT NULL,
  `IDproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preUnitario` double NOT NULL,
  PRIMARY KEY (`IDdetalle`),
  UNIQUE KEY `IDdetalle` (`IDdetalle`),
  KEY `IDventas` (`IDventas`),
  CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`IDventas`) REFERENCES `ventas` (`IDventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familia`
--

DROP TABLE IF EXISTS `familia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familia` (
  `IDfamilia` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `familia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familia`
--

LOCK TABLES `familia` WRITE;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` VALUES (0,'N','Ninguno'),(1,'COM','Computadoras de Escritorio'),(3,'USB','MEMORIAS USB'),(4,'COB','CODIGO DE BARRAS'),(5,'CA','CARCASAS'),(6,'DIS','DISCOS DUROS'),(7,'MAN','MANO DE OBRA'),(8,'ME','MEMORIA RAM'),(9,'MI','MICROPROCESADOR'),(10,'MON','MONITORES'),(11,'ORD','ORDENADORES'),(12,'PL','PLACA BASE'),(13,'TEC','TECLADO'),(14,'TG','TAREJTA GRAFICA'),(15,'MEN','MEMORIAS'),(16,'MON','MONITORES LCD 4K'),(17,'LAP','LAPTOP'),(18,'CEL','CELULAR'),(48,'',''),(49,'',''),(50,'',''),(51,'',''),(52,'',''),(53,'AAS','ASDASDASD'),(54,'AAS','ASDASDASD'),(55,'ASD','ASD'),(56,'Cel','Celulares');
/*!40000 ALTER TABLE `familia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `IDpersonal` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT '2',
  `estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado:\n1 - activo\n0 - Inactivo\n',
  PRIMARY KEY (`idlogin`),
  KEY `fk_login_personal_idx` (`IDpersonal`),
  CONSTRAINT `fk_login_personal` FOREIGN KEY (`IDpersonal`) REFERENCES `Personal` (`IDPersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,1001,'admin','admin',1,1),(2,1002,'julio','julio',2,1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(3) NOT NULL,
  `marca` varchar(45) NOT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'ACE','ACER'),(8,'App','Apple'),(9,'HP','Hewlett-Packard'),(10,'SAM','Samsung'),(11,'DEL','Dell'),(12,'TSB','Toshiba'),(13,'LEN','Lenovo'),(14,'ASS','ASUS'),(15,'IBM','IBM'),(16,'Lan','Lanix'),(17,'Gat','Gateway'),(18,'Fuj','Fujitsu'),(19,'Eve','Everex'),(20,'ali','Alienware'),(22,'Kin','Kingston'),(23,'Tos','Toshiba nueva version'),(24,'Asd','Asdasd'),(25,'Mon','Monitor'),(26,'Com','Comercial'),(27,'Asd','Asd'),(28,'Com','Compaq');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `idmodelo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) NOT NULL,
  `IDmarca` int(11) NOT NULL,
  PRIMARY KEY (`idmodelo`),
  KEY `fk_modelo_marca_idx` (`IDmarca`),
  CONSTRAINT `fk_modelo_marca` FOREIGN KEY (`IDmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precio`
--

DROP TABLE IF EXISTS `precio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precio` (
  `idprecio` int(11) NOT NULL AUTO_INCREMENT,
  `nomPrecio` varchar(20) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  PRIMARY KEY (`idprecio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precio`
--

LOCK TABLES `precio` WRITE;
/*!40000 ALTER TABLE `precio` DISABLE KEYS */;
INSERT INTO `precio` VALUES (1,'Precio 1','',23);
/*!40000 ALTER TABLE `precio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `IDproducto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(200) NOT NULL,
  `IDproveedor` int(11) NOT NULL,
  `numFactura` int(11) DEFAULT NULL,
  `fecEmision` date DEFAULT NULL,
  `numserie` varchar(100) NOT NULL,
  `IDFamilia` int(11) NOT NULL,
  `IDSubFam` int(11) DEFAULT NULL,
  `IDmarca` int(11) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `tipoUnidad` varchar(30) DEFAULT NULL,
  `tipArticulo` varchar(30) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `preUnitario` double DEFAULT '0',
  `marGanancia1` double DEFAULT '0',
  `marGanancia2` double DEFAULT NULL,
  `marGanancia3` double DEFAULT NULL,
  `precioVenta1` double DEFAULT '0',
  `precioVenta2` double DEFAULT NULL,
  `precioVenta3` double DEFAULT NULL,
  `cantidad` double DEFAULT '0',
  `IDAlmacen` int(11) DEFAULT NULL,
  `pro_color` varchar(30) DEFAULT NULL,
  `pro_incluye` varchar(150) DEFAULT NULL,
  `pro_fecRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IDPersonal` int(11) NOT NULL,
  `alertAmbar` tinyint(1) DEFAULT '0',
  `alertRojo` tinyint(1) DEFAULT '0',
  `estadoActivo` tinyint(1) DEFAULT '1',
  `obs` varchar(255) DEFAULT NULL,
  `parte` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDproducto`),
  KEY `fk_productos_proveedor_idx` (`IDproveedor`),
  KEY `fk_productos_familia_idx` (`IDFamilia`),
  KEY `fk_productos_subfamilia_idx` (`IDSubFam`),
  KEY `fk_productos_marca_idx` (`IDmarca`),
  KEY `fk_productos_personal_idx` (`IDPersonal`),
  KEY `fk_productos_almacen_idx` (`IDAlmacen`),
  CONSTRAINT `fk_productos_almacen` FOREIGN KEY (`IDAlmacen`) REFERENCES `tienda` (`idtienda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_familia` FOREIGN KEY (`IDFamilia`) REFERENCES `familia` (`IDfamilia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_marca` FOREIGN KEY (`IDmarca`) REFERENCES `marca` (`idmarca`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_personal` FOREIGN KEY (`IDPersonal`) REFERENCES `Personal` (`IDPersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_proveedor` FOREIGN KEY (`IDproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_subfamilia` FOREIGN KEY (`IDSubFam`) REFERENCES `subfamilias` (`idsubfamilias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (5,'Memoria USB',101,345234,'2017-06-24','740617255638',3,1,22,'DATATRAVELER 50','28','Simple','Capacidad 16 gb',36,10,NULL,NULL,39.6,NULL,NULL,9,4,'Verde','','2017-07-22 03:07:53',1002,0,0,1,'',NULL),(6,'Lector de CD',101,34,'2017-07-01','884745754',5,1,8,'KDKDKD','28','Simple','Mkvlvdld',134,10,NULL,NULL,147.4,NULL,NULL,12,4,'Negro','Kdkd','2017-07-22 12:07:09',1002,0,0,1,',dldl',NULL),(7,'sdfsad',101,123,'2017-08-11','SDFASDDFFDSFASD',13,1,19,'ASDFSDF','28','Simple','Ewrqwe',12321,10,NULL,NULL,13553.1,NULL,NULL,12,6,'Negro','Aa','2017-08-03 02:08:46',1001,0,0,1,'Bb',NULL),(10,'asjsdjasdhk',101,836458,'2017-08-11','1928739182',3,1,20,'M8238283','28','Simple','Mi descripcion del producto',152.25,10,NULL,NULL,167.48,NULL,NULL,5,4,'','','2017-08-03 03:08:20',1001,0,0,1,'',NULL),(11,'celular',101,321321,'2017-08-17','82273',18,1,22,'GT456','28','Simple','Samsung galxy mini',185.5,10,NULL,NULL,204.05,NULL,NULL,5,6,'Negro','Cargador','2017-08-03 03:08:45',1001,0,0,1,'',NULL),(12,'DESHODROANTE OLDS SPICE',101,94385,'2017-08-07','7506339390230',18,1,10,'LEñA','28','Simple','Botella de plastico ',35.2,10,NULL,NULL,38.72,NULL,NULL,2,4,'Rojo','Tapa','2017-08-03 03:08:55',1001,0,0,1,'Por acabarse',NULL),(23,'$producto',100,1212321,'2017-08-01','$numserie',3,1,14,'$modelo','$tipoUnidad','$tipArticulo','$descripcion',12,8,10,12,2,3,4,5,4,'$pro_color','$pro_incluye','2017-08-01 05:00:00',1001,0,0,1,'$obs',NULL),(24,'$producto',100,1212321,'2017-08-01','$numserie',3,1,14,'$modelo','$tipoUnidad','$tipArticulo','$descripcion',12,8,10,12,2,3,4,5,4,'$pro_color','$pro_incluye','2017-08-01 05:00:00',1001,0,0,1,'$obs',NULL),(25,'laptop',101,12345,'2017-08-01','aaa',12,1,12,'model','28','Simple','descr',1567,8,10,12,1692.36,1723.7,1755.04,4,5,'rojo','cables','2017-08-26 05:08:51',1001,0,0,1,'obs','parte'),(26,'laptop',101,12345,'2017-08-01','bbb',12,1,12,'model','28','Simple','descr',1567,8,10,12,1692.36,1723.7,1755.04,4,5,'rojo','cables','2017-08-26 05:08:52',1001,0,0,1,'obs','parte'),(27,'laptop',101,12345,'2017-08-01','ccc',12,1,12,'model','28','Simple','descr',1567,8,10,12,1692.36,1723.7,1755.04,4,5,'rojo','cables','2017-08-26 05:08:53',1001,0,0,1,'obs','parte'),(28,'laptop',101,12345,'2017-08-01','ddd',12,1,12,'model','28','Simple','descr',1567,8,10,12,1692.36,1723.7,1755.04,4,5,'rojo','cables','2017-08-26 05:08:55',1001,0,0,1,'obs','parte'),(29,'MEMORIAS USB 16GB',101,2121,'2017-07-11','COD1123212',15,1,22,'MJF55','28','Simple','16GB',14,8,10,12,15.12,15.4,15.68,3,5,'ROJO','','2017-08-26 05:08:48',1001,0,0,1,'','CJD7373'),(30,'MEMORIAS USB 16GB',101,2121,'2017-07-11','COD2125455',15,1,22,'MJF55','28','Simple','16GB',14,8,10,12,15.12,15.4,15.68,3,5,'ROJO','','2017-08-26 05:08:49',1001,0,0,1,'','CJD7373'),(31,'MEMORIAS USB 16GB',101,2121,'2017-07-11','COD3215455',15,1,22,'MJF55','28','Simple','16GB',14,8,10,12,15.12,15.4,15.68,3,5,'ROJO','','2017-08-26 05:08:50',1001,0,0,1,'','CJD7373'),(35,'laptop',108,3212312,'2017-08-18','213333',10,1,1,'msjsj2','28','Simple','',1455,8,10,12,1571.4,1600.5,1629.6,4,5,'rojo','cables y CD','2017-08-26 14:08:24',1001,0,0,1,'','cnc88282'),(36,'laptop',108,3212312,'2017-08-18','212323',10,1,1,'msjsj2','28','Simple','',1455,8,10,12,1571.4,1600.5,1629.6,4,5,'rojo','cables y CD','2017-08-26 14:08:24',1001,0,0,1,'','cnc88282'),(37,'laptop',108,3212312,'2017-08-18','3234324',10,1,1,'msjsj2','28','Simple','',1455,8,10,12,1571.4,1600.5,1629.6,4,5,'rojo','cables y CD','2017-08-26 14:08:25',1001,0,0,1,'','cnc88282'),(38,'laptop',108,3212312,'2017-08-18','34345435',10,1,1,'msjsj2','28','Simple','',1455,8,10,12,1571.4,1600.5,1629.6,4,5,'rojo','cables y CD','2017-08-26 14:08:26',1001,0,0,1,'','cnc88282');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProveedor` varchar(200) DEFAULT NULL,
  `razonSocial` varchar(200) DEFAULT NULL,
  `numRUC` char(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telfFijo` varchar(10) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `fecRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (0,'Ninguno','Ninguno','00000000000','Vacio','Sin Tel','Sin Celular','No email','Sin Website','Vacio','2017-06-29 22:04:24'),(100,'Juan Carlos Arce','Compu Tintas','20984736333','Av. Bachero rossi 733','051 345837','9252453476467','computintas@gmail.com','website','obs','2017-06-29 22:04:24'),(101,'Deltro S.A.','Deltron','20212331377','Calle Raul Rebagluiati 170 - Lima','4150177','415-0101','ventas@deltron.com','deltron.com','ninguno','2017-06-30 15:06:00'),(108,'Edgar apaza','Coporacion digiarch','20124578631','Psaje manuel a. segur a144','972252454','051 685232','Webmaster@dap.com','Dap.com','','2017-08-26 13:08:00');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subfamilias`
--

DROP TABLE IF EXISTS `subfamilias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subfamilias` (
  `idsubfamilias` int(11) NOT NULL AUTO_INCREMENT,
  `IDfamilia` int(11) NOT NULL,
  `codigo` char(3) NOT NULL,
  `subfamilia` varchar(45) NOT NULL,
  PRIMARY KEY (`idsubfamilias`),
  KEY `fk_subfamilias_familia_idx` (`IDfamilia`),
  CONSTRAINT `fk_subfamilias_familia` FOREIGN KEY (`IDfamilia`) REFERENCES `familia` (`IDfamilia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subfamilias`
--

LOCK TABLES `subfamilias` WRITE;
/*!40000 ALTER TABLE `subfamilias` DISABLE KEYS */;
INSERT INTO `subfamilias` VALUES (1,0,'NAN','Ninguno'),(2,4,'aa','ssss'),(3,7,'Aaa','Qqqqqqq'),(4,5,'Aa','Aaaa'),(5,7,'Asd','Asd'),(6,56,'Cat','Categoria1');
/*!40000 ALTER TABLE `subfamilias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tienda`
--

DROP TABLE IF EXISTS `tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tienda` (
  `idtienda` int(11) NOT NULL,
  `tienda` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `IDpersonal` int(11) NOT NULL,
  PRIMARY KEY (`idtienda`),
  KEY `fk_almacen_personal_idx` (`IDpersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tienda`
--

LOCK TABLES `tienda` WRITE;
/*!40000 ALTER TABLE `tienda` DISABLE KEYS */;
INSERT INTO `tienda` VALUES (4,'Principal','Almacen Central','Jr. Moquegua 189','051-234589',1001),(5,'Sucursal 1','Almacen Juliaca','Jr. Banchero Rossi 256 Juliaca','978452315',1002),(6,'Sucursal 2','Almacen Plaza 1','Jr. Ecuador 123','985213456',1001),(7,'Tiend','Des','Dire','Tel',1001),(8,'Tienda','Descr','Direc','Tel',1001);
/*!40000 ALTER TABLE `tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `idunidad` int(11) NOT NULL AUTO_INCREMENT,
  `unidadMedida` varchar(20) NOT NULL,
  PRIMARY KEY (`idunidad`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'Articulo'),(2,'Botella'),(3,'Byte'),(4,'Caja'),(5,'Centimetro'),(6,'Ciento'),(7,'Galon'),(8,'Gigabyte'),(9,'Hoja'),(10,'Hora'),(11,'Kilobyte'),(12,'Litro'),(13,'Lote'),(14,'Megabyte'),(15,'Mes'),(16,'Metro Cuadrado'),(17,'Metro Cubico'),(18,'Millar'),(19,'Paquete'),(20,'Persona'),(21,'Pieza'),(22,'Pliego'),(23,'Pulgada'),(24,'Semana'),(25,'Servicio'),(26,'Terabyte'),(27,'Tonelada'),(28,'Unidad'),(29,'Otros'),(30,'Pixel'),(31,'Kilometros');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `IDventas` int(11) NOT NULL AUTO_INCREMENT,
  `importe` double NOT NULL,
  `fecRegisto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IDPersonal` int(11) NOT NULL,
  `IDTienda` int(11) NOT NULL,
  `IDclientes` int(11) NOT NULL,
  PRIMARY KEY (`IDventas`),
  KEY `fk_ventas_tienda_idx` (`IDTienda`),
  KEY `fk_ventas_personal_idx` (`IDPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-26 10:25:23
