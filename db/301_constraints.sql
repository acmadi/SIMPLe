--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD CONSTRAINT `FK_tb_forum` FOREIGN KEY (`id_kat_forum`) REFERENCES `tb_kat_forum` (`id_kat_forum`);

--
-- Constraints for table `tb_histori_tiket`
--
ALTER TABLE `tb_histori_tiket`
  ADD CONSTRAINT `FK_tb_histori_tiket` FOREIGN KEY (`no_tiket_frontdesk`) REFERENCES `tb_tiket_frontdesk` (`no_tiket_frontdesk`);

--
-- Constraints for table `tb_kelengkapan_formulir`
--
ALTER TABLE `tb_kelengkapan_formulir`
  ADD CONSTRAINT `FK_tb_kelengkapan_formulir` FOREIGN KEY (`id_kelengkapan`) REFERENCES `tb_kelengkapan_doc` (`id_kelengkapan`),
  ADD CONSTRAINT `FK_tb_kelengkapan_formulir_tikrt` FOREIGN KEY (`no_tiket_frontdesk`) REFERENCES `tb_tiket_frontdesk` (`no_tiket_frontdesk`);

--
-- Constraints for table `tb_knowledge_base`
--
ALTER TABLE `tb_knowledge_base`
  ADD CONSTRAINT `FK_tb_knowledge_base` FOREIGN KEY (`id_kat_knowledge_base`) REFERENCES `tb_kat_knowledge_base` (`id_kat_knowledge_base`);

--
-- Constraints for table `tb_kon_unit_satker`
--
ALTER TABLE `tb_kon_unit_satker`
  ADD CONSTRAINT `FK_tb_kon_unit_satker_satker` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`),
  ADD CONSTRAINT `FK_tb_kon_unit_satker` FOREIGN KEY (`kode_unit`) REFERENCES `tb_unit_saker` (`kode_unit`);

--
-- Constraints for table `tb_masa_kerja`
--
ALTER TABLE `tb_masa_kerja`
  ADD CONSTRAINT `FK_tb_masa_kerja` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `FK_tb_pengaduan` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `FK_tb_pengaduan_satker` FOREIGN KEY (`id_petugas_satker`) REFERENCES `tb_petugas_satker` (`id_petugas_satker`);

--
-- Constraints for table `tb_petugas_satker`
--
ALTER TABLE `tb_petugas_satker`
  ADD CONSTRAINT `FK_tb_petugas_satker_sat` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`);


--
-- Constraints for table `tb_tiket_frontdesk`
--
ALTER TABLE `tb_tiket_frontdesk`
  ADD CONSTRAINT `FK_tb_tiket_frontdesk_satker` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`),
  ADD CONSTRAINT `FK_tb_tiket_frontdesk_formulir` FOREIGN KEY (`id_formulir`) REFERENCES `tb_formulir_revisi` (`id_formulir`),
  ADD CONSTRAINT `FK_tb_tiket_frontdesk_satker_a` FOREIGN KEY (`id_petugas_satker`) REFERENCES `tb_petugas_satker` (`id_petugas_satker`);

--
-- Constraints for table `tb_tiket_helpdesk`
--
ALTER TABLE `tb_tiket_helpdesk`
  ADD CONSTRAINT `FK_tb_tiket_helpdesk_satker` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`),
  ADD CONSTRAINT `FK_tb_tiket_helpdesk` FOREIGN KEY (`id_knowledge_base`) REFERENCES `tb_knowledge_base` (`id_knowledge_base`),
  ADD CONSTRAINT `FK_tb_tiket_helpdesk_satker_a` FOREIGN KEY (`id_petugas_satket`) REFERENCES `tb_petugas_satker` (`id_petugas_satker`);

--
-- Constraints for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD CONSTRAINT `FK_tb_unit_kementrian` FOREIGN KEY (`id_kementrian`) REFERENCES `tb_kementrian` (`id_kementrian`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `FK_tb_user` FOREIGN KEY (`id_lavel`) REFERENCES `tb_lavel` (`id_lavel`),
  ADD CONSTRAINT `FK_tb_user_unit` FOREIGN KEY (`kode_unit`) REFERENCES `tb_unit_saker` (`kode_unit`);
