-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 mai 2019 à 21:53
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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `tel`, `email`, `adress`, `city`, `post_code`, `creation_date`, `contact_by`, `description`) VALUES
(1, 'Eric Gilliam', '09 18 13 89 51', 'condimentum.Donec.at@NulladignissimMaecenas.net', '3638 Elementum, St.', 'Valley East', '66292', '2019-02-18', 5, 'Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius.'),
(2, 'Davis Eaton', '02 20 17 21 46', 'orci.luctus@lacusCrasinterdum.edu', 'P.O. Box 170, 8451 Nulla St.', 'Spruce Grove', '82026', '2019-01-29', 5, 'hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer,'),
(3, 'Carson Fleming', '03 86 97 35 35', 'Integer.aliquam.adipiscing@morbi.com', '497-7610 Integer St.', 'Roosendaal', '72433', '2019-03-04', 5, 'ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus.'),
(4, 'Hyatt Carney', '03 32 69 59 83', 'adipiscing.Mauris@ametlorem.com', 'P.O. Box 426, 4004 Arcu Ave', 'Baiso', '56542', '2019-02-03', 6, 'purus. Maecenas libero est, congue a, aliquet vel, vulputate eu,'),
(5, 'Forrest Carver', '05 75 92 35 46', 'metus.facilisis.lorem@arcu.edu', 'Ap #103-9194 Donec St.', 'Montgomery', '66751', '2019-04-07', 4, 'nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus.'),
(6, 'Amir Bauer', '04 19 37 31 72', 'at.augue@cursusdiamat.edu', 'Ap #335-9937 Dolor Ave', 'Tauranga', '69540', '2019-03-02', 2, 'Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum'),
(7, 'Akeem Black', '09 62 20 14 18', 'Vivamus@orciluctuset.org', '998-366 Elementum Ave', 'Stamford', '80913', '2019-01-01', 2, 'mollis lectus pede et risus. Quisque libero lacus, varius et,'),
(8, 'Grady Chang', '03 34 16 21 88', 'a.aliquet.vel@turpisnonenim.org', 'P.O. Box 938, 9136 Donec Av.', 'Malonne', '43560', '2019-01-16', 3, 'sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis'),
(9, 'Brennan English', '06 00 39 20 12', 'a.tortor.Nunc@rhoncusid.net', 'Ap #521-6707 Pharetra Street', 'Lo Barnechea', '80111', '2019-05-04', 2, 'neque. In ornare sagittis felis. Donec tempor, est ac mattis'),
(10, 'Guy Owens', '06 38 84 91 67', 'Vivamus.non@pedeblandit.net', 'Ap #750-2152 Mauris Ave', 'Murdochville', '83944', '2019-03-26', 4, 'auctor, nunc nulla vulputate dui, nec tempus mauris erat eget'),
(11, 'Ryder Yates', '07 70 07 45 81', 'quis.arcu.vel@semmolestie.co.uk', '497-1148 Malesuada St.', 'Racine', '91063', '2019-03-11', 6, 'enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum'),
(12, 'Rogan Humphrey', '0193047138', 'ullamcorper.viverra.Maecenas@sociisnatoque.org', 'P.O. Box 455, 7443 Gravida. Avenue', 'Pemberton', '10249', '2019-02-03', 6, 'dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis.'),
(13, 'Wallace Moreno', '08 77 43 44 06', 'amet.faucibus@ullamcorpernisl.com', '9798 Mauris Rd.', 'Linton', '36938', '2019-01-10', 3, 'tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a'),
(14, 'Lee Barlow', '06 01 64 54 49', 'dolor@tellusjustosit.org', 'Ap #225-8972 Tempor Rd.', 'São Luís', '59313', '2019-01-27', 1, 'neque. In ornare sagittis felis. Donec tempor, est ac mattis'),
(15, 'Tad Guthrie', '05 12 39 92 38', 'cursus.vestibulum.Mauris@aliquetPhasellus.org', 'Ap #115-7005 Donec Av.', 'Drayton Valley', '01946', '2019-02-07', 3, 'enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum,'),
(16, 'Tanner Ochoa', '08 51 18 84 84', 'et.netus@vitae.co.uk', 'Ap #797-1883 Ut St.', 'Hengelo', '04209', '2019-03-07', 3, 'eget mollis lectus pede et risus. Quisque libero lacus, varius'),
(17, 'Xanthus Espinoza', '01 43 37 18 17', 'enim.nisl.elementum@metuseu.co.uk', '3072 Placerat, Road', 'Comeglians', '96917', '2019-04-07', 3, 'elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum'),
(18, 'Griffith Wise', '09 93 67 47 98', 'arcu.imperdiet@commodo.net', 'P.O. Box 817, 2196 At, Street', 'Bridgeport', '54369', '2019-03-26', 5, 'at arcu. Vestibulum ante ipsum primis in faucibus orci luctus'),
(19, 'Kieran Hendricks', '09 34 71 37 47', 'lacinia@sapiencursus.co.uk', '3686 Rhoncus. Av.', 'Königs Wusterhausen', '95665', '2019-03-13', 3, 'at arcu. Vestibulum ante ipsum primis in faucibus orci luctus'),
(20, 'Basil Petty', '06 60 43 39 45', 'varius.ultrices.mauris@estacfacilisis.org', '2224 Dolor St.', 'Pimpri-Chinchwad', '39619', '2019-03-10', 3, 'posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet'),
(21, 'Emmanuel Garrison', '03 07 00 01 68', 'luctus.aliquet@odio.edu', '4391 Felis Rd.', 'Banchory', '18994', '2019-04-07', 5, 'fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem'),
(22, 'Mannix Branch', '09 93 36 70 91', 'et.commodo.at@vitaeodio.edu', 'P.O. Box 919, 6323 Eleifend Avenue', 'Aubange', '35612', '2019-01-19', 1, 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus'),
(23, 'Ian Michael', '05 31 13 79 28', 'semper.erat@pede.co.uk', 'P.O. Box 997, 6394 Imperdiet Rd.', 'Porto Alegre', '42128', '2019-04-09', 2, 'et netus et malesuada fames ac turpis egestas. Aliquam fringilla'),
(24, 'Cody Monroe', '07 66 84 50 29', 'fringilla@tincidunt.org', 'Ap #208-3997 Dolor Road', 'Springfield', '34963', '2019-03-18', 3, 'mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus'),
(25, 'Merrill Swanson', '01 66 56 30 74', 'placerat@Maecenasiaculis.ca', '5604 Duis Rd.', 'Kaiserslauter', '84422', '2019-01-14', 5, 'ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci'),
(26, 'Jerry Lang', '08 70 13 94 81', 'sed.pede.nec@necorci.ca', '402-3184 Augue. Avenue', 'Perinaldo', '10581', '2019-02-07', 5, 'ipsum leo elementum sem, vitae aliquam eros turpis non enim.'),
(27, 'Sebastian Bruce', '02 68 44 24 29', 'non.enim.commodo@urna.ca', 'P.O. Box 829, 6446 Pede Rd.', 'Leerbeek', '12080', '2019-02-25', 6, 'Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus.'),
(28, 'Igor Nash', '09 39 91 22 84', 'velit.Quisque@elit.net', '656-490 Semper Av.', 'Mattersburg', '57655', '2019-02-15', 3, 'ac orci. Ut semper pretium neque. Morbi quis urna. Nunc'),
(29, 'Hashim Barry', '01 79 45 63 45', 'euismod.et@ligulaNullamenim.co.uk', 'P.O. Box 753, 1715 Dolor Road', 'Villers-la-Bonne-Eau', '28741', '2019-02-28', 6, 'dui. Cum sociis natoque penatibus et magnis dis parturient montes,'),
(30, 'Ryan Salazar', '04 64 23 63 98', 'non@Donec.org', '186-7853 Primis Rd.', 'Winchester', '91338', '2019-03-20', 5, 'ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam'),
(31, 'Porter William', '04 88 99 46 94', 'ac@velitPellentesqueultricies.org', 'P.O. Box 863, 1820 Eros. Av.', 'Saint-Médard-en-Jalles', '20946', '2019-02-22', 1, 'Maecenas libero est, congue a, aliquet vel, vulputate eu, odio.'),
(32, 'Acton Suarez', '05 78 75 78 06', 'mi.fringilla@consectetuer.ca', '7649 Pellentesque, Road', 'Essex', '47239', '2019-04-08', 4, 'pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero'),
(33, 'Kasper Bradshaw', '01 49 46 00 69', 'mattis.semper.dui@augue.org', '831-6583 Pulvinar Avenue', 'Rödermark', '46641', '2019-01-09', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor,'),
(34, 'Ezra Richard', '06 60 26 76 93', 'et.magnis.dis@nibhvulputate.org', 'Ap #496-5328 Ligula Ave', 'Sulzano', '49943', '2019-04-05', 2, 'dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero.'),
(35, 'Hilel Dillon', '07 04 15 48 48', 'mus.Proin.vel@Mauris.net', 'Ap #778-8613 Penatibus Rd.', 'Idaho Falls', '75989', '2019-04-21', 5, 'id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut'),
(36, 'Ferris Fitzpatrick', '0340205645', 'sagittis@ultrices.com', 'P.O. Box 806, 8373 Enim. Street', 'Overrepen', '04877', '2019-05-05', 5, 'vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat'),
(37, 'Zeph Soto', '05 63 53 81 77', 'ipsum.cursus.vestibulum@luctus.com', 'Ap #204-812 Accumsan Road', 'Slough', '89305', '2019-03-26', 3, 'cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam'),
(38, 'Dalton Cohen', '07 36 58 45 95', 'vulputate.eu.odio@interdumfeugiatSed.org', 'Ap #393-6912 A, Ave', 'Wandlitz', '44339', '2019-03-26', 6, 'luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis.');

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
(1, 4, '2', 'mi lacinia mattis. Integer eu', 203, 148, '2019-01-29', 43),
(2, 5, '1', 'in faucibus orci luctus et', 108, 88, '2019-03-01', 35),
(3, 1, '4', 'nec, cursus a, enim. Suspendisse', 181, 86, '2019-04-13', 12),
(4, 10, '1', 'aliquam iaculis, lacus pede sagittis', 161, 116, '2019-04-19', 27),
(5, 15, '1', 'massa non ante bibendum ullamcorper.', 203, 42, '2019-02-12', 16),
(6, 22, '3', 'mi. Aliquam gravida mauris ut', 201, 112, '2019-04-05', 11),
(7, 17, '3', 'eu, eleifend nec, malesuada ut,', 226, 145, '2019-02-16', 9),
(8, 22, '2', 'a sollicitudin orci sem eget', 122, 114, '2019-04-22', 46),
(9, 4, '1', 'nec luctus felis purus ac', 160, 61, '2019-01-10', 15),
(10, 10, '3', 'ornare, lectus ante dictum mi,', 190, 124, '2019-01-15', 47),
(11, 2, '2', 'Phasellus dolor elit, pellentesque a,', 176, 88, '2019-02-06', 25),
(12, 19, '5', 'egestas, urna justo faucibus lectus,', 225, 101, '2019-04-01', 6),
(13, 16, '3', 'felis ullamcorper viverra. Maecenas iaculis', 193, 62, '2019-04-24', 34),
(14, 14, '3', 'mauris, rhoncus id, mollis nec,', 121, 73, '2019-03-30', 13),
(15, 2, '5', 'adipiscing non, luctus sit amet,', 210, 101, '2019-01-04', 44),
(16, 6, '2', 'eget odio. Aliquam vulputate ullamcorper', 229, 120, '2019-03-08', 49),
(17, 23, '3', 'fermentum metus. Aenean sed pede', 141, 56, '2019-03-23', 40),
(18, 13, '3', 'ipsum porta elit, a feugiat', 129, 148, '2019-04-02', 12),
(19, 26, '4', 'cursus et, magna. Praesent interdum', 153, 67, '2019-01-28', 48),
(20, 10, '2', 'magna. Phasellus dolor elit, pellentesque', 159, 21, '2019-02-20', 42),
(21, 36, '1', '', 100, 10, '2019-05-09', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`, `admin`) VALUES
(1, 'admin', '$2y$10$a31mZGzHecSiW7Y5CPpJuupUx9jbXxvqr0PAAdfvb02xNFmOXsSZa', 'admin@gmail.com', '2019-04-02', 1),
(2, 'utilisateur1', '$2y$10$bCXpW0vNrt8Qz2Hdma2tVuDtW3oTxYB/My8dfQmC0jsi2ZRe.jXgC', 'utilisateur1@gmail.com', '2019-04-15', 0),
(3, 'utilisateur2', '$2y$10$V80IilcJdRXgBP7m7tVY8uoYiv5lrePlDTgaXIqS50jCQd4IletZe', 'utilisateur2@gmail.com', '2019-04-15', 2),
(4, 'utilisateur4', '$2y$10$zRJ9WNp5mONW4KO7lUm2YuVrJDKUNHosVjTgcyVC2H1yiHi1ubLdK', 'utilisateur4@gmail.com', '2019-05-03', 2),
(5, 'utilisateur5', '$2y$10$Ups490Gyp1LivxEBxY.mwO3yX99NrIGKfxj3yfvjttyDGryzAb5gO', 'utilisateur5@gmail.com', '2019-05-03', 0),
(7, 'utilisateur3', '$2y$10$mw3xDGL9Ukxqd4fRYf97NubyjcivLQuRT/xFAjq.6FBnZPN3TJzLC', 'utilisateur3@test.com', '2019-05-03', 0),
(8, 'utilisateur6', '$2y$10$f0tStk5ZwkXKiuIqT/8uiObrVZm9XFqP4xeATQUoJEni23l0.zFTC', 'utilisateur6@gmail.com', '2019-05-04', 0),
(9, 'utilisateur7', '$2y$10$OUbgGm3iO.7mxgdr9rUXNOghQXLEcDbgyLQ1inUw6HPUwV1wePD76', 'utilisateur7@gmail.com', '2019-05-06', 0),
(10, 'Anna Dlugosz', '$2y$10$VqETWkIT1lxs6EDT8GrC4uMwH5BSgsq4wFRHKLRzYXK/iSxX9mS66', 'sunnymomentsphotos@gmail.com', '2019-05-09', 1),
(11, 'utilisateur8', '$2y$10$mpQWtKEuWtAK50gsiW.sZOsut/c..8ylj07WG2UBExD.XQ/a.2HJC', 'utilisateur8@gmail.com', '2019-05-10', 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seances`
--

INSERT INTO `seances` (`id_seance`, `clients_id`, `type`, `creation_date`, `seance_date`, `time_seance`, `model`, `prise`, `adresse_seance`, `city_seance`, `km`, `description_seance`, `depenses`) VALUES
(1, 10, 2, '2019-04-20', '2019-05-14', '23:30', 'Fredericka', 178, 'P.O. Box 780, 9514 Natoque St.', 'Durg', 41, 'urna convallis erat, eget tincidunt', 30),
(2, 13, 6, '2019-05-07', '2019-09-18', '12:26', 'Cheryl', 261, '503-3324 Et, Ave', 'Buxton', 12, 'pede, ultrices a, auctor non,', 13),
(3, 12, 2, '2019-03-14', '2019-07-16', '10:57', 'Kaseem', 235, '217-5897 Purus, Ave', 'Whitehaven', 25, 'nibh. Aliquam ornare, libero at', 28),
(4, 11, 1, '2019-04-10', '2019-09-18', '21:14', 'Ginger', 229, 'Ap #587-9669 Donec Av.', 'Bala', 5, 'sapien. Aenean massa. Integer vitae', 30),
(5, 13, 5, '2019-01-05', '2019-06-24', '17:13', 'Kibo', 229, 'Ap #314-3502 Felis. Road', 'Te Awamutu', 3, 'turpis. Nulla aliquet. Proin velit.', 15),
(6, 21, 4, '2019-05-08', '2019-01-24', '19:13', 'Riley', 256, '9377 Tempus Ave', 'Sagar', 10, 'at, velit. Cras lorem lorem,', 26),
(7, 14, 4, '2019-01-31', '2019-01-13', '00:00', 'Lucius', 203, '5228 Sagittis St.', 'Port Alice', 38, 'Cras interdum. Nunc sollicitudin commodo', 27),
(8, 21, 4, '2019-02-03', '2019-06-29', '19:04', 'Alden', 108, '7072 Quisque St.', 'Belmont', 25, 'nonummy ultricies ornare, elit elit', 10),
(9, 25, 3, '2019-03-12', '2019-04-30', '22:11', 'Valentine', 164, '107-9780 Ac Avenue', 'Borghetto di Vara', 27, 'posuere, enim nisl elementum purus,', 16),
(10, 9, 5, '2019-04-24', '2019-01-15', '18:00', 'Carson', 101, 'P.O. Box 555, 2306 In St.', 'Hanret', 36, 'Curabitur consequat, lectus sit amet', 25),
(11, 22, 3, '2019-02-05', '2019-01-28', '03:34', 'Nayda', 285, 'Ap #602-5025 Eu, Avenue', 'Drongen', 8, 'Cras lorem lorem, luctus ut,', 11),
(12, 5, 3, '2019-04-10', '2019-09-08', '15:47', 'Dieter', 182, 'P.O. Box 664, 938 Non, St.', 'Petorca', 26, 'sodales purus, in molestie tortor', 22),
(13, 12, 1, '2019-03-26', '2019-01-08', '15:00', 'Lev', 248, '722 Sed Rd.', 'Bremerhaven', 15, 'nec orci. Donec nibh. Quisque', 30),
(14, 15, 2, '2019-01-20', '2019-04-21', '20:16', 'Stuart', 133, 'P.O. Box 232, 5356 Eu St.', 'Wyoming', 20, 'tincidunt, neque vitae semper egestas,', 24),
(15, 5, 2, '2019-01-21', '2019-01-10', '18:26', 'Brent', 128, 'Ap #153-203 Magna. Street', 'Sant\'Angelo in Pontano', 30, 'lorem, auctor quis, tristique ac,', 12),
(16, 9, 4, '2019-01-29', '2019-03-26', '07:09', 'Debra', 155, '1751 Non Avenue', 'Rae Lakes', 33, 'parturient montes, nascetur ridiculus mus.', 15),
(17, 10, 5, '2019-04-25', '2019-02-02', '11:29', 'Karleigh', 265, '439-4752 Mauris Road', 'Flensburg', 2, 'blandit. Nam nulla magna, malesuada', 14),
(18, 18, 4, '2019-02-11', '2019-06-05', '03:47', 'September', 271, 'Ap #165-8450 In Rd.', 'Nemi', 8, 'Ut sagittis lobortis mauris. Suspendisse', 27),
(19, 2, 1, '2019-02-20', '2019-01-15', '05:33', 'Jaden', 160, '567-2704 Primis Ave', 'Purnea', 31, 'magnis dis parturient montes, nascetur', 14),
(20, 17, 3, '2019-04-21', '2019-04-08', '23:25', 'Cameron', 100, '419-6344 Pellentesque Road', 'Novoli', 12, 'ac urna. Ut tincidunt vehicula', 29),
(21, 8, 2, '2019-02-02', '2019-09-14', '03:40', 'Erica', 184, '3668 Odio. Avenue', 'Toulouse', 45, 'erat, eget tincidunt dui augue', 26),
(22, 26, 6, '2019-02-20', '2019-08-12', '21:22', 'Tad', 266, '9708 Facilisi. Rd.', 'Tofield', 32, 'nascetur ridiculus mus. Donec dignissim', 24),
(23, 10, 2, '2019-04-20', '2019-05-14', '23:30', 'Fredericka', 178, 'P.O. Box 780, 9514 Natoque St.', 'Durg', 41, 'urna convallis erat, eget tincidunt', 30),
(24, 13, 6, '2019-05-07', '2019-09-18', '12:26', 'Cheryl', 261, '503-3324 Et, Ave', 'Buxton', 12, 'pede, ultrices a, auctor non,', 13),
(25, 12, 2, '2019-03-14', '2019-07-16', '10:57', 'Kaseem', 235, '217-5897 Purus, Ave', 'Whitehaven', 23, 'nibh. Aliquam ornare, libero at', 28),
(26, 11, 1, '2019-04-10', '2019-09-18', '21:14', 'Ginger', 229, 'Ap #587-9669 Donec Av.', 'Bala', 5, 'sapien. Aenean massa. Integer vitae', 30),
(27, 13, 5, '2019-01-05', '2019-06-24', '17:13', 'Kibo', 229, 'Ap #314-3502 Felis. Road', 'Te Awamutu', 3, 'turpis. Nulla aliquet. Proin velit.', 15),
(28, 21, 4, '2019-05-08', '2019-01-24', '19:13', 'Riley', 256, '9377 Tempus Ave', 'Sagar', 10, 'at, velit. Cras lorem lorem,', 26),
(29, 14, 4, '2019-01-31', '2019-01-13', '00:00', 'Lucius', 203, '5228 Sagittis St.', 'Port Alice', 38, 'Cras interdum. Nunc sollicitudin commodo', 27),
(30, 21, 4, '2019-02-03', '2019-06-29', '19:04', 'Alden', 108, '7072 Quisque St.', 'Belmont', 25, 'nonummy ultricies ornare, elit elit', 10),
(31, 25, 3, '2019-03-12', '2019-04-30', '22:11', 'Valentine', 164, '107-9780 Ac Avenue', 'Borghetto di Vara', 27, 'posuere, enim nisl elementum purus,', 16),
(32, 9, 5, '2019-04-24', '2019-01-15', '18:00', 'Carson', 101, 'P.O. Box 555, 2306 In St.', 'Hanret', 36, 'Curabitur consequat, lectus sit amet', 25),
(33, 22, 3, '2019-02-05', '2019-01-28', '03:34', 'Nayda', 285, 'Ap #602-5025 Eu, Avenue', 'Drongen', 8, 'Cras lorem lorem, luctus ut,', 11),
(34, 5, 3, '2019-04-10', '2019-09-08', '15:47', 'Dieter', 182, 'P.O. Box 664, 938 Non, St.', 'Petorca', 26, 'sodales purus, in molestie tortor', 22),
(35, 12, 1, '2019-03-26', '2019-01-08', '15:00', 'Lev', 248, '722 Sed Rd.', 'Bremerhaven', 15, 'nec orci. Donec nibh. Quisque', 30),
(36, 15, 2, '2019-01-20', '2019-04-21', '20:16', 'Stuart', 133, 'P.O. Box 232, 5356 Eu St.', 'Wyoming', 20, 'tincidunt, neque vitae semper egestas,', 24),
(37, 5, 2, '2019-01-21', '2019-01-10', '18:26', 'Brent', 128, 'Ap #153-203 Magna. Street', 'Sant\'Angelo in Pontano', 30, 'lorem, auctor quis, tristique ac,', 12),
(38, 9, 4, '2019-01-29', '2019-03-26', '07:09', 'Debra', 155, '1751 Non Avenue', 'Rae Lakes', 33, 'parturient montes, nascetur ridiculus mus.', 15),
(39, 10, 5, '2019-04-25', '2019-02-02', '11:29', 'Karleigh', 265, '439-4752 Mauris Road', 'Flensburg', 2, 'blandit. Nam nulla magna, malesuada', 14),
(40, 18, 4, '2019-02-11', '2019-06-05', '03:47', 'September', 271, 'Ap #165-8450 In Rd.', 'Nemi', 8, 'Ut sagittis lobortis mauris. Suspendisse', 27),
(41, 2, 1, '2019-02-20', '2019-01-15', '05:33', 'Jaden', 160, '567-2704 Primis Ave', 'Purnea', 31, 'magnis dis parturient montes, nascetur', 14),
(42, 17, 3, '2019-04-21', '2019-04-08', '23:25', 'Cameron', 100, '419-6344 Pellentesque Road', 'Novoli', 12, 'ac urna. Ut tincidunt vehicula', 29),
(43, 8, 2, '2019-02-02', '2019-09-14', '03:40', 'Erica', 184, '3668 Odio. Avenue', 'Toulouse', 45, 'erat, eget tincidunt dui augue', 26),
(44, 26, 6, '2019-02-20', '2019-08-12', '21:22', 'Tad', 266, '9708 Facilisi. Rd.', 'Tofield', 32, 'nascetur ridiculus mus. Donec dignissim', 24),
(45, 2, 1, '2019-01-20', '2019-06-28', '23:02', 'Shafira', 254, 'P.O. Box 842, 312 Et Road', 'Pila', 18, 'arcu et pede. Nunc sed', 21),
(46, 11, 1, '2019-01-05', '2019-05-23', '13:23', 'Arden', 232, 'P.O. Box 956, 2817 Nec Ave', 'Auburn', 10, 'lobortis mauris. Suspendisse aliquet molestie', 12),
(47, 29, 3, '2019-02-17', '2019-06-10', '20:16', 'Sade', 147, 'P.O. Box 106, 2293 Enim. Av.', 'Pictou', 25, 'nec, eleifend non, dapibus rutrum,', 16),
(48, 8, 3, '2019-03-01', '2019-05-17', '20:01', 'Felicia', 179, 'P.O. Box 501, 1549 Rutrum Road', 'Callander', 14, 'luctus aliquet odio. Etiam ligula', 21),
(49, 12, 6, '2019-04-02', '2019-09-23', '00:38', 'Lois', 178, '961-8749 Vulputate, Rd.', 'Mondolfo', 1, 'tellus faucibus leo, in lobortis', 30),
(50, 24, 3, '2019-04-02', '2019-06-23', '20:18', 'Burke', 227, 'Ap #115-3746 Ut Ave', 'Neyveli', 12, 'Nam ligula elit, pretium et,', 16),
(51, 21, 5, '2019-02-03', '2019-08-09', '07:37', 'Cadman', 272, '9589 In Street', 'Oswestry', 5, 'a, malesuada id, erat. Etiam', 17),
(52, 18, 4, '2019-02-13', '2019-03-28', '14:56', 'Lucian', 215, '9912 Fusce Av.', 'Neuville', 38, 'interdum. Nunc sollicitudin commodo ipsum.', 30),
(53, 8, 1, '2019-04-29', '2019-04-05', '17:07', 'Sierra', 141, 'Ap #263-5180 Feugiat Av.', 'Saint-Rhémy-en-Bosses', 17, 'et libero. Proin mi. Aliquam', 19),
(54, 11, 6, '2019-01-02', '2019-01-26', '10:36', 'Yoshi', 172, '5350 Arcu. Ave', 'Dollard-des-Ormeaux', 50, 'nisi nibh lacinia orci, consectetuer', 10),
(55, 26, 4, '2019-04-24', '2019-05-27', '21:22', 'Tad', 266, '5652 Lacus. Rd.', 'Berlin', 33, 'adipiscing elit. Curabitur sed tortor.', 15),
(56, 14, 3, '2019-02-14', '2019-05-15', '23:20', 'Alan', 201, '806-8869 Lorem Avenue', 'Linares', 7, 'erat nonummy ultricies ornare, elit', 18),
(57, 11, 3, '2019-02-10', '2019-01-17', '01:50', 'Carl', 106, 'P.O. Box 185, 6400 Metus Ave', 'Beerzel', 8, 'ante ipsum primis in faucibus', 21),
(58, 29, 3, '2019-02-19', '2019-07-22', '02:08', 'Ryan', 297, 'Ap #588-5156 Et Rd.', 'Kearney', 34, 'at pede. Cras vulputate velit', 22),
(59, 21, 5, '2019-02-23', '2019-07-24', '16:03', 'Aaron', 292, '2559 Nibh. Avenue', 'Porirua', 7, 'ut, sem. Nulla interdum. Curabitur', 18),
(60, 28, 3, '2019-01-05', '2019-03-29', '15:48', 'Jerome', 146, '338-3124 Netus St.', 'Perinaldo', 38, 'sagittis. Duis gravida. Praesent eu', 27),
(61, 11, 3, '2019-02-24', '2019-03-02', '04:48', 'Brenna', 248, '124-3823 Magna. Ave', 'Zutphen', 31, 'Integer in magna. Phasellus dolor', 12),
(62, 24, 2, '2019-01-17', '2019-03-05', '11:21', 'Lucas', 262, 'Ap #990-6914 Proin Road', 'Paillaco', 17, 'est tempor bibendum. Donec felis', 16),
(63, 14, 6, '2019-04-22', '2019-05-04', '18:20', 'Chantale', 222, '696-177 Eget Road', 'Warren', 47, 'ante. Nunc mauris sapien, cursus', 15),
(64, 2, 5, '2019-02-28', '2019-02-01', '04:35', 'Wyatt', 238, 'Ap #998-2045 Orci Avenue', 'Soverzene', 37, 'velit. Quisque varius. Nam porttitor', 25),
(65, 14, 4, '2019-01-07', '2019-07-06', '16:21', 'Tobias', 223, 'Ap #550-2703 Interdum. Av.', 'Glabais', 12, 'est, vitae sodales nisi magna', 21),
(66, 5, 1, '2019-01-27', '2019-09-22', '17:02', 'Owen', 226, '799-5607 Dolor. Road', 'Grand Rapids', 21, 'Nulla dignissim. Maecenas ornare egestas', 18),
(67, 10, 4, '2019-04-07', '2019-03-24', '19:41', 'Armand', 127, 'P.O. Box 338, 1605 Convallis Av.', 'Kester', 34, 'dis parturient montes, nascetur ridiculus', 27),
(68, 8, 1, '2019-04-04', '2019-08-17', '20:31', 'Adena', 151, 'P.O. Box 844, 1814 Ut, Av.', 'Recanati', 46, 'ligula tortor, dictum eu, placerat', 30),
(69, 2, 4, '2019-03-27', '2019-02-06', '17:40', 'Eve', 134, '420-6151 Pellentesque Road', 'Mission', 21, 'Fusce mi lorem, vehicula et,', 24),
(70, 30, 3, '2019-03-16', '2019-05-17', '23:49', 'Jameson', 256, '763-5566 Vitae Road', 'Bad Kreuznach', 46, 'Nam interdum enim non nisi.', 17),
(71, 30, 3, '2019-05-08', '2019-03-19', '18:29', 'Jameson', 118, '274-9068 Magna. Avenue', 'Warwick', 33, 'accumsan neque et nunc. Quisque', 21),
(72, 10, 6, '2019-02-09', '2019-09-12', '07:57', 'Quin', 140, '329-8975 Ut Street', 'Marystown', 42, 'lacus. Cras interdum. Nunc sollicitudin', 23),
(73, 36, 1, '2019-05-09', '2019-05-30', '12:15', '', 123, '', '', 0, '', 12);

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
('2019-02-06', 1, 1500, 35, 'deuxieme', '2019-03-01'),
('2019-03-01', 2, 1200, 60, '', '2019-03-20'),
('2019-04-10', 3, 1300, 60, 'taxe avril', '2019-05-16'),
('2019-01-10', 4, 1300, 67, 'premiere', '2019-05-01'),
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
