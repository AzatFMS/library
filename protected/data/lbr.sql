-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 07 2014 г., 15:51
-- Версия сервера: 5.5.35-log
-- Версия PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lbr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lbr_authors`
--

CREATE TABLE IF NOT EXISTS `lbr_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `time_updated` int(11) DEFAULT NULL,
  `time_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `lbr_authors`
--

INSERT INTO `lbr_authors` (`id`, `name`, `time_updated`, `time_created`) VALUES
(1, 'Автор 1', 1407402011, 1407402011),
(2, 'Автор 2', 1407402035, 1407402035),
(3, 'Автор 3', 1407402043, 1407402043),
(4, 'Автор 4', 1407406525, 1407406525),
(5, 'Автор 5', 1407406532, 1407406532);

-- --------------------------------------------------------

--
-- Структура таблицы `lbr_book2author`
--

CREATE TABLE IF NOT EXISTS `lbr_book2author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book2author_book_fk` (`book_id`),
  KEY `book2author_author_fk` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Дамп данных таблицы `lbr_book2author`
--

INSERT INTO `lbr_book2author` (`id`, `book_id`, `author_id`) VALUES
(68, 3, 1),
(69, 3, 2),
(70, 3, 3),
(76, 4, 1),
(77, 4, 4),
(78, 1, 1),
(79, 1, 2),
(80, 1, 3),
(81, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `lbr_book2reader`
--

CREATE TABLE IF NOT EXISTS `lbr_book2reader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `reader_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book2reader_book_fk` (`book_id`),
  KEY `book2reader_reader_fk` (`reader_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `lbr_book2reader`
--

INSERT INTO `lbr_book2reader` (`id`, `book_id`, `reader_id`) VALUES
(28, 3, 4),
(31, 4, 4),
(32, 1, 2),
(33, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `lbr_books`
--

CREATE TABLE IF NOT EXISTS `lbr_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `time_updated` int(11) DEFAULT NULL,
  `time_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `lbr_books`
--

INSERT INTO `lbr_books` (`id`, `name`, `time_updated`, `time_created`) VALUES
(1, 'Книга 1', 1407409563, 1407400964),
(2, 'Книга 2', 1407400964, 1407400964),
(3, 'Книга 3', 1407407220, 1407400990),
(4, 'Книга 4', 1407409550, 1407401003),
(5, 'Книга 5', 1407403715, 1407403715);

-- --------------------------------------------------------

--
-- Структура таблицы `lbr_readers`
--

CREATE TABLE IF NOT EXISTS `lbr_readers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `time_updated` int(11) DEFAULT NULL,
  `time_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `lbr_readers`
--

INSERT INTO `lbr_readers` (`id`, `name`, `time_updated`, `time_created`) VALUES
(2, 'Читатель 1', 1407401468, 1407401468),
(3, 'Читатель 2', 1407401615, 1407401577),
(4, 'Читатель 3', 1407401630, 1407401630);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1407398355),
('m140807_075431_crete_books_table', 1407398358),
('m140807_080047_create_authors_table', 1407398718),
('m140807_080204_create_readers_table', 1407398718),
('m140807_080558_crete_book2reader_table', 1407403983),
('m140807_080609_crete_book2author_table', 1407403984);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lbr_book2author`
--
ALTER TABLE `lbr_book2author`
  ADD CONSTRAINT `book2author_author_fk` FOREIGN KEY (`author_id`) REFERENCES `lbr_authors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book2author_book_fk` FOREIGN KEY (`book_id`) REFERENCES `lbr_books` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lbr_book2reader`
--
ALTER TABLE `lbr_book2reader`
  ADD CONSTRAINT `book2reader_reader_fk` FOREIGN KEY (`reader_id`) REFERENCES `lbr_readers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book2reader_book_fk` FOREIGN KEY (`book_id`) REFERENCES `lbr_books` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
