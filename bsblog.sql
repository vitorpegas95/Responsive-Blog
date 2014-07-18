-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2014 at 11:26 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `small` text NOT NULL,
  `author` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `message`, `date`, `img`, `small`, `author`) VALUES
(2, 'Article #0', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 20:33:25', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(3, 'Article #2', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 19:33:25', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(4, 'Article #3', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 15:33:25', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(5, 'Article #4', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 12:33:25', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(6, 'Article #5', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 03:33:25', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(7, 'Article #6', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 21:12:26', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(8, 'Article #7', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-03 21:53:05', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(9, 'Article #8', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-01 21:33:26', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(10, 'Article #9', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>', '2014-07-02 07:49:50', 'img/image.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><p>Aenean commodo ligula eget dolor. Aenean massa.</p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesq...', ''),
(15, 'My GTA V Garage', '&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.<br />\r\n<br />\r\n&lt;a href=&quot;#&quot;&gt;Nullam&lt;/a&gt; dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.<br />\r\n<br />\r\nNam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.<br />\r\n<br />\r\nDonec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut', '2014-07-15 19:37:30', 'uploads/images/picture53c582fa2fde46.63963044.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate', 'vitorpegas'),
(16, 'Test', 'ASFSFSAFSAFS<br />\r\n<b>Hello</b><br />\r\n<a href="#">Link</a>', '2014-07-15 19:38:45', 'uploads/images/picture53c5834507a745.96654913.jpg', 'DFASSFS', 'vitorpegas');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `site_name` varchar(100) NOT NULL DEFAULT 'BsBlog',
  `site_welcome` varchar(140) NOT NULL DEFAULT 'Welcome to my Bootstrap Blog!',
  `site_slogan` varchar(500) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.',
  `site_about` text NOT NULL,
  `results_limit` tinyint(2) NOT NULL DEFAULT '15',
  `contact_mail` varchar(100) NOT NULL DEFAULT 'mail@mail.com',
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `google` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `pinterest` varchar(200) NOT NULL,
  `tumblr` varchar(200) NOT NULL,
  `flickr` varchar(200) NOT NULL,
  `myspace` varchar(200) NOT NULL,
  `askfm` varchar(200) NOT NULL,
  PRIMARY KEY (`site_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`site_name`, `site_welcome`, `site_slogan`, `site_about`, `results_limit`, `contact_mail`, `facebook`, `twitter`, `google`, `linkedin`, `instagram`, `pinterest`, `tumblr`, `flickr`, `myspace`, `askfm`) VALUES
('bsblog', 'Welcome to my Blog!', 'Slogan', 'My Awesome Blog is awesome!', 10, 'contact@site.com', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE IF NOT EXISTS `navbar` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `dropdown` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `label`, `link`, `dropdown`) VALUES
(1, 'Home', 'index.php', 0),
(3, 'About', 'about.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(26) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(130) NOT NULL,
  `rights` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `rights`) VALUES
(1, 'admin', 'bsblog', 'admin@yoursite.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1),
(3, 'vitorpegas', 'Vitor P&ecirc;gas2', 'vitorpegas95@gmail.com', '7c5e0a90c54e17a0d2cd42a5966b4e8a8683b5fb4f133714b8b626142719d19c8ffbd75adef92b9aedb7ed01c62e4e383202f75bfc9853ebf625706eaa8280de', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
