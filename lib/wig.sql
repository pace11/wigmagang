-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 07:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wig`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lm`
--

CREATE TABLE `tbl_lm` (
  `id_lm` int(10) NOT NULL,
  `id_wig` varchar(15) NOT NULL,
  `lm_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lm`
--

INSERT INTO `tbl_lm` (`id_lm`, `id_wig`, `lm_pic`) VALUES
(52, 'WIG0001', '[{\"lm\":\"Survey 1\",\"pic\":\"Ryan\",\"polaritas\":\"positif\",\"tipe\":\"nonkomulatif\",\"data\":[{\"tanggal\":\"2019-03-19\",\"data\":[{\"week\":\"week1\",\"target\":67,\"realisasi\":80},{\"week\":\"week2\",\"target\":89,\"realisasi\":90}]},{\"tanggal\":\"2019-04-19\",\"data\":[{\"week\":\"week1\",\"target\":55,\"realisasi\":76},{\"week\":\"week2\",\"target\":89,\"realisasi\":90}]},{\"tanggal\":\"2019-05-19\",\"data\":[{\"week\":\"week1\",\"target\":44,\"realisasi\":56},{\"week\":\"week2\",\"target\":89,\"realisasi\":90}]},{\"tanggal\":\"2019-06-19\",\"data\":[{\"week\":\"week1\",\"target\":54,\"realisasi\":60},{\"week\":\"week2\",\"target\":89,\"realisasi\":90}]}]},{\"lm\":\"Survey 2\",\"pic\":\"Riantri\",\"polaritas\":\"negatif\",\"tipe\":\"komulatif\",\"data\":[{\"tanggal\":\"2019-03-19\",\"data\":[{\"week\":\"week1\",\"target\":78,\"realisasi\":80},{\"week\":\"week2\",\"target\":76,\"realisasi\":78}]},{\"tanggal\":\"2019-04-19\",\"data\":[{\"week\":\"week1\",\"target\":64,\"realisasi\":67},{\"week\":\"week2\",\"target\":55,\"realisasi\":65}]},{\"tanggal\":\"2019-05-19\",\"data\":[{\"week\":\"week1\",\"target\":55,\"realisasi\":67},{\"week\":\"week2\",\"target\":71,\"realisasi\":75}]},{\"tanggal\":\"2019-06-19\",\"data\":[{\"week\":\"week1\",\"target\":65,\"realisasi\":77},{\"week\":\"week2\",\"target\":56,\"realisasi\":70}]}]},{\"lm\":\"Survey 3\",\"pic\":\"Pace\",\"polaritas\":\"positif\",\"tipe\":\"komulatif\",\"data\":[{\"tanggal\":\"2019-03-19\",\"data\":[{\"week\":\"week1\",\"target\":70,\"realisasi\":75}]}]},{\"lm\":\"Survey 4\",\"pic\":\"Umar\",\"polaritas\":\"negatif\",\"tipe\":\"nonkomulatif\",\"data\":[{\"tanggal\":\"2019-03-19\",\"data\":[{\"week\":\"week1\",\"target\":45,\"realisasi\":55}]}]},{\"lm\":\"Survey 5\",\"pic\":\"Naufal\",\"polaritas\":\"positif\",\"tipe\":\"komulatif\",\"data\":[{\"tanggal\":\"2019-03-19\",\"data\":[{\"week\":\"week1\",\"target\":57,\"realisasi\":64}]}]}]'),
(53, 'WIG0002', '[{\"lm\":\"Survey 1\",\"pic\":\"Rekha\",\"polaritas\":\"negatif\",\"tipe\":\"komulatif\",\"data\":[{\"tanggal\":\"2019-03-28\",\"data\":[{\"week\":\"week1\",\"target\":55,\"realisasi\":58}]},{\"tanggal\":\"2019-04-28\",\"data\":[{\"week\":\"week1\",\"target\":56,\"realisasi\":60},{\"week\":\"week2\",\"target\":44,\"realisasi\":35}]},{\"tanggal\":\"2019-05-28\",\"data\":[{\"week\":\"week1\",\"target\":76,\"realisasi\":45},{\"week\":\"week2\",\"target\":98,\"realisasi\":67}]}]},{\"lm\":\"Survey 2\",\"pic\":\"Nikku\",\"polaritas\":\"positif\",\"tipe\":\"nonkomulatif\",\"data\":[{\"tanggal\":\"2019-03-28\",\"data\":[{\"week\":\"week1\",\"target\":77,\"realisasi\":80}]},{\"tanggal\":\"2019-04-28\",\"data\":[{\"week\":\"week1\",\"target\":54,\"realisasi\":65}]},{\"tanggal\":\"2019-05-28\",\"data\":[{\"week\":\"week1\",\"target\":55,\"realisasi\":89}]}]}]'),
(54, 'WIG0003', '[{\"lm\":\"Survey 1\",\"pic\":\"Ainur\",\"polaritas\":\"positif\",\"tipe\":\"komulatif\",\"data\":[{\"tanggal\":\"2019-03-22\",\"data\":[{\"week\":\"week1\",\"target\":0,\"realisasi\":0}]}]},{\"lm\":\"Teknisi 1\",\"pic\":\"Naufal\",\"polaritas\":\"negatif\",\"tipe\":\"komulatif\",\"data\":[{\"tanggal\":\"2019-03-22\",\"data\":[{\"week\":\"week1\",\"target\":0,\"realisasi\":0}]}]}]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lovsatuan`
--

CREATE TABLE `tbl_lovsatuan` (
  `id_lovsatuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lovsatuan`
--

INSERT INTO `tbl_lovsatuan` (`id_lovsatuan`) VALUES
('%akurasi'),
('%deviasi'),
('%kesalahan'),
('%kesesuaian SOP'),
('%MVAR/MW'),
('%validitas'),
('Account'),
('Agustus'),
('Akreditasi'),
('Ampere'),
('Aplikasi'),
('April'),
('Area'),
('Asset APP'),
('BBTU'),
('BBTUD'),
('Bobot'),
('BTU'),
('Buah'),
('Buah/kVA'),
('Buah/MVA'),
('Bulan'),
('COD'),
('Desa/pegawai'),
('Desember'),
('Detik'),
('Dokumen'),
('Down Time/Operation Time'),
('Eksemplar'),
('Februari'),
('Gardu'),
('GWh'),
('Ha'),
('Hari'),
('Hari Persediaan'),
('Hari/Pelanggan'),
('HOP'),
('Indeks'),
('Index'),
('Jam'),
('Jam/100 kms'),
('Jam/Hari'),
('Jam/kms'),
('Jam/Unit'),
('Januari'),
('Jlh Gangguan'),
('Juli'),
('Jumlah'),
('Juni'),
('Jurusan'),
('Juta Ton'),
('Kajian'),
('Kali'),
('Kali Koreksi'),
('Kali/100 gardu'),
('Kali/100 kms'),
('Kali/1000 Pelanggan'),
('Kali/DP'),
('Kali/Pelanggan'),
('Kali/Unit'),
('Kategori'),
('Kategori Proper'),
('Kawasan/Area'),
('kCal'),
('kCal/kg'),
('kCal/kWh'),
('kCal/MSCF'),
('kCal/Ton'),
('Kegiatan'),
('kg/kWh'),
('kiloliter'),
('kilometer'),
('kms'),
('Kontrak'),
('kVA'),
('kWh'),
('Lab'),
('Laporan'),
('Laporan Pekerjaan/Pegawai'),
('Laporan/Pegawai'),
('Level'),
('Liter/kWh'),
('Lokasi'),
('Man month'),
('Maret'),
('mdpl'),
('Mei'),
('Menit'),
('Menit/DP'),
('Menit/Gardu'),
('Menit/Jurusan'),
('Menit/Kejadian'),
('Menit/Pelanggan'),
('Menit/Penyulang'),
('meter kubik'),
('MMBTU'),
('MMBTU/kWh'),
('Modul'),
('MT'),
('MT/Hari'),
('MVA'),
('MVA/Pegawai'),
('MVAr'),
('MW'),
('MWh'),
('MWH Jual/Peg'),
('MWh Jual/Pegawai'),
('MWH Produksi/Peg'),
('MWh Produksi/Pegawai'),
('MWh Salur/Pegawai'),
('November'),
('Oktober'),
('Orang'),
('Paket'),
('Pegawai'),
('Pegawai/Bulan'),
('Pekerjaan'),
('Pelaksanaan/Pegawai'),
('Pelanggan'),
('Penyulang'),
('Peralatan'),
('Persen'),
('Point'),
('PRK'),
('Produk/Pegawai'),
('Program'),
('Project'),
('Proyek'),
('Rayon'),
('RLB'),
('Rp (Juta)'),
('Rp (Milyar)'),
('Rp (Triliun)'),
('Rp Ribu/Ton'),
('Rp(Juta)/MM'),
('Rp/kWh'),
('Rp/MVA'),
('Rp/MVA Available'),
('Rp/Pegawai'),
('Rp/Plg'),
('Rupiah/kwh'),
('September'),
('Sertifikasi'),
('Sertifikat'),
('Set'),
('Skala_x000D_'),
('Skor'),
('Skor/%'),
('Tanggal'),
('Titik Sambung'),
('Ton'),
('Tonase'),
('Tongkang/Hari'),
('Topik'),
('Tower'),
('TWh'),
('Unit'),
('Unit/KW'),
('Unit/MVA'),
('Unit/MW'),
('Yen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `role`) VALUES
('ADMIN', 'admin12345', 0),
('MANAGER', 'manager10', 1),
('SPVKEUANGAN', 'keu111', 2),
('SPVMAPPING', '12345', 2),
('SPVPEMASARAN', 'pem111', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wig`
--

CREATE TABLE `tbl_wig` (
  `id_wig` varchar(15) NOT NULL,
  `polaritas` varchar(7) NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `target` int(10) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wig`
--

INSERT INTO `tbl_wig` (`id_wig`, `polaritas`, `tipe`, `username`, `judul`, `tanggal`, `target`, `satuan`) VALUES
('WIG0001', 'positif', 'nonkomulatif', 'SPVMAPPING', 'Pemasangan Gardu STT PLN Jakarta', '2019-03-19', 67, 'BTU'),
('WIG0002', 'negatif', 'nonkomulatif', 'SPVMAPPING', 'Perbaikan Meteran Rumah', '2019-03-28', 56, 'Bobot'),
('WIG0003', 'positif', 'komulatif', 'SPVPEMASARAN', 'Penanaman Kabel Listrik area Abepura', '2019-03-22', 78, 'BBTU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wigprogress`
--

CREATE TABLE `tbl_wigprogress` (
  `id_wigproses` int(10) NOT NULL,
  `id_wig` varchar(15) NOT NULL,
  `value_wigprogress` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wigprogress`
--

INSERT INTO `tbl_wigprogress` (`id_wigproses`, `id_wig`, `value_wigprogress`, `update_at`) VALUES
(33, 'WIG0001', '[{\"tanggal\":\"2019-03-19\",\"target\":\"67\",\"realisasi\":\"89\"},{\"tanggal\":\"2019-04-19\",\"target\":\"70\",\"realisasi\":\"78\"},{\"tanggal\":\"2019-05-19\",\"target\":\"56\",\"realisasi\":\"60\"},{\"tanggal\":\"2019-06-19\",\"target\":\"77\",\"realisasi\":\"91\"}]', '2019-03-21 15:39:02'),
(34, 'WIG0002', '[{\"tanggal\":\"2019-03-28\",\"target\":\"55\",\"realisasi\":\"70\"},{\"tanggal\":\"2019-04-28\",\"target\":\"63\",\"realisasi\":\"77\"},{\"tanggal\":\"2019-05-28\",\"target\":\"54\",\"realisasi\":\"67\"}]', '2019-03-21 15:39:55'),
(35, 'WIG0003', '[{\"tanggal\":\"2019-03-22\",\"target\":0,\"realisasi\":0}]', '2019-03-22 14:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lm`
--
ALTER TABLE `tbl_lm`
  ADD PRIMARY KEY (`id_lm`),
  ADD KEY `id_wig` (`id_wig`);

--
-- Indexes for table `tbl_lovsatuan`
--
ALTER TABLE `tbl_lovsatuan`
  ADD PRIMARY KEY (`id_lovsatuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_wig`
--
ALTER TABLE `tbl_wig`
  ADD PRIMARY KEY (`id_wig`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tbl_wigprogress`
--
ALTER TABLE `tbl_wigprogress`
  ADD PRIMARY KEY (`id_wigproses`),
  ADD KEY `id_wig` (`id_wig`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lm`
--
ALTER TABLE `tbl_lm`
  MODIFY `id_lm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_wigprogress`
--
ALTER TABLE `tbl_wigprogress`
  MODIFY `id_wigproses` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_lm`
--
ALTER TABLE `tbl_lm`
  ADD CONSTRAINT `tbl_lm_ibfk_1` FOREIGN KEY (`id_wig`) REFERENCES `tbl_wig` (`id_wig`);

--
-- Constraints for table `tbl_wig`
--
ALTER TABLE `tbl_wig`
  ADD CONSTRAINT `tbl_wig_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_user` (`username`);

--
-- Constraints for table `tbl_wigprogress`
--
ALTER TABLE `tbl_wigprogress`
  ADD CONSTRAINT `tbl_wigprogress_ibfk_1` FOREIGN KEY (`id_wig`) REFERENCES `tbl_wig` (`id_wig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
