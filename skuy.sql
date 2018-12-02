-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2018 pada 11.15
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skuy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_user`
--

CREATE TABLE `akun_user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `akses` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_user`
--

INSERT INTO `akun_user` (`id_user`, `username`, `password`, `akses`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'ferdy', 'f9af294304691d958534a8e06db9f19e', 'user'),
(7, 'fadil', 'd0503276f86a627d6c29bc963106570e', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kendaraan`
--

CREATE TABLE `data_kendaraan` (
  `id_kendaraan` varchar(6) NOT NULL,
  `nama_kendaraan` text NOT NULL,
  `merk` text NOT NULL,
  `jenis_kendaraan` text NOT NULL,
  `plat_nomor` text NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kendaraan`
--

INSERT INTO `data_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `merk`, `jenis_kendaraan`, `plat_nomor`, `harga`, `status`) VALUES
('1', 'avanza', 'toyota', 'roda 4', 'D 6969 BCD', 120000, 0),
('MBL001', 'Fortuner 2018', 'Toyota', 'SUV', 'B 1000 GI', 400000, 0),
('MBL002', 'CIVIC 2018', 'Honda', 'Sedan', 'B 1234 TST', 450000, 1),
('MTR001', 'MX King 150', 'Yamaha', 'CUB', 'B 3600 EHH', 30000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `nik` varchar(13) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`nik`, `nama`, `alamat`, `no_hp`, `email`, `foto`, `id_user`) VALUES
('6701170103', 'Ferdy Pittardi', 'asdasd', '8123123', '', '../gambar/7.jpg', 6),
('6701174081', 'Fadil Armando Athallah', '', '', '', '', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_kendaraan`
--

CREATE TABLE `sewa_kendaraan` (
  `id_sewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `durasi_sewa` varchar(20) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `denda` int(11) NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `lunas` int(1) NOT NULL,
  `nik` varchar(13) NOT NULL,
  `id_kendaraan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa_kendaraan`
--

INSERT INTO `sewa_kendaraan` (`id_sewa`, `tgl_sewa`, `durasi_sewa`, `tgl_kembali`, `tgl_dikembalikan`, `denda`, `total_sewa`, `lunas`, `nik`, `id_kendaraan`) VALUES
(29, '2018-12-02', '+3 day', '2018-12-05', '0000-00-00', 0, 0, 0, '6701170103', '1'),
(30, '2018-12-01', '+3 day', '2018-12-04', '0000-00-00', 0, 1200000, 0, '6701170103', 'MBL001');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpeminjaman`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpeminjaman` (
`id_sewa` int(11)
,`nik` varchar(13)
,`nama` text
,`id_kendaraan` varchar(6)
,`nama_kendaraan` text
,`harga` int(11)
,`tgl_sewa` date
,`tgl_kembali` date
,`tgl_dikembalikan` date
,`total_sewa` int(11)
,`denda` int(11)
,`lunas` int(1)
,`keterangan` varchar(18)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpengguna`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpengguna` (
`id_user` int(11)
,`username` text
,`password` text
,`nik` varchar(13)
,`nama` text
,`akses` varchar(5)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vpeminjaman`
--
DROP TABLE IF EXISTS `vpeminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpeminjaman`  AS  select `sewa_kendaraan`.`id_sewa` AS `id_sewa`,`data_user`.`nik` AS `nik`,`data_user`.`nama` AS `nama`,`sewa_kendaraan`.`id_kendaraan` AS `id_kendaraan`,`data_kendaraan`.`nama_kendaraan` AS `nama_kendaraan`,`data_kendaraan`.`harga` AS `harga`,`sewa_kendaraan`.`tgl_sewa` AS `tgl_sewa`,`sewa_kendaraan`.`tgl_kembali` AS `tgl_kembali`,`sewa_kendaraan`.`tgl_dikembalikan` AS `tgl_dikembalikan`,`sewa_kendaraan`.`total_sewa` AS `total_sewa`,`sewa_kendaraan`.`denda` AS `denda`,`sewa_kendaraan`.`lunas` AS `lunas`,(case when (`sewa_kendaraan`.`tgl_dikembalikan` = '0000-00-00') then 'Belum Dikembalikan' when ((`sewa_kendaraan`.`tgl_dikembalikan` is not null) and (`sewa_kendaraan`.`lunas` = 0)) then 'Belum Lunas' when ((`sewa_kendaraan`.`tgl_dikembalikan` is not null) and (`sewa_kendaraan`.`lunas` = 1)) then 'Sudah Lunas' end) AS `keterangan` from ((`data_user` join `sewa_kendaraan` on((`data_user`.`nik` = `sewa_kendaraan`.`nik`))) join `data_kendaraan` on((`sewa_kendaraan`.`id_kendaraan` = `data_kendaraan`.`id_kendaraan`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpengguna`
--
DROP TABLE IF EXISTS `vpengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpengguna`  AS  select `akun_user`.`id_user` AS `id_user`,`akun_user`.`username` AS `username`,`akun_user`.`password` AS `password`,`data_user`.`nik` AS `nik`,`data_user`.`nama` AS `nama`,`akun_user`.`akses` AS `akses` from (`akun_user` join `data_user` on((`akun_user`.`id_user` = `data_user`.`id_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `sewa_kendaraan`
--
ALTER TABLE `sewa_kendaraan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `nik_2` (`nik`),
  ADD KEY `nik_3` (`nik`,`id_kendaraan`),
  ADD KEY `nik` (`nik`,`id_kendaraan`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sewa_kendaraan`
--
ALTER TABLE `sewa_kendaraan`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `sewa_kendaraan`
--
ALTER TABLE `sewa_kendaraan`
  ADD CONSTRAINT `sewa_kendaraan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`),
  ADD CONSTRAINT `sewa_kendaraan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `data_kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
