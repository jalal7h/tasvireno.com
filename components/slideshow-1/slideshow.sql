-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2016 at 12:52 PM
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
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `slide_id` int(11) NOT NULL COMMENT 'دسته اسلایدشو',
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `pic` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `name`, `slide_id`, `link`, `description`, `pic`) VALUES
(4, 'کاتالوگ محصول', 69, './project', 'کاتالوگ محصول', 'data/slideshow/0-1466236382-2314-eCat-Banner-Gifts-Cat.jpg'),
(3, 'کاتالوگ محصول', 69, './project', 'کاتالوگ محصول', 'data/slideshow/0-1466236261-3374-eCat-Banner-Clothing-Cat2016.jpg'),
(6, 'پروژه های انجام شده', 67, './project', 'پروژه انجام شده', 'data/slideshow/0-1466236632-3585-eCat-Banner-Clothing-Cat2016.jpg'),
(9, 'پروژه های انجام شده', 67, './project', 'پروژه انجام شده', 'data/slideshow/0-1466243483-9179-FeatureBanner-selfiesticks.jpg'),
(7, 'پروژه های انجام شده', 67, './project', 'پروژه انجام شده', 'data/slideshow/0-1466238527-1313-eCat-Banner-Gifts-Cat.jpg'),
(8, 'محصول جدید', 68, './project', 'محصول جدید', 'data/slideshow/0-1466238629-6632-eCat-Banner-Gifts-Cat.jpg'),
(10, 'کاتالوگ محصول', 69, './project', 'کاتالوگ محصول', 'data/slideshow/0-1466243664-4545-FeatureBanner-selfiesticks.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
