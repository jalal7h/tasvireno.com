-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 01:25 AM
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
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'شرح توضیحات',
  `kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی ',
  `parent` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `hide` int(1) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `desc`, `kw`, `parent`, `cat`, `ord`, `logo`, `hide`, `flag`) VALUES
(1, 'نوشت ابزار', '', '', 0, 'cat', 0, 'data/cat/cat/0-1464437130-25765718515731697455.jpg', 0, 1),
(2, 'کلاه', '', '', 0, 'cat', 0, 'data/cat/cat/0-1464721314-201512912543923a.jpg', 0, 1),
(3, 'فلش مموری', '', '', 0, 'cat', 0, 'data/cat/cat/0-1464721330-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 0, 1),
(4, 'فلاسک', '', '', 0, 'cat', 0, 'data/cat/cat/0-1464076265-3521211100-01-w.jpg', 0, 1),
(5, 'زمینه1', '', '', 0, 'field', 0, '', 0, 1),
(6, 'زمینه2', '', '', 0, 'field', 0, '', 0, 1),
(7, 'پشمی', '', '', 1, 'cat', 0, '', 1, 1),
(8, 'برند1', '', '', 0, 'brand', 0, 'data/cat/brand/0-1463991980-us-basic2.jpg', 0, 1),
(9, 'برند2', '', '', 0, 'brand', 0, 'data/cat/brand/0-1463991991-marksman2.jpg', 0, 1),
(10, 'قوری', '', '', 0, 'cat', 0, 'data/cat/cat/0-1464437687-SHF7570.jpg', 0, 1),
(11, 'قوری دوتایی', '', '', 10, 'cat', 0, 'data/cat/cat/0-1464076821-falez-sarayli-black-2.jpg', 0, 1),
(12, 'قابلمه', '', '', 0, 'cat', 0, 'data/cat/cat/0-1464437832-P_68774DC_1_4AC3D400.jpg', 0, 1),
(13, 'قوری مسی', '', '', 10, 'cat', 0, 'data/cat/cat/0-1464175837-coinsgold_92413-5426421.jpg', 0, 1),
(14, 'سونی', '', '', 3, 'cat', 0, 'data/cat/cat/0-1464260449-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 0, 1),
(15, 'ترنس', '', '', 3, 'cat', 0, 'data/cat/cat/0-1464260464-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 0, 1),
(16, 'قوری شیشه ای', '', '', 10, 'cat', 0, 'data/cat/cat/0-1464347584-images1.jpg', 0, 1),
(17, 'مداد', '', '', 1, 'cat', 0, 'data/cat/cat/0-1464437197-25765718515731697455.jpg', 0, 1),
(18, 'مداد نوکی', '', '', 1, 'cat', 0, 'data/cat/cat/0-1464437215-product97758157237cf36e.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام کاربر',
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ایمیل کاربر',
  `cell` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'شماره همراه',
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'مقصد',
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان پیام',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیام',
  `date` int(11) NOT NULL COMMENT 'زمان',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linkify`
--

CREATE TABLE `linkify` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان پیوند',
  `url` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس پیوند',
  `pic` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `flag` int(11) NOT NULL COMMENT 'وضعیت',
  `prio` int(11) NOT NULL COMMENT 'موقعیت',
  `parent` int(11) NOT NULL COMMENT 'معرف',
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'موقعیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `linkify`
--

