-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 18 2018 г., 17:57
-- Версия сервера: 5.6.31
-- Версия PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `short`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blacklist`
--

CREATE TABLE IF NOT EXISTS `blacklist` (
  `id` int(11) NOT NULL,
  `what` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `blacklist`
--

INSERT INTO `blacklist` (`id`, `what`) VALUES
(1, 'goo.gl'),
(2, 'api'),
(3, 'bit.ly');

-- --------------------------------------------------------

--
-- Структура таблицы `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL,
  `afrom` varchar(256) NOT NULL,
  `ato` varchar(256) NOT NULL,
  `creation_date` varchar(64) NOT NULL,
  `creator` varchar(128) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `clicks` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `regdate` varchar(12) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `regdate`, `role`) VALUES
(3, 'vip', 'dc7d96d4125e819d53e0efe8001afa6a64b35728', '1520958731', 'vip'),
(5, 'AlexB', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', '1539885420', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
