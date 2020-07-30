ALTER TABLE `bi07`.`planta`   
  CHANGE `numero` `nombre` VARCHAR(50) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
  
  CREATE TABLE IF NOT EXISTS `bi07`.`galeria_desarrollo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(200) NOT NULL,
  `activo` INT(11) NOT NULL,
  `desarrollo_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_galeria_desarrollo_desarrollo1_idx` (`desarrollo_id` ASC),
  CONSTRAINT `fk_galeria_desarrollo_desarrollo1`
    FOREIGN KEY (`desarrollo_id`)
    REFERENCES `bi07`.`desarrollo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = INNODB;

ALTER TABLE desarrollo
ADD COLUMN video VARCHAR(200) NULL;

ALTER TABLE desarrollo
ADD COLUMN recorrido VARCHAR(200) NULL;

ALTER TABLE inmueble
ADD COLUMN video VARCHAR(200) NULL;

ALTER TABLE inmueble
ADD COLUMN recorrido VARCHAR(200) NULL;