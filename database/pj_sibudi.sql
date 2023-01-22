-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 08:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pj_sibudi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tagline` text NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `nama`, `tagline`, `instansi`, `nohp`, `alamat`) VALUES
(1, 'SIBUDI', 'Sistem Informasi Buku Tamu Digital KPU Kota Bandar Lampung', 'KPU Kota Bandar Lampung', '085789871372', 'Bandar Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(5) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'abadi', 'kosong', 'abadi', 'pegawai'),
(2, 'admin', 'kosong', 'Administrator', 'admin'),
(9, 'mhs', 'mhs', 'mahasiswa', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_tamu` int(5) NOT NULL,
  `id_survey` int(5) NOT NULL,
  `sangat_puas` int(5) NOT NULL,
  `puas` int(5) NOT NULL,
  `tidak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_tamu`, `id_survey`, `sangat_puas`, `puas`, `tidak`) VALUES
(27, 6, 3, 0, 0),
(28, 7, 0, 0, 1),
(33, 10, 3, 0, 0),
(36, 11, 0, 2, 0),
(37, 12, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `bertemu` varchar(50) DEFAULT NULL,
  `keperluan` varchar(30) DEFAULT NULL,
  `tindakan` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `rincian` varchar(200) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `cara_mendapat_info` varchar(50) DEFAULT NULL,
  `cara_memperoleh_info` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id`, `nama`, `alamat`, `pekerjaan`, `nohp`, `email`, `bertemu`, `keperluan`, `tindakan`, `tgl`, `jam`, `rincian`, `tujuan`, `cara_mendapat_info`, `cara_memperoleh_info`, `foto`) VALUES
(27, 'donitata', 'jakarta', 'LAINNYA', '0898292834', NULL, '', 'nganu', 'Pilih Tindakan', '2022-12-14', '6:54:18', NULL, NULL, NULL, NULL, '639a624c5bd47.png'),
(28, 'joni iskandar', 'jakarta', 'SWASTA', '0878212123', NULL, '', 'iseng', 'Pilih Tindakan', '2022-12-15', '7:02:28', NULL, NULL, NULL, NULL, '639a64313926c.png'),
(33, 'Adi', 'Jakarta', 'SWASTA', '0827262772', NULL, '', 'Belajar', 'Pilih Tindakan', '2022-12-15', '9:49:21', NULL, NULL, NULL, NULL, '639a8b6512357.png'),
(36, 'Rojer', 'Papua', 'DOKTER', '087156737272', NULL, '', 'Meminjam barang', 'Pilih Tindakan', '2022-12-15', '15:31:35', NULL, NULL, NULL, NULL, '639adbb3bd1d4.png'),
(37, 'alfa', 'bandar lampung', 'PNS MA', '082140579639', NULL, '', 'ingin berkunjung', 'Pilih Tindakan', '2023-01-07', '17:52:21', NULL, NULL, NULL, NULL, '63b94f06f1025.png'),
(38, 'edi kisay', 'bandar lampung', 'PNS MA', '082140579639', NULL, '', 'iseng', 'Pilih Tindakan', '2023-01-07', '18:11:47', NULL, NULL, NULL, NULL, ''),
(39, 'upin', 'bandar lampung', 'PNS MA', '082140579639', NULL, '', 'berkunjung', 'Pilih Tindakan', '2023-01-07', '18:14:27', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker`
--

CREATE TABLE `tbl_satker` (
  `id_satker` int(11) NOT NULL,
  `nama_satker` varchar(255) NOT NULL,
  `alamat_satker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satker`
--

INSERT INTO `tbl_satker` (`id_satker`, `nama_satker`, `alamat_satker`) VALUES
(1, 'in 2', 'Alamat1'),
(2, 'in 3', 'Alamat1'),
(3, 'in4', 'Alamat1'),
(4, 'in5', 'Alamat1'),
(5, 'in6', 'Alamat1'),
(6, 'in7', 'Alamat1'),
(7, 'in8', 'Alamat1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `type_admin` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `id_satker`, `type_admin`) VALUES
(1, 'admin0', '7acfeea691ed2784173398382c399bdccd079fae', 1, '1'),
(2, 'admin1', 'c65110f4db9ccc88c76389f89d0cbd73a6aac54a', 2, '2'),
(3, 'admin2', 'c65110f4db9ccc88c76389f89d0cbd73a6aac54a', 3, '2'),
(4, 'admin3', 'c65110f4db9ccc88c76389f89d0cbd73a6aac54a', 4, '2'),
(5, 'admin4', 'c65110f4db9ccc88c76389f89d0cbd73a6aac54a', 6, '2'),
(6, 'admin5', 'c65110f4db9ccc88c76389f89d0cbd73a6aac54a', 7, '2'),
(7, 'admin6', 'c65110f4db9ccc88c76389f89d0cbd73a6aac54a', 5, '2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tamu`
-- (See below for the actual view)
--
CREATE TABLE `v_tamu` (
`id` int(5)
,`nama` varchar(50)
,`alamat` varchar(250)
,`pekerjaan` varchar(50)
,`nohp` varchar(15)
,`email` varchar(50)
,`bertemu` varchar(50)
,`keperluan` varchar(30)
,`tindakan` varchar(20)
,`tgl` date
,`jam` varchar(20)
,`rincian` varchar(200)
,`tujuan` varchar(100)
,`cara_mendapat_info` varchar(50)
,`cara_memperoleh_info` varchar(50)
,`foto` varchar(255)
,`id_tamu` int(5)
,`id_survey` int(5)
,`sangat_puas` int(5)
,`puas` int(5)
,`tidak` int(5)
);

-- --------------------------------------------------------

--
-- Structure for view `v_tamu`
--
DROP TABLE IF EXISTS `v_tamu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tamu`  AS SELECT `tamu`.`id` AS `id`, `tamu`.`nama` AS `nama`, `tamu`.`alamat` AS `alamat`, `tamu`.`pekerjaan` AS `pekerjaan`, `tamu`.`nohp` AS `nohp`, `tamu`.`email` AS `email`, `tamu`.`bertemu` AS `bertemu`, `tamu`.`keperluan` AS `keperluan`, `tamu`.`tindakan` AS `tindakan`, `tamu`.`tgl` AS `tgl`, `tamu`.`jam` AS `jam`, `tamu`.`rincian` AS `rincian`, `tamu`.`tujuan` AS `tujuan`, `tamu`.`cara_mendapat_info` AS `cara_mendapat_info`, `tamu`.`cara_memperoleh_info` AS `cara_memperoleh_info`, `tamu`.`foto` AS `foto`, `survey`.`id_tamu` AS `id_tamu`, `survey`.`id_survey` AS `id_survey`, `survey`.`sangat_puas` AS `sangat_puas`, `survey`.`puas` AS `puas`, `survey`.`tidak` AS `tidak` FROM (`tamu` left join `survey` on(`survey`.`id_tamu` = `tamu`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD UNIQUE KEY `id_tamu` (`id_tamu`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_satker` (`id_satker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_satker`) REFERENCES `tbl_satker` (`id_satker`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
