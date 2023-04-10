-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.62.25
-- Время создания: Апр 10 2023 г., 16:02
-- Версия сервера: 5.7.37-40
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a0803594_bezlunoc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$10$0dsm43rghCGw9lQ4Cn4rpeP6hd3KDhBnyEmQTuFai6K4I9YtZeaxO', '2023-04-01 11:11:36', '2023-04-01 11:11:36');

-- --------------------------------------------------------

--
-- Структура таблицы `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `section_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contents`
--

INSERT INTO `contents` (`id`, `header`, `text`, `section_id`) VALUES
(1, 'Комфорт', 'В нашей тату-студии Вы обретете не только высококачественную татуировку, но и душевный комфорт.', 2),
(2, 'Безопасность', 'Используем высококачественные материалы. Перед сеансом все рабочие поверхности обрабатываются.', 2),
(3, 'Творчество', 'Всегда готовы воплотить Ваши идеи. Разработаем индивидуальный эскиз, исходя из Ваших предпочтений.', 2),
(4, 'Сколько стоит сделать татуировку?', 'Ни один мастер или тату салон не назовет Вам точную стоимость татуировки дистанционно. То есть, цены могут быть даны исключительно приблизительные как в большую, так и в меньшую сторону. Стоимость татуировки зависит от художественной сложности рисунка, места и техники нанесения, объема и детализации. Только после личной встречи – консультации с мастером вы будете знать точную стоимость. Консультация ничем не обязывает вас, но дает исчерпывающие ответы на данный вопрос.', 3),
(5, 'Как подготовиться к сеансу?', 'Есть несколько простых правил которые позволяют максимально комфортно чувствовать себя в процессе нанесения татуировки: за сутки до сеанса начните пить воду в достаточных количествах и не допускайте обезвоживания Вашего организма. Если у Вас сухая кожа, за неделю до сеанса начните использовать увлажняющий крем. Наденьте удобную одежду свободного кроя. Перед сеансом татуировки очень важно плотно поесть. Голод в сочетании с волнением не лучший вариант. За сутки до сеанса не употребляйте алкоголь и избегайте физических нагрузок.', 3),
(6, 'Сколько длится сеанс татуировки?', 'Нанесение татуировки может быть как быстрым, так и довольно продолжительным – все зависит от масштабов и сложности задуманного. В среднем небольшой по площади рисунок, требует от 2 до 5 часов кропотливого труда. Некоторые работы требуют несколько сеансов, по этому Вам возможно придется посетить студию несколько раз.', 3),
(7, 'Как ухаживать за татуировкой?', 'В конце сеанса мастер накладывает компресс, состоящий из дышащей пленки с элементом абсорбирующего слоя. Пленка защищает область нанесения татуировки от внешних патогенов, а абсорбирующий слой в свою очередь впитывает излишки лимфы. Не рекомендуется снимать компресс в течении 2-3 дней. По истечении данного периода, компресс необходимо удалить, а место нанесения татуировки тщательно промыть с мылом или раствором. В последующий период заживления на татуировку необходимо наносить заживляющий крем не реже 5-6 раз в день.', 3),
(8, NULL, 'Если Вы хотите выделиться из толпы, заявить о своей индивидуальности, оставить память о значимом событии, указать на принадлежность к субкультуре или на доминирующую черту своего характера, желания и стремления, или просто украсить тело – добро пожаловать в тату-студию Bezlunoc.', 5),
(9, NULL, 'Тату-студия \"Bezlunoc\" комфортна для клиентов — имеются уютные кресла и кушетки, где Вы можете расслабиться. Студия обустроена по последнему слову техники – это современные инструменты и оборудование, лучшие аппараты для дезинфекции и стерилизации, безопасные качественные краски. В обязательном порядке используются одноразовые иглы, перчатки, колпачки для красок и пр., после каждого клиента татуировочные машинки и рабочее место мастера обрабатывается специальными растворами. Рабочие помещения регулярнопроходят дезинфекцию при помощи бактерицидной ультрафиолетовой лампы, которая уничтожает все микроорганизмы и бактерии.', 6),
(10, NULL, 'Адрес: г. Челябинск, улица Петра Томилова, 11Ак1', 7),
(11, NULL, 'Режим работы: ПН-СБ с 11:00 до 19:00', 7),
(12, 'Вконтакте', 'https://vk.com/tattoohype', 7),
(13, 'Карта', 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa9a6f9daaf8aa3c17677d1a9df25915e220243e50c887091b2269e555716058f&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `media_pages`
--

CREATE TABLE `media_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `media_pages`
--

