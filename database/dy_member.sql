-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 02:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dy_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` bigint(20) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pemateri_id` bigint(20) DEFAULT NULL,
  `kordinator_id` bigint(20) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `hari` varchar(45) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id`, `kelas_id`, `pemateri_id`, `kordinator_id`, `tempat`, `hari`, `jam`, `keterangan`, `created`, `modified`, `deleted`) VALUES
(1, 1, 1, 1, 'smk wikrama', 'jum\'at', '12:59', 'sehat', '2018-10-16 04:02:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas_member`
--

CREATE TABLE `jadwal_kelas_member` (
  `jadwal_kelas_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal_kelas_member`
--

INSERT INTO `jadwal_kelas_member` (`jadwal_kelas_id`, `member_id`, `created`, `modified`, `deleted`) VALUES
(1, 1, '2018-10-16 07:26:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_kelas`
--

CREATE TABLE `kehadiran_kelas` (
  `pelaksanaan_kelas_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `jam_hadir` time DEFAULT NULL,
  `keterangan` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  `point1` int(11) DEFAULT NULL,
  `point2` int(11) DEFAULT NULL,
  `point3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 A', 'mantap', '2018-10-05 09:13:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) NOT NULL,
  `rayon_id` char(3) DEFAULT NULL,
  `cabang_id` char(3) DEFAULT NULL,
  `ranting_id` char(3) DEFAULT NULL,
  `pangkal_id` char(3) DEFAULT NULL,
  `tk_id` char(3) DEFAULT NULL,
  `sales_id` bigint(20) DEFAULT NULL,
  `kordinator_id` bigint(20) DEFAULT NULL,
  `tingkatan_id` int(11) DEFAULT NULL,
  `mentor` varchar(200) DEFAULT NULL,
  `komunikator` varchar(200) DEFAULT NULL,
  `nama` varchar(200) NOT NULL,
  `panggilan` varchar(100) DEFAULT NULL,
  `tgl_pengangkatan` date DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL COMMENT 'L\nP',
  `email` varchar(200) DEFAULT NULL,
  `telp` varchar(200) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `alamat` text,
  `status` tinyint(4) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  `id_no` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `rayon_id`, `cabang_id`, `ranting_id`, `pangkal_id`, `tk_id`, `sales_id`, `kordinator_id`, `tingkatan_id`, `mentor`, `komunikator`, `nama`, `panggilan`, `tgl_pengangkatan`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `email`, `telp`, `desa`, `kota`, `alamat`, `status`, `created`, `modified`, `deleted`, `id_no`) VALUES
(1, '123', '123', '123', '123', '123', NULL, NULL, 1, 'ujang', 'umi', 'kosasih', 'sisahok', '2018-10-01', '2018-10-02', 'bogor', 'L', 'rukmana4985@gmail.com', '085819788313', 'kopo', 'bogor', 'lorem ipsum dolor sit amet', 1, '2018-10-16 03:51:31', NULL, NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `url`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, NULL, 'roles', 'Role', 'icon-diamond', '2018-02-27 00:28:01', '2018-02-27 00:28:01', NULL),
(10, NULL, 'users', 'User Admin', 'icon-user', '2018-02-27 00:32:52', '2018-09-21 07:43:11', NULL),
(11, NULL, 'settings', 'Setting', 'icon-diamond', '2018-02-27 00:34:15', '2018-02-27 00:34:15', NULL),
(12, NULL, 'classes', 'Kelas', 'icon-diamond', '2018-10-05 09:14:35', '2018-10-05 09:14:35', NULL),
(13, NULL, 'grades', 'Tingkatan', 'icon-diamond', '2018-10-05 10:24:15', '2018-10-05 10:24:15', NULL),
(14, NULL, 'members', 'Member', 'icon-diamond', '2018-10-06 00:04:20', '2018-10-06 00:04:20', NULL),
(15, NULL, 'jadwal-kelas', 'Jadwal Kelas', 'icon-diamond', '2018-10-16 03:21:41', '2018-10-16 03:21:41', NULL),
(16, NULL, 'jadwal-kelas-member', 'Jadwal Kelas Member', 'icon-diamond', '2018-10-16 07:08:29', '2018-10-16 07:08:29', NULL),
(17, NULL, 'rencana-jadwal-kelas', 'Rencana Jadwal Kelas', 'icon-diamond', '2018-10-16 07:33:31', '2018-10-16 07:33:31', NULL),
(18, NULL, 'rencana-kunjungan', 'Rencana Kunjungan', 'icon-diamond', '2018-10-19 20:17:01', '2018-10-19 20:17:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan_kelas`
--

CREATE TABLE `pelaksanaan_kelas` (
  `id` bigint(20) NOT NULL,
  `jadwal_kelas_id` bigint(20) NOT NULL,
  `tgl_pelaksanaan` datetime DEFAULT NULL,
  `keterangan` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  `materi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `qry_jadwal_kelas_member`
-- (See below for the actual view)
--
CREATE TABLE `qry_jadwal_kelas_member` (
`jadwal_kelas_id` bigint(20)
,`member_id` bigint(20)
,`created` timestamp
,`modified` timestamp
,`deleted` timestamp
,`nama` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `qry_kehadiran`
-- (See below for the actual view)
--
CREATE TABLE `qry_kehadiran` (
`pelaksanaan_kelas_id` bigint(20)
,`member_id` bigint(20)
,`jam_hadir` time
,`keterangan` text
,`created` timestamp
,`modified` timestamp
,`deleted` timestamp
,`point1` int(11)
,`point2` int(11)
,`point3` int(11)
,`nama` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `qry_ketidakhadiran`
-- (See below for the actual view)
--
CREATE TABLE `qry_ketidakhadiran` (
`pelaksanaan_kelas_id` bigint(20)
,`member_id` bigint(20)
,`jam_hadir` time
,`keterangan` text
,`created` timestamp
,`modified` timestamp
,`deleted` timestamp
,`point1` int(11)
,`point2` int(11)
,`point3` int(11)
,`nama` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_jadwal_kelas`
--

CREATE TABLE `rencana_jadwal_kelas` (
  `id` bigint(20) NOT NULL,
  `id_jadwal_kelas` bigint(20) NOT NULL,
  `pembahasan` varchar(200) NOT NULL,
  `keterangan` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rencana_jadwal_kelas`
--

INSERT INTO `rencana_jadwal_kelas` (`id`, `id_jadwal_kelas`, `pembahasan`, `keterangan`, `created`, `modified`, `deleted`) VALUES
(1, 1, 'jihad', 'jihad jihad', '2018-10-16 07:51:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kunjungan`
--

CREATE TABLE `rencana_kunjungan` (
  `id` bigint(20) NOT NULL,
  `sales_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `tgl_kunjungan` datetime NOT NULL,
  `tgl_terlaksana` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rencana_kunjungan`
--

INSERT INTO `rencana_kunjungan` (`id`, `sales_id`, `member_id`, `tgl_kunjungan`, `tgl_terlaksana`, `created`, `modified`, `deleted`) VALUES
(1, 1, 1, '2018-12-31 12:59:00', '2018-10-29 20:14:31', '2018-10-19 22:03:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Admin', '2018-02-25 20:00:32', '2018-02-25 20:00:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_menus`
--

CREATE TABLE `role_menus` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_menus`
--

INSERT INTO `role_menus` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(82, 1, 12, NULL, NULL, NULL),
(83, 1, 13, NULL, NULL, NULL),
(84, 1, 14, NULL, NULL, NULL),
(85, 1, 15, NULL, NULL, NULL),
(86, 1, 16, NULL, NULL, NULL),
(87, 1, 17, NULL, NULL, NULL),
(88, 1, 18, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id`, `nama`, `keterangan`, `created`, `modified`, `deleted`) VALUES
(1, 'satu', 'asdf', '2018-10-06 00:02:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan_history`
--

CREATE TABLE `tingkatan_history` (
  `id` bigint(20) NOT NULL,
  `penilai_id` bigint(20) DEFAULT NULL,
  `member_id` bigint(20) DEFAULT NULL,
  `tingkatan_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'lukman', '$2y$10$y206roSg7lEd86U3V9esB.rpXOBJq0V.tF/GaIhVc4recEP5Xbep2', NULL, '2018-02-21 06:13:56', '2018-02-21 06:13:56', NULL);

-- --------------------------------------------------------

--
-- Structure for view `qry_jadwal_kelas_member`
--
DROP TABLE IF EXISTS `qry_jadwal_kelas_member`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_jadwal_kelas_member`  AS  select `jkm`.`jadwal_kelas_id` AS `jadwal_kelas_id`,`jkm`.`member_id` AS `member_id`,`jkm`.`created` AS `created`,`jkm`.`modified` AS `modified`,`jkm`.`deleted` AS `deleted`,`m`.`nama` AS `nama` from (`jadwal_kelas_member` `jkm` join `member` `m` on((`m`.`id` = `jkm`.`member_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `qry_kehadiran`
--
DROP TABLE IF EXISTS `qry_kehadiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_kehadiran`  AS  select `kk`.`pelaksanaan_kelas_id` AS `pelaksanaan_kelas_id`,`kk`.`member_id` AS `member_id`,`kk`.`jam_hadir` AS `jam_hadir`,`kk`.`keterangan` AS `keterangan`,`kk`.`created` AS `created`,`kk`.`modified` AS `modified`,`kk`.`deleted` AS `deleted`,`kk`.`point1` AS `point1`,`kk`.`point2` AS `point2`,`kk`.`point3` AS `point3`,`m`.`nama` AS `nama` from (`kehadiran_kelas` `kk` join `member` `m` on((`m`.`id` = `kk`.`member_id`))) where ((`kk`.`jam_hadir` is not null) and (`kk`.`jam_hadir` <> '00:00:00')) ;

-- --------------------------------------------------------

--
-- Structure for view `qry_ketidakhadiran`
--
DROP TABLE IF EXISTS `qry_ketidakhadiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_ketidakhadiran`  AS  select `kk`.`pelaksanaan_kelas_id` AS `pelaksanaan_kelas_id`,`kk`.`member_id` AS `member_id`,`kk`.`jam_hadir` AS `jam_hadir`,`kk`.`keterangan` AS `keterangan`,`kk`.`created` AS `created`,`kk`.`modified` AS `modified`,`kk`.`deleted` AS `deleted`,`kk`.`point1` AS `point1`,`kk`.`point2` AS `point2`,`kk`.`point3` AS `point3`,`m`.`nama` AS `nama` from (`kehadiran_kelas` `kk` join `member` `m` on((`m`.`id` = `kk`.`member_id`))) where (isnull(`kk`.`jam_hadir`) or (`kk`.`jam_hadir` = '00:00:00')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id`,`kelas_id`);

--
-- Indexes for table `jadwal_kelas_member`
--
ALTER TABLE `jadwal_kelas_member`
  ADD PRIMARY KEY (`member_id`,`jadwal_kelas_id`);

--
-- Indexes for table `kehadiran_kelas`
--
ALTER TABLE `kehadiran_kelas`
  ADD PRIMARY KEY (`pelaksanaan_kelas_id`,`member_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus_menus1_idx` (`parent_id`);

--
-- Indexes for table `pelaksanaan_kelas`
--
ALTER TABLE `pelaksanaan_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana_jadwal_kelas`
--
ALTER TABLE `rencana_jadwal_kelas`
  ADD PRIMARY KEY (`id`,`id_jadwal_kelas`);

--
-- Indexes for table `rencana_kunjungan`
--
ALTER TABLE `rencana_kunjungan`
  ADD PRIMARY KEY (`id`,`sales_id`,`member_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_menus`
--
ALTER TABLE `role_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_menus_roles1_idx` (`role_id`),
  ADD KEY `fk_role_menus_menus1_idx` (`menu_id`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkatan_history`
--
ALTER TABLE `tingkatan_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_roles1_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pelaksanaan_kelas`
--
ALTER TABLE `pelaksanaan_kelas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana_jadwal_kelas`
--
ALTER TABLE `rencana_jadwal_kelas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rencana_kunjungan`
--
ALTER TABLE `rencana_kunjungan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_menus`
--
ALTER TABLE `role_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tingkatan_history`
--
ALTER TABLE `tingkatan_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
