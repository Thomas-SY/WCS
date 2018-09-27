-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 27 Septembre 2018 à 12:29
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thomas_s_wcs_lille`
--

-- --------------------------------------------------------

--
-- Structure de la table `Ecole`
--

CREATE TABLE `Ecole` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Ecole`
--

INSERT INTO `Ecole` (`id`, `nom`) VALUES
(1, 'Lille'),
(2, 'Paris'),
(3, 'Bordeaux');

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(64) DEFAULT NULL,
  `adresse` text,
  `langage_id` int(11) DEFAULT NULL,
  `ecole_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Eleve`
--

INSERT INTO `Eleve` (`id`, `nom`, `prenom`, `adresse`, `langage_id`, `ecole_id`) VALUES
(1, 'Vignerot', 'Jérôme', 'Lille', 2, 1),
(2, 'Leschaeve', 'Vincent', 'Lille', 1, 3),
(3, 'Delmas', 'Julie', 'Lille', 1, 1),
(4, 'Sambon', 'Julien', 'Béthune', 2, 2),
(5, 'Radureau', 'Florian', 'Lille', 1, 1),
(6, 'Google', 'Chrome', 'USA', 2, 2),
(7, 'Pester', 'Lorie', 'Paris', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Langage`
--

CREATE TABLE `Langage` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Langage`
--

INSERT INTO `Langage` (`id`, `nom`) VALUES
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'Java');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Ecole`
--
ALTER TABLE `Ecole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `langage_id` (`langage_id`),
  ADD KEY `ecole_id` (`ecole_id`);

--
-- Index pour la table `Langage`
--
ALTER TABLE `Langage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Ecole`
--
ALTER TABLE `Ecole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Eleve`
--
ALTER TABLE `Eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Langage`
--
ALTER TABLE `Langage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD CONSTRAINT `Eleve_ibfk_1` FOREIGN KEY (`langage_id`) REFERENCES `Langage` (`id`),
  ADD CONSTRAINT `Eleve_ibfk_2` FOREIGN KEY (`ecole_id`) REFERENCES `Ecole` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
