-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 182.50.133.84    Database: bahaghari_db
-- ------------------------------------------------------
-- Server version	5.5.43-37.2-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `recipient`
--

DROP TABLE IF EXISTS `recipient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipient` (
  `recipient_id` varchar(10) NOT NULL,
  `recipient_lname` varchar(100) DEFAULT NULL,
  `recipient_fname` varchar(100) DEFAULT NULL,
  `recipient_mname` varchar(100) DEFAULT NULL,
  `recipient_add1` text,
  `recipient_zipcode` varchar(20) DEFAULT NULL,
  `recipient_email` varchar(50) DEFAULT NULL,
  `recipient_bdate` varchar(12) DEFAULT NULL,
  `recipient_tel` varchar(15) DEFAULT NULL,
  `recipient_mobile` varchar(15) DEFAULT NULL,
  `recipient_indate` datetime NOT NULL,
  UNIQUE KEY `recipient_id` (`recipient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipient`
--

LOCK TABLES `recipient` WRITE;
/*!40000 ALTER TABLE `recipient` DISABLE KEYS */;
INSERT INTO `recipient` VALUES ('REC00004','MELAD','EDGAR','R.','130 LUAN-AND ST. ZONE 1 CAMPTINIO CABANATUAN CITY NUEVA ECIJA','','',NULL,'','','2019-02-21 01:28:36'),('REC00002','JAGUNOS','JUFFEL','','4161 F.C DAGANI ST. CABADBARAN CITY','','',NULL,'','0906-368-3479','2019-02-21 01:08:31'),('REC00003','TUASON','ANICETA','','BLK 11 LOT 15 AREA-A DIAMOND ST. QUEENS ROW SUBD. BACOOR CAVITE','4102','',NULL,'','','2019-02-21 01:18:35'),('REC00005','CAABAY','CECILIA','V.','BALUT TONDO MANILA PHILS','','',NULL,'','0956-186-5677','2019-02-25 18:25:43'),('REC00006','CBCCMEA','ERWIN','','8 GARNET ST FERN VILLAGE BRGY PASONG TAMO Q.C PHILS','','',NULL,'','','2019-02-25 18:37:25'),('REC00007','BANGOY','CARLOS','','BLK 19 LOT 29 CHRISTINE ROYALE SUBD M. EUSEBIO AVE SAN MIGUEL PASIG 1600, PHILS','','',NULL,'','0921-988-3897','2019-03-07 18:51:29'),('REC00008','BRILLO','VICTOR/ROBERT','','IMUPA VILLAGE IBABAO MARIGONDON LAPU-LAPU CITY CEBU 6015, PHILS \r\nBACK AT MACTAN ISLA RESORT AND CASINO','','',NULL,'','0924-243-2967','2019-03-07 19:38:57'),('REC00009','MEJIA','JENELYN','N','#6 INT CONCHU ST PROJECT 4 Q.C PHILS','1109','',NULL,'','','2019-03-07 19:46:59'),('REC00010','CAIBIGAN','BILLIE JANE','','# 10 CATTLEYA TRIANGLE ST TOWN & COUNTRY EXEC. VILLAGE MAYAMOT ANTIPOLO CITY, PHILS ','','',NULL,'6829377','','2019-03-07 20:00:28'),('REC00011','MACABENTA ','ANN','','12 AURORA ST SOLUNA VILLAGE BRGY MAAMBOG  IV MOLINO BLUD BACOOR CAVITE PHILS','','',NULL,'','','2019-03-07 20:19:55'),('REC00012','NODA','MARITES','','100 CRISPIN ST RIZAL VILLAGE ALABANG MUNTINLUPA CITY, PHILS ','','',NULL,'','0916-509-0530','2019-03-10 18:26:52'),('REC00013','DE JESUS','EDWIN','','10 A ALMA JOSE ST ZABARTE RO BRGY 177 CAMARIN CALOOCAN CITY, PHILS','1400','',NULL,'','0999-981-5652','2019-03-10 18:33:46'),('REC00014','UMAYAM','ROMY','','2172 F. MUNOZ SINGALONG BRGY 732 MANILA, PHILS','','',NULL,'','','2019-03-10 19:08:59'),('REC00015','VILLAFLOR','PELAGIA','','BRGY SIBUCAO SAN ENRIQUE NEG OCCIDENTAL','','',NULL,'','','2019-03-20 23:00:49'),('REC00016','BRUTAS','WILFREDO','','2076 B. HILJM EXTENSION PANDACAN MANILA','','',NULL,'','','2019-03-20 23:11:50'),('REC00017','KAO','MARTA','C/O  GOERGE KAO','31 POLK ST N. GREENHILLS SAN JUAN MANILA','','',NULL,'','','2019-03-20 23:37:56'),('REC00018','TORRES','SUSAN','TAN','4 MAGSAYSAY ST. MALABON CITY','','',NULL,'','','2019-03-20 23:42:19'),('REC00019','RARELA','VICENTE','','1836 BAGONG PAG ASA ST. BACLARAN PARANAQUE CITY','','',NULL,'','','2019-03-20 23:47:19'),('REC00020','BELTRAN','EDNA','LUMBRE','#7 JUAN LUNA AVE CHRYSAN THE MUM VILLAGE SAN PEDRO CITY PROVINCE OF LAGUNA','','',NULL,'','','2019-03-20 23:51:04'),('REC00021','KYOK KAN','VIRGINIA','T.','1335 SOLER ST. MCKINZON BLDG. ROOM 303 STA CRUZ MANILA','','',NULL,'','','2019-03-20 23:59:40'),('REC00022','TANZO','AURORA','C/O PAUL TANZO','531 ASUNCION ST. RM 807 CHINATOWN STEEL TOWER BINONDO MANILA','','',NULL,'','','2019-03-21 00:02:32'),('REC00023','MATIC','ERWIN','R.','446 GENERAL LIM ST. LITTLE BAGUTO SAN JUAN MANILA','','',NULL,'','','2019-03-21 00:10:56'),('REC00024','TARUC','REYNALDO','','3451 MANENA SAN JOSE SAN LUIS PAMPANGA','','',NULL,'','','2019-03-21 00:26:04'),('REC00025','BOBILES','CORAZON','E.','BLK 4 LOT 7 ALTHEA HOMES ADMIRAL ROAD TALON 2 LAS PINAS CITY','','',NULL,'','0916-386-6197/ ','2019-03-21 00:31:35'),('REC00026','CASTRO ','RITA','CASTRO CELSO','581 SAINT LAWRENCE ST. BUTOL 1ST BALAGTAS BULACAN','','',NULL,'','0916-335-3420','2019-03-21 00:35:43'),('REC00027','BORDIOS','AILEEN','S.','INA NG PAG IBIG VILLAGE KAYBAGAL CENTRAL TAGAYTAY CITY','','',NULL,'','0908-541-2918','2019-03-21 00:44:15'),('REC00028','MACARAIG','ELENITA','','LOT 14A BLK 7 WELCOME AVE WELCOME VILLAGE S.A SUCAT PARANAQUE PHILS ','','',NULL,'820-5900','0927-866-5228','2019-03-26 18:18:51'),('REC00029','BAYUDAN','ANGELO/ROSENDA','','BRGY VER DINGRAS ILOCOS NORTE PHILS','','',NULL,'','','2019-03-26 18:32:00'),('REC00030','SUMBILLO ','LOLITA','C/O MERLY PANGHULAN','7. C SOUTH J KAMUNING Q,C  SACRED HEART BRGY 1103 PHILS','','',NULL,'922-6559','','2019-03-26 18:43:51'),('REC00031','CATRAL','JANET','','REAL DE HOOD ST CENTRO SUR CAMALA NIUGAN CAGAYAN, PHILS','','',NULL,'','','2019-03-26 18:54:08'),('REC00032','ESCALADA','DIRE LOWELL','','2176 E TRAMO INTERIOR PASAY CITY, PHILS','','',NULL,'889-2148','','2019-03-26 19:00:12'),('REC00033','ARMISTOSO','IRA ARDYTHE','','# 19 MAGAT ST NAPACOR VILLAGE TANDANG SORA Q.C ','','',NULL,'332-7762','0917-801-1453','2019-03-26 19:07:28'),('REC00034','GO','GERTRUDEZ','','259 VICENTA ST. CORNER HONORIA ST. MARICK SUBD. CAINTA RIZAL PHIL.','1900','',NULL,'026-562-318','','2019-03-26 19:33:14'),('REC00035','MOLLEDO','SHIRLEY','M.','189 BAGIS DRIVE SAAVEDRA EXTENSION STA. MARIA ZAMBOANGA CITY','7000','',NULL,'','09177201591','2019-03-26 19:51:34'),('REC00036','CARAJAY','MERCY','','211 ZONE 2 KISIKIS ALCALA PANGASINAN','2425','',NULL,'','','2019-03-26 20:05:19'),('REC00037','TEOFILO','NIEGOS','','17-A ROAD 9 PROJECT 6 Q.C PHILS','','',NULL,'','','2019-03-26 20:15:24'),('REC00038','LALU','LUZVIMINDA','','RAIN FOREST ESTATE HOMES BLK. 19 LOT 5 CHORAL ST. BRGY. LANGKIWA BINAN CITY LAGUNA, PHILS.','','',NULL,'','09178711183','2019-03-26 20:27:23'),('REC00039','ESTRADA','EVELYN','','3127 A. BAUTISTA PUNTA STA. ANA MANILA, PHILS','','',NULL,'','','2019-03-26 20:32:29'),('REC00040','OLGA','SALLY','','#34 DAMA DE NOCHE ST. DE CASTRO SUBD. BRGY. STA LUCIA PASIG CITY, PHILS','','',NULL,'','','2019-03-26 20:39:07'),('REC00041','ESCOBAR','JENNIFER','','BRGY. SINABAAN UMINGAN PANGASINAN, PHILS','','',NULL,'','','2019-03-26 20:44:16'),('REC00042','QUITALIG','DANTE','JOSIE N. CASTRO','0105 PHASE 7 EASTER VIEW PARK SUBD. GITNANG BAYA, SAN MATEO RIZAL','1850','',NULL,'','09083962999','2019-03-26 20:49:59'),('REC00043','TAGUM','JANE','','505 COLUMBIA ST. SPRINGFIELD SUBD. SAN MIGUEL IRIGA CITY, CAMARINES SUR PHILS.','4431','',NULL,'','','2019-03-26 20:56:16'),('REC00044','SAGUM','REYNALDO','','BLK. 15 LOT 20 SUNFLOWER ST. SOUTH GREEN HEIGHTS SUBD. MUNTINLUPA CITY','1772','',NULL,'','','2019-03-26 21:01:24'),('REC00045','LINDEBERG','ANA HELUJAH','','45 DRES ST. BRGY. STO. NINO BINALONAN PANGASINAN PHILS','','',NULL,'','','2019-03-26 21:06:14'),('REC00046','SIBAL','REMEDIOS','','DON PEPE COJUANCO HOMES PHASE 1 CORNER JOSE JOAQUIN DR. HACIENDA LUISITA, SAN MIGUEL, TARLAC PHILS','','',NULL,'','09993678223','2019-03-27 22:33:54'),('REC00047','ALMARIO','MARILOU','','1632 KALIMBAS ST. STA. CRUZ MANILA','','',NULL,'','09177013302','2019-03-27 22:38:43'),('REC00048','VALENCIA',' JANEKAR','M. VALENCIA','49 SISA EXTENSION TENEJEROS MALABON CITY MANILA','','',NULL,'','09169899757','2019-03-27 22:58:01'),('REC00049','LORENZO','LORENA','','5-G SPARROW ST. NEW MARIKINA SUBD., SAN ROQUE MARIKINA CITY ','1801','',NULL,'','','2019-03-27 23:03:25'),('REC00050','ABATAY','ANTONIETA','T','POBLACION PUROK 2 KINOGUITAN MISAMIS ORIENTAL PHILS.','9010','',NULL,'09069163245','09652618154','2019-03-27 23:10:02'),('REC00051','QUITAIN','MARIA','','20 HILL DRIVE BEVERLY HILLS SUBD. ANTIPOLO RIZAL, PHILS','','',NULL,'','','2019-03-27 23:16:07'),('REC00052','SORONGON','IVY/IAN','`','MAGSAYSAY VILLAGE LA PAZ, ILOILO CITY, PHILS','','',NULL,'','','2019-03-27 23:20:22'),('REC00053','GONZALES','LIZA','','258 KINALAGLAGAN M-KAHOY BATANGAS PHILS','4223','',NULL,'','','2019-03-27 23:25:22'),('REC00054','ODTUJAN','MARICHA','','4446 SAN VICENTE ST. MANGAGOY BISLIG CITY SURIGAO DEL SUR, PHILS','8317','',NULL,'','09193375907','2019-03-27 23:30:12'),('REC00055','PARRENO','FRITZIE','','PUROK 3 KALYE BATO BAGO GALLERA TALOMO DAVAO CITY, PHILS','8000','',NULL,'','09477726257','2019-03-27 23:34:49'),('REC00056','JAMER','AIRENE','','88-A STO. TOMAS ST. COR. PLARIDEL GALAS Q.C','112','',NULL,'','','2019-03-27 23:37:31'),('REC00057','EDLES','KESTER','','#33 WOODSIDE ST. PARK PLACE VILL. CAINTA MANILA PHILS.','','',NULL,'','','2019-03-27 23:49:24'),('REC00058','LEGASPI','MA. SLYVI','','BLK. 13 LOT 16 VILLAFUERTE SUAREZ SUBD. PUROK DINAYAN 2 IBABANG IYAM, LUCENA CITY','4301','',NULL,'','','2019-03-27 23:54:14'),('REC00059','CUEVAS','CORA','','113 DISTRICT 2 PUROK 2 BRGY. MARAJOY LIPA CITY PHILS.','','',NULL,'','','2019-03-28 00:07:07'),('REC00060','CHAVEZ ','ROY','','192 SAN VICENTE STA. TOMAS, BATANGAS PHILS.','','',NULL,'','','2019-03-28 00:13:03'),('REC00061','GALLARDO','JONHA GLENDA','','BLK. 6 LOT 4-B CATEYE WESTBOROUGH HOMES PARANAQUE CITY','','',NULL,'','','2019-03-28 00:20:04'),('REC00062','ESMENDA','ANDREA','','221 ZONE 1 LOT 6-D STO. ROSARIO HTS SUBD., BECURAN STA. RITA PAMPANGA, PHILS','','',NULL,'','09392964386','2019-03-28 00:26:37'),('REC00063','KAO','MARTA','GEORGE KAO','31 POLK ST. N. GREENHILLS SAN JUAN MANILA. PHILS.','','',NULL,'','','2019-03-28 00:30:47'),('REC00064','BEALUBIT','NEIL','PAMELA VALERA','BLK. 23 LOT 3 HENARES ST. BE HOMES PARANAQUE CITY., MANILA PHILS','','',NULL,'','09063919580','2019-03-28 00:36:14'),('REC00065','VILLAREAL','MEANN','','817 BUCANEG ST. TONDO MANILA','','',NULL,'','09289445758','2019-03-28 00:42:15'),('REC00066','LAZO','RIZABELLE','U.','712 PRK 4-B ARAYAT ANGELES PAMPANGA. PHILS','','',NULL,'','','2019-03-28 00:53:39'),('REC00067','TIMAJO','CLAUDINE','','BLK. 2 LOT 16 BANGKAL ST. MACARIA HOMES MOLINA 2 CITY OF BACOOR, CAVITE','4192','',NULL,'046-418-0703','09202319435','2019-03-28 00:59:21'),('REC00068','MANDAP','ERLINDA','DETIQUEZ','217 STO. ROSARIO MINALIN PAMPANGA. PHILS','','',NULL,'','','2019-03-28 01:06:40'),('REC00069','PABALINAS','MARIANNE','N.','13-G DAGOHOY ST. WEST REMBO MAKATI CITY','1215','',NULL,'','09171539888','2019-03-28 01:12:11'),('REC00070','BASUEL','SHARON','','ZONE 3 SAN MARIANO ISABELA, PHILS','','',NULL,'','','2019-03-28 01:15:40'),('REC00071','APILADO JR.','VALENTIN','','FLORENTINO ST. CATBANGAN SAN FERNANDO LA UNION CITY., PHILS','2500','',NULL,'','','2019-03-28 01:42:03'),('REC00072','CAPITO','MARIA','','#13 CESNA ST. DON CARLOS VILLAGE PASAY CITY. PHILS','','',NULL,'','09999937789','2019-03-28 01:50:30'),('REC00073','ATREGENIO','THELMA','A.','CEDAR 2 MAIN ROAD, BLK. 8 LOT 7 AND 8 CARMONA ESTATE BRGY. LANTIC MARMONA CAVITE. PHILS.','','',NULL,'634-642-308','09266255892','2019-03-28 01:57:35'),('REC00074','BARCENA','JULITA','MELANIE BARCENA','607 VALDERAMA TOWER TROPICANA GARDEN CITY SUMULONG HIGHWAY MARIKINA CITY','','',NULL,'09451330166','09176621064','2019-03-28 02:04:35'),('REC00075','SAN GABRIEL','ENRIQUE','','43 SAMPAGUITA ST. BREY LANGLA JAEN, NUEVA ECIJA. PHILS.','','',NULL,'','09154723942','2019-03-28 02:08:26'),('REC00076','CRUZ','MARIA TERESA','','24 BASILIO ST. BRGY ACACIA MALABON CITY','','',NULL,'028-615-373','09991014988','2019-03-28 19:00:34'),('REC00077','QUINGUA','ROMMEL','','250 CATLEYA ST. ROSAFLOR SUBD., TAGAPO SANTA ROSA CITY LAGUNA., PHILS.','','',NULL,'','','2019-03-28 19:06:40'),('REC00078','CAAMIC','ERICK','A.','23 RESORT ST. SUMMERVILLE P. 2 BRGY. MAYAMOT MASINAG ANTIPOLO CITY','1820','',NULL,'','','2019-03-28 19:13:35'),('REC00079','GALANG','MICHAEL','','BH MANILA OFFICE','','',NULL,'','','2019-03-28 19:22:01'),('REC00080','SANTOS','PABLITO','C.','81 SANTA MARIE, MEXICO PAMPANGA., PHILS.','','',NULL,'','09776963683 (CO','2019-03-28 19:28:44'),('REC00081','TOLENTINO','ONSING','','044 SAN RAFAEL STO. TOMAS BATANGAS, PHILS','4234','',NULL,'','','2019-03-28 19:33:08'),('REC00082','BAES','MARRISSE','','234 SANTIAGO ST. AYALA ALABANG VILL. MUNTINLUPA PHILS.','','',NULL,'058-9496','09178844330','2019-03-28 19:38:49'),('REC00083','RUIZ','JEZZEL MARIE','','BRGY. 55-A BARIT LAOAG CITY ILOCOS NORTE, PHILS.','','',NULL,'','09186938969','2019-03-28 19:43:06'),('REC00084','SANTOS1','CHRISTINO','','PUEBLO RUIZ SUBD. BRGY. CALABANIT GLAN SARANGANI., PHILS','','',NULL,'','09178828025','2019-03-28 19:47:49'),('REC00085','ROXAS','DEBORAH','A.','17 AGUINALDO VISTA VALLEY EXEC SUBD. STO. NINO SUMULONG HWAY MARIKINA., MANILA','','',NULL,'','09277304405','2019-03-28 20:16:00'),('REC00086','SUYUGAN','JOSEPHINE','','#2 CHERRY BLOSSOM ST. EQUITABLE BANK VILLAGE TALON LAS PINAS MANILA.','','',NULL,'632-805-1576','','2019-03-28 20:29:13'),('REC00087','ANASTACIO','MARCIAL','','SANTA BRIGIDA MANSALAY ORIENTAL MINDORO., PHILS.','','',NULL,'','','2019-03-28 20:35:27'),('REC00088','QUIVES','YOLANDA','','0572 CALMAY DISTRICT DAGUPAN CITY PANGASINAN., PHILS','','',NULL,'','','2019-03-28 20:39:35'),('REC00089','CALIVO','MERCEDES','','LOT 8 BLK. 16 PINAGSAMA VILLAGE PHASE 2 TAGUIG CITY., PHILS','','',NULL,'','','2019-03-28 20:47:32'),('REC00090','LIMSIACO','FE','','67 BLK. 2 HOMESITE BRGY. MONTE VISTA BACOLOD CITY. NEG. OCC.','','',NULL,'','','2019-03-28 20:54:22'),('REC00091','MARASIGAN','TESSIE','','219 GARONG ST. POB.1 NAUJAN ORIENTAL MINDORO., PHILS','','',NULL,'','09270689352','2019-03-28 22:20:32'),('REC00092','GANIGAN','ALMA','','315 CALEPAAN ASINGAN PANGASINAN., PHILS','','',NULL,'','','2019-03-28 22:25:17'),('REC00093','CABUGASON','REGINA','','DELA PAZ ST. SAN ANTONIO, KALAYAAN LAGUNA, PHILS.','4015','',NULL,'','','2019-03-28 22:30:20'),('REC00094','EDRALINDA','ZENAIDA','','12 P. GOMEZ ST. MAGDALENA LAGUNA., PHILS','4007','',NULL,'','','2019-03-28 22:34:03'),('REC00095','TILA','BELLA','','68 SAN VICENTE AVE. NORTH SUSANA EXEC. VILLAGE BRGY. MATANDANG BALARA DILIMAN, Q.C., PHILS','1119','',NULL,'','','2019-03-28 22:39:48'),('REC00096','RIATE','MICHELLE','','11 MURPHY ST GREENHEIGHTS VILLAGE SUCAT, PARANAQUE., PHILS.','','',NULL,'','','2019-03-28 22:45:49'),('REC00097','SERRANO','CONCIANA','','BLK. 37 LOT 5 AREA C BRGY. SAN MARTIN II SAN JOSE DEL MONTE, BULACAN. PHILS.','3024','',NULL,'','09062665023','2019-03-28 22:51:18'),('REC00098','LOPEZ','LOURDES','C/O CELIA VILLANUEVA','9457 BATICOLIN ST. SAN ANTONIO VILLAGE MAKATI MLA., PHILS','','',NULL,'','','2019-03-28 22:59:08'),('REC00099','VILLANUEVA','JUNE','','II LEGION OF MARY ST. PAG-ASA SUBD. VALENZUELA CITY., PHILS','','',NULL,'','','2019-03-28 23:03:45'),('REC00100','TADEO','KRISTINE JOYCE','','556 TACAY RD. PINSAO PROPER, BAGUIO  CITY, PHILS.','','',NULL,'','','2019-03-28 23:10:01'),('REC00101','BONBON','MAE ANN','','21-23 NAZARETH ST. CAGAYAN DE ORO CITY MISAMIS ORIENTAL, PHILS','9000','',NULL,'','09053397641','2019-03-28 23:15:39'),('REC00102','DE LEON','GENRO/KENO','','11-B LONDON ST. GREENLAND SUBD. PHASE 1 NANGKA MARIKINA CITY, PHILS','1808','',NULL,'','','2019-03-28 23:19:34'),('REC00103','VALDEVIEZO','CATALINA','','SANG DIOS ST. SAN PEDRO SAN JOSE ANTIQUE, PHILS','','',NULL,'','','2019-03-28 23:25:58'),('REC00104','DE VERA','DIVINA','','93 ANGELO ST. LALOMA Q.C, PHILS.','','',NULL,'','','2019-03-28 23:30:54'),('REC00105','RECTO','LINDA','','UNIT 2-E ACACIA ST. CORNER BALETE DRIVE, BRGY. MARIANA Q.C, PHILS.','','',NULL,'','','2019-03-28 23:34:47'),('REC00106','MANUEL','MARIELA','C/O TAMBUNTING PAWNSHOP','#25-22ND ST. WEST BAJAC-BAJAC OLONGAPO CITY, PHILS.','2200','',NULL,'047-223-4324','09155060069','2019-03-28 23:43:06'),('REC00107','PUNZALAN','RAMIL','','1682 T. ALONZO ST. CLARO M. RECTO ANGELES CITY, PAMPANGA, PHILS.','2009','',NULL,'','','2019-03-28 23:46:49'),('REC00108','DE GUZMAN','ROMY','','0892 PALAPARINST. STA. ANA BULACAN, BULACAN','','',NULL,'','','2019-03-28 23:51:20'),('REC00109','REY NAKPIL','OLIVIA LUCECRO','','4-10-B VICENTE G. CRUZ ST. SAMPALOC MANILA, PHILS.','1008','',NULL,'','','2019-03-28 23:54:04'),('REC00110','CORTEZ','DANIE','','DMAC BUILDING POBLACION 3 GERONA, TARLAC, PHILS.','2302','',NULL,'','09175401659','2019-03-28 23:57:35'),('REC00111','PEREZ','GRACE','','264 ROSAL ST. MARILAG VILLAGE, BRGY. GULANG GULANG LUCENA CITY. PHILS.','','',NULL,'','','2019-03-29 00:12:21'),('REC00112','BAUTISTA','LEOPOLDO','','BURGOS ST. PILAR BATAAN, PHILS.','','',NULL,'','','2019-03-29 00:15:50'),('REC00113','BANAN','BETH/JOHN KARL','','UNIT 4A 1017 PRIMA BLDG. DEL PAN ST. KASILAWAN MAKATI CITY, PHILS.','','',NULL,'','','2019-03-29 00:19:24'),('REC00114','DIAPANO','ESTRELLA','','004 PUROK #3 BRGY. IRISAN BAGUIO CITY, PHILS.','2650','',NULL,'442-7058','09184571270','2019-03-29 00:28:23');
/*!40000 ALTER TABLE `recipient` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30 10:14:09