-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 05:58 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_pakar_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(5) NOT NULL,
  `id_periksa` varchar(191) NOT NULL,
  `kode_tingkat_cemas` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_periksa`, `kode_tingkat_cemas`) VALUES
(211, 'periksa6089a6409db64', 'TC1'),
(210, 'periksa6089a5c551655', 'TC3'),
(209, 'periksa6089a4d02ab44', 'TC2'),
(208, 'periksa6089a368e6dd7', 'TC1'),
(207, 'periksa6080b8c2d28b8', 'TC1'),
(206, 'periksa6080b5c1845d2', 'TC1'),
(202, 'periksa60803f15a9cdc', 'TC1'),
(203, 'periksa6080424207d8b', 'TC3'),
(204, 'periksa60804dc967365', 'TC2'),
(205, 'periksa60804e3753fc5', 'TC1'),
(212, 'periksa608aab011834f', 'TC2'),
(213, 'periksa608af0a5f1ce8', 'TC1'),
(214, 'periksa60a3a2c20473e', 'TC1'),
(215, 'periksa60d99b4c861db', 'TC1'),
(216, 'periksa60e1d390b87cc', 'TC1'),
(217, 'periksa60e68f55cb51e', 'TC1'),
(218, 'periksa60ec406fa0a2e', 'TC2'),
(219, 'periksa60ec437f2164b', 'TC1'),
(220, 'periksa60f1491ae751b', 'TC1'),
(221, 'periksa60f149c6b3af5', 'TC1'),
(222, 'periksa60f14a528bc85', 'TC1'),
(223, 'periksa60f1667430964', 'TC1'),
(224, 'periksa60f16689c8d0a', 'TC1'),
(225, 'periksa60f166a1e5118', 'TC3'),
(226, 'periksa60f16945686ea', 'TC1'),
(231, 'periksa60f919006d3c5', 'TC1'),
(228, 'periksa60f3ddcd4e5bd', 'TC1'),
(229, 'periksa60f3ddfddc06b', 'TC3'),
(230, 'periksa60f3de1fae7de', 'TC2');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `kode_indikator` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`kode_indikator`, `nama`, `deskripsi`) VALUES
('I1', 'Cemas', 'Indikator'),
('I2', 'Marah', 'Indikator'),
('I3', 'Berkata Kasarr', 'Indikator'),
('I4', 'Panik Melihat Tugas Sekolah Anaka', 'Indikator'),
('I5', 'Terlalu sering bertanya Pada sesama orang tua/guru a', 'Indikator'),
('I6', 'Mimpi Buruk', 'Indikator'),
('I7', 'Sering Sulit Tidur', 'Indikator'),
('I8', 'Tidak Fokus Pada Pekerjaan Lain', 'Indikator'),
('I9', 'Mudah Lupa', 'Indikator'),
('I10', 'Memaksa Anak Untuk Selalu Belajar', 'Indikator'),
('I11', 'Khawatir berlebihan terhadap kesehatan anak', 'Indikator'),
('I12', 'Takut Nilai Anak Buruk', 'Indikator'),
('I13', 'Khawatir dengan efek leptop pada mata anak', 'Indikator'),
('I14', 'Khawatir anak kehilangan waktu istirahat', 'Indikator'),
('I15', 'Tegas dengan suara tinggi', 'Indikator'),
('I16', 'Membantu Mengerjakan Tugas Anak', 'Indikator'),
('I17', 'Sesekali Bertanya Pada Sesama Orang Tua/Guru ', 'Indikator'),
('I18', 'Sesekali Tidak Focus Pada Pekerjaan Lain', 'Indikator'),
('I19', 'Jika Anak Kelihatan Sakit, Segera Diobati', 'Indikator'),
('I20', 'Tegas Dengan Suara Yang Nyaman Di Dengar', 'Indikator'),
('I21', 'Mengawasi Anak Mengerjakan Tugas Dan Membantu Jika Diperlukan', 'Indikator'),
('I22', 'Jam Tidur Berkurang Sedikit', 'Indikator'),
('I23', 'Masih bisa mengerjakan pekerjaan lain dengan baik', 'Indikator'),
('I24', 'Menyiapkan vitamin dan makanan tambahan buat anak', 'Indikator'),
('I25', 'Lapar', 'Indikator');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `id_periksa` varchar(200) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `umur` int(2) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `id_periksa`, `no_telp`, `alamat`, `umur`, `jenis_kelamin`) VALUES
(23, 'Rama', 'periksa6050d6b61be0c', '089', 'Sadayu', 22, 'Laki - Laki'),
(24, 'Rama', 'periksa6050ddf159128', '890', 'djsakdsafsa', 22, 'Laki - Laki'),
(25, 'Rama', 'periksa6050dfb02f17c', '089', 'jakarta', 22, 'Laki - Laki'),
(26, 'Rama', 'periksa6050e0326541b', '089890709', 'Jakarta', 22, 'Laki - Laki'),
(27, 'Rama', 'periksa6050e072a8ced', '0898743892', 'Jakarta', 22, 'Laki - Laki'),
(28, 'Rama', 'periksa6050e08eb7e1a', '8978940328', 'Jakrtaa', 22, 'Laki - Laki'),
(29, 'rama', 'periksa6052cd117c094', '09890', 'jakarta', 22, 'Laki - Laki'),
(30, 'Rama', 'periksa6052d3bea120f', '890890', 'jakarta', 22, 'Laki - Laki'),
(31, 'Rama', 'periksa6052d5325c9f6', '0897', 'Jakarta', 22, 'Laki - Laki'),
(32, 'Rama', 'periksa605341b0878c6', '089', 'Jakarta', 22, 'Laki - Laki'),
(33, 'Bayu', 'periksa60537cde8dbc2', '90700', 'Jakarta', 20, 'Laki - Laki'),
(34, 'mey', 'periksa605381484619a', '089', 'jakarta', 22, 'Laki - Laki'),
(35, 'aa', 'periksa60538188ccfc1', '089', 'mk', 2, 'Laki - Laki'),
(36, 'sa', 'periksa605414a85ff7c', 's', 'sa', 12, 'Laki - Laki'),
(37, 'as', 'periksa6054152b3dfe6', 'sa', 's', 21, 'Laki - Laki'),
(38, 'as', 'periksa60541578ed705', '12', 'as', 12, 'Laki - Laki'),
(39, 'r', 'periksa6054487004ad4', '09', 'dksl', 22, 'Laki - Laki'),
(40, 'Muhamad Ram', 'periksa607ff27fa96fe', '089123213213', 'Jakarat', 222, 'Laki - Laki'),
(41, 'Mey', 'periksa608019d0a65ea', '0892222', 'Cawang', 25, 'Laki - Laki'),
(42, 'Cobain', 'periksa60801d3e0eafd', '082926292772', 'Alamat palsu', 18, 'Perempuan'),
(43, 'Muhammad Iq', 'periksa608037804b6bf', '085920686838', 'Bekasi', 12, 'Laki - Laki'),
(44, 'Muhammad Iq', 'periksa60803f15a9cdc', '08232631782', 'Bekasi', 21, 'Laki - Laki'),
(45, 'Azra', 'periksa6080424207d8b', '0821312312', 'Galaxy', 17, 'Laki - Laki'),
(46, 'Muhammad Iq', 'periksa60804dc967365', '239231301', 'Bekasi', 31, 'Laki - Laki'),
(47, 'Iqbal', 'periksa60804e3753fc5', '123120103131', 'Bekasi', 21, 'Laki - Laki'),
(48, 'Hilal', 'periksa6080b5c1845d2', '2312012', 'Bekasi', 22, 'Perempuan'),
(49, 'Afrizon', 'periksa6080b84108eae', '023819023', 'Bekasi', 45, 'Laki - Laki'),
(50, 'Afrizon', 'periksa6080b8c2d28b8', '23820312', 'Balam', 31, 'Laki - Laki'),
(51, 'Hilda', 'periksa6089a368e6dd7', '085920686477', 'Bekasi', 21, 'Perempuan'),
(52, 'Bisa', 'periksa6089a4d02ab44', '023912312', 'bALAM', 21, 'Laki - Laki'),
(53, 'Bisa', 'periksa6089a5c551655', 'bisa ', 'bisa', 21, 'Laki - Laki'),
(54, 'Ayo', 'periksa6089a6409db64', '2312312', 'Ayo', 21, 'Laki - Laki'),
(55, 'Iqbal', 'periksa608aab011834f', 'iqbal', 'iqbal', 12, 'Laki - Laki'),
(56, 'BISA', 'periksa608af0a5f1ce8', 'BISA', 'BISA', 12, 'Laki - Laki'),
(57, 'hhjk', 'periksa60a3a2c20473e', '98798', 'vghj', 12, 'Laki - Laki'),
(58, 'ioasjdokasj', 'periksa60d99b4c861db', 'klhasjkdhasjk', 'jaskldjklas', 21, 'Laki - Laki'),
(59, 'iqbal', 'periksa60d9aadabb4e0', 'iqbql', 'hjasjkdhask', 21, 'Laki - Laki'),
(60, 'hjkbhjbhjk', 'periksa60e1d390b87cc', 'hhjj', 'hghj', 57, 'Laki - Laki'),
(61, 'asdasdassad', 'periksa60e555cd5d8f5', 'asdas', 'asdasdas', 21, 'Laki - Laki'),
(62, 'asdasdsa', 'periksa60e68f55cb51e', '23432342', 'sasdsad', 21, 'Laki - Laki'),
(63, 'Ramadhan', 'periksa60ec406fa0a2e', '089123', 'Kalijati', 22, 'Laki - Laki'),
(64, 'iqbaleeeeee', 'periksa60f14a528bc85', 'asdkljas', 'sdjalkjas', 12, 'Laki - Laki'),
(65, 'sadasd', 'periksa60f16fa2e7ab5', 'dsadas', 'asdas', 12, 'Laki - Laki'),
(66, 'iqbal', 'periksa60f3ddcd4e5bd', 'iqbal', 'iqbal', 12, 'Laki - Laki'),
(67, 'ayu', 'periksa60f3ddfddc06b', 'ayu', 'ayu', 12, 'Laki - Laki'),
(68, 'hild', 'periksa60f3de1fae7de', 'hilda', 'hilda', 21, 'Laki - Laki'),
(69, 'dashdjska', 'periksa60f919006d3c5', 'asdjkhasjkd', 'asdhjkasd', 12, 'Laki - Laki');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(5) NOT NULL,
  `kode_indikator` varchar(11) NOT NULL,
  `kode_tingkat_cemas` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kode_indikator`, `kode_tingkat_cemas`) VALUES
