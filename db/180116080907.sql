/*
MySQL Backup
Source Server Version: 10.1.21
Source Database: kelompokan
Date: 05/02/2018 08:40:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `bahan`
-- ----------------------------
DROP TABLE IF EXISTS `bahan`;
CREATE TABLE `bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `core_lookup`
-- ----------------------------
DROP TABLE IF EXISTS `core_lookup`;
CREATE TABLE `core_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `table` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `jenis_sablon`
-- ----------------------------
DROP TABLE IF EXISTS `jenis_sablon`;
CREATE TABLE `jenis_sablon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `lengan`
-- ----------------------------
DROP TABLE IF EXISTS `lengan`;
CREATE TABLE `lengan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pelanggan`
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dibuat_tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pembelian`
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelangganid` int(11) NOT NULL,
  `no_pembelian` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pembelian_detail`
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_detail`;
CREATE TABLE `pembelian_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualanid` int(11) NOT NULL,
  `kategoriid` int(11) NOT NULL,
  `produkid` int(11) NOT NULL,
  `sizeid` int(11) NOT NULL,
  `warnaid` int(11) NOT NULL,
  `lenganid` int(11) NOT NULL,
  `jenissablonid` int(11) NOT NULL,
  `warnasablonid` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `statusid` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelangganid` int(11) NOT NULL,
  `no_penjualan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusid` int(11) NOT NULL COMMENT '0 = belum verifikasi, 1 = terverifikasi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penjualan_detail`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualanid` int(11) NOT NULL,
  `kategoriid` int(11) NOT NULL,
  `produkid` int(11) NOT NULL,
  `sizeid` int(11) NOT NULL,
  `warnaid` int(11) NOT NULL,
  `lenganid` int(11) NOT NULL,
  `jenissablonid` int(11) NOT NULL,
  `warnasablonid` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ibfk_penjualan` (`penjualanid`),
  CONSTRAINT `ibfk_penjualan` FOREIGN KEY (`penjualanid`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `produk`
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriid` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `produk_detail`
-- ----------------------------
DROP TABLE IF EXISTS `produk_detail`;
CREATE TABLE `produk_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriid` int(11) NOT NULL,
  `produkid` int(11) NOT NULL,
  `sizeid` int(11) NOT NULL,
  `warnaid` int(11) NOT NULL,
  `lenganid` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `size`
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `harga` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statusid` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `warna`
-- ----------------------------
DROP TABLE IF EXISTS `warna`;
CREATE TABLE `warna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `warna_sablon`
-- ----------------------------
DROP TABLE IF EXISTS `warna_sablon`;
CREATE TABLE `warna_sablon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `bahan` VALUES ('1','Cat Acrylic Merah','100'), ('2','Cat Acrylic Kuning','982');
INSERT INTO `core_lookup` VALUES ('1','1','user','Online'), ('2','2','user','Offline'), ('3','3','user','Terblokir');
INSERT INTO `jenis_sablon` VALUES ('1','Rubber','5000'), ('2','Duck','10000');
INSERT INTO `kategori` VALUES ('1','Atasan'), ('2','Bawahan'), ('3','Aksesoris');
INSERT INTO `lengan` VALUES ('1','Panjang','10000'), ('3','Pendek','5000'), ('4','Aksesoris','0');
INSERT INTO `pelanggan` VALUES ('3','Thariq Alfa','Jl. Puteran No.10 Klojen, Kota Malang 65117','085791691291','alfaben@email.us','2018-01-06 11:53:59'), ('4','Hafizkha Fatin','Jl. Arjuna No 002 Purwosari, Pasuruan','085791691292','hafizkha@email.com','2018-01-06 12:08:37');
INSERT INTO `penjualan` VALUES ('10','3','PJL00001','test','2018-02-01 19:07:17','0'), ('11','4','PJL00011','test','2018-02-01 19:08:53','1'), ('12','4','PJL00012','test','2018-02-01 19:08:53','0');
INSERT INTO `penjualan_detail` VALUES ('5','10','3','4','6','1','4','2','1','10','375000'), ('6','10','1','2','6','5','1','2','1','5','512500'), ('7','11','1','1','6','4','1','2','2','1','80000'), ('8','11','1','1','6','5','3','1','1','5','337500'), ('10','12','1','1','6','5','3','1','1','5','337500'), ('13','12','1','1','6','5','3','1','1','5','337500'), ('14','12','1','1','6','5','3','1','1','5','337500'), ('15','12','1','1','6','5','3','1','1','5','337500');
INSERT INTO `produk` VALUES ('1','1','Kaos','50000'), ('2','1','Jaket','75000'), ('3','3','Tote Bag','30000'), ('4','3','Topi','20000');
INSERT INTO `produk_detail` VALUES ('19','3','3','6','4','4','25','2018-01-09 18:45:12'), ('20','1','1','7','3','3','3','2018-01-09 18:48:44'), ('21','1','1','4','5','1','250','2018-01-09 19:38:38'), ('22','3','4','6','1','4','100','2018-01-09 19:44:11'), ('23','3','4','7','5','4','25','2018-01-09 19:44:33'), ('24','3','4','4','4','4','25','2018-01-09 19:44:50'), ('25','3','3','6','5','4','20','2018-01-09 19:45:06'), ('26','3','3','7','5','4','100','2018-01-09 19:45:19'), ('27','3','3','7','3','4','200','2018-01-09 19:45:42'), ('28','1','1','7','5','1','251','2018-01-09 19:46:59'), ('29','1','2','6','5','1','10','2018-01-09 19:47:17'), ('30','1','2','7','3','1','100','2018-01-09 19:47:33'), ('31','1','2','4','4','1','20','2018-01-09 19:47:58'), ('32','1','2','4','5','1','5','2018-01-09 19:48:15'), ('33','1','2','4','3','1','109','2018-01-09 19:48:35'), ('34','1','2','4','1','1','25','2018-01-09 19:48:54'), ('36','1','1','7','1','3','100','2018-01-09 19:49:53'), ('37','1','2','4','1','3','10','2018-01-09 19:50:12'), ('38','1','1','6','5','3','20','2018-01-09 19:50:33'), ('39','1','1','7','4','3','204','2018-01-09 19:50:50'), ('40','1','1','4','3','3','100','2018-01-09 19:51:38'), ('41','1','1','7','4','3','100','2018-01-09 19:51:56'), ('42','1','1','6','1','1','66','2018-01-09 19:52:31'), ('43','1','1','6','5','1','55','2018-01-09 19:52:46'), ('44','1','1','6','4','1','12','2018-01-09 19:53:02'), ('45','1','1','6','3','1','51','2018-01-09 19:53:17'), ('46','1','1','7','5','1','11','2018-01-09 19:53:31'), ('47','1','1','7','4','1','100','2018-01-09 19:54:02'), ('48','1','1','7','3','1','100','2018-01-09 19:54:30'), ('49','1','1','4','1','1','10','2018-01-09 19:54:44'), ('50','1','1','4','5','1','20','2018-01-09 19:55:13'), ('51','1','1','4','4','1','200','2018-01-09 19:55:29'), ('52','1','1','4','3','1','21','2018-01-09 19:55:43'), ('53','1','2','6','3','1','5','2018-01-09 20:57:12');
INSERT INTO `role` VALUES ('1','1','Kasir'), ('2','2','Gudang'), ('3','3','Produksi');
INSERT INTO `size` VALUES ('4','XL','10000'), ('6','L','5000'), ('7','M','0');
INSERT INTO `user` VALUES ('4','1','Alfaben','alfaben12','insideme12','1','2018-01-03 12:13:02'), ('5','1','Ryu','ryu12','insideme12','3','2018-01-03 12:13:02');
INSERT INTO `warna` VALUES ('1','Cyan'), ('3','Merah'), ('4','Kuning'), ('5','Hijau');
INSERT INTO `warna_sablon` VALUES ('1','1','2500'), ('2','2','5000'), ('3','3','7500');
