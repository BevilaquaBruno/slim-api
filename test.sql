-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Abr-2018 às 21:08
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `type`
--

INSERT INTO `type` (`id`, `description`) VALUES
(1 , 'Type 1'),
(2 , 'Type 2'),
(3 , 'Type 3'),
(4 , 'Type 4'),
(5 , 'Type 5'),
(6 , 'Type 6'),
(7 , 'Type 7'),
(8 , 'Type 8'),
(9 , 'Type 9'),
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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--
INSERT INTO `user` (`id`, `name`, `email`, `admin`, `active`,`password`) VALUES
(1, 'Clark Kent', 'iam@superman.com', 1, 1, '202cb962ac59075b964b07152d234b70'),
(2, 'Bruce Wayne', 'iam@batman.com', 0, 1, '202cb962ac59075b964b07152d234b70'),
(3, 'Diana Prince', 'iam@wonderwoman.com', 1, 1, '202cb962ac59075b964b07152d234b70'),
(4, 'Barry Allen', 'iam@thefastestmanalive.com', 0, 1, '202cb962ac59075b964b07152d234b70'),
(5, 'Jay Garrick', 'iam@therealflash.com', 1, 1, '202cb962ac59075b964b07152d234b70'),
(6, 'Wally West', 'iam@thefakeflash.com', 0, 1, '202cb962ac59075b964b07152d234b70'),
(7, 'Bart Allen', 'iam@thesimpsonsflash', 1, 1, '202cb962ac59075b964b07152d234b70'),
(8, 'Tony Stark', 'iam@ironman.com', 1, 1, '202cb962ac59075b964b07152d234b70');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