(171, 'I16', 'TC2'),
(170, 'I15', 'TC2'),
(169, 'I13', 'TC2'),
(168, 'I7', 'TC2'),
(165, 'I14', 'TC1'),
(164, 'I13', 'TC1'),
(163, 'I12', 'TC1'),
(162, 'I11', 'TC1'),
(161, 'I10', 'TC1'),
(160, 'I9', 'TC1'),
(159, 'I8', 'TC1'),
(158, 'I7', 'TC1'),
(157, 'I6', 'TC1'),
(156, 'I5', 'TC1'),
(155, 'I4', 'TC1'),
(154, 'I3', 'TC1'),
(167, 'I2', 'TC2'),
(166, 'I1', 'TC2'),
(153, 'I2', 'TC1'),
(152, 'I1', 'TC1'),
(186, 'I23', 'TC3'),
(185, 'I22', 'TC3'),
(184, 'I21', 'TC3'),
(174, 'I19', 'TC2'),
(173, 'I18', 'TC2'),
(172, 'I17', 'TC2'),
(183, 'I20', 'TC3'),
(182, 'I9', 'TC3'),
(181, 'I1', 'TC3'),
(187, 'I24', 'TC3');

-- --------------------------------------------------------

--
-- Table structure for table `rule_temp`
--

