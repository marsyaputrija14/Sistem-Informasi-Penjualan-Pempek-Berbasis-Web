-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 11:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pempek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_sandi` text NOT NULL,
  `admin_foto` varchar(80) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_nama`, `admin_email`, `admin_sandi`, `admin_foto`, `level`) VALUES
(60, 'admin', 'Admin', 'admin@gmail.com', '$2y$10$i.q9fviZUwPWQnjdODeN2eLjHGUjZxInJZFUptgQaKASab1N2jRVO', '05ee4da8d5775d8bfa7473633a5ac146.jpg', 'Admin'),
(61, 'salim', 'Dr. Salim', 'salim@gmail.com', '', 'user.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `user_id` int(11) NOT NULL,
  `cart_rowid` varchar(80) NOT NULL,
  `cart_name` text NOT NULL,
  `cart_price` varchar(8) NOT NULL,
  `cart_image` varchar(80) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_weight` varchar(7) NOT NULL,
  `cart_stok` int(11) NOT NULL,
  `cart_userid` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `iddetailtransaksi` int(11) NOT NULL,
  `transaksi_id` varchar(10) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `d_transaksi_qty` smallint(4) NOT NULL,
  `d_transaksi_biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` smallint(6) NOT NULL,
  `kategori` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `url`) VALUES
(1, 'Pempek Ikan', 'pempekikan'),
(14, 'Model', 'model'),
(15, 'Tekwan', 'tekwan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `id_kategori` smallint(6) NOT NULL,
  `produk_url` text NOT NULL,
  `produk_name` text NOT NULL,
  `produk_weight` text NOT NULL,
  `produk_tgl` datetime NOT NULL,
  `produk_stok` text NOT NULL,
  `produk_price` text NOT NULL,
  `produk_description` longtext NOT NULL,
  `produk_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `id_kategori`, `produk_url`, `produk_name`, `produk_weight`, `produk_tgl`, `produk_stok`, `produk_price`, `produk_description`, `produk_image`) VALUES
