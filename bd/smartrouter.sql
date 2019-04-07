-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27-log
-- Versão do PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `smartrouter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DT_REG` datetime NOT NULL,
  `NOME_PAC` varchar(80) NOT NULL,
  `TEL` varchar(15) NOT NULL,
  `STS` int(2) NOT NULL,
  `ID_U_P` int(11) NOT NULL,
  `OBS` varchar(300) NOT NULL,
  `ID_COL` int(11) NOT NULL,
  `CEP` varchar(15) NOT NULL,
  `RUA` varchar(150) NOT NULL,
  `NUMERO` varchar(10) NOT NULL,
  `COMPLEMENTO` varchar(200) NOT NULL,
  `BAIRRO` varchar(150) NOT NULL,
  `CIDADE` varchar(150) NOT NULL,
  `PONTO_REF` varchar(200) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ID_EXAME` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `R_SOCIAL` varchar(150) NOT NULL,
  `NOME_FANT` varchar(150) NOT NULL,
  `CNPJ` varchar(30) NOT NULL,
  `CNAE` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `TEL` varchar(30) NOT NULL,
  `STS` int(2) NOT NULL,
  `DT_REG` datetime NOT NULL,
  `LOGO` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE IF NOT EXISTS `exame` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DT_REG` datetime NOT NULL,
  `STS` int(2) NOT NULL,
  `MDL` varchar(50) NOT NULL,
  `EXAME` varchar(200) NOT NULL,
  `ID_U_POSTO` int(11) NOT NULL,
  `PRAZO` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unid_posto`
--

CREATE TABLE IF NOT EXISTS `unid_posto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COD` varchar(20) DEFAULT NULL,
  `NOME` varchar(150) DEFAULT NULL,
  `DT_REG` date NOT NULL,
  `CEP` varchar(15) DEFAULT NULL,
  `RUA` varchar(150) DEFAULT NULL,
  `BAIRRO` varchar(150) DEFAULT NULL,
  `CIDADE` varchar(150) DEFAULT NULL,
  `NUMERO` varchar(10) DEFAULT NULL,
  `COMPLEMENTO` varchar(200) DEFAULT NULL,
  `PONTO_REF` varchar(200) DEFAULT NULL,
  `TEL1` varchar(15) DEFAULT NULL,
  `TEL2` varchar(15) DEFAULT NULL,
  `ID_EMP` int(11) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TABELA DE EXAMES' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `cod` varchar(30) NOT NULL,
  `id_unid_posto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
