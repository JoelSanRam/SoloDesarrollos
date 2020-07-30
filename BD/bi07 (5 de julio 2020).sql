/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.4.11-MariaDB : Database - bi07
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bi07` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bi07`;

/*Table structure for table `amenidades` */

DROP TABLE IF EXISTS `amenidades`;

CREATE TABLE `amenidades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `activo` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `amenidades_desarrollo` */

DROP TABLE IF EXISTS `amenidades_desarrollo`;

CREATE TABLE `amenidades_desarrollo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `desarrollo_id` INT(11) NOT NULL,
  `amenidades_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `amenidades_desarrollo_amenidades` (`amenidades_id`),
  KEY `amenidades_desarrollo_desarrollo` (`desarrollo_id`),
  CONSTRAINT `amenidades_desarrollo_amenidades` FOREIGN KEY (`amenidades_id`) REFERENCES `amenidades` (`id`),
  CONSTRAINT `amenidades_desarrollo_desarrollo` FOREIGN KEY (`desarrollo_id`) REFERENCES `desarrollo` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `asesor` */

DROP TABLE IF EXISTS `asesor`;

CREATE TABLE `asesor` (
  `Id_asesor` VARCHAR(10) NOT NULL,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `Contrasenia` VARCHAR(20) NOT NULL,
  `Nombre` VARCHAR(15) NOT NULL,
  `Apellido` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(15) NOT NULL,
  `Correo` VARCHAR(100) NOT NULL,
  `Id_usuario` INT(11) NOT NULL,
  `Id_empresa` INT(11) NOT NULL,
  PRIMARY KEY (`Id_asesor`),
  KEY `Ref1110` (`Id_usuario`),
  KEY `Ref1415` (`Id_empresa`),
  CONSTRAINT `RefEmpresa15` FOREIGN KEY (`Id_empresa`) REFERENCES `empresa` (`Id_empresa`),
  CONSTRAINT `RefUsuario10` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `caracteristicas` */

DROP TABLE IF EXISTS `caracteristicas`;

CREATE TABLE `caracteristicas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `caracteristica` VARCHAR(50) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `caracteristicas_desarrollo` */

DROP TABLE IF EXISTS `caracteristicas_desarrollo`;

CREATE TABLE `caracteristicas_desarrollo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `desarrollo_id` INT(11) NOT NULL,
  `caracteristicas_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caracteristicas_desarrollo_caracteristicas` (`caracteristicas_id`),
  KEY `caracteristicas_desarrollo_desarrollo` (`desarrollo_id`),
  CONSTRAINT `caracteristicas_desarrollo_caracteristicas` FOREIGN KEY (`caracteristicas_id`) REFERENCES `caracteristicas` (`id`),
  CONSTRAINT `caracteristicas_desarrollo_desarrollo` FOREIGN KEY (`desarrollo_id`) REFERENCES `desarrollo` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `Id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `Nombre` VARCHAR(100) NOT NULL,
  `Telefono` VARCHAR(20) NOT NULL,
  `Correo` VARCHAR(100) NOT NULL,
  `Estatus` VARCHAR(10) NOT NULL,
  `Mensaje` VARCHAR(500) NOT NULL,
  `inmueble_id` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Id_cliente`),
  KEY `cliente_inmueble` (`inmueble_id`),
  CONSTRAINT `cliente_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `colonia` */

DROP TABLE IF EXISTS `colonia`;

CREATE TABLE `colonia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `colonia` VARCHAR(200) NOT NULL,
  `activo` INT(11) NOT NULL DEFAULT 1,
  `municipio_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `colonia_ciudad` (`municipio_id`),
  CONSTRAINT `colonia_ciudad` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `desarrolladora` */

DROP TABLE IF EXISTS `desarrolladora`;

