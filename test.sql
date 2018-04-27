-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2018 às 16:13
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `type_id`, `entry_date`) VALUES
(1, 'product1', 1, '2018-04-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `type`
--

INSERT INTO `type` (`id`, `description`) VALUES
(1, 'Type 1'),
(2, 'Type 2'),
(3, 'Type 3'),
(4, 'Type 4'),
(5, 'Type 5'),
(6, 'Type 6'),
(7, 'Type 7'),
(8, 'Type 8'),
(9, 'Type 9'),
(10, 'Type 10'),
(11, 'Type 11'),
(12, 'Type 12'),
(13, 'Type 13'),
(14, 'Type 14'),
(15, 'Type 15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(100) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `admin`, `active`, `password`, `token`) VALUES
(1, 'Clark Kent', 'iam@superman.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(2, 'Bruce Wayne', 'iam@batman.com', 0, 1, '202cb962ac59075b964b07152d234b70', NULL),
(3, 'Diana Prince', 'iam@wonderwoman.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(4, 'Barry Allen', 'iam@thefastestmanalive.com', 0, 1, '202cb962ac59075b964b07152d234b70', NULL),
(5, 'Jay Garrick', 'iam@therealflash.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(6, 'Wally West', 'iam@thefakeflash.com', 0, 1, '202cb962ac59075b964b07152d234b70', NULL),
(7, 'Bart Allen', 'iam@thesimpsonsflash', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(8, 'Tony Stark', 'iam@ironman.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(9, 'UserNames', 'user@email.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(10, 'UserNames', 'user@email.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL),
(11, 'UserNames', 'user@email.com', 1, 1, '202cb962ac59075b964b07152d234b70', NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `id_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
