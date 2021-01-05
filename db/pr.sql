-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 12:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_req` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `lama_langganan` datetime NOT NULL,
  `batas_pembayaran` date NOT NULL,
  `upload_pembayaran` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Belum Lunas',
  `harga` int(11) NOT NULL,
  `tgl_bayar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_req`, `id_peserta`, `nama`, `tanggal`, `lama_langganan`, `batas_pembayaran`, `upload_pembayaran`, `status`, `harga`, `tgl_bayar`) VALUES
(1, 1, 'peserta 1', '2021-01-05 14:39:52', '2021-01-05 14:39:52', '2021-01-05', 'linkedin.png', 'Lunas', 0, 'Tuesday, 05-01-2021'),
(2, 1, 'peserta 1', '2021-01-05 09:27:20', '2021-04-06 09:27:24', '2021-01-08', 'linkedin.png', 'Belum Lunas', 300000, 'Tuesday, 05-01-2021');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_qna` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `pengajar` int(5) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Premium',
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama`, `detail`, `pengajar`, `status`, `image`) VALUES
(1, 'CSS DASAR', '', 1, 'Premium', 'css.png'),
(2, 'HTML DASAR', '', 1, 'Premium', 'html.png'),
(3, 'PHP UNTUK PEMULA', '', 1, 'Premium', 'php.png'),
(5, 'google', 'test', 1, 'Premium', 'google.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `privilage` varchar(10) NOT NULL DEFAULT 'pengajar',
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama`, `privilage`, `email`, `password`) VALUES
(1, 'Web Programming Unpas', 'pengajar', 'programingunpas@gmail.com', '12345678'),
(2, 'admin', 'admin', 'admin@codie.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `id_kursus` int(5) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_kursus`, `id_pengajar`, `judul`, `isi`) VALUES
(13, 1, 1, 'pengumuman', 'Terimakasih'),
(14, 1, 2, 'Admin', 'Admin'),
(19, 2, 1, 'pengumuman', 'html ku');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` int(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Belum Langganan',
  `exp_status` datetime DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama`, `nohp`, `status`, `exp_status`, `email`, `password`) VALUES
(1, 'peserta 1', 12345678, 'Belum Langganan', NULL, 'peserta@gmail.com', 'peserta'),
(2, 'peserta 2', 12345678, 'Langganan', NULL, 'langanan@gmail.com', 'langganan');

-- --------------------------------------------------------

--
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `id_qna` int(11) NOT NULL,
  `id_kursus` int(5) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `detail` text NOT NULL,
  `Topic` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qna`
--

INSERT INTO `qna` (`id_qna`, `id_kursus`, `id_pengajar`, `id_peserta`, `nama`, `pertanyaan`, `detail`, `Topic`) VALUES
(12, 1, 1, 2, 'peserta 2', 'aa', 'aa', 'CSS DASAR');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(5) NOT NULL,
  `id_kursus` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_kursus`, `nama`, `link`) VALUES
