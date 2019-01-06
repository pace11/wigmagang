-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 04:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
  `lm` text NOT NULL,
  `pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lm`
--

INSERT INTO `tbl_lm` (`id_lm`, `id_wig`, `lm`, `pic`) VALUES
(5, 'WIG0001', 'Survey', 'Rehan '),
(6, 'WIG0001', 'Tactical', 'Umar'),
(7, 'WIG0002', 'Survey', 'Thufail Erlangga'),
(8, 'WIG0002', 'Magang', 'Ahmad'),
(9, 'WIG0002', 'Kerja ', 'Riantri Alvani'),
(10, 'WIG0002', 'Kerja Honor', 'Petrus'),
(11, 'WIG0002', 'Magang', 'Ryan Pace');

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
('SPVMAPPING', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wig`
--

CREATE TABLE `tbl_wig` (
  `id_wig` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `target` int(10) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wig`
--

INSERT INTO `tbl_wig` (`id_wig`, `username`, `judul`, `tanggal`, `target`, `satuan`) VALUES
('WIG0001', 'SPVMAPPING', 'Laporan Listrik Kerakyatan', '2019-01-06', 5, 'Dokumen'),
('WIG0002', 'SPVMAPPING', 'Mendaftar Gardu Induk', '2019-01-07', 3, 'GWh');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lm`
--
ALTER TABLE `tbl_lm`
  MODIFY `id_lm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
