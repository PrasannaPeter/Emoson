-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 18 Juin 2014 à 19:25
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `emoson`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
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

CREATE TABLE `comptes_lies` (
  `idCompte` int(11) NOT NULL AUTO_INCREMENT,
  `authCompte` longtext NOT NULL,
  `typeCompte` varchar(45) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compte_soundcloud`
--

CREATE TABLE `compte_soundcloud` (
  `compte_soundcloud_id` int(100) NOT NULL AUTO_INCREMENT,
  `compte_soundcloud_designer_id` int(100) NOT NULL,
  `compte_soundcloud_soundcloud_id` int(100) NOT NULL,
  PRIMARY KEY (`compte_soundcloud_id`),
  KEY `compte_soundcloud_designer_id` (`compte_soundcloud_designer_id`),
  KEY `compte_soundcloud_designer_id_2` (`compte_soundcloud_designer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `designer_img`
--

CREATE TABLE `designer_img` (
  `designer_img_id` int(100) NOT NULL AUTO_INCREMENT,
  `designer_img_designer_id` int(100) NOT NULL,
  `designer_img_url` varchar(100) NOT NULL,
  PRIMARY KEY (`designer_img_id`),
  KEY `designer_img_designer_id` (`designer_img_designer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `designer_img`
--

INSERT INTO `designer_img` (`designer_img_id`, `designer_img_designer_id`, `designer_img_url`) VALUES
(5, 3, 'Capture d’écran 2014-05-30 à 11.50.30.png');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`idEntreprise`, `raisonSocialeEntreprise`, `secteurEntreprise`, `siteWebEntreprise`, `adresseEntreprise`, `villeEntreprise`, `CPEntreprise`, `typeEntreprise`, `idUtilisateur`, `numSiretEntreprise`) VALUES
(1, 'Brand 440', 'Informatique', 'www.emoson.fr', 'Cité paradis ', 'Paris', '750000', 'SARL', 2, '1245121.240');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers_lies`
--

CREATE TABLE `fichiers_lies` (
  `idFichier` int(11) NOT NULL AUTO_INCREMENT,
  `libFichier` varchar(1000) NOT NULL,
  `dateUploadFichier` date NOT NULL,
  `idProjet` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idFichier`),
  KEY `fk_fichiers_lies_projets1_idx` (`idProjet`),
  KEY `fk_fichiers_lies_commentaires1_idx` (`idUtilisateur`),
  KEY `idProjet` (`idProjet`,`idUtilisateur`),
  KEY `idProjet_2` (`idProjet`,`idUtilisateur`),
  KEY `idProjet_3` (`idProjet`,`idUtilisateur`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idUtilisateur_2` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pack`
--

CREATE TABLE `pack` (
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

CREATE TABLE `projets` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `titreProjet` varchar(90) NOT NULL,
  `descriptionProjet` longtext NOT NULL,
  `brandingProjet` varchar(200) DEFAULT NULL,
  `positionnementProjet` longtext,
  `identiteProjet` varchar(200) DEFAULT NULL,
  `referencesProjet` longtext,
  `dontlikeProjet` longtext,
  `commentaireProjet` longtext,
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
  KEY `fk_projets_pack1_idx` (`idPack`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`idProjet`, `titreProjet`, `descriptionProjet`, `brandingProjet`, `positionnementProjet`, `identiteProjet`, `referencesProjet`, `dontlikeProjet`, `commentaireProjet`, `isActiveProjet`, `idUtilisateur`, `tailleEntreprise`, `caEntreprise`, `ptsContactEntreprise`, `optionProjet`, `nbARProjet`, `nbDesignerSouhaite`, `idPack`) VALUES
(6, 'frcfv', 'drcfvf', 'BrandingTEST.docx', 'fcfdre', 'Identitetest.docx', 'frcfv', 'frc', 'frfvf', 0, 2, 1, 2, '["2","3"]', '2', 3, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE `propose` (
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `acceptation` int(1) NOT NULL,
  `validation` int(1) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idProjet`),
  KEY `fk_entreprises_has_projets_projets1_idx` (`idProjet`),
  KEY `fk_entreprises_has_projets_entreprises1_idx` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(90) NOT NULL,
  `prenomUtilisateur` varchar(90) NOT NULL,
  `telUtilisateur` varchar(15) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `telUtilisateur`, `loginUtilisateur`, `passUtilisateur`, `emailUtilisateur`, `roleUtilisateur`, `bioUtilisateur`, `idCompte`, `certifUtilisateur`) VALUES
(1, 'AdminTest', 'testeur', '05478987', 'admin', 'c759eaf09e4638954f63ace0ce1b53b40f62ccb7', 'test@test.com', 'ADMIN', NULL, NULL, 0),
(2, 'Dupré', 'dehde', '01456421212', 'entreprise', '596fed20aa89037d670e419403c205068d484654', 'dejhe@hyegd.de', 'ENTREPRISE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu posuere ligula, nec eleifend sapien. Fusce tempor dolor rhoncus magna posuere blandit. Praesent placerat at justo a pretium. Sed venenatis diam elementum sem posuere auctor. Nunc aliquam lacus tortor, sit amet iaculis lorem vehicula quis. Etiam a enim porta, mollis diam non, condimentum eros. Proin eu pretium massa. Nunc faucibus egestas fermentum.', NULL, 1),
(3, 'Delarue', 'Jean', '01242545214', 'designer', '3cffd736dfac1e79687f168cf697611b35060da3', 'hde@test.fr', 'GRAPHISTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu posuere ligula, nec eleifend sapien. Fusce tempor dolor rhoncus magna posuere blandit. Praesent placerat at justo a pretium. Sed venenatis diam elementum sem posuere auctor. Nunc aliquam lacus tortor, sit amet iaculis lorem vehicula quis. Etiam a enim porta, mollis diam non, condimentum eros. Proin eu pretium massa. Nunc faucibus egestas fermentum.', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `widgets_lies`
--

CREATE TABLE `widgets_lies` (
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
-- Contraintes pour la table `designer_img`
--
ALTER TABLE `designer_img`
  ADD CONSTRAINT `designer_img_ibfk_1` FOREIGN KEY (`designer_img_designer_id`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `fk_entreprises_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fichiers_lies`
--
ALTER TABLE `fichiers_lies`
  ADD CONSTRAINT `fichiers_lies_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `fk_projets_pack1` FOREIGN KEY (`idPack`) REFERENCES `pack` (`idPack`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

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
