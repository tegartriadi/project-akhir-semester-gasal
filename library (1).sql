-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Des 2024 pada 11.22
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `bukuID` int NOT NULL,
  `judul` varchar(70) NOT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahunTerbit` int DEFAULT NULL,
  `status` enum('Tersedia','Dipinjam') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kategoriID` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `sinopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`bukuID`, `judul`, `penulis`, `penerbit`, `tahunTerbit`, `status`, `kategoriID`, `foto`, `sinopsis`, `stok`) VALUES
(17, 'One Piece', 'Eichiro Oda', 'Kodansha', 1990, 'Tersedia', 5, '20241215073246.jpg', 'One Piece menceritakan petualangan Monkey D. Luffy, seorang pemuda yang bercita-cita menjadi Raja Bajak Laut. Dengan kekuatan tubuh elastis dari Buah Iblis Gomu-Gomu, Luffy berlayar mencari harta karun legendaris One Piece di Grand Line. Dalam perjalanannya, ia membentuk kru Bajak Laut Topi Jerami yang terdiri dari teman-teman setia dengan keahlian unik. Bersama-sama, mereka menghadapi berbagai musuh kuat, menjelajahi pulau-pulau misterius, dan mengejar mimpi mereka di lautan penuh bahaya.', 10),
(18, ' Pulang', 'Leila S. Chudori', 'Gramedia Pustaka Utama', 2012, 'Tersedia', 2, '20241216070230.jpg', 'Novel Pulang bercerita tentang perjalanan emosional seorang eksil politik bernama Dimas Suryo, yang terusir dari Indonesia akibat pergolakan politik tahun 1965. Cerita ini menelusuri perjuangan Dimas dalam membangun kehidupannya di Paris sambil tetap menjaga rasa cinta pada tanah airnya. Dengan latar belakang sejarah yang kaya, Pulang mengisahkan tentang kehilangan, identitas, dan kerinduan yang mendalam terhadap rumah.', 6),
(22, 'Buku Geografi', 'Tegar Pratama', 'Cakrawala Nusantara', 2024, 'Tersedia', 7, '20241217013917.webp', 'Buku ini mengupas tuntas tentang keindahan alam dan dinamika bumi dari berbagai sudut pandang geografi. Dengan pembahasan yang sistematis, pembaca diajak memahami konsep-konsep dasar geografi, seperti litosfer, atmosfer, hidrosfer, dan biosfer. Selain itu, buku ini juga menjelaskan isu-isu lingkungan terkini, seperti perubahan iklim, urbanisasi, dan pemanfaatan sumber daya alam secara berkelanjutan.', 23),
(23, 'Petualangan si Ninja Bayangan', 'Hiroshi Takeda', 'Shonen Press', 2021, 'Tersedia', 5, '20241217074936.jpg', 'Seorang ninja muda berjuang untuk menjadi yang terkuat di desanya. Dalam perjalanannya, ia menghadapi musuh dari luar dan dalam yang menguji keberanian dan tekadnya.', 12),
(24, 'Robot dan Dunia Masa Depan', 'Aiko Fujimoto', 'Manga Universe', 2019, 'Tersedia', 5, '20241217075040.jpg', 'Seorang anak menemukan robot canggih dari masa depan yang membantunya melawan invasi alien. Namun, robot itu menyimpan misteri yang dapat mengubah dunia.', 12),
(25, ' Senja di Ujung Harapan', 'Ayu Lestari', 'Langit Sastra', 2018, 'Tersedia', 10, '20241217075333.jpg', 'Sebuah kisah tentang perempuan yang mencari makna kebahagiaan setelah kehilangan orang-orang yang dicintainya. Novel ini menyajikan perjalanan emosional penuh pelajaran hidup.', 12),
(26, 'Dunia Tanpa Batas', 'Ahmad Fauzan', 'Pena Klasik', 2020, 'Tersedia', 10, '20241217075534.png', 'Sebuah novel reflektif tentang perjalanan seorang pemuda melintasi benua untuk menemukan jati diri dan mengatasi keraguan akan masa depannya.', 12),
(27, 'Jejak Perang Dunia II', ' Rendra Wibowo', ' Historia Nusantara', 2017, 'Tersedia', 13, '20241217075712.jpg', 'Buku ini mengungkap kisah-kisah di balik Perang Dunia II, termasuk peran negara-negara Asia dalam konflik global dan dampaknya terhadap geopolitik dunia.', 23),
(28, ' Revolusi Industri dan Perubahan Dunia', 'Dian Prasetyo', 'Wacana Sejarah', 2022, 'Tersedia', 13, '20241217080039.png', 'Buku ini membahas dampak revolusi industri pertama hingga keempat terhadap kehidupan manusia, mulai dari ekonomi hingga sosial budaya.', 123),
(29, 'Dalam Kesunyian yang Berbicara', ' Maya Sari', 'Pelangi Sastra', 2019, 'Tersedia', 14, '20241217080159.jpg', 'Antologi puisi yang menyelami berbagai emosi manusia, seperti cinta, kehilangan, harapan, dan kekuatan untuk bangkit dari keterpurukan.', 23),
(30, 'Langit yang Hilang', 'Rahmat Abdullah', 'Cipta Karya', 2020, 'Tersedia', 14, '20241217080355.jpg', 'Kumpulan puisi yang menggambarkan kerinduan akan keindahan alam yang perlahan hilang seiring perubahan zaman.', 45),
(31, 'Teknologi Energi Terbarukan', 'Dr. Andi Haryanto', ' Ilmu Pengetahuan Press', 2021, 'Tersedia', 11, '20241217080541.jpg', 'Buku ini membahas perkembangan teknologi energi terbarukan seperti tenaga surya dan angin, serta potensinya menggantikan bahan bakar fosil di masa depan.', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` int NOT NULL,
  `namaKategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `namaKategori`) VALUES
(2, 'Fiksi'),
(4, 'Novel'),
(5, 'Manga'),
(7, 'Pendidikan'),
(8, 'Motivasi'),
(9, 'Teori Konspirasi'),
(10, 'Sastra'),
(11, 'Karya Ilmiah'),
(12, 'Biografi'),
(13, 'Sejarah'),
(14, 'Puisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `bukuID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjamanID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `bukuID` int DEFAULT NULL,
  `tanggalPeminjaman` date DEFAULT NULL,
  `tanggalPengembalian` date DEFAULT NULL,
  `statusPeminjaman` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `ulasanID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `bukuID` int DEFAULT NULL,
  `ulasan` text,
  `rating` int DEFAULT NULL,
  `tanggalUlasan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `namaLengkap` varchar(60) DEFAULT NULL,
  `alamat` text,
  `role` enum('Admin','Petugas','Peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `namaLengkap`, `alamat`, `role`) VALUES
(1, 'ADII', '202cb962ac59075b964b07152d234b70', 'tegartt@gmail.com', 'Tegarr', 'DANI RT 03 RW 07', 'Admin'),
(16, 'Kharismawan', '202cb962ac59075b964b07152d234b70', 'yudha@gmail.com', 'Yudha', 'Matesih', 'Peminjam'),
(17, 'Sadella', '202cb962ac59075b964b07152d234b70', 'brian@gmail.com', 'Brian', 'Lalung', 'Peminjam'),
(18, 'Petugas', '202cb962ac59075b964b07152d234b70', 'petugas@gmail.com', 'Petugas', 'matesih', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indeks untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjamanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indeks untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`ulasanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `bukuID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `koleksiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjamanID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `ulasanID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
