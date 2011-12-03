-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2011 at 07:04 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dja`
--

-- --------------------------------------------------------

--
-- Table structure for table `levelid`
--

CREATE TABLE IF NOT EXISTS `levelid` (
  `levelid` int(3) NOT NULL,
  `levelname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelid`
--

INSERT INTO `levelid` (`levelid`, `levelname`) VALUES
(1, 'admin'),
(2, 'dirjen'),
(3, 'direktur'),
(4, 'kasubdit'),
(5, 'pelaksana'),
(6, 'supervisor'),
(7, 'cs');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `user`, `pass`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin'),
(2, 'Nama CS A', 'csa', 'csa', 'cs'),
(3, 'Nama CS B', 'csb', 'csb', 'cs'),
(4, 'Nama CS C', 'csc', 'csc', 'cs'),
(5, 'Nama CS D', 'csd', 'csd', 'cs'),
(6, 'Nama CS E', 'cse', 'cse', 'cs'),
(7, 'Nama Halo DJA', 'halodja', 'halodja', 'cs'),
(8, 'Nama Supervisor', 'supervisor', 'supervisor', 'supervisor'),
(9, 'Nama Pelaksana', 'pelaksana', 'pelaksana', 'pelaksana'),
(10, 'Nama Kasubdit', 'subdit', 'subdit', 'kasubdit'),
(11, 'Nama Direktur', 'direktur', 'direktur', 'direktur'),
(12, 'Nama Dirjen', 'dirjen', 'dirjen', 'dirjen');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '1'),
(2, 'cs', '67f994533a5d976eed69aeae05e381bf6fa851e8', 'CS', '2'),
(3, 'supervisor', '0f4d09e43d208d5e9222322fbc7091ceea1a78c3', 'Supervisor', '3');