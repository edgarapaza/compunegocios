CREATE SCHEMA `compu` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;

USE `compu`;

CREATE TABLE `compu`.`productos` (
  `idproductos` INT NOT NULL AUTO_INCREMENT,
  `codigo` INT NOT NULL,
  `codFamilia` INT NOT NULL,
  `codSubFam` INT NOT NULL,
  `descripcion` VARCHAR(300) NOT NULL,
  `entradas` INT NOT NULL DEFAULT 0,
  `salidas` INT NOT NULL DEFAULT 0,
  `stock` INT NOT NULL DEFAULT 0,
  `costo` DOUBLE NOT NULL DEFAULT 0.0,
  `fecRegistro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `codPersonal` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idproductos`));
