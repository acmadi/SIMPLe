#!/bin/sh

/Applications/MAMP/Library/bin/mysql -u root -proot -e 'USE db_dja; TRUNCATE TABLE `tb_tiket_frontdesk`; TRUNCATE TABLE `tb_tiket_helpdesk`; DELETE FROM tb_petugas_satker; ALTER TABLE  `tb_petugas_satker` AUTO_INCREMENT=1; TRUNCATE TABLE  `tb_kelengkapan_formulir`;'