(4, 1, 'CSS Dasar - 1 – Pendahuluan ', 'https://www.youtube.com/embed/CleFk3BZB3g'),
(5, 1, 'CSS Dasar - 2 - Anatomi CSS ', 'https://www.youtube.com/embed/8lXDi2Mxp9c'),
(6, 1, 'CSS Dasar - 3 - Penempatan CSS ', 'https://www.youtube.com/embed/8lXDi2Mxp9c'),
(7, 1, 'CSS Dasar - 4 - Font Styling ', 'https://www.youtube.com/embed/nPHed3_oPvY'),
(8, 1, 'CSS Dasar - 5 - Text Styling ', 'https://www.youtube.com/embed/xih8giA7S3Q'),
(9, 1, 'CSS Dasar - 6 – Background', 'https://www.youtube.com/embed/zm-HPYS_ELU'),
(10, 1, 'CSS Dasar - 7 – Selector', 'https://www.youtube.com/embed/0KLwWyQyMQo'),
(11, 1, 'CSS Dasar - 8 - Pseudo Class', 'https://www.youtube.com/embed/G0gYWdIHOug'),
(12, 1, 'CSS Dasar - 9 – Inheritance ', 'https://www.youtube.com/embed/kY2FEA3y43E'),
(13, 1, 'CSS Dasar - 10 – Specificity', 'https://www.youtube.com/embed/yu74Y1ndd5w'),
(14, 2, 'HTML Dasar : Pendahuluan HTML', 'https://www.youtube.com/embed/NBZ9Ro6UKV8'),
(15, 2, 'HTML Dasar : Hello World!', 'https://www.youtube.com/embed/1NicaVOCXHA'),
(16, 2, 'HTML Dasar : Code Editor', 'https://www.youtube.com/embed/3sLSi9L5nWE'),
(17, 2, 'HTML Dasar : Tag', 'https://www.youtube.com/embed/cUWBYzA6M-8'),
(18, 2, 'HTML Dasar : Paragraf', 'https://www.youtube.com/embed/Dl_bIYBc9gM'),
(19, 2, 'HTML Dasar : Heading', 'https://www.youtube.com/embed/SMetRBdIh-8'),
(20, 2, 'HTML Dasar : List', 'https://www.youtube.com/embed/gLHEoeupIZs'),
(21, 2, 'HTML Dasar : Hyperlink', 'https://www.youtube.com/embed/QIlBOI-hTuA'),
(22, 2, 'HTML Dasar : Image', 'https://www.youtube.com/embed/yb_emYhY3Pc'),
(23, 2, 'HTML Dasar : Table', 'https://www.youtube.com/embed/7-QNafrXigs'),
(24, 2, 'HTML Dasar : Table Merging', 'https://www.youtube.com/embed/qs8G2XWf7Yk'),
(25, 2, 'HTML Dasar : Form', 'https://www.youtube.com/embed/LQf_Jj7jbC'),
(26, 2, 'HTML Dasar : Form (lanjutan)', 'https://www.youtube.com/embed/_CNkLKU-LoE'),
(27, 3, 'Belajar PHP untuk PEMULA | 1. Intro', 'https://www.youtube.com/embed/l1W2OwV5rgY'),
(28, 3, 'Belajar PHP untuk PEMULA | 2. SEJARAH & KARAKTERISTIK PHP', 'https://www.youtube.com/embed/q3NVC5JxgVI'),
(29, 3, 'Belajar PHP untuk PEMULA | 3. PERSIAPAN LINGKUNGAN PENGEMBANGAN', 'https://www.youtube.com/embed/o8oLQVYlpqw'),
(30, 3, 'Belajar PHP untuk PEMULA | 4. SINTAKS PHP', 'https://www.youtube.com/embed/XTrU0GzMfCk'),
(31, 3, 'Belajar PHP untuk PEMULA | 5. STRUKTUR KENDALI', 'https://www.youtube.com/embed/9gpAJPWD-xI'),
(32, 3, 'Belajar PHP untuk PEMULA | 6. FUNCTION', 'https://www.youtube.com/embed/R5C70w2MOkE'),
(33, 3, 'Belajar PHP untuk PEMULA | 7. ARRAY', 'https://www.youtube.com/embed/qp1l7A4xDIc '),
(34, 3, 'Belajar PHP untuk PEMULA | 8. ASSOCIATIVE ARRAY', 'https://www.youtube.com/embed/mNgOuUUp1I0 '),
(35, 3, 'Belajar PHP untuk PEMULA | 9. GET & POST', 'https://www.youtube.com/embed/6vG4oO39ivY'),
(36, 3, 'Belajar PHP untuk PEMULA | 10. DATABASE & MySQL', 'https://www.youtube.com/embed/fxe6qev-bno ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `id_pesertaa` (`id_peserta`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_qna` (`id_qna`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `pengajar` (`pengajar`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_kursus` (`id_kursus`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id_qna`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_kursusu` (`id_kursus`),
  ADD KEY `id_pengajarr` (`id_pengajar`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `video` (`id_kursus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `id_qna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `id_pesertaa` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `id_qna` FOREIGN KEY (`id_qna`) REFERENCES `qna` (`id_qna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `pengajar` FOREIGN KEY (`pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `id_kursus` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pengajar` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qna`
--
ALTER TABLE `qna`
  ADD CONSTRAINT `id_kursusu` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pengajarr` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
