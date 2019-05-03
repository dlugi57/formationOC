-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 mai 2019 à 08:48
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `focus`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adress` text,
  `city` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `contact_by` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `tel`, `email`, `adress`, `city`, `post_code`, `creation_date`, `contact_by`, `description`) VALUES
(1, 'Skwarlinska', '00637676941', 'anna@gmail.com', '1001 av de la batterie', 'Villeneuve Loubet', '6270', '2019-04-18', 1, 'desc'),
(2, 'Dlugosz Piotr', '0637676940', 'dlugiUpdate@gmail.com', 'os Pawlikowskiego 3', 'Zory Kingz', '44247', '2019-04-16', 6, 'bla bla zory'),
(3, 'Stephane', '0063767694', 'anna.dlugosz.fr@gmail.com', 'zory', 'zory', '62700', '2019-01-03', 3, 'blabla'),
(4, 'kamil', '0637676941', 'kamil@gmail.com', 'rybnik', 'rybnil', '44278', '2019-02-12', 4, 'blablavlblksf'),
(5, 'karolin', '00000000000', 'karol@gmail.com', 'kato', '', '6200', '2019-03-13', 4, 'bla'),
(7, 'test', '1234', 'test', 'test', 'test', '123', '2019-04-29', 1, 'test'),
(8, 'name', '666', 'email', 'adress', 'ville', '6270', '2019-04-29', 2, 'desc'),
(10, 'chuj', '1340000000', 'kjnsdf@jbhsdf', 'test', 'test', '12300', '2019-04-30', 3, 'testkjdf'),
(11, 'test', '013', 'test', 'test', 'test', '123', '2019-04-30', 1, 'test'),
(12, 'teste', '1230000000', 'test@hsdh', 'test', 'test', '12300', '2019-04-30', 1, 'chuj'),
(13, 'teste', '123', 'test', 'test', 'test', '123', '2019-04-30', 1, 'test'),
(14, 'test', '12345', 'test', 'test', 'test', '134', '2019-04-30', 4, 'test'),
(15, 'test', '12345', 'test', 'test', 'test', '134', '2019-04-30', 4, 'test'),
(16, 'test', '12345', 'test', 'test', 'test', '134', '2019-04-30', 4, 'test'),
(17, 'test mai ', '0600000000', 'test@test.com', 'zory', 'zory', '44240', '2019-05-01', 1, 'bleee'),
(21, 'teet', '0000000000', 'test@tefgc', 'jnbd', 'jndv', '', '2019-05-02', 1, 'gquhdfchuj'),
(22, 'jihdfjkhdkjfhkjhsdf', '0000000000', '', '', '', '00000', '2019-05-02', 1, ''),
(23, 'test null', '', '', '', '', '', '2019-05-02', 1, ''),
(24, 'test', '0000000000', '', '', '', '', '2019-05-02', 1, ''),
(25, 'ytyze', '0215611651', 'tghbsd@jkhbkdsf.sc', '', '', '', '2019-05-02', 1, ''),
(26, '6545', '6546546456', 'testuje@knjdfg.kjh', ' kbkjl', ',nbn,', '65664', '2019-05-02', 3, 'zmienilem'),
(27, 'dfg', '6546456465', '', '', '', '', '2019-05-02', 1, ''),
(28, 'sdfg', '4156465465', '', '', '', '', '2019-05-02', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

DROP TABLE IF EXISTS `commands`;
CREATE TABLE IF NOT EXISTS `commands` (
  `id_command` int(11) NOT NULL AUTO_INCREMENT,
  `client_id_cmd` int(11) NOT NULL,
  `type_command` varchar(255) NOT NULL,
  `description_command` text,
  `prise_command` int(11) NOT NULL,
  `cost_command` int(11) DEFAULT '0',
  `command_date` date NOT NULL,
  `km_cmd` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_command`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commands`
--

INSERT INTO `commands` (`id_command`, `client_id_cmd`, `type_command`, `description_command`, `prise_command`, `cost_command`, `command_date`, `km_cmd`) VALUES
(1, 1, '5', 'test', 133, 33, '2019-04-24', NULL),
(2, 3, '3', 'test', 135, 0, '2019-04-24', NULL),
(3, 4, '3', 'blabla', 66, 33, '2019-02-12', NULL),
(4, 1, '4', '', 45, 0, '2019-04-15', NULL),
(5, 5, '3', 'karolin', 123, 54, '2019-04-01', 15),
(6, 4, '2', 'lamil tirages', 60, 10, '2019-05-01', 0),
(7, 1, '1', 'test', 110, 11, '2019-05-01', 0),
(17, 2, '1', 'blz', 123, 12, '2019-05-02', 0),
(19, 23, '1', '', 123, 0, '2019-05-02', 0),
(20, 22, '1', '', 35, 21, '2019-05-02', 0),
(21, 22, '1', '', 456, 0, '2019-05-02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact_by`
--

