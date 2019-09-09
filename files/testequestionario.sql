-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2019 at 05:32 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testequestionario`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

DROP TABLE IF EXISTS `checklists`;
CREATE TABLE IF NOT EXISTS `checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checklists`
--

INSERT INTO `checklists` (`id`, `descricao`) VALUES
(2, 'NOVA CHECKLIST PADRÃO');

-- --------------------------------------------------------

--
-- Table structure for table `colunas`
--

DROP TABLE IF EXISTS `colunas`;
CREATE TABLE IF NOT EXISTS `colunas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(128) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `tiporesposta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colunas`
--

INSERT INTO `colunas` (`id`, `descricao`, `checklist_id`, `tiporesposta_id`) VALUES
(1, 'STATUS', 2, 2),
(2, 'ATENDE', 2, 1),
(3, 'OBSERVAÇÃO', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `distribuidores`
--

DROP TABLE IF EXISTS `distribuidores`;
CREATE TABLE IF NOT EXISTS `distribuidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribuidores`
--

INSERT INTO `distribuidores` (`id`, `descricao`) VALUES
(1, 'Distribuidor Numero 1'),
(2, 'Distribuidor Numero 2'),
(3, 'Distribuidor Numero 3'),
(4, 'Distribuidor Numero 4');

-- --------------------------------------------------------

--
-- Table structure for table `linhas`
--

DROP TABLE IF EXISTS `linhas`;
CREATE TABLE IF NOT EXISTS `linhas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(128) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linhas`
--

INSERT INTO `linhas` (`id`, `descricao`, `checklist_id`) VALUES
(1, 'Tabela: Vendedor - Campo: VendedorCPF', 1),
(2, 'Tabela: Vendedor - Campo: VendedorTelefone', 1),
(3, 'Tabela: Vendedor - Campo: VendedorCelular', 1),
(4, 'Tabela: Vendedor - Campo: VendedorEmail', 1),
(5, 'Tabela: Vendedor - Campo: VendedorCargo', 1),
(6, 'Tabela: Vendedor - Campo: VendedorCPF', 2),
(7, 'Tabela: Vendedor - Campo: VendedorTelefone', 2),
(8, 'Tabela: Vendedor - Campo: VendedorCelular', 2),
(9, 'Tabela: Vendedor - Campo: VendedorEmail', 2),
(10, 'Tabela: Vendedor - Campo: VendedorCargo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `opcoesrespostas`
--

DROP TABLE IF EXISTS `opcoesrespostas`;
CREATE TABLE IF NOT EXISTS `opcoesrespostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tiporesposta_id` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opcoesrespostas`
--

INSERT INTO `opcoesrespostas` (`id`, `tiporesposta_id`, `valor`) VALUES
(1, 1, 'SIM'),
(2, 1, 'NÃO'),
(3, 2, 'VÁLIDO'),
(4, 2, 'NÃO VÁLIDO');

-- --------------------------------------------------------

--
-- Table structure for table `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distribuidor_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `coluna_id` int(11) NOT NULL,
  `linha_id` int(11) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `respostas`
--

INSERT INTO `respostas` (`id`, `distribuidor_id`, `checklist_id`, `coluna_id`, `linha_id`, `valor`) VALUES
(1, 1, 2, 1, 6, '3'),
(2, 1, 2, 2, 6, '2'),
(3, 1, 2, 3, 6, '16 AGORA POR QUE EU QUERO MESMO'),
(4, 1, 2, 1, 7, '4'),
(5, 1, 2, 2, 7, '1'),
(6, 1, 2, 3, 7, 'mesmo né?'),
(7, 1, 2, 1, 8, '3'),
(8, 1, 2, 2, 8, '2'),
(9, 1, 2, 3, 8, 'hmmmm'),
(10, 1, 2, 1, 9, '4'),
(11, 1, 2, 2, 9, '1'),
(12, 1, 2, 3, 9, 'linha 12'),
(13, 1, 2, 1, 10, '3'),
(14, 1, 2, 2, 10, '2'),
(15, 1, 2, 3, 10, 'este é o 15o HAHAHA'),
(16, 2, 2, 1, 6, '3'),
(17, 2, 2, 2, 6, '1'),
(18, 2, 2, 3, 6, '123'),
(19, 2, 2, 1, 7, '3'),
(20, 2, 2, 2, 7, '1'),
(21, 2, 2, 3, 7, 'mesmo né?'),
(22, 2, 2, 1, 8, '3'),
(23, 2, 2, 2, 8, '1'),
(24, 2, 2, 3, 8, 'hmmmm'),
(25, 2, 2, 1, 9, '3'),
(26, 2, 2, 2, 9, '1'),
(27, 2, 2, 3, 9, 'linha 12123123'),
(28, 2, 2, 1, 10, '3'),
(29, 2, 2, 2, 10, '1'),
(30, 2, 2, 3, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tiporespostas`
--

DROP TABLE IF EXISTS `tiporespostas`;
CREATE TABLE IF NOT EXISTS `tiporespostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiporespostas`
--

INSERT INTO `tiporespostas` (`id`, `descricao`) VALUES
(1, 'SIM/NÃO'),
(2, 'VÁLIDO/NÃO VÁLIDO'),
(3, 'TEXTUAL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