INSERT INTO `linkify` (`id`, `name`, `url`, `pic`, `flag`, `prio`, `parent`, `cat`) VALUES
(2, 'هدایا', './', '', 1, 1, 0, 'header'),
(3, 'ارتباط با ما', './contact', '', 1, 7, 0, 'header'),
(4, 'درباره ما', './about', '', 1, 6, 0, 'header'),
(5, 'برند', './?page=102&brands=1', '', 1, 2, 0, 'header'),
(6, 'زمینه', './', '', 1, 3, 0, 'header'),
(7, 'کاتالوگ', './Catalog', '', 1, 4, 0, 'header'),
(8, 'خدمات', './services', '', 1, 5, 0, 'header');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='ایمیل های خبرنانه';

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'شناسه سفارش',
  `product_id` int(11) NOT NULL COMMENT 'شناسه کالا',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام ',
  `company` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام شرکت',
  `tell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'تلفن',
  `cell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'همراه',
  `number` bigint(20) NOT NULL COMMENT 'تعداد',
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  `details` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `date_created` int(11) NOT NULL COMMENT 'تاریخ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `name`, `company`, `tell`, `cell`, `number`, `email`, `details`, `date_created`) VALUES
(4, 7, 'meysam', 'sam', '01143140758', '09119026756', 9118979803, 'taghipoor.meysam@gmail.com', '000', 1464107614),
(5, 10, 'ابرام', 'zX', '01143140758', '09119026756', 55, 'mtaghipoor13@gmail.com', '555555555', 1464125303),
(6, 7, 'meysam', '55', '55', '55', 9118979803, 'taghipoor.meysam@gmail.com', '5555', 1464125394),
(8, 10, 'meysam', 'sam', '01143140758', '09119026756', 21222222, 'taghipoor.meysam@gmail.com', 'خریدارم', 1464208394),
(17, 14, 'ttt', 'tt', '44', '44', 44, 'taghipoor.meysam@gmail.com', '44', 1464597620),
(18, 10, 'meysam', 'sam', '01143140758', '33333', 33, 'mtaghipoor13@gmail.com', '333', 1464605251),
(19, 10, 'meysam', 'sam', '01143140758', '0911', 21222222, 'mtaghipoor13@gmail.com', 'خریدارم', 1464606068),
(20, 10, 'meysam', 'asas', '01143140758', '33', 9118979803, 'mtaghipoor13@gmail.com', '3333', 1464606325),
(21, 11, 'meysam', 'sam', '01143140758', '222222', 2222, 'taghipoor.meysam@gmail.com', '2222', 1465169043);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `meta_title` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان صفحه',
  `meta_kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی',
  `meta_desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `meta_title`, `meta_kw`, `meta_desc`) VALUES
