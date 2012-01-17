-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2012 at 08:00 AM
-- Server version: 5.5.18
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_referensi`
--

CREATE TABLE IF NOT EXISTS `tb_referensi` (
  `id_referensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ref` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `id_referensi_kat` int(11) NOT NULL,
  PRIMARY KEY (`id_referensi`),
  KEY `id_referensi_kat` (`id_referensi_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_referensi_kat`
--

CREATE TABLE IF NOT EXISTS `tb_referensi_kat` (
  `id_referensi_kat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_referensi_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_referensi`
--
ALTER TABLE `tb_referensi`
  ADD CONSTRAINT `tb_referensi_ibfk_1` FOREIGN KEY (`id_referensi_kat`) REFERENCES `tb_referensi_kat` (`id_referensi_kat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
