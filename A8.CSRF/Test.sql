-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 19 2018 г., 09:11
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Names`
--

CREATE TABLE `Names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `First Name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Last Name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `hash` varchar(100) CHARACTER SET utf8 NOT NULL,
  `counter` int(2) UNSIGNED NOT NULL,
  `CSRFToken` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `Names`
--

INSERT INTO `Names` (`id`, `First Name`, `Last Name`, `Login`, `Password`, `hash`, `counter`, `CSRFToken`) VALUES
(1, 'Petr', 'Petrov', 'Petr123', 'Pass123', '$2y$10$jbFniLJlVpZUrApVM0D1i.9GUeKIyQvZTAKM/CU9nHOyIBnOPK82W', 0, '7483e42e02f8e1f76073d04cd7b27eeb64b75a3e6ac5c58c8cf2593ec9d09b1a'),
(3, 'Sidor', 'Sidorov', 'Sidor123', 'pass123', '$2y$10$Gf.pghiu9QHfzF2eIAJHkukmkhM2xofCWjd1PWzm1c8SqZJ.OTyLu', 0, ''),
(4, 'Ivan', 'Ivanov', 'Ivan123', 'Ivan321', '$2y$10$PqUFAEac73.I67JrjBpJ8ejfjdmqtohg.J8IUhpdO3g72MeRuqK32', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `Test_table`
--

CREATE TABLE `Test_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `Test_table`
--

INSERT INTO `Test_table` (`id`, `Number`) VALUES
(1, 123);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Names`
--
ALTER TABLE `Names`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `Test_table`
--
ALTER TABLE `Test_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Names`
--
ALTER TABLE `Names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Test_table`
--
ALTER TABLE `Test_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
