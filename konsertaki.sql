-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema konsertaki
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema konsertaki
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `konsertaki` DEFAULT CHARACTER SET utf8 ;
USE `konsertaki` ;

-- -----------------------------------------------------
-- Table `konsertaki`.`servicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `konsertaki`.`servicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(300) NULL,
  `cnae` INT(7) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `konsertaki`.`anuncios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `konsertaki`.`anuncios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ativo` TINYINT(1) NULL,
  `descricao` LONGTEXT NULL,
  `data_inicio` DATETIME NULL,
  `data_termino` DATETIME NULL,
  `classificacao` INT NULL,
  `imagem` VARCHAR(50) NULL,
  `titulo_anuncio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `konsertaki`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `konsertaki`.`usuarios` (
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nivel_acesso` INT NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `konsertaki`.`freelancers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `konsertaki`.`freelancers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `cnpj` VARCHAR(14) NULL,
  `telefone1` VARCHAR(11) NOT NULL,
  `telefone2` VARCHAR(11) NULL,
  `estado` VARCHAR(3) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `servico_id` INT NOT NULL,
  `anuncio_id` INT NULL,
  `usuarios_email` VARCHAR(45) NOT NULL,
  INDEX `fk_freelancers_anuncios_idx` (`anuncio_id` ASC),
  INDEX `fk_freelancers_usuarios1_idx` (`usuarios_email` ASC),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  CONSTRAINT `fk_freelancers_anuncios`
    FOREIGN KEY (`anuncio_id`)
    REFERENCES `konsertaki`.`anuncios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_freelancers_usuarios1`
    FOREIGN KEY (`usuarios_email`)
    REFERENCES `konsertaki`.`usuarios` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `konsertaki`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `konsertaki`.`comentarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idanuncios_freelancers` INT NOT NULL,
  `comentario_resposta` TINYINT(1) NULL,
  `idcomentario_externo` INT NULL,
  `autor_nome` VARCHAR(45) NOT NULL,
  `comentarioscol` VARCHAR(45) NULL,
  `usuarios_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comentarios_usuarios1_idx` (`usuarios_email` ASC),
  CONSTRAINT `fk_comentarios_usuarios1`
    FOREIGN KEY (`usuarios_email`)
    REFERENCES `konsertaki`.`usuarios` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `konsertaki`.`contratantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `konsertaki`.`contratantes` (
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(100) NOT NULL,
  `federacao` VARCHAR(3) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `contratantescol` VARCHAR(45) NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuarios_email` VARCHAR(45) NOT NULL,
  INDEX `fk_contratantes_usuarios1_idx` (`usuarios_email` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_contratantes_usuarios1`
    FOREIGN KEY (`usuarios_email`)
    REFERENCES `konsertaki`.`usuarios` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
