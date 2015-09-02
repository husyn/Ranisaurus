-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2015 at 06:52 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ranisaur_jml1`
--

-- --------------------------------------------------------

--
-- Table structure for table `jos_wshusyn_category`
--

DROP TABLE IF EXISTS `jos_wshusyn_category`;
CREATE TABLE IF NOT EXISTS `jos_wshusyn_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(2048) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `jos_wshusyn_category`
--

INSERT INTO `jos_wshusyn_category` (`id`, `category`, `published`) VALUES
(2, 'Words Of Wisdom', 1),
(3, 'Smart Questions in any situation', 1),
(4, 'Flat out Mad', 1),
(5, 'Intro', 1),
(6, 'Breaking a Stalemate', 1),
(7, 'Accountability', 1),
(8, 'Forceful Influence', 1),
(9, 'Leadership', 1),
(10, 'Just want to be heard', 1),
(11, 'Intro to bad news', 1),
(12, 'Being asked a question again!', 1),
(13, 'Protecting your slide', 1),
(14, 'Calling someone out (Challenging Information)', 1),
(15, 'Don''t like what you are hearing?', 1),
(16, 'Exit line to any question', 1),
(18, 'Fedup', 1),
(19, 'Deep', 1),
(20, 'Telling someone they will be working late', 1),
(21, 'Don''t know whats going on, but still want to sound smart?', 1),
(22, 'Pretend to be interested', 0),
(23, 'Excusable excuses', 1),
(24, 'If you just want results', 1),
(25, 'Don''t have time', 1),
(26, 'Facing it head-on', 1),
(27, 'When all else fails', 1),
(28, 'More good lines to know', 1),
(33, 'test category husyn', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
