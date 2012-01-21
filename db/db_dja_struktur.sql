/*
SQLyog Community v8.63 
MySQL - 5.1.41 : Database - db_dja
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dja` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_dja`;

/*Table structure for table `antrian` */

CREATE TABLE `antrian` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `number` tinyint(3) unsigned NOT NULL,
  `cs` enum('A','B','C','D','E') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `levelid` */

CREATE TABLE `levelid` (
  `levelid` int(3) NOT NULL,
  `levelname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `member` */

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `peraturan` */

CREATE TABLE `peraturan` (
  `id_peraturan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(350) DEFAULT NULL,
  `jawab` text,
  PRIMARY KEY (`id_peraturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_ambil_doc` */

CREATE TABLE `tb_ambil_doc` (
  `id_ambil_doc` int(11) NOT NULL,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `nama_petugas_satker` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_ambil_doc`),
  KEY `FK_tb_ambil_doc` (`no_tiket_frontdesk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_formulir_revisi` */

CREATE TABLE `tb_formulir_revisi` (
  `id_formulir` int(10) NOT NULL AUTO_INCREMENT,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `id_satker` varchar(7) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_formulir`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_forum` */

CREATE TABLE `tb_forum` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `id_kat_forum` int(11) DEFAULT NULL,
  `judul_forum` varchar(200) DEFAULT NULL,
  `isi_forum` text,
  `file` varchar(350) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_forum`),
  KEY `FK_tb_forum` (`id_kat_forum`),
  CONSTRAINT `FK_tb_forum` FOREIGN KEY (`id_kat_forum`) REFERENCES `tb_kat_forum` (`id_kat_forum`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_histori_tiket` */

CREATE TABLE `tb_histori_tiket` (
  `id_histori_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_histori_tiket`),
  KEY `FK_tb_histori_tiket` (`no_tiket_frontdesk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_jenis_satker` */

CREATE TABLE `tb_jenis_satker` (
  `id_jenis_satker` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_satker` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kat_forum` */

CREATE TABLE `tb_kat_forum` (
  `id_kat_forum` int(11) NOT NULL AUTO_INCREMENT,
  `kat_forum` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kat_forum`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kat_knowledge_base` */

CREATE TABLE `tb_kat_knowledge_base` (
  `id_kat_knowledge_base` int(11) NOT NULL AUTO_INCREMENT,
  `kat_knowledge_base` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kat_knowledge_base`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kelengkapan_doc` */

CREATE TABLE `tb_kelengkapan_doc` (
  `id_kelengkapan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelengkapan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kelengkapan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kelengkapan_formulir` */

CREATE TABLE `tb_kelengkapan_formulir` (
  `id_kelengkapan_formulir` int(11) NOT NULL AUTO_INCREMENT,
  `no_tiket_frontdesk` int(11) DEFAULT NULL,
  `id_kelengkapan` int(11) DEFAULT NULL,
  `kelengkapan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kelengkapan_formulir`),
  KEY `FK_tb_kelengkapan_formulir` (`id_kelengkapan`),
  KEY `FK_tb_kelengkapan_formulir_tikrt` (`no_tiket_frontdesk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kementrian` */

CREATE TABLE `tb_kementrian` (
  `id_kementrian` varchar(3) NOT NULL,
  `nama_kementrian` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_kementrian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_knowledge_base` */

CREATE TABLE `tb_knowledge_base` (
  `id_knowledge_base` int(11) NOT NULL AUTO_INCREMENT,
  `id_kat_knowledge_base` int(11) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `desripsi` text,
  `jawaban` text,
  `nama_narasumber` varchar(127) NOT NULL,
  `jabatan_narasumber` varchar(100) NOT NULL,
  `bukti_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id_knowledge_base`),
  KEY `FK_tb_knowledge_base` (`id_kat_knowledge_base`),
  KEY `judul` (`judul`),
  CONSTRAINT `tb_knowledge_base_ibfk_1` FOREIGN KEY (`id_kat_knowledge_base`) REFERENCES `tb_kat_knowledge_base` (`id_kat_knowledge_base`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kon_unit_satker` */

CREATE TABLE `tb_kon_unit_satker` (
  `id_kon_unit_satker` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit_satker` int(11) DEFAULT NULL,
  `id_kementrian` varchar(3) DEFAULT NULL,
  `id_unit` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_kon_unit_satker`),
  KEY `FK_tb_kon_unit_satker` (`id_unit_satker`),
  KEY `FK_tb_kon_unit_satker_satker` (`id_kementrian`),
  CONSTRAINT `FK_tb_kon_unit_satker_kementrian` FOREIGN KEY (`id_kementrian`) REFERENCES `tb_kementrian` (`id_kementrian`),
  CONSTRAINT `FK_tb_kon_unit_satker` FOREIGN KEY (`id_unit_satker`) REFERENCES `tb_unit_saker` (`id_unit_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_lavel` */

CREATE TABLE `tb_lavel` (
  `id_lavel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lavel` varchar(200) DEFAULT NULL,
  `lavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lavel`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_logs` */

CREATE TABLE `tb_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `user` varchar(32) NOT NULL,
  `message` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_lokasi` */

CREATE TABLE `tb_lokasi` (
  `id_lokasi` varchar(3) NOT NULL,
  `nama_lokasi` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_masa_kerja` */

CREATE TABLE `tb_masa_kerja` (
  `id_masa_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id_masa_kerja`),
  KEY `FK_tb_masa_kerja` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_pengaduan` */

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas_satker` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `pengaduan` text,
  PRIMARY KEY (`id_pengaduan`),
  KEY `FK_tb_pengaduan` (`id_user`),
  KEY `FK_tb_pengaduan_satker` (`id_petugas_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_petugas_satker` */

CREATE TABLE `tb_petugas_satker` (
  `id_petugas_satker` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` varchar(7) DEFAULT NULL,
  `nama_petugas` varchar(70) DEFAULT NULL,
  `jabatan_petugas` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_kantor` varchar(255) NOT NULL,
  `tipe` enum('kl','umum') NOT NULL DEFAULT 'kl',
  `instansi` varchar(63) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_petugas_satker`),
  KEY `FK_tb_petugas_satker_sat` (`id_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_satker` */

CREATE TABLE `tb_satker` (
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

/*Table structure for table `tb_tiket_frontdesk` */

CREATE TABLE `tb_tiket_frontdesk` (
  `no_tiket_frontdesk` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` varchar(7) DEFAULT NULL,
  `id_formulir` int(11) DEFAULT NULL COMMENT 'belum digunakan',
  `tanggal` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `no_antrian` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lavel` int(11) DEFAULT NULL,
  `id_petugas_satker` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = diterima, 2 = diteruskan , 3= ditolak (bag pelaksana), 4= terima (bag subdit anggaran) , 5 = terima (bag subdit dadutek)',
  `keputusan` enum('','disahkan','ditolak') NOT NULL DEFAULT '',
  `nomor_surat_usulan` varchar(100) DEFAULT NULL,
  `tanggal_surat_usulan` date DEFAULT NULL,
  `id_kementrian` varchar(3) DEFAULT NULL,
  `id_unit` varchar(3) DEFAULT NULL,
  `tipe_subdit` enum('','anggaran','dutek') DEFAULT NULL,
  PRIMARY KEY (`no_tiket_frontdesk`),
  KEY `FK_tb_tiket_frontdesk_satker_a` (`id_petugas_satker`),
  KEY `FK_tb_tiket_frontdesk_satker` (`id_satker`),
  KEY `id_kementrian` (`id_kementrian`),
  CONSTRAINT `tb_tiket_frontdesk_ibfk_1` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`),
  CONSTRAINT `tb_tiket_frontdesk_ibfk_2` FOREIGN KEY (`id_petugas_satker`) REFERENCES `tb_petugas_satker` (`id_petugas_satker`),
  CONSTRAINT `tb_tiket_frontdesk_ibfk_3` FOREIGN KEY (`id_kementrian`) REFERENCES `tb_kementrian` (`id_kementrian`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_tiket_helpdesk` */

CREATE TABLE `tb_tiket_helpdesk` (
  `no_tiket_helpdesk` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_satker` varchar(7) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pertanyaan` varchar(300) DEFAULT NULL,
  `description` text,
  `id_knowledge_base` int(11) DEFAULT NULL,
  `jawab` text,
  `sumber` varchar(200) DEFAULT NULL,
  `prioritas` enum('low','medium','high') DEFAULT NULL,
  `status` varchar(8) DEFAULT 'open',
  `tanggal_selesai` date DEFAULT NULL,
  `id_petugas_satket` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_tiket_helpdesk`),
  KEY `FK_tb_tiket_helpdesk` (`id_knowledge_base`),
  KEY `FK_tb_tiket_helpdesk_satker_a` (`id_petugas_satket`),
  KEY `FK_tb_tiket_helpdesk_satker` (`id_satker`),
  CONSTRAINT `tb_tiket_helpdesk_ibfk_1` FOREIGN KEY (`id_petugas_satket`) REFERENCES `tb_petugas_satker` (`id_petugas_satker`),
  CONSTRAINT `tb_tiket_helpdesk_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_unit` */

CREATE TABLE `tb_unit` (
  `id_unit` varchar(3) NOT NULL,
  `id_kementrian` varchar(3) DEFAULT NULL,
  `nama_unit` varchar(300) DEFAULT NULL,
  KEY `FK_tb_unit_kementrian` (`id_kementrian`),
  CONSTRAINT `FK_tb_unit_kementrian` FOREIGN KEY (`id_kementrian`) REFERENCES `tb_kementrian` (`id_kementrian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_unit_saker` */

CREATE TABLE `tb_unit_saker` (
  `id_unit_satker` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(18) NOT NULL,
  `nama_unit` varchar(200) DEFAULT NULL,
  `anggaran` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_unit_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_user` */

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `id_unit_satker` int(11) DEFAULT NULL,
  `id_lavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_tb_user_unit` (`id_unit_satker`),
  KEY `FK_tb_user` (`id_lavel`),
  CONSTRAINT `FK_tb_user` FOREIGN KEY (`id_unit_satker`) REFERENCES `tb_unit_saker` (`id_unit_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
