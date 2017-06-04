-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 09 Novembre 2016 à 17:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `id` int(11) NOT NULL,
  `dateAdhesion` date DEFAULT NULL,
  `id_Les_producteurs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Adherents_id_Les_producteurs` (`id_Les_producteurs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `dateObtention` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_Certification` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_Certification`),
  KEY `FK_Avoir_id_Certification` (`id_Certification`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `calibre`
--

CREATE TABLE IF NOT EXISTS `calibre` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantiteLot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCertif` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `numCommande` int(11) NOT NULL,
  `dateEnvoi` date DEFAULT NULL,
  `Client` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `calibre` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`numCommande`),
  KEY `FK_Commande_calibre` (`calibre`),
  KEY `FK_Commande_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aoc (o/n)` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

CREATE TABLE IF NOT EXISTS `conditionnement` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateConditionnement` date DEFAULT NULL,
  `quantiteCommandee` int(11) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `numCommande` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Conditionnement_numCommande` (`numCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `infoinscription`
--

CREATE TABLE IF NOT EXISTS `infoinscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mdp2` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nomResponsable` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `infoinscription`
--

INSERT INTO `infoinscription` (`id`, `login`, `mdp`, `mdp2`, `nomResponsable`, `nom`, `adresse`) VALUES
(15, 'Auchan', '1234', '1234', '?4', '?5', '?6');

-- --------------------------------------------------------

--
-- Structure de la table `les_producteurs`
--

CREATE TABLE IF NOT EXISTS `les_producteurs` (
  `id` int(11) NOT NULL,
  `nomSociete` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresseSociete` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomResponsable` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenomResponsable` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_Adherents` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Les_producteurs_id_Adherents` (`id_Adherents`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL,
  `Provenance` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateLivraison` date DEFAULT NULL,
  `typeProduit` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantiteLivre` float DEFAULT NULL,
  `id_Les_producteurs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Livraison_id_Les_producteurs` (`id_Les_producteurs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE IF NOT EXISTS `lot` (
  `calibre` int(11) NOT NULL,
  `varieteNoix` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeProduction` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `id_Calibre` int(11) DEFAULT NULL,
  PRIMARY KEY (`calibre`),
  KEY `FK_Lot_id` (`id`),
  KEY `FK_Lot_id_Calibre` (`id_Calibre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE IF NOT EXISTS `variete` (
  `id` int(11) NOT NULL,
  `Libelle` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aoc (o/n)` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `verger`
--

CREATE TABLE IF NOT EXISTS `verger` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `superficie` float DEFAULT NULL,
  `arbres_hectare` int(11) DEFAULT NULL,
  `id_Variete` int(11) DEFAULT NULL,
  `id_Commune` int(11) DEFAULT NULL,
  `id_Les_producteurs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Verger_id_Variete` (`id_Variete`),
  KEY `FK_Verger_id_Commune` (`id_Commune`),
  KEY `FK_Verger_id_Les_producteurs` (`id_Les_producteurs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