(1, 'صفحه اصلی', '', '', ''),
(3, 'درباره ما', '', '', ''),
(4, 'راهنمای سایت', '', '', ''),
(5, 'آموزش', '', '', ''),
(6, 'قوانین و مقرارت', '', '', ''),
(7, 'ضوابط حفظ حریم خصوصی', '', '', ''),
(51, 'اخبار سایت', '', '', ''),
(52, 'نمایش خبر', '<?\r\necho news_meta( "title" );\r\n?>', '<?\r\necho news_meta( "kw" );\r\n?>', '<?\r\necho news_meta( "desc" );\r\n?>'),
(14, 'محیط کاربری', '', '', ''),
(58, 'ثبت نام', '', '', ''),
(59, 'ثبت نام #2', '', '', ''),
(60, 'ورود کاربر', '', '', ''),
(63, 'فراموشی کلمه عبور', '', '', ''),
(101, 'تماس با ما', '', '', ''),
(102, 'لیست کالا', '', '', ''),
(103, 'نمایش کالا', '', '', ''),
(104, 'سفارش کالا', '', '', ''),
(105, 'جستجو', '', '', ''),
(108, 'کاتالوگ', '', '', ''),
(109, 'خدمات', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_layer`
--

CREATE TABLE `page_layer` (
  `id` int(11) NOT NULL,
  `page_id` int(6) NOT NULL DEFAULT '0',
  `prio` int(6) NOT NULL DEFAULT '0',
  `func` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `type` varchar(25) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `data` text COLLATE utf8_persian_ci NOT NULL,
  `framed` int(6) NOT NULL DEFAULT '0',
  `flag` int(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `page_layer`
--

INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES
(1, 1, 2, 'post', 'HTML', 'صفحه اصلی', 'درحال آماده سازی ...', 1, 0),
(3, 3, 1, 'layout_post', 'PHP5', 'درباره ما', '<div class="block boxborder">\r\n<div class="blockhead boxborder">درباره ما</div>\r\n\r\n<div class="blocktext">\r\n<div class="block-html-content"><center class="tx1">این صفحه در حال طراحی میباشد</center></div>\r\n</div>\r\n\r\n<div class="blockfooter"> </div>\r\n</div>', 0, 1),
(4, 4, 1, 'post', 'HTML', 'راهنمای سایت', 'درحال آماده سازی ...', 1, 1),
(5, 5, 1, 'post', 'HTML', 'آموزش', 'درحال آماده سازی ...', 1, 1),
(6, 6, 1, 'post', 'HTML', 'قوانین و مقرارت', 'درحال آماده سازی ...', 1, 1),
(7, 7, 1, 'post', 'HTML', 'ضوابط حفظ حریم خصوصی', 'درحال آماده سازی ...', 1, 1),
(51, 51, 1, 'news_list', '', 'اخبار سایت', '', 1, 1),
(52, 52, 1, 'news_display', '', 'نمایش خبر', '', 1, 1),
(14, 14, 2, 'userpanel_desk', '', 'پنل کاربر', '', 1, 1),
(15, 14, 1, 'userpanel_menu', '', 'منوی کاربر', '', 1, 1),
(58, 58, 1, 'post', 'PHP5', 'ثبت نام', '<?\r\nusers_register_form();\r\n?>', 1, 1),
(59, 59, 1, 'post', 'PHP5', 'ثبت نام', '<?\r\nusers_register_do();\r\n?>', 1, 1),
(60, 60, 1, 'post', 'PHP5', 'ورود کاربر', '<?\r\nusers_login_form();\r\n?>', 1, 1),
(63, 63, 1, 'post', 'PHP5', 'فراموشی کلمه عبور', '<?\r\nusers_forgot_form();\r\n?>', 1, 1),
(101, 1, 4, 'brand_vw_list2', 'HTML', 'لیست بنر', '', 1, 1),
(102, 101, 1, 'contact_vw_form', 'HTML', 'تماس با ما', '', 1, 1),
(103, 1, 3, 'cat_vw_list', 'HTML', 'لیست هدایا', '', 1, 1),
(106, 102, 1, 'product_vw_list', 'HTML', 'لیست محصولات', '', 1, 1),
(105, 104, 1, 'order_form', 'HTML', 'فرم سفارش', '', 1, 1),
(107, 103, 1, 'product_vw_view', 'HTML', 'نمایش محصول', '', 1, 1),
(108, 105, 1, 'shearch', 'HTML', 'جستجو', '', 1, 1),
(109, 109, 1, 'layout_post', 'PHP5', 'کاتالوگ', '<div class="block boxborder">\r\n<div class="blockhead boxborder">خدمات</div>\r\n\r\n<div class="blocktext">\r\n<div class="block-html-content"><center class="tx1">این صفحه در حال طراحی میباشد</center></div>\r\n</div>\r\n\r\n<div class="blockfooter"> </div>\r\n</div>', 0, 1),
(110, 108, 1, 'layout_post', 'PHP5', 'کاتالوگ', '<div class="block boxborder">\r\n<div class="blockhead boxborder">کاتالوگ</div>\r\n\r\n<div class="blocktext">\r\n<div class="block-html-content"><center class="tx1">این صفحه در حال طراحی میباشد</center></div>\r\n</div>\r\n\r\n<div class="blockfooter"> </div>\r\n</div>', 0, 1);

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
  `photo_medium` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس متوسط ',
  `photos_large` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس بزرگ',
  `description` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `prio` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `field_id`, `brand_id`, `name`, `code`, `size`, `printing_Type`, `min_order`, `price`, `photo_medium`, `photos_large`, `description`, `prio`, `flag`) VALUES
(7, 17, 6, 9, 'وسیله نوشتن', 'sqjyv', '', 'لیزری , پلاستیک', 20, 1000, 'data/product_photo_medium/7/0-1464437330-500031-1_2.jpg', 'data/product_photos_large/7/0-1464437330-jootixir--1534426140.jpg', 'در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.در لغتنامه دهخدا در مورد لیوان آمده‌است: از کلمه ٔ «لوان گودوش» یعنی گاودوش لوان (لوان اسم دهکده‌ای از آذربایجان که در آنجا سفال نیک پزند) گرفته شده‌است. گیلاس. آب‌وند. آبخوری. کوزه ٔ نازک. آبخوری که در لیوان آذربایجان سازند و امروز تعمیم یافته و بر مطلق ظرف آبخوری که از سفال یا چینی یا بلور یا فلز سازند اطلاق می‌گردد.', 5, 0),
(10, 18, 5, 8, 'مدادنوکی 20', 'dhd377', '', 'لیزری , پلاستیک', 10, 2244, 'data/product_photo_medium/10/0-1464437411--0-5--0-3--UM.jpg', 'data/product_photos_large/10/0-1464437411-product97758157237cf36e.jpg', 'kkkkkkkkkk', 7, 1),
(11, 11, 5, 9, 'قوری', 'dhd377', '56', 'لیزری', 44, 70000, 'data/product_photo_medium/11/0-1464175966-201510411131922a.jpg', 'data/product_photos_large/11/0-1464175966-DSC_4384-600x600.jpg', 'قوری', 6, 1),
(12, 13, 6, 8, 'قوری2', '2dhd377', '56', 'لیزری , پلاستیک', 44, 333, 'data/product_photo_medium/12/0-1464249669-martinus-view-black.jpg', 'data/product_photos_large/12/0-1464176204-coinsgold_92413-5426421.jpg', 'قوری 2', 8, 1),
(13, 11, 6, 9, 'قوری3', 'sqjyv', '56', 'لیزری', 44, 444, 'data/product_photo_medium/13/0-1464249600-azarantik_90800-1367561.jpg', 'data/product_photos_large/13/0-1464249600-martinus-view-black.jpg', 'قوری ظرفی است لوله‌دار که برای دم کردن چای و دیگر نوشیدنی‌های گیاهی به کار می‌رود.[۱][۲][۳] معمولاً قوری‌ها یک در اصلی دارند که از بالا باز شده و از طریق این در، چای خشک یا چای کیسه‌ای و آب جوش به قوری افزوده می‌شود. علاوه بر آن قوری‌ها دارای دسته‌ای برای در کنار و یک لوله برای ریختن چای هستند. بعضی از قوری‌ها دارای یک سوراخ کوچک برای تنظیم فشار هوا و خروج بخار در قسمت فوقانی خود می‌باشند.', 11, 1),
(14, 11, 5, 8, 'قوری23', '33', '33', 'لیزری', 44, 333, 'data/product_photo_medium/14/0-1464249782-DSC_4384-600x600.jpg', 'data/product_photos_large/14/0-1464249782-azarantik_90800-1367561.jpg', '23', 9, 1),
(15, 14, 5, 9, 'فلش مموری1', 'sqjyv', '56', 'لیزری', 333, 444, 'data/product_photo_medium/15/0-1464260521-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 'data/product_photos_large/15/0-1464260521-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 'ففف', 10, 1),
(16, 15, 5, 9, 'فلش مموری ترنس', 'sqjyv', '30gb', 'لیزری', 333, 444, 'data/product_photo_medium/16/0-1464260751-160697_0a0dc.jpg', 'data/product_photos_large/16/0-1464260751-160697_0a0dc.jpg', 'ترنس', 12, 1),
(20, 16, 5, 9, 'قوری شیشه ای', 'dhd377', '', 'لیزری', 44, 444, 'data/product_photo_medium/20/0-1464347709-D982D988D8B1DB8C-D9BEDB8CD8B1DAA9D8B3-1000.jpg', 'data/product_photos_large/20/0-1464347709-D982D988D8B1DB8C-D9BEDB8CD8B1DAA9D8B3-10001.jpg', '', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام ',
  `image` text COLLATE utf8_persian_ci NOT NULL COMMENT 'تصویر',
  `description` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `prio` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `image`, `description`, `prio`, `flag`) VALUES
(1, 'meysam', 'data/project_image/1/0-1464970164-25765718515731697455.jpg', 'میثم\r\nتقی پور\r\n20', 1, 1),
(2, 'ابی', 'data/project_image/2/0-1464970795-Akbar-1-420x330.jpg', 'ابرام', 2, 1),
(3, 'AMIRFAZEL', 'data/project_image/3/0-1464972596-T2CxxoXu8aXXXXXXXX_8861966031.jpg', 'AMIRFAZEL WEB DIESIGN', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`slug`, `name`, `text`, `component`) VALUES
('contact_tell', 'شماره ثابت', '(21) 22334433', ''),
('contact_cell', 'شماره همراه', '(+98) 9127766554', ''),
('contact_fax', 'شماره فکس', '(21) 22332211', ''),
('contact_address', 'آدرس دفتر', ' ستارخان، برق آلستوم، مجتمع توحید', ''),
('contact_email_address_0', '', 'support@parsunix.com', ''),
('contact_email_address_1', '', 'info@parsunix.com', ''),
('tiny_title', 'نام سایت', 'تصویر نو', ''),
('main_title', 'عنوان سایت', 'سیستم مدیریت محتوا', ''),
('money_unit', 'واحد پولی', 'تومان', ''),
('template', 'قالب سایت', 'Default', ''),
('websitedescription', 'فعالیت سایت', 'مدیریت محتوا', ''),
('keywords', 'کلمات کلیدی', 'مدیریت,محتوا,نرم افزار', ''),
('html_footer_copyright', 'کپی رایت پایین سایت', 'کلیه حقوق وبسایت برای تصویر نو محفوظ است', ''),
('webstatus_main', 'وضعیت سایت', '1', ''),
('html_extra_tags', 'تگ های اضافی', '', ''),
('page', '', 'admin', ''),
('cp', '', 'setting_mg', ''),
('do', '', 'save', ''),
('func', '', 'setting_mg_main', ''),
('unsuccessful_attack', '', '4', ''),
('logo', 'لوگوی سایت', 'data/logo/0-1464688479-2479-logo2.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `texty`
--

CREATE TABLE `texty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان لاتین',
  `name_fa` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان فارسی',
  `title` varchar(1024) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان پیام',
  `content` text COLLATE utf8_persian_ci NOT NULL COMMENT 'محتوا'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `texty`
--

INSERT INTO `texty` (`id`, `name`, `name_fa`, `title`, `content`) VALUES
(1, 'users_register_do_msg', 'متن ایمیل تایید ثبت نام کاربر', '', 'ثبت نام در {main_title}\r\n::::\r\nسلام\r\n\r\nکاربر گرامی، {user_name} عزیز، \r\nحساب کاربری شما با موفقیت ایجاد شد\r\nاطلاعات حساب شما به شرح زیر است : \r\nنام کاربری:‌ {username}\r\nگذرواژه: {password}\r\n\r\nورود به سایت :‌\r\n{_URL}/login\r\n\r\nبا تشکر\r\n'),
(2, 'users_register_do_sms', 'متن پیامک تایید ثبت نام کاربر', '', 'کاربر گرامی خوش آمدید\r\nثبت نام با موفقیت انجام شد\r\nنام کاربری: {username}\r\nکلمه عبور: {password}\r\n'),
(3, 'admin_order_msg', 'متن ایمیل سفارش جدید به مدیر', '', 'ثبت سفارش کالا در {main_title}\r\n::::\r\nسلام\r\nثبت سفارش جدید توسط {user_name} در تاریخ{date} .\r\nبا تشکر'),
(4, 'user_order_msg', 'متن ایمیل سفارش کالا به خریدار', '', 'ثبت سفارش کالا در {main_title}\r\n::::\r\nسلام\r\n{user_name} عزیز، \r\nسفارش شما با موفقیت ارسال شد و در اسرع وقت به آن رسیدگی می شود.\r\nبا تشکر');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس ایمیل',
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '' COMMENT 'کلمه عبور',
  `permission` int(12) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام و نام خانوادگی',
  `tell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره تلفن',
  `cell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره موبایل',
  `wallet_credit` int(11) NOT NULL,
  `position_region_id` int(11) NOT NULL COMMENT 'موقعیت',
  `address` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس',
  `profile_pic` varchar(500) COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `im_a` int(11) NOT NULL COMMENT 'حرفه/شغل',
  `work_at` int(11) NOT NULL COMMENT 'محل کار',
  `gender` int(11) NOT NULL COMMENT 'جنسیت',
  `auth` text COLLATE utf8_persian_ci NOT NULL COMMENT 'اطلاعات ثبت نام مجازی'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`, `name`, `tell`, `cell`, `wallet_credit`, `position_region_id`, `address`, `profile_pic`, `im_a`, `work_at`, `gender`, `auth`) VALUES
(1, 'taghipoor.meysam@gmail.com', 'admin', 2, 'مدیریت سایت', '02166936950', '09127744129', 0, 0, '', '', 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linkify`
--
ALTER TABLE `linkify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_layer`
--
ALTER TABLE `page_layer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`slug`);

--
-- Indexes for table `texty`
--
ALTER TABLE `texty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `linkify`
--
ALTER TABLE `linkify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه';
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه سفارش', AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `page_layer`
--
ALTER TABLE `page_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `texty`
--
ALTER TABLE `texty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
