-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 12 2019 г., 13:12
-- Версия сервера: 5.7.26-0ubuntu0.19.04.1
-- Версия PHP: 7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `3_d_mriya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` json NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `is_active`, `section`, `title`, `url`, `parent`, `sort`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '{\"de\": \"Über uns\", \"en\": \"About Us\", \"es\": \"Sobre nosotros\", \"ru\": \"О нас\", \"ua\": \"Про нас\"}', 'about', 0, 1, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(2, 1, '0', '{\"de\": \"Karriere\", \"en\": \"Careers\", \"es\": \"Carreras profesionales\", \"ru\": \"Карьера\", \"ua\": \"Кар\'єра\"}', 'careers', 0, 2, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(3, 1, '0', '{\"de\": \"Presse Medien\", \"en\": \"Press/Media\", \"es\": \"Prensa/Medios\", \"ru\": \"Пресса\", \"ua\": \"Преса / ЗМІ\"}', 'media', 0, 3, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(4, 1, '0', '{\"de\": \"Anlegerbeziehungen\", \"en\": \"Investor relations\", \"es\": \"Relaciones con inversionistas\", \"ru\": \"Инвесторам\", \"ua\": \"Відносини з інвесторами\"}', 'investors', 0, 4, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(5, 1, '1', '{\"de\": \"Inhalte verkaufen\", \"en\": \"Sell content\", \"es\": \"Vender contenido\", \"ru\": \"Продать контент\", \"ua\": \"Продаж вмісту\"}', 'sell_content', 0, 5, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(6, 1, '1', '{\"de\": \"FAQ\", \"en\": \"FAQ\", \"es\": \"Preguntas más frecuentes\", \"ru\": \"Ч.З.Вопросы\", \"ua\": \"Ч.З.Вопроси\"}', 'faq', 0, 6, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(7, 1, '2', '{\"de\": \"Für Entwickler\", \"en\": \"Developers\", \"es\": \"Para desarrolladores\", \"ru\": \"Разработчикам\", \"ua\": \"Розробникам\"}', 'developer', 0, 7, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(8, 1, '2', '{\"de\": \"Partner/Wiederverkäufer\", \"en\": \"Affiliate/Reseller\", \"es\": \"Afiliado/Revendedor\", \"ru\": \"Партнеры/Посредники\", \"ua\": \"Партнеры/ Посередники\"}', 'affiliate', 0, 8, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(9, 1, '2', '{\"de\": \"Internationaler Reseller\", \"en\": \"International reseller\", \"es\": \"Revendedor internacional\", \"ru\": \"Международные посредники\", \"ua\": \"Міжнародні посередники\"}', 'international', 0, 9, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(10, 1, '3', '{\"de\": \"Zuhause\", \"en\": \"Home\", \"es\": \"Casa\", \"ru\": \"Главная\", \"ua\": \"Головна\"}', 'index', 0, 10, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(11, 1, '3', '{\"de\": \"Lagermodell\", \"en\": \"Stock models\", \"es\": \"Modelo de stock\", \"ru\": \"Галерея моделей\", \"ua\": \"Галерея моделей\"}', 'models', 0, 11, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(12, 1, '3', '{\"de\": \"Gutscheine\", \"en\": \"Coupons\", \"es\": \"Cupones\", \"ru\": \"Купоны\", \"ua\": \"Купони\"}', 'coupons', 0, 12, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(13, 1, '3', '{\"de\": \"Trend-Themen\", \"en\": \"Trending topics\", \"es\": \"Tendencia de los temas\", \"ru\": \"Актуальные темы\", \"ua\": \"Теми з тенденціями\"}', 'topics', 0, 13, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(14, 1, '3', '{\"de\": \"Persönliches Konto\", \"en\": \"Personal account\", \"es\": \"Cuenta personal\", \"ru\": \"Личный кабинет\", \"ua\": \"Особистий кабінет\"}', 'sign-in', 0, 14, '2019-05-17 10:20:08', '2019-05-21 16:24:15'),
(15, 1, '3', '{\"de\": \"Anmeldung\", \"en\": \"Registration\", \"es\": \"Registro\", \"ru\": \"Регистрация\", \"ua\": \"Реєстрація\"}', 'join', 0, 15, '2019-05-17 10:20:08', '2019-05-21 16:24:15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
