-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2014 at 11:41 PM
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
-- Table structure for table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `date`, `content`) VALUES
(1, 'Bievenue sur Brand440', 'Wed-06-2014', 'Ceci est unt est');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
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

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`idUtilisateur`, `idProjet`, `dateCommentaire`, `texteCommentaire`) VALUES
(2, 6, '', 'Bonjour, le statut est toujours en attente de');

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
-- Table structure for table `compte_soundcloud`
--

CREATE TABLE IF NOT EXISTS `compte_soundcloud` (
  `compte_soundcloud_id` int(100) NOT NULL AUTO_INCREMENT,
  `compte_soundcloud_designer_id` int(100) NOT NULL,
  `compte_soundcloud_soundcloud_id` int(100) NOT NULL,
  PRIMARY KEY (`compte_soundcloud_id`),
  KEY `compte_soundcloud_designer_id` (`compte_soundcloud_designer_id`),
  KEY `compte_soundcloud_designer_id_2` (`compte_soundcloud_designer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designer_img`
--

CREATE TABLE IF NOT EXISTS `designer_img` (
  `designer_img_id` int(100) NOT NULL AUTO_INCREMENT,
  `designer_img_designer_id` int(100) NOT NULL,
  `designer_img_url` varchar(100) NOT NULL,
  PRIMARY KEY (`designer_img_id`),
  KEY `designer_img_designer_id` (`designer_img_designer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `designer_img`
--

INSERT INTO `designer_img` (`designer_img_id`, `designer_img_designer_id`, `designer_img_url`) VALUES
(5, 3, 'Capture d’écran 2014-05-30 à 11.50.30.png');

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
(1, 'Brand 440', 'Informatique', 'www.emoson.fr', 'Cité paradis ', 'Paris', '750000', 'SARL', 2, '1245121.240');

-- --------------------------------------------------------

--
-- Table structure for table `fichiers_lies`
--

CREATE TABLE IF NOT EXISTS `fichiers_lies` (
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
-- Table structure for table `paypal_log`
--

CREATE TABLE IF NOT EXISTS `paypal_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(600) NOT NULL,
  `log` text NOT NULL,
  `posted_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_projets_pack1_idx` (`idPack`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`idProjet`, `titreProjet`, `descriptionProjet`, `brandingProjet`, `positionnementProjet`, `identiteProjet`, `referencesProjet`, `dontlikeProjet`, `commentaireProjet`, `isActiveProjet`, `idUtilisateur`, `tailleEntreprise`, `caEntreprise`, `ptsContactEntreprise`, `optionProjet`, `nbARProjet`, `nbDesignerSouhaite`, `idPack`) VALUES
(6, 'frcfv', 'drcfvf', 'BrandingTEST.docx', 'fcfdre', 'Identitetest.docx', 'frcfv', 'frc', 'frfvf', 0, 2, 1, 2, '["2","3"]', '2', 3, 3, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(300) NOT NULL,
  `trasaction_id` varchar(600) NOT NULL,
  `log_id` int(10) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `product_amount` varchar(300) NOT NULL,
  `payer_fname` varchar(300) NOT NULL,
  `payer_lname` varchar(300) NOT NULL,
  `payer_address` varchar(300) NOT NULL,
  `payer_city` varchar(300) NOT NULL,
  `payer_state` varchar(300) NOT NULL,
  `payer_zip` varchar(300) NOT NULL,
  `payer_country` varchar(300) NOT NULL,
  `payer_email` text NOT NULL,
  `payment_status` varchar(300) NOT NULL,
  `posted_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `invoice`, `trasaction_id`, `log_id`, `product_id`, `product_name`, `product_quantity`, `product_amount`, `payer_fname`, `payer_lname`, `payer_address`, `payer_city`, `payer_state`, `payer_zip`, `payer_country`, `payer_email`, `payment_status`, `posted_date`) VALUES
(1, '2333086053', '', 0, '39555', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2014-06-19 01:33:09'),
(2, '2335119547', '', 0, '13152', 'Crocodile Shoes', '1', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2014-06-19 01:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `telUtilisateur`, `loginUtilisateur`, `passUtilisateur`, `emailUtilisateur`, `roleUtilisateur`, `bioUtilisateur`, `idCompte`, `certifUtilisateur`) VALUES
(1, 'AdminTest', 'testeur', '05478987', 'admin', 'c759eaf09e4638954f63ace0ce1b53b40f62ccb7', 'test@test.com', 'ADMIN', NULL, NULL, 0),
(2, 'Dupré', 'dehde', '01456421212', 'entreprise', '596fed20aa89037d670e419403c205068d484654', 'dejhe@hyegd.de', 'ENTREPRISE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu posuere ligula, nec eleifend sapien. Fusce tempor dolor rhoncus magna posuere blandit. Praesent placerat at justo a pretium. Sed venenatis diam elementum sem posuere auctor. Nunc aliquam lacus tortor, sit amet iaculis lorem vehicula quis. Etiam a enim porta, mollis diam non, condimentum eros. Proin eu pretium massa. Nunc faucibus egestas fermentum.', NULL, 1),
(3, 'Delarue', 'Jean', '01242545214', 'designer', '3cffd736dfac1e79687f168cf697611b35060da3', 'hde@test.fr', 'GRAPHISTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu posuere ligula, nec eleifend sapien. Fusce tempor dolor rhoncus magna posuere blandit. Praesent placerat at justo a pretium. Sed venenatis diam elementum sem posuere auctor. Nunc aliquam lacus tortor, sit amet iaculis lorem vehicula quis. Etiam a enim porta, mollis diam non, condimentum eros. Proin eu pretium massa. Nunc faucibus egestas fermentum.', NULL, 1),
(4, 'Incididunt irure laborum nisi ab lorem rerum quia est', 'Officia quis eos et et do officia officia sed', '0148842547', 'Aspernatur debitis ut amet eaque dolore voluptatum culpa obcaecati saepe deserunt voluptas', '5f1b783832c6448613added870fc16b72b998289', 'dovelyni@gmail.com', 'VISITEUR', 'Ut nesciunt, tempora consequuntur tempor qui enim et quia duis et necessitatibus iusto non minus omnis non perferendis tempore.', NULL, 1);

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
-- Constraints for table `compte_soundcloud`
--
ALTER TABLE `compte_soundcloud`
  ADD CONSTRAINT `compte_soundcloud_ibfk_1` FOREIGN KEY (`compte_soundcloud_designer_id`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Constraints for table `designer_img`
--
ALTER TABLE `designer_img`
  ADD CONSTRAINT `designer_img_ibfk_1` FOREIGN KEY (`designer_img_designer_id`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `fk_entreprises_utilisateurs1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fichiers_lies`
--
ALTER TABLE `fichiers_lies`
  ADD CONSTRAINT `fichiers_lies_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `fk_projets_pack1` FOREIGN KEY (`idPack`) REFERENCES `pack` (`idPack`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

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
