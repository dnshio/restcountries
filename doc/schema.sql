SET NAMES utf8mb4;

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `iso2` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tld` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`iso2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `country_languages`;
CREATE TABLE `country_languages` (
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`country`,`language`),
  KEY `IDX_153256195373C966` (`country`),
  KEY `IDX_15325619D4DB71B5` (`language`),
  CONSTRAINT `FK_153256195373C966` FOREIGN KEY (`country`) REFERENCES `country` (`iso2`) ON DELETE CASCADE,
  CONSTRAINT `FK_15325619D4DB71B5` FOREIGN KEY (`language`) REFERENCES `language` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `translation`;
CREATE TABLE `translation` (
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`country`,`language`),
  KEY `IDX_B469456F5373C966` (`country`),
  KEY `IDX_B469456FD4DB71B5` (`language`),
  CONSTRAINT `FK_B469456F5373C966` FOREIGN KEY (`country`) REFERENCES `country` (`iso2`) ON DELETE CASCADE,
  CONSTRAINT `FK_B469456FD4DB71B5` FOREIGN KEY (`language`) REFERENCES `language` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;