-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2018 г., 19:07
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `PassportOffice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `value` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `value`, `country_id`) VALUES
(1, 'Москва', 1),
(6, 'Ростов', 1),
(7, 'Киев', 2),
(8, 'Харьков', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `citizen`
--

CREATE TABLE `citizen` (
  `id` int(11) NOT NULL,
  `serial` varchar(11) NOT NULL,
  `number` int(11) NOT NULL,
  `F_name` varchar(30) NOT NULL,
  `L_name` varchar(30) NOT NULL,
  `Patronymic` varchar(30) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Date` date NOT NULL,
  `Nationality` varchar(15) NOT NULL,
  `adress` varchar(80) NOT NULL,
  `Identification_id` int(2) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date_register` date NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `citizen`
--

INSERT INTO `citizen` (`id`, `serial`, `number`, `F_name`, `L_name`, `Patronymic`, `Gender`, `Date`, `Nationality`, `adress`, `Identification_id`, `photo`, `date_register`, `city_id`) VALUES
(1, 'ВТ', 3245567, 'Иванов', 'Петр', 'Максимович', 1, '1990-05-07', 'Русский', 'ул. Ленина, 14', 3, '', '2018-05-14', 8),
(2, 'ВТ', 765479, 'Иванова', 'Инна', 'Александровна', 1, '2018-05-11', 'Русская', 'ул. Ленина, 12', 1, 'images/2.png', '2018-05-19', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `value` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `value`) VALUES
(1, 'Россия'),
(2, 'Украина');

-- --------------------------------------------------------

--
-- Структура таблицы `identification`
--

CREATE TABLE `identification` (
  `id` int(11) NOT NULL,
  `value` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `identification`
--

INSERT INTO `identification` (`id`, `value`) VALUES
(1, 'Паспорт'),
(3, 'Свидетельство о рождении');

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_s` datetime NOT NULL,
  `date_f` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `user_id`, `date_s`, `date_f`) VALUES
(1, 1, '2018-05-19 18:24:55', '0000-00-00 00:00:00'),
(2, 1, '2018-05-19 18:25:43', '0000-00-00 00:00:00'),
(3, 1, '2018-05-19 18:26:52', '0000-00-00 00:00:00'),
(4, 1, '2018-05-19 18:28:38', '0000-00-00 00:00:00'),
(5, 1, '2018-05-19 18:30:01', '0000-00-00 00:00:00'),
(6, 1, '2018-05-19 18:31:42', '0000-00-00 00:00:00'),
(7, 1, '2018-05-19 18:31:44', '0000-00-00 00:00:00'),
(8, 1, '2018-05-19 18:32:25', '0000-00-00 00:00:00'),
(9, 1, '2018-05-19 18:32:33', '0000-00-00 00:00:00'),
(10, 1, '2018-05-19 18:32:44', '2018-05-19 18:32:51'),
(11, 1, '2018-05-19 18:33:40', '0000-00-00 00:00:00'),
(12, 1, '2018-05-19 18:33:50', '2018-05-19 18:34:01'),
(13, 1, '2018-05-19 18:34:02', '2018-05-19 18:34:08'),
(14, 1, '2018-05-19 18:37:57', '2018-05-19 18:39:01'),
(15, 1, '2018-05-19 18:39:02', '2018-05-19 18:39:56'),
(16, 1, '2018-05-19 18:39:58', '2018-05-19 18:40:26'),
(17, 1, '2018-05-19 18:40:29', '2018-05-19 18:50:06'),
(18, 1, '2018-05-19 18:45:50', '2018-05-19 18:46:57'),
(19, 1, '2018-05-19 18:46:58', '0000-00-00 00:00:00'),
(20, 1, '2018-05-19 18:50:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `salt`) VALUES
(1, 'admin@mail.ru', '2b816535a62660f12572603cda9ae0aa', 'JaiwZXWG60');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_ibfk_1` (`country_id`);

--
-- Индексы таблицы `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Identification_id` (`Identification_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `citizen`
--
ALTER TABLE `citizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `identification`
--
ALTER TABLE `identification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `citizen`
--
ALTER TABLE `citizen`
  ADD CONSTRAINT `citizen_ibfk_1` FOREIGN KEY (`Identification_id`) REFERENCES `identification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citizen_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
