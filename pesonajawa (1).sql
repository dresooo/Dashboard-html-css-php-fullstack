-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 02:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `andres`
--

CREATE TABLE `andres` (
  `andresID` varchar(5) NOT NULL,
  `andresKOTA` varchar(255) NOT NULL,
  `destinasiKODE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `andres`
--

INSERT INTO `andres` (`andresID`, `andresKOTA`, `destinasiKODE`) VALUES
('AB115', 'BANDUNG', 'AB14'),
('AB123', 'Jakarta', 'AB13');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita825220026` char(11) NOT NULL,
  `beritaDRESO` varchar(255) NOT NULL,
  `kategoriberita825220026` varchar(255) NOT NULL,
  `event825220026` varchar(255) NOT NULL,
  `namarestoran` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita825220026`, `beritaDRESO`, `kategoriberita825220026`, `event825220026`, `namarestoran`) VALUES
('AC11', 'Gaby jatuh dari motor', 'Kecelakaan', 'Pas gaby berangkat sosialisasi krrs, gaby jatuh karena mobil box yang di depan nya rem mendadak sehingga motor gaby tidak ada waktu untuk meng ngerem.', 'Central'),
('AC14', 'Kopi Jalanan ', 'minuman', ' lorem ipsum lorem ipsumlorem ipsum lorem ipsumlorem ipsum lorem ipsumlorem ipsum lorem ipsumlorem ipsumlorem ipsum', 'Central'),
('AV15', 'Gerobak Kayuh', 'Jalanan', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'Mcdonald');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` char(255) NOT NULL,
  `destinasiFOTO` char(20) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFOTO`, `kategoriKODE`) VALUES
('2345', 'PUNCAK PASS', 's simply dummy text of the printing and typesetting industry. Lorem Ipsu', 'candisari1.jpg', '1235'),
('AB13', 'Pulau Komodo', 's simply dummy text of the printing and typesetting industry. Lorem Ipsu', 'komodo.jpg', 'AHJF'),
('AB14', 'Candi Borobudur', 's simply dummy text of the printing and typesetting industry. Lorem Ipsu', 'borobudur.jpg', '1235'),
('AB15', 'Gunung Merapi', 's simply dummy text of the printing and typesetting industry. Lorem Ipsu', 'gunung.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(140) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('aa', 'aa', 'bg-05.jpg', ''),
('aa', 'aa', 'bg-05.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` char(120) NOT NULL,
  `hotelKET` char(120) NOT NULL,
  `hotelFILE` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelKET`, `hotelFILE`) VALUES
('AB12', 'Alila Purnama Hotel', 'Alila Purnama dengan segala kemewahannya bakal membuat kamu betah berlama-lama untuk menginap, terlebih karena salah sat', 'alila.jpg'),
('AB13', 'Four Season Resort', 'Untuk membuat liburanmu ke Bali semakin berkesan, pemilihan hotel yang tepat juga bisa menjadi penentu, salah satunya de', 'Four.jpg'),
('AB14', 'Mandapa A Ritz', 'Masih dari kawasan Bali, tepatnya di Jalan Raya Kedewatan Ubud terdapat pula hotel mewah dengan kualitas bintang lima ya', 'Mandapa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('1234', 'Rumah nico', 'nico 1', 'nico 1'),
('1235', 'rumah nico 2', 'nico 2', 'nico 2'),
('AHJF', 'RUMAH MAKAN PADANAG', 'ENAK', 'GOOGLE');

-- --------------------------------------------------------

--
-- Table structure for table `oleh`
--

CREATE TABLE `oleh` (
  `olehKODE` char(4) NOT NULL,
  `olehNAMA` char(20) NOT NULL,
  `olehKET` char(120) NOT NULL,
  `olehHARGA` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oleh`
--

INSERT INTO `oleh` (`olehKODE`, `olehNAMA`, `olehKET`, `olehHARGA`) VALUES
('ASDF', 'GABY4', 'GABY4', 20000),
('GHDJ', 'Kue SUSs', 'Enakss', 10000),
('GHJK', 'GABY1', 'GABY1', 5000),
('JKLH', 'GABY2', 'GABY2', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `namarestoran` char(20) NOT NULL,
  `menurestoran` char(20) NOT NULL,
  `keteranganrestoran` char(120) NOT NULL,
  `filerestoran` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`namarestoran`, `menurestoran`, `keteranganrestoran`, `filerestoran`) VALUES
('Central', 'Spagetti', 'Sejak tahun 1979. Perpaduan tradisi dan yang baru untuk cita rasa yang istimewa. Selama lebih dari 30 tahun, Hidangan Ch', 'central.jpg'),
('Mcdonald', 'Double', 'Makanan Cepat saji Amerika', 'mekdi.jpg'),
('KFC', 'AyamGoreng', 'KFC adalah restoran cepat saji yang terkenal di seluruh dunia.', 'kfc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `saranID` varchar(20) NOT NULL,
  `saranNAMA` varchar(20) NOT NULL,
  `saranEMAIL` varchar(30) NOT NULL,
  `saranKET` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`saranID`, `saranNAMA`, `saranEMAIL`, `saranKET`) VALUES
('Ab12', 'Andres@gmail.com', 'Andres@gmail.com', 'ini test'),
('Ab13', 'dreso@gmail.com', 'dreso@gmail.com', 'test 2'),
('Ab15', 'coba@gmail.com', 'coba@gmail.com', 'pppppppppp'),
('Ab12', '', '', 'nnn');

-- --------------------------------------------------------

--
-- Table structure for table `suplemen`
--

CREATE TABLE `suplemen` (
  `suplemenKODE` char(4) NOT NULL,
  `suplemenNAMA` char(20) NOT NULL,
  `suplemenKET` char(255) NOT NULL,
  `suplemenFILE` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplemen`
--

INSERT INTO `suplemen` (`suplemenKODE`, `suplemenNAMA`, `suplemenKET`, `suplemenFILE`) VALUES
('AB13', 'Whey Protein', 'Whey protein adalah protein yang terdapat di dalam whey, yaitu sisa susu yang dihasilkan dalam produksi keju. Jenis protein ini banyak digunakan untuk menambah massa otot.', 'whey.jpg'),
('AB14', 'Pro Isolate', 'Pro Isolate dari Muscle First merupakan whey protein murni dengan daya serap 90% yang mampu dengan efektif menambah asupan protein harian sehingga membuat pertumbuhan otot menjadi sempurna.', 'isolate.jpg'),
('AB15', 'Pro Gainer', 'Pro Gainer? PRO GAINER merupakan susu protein tinggi kalori dan rendah lemak yang bermanfaat untuk menambah massa tubuh. PRO GAINER Dibuat secara alami dengan menggunakan serat gandum, produk ini tidak menimbulkan efek samping berbahaya.', 'gainer.jpg'),
('AB16', 'ASHWAGANDA', 'Apa itu ashwagandha? Ashwagandha adalah ramuan yang digunakan dalam pengobatan tradisional India. Biasanya ashwagandha digunakan untuk membantu tubuh mengelola stres.', 'ashwaganda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelKODE` char(4) NOT NULL,
  `travelNAMA` char(20) NOT NULL,
  `travelKET` char(120) NOT NULL,
  `olehNAMA` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travelKODE`, `travelNAMA`, `travelKET`, `olehNAMA`) VALUES
('AC12', 'Bandung', 'Bandung, capital of Indonesia West Java province, is a large city set amid volcanoes and tea plantations. Its known for', 'GABY4'),
('AC15', 'Jakarta', 'Jakarta, capital of Indonesia West Java province, is a large city set amid volcanoes and tea plantations. Its known for', 'GABY1'),
('AC16', 'Surabaya', 'Surabaya, capital of Indonesia West Java province, is a large city set amid volcanoes and tea plantations. Its known for', 'Kue SUSs');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('0001', 'dreso', 'dreso@gmail.com', 'c3c000b450bce1f9f713b514ec0c033c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `andres`
--
ALTER TABLE `andres`
  ADD PRIMARY KEY (`andresID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita825220026`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelKODE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `oleh`
--
ALTER TABLE `oleh`
  ADD PRIMARY KEY (`olehKODE`);

--
-- Indexes for table `suplemen`
--
ALTER TABLE `suplemen`
  ADD PRIMARY KEY (`suplemenKODE`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