DROP TABLE IF EXISTS `contact_by`;
CREATE TABLE IF NOT EXISTS `contact_by` (
  `id_contact_by` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact_by` varchar(255) NOT NULL,
  `color_camembert` varchar(255) NOT NULL,
  `color_dash` varchar(255) NOT NULL,
  `color_boot` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contact_by`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact_by`
--

INSERT INTO `contact_by` (`id_contact_by`, `nom_contact_by`, `color_camembert`, `color_dash`, `color_boot`) VALUES
(1, 'FaceBook', '#f56954', 'text-red', 'label-danger'),
(2, 'Amis', '#00a65a', 'text-green', 'label-success'),
(3, 'Professionnelle', '#f39c12', 'text-yellow', 'label-warning'),
(4, 'Séance avant', '#00c0ef', 'text-aqua', 'label-info'),
(5, 'Publicité', '#3c8dbc', 'text-light-blue', 'label-primary'),
(6, 'Site', '#d2d6de', 'text-gray', 'label-default');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`, `admin`) VALUES
(1, 'admin', '$2y$10$a31mZGzHecSiW7Y5CPpJuupUx9jbXxvqr0PAAdfvb02xNFmOXsSZa', 'admin@gmail.com', '2019-04-02', 1),
(2, 'utilisateur1', '$2y$10$bCXpW0vNrt8Qz2Hdma2tVuDtW3oTxYB/My8dfQmC0jsi2ZRe.jXgC', 'utilisateur1@gmail.com', '2019-04-15', 0),
(3, 'utilisateur2', '$2y$10$V80IilcJdRXgBP7m7tVY8uoYiv5lrePlDTgaXIqS50jCQd4IletZe', 'utilisateur2@gmail.com', '2019-04-15', 0);

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

