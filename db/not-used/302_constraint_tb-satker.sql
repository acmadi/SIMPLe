--
-- Constraints for table `tb_satker`
--
ALTER TABLE `tb_satker`
  ADD CONSTRAINT `FK_tb_satker_jns_satker` FOREIGN KEY (`id_jenis_satker`) REFERENCES `tb_jenis_satker` (`id_jenis_satker`),
  ADD CONSTRAINT `FK_tb_satker_kementrian` FOREIGN KEY (`id_kementrian`) REFERENCES `tb_kementrian` (`id_kementrian`),
  ADD CONSTRAINT `FK_tb_satker_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`);