(1477391265, 1, 'pempek-lenjer-1675417682.html', 'Pempek Lenjer', '100', '2023-02-03 16:48:02', '10', '10000', 'Lenjer adalah jenis pempek yang juga sangat terkenal setelah kapal selam. Pempek lenjer sudah ada sejak pertama kali pempek diciptakan, karena bentuknya sederhana yakni lonjong memanjang. Lenjer juga tidak memiliki isian apapun, sehinggsa bisa dikatakan sebagai versi original dari pempek.', 'dab0e22d4549bc11113c0da170207bbf.jpeg'),
(1477391266, 1, 'pempek-kulit-1675417782.html', 'Pempek Kulit', '100', '2023-02-03 16:49:42', '10', '2000', 'Pempek kulit biasanya menggunakan campuran tepung dan adonan kulit ikan. Ikan yang paling sering digunakan adalah ikan tenggiri. Layaknya pempek adaan, pempek kulit tidak melalui proses rebus melainkan langsung digoreng. Cita rasa dan aroma kulit ikan yang kuat membuat pempek kulit punya rasa yang berbeda dari pempek lain.', 'a20462d1a490cd8544d6c5345fb9a774.jpeg'),
(1477391267, 1, 'pempek-keriting-1675417824.html', 'Pempek Keriting', '100', '2023-02-03 16:50:24', '10', '2000', 'Pempek keriting umumnya hanya ditemukan di wilayah Palembang. Hal ini dikarenakan proses pembuatannya yang rumit dan membutuhkan waktu yang lama. Bentuk pempek ini menyerupai bola mie yang dibentuk manual. Pempek keriting juga disebut kerupuk pempek.', '8aacc7401bf0f30ed7f6dbece0523af3.jpeg'),
(1477391268, 1, 'pempek-adaan-1675417872.html', 'Pempek Adaan', '100', '2023-02-03 16:51:12', '10', '2000', 'Pempek adaan berbentuk bulat seperti bola ping pong. Pempek ini terbuat juga dari ikan, sehingga sekilas memang seperti bakso ikan. Akan tetapi jika dipegang, pempek adaan lebih kenyal dibandingkan bakso ikan yang ada di Indonesia.', '6925e2549b8197cde503933bb4529599.jpeg'),
(1477391269, 1, 'pempek-lenggang-1675417932.html', 'Pempek Lenggang', '100', '2023-02-03 16:52:12', '10', '20000', 'Pempek lenggang cukup unik dibandingkan pempek lainnya dan biasanya paling laris ketika bulan Ramadhan. Pempek lenggang dibuat dengan menggunakan telur bebek, adonan tepung sagu dan ikan yang biasa digunakan untuk membuat pempek. Kemudian campuran bahan ini dibungkus menggunakan daun pisang.', '9fcb524754c1e571770de06fd6f21f77.jpeg'),
(1477391270, 14, 'model-ikan-1675417991.html', 'Model Ikan', '100', '2023-02-03 16:53:11', '10', '10000', 'Model adalah salah satu makanan khas Palembang. Rasanya seperti pempek, tapi berkuah seperti tekwan. Bedanya dengan tekwan, tekwan dibentuk kecil2 dan direbus, sedangkan model dibentuk bulat dan diisi tahu langsung digoreng.', '30088f4ab23a237be78491b914aa7d5a.jpeg'),
(1477391271, 15, 'tekwan-ikan-1675418048.html', 'Tekwan Ikan', '100', '2023-02-03 16:54:08', '10', '10000', 'Terbuat dari olahan ikan tenggiri dan tepung tapioka berkualitas. Dibentuk berupa bulatan kecil dan disajikan dengan kuah/kaldu udang dengan rasa yg khas. Dilengkapi dengan sohun,jamur kuping,irisan bengkoang serta ditaburi bawang goreng dan seledri.', '0fe0229d1ee4c3efedd0a80061b10119.jpeg'),
(1477391272, 1, 'pempek-panggang-1675418136.html', 'Pempek Panggang', '100', '2023-02-03 16:55:36', '10', '2000', 'pempek panggang sama seperti pempek pada umumnya, yang membedakan adalah cara memasaknya yang dipanggang. Karena dipanggang menggunakan arang, maka sajian pempek ini memiliki aroma yang lebih harum dan sedap dibandingkan pempek goreng. Teksturnya juga kering dan lebih renyah.', '1ad735da3e80b655d09c61959aed87e3.jpeg'),
(1477391273, 1, 'pempek-kapal-selam-1675418489.html', 'Pempek Kapal Selam', '100', '2023-02-03 17:01:29', '10', '10000', 'Jenis pempek yang paling terkenal dan mudah ditemukan adalah pempek kapal selam. Ini merupakan pempek yang diisi dengan telur ayam rebus atau telur bebek. Dikarenakan biasanya menggunakan minimal setengah telur ayam atau bahkan telur ayam utuh, maka pempek kapal selam berukuran besar selayaknya menggambarkan kapal selam asli.', '5af367adc6c3c858c41754c95c5f54b9.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaksi_total` double NOT NULL,
  `transaksi_tujuan` varchar(255) NOT NULL,
  `transaksi_pos` int(5) NOT NULL,
  `transaksi_prov` varchar(80) NOT NULL,
  `transaksi_kota` varchar(25) NOT NULL,
  `transaksi_kurir` varchar(5) NOT NULL,
  `transaksi_service` varchar(50) NOT NULL,
  `transaksi_tgl_pesan` date NOT NULL,
  `transaksi_bts_bayar` date NOT NULL,
  `transaksi_status` text NOT NULL,
  `transaksi_note` text NOT NULL,
  `transaksi_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `buktipembayaran` text NOT NULL DEFAULT 'default.jpg',
  `noresi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` text NOT NULL,
  `noktp` text NOT NULL,
  `fotoprofil` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_sandi` text NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_nama`, `alamat`, `nohp`, `noktp`, `fotoprofil`, `user_email`, `user_sandi`, `user_status`, `user_created`) VALUES
(765915263, 'Sugeng', 'Jl. Palembang', '0859281592', '0285901825', '', 'sugeng@gmail.com', '$2y$10$x0d6mFU2kphZb5osweN0UuczWMOOesvwwYd1mPm3tQonOc706kImq', 1, '2023-06-06 14:47:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `iddetailtransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1477391275;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `tb_transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
