-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 05:09 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `depkeu`
--

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE IF NOT EXISTS `peraturan` (
  `id_peraturan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(350) DEFAULT NULL,
  `jawab` text,
  PRIMARY KEY (`id_peraturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `peraturan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_ambil_doc`
--

CREATE TABLE IF NOT EXISTS `tb_ambil_doc` (
  `id_ambil_doc` int(11) NOT NULL,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `nama_petugas_satker` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_ambil_doc`),
  KEY `FK_tb_ambil_doc` (`no_tiket_frontdesk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ambil_doc`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_formulir_revisi`
--

CREATE TABLE IF NOT EXISTS `tb_formulir_revisi` (
  `id_formulir` int(10) NOT NULL AUTO_INCREMENT,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `id_satker` varchar(7) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_formulir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_formulir_revisi`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_forum`
--

CREATE TABLE IF NOT EXISTS `tb_forum` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `id_kat_forum` int(11) DEFAULT NULL,
  `judul_forum` varchar(200) DEFAULT NULL,
  `isi_forum` text,
  `file` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id_forum`),
  KEY `FK_tb_forum` (`id_kat_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_forum`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_histori_tiket`
--

CREATE TABLE IF NOT EXISTS `tb_histori_tiket` (
  `id_histori_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_histori_tiket`),
  KEY `FK_tb_histori_tiket` (`no_tiket_frontdesk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_histori_tiket`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_satker`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_satker` (
  `id_jenis_satker` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_satker` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


--
-- Table structure for table `tb_kat_forum`
--

CREATE TABLE IF NOT EXISTS `tb_kat_forum` (
  `id_kat_forum` int(11) NOT NULL AUTO_INCREMENT,
  `kat_forum` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kat_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_kat_forum`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_knowledge_base`
--

CREATE TABLE IF NOT EXISTS `tb_kat_knowledge_base` (
  `id_kat_knowledge_base` int(11) NOT NULL AUTO_INCREMENT,
  `kat_knowledge_base` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kat_knowledge_base`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_kat_knowledge_base`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_kelengkapan_doc`
--

CREATE TABLE IF NOT EXISTS `tb_kelengkapan_doc` (
  `id_kelengkapan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelengkapan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kelengkapan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_kelengkapan_doc`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_kelengkapan_formulir`
--

CREATE TABLE IF NOT EXISTS `tb_kelengkapan_formulir` (
  `id_kelengkapan_formulir` int(11) NOT NULL AUTO_INCREMENT,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `id_kelengkapan` int(11) DEFAULT NULL,
  `kelengkapan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kelengkapan_formulir`),
  KEY `FK_tb_kelengkapan_formulir` (`id_kelengkapan`),
  KEY `FK_tb_kelengkapan_formulir_tikrt` (`no_tiket_frontdesk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_kelengkapan_formulir`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_kementrian`
--

CREATE TABLE IF NOT EXISTS `tb_kementrian` (
  `id_kementrian` varchar(3) NOT NULL,
  `nama_kementrian` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_kementrian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_knowledge_base`
--

CREATE TABLE IF NOT EXISTS `tb_knowledge_base` (
  `id_knowledge_base` int(11) NOT NULL AUTO_INCREMENT,
  `id_kat_knowledge_base` int(11) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `desripsi` text,
  `jawaban` text,
  `nama_narasumber` varchar(127) NOT NULL,
  `jabatan_narasumber` varchar(100) NOT NULL,
  `bukti_file` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_knowledge_base`),
  KEY `FK_tb_knowledge_base` (`id_kat_knowledge_base`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_knowledge_base`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_kon_unit_satker`
--

CREATE TABLE IF NOT EXISTS `tb_kon_unit_satker` (
  `id_kon_unit_satker` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(19) DEFAULT NULL,
  `id_satker` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_kon_unit_satker`),
  KEY `FK_tb_kon_unit_satker` (`kode_unit`),
  KEY `FK_tb_kon_unit_satker_satker` (`id_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_kon_unit_satker`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_lavel`
--

CREATE TABLE IF NOT EXISTS `tb_lavel` (
  `id_lavel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lavel` varchar(200) DEFAULT NULL,
  `lavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lavel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_lavel`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE IF NOT EXISTS `tb_lokasi` (
  `id_lokasi` varchar(3) NOT NULL,
  `nama_lokasi` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_masa_kerja`
--

CREATE TABLE IF NOT EXISTS `tb_masa_kerja` (
  `id_masa_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id_masa_kerja`),
  KEY `FK_tb_masa_kerja` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_masa_kerja`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE IF NOT EXISTS `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas_satker` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `pengaduan` text,
  PRIMARY KEY (`id_pengaduan`),
  KEY `FK_tb_pengaduan` (`id_user`),
  KEY `FK_tb_pengaduan_satker` (`id_petugas_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_pengaduan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas_satker`
--

CREATE TABLE IF NOT EXISTS `tb_petugas_satker` (
  `id_petugas_satker` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` varchar(7) DEFAULT NULL,
  `nama_petugas` varchar(70) DEFAULT NULL,
  `jabatan_petugas` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_petugas_satker`),
  KEY `FK_tb_petugas_satker_sat` (`id_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_petugas_satker`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_satker`
--

CREATE TABLE IF NOT EXISTS `tb_satker` (
  `id_satker` varchar(7) NOT NULL,
  `id_kementrian` varchar(3) DEFAULT NULL,
  `id_unit` varchar(3) DEFAULT NULL,
  `id_lokasi` varchar(3) DEFAULT NULL,
  `id_jenis_satker` int(11) DEFAULT NULL,
  `nama_satker` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_satker`),
  KEY `FK_tb_satker_kementrian` (`id_kementrian`),
  KEY `FK_tb_satker_lokasi` (`id_lokasi`),
  KEY `FK_tb_satker_jns_satker` (`id_jenis_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_tiket_frontdesk`
--

CREATE TABLE IF NOT EXISTS `tb_tiket_frontdesk` (
  `no_tiket_frontdesk` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` varchar(7) DEFAULT NULL,
  `id_formulir` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `no_antrian` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lavel` int(11) DEFAULT NULL,
  `id_petugas_satker` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_tiket_frontdesk`),
  KEY `FK_tb_tiket_frontdesk_formulir` (`id_formulir`),
  KEY `FK_tb_tiket_frontdesk_satker_a` (`id_petugas_satker`),
  KEY `FK_tb_tiket_frontdesk_satker` (`id_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_tiket_frontdesk`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket_helpdesk`
--

CREATE TABLE IF NOT EXISTS `tb_tiket_helpdesk` (
  `no_tiket_helpdesk` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` varchar(7) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` varchar(300) DEFAULT NULL,
  `pertanyaan` text,
  `id_knowledge_base` int(11) DEFAULT NULL,
  `jawab` text,
  `sumber` varchar(200) DEFAULT NULL,
  `no_antrian` varchar(10) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `id_petugas_satket` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_tiket_helpdesk`),
  KEY `FK_tb_tiket_helpdesk` (`id_knowledge_base`),
  KEY `FK_tb_tiket_helpdesk_satker_a` (`id_petugas_satket`),
  KEY `FK_tb_tiket_helpdesk_satker` (`id_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_tiket_helpdesk`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE IF NOT EXISTS `tb_unit` (
  `id_unit` varchar(3) NOT NULL,
  `id_kementrian` varchar(3) DEFAULT NULL,
  `nama_unit` varchar(300) DEFAULT NULL,
  KEY `FK_tb_unit_kementrian` (`id_kementrian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_unit_saker`
--

CREATE TABLE IF NOT EXISTS `tb_unit_saker` (
  `kode_unit` varchar(18) NOT NULL,
  `nama_unit` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kode_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit_saker`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `kode_unit` varchar(17) DEFAULT NULL,
  `id_lavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_tb_user_unit` (`kode_unit`),
  KEY `FK_tb_user` (`id_lavel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_user`
--


