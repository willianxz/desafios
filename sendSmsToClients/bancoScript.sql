
-- MySQL Workbench Synchronization
-- Generated: 2016-07-06 10:12
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Willian

CREATE SCHEMA willian_teste_chag DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE willian_teste_chag;

CREATE TABLE Cliente(
  idCliente INT(11) auto_increment,
  nome VARCHAR(45) ,
  email VARCHAR(150),
  telefone VARCHAR(45) ,
  site VARCHAR(150) ,
  PRIMARY KEY (idCliente));


INSERT INTO cliente(nome,email,telefone,site)VALUES
('Joao','joao@site.com.br','4877665512','www.site.com.br');


INSERT INTO cliente(nome,email,telefone,site)VALUES
('Maria','maria@sitedela.com.br','4832268712','www.sitedela.com.br');

INSERT INTO cliente(nome,email,telefone,site)VALUES
('Madalena','madalena@globo.com','4877123023','www.globo.com');


ALTER TABLE cliente
ADD dataHora datetime;