INSERT INTO `media_pages` (`id`, `media`, `section_id`) VALUES
(1, 'http://a0803594.xsph.ru/storage/pages/Rn7VoejUmBDszA5q6ONR6EGdE5ZGZ53INCBRkYxb.jpg', 5),
(2, 'http://a0803594.xsph.ru/storage/pages/Wsw3l7gO0qswYJmtOHPXXntCMz8axFrlwWSneAwq.jpg', 5),
(3, 'http://a0803594.xsph.ru/storage/pages/N2ejsMldhnfyv04nSm2IVInJUfbw0fvprswc3ufe.jpg', 5),
(4, 'http://a0803594.xsph.ru/storage/pages/fh4YtJu7PZ1f9RsBjfUreOIO2bUkaLoevalDX9qh.jpg', 5),
(5, 'http://a0803594.xsph.ru/storage/pages/UGnh35rywo44j9EdtiC9hGFxY1o6KjZbSUaE6BfT.png', 6),
(6, 'http://a0803594.xsph.ru/storage/pages/OU5KWTqptw8qWOKNpKvjdVMvPttfe7RVgfGtE8WU.jpg', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_02_27_140619_create_working_times_table', 1),
(4, '2023_02_27_140620_create_working_days_table', 1),
(5, '2023_02_27_140622_create_timelines_table', 1),
(6, '2023_02_27_140633_create_sizes_table', 1),
(7, '2023_02_27_140647_create_styles_table', 1),
(8, '2023_02_27_140655_create_statuses_table', 1),
(9, '2023_02_27_140659_create_records_table', 1),
(10, '2023_02_27_140705_create_tattoos_table', 1),
(11, '2023_02_27_140712_create_admins_table', 1),
(12, '2023_02_27_140731_create_pages_table', 1),
(13, '2023_02_27_140737_create_sections_table', 1),
(14, '2023_02_27_140742_create_contents_table', 1),
(15, '2023_03_03_104155_create_media_pages_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`) VALUES
(1, 'Главная'),
(2, 'Галерея работ'),
(3, 'О студии'),
(4, 'Контакты');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_id` bigint(20) UNSIGNED NOT NULL,
  `time_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `style_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `date_id`, `time_id`, `created_at`, `updated_at`, `user_id`, `size_id`, `style_id`, `status_id`) VALUES
(20, 3, 1, '2023-04-06 16:25:08', '2023-04-06 16:37:27', 8, 2, 2, 2),
(21, 11, 2, '2023-04-06 16:25:18', '2023-04-06 16:25:18', 8, 1, 3, 1),
(23, 11, 1, '2023-04-06 16:29:38', '2023-04-06 16:29:38', 9, 1, 3, 1),
(24, 12, 2, '2023-04-06 16:30:50', '2023-04-06 16:30:50', 10, 2, 3, 1),
(25, 7, 2, '2023-04-06 16:31:05', '2023-04-06 16:31:05', 10, 1, 1, 1),
(27, 4, 2, '2023-04-06 16:32:02', '2023-04-06 16:36:04', 11, 1, 2, 2),
(28, 10, 2, '2023-04-06 16:32:12', '2023-04-06 16:32:12', 11, 3, 2, 1),
(29, 4, 2, '2023-04-08 07:56:47', '2023-04-08 07:56:47', 12, 1, 3, 1),
(31, 7, 1, '2023-04-08 07:59:11', '2023-04-08 07:59:11', 13, 1, 2, 1),
(32, 12, 1, '2023-04-08 08:09:39', '2023-04-08 08:09:41', 13, 3, 1, 2),
(33, 4, 1, '2023-04-08 08:10:23', '2023-04-08 08:10:23', 14, 1, 1, 1),
(34, 9, 1, '2023-04-08 08:10:37', '2023-04-08 08:10:37', 14, 3, 1, 1),
(35, 5, 2, '2023-04-08 08:11:40', '2023-04-08 08:11:40', 15, 2, 3, 1),
(39, 8, 2, '2023-04-08 08:15:26', '2023-04-08 08:15:26', 3, 1, 2, 1),
(41, 10, 1, '2023-04-08 08:16:43', '2023-04-08 08:16:44', 4, 2, 3, 2),
(42, 5, 1, '2023-04-08 08:16:53', '2023-04-08 08:16:53', 4, 1, 1, 1),
(43, 16, 1, '2023-04-08 08:24:20', '2023-04-08 08:24:20', 17, 1, 1, 1),
(45, 13, 2, '2023-04-08 08:25:31', '2023-04-08 08:25:31', 18, 1, 1, 1),
(46, 20, 1, '2023-04-08 08:25:51', '2023-04-08 08:25:54', 18, 3, 1, 2),
(47, 25, 2, '2023-04-08 08:26:27', '2023-04-08 08:26:27', 19, 1, 1, 1),
(49, 18, 1, '2023-04-08 08:26:59', '2023-04-08 08:27:03', 19, 1, 1, 2),
(50, 22, 2, '2023-04-08 08:27:42', '2023-04-08 08:27:42', 20, 3, 1, 1),
(51, 16, 2, '2023-04-08 08:28:24', '2023-04-08 08:28:41', 21, 1, 1, 2),
(52, 24, 2, '2023-04-08 08:28:37', '2023-04-08 08:28:37', 21, 2, 2, 1),
(53, 14, 2, '2023-04-08 08:29:13', '2023-04-08 08:29:13', 22, 3, 1, 1),
(54, 21, 2, '2023-04-08 08:29:27', '2023-04-08 08:29:27', 22, 1, 1, 1),
(55, 17, 2, '2023-04-08 08:30:11', '2023-04-08 08:30:11', 23, 1, 2, 1),
(58, 15, 1, '2023-04-08 08:31:16', '2023-04-08 08:31:16', 24, 3, 1, 1),
(59, 19, 1, '2023-04-08 08:31:27', '2023-04-08 08:31:27', 24, 1, 1, 1),
(60, 15, 2, '2023-04-08 08:32:16', '2023-04-08 08:32:16', 25, 1, 2, 1),
(61, 20, 2, '2023-04-08 08:32:31', '2023-04-08 08:32:32', 25, 1, 1, 2),
(62, 23, 2, '2023-04-08 08:32:49', '2023-04-08 08:32:49', 25, 1, 2, 1),
(65, 18, 2, '2023-04-08 08:34:36', '2023-04-08 08:34:36', 27, 2, 2, 1),
(70, 13, 1, '2023-04-08 08:36:32', '2023-04-08 08:36:32', 29, 3, 1, 1),
(72, 17, 1, '2023-04-08 08:37:20', '2023-04-08 08:37:22', 30, 1, 1, 2),
(74, 22, 1, '2023-04-08 08:38:01', '2023-04-08 08:38:01', 31, 1, 3, 1),
(75, 14, 1, '2023-04-08 08:38:26', '2023-04-08 08:38:26', 5, 3, 1, 1),
(78, 18, 1, '2023-04-08 08:39:21', '2023-04-08 08:39:21', 6, 1, 2, 1),
(80, 8, 1, '2023-04-10 14:15:26', '2023-04-10 14:15:26', 1, 1, 1, 1),
(81, 10, 1, '2023-04-10 14:16:43', '2023-04-10 14:16:43', 32, 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `header`, `page_id`) VALUES
(1, 'Галерея работ', 1),
(2, 'Что для нас важно?', 1),
(3, 'Часто задаваемые вопросы', 1),
(4, 'Галерея работ', 2),
(5, 'Тату-студия \"Bezlunoc\"', 3),
(6, 'Комфорт и безопасность', 3),
(7, 'Контакты', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `price`) VALUES
(1, 'Маленькая', 2500.00),
(2, 'Средняя', 6000.00),
(3, 'Большая', 25000.00);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'Подтверждена'),
(2, 'Отменена');

-- --------------------------------------------------------

--
-- Структура таблицы `styles`
--

CREATE TABLE `styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `style` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `styles`
--

INSERT INTO `styles` (`id`, `style`, `price`) VALUES
(1, 'Графика', 4000.00),
(2, 'Реализм', 6000.00),
(3, 'Минимализм', 3000.00);

-- --------------------------------------------------------

--
-- Структура таблицы `tattoos`
--

CREATE TABLE `tattoos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `style_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tattoos`
--

INSERT INTO `tattoos` (`id`, `name`, `photo`, `created_at`, `updated_at`, `style_id`) VALUES
(14, 'don\'t ever doubt me', 'http://a0803594.xsph.ru/storage/tattoos/HxdpvV54VNRclLMGdXWfFU9Qf2ulUHIHr8oO1mLt.png', '2023-04-06 15:51:16', '2023-04-10 14:20:45', 2),
(15, 'Лев | львица', 'http://a0803594.xsph.ru/storage/tattoos/8YmiShPvww7Q6yFt6ti9XiN6V4sT2sJT1200D3Cc.png', '2023-04-06 15:52:25', '2023-04-10 14:21:02', 2),
(16, 'Божество Италии', 'http://a0803594.xsph.ru/storage/tattoos/iRHSMuUhU3zwbQuRbes7ev0OEQYvAY0Lys9y6ryB.png', '2023-04-06 15:56:04', '2023-04-10 14:22:11', 1),
(17, 'Kitsune lucoris', 'http://a0803594.xsph.ru/storage/tattoos/udHHy95D2p2vTqZ187sYWhkiP9YxYrND78b65VoR.png', '2023-04-06 15:58:38', '2023-04-10 14:22:20', 1),
(18, 'Red Bart', 'http://a0803594.xsph.ru/storage/tattoos/hQRwwvpam6EKzcbkolmYdnWpTJAsn0pvvLj8UP6I.png', '2023-04-06 15:59:37', '2023-04-10 14:22:27', 1),
(19, 'Омега', 'http://a0803594.xsph.ru/storage/tattoos/7ODJnIfLnC4TmjDsm89zy4MbLHl4H2CsLpJA3pSk.png', '2023-04-06 16:02:22', '2023-04-10 14:22:37', 3),
(20, 'Сердечко', 'http://a0803594.xsph.ru/storage/tattoos/t9VgziMQxl8ykh0hPJ6vT140bwvAGM172lKWB1Lh.png', '2023-04-06 16:02:58', '2023-04-10 14:22:48', 3),
(21, 'Веточка', 'http://a0803594.xsph.ru/storage/tattoos/nvcKhn1YiCGiwd3Ig4fYa7h2C9C3SMZ1vyaFsLwj.png', '2023-04-06 16:04:21', '2023-04-10 14:23:03', 1),
(22, 'Зубы', 'http://a0803594.xsph.ru/storage/tattoos/wpM2d3czLlRFANDXerd7BRtRAJkstQlj2Syk4tOz.png', '2023-04-06 16:08:30', '2023-04-10 14:23:11', 1),
(23, 'Aries', 'http://a0803594.xsph.ru/storage/tattoos/Cb0qf7sJ4Fv5JLSCQAtfboidvzSquzh5eX7FKKFj.png', '2023-04-06 16:08:58', '2023-04-10 14:23:29', 1),
(24, 'Луна', 'http://a0803594.xsph.ru/storage/tattoos/v05wGhr4Q56t1MgqvCbDw1xu6kcGPhQ9GBzO53he.png', '2023-04-06 16:09:31', '2023-04-10 14:23:37', 3),
(25, 'David', 'http://a0803594.xsph.ru/storage/tattoos/mo91eXCjC0FLWxF2KG5VX9yUyDuEO4TrnjSuVEdN.png', '2023-04-06 16:10:18', '2023-04-10 14:23:45', 2),
(26, 'Oni', 'http://a0803594.xsph.ru/storage/tattoos/By4WdRbeS8CuQEGos2K9L47KPtaj8tRsv5Brm6xd.png', '2023-04-06 16:10:48', '2023-04-10 14:23:57', 2),
(27, 'Лев', 'http://a0803594.xsph.ru/storage/tattoos/CuYc5EUFiAgfMAC5JXZqCqIiezgGbyD4i4b5IBqh.png', '2023-04-06 16:11:01', '2023-04-10 14:24:06', 2),
(28, 'Дракон', 'http://a0803594.xsph.ru/storage/tattoos/GJNa4nKiMDPoWIA3MIpTnATzaZZuHqMnbpcVcugC.png', '2023-04-06 16:11:20', '2023-04-10 14:24:18', 1),
(29, 'Змея', 'http://a0803594.xsph.ru/storage/tattoos/WmzQgTV3PTQsSt5luxAA5anrPt81U0ioJjgLyZPV.png', '2023-04-06 16:11:44', '2023-04-10 14:24:27', 1),
(30, 'Perfectly imperfect', 'http://a0803594.xsph.ru/storage/tattoos/IzA5oQwA5FRgvOOa5wFTaL3C0kamXfC7K1IWXeRM.png', '2023-04-06 16:12:54', '2023-04-10 14:24:37', 3),
(31, 'Веточка', 'http://a0803594.xsph.ru/storage/tattoos/VhDBh4vZ35Dk4FdDAHkOfbv31wmGLgQxEuDaHNP9.png', '2023-04-06 16:13:09', '2023-04-10 14:24:47', 3),
(32, 'Сердце', 'http://a0803594.xsph.ru/storage/tattoos/55T36gOxQrOeYrh2Y9VBbMkXiI6lhvyq74iLVGEM.png', '2023-04-06 16:13:21', '2023-04-10 14:24:54', 1),
(33, 'Я тебя люблю', 'http://a0803594.xsph.ru/storage/tattoos/KPZVKcIegPKric1h0D9WV08kUxYA5VjvVW9hNqBt.png', '2023-04-06 16:13:44', '2023-04-10 14:25:01', 3),
(34, 'MiyaGi', 'http://a0803594.xsph.ru/storage/tattoos/3m5E1X9LSVwZb8KGq920KjrR8ITxYbEh1f19lljY.png', '2023-04-06 16:14:24', '2023-04-10 14:25:09', 2),
(35, 'Бабочка', 'http://a0803594.xsph.ru/storage/tattoos/6TcCcr3GofLI34js0SGkSBnDRYLW5PCtfFKgBVPi.png', '2023-04-06 16:14:41', '2023-04-10 14:25:16', 1),
(36, 'Oni', 'http://a0803594.xsph.ru/storage/tattoos/Wc0hcuxNeQfTLhAyWIEznayPdi8TUa5aUASyW7i8.png', '2023-04-06 16:14:54', '2023-04-10 14:25:30', 1),
(37, 'Сердечко', 'http://a0803594.xsph.ru/storage/tattoos/UaZ0pnI5OJ8lRi8ERZUb4VJKV3C0FBMFDmHWY0lj.png', '2023-04-06 16:15:07', '2023-04-10 14:25:40', 3),
(38, 'Осколки', 'http://a0803594.xsph.ru/storage/tattoos/g6B8TQrmCTpDDG83bNXkuRTlSWi8KoeTyx2CSEVC.png', '2023-04-06 16:15:26', '2023-04-10 14:25:46', 1),
(39, 'Суперсила', 'http://a0803594.xsph.ru/storage/tattoos/pMP8bObSlmF2Q7LQpoBG44rRadSWCjfbDcSe4mXS.png', '2023-04-06 16:15:40', '2023-04-10 14:25:54', 3),
(40, 'Линия', 'http://a0803594.xsph.ru/storage/tattoos/V4DdDhLaQlR4UzzH7VqcTDT0IExY4GzTXYBgW69A.png', '2023-04-06 16:15:51', '2023-04-10 14:26:10', 1),
(41, 'Ghost', 'http://a0803594.xsph.ru/storage/tattoos/nc9d3yDwg15VB640SGRVZZWoajHs4LvoBJvcdw8R.png', '2023-04-06 16:16:11', '2023-04-10 14:26:16', 1),
(42, 'Призраки', 'http://a0803594.xsph.ru/storage/tattoos/NgqT56tTsG1Crddy7NA133lNqjlKfPS6NctT1On5.png', '2023-04-10 09:02:12', '2023-04-10 09:02:12', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `freely` tinyint(1) NOT NULL DEFAULT '0',
  `date_id` bigint(20) UNSIGNED NOT NULL,
  `time_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `timelines`
--

INSERT INTO `timelines` (`id`, `freely`, `date_id`, `time_id`) VALUES
(1, 0, 1, 1),
(2, 0, 1, 2),
(3, 0, 1, 4),
(4, 0, 2, 1),
(5, 0, 2, 2),
(6, 0, 2, 4),
(7, 0, 3, 1),
(8, 0, 3, 2),
(9, 0, 3, 4),
(10, 1, 4, 1),
(11, 1, 4, 2),
(12, 1, 4, 4),
(13, 1, 5, 1),
(14, 1, 5, 2),
(15, 1, 5, 4),
(16, 1, 6, 1),
(17, 0, 6, 2),
(19, 1, 7, 1),
(20, 1, 7, 2),
(21, 1, 7, 4),
(22, 1, 8, 1),
(23, 1, 8, 2),
(24, 1, 8, 4),
(25, 1, 9, 1),
(26, 0, 9, 2),
(27, 0, 9, 4),
(28, 1, 10, 1),
(29, 1, 10, 2),
(30, 1, 10, 4),
(31, 1, 11, 1),
(32, 1, 11, 2),
(33, 0, 11, 4),
(34, 0, 12, 1),
(35, 1, 12, 2),
(36, 0, 12, 4),
(37, 1, 13, 1),
(38, 1, 13, 2),
(39, 1, 13, 4),
(40, 1, 14, 1),
(41, 1, 14, 2),
(42, 1, 14, 4),
(43, 1, 15, 1),
(44, 1, 15, 2),
(45, 1, 15, 4),
(46, 1, 16, 1),
(47, 0, 16, 2),
(48, 0, 16, 4),
(49, 0, 17, 1),
(50, 1, 17, 2),
(51, 1, 17, 4),
(52, 1, 18, 1),
(53, 1, 18, 2),
(54, 0, 18, 4),
(55, 1, 19, 1),
(56, 0, 19, 2),
(57, 1, 19, 4),
(58, 0, 20, 1),
(59, 0, 20, 2),
(60, 0, 20, 4),
(61, 0, 21, 1),
(62, 1, 21, 2),
(63, 1, 21, 4),
(64, 1, 22, 1),
(65, 1, 22, 2),
(66, 0, 22, 4),
(67, 0, 23, 1),
(68, 1, 23, 2),
(69, 1, 23, 4),
(70, 0, 24, 1),
(71, 1, 24, 2),
(72, 1, 24, 4),
(73, 1, 25, 2),
(74, 1, 25, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberOfPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `numberOfPhone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Елена', 'lnlnlne@yandex.ru', '$2y$10$lgUa33dDkfT8XFe.cCdyZu9zzS8UTW8AD24B7/vJnvKF3LN0ArmJS', '79080767245', 'TYLrkE7kn3AzUgGyiIG0PLmFHdKvqB24UdB6HrzoFZfk74L5aEOscHBZ4VOz', '2023-04-01 11:42:29', '2023-04-10 14:15:40'),
(3, 'Егор', 'egrrr@yandex.ru', '$2y$10$6XJ4fEKts9O3WkxtDhzhz.ejAzFoVDX8ln2ln.qKVx02A5R6.iTqK', '79003631489', NULL, '2023-04-01 11:45:08', '2023-04-01 11:45:08'),
(4, 'Данил', 'dnill@yandex.ru', '$2y$10$gAgi/xGukk3Utx7lg16Tsex2KxSIK.CwfHMVkIKqcp9APp.VRBXUi', '79008751236', NULL, '2023-04-01 11:45:58', '2023-04-01 11:45:58'),
(5, 'Виктория', 'victoria@yandex.ru', '$2y$10$4XmJGxzwQixBBLxa1rO1peEhlC8Us1VhQ7qyyfTM1odDVsv9DZWMi', '79004678232', NULL, '2023-04-01 11:47:01', '2023-04-01 11:47:01'),
(6, 'Денис', 'dniss@yandex.ru', '$2y$10$S9a8TEpqM0sr5pLTkLfVWeMWLWUCA13Q25h9PB0FiTSv3X5UCh5jm', '79005832675', NULL, '2023-04-01 11:48:29', '2023-04-01 11:48:29'),
(7, 'Вадим', 'vingman@yandex.ru', '$2y$10$RSK.i88Y.lTv5OrNjdLMruFnzgD0b0mp3ieRyz6Lir6PnWKohwf.G', '79046542345', NULL, '2023-04-01 11:49:25', '2023-04-01 11:49:25'),
(8, 'Вероника', 'alphaColt@yandex.ru', '$2y$10$rVyX1fB2.gjVwxFDpzxuse.GSHW9hMq.1.t9xFWO7D.5RjY3HTjb2', '79080148395', NULL, '2023-04-06 16:24:54', '2023-04-06 16:24:54'),
(9, 'Ксения', 'racerStream@yandex.ru', '$2y$10$MlbE3NcjnHEuG95iiQcNxOmOWhb67cZ4dBwIU3uCIukogQbaWXzsi', '79085463765', NULL, '2023-04-06 16:29:19', '2023-04-06 16:29:19'),
(10, 'Мария', 'crimsonWrenchCash@yandex.ru', '$2y$10$AVw.JYtJtmdh3kFp.AIAXujsTL/ph5t2MPGF9lgw8kp5npwfLm/kS', '79087982420', NULL, '2023-04-06 16:30:34', '2023-04-06 16:30:34'),
(11, 'Дмитрий', 'liesMoney@yandex.ru', '$2y$10$A7eIPlvEgRdJ1g0JXTLjj.5JTIhSySSv9wSsNuJWQvxQqByC4L8aC', '79086801763', NULL, '2023-04-06 16:31:45', '2023-04-06 16:31:45'),
(12, 'Елизавета', 'echoClam@yandex.ru', '$2y$10$Uw.wAKovVJ0.Z1mz0AYGb.KWYN3u6BjJQr/jCXOg45qTOLbdJFEH2', '79000010713', NULL, '2023-04-08 07:56:23', '2023-04-08 07:56:23'),
(13, 'Константин', 'meltSealTwig@yandex.ru', '$2y$10$CwnK2.Ay9fdw8QZt5GXNTuGiQp.8m.ePHHk7.mNumoy4OfxFwO6pS', '79008438295', NULL, '2023-04-08 07:58:50', '2023-04-08 07:58:50'),
(14, 'Анастасия', 'squidColorQuarter@yandex.ru', '$2y$10$6lIyx8U113CUA5gDAv7YzuVV9let7rXKHjt8NIIbA3dvZoqD/a976', '79007053705', NULL, '2023-04-08 08:10:14', '2023-04-08 08:10:14'),
(15, 'Арсений', 'sickFell@yandex.ru', '$2y$10$osbX79YEyKP/oV2j0fRJPeLxPBoVzCRJYahL/cckxv3YgYolmqLBC', '79008142707', NULL, '2023-04-08 08:11:24', '2023-04-08 08:11:24'),
(16, 'Владислава', 'pandaTall@yandex.ru', '$2y$10$/1jd6k0EDz63PcKigIPws.g8RFC2jlS2I2x/Ww.U8FDcPFmIo3mii', '79001878013', NULL, '2023-04-08 08:12:23', '2023-04-08 08:12:23'),
(17, 'Алиса', 'meltMeltingYarn@yandex.ru', '$2y$10$tDyhZBKPXrizgBFvSJ9j4uN3aUA2woIMzJgKB7ek9b8whEjwehNve', '79008899462', NULL, '2023-04-08 08:24:07', '2023-04-08 08:24:07'),
(18, 'Ксения', 'joyfulShotExtreme@yandex.ru', '$2y$10$e9bDmdBMIO6sFD21LPT/6OqHAOPzd7rXEupOYMxObV9GMx8ST50iW', '79008843392', NULL, '2023-04-08 08:25:13', '2023-04-08 08:25:13'),
(19, 'Даниил', 'inventionSoarFear@yandex.ru', '$2y$10$djRJx2ywrDaS6ktM.20pLu1aqrtt122YrAc0FzxGPvH/JTUL0cUHS', '79000570481', NULL, '2023-04-08 08:26:16', '2023-04-08 08:26:16'),
(20, 'Ева', 'cribSquid@yandex.ru', '$2y$10$MVFdXTBQMWSjLSIdsi5o4OhynQW701avJH5fw27XabVqPhyTK0ktq', '79003720650', NULL, '2023-04-08 08:27:29', '2023-04-08 08:27:29'),
(21, 'Марьям', 'universeCrowdMonkey@yandex.ru', '$2y$10$2nwoQGZK5P7sijQGYGSWQugdWCLteef/IcHWsboIOYC7XNjgL15VW', '79004048678', NULL, '2023-04-08 08:28:11', '2023-04-08 08:28:11'),
(22, 'София', 'futureLies@yandex.ru', '$2y$10$6km8OT2dnAy5vXpkg2SJPOr7Evl2F2i1zqp0Xgj5mpXZeI/eGDL7S', '79005388210', NULL, '2023-04-08 08:29:03', '2023-04-08 08:29:03'),
(23, 'Лилия', 'cultGerm@yandex.ru', '$2y$10$ScOAOAfY01av.DEn2u7hvuUSOEyO4sUzYIElDQmxLWf6CA4dXtGTO', '79007731657', NULL, '2023-04-08 08:29:54', '2023-04-08 08:29:54'),
(24, 'Александр', 'flyBloxxer@yandex.ru', '$2y$10$lpZ2k.NL64OgeXkfdO0yGeRsjg553cpFND3YmYbRMm/nvaUqWKtqu', '79003000605', NULL, '2023-04-08 08:31:01', '2023-04-08 08:31:01'),
(25, 'Владимир', 'paymentKittenHurdle@yandex.ru', '$2y$10$ZMxJmoEH.fb6p7m6lvkIde17M.RTlzixoCz1TaWfnq.OTe.4ndCKW', '79000997673', NULL, '2023-04-08 08:31:53', '2023-04-08 08:31:53'),
(26, 'Николай', 'cribColor@yandex.ru', '$2y$10$9xSGbdjrgEQMRqQV0for/ub0B8DZCFPKVA7rVcKFeQtgEOtzzezmi', '79000203316', NULL, '2023-04-08 08:33:21', '2023-04-08 08:33:21'),
(27, 'Лев', 'janitorIdea@yandex.ru', '$2y$10$PUNApOQWW/AdjGGfcABhm.lsIeGv2R4xHy4pQaSYDwnWSIMTd4h/m', '79006208579', NULL, '2023-04-08 08:34:23', '2023-04-08 08:34:23'),
(28, 'Арина', 'enemyChuckleGirl@yandex.ru', '$2y$10$KzSgjCoEgvokhHS2jpUMEuvYo67WVQN3Jdt62lWxReIoKjeFIiMma', '79002618165', NULL, '2023-04-08 08:35:26', '2023-04-08 08:35:26'),
(29, 'Александр', 'shortGeo@yandex.ru', '$2y$10$dOTZ5IXSSrcXajwnKoXwku1cEinN2bgNSa2mui1X.ie2murQnvaK2', '79001899085', NULL, '2023-04-08 08:36:14', '2023-04-08 08:36:14'),
(30, 'Мадина', 'eyeSmallFell@yandex.ru', '$2y$10$skMyeKMCjbILaOYN5Dzhv.5dv1n.GG23kQAvoFoh.uto5IajRMnu2', '79008465566', NULL, '2023-04-08 08:37:05', '2023-04-08 08:37:05'),
(31, 'Платон', 'punchCaptain@yandex.ru', '$2y$10$sS72/K9hcUrlWspwD5fODO1t93zoHW02GaOlz6ASgiibm172RbIAK', '79008704400', NULL, '2023-04-08 08:37:43', '2023-04-08 08:37:43'),
(32, 'Валентина', 'xcole@yandex.ru', '$2y$10$3qDyw7V.eFLCa1nXbvBvq.xh9kDyzfLDeBqXbQ6IxWxDN4nnzaUqe', '79004322526', NULL, '2023-04-10 14:16:29', '2023-04-10 14:16:29');

-- --------------------------------------------------------

--
-- Структура таблицы `working_days`
--

CREATE TABLE `working_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `working_days`
--

INSERT INTO `working_days` (`id`, `date`) VALUES
(1, '2023-04-03'),
(2, '2023-04-05'),
(3, '2023-04-07'),
(4, '2023-04-10'),
(5, '2023-04-12'),
(6, '2023-04-14'),
(7, '2023-04-17'),
(8, '2023-04-19'),
(9, '2023-04-21'),
(10, '2023-04-24'),
(11, '2023-04-26'),
(12, '2023-04-28'),
(13, '2023-05-01'),
(14, '2023-05-03'),
(15, '2023-05-05'),
(16, '2023-05-08'),
(17, '2023-05-09'),
(18, '2023-05-11'),
(19, '2023-05-15'),
(20, '2023-05-17'),
(21, '2023-05-19'),
(22, '2023-05-22'),
(23, '2023-05-24'),
(24, '2023-05-29'),
(25, '2023-05-30');

-- --------------------------------------------------------

--
-- Структура таблицы `working_times`
--

CREATE TABLE `working_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `working_times`
--

INSERT INTO `working_times` (`id`, `time`) VALUES
(1, '10:00:00'),
(2, '12:00:00'),
(4, '13:30:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_login_unique` (`login`);

--
-- Индексы таблицы `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_section_id_foreign` (`section_id`);

--
-- Индексы таблицы `media_pages`
--
ALTER TABLE `media_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_pages_section_id_foreign` (`section_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_user_id_foreign` (`user_id`),
  ADD KEY `records_size_id_foreign` (`size_id`),
  ADD KEY `records_style_id_foreign` (`style_id`),
  ADD KEY `records_date_id_foreign` (`date_id`),
  ADD KEY `records_time_id_foreign` (`time_id`),
  ADD KEY `records_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_page_id_foreign` (`page_id`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tattoos`
--
ALTER TABLE `tattoos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tattoos_style_id_foreign` (`style_id`);

--
-- Индексы таблицы `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timelines_date_id_foreign` (`date_id`),
  ADD KEY `timelines_time_id_foreign` (`time_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_numberofphone_unique` (`numberOfPhone`);

--
-- Индексы таблицы `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `working_times`
--
ALTER TABLE `working_times`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `media_pages`
--
ALTER TABLE `media_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `styles`
--
ALTER TABLE `styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tattoos`
--
ALTER TABLE `tattoos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `working_times`
--
ALTER TABLE `working_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_pages`
--
ALTER TABLE `media_pages`
  ADD CONSTRAINT `media_pages_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `timelines` (`date_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_style_id_foreign` FOREIGN KEY (`style_id`) REFERENCES `styles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `timelines` (`time_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tattoos`
--
ALTER TABLE `tattoos`
  ADD CONSTRAINT `tattoos_style_id_foreign` FOREIGN KEY (`style_id`) REFERENCES `styles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `working_days` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timelines_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `working_times` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
