/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - enterprise
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`enterprise` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `enterprise`;

/*Table structure for table `c_zona` */

DROP TABLE IF EXISTS `c_zona`;

CREATE TABLE `c_zona` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'ID cliente',
  `CUIT` char(20) NOT NULL,
  `empresa` char(50) NOT NULL,
  `id_zona` tinyint(10) NOT NULL,
  `mail` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_zona` (`id_zona`),
  CONSTRAINT `fk_zona` FOREIGN KEY (`id_zona`) REFERENCES `c_zona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `producto` varchar(50) DEFAULT NULL,
  `precio` int(20) DEFAULT NULL,
  `id_proveedor` tinyint(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor` (`id_proveedor`),
  CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `CUIT` varchar(20) DEFAULT NULL,
  `empresa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `id_cliente` tinyint(10) NOT NULL,
  `id_producto` tinyint(10) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_cliente` (`id_cliente`),
  KEY `fk_producto` (`id_producto`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
