-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 10:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retail_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 's@mail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Asus'),
(3, 'Dell'),
(4, 'Hp'),
(5, 'Lenevo'),
(6, 'Samsung'),
(7, 'GIGABYTE'),
(8, 'Microsoft'),
(9, 'Tp-Link'),
(10, 'Tenda'),
(11, 'LG'),
(12, 'Epson'),
(13, 'A4 Tech'),
(14, 'Razer'),
(15, 'Logitech'),
(16, 'Adata'),
(17, 'Transcend'),
(18, 'Rapoo'),
(19, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_address`, `quantity`) VALUES
(2, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Desktops'),
(2, 'Laptop'),
(3, 'Office Equipment'),
(4, 'Networking'),
(5, 'Software'),
(6, 'Accessories'),
(7, 'Ups'),
(8, 'Gadget');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_gender` varchar(100) NOT NULL,
  `customer_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_gender`, `customer_image`) VALUES
(1, '::1', 'Sagor Ahamed', 'sa@mail.com', '56789', 'BD', 'comilla', '	01767898765', 'Dhanmondi', 'Female', 'avatar-user-boy-389cd1eb1d503149-512x512.png'),
(2, '::1', 'wer', 'wer@mail.com', '2345', 'BD', 'Dhaka', '01688888888', 'dasdsadasd', 'Male', '2wr-00001-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_info`
--

CREATE TABLE `invoice_info` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `card_num` int(11) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_address` varchar(100) NOT NULL,
  `card_mm` int(11) NOT NULL,
  `card_yy` int(11) NOT NULL,
  `card_cvc` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `paid_via` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `product_names` text NOT NULL,
  `product_qtys` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_info`
--

INSERT INTO `invoice_info` (`id`, `customer_id`, `customer_ip`, `card_num`, `card_name`, `card_address`, `card_mm`, `card_yy`, `card_cvc`, `product_quantity`, `total_price`, `date`, `status`, `paid_via`, `phone`, `product_names`, `product_qtys`) VALUES
(8, 1, '::1', 0, '', '', 0, 0, 0, 1, 0, '2018/07/24', 'pending', 'Cash', '', '', ''),
(17, 2, '::1', 2147483647, 'Sagor Ahamed', 'Hazaribag', 8, 19, 150, 1, 633, '2018/07/24', 'pending', 'Card', '01688888888', '', ''),
(18, 1, '::1', 0, 'Sagor Ahamed', 'Dhanmondi', 0, 0, 0, 1, 633, '2018/07/24', 'pending', 'Cash', '	01767898765', '', ''),
(19, 1, '::1', 2147483647, 'Nabil Ahamed', 'asdas', 8, 19, 123, 1, 633, '2018/07/24', 'pending', 'Card', '	01767898765', '', ''),
(20, 1, '::1', 2147483647, 'Sam', 'asdas', 12, 12, 213, 1, 1265, '2018/07/24', 'pending', 'Card', '	01767898765', '', ''),
(21, 1, '::1', 0, 'Sagor Ahamed', 'Dhanmondi', 0, 0, 0, 1, 5750, '2018/07/24', 'pending', 'Cash', '	01767898765', '', ''),
(22, 1, '::1', 2147483647, 'Sagor Ahamed', 'Hazaribag', 8, 19, 150, 1, 3795, '2018/07/24', 'pending', 'Card', '	01767898765', '', ''),
(23, 1, '::1', 2147483647, 'sadasdasdasd', 'asdas', 8, 19, 150, 1, 19033, '2018/07/24', 'pending', 'Card', '	01767898765', '2,6,8', '1,1,1');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `customer_ip` int(11) NOT NULL,
  `customer_name` int(11) NOT NULL,
  `customer_email` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `customer_ip`, `customer_name`, `customer_email`, `subject`, `message`) VALUES
