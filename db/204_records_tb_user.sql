-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2011 at 08:00 PM
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

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `email`, `no_tlp`, `kode_unit`, `id_lavel`) VALUES
(15, 'admin', 'admin', 'Admin Suradmin', 'admin@komuri.org', '1234567', '0203010100201101 ', 12),
(16, 'csa', 'csa', 'csa', NULL, NULL, '0203010100201101 ', 1),
(17, 'csb', 'csb', 'csb', NULL, NULL, '0203010100201101 ', 2),
(18, 'csc', 'csc', 'csc', NULL, NULL, '0203010100201101 ', 3),
(19, 'csd', 'csd', 'csd', NULL, NULL, '0203010100201101 ', 4),
(20, 'cse', 'cse', 'cse', NULL, NULL, '0203010100201101 ', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
