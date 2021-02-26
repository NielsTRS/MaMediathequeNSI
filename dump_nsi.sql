-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: nsi
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auteur` (
  `a_id` int(11) NOT NULL,
  `nom` varchar(90) NOT NULL,
  `prenom` varchar(90) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteur`
--

LOCK TABLES `auteur` WRITE;
/*!40000 ALTER TABLE `auteur` DISABLE KEYS */;
INSERT INTO `auteur` VALUES (0,'Twain','Mark'),(1,'Asimov','Isaac'),(2,'Ōtomo','Katsuhiro'),(3,'Martelle','Myriam'),(4,'Touache','Sébastien'),(5,'Goscinny','René'),(6,'Ferri','Jean-Yves'),(7,'Uderzo','Albert'),(8,'Conrad','Didier'),(9,'SILVERBERG','Robert'),(10,'Swift','Jonathan'),(11,'Ligaran,',''),(12,'Nabokov','Vladimir'),(13,'BARJAVEL','René'),(14,'Barjavel','René'),(15,'Wul','Stefan'),(16,'HUXLEY','Aldous'),(17,'Döblin','Alfred'),(18,'Bradbury','Ray'),(19,'Tolstoï','Léon'),(20,'Aldiss','Brian Wilson'),(21,'Hemingway','Ernest'),(22,'Woolf','Virginia'),(23,'Fiodor','Dostoïevski'),(24,'Lessing','Doris'),(25,'Dickens','Charles'),(26,'Flaubert','Gustave'),(27,'Dostoïevski','Fiodor'),(28,'Melville','Herman'),(29,'Simak','Clifford D.'),(30,'Orwell','George'),(31,'Cervantes','Miguel de'),(32,'Balzac','Honoré de'),(33,'Kafka','Franz'),(34,'Matheson','Richard'),(35,'Py','Olivier'),(36,'Shakespeare','William'),(37,'BOULLE','Pierre'),(38,'Austen','Jane'),(39,'Ibsen','Henrik'),(40,'Ballard','J. G.'),(41,'Demois','Agathe'),(42,'Godeau','Vincent'),(43,'Camus','Albert'),(44,'Frémon','Jean'),(45,'Lovecraft','H. P.'),(46,'Camp','Lyon Sprague de'),(47,'Morrison','Toni'),(48,'Svevo','Italo'),(49,'Pelot','Pierre'),(50,'Corneille',''),(51,'Faerber','Johan'),(52,'Conrad','Joseph'),(53,'Deutsch','Michel'),(54,'Maupassant','Guy de'),(55,'Mann','Thomas'),(56,'Ovide',''),(57,'Spinrad','Norman'),(58,'Warren','Henry S.'),(59,'JEURY','Michel'),(60,'Goscinny',''),(61,'Maḥfūẓ','Naǧīb'),(62,'Farmer','Philip José'),(63,'Lorca','Federico Garcia'),(64,'Kernighan','Brian W.'),(65,'Pike','Rob'),(66,'Dostoïevski','Fédor Mikhaïlovitch'),(67,'Musil','Robert'),(68,'Faulkner','William'),(69,'Fransa','France'),(70,'GUIN','Ursula LE'),(71,'Yourcenar','Marguerite'),(72,'Boulle','Pierre'),(73,'Gascony','Rene'),(74,'Chaucer','Geoffrey'),(75,'Chenet','Gérard'),(76,'Knuth','Donald E.'),(77,'Saramago','José'),(78,'Vonnegut','Kurt'),(79,'Goscinny','Rene'),(80,'Márquez','Gabriel García'),(81,'Rabelais','François'),(82,'Laporte','Michel'),(83,'Nadel','Olivier-Marc'),(84,'Grimm','Jacob'),(85,'Grimm','Wilhelm'),(86,'Vergilius','Publius Maro'),(87,'Virgile',''),(88,'Eliot','George'),(89,'Sophocle',''),(90,'Márquez','Gabriel Garcia'),(91,'Borges','Jorge Luis'),(92,'Dick','Philip K.'),(93,'Gogol','Nikolaï'),(94,'Grass','Günter'),(95,'iMinds',''),(96,'Zelazny','Roger'),(97,'Montardre','Hélène'),(98,'Rulfo','Juan'),(99,'Sedgewick','Robert'),(100,'Wayne','Kevin'),(101,'Lindgren','Astrid'),(102,'Achebe','Chinua'),(103,'Bruneau','Clotilde'),(104,'D.','Dim'),(105,'Santagati','Federico'),(106,'Ferry','Luc'),(107,'Poli','Didier'),(108,'Rushdie','Salman'),(109,'Herbert','Frank'),(110,'Lovecraft','Howard Phillips'),(111,'Rincé','Dominique'),(112,'Gogol','Nikolai'),(113,'Brontë','Emily'),(114,'Fall','Malick'),(115,'Stendhal',''),(116,'Wikipedia','Source'),(117,'Morante','Elsa'),(118,'Karsenti','Bruno');
/*!40000 ALTER TABLE `auteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auteur_de`
--

DROP TABLE IF EXISTS `auteur_de`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auteur_de` (
  `a_id` int(11) NOT NULL,
  `isbn` char(14) NOT NULL,
  PRIMARY KEY (`a_id`,`isbn`),
  KEY `isbn` (`isbn`),
  CONSTRAINT `auteur_de_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `auteur` (`a_id`),
  CONSTRAINT `auteur_de_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteur_de`
--

LOCK TABLES `auteur_de` WRITE;
/*!40000 ALTER TABLE `auteur_de` DISABLE KEYS */;
INSERT INTO `auteur_de` VALUES (5,'978-2012101418'),(5,'978-2012101500'),(5,'978-2012101517'),(5,'978-2012101531'),(5,'978-2012101555'),(5,'978-2012101685'),(5,'978-2012101784'),(5,'978-2864972662'),(6,'978-2864972662'),(6,'978-2864972716'),(6,'978-2864973270'),(7,'978-0785909903'),(7,'978-2012101418'),(7,'978-2012101500'),(7,'978-2012101517'),(7,'978-2012101524'),(7,'978-2012101531'),(7,'978-2012101555'),(7,'978-2012101685'),(7,'978-2012101784'),(7,'978-2864972051'),(7,'978-2864972662'),(8,'978-2864972662'),(9,'978-2221197691'),(9,'978-2221216361'),(10,'978-2335008586'),(11,'978-2335008586'),(13,'978-2258116405'),(13,'978-2258116429'),(14,'978-2072534911'),(14,'978-2072535031'),(15,'979-1025100639'),(16,'978-2259221702'),(18,'978-1439142677'),(18,'978-2072455162'),(19,'978-2081364509'),(19,'978-2352879183'),(19,'978-2371240087'),(20,'978-2207500293'),(21,'978-2072762093'),(22,'978-2081358881'),(23,'978-1911572909'),(25,'978-2322185801'),(26,'978-2759902293'),(27,'978-2371131118'),(28,'978-8190732673'),(29,'978-2277118473'),(29,'978-2290112168'),(31,'978-2371130418'),(32,'978-2806231697'),(33,'978-2081351981'),(33,'978-2757827413'),(34,'978-2072457340'),(34,'978-2072457388'),(35,'978-2330052768'),(36,'978-2330052768'),(36,'978-2806240187'),(37,'978-2260019183'),(38,'978-2215130475'),(39,'978-2330068349'),(41,'979-1023500448'),(42,'979-1023500448'),(43,'978-2072376429'),(44,'978-2846825573'),(45,'978-2824904269'),(46,'978-2820511034'),(47,'978-2267028133'),(48,'978-2824902371'),(49,'978-2820508935'),(50,'978-2218972324'),(51,'978-2218972324'),(53,'978-2277118473'),(54,'978-2346014453'),(55,'978-2213703848'),(55,'978-2253063193'),(56,'978-2253158677'),(57,'978-2290105504'),(59,'978-2221119693'),(59,'978-2221119709'),(60,'978-2012101524'),(61,'978-2742744824'),(62,'978-2253062820'),(63,'978-8832957402'),(66,'979-1021900486'),(67,'978-2757803691'),(70,'978-2221128121'),(73,'978-2864972051'),(74,'978-2070406340'),(75,'978-2371270060'),(77,'978-2020403436'),(78,'978-2757820919'),(79,'978-0785909903'),(80,'978-2020238113'),(81,'978-2013230827'),(82,'978-2013230827'),(83,'978-2013230827'),(84,'978-2290117965'),(85,'978-2290117965'),(86,'978-2251013039'),(87,'978-2251013039'),(88,'978-1853262371'),(89,'978-2290080207'),(90,'978-2246819554'),(92,'978-2290157268'),(93,'978-2371240001'),(94,'978-2020314305'),(95,'978-1921746864'),(96,'978-2072487958'),(97,'978-2092532195'),(101,'978-2011179043'),(103,'978-2331035531'),(104,'978-2331035531'),(105,'978-2331035531'),(106,'978-2331035531'),(107,'978-2331035531'),(108,'978-2070402632'),(109,'978-1101658055'),(110,'978-2814510012'),(111,'978-2402282697'),(112,'978-2824709420'),(113,'978-2253174561'),(116,'978-1153611725'),(117,'978-2070315017'),(118,'978-2130592150');
/*!40000 ALTER TABLE `auteur_de` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprunt` (
  `code_barre` char(15) DEFAULT NULL,
  `isbn` char(14) NOT NULL,
  `retour` date NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `code_barre` (`code_barre`),
  CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`code_barre`) REFERENCES `usager` (`code_barre`),
  CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprunt`
--

LOCK TABLES `emprunt` WRITE;
/*!40000 ALTER TABLE `emprunt` DISABLE KEYS */;
INSERT INTO `emprunt` VALUES ('137332830764072','978-2207500293','2021-03-12');
/*!40000 ALTER TABLE `emprunt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livre`
--

DROP TABLE IF EXISTS `livre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livre` (
  `titre` varchar(300) NOT NULL,
  `editeur` varchar(90) NOT NULL,
  `annee` int(11) NOT NULL,
  `isbn` char(14) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livre`
--

LOCK TABLES `livre` WRITE;
/*!40000 ALTER TABLE `livre` DISABLE KEYS */;
INSERT INTO `livre` VALUES ('Le Domaine des dieux','French & European Publications',1992,'978-0785909903'),('Dune','Penguin',2003,'978-1101658055'),('À la recherche du temps perdu','Books LLC, Wiki Series',2010,'978-1153611725'),('Fahrenheit 451','Simon and Schuster',2011,'978-1439142677'),('Middlemarch','Wordsworth Editions',1994,'978-1853262371'),('L\'Idiot','Les Editions de Londres',2019,'978-1911572909'),('Polymath','iMinds Pty Ltd',2014,'978-1921746864'),('Fifi Brindacier','Hachette Romans',2013,'978-2011179043'),('Astérix et les Normands','Dargaud',2005,'978-2012101418'),('Les Lauriers de César','Educa Books',2008,'978-2012101500'),('Le Devin','Educa Books',2010,'978-2012101517'),('Astérix en Corse','Dargaud',2005,'978-2012101524'),('Le Cadeau de César','Educa Books',2005,'978-2012101531'),('Obélix et Compagnie','Educa Books',2008,'978-2012101555'),('Astérix chez les Belges','Dargaud',1979,'978-2012101562'),('Le Tour de Gaule d\'Astérix','Educa Books',2007,'978-2012101685'),('Astérix légionnaire','Educa Books',2011,'978-2012101784'),('Gargantua et Pantagruel','Livre de Poche Jeunesse',2009,'978-2013230827'),('Cent ans de solitude','Contemporary French Fiction',1995,'978-2020238113'),('Le Tambour','Contemporary French Fiction',1997,'978-2020314305'),('L\'Aveuglement','Contemporary French Fiction',2000,'978-2020403436'),('La storia','Editions Gallimard',2004,'978-2070315017'),('Les Enfants de minuit','Gallimard Education',2010,'978-2070402632'),('Les Contes de Canterbury','Gallimard Education',2000,'978-2070406340'),('L\'Étranger','Editions Gallimard',2012,'978-2072376429'),('Chroniques martiennes','Editions Gallimard',2016,'978-2072455162'),('L\'Homme qui rétrécit','Editions Gallimard',2017,'978-2072457340'),('Je suis une légende','Editions Gallimard',2013,'978-2072457388'),('Seigneur de lumière','Editions Gallimard',2014,'978-2072487958'),('Ravage','Editions Gallimard',2014,'978-2072534911'),('Le Voyageur imprudent','Editions Gallimard',2014,'978-2072535031'),('Le Vieil Homme et la Mer','Editions Gallimard',2018,'978-2072762093'),('Le Procès','Flammarion',2014,'978-2081351981'),('Mrs Dalloway','Flammarion',2015,'978-2081358881'),('La Mort d\'Ivan Ilitch','Flammarion',2015,'978-2081364509'),('Ulysse','Nathan',2012,'978-2092532195'),('L\'Homme total','Presses Universitaires de France - PUF',2011,'978-2130592150'),('Fondation et Empire','Editions Denoël',1999,'978-2207249123'),('Croisière sans escale','Editions Denoël',1990,'978-2207500293'),('La Montagne magique','Fayard',2016,'978-2213703848'),('Orgueil et Préjugés','Fleurus',2015,'978-2215130475'),('Médée','Hatier',2013,'978-2218972324'),('Les Singes du temps','Robert Laffont',2011,'978-2221119693'),('Le Temps incertain','Robert Laffont',2011,'978-2221119709'),('La Main gauche de la nuit','Robert Laffont',2012,'978-2221128121'),('Les Monades urbaines','Robert Laffont',2016,'978-2221197691'),('Le Château de Lord Valentin','Robert Laffont',2017,'978-2221216361'),('L\'Amour aux temps du choléra','Grasset',2009,'978-2246819554'),('Énéide','Belles Lettres',1993,'978-2251013039'),('Le Carnet d\'or','Le Livre de poche',1980,'978-2253025320'),('La Promenade au phare','LGF/Le Livre de Poche',1983,'978-2253031536'),('Le Noir Dessein','Livre de poche',1998,'978-2253062820'),('Les Buddenbrook','LGF/Le Livre de Poche',1993,'978-2253063193'),('Les Métamorphoses','Le Livre de Poche',2011,'978-2253158677'),('Les Hauts de Hurlevent','Le Livre de Poche',2012,'978-2253174561'),('Le Grand secret','Presses de la Cité',2014,'978-2258116405'),('La Nuit des temps','Presses de la Cité',2014,'978-2258116429'),('Le Meilleur des mondes','Plon',2013,'978-2259221702'),('La Planète des singes','Julliard',2011,'978-2260019183'),('Beloved','Christian Bourgois',2015,'978-2267028133'),('Au carrefour des étoiles','J\'ai Lu',1997,'978-2277118473'),('Œdipe roi','J\'ai Lu',2013,'978-2290080207'),('Jack Barron et l\'Éternité','J\'ai Lu',2016,'978-2290105504'),('Demain les chiens','J\'ai Lu',2015,'978-2290112168'),('Contes','J\'ai Lu',2015,'978-2290117965'),('Le Maître du Haut Château','J\'ai Lu',2017,'978-2290157268'),('Les Grandes Espérances','BoD - Books on Demand',2019,'978-2322185801'),('Le Roi Lear','Éditions Actes Sud',2015,'978-2330052768'),('Une maison de poupée','Éditions Actes Sud',2016,'978-2330068349'),('La Naissance des dieux','Glénat BD',2017,'978-2331035531'),('Les Voyages de Gulliver','Primento',2015,'978-2335008586'),('Le Vagabond','BnF collection ebooks',2016,'978-2346014453'),('Guerre et Paix','Archipoche',2016,'978-2352879183'),('Don Quichotte','Les éditions Pulsio',2016,'978-2371130418'),('Les Frères Karamazov','Les éditions Pulsio',2016,'978-2371131118'),('Les Âmes mortes','Bibliothèque russe et slave',2018,'978-2371240001'),('Anna Karénine','Bibliothèque russe et slave',2018,'978-2371240087'),('Sécheresse','La Cheminante',2014,'978-2371270060'),('L\'Éducation sentimentale','FeniXX',1990,'978-2402282697'),('Les Fils de la Médina','Arles [France] : Actes sud',2003,'978-2742744824'),('Les Robots','Editions Milan',2017,'978-2745989857'),('L\'Homme sans qualités','Contemporary French Fiction',2011,'978-2757803691'),('Le Berceau du chat','Contemporary French Fiction',2010,'978-2757820919'),('Le Château','Points',2011,'978-2757827413'),('Madame Bovary','UPblisher',2016,'978-2759902293'),('Le Père Goriot','Primento',2012,'978-2806231697'),('Hamlet','Primento',2012,'978-2806240187'),('La Couleur tombée du ciel','Tiers Livre Éditeur',2014,'978-2814510012'),('Delirium Circus','Bragelonne',2013,'978-2820508935'),('La Main de Zeï','Bragelonne Classic',2016,'978-2820511034'),('Le Journal d\'un fou','Bibebook',2013,'978-2824709420'),('La Conscience de Zeno','République des Lettres',2015,'978-2824902371'),('Par-delà le mur du sommeil','République des Lettres',2018,'978-2824904269'),('L\'Île des morts','POL Editeur',2010,'978-2846825573'),('L\'Odyssée d\'Astérix','Educa Books',2008,'978-2864972051'),('Astérix chez les Pictes','Editions Albert René',2013,'978-2864972662'),('Le Papyrus de César','Editions Albert René',2015,'978-2864972716'),('Astérix et la Transitalique','Editions Albert René',2017,'978-2864973270'),('Moby Dick','Campfire Graphic Novels',2010,'978-8190732673'),('Romancero gitano','Greenbooks editore',2020,'978-8832957402'),('Crime et Châtiment','Editions Humanis',2012,'979-1021900486'),('La Grande Traversée','Seuil Jeunesse',2014,'979-1023500448'),('blc','blc',1900,'979-1025100638'),('Niourk','French Pulp éditions',2018,'979-1025100639');
/*!40000 ALTER TABLE `livre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usager`
--

DROP TABLE IF EXISTS `usager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usager` (
  `nom` varchar(90) NOT NULL,
  `prenom` varchar(90) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `code_barre` char(15) NOT NULL,
  `password` text DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  PRIMARY KEY (`code_barre`),
  UNIQUE KEY `usager_nom_uindex` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usager`
--

LOCK TABLES `usager` WRITE;
/*!40000 ALTER TABLE `usager` DISABLE KEYS */;
INSERT INTO `usager` VALUES ('BERNARD','STÉPHANE','131, Place de la Mairie','75015','Paris','sbernard2@chezmoi.net','035184062854281','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('DUBOIS','PHILIPPE','35, Rue du Moulin','75014','Paris','pdubois5@chezmoi.net','137332830764072','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('Niels','Terese','15 la goula','38460','Trept','test@gmail.com','181411521098431','$2y$10$sEruujyoBXoodYmle8RjmOEeh6kp/hv/754B./EKKSbJ.r4CadNG2',1),('MICHEL','VALÉRIE','104, Rue du Stade','75013','Paris','vmichel5@monmail.com','199614051174633','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('MOREAU','ALAIN','48, Rue du Château','75005','Paris','amoreau1@abc.de','421921003090881','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('ROBERT','PASCAL','95, Rue de la Gare','75005','Paris','probert9@monmail.com','533299198788609','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('FOURNIER','DAVID','157, Rue de la Fontaine','75007','Paris','dfournier4@abc.de','612978231522917','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('SIMON','SANDRINE','45, Rue du Château','75020','Paris','ssimon2@abc.de','654834075188732','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('DURAND','JULIEN','183, Rue de la Gare','75019','Paris','jdurand9@email.fr','782124241492509','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('LAURENT','FRANÇOISE','90, Rue Principale','75005','Paris','flaurent3@monmail.com','917547585216771','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0),('PETIT','SÉBASTIEN','5, Rue du Stade','75012','Paris','spetit4@email.fr','934701281931582','$2y$10$lDfeOMV2J9mY.WcgVYv4MOIrqSPf4O6NSgmK9llw5EiMk/jjVQN9G',0);
/*!40000 ALTER TABLE `usager` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-26 18:35:15
