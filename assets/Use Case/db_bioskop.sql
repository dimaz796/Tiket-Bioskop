-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 08:37 AM
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
(27, 15, 2410, 25000, 'Terisi'),
(28, 15, 2422, 25000, 'Terisi'),
(29, 16, 2311, 25000, 'Terisi'),
(30, 16, 2312, 25000, 'Terisi'),
(31, 16, 2314, 25000, 'Terisi'),
(32, 16, 2323, 25000, 'Terisi'),
(33, 16, 2324, 25000, 'Terisi'),
(34, 16, 2327, 25000, 'Terisi'),
(35, 16, 2351, 25000, 'Terisi'),
(36, 16, 2352, 25000, 'Terisi'),
(37, 16, 2376, 25000, 'Terisi'),
(38, 16, 2388, 25000, 'Terisi'),
(39, 16, 2399, 25000, 'Terisi'),
(40, 16, 2400, 25000, 'Terisi'),
(41, 17, 2289, 25000, 'Terisi'),
(42, 17, 2290, 25000, 'Terisi'),
(43, 18, 2394, 30000, 'Terisi'),
(44, 18, 2395, 30000, 'Terisi'),
(45, 18, 2396, 30000, 'Terisi'),
(46, 19, 2933, 35000, 'Terisi'),
(47, 19, 2934, 35000, 'Terisi'),
(56, 21, 2972, 35000, 'Terisi'),
(57, 21, 2973, 35000, 'Terisi'),
(58, 21, 2974, 35000, 'Terisi'),
(59, 21, 2975, 35000, 'Terisi'),
(60, 22, 2408, 30000, 'Terisi'),
(63, 24, 2427, 35000, 'Terisi'),
(64, 24, 2428, 35000, 'Terisi'),
(65, 25, 2427, 35000, 'Booking'),
(66, 25, 2428, 35000, 'Booking'),
(67, 26, 2530, 35000, 'Terisi'),
(68, 26, 2531, 35000, 'Terisi'),
(69, 27, 2513, 35000, 'Terisi'),
(70, 27, 2525, 35000, 'Terisi'),
(71, 28, 2603, 35000, 'Terisi'),
(72, 28, 2604, 35000, 'Terisi'),
(73, 29, 2536, 30000, 'Terisi'),
(74, 29, 2537, 30000, 'Terisi'),
(84, 34, 2662, 35000, 'Terisi'),
(85, 34, 2663, 35000, 'Terisi'),
(86, 35, 2745, 35000, 'Terisi'),
(87, 35, 2746, 35000, 'Terisi'),
(88, 36, 2758, 30000, 'Terisi'),
(89, 36, 2759, 30000, 'Terisi'),
(90, 36, 2760, 30000, 'Terisi'),
(91, 37, 2643, 30000, 'Terisi'),
(92, 37, 2644, 30000, 'Terisi'),
(93, 38, 2769, 30000, 'Terisi'),
(94, 38, 2770, 30000, 'Terisi'),
(95, 38, 2771, 30000, 'Terisi'),
(96, 38, 2772, 30000, 'Terisi'),
(97, 38, 2773, 30000, 'Terisi'),
(98, 38, 2774, 30000, 'Terisi'),
(99, 38, 2775, 30000, 'Terisi'),
(100, 38, 2776, 30000, 'Terisi'),
(101, 39, 2704, 30000, 'Terisi'),
(102, 39, 2705, 30000, 'Terisi');

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
(5, '3D'),
(6, '5D');

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
(1, 'Annette', 'annete.jpeg', 'SU', '11,12', 1, 'asdasdads', 'adasdsadsas', 'dsaadasdasds', 'asdasdasds', 'Adits', 'asdasdasds', 'Dimas,Adit,Tyas', 121, '2024-02-06 11:03:55', '2024-03-16 22:51:23', '2024-03-01', '2024-03-13', 'Berakhir'),
(3, 'Lampir', 'lampir.jpg', '13+', '2,9', 1, 'https://youtu.be/k1TU9UniYMU?si=-AHNCH2hCjK6Yite', 'Sekelompok sahabat yang sedang photoshoot pre-wedding di sebuah villa mewah nan vintage, ternyata malah terjebak di sarang keramat Mak Lampir yang konon bernafsu menjadi wanita tercantik dan abadi. Dapat kah mereka selamat dari permainan kematian Mak Lampir?', 'Gandhi Fernando, Philip Lesmana, Clarissa Tanoesoedibjo', 'Creator Pictures, Sinergi Pictures, Vision+', 'Kenny Gulardi', 'Creator Pictures, Sinergi Pictures, Vision+', 'Dimas,Adit,Tyas', 121, '2024-02-07 01:22:09', '2024-03-04 12:46:47', '2024-02-15', '2024-03-04', 'Berakhir'),
(9, 'MADAME WEB', 'manade_web.jpg', '13+', '3,4', 1, 'https://youtu.be/s_76M4c4LTo?si=Fbesx5VwGusf16wH', 'Casie (Dakota Johnson), seorang paramedis yang nyaris kehilangan nyawanya saat bertugas. Ia terjatuh ke dalam air bersama mobil korban yang coba dibantunya. Setelah kejadian itu Casie mampu melihat masa depan tanpa ia tahu penyebabnya.', 'Lorenzo di Bonaventura', 'Columbia Pictures', 'Matt Sazama, Burk Sharpless, Claire Parker, S.j. Clarkson', 'Columbia Pictures', 'Dimas,Adit,Tyas', 121, '2024-02-17 06:37:04', '2024-03-07 18:12:45', '2024-03-06', '2024-03-31', 'Berlangsung'),
(10, 'SPY X FAMILY CODE: WHITE', 'spy.jpg', '13+', '3,11', 1, 'https://youtu.be/hLUijsHg9jM?si=FRWQ9qs9cKqElDbG', 'Bercerita tentang perjalanan keluarga pertama yang dilakukan seluruh keluarga Forger. Seharusnya perjalanan ini menyenangkan, namun Anya menemukan rahasia yang dapat mengguncang perdamaian dunia... Komedi aksi mata-mata yang luar biasa digambarkan dalam skala yang megah dalam versi teatrikal! Sekali lagi, nasib dunia dipercayakan kepada sebuah keluarga yang mengalami serangkaian insiden!', 'Akifumi Fujio, Kazutaka Yamanaka', 'Toho Animation, Cloverworks, Wit Studio', 'Tatsuya Endo, Ichiro Okouchi', 'Toho Animation, Cloverworks, Wit Studio', 'Dimas,Adit,Tyas', 121, '2024-02-17 07:58:04', '2024-03-25 09:57:41', '2024-03-08', '2024-03-23', 'Berakhir'),
(11, 'MENDUNG TANPO UDAN', 'mendung-tampo-ujan.jpg', '17+', '6', 1, 'https://youtu.be/0WTAErVV-kk?si=xQblGcwxqmaO6i6b', 'Udan (Erick Estrada) adalah seorang mahasiswa tingkat akhir yang sangat terobsesi dengan musik. Obsesi ini tanpa disadari membuat Udan menjadi pribadi yang idealis dan keras kepala. Hingga suatu hari Udan bertemu dan jatuh hati dengan Mendung (Yunita Siregar), seorang perempuan cerdas yang memiliki impian menjadi seorang wanita karir yang independen. Hubungan dua insan yang memiliki impian bertolak belakang ini, perlahan melahirkan konflik yang memaksa mereka untuk memilih antara cinta dan karir.', 'Muhammad Hananto', 'Nant Entertainment', 'Tony C Sihombing, Gianluigi Christoikov, Kris Budiman, Agit Romon', 'Nant Entertainment', 'Dimas,Adit,Tyas', 121, '2024-02-17 08:00:54', '2024-03-18 22:34:24', '2024-02-29', '2024-03-19', 'Berakhir'),
(12, 'KUYANG: SEKUTU IBLIS YANG SELALU MENGINTAI', 'kuyang.jpg', '17+', '2,6', 1, 'https://youtu.be/6FAUOJTJA-Y?si=-qCkuwPtMIAUfV2v', 'Demi masa depan yang lebih baik Bimo (Dimas Aditya) memutuskan untuk menjadi PNS dan ditugaskan di sebuah desa di pedalaman sebagai CPNS. Bimo membawa serta istrinya Sriatun (Alyssa Abidin), yang menolak untuk ditinggal bersama orang tua Bimo di Jawa. Sejak kedatangan mereka di desa tersebut, kejadian-kejadian aneh mulai mereka alami. Sriatun merasa ada yang selalu mengawasi mereka. Bimo yang mengetahui masa lalu kelam desa tersebut mulai khawatir. Sekutu Iblis yang menghantui desa selama ini kini mengincar Sriatun yang sedang hamil untuk dijadikan tumbal. Bimo yang tidak ingin Sriatun bernasib sama seperti warga desa terdahulu berencana membawa Sriatun pergi dari desa tersebut. Namun kekuatan Sekutu Iblis berhasil menghalangi rencana Bimo. Satu-satunya cara menyelamatkan nyawa Sriatun adalah Bimo harus mengalahkan Sekutu Iblis dengan tangannya sendiri.', 'Aryanna Yuris, Eye Supriyadi', 'Yongki Ongestu', 'Alim Sudio', 'Aenigma Picture', 'Dimas Aditya, Alyssa Abidin, Putri Ayudya, Elly D. Luthan, Egy Fedly, Totos Rasiti, Andri Mashadi', 98, '2024-04-01 07:58:48', '2024-03-15 13:22:10', '2024-03-10', '2024-03-31', 'Berlangsung'),
(13, '1 CM', '141CMX.jpg', 'SU', '5,6', 1, 'https://youtu.be/JN0GfXkmxlk?si=nXxfEM1KHxHqWipb', 'Berkisah tentang dua kelompok anak-anak yang sedang melakoni permainan tradisional perang-perangan untuk mempertahankan perbatasan sebuah negara yang tidak boleh tergeser bahkan 1 sentimeterpun, serunya dua kubu ini saling menangkap dan menyerang menggunakan senjata kayu dan bom air. Dilatar belakangi oleh kebhinekaan ras dan agama, membuat film edukasi ini sangat tersirat akan nilai nasionalisme, bagaimana anak-anak ini menjaga perbedaan yang ada dengan memperjuangkan tujuan yang sama.', 'Dedy Arliansyah Siregar, Paul Ginting, Dohardo Pakpahan', 'Dedy Arliansyah Siregar', 'Dedy Arliansyah Siregar', 'Lima Puluh Sembilan Vision', 'Raihan Firjatullah Valendiaz, Ovellia Angeline Yan, Icha Lubis, Mufty A Leatemia, Rhevany Aquina Shanum, Aidil Fitrah Ghassani, Destyn Clara Sinaga, Raisa Asahy Hsb, Cinta Adawiyatur Rahma, Rony Hafiz', 95, '2024-03-08 01:04:56', '2024-03-07 18:04:56', '2024-03-31', '2024-04-21', 'Akan Datang'),
(14, 'BAD BOY IN LOVE', '14BBIL.jpg', '13+', '6', 1, 'https://youtu.be/I820drpTYl8?si=is1aY9_hmK82CYQ8', 'Di sekolahnya, JETHRO (Jeff Smith) disegani, jago tarung satu-lawan-satu, dan cerdas. Jethro sekelas dengan SARA (Nicole Parham), gadis Solo yang pemalu, sederhana, dan rambutnya selalu dikuncir. Tujuan Sara pindah ke Bogor adalah fokus belajar agar masuk kedokteran.Awalnya, Jethro tak memperhatikan Sara yang menurutnya kurang eksis. Sara diam-diam menyukai Jethro yang saat itu berpacaran dengan LEA (Cassandra Lee), gadis gaul idola banyak laki-laki. Suatu hari, Sara mengobati tangan Jethro yang terluka, Jethro mulai menyadari keberadaan Sara dan keduanya semakin dekat. ANIN (Tubagus Ali), teman dekat Sara, tidak menerima Sara yang mulai dekat dengan Jethro, ia menantang Jethro berkelahi seakan-akan memperebutkan Sara. Hal itu pun membuat Lea cemburu, mengira Jethro memiliki hubungan spesial dengan Sara. Pada akhirnya, apakah Sara dan Jethro menjadi pasangan?', 'Djonny Chen, Hanny R. Saputra, Rezha PN', 'Silent D Pictures', 'Oka Aurora', 'Silent D Pictures', 'Dimas,Adit,Tyas', 121, '2024-03-08 01:07:53', '2024-03-18 22:31:52', '2024-03-19', '2024-03-31', 'Berlangsung'),
(15, 'IMAGINARY', '24IMAY.jpg', '13+', '2', 1, 'https://youtu.be/Lj0HODMVSnA?si=fMc7f2OKSTB6BZsS', 'Seorang wanita kembali ke rumah masa kecilnya dan menemukan bahwa teman khayalan yang ia tinggalkan ternyata nyata dan tidak bahagia karena ia meninggalkannya.', 'Jason Blum, Jeff Wadlow, Paul Uddo', 'Jeff Wadlow', 'Greg Erb', 'Lionsgate, Blumhouse Productions', 'Tom Payne, Dewanda Wise, Veronica Falcon, Betty Buckley, Dane Diliegro, Taegen Burns, Alix Angelis, Matthew Sato, Pyper Braun, Cecilia Leal, Sean Albertson', 104, '2024-03-08 01:10:19', '2024-03-25 10:01:18', '2024-03-25', '2024-04-04', 'Berlangsung'),
(16, ' KUKEJAR MIMPI', '14KMII.jpg', '13+', '6', 1, 'https://youtu.be/Ec1N7_Tuz1E?si=nAhXF18VWbGGnV_j', 'Mimpi (Aisyah Aqilah) adalah seorang anak SMA dengan latar belakang sederhana yang ingin menjadi seorang cheerleader. Namun kondisi sekolahnya yang terpinggirkan itu tak punya kegiatan berarti, dan jauh dari prestasi. Yang ada justru malah terkenal karena tawurannya. Untuk itulah Mimpi bersama enam orang temannya berjuang untuk bisa merintis adanya aktifitas cheerleading di sekolah, dengan berusaha mengikuti kompetisi yang ada. Sayang, skill dan pengalaman mereka masih jauh dari cukup. Nasib mempertemukan Mimpi dengan Leo (Oka Antara), seorang mantan tentara yang terlilit hutang sehingga dikejar-kejar oleh debt collector. Mimpi butuh bimbingan, sementara Leo butuh uang. Keadaan ini membuat Leo melihat kesempatan untuk menjadi seorang pelatih demi imbalan uang dari Mimpi dan teman-temannya. Namun, kemajuan yang mereka capai terbentur pada penolakan dari keluarga dan lingkungan yang melihat cheerleading adalah seusuatu yang negatif. Ini membuat mereka semua nyaris putus asa. Tapi kedekatan dan kebersamaan yang telah terjalin, membuat Leo bersama anak-anak ini terus berjuang bersama untuk menggapai mimpi mereka', 'Benny Rahmadani', 'Kg Pictures', 'Cassandra Massardie', 'Kg Pictures', 'Dimas,Adit,Tyas', 121, '2024-03-08 01:16:34', '2024-03-09 05:41:43', '2024-04-01', '2024-04-29', 'Akan Datang');

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
(2, 'Horor'),
(3, 'Action'),
(4, 'Adventure'),
(5, 'Comedy'),
(6, 'Drama'),
(7, 'Science Fiction'),
(8, 'Fantasy'),
(9, 'Thriller'),
(10, 'Mystery'),
(11, 'Animationns'),
(12, 'Musical'),
(13, 'Biography'),
(14, 'Historical'),
(15, 'Documentary'),
(16, 'Romance');

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
(15, '2024-03-07', 2, 20, 1, 'Sudah Di Bayar', 50000),
(16, '2024-01-10', 2, 21, 1, 'Sudah Di Bayar', 300000),
(17, '2024-03-07', 2, 21, 1, 'Sudah Di Bayar', 50000),
(18, '2024-03-08', 2, 21, 1, 'Sudah Di Bayar', 90000),
(19, '2024-02-14', 2, 31, 4, 'Sudah Di Bayar', 70000),
(21, '2024-03-09', 2, 31, 4, 'Sudah Di Bayar', 140000),
(22, '2024-03-13', 2, 37, 1, 'Sudah Di Bayar', 30000),
(24, '2024-03-15', 4, 38, 2, 'Sudah Di Bayar', 70000),
(25, '2024-03-15', 4, 38, 2, 'Belum Bayar', 70000),
(26, '2024-03-15', 4, 38, 2, 'Sudah Di Bayar', 70000),
(27, '2024-03-15', 4, 38, 2, 'Sudah Di Bayar', 70000),
(28, '2024-03-15', 4, 38, 2, 'Sudah Di Bayar', 70000),
(29, '2024-03-19', 4, 55, 2, 'Sudah Di Bayar', 60000),
(34, '2024-03-22', 2, 56, 3, 'Sudah Di Bayar', 70000),
(35, '2024-03-22', 4, 56, 3, 'Sudah Di Bayar', 70000),
(36, '2024-03-25', 2, 57, 3, 'Sudah Di Bayar', 90000),
(37, '2024-03-25', 4, 57, 3, 'Sudah Di Bayar', 60000),
(38, '2024-03-25', 4, 57, 3, 'Sudah Di Bayar', 240000),
(39, '2024-03-25', 2, 57, 3, 'Sudah Di Bayar', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `day` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`day`, `price`) VALUES
('Senin', 30000),
('Selasa', 30000),
('Rabu', 30000),
('Kamis', 30000),
('Jumat', 35000),
('Sabtu', 40000),
('Minggu', 40000);

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
  `clock` datetime NOT NULL,
  `clock_end` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_teater` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `date`, `day`, `clock`, `clock_end`, `price`, `id_film`, `id_teater`) VALUES
(20, '2024-03-08', 'Jumat', '2024-03-08 17:00:00', '2024-03-08 19:01:00', 30000, 1, 2),
(21, '2024-03-08', 'Jumat', '2024-03-08 22:00:00', '2024-03-09 00:04:00', 30000, 11, 1),
(29, '2024-03-08', 'Jumat', '2024-03-08 23:00:00', '2024-03-09 01:01:00', 30000, 1, 4),
(30, '2024-03-09', 'Sabtu', '2024-03-09 12:00:00', '2024-03-09 14:01:00', 35000, 10, 1),
(31, '2024-03-09', 'Sabtu', '2024-03-09 14:00:00', '2024-03-09 16:01:00', 35000, 1, 4),
(32, '2024-03-09', 'Sabtu', '2024-03-09 12:00:00', '2024-03-09 14:01:00', 35000, 9, 2),
(36, '2024-03-24', 'Minggu', '2024-03-24 18:00:00', '2024-03-24 19:31:00', 40000, 14, 1),
(37, '2024-03-13', 'Rabu', '2024-03-13 13:16:00', '2024-03-13 15:17:00', 30000, 10, 1),
(38, '2024-03-15', 'Jumat', '2024-03-15 18:35:00', '2024-03-15 20:36:00', 35000, 9, 2),
(40, '2024-04-16', 'Selasa', '2024-04-16 12:00:00', '2024-04-16 14:01:00', 30000, 16, 5),
(42, '2024-03-16', 'Sabtu', '2024-03-16 23:05:00', '2024-03-17 01:09:00', 40000, 11, 4),
(43, '2024-03-28', 'Kamis', '2024-03-28 23:29:00', '2024-03-29 01:33:00', 30000, 11, 1),
(44, '2024-04-06', 'Sabtu', '2024-04-06 23:29:00', '2024-04-07 01:30:00', 40000, 16, 1),
(45, '2024-03-18', 'Sabtu', '2024-03-17 19:00:00', '2024-03-17 21:04:00', 40002, 3, 5),
(46, '2024-03-18', 'Senin', '2024-03-18 12:00:00', '2024-03-18 14:04:00', 30000, 11, 5),
(47, '2024-03-26', 'Selasa', '2024-03-26 12:00:00', '2024-03-26 13:38:00', 30000, 12, 2),
(48, '2024-03-26', 'Selasa', '2024-03-26 12:00:00', '2024-03-26 13:38:00', 30000, 12, 4),
(49, '2024-03-26', 'Selasa', '2024-03-26 12:00:00', '2024-03-26 14:04:00', 30000, 11, 3),
(50, '2024-03-27', 'Rabu', '2024-03-27 18:00:00', '2024-03-27 19:38:00', 30000, 12, 3),
(51, '2024-03-17', 'Minggu', '2024-03-17 13:16:00', '2024-03-17 15:20:00', 40000, 11, 1),
(52, '2024-03-17', 'Minggu', '2024-03-17 17:00:00', '2024-03-17 19:01:00', 40000, 10, 2),
(53, '2024-03-24', 'Minggu', '2024-03-24 17:00:00', '2024-03-24 18:38:00', 40000, 12, 2),
(55, '2024-03-19', 'Selasa', '2024-03-19 18:00:00', '2024-03-19 20:01:00', 30000, 14, 2),
(56, '2024-03-22', 'Jumat', '2024-03-22 15:00:00', '2024-03-22 17:01:00', 35000, 14, 3),
(57, '2024-03-25', 'Senin', '2024-03-25 19:00:00', '2024-03-25 20:44:00', 30000, 15, 3);

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
(2283, '1', 'A', 1, 'Kosong'),
(2284, '2', 'A', 1, 'Kosong'),
(2285, '3', 'A', 1, 'Kosong'),
(2286, '4', 'A', 1, 'Kosong'),
(2287, '5', 'A', 1, 'Kosong'),
(2288, '6', 'A', 1, 'Kosong'),
(2289, '7', 'A', 1, 'Kosong'),
(2290, '8', 'A', 1, 'Kosong'),
(2291, '9', 'A', 1, 'Kosong'),
(2292, '10', 'A', 1, 'Kosong'),
(2293, '11', 'A', 1, 'Kosong'),
(2294, '12', 'A', 1, 'Kosong'),
(2295, '1', 'B', 1, 'Kosong'),
(2296, '2', 'B', 1, 'Kosong'),
(2297, '3', 'B', 1, 'Kosong'),
(2298, '4', 'B', 1, 'Kosong'),
(2299, '5', 'B', 1, 'Kosong'),
(2300, '6', 'B', 1, 'Kosong'),
(2301, '7', 'B', 1, 'Kosong'),
(2302, '8', 'B', 1, 'Kosong'),
(2303, '9', 'B', 1, 'Kosong'),
(2304, '10', 'B', 1, 'Kosong'),
(2305, '11', 'B', 1, 'Kosong'),
(2306, '12', 'B', 1, 'Kosong'),
(2307, '1', 'C', 1, 'Kosong'),
(2308, '2', 'C', 1, 'Kosong'),
(2309, '3', 'C', 1, 'Kosong'),
(2310, '4', 'C', 1, 'Kosong'),
(2311, '5', 'C', 1, 'Kosong'),
(2312, '6', 'C', 1, 'Kosong'),
(2313, '7', 'C', 1, 'Kosong'),
(2314, '8', 'C', 1, 'Kosong'),
(2315, '9', 'C', 1, 'Kosong'),
(2316, '10', 'C', 1, 'Kosong'),
(2317, '11', 'C', 1, 'Kosong'),
(2318, '12', 'C', 1, 'Kosong'),
(2319, '1', 'D', 1, 'Kosong'),
(2320, '2', 'D', 1, 'Kosong'),
(2321, '3', 'D', 1, 'Kosong'),
(2322, '4', 'D', 1, 'Kosong'),
(2323, '5', 'D', 1, 'Kosong'),
(2324, '6', 'D', 1, 'Kosong'),
(2325, '7', 'D', 1, 'Kosong'),
(2326, '8', 'D', 1, 'Kosong'),
(2327, '9', 'D', 1, 'Kosong'),
(2328, '10', 'D', 1, 'Kosong'),
(2329, '11', 'D', 1, 'Kosong'),
(2330, '12', 'D', 1, 'Kosong'),
(2331, '1', 'E', 1, 'Kosong'),
(2332, '2', 'E', 1, 'Kosong'),
(2333, '3', 'E', 1, 'Kosong'),
(2334, '4', 'E', 1, 'Kosong'),
(2335, '5', 'E', 1, 'Kosong'),
(2336, '6', 'E', 1, 'Kosong'),
(2337, '7', 'E', 1, 'Kosong'),
(2338, '8', 'E', 1, 'Kosong'),
(2339, '9', 'E', 1, 'Kosong'),
(2340, '10', 'E', 1, 'Kosong'),
(2341, '11', 'E', 1, 'Kosong'),
(2342, '12', 'E', 1, 'Kosong'),
(2343, '1', 'F', 1, 'Kosong'),
(2344, '2', 'F', 1, 'Kosong'),
(2345, '3', 'F', 1, 'Kosong'),
(2346, '4', 'F', 1, 'Kosong'),
(2347, '5', 'F', 1, 'Kosong'),
(2348, '6', 'F', 1, 'Kosong'),
(2349, '7', 'F', 1, 'Kosong'),
(2350, '8', 'F', 1, 'Kosong'),
(2351, '9', 'F', 1, 'Kosong'),
(2352, '10', 'F', 1, 'Kosong'),
(2353, '11', 'F', 1, 'Kosong'),
(2354, '12', 'F', 1, 'Kosong'),
(2355, '1', 'G', 1, 'Kosong'),
(2356, '2', 'G', 1, 'Kosong'),
(2357, '3', 'G', 1, 'Kosong'),
(2358, '4', 'G', 1, 'Kosong'),
(2359, '5', 'G', 1, 'Kosong'),
(2360, '6', 'G', 1, 'Kosong'),
(2361, '7', 'G', 1, 'Kosong'),
(2362, '8', 'G', 1, 'Kosong'),
(2363, '9', 'G', 1, 'Kosong'),
(2364, '10', 'G', 1, 'Kosong'),
(2365, '11', 'G', 1, 'Kosong'),
(2366, '12', 'G', 1, 'Kosong'),
(2367, '1', 'H', 1, 'Kosong'),
(2368, '2', 'H', 1, 'Kosong'),
(2369, '3', 'H', 1, 'Kosong'),
(2370, '4', 'H', 1, 'Kosong'),
(2371, '5', 'H', 1, 'Kosong'),
(2372, '6', 'H', 1, 'Kosong'),
(2373, '7', 'H', 1, 'Kosong'),
(2374, '8', 'H', 1, 'Kosong'),
(2375, '9', 'H', 1, 'Kosong'),
(2376, '10', 'H', 1, 'Kosong'),
(2377, '11', 'H', 1, 'Kosong'),
(2378, '12', 'H', 1, 'Kosong'),
(2379, '1', 'I', 1, 'Kosong'),
(2380, '2', 'I', 1, 'Kosong'),
(2381, '3', 'I', 1, 'Kosong'),
(2382, '4', 'I', 1, 'Kosong'),
(2383, '5', 'I', 1, 'Kosong'),
(2384, '6', 'I', 1, 'Kosong'),
(2385, '7', 'I', 1, 'Kosong'),
(2386, '8', 'I', 1, 'Kosong'),
(2387, '9', 'I', 1, 'Kosong'),
(2388, '10', 'I', 1, 'Kosong'),
(2389, '11', 'I', 1, 'Kosong'),
(2390, '12', 'I', 1, 'Kosong'),
(2391, '1', 'J', 1, 'Kosong'),
(2392, '2', 'J', 1, 'Kosong'),
(2393, '3', 'J', 1, 'Kosong'),
(2394, '4', 'J', 1, 'Kosong'),
(2395, '5', 'J', 1, 'Kosong'),
(2396, '6', 'J', 1, 'Kosong'),
(2397, '7', 'J', 1, 'Kosong'),
(2398, '8', 'J', 1, 'Kosong'),
(2399, '9', 'J', 1, 'Kosong'),
(2400, '10', 'J', 1, 'Kosong'),
(2401, '11', 'J', 1, 'Kosong'),
(2402, '12', 'J', 1, 'Kosong'),
(2403, '1', 'K', 1, 'Kosong'),
(2404, '2', 'K', 1, 'Kosong'),
(2405, '3', 'K', 1, 'Kosong'),
(2406, '4', 'K', 1, 'Kosong'),
(2407, '5', 'K', 1, 'Kosong'),
(2408, '6', 'K', 1, 'Kosong'),
(2409, '7', 'K', 1, 'Kosong'),
(2410, '8', 'K', 1, 'Kosong'),
(2411, '9', 'K', 1, 'Kosong'),
(2412, '10', 'K', 1, 'Kosong'),
(2413, '11', 'K', 1, 'Kosong'),
(2414, '12', 'K', 1, 'Kosong'),
(2415, '1', 'L', 1, 'Kosong'),
(2416, '2', 'L', 1, 'Kosong'),
(2417, '3', 'L', 1, 'Kosong'),
(2418, '4', 'L', 1, 'Kosong'),
(2419, '5', 'L', 1, 'Kosong'),
(2420, '6', 'L', 1, 'Kosong'),
(2421, '7', 'L', 1, 'Kosong'),
(2422, '8', 'L', 1, 'Kosong'),
(2423, '9', 'L', 1, 'Kosong'),
(2424, '10', 'L', 1, 'Kosong'),
(2425, '11', 'L', 1, 'Kosong'),
(2426, '12', 'L', 1, 'Kosong'),
(2427, '1', 'A', 2, ''),
(2428, '2', 'A', 2, ''),
(2429, '3', 'A', 2, 'Kosong'),
(2430, '4', 'A', 2, 'Kosong'),
(2431, '5', 'A', 2, 'Kosong'),
(2432, '6', 'A', 2, 'Kosong'),
(2433, '7', 'A', 2, 'Kosong'),
(2434, '8', 'A', 2, 'Kosong'),
(2435, '9', 'A', 2, 'Kosong'),
(2436, '10', 'A', 2, 'Kosong'),
(2437, '11', 'A', 2, 'Kosong'),
(2438, '12', 'A', 2, 'Kosong'),
(2439, '1', 'B', 2, 'Kosong'),
(2440, '2', 'B', 2, 'Kosong'),
(2441, '3', 'B', 2, 'Kosong'),
(2442, '4', 'B', 2, 'Kosong'),
(2443, '5', 'B', 2, 'Kosong'),
(2444, '6', 'B', 2, 'Kosong'),
(2445, '7', 'B', 2, 'Kosong'),
(2446, '8', 'B', 2, 'Kosong'),
(2447, '9', 'B', 2, 'Kosong'),
(2448, '10', 'B', 2, 'Kosong'),
(2449, '11', 'B', 2, 'Kosong'),
(2450, '12', 'B', 2, 'Kosong'),
(2451, '1', 'C', 2, 'Kosong'),
(2452, '2', 'C', 2, 'Kosong'),
(2453, '3', 'C', 2, 'Kosong'),
(2454, '4', 'C', 2, 'Kosong'),
(2455, '5', 'C', 2, 'Kosong'),
(2456, '6', 'C', 2, 'Kosong'),
(2457, '7', 'C', 2, 'Kosong'),
(2458, '8', 'C', 2, 'Kosong'),
(2459, '9', 'C', 2, 'Kosong'),
(2460, '10', 'C', 2, 'Kosong'),
(2461, '11', 'C', 2, 'Kosong'),
(2462, '12', 'C', 2, 'Kosong'),
(2463, '1', 'D', 2, 'Kosong'),
(2464, '2', 'D', 2, 'Kosong'),
(2465, '3', 'D', 2, 'Kosong'),
(2466, '4', 'D', 2, 'Kosong'),
(2467, '5', 'D', 2, 'Kosong'),
(2468, '6', 'D', 2, 'Kosong'),
(2469, '7', 'D', 2, 'Kosong'),
(2470, '8', 'D', 2, 'Kosong'),
(2471, '9', 'D', 2, 'Kosong'),
(2472, '10', 'D', 2, 'Kosong'),
(2473, '11', 'D', 2, 'Kosong'),
(2474, '12', 'D', 2, 'Kosong'),
(2475, '1', 'E', 2, 'Kosong'),
(2476, '2', 'E', 2, 'Kosong'),
(2477, '3', 'E', 2, 'Kosong'),
(2478, '4', 'E', 2, 'Kosong'),
(2479, '5', 'E', 2, 'Kosong'),
(2480, '6', 'E', 2, 'Kosong'),
(2481, '7', 'E', 2, 'Kosong'),
(2482, '8', 'E', 2, 'Kosong'),
(2483, '9', 'E', 2, 'Kosong'),
(2484, '10', 'E', 2, 'Kosong'),
(2485, '11', 'E', 2, 'Kosong'),
(2486, '12', 'E', 2, 'Kosong'),
(2487, '1', 'F', 2, 'Kosong'),
(2488, '2', 'F', 2, 'Kosong'),
(2489, '3', 'F', 2, 'Kosong'),
(2490, '4', 'F', 2, 'Kosong'),
(2491, '5', 'F', 2, 'Kosong'),
(2492, '6', 'F', 2, 'Kosong'),
(2493, '7', 'F', 2, 'Kosong'),
(2494, '8', 'F', 2, 'Kosong'),
(2495, '9', 'F', 2, 'Kosong'),
(2496, '10', 'F', 2, 'Kosong'),
(2497, '11', 'F', 2, 'Kosong'),
(2498, '12', 'F', 2, 'Kosong'),
(2499, '1', 'G', 2, 'Kosong'),
(2500, '2', 'G', 2, 'Kosong'),
(2501, '3', 'G', 2, 'Kosong'),
(2502, '4', 'G', 2, 'Kosong'),
(2503, '5', 'G', 2, 'Kosong'),
(2504, '6', 'G', 2, 'Kosong'),
(2505, '7', 'G', 2, 'Kosong'),
(2506, '8', 'G', 2, 'Kosong'),
(2507, '9', 'G', 2, 'Kosong'),
(2508, '10', 'G', 2, 'Kosong'),
(2509, '11', 'G', 2, 'Kosong'),
(2510, '12', 'G', 2, 'Kosong'),
(2511, '1', 'H', 2, 'Kosong'),
(2512, '2', 'H', 2, 'Kosong'),
(2513, '3', 'H', 2, 'Kosong'),
(2514, '4', 'H', 2, 'Kosong'),
(2515, '5', 'H', 2, 'Kosong'),
(2516, '6', 'H', 2, 'Kosong'),
(2517, '7', 'H', 2, 'Kosong'),
(2518, '8', 'H', 2, 'Kosong'),
(2519, '9', 'H', 2, 'Kosong'),
(2520, '10', 'H', 2, 'Kosong'),
(2521, '11', 'H', 2, 'Kosong'),
(2522, '12', 'H', 2, 'Kosong'),
(2523, '1', 'I', 2, 'Kosong'),
(2524, '2', 'I', 2, 'Kosong'),
(2525, '3', 'I', 2, 'Kosong'),
(2526, '4', 'I', 2, 'Kosong'),
(2527, '5', 'I', 2, 'Kosong'),
(2528, '6', 'I', 2, 'Kosong'),
(2529, '7', 'I', 2, 'Kosong'),
(2530, '8', 'I', 2, 'Kosong'),
(2531, '9', 'I', 2, 'Kosong'),
(2532, '10', 'I', 2, 'Kosong'),
(2533, '11', 'I', 2, 'Kosong'),
(2534, '12', 'I', 2, 'Kosong'),
(2535, '1', 'J', 2, 'Kosong'),
(2536, '2', 'J', 2, 'Kosong'),
(2537, '3', 'J', 2, 'Kosong'),
(2538, '4', 'J', 2, 'Kosong'),
(2539, '5', 'J', 2, 'Kosong'),
(2540, '6', 'J', 2, 'Kosong'),
(2541, '7', 'J', 2, 'Kosong'),
(2542, '8', 'J', 2, 'Kosong'),
(2543, '9', 'J', 2, 'Kosong'),
(2544, '10', 'J', 2, 'Kosong'),
(2545, '11', 'J', 2, 'Kosong'),
(2546, '12', 'J', 2, 'Kosong'),
(2547, '1', 'K', 2, 'Kosong'),
(2548, '2', 'K', 2, 'Kosong'),
(2549, '3', 'K', 2, 'Kosong'),
(2550, '4', 'K', 2, 'Kosong'),
(2551, '5', 'K', 2, 'Kosong'),
(2552, '6', 'K', 2, 'Kosong'),
(2553, '7', 'K', 2, 'Kosong'),
(2554, '8', 'K', 2, 'Kosong'),
(2555, '9', 'K', 2, 'Kosong'),
(2556, '10', 'K', 2, 'Kosong'),
(2557, '11', 'K', 2, 'Kosong'),
(2558, '12', 'K', 2, 'Kosong'),
(2559, '1', 'L', 2, 'Kosong'),
(2560, '2', 'L', 2, 'Kosong'),
(2561, '3', 'L', 2, 'Kosong'),
(2562, '4', 'L', 2, 'Kosong'),
(2563, '5', 'L', 2, 'Kosong'),
(2564, '6', 'L', 2, 'Kosong'),
(2565, '7', 'L', 2, 'Kosong'),
(2566, '8', 'L', 2, 'Kosong'),
(2567, '9', 'L', 2, 'Kosong'),
(2568, '10', 'L', 2, 'Kosong'),
(2569, '11', 'L', 2, 'Kosong'),
(2570, '12', 'L', 2, 'Kosong'),
(2571, '1', 'M', 2, 'Kosong'),
(2572, '2', 'M', 2, 'Kosong'),
(2573, '3', 'M', 2, 'Kosong'),
(2574, '4', 'M', 2, 'Kosong'),
(2575, '5', 'M', 2, 'Kosong'),
(2576, '6', 'M', 2, 'Kosong'),
(2577, '7', 'M', 2, 'Kosong'),
(2578, '8', 'M', 2, 'Kosong'),
(2579, '9', 'M', 2, 'Kosong'),
(2580, '10', 'M', 2, 'Kosong'),
(2581, '11', 'M', 2, 'Kosong'),
(2582, '12', 'M', 2, 'Kosong'),
(2583, '1', 'N', 2, 'Kosong'),
(2584, '2', 'N', 2, 'Kosong'),
(2585, '3', 'N', 2, 'Kosong'),
(2586, '4', 'N', 2, 'Kosong'),
(2587, '5', 'N', 2, 'Kosong'),
(2588, '6', 'N', 2, 'Kosong'),
(2589, '7', 'N', 2, 'Kosong'),
(2590, '8', 'N', 2, 'Kosong'),
(2591, '9', 'N', 2, 'Kosong'),
(2592, '10', 'N', 2, 'Kosong'),
(2593, '11', 'N', 2, 'Kosong'),
(2594, '12', 'N', 2, 'Kosong'),
(2595, '1', 'O', 2, 'Kosong'),
(2596, '2', 'O', 2, 'Kosong'),
(2597, '3', 'O', 2, 'Kosong'),
(2598, '4', 'O', 2, 'Kosong'),
(2599, '5', 'O', 2, 'Kosong'),
(2600, '6', 'O', 2, 'Kosong'),
(2601, '7', 'O', 2, 'Kosong'),
(2602, '8', 'O', 2, 'Kosong'),
(2603, '9', 'O', 2, 'Kosong'),
(2604, '10', 'O', 2, 'Kosong'),
(2605, '11', 'O', 2, 'Kosong'),
(2606, '12', 'O', 2, 'Kosong'),
(2607, '1', 'P', 2, 'Kosong'),
(2608, '2', 'P', 2, 'Kosong'),
(2609, '3', 'P', 2, 'Kosong'),
(2610, '4', 'P', 2, 'Kosong'),
(2611, '5', 'P', 2, 'Kosong'),
(2612, '6', 'P', 2, 'Kosong'),
(2613, '7', 'P', 2, 'Kosong'),
(2614, '8', 'P', 2, 'Kosong'),
(2615, '9', 'P', 2, 'Kosong'),
(2616, '10', 'P', 2, 'Kosong'),
(2617, '11', 'P', 2, 'Kosong'),
(2618, '12', 'P', 2, 'Kosong'),
(2619, '1', 'Q', 2, 'Kosong'),
(2620, '2', 'Q', 2, 'Kosong'),
(2621, '3', 'Q', 2, 'Kosong'),
(2622, '4', 'Q', 2, 'Kosong'),
(2623, '5', 'Q', 2, 'Kosong'),
(2624, '6', 'Q', 2, 'Kosong'),
(2625, '7', 'Q', 2, 'Kosong'),
(2626, '8', 'Q', 2, 'Kosong'),
(2627, '9', 'Q', 2, 'Kosong'),
(2628, '10', 'Q', 2, 'Kosong'),
(2629, '11', 'Q', 2, 'Kosong'),
(2630, '12', 'Q', 2, 'Kosong'),
(2631, '1', 'R', 2, 'Kosong'),
(2632, '2', 'R', 2, 'Kosong'),
(2633, '3', 'R', 2, 'Kosong'),
(2634, '4', 'R', 2, 'Kosong'),
(2635, '5', 'R', 2, 'Kosong'),
(2636, '6', 'R', 2, 'Kosong'),
(2637, '7', 'R', 2, 'Kosong'),
(2638, '8', 'R', 2, 'Kosong'),
(2639, '9', 'R', 2, 'Kosong'),
(2640, '10', 'R', 2, 'Kosong'),
(2641, '11', 'R', 2, 'Kosong'),
(2642, '12', 'R', 2, 'Kosong'),
(2643, '1', 'A', 3, 'Kosong'),
(2644, '2', 'A', 3, 'Kosong'),
(2645, '3', 'A', 3, 'Kosong'),
(2646, '4', 'A', 3, 'Kosong'),
(2647, '5', 'A', 3, 'Kosong'),
(2648, '6', 'A', 3, 'Kosong'),
(2649, '7', 'A', 3, 'Kosong'),
(2650, '8', 'A', 3, 'Kosong'),
(2651, '9', 'A', 3, 'Kosong'),
(2652, '10', 'A', 3, 'Kosong'),
(2653, '11', 'A', 3, 'Kosong'),
(2654, '12', 'A', 3, 'Kosong'),
(2655, '13', 'A', 3, 'Kosong'),
(2656, '14', 'A', 3, 'Kosong'),
(2657, '1', 'B', 3, 'Kosong'),
(2658, '2', 'B', 3, ''),
(2659, '3', 'B', 3, 'Kosong'),
(2660, '4', 'B', 3, ''),
(2661, '5', 'B', 3, ''),
(2662, '6', 'B', 3, 'Kosong'),
(2663, '7', 'B', 3, 'Kosong'),
(2664, '8', 'B', 3, 'Kosong'),
(2665, '9', 'B', 3, 'Kosong'),
(2666, '10', 'B', 3, 'Kosong'),
(2667, '11', 'B', 3, 'Kosong'),
(2668, '12', 'B', 3, 'Kosong'),
(2669, '13', 'B', 3, 'Kosong'),
(2670, '14', 'B', 3, 'Kosong'),
(2671, '1', 'C', 3, 'Kosong'),
(2672, '2', 'C', 3, 'Kosong'),
(2673, '3', 'C', 3, 'Kosong'),
(2674, '4', 'C', 3, 'Kosong'),
(2675, '5', 'C', 3, 'Kosong'),
(2676, '6', 'C', 3, 'Kosong'),
(2677, '7', 'C', 3, 'Kosong'),
(2678, '8', 'C', 3, 'Kosong'),
(2679, '9', 'C', 3, 'Kosong'),
(2680, '10', 'C', 3, 'Kosong'),
(2681, '11', 'C', 3, 'Kosong'),
(2682, '12', 'C', 3, 'Kosong'),
(2683, '13', 'C', 3, 'Kosong'),
(2684, '14', 'C', 3, 'Kosong'),
(2685, '1', 'D', 3, 'Kosong'),
(2686, '2', 'D', 3, 'Kosong'),
(2687, '3', 'D', 3, 'Kosong'),
(2688, '4', 'D', 3, 'Kosong'),
(2689, '5', 'D', 3, 'Kosong'),
(2690, '6', 'D', 3, 'Kosong'),
(2691, '7', 'D', 3, 'Kosong'),
(2692, '8', 'D', 3, 'Kosong'),
(2693, '9', 'D', 3, 'Kosong'),
(2694, '10', 'D', 3, 'Kosong'),
(2695, '11', 'D', 3, 'Kosong'),
(2696, '12', 'D', 3, 'Kosong'),
(2697, '13', 'D', 3, 'Kosong'),
(2698, '14', 'D', 3, 'Kosong'),
(2699, '1', 'E', 3, 'Kosong'),
(2700, '2', 'E', 3, 'Kosong'),
(2701, '3', 'E', 3, 'Kosong'),
(2702, '4', 'E', 3, 'Kosong'),
(2703, '5', 'E', 3, 'Kosong'),
(2704, '6', 'E', 3, 'Kosong'),
(2705, '7', 'E', 3, 'Kosong'),
(2706, '8', 'E', 3, 'Kosong'),
(2707, '9', 'E', 3, 'Kosong'),
(2708, '10', 'E', 3, 'Kosong'),
(2709, '11', 'E', 3, 'Kosong'),
(2710, '12', 'E', 3, 'Kosong'),
(2711, '13', 'E', 3, 'Kosong'),
(2712, '14', 'E', 3, 'Kosong'),
(2713, '1', 'F', 3, 'Kosong'),
(2714, '2', 'F', 3, 'Kosong'),
(2715, '3', 'F', 3, 'Kosong'),
(2716, '4', 'F', 3, 'Kosong'),
(2717, '5', 'F', 3, 'Kosong'),
(2718, '6', 'F', 3, 'Kosong'),
(2719, '7', 'F', 3, 'Kosong'),
(2720, '8', 'F', 3, 'Kosong'),
(2721, '9', 'F', 3, 'Kosong'),
(2722, '10', 'F', 3, 'Kosong'),
(2723, '11', 'F', 3, 'Kosong'),
(2724, '12', 'F', 3, 'Kosong'),
(2725, '13', 'F', 3, 'Kosong'),
(2726, '14', 'F', 3, 'Kosong'),
(2727, '1', 'G', 3, 'Kosong'),
(2728, '2', 'G', 3, 'Kosong'),
(2729, '3', 'G', 3, 'Kosong'),
(2730, '4', 'G', 3, ''),
(2731, '5', 'G', 3, 'Kosong'),
(2732, '6', 'G', 3, 'Kosong'),
(2733, '7', 'G', 3, 'Kosong'),
(2734, '8', 'G', 3, 'Kosong'),
(2735, '9', 'G', 3, 'Kosong'),
(2736, '10', 'G', 3, 'Kosong'),
(2737, '11', 'G', 3, 'Kosong'),
(2738, '12', 'G', 3, 'Kosong'),
(2739, '13', 'G', 3, 'Kosong'),
(2740, '14', 'G', 3, 'Kosong'),
(2741, '1', 'H', 3, 'Kosong'),
(2742, '2', 'H', 3, 'Kosong'),
(2743, '3', 'H', 3, 'Kosong'),
(2744, '4', 'H', 3, 'Kosong'),
(2745, '5', 'H', 3, 'Kosong'),
(2746, '6', 'H', 3, 'Kosong'),
(2747, '7', 'H', 3, 'Kosong'),
(2748, '8', 'H', 3, 'Kosong'),
(2749, '9', 'H', 3, 'Kosong'),
(2750, '10', 'H', 3, 'Kosong'),
(2751, '11', 'H', 3, 'Kosong'),
(2752, '12', 'H', 3, 'Kosong'),
(2753, '13', 'H', 3, 'Kosong'),
(2754, '14', 'H', 3, 'Kosong'),
(2755, '1', 'I', 3, 'Kosong'),
(2756, '2', 'I', 3, 'Kosong'),
(2757, '3', 'I', 3, 'Kosong'),
(2758, '4', 'I', 3, 'Kosong'),
(2759, '5', 'I', 3, 'Kosong'),
(2760, '6', 'I', 3, 'Kosong'),
(2761, '7', 'I', 3, 'Kosong'),
(2762, '8', 'I', 3, 'Kosong'),
(2763, '9', 'I', 3, 'Kosong'),
(2764, '10', 'I', 3, 'Kosong'),
(2765, '11', 'I', 3, 'Kosong'),
(2766, '12', 'I', 3, 'Kosong'),
(2767, '13', 'I', 3, 'Kosong'),
(2768, '14', 'I', 3, 'Kosong'),
(2769, '1', 'J', 3, 'Kosong'),
(2770, '2', 'J', 3, 'Kosong'),
(2771, '3', 'J', 3, 'Kosong'),
(2772, '4', 'J', 3, 'Kosong'),
(2773, '5', 'J', 3, 'Kosong'),
(2774, '6', 'J', 3, 'Kosong'),
(2775, '7', 'J', 3, 'Kosong'),
(2776, '8', 'J', 3, 'Kosong'),
(2777, '9', 'J', 3, 'Kosong'),
(2778, '10', 'J', 3, 'Kosong'),
(2779, '11', 'J', 3, 'Kosong'),
(2780, '12', 'J', 3, 'Kosong'),
(2781, '13', 'J', 3, 'Kosong'),
(2782, '14', 'J', 3, 'Kosong'),
(2783, '1', 'K', 3, 'Kosong'),
(2784, '2', 'K', 3, 'Kosong'),
(2785, '3', 'K', 3, 'Kosong'),
(2786, '4', 'K', 3, 'Kosong'),
(2787, '5', 'K', 3, 'Kosong'),
(2788, '6', 'K', 3, 'Kosong'),
(2789, '7', 'K', 3, 'Kosong'),
(2790, '8', 'K', 3, 'Kosong'),
(2791, '9', 'K', 3, 'Kosong'),
(2792, '10', 'K', 3, 'Kosong'),
(2793, '11', 'K', 3, 'Kosong'),
(2794, '12', 'K', 3, 'Kosong'),
(2795, '13', 'K', 3, 'Kosong'),
(2796, '14', 'K', 3, 'Kosong'),
(2797, '1', 'L', 3, 'Kosong'),
(2798, '2', 'L', 3, 'Kosong'),
(2799, '3', 'L', 3, 'Kosong'),
(2800, '4', 'L', 3, 'Kosong'),
(2801, '5', 'L', 3, 'Kosong'),
(2802, '6', 'L', 3, 'Kosong'),
(2803, '7', 'L', 3, 'Kosong'),
(2804, '8', 'L', 3, 'Kosong'),
(2805, '9', 'L', 3, 'Kosong'),
(2806, '10', 'L', 3, 'Kosong'),
(2807, '11', 'L', 3, 'Kosong'),
(2808, '12', 'L', 3, 'Kosong'),
(2809, '13', 'L', 3, 'Kosong'),
(2810, '14', 'L', 3, 'Kosong'),
(2811, '1', 'A', 4, ''),
(2812, '2', 'A', 4, ''),
(2813, '3', 'A', 4, ''),
(2814, '4', 'A', 4, ''),
(2815, '5', 'A', 4, ''),
(2816, '6', 'A', 4, 'Kosong'),
(2817, '7', 'A', 4, 'Kosong'),
(2818, '8', 'A', 4, 'Kosong'),
(2819, '9', 'A', 4, 'Kosong'),
(2820, '10', 'A', 4, 'Kosong'),
(2821, '11', 'A', 4, 'Kosong'),
(2822, '12', 'A', 4, 'Kosong'),
(2823, '13', 'A', 4, 'Kosong'),
(2824, '14', 'A', 4, 'Kosong'),
(2825, '1', 'B', 4, ''),
(2826, '2', 'B', 4, ''),
(2827, '3', 'B', 4, ''),
(2828, '4', 'B', 4, 'Kosong'),
(2829, '5', 'B', 4, 'Kosong'),
(2830, '6', 'B', 4, 'Kosong'),
(2831, '7', 'B', 4, 'Kosong'),
(2832, '8', 'B', 4, 'Kosong'),
(2833, '9', 'B', 4, 'Kosong'),
(2834, '10', 'B', 4, 'Kosong'),
(2835, '11', 'B', 4, 'Kosong'),
(2836, '12', 'B', 4, 'Kosong'),
(2837, '13', 'B', 4, 'Kosong'),
(2838, '14', 'B', 4, 'Kosong'),
(2839, '1', 'C', 4, 'Kosong'),
(2840, '2', 'C', 4, 'Kosong'),
(2841, '3', 'C', 4, 'Kosong'),
(2842, '4', 'C', 4, 'Kosong'),
(2843, '5', 'C', 4, 'Kosong'),
(2844, '6', 'C', 4, 'Kosong'),
(2845, '7', 'C', 4, 'Kosong'),
(2846, '8', 'C', 4, 'Kosong'),
(2847, '9', 'C', 4, 'Kosong'),
(2848, '10', 'C', 4, 'Kosong'),
(2849, '11', 'C', 4, 'Kosong'),
(2850, '12', 'C', 4, 'Kosong'),
(2851, '13', 'C', 4, 'Kosong'),
(2852, '14', 'C', 4, 'Kosong'),
(2853, '1', 'D', 4, 'Kosong'),
(2854, '2', 'D', 4, 'Kosong'),
(2855, '3', 'D', 4, 'Kosong'),
(2856, '4', 'D', 4, 'Kosong'),
(2857, '5', 'D', 4, 'Kosong'),
(2858, '6', 'D', 4, 'Kosong'),
(2859, '7', 'D', 4, 'Kosong'),
(2860, '8', 'D', 4, 'Kosong'),
(2861, '9', 'D', 4, 'Kosong'),
(2862, '10', 'D', 4, 'Kosong'),
(2863, '11', 'D', 4, 'Kosong'),
(2864, '12', 'D', 4, 'Kosong'),
(2865, '13', 'D', 4, 'Kosong'),
(2866, '14', 'D', 4, 'Kosong'),
(2867, '1', 'E', 4, 'Kosong'),
(2868, '2', 'E', 4, 'Kosong'),
(2869, '3', 'E', 4, 'Kosong'),
(2870, '4', 'E', 4, 'Kosong'),
(2871, '5', 'E', 4, 'Kosong'),
(2872, '6', 'E', 4, 'Kosong'),
(2873, '7', 'E', 4, 'Kosong'),
(2874, '8', 'E', 4, 'Kosong'),
(2875, '9', 'E', 4, 'Kosong'),
(2876, '10', 'E', 4, 'Kosong'),
(2877, '11', 'E', 4, 'Kosong'),
(2878, '12', 'E', 4, 'Kosong'),
(2879, '13', 'E', 4, 'Kosong'),
(2880, '14', 'E', 4, 'Kosong'),
(2881, '1', 'F', 4, 'Kosong'),
(2882, '2', 'F', 4, 'Kosong'),
(2883, '3', 'F', 4, 'Kosong'),
(2884, '4', 'F', 4, 'Kosong'),
(2885, '5', 'F', 4, 'Kosong'),
(2886, '6', 'F', 4, 'Kosong'),
(2887, '7', 'F', 4, 'Kosong'),
(2888, '8', 'F', 4, 'Kosong'),
(2889, '9', 'F', 4, 'Kosong'),
(2890, '10', 'F', 4, 'Kosong'),
(2891, '11', 'F', 4, 'Kosong'),
(2892, '12', 'F', 4, 'Kosong'),
(2893, '13', 'F', 4, 'Kosong'),
(2894, '14', 'F', 4, 'Kosong'),
(2895, '1', 'G', 4, 'Kosong'),
(2896, '2', 'G', 4, 'Kosong'),
(2897, '3', 'G', 4, 'Kosong'),
(2898, '4', 'G', 4, 'Kosong'),
(2899, '5', 'G', 4, 'Kosong'),
(2900, '6', 'G', 4, 'Kosong'),
(2901, '7', 'G', 4, 'Kosong'),
(2902, '8', 'G', 4, 'Kosong'),
(2903, '9', 'G', 4, 'Kosong'),
(2904, '10', 'G', 4, 'Kosong'),
(2905, '11', 'G', 4, 'Kosong'),
(2906, '12', 'G', 4, 'Kosong'),
(2907, '13', 'G', 4, 'Kosong'),
(2908, '14', 'G', 4, 'Kosong'),
(2909, '1', 'H', 4, 'Kosong'),
(2910, '2', 'H', 4, 'Kosong'),
(2911, '3', 'H', 4, 'Kosong'),
(2912, '4', 'H', 4, 'Kosong'),
(2913, '5', 'H', 4, 'Kosong'),
(2914, '6', 'H', 4, 'Kosong'),
(2915, '7', 'H', 4, 'Kosong'),
(2916, '8', 'H', 4, 'Kosong'),
(2917, '9', 'H', 4, 'Kosong'),
(2918, '10', 'H', 4, 'Kosong'),
(2919, '11', 'H', 4, 'Kosong'),
(2920, '12', 'H', 4, 'Kosong'),
(2921, '13', 'H', 4, 'Kosong'),
(2922, '14', 'H', 4, 'Kosong'),
(2923, '1', 'I', 4, 'Kosong'),
(2924, '2', 'I', 4, 'Kosong'),
(2925, '3', 'I', 4, 'Kosong'),
(2926, '4', 'I', 4, 'Kosong'),
(2927, '5', 'I', 4, 'Kosong'),
(2928, '6', 'I', 4, 'Kosong'),
(2929, '7', 'I', 4, 'Kosong'),
(2930, '8', 'I', 4, 'Kosong'),
(2931, '9', 'I', 4, 'Kosong'),
(2932, '10', 'I', 4, 'Kosong'),
(2933, '11', 'I', 4, 'Kosong'),
(2934, '12', 'I', 4, 'Kosong'),
(2935, '13', 'I', 4, 'Kosong'),
(2936, '14', 'I', 4, 'Kosong'),
(2937, '1', 'J', 4, 'Kosong'),
(2938, '2', 'J', 4, 'Kosong'),
(2939, '3', 'J', 4, 'Kosong'),
(2940, '4', 'J', 4, 'Kosong'),
(2941, '5', 'J', 4, 'Kosong'),
(2942, '6', 'J', 4, 'Kosong'),
(2943, '7', 'J', 4, 'Kosong'),
(2944, '8', 'J', 4, 'Kosong'),
(2945, '9', 'J', 4, 'Kosong'),
(2946, '10', 'J', 4, 'Kosong'),
(2947, '11', 'J', 4, 'Kosong'),
(2948, '12', 'J', 4, 'Kosong'),
(2949, '13', 'J', 4, 'Kosong'),
(2950, '14', 'J', 4, 'Kosong'),
(2951, '1', 'K', 4, 'Kosong'),
(2952, '2', 'K', 4, 'Kosong'),
(2953, '3', 'K', 4, 'Kosong'),
(2954, '4', 'K', 4, 'Kosong'),
(2955, '5', 'K', 4, 'Kosong'),
(2956, '6', 'K', 4, 'Kosong'),
(2957, '7', 'K', 4, 'Kosong'),
(2958, '8', 'K', 4, 'Kosong'),
(2959, '9', 'K', 4, 'Kosong'),
(2960, '10', 'K', 4, 'Kosong'),
(2961, '11', 'K', 4, 'Kosong'),
(2962, '12', 'K', 4, 'Kosong'),
(2963, '13', 'K', 4, 'Kosong'),
(2964, '14', 'K', 4, 'Kosong'),
(2965, '1', 'L', 4, 'Kosong'),
(2966, '2', 'L', 4, 'Kosong'),
(2967, '3', 'L', 4, 'Kosong'),
(2968, '4', 'L', 4, 'Kosong'),
(2969, '5', 'L', 4, 'Kosong'),
(2970, '6', 'L', 4, 'Kosong'),
(2971, '7', 'L', 4, 'Kosong'),
(2972, '8', 'L', 4, 'Kosong'),
(2973, '9', 'L', 4, 'Kosong'),
(2974, '10', 'L', 4, 'Kosong'),
(2975, '11', 'L', 4, 'Kosong'),
(2976, '12', 'L', 4, 'Kosong'),
(2977, '13', 'L', 4, 'Kosong'),
(2978, '14', 'L', 4, 'Kosong'),
(2979, '1', 'A', 5, 'Kosong'),
(2980, '2', 'A', 5, 'Kosong'),
(2981, '3', 'A', 5, 'Kosong'),
(2982, '4', 'A', 5, 'Kosong'),
(2983, '5', 'A', 5, 'Kosong'),
(2984, '6', 'A', 5, 'Kosong'),
(2985, '7', 'A', 5, 'Kosong'),
(2986, '8', 'A', 5, 'Kosong'),
(2987, '9', 'A', 5, 'Kosong'),
(2988, '10', 'A', 5, 'Kosong'),
(2989, '11', 'A', 5, 'Kosong'),
(2990, '12', 'A', 5, 'Kosong'),
(2991, '1', 'B', 5, 'Kosong'),
(2992, '2', 'B', 5, 'Kosong'),
(2993, '3', 'B', 5, 'Kosong'),
(2994, '4', 'B', 5, 'Kosong'),
(2995, '5', 'B', 5, 'Kosong'),
(2996, '6', 'B', 5, 'Kosong'),
(2997, '7', 'B', 5, 'Kosong'),
(2998, '8', 'B', 5, 'Kosong'),
(2999, '9', 'B', 5, 'Kosong'),
(3000, '10', 'B', 5, 'Kosong'),
(3001, '11', 'B', 5, 'Kosong'),
(3002, '12', 'B', 5, 'Kosong'),
(3003, '1', 'C', 5, 'Kosong'),
(3004, '2', 'C', 5, 'Kosong'),
(3005, '3', 'C', 5, 'Kosong'),
(3006, '4', 'C', 5, 'Kosong'),
(3007, '5', 'C', 5, 'Kosong'),
(3008, '6', 'C', 5, 'Kosong'),
(3009, '7', 'C', 5, 'Kosong'),
(3010, '8', 'C', 5, 'Kosong'),
(3011, '9', 'C', 5, 'Kosong'),
(3012, '10', 'C', 5, 'Kosong'),
(3013, '11', 'C', 5, 'Kosong'),
(3014, '12', 'C', 5, 'Kosong'),
(3015, '1', 'D', 5, 'Kosong'),
(3016, '2', 'D', 5, 'Kosong'),
(3017, '3', 'D', 5, 'Kosong'),
(3018, '4', 'D', 5, 'Kosong'),
(3019, '5', 'D', 5, 'Kosong'),
(3020, '6', 'D', 5, 'Kosong'),
(3021, '7', 'D', 5, 'Kosong'),
(3022, '8', 'D', 5, 'Kosong'),
(3023, '9', 'D', 5, 'Kosong'),
(3024, '10', 'D', 5, 'Kosong'),
(3025, '11', 'D', 5, 'Kosong'),
(3026, '12', 'D', 5, 'Kosong'),
(3027, '1', 'E', 5, 'Kosong'),
(3028, '2', 'E', 5, 'Kosong'),
(3029, '3', 'E', 5, 'Kosong'),
(3030, '4', 'E', 5, 'Kosong'),
(3031, '5', 'E', 5, 'Kosong'),
(3032, '6', 'E', 5, 'Kosong'),
(3033, '7', 'E', 5, 'Kosong'),
(3034, '8', 'E', 5, 'Kosong'),
(3035, '9', 'E', 5, 'Kosong'),
(3036, '10', 'E', 5, 'Kosong'),
(3037, '11', 'E', 5, 'Kosong'),
(3038, '12', 'E', 5, 'Kosong'),
(3039, '1', 'F', 5, 'Kosong'),
(3040, '2', 'F', 5, 'Kosong'),
(3041, '3', 'F', 5, 'Kosong'),
(3042, '4', 'F', 5, 'Kosong'),
(3043, '5', 'F', 5, 'Kosong'),
(3044, '6', 'F', 5, 'Kosong'),
(3045, '7', 'F', 5, 'Kosong'),
(3046, '8', 'F', 5, 'Kosong'),
(3047, '9', 'F', 5, 'Kosong'),
(3048, '10', 'F', 5, 'Kosong'),
(3049, '11', 'F', 5, 'Kosong'),
(3050, '12', 'F', 5, 'Kosong'),
(3051, '1', 'G', 5, 'Kosong'),
(3052, '2', 'G', 5, 'Kosong'),
(3053, '3', 'G', 5, 'Kosong'),
(3054, '4', 'G', 5, 'Kosong'),
(3055, '5', 'G', 5, 'Kosong'),
(3056, '6', 'G', 5, 'Kosong'),
(3057, '7', 'G', 5, 'Kosong'),
(3058, '8', 'G', 5, 'Kosong'),
(3059, '9', 'G', 5, 'Kosong'),
(3060, '10', 'G', 5, 'Kosong'),
(3061, '11', 'G', 5, 'Kosong'),
(3062, '12', 'G', 5, 'Kosong'),
(3063, '1', 'H', 5, 'Kosong'),
(3064, '2', 'H', 5, 'Kosong'),
(3065, '3', 'H', 5, 'Kosong'),
(3066, '4', 'H', 5, 'Kosong'),
(3067, '5', 'H', 5, 'Kosong'),
(3068, '6', 'H', 5, 'Kosong'),
(3069, '7', 'H', 5, 'Kosong'),
(3070, '8', 'H', 5, 'Kosong'),
(3071, '9', 'H', 5, 'Kosong'),
(3072, '10', 'H', 5, 'Kosong'),
(3073, '11', 'H', 5, 'Kosong'),
(3074, '12', 'H', 5, 'Kosong'),
(3075, '1', 'I', 5, 'Kosong'),
(3076, '2', 'I', 5, 'Kosong'),
(3077, '3', 'I', 5, 'Kosong'),
(3078, '4', 'I', 5, 'Kosong'),
(3079, '5', 'I', 5, 'Kosong'),
(3080, '6', 'I', 5, 'Kosong'),
(3081, '7', 'I', 5, 'Kosong'),
(3082, '8', 'I', 5, 'Kosong'),
(3083, '9', 'I', 5, 'Kosong'),
(3084, '10', 'I', 5, 'Kosong'),
(3085, '11', 'I', 5, 'Kosong'),
(3086, '12', 'I', 5, 'Kosong'),
(3087, '1', 'J', 5, 'Kosong'),
(3088, '2', 'J', 5, 'Kosong'),
(3089, '3', 'J', 5, 'Kosong'),
(3090, '4', 'J', 5, 'Kosong'),
(3091, '5', 'J', 5, 'Kosong'),
(3092, '6', 'J', 5, 'Kosong'),
(3093, '7', 'J', 5, 'Kosong'),
(3094, '8', 'J', 5, 'Kosong'),
(3095, '9', 'J', 5, 'Kosong'),
(3096, '10', 'J', 5, 'Kosong'),
(3097, '11', 'J', 5, 'Kosong'),
(3098, '12', 'J', 5, 'Kosong'),
(3099, '1', 'K', 5, 'Kosong'),
(3100, '2', 'K', 5, 'Kosong'),
(3101, '3', 'K', 5, 'Kosong'),
(3102, '4', 'K', 5, 'Kosong'),
(3103, '5', 'K', 5, 'Kosong'),
(3104, '6', 'K', 5, 'Kosong'),
(3105, '7', 'K', 5, 'Kosong'),
(3106, '8', 'K', 5, 'Kosong'),
(3107, '9', 'K', 5, 'Kosong'),
(3108, '10', 'K', 5, 'Kosong'),
(3109, '11', 'K', 5, 'Kosong'),
(3110, '12', 'K', 5, 'Kosong'),
(3111, '1', 'L', 5, 'Kosong'),
(3112, '2', 'L', 5, 'Kosong'),
(3113, '3', 'L', 5, 'Kosong'),
(3114, '4', 'L', 5, 'Kosong'),
(3115, '5', 'L', 5, 'Kosong'),
(3116, '6', 'L', 5, 'Kosong'),
(3117, '7', 'L', 5, 'Kosong'),
(3118, '8', 'L', 5, 'Kosong'),
(3119, '9', 'L', 5, 'Kosong'),
(3120, '10', 'L', 5, 'Kosong'),
(3121, '11', 'L', 5, 'Kosong'),
(3122, '12', 'L', 5, 'Kosong'),
(3123, '1', 'M', 5, 'Kosong'),
(3124, '2', 'M', 5, 'Kosong'),
(3125, '3', 'M', 5, 'Kosong'),
(3126, '4', 'M', 5, 'Kosong'),
(3127, '5', 'M', 5, 'Kosong'),
(3128, '6', 'M', 5, 'Kosong'),
(3129, '7', 'M', 5, 'Kosong'),
(3130, '8', 'M', 5, 'Kosong'),
(3131, '9', 'M', 5, 'Kosong'),
(3132, '10', 'M', 5, 'Kosong'),
(3133, '11', 'M', 5, 'Kosong'),
(3134, '12', 'M', 5, 'Kosong'),
(3135, '1', 'N', 5, 'Kosong'),
(3136, '2', 'N', 5, 'Kosong'),
(3137, '3', 'N', 5, 'Kosong'),
(3138, '4', 'N', 5, 'Kosong'),
(3139, '5', 'N', 5, 'Kosong'),
(3140, '6', 'N', 5, 'Kosong'),
(3141, '7', 'N', 5, 'Kosong'),
(3142, '8', 'N', 5, 'Kosong'),
(3143, '9', 'N', 5, 'Kosong'),
(3144, '10', 'N', 5, 'Kosong'),
(3145, '11', 'N', 5, 'Kosong'),
(3146, '12', 'N', 5, 'Kosong'),
(3147, '1', 'O', 5, 'Kosong'),
(3148, '2', 'O', 5, 'Kosong'),
(3149, '3', 'O', 5, 'Kosong'),
(3150, '4', 'O', 5, 'Kosong'),
(3151, '5', 'O', 5, 'Kosong'),
(3152, '6', 'O', 5, 'Kosong'),
(3153, '7', 'O', 5, 'Kosong'),
(3154, '8', 'O', 5, 'Kosong'),
(3155, '9', 'O', 5, 'Kosong'),
(3156, '10', 'O', 5, 'Kosong'),
(3157, '11', 'O', 5, 'Kosong'),
(3158, '12', 'O', 5, 'Kosong'),
(3159, '1', 'P', 5, 'Kosong'),
(3160, '2', 'P', 5, 'Kosong'),
(3161, '3', 'P', 5, 'Kosong'),
(3162, '4', 'P', 5, 'Kosong'),
(3163, '5', 'P', 5, 'Kosong'),
(3164, '6', 'P', 5, 'Kosong'),
(3165, '7', 'P', 5, 'Kosong'),
(3166, '8', 'P', 5, 'Kosong'),
(3167, '9', 'P', 5, 'Kosong'),
(3168, '10', 'P', 5, 'Kosong'),
(3169, '11', 'P', 5, 'Kosong'),
(3170, '12', 'P', 5, 'Kosong'),
(3171, '1', 'A', 6, 'Kosong'),
(3172, '2', 'A', 6, 'Kosong'),
(3173, '3', 'A', 6, 'Kosong'),
(3174, '4', 'A', 6, 'Kosong'),
(3175, '5', 'A', 6, 'Kosong'),
(3176, '6', 'A', 6, 'Kosong'),
(3177, '7', 'A', 6, 'Kosong'),
(3178, '8', 'A', 6, 'Kosong'),
(3179, '9', 'A', 6, 'Kosong'),
(3180, '10', 'A', 6, 'Kosong'),
(3181, '11', 'A', 6, 'Kosong'),
(3182, '12', 'A', 6, 'Kosong'),
(3183, '13', 'A', 6, 'Kosong'),
(3184, '14', 'A', 6, 'Kosong'),
(3185, '15', 'A', 6, 'Kosong'),
(3186, '16', 'A', 6, 'Kosong'),
(3187, '17', 'A', 6, 'Kosong'),
(3188, '18', 'A', 6, 'Kosong'),
(3189, '19', 'A', 6, 'Kosong'),
(3190, '20', 'A', 6, 'Kosong'),
(3191, '1', 'B', 6, 'Kosong'),
(3192, '2', 'B', 6, 'Kosong'),
(3193, '3', 'B', 6, 'Kosong'),
(3194, '4', 'B', 6, 'Kosong'),
(3195, '5', 'B', 6, 'Kosong'),
(3196, '6', 'B', 6, 'Kosong'),
(3197, '7', 'B', 6, 'Kosong'),
(3198, '8', 'B', 6, 'Kosong'),
(3199, '9', 'B', 6, 'Kosong'),
(3200, '10', 'B', 6, 'Kosong'),
(3201, '11', 'B', 6, 'Kosong'),
(3202, '12', 'B', 6, 'Kosong'),
(3203, '13', 'B', 6, 'Kosong'),
(3204, '14', 'B', 6, 'Kosong'),
(3205, '15', 'B', 6, 'Kosong'),
(3206, '16', 'B', 6, 'Kosong'),
(3207, '17', 'B', 6, 'Kosong'),
(3208, '18', 'B', 6, 'Kosong'),
(3209, '19', 'B', 6, 'Kosong'),
(3210, '20', 'B', 6, 'Kosong'),
(3211, '1', 'C', 6, 'Kosong'),
(3212, '2', 'C', 6, 'Kosong'),
(3213, '3', 'C', 6, 'Kosong'),
(3214, '4', 'C', 6, 'Kosong'),
(3215, '5', 'C', 6, 'Kosong'),
(3216, '6', 'C', 6, 'Kosong'),
(3217, '7', 'C', 6, 'Kosong'),
(3218, '8', 'C', 6, 'Kosong'),
(3219, '9', 'C', 6, 'Kosong'),
(3220, '10', 'C', 6, 'Kosong'),
(3221, '11', 'C', 6, 'Kosong'),
(3222, '12', 'C', 6, 'Kosong'),
(3223, '13', 'C', 6, 'Kosong'),
(3224, '14', 'C', 6, 'Kosong'),
(3225, '15', 'C', 6, 'Kosong'),
(3226, '16', 'C', 6, 'Kosong'),
(3227, '17', 'C', 6, 'Kosong'),
(3228, '18', 'C', 6, 'Kosong'),
(3229, '19', 'C', 6, 'Kosong'),
(3230, '20', 'C', 6, 'Kosong'),
(3231, '1', 'D', 6, 'Kosong'),
(3232, '2', 'D', 6, 'Kosong'),
(3233, '3', 'D', 6, 'Kosong'),
(3234, '4', 'D', 6, 'Kosong'),
(3235, '5', 'D', 6, 'Kosong'),
(3236, '6', 'D', 6, 'Kosong'),
(3237, '7', 'D', 6, 'Kosong'),
(3238, '8', 'D', 6, 'Kosong'),
(3239, '9', 'D', 6, 'Kosong'),
(3240, '10', 'D', 6, 'Kosong'),
(3241, '11', 'D', 6, 'Kosong'),
(3242, '12', 'D', 6, 'Kosong'),
(3243, '13', 'D', 6, 'Kosong'),
(3244, '14', 'D', 6, 'Kosong'),
(3245, '15', 'D', 6, 'Kosong'),
(3246, '16', 'D', 6, 'Kosong'),
(3247, '17', 'D', 6, 'Kosong'),
(3248, '18', 'D', 6, 'Kosong'),
(3249, '19', 'D', 6, 'Kosong'),
(3250, '20', 'D', 6, 'Kosong'),
(3251, '1', 'E', 6, 'Kosong'),
(3252, '2', 'E', 6, 'Kosong'),
(3253, '3', 'E', 6, 'Kosong'),
(3254, '4', 'E', 6, 'Kosong'),
(3255, '5', 'E', 6, 'Kosong'),
(3256, '6', 'E', 6, 'Kosong'),
(3257, '7', 'E', 6, 'Kosong'),
(3258, '8', 'E', 6, 'Kosong'),
(3259, '9', 'E', 6, 'Kosong'),
(3260, '10', 'E', 6, 'Kosong'),
(3261, '11', 'E', 6, 'Kosong'),
(3262, '12', 'E', 6, 'Kosong'),
(3263, '13', 'E', 6, 'Kosong'),
(3264, '14', 'E', 6, 'Kosong'),
(3265, '15', 'E', 6, 'Kosong'),
(3266, '16', 'E', 6, 'Kosong'),
(3267, '17', 'E', 6, 'Kosong'),
(3268, '18', 'E', 6, 'Kosong'),
(3269, '19', 'E', 6, 'Kosong'),
(3270, '20', 'E', 6, 'Kosong'),
(3271, '1', 'F', 6, 'Kosong'),
(3272, '2', 'F', 6, 'Kosong'),
(3273, '3', 'F', 6, 'Kosong'),
(3274, '4', 'F', 6, 'Kosong'),
(3275, '5', 'F', 6, 'Kosong'),
(3276, '6', 'F', 6, 'Kosong'),
(3277, '7', 'F', 6, 'Kosong'),
(3278, '8', 'F', 6, 'Kosong'),
(3279, '9', 'F', 6, 'Kosong'),
(3280, '10', 'F', 6, 'Kosong'),
(3281, '11', 'F', 6, 'Kosong'),
(3282, '12', 'F', 6, 'Kosong'),
(3283, '13', 'F', 6, 'Kosong'),
(3284, '14', 'F', 6, 'Kosong'),
(3285, '15', 'F', 6, 'Kosong'),
(3286, '16', 'F', 6, 'Kosong'),
(3287, '17', 'F', 6, 'Kosong'),
(3288, '18', 'F', 6, 'Kosong'),
(3289, '19', 'F', 6, 'Kosong'),
(3290, '20', 'F', 6, 'Kosong'),
(3291, '1', 'G', 6, 'Kosong'),
(3292, '2', 'G', 6, 'Kosong'),
(3293, '3', 'G', 6, 'Kosong'),
(3294, '4', 'G', 6, 'Kosong'),
(3295, '5', 'G', 6, 'Kosong'),
(3296, '6', 'G', 6, 'Kosong'),
(3297, '7', 'G', 6, 'Kosong'),
(3298, '8', 'G', 6, 'Kosong'),
(3299, '9', 'G', 6, 'Kosong'),
(3300, '10', 'G', 6, 'Kosong'),
(3301, '11', 'G', 6, 'Kosong'),
(3302, '12', 'G', 6, 'Kosong'),
(3303, '13', 'G', 6, 'Kosong'),
(3304, '14', 'G', 6, 'Kosong'),
(3305, '15', 'G', 6, 'Kosong'),
(3306, '16', 'G', 6, 'Kosong'),
(3307, '17', 'G', 6, 'Kosong'),
(3308, '18', 'G', 6, 'Kosong'),
(3309, '19', 'G', 6, 'Kosong'),
(3310, '20', 'G', 6, 'Kosong'),
(3311, '1', 'H', 6, 'Kosong'),
(3312, '2', 'H', 6, 'Kosong'),
(3313, '3', 'H', 6, 'Kosong'),
(3314, '4', 'H', 6, 'Kosong'),
(3315, '5', 'H', 6, 'Kosong'),
(3316, '6', 'H', 6, 'Kosong'),
(3317, '7', 'H', 6, 'Kosong'),
(3318, '8', 'H', 6, 'Kosong'),
(3319, '9', 'H', 6, 'Kosong'),
(3320, '10', 'H', 6, 'Kosong'),
(3321, '11', 'H', 6, 'Kosong'),
(3322, '12', 'H', 6, 'Kosong'),
(3323, '13', 'H', 6, 'Kosong'),
(3324, '14', 'H', 6, 'Kosong'),
(3325, '15', 'H', 6, 'Kosong'),
(3326, '16', 'H', 6, 'Kosong'),
(3327, '17', 'H', 6, 'Kosong'),
(3328, '18', 'H', 6, 'Kosong'),
(3329, '19', 'H', 6, 'Kosong'),
(3330, '20', 'H', 6, 'Kosong'),
(3331, '1', 'I', 6, 'Kosong'),
(3332, '2', 'I', 6, 'Kosong'),
(3333, '3', 'I', 6, 'Kosong'),
(3334, '4', 'I', 6, 'Kosong'),
(3335, '5', 'I', 6, 'Kosong'),
(3336, '6', 'I', 6, 'Kosong'),
(3337, '7', 'I', 6, 'Kosong'),
(3338, '8', 'I', 6, 'Kosong'),
(3339, '9', 'I', 6, 'Kosong'),
(3340, '10', 'I', 6, 'Kosong'),
(3341, '11', 'I', 6, 'Kosong'),
(3342, '12', 'I', 6, 'Kosong'),
(3343, '13', 'I', 6, 'Kosong'),
(3344, '14', 'I', 6, 'Kosong'),
(3345, '15', 'I', 6, 'Kosong'),
(3346, '16', 'I', 6, 'Kosong'),
(3347, '17', 'I', 6, 'Kosong'),
(3348, '18', 'I', 6, 'Kosong'),
(3349, '19', 'I', 6, 'Kosong'),
(3350, '20', 'I', 6, 'Kosong'),
(3351, '1', 'J', 6, 'Kosong'),
(3352, '2', 'J', 6, 'Kosong'),
(3353, '3', 'J', 6, 'Kosong'),
(3354, '4', 'J', 6, 'Kosong'),
(3355, '5', 'J', 6, 'Kosong'),
(3356, '6', 'J', 6, 'Kosong'),
(3357, '7', 'J', 6, 'Kosong'),
(3358, '8', 'J', 6, 'Kosong'),
(3359, '9', 'J', 6, 'Kosong'),
(3360, '10', 'J', 6, 'Kosong'),
(3361, '11', 'J', 6, 'Kosong'),
(3362, '12', 'J', 6, 'Kosong'),
(3363, '13', 'J', 6, 'Kosong'),
(3364, '14', 'J', 6, 'Kosong'),
(3365, '15', 'J', 6, 'Kosong'),
(3366, '16', 'J', 6, 'Kosong'),
(3367, '17', 'J', 6, 'Kosong'),
(3368, '18', 'J', 6, 'Kosong'),
(3369, '19', 'J', 6, 'Kosong'),
(3370, '20', 'J', 6, 'Kosong'),
(3371, '1', 'K', 6, 'Kosong'),
(3372, '2', 'K', 6, 'Kosong'),
(3373, '3', 'K', 6, 'Kosong'),
(3374, '4', 'K', 6, 'Kosong'),
(3375, '5', 'K', 6, 'Kosong'),
(3376, '6', 'K', 6, 'Kosong'),
(3377, '7', 'K', 6, 'Kosong'),
(3378, '8', 'K', 6, 'Kosong'),
(3379, '9', 'K', 6, 'Kosong'),
(3380, '10', 'K', 6, 'Kosong'),
(3381, '11', 'K', 6, 'Kosong'),
(3382, '12', 'K', 6, 'Kosong'),
(3383, '13', 'K', 6, 'Kosong'),
(3384, '14', 'K', 6, 'Kosong'),
(3385, '15', 'K', 6, 'Kosong'),
(3386, '16', 'K', 6, 'Kosong'),
(3387, '17', 'K', 6, 'Kosong'),
(3388, '18', 'K', 6, 'Kosong'),
(3389, '19', 'K', 6, 'Kosong'),
(3390, '20', 'K', 6, 'Kosong'),
(3391, '1', 'L', 6, 'Kosong'),
(3392, '2', 'L', 6, 'Kosong'),
(3393, '3', 'L', 6, 'Kosong'),
(3394, '4', 'L', 6, 'Kosong'),
(3395, '5', 'L', 6, 'Kosong'),
(3396, '6', 'L', 6, 'Kosong'),
(3397, '7', 'L', 6, 'Kosong'),
(3398, '8', 'L', 6, 'Kosong'),
(3399, '9', 'L', 6, 'Kosong'),
(3400, '10', 'L', 6, 'Kosong'),
(3401, '11', 'L', 6, 'Kosong'),
(3402, '12', 'L', 6, 'Kosong'),
(3403, '13', 'L', 6, 'Kosong'),
(3404, '14', 'L', 6, 'Kosong'),
(3405, '15', 'L', 6, 'Kosong'),
(3406, '16', 'L', 6, 'Kosong'),
(3407, '17', 'L', 6, 'Kosong'),
(3408, '18', 'L', 6, 'Kosong'),
(3409, '19', 'L', 6, 'Kosong'),
(3410, '20', 'L', 6, 'Kosong'),
(3411, '1', 'M', 6, 'Kosong'),
(3412, '2', 'M', 6, 'Kosong'),
(3413, '3', 'M', 6, 'Kosong'),
(3414, '4', 'M', 6, 'Kosong'),
(3415, '5', 'M', 6, 'Kosong'),
(3416, '6', 'M', 6, 'Kosong'),
(3417, '7', 'M', 6, 'Kosong'),
(3418, '8', 'M', 6, 'Kosong'),
(3419, '9', 'M', 6, 'Kosong'),
(3420, '10', 'M', 6, 'Kosong'),
(3421, '11', 'M', 6, 'Kosong'),
(3422, '12', 'M', 6, 'Kosong'),
(3423, '13', 'M', 6, 'Kosong'),
(3424, '14', 'M', 6, 'Kosong'),
(3425, '15', 'M', 6, 'Kosong'),
(3426, '16', 'M', 6, 'Kosong'),
(3427, '17', 'M', 6, 'Kosong'),
(3428, '18', 'M', 6, 'Kosong'),
(3429, '19', 'M', 6, 'Kosong'),
(3430, '20', 'M', 6, 'Kosong'),
(3431, '1', 'N', 6, 'Kosong'),
(3432, '2', 'N', 6, 'Kosong'),
(3433, '3', 'N', 6, 'Kosong'),
(3434, '4', 'N', 6, 'Kosong'),
(3435, '5', 'N', 6, 'Kosong'),
(3436, '6', 'N', 6, 'Kosong'),
(3437, '7', 'N', 6, 'Kosong'),
(3438, '8', 'N', 6, 'Kosong'),
(3439, '9', 'N', 6, 'Kosong'),
(3440, '10', 'N', 6, 'Kosong'),
(3441, '11', 'N', 6, 'Kosong'),
(3442, '12', 'N', 6, 'Kosong'),
(3443, '13', 'N', 6, 'Kosong'),
(3444, '14', 'N', 6, 'Kosong'),
(3445, '15', 'N', 6, 'Kosong'),
(3446, '16', 'N', 6, 'Kosong'),
(3447, '17', 'N', 6, 'Kosong'),
(3448, '18', 'N', 6, 'Kosong'),
(3449, '19', 'N', 6, 'Kosong'),
(3450, '20', 'N', 6, 'Kosong'),
(3451, '1', 'O', 6, 'Kosong'),
(3452, '2', 'O', 6, 'Kosong'),
(3453, '3', 'O', 6, 'Kosong'),
(3454, '4', 'O', 6, 'Kosong'),
(3455, '5', 'O', 6, 'Kosong'),
(3456, '6', 'O', 6, 'Kosong'),
(3457, '7', 'O', 6, 'Kosong'),
(3458, '8', 'O', 6, 'Kosong'),
(3459, '9', 'O', 6, 'Kosong'),
(3460, '10', 'O', 6, 'Kosong'),
(3461, '11', 'O', 6, 'Kosong'),
(3462, '12', 'O', 6, 'Kosong'),
(3463, '13', 'O', 6, 'Kosong'),
(3464, '14', 'O', 6, 'Kosong'),
(3465, '15', 'O', 6, 'Kosong'),
(3466, '16', 'O', 6, 'Kosong'),
(3467, '17', 'O', 6, 'Kosong'),
(3468, '18', 'O', 6, 'Kosong'),
(3469, '19', 'O', 6, 'Kosong'),
(3470, '20', 'O', 6, 'Kosong'),
(3471, '1', 'P', 6, 'Kosong'),
(3472, '2', 'P', 6, 'Kosong'),
(3473, '3', 'P', 6, 'Kosong'),
(3474, '4', 'P', 6, 'Kosong'),
(3475, '5', 'P', 6, 'Kosong'),
(3476, '6', 'P', 6, 'Kosong'),
(3477, '7', 'P', 6, 'Kosong'),
(3478, '8', 'P', 6, 'Kosong'),
(3479, '9', 'P', 6, 'Kosong'),
(3480, '10', 'P', 6, 'Kosong'),
(3481, '11', 'P', 6, 'Kosong'),
(3482, '12', 'P', 6, 'Kosong'),
(3483, '13', 'P', 6, 'Kosong'),
(3484, '14', 'P', 6, 'Kosong'),
(3485, '15', 'P', 6, 'Kosong'),
(3486, '16', 'P', 6, 'Kosong'),
(3487, '17', 'P', 6, 'Kosong'),
(3488, '18', 'P', 6, 'Kosong'),
(3489, '19', 'P', 6, 'Kosong'),
(3490, '20', 'P', 6, 'Kosong'),
(3491, '1', 'Q', 6, 'Kosong'),
(3492, '2', 'Q', 6, 'Kosong'),
(3493, '3', 'Q', 6, 'Kosong'),
(3494, '4', 'Q', 6, 'Kosong'),
(3495, '5', 'Q', 6, 'Kosong'),
(3496, '6', 'Q', 6, 'Kosong'),
(3497, '7', 'Q', 6, 'Kosong'),
(3498, '8', 'Q', 6, 'Kosong'),
(3499, '9', 'Q', 6, 'Kosong'),
(3500, '10', 'Q', 6, 'Kosong'),
(3501, '11', 'Q', 6, 'Kosong'),
(3502, '12', 'Q', 6, 'Kosong'),
(3503, '13', 'Q', 6, 'Kosong'),
(3504, '14', 'Q', 6, 'Kosong'),
(3505, '15', 'Q', 6, 'Kosong'),
(3506, '16', 'Q', 6, 'Kosong'),
(3507, '17', 'Q', 6, 'Kosong'),
(3508, '18', 'Q', 6, 'Kosong'),
(3509, '19', 'Q', 6, 'Kosong'),
(3510, '20', 'Q', 6, 'Kosong'),
(3511, '1', 'R', 6, 'Kosong'),
(3512, '2', 'R', 6, 'Kosong'),
(3513, '3', 'R', 6, 'Kosong'),
(3514, '4', 'R', 6, 'Kosong'),
(3515, '5', 'R', 6, 'Kosong'),
(3516, '6', 'R', 6, 'Kosong'),
(3517, '7', 'R', 6, 'Kosong'),
(3518, '8', 'R', 6, 'Kosong'),
(3519, '9', 'R', 6, 'Kosong'),
(3520, '10', 'R', 6, 'Kosong'),
(3521, '11', 'R', 6, 'Kosong'),
(3522, '12', 'R', 6, 'Kosong'),
(3523, '13', 'R', 6, 'Kosong'),
(3524, '14', 'R', 6, 'Kosong'),
(3525, '15', 'R', 6, 'Kosong'),
(3526, '16', 'R', 6, 'Kosong'),
(3527, '17', 'R', 6, 'Kosong'),
(3528, '18', 'R', 6, 'Kosong'),
(3529, '19', 'R', 6, 'Kosong'),
(3530, '20', 'R', 6, 'Kosong'),
(3531, '1', 'S', 6, 'Kosong'),
(3532, '2', 'S', 6, 'Kosong'),
(3533, '3', 'S', 6, 'Kosong'),
(3534, '4', 'S', 6, 'Kosong'),
(3535, '5', 'S', 6, 'Kosong'),
(3536, '6', 'S', 6, 'Kosong'),
(3537, '7', 'S', 6, 'Kosong'),
(3538, '8', 'S', 6, 'Kosong'),
(3539, '9', 'S', 6, 'Kosong'),
(3540, '10', 'S', 6, 'Kosong'),
(3541, '11', 'S', 6, 'Kosong'),
(3542, '12', 'S', 6, 'Kosong'),
(3543, '13', 'S', 6, 'Kosong'),
(3544, '14', 'S', 6, 'Kosong'),
(3545, '15', 'S', 6, 'Kosong'),
(3546, '16', 'S', 6, 'Kosong'),
(3547, '17', 'S', 6, 'Kosong'),
(3548, '18', 'S', 6, 'Kosong'),
(3549, '19', 'S', 6, 'Kosong'),
(3550, '20', 'S', 6, 'Kosong'),
(3551, '1', 'T', 6, 'Kosong'),
(3552, '2', 'T', 6, 'Kosong'),
(3553, '3', 'T', 6, 'Kosong'),
(3554, '4', 'T', 6, 'Kosong'),
(3555, '5', 'T', 6, 'Kosong'),
(3556, '6', 'T', 6, 'Kosong'),
(3557, '7', 'T', 6, 'Kosong'),
(3558, '8', 'T', 6, 'Kosong'),
(3559, '9', 'T', 6, 'Kosong'),
(3560, '10', 'T', 6, 'Kosong'),
(3561, '11', 'T', 6, 'Kosong'),
(3562, '12', 'T', 6, 'Kosong'),
(3563, '13', 'T', 6, 'Kosong'),
(3564, '14', 'T', 6, 'Kosong'),
(3565, '15', 'T', 6, 'Kosong'),
(3566, '16', 'T', 6, 'Kosong'),
(3567, '17', 'T', 6, 'Kosong'),
(3568, '18', 'T', 6, 'Kosong'),
(3569, '19', 'T', 6, 'Kosong'),
(3570, '20', 'T', 6, 'Kosong'),
(3571, '1', 'U', 6, 'Kosong'),
(3572, '2', 'U', 6, 'Kosong'),
(3573, '3', 'U', 6, 'Kosong'),
(3574, '4', 'U', 6, 'Kosong'),
(3575, '5', 'U', 6, 'Kosong'),
(3576, '6', 'U', 6, 'Kosong'),
(3577, '7', 'U', 6, 'Kosong'),
(3578, '8', 'U', 6, 'Kosong'),
(3579, '9', 'U', 6, 'Kosong'),
(3580, '10', 'U', 6, 'Kosong'),
(3581, '11', 'U', 6, 'Kosong'),
(3582, '12', 'U', 6, 'Kosong'),
(3583, '13', 'U', 6, 'Kosong'),
(3584, '14', 'U', 6, 'Kosong'),
(3585, '15', 'U', 6, 'Kosong'),
(3586, '16', 'U', 6, 'Kosong'),
(3587, '17', 'U', 6, 'Kosong'),
(3588, '18', 'U', 6, 'Kosong'),
(3589, '19', 'U', 6, 'Kosong'),
(3590, '20', 'U', 6, 'Kosong'),
(3591, '1', 'V', 6, 'Kosong'),
(3592, '2', 'V', 6, 'Kosong'),
(3593, '3', 'V', 6, 'Kosong'),
(3594, '4', 'V', 6, 'Kosong'),
(3595, '5', 'V', 6, 'Kosong'),
(3596, '6', 'V', 6, 'Kosong'),
(3597, '7', 'V', 6, 'Kosong'),
(3598, '8', 'V', 6, 'Kosong'),
(3599, '9', 'V', 6, 'Kosong'),
(3600, '10', 'V', 6, 'Kosong'),
(3601, '11', 'V', 6, 'Kosong'),
(3602, '12', 'V', 6, 'Kosong'),
(3603, '13', 'V', 6, 'Kosong'),
(3604, '14', 'V', 6, 'Kosong'),
(3605, '15', 'V', 6, 'Kosong'),
(3606, '16', 'V', 6, 'Kosong'),
(3607, '17', 'V', 6, 'Kosong'),
(3608, '18', 'V', 6, 'Kosong'),
(3609, '19', 'V', 6, 'Kosong'),
(3610, '20', 'V', 6, 'Kosong'),
(3611, '1', 'W', 6, 'Kosong'),
(3612, '2', 'W', 6, 'Kosong'),
(3613, '3', 'W', 6, 'Kosong'),
(3614, '4', 'W', 6, 'Kosong'),
(3615, '5', 'W', 6, 'Kosong'),
(3616, '6', 'W', 6, 'Kosong'),
(3617, '7', 'W', 6, 'Kosong'),
(3618, '8', 'W', 6, 'Kosong'),
(3619, '9', 'W', 6, 'Kosong'),
(3620, '10', 'W', 6, 'Kosong'),
(3621, '11', 'W', 6, 'Kosong'),
(3622, '12', 'W', 6, 'Kosong'),
(3623, '13', 'W', 6, 'Kosong'),
(3624, '14', 'W', 6, 'Kosong'),
(3625, '15', 'W', 6, 'Kosong'),
(3626, '16', 'W', 6, 'Kosong'),
(3627, '17', 'W', 6, 'Kosong'),
(3628, '18', 'W', 6, 'Kosong'),
(3629, '19', 'W', 6, 'Kosong'),
(3630, '20', 'W', 6, 'Kosong'),
(3631, '1', 'X', 6, 'Kosong'),
(3632, '2', 'X', 6, 'Kosong'),
(3633, '3', 'X', 6, 'Kosong'),
(3634, '4', 'X', 6, 'Kosong'),
(3635, '5', 'X', 6, 'Kosong'),
(3636, '6', 'X', 6, 'Kosong'),
(3637, '7', 'X', 6, 'Kosong'),
(3638, '8', 'X', 6, 'Kosong'),
(3639, '9', 'X', 6, 'Kosong'),
(3640, '10', 'X', 6, 'Kosong'),
(3641, '11', 'X', 6, 'Kosong'),
(3642, '12', 'X', 6, 'Kosong'),
(3643, '13', 'X', 6, 'Kosong'),
(3644, '14', 'X', 6, 'Kosong'),
(3645, '15', 'X', 6, 'Kosong'),
(3646, '16', 'X', 6, 'Kosong'),
(3647, '17', 'X', 6, 'Kosong'),
(3648, '18', 'X', 6, 'Kosong'),
(3649, '19', 'X', 6, 'Kosong'),
(3650, '20', 'X', 6, 'Kosong'),
(3651, '1', 'Y', 6, 'Kosong'),
(3652, '2', 'Y', 6, 'Kosong'),
(3653, '3', 'Y', 6, 'Kosong'),
(3654, '4', 'Y', 6, 'Kosong'),
(3655, '5', 'Y', 6, 'Kosong'),
(3656, '6', 'Y', 6, 'Kosong'),
(3657, '7', 'Y', 6, 'Kosong'),
(3658, '8', 'Y', 6, 'Kosong'),
(3659, '9', 'Y', 6, 'Kosong'),
(3660, '10', 'Y', 6, 'Kosong'),
(3661, '11', 'Y', 6, 'Kosong'),
(3662, '12', 'Y', 6, 'Kosong'),
(3663, '13', 'Y', 6, 'Kosong'),
(3664, '14', 'Y', 6, 'Kosong'),
(3665, '15', 'Y', 6, 'Kosong'),
(3666, '16', 'Y', 6, 'Kosong'),
(3667, '17', 'Y', 6, 'Kosong'),
(3668, '18', 'Y', 6, 'Kosong'),
(3669, '19', 'Y', 6, 'Kosong'),
(3670, '20', 'Y', 6, 'Kosong'),
(3671, '1', 'Z', 6, 'Kosong'),
(3672, '2', 'Z', 6, 'Kosong'),
(3673, '3', 'Z', 6, 'Kosong'),
(3674, '4', 'Z', 6, 'Kosong'),
(3675, '5', 'Z', 6, 'Kosong'),
(3676, '6', 'Z', 6, 'Kosong'),
(3677, '7', 'Z', 6, 'Kosong'),
(3678, '8', 'Z', 6, 'Kosong'),
(3679, '9', 'Z', 6, 'Kosong'),
(3680, '10', 'Z', 6, 'Kosong'),
(3681, '11', 'Z', 6, 'Kosong'),
(3682, '12', 'Z', 6, 'Kosong'),
(3683, '13', 'Z', 6, 'Kosong'),
(3684, '14', 'Z', 6, 'Kosong'),
(3685, '15', 'Z', 6, 'Kosong'),
(3686, '16', 'Z', 6, 'Kosong'),
(3687, '17', 'Z', 6, 'Kosong'),
(3688, '18', 'Z', 6, 'Kosong'),
(3689, '19', 'Z', 6, 'Kosong'),
(3690, '20', 'Z', 6, 'Kosong');

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
(5, '5'),
(6, '6');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_topup`
--

