-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 04:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(11) NOT NULL,
  `no_rm` varchar(25) NOT NULL,
  `poli` varchar(25) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `no_rm`, `poli`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(1, '', '', 1, 'Sakarotul Maut', 1),
(2, '202312-001', '1', 1, 'Anak Saya Sehat Wal Afiat', 2),
(3, '202312-001', '2', 1, 'Terima Bedah dan Terima Kasih', 3);

--
-- Triggers `daftar_poli`
--
DELIMITER $$
CREATE TRIGGER `no_antrian` BEFORE INSERT ON `daftar_poli` FOR EACH ROW BEGIN
    DECLARE max_antrian INT;

    -- Ambil nilai maksimum dari kolom no_antrian
    SELECT COALESCE(MAX(no_antrian), 0) INTO max_antrian FROM daftar_poli;

    -- Set nilai no_antrian untuk record baru
    SET NEW.no_antrian = max_antrian + 1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(50) NOT NULL,
  `id_periksa` int(50) NOT NULL,
  `id_obat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `id_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `alamat`, `no_hp`, `id_poli`) VALUES
(2, 'Wahyoudie', 'Pemalang', '089876543210', 2),
(4, 'Bambang Pacoel', 'Semarang', '089876543210', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 2, 'Senin', '00:00:00', '23:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(100) CHARACTER SET latin1 NOT NULL,
  `kemasan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(3, 'Paracetamol', 'tablet', 20000),
(4, 'Mylanta', 'syrup', 25000),
(5, 'Ibuprofen', 'tablet', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_rm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(1, 'Mariyadi', 'Hogward', '3315033112020001', '081234567890', '202312-001'),
(2, 'Bagus', 'Pekalongan', '3315031203040005', '089876543210', '202401-002'),
(3, 'Agus', 'Semarang', '3315031307050003', '081234567890', '202401-003'),
(4, 'Solikin', 'Kendal', '3315031707070007', '082315254256', '202401-004');

--
-- Triggers `pasien`
--
DELIMITER $$
CREATE TRIGGER `no_rm` BEFORE INSERT ON `pasien` FOR EACH ROW BEGIN
    DECLARE id INT;
    DECLARE formatted_no_rm VARCHAR(20);

    -- Ambil ID baru yang akan di-insert
    SELECT AUTO_INCREMENT INTO id
    FROM information_schema.tables
    WHERE table_name = 'pasien' AND table_schema = DATABASE();

    -- Format nomor rekam medis sesuai 'yyyymm-auto_increment'
    SET formatted_no_rm = CONCAT(DATE_FORMAT(NOW(), '%Y%m'), '-', LPAD(id, 3, '0'));

    -- Setel nilai nomor rekam medis yang diformat ke kolom nomor_rm sebelum INSERT
    SET NEW.no_rm = formatted_no_rm;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `keluhan` varchar(1000) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `obat` varchar(1000) NOT NULL,
  `biaya_periksa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_poli`, `tgl_periksa`, `nama_pasien`, `keluhan`, `nama_dokter`, `catatan`, `obat`, `biaya_periksa`) VALUES
(2, 1, '2023-12-27 08:52:37', 'Mariyadi', 'Besok Meninggal', 'Wahyoudie', 'Sepertinya Sudah Tidak Tertolong', 'Potasium Nitrate 3x sehari, Dihabiskan', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'Anak', 'Untuk Anak-anak'),
(2, 'Bedah', 'Terima Bedah dan Terima Kasih');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(3, 'ane', 'ane', '6c7be0759b9fe15878dbd4cd7c5d0d84', 'admin'),
(4, 'ente', 'ente', 'c8bd0177e53c5d2fec5d7e8cba43c505', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_rm` (`no_rm`) USING BTREE,
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `poli` (`poli`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_periksa_obat` (`id_obat`),
  ADD KEY `fk_periksa_detail_periksa` (`id_periksa`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `fk_poli_dokter` (`id_poli`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_periksa_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_rm` (`no_rm`) USING BTREE,
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_2` (`nama`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftar_poli_periksa` (`id_poli`),
  ADD KEY `nama_pasien` (`nama_pasien`),
  ADD KEY `nama_dokter` (`nama_dokter`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_jadwal_periksa_detail_periksa` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`);

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_detail_periksa_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_periksa_detail_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_poli_dokter` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_jadwal_periksa_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_daftar_poli_periksa` FOREIGN KEY (`id_poli`) REFERENCES `daftar_poli` (`id`),
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`nama_dokter`) REFERENCES `dokter` (`nama`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`nama_pasien`) REFERENCES `pasien` (`nama`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
