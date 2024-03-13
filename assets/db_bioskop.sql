-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_seat` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status_kursi` enum('Booking','Terisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_seat`, `price`, `status_kursi`) VALUES
(67, 41, 150, 25000, 'Booking'),
(68, 41, 151, 25000, 'Booking'),
(69, 42, 176, 25000, 'Booking'),
(70, 43, 155, 25000, 'Booking'),
(71, 44, 156, 25000, 'Booking'),
(72, 44, 165, 25000, 'Booking'),
(73, 45, 157, 25000, 'Booking'),
(74, 46, 152, 25000, 'Booking'),
(76, 48, 31, 25000, 'Booking'),
(77, 49, 178, 25000, 'Booking'),
(78, 49, 179, 25000, 'Booking'),
(79, 50, 7, 30000, 'Booking'),
(80, 50, 8, 30000, 'Booking'),
(81, 51, 76, 35000, 'Booking'),
(82, 51, 77, 35000, 'Booking'),
(83, 52, 101, 35000, 'Booking'),
(84, 52, 102, 35000, 'Booking'),
(85, 53, 80, 35000, 'Booking'),
(86, 53, 81, 35000, 'Booking'),
(102, 63, 197, 25000, 'Terisi'),
(103, 63, 198, 25000, 'Terisi'),
(105, 65, 189, 25000, 'Booking'),
(106, 65, 199, 25000, 'Booking'),
(109, 67, 92, 30000, 'Terisi'),
(110, 67, 93, 30000, 'Terisi'),
(113, 69, 330, 30000, 'Terisi'),
(114, 69, 331, 30000, 'Terisi'),
(115, 70, 338, 30000, 'Terisi'),
(116, 70, 339, 30000, 'Terisi'),
(117, 71, 322, 30000, 'Terisi'),
(118, 71, 323, 30000, 'Terisi'),
(119, 72, 336, 30000, 'Terisi'),
(120, 72, 337, 30000, 'Terisi'),
(121, 73, 318, 30000, 'Terisi'),
(122, 73, 333, 30000, 'Terisi'),
(123, 73, 346, 30000, 'Terisi'),
(124, 74, 319, 30000, 'Terisi'),
(125, 74, 323, 30000, 'Terisi'),
(126, 75, 102, 30000, 'Terisi'),
(127, 75, 103, 30000, 'Terisi'),
(128, 76, 104, 30000, 'Booking'),
(129, 77, 269, 30000, 'Terisi'),
(130, 77, 270, 30000, 'Terisi'),
(131, 78, 271, 30000, 'Terisi'),
(132, 78, 272, 30000, 'Terisi'),
(133, 79, 91, 35000, 'Terisi'),
(134, 79, 92, 35000, 'Terisi'),
(135, 80, 102, 35000, 'Terisi'),
(136, 80, 114, 35000, 'Terisi');

-- --------------------------------------------------------

--
-- Table structure for table `dimension`
--

CREATE TABLE `dimension` (
  `id_dimension` int(11) NOT NULL,
  `name_dimension` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dimension`
--

INSERT INTO `dimension` (`id_dimension`, `name_dimension`) VALUES
(1, '2D'),
(2, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `category_age` enum('SU','13+','17+','21+') NOT NULL,
  `id_genre` varchar(35) NOT NULL,
  `id_dimension` int(11) NOT NULL,
  `trailer` text NOT NULL,
  `description` text NOT NULL,
  `producer` varchar(100) NOT NULL,
  `directur` varchar(100) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `distributor` varchar(100) NOT NULL,
  `actor` text NOT NULL,
  `durasi` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tayang` date NOT NULL,
  `berakhir` date NOT NULL,
  `status_film` enum('Berlangsung','Akan Datang','Berakhir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `title`, `image`, `category_age`, `id_genre`, `id_dimension`, `trailer`, `description`, `producer`, `directur`, `writer`, `distributor`, `actor`, `durasi`, `created_at`, `update_at`, `tayang`, `berakhir`, `status_film`) VALUES
(1, 'Annette', 'annete.jpeg', 'SU', '2', 1, 'asdasdads', 'adasdsadsas', 'dsaadasdasds', 'asdasdasds', 'Adits', 'asdasdasds', 'Dimas,Adit,Tyas', 121, '2024-02-06 11:03:55', '2024-03-01 05:33:31', '2024-03-01', '2024-03-04', 'Berlangsung'),
(3, 'Lampir', 'lampir.jpg', '13+', '2,9', 1, 'https://youtu.be/k1TU9UniYMU?si=-AHNCH2hCjK6Yite', 'Sekelompok sahabat yang sedang photoshoot pre-wedding di sebuah villa mewah nan vintage, ternyata malah terjebak di sarang keramat Mak Lampir yang konon bernafsu menjadi wanita tercantik dan abadi. Dapat kah mereka selamat dari permainan kematian Mak Lampir?', 'Gandhi Fernando, Philip Lesmana, Clarissa Tanoesoedibjo', 'Creator Pictures, Sinergi Pictures, Vision+', 'Kenny Gulardi', 'Creator Pictures, Sinergi Pictures, Vision+', 'Dimas,Adit,Tyas', 121, '2024-02-07 01:22:09', '2024-02-28 01:15:00', '2024-02-15', '2024-03-04', 'Berlangsung'),
(9, 'MADAME WEB', 'manade_web.jpg', '13+', '3,4', 1, 'https://youtu.be/s_76M4c4LTo?si=Fbesx5VwGusf16wH', 'Casie (Dakota Johnson), seorang paramedis yang nyaris kehilangan nyawanya saat bertugas. Ia terjatuh ke dalam air bersama mobil korban yang coba dibantunya. Setelah kejadian itu Casie mampu melihat masa depan tanpa ia tahu penyebabnya.', 'Lorenzo di Bonaventura', 'Columbia Pictures', 'Matt Sazama, Burk Sharpless, Claire Parker, S.j. Clarkson', 'Columbia Pictures', 'Dimas,Adit,Tyas', 121, '2024-02-17 06:37:04', '2024-02-28 01:14:50', '2024-02-18', '2024-03-06', 'Berlangsung'),
(10, 'SPY X FAMILY CODE: WHITE', 'spy.jpg', '13+', '3,11', 1, 'https://youtu.be/hLUijsHg9jM?si=FRWQ9qs9cKqElDbG', 'Bercerita tentang perjalanan keluarga pertama yang dilakukan seluruh keluarga Forger. Seharusnya perjalanan ini menyenangkan, namun Anya menemukan rahasia yang dapat mengguncang perdamaian dunia... Komedi aksi mata-mata yang luar biasa digambarkan dalam skala yang megah dalam versi teatrikal! Sekali lagi, nasib dunia dipercayakan kepada sebuah keluarga yang mengalami serangkaian insiden!', 'Akifumi Fujio, Kazutaka Yamanaka', 'Toho Animation, Cloverworks, Wit Studio', 'Tatsuya Endo, Ichiro Okouchi', 'Toho Animation, Cloverworks, Wit Studio', 'Dimas,Adit,Tyas', 121, '2024-02-17 07:58:04', '2024-02-28 00:54:41', '2024-02-17', '2024-03-07', 'Berlangsung'),
(11, 'MENDUNG TANPO UDAN', 'mendung-tampo-ujan.jpg', '17+', '1,6', 1, 'https://youtu.be/0WTAErVV-kk?si=xQblGcwxqmaO6i6b', 'Udan (Erick Estrada) adalah seorang mahasiswa tingkat akhir yang sangat terobsesi dengan musik. Obsesi ini tanpa disadari membuat Udan menjadi pribadi yang idealis dan keras kepala. Hingga suatu hari Udan bertemu dan jatuh hati dengan Mendung (Yunita Siregar), seorang perempuan cerdas yang memiliki impian menjadi seorang wanita karir yang independen. Hubungan dua insan yang memiliki impian bertolak belakang ini, perlahan melahirkan konflik yang memaksa mereka untuk memilih antara cinta dan karir.', 'Muhammad Hananto', 'Kris Budiman', 'Tony C Sihombing, Gianluigi Christoikov, Kris Budiman, Agit Romon', 'Nant Entertainment', 'Erick Estrada, Yunita Siregar, Wavi Zihan, Tommy Limm, Kerry Astina, Aulia Deas, Marcell Darwin', 124, '2024-02-17 08:00:54', '2024-02-29 00:40:45', '2024-02-29', '2024-03-28', 'Berlangsung');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `name_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `name_genre`) VALUES
(1, 'Romance'),
(2, 'Horor'),
(3, 'Action'),
(4, 'Adventure'),
(5, 'Comedy'),
(6, 'Drama'),
(7, 'Science Fiction'),
(8, 'Fantasy'),
(9, 'Thriller'),
(10, 'Mystery'),
(11, 'Animation'),
(12, 'Musical'),
(13, 'Biography'),
(14, 'Historical'),
(15, 'Documentary');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_teater` int(11) NOT NULL,
  `status_order` enum('Belum Bayar','Sudah Di Bayar') NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `date`, `id_user`, `id_schedule`, `id_teater`, `status_order`, `Total`) VALUES
(51, '2024-02-25', 2, 45, 1, 'Sudah Di Bayar', 70000),
(52, '2024-02-25', 2, 45, 1, 'Sudah Di Bayar', 70000),
(53, '2024-02-25', 4, 44, 1, 'Belum Bayar', 70000),
(63, '2024-02-26', 3, 55, 2, 'Sudah Di Bayar', 50000),
(65, '2024-02-29', 2, 63, 2, 'Sudah Di Bayar', 50000),
(67, '2024-03-01', 2, 70, 1, 'Sudah Di Bayar', 60000),
(69, '2024-03-01', 2, 71, 5, 'Sudah Di Bayar', 60000),
(70, '2024-03-01', 2, 72, 5, 'Sudah Di Bayar', 60000),
(71, '2024-03-01', 2, 72, 5, 'Sudah Di Bayar', 60000),
(72, '2024-03-01', 2, 72, 5, 'Sudah Di Bayar', 60000),
(73, '2024-03-01', 2, 71, 5, 'Sudah Di Bayar', 90000),
(74, '2024-03-01', 2, 71, 5, 'Sudah Di Bayar', 60000),
(75, '2024-03-01', 2, 70, 1, 'Sudah Di Bayar', 60000),
(76, '2024-03-01', 3, 70, 1, 'Belum Bayar', 30000),
(77, '2024-03-01', 2, 74, 3, 'Sudah Di Bayar', 60000),
(78, '2024-03-01', 2, 74, 3, 'Sudah Di Bayar', 60000),
(79, '2024-03-02', 2, 75, 1, 'Sudah Di Bayar', 70000),
(80, '2024-03-02', 2, 75, 1, 'Sudah Di Bayar', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Kasir'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `clock` varchar(25) NOT NULL,
  `clock_end` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_teater` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `date`, `day`, `clock`, `clock_end`, `price`, `id_film`, `id_teater`) VALUES
(43, '2024-03-02', 'Sabtu', '14:00:00', '16:01:00', 35000, 9, 2),
(44, '2024-02-25', 'Minggu', '16:00', '18:01', 35000, 1, 1),
(45, '2024-02-25', 'Minggu', '12:00', '14:01', 35000, 1, 1),
(46, '2024-02-25', 'Minggu', '09:05', '11:06', 35000, 1, 1),
(47, '2024-02-25', 'Minggu', '18:08', '20:09', 35000, 1, 1),
(48, '2024-02-25', 'Minggu', '08:00', '10:01', 35000, 1, 3),
(49, '2024-02-25', 'Minggu', '06:00', '08:01', 35000, 1, 1),
(50, '2024-02-25', 'Minggu', '09:26', '11:27', 35000, 1, 2),
(51, '2024-03-02', 'Sabtu', '22:22', '24:23', 35000, 1, 1),
(52, '2024-02-25', 'Minggu', '12:00', '14:01', 35000, 9, 2),
(53, '2024-02-25', 'Minggu', '21:00', '23:01', 35000, 9, 2),
(54, '2024-02-26', 'Senin', '22:00', '24:01', 25000, 1, 1),
(55, '2024-02-26', 'Senin', '21:00', '23:01', 25000, 9, 2),
(56, '2024-02-28', 'Rabu', '10:00', '12:01', 25000, 10, 1),
(57, '2024-02-28', 'Rabu', '13:00', '15:01', 25000, 3, 2),
(58, '2024-02-28', 'Rabu', '12:00', '14:01', 25000, 9, 3),
(59, '2024-02-28', 'Rabu', '08:20', '10:21', 25000, 3, 4),
(60, '2024-02-28', 'Rabu', '14:00', '16:01', 25000, 1, 1),
(61, '2024-02-29', 'Kamis', '08:35', '10:36', 25000, 10, 2),
(62, '2024-02-29', 'Kamis', '12:00', '14:01', 25000, 10, 1),
(63, '2024-02-29', 'Kamis', '13:00', '15:04', 25000, 11, 2),
(64, '2024-02-29', 'Kamis', '12:00', '14:01', 25000, 10, 3),
(66, '2024-02-29', 'Kamis', '07:40', '09:41', 25000, 9, 1),
(67, '2024-02-29', 'Kamis', '09:00', '11:01', 25000, 3, 4),
(68, '2024-02-29', 'Kamis', '17:30', '19:31', 25000, 1, 2),
(69, '2024-02-29', 'Kamis', '15:00', '17:01', 25000, 10, 1),
(70, '2024-03-01', 'Jumat', '20:00', '22:01', 30000, 9, 1),
(71, '2024-03-01', 'Jumat', '23:00', '25:01', 30000, 9, 5),
(72, '2024-03-01', 'Jumat', '20:00', '22:01', 30000, 9, 5),
(73, '2024-03-01', 'Jumat', '23:00', '25:01', 30000, 10, 2),
(74, '2024-03-01', 'Jumat', '22:22', '24:23', 30000, 9, 3),
(75, '2024-03-02', 'Sabtu', '12:00:00', '14:01:00', 35000, 9, 1),
(76, '2024-03-02', 'Sabtu', '23:00:00', '25:01:00', 35000, 3, 2),
(77, '2024-03-02', 'Sabtu', '23:00:00', '01:01:00', 35000, 10, 3),
(78, '2024-03-03', 'Minggu', '01:00:00', '03:01:00', 35000, 9, 3),
(79, '2024-04-06', 'Sabtu', '01:00:00', '03:01:00', 35000, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id_seat` int(11) NOT NULL,
  `number_seat` varchar(10) NOT NULL,
  `variable_seat` varchar(3) NOT NULL,
  `id_teater` int(11) NOT NULL,
  `status_seat` enum('Kosong','Rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id_seat`, `number_seat`, `variable_seat`, `id_teater`, `status_seat`) VALUES
(1, '1', 'A', 1, 'Rusak'),
(2, '2', 'A', 1, 'Rusak'),
(3, '3', 'A', 1, ''),
(4, '4', 'A', 1, ''),
(5, '5', 'A', 1, ''),
(6, '6', 'A', 1, ''),
(7, '7', 'A', 1, ''),
(8, '8', 'A', 1, ''),
(9, '9', 'A', 1, 'Kosong'),
(10, '10', 'A', 1, 'Kosong'),
(11, '11', 'A', 1, 'Kosong'),
(12, '12', 'A', 1, 'Kosong'),
(13, '1', 'B', 1, ''),
(14, '2', 'B', 1, ''),
(15, '3', 'B', 1, ''),
(16, '4', 'B', 1, ''),
(17, '5', 'B', 1, ''),
(18, '6', 'B', 1, ''),
(19, '7', 'B', 1, 'Kosong'),
(20, '8', 'B', 1, 'Kosong'),
(21, '9', 'B', 1, 'Kosong'),
(22, '10', 'B', 1, 'Kosong'),
(23, '11', 'B', 1, 'Kosong'),
(24, '12', 'B', 1, 'Kosong'),
(25, '1', 'C', 1, ''),
(26, '2', 'C', 1, ''),
(27, '3', 'C', 1, ''),
(28, '4', 'C', 1, ''),
(29, '5', 'C', 1, ''),
(30, '6', 'C', 1, 'Kosong'),
(31, '7', 'C', 1, ''),
(32, '8', 'C', 1, 'Kosong'),
(33, '9', 'C', 1, ''),
(34, '10', 'C', 1, 'Kosong'),
(35, '11', 'C', 1, 'Kosong'),
(36, '12', 'C', 1, 'Kosong'),
(37, '1', 'D', 1, 'Kosong'),
(38, '2', 'D', 1, 'Kosong'),
(39, '3', 'D', 1, ''),
(40, '4', 'D', 1, ''),
(41, '5', 'D', 1, 'Kosong'),
(42, '6', 'D', 1, 'Kosong'),
(43, '7', 'D', 1, ''),
(44, '8', 'D', 1, ''),
(45, '9', 'D', 1, ''),
(46, '10', 'D', 1, 'Kosong'),
(47, '11', 'D', 1, 'Kosong'),
(48, '12', 'D', 1, 'Kosong'),
(49, '1', 'E', 1, 'Kosong'),
(50, '2', 'E', 1, 'Kosong'),
(51, '3', 'E', 1, 'Kosong'),
(52, '4', 'E', 1, 'Kosong'),
(53, '5', 'E', 1, ''),
(54, '6', 'E', 1, ''),
(55, '7', 'E', 1, 'Kosong'),
(56, '8', 'E', 1, 'Kosong'),
(57, '9', 'E', 1, 'Kosong'),
(58, '10', 'E', 1, 'Kosong'),
(59, '11', 'E', 1, 'Kosong'),
(60, '12', 'E', 1, 'Kosong'),
(61, '1', 'F', 1, 'Kosong'),
(62, '2', 'F', 1, 'Kosong'),
(63, '3', 'F', 1, 'Kosong'),
(64, '4', 'F', 1, 'Kosong'),
(65, '5', 'F', 1, 'Kosong'),
(66, '6', 'F', 1, 'Kosong'),
(67, '7', 'F', 1, 'Kosong'),
(68, '8', 'F', 1, 'Kosong'),
(69, '9', 'F', 1, 'Kosong'),
(70, '10', 'F', 1, 'Kosong'),
(71, '11', 'F', 1, 'Kosong'),
(72, '12', 'F', 1, 'Kosong'),
(73, '1', 'G', 1, 'Kosong'),
(74, '2', 'G', 1, 'Kosong'),
(75, '3', 'G', 1, 'Kosong'),
(76, '4', 'G', 1, ''),
(77, '5', 'G', 1, ''),
(78, '6', 'G', 1, 'Kosong'),
(79, '7', 'G', 1, 'Kosong'),
(80, '8', 'G', 1, ''),
(81, '9', 'G', 1, ''),
(82, '10', 'G', 1, 'Kosong'),
(83, '11', 'G', 1, 'Kosong'),
(84, '12', 'G', 1, 'Kosong'),
(85, '1', 'H', 1, 'Kosong'),
(86, '2', 'H', 1, 'Kosong'),
(87, '3', 'H', 1, 'Kosong'),
(88, '4', 'H', 1, ''),
(89, '5', 'H', 1, ''),
(90, '6', 'H', 1, ''),
(91, '7', 'H', 1, 'Kosong'),
(92, '8', 'H', 1, ''),
(93, '9', 'H', 1, ''),
(94, '10', 'H', 1, 'Kosong'),
(95, '11', 'H', 1, 'Kosong'),
(96, '12', 'H', 1, 'Kosong'),
(97, '1', 'I', 1, 'Kosong'),
(98, '2', 'I', 1, 'Kosong'),
(99, '3', 'I', 1, 'Kosong'),
(100, '4', 'I', 1, 'Kosong'),
(101, '5', 'I', 1, ''),
(102, '6', 'I', 1, ''),
(103, '7', 'I', 1, 'Kosong'),
(104, '8', 'I', 1, ''),
(105, '9', 'I', 1, 'Kosong'),
(106, '10', 'I', 1, 'Kosong'),
(107, '11', 'I', 1, 'Kosong'),
(108, '12', 'I', 1, 'Kosong'),
(109, '1', 'J', 1, 'Kosong'),
(110, '2', 'J', 1, 'Kosong'),
(111, '3', 'J', 1, 'Kosong'),
(112, '4', 'J', 1, 'Kosong'),
(113, '5', 'J', 1, 'Kosong'),
(114, '6', 'J', 1, 'Kosong'),
(115, '7', 'J', 1, 'Kosong'),
(116, '8', 'J', 1, 'Kosong'),
(117, '9', 'J', 1, 'Kosong'),
(118, '10', 'J', 1, ''),
(119, '11', 'J', 1, 'Kosong'),
(120, '12', 'J', 1, 'Kosong'),
(121, '1', 'L', 1, 'Kosong'),
(122, '2', 'L', 1, 'Kosong'),
(123, '3', 'L', 1, 'Kosong'),
(124, '4', 'L', 1, 'Kosong'),
(125, '5', 'L', 1, 'Kosong'),
(126, '6', 'L', 1, 'Kosong'),
(127, '7', 'L', 1, ''),
(128, '8', 'L', 1, 'Rusak'),
(129, '9', 'L', 1, 'Rusak'),
(130, '10', 'L', 1, 'Kosong'),
(131, '11', 'L', 1, 'Kosong'),
(132, '12', 'L', 1, ''),
(133, '1', 'L', 1, 'Kosong'),
(134, '2', 'L', 1, 'Kosong'),
(135, '3', 'L', 1, 'Kosong'),
(136, '4', 'L', 1, 'Kosong'),
(137, '5', 'L', 1, 'Kosong'),
(138, '6', 'L', 1, 'Kosong'),
(139, '7', 'L', 1, ''),
(140, '8', 'L', 1, 'Rusak'),
(141, '9', 'L', 1, 'Rusak'),
(142, '10', 'L', 1, 'Kosong'),
(143, '11', 'L', 1, 'Kosong'),
(144, '12', 'L', 1, ''),
(145, '1', 'A', 2, ''),
(146, '2', 'A', 2, ''),
(147, '3', 'A', 2, ''),
(148, '4', 'A', 2, ''),
(149, '5', 'A', 2, ''),
(150, '6', 'A', 2, ''),
(151, '7', 'A', 2, ''),
(152, '8', 'A', 2, ''),
(153, '9', 'A', 2, 'Kosong'),
(154, '10', 'A', 2, ''),
(155, '1', 'B', 2, ''),
(156, '2', 'B', 2, ''),
(157, '3', 'B', 2, ''),
(158, '4', 'B', 2, ''),
(159, '5', 'B', 2, ''),
(160, '6', 'B', 2, ''),
(161, '7', 'B', 2, ''),
(162, '8', 'B', 2, 'Kosong'),
(163, '9', 'B', 2, 'Kosong'),
(164, '10', 'B', 2, 'Kosong'),
(165, '1', 'C', 2, ''),
(166, '2', 'C', 2, ''),
(167, '3', 'C', 2, ''),
(168, '4', 'C', 2, ''),
(169, '5', 'C', 2, ''),
(170, '6', 'C', 2, 'Kosong'),
(171, '7', 'C', 2, 'Kosong'),
(172, '8', 'C', 2, ''),
(173, '9', 'C', 2, 'Kosong'),
(174, '10', 'C', 2, 'Kosong'),
(175, '1', 'D', 2, 'Kosong'),
(176, '2', 'D', 2, ''),
(177, '3', 'D', 2, 'Kosong'),
(178, '4', 'D', 2, ''),
(179, '5', 'D', 2, ''),
(180, '6', 'D', 2, ''),
(181, '7', 'D', 2, ''),
(182, '8', 'D', 2, 'Kosong'),
(183, '9', 'D', 2, 'Kosong'),
(184, '10', 'D', 2, 'Kosong'),
(185, '1', 'E', 2, ''),
(186, '2', 'E', 2, ''),
(187, '3', 'E', 2, ''),
(188, '4', 'E', 2, ''),
(189, '5', 'E', 2, ''),
(190, '6', 'E', 2, ''),
(191, '7', 'E', 2, ''),
(192, '8', 'E', 2, 'Kosong'),
(193, '9', 'E', 2, 'Kosong'),
(194, '10', 'E', 2, ''),
(195, '1', 'F', 2, 'Kosong'),
(196, '2', 'F', 2, 'Kosong'),
(197, '3', 'F', 2, ''),
(198, '4', 'F', 2, ''),
(199, '5', 'F', 2, ''),
(200, '6', 'F', 2, 'Kosong'),
(201, '7', 'F', 2, ''),
(202, '8', 'F', 2, ''),
(203, '9', 'F', 2, ''),
(204, '10', 'F', 2, 'Kosong'),
(205, '1', 'G', 2, 'Kosong'),
(206, '2', 'G', 2, 'Kosong'),
(207, '3', 'G', 2, ''),
(208, '4', 'G', 2, ''),
(209, '5', 'G', 2, ''),
(210, '6', 'G', 2, ''),
(211, '7', 'G', 2, 'Kosong'),
(212, '8', 'G', 2, 'Kosong'),
(213, '9', 'G', 2, 'Kosong'),
(214, '10', 'G', 2, 'Kosong'),
(215, '1', 'A', 3, 'Rusak'),
(216, '2', 'A', 3, 'Kosong'),
(217, '3', 'A', 3, 'Kosong'),
(218, '4', 'A', 3, 'Kosong'),
(219, '5', 'A', 3, 'Kosong'),
(220, '6', 'A', 3, 'Kosong'),
(221, '7', 'A', 3, 'Kosong'),
(222, '8', 'A', 3, 'Kosong'),
(223, '9', 'A', 3, 'Kosong'),
(224, '10', 'A', 3, 'Kosong'),
(225, '11', 'A', 3, 'Kosong'),
(226, '12', 'A', 3, 'Kosong'),
(227, '1', 'B', 3, 'Rusak'),
(228, '2', 'B', 3, 'Kosong'),
(229, '3', 'B', 3, 'Kosong'),
(230, '4', 'B', 3, 'Kosong'),
(231, '5', 'B', 3, 'Kosong'),
(232, '6', 'B', 3, 'Kosong'),
(233, '7', 'B', 3, 'Kosong'),
(234, '8', 'B', 3, 'Kosong'),
(235, '9', 'B', 3, 'Kosong'),
(236, '10', 'B', 3, 'Kosong'),
(237, '11', 'B', 3, 'Kosong'),
(238, '12', 'B', 3, 'Kosong'),
(239, '1', 'C', 3, 'Kosong'),
(240, '2', 'C', 3, 'Kosong'),
(241, '3', 'C', 3, 'Kosong'),
(242, '4', 'C', 3, 'Kosong'),
(243, '5', 'C', 3, 'Kosong'),
(244, '6', 'C', 3, 'Kosong'),
(245, '7', 'C', 3, 'Kosong'),
(246, '8', 'C', 3, 'Kosong'),
(247, '9', 'C', 3, 'Kosong'),
(248, '10', 'C', 3, 'Kosong'),
(249, '11', 'C', 3, 'Kosong'),
(250, '12', 'C', 3, 'Kosong'),
(251, '1', 'D', 3, 'Kosong'),
(252, '2', 'D', 3, 'Kosong'),
(253, '3', 'D', 3, 'Kosong'),
(254, '4', 'D', 3, 'Kosong'),
(255, '5', 'D', 3, 'Kosong'),
(256, '6', 'D', 3, 'Rusak'),
(257, '7', 'D', 3, ''),
(258, '8', 'D', 3, 'Kosong'),
(259, '9', 'D', 3, 'Kosong'),
(260, '10', 'D', 3, 'Kosong'),
(261, '11', 'D', 3, 'Kosong'),
(262, '12', 'D', 3, 'Kosong'),
(263, '1', 'E', 3, 'Kosong'),
(264, '2', 'E', 3, 'Kosong'),
(265, '3', 'E', 3, 'Kosong'),
(266, '4', 'E', 3, 'Kosong'),
(267, '5', 'E', 3, 'Rusak'),
(268, '6', 'E', 3, 'Rusak'),
(269, '7', 'E', 3, ''),
(270, '8', 'E', 3, ''),
(271, '9', 'E', 3, ''),
(272, '10', 'E', 3, 'Kosong'),
(273, '11', 'E', 3, 'Kosong'),
(274, '12', 'E', 3, 'Kosong'),
(276, '1', 'A', 4, 'Kosong'),
(277, '2', 'A', 4, 'Kosong'),
(278, '3', 'A', 4, 'Kosong'),
(279, '4', 'A', 4, 'Kosong'),
(280, '5', 'A', 4, 'Kosong'),
(281, '6', 'A', 4, 'Kosong'),
(282, '7', 'A', 4, 'Kosong'),
(283, '1', 'B', 4, 'Kosong'),
(284, '2', 'B', 4, 'Kosong'),
(285, '3', 'B', 4, 'Kosong'),
(286, '4', 'B', 4, 'Kosong'),
(287, '5', 'B', 4, 'Kosong'),
(288, '6', 'B', 4, 'Kosong'),
(289, '7', 'B', 4, 'Kosong'),
(290, '1', 'C', 4, 'Kosong'),
(291, '2', 'C', 4, 'Kosong'),
(292, '3', 'C', 4, 'Kosong'),
(293, '4', 'C', 4, 'Kosong'),
(294, '5', 'C', 4, 'Kosong'),
(295, '6', 'C', 4, 'Kosong'),
(296, '7', 'C', 4, 'Kosong'),
(297, '1', 'D', 4, 'Kosong'),
(298, '2', 'D', 4, 'Kosong'),
(299, '3', 'D', 4, 'Kosong'),
(300, '4', 'D', 4, 'Kosong'),
(301, '5', 'D', 4, 'Kosong'),
(302, '6', 'D', 4, 'Kosong'),
(303, '7', 'D', 4, 'Kosong'),
(304, '1', 'E', 4, 'Kosong'),
(305, '2', 'E', 4, 'Kosong'),
(306, '3', 'E', 4, 'Kosong'),
(307, '4', 'E', 4, 'Kosong'),
(308, '5', 'E', 4, 'Kosong'),
(309, '6', 'E', 4, 'Kosong'),
(310, '7', 'E', 4, 'Kosong'),
(311, '1', 'F', 4, 'Kosong'),
(312, '2', 'F', 4, 'Kosong'),
(313, '3', 'F', 4, 'Kosong'),
(314, '4', 'F', 4, 'Kosong'),
(315, '5', 'F', 4, 'Kosong'),
(316, '6', 'F', 4, 'Kosong'),
(317, '7', 'F', 4, 'Kosong'),
(318, '1', 'A', 5, 'Kosong'),
(319, '2', 'A', 5, 'Kosong'),
(320, '3', 'A', 5, 'Kosong'),
(321, '4', 'A', 5, 'Kosong'),
(322, '1', 'B', 5, 'Kosong'),
(323, '2', 'B', 5, 'Kosong'),
(324, '3', 'B', 5, 'Kosong'),
(325, '4', 'B', 5, 'Kosong'),
(326, '1', 'C', 5, 'Kosong'),
(327, '2', 'C', 5, 'Kosong'),
(328, '3', 'C', 5, 'Kosong'),
(329, '4', 'C', 5, 'Kosong'),
(330, '1', 'D', 5, 'Rusak'),
(331, '2', 'D', 5, 'Rusak'),
(332, '3', 'D', 5, 'Kosong'),
(333, '4', 'D', 5, 'Kosong'),
(334, '1', 'E', 5, 'Rusak'),
(335, '2', 'E', 5, 'Rusak'),
(336, '3', 'E', 5, 'Kosong'),
(337, '4', 'E', 5, 'Kosong'),
(338, '1', 'F', 5, 'Kosong'),
(339, '2', 'F', 5, 'Kosong'),
(340, '3', 'F', 5, 'Kosong'),
(341, '4', 'F', 5, 'Kosong'),
(342, '1', 'G', 5, 'Kosong'),
(343, '2', 'G', 5, 'Kosong'),
(344, '3', 'G', 5, 'Kosong'),
(345, '4', 'G', 5, 'Kosong'),
(346, '1', 'H', 5, 'Kosong'),
(347, '2', 'H', 5, 'Kosong'),
(348, '3', 'H', 5, 'Kosong'),
(349, '4', 'H', 5, 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `teater`
--

CREATE TABLE `teater` (
  `id_teater` int(11) NOT NULL,
  `name_teater` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teater`
--

INSERT INTO `teater` (`id_teater`, `name_teater`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `trx`
--

CREATE TABLE `trx` (
  `trx` varchar(20) NOT NULL,
  `id_order` int(11) NOT NULL,
  `password_trx` varchar(6) NOT NULL,
  `status_cetak` enum('Sudah Di Cetak','Belum Di Cetak','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trx`
--

INSERT INTO `trx` (`trx`, `id_order`, `password_trx`, `status_cetak`) VALUES
('193320240225251', 51, '0', 'Belum Di Cetak'),
('193320240225252', 52, '0', 'Belum Di Cetak'),
('193320240226363', 63, '931551', 'Belum Di Cetak'),
('193320240229265', 65, '0', 'Belum Di Cetak'),
('193320240301267', 67, '0', 'Belum Di Cetak'),
('193320240301269', 69, '0', 'Belum Di Cetak'),
('193320240301270', 70, '0', 'Belum Di Cetak'),
('193320240301271', 71, '0', 'Belum Di Cetak'),
('193320240301272', 72, '0', 'Belum Di Cetak'),
('193320240301273', 73, '231233', 'Belum Di Cetak'),
('193320240301274', 74, '452745', 'Belum Di Cetak'),
('193320240301275', 75, '074530', 'Belum Di Cetak'),
('193320240301277', 77, '350532', 'Belum Di Cetak'),
('193320240301278', 78, '514627', 'Belum Di Cetak'),
('193320240302279', 79, '143954', 'Belum Di Cetak'),
('193320240302280', 80, '233050', 'Belum Di Cetak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`, `nama_user`, `saldo`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dimas Aditya', 0),
(2, 4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 3270000),
(3, 4, 'kaka', '5541c7b5a06c39b267a5efae6628e003', 'Kaka', 45000),
(4, 3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', 0),
(5, 2, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager', 1545000),
(6, 4, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `dimension`
--
ALTER TABLE `dimension`
  ADD PRIMARY KEY (`id_dimension`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_dimension` (`id_dimension`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_schedule` (`id_schedule`),
  ADD KEY `order_ibfk_2` (`id_teater`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_teater` (`id_teater`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`),
  ADD KEY `id_teater` (`id_teater`);

--
-- Indexes for table `teater`
--
ALTER TABLE `teater`
  ADD PRIMARY KEY (`id_teater`);

--
-- Indexes for table `trx`
--
ALTER TABLE `trx`
  ADD PRIMARY KEY (`trx`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `dimension`
--
ALTER TABLE `dimension`
  MODIFY `id_dimension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id_seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `teater`
--
ALTER TABLE `teater`
  MODIFY `id_teater` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_dimension`) REFERENCES `dimension` (`id_dimension`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedule` (`id_schedule`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_teater`) REFERENCES `teater` (`id_teater`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_teater`) REFERENCES `teater` (`id_teater`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`id_teater`) REFERENCES `teater` (`id_teater`);

--
-- Constraints for table `trx`
--
ALTER TABLE `trx`
  ADD CONSTRAINT `trx_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
