-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 27 2014 г., 13:30
-- Версия сервера: 5.1.49
-- Версия PHP: 5.3.3-7+squeeze3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dialog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles_category`
--

CREATE TABLE IF NOT EXISTS `articles_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `type` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `articles_category`
--

INSERT INTO `articles_category` (`id`, `name`, `type`) VALUES
(1, 'ЖКХ', 'articles'),
(2, 'Образование', 'articles'),
(3, 'Политика', 'news'),
(4, 'Экономика', 'news');

-- --------------------------------------------------------

--
-- Структура таблицы `articles_rel`
--

CREATE TABLE IF NOT EXISTS `articles_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `np_num` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- Дамп данных таблицы `articles_rel`
--

INSERT INTO `articles_rel` (`id`, `cat_id`, `page_id`, `type`, `np_num`) VALUES
(120, 3, 520, 'news', ''),
(155, 4, 519, 'news', ''),
(137, 2, 526, 'articles', ''),
(154, 0, 529, 'articles', '17  от 11.11.11'),
(152, 0, 530, 'news', ''),
(132, 0, 533, 'news', ''),
(145, 1, 534, 'articles', '16  от 11.11.11'),
(153, 2, 535, 'articles', '11  от 11.11.11');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('dee31d2d7123d96c443c2184d84f0519', '88.204.53.75', 'Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/20100101 Firefox/31.0', 1409092953, '');

-- --------------------------------------------------------

--
-- Структура таблицы `imgs`
--

CREATE TABLE IF NOT EXISTS `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_table` varchar(128) NOT NULL,
  `element_id` int(11) NOT NULL,
  `orig_ext` varchar(16) NOT NULL,
  `img_path` varchar(1024) NOT NULL,
  `weight` int(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=386 ;

--
-- Дамп данных таблицы `imgs`
--

INSERT INTO `imgs` (`id`, `to_table`, `element_id`, `orig_ext`, `img_path`, `weight`) VALUES
(349, 'page', 519, 'jpg', './uploads/', 6),
(348, 'page', 519, 'jpg', './uploads/', 1),
(346, 'page', 519, 'jpg', './uploads/', 1),
(347, 'page', 519, 'png', './uploads/', 3),
(350, 'page', 519, 'jpg', './uploads/', 3),
(369, 'page', 519, 'jpg', './uploads/', 1),
(359, 'page', 519, 'jpg', './uploads/', 5),
(368, 'page', 520, 'jpg', './uploads/', 1),
(385, 'page', 530, 'jpg', './uploads/', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `header` text CHARACTER SET cp1251 NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL,
  `type` varchar(10) CHARACTER SET cp1251 NOT NULL DEFAULT 'page',
  `sort` int(8) NOT NULL,
  `block_of` int(10) NOT NULL,
  `tpl` varchar(128) NOT NULL,
  `subpage_of` int(10) NOT NULL,
  `chpu` varchar(1024) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `editor` int(2) NOT NULL DEFAULT '1',
  `subtype` varchar(18) NOT NULL,
  `timestamp` varchar(18) NOT NULL,
  `page_opts` text NOT NULL,
  `meta_title` varchar(1024) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=545 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `header`, `text`, `type`, `sort`, `block_of`, `tpl`, `subpage_of`, `chpu`, `active`, `editor`, `subtype`, `timestamp`, `page_opts`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(9, 'Главная', 'Привет, Мир!', 'page', 12, 0, 'page', 0, 'main', 1, 1, 'extpage', '', '', '', '', ''),
(20, 'Почта для отправки с формы', 'grvaz@mail.ru', 'page', 0, 0, '', 0, 'page/20', 1, 0, 'extpage', '', '', '', '', ''),
(10, 'TITLE (общий)', 'Городской еженедельник "Диалог"', 'page', 14, 0, 'page', 0, 'page/10', 1, 0, 'extpage', '1392472510', 'a:0:{}', '', '', ''),
(12, 'Футер', 'См. подстраницы', 'page', 15, 0, 'page', 0, 'page/12', 1, 0, 'extpage', '1392516675', 'a:0:{}', '', '', ''),
(13, 'Левый блок-1', 'Редакция газеты &laquo;Диалог&raquo;:<br />\n636070, Томская область, г. Северск, пр. Коммунистический, 38<br />\nТелефоны: +7 (3823) 54-84-04<br />\ndialog7@seversk.tomsknet.ru', 'page', 0, 0, '', 12, 'page/13', 1, 1, 'extpage', '', '', '', '', ''),
(14, 'Левый блок-2', 'Информационная и техническая поддержка - ИА &quot;Муниципальная Россия&quot;&nbsp;', 'page', 0, 0, '', 12, 'page/14', 1, 1, 'extpage', '', '', '', '', ''),
(15, 'Левый блок-3', 'Местное время на сайте: +3 ч. (относительно московского)', 'page', 0, 0, '', 12, 'page/15', 1, 1, 'extpage', '', '', '', '', ''),
(16, 'Счётчики', '-', 'page', 0, 0, '', 12, 'page/16', 1, 1, 'extpage', '', '', '', '', ''),
(17, 'Средний блок-1', '1', 'page', 0, 0, '', 12, 'page/17', 1, 1, 'extpage', '', '', '', '', ''),
(519, 'Новость 2', '<h2>$this-&gt;db-&gt;order_by();</h2>\n\n<p>Позволяет вам устанавливать условие сортировки ORDER BY. Первый параметр содержит имя столбца, по которому нужно отсортировать результат. Второй параметр позволяет указывать направление сортировки, <kbd>asc</kbd>, <kbd>desc</kbd> или <kbd>random</kbd>.</p>', 'article', 0, 0, '', 0, '', 1, 1, 'news', '1408694492', '', 'g', 'f', 'hg'),
(19, 'Средний блок-3', '3', 'page', 0, 0, '', 12, 'page/19', 1, 1, 'extpage', '', '', '', '', ''),
(492, 'uyi', 'uio', 'page', 0, 0, '', 490, 'page/492', 1, 1, 'extpage', '', '', '', '', ''),
(506, 'gf', 'gfh', 'page', 0, 0, '', 496, '', 1, 1, 'extpage', '', '', '', '', ''),
(509, 'еееееееее', '', 'page', 0, 0, '', 508, 'page/509', 1, 1, 'extpage', '', '', '', '', ''),
(494, 'oip', 'p[', 'page', 0, 0, '', 493, 'page/494', 1, 1, 'extpage', '', '', '', '', ''),
(495, 'tst', 'jhuju', 'page', 0, 0, '', 493, 'page/495', 1, 1, 'extpage', '', '', '', '', ''),
(507, 'hj', 'hjk', 'page', 0, 0, '', 497, 'page/507', 1, 1, 'extpage', '', '', '', '', ''),
(498, 'tst5', 'fghg', 'page', 0, 0, '', 493, 'page/498', 1, 1, 'extpage', '', '', '', '', ''),
(499, 'newwwwww', 'rggrtghtrh', 'page', 0, 0, '', 493, 'page/499', 1, 1, 'extpage', '', '', '', '', ''),
(520, 'Новость 11', 'паапр', 'article', 0, 0, '', 0, '', 1, 0, 'news', '1408694487', '', '', '', ''),
(526, 'Статья 11', 'dsfdfgsdg', 'article', 0, 0, '', 0, '', 1, 1, 'articles', '1408694477', '', '', '', ''),
(529, 'Статья 34435', '45t4535 y356y h', 'article', 0, 0, '', 0, '', 1, 1, 'articles', '1408764636', '', '', '', ''),
(530, 'Новость 345456', 'ап ренр р ре рп', 'article', 0, 0, '', 0, '', 1, 1, 'news', '1408764650', '', '', '', ''),
(18, 'Средний блок-2', '2', 'page', 0, 0, '', 12, 'page/18', 1, 1, 'extpage', '', '', '', '', ''),
(11, 'Кол-во новостей/статей на страницу', '8', 'page', 0, 0, '', 0, 'page/11', 1, 0, 'extpage', '', '', '', '', ''),
(533, 'wwww', 'ef cg r', 'article', 0, 0, '', 0, '', 1, 1, 'news', '1408845619', '', '', '', ''),
(534, '44444', 'reeerrtg', 'article', 0, 0, '', 0, '', 1, 1, 'articles', '1408845630', '', '', '', ''),
(535, 'Тест', 'ап ывавкеап', 'article', 0, 0, '', 0, '', 1, 1, 'articles', '1408857689', '', 'dddd', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
