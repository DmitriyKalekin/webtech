CREATE DATABASE quest DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE quest;

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `age` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`) VALUES
(1, 'Иван Иванов', 45),
(2, 'Петр Петров', 46),
(3, 'Сидор Сидоров', 37),
(4, 'Никита Джигурда', 55),
(5, 'Дмитрий Медведев', 40),
(6, 'Вася Васильев', 33);
