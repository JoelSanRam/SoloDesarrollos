
USE `solodesarrollos`;

/*Table structure for table `forma_inmueble` */

DROP TABLE IF EXISTS `forma_inmueble`;

CREATE TABLE `forma_inmueble` (
  `Id_forma` INT(11) NOT NULL,
  `Id_inmmueble` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Id_forma`,`Id_inmmueble`),
  KEY `Ref816` (`Id_forma`),
  KEY `Ref417` (`Id_inmmueble`),
  CONSTRAINT `RefForma_pago163` FOREIGN KEY (`Id_forma`) REFERENCES `forma_pago` (`Id_forma`),
  CONSTRAINT `RefInmueble173` FOREIGN KEY (`Id_inmmueble`) REFERENCES `inmueble` (`Id_inmmueble`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