CREATE TABLE `desarrolladora` (
  `Id_desarrolladora` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `Telefono` VARCHAR(15) NOT NULL,
  `Correo` VARCHAR(100) NOT NULL,
  `Logo` VARCHAR(100) NOT NULL,
  `Nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Id_desarrolladora`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `desarrollo` */

DROP TABLE IF EXISTS `desarrollo`;

CREATE TABLE `desarrollo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `unidades` INT(11) NOT NULL,
  `privado` TINYINT(4) NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `colonia_id` INT(11) NOT NULL,
  `latitud` VARCHAR(255) NOT NULL,
  `longitud` VARCHAR(255) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `desarrollo_colonia` (`colonia_id`),
  CONSTRAINT `desarrollo_colonia` FOREIGN KEY (`colonia_id`) REFERENCES `colonia` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `detalles` */

DROP TABLE IF EXISTS `detalles`;

CREATE TABLE `detalles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(50) NOT NULL,
  `activo` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `detalles_planta` */

DROP TABLE IF EXISTS `detalles_planta`;

CREATE TABLE `detalles_planta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `planta_id` INT(11) NOT NULL,
  `detalles_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalles_planta_detalles` (`detalles_id`),
  KEY `detalles_planta_planta` (`planta_id`),
  CONSTRAINT `detalles_planta_detalles` FOREIGN KEY (`detalles_id`) REFERENCES `detalles` (`id`),
  CONSTRAINT `detalles_planta_planta` FOREIGN KEY (`planta_id`) REFERENCES `planta` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `Id_empresa` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL,
  `Logo` VARCHAR(100) NOT NULL,
  `Telefono` VARCHAR(15) NOT NULL,
  `Correo` VARCHAR(100) NOT NULL,
  `Nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Id_empresa`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `equipamiento` */

DROP TABLE IF EXISTS `equipamiento`;

CREATE TABLE `equipamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `equipamiento` VARCHAR(200) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `equipamiento_inmueble` */

DROP TABLE IF EXISTS `equipamiento_inmueble`;

CREATE TABLE `equipamiento_inmueble` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `equipamiento_id` INT(11) NOT NULL,
  `inmueble_id` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `equipamiento_inmueble_equipamiento` (`equipamiento_id`),
  KEY `equipamiento_inmueble_inmueble` (`inmueble_id`),
  CONSTRAINT `equipamiento_inmueble_equipamiento` FOREIGN KEY (`equipamiento_id`) REFERENCES `equipamiento` (`id`),
  CONSTRAINT `equipamiento_inmueble_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `estado` */

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(200) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `financiamiento` */

DROP TABLE IF EXISTS `financiamiento`;

CREATE TABLE `financiamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `financiamiento` VARCHAR(200) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `financiamiento_inmueble` */

DROP TABLE IF EXISTS `financiamiento_inmueble`;

CREATE TABLE `financiamiento_inmueble` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `inmueble_id` VARCHAR(10) NOT NULL,
  `financiamiento_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `financiamiento_inmueble_financiamiento` (`financiamiento_id`),
  KEY `financiamiento_inmueble_inmueble` (`inmueble_id`),
  CONSTRAINT `financiamiento_inmueble_financiamiento` FOREIGN KEY (`financiamiento_id`) REFERENCES `financiamiento` (`id`),
  CONSTRAINT `financiamiento_inmueble_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `forma_inmueble` */

DROP TABLE IF EXISTS `forma_inmueble`;

CREATE TABLE `forma_inmueble` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `inmueble_id` VARCHAR(10) NOT NULL,
  `forma_pago_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forma_inmueble_forma_pago` (`forma_pago_id`),
  KEY `forma_inmueble_inmueble` (`inmueble_id`),
  CONSTRAINT `forma_inmueble_forma_pago` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pago` (`id`),
  CONSTRAINT `forma_inmueble_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `forma_pago` */

DROP TABLE IF EXISTS `forma_pago`;

CREATE TABLE `forma_pago` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `forma` VARCHAR(50) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `galeria` */

DROP TABLE IF EXISTS `galeria`;

CREATE TABLE `galeria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(200) NOT NULL,
  `activo` INT(11) NOT NULL DEFAULT 1,
  `inmueble_id` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galeria_inmueble` (`inmueble_id`),
  CONSTRAINT `galeria_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `inmueble` */

DROP TABLE IF EXISTS `inmueble`;

CREATE TABLE `inmueble` (
  `id` VARCHAR(10) NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `comision` VARCHAR(15) NOT NULL,
  `enganche` INT(11) NOT NULL,
  `ubicacion` VARCHAR(50) NOT NULL,
  `modelo` VARCHAR(50) NOT NULL,
  `construccion` DECIMAL(11,2) NOT NULL,
  `superficie` DECIMAL(11,2) NOT NULL,
  `frente` DECIMAL(11,2) NOT NULL,
  `fondo` DECIMAL(11,2) NOT NULL,
  `cuota` DECIMAL(10,2) NOT NULL,
  `recamaras` INT(11) NOT NULL,
  `banos` INT(11) NOT NULL,
  `estacionamiento` INT(11) NOT NULL,
  `fecha_entrega` DATE NOT NULL,
  `creacion` DATETIME NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  `Id_asesor` VARCHAR(10) NOT NULL,
  `tipoprecio_id` INT(11) NOT NULL,
  `desarrollo_id` INT(11) NOT NULL,
  `tipo_producto_id` INT(11) NOT NULL,
  `venta` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `RefAsesor3` (`Id_asesor`),
  KEY `inmueble_desarrollo` (`desarrollo_id`),
  KEY `inmueble_tipoprecio` (`tipoprecio_id`),
  KEY `tipo_producto_id` (`tipo_producto_id`),
  CONSTRAINT `RefAsesor3` FOREIGN KEY (`Id_asesor`) REFERENCES `asesor` (`Id_asesor`),
  CONSTRAINT `inmueble_desarrollo` FOREIGN KEY (`desarrollo_id`) REFERENCES `desarrollo` (`id`),
  CONSTRAINT `inmueble_ibfk_1` FOREIGN KEY (`tipo_producto_id`) REFERENCES `tipo_producto` (`id`),
  CONSTRAINT `inmueble_tipoprecio` FOREIGN KEY (`tipoprecio_id`) REFERENCES `tipoprecio` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `modelo` */

DROP TABLE IF EXISTS `modelo`;

CREATE TABLE `modelo` (
  `Id_modelo` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `Modelo` VARCHAR(100) NOT NULL,
  `Id_tipo` INT(11) NOT NULL,
  PRIMARY KEY (`Id_modelo`),
  KEY `Ref311` (`Id_tipo`),
  CONSTRAINT `RefTipo_inmbueble11` FOREIGN KEY (`Id_tipo`) REFERENCES `tipo_inmbueble` (`Id_tipo`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `municipio` */

DROP TABLE IF EXISTS `municipio`;

CREATE TABLE `municipio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `municipio` VARCHAR(200) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  `estado_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ciudad_estado` (`estado_id`),
  CONSTRAINT `ciudad_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `oferta` */

DROP TABLE IF EXISTS `oferta`;

CREATE TABLE `oferta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cantidad` DECIMAL(10,2) NOT NULL,
  `inmueble_id` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `oferta_inmueble` (`inmueble_id`),
  CONSTRAINT `oferta_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `pivot_tipo_desarrollo` */

DROP TABLE IF EXISTS `pivot_tipo_desarrollo`;

CREATE TABLE `pivot_tipo_desarrollo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` INT(11) NOT NULL,
  `desarrollo_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_desarrollo_desarrollo` (`desarrollo_id`),
  KEY `tipo_desarrollo_tipo` (`tipo_id`),
  CONSTRAINT `tipo_desarrollo_desarrollo` FOREIGN KEY (`desarrollo_id`) REFERENCES `desarrollo` (`id`),
  CONSTRAINT `tipo_desarrollo_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_desarrollo` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `pivot_tipo_producto` */

DROP TABLE IF EXISTS `pivot_tipo_producto`;

CREATE TABLE `pivot_tipo_producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `desarrollo_id` INT(11) NOT NULL,
  `tipo_producto_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pivot_tipo_producto_desarrollo` (`desarrollo_id`),
  KEY `pivot_tipo_producto_tipo_producto` (`tipo_producto_id`),
  CONSTRAINT `pivot_tipo_producto_desarrollo` FOREIGN KEY (`desarrollo_id`) REFERENCES `desarrollo` (`id`),
  CONSTRAINT `pivot_tipo_producto_tipo_producto` FOREIGN KEY (`tipo_producto_id`) REFERENCES `tipo_producto` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `planta` */

DROP TABLE IF EXISTS `planta`;

CREATE TABLE `planta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` INT(11) NOT NULL,
  `inmueble_id` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `planta_inmueble` (`inmueble_id`),
  CONSTRAINT `planta_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `seminuevo` */

DROP TABLE IF EXISTS `seminuevo`;

CREATE TABLE `seminuevo` (
  `id_seminuevo` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `antiguedad` VARCHAR(25) NOT NULL,
  `Tseminuevo` VARCHAR(20) NOT NULL,
  `contrato` VARCHAR(35) NOT NULL,
  `fecha` VARCHAR(25) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_seminuevo`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `servicio` */

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(50) NOT NULL,
  `activo` INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `servicio_inmueble` */

DROP TABLE IF EXISTS `servicio_inmueble`;

CREATE TABLE `servicio_inmueble` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` INT(11) NOT NULL,
  `inmueble_id` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servicio_inmueble_inmueble` (`inmueble_id`),
  KEY `servicio_inmueble_servicio` (`servicio_id`),
  CONSTRAINT `servicio_inmueble_inmueble` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`),
  CONSTRAINT `servicio_inmueble_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipo_desarrollo` */

DROP TABLE IF EXISTS `tipo_desarrollo`;

CREATE TABLE `tipo_desarrollo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipo_inmbueble` */

DROP TABLE IF EXISTS `tipo_inmbueble`;

CREATE TABLE `tipo_inmbueble` (
  `Id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `Tipo` VARCHAR(100) NOT NULL,
  `Id_desarrolladora` INT(11) NOT NULL,
  PRIMARY KEY (`Id_tipo`),
  KEY `Ref74` (`Id_desarrolladora`),
  CONSTRAINT `RefDesarrolladora4` FOREIGN KEY (`Id_desarrolladora`) REFERENCES `desarrolladora` (`Id_desarrolladora`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipo_producto` */

DROP TABLE IF EXISTS `tipo_producto`;

CREATE TABLE `tipo_producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipoprecio` */

DROP TABLE IF EXISTS `tipoprecio`;

CREATE TABLE `tipoprecio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  `activo` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `Activo` INT(11) NOT NULL DEFAULT 1,
  `TipoUsuario` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Id_usuario`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
