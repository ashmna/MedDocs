# CREATE SCHEMA `med_docs` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

DROP TABLE IF EXISTS `workingTimes`;
DROP TABLE IF EXISTS `orders`;

DROP TABLE IF EXISTS `clients`;
DROP TABLE IF EXISTS `doctors`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `partners`;

DROP TABLE IF EXISTS `counters`;

CREATE TABLE `partners` (
  `partnerId` INT(3)       NOT NULL AUTO_INCREMENT,
  `name`      VARCHAR(255) NOT NULL,

  PRIMARY KEY (`partnerId`),
  UNIQUE INDEX `partnerId_UNIQUE` (`partnerId` ASC)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;

CREATE TABLE `users` (
  `partnerId` INT(3)      NOT NULL DEFAULT 0,
  `userId`    INT(11)     NOT NULL AUTO_INCREMENT,
  `userName`  CHAR(45)    NOT NULL,
  `email`     VARCHAR(75) NULL,
  `role`      ENUM('Admin', 'Secretary', 'Doctor', 'Client')
              CHARACTER SET 'utf8'
              COLLATE 'utf8_unicode_ci'
                          NOT NULL DEFAULT 'Client',
  `passHash`  CHAR(64)    NOT NULL,
  `pass`      VARCHAR(45) NULL,
  PRIMARY KEY (`userId`),
  UNIQUE INDEX `userId_UNIQUE` (`userId` ASC),
  UNIQUE INDEX `userName_UNIQUE` (`partnerId`, `userName` ASC)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;

CREATE TABLE `doctors` (
  `partnerId`      INT(3)       NOT NULL DEFAULT 0,
  `doctorId`       INT(11)      NOT NULL AUTO_INCREMENT
  COMMENT 'doctorId == userId',

  `avatar`         VARCHAR(100) NULL,
  `firstName`      VARCHAR(100) NULL,
  `lastName`       VARCHAR(100) NULL,
  `patronymicName` VARCHAR(100) NULL,
  `gender`         ENUM('Male', 'Female')
                   CHARACTER SET 'utf8'
                   COLLATE 'utf8_unicode_ci'
                                NOT NULL,
  `email`          VARCHAR(75)  NULL,
  `phone`          VARCHAR(255) NULL,
  `birthDay`       DATE         NULL,
  `address`        VARCHAR(255) NULL,
  `zipCode`        VARCHAR(10)  NULL,
  `specialization` INT(3)       NOT NULL DEFAULT 0,
  PRIMARY KEY (`doctorId`),
  UNIQUE INDEX `doctorId_UNIQUE` (`doctorId` ASC),
  CONSTRAINT `fk_doctor_user`
  FOREIGN KEY (`doctorId`)
  REFERENCES `users` (`userId`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;


CREATE TABLE `clients` (
  `partnerId`       INT(3)       NOT NULL DEFAULT 0,
  `clientId`        INT(11)      NOT NULL AUTO_INCREMENT
  COMMENT 'clientId == userId',
  `avatar`          VARCHAR(100) NULL,
  `firstName`       VARCHAR(100) NULL,
  `lastName`        VARCHAR(100) NULL,
  `patronymicName`  VARCHAR(100) NULL,
  `gender`          ENUM('Male', 'Female')
                    CHARACTER SET 'utf8'
                    COLLATE 'utf8_unicode_ci'
                                 NOT NULL,
  `email`           VARCHAR(75)  NULL,
  `phone`           VARCHAR(255) NULL,
  `birthDay`        DATE         NULL,
  `address`         VARCHAR(255) NULL,
  `lastVisitedDate` DATE         NULL,
  PRIMARY KEY (`clientId`),
  UNIQUE INDEX `clientId_UNIQUE` (`clientId` ASC),
  CONSTRAINT `fk_client_user`
  FOREIGN KEY (`clientId`)
  REFERENCES `users` (`userId`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;


INSERT INTO users VALUES (1, 1, 'admin', 'admin@meddocs.am', 'Admin', '', 'admin');


CREATE TABLE `workingTimes` (
  `partnerId`     INT(3)  NOT NULL DEFAULT 0,
  `workingTimeId` INT(3)  NOT NULL AUTO_INCREMENT,
  `doctorId`      INT(11) NOT NULL DEFAULT 0,
  `date`          DATE    NOT NULL,
  `startTime`     TIME    NOT NULL,
  `endTime`       TIME    NOT NULL,
  PRIMARY KEY (`workingTimeId`),
  UNIQUE INDEX `doctorId_UNIQUE` (`doctorId` ASC),
  CONSTRAINT `fk_workingTime_doctor`
  FOREIGN KEY (`doctorId`)
  REFERENCES `doctors` (`doctorId`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;


CREATE TABLE `orders` (
  `partnerId`    INT(3)  NOT NULL DEFAULT 0,
  `orderId`      INT(11) NOT NULL AUTO_INCREMENT,
  `paretOrderId` INT(11) NOT NULL DEFAULT 0,
  `clientId`     INT(11) NOT NULL,
  `doctorId`     INT(11) NOT NULL,

  PRIMARY KEY (`orderId`),
  UNIQUE INDEX `orderId_UNIQUE` (`orderId` ASC),

  CONSTRAINT `fk_order_client`
  FOREIGN KEY (`clientId`)
  REFERENCES `clients` (`clientId`),

  CONSTRAINT `fk_order_doctor`
  FOREIGN KEY (`doctorId`)
  REFERENCES `doctors` (`doctorId`),

  CONSTRAINT `fk_order_parentOrder`
  FOREIGN KEY (`paretOrderId`)
  REFERENCES `orders` (`orderId`)

)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;

CREATE TABLE `counters` (
  `counterName` CHAR(50) NOT NULL,
  `lastIndex`   INT(11)  NOT NULL DEFAULT 0,
  PRIMARY KEY (`counterName`),
  UNIQUE INDEX `counterName_UNIQUE` (`counterName` ASC)

)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE utf8_unicode_ci;

INSERT INTO counters VALUES ('fileSystem', 0);

DROP PROCEDURE IF EXISTS getCounterNextIndex;
CREATE PROCEDURE getCounterNextIndex (IN `inCounterName` CHAR(50))
BEGIN
  UPDATE counters SET lastIndex = lastIndex + 1 WHERE counterName = inCounterName;
  SELECT lastIndex FROM counters WHERE counterName = inCounterName;
END;
