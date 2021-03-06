-- MySQL Script generated by MySQL Workbench
-- lun 23 jun 2014 16:19:58 CLT
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TERMINAL_DE_BUSES
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `TERMINAL_DE_BUSES` ;
CREATE SCHEMA IF NOT EXISTS `TERMINAL_DE_BUSES` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `TERMINAL_DE_BUSES` ;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`GIRO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`GIRO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`GIRO` (
  `idGIRO` INT NOT NULL,
  `NOMBRE_GIRO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGIRO`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`EMPRESA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`EMPRESA` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`EMPRESA` (
  `idEMPRESA` INT NOT NULL,
  `GIRO_idGIRO` INT NOT NULL,
  `NOMBRE_EMPRESA` VARCHAR(45) NOT NULL,
  `RUT_EMPRESA` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEMPRESA`),
  INDEX `fk_EMPRESA_GIRO1_idx` (`GIRO_idGIRO` ASC),
  CONSTRAINT `fk_EMPRESA_GIRO1`
    FOREIGN KEY (`GIRO_idGIRO`)
    REFERENCES `TERMINAL_DE_BUSES`.`GIRO` (`idGIRO`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`PAGO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`PAGO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`PAGO` (
  `idPAGO` INT NOT NULL,
  `MONTO_PAGO` INT NOT NULL,
  `FECHA_PAGO` DATE NOT NULL,
  `EMPRESA_idEMPRESA` INT NOT NULL,
  PRIMARY KEY (`idPAGO`),
  INDEX `fk_PAGO_EMPRESA1_idx` (`EMPRESA_idEMPRESA` ASC),
  CONSTRAINT `fk_PAGO_EMPRESA1`
    FOREIGN KEY (`EMPRESA_idEMPRESA`)
    REFERENCES `TERMINAL_DE_BUSES`.`EMPRESA` (`idEMPRESA`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`COBRO_SERVICIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`COBRO_SERVICIO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`COBRO_SERVICIO` (
  `idCOBRO_SERVICIO` INT NOT NULL,
  `PAGO_SERVICIO` INT NOT NULL,
  `FECHA_SERVICIO` DATE NOT NULL,
  `EMPRESA_idEMPRESA` INT NOT NULL,
  PRIMARY KEY (`idCOBRO_SERVICIO`),
  INDEX `fk_COBRO_SERVICIO_EMPRESA1_idx` (`EMPRESA_idEMPRESA` ASC),
  CONSTRAINT `fk_COBRO_SERVICIO_EMPRESA1`
    FOREIGN KEY (`EMPRESA_idEMPRESA`)
    REFERENCES `TERMINAL_DE_BUSES`.`EMPRESA` (`idEMPRESA`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`REPRESENTANTE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`REPRESENTANTE` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`REPRESENTANTE` (
  `idREPRESENTANTE` INT NOT NULL,
  `EMPRESA_idEMPRESA` INT NOT NULL,
  `NOMBRE_REPRESENTANTE` VARCHAR(45) NOT NULL,
  `APELLIDOS_REPRESENTANTE` VARCHAR(45) NOT NULL,
  `RUT_REPRESENTANTE` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idREPRESENTANTE`),
  INDEX `fk_REPRESENTANTE_EMPRESA1_idx` (`EMPRESA_idEMPRESA` ASC),
  CONSTRAINT `fk_REPRESENTANTE_EMPRESA1`
    FOREIGN KEY (`EMPRESA_idEMPRESA`)
    REFERENCES `TERMINAL_DE_BUSES`.`EMPRESA` (`idEMPRESA`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`CONTACTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`CONTACTO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`CONTACTO` (
  `idCONTACTO` INT NOT NULL,
  `REPRESENTANTE_idREPRESENTANTE` INT NOT NULL,
  `NUMERO_TELEFONO` VARCHAR(45) NOT NULL,
  `MAIL` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCONTACTO`),
  INDEX `fk_CONTACTO_REPRESENTANTE1_idx` (`REPRESENTANTE_idREPRESENTANTE` ASC),
  CONSTRAINT `fk_CONTACTO_REPRESENTANTE1`
    FOREIGN KEY (`REPRESENTANTE_idREPRESENTANTE`)
    REFERENCES `TERMINAL_DE_BUSES`.`REPRESENTANTE` (`idREPRESENTANTE`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`CONTRATO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`CONTRATO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`CONTRATO` (
  `idCONTRATO` INT NOT NULL,
  `REPRESENTANTE_idREPRESENTANTE` INT NOT NULL,
  `FECHA_INICIO` DATE NOT NULL,
  `FECHA_TERMINO` DATE NOT NULL,
  `FECHA_PAGOS` INT NOT NULL,
  `MONTO_CONTRATO` INT NOT NULL,
  PRIMARY KEY (`idCONTRATO`),
  INDEX `fk_CONTRATO_REPRESENTANTE1_idx` (`REPRESENTANTE_idREPRESENTANTE` ASC),
  CONSTRAINT `fk_CONTRATO_REPRESENTANTE1`
    FOREIGN KEY (`REPRESENTANTE_idREPRESENTANTE`)
    REFERENCES `TERMINAL_DE_BUSES`.`REPRESENTANTE` (`idREPRESENTANTE`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`TIPO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`TIPO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`TIPO` (
  `idTIPO` INT NOT NULL,
  `TIPO_LOCAL` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTIPO`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`SECTOR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`SECTOR` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`SECTOR` (
  `idSECTOR` INT NOT NULL,
  `NOMBRE_SECTOR` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSECTOR`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`LOCAL`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`LOCAL` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`LOCAL` (
  `idLOCAL` INT NOT NULL,
  `CONTRATO_idCONTRATO` INT NULL,
  `TIPO_idTIPO` INT NOT NULL,
  `SECTOR_idSECTOR` INT NOT NULL,
  PRIMARY KEY (`idLOCAL`),
  INDEX `fk_LOCAL_CONTRATO1_idx` (`CONTRATO_idCONTRATO` ASC),
  INDEX `fk_LOCAL_TIPO1_idx` (`TIPO_idTIPO` ASC),
  INDEX `fk_LOCAL_SECTOR1_idx` (`SECTOR_idSECTOR` ASC),
  CONSTRAINT `fk_LOCAL_CONTRATO1`
    FOREIGN KEY (`CONTRATO_idCONTRATO`)
    REFERENCES `TERMINAL_DE_BUSES`.`CONTRATO` (`idCONTRATO`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_LOCAL_TIPO1`
    FOREIGN KEY (`TIPO_idTIPO`)
    REFERENCES `TERMINAL_DE_BUSES`.`TIPO` (`idTIPO`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_LOCAL_SECTOR1`
    FOREIGN KEY (`SECTOR_idSECTOR`)
    REFERENCES `TERMINAL_DE_BUSES`.`SECTOR` (`idSECTOR`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`BUS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`BUS` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`BUS` (
  `idBUS` INT NOT NULL,
  `EMPRESA_idEMPRESA` INT NOT NULL,
  `PATENTE` VARCHAR(45) NOT NULL,
  `CAPACIDAD` INT NOT NULL,
  PRIMARY KEY (`idBUS`),
  INDEX `fk_BUS_EMPRESA1_idx` (`EMPRESA_idEMPRESA` ASC),
  CONSTRAINT `fk_BUS_EMPRESA1`
    FOREIGN KEY (`EMPRESA_idEMPRESA`)
    REFERENCES `TERMINAL_DE_BUSES`.`EMPRESA` (`idEMPRESA`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`HORARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`HORARIO` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`HORARIO` (
  `idHORARIO` INT NOT NULL,
  `LOCAL_idLOCAL` INT NOT NULL,
  `ENTRADA` TIME NOT NULL,
  `SALIDA` TIME NOT NULL,
  PRIMARY KEY (`idHORARIO`),
  INDEX `fk_HORARIO_LOCAL1_idx` (`LOCAL_idLOCAL` ASC),
  CONSTRAINT `fk_HORARIO_LOCAL1`
    FOREIGN KEY (`LOCAL_idLOCAL`)
    REFERENCES `TERMINAL_DE_BUSES`.`LOCAL` (`idLOCAL`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`FLUJO_BUSES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`FLUJO_BUSES` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`FLUJO_BUSES` (
  `HORARIO_idHORARIO` INT NOT NULL,
  `BUS_idBUS` INT NOT NULL,
  `FECHA_ARRIVO` DATE NOT NULL,
  PRIMARY KEY (`HORARIO_idHORARIO`, `BUS_idBUS`),
  INDEX `fk_HORARIO_has_BUS_BUS1_idx` (`BUS_idBUS` ASC),
  INDEX `fk_HORARIO_has_BUS_HORARIO1_idx` (`HORARIO_idHORARIO` ASC),
  CONSTRAINT `fk_HORARIO_has_BUS_HORARIO1`
    FOREIGN KEY (`HORARIO_idHORARIO`)
    REFERENCES `TERMINAL_DE_BUSES`.`HORARIO` (`idHORARIO`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_HORARIO_has_BUS_BUS1`
    FOREIGN KEY (`BUS_idBUS`)
    REFERENCES `TERMINAL_DE_BUSES`.`BUS` (`idBUS`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`PROFESION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`PROFESION` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`PROFESION` (
  `idPROFESION` INT NOT NULL,
  `NOMBRE_PROFESION` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPROFESION`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `TERMINAL_DE_BUSES`.`REPRESENTANTE_PROFESIONAL`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TERMINAL_DE_BUSES`.`REPRESENTANTE_PROFESIONAL` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `TERMINAL_DE_BUSES`.`REPRESENTANTE_PROFESIONAL` (
  `PROFESION_idPROFESION` INT NOT NULL,
  `REPRESENTANTE_idREPRESENTANTE` INT NOT NULL,
  PRIMARY KEY (`PROFESION_idPROFESION`, `REPRESENTANTE_idREPRESENTANTE`),
  INDEX `fk_PROFESION_has_REPRESENTANTE_REPRESENTANTE1_idx` (`REPRESENTANTE_idREPRESENTANTE` ASC),
  INDEX `fk_PROFESION_has_REPRESENTANTE_PROFESION1_idx` (`PROFESION_idPROFESION` ASC),
  CONSTRAINT `fk_PROFESION_has_REPRESENTANTE_PROFESION1`
    FOREIGN KEY (`PROFESION_idPROFESION`)
    REFERENCES `TERMINAL_DE_BUSES`.`PROFESION` (`idPROFESION`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PROFESION_has_REPRESENTANTE_REPRESENTANTE1`
    FOREIGN KEY (`REPRESENTANTE_idREPRESENTANTE`)
    REFERENCES `TERMINAL_DE_BUSES`.`REPRESENTANTE` (`idREPRESENTANTE`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
