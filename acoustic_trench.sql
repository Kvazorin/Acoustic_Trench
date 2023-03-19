-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 09:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acoustic_trench`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `title`, `slug`, `content`, `img`) VALUES
(1, 'CORT AD810M Акустическая гитара', 'cort-ad810m-akusticeskaya-gitara', 'Описание гитары CORT AD810M Акустическая гитара', '1.jpg'),
(2, 'Crafter D6/N Акустическая гитара', 'crafter-d6n-akusticeskaya-gitara', 'Описание гитары Crafter D6/N Акустическая гитара', '2.jpg'),
(3, 'Crafter D7/N Акустическая гитара', 'crafter-d7n-akusticeskaya-gitara', 'Описание гитары Crafter D7/N Акустическая гитара', '3.jpg'),
(4, 'Crafter D8/N Акустическая гитара', 'crafter-d8n-akusticeskaya-gitara', 'Описание гитары Crafter D8/N Акустическая гитара', '4.jpg'),
(5, 'Crafter D8/TS Акустическая гитара', 'crafter-d8ts-akusticeskaya-gitara', 'Описание гитары Crafter D8/TS Акустическая гитара', '5.jpg'),
(6, 'Crafter GA30/N Акустическая гитара', 'crafter-ga30n-akusticeskaya-gitara', 'Описание гитары Crafter GA30/N Акустическая гитара', '6.jpg'),
(7, 'Crafter GA45/N Акустическая гитара', 'crafter-ga45n-akusticeskaya-gitara', 'Описание гитары', '7.jpg'),
(8, 'CRAFTER GA6/N Акустическая гитара', 'crafter-ga6n-akusticeskaya-gitara', 'Описание гитары CRAFTER GA6/N Акустическая гитара', '8.jpg'),
(9, 'CRAFTER GA7/N акустическая гитара', 'crafter-ga7n-akusticeskaya-gitara', 'Описание гитары CRAFTER GA7/N акустическая гитара', '9.jpg'),
(10, 'CRAFTER GA8/BK акустическая гитара', 'crafter-ga8bk-akusticeskaya-gitara', 'Описание гитары CRAFTER GA8/BK акустическая гитара', '10.jpg'),
(11, 'CRAFTER GA8/N Акустическая гитара', 'crafter-ga8n-akusticeskaya-gitara', 'Описание гитары CRAFTER GA8/N Акустическая гитара', '11.jpg'),
(12, 'Crafter HiLITE-T CD/N Акустическая гитара', 'crafter-hilite-t-cdn-akusticeskaya-gitara', 'Описание гитары Crafter HiLITE-T CD/N Акустическая гитара', '12.jpg'),
(13, 'Crafter J15/N акустическая гитара', 'crafter-j15n-akusticeskaya-gitara', 'Описание гитары Crafter J15/N акустическая гитара', '13.jpg'),
(14, 'CRAFTER J18/N акустическая гитара. джамбо', 'crafter-j18n-akusticeskaya-gitara', 'Описание гитары CRAFTER J18/N', '14.jpg'),
(15, 'Crafter LITE-D SP/N Акустическая гитара', 'crafter-lite-d-spn-akusticeskaya-gitara', 'Описание гитары Crafter LITE-D SP/N Акустическая гитара', '15.jpg'),
(16, 'Crafter MD-42/TR Акустическая гитара', 'crafter-md-42tr-akusticeskaya-gitara', 'Описание гитары Crafter MD-42/TR Акустическая гитара', '16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_price`
--

CREATE TABLE `products_price` (
  `id` bigint(20) NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `price` double DEFAULT NULL,
  `old_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_price`
--

INSERT INTO `products_price` (`id`, `id_product`, `price`, `old_price`) VALUES
(1, 1, 2799, 0),
(2, 2, 12626, 0),
(3, 3, 13338, 0),
(4, 4, 13794, 0),
(5, 5, 14165, 0),
(6, 6, 22059, 0),
(7, 7, 27075, 39000),
(8, 8, 12654, 0),
(9, 9, 13367, 0),
(10, 10, 13794, 15290),
(11, 11, 13794, 0),
(12, 12, 10175, 0),
(13, 13, 16743, 0),
(14, 14, 18271, 0),
(15, 15, 10545, 0),
(16, 16, 9006, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_status`
--

CREATE TABLE `products_status` (
  `id` bigint(20) NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `hit` tinyint(3) NOT NULL,
  `sale` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_status`
--

INSERT INTO `products_status` (`id`, `id_product`, `hit`, `sale`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 1, 1),
(6, 6, 0, 1),
(7, 7, 1, 1),
(8, 8, 1, 0),
(9, 9, 0, 0),
(10, 10, 0, 0),
(11, 11, 0, 0),
(12, 12, 0, 0),
(13, 13, 0, 0),
(14, 14, 0, 1),
(15, 15, 0, 0),
(16, 16, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(7, 'Vasily', '$2y$10$5VSuiEa5nCiUvUXO3dWpgODrlJMBMKy/p394TidTLp8SctofLnJsC', 'povaroww@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products_price`
--
ALTER TABLE `products_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products_status`
--
ALTER TABLE `products_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_price`
--
ALTER TABLE `products_price`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_status`
--
ALTER TABLE `products_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_price`
--
ALTER TABLE `products_price`
  ADD CONSTRAINT `products_price_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_status`
--
ALTER TABLE `products_status`
  ADD CONSTRAINT `products_status_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