(1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(11) NOT NULL,
  `header_image` varchar(100) NOT NULL,
  `ads_cover_image` varchar(100) NOT NULL,
  `ads_center_image` varchar(100) NOT NULL,
  `slide_image_1` varchar(100) NOT NULL,
  `slide_image_2` varchar(100) NOT NULL,
  `slide_image_3` varchar(100) NOT NULL,
  `slide_image_4` varchar(100) NOT NULL,
  `slide_image_5` varchar(100) NOT NULL,
  `slide_image_6` varchar(100) NOT NULL,
  `slide_image_7` varchar(100) NOT NULL,
  `news_feed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `header_image`, `ads_cover_image`, `ads_center_image`, `slide_image_1`, `slide_image_2`, `slide_image_3`, `slide_image_4`, `slide_image_5`, `slide_image_6`, `slide_image_7`, `news_feed`) VALUES
(2, 'header.png', 'banner.gif', 'conter_ads.jpg', 's1.jpg', 's2.jpg', 's3.jpg', 's4.jpg', 's5.jpg', 's6.jpg', 's7.jpg', '*** 4 Gifts in i-Life Laptop. Get Free Pen drive, mouse, t-shirt and bag with laptop. See details about it in our Facebook page. ***');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_description`, `product_image`, `product_keyword`) VALUES
(1, 1, 4, 'HP ProOne 400 G3 All in One PC', 75500, 'Model - HP Pro One 400 G3\r\nProcessor - 7th Gen Intel Core i7 7700T\r\nProcessor Clock Speed - 2.9-3.8GHz\r\nCPU Cache - 8MB\r\nRAM - 8GB\r\nMax RAM Support - 32GB\r\nRAM Slot - 2\r\nHDD - 1TB', 'proone-400-g3-1_2.jpg', 'laptop, computer'),
(2, 8, 8, 'Microsoft Surface Dial (2WR-00001) ', 11000, 'Model - Microsoft Surface Dial\r\nType - Surface Dial\r\nConnectivity - Bluetooth', '2wr-00001-1.jpg', 'Gadget,  surface'),
(3, 1, 6, 'Samsung 21.5 Inch Curved', 9800, 'Model - Samsung C22F390FHW\r\nDisplay Size (Inch) - 21.5\"\r\nDisplay Resolution - 1920 x 1080\r\nContrast Ratio (TCR/DCR) - 3000:1\r\nVGA Port - 1\r\nHDMI Port - 1', 'samsung-c22f390fhw-1.jpg', 'Monitor , computer, tv'),
(4, 2, 3, 'Dell Inspiron 15-5567', 68000, 'Generation - 7th Gen\r\nProcessor - Intel Core i7 7500U\r\nProcessor Clock Speed - 2.70-3.50GHz\r\nDisplay Size - 15.6\"\r\nRAM - 8GB\r\nRAM Type - DDR4', 'inspiron-15-5567-bk-2_1.jpg', 'laptop, computer, pc'),
(5, 1, 17, 'Transcend JetRAM 4GB DDR4', 3900, 'Model - Transcend JetRAM\r\nCapacity(MB) - 4GB\r\nType - DDR4\r\nPart No - JM2400HLH-4G', 'jm2400hlh-4g.jpg', 'Ram , computer'),
(6, 1, 15, 'Logitech K120', 550, 'Model - Logitech K120 ENU AP\r\nType - USB Keyboard\r\nInterface - USB', 'k120-1.jpg', 'laptop, computer, keyboard'),
(7, 1, 13, 'A4 Tech G3-280N', 550, 'Model - A4 Tech G3-280N\r\nType - Wireless Mouse\r\nConnectivity - Wireless', 'g3-280n-2.jpg', 'laptop, computer, mouse'),
(8, 1, 7, 'Gigabyte GA-H81M-DS2', 5000, 'Model - Gigabyte GA-H81M-DS2\r\nCPU Sockets - LGA1150\r\nChipset - Intel H81 Express Chipset\r\nMemory Channel - Dual\r\nGraphic - Intel HD Graphics\r\nAudio Chipset - Realtek ALC887', 'ga-h81m-ds2-2.jpg', 'Motherboard, computer'),
(9, 2, 16, 'A Data HV300', 5000, 'Brand - A Data\r\nModel - A Data HV300\r\nStorage - 1TB\r\nType - Slim External HDD\r\nInterface - USB 3.1', 'hv300-3.jpg', 'laptop, computer, external, hdd');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amnt_of_total_qty` int(11) NOT NULL,
  `total_qty_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_info`
--
ALTER TABLE `invoice_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_info`
--
ALTER TABLE `invoice_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
