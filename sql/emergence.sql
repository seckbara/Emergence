-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 30 Septembre 2017 à 09:51
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-2+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `emergence`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `date_certificat` varchar(50) DEFAULT NULL,
  `type_abonnement` int(11) DEFAULT NULL,
  `date_abonnement` varchar(50) DEFAULT NULL,
  `duree_abonnement` int(11) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `id_adherent` int(11) DEFAULT NULL,
  `id_activite` int(11) DEFAULT NULL,
  `type_paiement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `date_certificat`, `type_abonnement`, `date_abonnement`, `duree_abonnement`, `montant`, `id_adherent`, `id_activite`, `type_paiement`) VALUES
(1, '07-09-2017', 2, '28-09-2017', 3, 520, 1, 1, 1),
(2, '06-09-2017', 2, '01-01-1970', 3, 100, 2, 1, 1),
(3, '16-09-2017', 1, '26-09-2017', 12, 100, 3, 2, 3),
(4, '01-01-1970', 2, '27-09-2017', 12, 520, 4, 1, 1),
(5, '05-09-2017', 3, '27-09-2017', 12, 520, 5, 2, 2),
(6, '13-09-2017', 1, '26-09-2017', 12, 520, 6, 1, 3),
(7, '16-09-2017', 2, '27-09-2017', 6, 125, 7, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `id` int(11) NOT NULL,
  `nom_activite` varchar(50) NOT NULL,
  `actif` enum('O','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`id`, `nom_activite`, `actif`) VALUES
(1, 'Boxe', 'O'),
(2, 'Musculation', 'O'),
(3, 'Formule (Boxe & Musculation)', 'O'),
(4, 'Danse', 'N'),
(5, 'Autre', 'N'),
(6, 'Ju Jitsu', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `nom_adherent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom_adherent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` int(11) DEFAULT NULL,
  `sexe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situation` int(11) NOT NULL,
  `quartier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_secu` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_fixe` int(50) DEFAULT NULL,
  `commentaire` mediumtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`id`, `nom_adherent`, `prenom_adherent`, `date_naissance`, `ville`, `sexe`, `tel`, `adresse`, `email`, `certificat`, `situation`, `quartier`, `num_secu`, `document`, `tel_fixe`, `commentaire`) VALUES
(1, 'Diop', 'Bara', '12-08-1989', 1, 'H', '0698555555', '10 place du marche', 'baraseck1989@live.fr', 'N', 1, 'Le Havre', '125545555888896666', 'Carte d\'etudiant', 265987458, 'ceci est un commentaire'),
(2, 'Fall', 'Maria', '13-09-1988', 1, 'F', '0659875985', '18 rue de tilsitt', 'mariaseck@hotmail.fr', 'N', 1, 'Rouen', '125545555888896666', 'APS', 265987458, 'deded'),
(3, 'Thimotee', 'Maisonnier', '08-09-2017', 1, 'H', '0698627516', '12 rue de dugay trouen', 'baraseck1989@live.fr', 'N', 1, 'Le Havre', '125545555888896666', 'Carte d\'etudiant', 265987458, 'deedede'),
(4, 'Coulibaly', 'Elhaje', '22-09-2017', 4, 'H', '07854125632', '10 place du marche', 'baraseck1989@live.fr', 'N', 1, 'Le Havre', '125545555888896666', 'Carte d\'etudiant', 265987458, 'ceci est un exemple'),
(5, 'Zinsou', 'Alexis', '08-09-2017', 1, 'H', '0698521124', '54 rue hilaire colombel', 'alexis.zinsou@enr-cert.com', 'N', 1, 'Dauville', '125545555888896666', 'Carte d\'etudiant', 265987458, 'szszsz'),
(6, 'KONATE', 'Moussa', '13-09-2017', 1, 'H', '0698521144', '36 rue boris vian', 'baraseck1989@live.fr', 'N', 1, 'Le Havre', '1222222222224', 'Carte d\'etudiant', 1259697411, 'szszszszszs'),
(7, 'Sow', 'Viviane ', '23-09-1990', 1, 'H', '07854125632', '54 rue hilaire colombel', 'viviane.sow@enr-cert.com', 'N', 3, 'Le Havre', '1222222222224', 'Carte d\'etudiant', 125969741, 'ceci est un commentaire');

-- --------------------------------------------------------

--
-- Structure de la table `situations`
--

