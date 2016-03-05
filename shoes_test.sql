--
-- Database: `shoes_test`
--
CREATE DATABASE IF NOT EXISTS `shoes_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shoes_test`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 71, 94),
(2, 79, 95),
(3, 2, 3),
(4, 87, 96),
(5, 95, 97),
(6, 103, 98),
(7, 104, 99),
(8, 104, 100),
(9, 112, 101),
(10, 120, 102),
(11, 144, 107),
(12, 144, 108),
(13, 152, 109),
(14, 153, 110),
(15, 153, 111),
(16, 161, 112),
(17, 162, 113),
(18, 162, 114),
(19, 115, 170),
(20, 116, 171),
(21, 117, 171),
(22, 118, 179),
(23, 119, 180),
(24, 120, 180),
(25, 129, 181),
(26, 130, 182),
(27, 130, 183),
(28, 131, 191),
(29, 132, 192),
(30, 133, 192),
(31, 134, 200),
(32, 135, 201),
(33, 136, 201),
(34, 145, 202),
(35, 146, 203),
(36, 146, 204),
(37, 147, 212),
(38, 148, 213),
(39, 149, 213),
(40, 158, 214),
(41, 159, 215),
(42, 159, 216),
(43, 160, 224),
(44, 161, 225),
(45, 162, 225),
(46, 173, 226),
(47, 174, 227),
(48, 174, 228),
(49, 175, 236),
(50, 176, 237),
(51, 177, 237),
(52, 188, 238),
(53, 189, 239),
(54, 189, 240),
(55, 190, 248),
(56, 191, 249),
(57, 192, 249),
(58, 203, 250),
(59, 204, 251),
(60, 204, 252),
(61, 205, 260),
(62, 206, 261),
(63, 207, 261),
(64, 218, 262),
(65, 219, 263),
(66, 219, 264);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `stores_brands`
--
ALTER TABLE `stores_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
