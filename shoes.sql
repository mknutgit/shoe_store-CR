--
-- Database: `shoes`
--
CREATE DATABASE IF NOT EXISTS `shoes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shoes`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(6, 'Nike'),
(7, 'Adidas'),
(8, 'Ecco'),
(9, 'I Travel');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`) VALUES
(22, 'Shoe Kingdom'),
(23, 'Rad Shoes Two'),
(24, 'Shoe Pimp'),
(25, 'Shoeless Wonders');

-- --------------------------------------------------------

--
-- Table structure for table `stores_brands`
--

CREATE TABLE `stores_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores_brands`
--

INSERT INTO `stores_brands` (`id`, `store_id`, `brand_id`) VALUES
(1, 24, 3),
(2, 23, 3),
(5, 22, 7),
(6, 23, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores_brands`
--
ALTER TABLE `stores_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `stores_brands`
--
ALTER TABLE `stores_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
