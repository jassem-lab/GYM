-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2022 at 04:22 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym`
--
CREATE DATABASE IF NOT EXISTS `gym` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gym`;

-- --------------------------------------------------------

--
-- Table structure for table `gym_activites`
--

CREATE TABLE IF NOT EXISTS `gym_activites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activite` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `type_abonnement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gym_activites`
--

INSERT INTO `gym_activites` (`id`, `activite`, `prix`, `type_abonnement`) VALUES
(2, 'Boxe ', '350', 3),
(3, 'MMA', '380', 3),
(4, 'Musculation', '980', 1),
(5, 'Cours de dance', '280', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gym_clients`
--

CREATE TABLE IF NOT EXISTS `gym_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `naissance` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gym_clients`
--

INSERT INTO `gym_clients` (`id`, `nom`, `prenom`, `mail`, `tel`, `adresse`, `CIN`, `naissance`) VALUES
(3, 'Gaaloul', 'Jassem', 'jassemgaaloul123@gmail.com', '21367778', 'M''saken', '124788247', '');

-- --------------------------------------------------------

--
-- Table structure for table `gym_det_client`
--

CREATE TABLE IF NOT EXISTS `gym_det_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gym_det_client`
--

INSERT INTO `gym_det_client` (`id`, `idclient`, `titre`, `document`) VALUES
(8, 3, 'CIN', 'uploads/c8c9e77fd21527a5578cb27b98974c2a.png');

-- --------------------------------------------------------

--
-- Table structure for table `gym_emplacement`
--

CREATE TABLE IF NOT EXISTS `gym_emplacement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emplacement` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gym_emplacement`
--

INSERT INTO `gym_emplacement` (`id`, `emplacement`, `flag`) VALUES
(1, 'Salle gymnastique', ''),
(2, 'Salle boxe', ''),
(4, 'Salle de Musculation', ''),
(5, 'Salle de Fitness', ''),
(6, 'Salle de Massage', '');

-- --------------------------------------------------------

--
-- Table structure for table `gym_employes`
--

CREATE TABLE IF NOT EXISTS `gym_employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `GSM1` varchar(255) NOT NULL,
  `disponible` int(11) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `GSM2` varchar(255) NOT NULL,
  `RIB` varchar(255) NOT NULL,
  `CNSS` varchar(255) NOT NULL,
  `salaire_fixe` varchar(255) NOT NULL,
  `pourcentage` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gym_employes`
--

INSERT INTO `gym_employes` (`id`, `prenom`, `nom`, `mail`, `fonction`, `GSM1`, `disponible`, `idprofil`, `GSM2`, `RIB`, `CNSS`, `salaire_fixe`, `pourcentage`, `adresse`) VALUES
(2, 'Majdi', 'Trabelsi', 'MajdiTrabelsi@gmail.com', '2', '200000000', 0, 2, '', '', '', '', '', ''),
(3, 'Jassem', 'Gaaloul', 'jassemgaaloul123@gmail.com', '2', '21367778', 0, 1, '21367778', '1214541321352156', '56432156156132', '1310', '24', '');

-- --------------------------------------------------------

--
-- Table structure for table `gym_fonctions`
--

CREATE TABLE IF NOT EXISTS `gym_fonctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fonction` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gym_fonctions`
--

INSERT INTO `gym_fonctions` (`id`, `fonction`) VALUES
(1, 'Femme de ménage'),
(2, 'Coach');

-- --------------------------------------------------------

--
-- Table structure for table `gym_mode_paiement`
--

CREATE TABLE IF NOT EXISTS `gym_mode_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gym_mode_paiement`
--

INSERT INTO `gym_mode_paiement` (`id`, `mode`) VALUES
(4, 'Chèque'),
(6, 'Espèce'),
(7, 'Virement');

-- --------------------------------------------------------

--
-- Table structure for table `gym_produits`
--

CREATE TABLE IF NOT EXISTS `gym_produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(255) NOT NULL,
  `prix_unitaire` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gym_produits`
--

INSERT INTO `gym_produits` (`id`, `produit`, `prix_unitaire`) VALUES
(1, 'proteins Mass Gainer 3K25', '235'),
(4, 'Olimp Sport Nutrition', '180');

-- --------------------------------------------------------

--
-- Table structure for table `gym_profil`
--

CREATE TABLE IF NOT EXISTS `gym_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gym_profil`
--

INSERT INTO `gym_profil` (`id`, `profil`) VALUES
(1, 'Super-Administrateur'),
(2, 'Staff'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `gym_services`
--

CREATE TABLE IF NOT EXISTS `gym_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gym_services`
--

INSERT INTO `gym_services` (`id`, `service`, `description`, `archive`) VALUES
(2, 'Spa', 'Le spa est un bassin d''eau chaude entre 33 et 35°C qui procure des massages par le biais de buses. Un générateur d''air envoie de l''air sous pression dans ces diffuseurs, jets pouvant être directionnels, rotatifs ou pulsatifs. La coque du spa est ergonomiq', 0),
(3, 'Massage', 'Ensemble des techniques utilisant les mains (pétrissage, pressions, vibrations, etc.) et s''exerçant sur différentes parties du corps dans un dessein thérapeutique.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gym_tranche_paiement`
--

CREATE TABLE IF NOT EXISTS `gym_tranche_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tranche` varchar(255) NOT NULL,
  `observation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gym_tranche_paiement`
--

INSERT INTO `gym_tranche_paiement` (`id`, `tranche`, `observation`) VALUES
(2, 'Annuel', 'Tranche par année'),
(3, 'Par Jour', ''),
(4, 'Mensuel', '');

-- --------------------------------------------------------

--
-- Table structure for table `gym_type_abonnement`
--

CREATE TABLE IF NOT EXISTS `gym_type_abonnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_abonnement` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gym_type_abonnement`
--

INSERT INTO `gym_type_abonnement` (`id`, `type_abonnement`) VALUES
(1, 'Annuel'),
(2, 'Mensuel'),
(3, 'Trimestriel'),
(4, 'Semestriel'),
(5, 'Journalier');

-- --------------------------------------------------------

--
-- Table structure for table `gym_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `gym_utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `idprofil` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gym_utilisateurs`
--

INSERT INTO `gym_utilisateurs` (`id`, `nom`, `prenom`, `mail`, `motdepasse`, `idprofil`) VALUES
(2, 'Gaaloul', 'Jassem', 'jassemgaaloul123@gmail.com', '123', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
