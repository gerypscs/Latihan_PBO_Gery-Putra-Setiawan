-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2026 at 09:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti_1c_gery putra setiawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` varchar(50) NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int(11) NOT NULL DEFAULT 1,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
('TKT-IMX-001', 'Mortal Kombat II', '2026-07-01 12:00:00', 2, 95000.00, 'IMAX', 'IMAX 12-Channel', 'Row K', '3D-IMX-01A', 'Laser Projection Opt', NULL, NULL),
('TKT-IMX-002', 'Mission Impossible : The Final Reckoning', '2026-07-01 16:00:00', 2, 95000.00, 'IMAX', 'IMAX 12-Channel', 'Row L', NULL, 'Dual Laser Enhanced', NULL, NULL),
('TKT-IMX-003', 'Avengers: Secret Wars', '2026-07-02 13:00:00', 1, 110000.00, 'IMAX', 'IMAX 6-Track', 'Row M', '3D-IMX-05B', 'Standard IMAX Motion', NULL, NULL),
('TKT-IMX-004', 'Star Wars: New Jedi Order', '2026-07-02 18:30:00', 2, 110000.00, 'IMAX', 'IMAX 12-Channel', 'Row J', NULL, 'Laser Projection Opt', NULL, NULL),
('TKT-IMX-005', 'Interstellar Re-Release', '2026-07-03 15:00:00', 4, 95000.00, 'IMAX', 'IMAX 6-Track', 'Row L', NULL, '70mm Film Simulation', NULL, NULL),
('TKT-IMX-006', 'The Batman: Part II', '2026-07-04 20:00:00', 2, 120000.00, 'IMAX', 'IMAX 12-Channel', 'Row K', NULL, 'Dual Laser Enhanced', NULL, NULL),
('TKT-IMX-007', 'Superman: Legacy', '2026-07-05 14:00:00', 2, 120000.00, 'IMAX', 'IMAX 12-Channel', 'Row M', '3D-IMX-12C', 'Laser Projection Opt', NULL, NULL),
('TKT-REG-001', 'Avengers: Secret Wars', '2026-07-01 13:00:00', 2, 50000.00, 'Regular', 'Dolby Digital 5.1', 'Row G', NULL, NULL, NULL, NULL),
('TKT-REG-002', 'Mortal Kombat II', '2026-07-01 15:30:00', 1, 50000.00, 'Regular', 'Dolby Atmos', 'Row E', '3D-REG-99X', NULL, NULL, NULL),
('TKT-REG-003', 'Five Nights at Freddy 2', '2026-07-02 19:00:00', 4, 60000.00, 'Regular', 'Dolby Atmos', 'Row C', NULL, NULL, NULL, NULL),
('TKT-REG-004', 'Jurassic World : Rebirth', '2026-07-02 14:00:00', 2, 45000.00, 'Regular', 'Standard Stereo', 'Row H', NULL, NULL, NULL, NULL),
('TKT-REG-005', 'Mission Impossible : The Final Reckoning', '2026-07-03 21:00:00', 2, 60000.00, 'Regular', 'Dolby Atmos', 'Row F', NULL, NULL, NULL, NULL),
('TKT-REG-006', 'The Batman: Part II', '2026-07-04 12:00:00', 1, 55000.00, 'Regular', 'Dolby Digital 5.1', 'Row J', NULL, NULL, NULL, NULL),
('TKT-REG-007', 'KKN di Desa Penari 2', '2026-07-04 16:45:00', 3, 55000.00, 'Regular', 'Dolby Atmos', 'Row D', NULL, NULL, NULL, NULL),
('TKT-VLV-001', 'Avengers: Secret Wars', '2026-07-01 19:30:00', 2, 250000.00, 'Velvet', 'Dolby Atmos VIP', 'Sofa A1', NULL, NULL, 'Twin Pillow & Luxury Blanket', 'Personal Butler Service'),
('TKT-VLV-002', 'Dune: Part Three', '2026-07-01 22:15:00', 2, 250000.00, 'Velvet', 'Dolby Atmos VIP', 'Sofa B3', NULL, NULL, 'Twin Pillow & Luxury Blanket', 'Personal Butler Service'),
('TKT-VLV-003', 'The Batman: Part II', '2026-07-02 20:00:00', 2, 275000.00, 'Velvet', 'DTS:X Premium', 'Sofa A4', NULL, NULL, 'Premium Silk Blanket Pack', 'VIP Butler & Dine-In'),
('TKT-VLV-004', 'Avatar 4', '2026-07-03 18:00:00', 2, 250000.00, 'Velvet', 'Dolby Atmos VIP', 'Sofa C2', '3D-VLV-02Z', NULL, 'Twin Pillow & Luxury Blanket', 'Personal Butler Service'),
('TKT-VLV-005', 'Star Wars: New Jedi Order', '2026-07-04 21:30:00', 2, 300000.00, 'Velvet', 'DTS:X Premium', 'Sofa A2', NULL, NULL, 'Premium Silk Blanket Pack', 'VIP Butler & Dine-In'),
('TKT-VLV-006', 'Inception Legacy Edition', '2026-07-05 19:00:00', 2, 250000.00, 'Velvet', 'Dolby Atmos VIP', 'Sofa B1', NULL, NULL, 'Twin Pillow & Luxury Blanket', 'Personal Butler Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
