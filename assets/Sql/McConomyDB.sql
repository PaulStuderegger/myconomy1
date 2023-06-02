-- TEST TO TEST GITIGNORE FILE


-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MyConomy
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `MyConomy` ;

-- -----------------------------------------------------
-- Schema MyConomy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MyConomy` DEFAULT CHARACTER SET utf8 ;
USE `MyConomy` ;

-- -----------------------------------------------------
-- Table `MyConomy`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`User` (
  `UserId` INT NOT NULL AUTO_INCREMENT,
  `UserName` VARCHAR(45) NOT NULL,
  `EMail` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`UserId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MyConomy`.`TransactionType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`TransactionType` (
  `TransactionTypeId` INT NOT NULL AUTO_INCREMENT,
  `TransactionType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`TransactionTypeId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MyConomy`.`Balance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`Balance` (
  `BalanceId` INT NOT NULL AUTO_INCREMENT,
  `BalanceAmount` DECIMAL(10,2) NOT NULL,
  `BalanceDate` DATE NOT NULL,
  `UserId` INT NOT NULL,
  PRIMARY KEY (`BalanceId`),
  INDEX `fk_Balance_User1_idx` (`UserId` ASC) VISIBLE,
  CONSTRAINT `fk_Balance_User1`
    FOREIGN KEY (`UserId`)
    REFERENCES `MyConomy`.`User` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MyConomy`.`Calender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`Calender` (
  `CalenderId` INT NOT NULL AUTO_INCREMENT,
  `CalenderName` VARCHAR(45) NOT NULL,
  `UserId` INT NOT NULL,
  PRIMARY KEY (`CalenderId`),
  INDEX `fk_Calender_User1_idx` (`UserId` ASC) VISIBLE,
  CONSTRAINT `fk_Calender_User1`
    FOREIGN KEY (`UserId`)
    REFERENCES `MyConomy`.`User` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MyConomy`.`Colour`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`Colour` (
  `Colour` INT NOT NULL AUTO_INCREMENT,
  `ColourName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Colour`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MyConomy`.`CalenderEvent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`CalenderEvent` (
  `CalenderEventId` INT NOT NULL AUTO_INCREMENT,
  `Text` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `CalenderId` INT NOT NULL,
  `Colour` INT NOT NULL,
  PRIMARY KEY (`CalenderEventId`),
  INDEX `fk_CalenderEvent_Calender1_idx` (`CalenderId` ASC) VISIBLE,
  INDEX `fk_CalenderEvent_Colour1_idx` (`Colour` ASC) VISIBLE,
  CONSTRAINT `fk_CalenderEvent_Calender1`
    FOREIGN KEY (`CalenderId`)
    REFERENCES `MyConomy`.`Calender` (`CalenderId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CalenderEvent_Colour1`
    FOREIGN KEY (`Colour`)
    REFERENCES `MyConomy`.`Colour` (`Colour`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MyConomy`.`Transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MyConomy`.`Transaction` (
  `TransactionId` INT NOT NULL AUTO_INCREMENT,
  `TransactionAmount` DECIMAL(10,2) NOT NULL,
  `TransactionDate` DATE NOT NULL,
  `TransactionTypeId` INT NOT NULL,
  `BalanceId` INT NOT NULL,
  `CalenderEventId` INT NULL,
  PRIMARY KEY (`TransactionId`),
  INDEX `fk_Transaction_TransactionType1_idx` (`TransactionTypeId` ASC) VISIBLE,
  INDEX `fk_Transaction_Balance1_idx` (`BalanceId` ASC) VISIBLE,
  INDEX `fk_Transaction_CalenderEvent1_idx` (`CalenderEventId` ASC) VISIBLE,
  CONSTRAINT `fk_Transaction_TransactionType1`
    FOREIGN KEY (`TransactionTypeId`)
    REFERENCES `MyConomy`.`TransactionType` (`TransactionTypeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Transaction_Balance1`
    FOREIGN KEY (`BalanceId`)
    REFERENCES `MyConomy`.`Balance` (`BalanceId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Transaction_CalenderEvent1`
    FOREIGN KEY (`CalenderEventId`)
    REFERENCES `MyConomy`.`CalenderEvent` (`CalenderEventId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `MyConomy`.`User`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`User` (`UserId`, `UserName`, `EMail`, `Password`) VALUES (DEFAULT, 'Admin', 'admin@test.com', '$2y$10$DOu6DQz93J/oH4HN0hJZeO/vAdxIBEljOUS4qsKcWnjeOZsv07TXy');
INSERT INTO `MyConomy`.`User` (`UserId`, `UserName`, `EMail`, `Password`) VALUES (DEFAULT, 'User', 'user@test.com', 'abc');

COMMIT;


-- -----------------------------------------------------
-- Data for table `MyConomy`.`TransactionType`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`TransactionType` (`TransactionTypeId`, `TransactionType`) VALUES (DEFAULT, 'Essen');
INSERT INTO `MyConomy`.`TransactionType` (`TransactionTypeId`, `TransactionType`) VALUES (DEFAULT, 'Auto');
INSERT INTO `MyConomy`.`TransactionType` (`TransactionTypeId`, `TransactionType`) VALUES (DEFAULT, 'Spaß');
INSERT INTO `MyConomy`.`TransactionType` (`TransactionTypeId`, `TransactionType`) VALUES (DEFAULT, 'Gehalt');
INSERT INTO `MyConomy`.`TransactionType` (`TransactionTypeId`, `TransactionType`) VALUES (DEFAULT, 'Einkaufen');
INSERT INTO `MyConomy`.`TransactionType` (`TransactionTypeId`, `TransactionType`) VALUES (DEFAULT, 'Fixeinnahmen');

COMMIT;


-- -----------------------------------------------------
-- Data for table `MyConomy`.`Balance`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`Balance` (`BalanceId`, `BalanceAmount`, `BalanceDate`, `UserId`) VALUES (DEFAULT, 1000.50, '2023-05-12', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `MyConomy`.`Calender`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`Calender` (`CalenderId`, `CalenderName`, `UserId`) VALUES (DEFAULT, 'Plan', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `MyConomy`.`Colour`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`Colour` (`Colour`, `ColourName`) VALUES (DEFAULT, 'Red');
INSERT INTO `MyConomy`.`Colour` (`Colour`, `ColourName`) VALUES (DEFAULT, 'Blue');
INSERT INTO `MyConomy`.`Colour` (`Colour`, `ColourName`) VALUES (DEFAULT, 'Green');

COMMIT;


-- -----------------------------------------------------
-- Data for table `MyConomy`.`CalenderEvent`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`CalenderEvent` (`CalenderEventId`, `Text`, `Date`, `CalenderId`, `Colour`) VALUES (DEFAULT, 'Essen gehen', '2023-05-12', 1, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `MyConomy`.`Transaction`
-- -----------------------------------------------------
START TRANSACTION;
USE `MyConomy`;
INSERT INTO `MyConomy`.`Transaction` (`TransactionId`, `TransactionAmount`, `TransactionDate`, `TransactionTypeId`, `BalanceId`, `CalenderEventId`) VALUES (DEFAULT, 50, '2023-04-15', 6, 1, 1);
INSERT INTO `MyConomy`.`Transaction` (`TransactionId`, `TransactionAmount`, `TransactionDate`, `TransactionTypeId`, `BalanceId`, `CalenderEventId`) VALUES (DEFAULT, -1000, '2022-11-23', 2, 1, NULL);
INSERT INTO `MyConomy`.`Transaction` (`TransactionId`, `TransactionAmount`, `TransactionDate`, `TransactionTypeId`, `BalanceId`, `CalenderEventId`) VALUES (DEFAULT, 150, '2021-05-10', 6, 1, NULL);

COMMIT;

