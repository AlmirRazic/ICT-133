-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Mai 2016 à 11:24
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_nickname`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_section`
--

CREATE TABLE IF NOT EXISTS `t_section` (
  `idSection` int(20) NOT NULL AUTO_INCREMENT,
  `secName` char(30) NOT NULL,
  PRIMARY KEY (`idSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `t_section`
--

INSERT INTO `t_section` (`idSection`, `secName`) VALUES
(1, 'Informatique'),
(2, 'Bois'),
(3, 'Théorie'),
(4, 'Polymécanique'),
(5, 'Automatique'),
(6, 'Mécatronique'),
(7, 'Electronique');

-- --------------------------------------------------------

--
-- Structure de la table `t_teacher`
--

CREATE TABLE IF NOT EXISTS `t_teacher` (
  `idTeacher` int(20) NOT NULL AUTO_INCREMENT,
  `teaLastName` varchar(60) NOT NULL,
  `teaFirstName` varchar(60) NOT NULL,
  `teaGender` varchar(1) NOT NULL,
  `teaNickname` varchar(60) NOT NULL,
  `teaOrigin` varchar(30) NOT NULL,
  `teaImage` int(100) NOT NULL,
  `fkSection` int(20) NOT NULL,
  `teaIsDeleted` tinyint(1) NOT NULL,
  `teaModified` varchar(30) NOT NULL,
  PRIMARY KEY (`idTeacher`),
  KEY `fkSection` (`fkSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `t_teacher`
--

INSERT INTO `t_teacher` (`idTeacher`, `teaLastName`, `teaFirstName`, `teaGender`, `teaNickname`, `teaOrigin`, `teaImage`, `fkSection`, `teaIsDeleted`, `teaModified`) VALUES
(3, 'Gruaz', 'Gilbert', 'M', 'GGZ', 'Pseudonyme ETML', 0, 1, 0, 'zip'),
(5, 'Karim', 'Bourahla', 'M', 'KBA', 'Pseudonyme ETML', 0, 1, 1, 'mathias');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `idUser` int(20) NOT NULL AUTO_INCREMENT,
  `useLogin` varchar(30) NOT NULL,
  `usePassword` varchar(30) NOT NULL,
  `usePart` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `usePart`) VALUES
(1, 'mathias', '$2y$10$VIzJqc7NI6C5Hrj0y2dca./Araf2Ez4y8lumzJjH6T9eVS85VXST.', NULL),
(2, 'zip', 'test', NULL),
(3, 'admin', 'test', 'admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_teacher`
--
ALTER TABLE `t_teacher`
  ADD CONSTRAINT `t_teacher_ibfk_1` FOREIGN KEY (`fkSection`) REFERENCES `t_section` (`idSection`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
