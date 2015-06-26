-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2015 at 04:52 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acerpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `jumlah_transaksi` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`no`, `tgl_transaksi`, `merk`, `harga_satuan`, `jumlah_transaksi`, `total_harga`) VALUES
(1, '2015-06-17', 'Mie Sedap Goreng', 2500, 2, 5000),
(2, '2015-06-17', 'ciki-ciki', 500, 5, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE IF NOT EXISTS `pemasukan` (
  `no_trans_in` int(11) NOT NULL AUTO_INCREMENT,
  `id_suplier` int(11) DEFAULT NULL,
  `kode_brg` int(11) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_trans_in`),
  UNIQUE KEY `no_trans_in` (`no_trans_in`),
  KEY `id_suplier` (`id_suplier`),
  KEY `kode_brg` (`kode_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kode_brg` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(50) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_brg`, `merk`, `id_suplier`, `stok`, `harga`) VALUES
(1, 'Mie Sedap Goreng', 1, 3, 2500),
(2, 'ciki-ciki', 1, 100, 500),
(3, 'cocacola', 2, 50, 5500),
(4, 'aqua 100 m/l', 2, 50, 5500);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `no_hp`) VALUES
(1, 'Toko Jaya Abadi', 'jalan ahmad yani No. 78 jenggawah, jember', '085730420852'),
(2, 'toko jaya serba ada ', 'jalan gondang No. 78 jenggah, jember', '08121000334');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `nohp`, `email`, `username`, `password`, `level`) VALUES
(1, 'ahmad jaelani', 'sumbersari, jember', '085730420852', 'ahmad.zayni96@gmail.com', 'zaen21', 'd47d0ef9cc3a382ac98ced8b5a81c338', 'admin'),
(2, 'ahmad zaeni', 'sumbersari, jember', '085730420852', 'mamazzaynie21@gmail.com', 'zaen', '0f141cb5ecabb8cae7b191213028e337', 'kasir'),
(3, 'anas', 'malang', '0877378800', 'anas@gmail.com', 'anas01', 'f9f01c7477d65a2c318de023f3e687bd', 'kasir');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`kode_brg`) REFERENCES `produk` (`kode_brg`),
  ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
