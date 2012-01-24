/*
SQLyog Community v8.63 
MySQL - 5.5.16 : Database - db_dja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `db_dja`;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','admin@dja.com','05304918730',NULL,0,1);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (2,'Helpdesk-1','202cb962ac59075b964b07152d234b70','Helpdesk-1','helpdesk-1@gmail.com','21312',NULL,0,2);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (3,'Helpdesk-2','202cb962ac59075b964b07152d234b70','Helpdesk-2','Helpdesk2@gmail.com','90834',NULL,0,2);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (4,'Helpdesk-3','202cb962ac59075b964b07152d234b70','helpdesk-3','Helpdesk3@gmail.com','12313',NULL,0,2);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (5,'Helpdesk-4','202cb962ac59075b964b07152d234b70','Helpdesk4','Helpdesk4@gmail.com','023',NULL,0,2);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (6,'Frontdesk-1','202cb962ac59075b964b07152d234b70','Frontdesk-1','Frontdesk1@gmial.com','31312',NULL,0,3);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (7,'Frontdesk-2','202cb962ac59075b964b07152d234b70','Frontdesk-2','Frontdesk2@gmail.com','238028',NULL,0,3);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (8,'Frontdesk-3','202cb962ac59075b964b07152d234b70','Frontdesk3','Frontdesk3@gmail.com','979',NULL,0,3);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (9,'Frontdesk-4','202cb962ac59075b964b07152d234b70','Frontdesk4','Frontdesk4@gmail.com','870980',NULL,0,3);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (10,'Penyelia-1A1','202cb962ac59075b964b07152d234b70','Penyelia-1A1','Penyelia1A1@gmail.com','023',NULL,3,7);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (11,'Penyelia-1B2','202cb962ac59075b964b07152d234b70','Penyelia-1B2','Penyelia1B2@gmail.com','234234',NULL,9,7);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (13,'Penyelia-2A1','202cb962ac59075b964b07152d234b70','Penyelia-2A1','Penyelia2A1@gmail.com','92849081',NULL,29,7);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (14,'Penyelia-2B2','202cb962ac59075b964b07152d234b70','Penyelia-2B2','Penyelia2B2@gmail.com','923498',NULL,35,7);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (15,'Penyelia-3A1','202cb962ac59075b964b07152d234b70','Penyelia-3A1','Penyelia3A1@gmail.com','98798789',NULL,55,7);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (16,'Penyelia-3B2','202cb962ac59075b964b07152d234b70','Penyelia-3B2','Penyelia3B2@gmail.com','123413',NULL,61,7);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (17,'Pelaksana-1A1','202cb962ac59075b964b07152d234b70','Pelaksana-1A1','a@yahoo.com','0',NULL,3,8);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (18,'Pelaksana-1B2','202cb962ac59075b964b07152d234b70','Pelaksana-1B2','a@yahoo.com','0',NULL,9,8);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (19,'Pelaksana-2B2','202cb962ac59075b964b07152d234b70','Pelaksana-2B2','a@yahoo.com','0',NULL,35,8);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (20,'Pelaksana-2A1','202cb962ac59075b964b07152d234b70','Pelaksana-2A1','a@yahoo.com','0',NULL,29,8);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (21,'Pelaksana-3A1','202cb962ac59075b964b07152d234b70','Pelaksana-3A1','a@yahoo.com','0',NULL,55,8);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (22,'Pelaksana-3B2','202cb962ac59075b964b07152d234b70','Pelaksana-3B2','a@yahoo.com','0',NULL,61,8);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (23,'Anggaran-1A','202cb962ac59075b964b07152d234b70','Anggaran-1A','a@yahoo.com','0',NULL,2,9);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (24,'Anggaran-1B','202cb962ac59075b964b07152d234b70','Anggaran-1B','a@yahoo.com','0',NULL,7,9);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (25,'Anggaran-2B','202cb962ac59075b964b07152d234b70','Anggaran-2B','a@yahoo.com','0',NULL,33,9);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (26,'Anggaran-2A','202cb962ac59075b964b07152d234b70','Anggaran-2A','a@yahoo.com','0',NULL,28,9);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (27,'Anggaran-3A','202cb962ac59075b964b07152d234b70','Anggaran-3A','a@yahoo.com','0',NULL,54,9);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (28,'Anggaran-3B','202cb962ac59075b964b07152d234b70','Anggaran-3B','a@yahoo.com','0',NULL,59,9);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (29,'Dadutek-1A','202cb962ac59075b964b07152d234b70','Dadutek-1A','a@yahoo.com','0',NULL,2,10);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (30,'Dadutek-1B','202cb962ac59075b964b07152d234b70','Dadutek-1B','a@yahoo.com','0',NULL,7,10);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (31,'Dadutek-2B','202cb962ac59075b964b07152d234b70','Dadutek-2B','a@yahoo.com','0',NULL,33,10);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (32,'Dadutek-2A','202cb962ac59075b964b07152d234b70','Dadutek-2A','a@yahoo.com','0',NULL,28,10);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (33,'Dadutek-3B','202cb962ac59075b964b07152d234b70','Dadutek-3B','a@yahoo.com','0',NULL,59,10);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (34,'Dadutek-3A','202cb962ac59075b964b07152d234b70','Dadutek-3A','a@yahoo.com','0',NULL,54,10);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (35,'Direktur-1','202cb962ac59075b964b07152d234b70','Direktur-1','a@yahoo.com','0',NULL,1,11);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (36,'Direktur-2','202cb962ac59075b964b07152d234b70','Direktur-2','a@yahoo.com','0',NULL,27,11);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (37,'Direktur-3','202cb962ac59075b964b07152d234b70','Direktur-3','a@yahoo.com','0',NULL,53,11);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (38,'Dirjen','202cb962ac59075b964b07152d234b70','Dirjen','a@yahoo.com','0',NULL,0,12);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (39,'Kb','202cb962ac59075b964b07152d234b70','Kb','a@yahoo.com','0',NULL,0,13);
insert  into `tb_user`(`id_user`,`username`,`password`,`nama`,`email`,`no_tlp`,`kode_unit`,`id_unit_satker`,`id_lavel`) values (40,'Pengaduan','202cb962ac59075b964b07152d234b70','Pengaduan','a@yahoo.com','0',NULL,0,5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
