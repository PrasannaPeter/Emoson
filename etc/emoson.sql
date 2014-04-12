SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `emoson` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `emoson` ;

-- -----------------------------------------------------
-- Table `emoson`.`comptes_lies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`comptes_lies` (
  `idCompte` INT NOT NULL AUTO_INCREMENT,
  `authCompte` LONGTEXT NOT NULL,
  `typeCompte` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCompte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emoson`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`utilisateurs` (
  `idUtilisateur` INT(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` VARCHAR(90) NOT NULL,
  `prenomUtilisateur` VARCHAR(90) NOT NULL,
  `telUtilisateur` INT(15) NULL DEFAULT NULL,
  `loginUtilisateur` VARCHAR(90) NOT NULL,
  `passUtilisateur` VARCHAR(200) NULL DEFAULT NULL,
  `emailUtilisateur` VARCHAR(90) NOT NULL,
  `roleUtilisateur` VARCHAR(50) NULL DEFAULT 'VISITEUR',
  `bioUtilisateur` LONGTEXT NULL DEFAULT NULL,
  `idCompte` INT NULL,
  `certifUtilisateur` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  CONSTRAINT `fk_utilisateurs_comptes_lies1`
    FOREIGN KEY (`idCompte`)
    REFERENCES `emoson`.`comptes_lies` (`idCompte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_utilisateurs_comptes_lies1_idx` ON `emoson`.`utilisateurs` (`idCompte` ASC);

CREATE UNIQUE INDEX `loginUtilisateur_UNIQUE` ON `emoson`.`utilisateurs` (`loginUtilisateur` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`entreprises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`entreprises` (
  `idEntreprise` INT(11) NOT NULL AUTO_INCREMENT,
  `raisonSocialeEntreprise` VARCHAR(90) NOT NULL,
  `secteurEntreprise` VARCHAR(70) NULL,
  `siteWebEntreprise` VARCHAR(90) NULL DEFAULT NULL,
  `adresseEntreprise` VARCHAR(100) NULL DEFAULT NULL,
  `villeEntreprise` VARCHAR(90) NULL DEFAULT NULL,
  `CPEntreprise` VARCHAR(7) NULL DEFAULT NULL,
  `typeEntreprise` VARCHAR(15) NOT NULL,
  `idUtilisateur` INT(11) NOT NULL,
  `numSiretEntreprise` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`),
  CONSTRAINT `fk_entreprises_utilisateurs1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `emoson`.`utilisateurs` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_entreprises_utilisateurs1_idx` ON `emoson`.`entreprises` (`idUtilisateur` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`pack`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`pack` (
  `idPack` INT NOT NULL AUTO_INCREMENT,
  `titrePack` VARCHAR(45) NOT NULL,
  `descPack` VARCHAR(45) NOT NULL,
  `prixPack` FLOAT NOT NULL,
  PRIMARY KEY (`idPack`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emoson`.`projets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`projets` (
  `idProjet` INT(11) NOT NULL AUTO_INCREMENT,
  `titreProjet` VARCHAR(90) NOT NULL,
  `descriptionProjet` LONGTEXT NOT NULL,
  `isActiveProjet` TINYINT(1) NULL DEFAULT 0,
  `idUtilisateur` INT NOT NULL,
  `tailleEntreprise` INT NOT NULL,
  `caEntreprise` INT NOT NULL,
  `ptsContactEntreprise` VARCHAR(60) NULL,
  `optionProjet` VARCHAR(45) NULL,
  `nbARProjet` INT NULL,
  `nbDesignerSouhaite` INT NULL,
  `idPack` INT NOT NULL,
  PRIMARY KEY (`idProjet`),
  CONSTRAINT `fk_projets_pack1`
    FOREIGN KEY (`idPack`)
    REFERENCES `emoson`.`pack` (`idPack`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_projets_pack1_idx` ON `emoson`.`projets` (`idPack` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`propose_designer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`propose_designer` (
  `idUtilisateur` INT(11) NOT NULL,
  `idProjet` INT(11) NOT NULL,
  `acceptation` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idProjet`, `idUtilisateur`),
  CONSTRAINT `fairestage_ibfk_2`
    FOREIGN KEY (`idProjet`)
    REFERENCES `emoson`.`projets` (`idProjet`),
  CONSTRAINT `fk_realise_utilisateurs1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `emoson`.`utilisateurs` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `numStage` ON `emoson`.`propose_designer` (`idProjet` ASC);

CREATE INDEX `fk_realise_utilisateurs1_idx` ON `emoson`.`propose_designer` (`idUtilisateur` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`propose`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`propose` (
  `idEntreprise` INT(11) NOT NULL,
  `idProjet` INT(11) NOT NULL,
  PRIMARY KEY (`idEntreprise`, `idProjet`),
  CONSTRAINT `fk_entreprises_has_projets_entreprises1`
    FOREIGN KEY (`idEntreprise`)
    REFERENCES `emoson`.`entreprises` (`idEntreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entreprises_has_projets_projets1`
    FOREIGN KEY (`idProjet`)
    REFERENCES `emoson`.`projets` (`idProjet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_entreprises_has_projets_projets1_idx` ON `emoson`.`propose` (`idProjet` ASC);

CREATE INDEX `fk_entreprises_has_projets_entreprises1_idx` ON `emoson`.`propose` (`idEntreprise` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`commentaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`commentaires` (
  `idUtilisateur` INT(11) NOT NULL,
  `idProjet` INT(11) NOT NULL,
  `dateCommentaire` VARCHAR(45) NOT NULL,
  `texteCommentaire` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUtilisateur`, `idProjet`),
  CONSTRAINT `fk_utilisateurs_has_projets_utilisateurs1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `emoson`.`utilisateurs` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateurs_has_projets_projets1`
    FOREIGN KEY (`idProjet`)
    REFERENCES `emoson`.`projets` (`idProjet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_utilisateurs_has_projets_projets1_idx` ON `emoson`.`commentaires` (`idProjet` ASC);

CREATE INDEX `fk_utilisateurs_has_projets_utilisateurs1_idx` ON `emoson`.`commentaires` (`idUtilisateur` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`widgets_lies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`widgets_lies` (
  `idWidget` INT NOT NULL AUTO_INCREMENT,
  `libWidget` VARCHAR(45) NULL,
  `codeWidget` LONGTEXT NOT NULL,
  `idUtilisateur` INT(11) NOT NULL,
  PRIMARY KEY (`idWidget`),
  CONSTRAINT `fk_widgets_lies_utilisateurs1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `emoson`.`utilisateurs` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_widgets_lies_utilisateurs1_idx` ON `emoson`.`widgets_lies` (`idUtilisateur` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`fichiers_lies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`fichiers_lies` (
  `idFichier` INT NOT NULL AUTO_INCREMENT,
  `libFichier` VARCHAR(45) NOT NULL,
  `dateUploadFichier` VARCHAR(45) NOT NULL,
  `idProjet` INT(11) NULL,
  `idUtilisateur` INT(11) NOT NULL,
  PRIMARY KEY (`idFichier`),
  CONSTRAINT `fk_fichiers_lies_projets1`
    FOREIGN KEY (`idProjet`)
    REFERENCES `emoson`.`projets` (`idProjet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fichiers_lies_commentaires1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `emoson`.`commentaires` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_fichiers_lies_projets1_idx` ON `emoson`.`fichiers_lies` (`idProjet` ASC);

CREATE INDEX `fk_fichiers_lies_commentaires1_idx` ON `emoson`.`fichiers_lies` (`idUtilisateur` ASC);


-- -----------------------------------------------------
-- Table `emoson`.`propose_projet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emoson`.`propose_projet` (
  `idProjet` INT(11) NOT NULL,
  `idUtilisateur` INT(11) NOT NULL,
  `acceptation` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idProjet`, `idUtilisateur`),
  CONSTRAINT `fk_projets_has_utilisateurs_projets1`
    FOREIGN KEY (`idProjet`)
    REFERENCES `emoson`.`projets` (`idProjet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projets_has_utilisateurs_utilisateurs1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `emoson`.`utilisateurs` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_projets_has_utilisateurs_utilisateurs1_idx` ON `emoson`.`propose_projet` (`idUtilisateur` ASC);

CREATE INDEX `fk_projets_has_utilisateurs_projets1_idx` ON `emoson`.`propose_projet` (`idProjet` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `utilisateurs` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `telUtilisateur`, `loginUtilisateur`, `passUtilisateur`, `emailUtilisateur`, `roleUtilisateur`, `bioUtilisateur`, `idCompte`, `certifUtilisateur`) VALUES
(1, 'AdminTest', 'testeur', 5478987, 'admin', 'c759eaf09e4638954f63ace0ce1b53b40f62ccb7', 'test@test.com', 'ADMIN', NULL, NULL, 0);