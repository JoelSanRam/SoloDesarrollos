USE `solodesarrollos`;

/*Table structure for table `servicio_inmueble` */

DROP TABLE IF EXISTS `servicio_inmueble`;

CREATE TABLE `servicio_inmueble` (
  `Id_servicio` INT(11) NOT NULL,
  `Id_inmmueble` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Id_servicio`,`Id_inmmueble`),
  KEY `Ref913` (`Id_servicio`),
  KEY `Ref414` (`Id_inmmueble`),
  CONSTRAINT `RefInmueble143` FOREIGN KEY (`Id_inmmueble`) REFERENCES `inmueble` (`Id_inmmueble`),
  CONSTRAINT `RefServicio133` FOREIGN KEY (`Id_servicio`) REFERENCES `servicio` (`Id_servicio`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
