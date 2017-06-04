-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Mars 2017 à 16:22
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `erreurNom` (`nom` VARCHAR(3), OUT `longueur` INT)  BEGIN
    SET longueur = lenght(nom);
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE `adherents` (
  `id_adherents` int(11) NOT NULL,
  `dateAdhesion` date DEFAULT NULL,
  `id_Les_producteurs` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `id_avoir` int(11) NOT NULL,
  `dateObtention` date DEFAULT NULL,
  `id_Certification` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

CREATE TABLE `certification` (
  `id_Certification` int(11) NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCertif` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_Client` int(11) NOT NULL,
  `nom_Client` text NOT NULL,
  `adresse_Client` text NOT NULL,
  `nom_Responsable_Achats` text NOT NULL,
  `id_connexion` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_Client`, `nom_Client`, `adresse_Client`, `nom_Responsable_Achats`, `id_connexion`) VALUES
(1, 'test', 'test', 'test', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `numCommande` int(11) NOT NULL,
  `dateEnvoi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_connexion` int(11) NOT NULL,
  `conditionnement` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_conditionnement` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_Lot` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id_commune` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aoc (o/n)` char(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id_connexion` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mdp2` varchar(50) NOT NULL,
  `id_droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `connexion`
--

INSERT INTO `connexion` (`id_connexion`, `login`, `mdp`, `mdp2`, `id_droit`) VALUES
(1, 'azerty', 'azerty', 'azerty', 2),
(2, 'test', 'test', 'test', 3),
(3, 'admin', 'admin', 'admin', 1),
(4, 'agrur', 'agrur', 'agrur', 4),
(5, 'test2', 'test2', 'test2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id_droit` int(11) NOT NULL,
  `labelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id_droit`, `labelle`) VALUES
(1, 'Administrateur'),
(2, 'Producteurs'),
(3, 'client'),
(4, 'Agrur');

-- --------------------------------------------------------

--
-- Structure de la table `erreur`
--

CREATE TABLE `erreur` (
  `id` int(11) NOT NULL,
  `messageErreur` varchar(500) NOT NULL,
  `dateMessage` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `erreur`
--

INSERT INTO `erreur` (`id`, `messageErreur`, `dateMessage`) VALUES
(13, 'erreur mot de passe identique', '2016-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_Livraison` int(11) NOT NULL,
  `Provenance` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DateLivraison` date DEFAULT NULL,
  `typeProduit` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantiteLivre` float DEFAULT NULL,
  `id_Les_producteurs` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE `lot` (
  `id_Lot` int(11) NOT NULL,
  `id_variete` int(11) NOT NULL,
  `id_typeProduit` int(11) NOT NULL,
  `calibre` int(11) NOT NULL,
  `quantite_Lot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lot`
--

INSERT INTO `lot` (`id_Lot`, `id_variete`, `id_typeProduit`, `calibre`, `quantite_Lot`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 1, 20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `producteurs`
--

CREATE TABLE `producteurs` (
  `id_producteur` int(11) NOT NULL,
  `nom_Responsable` varchar(50) NOT NULL,
  `nom_Entreprise` varchar(50) NOT NULL,
  `adresse_Entreprise` varchar(50) NOT NULL,
  `id_connexion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `producteurs`
--

INSERT INTO `producteurs` (`id_producteur`, `nom_Responsable`, `nom_Entreprise`, `adresse_Entreprise`, `id_connexion`) VALUES
(1, 'azerty', 'azerty', 'azerty', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeconditionnement`
--

CREATE TABLE `typeconditionnement` (
  `id_TypeConditionnement` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `val` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeconditionnement`
--

INSERT INTO `typeconditionnement` (`id_TypeConditionnement`, `libelle`, `val`) VALUES
(1, 'Sachet (250g)', 0.25),
(2, 'Sachet (500g)', 0.5),
(3, 'Sachet (1kg)', 1),
(4, 'Filet (1kg)', 1),
(5, 'Filet (5kg)', 5),
(6, 'Filet (10kg)', 10),
(7, 'Filet (25kg)', 25),
(8, 'Carton (10kg)', 10);

-- --------------------------------------------------------

--
-- Structure de la table `typeproduit`
--

CREATE TABLE `typeproduit` (
  `id_typeProduit` int(11) NOT NULL,
  `libelle_typeProduit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeproduit`
--

INSERT INTO `typeproduit` (`id_typeProduit`, `libelle_typeProduit`) VALUES
(1, 'Noix entière fraiche'),
(2, 'Noix entière sèche');

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE `variete` (
  `id_variete` int(11) NOT NULL,
  `libelle` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aoc (o/n)` char(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `variete`
--

INSERT INTO `variete` (`id_variete`, `libelle`, `aoc (o/n)`) VALUES
(1, 'Franquette', 'o'),
(2, 'Mayette', 'o'),
(3, 'Parisienne', 'o');

-- --------------------------------------------------------

--
-- Structure de la table `verger`
--

CREATE TABLE `verger` (
  `id_verger` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `superficie` float DEFAULT NULL,
  `arbres_hectare` int(11) DEFAULT NULL,
  `id_variete` int(11) NOT NULL,
  `id_Commune` int(11) DEFAULT NULL,
  `id_connexion` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `verger`
--

INSERT INTO `verger` (`id_verger`, `nom`, `superficie`, `arbres_hectare`, `id_variete`, `id_Commune`, `id_connexion`) VALUES
(1, 'azeazeeaz', 7865, 637852, 1, NULL, NULL),
(2, 'ddqdsdq', 45, 45, 1, NULL, NULL),
(3, 'sdf', 34534, 53453, 1, NULL, 1),
(4, 'azeazeza', 777, 777, 1, NULL, 1),
(5, 'verger prod 2', 50, 50, 1, NULL, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`id_adherents`),
  ADD KEY `FK_Adherents_id_Les_producteurs` (`id_Les_producteurs`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`id_avoir`),
  ADD KEY `id_Certification` (`id_Certification`);

--
-- Index pour la table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id_Certification`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_Client`),
  ADD KEY `id_connexion` (`id_connexion`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `id_Client` (`id_connexion`),
  ADD KEY `id_Lot` (`id_Lot`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id_commune`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id_connexion`),
  ADD KEY `id_droit` (`id_droit`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id_droit`);

--
-- Index pour la table `erreur`
--
ALTER TABLE `erreur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_Livraison`),
  ADD KEY `FK_Livraison_id_Les_producteurs` (`id_Les_producteurs`);

--
-- Index pour la table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id_Lot`),
  ADD KEY `id_variete` (`id_variete`),
  ADD KEY `id_typeProduit` (`id_typeProduit`);

--
-- Index pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD PRIMARY KEY (`id_producteur`),
  ADD KEY `id_connexion` (`id_connexion`);

--
-- Index pour la table `typeconditionnement`
--
ALTER TABLE `typeconditionnement`
  ADD PRIMARY KEY (`id_TypeConditionnement`);

--
-- Index pour la table `typeproduit`
--
ALTER TABLE `typeproduit`
  ADD PRIMARY KEY (`id_typeProduit`);

--
-- Index pour la table `variete`
--
ALTER TABLE `variete`
  ADD PRIMARY KEY (`id_variete`);

--
-- Index pour la table `verger`
--
ALTER TABLE `verger`
  ADD PRIMARY KEY (`id_verger`),
  ADD KEY `FK_Verger_id_Commune` (`id_Commune`),
  ADD KEY `FK_Verger_id_Les_producteurs` (`id_connexion`),
  ADD KEY `id_variete` (`id_variete`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adherents`
--
ALTER TABLE `adherents`
  MODIFY `id_adherents` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `certification`
--
ALTER TABLE `certification`
  MODIFY `id_Certification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id_connexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id_droit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `erreur`
--
ALTER TABLE `erreur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_Livraison` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lot`
--
ALTER TABLE `lot`
  MODIFY `id_Lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `producteurs`
--
ALTER TABLE `producteurs`
  MODIFY `id_producteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `typeconditionnement`
--
ALTER TABLE `typeconditionnement`
  MODIFY `id_TypeConditionnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `typeproduit`
--
ALTER TABLE `typeproduit`
  MODIFY `id_typeProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `variete`
--
ALTER TABLE `variete`
  MODIFY `id_variete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `verger`
--
ALTER TABLE `verger`
  MODIFY `id_verger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
