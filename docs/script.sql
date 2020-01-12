-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema testerevict
-- -----------------------------------------------------
DROP SCHEMA `testerevict`;
-- -----------------------------------------------------
-- Schema testerevict
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `testerevict` DEFAULT CHARACTER SET utf8 ;
USE `testerevict` ;

-- -----------------------------------------------------
-- Table `testerevict`.`devedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `testerevict`.`devedores` (
  `cpf_cnpj` BIGINT(15) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `nascimento` DATE NOT NULL,
  `endereco` VARCHAR(200) NOT NULL,
  `cep` VARCHAR(10) NULL,
  `cidade` VARCHAR(45) NULL,
  PRIMARY KEY (`cpf_cnpj`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testerevict`.`dividas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `testerevict`.`dividas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(120) NOT NULL,
  `valor` FLOAT NOT NULL,
  `vencimento` DATE NOT NULL,
  `updated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `devedores_cpf/cnpj` BIGINT(15) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dividas_devedores_idx` (`devedores_cpf/cnpj` ASC) ,
  CONSTRAINT `fk_dividas_devedores`
    FOREIGN KEY (`devedores_cpf/cnpj`)
    REFERENCES `testerevict`.`devedores` (`cpf_cnpj`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
