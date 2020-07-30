-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: Demo_DB
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Account` (
  `IdAccount` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `PhoneNum` varchar(45) NOT NULL,
  `Username` varchar(11) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `State` varchar(7) NOT NULL DEFAULT 'offline',
  `Role` varchar(15) NOT NULL,
  PRIMARY KEY (`IdAccount`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  UNIQUE KEY `User_Email_uindex` (`Email`),
  UNIQUE KEY `User_PhoneNum_uindex` (`PhoneNum`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account`
--

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account` VALUES (1,'John','abcd@gmail.com','0856562876','admin','90fd0ce8f635975278cdb31bef05d336f12d19f0dd5cca4327c71057651c0915','offline','admin'),(2,'Peter','abcd1@gmail.com','0123456788','CN17AT0001','cb77c79c44c8b6b087af745d10a930704105c7341c111a9568a0522f59121511','online','manager'),(3,'Christopher ','abcde@gmail.com','0123654789','CN16AT0001','4d174486b6fb87d1374e448f024c9aab962868c65c7830d1708fdaf9a73a7457','offline','manager'),(4,'Groot','abcdef@gmail.com','0321456977','BS17AT0001','e228542324202ba0eefdb76a8952c04c27da136972a5ad95f5d589c7f13aa1d5','offline','employee'),(5,'Jon','abc123@gmail.com','0123456777','BS16AT0001','6bcbd150241132c51956077294512665dcde5cf88c901b01183076c94f6b0e25','offline','manager'),(6,'Steve','abc123hpzo112@gmail.com','0321456123','CN17AT0002','71d61c290a6c6bd3477b18e0be1b37b23b4f38a7f913c8449945636dce9851e7','offline','employee'),(7,'Elon','abc123hpacxo112@gmail.com','0321415643','CN17AT0003','26ad136d9f94d7a84de65b3851474ff5e71da5b9cb3ba87af0bf060352d18c74','offline','employee'),(8,'Musk','abcdef1@gmail.com','0856562654','CN17AT0004','946a5751526163f61b95cf5a56d5e6f2cd2470fb4bbe47287b972cad75242a48','offline','employee'),(9,'Bill','abc123rt@gmail.com','0342312321','BS17AT0002','308dc4f89d4f34d3bea0850603305f53c1611378016faf1de78b1da0d94bd232','offline','employee'),(10,'Linda','linda1234@gmail.com','0376232673','BS17AT0003','a1420d9bf33d546062e50e3a82f80bc90e50ac710ec784fd9fe8993ed0f739d7','offline','employee'),(11,'Andrew','andrew123@gmail.com','0874547547','CN16AT0002','e83743bc4e010e233ec6cbdab1c14b7aa0d31119390890fee43f873d94ef3cba','offline','employee'),(12,'Ian','ian123@gmail.com','0987697867','CN16AT0003','4a32118988f3509c7449ed1eefda57b63458775b4d638966dee5d3c9d1660759','offline','employee'),(13,'Wilson','wilson123@gmail.com','0923211232','CN16AT0004','032ee0c6ffd3040ac80151dab355cf9e6f27e16aa167cb4eb3941fbd1cef069d','offline','employee'),(14,'Taylor','taylor123@gmail.com','0197868787','HR16AT0001','6bcec49c30ba278a5d557e278de96959799d8f76d4bb849918581909567ccd09','offline','manager'),(15,'Annabella','annabella123@gmail.com','0917766564','HR17AT0001','dce70783c0ccc5314bd8a886ed0f0cdb12fe84c77cd786a8780c175e43b8238b','offline','employee'),(16,'Amelinda','amelinda123@gmail.com','0987645764','HR17AT0002','6915c0c3c5622629f5b417f7b5aa2061b8934cbab05b735c7082035303777c3d','offline','employee'),(17,'Charmaine','charmaine123@gmail.com','0897658675','HR16AT0002','b527956f83fc443b260c4edde4bff8549a0fbc2cf06bc9d78d2bd0cd0ca77018','offline','employee');
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Admin` (
  `IdAccount_Admin` int NOT NULL,
  PRIMARY KEY (`IdAccount_Admin`),
  CONSTRAINT `fk_Admin_Account` FOREIGN KEY (`IdAccount_Admin`) REFERENCES `Account` (`IdAccount`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
INSERT INTO `Admin` VALUES (1);
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Department`
--

DROP TABLE IF EXISTS `Department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Department` (
  `Department_Number` int NOT NULL,
  `Department_Name` varchar(45) NOT NULL,
  PRIMARY KEY (`Department_Number`),
  UNIQUE KEY `Department_Name_UNIQUE` (`Department_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Department`
--

LOCK TABLES `Department` WRITE;
/*!40000 ALTER TABLE `Department` DISABLE KEYS */;
INSERT INTO `Department` VALUES (1,'An toàn ứng dụng'),(2,'Kinh doanh'),(4,'Nhân sự'),(3,'Phân tích mã độc');
/*!40000 ALTER TABLE `Department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Department_Manager`
--

DROP TABLE IF EXISTS `Department_Manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Department_Manager` (
  `IdAccount_Employess` int NOT NULL,
  `Department_Number` int NOT NULL,
  PRIMARY KEY (`IdAccount_Employess`,`Department_Number`),
  KEY `fk_employess_has_Department_Department1_idx` (`Department_Number`),
  KEY `fk_employess_has_Department_employess1_idx` (`IdAccount_Employess`),
  CONSTRAINT `fk_employess_has_Department_Department1` FOREIGN KEY (`Department_Number`) REFERENCES `Department` (`Department_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_employess_has_Department_employess1` FOREIGN KEY (`IdAccount_Employess`) REFERENCES `Employess` (`IdAccount_Employess`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Department_Manager`
--

LOCK TABLES `Department_Manager` WRITE;
/*!40000 ALTER TABLE `Department_Manager` DISABLE KEYS */;
INSERT INTO `Department_Manager` VALUES (2,1),(5,2),(3,3),(14,4);
/*!40000 ALTER TABLE `Department_Manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dept_Emp`
--

DROP TABLE IF EXISTS `Dept_Emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Dept_Emp` (
  `Department_Number` int NOT NULL,
  `IdAccount_Employess` int NOT NULL,
  PRIMARY KEY (`Department_Number`,`IdAccount_Employess`),
  KEY `fk_Department_has_employess_employess1_idx` (`IdAccount_Employess`),
  KEY `fk_Department_has_employess_Department1_idx` (`Department_Number`),
  CONSTRAINT `fk_Department_has_employess_Department1` FOREIGN KEY (`Department_Number`) REFERENCES `Department` (`Department_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Department_has_employess_employess1` FOREIGN KEY (`IdAccount_Employess`) REFERENCES `Employess` (`IdAccount_Employess`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dept_Emp`
--

LOCK TABLES `Dept_Emp` WRITE;
/*!40000 ALTER TABLE `Dept_Emp` DISABLE KEYS */;
INSERT INTO `Dept_Emp` VALUES (2,4),(1,6),(1,7),(1,8),(2,9),(2,10),(3,11),(3,12),(3,13),(4,15),(4,16),(4,17);
/*!40000 ALTER TABLE `Dept_Emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employess`
--

DROP TABLE IF EXISTS `Employess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Employess` (
  `IdAccount_Employess` int NOT NULL,
  `Employess_Code` varchar(10) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(45) NOT NULL,
  `Hire_Date` date NOT NULL,
  `Job` varchar(45) NOT NULL,
  PRIMARY KEY (`IdAccount_Employess`,`Employess_Code`),
  CONSTRAINT `fk_employess_Account1` FOREIGN KEY (`IdAccount_Employess`) REFERENCES `Account` (`IdAccount`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employess`
--

LOCK TABLES `Employess` WRITE;
/*!40000 ALTER TABLE `Employess` DISABLE KEYS */;
INSERT INTO `Employess` VALUES (2,'CN17AT0001','1995-06-17','Nam','2017-05-04','Pentester'),(3,'CN16AT0001','1996-07-15','Nam','2016-06-15','Malware Analysis'),(4,'BS17AT0001','1997-08-12','Nam','2017-06-12','Sale'),(5,'BS16AT0001','1995-03-09','Nam','2016-05-09','Điều hành kinh doanh'),(6,'CN17AT0002','1998-11-10','Nam','2017-09-19','Pentester'),(7,'CN17AT0003','1997-11-18','Nam','2017-10-24','Pentester'),(8,'CN17AT0004','1999-05-17','Nam','2017-10-17','Pentester'),(9,'BS17AT0002','1998-09-21','Nam','2017-11-15','Sale'),(10,'BS17AT0003','1998-11-18','Nữ','2017-10-29','Sale'),(11,'CN16AT0002','1997-05-27','Nam','2016-11-22','Malware Analysis'),(12,'CN16AT0003','1998-02-02','Nam','2016-11-29','Malware Analysis'),(13,'CN16AT0004','1998-07-31','Nam','2016-12-14','Malware Analysis'),(14,'HR16AT0001','1995-02-13','Nữ','2016-03-08','Quản lý tuyển dụng'),(15,'HR17AT0001','1997-06-23','Nữ','2017-10-17','Tuyển dụng'),(16,'HR17AT0002','1997-02-04','Nữ','2017-10-29','Tuyển dụng'),(17,'HR16AT0002','1997-06-08','Nữ','2016-07-12','Tuyển dụng');
/*!40000 ALTER TABLE `Employess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Leave_Day_Form`
--

DROP TABLE IF EXISTS `Leave_Day_Form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Leave_Day_Form` (
  `IdAccount_Employess` int NOT NULL,
  `IdForm` int NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Reason` longtext NOT NULL,
  `Form_Status` varchar(45) DEFAULT 'Pending',
  PRIMARY KEY (`IdAccount_Employess`,`IdForm`),
  CONSTRAINT `fk_Leave_Day_Form_employess1` FOREIGN KEY (`IdAccount_Employess`) REFERENCES `Employess` (`IdAccount_Employess`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Leave_Day_Form`
--

LOCK TABLES `Leave_Day_Form` WRITE;
/*!40000 ALTER TABLE `Leave_Day_Form` DISABLE KEYS */;
INSERT INTO `Leave_Day_Form` VALUES (2,1,'2020-07-12','2020-07-18','Sick Leave 4','Approved'),(3,7,'2020-02-18','2020-02-25','Sick Leave','Pending'),(4,5,'2020-07-12','2020-07-18','Visit to Kings Landing','Approved'),(5,4,'2020-05-04','2020-06-13','Launching Tesla Model Y','Approved'),(6,2,'2020-07-06','2020-07-10','Urgent Family Cause 2','Approved'),(7,3,'2020-05-11','2020-05-14','Concert Tour 2','Approved'),(9,6,'2020-03-09','2020-03-13','Emergency Leave','Approved'),(11,8,'2020-04-21','2020-04-16','Urgent Family Cause','Pending'),(12,9,'2020-05-18','2020-05-23','Concert Tour','Pending'),(14,10,'2020-07-12','2020-07-18','Launching Tesla Model Y','Pending'),(15,11,'2020-07-19','2020-07-25','Visit to Kings Landing','Pending'),(16,12,'2020-07-26','2020-07-31','Emergency Leave','Pending');
/*!40000 ALTER TABLE `Leave_Day_Form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Salaries`
--

DROP TABLE IF EXISTS `Salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Salaries` (
  `IdAccount_Employess` int NOT NULL,
  `Month` int NOT NULL,
  `Year` year NOT NULL,
  `Net_Salary` varchar(12) NOT NULL,
  `Unpaid_leave_day` int(2) unsigned zerofill NOT NULL,
  `Late_day` int(2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`IdAccount_Employess`,`Month`,`Year`),
  CONSTRAINT `fk_Salaries_employess1` FOREIGN KEY (`IdAccount_Employess`) REFERENCES `Employess` (`IdAccount_Employess`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Salaries`
--

LOCK TABLES `Salaries` WRITE;
/*!40000 ALTER TABLE `Salaries` DISABLE KEYS */;
INSERT INTO `Salaries` VALUES (2,1,2020,'40000000',01,02),(2,2,2020,'40000000',02,03),(2,3,2020,'40000000',04,05),(2,4,2020,'40000000',06,07),(2,5,2020,'40000000',08,09),(2,6,2020,'40000000',10,11),(2,7,2020,'40000000',00,00),(3,7,2020,'40000000',00,00),(4,1,2020,'20000000',01,02),(4,2,2020,'20000000',02,03),(4,3,2020,'20000000',04,05),(4,4,2020,'20000000',06,07),(4,5,2020,'20000000',08,09),(4,6,2020,'20000000',10,11),(4,7,2020,'20000000',00,00),(5,7,2020,'20000000',00,00),(6,7,2020,'40000000',00,00),(7,7,2020,'20000000',00,00),(8,7,2020,'20000000',00,00),(9,7,2020,'20000000',00,00),(10,7,2020,'20000000',00,00),(11,7,2020,'20000000',00,00),(12,7,2020,'20000000',00,00),(13,7,2020,'20000000',00,00),(14,7,2020,'40000000',00,00),(15,7,2020,'20000000',00,00),(16,7,2020,'20000000',00,00),(17,7,2020,'20000000',00,00);
/*!40000 ALTER TABLE `Salaries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-08  5:11:33
