-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: my_project
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
DROP TABLE IF EXISTS `loai_san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loai_san_pham` (
  `idmaloai` int NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(255) NOT NULL,
  PRIMARY KEY (`idmaloai`),
  UNIQUE KEY `tenLoai` (`tenLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO loai_san_pham (idmaloai,tenLoai) VALUES
 ('0','Áo dài dáng xưa'),
 ('1','Áo dài cách tân'),
 ('2','Áo dài thiêu tay'),
 ('3','Áo dài truyền thống'); 
--
-- Dumping data for table `loai_san_pham`
--

LOCK TABLES `loai_san_pham` WRITE;
/*!40000 ALTER TABLE `loai_san_pham` DISABLE KEYS */;
/*!40000 ALTER TABLE `loai_san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `idsanpham` int NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(255) NOT NULL,
  `hinhanh` varchar(20) NOT NULL,
  `id_maloai` int DEFAULT NULL,
  PRIMARY KEY (`idsanpham`),
  UNIQUE KEY `tensanpham` (`tensanpham`),
  KEY `id_maloai` (`id_maloai`),
  CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_maloai`) REFERENCES `loai_san_pham` (`idmaloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--


LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;




INSERT INTO sanpham (idsanpham,tensanpham,hinhanh,id_maloai) VALUES 
('0','Áo dài dáng xưa cẩm thủy','demo1.gif','1'),
('1','Áo dài truyền thống hương xưa','demo2.gif','1'),
('2','Áo dài dáng xưa nét ngọc','anh5.gif','1'),
('3','Áo dài dáng xưa xuân sang','demo1.gif','1'),
('4','Áo dài dáng xưa hương thủy','anh1.jpg','1'),
('5','Áo dài truyền thống bạch vân','anh2.jpg','3'),
('6','Áo dài truyền thống hương son','anh3.jpg','3'),
('7','Áo dài truyền thống sắc ngọc','anh5.jpg','3'),
('8','Áo dài truyền thống hương trời','anh6.gif','3'),
('9','Áo dài truyền thống tình thu','sumire_1.gif','3'),
('10','Áo dài thiêu tay đông qua','demo4.jpg','2'),
('11','Áo dài thiêu tay bến lỡ','anh3.jpg','2'),
('12','Áo dài thiêu tay tình trăng','anh5.jpg','2'),
('13','Áo dài thiêu tay sông quê','demo1.gif','2'),
('14','Áo dài thiêu tay ngọc xuân','anh5.jpg','2'),
('15','Áo dài thiêu tay hương tràm','demo1.gif','2'),
('16','Áo dài thiêu cách tân hương cỏ','demo1.gif','1'),
('17','Áo dài thiêu cách tân hương núi','anh3.jpg','1'),
('18','Áo dài thiêu cách tân bóng xưa','demo1.gif','1'),
('19','Áo dài thiêu cách tân chiều tà','demo1.gif','1'),
('20','Áo dài thiêu cách tân mây trôi','demo1.gif','1');
