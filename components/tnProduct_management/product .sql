-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 11:55 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasvireno_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL COMMENT 'گروه محصول',
  `field_id` int(11) NOT NULL COMMENT 'زمینه محصول',
  `brand_id` int(11) NOT NULL COMMENT 'برند',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام محصول',
  `code` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'کد محصول',
  `size` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'سایز',
  `printing_Type` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نوع چاپ',
  `min_order` int(11) NOT NULL COMMENT 'حداقل سفارش',
  `price` int(11) NOT NULL COMMENT 'قیمت',
  `photo_small` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس کوچک',
  `photo_medium` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس متوسط ',
  `photos_large` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس بزرگ',
  `description` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `prio` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `field_id`, `brand_id`, `name`, `code`, `size`, `printing_Type`, `min_order`, `price`, `photo_small`, `photo_medium`, `photos_large`, `description`, `prio`, `flag`) VALUES
(7, 7, 6, 8, 'meysam', 'sqjyv', '56 بزرگ', 'لیزری , پلاستیک', 99, 800, 'data/product_photo_small/7/0-1463953082-us-basic.jpg', 'data/product_photo_medium/7/0-1463953082-20164294213--.jpg', 'data/product_photos_large/7/0-1463953082-64069_dv6-6000_2.jpg', 'در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.', 3, 1),
(8, 3, 5, 8, 'مرگ خاموش', 'opxkd', '56 بزرگ', 'لیزری , پلاستیک', 88, 3333, 'data/product_photo_small/8/0-1463953281-1.png', 'data/product_photo_medium/8/0-1463953281-184.jpg', 'data/product_photos_large/8/0-1463953281-16758-BigPic.jpg', 'در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--spi--
