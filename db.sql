SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
--
Database: `mitsdb`
--
-- --------------------------------------------------------
--
-- Table structure for table `orders`
--CREATE TABLE IF NOT EXISTS `orders` (
`id` int(15) NOT NULL auto_increment,
`payment_to` varchar(255) NOT NULL,
`total` int(15) NOT NULL,
`date` timestamp NOT NULL default CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
-- Dumping data for table `orders`
--
INSERT INTO `orders` (`id`,`payment_to`,`total`) VALUES
(1, 'Office', 0),
(2, 'Canteen',0),
(3, 'MITS Cafe', 0),
(4, 'Library', 0),
(5, 'Store', 0),
(6, 'Cafteria', 0),
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL auto_increment,
`fname` varchar(255) NOT NULL,
`lname` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(100) NOT NULL,
`pin` int(6) NOT NULL,
`email` varchar(255) NOT NULL,
`password` varchar(15) NOT NULL,
`wallet` decimal(10,2) default 10,
`type` varchar(20) NOT NULL default 'user',
`total_paid` decimal(20,2),
`answer` varchar(255) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`,`email`, `password`, `type`, `total_paid`, `answer`)
VALUES
(1, 'Jeswin', 'Eldho', 'MITS', 'Varikoli', 636669,'jeswineldhosaji@mitscoin.com', '666666', 'admin',0,'jes200'),
(2, 'Juliya', 'Francis', 'MITS', 'Varikoli', 666666,'juliyafrancis@mitscoin.com', '111111', 'user',0,'jfz242');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE IF NOT EXISTS `user_log` (
`id` int(15) NOT NULL auto_increment,
`payment_to` varchar(255) NOT NULL,
`current_total` int(15) NOT NULL,
`date_now` timestamp NOT NULL default CURRENT_TIMESTAMP,
`email` varchar(255) NOT NULL,PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