DROP TABLE IF EXISTS `seances`;
CREATE TABLE IF NOT EXISTS `seances` (
  `id_seance` int(11) NOT NULL AUTO_INCREMENT,
  `clients_id` int(11) NOT NULL,
  `type` int(255) NOT NULL,
  `creation_date` date NOT NULL,
  `seance_date` date NOT NULL,
  `time_seance` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `prise` int(11) NOT NULL,
  `adresse_seance` text,
  `city_seance` varchar(255) DEFAULT NULL,
  `km` int(11) DEFAULT '0',
  `description_seance` text,
  `depenses` int(11) DEFAULT '0',
  PRIMARY KEY (`id_seance`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seances`
--

INSERT INTO `seances` (`id_seance`, `clients_id`, `type`, `creation_date`, `seance_date`, `time_seance`, `model`, `prise`, `adresse_seance`, `city_seance`, `km`, `description_seance`, `depenses`) VALUES
(1, 1, 1, '2019-04-18', '2019-04-30', NULL, NULL, 110, '', 'antibes', 15, 'blabla', 12),
(2, 2, 2, '2019-04-18', '2019-04-29', NULL, NULL, 150, '', 'biot', 10, 'blablabla', 0),
(3, 2, 3, '2019-04-01', '2019-04-02', NULL, NULL, 100, '', 'cagnes', 10, 'blablabla', 10),
(4, 3, 3, '2019-01-02', '2019-05-16', NULL, NULL, 110, '', 'antibes', 2, 'bla', 0),
(5, 4, 3, '2019-02-13', '2019-06-14', '10:20', 'Bebe', 150, '', 'cannes', 35, 'bla', 5),
(6, 5, 3, '2019-03-13', '2019-03-20', NULL, NULL, 150, '', 'antibes', 4, 'bla', 0),
(14, 2, 5, '2019-05-02', '2019-05-15', '10:15', 'bebe', 120, 'ksiecia', 'zory', 12, 'bla', 12),
(8, 5, 1, '2019-01-15', '2019-08-22', NULL, NULL, 160, NULL, NULL, 0, NULL, 0),
(9, 3, 6, '2019-04-30', '2019-05-18', '10:30', 'Anna & Piotr', 125, 'Wodzio', 'Wodzio', 67, 'love', 25),
(10, 4, 2, '2019-04-30', '2019-06-12', '23:30', 'piotr', 123, 'ksiecia', 'zory', 45, 'blablablavla', 23),
(11, 11, 1, '2019-05-01', '2019-05-22', '15:30', 'bebe', 123, 'powstancow', 'zory', 15, 'zory uks', 12),
(15, 22, 1, '2019-05-02', '2019-05-08', '14:15', '', 45, '', '', 0, '', 0),
(17, 24, 1, '2019-05-02', '2019-05-22', '15:00', '', 6546, '', '', 65, '', 546),
(18, 22, 1, '2019-05-02', '2019-05-23', '', '', 45646, '', '', 54654, '', 666),
(19, 22, 1, '2019-05-02', '2019-05-28', '', '', 123, '', '', 0, '', 0),
(20, 23, 1, '2019-05-02', '2019-05-11', '15:45', '', 669, '', '', 0, '', 0),
(21, 23, 1, '2019-05-02', '2019-05-29', '15:45', '', 123, '', '', 0, '', 0),
(22, 22, 1, '2019-05-02', '2019-05-02', '20:30', '1', 1, '1', '1', 1, '', 1),
(23, 22, 1, '2019-05-02', '2019-05-16', '20:30', '1', 123, '1', '', 1, 'chujeczek', 123),
(24, 22, 1, '2019-05-02', '2019-05-22', '23:00', '', 56, '', '', 0, '', 0),
(25, 21, 1, '2019-05-02', '2019-05-28', '23:00', '', 99, '', '', 0, '', 0),
(26, 23, 1, '2019-05-02', '2019-05-22', '23:00', '', 54, '', '', 0, '', 0),
(27, 22, 1, '2019-05-02', '2019-05-22', '23:00', '', 546, '', '', 0, '', 54);

-- --------------------------------------------------------

--
-- Structure de la table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `tax_date` date NOT NULL,
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_declare` int(11) NOT NULL,
  `tax_paid` int(11) NOT NULL,
  `tax_description` text,
  `taxe_date_add` date DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taxes`
--

INSERT INTO `taxes` (`tax_date`, `tax_id`, `tax_declare`, `tax_paid`, `tax_description`, `taxe_date_add`) VALUES
('2019-02-06', 1, 1500, 35, 'bla bla', '2019-03-01'),
('2019-03-13', 2, 1200, 60, 'chuj', '2019-03-20'),
('2019-04-10', 3, 1300, 60, 'taxe avril', '2019-05-16'),
('2019-01-10', 4, 1300, 67, 'ZA STYCZEN ', '2019-05-01'),
('2019-05-17', 8, 123, 12, '', '2019-05-02');

-- --------------------------------------------------------

--
-- Structure de la table `type_command`
--

DROP TABLE IF EXISTS `type_command`;
CREATE TABLE IF NOT EXISTS `type_command` (
  `id_type_command` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type_command` varchar(255) NOT NULL,
  `cmd_color_boot` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_command`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_command`
--

INSERT INTO `type_command` (`id_type_command`, `nom_type_command`, `cmd_color_boot`) VALUES
(1, 'Box', 'label-danger'),
(2, 'Tirages', 'label-success'),
(3, 'Clef USB', 'label-warning'),
(4, 'Plexiglas', 'label-info'),
(5, 'Album photo', 'label-primary');

-- --------------------------------------------------------

--
-- Structure de la table `type_seance`
--

DROP TABLE IF EXISTS `type_seance`;
CREATE TABLE IF NOT EXISTS `type_seance` (
  `id_type_seance` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(255) NOT NULL,
  `color_camembert` varchar(255) NOT NULL,
  `color_dash` varchar(255) NOT NULL,
  `color_boot` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_seance`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_seance`
--

INSERT INTO `type_seance` (`id_type_seance`, `nom_type`, `color_camembert`, `color_dash`, `color_boot`) VALUES
(1, 'Naissance', '#f56954', 'text-red', 'label-danger'),
(2, 'Grosses', '#00a65a', 'text-green', 'label-success'),
(3, 'Famille', '#f39c12', 'text-yellow', 'label-warning'),
(4, 'Lifestyle', '#00c0ef', 'text-aqua', 'label-info'),
(5, 'Professionnelle', '#3c8dbc', 'text-light-blue', 'label-primary'),
(6, 'Mariage', '#d2d6de', 'text-gray', 'label-default');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
