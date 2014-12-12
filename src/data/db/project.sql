-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 09 Décembre 2014 à 10:37
-- Version du serveur: 5.5.37
-- Version de PHP: 5.4.4-14+deb7u10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `otherwork`
--

CREATE TABLE IF NOT EXISTS `otherwork` (
  `id_otherwork` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `techno` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(256) NOT NULL,
  PRIMARY KEY (`id_otherwork`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `otherwork`
--

INSERT INTO `otherwork` (`id_otherwork`, `picture`, `name`, `techno`, `description`, `link`) VALUES
(1, 'Shaco_Splash_52.png', 'ThisIsAtestEdit', 'Photoshop', 'ThisIsAtestEdit', 'http://www.project.dev/OtherWork-add/'),
(2, '280px-Jean_Bart_Cuirasse_1913.png', 'ThisIsAtest2', 'Photoshop', 'ThisIsAtest2', 'http://www.project.dev/OtherWork-add/');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `level` int(11) NOT NULL,
  `experience` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `id_category`, `description`, `level`, `experience`) VALUES
(1, 1, 'Essai', 4, '3 ans plus'),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rutrum, neque eget tempus ullamcorper, arcu purus elementum magna, at luctus nisl risus ut tortor. Pellentesque dapibus viverra erat ac venenatis. Aliquam at libero consectetur, commodo ligula', 4, '3 ans plus'),
(3, 7, 'sdf', 45, 'sdf');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'root', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `web`
--

CREATE TABLE IF NOT EXISTS `web` (
  `web_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_title` varchar(256) NOT NULL,
  `web_url` text NOT NULL,
  `web_feature` varchar(256) NOT NULL,
  `web_language` varchar(256) NOT NULL,
  `web_description` text NOT NULL,
  `web_technology` varchar(256) NOT NULL,
  `web_upload` varchar(256) NOT NULL,
  PRIMARY KEY (`web_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `web`
--

INSERT INTO `web` (`web_id`, `web_title`, `web_url`, `web_feature`, `web_language`, `web_description`, `web_technology`, `web_upload`) VALUES
(2, 'Portfolio', 'www.project.dev', 'Zend', 'PHP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet turpis lectus. Mauris pellentesque condimentum ullamcorper. Pellentesque efficitur sit amet sapien vitae eleifend. Suspendisse justo ante, pulvinar id interdum quis, elementum at erat. Vivamus ultricies congue est a ultricies. Aliquam erat volutpat. Donec vitae diam est. Aliquam ipsum ex, placerat id consectetur non, imperdiet quis nisi. In pulvinar consequat pellentesque. Nunc hendrerit urna a varius accumsan. Suspendisse posuere erat felis. Nam efficitur, velit at semper aliquet, erat erat lacinia felis, ac aliquet enim quam et nisi.', 'PHP', 'Portfolio.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
