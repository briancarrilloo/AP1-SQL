-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-briancarrillo.alwaysdata.net
-- Generation Time: Feb 04, 2021 at 04:52 PM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `briancarrillo_mvm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `roleid` int(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`roleid`, `name`) VALUES
(1, 'Alumno'),
(2, 'Ex-alumno'),
(3, 'Empresa');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roleid` int(2) NOT NULL,
  `company` varchar(20) DEFAULT NULL,
  `observations` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `email`, `password`, `roleid`, `company`, `observations`) VALUES
('arqui0', 'arqui@gmail.com', '1234', 3, 'Arqui', 'Gestionado por brian'),
('bcarrillo', 'bcarrillo@arqui.cat', '1234', 1, NULL, ''),
('emp', 'emp@empresa.com', '1234', 3, 'EmpresaSA', ''),
('emp2', 'Consulting', '1234', 3, 'ConsultingSL', ''),
('ex', 'e', '1234', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Vacant`
--

CREATE TABLE `Vacant` (
  `id-vacant` int(5) NOT NULL,
  `company` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descrip-job` varchar(200) NOT NULL,
  `descrip-vacant` varchar(200) NOT NULL,
  `fpdual` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vacant`
--

INSERT INTO `Vacant` (`id-vacant`, `company`, `title`, `descrip-job`, `descrip-vacant`, `fpdual`) VALUES
(16, 'EmpresaSA', ' Administrador de recursos', 'Persona que gestione los recursos informáticos de la empresa.', 'Optimizar los sistemas.', 0),
(17, 'EmpresaSA', ' Asistente de redes NV2', 'Ayudar al administrador.', '8 horas al día, coche propio', 1),
(18, 'ConsultingSL', ' Técnico de BD', 'Gestionar una base de datos.b', 'Se valorarán conocimientos en Big Data.', 0),
(22, 'EmpresaSA', ' Técnico de campo', 'Ayudar a panaderías sin internet.', '10h diarías, 12k € Anuales, Domingos libres. Moto propia.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_foreign_key_rol` (`roleid`);

--
-- Indexes for table `Vacant`
--
ALTER TABLE `Vacant`
  ADD PRIMARY KEY (`id-vacant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Vacant`
--
ALTER TABLE `Vacant`
  MODIFY `id-vacant` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
