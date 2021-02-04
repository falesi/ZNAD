-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for znad_db
CREATE DATABASE IF NOT EXISTS `znad_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `znad_db`;

-- Dumping structure for table znad_db.address
CREATE TABLE IF NOT EXISTS `address` (
  `AddressID` int(11) NOT NULL AUTO_INCREMENT,
  `PrimaryAddress` varchar(50) NOT NULL,
  `SecondaryAddress` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(50) NOT NULL DEFAULT '10010',
  `DistrictID` int(11) NOT NULL,
  `UserMasterID` varchar(50) NOT NULL,
  `Town` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `HouseNo` varchar(50) NOT NULL,
  `POBox` varchar(250) DEFAULT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AddressID`),
  KEY `FK_address_district` (`DistrictID`),
  CONSTRAINT `FK_address_district` FOREIGN KEY (`DistrictID`) REFERENCES `dist` (`DistrictID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.address: ~0 rows (approximately)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table znad_db.applicant
CREATE TABLE IF NOT EXISTS `applicant` (
  `ApplicantID` int(11) NOT NULL AUTO_INCREMENT,
  `UserMasterID` int(11) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `StatusCode` char(5) NOT NULL,
  `DateOfSubmission` date NOT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ApplicantID`),
  KEY `FK_applicant_usermaster` (`UserMasterID`),
  KEY `FK_applicant_address` (`AddressID`),
  KEY `FK_applicant_status` (`StatusCode`) USING BTREE,
  CONSTRAINT `FK_applicant_address` FOREIGN KEY (`AddressID`) REFERENCES `addr` (`AddressID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_applicant_statusmaster` FOREIGN KEY (`StatusCode`) REFERENCES `statusmaster` (`StatusCode`) ON UPDATE CASCADE,
  CONSTRAINT `FK_applicant_usermaster` FOREIGN KEY (`UserMasterID`) REFERENCES `usermaster` (`UserMastreID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.applicant: ~0 rows (approximately)
DELETE FROM `applicant`;
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;

-- Dumping structure for table znad_db.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `UserMasterID` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`ContactID`),
  KEY `FK_contact_usermaster` (`UserMasterID`),
  CONSTRAINT `FK_contact_usermaster` FOREIGN KEY (`UserMasterID`) REFERENCES `usermaster` (`UserMastreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.contact: ~0 rows (approximately)
DELETE FROM `contact`;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Dumping structure for table znad_db.country
CREATE TABLE IF NOT EXISTS `country` (
  `CountryID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL,
  `ConuntryCode` char(5) NOT NULL,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryID`),
  UNIQUE KEY `ConuntryCode` (`ConuntryCode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.country: ~0 rows (approximately)
DELETE FROM `country`;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`CountryID`, `CountryName`, `ConuntryCode`, `IsActive`) VALUES
	(1, 'Zambia ', '+260', '1');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;

-- Dumping structure for table znad_db.disability
CREATE TABLE IF NOT EXISTS `disability` (
  `DisabilityID` int(11) NOT NULL AUTO_INCREMENT,
  `DisabilityTypeID` int(11) NOT NULL,
  `ApplicantID` int(11) NOT NULL,
  PRIMARY KEY (`DisabilityID`),
  KEY `FK_disability_disabilitytype` (`DisabilityTypeID`),
  KEY `FK_disability_applicant` (`ApplicantID`),
  CONSTRAINT `FK_disability_applicant` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_disability_disabilitytype` FOREIGN KEY (`DisabilityTypeID`) REFERENCES `disabilitytype` (`DisabilityTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.disability: ~0 rows (approximately)
DELETE FROM `disability`;
/*!40000 ALTER TABLE `disability` DISABLE KEYS */;
/*!40000 ALTER TABLE `disability` ENABLE KEYS */;

-- Dumping structure for table znad_db.disabilitytype
CREATE TABLE IF NOT EXISTS `disabilitytype` (
  `DisabilityTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `Disability` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DisabilityTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.disabilitytype: ~0 rows (approximately)
DELETE FROM `disabilitytype`;
/*!40000 ALTER TABLE `disabilitytype` DISABLE KEYS */;
/*!40000 ALTER TABLE `disabilitytype` ENABLE KEYS */;

-- Dumping structure for table znad_db.dist
CREATE TABLE IF NOT EXISTS `dist` (
  `DistrictID` int(11) NOT NULL AUTO_INCREMENT,
  `District` varchar(50) NOT NULL DEFAULT '',
  `ProvinceID` int(11) NOT NULL,
  PRIMARY KEY (`DistrictID`),
  KEY `FK_district_province` (`ProvinceID`),
  CONSTRAINT `FK_district_province` FOREIGN KEY (`ProvinceID`) REFERENCES `prov` (`ProvinceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.dist: ~0 rows (approximately)
DELETE FROM `dist`;
/*!40000 ALTER TABLE `dist` DISABLE KEYS */;
/*!40000 ALTER TABLE `dist` ENABLE KEYS */;

-- Dumping structure for table znad_db.district
CREATE TABLE IF NOT EXISTS `district` (
  `DistrictID` int(11) NOT NULL AUTO_INCREMENT,
  `DistrictName` varchar(50) NOT NULL,
  `ProvinceID` int(11) NOT NULL,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DistrictID`),
  KEY `FK_PROVINCEID` (`ProvinceID`),
  CONSTRAINT `FK_PROVINCEID` FOREIGN KEY (`ProvinceID`) REFERENCES `province` (`ProvinceID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.district: ~103 rows (approximately)
DELETE FROM `district`;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`DistrictID`, `DistrictName`, `ProvinceID`, `IsActive`) VALUES
	(2, 'Chibombo District', 1, '1'),
	(3, 'Kabwe District', 1, '1'),
	(4, 'Kapiri Mposhi District', 1, '1'),
	(5, 'Mkushi District', 1, '1'),
	(6, 'Mumbwa District', 1, '1'),
	(7, 'Serenje District', 1, '1'),
	(8, 'Luano District', 1, '1'),
	(9, 'Chitambo District', 1, '1'),
	(10, 'Ngabwe District', 1, '1'),
	(11, 'Chisamba District', 1, '1'),
	(12, 'Itezhi-Tezhi District', 1, '1'),
	(13, 'Shibuyunji District', 1, '1'),
	(14, 'Chililabombwe District', 2, '1'),
	(15, 'Chingola District', 2, '1'),
	(16, 'Kalulushi District', 2, '1'),
	(17, 'Kitwe District', 2, '1'),
	(18, 'Luanshya District', 2, '1'),
	(19, 'Lufwanyama District', 2, '1'),
	(20, 'Masaiti District', 2, '1'),
	(21, 'Mpongwe District', 2, '1'),
	(22, 'Mufulira District', 2, '1'),
	(23, 'Ndola District', 2, '1'),
	(24, 'Chadiza District', 3, '1'),
	(25, 'Chipata District', 3, '1'),
	(26, 'Katete District', 3, '1'),
	(27, 'Lundazi District', 3, '1'),
	(28, 'Mambwe District', 3, '1'),
	(29, 'Nyimba District', 3, '1'),
	(30, 'Petauke District', 3, '1'),
	(31, 'Sinda District', 3, '1'),
	(32, 'Vubwi District', 3, '1'),
	(33, 'Chiengi District', 4, '1'),
	(34, 'Chipili District', 4, '1'),
	(35, 'Chembe District', 4, '1'),
	(36, 'Kawambwa District', 4, '1'),
	(37, 'Lunga District', 4, '1'),
	(38, 'Mansa District', 4, '1'),
	(39, 'Milenge District', 4, '1'),
	(40, 'Mwansabombwe District', 4, '1'),
	(41, 'Mwense District', 4, '1'),
	(42, 'Nchelenge District', 4, '1'),
	(43, 'Samfya District', 4, '1'),
	(44, 'Chilanga District', 5, '1'),
	(45, 'Chirundu District', 5, '1'),
	(46, 'Chongwe District', 5, '1'),
	(47, 'Kafue District', 5, '1'),
	(48, 'Luangwa District', 5, '1'),
	(49, 'Lusaka District', 5, '1'),
	(50, 'Rufunsa District', 5, '1'),
	(51, 'Chama District', 6, '1'),
	(52, 'Chinsali District', 6, '1'),
	(53, 'Isoka District', 6, '1'),
	(54, 'Mafinga District', 6, '1'),
	(55, 'Mpika District', 6, '1'),
	(56, 'Nakonde District', 6, '1'),
	(57, 'Shiwangandu District', 6, '1'),
	(58, 'Chilubi District', 7, '1'),
	(59, 'Kaputa District', 7, '1'),
	(60, 'Kasama District', 7, '1'),
	(61, 'Luwingu District', 7, '1'),
	(62, 'Mbala District', 7, '1'),
	(63, 'Mporokoso District', 7, '1'),
	(64, 'Mpulungu District', 7, '1'),
	(65, 'Mungwi District', 7, '1'),
	(66, 'Nsama District', 7, '1'),
	(67, 'Chavuma District', 8, '1'),
	(68, 'Ikelenge District', 8, '1'),
	(69, 'Kabompo District', 8, '1'),
	(70, 'Kasempa District', 8, '1'),
	(71, 'Mufumbwe District', 8, '1'),
	(72, 'Mwinilunga District', 8, '1'),
	(73, 'Solwezi District', 8, '1'),
	(74, 'Zambezi District', 8, '1'),
	(75, 'Manyinga District', 8, '1'),
	(76, 'Chikankata District', 9, '1'),
	(77, 'Choma District', 9, '1'),
	(78, 'Gwembe District', 9, '1'),
	(79, 'Kalomo District', 9, '1'),
	(80, 'Kazungula District', 9, '1'),
	(81, 'Livingstone District', 9, '1'),
	(82, 'Mazabuka District', 9, '1'),
	(83, 'Monze District', 9, '1'),
	(84, 'Namwala District', 9, '1'),
	(85, 'Pemba District', 9, '1'),
	(86, 'Siavonga District', 9, '1'),
	(87, 'Sinazongwe District', 9, '1'),
	(88, 'Zimba District', 9, '1'),
	(89, 'Kalabo District', 10, '1'),
	(90, 'Kaoma District', 10, '1'),
	(91, 'Lukulu District', 10, '1'),
	(92, 'Mongu District', 10, '1'),
	(93, 'Mulobezi District', 10, '1'),
	(94, 'Senanga District', 10, '1'),
	(95, 'Sesheke District', 10, '1'),
	(96, 'Shangombo District', 10, '1'),
	(97, 'Nalolo District', 10, '1'),
	(98, 'Limulunga District', 10, '1'),
	(99, 'Nkeyema District', 10, '1'),
	(100, 'Sikongo District', 10, '1'),
	(101, 'Sioma District', 10, '1'),
	(102, 'Mitete District', 10, '1'),
	(103, 'Mwandi District', 10, '1'),
	(104, 'Luampa District', 10, '1');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;

-- Dumping structure for table znad_db.document
CREATE TABLE IF NOT EXISTS `document` (
  `DocID` int(11) NOT NULL AUTO_INCREMENT,
  `DocName` varchar(50) NOT NULL,
  `DocTypeID` int(11) NOT NULL,
  `ApplicantID` int(11) NOT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` date NOT NULL,
  PRIMARY KEY (`DocID`),
  KEY `FK_document_documnettype` (`DocTypeID`),
  KEY `FK_document_applicant` (`ApplicantID`),
  CONSTRAINT `FK_document_applicant` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_document_documnettype` FOREIGN KEY (`DocTypeID`) REFERENCES `documnettype` (`DocTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.document: ~0 rows (approximately)
DELETE FROM `document`;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Dumping structure for table znad_db.documnettype
CREATE TABLE IF NOT EXISTS `documnettype` (
  `DocTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `DocType` varchar(50) NOT NULL,
  PRIMARY KEY (`DocTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.documnettype: ~0 rows (approximately)
DELETE FROM `documnettype`;
/*!40000 ALTER TABLE `documnettype` DISABLE KEYS */;
/*!40000 ALTER TABLE `documnettype` ENABLE KEYS */;

-- Dumping structure for table znad_db.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `GenderID` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` varchar(10) NOT NULL DEFAULT '',
  `GenderCode` char(1) NOT NULL,
  PRIMARY KEY (`GenderID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.gender: ~0 rows (approximately)
DELETE FROM `gender`;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`GenderID`, `Gender`, `GenderCode`) VALUES
	(1, 'Male', 'M'),
	(2, 'Female', 'F');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for function znad_db.GetSequence
DELIMITER //
CREATE FUNCTION `GetSequence`(`SequenceID` INT


) RETURNS varchar(50) CHARSET utf8mb4
    DETERMINISTIC
    COMMENT 'This Function is used to get a sequnce based on the defined sequnces'
BEGIN
   
 			DECLARE LASTINSERTEDID VARCHAR(50);
			DECLARE NEWLASTINSETEDID VARCHAR(50);
			DECLARE SEQUNCECODE CHAR(4);
		
    
         SELECT SM.LastInsertedID INTO LASTINSERTEDID FROM sequencemaster SM WHERE SM.SequenceMasterID = SequenceID;
			
			SELECT SM.LastInsertedID+1 INTO NEWLASTINSETEDID FROM sequencemaster SM  WHERE SM.SequenceMasterID = SequenceID;
				
			SELECT SM.SequnceCode INTO  SEQUNCECODE FROM sequencemaster SM  WHERE SM.SequenceMasterID = SequenceID;
				
			UPDATE sequencemaster SET `LastInsertedID` = NEWLASTINSETEDID WHERE SequenceMasterID = SequenceID;
				
			-- return the Sequence
			RETURN CONCAT(SEQUNCECODE,"000000000",NEWLASTINSETEDID) ;
				
			
			
    
   
END//
DELIMITER ;

-- Dumping structure for procedure znad_db.GetSequence
DELIMITER //
CREATE PROCEDURE `GetSequence`(
	IN `SequenceID` INT


)
    COMMENT 'This sp is used to get the defined sequnce'
BEGIN
				DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
			     SELECT 0 AS message;
			     ROLLBACK;
 END;
				
				SET @LASTINSERTEDID = (SELECT SM.LastInsertedID FROM sequencemaster SM WHERE SM.SequenceMasterID = SequenceID );
				
				SET @NEWLASTINSETEDID  = (( SELECT SM.LastInsertedID FROM sequencemaster SM WHERE SM.SequenceMasterID = SequenceID)+1 );
				
				SET @SEQUNCECODE = (SELECT SM.SequnceCode FROM sequencemaster SM WHERE SM.SequenceMasterID = SequenceID);
				
				SET @SEQUNCE  = ( CONCAT(@SEQUNCECODE,"000000000",@NEWLASTINSETEDID) );
				
				UPDATE sequencemaster SET `LastInsertedID` = @NEWLASTINSETEDID WHERE SequenceMasterID = SequenceID;
				
				SELECT @SEQUNCE	AS 'SequnceNumber';
END//
DELIMITER ;

-- Dumping structure for table znad_db.humanresource
CREATE TABLE IF NOT EXISTS `humanresource` (
  `HRID` int(11) NOT NULL AUTO_INCREMENT,
  `UserMasterID` int(11) NOT NULL,
  `IsHOD` char(1) NOT NULL DEFAULT '0',
  `IsActive` char(1) NOT NULL DEFAULT '0',
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` date NOT NULL,
  PRIMARY KEY (`HRID`),
  KEY `FK_humanresource_usermaster` (`UserMasterID`),
  CONSTRAINT `FK_humanresource_usermaster` FOREIGN KEY (`UserMasterID`) REFERENCES `usermaster` (`UserMastreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.humanresource: ~0 rows (approximately)
DELETE FROM `humanresource`;
/*!40000 ALTER TABLE `humanresource` DISABLE KEYS */;
/*!40000 ALTER TABLE `humanresource` ENABLE KEYS */;

-- Dumping structure for table znad_db.loginhistory
CREATE TABLE IF NOT EXISTS `loginhistory` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `UserMasterID` int(11) NOT NULL,
  `LoggedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LoggedOutOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LogID`),
  KEY `FK_loginhistory_usermaster` (`UserMasterID`),
  CONSTRAINT `FK_loginhistory_usermaster` FOREIGN KEY (`UserMasterID`) REFERENCES `usermaster` (`UserMastreID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.loginhistory: ~0 rows (approximately)
DELETE FROM `loginhistory`;
/*!40000 ALTER TABLE `loginhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginhistory` ENABLE KEYS */;

-- Dumping structure for table znad_db.programme
CREATE TABLE IF NOT EXISTS `programme` (
  `ProgrammeID` int(11) NOT NULL AUTO_INCREMENT,
  `Programme` varchar(50) NOT NULL,
  `SchoolID` int(11) NOT NULL,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProgrammeID`),
  KEY `FK_programme_school` (`SchoolID`),
  CONSTRAINT `FK_programme_school` FOREIGN KEY (`SchoolID`) REFERENCES `school` (`SchoolID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.programme: ~0 rows (approximately)
DELETE FROM `programme`;
/*!40000 ALTER TABLE `programme` DISABLE KEYS */;
/*!40000 ALTER TABLE `programme` ENABLE KEYS */;

-- Dumping structure for table znad_db.province
CREATE TABLE IF NOT EXISTS `province` (
  `ProvinceID` int(11) NOT NULL AUTO_INCREMENT,
  `ProvinceName` varchar(50) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProvinceID`),
  KEY `FK_province_country` (`CountryID`),
  CONSTRAINT `FK_province_country` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.province: ~10 rows (approximately)
DELETE FROM `province`;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`ProvinceID`, `ProvinceName`, `CountryID`, `IsActive`) VALUES
	(1, 'Central', 1, '1'),
	(2, 'Copperbelt', 1, '1'),
	(3, 'Eastern', 1, '1'),
	(4, 'Luapula', 1, '1'),
	(5, 'Lusaka', 1, '1'),
	(6, 'Muchinga', 1, '1'),
	(7, 'Northern', 1, '1'),
	(8, 'Northwestern', 1, '1'),
	(9, 'Southern', 1, '1'),
	(10, 'Western', 1, '1');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table znad_db.school
CREATE TABLE IF NOT EXISTS `school` (
  `SchoolID` int(11) NOT NULL AUTO_INCREMENT,
  `School` varchar(50) NOT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SchoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.school: ~0 rows (approximately)
DELETE FROM `school`;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
/*!40000 ALTER TABLE `school` ENABLE KEYS */;

-- Dumping structure for table znad_db.sequencemaster
CREATE TABLE IF NOT EXISTS `sequencemaster` (
  `SequenceMasterID` int(11) NOT NULL AUTO_INCREMENT,
  `SequnceCode` char(4) NOT NULL,
  `LastInsertedID` int(11) NOT NULL DEFAULT '0',
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SequenceMasterID`),
  UNIQUE KEY `SequnceCode` (`SequnceCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table znad_db.sequencemaster: ~0 rows (approximately)
DELETE FROM `sequencemaster`;
/*!40000 ALTER TABLE `sequencemaster` DISABLE KEYS */;
/*!40000 ALTER TABLE `sequencemaster` ENABLE KEYS */;

-- Dumping structure for table znad_db.statusmaster
CREATE TABLE IF NOT EXISTS `statusmaster` (
  `StatusID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT '',
  `StatusCode` char(5) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`StatusID`),
  UNIQUE KEY `StatusCode` (`StatusCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.statusmaster: ~0 rows (approximately)
DELETE FROM `statusmaster`;
/*!40000 ALTER TABLE `statusmaster` DISABLE KEYS */;
/*!40000 ALTER TABLE `statusmaster` ENABLE KEYS */;

-- Dumping structure for table znad_db.student
CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `UserMasterID` int(11) NOT NULL,
  `StudentNo` varchar(50) NOT NULL DEFAULT '',
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `StudentNo` (`StudentNo`),
  KEY `FK_student_usermaster` (`UserMasterID`),
  CONSTRAINT `FK_student_usermaster` FOREIGN KEY (`UserMasterID`) REFERENCES `usermaster` (`UserMastreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.student: ~0 rows (approximately)
DELETE FROM `student`;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table znad_db.titlemaster
CREATE TABLE IF NOT EXISTS `titlemaster` (
  `TitleID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `TitleCode` char(5) NOT NULL,
  `IsActive` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TitleID`),
  UNIQUE KEY `TitleCode` (`TitleCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.titlemaster: ~0 rows (approximately)
DELETE FROM `titlemaster`;
/*!40000 ALTER TABLE `titlemaster` DISABLE KEYS */;
/*!40000 ALTER TABLE `titlemaster` ENABLE KEYS */;

-- Dumping structure for table znad_db.usermaster
CREATE TABLE IF NOT EXISTS `usermaster` (
  `UserMastreID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `OtherName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(50) NOT NULL,
  `GenderID` int(11) NOT NULL,
  `UserRoleID` int(11) NOT NULL,
  `TitleCode` char(5) NOT NULL,
  `PublicID` varchar(50) NOT NULL,
  `IsActice` char(1) NOT NULL DEFAULT '0',
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserMastreID`),
  UNIQUE KEY `UserName` (`UserName`),
  UNIQUE KEY `PublicID` (`PublicID`),
  KEY `FK_usermaster_gender` (`GenderID`),
  KEY `FK_usermaster_userrole` (`UserRoleID`),
  KEY `FK_usermaster_titlemaster` (`TitleCode`),
  CONSTRAINT `FK_usermaster_gender` FOREIGN KEY (`GenderID`) REFERENCES `gender` (`GenderID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_usermaster_titlemaster` FOREIGN KEY (`TitleCode`) REFERENCES `titlemaster` (`TitleCode`) ON UPDATE CASCADE,
  CONSTRAINT `FK_usermaster_userrole` FOREIGN KEY (`UserRoleID`) REFERENCES `userrole` (`UserRoleID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.usermaster: ~0 rows (approximately)
DELETE FROM `usermaster`;
/*!40000 ALTER TABLE `usermaster` DISABLE KEYS */;
/*!40000 ALTER TABLE `usermaster` ENABLE KEYS */;

-- Dumping structure for table znad_db.userrole
CREATE TABLE IF NOT EXISTS `userrole` (
  `UserRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `UpdatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserRoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table znad_db.userrole: ~1 rows (approximately)
DELETE FROM `userrole`;
/*!40000 ALTER TABLE `userrole` DISABLE KEYS */;
INSERT INTO `userrole` (`UserRoleID`, `RoleName`, `IsActive`, `UpdatedBy`, `UpdatedOn`) VALUES
	(2, 'Student', b'1', 'falesi', '2021-01-13 12:20:41');
/*!40000 ALTER TABLE `userrole` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