CREATE TABLE `transaksi_topup` (
  `id_topup` varchar(12) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_topup` int(11) NOT NULL,
  `status_topup` enum('Menunggu Pembayaran','Menunggu Persetujuan Admin','Transaksi Berhasil','Kirim Bukti Pembayaran','Transaksi Gagal') NOT NULL,
  `bukti_pembayaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_topup`
--

INSERT INTO `transaksi_topup` (`id_topup`, `date`, `id_user`, `total_topup`, `status_topup`, `bukti_pembayaran`) VALUES
('197308765366', '2024-03-19 17:56:52', 2, 18000, 'Transaksi Berhasil', '197308765366.png'),
('281464546777', '2024-03-09 12:30:57', 2, 1000000, 'Transaksi Berhasil', '281464546777.png'),
('444071702847', '2024-03-07 19:52:22', 2, 10000, 'Transaksi Berhasil', '444071702847.png'),
('672702423377', '2024-03-22 13:37:54', 2, 10000, 'Kirim Bukti Pembayaran', ''),
('704629469069', '2024-03-15 20:24:27', 2, 15000, 'Transaksi Berhasil', '704629469069.png'),
('881763297866', '2024-03-25 17:00:00', 14, 90000, 'Menunggu Persetujuan Admin', '881763297866.png'),
('912218483626', '2024-03-22 12:39:08', 2, 190000, 'Menunggu Persetujuan Admin', '912218483626.png'),
('972870919925', '2024-03-15 20:28:26', 3, 140000, 'Kirim Bukti Pembayaran', '');

-- --------------------------------------------------------

--
-- Table structure for table `trx`
--

CREATE TABLE `trx` (
  `trx` varchar(20) NOT NULL,
  `id_order` int(11) NOT NULL,
  `password_trx` varchar(6) NOT NULL,
  `status_cetak` enum('Sudah Di Cetak','Belum Di Cetak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trx`
--

INSERT INTO `trx` (`trx`, `id_order`, `password_trx`, `status_cetak`) VALUES
('193320240307215', 15, '197605', 'Sudah Di Cetak'),
('193320240307216', 16, '952664', 'Belum Di Cetak'),
('193320240307217', 17, '310855', 'Belum Di Cetak'),
('193320240308218', 18, '471092', 'Belum Di Cetak'),
('193320240309219', 19, '072393', 'Belum Di Cetak'),
('193320240309221', 21, '893747', 'Sudah Di Cetak'),
('193320240313222', 22, '864133', 'Belum Di Cetak'),
('193320240315424', 24, '023768', 'Sudah Di Cetak'),
('193320240315426', 26, '812422', 'Sudah Di Cetak'),
('193320240315427', 27, '687433', 'Sudah Di Cetak'),
('193320240315428', 28, '216131', 'Belum Di Cetak'),
('193320240319429', 29, '500699', 'Sudah Di Cetak'),
('193320240322234', 34, '963240', 'Belum Di Cetak'),
('193320240322435', 35, '215636', 'Sudah Di Cetak'),
('193320240325236', 36, '863451', 'Belum Di Cetak'),
('193320240325239', 39, '453502', 'Belum Di Cetak'),
('193320240325437', 37, '702203', 'Sudah Di Cetak'),
('193320240325438', 38, '062621', 'Sudah Di Cetak');

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
  `telepon` varchar(14) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`, `nama_user`, `telepon`, `saldo`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dimas Aditya', '08757351233', 0),
(2, 4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', '0897564534', 823001),
(3, 4, 'kaka', '5541c7b5a06c39b267a5efae6628e003', 'Kaka', '08123123122', 220000),
(4, 3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', '0832424234', 0),
(5, 2, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager', '087735431339', 1438691),
(6, 4, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', '08345424', 0),
(7, 4, 'ZZ', 'dc18d83abfd9f87d396e8fd6b6ac0fe1', 'ZZ', '085634242', 0),
(8, 4, 'aasdq', '8ca39209498cc55df0c7a39c6737bacc', 'Dimas', '1231231231', 0),
(9, 1, 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', '8823131', 0),
(13, 2, 'asddsa', 'ec02c59dee6faaca3189bace969c22d3', 'asdss', '234243', 0),
(14, 4, 'dimdim', 'e6fa959b9e8f9c638e0d82bf2c7dc5e7', 'Dimas', '08773233123', 0);

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
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`day`);

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
-- Indexes for table `transaksi_topup`
--
ALTER TABLE `transaksi_topup`
  ADD PRIMARY KEY (`id_topup`);

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
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `dimension`
--
ALTER TABLE `dimension`
  MODIFY `id_dimension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id_seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3691;

--
-- AUTO_INCREMENT for table `teater`
--
ALTER TABLE `teater`
  MODIFY `id_teater` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
