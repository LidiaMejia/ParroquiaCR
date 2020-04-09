CREATE TABLE `parroquia`.`productos` (
  `codprd` BIGINT(18) NOT NULL AUTO_INCREMENT,
  `dscprd` VARCHAR(70) NOT NULL,
  `sdscprd` VARCHAR(255) NOT NULL,
  `ldscprd` TEXT NULL,
  `skuprd` VARCHAR(128) NOT NULL,
  `catprd` VARCHAR(100) NOT NULL,
  `prcprd` DECIMAL(12,2) NOT NULL,
  `urlprd` VARCHAR(255) NULL,
  `urlthbprd` VARCHAR(255) NULL,
  `estprd` CHAR(3) NOT NULL,
  PRIMARY KEY (`codprd`));