CREATE TABLE `rule_temp` (
  `id` int(5) NOT NULL,
  `id_periksa` varchar(200) NOT NULL,
  `pilihan` varchar(100) NOT NULL,
  `jawaban` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kecemasan`
--

CREATE TABLE `tingkat_kecemasan` (
  `kode_tingkat_cemas` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat_kecemasan`
--

INSERT INTO `tingkat_kecemasan` (`kode_tingkat_cemas`, `nama`, `deskripsi`, `solusi`) VALUES
('TC3', 'Tingkat Kecemasan Rendah', 'Kecemasan ringan berhubungan dengan ketegangan yang menyebabkan individu menjadi waspada dan meningkatkan lapang persepsinya. Kecemasan ini dapat memotivasi belajar dan menghasilkan pertumbuhan serta kreativitas. Stuart (2007)', '<p>Hal-hal yang dilakukan untuk Kecemasan Rendah/Ringan dan sedang dapat kembali dilakukan di Kecemasan Tingkat tinggi/berat. Bagi penderita gangguan kecemasan tingkat tinggi/berat, pikiran negatif dan rasa gelisah sering kali sulit dihilangkan, bahkan sampai mengganggu aktivitas sehari-hari.</p>\r\n\r\n<p>Meskipun masing-masing gangguan kecemasan memiliki karakteristik yang berbeda, secara umum kondisi ini dapat ditangani dengan psikoterapi dan obat-obatan. Salah satu bentuk psikoterapi yang paling dikenal adalah terapi perilaku kognitif (CBT), di mana penderita diarahkan ke cara berpikir, bereaksi, dan berperilaku yang dapat membantunya mengurangi gejala kecemasan. CBT ini dilakukan agar penderita mengenali dan mengubah pola pemikiran dan perilaku yang membuatnya merasa cemas.</p>\r\n\r\n<p>Terapi ini membantu pasien agar tidak mengubah suatu pikiran biasa menjadi pikiran yang negatif dan mampu melihatnya secara lebih realistis. Diarahkan pada perubahan pola pikir dalam menghadapi situasi baru di masa pandemic. Agar hasilnya optimal, dapat disarankan untuk berkonsultasi ke dokter guna mendapat penanganan lebih lanjut. Terlebih jika gangguan kecemasan sudah menimbulkan kesulitan dalam menjalani aktivitas, susah tidur, kelelahan, sulit berkonsentrasi, hingga gejala depresi</p>\r\n'),
('TC2', 'Tingkat Kecemasan Sedang', 'Kecemasan ini memungkinkan individu untuk berfokus pada hal yang penting dan mengesampingkan yang lain. Kecemasan sedang ini mempersempit lapang persepsi individu. Dengan demikian, individu mengalami tidak perhatian yang selektif namun dapat berfokus pada lebih banyak area jika diarahkan untuk melakukannya .Stuart (2007)', '<p><strong>Hal-hal yang dilakukan untuk Kecemasan Ringan dapat kembali dilakukan di Kecemasan Tingkat sedang. </strong></p>\r\n\r\n<p>1. Berbagi perasaan dengan orang lain : Curhat atau menceritakan apa yang sedang dirasakan dan alami kepada orang yang dipercaya bisa meringankan kecemasan yan bersifat sedang. Orang tersebut bisa saja teman dekat, atau anggota keluarga yang memahami kondisi yang ada. Sebagai alternatif, mencari support group yang beranggotakan orang-orang dengan keluhan yang serupa, sehingga bisa saling berbagi pengalaman dan tips tentang bagaimana cara mengatasi gangguan kecemasan.</p>\r\n\r\n<p>2. Fokus pada menenangkan diri sendiri : Menyediakan waktu bagi diri sendiri. Sediakan waktu untuk berjalan santai, melakukan meditasi, mendapatkan pijatan, atau berendam di air hangat. Bila perlu, matikan telepon genggam selama beberapa saat agar tidak terganggu. Terkadang kecemasan dapat disebabkan oleh meningkatnya hormon stres. Cara-cara relaksasi tersebut bisa membuat merasa lebih tenang, sehingga rasa cemas pun bisa reda.</p>\r\n\r\n<p>3. Perhatikan asupan makan dan minum : Makan teratur dan minum cukup air. Ketika sibuk atau merasa cemas, seseorang dapat melupakan jadwal makannya. Padahal kadar gula darah yang rendah karena terlambat makan dapat menyebabkan seseorang lebih mudah emosi dan cemas. Kekurangan cairan atau dehidrasi juga dapat membuat jantung berdetak lebih cepat dan memperburuk rasa cemas. Efektivitas langkah-langkah di atas belum tentu sama pada setiap orang dengan gangguan kecemasan. Hal terpenting untuk meredakan kecemasan adalah mengenali pencetus rasa cemas tersebut, kemudian menentukan cara yang paling cocok untuk meredakannya.</p>\r\n'),
('TC1', 'Tingkat Kecemasan Tinggi', 'Pada tingkat kecemasan ini sangat mengurangi lapang persepsi individu. Individu cenderung berfokus pada sesuatu yang rinci dan spesifik serta tidak berpikir tentang hal lain. Semua perilaku ditujukan untuk mengurangi ketegangan. Individu tersebut memerlukan banyak arahan untuk berfokus pada area lain Stuart (2007)', '<p><strong>Mengurangi kecemasan yang dapat dilakukan sendiri: </strong></p>\r\n\r\n<p>- Bernapas dengan dalam dapat membuat tubuh relaks dan mengurangi aktivitas saraf di otak yang menyebabkan rasa cemas. Ketika mengalami kecemasan, tarik napas panjang selama lima detik, kemudian tahan selama lima detik, lalu lepaskan kembali perlahan-lahan dalam lima detik juga. Lakukanlah beberapa kali sampai pikiran lebih tenang</p>\r\n\r\n<p>- Memusatkan pikiran pada apa yang sedang dikerjakan</p>\r\n\r\n<p>- Hindari kafein karena dapat meningkatkan rasa cemas. Konsumsi kafein, baik dalam bentuk kopi, cokelat, maupun teh, juga dapat memicu dan memperburuk gejala kecemasan. Beberapa studi menunjukkan bahwa konsumsi kopi dan teh dapat membuat seseorang merasa lebih gelisah dan sulit berkonsentrasi, terlebih jika dikonsumsi dalam jumlah berlebihan, yaitu lebih dari 2 gelas per hari.</p>\r\n\r\n<p><strong>Pemberian Dukungan secara Kognitif :</strong> Diarahkan pada penekanan pemahaman logis terkait kondisi yang ada. Diberikan penguatan positif tetap perlu dilakukan, disampaikan kembali kondisi terkini yang menyebabkan diberlakukannya PJJ, dijelaskan manfaat dan pengaruh positif dilaksanakannya PJJ dimasa pandemi seperti sekarang. Dibangun kembali motivasi untuk dapat mendampingi anak dalam menjalankan PJJ.</p>\r\n\r\n<p><strong>Hal lain yang dapat disarankan untuk dilakukan :</strong> makan makanan sehat, melakukan gerakan/ olah raga ringan, melakukan kegiatan bersama anak yang menyenangkan, mengerjaian hobi seperti membuat kue, berkebun, melukis dan lainnya.</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`username`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`kode_indikator`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`kode_indikator`),
  ADD KEY `id_penyakit` (`kode_tingkat_cemas`);

--
-- Indexes for table `rule_temp`
--
ALTER TABLE `rule_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat_kecemasan`
--
ALTER TABLE `tingkat_kecemasan`
  ADD PRIMARY KEY (`kode_tingkat_cemas`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `rule_temp`
--
ALTER TABLE `rule_temp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
