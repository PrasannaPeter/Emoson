-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2014 at 05:59 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emoson`
--
CREATE DATABASE IF NOT EXISTS `emoson` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emoson`;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `dateCommentaire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texteCommentaire` longtext NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `fk_utilisateurs_has_projets_projets1_idx` (`idProjet`),
  KEY `fk_utilisateurs_has_projets_utilisateurs1_idx` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`idCommentaire`, `idUtilisateur`, `idProjet`, `dateCommentaire`, `texteCommentaire`) VALUES
(1, 2, 1, '2014-05-04 17:36:20', 'test'),
(3, 2, 1, '2014-05-04 21:24:01', 'azeazeaze'),
(4, 2, 1, '2014-05-04 21:24:28', 'teazeazrfdfgdfg'),
(5, 2, 1, '2014-05-04 21:24:52', 'teazeazrfdfgdfg'),
(6, 2, 1, '2014-05-04 21:26:07', 'teazeazrfdfgdfg'),
(7, 2, 1, '2014-05-04 21:26:18', 'teazeazrfdfgdfg'),
(8, 2, 1, '2014-05-04 21:28:51', 'testazeazehh !!! !'''),
(9, 2, 1, '2014-05-04 21:32:26', 'teazeazrfdfgdfgteazeazrfdfgdfgteazeazrfdfgdfg'),
(10, 2, 1, '2014-05-04 21:32:52', 'teazeaz rfdfgdfgte             azeazrfdfgdfgt'),
(11, 2, 1, '2014-05-04 21:33:16', 'eazeazrfdfgdf                                '),
(12, 2, 1, '2014-05-04 21:33:31', 'eazeazrfdfgdf                                '),
(13, 2, 1, '2014-05-04 21:33:37', '4848'),
(14, 2, 1, '2014-05-04 21:34:37', 'eazeazrfdfgdf                                '),
(15, 2, 1, '2014-05-04 21:36:06', '&lt;a href=&quot;#&quot; class=&quot;delete&q'),
(16, 2, 1, '2014-05-04 21:38:25', '&lt;a href=&quot;#&quot; class=&quot;delete&q'),
(17, 2, 1, '2014-05-04 21:39:48', '&lt;a href=&quot;#&quot; class=&quot;delete&quot; data-confirm=&quot;Are you sure to delete this item?&quot;&gt;Delete&lt;/a&gt;\r\n'),
(18, 2, 1, '2014-05-05 20:37:35', 'rzerzer');

-- --------------------------------------------------------

--
-- Table structure for table `comptes_lies`
--

CREATE TABLE IF NOT EXISTS `comptes_lies` (
  `idCompte` int(11) NOT NULL AUTO_INCREMENT,
  `authCompte` longtext NOT NULL,
  `typeCompte` varchar(45) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entreprises`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`idEntreprise`, `raisonSocialeEntreprise`, `secteurEntreprise`, `siteWebEntreprise`, `adresseEntreprise`, `villeEntreprise`, `CPEntreprise`, `typeEntreprise`, `idUtilisateur`, `numSiretEntreprise`) VALUES
(1, 'Emoson', 'Informatique', 'www.emoson.fr', 'CitÃ© paradis ', 'Paris', '750000', 'SARL', 2, '1245121.240');

-- --------------------------------------------------------

--
-- Table structure for table `fichiers_lies`
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
-- Table structure for table `pack`
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
-- Dumping data for table `pack`
--

INSERT INTO `pack` (`idPack`, `titrePack`, `descPack`, `prixPack`, `positionPack`) VALUES
(1, 'Bronze', 'Lorem ipsum', 10, 1),
(2, 'Silver', 'Ipsum Lorem', 20, 2),
(3, 'Gold', 'Iplorem Ipsum', 60, 3);

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
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
  KEY `fk_projets_pack1_idx` (`idPack`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`idProjet`, `titreProjet`, `descriptionProjet`, `brandingProjet`, `positionnementProjet`, `identiteProjet`, `referencesProjet`, `dontlikeProjet`, `commentaireProjet`, `isActiveProjet`, `idUtilisateur`, `tailleEntreprise`, `caEntreprise`, `ptsContactEntreprise`, `optionProjet`, `nbARProjet`, `nbDesignerSouhaite`, `idPack`) VALUES
(1, 'Emoson', 'Lorem ipsum', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 3, 2, '["1","2","7","8"]', '3', 3, 5, 1),
(2, 'Emosonvrvtcde', 'dioe efde', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 3, '["3","4","5"]', '2', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propose`
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
-- Dumping data for table `propose`
--

INSERT INTO `propose` (`idUtilisateur`, `idProjet`, `acceptation`, `validation`) VALUES
(3, 1, 1, 1),
(3, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `telUtilisateur`, `loginUtilisateur`, `passUtilisateur`, `emailUtilisateur`, `roleUtilisateur`, `bioUtilisateur`, `idCompte`, `certifUtilisateur`) VALUES
(1, 'AdminTest', 'testeur', 5478987, 'admin', 'c759eaf09e4638954f63ace0ce1b53b40f62ccb7', 'test@test.com', 'ADMIN', NULL, NULL, 0),
(2, 'Dupré', 'dehde', 1456421212, 'entreprise', '596fed20aa89037d670e419403c205068d484654', 'dejhe@hyegd.de', 'ENTREPRISE', 'derf r fer', NULL, 1),
(3, 'Delarue', 'Jean', 1242545214, 'designer', '3cffd736dfac1e79687f168cf697611b35060da3', 'hde@test.fr', 'GRAPHISTE', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `widgets_lies`
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
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_utilisateurs_has_projets_projets1` FOREIGN KEY (`idProjet`) REFERENCES `projets` (`idProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_has_projets_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `fk_entreprises_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fichiers_lies`
--
ALTER TABLE `fichiers_lies`
  ADD CONSTRAINT `fk_fichiers_lies_commentaires1` FOREIGN KEY (`idUtilisateur`) REFERENCES `commentaires` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fichiers_lies_projets1` FOREIGN KEY (`idProjet`) REFERENCES `projets` (`idProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `fk_projets_pack1` FOREIGN KEY (`idPack`) REFERENCES `pack` (`idPack`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `propose_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `propose_ibfk_2` FOREIGN KEY (`idProjet`) REFERENCES `projets` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_utilisateurs_comptes_lies1` FOREIGN KEY (`idCompte`) REFERENCES `comptes_lies` (`idCompte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `widgets_lies`
--
ALTER TABLE `widgets_lies`
  ADD CONSTRAINT `fk_widgets_lies_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
