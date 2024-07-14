-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2023 at 03:18 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20494028_starcell2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(26, 'Star Cell 2', 'starcell2', '73a18285c436a7866ba42d715200bd88'),
(32, 'Darwin', 'darwin', '3750c667d5cd8aecc0a9213b362066e9'),
(33, 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(28, 'Minuman', 'Item_Category_725.jpg', 'Yes', 'Yes'),
(29, 'Minyak', 'Item_Category_914.jpg', 'Yes', 'Yes'),
(30, 'Gas LPG', 'Item_Category_847.jpg', 'No', 'Yes'),
(33, 'Beras', 'Item_Category_11.png', 'Yes', 'Yes'),
(34, 'Tepung', 'Item_Category_159.png', 'No', 'Yes'),
(37, 'Peralatan', 'Item_Category_587.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(6, 'Darwin Edryans', '08987533189', 'darwin.edryan57@gmail.com', 'Jl Panca Bhakti No 09'),
(7, 'Leoni Valencia', '087779512175', 'leonyvalenciaa@gmail.com', 'Jl Mantuka No 90'),
(9, 'Le', '085900330912', 'leonyvalenciaa@gmail.com', 'Luvv'),
(10, 'Wenxi', '08957349494', 'wenzi@gmail.com', 'Jl Merdeka TPI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `delivery` varchar(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_customer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id`, `item`, `price`, `qty`, `total`, `delivery`, `order_date`, `status`, `id_customer`) VALUES
(39, 'A&W Slim 250ml 24klg', 130000, 4, 520000, 'Transfer', '2023-07-10 11:49:48', 'Selesai', 6),
(40, 'Sania Royale Cooking Oil 2 LT', 48000, 1, 48000, 'COD', '2023-07-10 11:50:35', 'Ordered', 7),
(41, 'Beras Hoki 20kg', 280000, 1, 280000, 'Toko', '2023-07-10 12:17:43', 'Ordered', 9),
(42, 'Sania Royale Cooking Oil 2 LT', 48000, 7, 336000, 'Transfer', '2023-07-12 05:02:38', 'Ordered', 9),
(43, 'Sania Royale Cooking Oil 2 LT', 48000, 1, 48000, 'Toko', '2023-07-12 05:05:05', 'Ordered', 9),
(44, 'Tabung Gas LPG 3kg', 180000, 1, 180000, 'Transfer', '2023-07-12 05:05:27', 'Ordered', 9),
(45, 'Tropical 2x Penyaringan 2 LT', 37000, 5, 185000, 'Transfer', '2023-07-12 05:06:03', 'Ordered', 9),
(46, 'Tropical 2x Penyaringan 2 LT', 37000, 5, 185000, 'COD', '2023-07-12 05:06:08', 'Ordered', 9),
(47, 'A&W Slim 250ml 24klg', 130000, 1, 130000, 'Toko', '2023-07-12 05:08:25', 'Ordered', 9),
(48, 'Tabung Gas LPG 3kg', 180000, 1, 180000, 'Transfer', '2023-07-12 05:10:14', 'Ordered', 6),
(49, 'Tabung Gas LPG 3kg', 180000, 1, 180000, 'Transfer', '2023-07-17 02:09:56', 'Ordered', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id` int(10) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `supplier_contact` varchar(20) NOT NULL,
  `id_item` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`id`, `supplier`, `supplier_contact`, `id_item`, `title`, `qty`, `price`, `total`) VALUES
(15, 'PT Aneka Makmur Sejahtera', '085252536089', 10, 'Tropical 2x Penyaringan 2 LT', 20, 20000, 400000),
(16, 'PT Papasari', '085252534738', 7, 'Coca-cola Slim 250ml 24klg', 30, 140000, 4200000),
(17, 'PT Singaraja', '08987533182', 13, 'Beras Gentong Rejeki 5kg', 20, 50000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(7, 'Coca-cola Slim 250ml 24klg', 'Coca-Cola adalah minuman bersoda dengan rasa manis, segar, dan bergelembung yang menggoda lidah.\r\n\r\nVarian rasa : Regular\r\n1 Dus 24 Kaleng\r\n', 130000, 'Item-Name-7983.jpg', 28, 'No', 'Yes'),
(8, 'A&W Slim 250ml 24klg', 'A&W adalah minuman berkarbonasi dengan rasa unik yang kaya akan aroma khas root beer yang manis, sedikit rempah-rempah, dan menyegarkan.\r\n\r\n1 Dus 24 Kaleng', 130000, 'Item-Name-4084.png', 28, 'Yes', 'Yes'),
(9, 'Sania Royale Cooking Oil 2 LT', 'Kombinasi antara minyak kelapa sawit, minyak kelapa, dan VCO (Virgin Coconut Oil).Memiliki tingkat kestabilan yang tinggi saat dipanaskan.\r\n\r\nSertifikat : Halal\r\n\r\n', 48000, 'Item-Name-9893.png', 29, 'Yes', 'Yes'),
(10, 'Tropical 2x Penyaringan 2 LT', 'Minyak goreng Tropical terbuat dari kelapa sawit pilihan yang diproses dengan dua kali penyaringan sehingga menghasilkan asam lemak tak jenuh.', 37000, 'Item-Name-5694.png', 29, 'Yes', 'Yes'),
(11, 'Tabung Gas LPG 3kg', 'Tabung gas LPG 3kg plus isi (BUKAN tabung kosong). Penggunaan gas minyak cair adalah sebagai bahan bakar alat dapur (terutama kompor gas).', 180000, 'Item-Name-6034.png', 30, 'Yes', 'Yes'),
(12, 'Tabung Gas LPG 3kg Kosong', 'Tabung gas LPG 3kg tanpa isi (tabung kosong). Penggunaan gas minyak cair adalah sebagai bahan bakar alat dapur (terutama kompor gas).', 165000, 'Item-Name-5888.png', 30, 'No', 'Yes'),
(13, 'Beras Gentong Rejeki 5kg', 'Gentong Rejeki Beras 5kg Adalah Beras Yang Tidak Memakai Pemutih, Pengawet Dan Tidak Pakai Pewangi.  Tekstur yang lembut dan pulen setelah dimasak.\r\n', 70000, 'Item-Name-7003.png', 33, 'No', 'Yes'),
(16, 'Tepung Beras Rose Brand 500gr', 'Rose Brand Tepung Beras adalah tepung yang dibuat dari beras terbaik diproses secara higenis, sangat cocok untuk membuat semua jenis kue kue tradisional.', 8000, 'Item-Name-2013.png', 34, 'Yes', 'Yes'),
(17, 'Beras Hoki 20kg', 'Beras merek \"Hoki\" 20kg adalah beras berkualitas tinggi dengan butiran besar, bersih, dan tidak rusak. Beras dengan kualitas bagus dengan harga terjangkau', 280000, 'Item-Name-2779.png', 33, 'No', 'Yes'),
(18, 'Greensands Slim 250ml 24klg', 'Greensands adalah minuman soft drink yang memiliki banyak keunikan rasa yang berkarakter dan segar.\r\nNon Alcohol.\r\nVarian rasa : Regular 1 Dus 24 Kaleng', 130000, 'Item-Name-9079.png', 28, 'Yes', 'Yes'),
(20, 'Tepung Bungasari Bola Salju 1kg', 'BOLA SALJU adalah tepung terigu serbaguna yang sempurna bagi mereka yang suka membuat berbagai jenis hidangan berbasis gandum.', 13000, 'Item-Name-1223.png', 34, 'No', 'Yes'),
(21, 'Pondan Tepung Roti Coklat 400gr', 'Pondan merupakan tepung untuk pembuatan kue cake instan dengan menggunakan tepung ini membuat cake sangatlah praktis.', 40000, 'Item-Name-1034.png', 34, 'No', 'Yes'),
(22, 'Maspion Teko Bunyi National 20cm', 'Maspion ini merupakan produk yang anti-karat, anti-gores dan sangat mudah untuk dibersihkan. Teko ini dapat menghantarkan panas dengan cepat. ', 150000, 'Item-Name-6618.png', 37, 'No', 'Yes'),
(23, 'Maspion Panci Bronita 22cm', 'Terbuat dari MASPION Aluminium yang telah melalui proses anodize. Membuat aluminium lebih tahan lama, aman untuk makanan dan mudah dibersihkan.', 160000, 'Item-Name-1423.png', 37, 'No', 'Yes'),
(24, 'Marjan Sirup Melon 460ml', 'Rasa melon yang segar membuatnya cocok untuk dinikmati dalam minuman dingin, seperti es teh, koktail buah, mocktail, atau dalam campuran minuman lain sesuai selera Anda.', 22000, 'Item-Name-9546.png', 28, 'Yes', 'Yes'),
(25, 'Marjan Sirup Rosen 460ml', 'Boudoin Rosen merupakan istilah yang mengacu pada perpaduan rasa yang khas, mencakup campuran buah atau bunga tertentu yang memberikan karakteristik unik pada sirup.', 22000, 'Item-Name-4359.png', 28, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `id_customer`, `order_date`, `total`, `status`) VALUES
(39, 6, '2023-07-10 11:49:48', 520000, 'Selesai'),
(40, 7, '2023-07-10 11:50:35', 48000, 'Ordered'),
(41, 9, '2023-07-10 12:17:43', 280000, 'Ordered'),
(42, 9, '2023-07-12 05:02:38', 336000, 'Ordered'),
(43, 9, '2023-07-12 05:05:05', 48000, 'Ordered'),
(44, 9, '2023-07-12 05:05:27', 180000, 'Ordered'),
(45, 9, '2023-07-12 05:06:03', 185000, 'Ordered'),
(46, 9, '2023-07-12 05:06:08', 185000, 'Ordered'),
(47, 9, '2023-07-12 05:08:25', 130000, 'Ordered'),
(48, 6, '2023-07-12 05:10:14', 180000, 'Ordered'),
(49, 6, '2023-07-17 02:09:56', 180000, 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id` int(10) NOT NULL,
  `id_item` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id`, `id_item`, `qty`, `total`) VALUES
(15, 10, 20, 400000),
(16, 7, 30, 4200000),
(17, 13, 20, 1000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
