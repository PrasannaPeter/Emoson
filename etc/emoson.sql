-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Juin 2014 à 11:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `emoson`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `dateCommentaire` varchar(45) NOT NULL,
  `texteCommentaire` varchar(45) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idProjet`),
  KEY `fk_utilisateurs_has_projets_projets1_idx` (`idProjet`),
  KEY `fk_utilisateurs_has_projets_utilisateurs1_idx` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comptes_lies`
--

CREATE TABLE IF NOT EXISTS `comptes_lies` (
  `idCompte` int(11) NOT NULL AUTO_INCREMENT,
  `authCompte` longtext NOT NULL,
  `typeCompte` varchar(45) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compte_soundcloud`
--

CREATE TABLE IF NOT EXISTS `compte_soundcloud` (
  `compte_soundcloud_id` int(100) NOT NULL AUTO_INCREMENT,
  `compte_soundcloud_designer_id` int(100) NOT NULL,
  `compte_soundcloud_soundcloud_id` int(100) NOT NULL,
  PRIMARY KEY (`compte_soundcloud_id`),
  KEY `compte_soundcloud_designer_id` (`compte_soundcloud_designer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `compte_soundcloud`
--

INSERT INTO `compte_soundcloud` (`compte_soundcloud_id`, `compte_soundcloud_designer_id`, `compte_soundcloud_soundcloud_id`) VALUES
(5, 5, 92388047);

-- --------------------------------------------------------

--
-- Structure de la table `designer_img`
--

CREATE TABLE IF NOT EXISTS `designer_img` (
  `designer_img_id` int(100) NOT NULL AUTO_INCREMENT,
  `designer_img_designer_id` int(100) NOT NULL,
  `designer_img_url` varchar(100) NOT NULL,
  PRIMARY KEY (`designer_img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `designer_img`
--

INSERT INTO `designer_img` (`designer_img_id`, `designer_img_designer_id`, `designer_img_url`) VALUES
(3, 5, '947163_10200581901941340_1395013270_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSocialeEntreprise` varchar(90) NOT NULL,
  `secteurEntreprise` varchar(70) DEFAULT NULL,
  `siteWebEntreprise` varchar(90) DEFAULT NULL,
  `adresseEntreprise` varchar(100) DEFAULT NULL,
  `villeEntreprise` varchar(90) DEFAULT NULL,
  `CPEntreprise` varchar(7) DEFAULT NULL,
  `typeEntreprise` varchar(15) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `numSiretEntreprise` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`),
  KEY `fk_entreprises_utilisateurs1_idx` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers_lies`
--

CREATE TABLE IF NOT EXISTS `fichiers_lies` (
  `idFichier` int(11) NOT NULL AUTO_INCREMENT,
  `libFichier` varchar(45) NOT NULL,
  `dateUploadFichier` varchar(45) NOT NULL,
  `idProjet` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idFichier`),
  KEY `fk_fichiers_lies_projets1_idx` (`idProjet`),
  KEY `fk_fichiers_lies_commentaires1_idx` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pack`
--

CREATE TABLE IF NOT EXISTS `pack` (
  `idPack` int(11) NOT NULL AUTO_INCREMENT,
  `titrePack` varchar(45) NOT NULL,
  `descPack` varchar(45) NOT NULL,
  `prixPack` float NOT NULL,
  `positionPack` int(1) NOT NULL,
  PRIMARY KEY (`idPack`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pack`
--

INSERT INTO `pack` (`idPack`, `titrePack`, `descPack`, `prixPack`, `positionPack`) VALUES
(1, 'Bronze', 'Lorem ipsum', 10, 1),
(2, 'Silver', 'Ipsum Lorem', 20, 2),
(3, 'Gold', 'Iplorem Ipsum', 60, 3);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `titreProjet` varchar(90) NOT NULL,
  `descriptionProjet` longtext NOT NULL,
  `isActiveProjet` tinyint(1) DEFAULT '0',
  `idUtilisateur` int(11) NOT NULL,
  `tailleEntreprise` int(11) NOT NULL,
  `caEntreprise` int(11) NOT NULL,
  `ptsContactEntreprise` varchar(60) DEFAULT NULL,
  `optionProjet` varchar(45) DEFAULT NULL,
  `nbARProjet` int(11) DEFAULT NULL,
  `nbDesignerSouhaite` int(11) DEFAULT NULL,
  `idPack` int(11) NOT NULL,
  PRIMARY KEY (`idProjet`),
  KEY `fk_projets_pack1_idx` (`idPack`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`idProjet`, `titreProjet`, `descriptionProjet`, `isActiveProjet`, `idUtilisateur`, `tailleEntreprise`, `caEntreprise`, `ptsContactEntreprise`, `optionProjet`, `nbARProjet`, `nbDesignerSouhaite`, `idPack`) VALUES
(1, 'Emoson', 'Lorem ipsum', 1, 2, 3, 2, '["1","2","7","8"]', '["1","2"]', 3, 5, 1),
(2, 'Emosonvrvtcde', 'dioe efde', 1, 2, 2, 3, '["3","4","5"]', '["1","2"]', 3, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE IF NOT EXISTS `propose` (
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `acceptation` int(1) NOT NULL,
  `validation` int(1) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idProjet`),
  KEY `fk_entreprises_has_projets_projets1_idx` (`idProjet`),
  KEY `fk_entreprises_has_projets_entreprises1_idx` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `propose`
--

INSERT INTO `propose` (`idUtilisateur`, `idProjet`, `acceptation`, `validation`) VALUES
(3, 1, 1, 1),
(3, 2, 2, 0),
(5, 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(90) NOT NULL,
  `prenomUtilisateur` varchar(90) NOT NULL,
  `telUtilisateur` int(15) DEFAULT NULL,
  `loginUtilisateur` varchar(90) NOT NULL,
  `passUtilisateur` varchar(200) DEFAULT NULL,
  `emailUtilisateur` varchar(90) NOT NULL,
  `roleUtilisateur` varchar(50) DEFAULT 'VISITEUR',
  `bioUtilisateur` longtext,
  `idCompte` int(11) DEFAULT NULL,
  `certifUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `loginUtilisateur_UNIQUE` (`loginUtilisateur`),
  KEY `fk_utilisateurs_comptes_lies1_idx` (`idCompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `telUtilisateur`, `loginUtilisateur`, `passUtilisateur`, `emailUtilisateur`, `roleUtilisateur`, `bioUtilisateur`, `idCompte`, `certifUtilisateur`) VALUES
(1, 'AdminTest', 'testeur', 5478987, 'admin', 'c759eaf09e4638954f63ace0ce1b53b40f62ccb7', 'test@test.com', 'ADMIN', NULL, NULL, 0),
(2, 'Dupré', 'dehde', 1456421212, 'entreprise', '596fed20aa89037d670e419403c205068d484654', 'dejhe@hyegd.de', 'ENTREPRISE', 'derf r fer', NULL, 1),
(3, 'Delarue', 'Jean', 1242545214, 'designer', '3cffd736dfac1e79687f168cf697611b35060da3', 'hde@test.fr', 'GRAPHISTE', NULL, NULL, 1),
(5, 'Peter ', 'Prasanna', 148659663, 'aa', 'cabdd66378e5d2df5338958ebde9d305fad44def', 'peter.prasana@gmail.com', 'GRAPHISTE', 'ergregt', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `widgets_lies`
--

CREATE TABLE IF NOT EXISTS `widgets_lies` (
  `idWidget` int(11) NOT NULL AUTO_INCREMENT,
  `libWidget` varchar(45) DEFAULT NULL,
  `codeWidget` longtext NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idWidget`),
  KEY `fk_widgets_lies_utilisateurs1_idx` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_utilisateurs_has_projets_projets1` FOREIGN KEY (`idProjet`) REFERENCES `projets` (`idProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_has_projets_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `compte_soundcloud`
--
ALTER TABLE `compte_soundcloud`
  ADD CONSTRAINT `compte_soundcloud_ibfk_1` FOREIGN KEY (`compte_soundcloud_designer_id`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `fk_entreprises_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fichiers_lies`
--
ALTER TABLE `fichiers_lies`
  ADD CONSTRAINT `fk_fichiers_lies_commentaires1` FOREIGN KEY (`idUtilisateur`) REFERENCES `commentaires` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fichiers_lies_projets1` FOREIGN KEY (`idProjet`) REFERENCES `projets` (`idProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `fk_projets_pack1` FOREIGN KEY (`idPack`) REFERENCES `pack` (`idPack`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `propose_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `propose_ibfk_2` FOREIGN KEY (`idProjet`) REFERENCES `projets` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_utilisateurs_comptes_lies1` FOREIGN KEY (`idCompte`) REFERENCES `comptes_lies` (`idCompte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `widgets_lies`
--
ALTER TABLE `widgets_lies`
  ADD CONSTRAINT `fk_widgets_lies_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
