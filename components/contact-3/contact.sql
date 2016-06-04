
CREATE TABLE `contact` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام کاربر',
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ایمیل کاربر',
  `cell` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'شماره همراه',
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان پیام',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیام',
  `date` int(11) NOT NULL COMMENT 'زمان'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `contact` ADD `hide` INT(1) NOT NULL AFTER `date`;
ALTER TABLE `contact` ADD `to` VARCHAR(255) NOT NULL COMMENT 'مقصد' AFTER `cell`;



--spi--
