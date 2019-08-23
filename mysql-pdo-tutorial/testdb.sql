CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testdb`;

DROP TABLE IF EXISTS `names`;

CREATE TABLE IF NOT EXISTS `names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `postcode` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

TRUNCATE TABLE `names`;

INSERT INTO `names` (`id`, `firstname`, `lastname`, `postcode`) VALUES
(1, 'Sani', 'Kamal', '781001'),
(2, 'Mala', 'Das', '786001'),
(3, 'Priya', 'Das', '786001'),
(4, 'Maya', 'Thakur', 'No fixed abode'),
(5, 'Jesmine', 'Ahmed', '786004'),
(6, 'Rafik', 'Khan', '786001'),
(7, 'Hasil', 'Khan', '786006'),
(8, 'Rashmi', 'Ahmed', '786005');