CREATE TABLE `situations` (
  `id` int(10) UNSIGNED NOT NULL,
  `situation` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `situations`
--

INSERT INTO `situations` (`id`, `situation`) VALUES
(1, 'Autre'),
(2, 'Salarie'),
(3, 'Rmiste'),
(4, 'Sans Emploi'),
(5, 'Retraite'),
(6, 'Etudiant(e)');

-- --------------------------------------------------------

--
-- Structure de la table `type_abonnement`
--

CREATE TABLE `type_abonnement` (
  `id` int(11) NOT NULL,
  `type_abonnement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_abonnement`
--

INSERT INTO `type_abonnement` (`id`, `type_abonnement`) VALUES
(1, 'Normal'),
(2, 'Au Top pour un Job'),
(3, 'Passport\' 76'),
(4, 'CE'),
(5, 'Vis Ta Mine');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_paiements`
--

CREATE TABLE `type_de_paiements` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_de_paiements`
--

INSERT INTO `type_de_paiements` (`id`, `type`) VALUES
(1, 'esp&egrave;ces'),
(2, 'ch&egrave;ques'),
(3, 'C.E'),
(4, 'PassSport');

-- --------------------------------------------------------

--
-- Structure de la table `versements`
--

CREATE TABLE `versements` (
  `id` int(10) NOT NULL,
  `date_versement` varchar(50) DEFAULT NULL,
  `commentaire` text,
  `montant` int(50) DEFAULT NULL,
  `abonnement_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `versements`
--

INSERT INTO `versements` (`id`, `date_versement`, `commentaire`, `montant`, `abonnement_id`) VALUES
(1, '18-09-2017', 'dede', 500, 1),
(2, '18-09-2017', 'hfdfjfdhjfdhj', 20, 1),
(3, '18-09-2017', 'dedede', 100, 2),
(4, '23-09-2017', 'deeeeeeee', 30, 3),
(5, '15-09-2017', 'zssssssss', 20, 3),
(6, '22-09-2017', 'szzzzzzzzzzzzzz', 20, 3),
(7, '22-09-2017', 'szsssssssssss', 30, 3),
(8, '18-09-2017', 'szszsz', 125, 4),
(9, '26-09-2017', 'deded', 520, 5),
(10, '25-09-2017', 'deded', 510, 6),
(11, '25-09-2017', 'deeeeeeeeee', 10, 6),
(12, '20-09-2017', 'rffrfrfrfrfr', 125, 7);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id_ville` int(10) UNSIGNED NOT NULL,
  `ville` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id_ville`, `ville`) VALUES
(1, 'Montivilliers'),
(2, 'Le Havre'),
(3, 'Gonfreville-l\'Orcher'),
(4, 'Harfleur'),
(5, 'Sainte-Adresse'),
(6, 'Octeville-sur-Mer'),
(7, 'Epouville'),
(8, 'Fontaine-la-Mallet'),
(9, 'Gainneville'),
(10, 'St-Martin-du-Manoir'),
(11, 'Rogerville'),
(12, 'Cauville-sur-Mer'),
(13, 'Manéglise'),
(14, 'Fontenay'),
(15, 'Rolleville'),
(16, 'Mannevillette'),
(17, 'Notre-Dame-du-Bec'),
(22, 'Autre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `id_activite` (`id_activite`),
  ADD KEY `type_abonnement` (`type_abonnement`),
  ADD KEY `type_paiement` (`type_paiement`);

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `situations`
--
ALTER TABLE `situations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_de_paiements`
--
ALTER TABLE `type_de_paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `versements`
--
ALTER TABLE `versements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnement_id` (`abonnement_id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `situations`
--
ALTER TABLE `situations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `type_de_paiements`
--
ALTER TABLE `type_de_paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `versements`
--
ALTER TABLE `versements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id`),
  ADD CONSTRAINT `abonnements_ibfk_2` FOREIGN KEY (`id_activite`) REFERENCES `activites` (`id`),
  ADD CONSTRAINT `abonnements_ibfk_3` FOREIGN KEY (`type_abonnement`) REFERENCES `type_abonnement` (`id`),
  ADD CONSTRAINT `abonnements_ibfk_4` FOREIGN KEY (`type_paiement`) REFERENCES `type_de_paiements` (`id`);

--
-- Contraintes pour la table `versements`
--
ALTER TABLE `versements`
  ADD CONSTRAINT `versements_ibfk_1` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnements` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
