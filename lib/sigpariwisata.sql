-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 03:31 AM
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
-- Database: `sigpariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daerah`
--

CREATE TABLE `tbl_daerah` (
  `id_daerah` varchar(10) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daerah`
--

INSERT INTO `tbl_daerah` (`id_daerah`, `kota`, `kabupaten`) VALUES
('D-0001', 'Jayapura', 'Jayapura'),
('D-0002', 'Jayapura', 'Sentani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pariwisata`
--

CREATE TABLE `tbl_pariwisata` (
  `id_kategori` varchar(15) NOT NULL,
  `id_daerah` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `luas_daerah` varchar(5) NOT NULL,
  `nama_pimpinan` text NOT NULL,
  `sarana_prasarana` text NOT NULL,
  `nama_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pariwisata`
--

INSERT INTO `tbl_pariwisata` (`id_kategori`, `id_daerah`, `kategori`, `nama`, `alamat`, `latitude`, `longitude`, `luas_daerah`, `nama_pimpinan`, `sarana_prasarana`, `nama_foto`) VALUES
('H-0001', 'D-0001', 'hotel', 'Hotel Aston Jayapura & Convention Center', 'Jl. Percetakan Negara, Gurabesi, Jayapura Utara, Kota Jayapura, Papua', -2.541306, 140.703217, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-H-0001-HOTEL ASTON.jpg'),
('H-0002', 'D-0001', 'hotel', 'Swiss-Belhotel Papua', 'Pusat Bisnis Jayapura Jalan Pasifik, Bayangkara, North Jayapura, Jayapura City, Papua 99112', -2.538845, 140.711338, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-H-0002-SWISS BELL HOTEL.jpg'),
('H-0003', 'D-0001', 'hotel', 'Hotel Grand Abe Jayapura', 'Jalan Raya Abepura, Kotabaru, Kota Baru, Abepura, Kota Jayapura, Papua 99351', -2.610709, 140.666157, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-H-0003-GRAND ABE HOTEL.jpg'),
('H-0004', 'D-0002', 'hotel', 'Hotel Ratna Manunggal', 'JL Penerangan No.2, Sentani Kota, Sentani, Jayapura, Papua 99359', -2.566477, 140.513202, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-H-0004-hotel ratna manunggal .jpg'),
('H-0005', 'D-0002', 'hotel', 'Hotel Sentani Indah', 'Jl Raya Hawai 99352 Sentani, Jayapura, Papua', -2.572777, 140.535181, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-H-0005-HOTEL SENTANI INDAH.jpg'),
('H-0006', 'D-0002', 'hotel', 'Hotel Grand Allison Hotel', 'Jl. Raya Kemiri No.53, Hinekombe, Sentani, Jayapura, Papua 99359', -2.563766, 140.501485, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-H-0006-alison.jpg'),
('K-0001', 'D-0001', 'kuliner', 'Sate Ulat Sagu, Makanan Khas Papua', 'Jl. Ps. Yotefa Abepura, Kota Jayapura, Papua', -2.613242, 140.683705, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0001-Sate Ulat Sagu, Makanan Khas Papua.jpg'),
('K-0002', 'D-0001', 'kuliner', 'Papeda', 'Jl. Raya Abepura-Kotaraja, Kota Baru, Abepura, Wai Mhorock, Abepura, Kota Jayapura, Papua 99225', -2.60595, 140.669638, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0002-Papeda.jpg'),
('K-0003', 'D-0001', 'kuliner', 'Sagu Lempeng, Makanan Pokok Papua', 'Pasar Youtefa, Jl. Ps. Yotefa Abepura, Kota Jayapura, Papua', -2.613242, 140.683705, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0003-Sagu Lempeng, Makanan Pokok Papua.jpg'),
('K-0004', 'D-0001', 'kuliner', 'Keripik Keladi', 'Saga Mall, Jl. Raya Abepura, Kota Baru, Abepura, Kota Jayapura, Papua 99224', -2.610607, 140.665552, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0004-Keripik Keladi.jpg'),
('K-0005', 'D-0001', 'kuliner', 'Roti Abon Gulung, Oleh-Oleh Khas Papua', 'Abon Gulung Hawai Bakery, Jl. Raya Abepura, Kota Baru, Abepura, Kota Jayapura, Papua 99224', -2.569901, 140.529383, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0005-Roti Abon Gulung, Oleh Oleh Khas Papua.jpg'),
('K-0006', 'D-0001', 'kuliner', 'Bandeng Kuah Kuning, Masakan Khas Papua', 'Rumah Makan Sendok Garpu, Jl. Raya Abepura-Kotaraja, Kota Baru, Abepura, Wai Mhorock, Abepura, Kota Jayapura, Papua 99225', -2.60595, 140.669638, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0006-Bandeng Kuah Kuning, Masakan Khas Papua.jpg'),
('K-0007', 'D-0001', 'kuliner', 'Sambal Dabu-Dabu Papua', 'Rumah Makan Sendok Garpu, Jl. Raya Abepura-Kotaraja, Kota Baru, Abepura, Wai Mhorock, Abepura, Kota Jayapura, Papua 99225', -2.60595, 140.669638, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0007-Sambal Dabu-Dabu Papua.jpg'),
('K-0008', 'D-0001', 'kuliner', 'Kapurung (Papeda)', 'Rumah Makan Sendok Garpu, Jl. Raya Abepura-Kotaraja, Kota Baru, Abepura, Wai Mhorock, Abepura, Kota Jayapura, Papua 99225', -2.60595, 140.669638, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0008-Kapurung (Papeda).jpg'),
('K-0009', 'D-0001', 'kuliner', 'Ikan Asar (Ikan Asap)', 'Pasar mama-mama Papua, Jl Percetakan Negara Kota Jayapura, Papua', -2.541504, 140.703349, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-K-0009-IKAN ASAR .jpg'),
('OKP-0001', 'D-0001', 'olehkhas', 'Q-Torang (pusat batik & souvenir)', 'Jl Pasifik Permai, Ruko dok II, Blok.B No.2/ Kota Jayapura, Papua', -2.537256, 140.708853, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OKP-0001-batik papua 2.jpg'),
('OKP-0002', 'D-0001', 'olehkhas', 'Batik Ilham (pusat batik & souvenir)', 'Jl. Klp. 2 No.18, Entrop, Jayapura Selatan, Kota Jayapura, Papua 99221', -2.566951, 140.698365, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OKP-0002-batik ilham.PNG'),
('OKP-0003', 'D-0001', 'olehkhas', 'Pasar Sentral Hamadi (pusat souvenir papua)', 'Jl Pasar Hamadi Kota Jayapura, Papua', -2.560701, 140.71688, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OKP-0003-pasar-hamadi.jpeg'),
('OKP-0004', 'D-0001', 'olehkhas', 'Pasar Mama-mama Papua', 'Jl Percetakan Negara Kota Jayapura, Papua', -2.541628, 140.703317, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OKP-0004-pasar mama mama.jpeg'),
('OW-0001', 'D-0001', 'objekwisata', 'Pantai BASE-G', 'Jl. Tj. Ria, Jayapura Utara, Kota Jayapura, Papua', -2.517505, 140.739553, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OW-0001-PANTAI BASE G.JPG'),
('OW-0002', 'D-0001', 'objekwisata', 'Pantai Pasir 2', 'Jl. Tj. Ria, Tj. Ria, Jayapura Utara,Kota Jayapura, Papua', -2.503094, 140.730453, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OW-0002-PANTAI PASIR 2.jpg'),
('OW-0003', 'D-0001', 'objekwisata', 'Jayapura City', 'Polimak 1 Pemancar,Ardipura, Jayapura Selatan, Kota Jayapura', -2.549587, 140.709293, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OW-0003-JAYAPURA CITY.png'),
('OW-0004', 'D-0002', 'objekwisata', 'Danau Love Sentani', 'Jl. Atabar, Ebungfau, Sentani, 99359, Jayapura, Papua', -2.660941, 140.539721, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OW-0004-Danau-Love-KABUPATEN JAYAPURA.jpg'),
('OW-0005', 'D-0002', 'objekwisata', 'Monumen Mac Arthur', 'Jl. Hinekombe, Sentani, Sentani Kota, 99352, Jayapura, Papua', -2.563117, 140.543483, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OW-0005-TUGU MACATHUR KABUPATEN JAYAPURA.jpg'),
('OW-0006', 'D-0002', 'objekwisata', 'Bukit Teletubbies', 'Jl Doyo Lama, Waibu, Sentani, 99352, Jayapura, Papua', -2.573469, 140.455195, '50', 'Pemerintah Kota dan Kabupaten', 'Kabupaten', 'photo-OW-0006-Bukit Teletubbies.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbl_pariwisata`
--
ALTER TABLE `tbl_pariwisata`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pariwisata`
--
ALTER TABLE `tbl_pariwisata`
  ADD CONSTRAINT `tbl_pariwisata_ibfk_1` FOREIGN KEY (`id_daerah`) REFERENCES `tbl_daerah` (`id_daerah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
