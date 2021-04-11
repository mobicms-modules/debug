--
-- Drop tables if exists
--
DROP TABLE IF EXISTS `test`;

--
-- Table structure for table `test`
--
CREATE TABLE `test`
(
    `id`   int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(255)     NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Дамп данных таблицы `test`
--
INSERT INTO `test` (`id`, `name`)
VALUES (1, 'Проверка слуха!'),
       (2, 'Если не слышно - срочно к доктору.'),
       (3, 'Если слышно, то хорошо, продолжаем.'),
       (4, 'Ну и наконец...'),
       (5, 'На этом все.');
