-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `normalproduct`
--

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('vasily123@yandex.ru|127.0.0.1', 'i:1;', 1738640589),
('vasily123@yandex.ru|127.0.0.1:timer', 'i:1738640589;', 1738640589);

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`) VALUES
(1, 'Мясо', ''),
(2, 'Рыба', ''),
(3, 'Молочное', ''),
(4, 'Мучное', ''),
(5, 'Овощи', ''),
(6, 'Фрукты', ''),
(8, 'Крупы', '');

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_09_201652_create_products_table', 2),
(5, '2024_09_14_195228_add_fields_to_products', 3),
(6, '2024_09_14_215707_create_categories_table', 4),
(7, '2024_09_14_215921_create_subcategories_table', 5),
(8, '2024_09_14_220005_create_shops_table', 6),
(9, '2024_11_03_031216_create_personal_access_tokens_table', 7),
(10, '2024_11_10_062751_add_is_admin_to_users_table', 8),
(11, '2024_11_24_192801_add_author_city_status_to_products_table', 9),
(12, '2024_11_25_154930_add_foreign_key_to_products_table', 10),
(13, '2024_11_26_161142_create_status_table', 11),
(14, '2024_11_26_232606_add_default_publication_statuses', 12),
(15, '2024_11_26_234226_rename_table_publication_status', 13),
(16, '2024_11_27_223535_Add_Foreign_Key_To_Products_Status', 14);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `product_name`, `product_description`, `product_message`, `product_price`, `product_category`, `product_subcategory`, `product_quality`, `shop`, `product_image`, `user_id`, `city`, `status`) VALUES
(36, '2024-09-23 22:52:45', '2024-11-27 20:30:53', 'Шоколад Alpen Gold', 'Шоколад Alpen Gold с дробленным фундуком', 'Вкусный шоколад, качественный продукт. Орешков бы чуть побольше, чуть больше какао-масла и чуть меньше сахара и было бы идеально.', 69, 'Молочное', 'Молоко', 'Хорошо', 'Магнит', 'Шоколад Alpen Gold1727142765.jpg', NULL, NULL, 'published'),
(42, '2024-10-03 02:52:00', '2024-11-27 20:30:53', 'Греча Националь', 'Греча Националь 900 гр.', 'Хорошая гречка.', 120, 'Крупы', 'Греча', 'Хорошо', 'Пятёрочка', 'Греча Националь1727934720.jpg', NULL, NULL, 'published'),
(44, '2024-10-03 03:47:01', '2024-12-12 22:08:42', 'Мука пшеничная makfa 1кг', 'Мука пшеничная makfa 1кг высший сорт', 'Нормальная мука', 100, 'Мучное', 'Мука', 'Нормально', 'Пятёрочка', 'Мукапшеничнаяmakfa1кг1727938021png', NULL, NULL, 'published'),
(45, '2024-11-01 03:27:26', '2024-12-10 03:24:03', 'Молоко цельное', '3,2-5.3%', 'Настоящее цельное молоко. Хорошее.', 80, 'Молочное', 'Молоко', 'Хорошо', 'Семишагов', 'Молокоцельное1730442446jpg', NULL, NULL, 'published'),
(47, '2024-12-08 07:55:26', '2025-02-06 12:40:24', 'Макароны Makfa', 'Спагетти из твердых сортов пшеницы', 'Макароны Makfa Спагетти из твердых сортов пшеницы', 75, 'Крупы', 'Макароны', 'Нормально', 'Перекрёсток', 'МакароныMakfa1733655326png', NULL, NULL, 'published'),
(58, '2024-12-12 05:40:23', '2025-02-06 12:40:24', 'Перловка', 'без описания', 'фывфылов', 50, 'Крупы', 'Перловка', 'Нормально', 'Пятёрочка', NULL, 5, NULL, 'published'),
(59, '2024-12-12 22:59:41', '2024-12-17 06:04:57', 'Хлеб ржаной каравай', 'Хлеб ржаной из обдирной муки', 'Нормальный хлэб', 60, 'Мучное', 'Хлеб', 'Нормально', 'Магнит', NULL, 5, NULL, 'published'),
(62, '2024-12-18 05:39:21', '2024-12-18 05:39:40', 'Молоко', 'Молоко', 'Так себе...', 100, 'Молочное', 'Молоко', 'Плохо', 'Пятёрочка', NULL, 5, NULL, 'published'),
(64, '2025-02-05 07:26:23', '2025-02-05 07:26:41', 'Кефир', 'Такой-то кефир', 'Дорогой и невкусный кефир.', 200, 'Молочное', 'Кефир', 'Плохо', 'Магнит', NULL, 5, NULL, 'published'),
(65, '2025-02-06 12:11:23', '2025-02-06 12:12:15', 'Макароны', 'Такие-то', 'Неплохие макароны.', 80, 'Крупы', 'Макароны', 'Нормально', 'Окей', NULL, 5, NULL, 'published');

--
-- Dumping data for table `publicationstatus`
--

INSERT INTO `publicationstatus` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'published', NULL, NULL),
(2, 'unpublished', NULL, NULL),
(3, 'archive', NULL, NULL);

--
-- Dumping data for table `quality`
--

INSERT INTO `quality` (`id`, `quality_name`) VALUES
(2, 'Нормально'),
(1, 'Плохо'),
(3, 'Хорошо');

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bKNmmjQrnzUhQAnxHZ5QFWSYzcaFE91OUL7tdaT3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1Z4UUhWNklGRU9JTUllUUFtbXpzQng2Q1kzQzR3R1VDb3hhTGVtcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cubm9ybWFscHJvZHVjdC5ydSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738841178),
('EDDYJoKg9fe6QIy18q2AisM8hKgkwsiJ6WWG5LmJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGIySGZiUHRWd3ZBMlA5Z1p0Um14Vks0alFHVzVDdDh1YkJzelRGayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cubm9ybWFscHJvZHVjdC5ydSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738841178),
('fTN24izhRnPW1SuJsB2wecpAfca1ZdFwxsqxzcUs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVm1OZmlIUzEySFg2eUdDbWRRcTBmOEVxSUpYSlVRYjdwS0VDVWVUeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cubm9ybWFscHJvZHVjdC5ydSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738841178),
('je3wAA2mWiIGWtlnZjjUvA70tCrN8AikJETXl2V4', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic2JMSHFEaEJQcGF6RFZ3Q2wxYkNkd1VQclhSZU1BZ1F4UVR3TVRMZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly93d3cubm9ybWFscHJvZHVjdC5ydS9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1738849822),
('NI7LLRHlV1OsVU56bQ8j9K56oIvCcMMMHqfJlWfc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzI5TFlUYTdVdXhMa21HNXZDcEZocTFNWjQ0SG5HS1ZrNExSVks4ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cubm9ybWFscHJvZHVjdC5ydSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738841174),
('vIeAAEg7zwi5UbXJ2Zgspej6BbpEjWasBXxQkU3R', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnVRYWI3WVFZZzRtQkZJUGZNbUthbU9EcU1hcDM3UUtZWmNFRVVIUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cubm9ybWFscHJvZHVjdC5ydSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738841178);

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_name`, `image`) VALUES
(1, 'Пятёрочка', ''),
(2, 'Перекрёсток', ''),
(3, 'Дикси', ''),
(4, 'Семишагов', ''),
(5, 'Магнит', ''),
(6, 'Лента', ''),
(7, 'Окей', ''),
(8, 'Спар', ''),
(9, 'Верный', '');

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory_name`, `category_name`, `image`) VALUES
(1, 'Сыр', 'Молочное', ''),
(2, 'Молоко', 'Молочное', ''),
(3, 'Кефир', 'Молочное', ''),
(4, 'Творог', 'Молочное', ''),
(5, 'Йогурт', 'Молочное', ''),
(6, 'Свинина', 'Мясо', ''),
(7, 'Говядина', 'Мясо', ''),
(8, 'Курица', 'Мясо', ''),
(9, 'Баранина', 'Мясо', ''),
(10, 'Колбаса', 'Мясо', ''),
(11, 'Сосиски', 'Мясо', ''),
(12, 'Паштеты', 'Мясо', ''),
(13, 'Белая', 'Рыба', ''),
(14, 'Красная', 'Рыба', ''),
(15, 'Яйца', 'Мясо', ''),
(16, 'Мука', 'Мучное', ''),
(17, 'Хлеб', 'Мучное', ''),
(18, 'Греча', 'Крупы', ''),
(19, 'Макароны', 'Крупы', ''),
(20, 'Перловка', 'Крупы', ''),
(21, 'Овсянка', 'Крупы', ''),
(22, 'Огурцы', 'Овощи', ''),
(23, 'Помидоры', 'Овощи', ''),
(24, 'Капуста', 'Овощи', ''),
(25, 'Салат', 'Овощи', ''),
(26, 'Лук репчатый', 'Овощи', ''),
(27, 'Картофель', 'Овощи', ''),
(28, 'Перец', 'Овощи', ''),
(29, 'Лук зелёный', 'Овощи', ''),
(30, 'Укроп ', 'Овощи', ''),
(31, 'Яблоки', 'Фрукты', ''),
(32, 'Апельсины', 'Фрукты', ''),
(33, 'Бананы', 'Фрукты', ''),
(34, 'Персики', 'Фрукты', ''),
(35, 'Нектарины', 'Фрукты', ''),
(36, 'Абрикосы', 'Фрукты', '');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'vlad', 'vlad@123.ru', NULL, '$2y$12$ehsG2ZytnZ8CnKtunZKy1uhSglLIXrOkfhIkgOVHAn4.UC2ssI95y', NULL, '2024-10-11 12:27:27', '2024-10-11 12:27:27', 0),
(2, 'Ильдус', 'ildus123@mail.ru', NULL, '$2y$12$bUxhBAptbR1la1RJIyn6COTZhoPTwpCEsCul3xeOmeozTwkTdFVke', NULL, '2024-11-03 03:25:36', '2024-11-03 03:25:36', 0),
(3, 'vladik', 'abcd123@yandex.ru', NULL, '$2y$12$0wjJi0qnB2pNcmPnrGaxDuhhmxZQoUegoPf2S2q7lgWojIriVw28K', NULL, '2024-11-05 23:24:50', '2024-11-05 23:24:50', 0),
(4, 'dictator', 'dictator123321@yanex.ru', NULL, '$2y$12$uFWoWlTNW/Hs0z.epGxJLe6opXIcU7zkQxVWWnEzg8NLW2Mvv6Ce6', NULL, '2024-11-11 01:21:38', '2024-11-11 01:21:38', 0),
(5, 'Vasya', 'vasiliy123@yandex.ru', NULL, '$2y$12$7sJG155Krs3U3.bT.UzD/eKgnThLwPpavFoCICY5u9Xn398Kawu.O', NULL, '2024-11-11 01:36:16', '2024-11-11 01:36:16', 1),
(6, 'leonid', 'leonid123@yandex.ru', NULL, '$2y$12$TrFBtyKScIEFnSDeC4mP6uGBhItIm0q2t5DnaTJ0neojbgKblIjPu', NULL, '2024-12-10 03:36:14', '2024-12-10 03:36:14', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
