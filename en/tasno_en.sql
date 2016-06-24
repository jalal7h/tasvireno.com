-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2016 at 02:08 PM
-- Server version: 5.5.50-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tasno_en`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'شرح توضیحات',
  `kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی ',
  `parent` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `hide` int(1) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `desc`, `kw`, `parent`, `cat`, `ord`, `logo`, `hide`, `flag`) VALUES
(1, 'تشریفات', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465730636-tasrifat.jpg', 0, 1),
(2, 'Clothing', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465730974-poshak.jpg', 0, 1),
(3, 'هدایای الکترونیکی', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465731362-electronic.jpg', 0, 1),
(4, 'ماگ', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465731503-mug.jpg', 0, 1),
(5, 'هدایای مدیریتی', '', '', 0, 'field', 0, '', 0, 1),
(6, 'هدایای زنانه', '', '', 0, 'field', 0, '', 0, 1),
(7, 'پشمی', '', '', 1, 'cat', 0, '', 1, 1),
(8, 'Vision', '', '', 0, 'brand', 0, 'data/cat/brand/0-1465726598-logo.jpg', 0, 1),
(9, 'Vision Sport', '', '', 0, 'brand', 0, 'data/cat/brand/0-1465727513-logo2.jpg', 0, 1),
(10, 'ساک دستی', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465731651-bag.jpg', 0, 1),
(11, ' ساک دستی کاغذی', '', '', 10, 'cat', 0, 'data/cat/cat/0-1464076821-falez-sarayli-black-2.jpg', 0, 1),
(12, 'خودکار', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465731823-pen.jpg', 0, 1),
(13, 'ساک خرید پارچه ای', '', '', 10, 'cat', 0, 'data/cat/cat/0-1464175837-coinsgold_92413-5426421.jpg', 0, 1),
(14, 'فلش مموری', '', '', 3, 'cat', 0, 'data/cat/cat/0-1464260449-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 0, 1),
(15, 'هاب USB', '', '', 3, 'cat', 0, 'data/cat/cat/0-1464260464-316sony-flash-memory-16gb-usm16gn-itbazar-1.jpg', 0, 1),
(16, 'قوری شیشه ای', '', '', 10, 'cat', 0, 'data/cat/cat/0-1464347584-images1.jpg', 1, 1),
(17, 'پرچم', '', '', 1, 'cat', 0, 'data/cat/cat/0-1464437197-25765718515731697455.jpg', 0, 1),
(18, 'بج سینه', '', '', 1, 'cat', 0, 'data/cat/cat/0-1464437215-product97758157237cf36e.jpg', 0, 1),
(19, 'Fox', '', '', 0, 'brand', 0, 'data/cat/brand/0-1465727662-logo.jpg', 0, 1),
(20, 'maxema', '', '', 0, 'brand', 0, 'data/cat/brand/0-1465727695-logo.jpg', 0, 1),
(21, 'VOGUE', '', '', 0, 'brand', 0, 'data/cat/brand/0-1465727953-logo2.jpg', 0, 1),
(22, 'هدایای مدیریتی', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465731929-managment.jpg', 0, 1),
(23, 'هدایای گوناگون', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465732070-gifts.jpg', 0, 1),
(24, 'پیکسل', '', '', 1, 'cat', 0, '', 0, 1),
(25, 'بند آویز', '', '', 1, 'cat', 0, '', 0, 1),
(26, 'گیره کمری', '', '', 1, 'cat', 0, '', 0, 1),
(27, 'محافظ کارت', '', '', 1, 'cat', 0, '', 0, 1),
(28, 'جاکارتی', '', '', 1, 'cat', 0, '', 0, 1),
(29, 'Hat', '', '', 2, 'cat', 0, '', 0, 1),
(30, 'T-Shirt', '', '', 2, 'cat', 0, '', 0, 1),
(31, 'Shirt', '', '', 2, 'cat', 0, '', 0, 1),
(32, 'Scarf', '', '', 2, 'cat', 0, '', 0, 1),
(33, 'Uniforms', '', '', 2, 'cat', 0, '', 0, 1),
(34, 'بانک شارژ', '', '', 3, 'cat', 0, '', 0, 1),
(35, 'اسپیکر ', '', '', 3, 'cat', 0, '', 0, 1),
(36, 'چراغ قوه', '', '', 3, 'cat', 0, '', 0, 1),
(37, 'ماگ سرامیکی', '', '', 4, 'cat', 0, '', 0, 1),
(38, 'لیوان کاغذی', '', '', 4, 'cat', 0, '', 0, 1),
(39, 'لیوان بلور', '', '', 4, 'cat', 0, '', 0, 1),
(40, 'ماگ پلاستیکی', '', '', 4, 'cat', 0, '', 0, 1),
(41, 'نوشت افزار', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465732184-neveshtafzar.jpg', 0, 1),
(42, 'جاکلیدی', '', '', 0, 'cat', 0, 'data/cat/cat/0-1465732340-keyring.jpg', 0, 1),
(43, 'اتومبیل', '', '', 23, 'cat', 0, '', 0, 1),
(44, 'کامپیوتر', '', '', 23, 'cat', 0, '', 0, 1),
(45, 'پذیرایی', '', '', 23, 'cat', 0, '', 0, 1),
(46, 'dfgffdfdf', '', '', 0, 'brand', 0, '', 1, 1),
(47, 'test 01', '', '', 0, 'brand', 0, '', 1, 1),
(48, 'test 02', '', '', 0, 'brand', 0, '', 1, 1),
(49, 'test 0j', '', '', 0, 'brand', 0, '', 1, 1),
(50, 'jjkhhkhj', '', '', 0, 'brand', 0, '', 1, 1),
(51, 'oijiojio', '', '', 0, 'brand', 0, '', 1, 1),
(52, 'sdlfj', '', '', 0, 'brand', 0, '', 1, 1),
(53, 'هدایای مردانه', '', '', 0, 'field', 0, '', 0, 1),
(54, 'هدایای صنعتی', '', '', 0, 'field', 0, '', 0, 1),
(55, 'دانش اموز', '', '', 0, 'field', 0, '', 0, 1),
(56, 'خانگی', '', '', 0, 'field', 0, '', 0, 1),
(57, 'فصل گرم', '', '', 0, 'field', 0, '', 0, 1),
(58, 'فصل سرد', '', '', 0, 'field', 0, '', 0, 1),
(59, 'همایشات', '', '', 0, 'field', 0, '', 0, 1),
(60, 'مذهبی', '', '', 0, 'field', 0, '', 0, 1),
(61, 'اتومبیل', '', '', 0, 'field', 0, '', 0, 1),
(62, 'پزشکی', '', '', 0, 'field', 0, '', 0, 1),
(63, 'بهداشتی', '', '', 0, 'field', 0, '', 0, 1),
(64, 'منزل', '', '', 0, 'field', 0, '', 0, 1),
(65, 'کامپیوتر', '', '', 0, 'field', 0, '', 0, 1),
(67, 'پروژه های انجام شده', '', '', 0, 'slide', 0, '', 0, 1),
(68, 'محصول جدید', '', '', 0, 'slide', 0, '', 0, 1),
(69, 'کاتالوگ محصول', '', '', 0, 'slide', 0, '', 0, 1),
(70, '5 to 10 dollars', '', '', 0, 'price', 0, '', 0, 1),
(71, '10 to 20 dollars', '', '', 0, 'price', 0, '', 0, 1),
(72, '20 to 50 dollars', '', '', 0, 'price', 0, '', 0, 1),
(73, '50 to 100 dollars', '', '', 0, 'price', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام ',
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ایمیل',
  `cell_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'تلفن',
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'به',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیام',
  `date` int(11) NOT NULL COMMENT 'تاریخ',
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email_address`, `cell_number`, `to`, `content`, `date`, `hide`) VALUES
(1, 'meysam', 'taghipoor.meysam@gmail.com', '09119026756', 'info@tasvireno.com', 'd', 1466535186, 0),
(2, 'meysam', 'taghipoor.meysam@gmail.com', '09119026756', 'info@tasvireno.com', 'd', 1466535255, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `name`, `text`) VALUES
(1, 'اشتراک و عضویت در سایت چه تفاوت‌هایی با یکدیگر دارد؟', 'اشتراک در سایت امکان دریافت پیشنهادی روزانه را از طریق پست الکترونیک فراهم می‌کند. در حالی که با عضویت در سایت حساب مجزایی برای شخص شما روی وب‌سایت تعریف می‌شود که برای خرید یک نت برگ الزامی است.'),
(2, 'چگونه می‌توان از خدمات و محصولات به‌صورت مرتب و روزانه خبردار شد؟', 'کافی است در قسمت اشتراک سایت، ایمیل خود به همراه نام شهر یا شهرهای مورد‌نظر را وارد کنید تا از طریق سایت برای شما اشتراک ایجاد و تمام پیشنهادات روزانه به ایمیل شما فرستاده شود.'),
(3, 'امروز را دوست دارم. چگونه باید آن راخریداری کنم؟', 'کافی است فقط روی دکمه خرید کلیک کنید. اگر تا‌کنون عضو سایت نشده‌اید، مراحل عضویت را پشت سر گذاشته و با استفاده از کارت بانکی خود به‌صورت آنلاین پرداخت را انجام دهید. چنانچه کارت بانکی در اختیار ندارید با انتخاب گزینه پرداخت در محل، آدرس و شماره تماس خود را وارد نموده و منتظر تماس از طرف باشید. پس از تماس، رسید خرید خود را درب منزل دریافت کنید. در این حالت  خریداری شده به‌صورت ایمیل برای شما ارسال می‌شود. با ارائه یک پرینت از فایل ارسالی توسط ایمیل و یا به همراه داشتن کدهای اختصاصی، می‌توانید به آسانی برای دریافت کالا یا خدمات خریداری شده اقدام کنید. در قسمتهای من در پروفایلتان اطلاعات خریداری شده قابل مشاهده است.');

-- --------------------------------------------------------

--
-- Table structure for table `linkify`
--

CREATE TABLE IF NOT EXISTS `linkify` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان پیوند',
  `url` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس پیوند',
  `pic` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `flag` int(11) NOT NULL COMMENT 'وضعیت',
  `prio` int(11) NOT NULL COMMENT 'موقعیت',
  `parent` int(11) NOT NULL COMMENT 'معرف',
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'موقعیت',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `linkify`
--

INSERT INTO `linkify` (`id`, `name`, `url`, `pic`, `flag`, `prio`, `parent`, `cat`) VALUES
(2, 'Gifts', './?page=102&cats=1', '', 1, 1, 0, 'header'),
(3, 'contact us', './contact', '', 1, 7, 0, 'header'),
(4, ' about us', './about', '', 1, 8, 0, 'header'),
(5, 'Brands', './?page=102&brands=1', '', 1, 2, 0, 'header'),
(6, 'Fields', './?page=102&fields=1', '', 1, 3, 0, 'header'),
(7, 'Catalog', './Catalog', '', 1, 4, 0, 'header'),
(8, 'Services', './services', '', 1, 5, 0, 'header'),
(9, 'Project', './project', '', 1, 6, 0, 'header');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='ایمیل های خبرنانه' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه سفارش',
  `product_id` int(11) NOT NULL COMMENT 'شناسه کالا',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'name',
  `company` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'Company Name',
  `tell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'Phone',
  `cell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'mobile',
  `number` bigint(20) NOT NULL COMMENT 'Order number',
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'email',
  `details` text COLLATE utf8_persian_ci NOT NULL COMMENT 'Description',
  `date_created` int(11) NOT NULL COMMENT 'Date',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `name`, `company`, `tell`, `cell`, `number`, `email`, `details`, `date_created`) VALUES
(1, 25, 'meysam', 'sam', '09119020000', '09119020000', 333, 'taghipoor.meysam@gmail.com', 'yes', 1466509414);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `meta_title` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان صفحه',
  `meta_kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی',
  `meta_desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=122 ;

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
(102, 'لیست کالا', '', '', ''),
(103, 'نمایش کالا', '', '', ''),
(104, 'سفارش کالا', '', '', ''),
(105, 'جستجو', '', '', ''),
(108, 'کاتالوگ', '', '', ''),
(109, 'خدمات', '', '', ''),
(111, 'لیست پروژه ها', '', '', ''),
(2, 'ارتباط با ما', '', '', ''),
(113, 'وبلاگ', '', '', ''),
(114, 'تصویر نو در اخبار', '', '', ''),
(115, 'تصویر نو چگونه کار میکند', '', '', ''),
(116, 'دریافت نمایندگی', '', '', ''),
(117, 'تصویر نو برای کسب و کار شما', '', '', ''),
(118, 'تماس با واحد پشتیبانی', '', '', ''),
(119, 'امور مشتریان', '', '', ''),
(120, 'راهنمای پرداخت آنلاین', '', '', ''),
(20, 'سوالات متداول', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_layer`
--

CREATE TABLE IF NOT EXISTS `page_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(6) NOT NULL DEFAULT '0',
  `prio` int(6) NOT NULL DEFAULT '0',
  `func` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `type` varchar(25) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `data` text COLLATE utf8_persian_ci NOT NULL,
  `framed` int(6) NOT NULL DEFAULT '0',
  `flag` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=123 ;

--
-- Dumping data for table `page_layer`
--

INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES
(3, 3, 1, 'layout_post', 'HTML', 'about us', '<div class="block boxborder"><strong><span style="font-family: Tahoma; font-size: 16px;">در سال 1385 با نام <span style="color: #ff3300;">آژانس تبلیغاتی تصویر نو</span> و با هدف تحول و رفع خلا موجود در بازار کشور شروع به فعالیت نمودیم تا بتوانیم با نگاهی تازه به صنعت تبلیغات گامی بلند در جهت پیشرفت ایران عزیزمان برداریم . باور داشتیم هنگامی که ریشه های همت آدمی در خاک تخصص آمیخته شده و آفتاب لطف پروردگار بر آن بتابد ، شاهد جوانه ای خواهیم بود که آینده ی یک درخت سبز و استوار را نوید می دهد.</span></strong></div>\r\n<div class="block boxborder"><strong> </strong></div>\r\n<div class="block boxborder">\r\n<div dir="rtl"><strong><span style="font-size: 16px;"><span style="font-family: Tahoma;">در کنار عرضه هدایای تبلیغاتی</span> <span style="font-family: Tahoma;">در سال 1389 توانستیم با همکاری شما عزیزان <span style="color: #ff3300;">چاپخانه هدایای تبلیغاتی</span></span></span><span style="font-size: 16px;"><span style="font-family: Tahoma;"> را در محیطی بسیار زیبا و کادری مجرب و متخصص راه اندازی نماییم تا علاوه بر رفع نیاز چاپ محصولات خود، پاسخگوی چاپ محصولات تبلیغاتی همکاران گرامی در سطح کشور نیز باشیم.</span></span> </strong></div>\r\n<div dir="rtl"><strong><span style="font-size: 16px;"> </span></strong></div>\r\n<div dir="rtl"><strong><span style="font-family: Tahoma; font-size: 15px;"><span style="font-family: Tahoma;"><span style="font-size: 16px;">در سال 1394 تصویر نو با استفاده از نیرو های متخصص توانست با اخذ نمایندگی از شرکت های خارجی و بالابردن توان تولیدی خود ، موفق به عرضه بیش از 200 عنوان محصول تبلیغی جدید در کشور شده و  خود را عنوان مرکز تخصصی هدایای تبلیغاتی کشور معرفی نمود.</span><br /></span></span></strong></div>\r\n<div dir="rtl"><strong><span style="font-family: Tahoma; font-size: 16px;"><span style="font-family: Tahoma;"> </span></span></strong></div>\r\n<div dir="rtl"><strong><span style="font-family: Tahoma; font-size: 16px;"><span style="font-family: Tahoma;">امروز به لطف خداوند آماده پذیرش کلیه سفارشات و پروژه های تبلیغاتی شرکت ها شامل طراحی ، تولید  ، واردات ،  پخش و یا اجرا می باشد.</span></span></strong></div>\r\n</div>', 1, 1),
(4, 4, 1, 'post', 'HTML', 'راهنمای سایت', 'درحال آماده سازی ...', 1, 1),
(5, 5, 1, 'post', 'HTML', 'آموزش', 'درحال آماده سازی ...', 1, 1),
(6, 6, 1, 'layout_post', 'PHP5', 'Rules and Regulations', '<div class="blocktext">\r\n<div class="block-html-content"><br /><br /><center class="tx1">This page is being designed</center><br /><br /></div>\r\n</div>\r\n', 1, 1),
(7, 7, 1, 'layout_post', 'PHP5', 'Privacy policy', '<div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div>', 1, 1),
(101, 1, 6, 'brand_vw_list2', 'HTML', 'لیست برندها', '', 1, 1),
(103, 1, 5, 'cat_vw_list', 'HTML', 'لیست هدایا', '', 1, 1),
(106, 102, 1, 'product_vw_list', 'HTML', 'لیست محصولات', '', 1, 1),
(105, 104, 1, 'order_form', 'HTML', 'فرم سفارش', '', 1, 1),
(107, 103, 1, 'product_vw_view', 'HTML', 'نمایش محصول', '', 1, 1),
(108, 105, 1, 'shearch', 'HTML', 'جستجو', '', 1, 1),
(109, 109, 1, 'layout_post', 'PHP5', 'services', '<div class="block-html-content"><center class="tx1">This page is being designed</center></div>\r\n', 1, 1),
(110, 108, 1, 'layout_post', 'PHP5', 'Catalog', '<div class="block-html-content"><center class="tx1">This page is being designed</center></div>\r\n', 1, 1),
(112, 111, 1, 'project_vw_list', 'HTML', 'لیست پروژه ها', '', 1, 1),
(2, 2, 1, 'contact_vw_form', '', 'ارتباط با ما', '', 1, 1),
(113, 1, 4, 'slide', 'HTML', 'اسلایدر', '', 1, 1),
(114, 113, 1, 'layout_post', 'PHP5', 'وبلاگ', '<p><div class="layout-post"><div class="header">blog</div><br /> <div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div><br /> <div class="blockfooter"></div><br /></div></p>', 0, 1),
(115, 114, 1, 'layout_post', 'PHP5', 'اخبار', '<div class="layout-post">\r\n	<div class="header">tasvireno In the News</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(116, 115, 1, 'layout_post', 'PHP5', 'روش کار', '<div class="layout-post">\r\n	<div class="header">tasvireno how it works</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(117, 116, 1, 'layout_post', 'PHP5', 'دریافت نمایندگی', '<div class="layout-post">\r\n	<div class="header">Get Agent</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(118, 117, 1, 'layout_post', 'PHP5', 'تصویر نو برای کسب و کار شما', '<div class="layout-post">\r\n	<div class="header">tasvireno For Your Business</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(119, 118, 1, 'layout_post', 'PHP5', 'تماس با واحد پشتیبانی', '<div class="layout-post">\r\n	<div class="header">Contact Support</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(120, 119, 1, 'layout_post', 'PHP5', 'امور مشتریان', '<div class="layout-post">\r\n	<div class="header">Customer service</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(121, 120, 1, 'layout_post', 'PHP5', 'راهنمای پرداخت آنلاین', '<div class="layout-post">\r\n	<div class="header">Online Payment Guide</div>\r\n	<div class="blocktext"><div class="block-html-content"><br><br><center class="tx1">This page is being designed</center><br><br></div></div>\r\n	<div class="blockfooter"></div>\r\n</div>', 0, 1),
(20, 20, 1, 'faq_display', '', 'common questions', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand_id`, `name`, `code`, `size`, `printing_Type`, `min_order`, `price`, `photo_medium`, `photos_large`, `description`, `prio`, `flag`) VALUES
(23, 9, 'T-shirts with short sleeves', '2705', 'M-L-XL-XXL', 'Digital, embroidery', 200, 71, 'data/product_photo_medium/23/0-1465805885-mardane-yaghe-gerd---s.jpg', 'data/product_photos_large/23/0-1465805453-mardaneyaghegerd.jpg', 'Mens round neck short sleeve t-shirt, can produce specific colors\r\nThe possibility of embroidery and printing color and size of your design without limits\r\nIn different sizes', 0, 1),
(24, 19, 'Advertising caps', '5474', 'Adult', 'Digital, embroidery', 200, 70, 'data/product_photo_medium/24/0-1465806427-cap--s.jpg', 'data/product_photos_large/24/0-1465806427-cap.jpg', 'Promotional caps masked, in different colors, linen, classy\r\nSize and color scheme you unrestricted access to printing and embroidery', 0, 1),
(25, 19, 'Advertising awnings', '5487', 'Adult', 'Digital, embroidery', 200, 70, 'data/product_photo_medium/25/0-1465806562-sayeban--s.jpg', 'data/product_photos_large/25/0-1465806562-sayeban.jpg', 'Womens shelters advertising, linen, in different colors\r\nYou can print your design without limits and Gadvzy size and color', 0, 1),
(26, 21, 'Promotional key chains', 'ws0022', '', 'Laser - Jelly', 200, 70, 'data/product_photo_medium/26/0-1465806927-WS0022.jpg', 'data/product_photos_large/26/0-1465806927-WS0022.jpg', '', 0, 1),
(27, 0, 'Pens', 'NEXT', '', 'Tampv', 200, 70, 'data/product_photo_medium/27/0-1465807279-nextc-s.jpg', 'data/product_photos_large/27/0-1465807279-nextc.jpg', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat_id`
--

CREATE TABLE IF NOT EXISTS `product_cat_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `product_id` int(11) NOT NULL COMMENT 'شناسه کالا',
  `cat_id` int(11) NOT NULL COMMENT 'دسته بندی',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `product_cat_id`
--

INSERT INTO `product_cat_id` (`id`, `product_id`, `cat_id`) VALUES
(1, 7, 17),
(2, 10, 18),
(3, 11, 11),
(4, 12, 13),
(5, 13, 11),
(6, 14, 11),
(7, 15, 14),
(8, 16, 15),
(9, 20, 16),
(10, 21, 13),
(11, 21, 0),
(12, 21, 0),
(13, 22, 16),
(14, 22, 0),
(15, 22, 0),
(16, 22, 0),
(17, 22, 0),
(18, 22, 0),
(19, 22, 0),
(20, 22, 16),
(21, 22, 0),
(22, 22, 0),
(23, 22, 0),
(24, 22, 0),
(25, 22, 0),
(26, 22, 0),
(27, 22, 16),
(28, 22, 0),
(29, 22, 0),
(30, 22, 0),
(31, 22, 0),
(32, 22, 0),
(33, 22, 0),
(34, 22, 16),
(35, 22, 0),
(36, 22, 0),
(37, 22, 0),
(38, 22, 0),
(39, 22, 0),
(40, 22, 0),
(41, 21, 13),
(42, 21, 0),
(43, 21, 0),
(44, 7, 14),
(45, 23, 30),
(46, 24, 29),
(47, 25, 29),
(48, 26, 42),
(49, 27, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product_field_id`
--

CREATE TABLE IF NOT EXISTS `product_field_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `product_id` int(11) NOT NULL COMMENT 'شناسه کالا',
  `field_id` int(11) NOT NULL COMMENT 'زمینه',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `product_field_id`
--

INSERT INTO `product_field_id` (`id`, `product_id`, `field_id`) VALUES
(1, 7, 6),
(2, 10, 5),
(3, 11, 5),
(4, 12, 6),
(5, 13, 6),
(6, 14, 5),
(7, 15, 5),
(8, 16, 5),
(9, 20, 5),
(10, 21, 5),
(11, 22, 5),
(12, 23, 53),
(13, 23, 54),
(14, 23, 56),
(15, 23, 57),
(16, 23, 0),
(17, 24, 53),
(18, 24, 6),
(19, 24, 55),
(20, 24, 54),
(21, 24, 57),
(22, 24, 0),
(23, 25, 6),
(24, 25, 55),
(25, 25, 57),
(26, 25, 0),
(27, 26, 53),
(28, 26, 55),
(29, 26, 0),
(30, 27, 53),
(31, 27, 55),
(32, 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام ',
  `image` text COLLATE utf8_persian_ci NOT NULL COMMENT 'تصویر',
  `description` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `prio` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `image`, `description`, `prio`, `flag`) VALUES
(12, 'ایرانسل', 'data/project_image/12/0-1465732914-1.jpg', 'توب فومی تبلیغاتی  ، به سفارش ایرانسل ، آبان ماه 1394', 0, 1),
(13, 'بانک ملت', 'data/project_image/13/0-1465733033-5.jpg', 'جاکلیدی چرم ، با جعبه اختصاصی ، به سفارش یاس ، خرداد 1390', 0, 1),
(14, 'جا یادداشتی', 'data/project_image/14/0-1465733189-6.jpg', 'جا یادداشتی ، به سفارش داتک ، اردیبهشت 1392', 0, 1),
(15, 'خودکار تبلیغاتی', 'data/project_image/15/0-1465733298-8.jpg', 'خودکار تبلیغاتی ، جعبه اختصاصی ، به سفارش پارس کامتل ، اردیبهشت 1390', 0, 1),
(16, 'جاکلیدی تبلیغاتی', 'data/project_image/16/0-1465733460-total2.jpg', 'جاکلیدی تبلیغاتی ، به سفارش توتال ، اسفند 1393', 0, 1),
(17, 'درب بازکن', 'data/project_image/17/0-1465733538-shams.jpg', 'درب بازکن بطری تبلیغاتی ، به سفارش کاسل توش ، اسفند 1394', 0, 1),
(18, 'پیکسل تبلیغاتی', 'data/project_image/18/0-1465733629-13.jpg', 'پیکسل تبلیغاتی ، به سفارش لگوی آموزشی ، بهمن 1391', 0, 1),
(19, 'تبشرت تبلیغاتی', 'data/project_image/19/0-1465733696-rightel3.jpg', 'تیشرت تبلیغاتی ، به سفارش رایتل ، شهریور 1393', 0, 1),
(20, 'بح سینه', 'data/project_image/20/0-1465733785-aval.jpg', 'بج سینه اختصاصی ، به سفارش خدمات اول مبین ، مرداد 1393', 0, 1),
(21, 'پد موس تبلیغاتی', 'data/project_image/21/0-1465733915-18.jpg', 'پد موس ، به سفارش کیش بهین ، فروردین 1391', 0, 1),
(22, 'کلاه تبلیغاتی', 'data/project_image/22/0-1465733999-butan.jpg', 'کلاه تبلیغاتی ، به سفارش بوتان ، اردیبهشت 1395', 0, 1),
(23, 'ملگ سرامیکی تبلیغاتی', 'data/project_image/23/0-1465734089-pishpish.jpg', 'ماگ سرامیکی ، به سفارش پیشگامان کویر یزد ، تیرماه 1393', 0, 1),
(24, 'بند آویز', 'data/project_image/24/0-1465734203-19.jpg', 'بند گردنی ، به سفارش گلدیران ، مهرماه 1391', 0, 1),
(25, 'پاور بانک تبلیغاتی', 'data/project_image/25/0-1465734298-total1.jpg', 'پاور بانک ، به سفارش توتال ، اردیبهشت 1394', 0, 1),
(26, 'ست تبلیغاتی', 'data/project_image/26/0-1465734435-4.jpg', 'ست جعبه چوبی تبلیغاتی ، به سفارش ایرانسل ، مهرماه 1391', 0, 1),
(27, 'پد موس تبلیغاتی', 'data/project_image/27/0-1465734489-15.jpg', 'پد موس تبلیغاتی ، به سقارش بانک ملت ، خرداد 1390', 0, 1),
(28, 'خودکار تبلیغاتی', 'data/project_image/28/0-1465734573-20.jpg', 'خودکار پلاستیکی تبلیغاتی ، به سفارش راد سیستم ، آذر 1391', 0, 1),
(29, 'ملگ سرامیکی تبلیغاتی', 'data/project_image/29/0-1465734674-21.jpg', 'ماگ سرامیکی ، به سفارش خیره بهنام دهش پور ،  تیر 1392', 0, 1),
(30, 'عروسک تبلیغاتی', 'data/project_image/30/0-1465734770-righteltoys.jpg', 'عروسک فومی ، به سفارش رایتل ، خانواده دکا ، 1394', 0, 1),
(31, 'بند پرسنلی', 'data/project_image/31/0-1465734857-renult.jpg', 'بند آویز پرسنل ، به سفارش رنو پارس ، مرداد 1393', 0, 1),
(32, 'آفتابگیر تبلیغاتی', 'data/project_image/32/0-1465734967-rightelsunshade.jpg', 'آفتابگیر اتومبیل ، به سفارش رایتل ، تیر 1394', 0, 1),
(33, 'پد موس طبی تبلیغاتی', 'data/project_image/33/0-1465735051-mellatchap.jpg', 'پد موس طبی ، به سفارش چاپخانه بانک ملت ، اسفند 1393', 0, 1),
(34, 'لیوان تبلیغاتی', 'data/project_image/34/0-1465735175-nak2.jpg', 'لیوان یخی بلور ، به سفارش نقش اول ، بهمن 1394', 0, 1),
(35, 'فولدر تبلیغاتی', 'data/project_image/35/0-1465735243-kelasor.jpg', 'کلاسور تبلیغاتی اختصاصی ، به سفارش ایرانسل ، تیرماه 1394', 0, 1),
(36, 'پد موس تبلیغاتی', 'data/project_image/36/0-1465735319-16.jpg', 'موس پد تبلیغاتی ، به سفارش بانک انصار ، فروردین 1392', 0, 1),
(37, 'بند گردنی', 'data/project_image/37/0-1465735398-2.jpg', 'بند و محافط کارت ، سفارش شرکت ایرانسل ، مرداد 1393', 0, 1),
(38, 'پیکسل تبلیغاتی', 'data/project_image/38/0-1465735897-14.jpg', 'پیکسل تبلیغاتی ، به سفارش رستوران البیک ، 1393', 0, 1),
(39, 'پد موس تبلیغاتی', 'data/project_image/39/0-1465735854-17.jpg', 'پد موس پارچه ای ، به سفارش موسسه علوم و فنون کیش ، 1390', 0, 1),
(40, 'ماگ', 'data/project_image/40/0-1465736008-24.jpg', 'ماگ تبلیغاتی ، به سفارش مادیران ، 1390', 0, 1),
(41, 'پد موس تبلیغاتی', 'data/project_image/41/0-1465736066-26.jpg', 'پد موس ، به سفارش بانک صادرات سمنان ، دی ماه 1393', 0, 1),
(42, 'جاکلیدی تبلیغاتی', 'data/project_image/42/0-1465736143-irancellkeyring.jpg', 'جاکلیدی اختصاصی به سفارش ایرانسل ، آبان 1394', 0, 1),
(43, 'کلاه ایمینی تبلیغاتی', 'data/project_image/43/0-1465736210-total.jpg', 'کلاه ایمنی تبلیغاتی ، به سفارش توتال ، فروردین 1394', 0, 1),
(44, 'جعبه هدایا', 'data/project_image/44/0-1465736477-rightel2.jpg', 'جعبه اختصاصی ویژه مسابقات جام جهانی 2014 ، به سفارش رایتل ، تیرماه 1393', 0, 1),
(45, 'کیف لوازم آرایش تبلیغاتی', 'data/project_image/45/0-1465736582-kale.jpg', 'کیف لوازم آرایش ، تولید شده به سفارش کاله ، شهریور 1392', 0, 1),
(46, 'دفترچه تبلیغاتی', 'data/project_image/46/0-1465736655-bazar.jpg', 'دفترچه ، بج و لیوان تبلیغاتی ، به سفارش کافه بازار ، بهمن 1393', 0, 1),
(47, 'ماگ تبلیغی', 'data/project_image/47/0-1465736730-notrino.jpg', 'ماگ تبلیغاتی، به سفارش همراه اول ، نمایشگاه الکامپ 1393', 0, 1),
(48, 'دستمال کاغذی تبلیغاتی', 'data/project_image/48/0-1465737106-farahi.jpg', 'دستمال کاغذی تبلیغاتی ، اختصاصی ، به سفارش فرش فرهی ، شهریور 1393', 0, 1),
(49, 'ماگ تبلیغاتی', 'data/project_image/49/0-1465737210-irancellmug.jpg', 'ماگ تبلیغاتی ، به سفارش ایرانسل ،  نمایشگاه الکامپ  1394', 0, 1),
(50, 'تبشرت تبلیغاتی', 'data/project_image/50/0-1465737313-legoo.jpg', 'پیراهن تیم ملی روباتیک ایران ، به سفارش لگوی آموزشی ، شهریور 1394', 0, 1),
(51, 'بند همایشی', 'data/project_image/51/0-1465737389-eye.jpg', 'بند آویز و محافط کارت ، همایش چشم پزشکی ، به سفارش هویا ، مرداد 1393', 0, 1),
(52, 'خودنویس تبلیغاتی', 'data/project_image/52/0-1465737496-isim.jpg', 'خودکار و خودنویس تبلیغاتی ، پروژه آی سیم ، به سفارش ایرانسل ، اسفند 1394', 0, 1),
(53, 'بند گردنی تبلیغاتی', 'data/project_image/53/0-1465737593-rightel.jpg', 'بند گردن پرسنلی ، به سفارش رایتل ، دی ماه 1393', 0, 1),
(54, 'دستبند تبلیغاتی', 'data/project_image/54/0-1465737692-rexona.jpg', 'دستبندتبلیغاتی ، رکسونا ، اردیبهشت 1394', 0, 1),
(55, 'دفترچه چرم تبلیغاتی', 'data/project_image/55/0-1465737749-mobinnet.jpg', 'دفترچه چرم تبلیغاتی ، به سفارش مبین نت ، خرداد 1394', 0, 1),
(56, 'ماگ یخی تبلیغاتی', 'data/project_image/56/0-1465737815-pril.jpg', 'لیوان برفکی تبلیغاتی ، به سفارش پریل ، مرداد 1394', 0, 1),
(57, 'آفتابگیر تبلیغاتی', 'data/project_image/57/0-1465737890-datakaft.jpg', 'آفتابگیر تبلیغاتی ، تمام رنگی ، به سفارش داتک تلکام ، مهرماه 1394', 0, 1),
(58, 'ماگ تبلیغاتی', 'data/project_image/58/0-1465738006-hype.jpg', 'ماگ سرامیکی ، به سفارش هایپ ، بهمن 1394', 0, 1),
(59, 'سجاده تبلیغاتی', 'data/project_image/59/0-1465738083-righteljanamaz.jpg', 'جانماز مسافرتی ، به سفارش رایتل ، مهرماه 1394', 0, 1),
(60, 'پد موبایل', 'data/project_image/60/0-1465738195-nakpad.jpg', 'پد موبایل ، به سفارش نقش اول کیفیت ، اسفند 1394', 0, 1),
(61, 'حوله تبلیغاتی', 'data/project_image/61/0-1465738302-mitkish.jpg', 'حوله دستی تبلیغاتی ،به سفارش میتا کیش ، بهمن 1394', 0, 1),
(62, 'تیشرت تبلیغاتی', 'data/project_image/62/0-1465738367-lamiz.jpg', 'تیشرت اختصاصی ، به سفارش لمیز کافی ، اسفند 1393', 0, 1),
(63, 'لیوان دسته رنگی', 'data/project_image/63/0-1465738431-mci.jpg', 'لیوان دسته رنگی ، به سفارش همراه اول ، اسفند 1394', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`slug`, `name`, `text`, `component`) VALUES
('contact_tell', 'شماره ثابت', '(21) 22777320', ''),
('contact_cell', 'شماره همراه', '(+98) 9331055544', ''),
('contact_fax', 'شماره فکس', '(21) 22775175', ''),
('contact_address', 'آدرس دفتر', 'Tehran, pasdaran,Heravi Square', ''),
('contact_email_address_0', '', 'info@tasvireno.com', ''),
('tiny_title', 'نام سایت', 'tasvireno', ''),
('main_title', 'عنوان سایت', 'آژانس تبلیغاتی تصویر نو', ''),
('money_unit', 'واحد پولی', 'تومان', ''),
('template', 'قالب سایت', 'Default', ''),
('websitedescription', 'فعالیت سایت', 'مرکز تخصصی هدایای تبلیغاتی', ''),
('keywords', 'کلمات کلیدی', 'هدایا ، گیفت تبلیغاتی ، هدایای تبلیغاتی ، ', ''),
('html_footer_copyright', 'کپی رایت پایین سایت', 'All rights reserved site for a tasvireno', ''),
('webstatus_main', 'وضعیت سایت', '1', ''),
('html_extra_tags', 'تگ های اضافی', 'تصویر نو ,ماگ شیشه ای,لیوان سرامیکی , خودکار تبلیغاتی , آویز کلید,کلاه تبلیغاتی تیشرت ,فلش مموری,فولدر,دفترچه یادداشت,زیرلیوانی,ساک دستی,ست های رومیزی,ساعت های دیواری,گنجینه,خودکار ، چاپ ', ''),
('page', '', 'admin', ''),
('cp', '', 'setting_mg', ''),
('do', '', 'save', ''),
('func', '', 'setting_mg_main', ''),
('unsuccessful_attack', '', '10', ''),
('logo', 'لوگوی سایت', 'data/logo/0-1465625739-6651-logotasvireno.png', ''),
('baner', 'بنر', 'data/baner/0-1465504310-7536-google-seo.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_persian_ci NOT NULL COMMENT 'نام ',
  `slide_id` int(11) NOT NULL COMMENT 'دسته اسلایدشو',
  `link` text COLLATE utf8_persian_ci NOT NULL COMMENT 'لینک',
  `description` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `pic` text COLLATE utf8_persian_ci NOT NULL COMMENT 'تصویر',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `name`, `slide_id`, `link`, `description`, `pic`) VALUES
(1, 'محصول جدید', 68, 'http://sam.bluewhale.ir/', 'محصول جدید', 'data/slideshow_pic/1/0-1466316709-FeatureBanner-selfiesticks.jpg'),
(2, 'محصول جدید', 68, 'http://sam.bluewhale.ir/', 'محصول جدید', 'data/slideshow_pic/2/0-1466316735-eCat-Banner-Gifts-Cat.jpg'),
(3, 'محصول جدید', 68, 'http://sam.bluewhale.ir/', 'محصول جدید', 'data/slideshow_pic/3/0-1466316759-eCat-Banner-Clothing-Cat2016.jpg'),
(4, 'پروژه های انجام شده', 67, 'http://sam.bluewhale.ir/', 'پروژه انجام شده', 'data/slideshow_pic/4/0-1466316786-eCat-Banner-Gifts-Cat.jpg'),
(5, 'پروژه های انجام شده', 67, 'http://sam.bluewhale.ir/', 'پروژه انجام شده', 'data/slideshow_pic/5/0-1466316807-FeatureBanner-selfiesticks.jpg'),
(6, 'کاتالوگ محصول', 69, 'http://sam.bluewhale.ir/', 'کاتالوگ محصول', 'data/slideshow_pic/6/0-1466316833-eCat-Banner-Clothing-Cat2016.jpg'),
(7, 'کاتالوگ محصول', 69, 'http://sam.bluewhale.ir/', 'کاتالوگ محصول', 'data/slideshow_pic/7/0-1466316851-FeatureBanner-selfiesticks.jpg'),
(8, 'کاتالوگ محصول', 69, 'http://sam.bluewhale.ir/', 'کاتالوگ محصول', 'data/slideshow_pic/8/0-1466316873-eCat-Banner-Gifts-Cat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `texty`
--

CREATE TABLE IF NOT EXISTS `texty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان لاتین',
  `name_fa` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان فارسی',
  `title` varchar(1024) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان پیام',
  `content` text COLLATE utf8_persian_ci NOT NULL COMMENT 'محتوا',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `texty`
--

INSERT INTO `texty` (`id`, `name`, `name_fa`, `title`, `content`) VALUES
(1, 'users_register_do_msg', 'متن ایمیل تایید ثبت نام کاربر', 'ثبت نام در {main_title}\n', 'سلام\n\nکاربر گرامی، {user_name} عزیز، \nحساب کاربری شما با موفقیت ایجاد شد\nاطلاعات حساب شما به شرح زیر است : \nنام کاربری:‌ {username}\nگذرواژه: {password}\n\nورود به سایت :‌\n{_URL}/login\n\nبا تشکر\n'),
(2, 'users_register_do_sms', 'متن پیامک تایید ثبت نام کاربر', '', 'کاربر گرامی خوش آمدید\r\nثبت نام با موفقیت انجام شد\r\nنام کاربری: {username}\r\nکلمه عبور: {password}\r\n'),
(3, 'admin_order_msg', 'متن ایمیل سفارش جدید به مدیر', 'ثبت سفارش کالا در {main_title}\n', 'سلام\nثبت سفارش جدید توسط {user_name} در تاریخ{date} .\nبا تشکر'),
(4, 'user_order_msg', 'متن ایمیل سفارش کالا به خریدار', 'ثبت سفارش کالا در {main_title}\n', 'سلام\n{user_name} عزیز، \nسفارش شما با موفقیت ارسال شد و در اسرع وقت به آن رسیدگی می شود.\nبا تشکر'),
(5, 'admin_contactMessageReceived', 'دریافت پیام ارتباط با ما', 'پیام جدید دریافت شد', 'باسلام\r\n\r\nپیام جدید توسط کاربری با نام {name} دریافت شد\r\nبرای مشاهده پیام :\r\n{_URL}/?page=admin&cp=contact_mg\r\n\r\nبا تشکر');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `auth` text COLLATE utf8_persian_ci NOT NULL COMMENT 'اطلاعات ثبت نام مجازی',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`, `name`, `tell`, `cell`, `wallet_credit`, `position_region_id`, `address`, `profile_pic`, `im_a`, `work_at`, `gender`, `auth`) VALUES
(1, 'admin', 'admin', 2, 'مدیریت سایت', '02166936950', '09127744129', 0, 0, '', '', 0, 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;