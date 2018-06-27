-- MySQL dump 10.13  Distrib 5.6.23, for Win32 (x86)
--
-- Host: localhost    Database: db_padoka_gustavo
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `tbl_ambiente`
--

DROP TABLE IF EXISTS `tbl_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambiente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAmbiente` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambiente`
--

LOCK TABLES `tbl_ambiente` WRITE;
/*!40000 ALTER TABLE `tbl_ambiente` DISABLE KEYS */;
INSERT INTO `tbl_ambiente` VALUES (1,'Leitura'),(2,'Tecnologico'),(3,'Retro');
/*!40000 ALTER TABLE `tbl_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` VALUES (1,'PÃ£es',1),(2,'PÃ£es Artesanais',1),(3,'Petiscos',1),(4,'Doces',1),(5,'Bebidas Quentes',1),(6,'Bebidas Frias',1),(7,'Lanches',1),(8,'CafÃ© da ManhÃ£',1),(9,'Frios, etc',1);
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contato`
--

DROP TABLE IF EXISTS `tbl_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `homepage` varchar(100) NOT NULL,
  `facelink` varchar(100) NOT NULL,
  `mensagem` text,
  `infproduto` text,
  `sexo` varchar(1) DEFAULT NULL,
  `profissao` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contato`
--

LOCK TABLES `tbl_contato` WRITE;
/*!40000 ALTER TABLE `tbl_contato` DISABLE KEYS */;
INSERT INTO `tbl_contato` VALUES (8,'Gustavo dos Santos','(11) 1111-1111','(11) 11111-1111','gusta@gmail.com','http://sakdadsaidiad','http://sakdadsaidiad','Ótimo local, aconchegante e de fácil acesso. Cardápio com grande variedade de lanches e serviços. Ótimo atendimento. Amei o espaço tecnológico.\r\n-José da Galiléia, Delegado\r\nEu estava com fome e afim de ouvir um bom Rock and Roll, achei o lugar certo, fiquei impressionado com a variedade do local, mas o que mais me surpreendeu foi esse site maravilhoso','Dificil saber o que acontece','M','Técnico em Informática'),(14,'teste do marcel','(011) 4772-470','(011) 97878-985','marcel@gmail.com','http://www.uol.com.br','http://www.uol.com.br/testre','teste do marcel','teste do marcel','M','alguma coisa'),(17,'Giulia','','(11) 96951-6024','giuliamanuela17@gmail.com','','','Oi gu','PÃ£o francÃªs ','F','Arquiteta');
/*!40000 ALTER TABLE `tbl_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_conteudo_ambiente`
--

DROP TABLE IF EXISTS `tbl_conteudo_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_conteudo_ambiente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAmbiente` int(11) NOT NULL,
  `tituloPagina` varchar(35) NOT NULL,
  `textoSobre` text NOT NULL,
  `foto01` varchar(255) DEFAULT NULL,
  `foto02` varchar(255) DEFAULT NULL,
  `foto03` varchar(255) DEFAULT NULL,
  `foto04` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAmbiente` (`idAmbiente`),
  CONSTRAINT `tbl_conteudo_ambiente_ibfk_1` FOREIGN KEY (`idAmbiente`) REFERENCES `tbl_ambiente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_conteudo_ambiente`
--

LOCK TABLES `tbl_conteudo_ambiente` WRITE;
/*!40000 ALTER TABLE `tbl_conteudo_ambiente` DISABLE KEYS */;
INSERT INTO `tbl_conteudo_ambiente` VALUES (5,1,'Ambiente de Leitura','Aqui o nosso cliente pode desfrutar de um ambiente completo e totalmente temÃ¡tico para os amantes de leitura e que apreciam um Ã³timo cafÃ© como parceiro de leitura, temos poltronas confortÃ¡veis e uma estante cheia de livros para que vocÃª possa escolher a vontade, nosso propÃ³sito aqui Ã© trazer conforto e uma Ã³tima leitura.','arquivos/9d2c9aba75d83f3c0d85ec9a3f52e6fd.jpg','arquivos/73d9d7cf84b96481db5c67fcf2d841e1.jpg','arquivos/e4377e9f0fac4d3dcb632050c5b61e6f.jpg','arquivos/b84d3431ce9e635e8814edad99efe520.jpg',1),(10,2,'Ambiente TecnolÃ³gico','Esse ambiente foi criado para os amantes de tecnologia que adoram se reunir em nossa padaria para fazer pesquisas, jogar e atÃ© mesmo trabalhar, aqui o nosso cliente tem uma variedade de bebidas quentes e frias para ajudar na concentraÃ§Ã£o das pessoas, muitas pessoas marcam encontros para desfrutar de nossas instalaÃ§Ãµes.','arquivos/92ee49a80f411b265068971a9dfaeca7.jpg','arquivos/c479a93a7fa113dbdefabc857c3b7473.jpg','arquivos/288bb9dd0ec135a516a8c471842bc506.jpg','arquivos/78da913332c1e94d457c0a25244c6e85.jpg',1),(11,3,'Ambiente RetrÃ´','Aqui nossa padaria foi totalmente preparada para os amantes do bom e velho Rock and Roll, esse ambiente Ã© composto por equipamentos, decoraÃ§Ãµes e JukeBox que lembram os melhores anos do Rock and Roll (70, 80 e 90). Nosso cliente nesse ambiente tem os melhores â€œpetiscosâ€ para degustar e curtir nossa temÃ¡tica.','arquivos/bcf4845a3573f641fee5d81e9420931c.jpg','arquivos/786ab887139f05f4412bf92b4eacf3e4.jpg','arquivos/1bb28bb26ee04bb2935ec4301dd94521.jpg','arquivos/ad2b79b3b0fe24e579c6b1e36c2ac1d6.jpg',1),(12,1,'Leitura do Marcel 123','babababaab','arquivos/33b36b4ee7a69035f8e39f263a79e0e4.jpg','arquivos/851e7c15b1cd2d0f45535204d6525d18.jpg','arquivos/fcf6db2fac8fee460b173c4737635da9.jpg','arquivos/bbc28513ff27599c3732afe62fcae71d.jpg',0);
/*!40000 ALTER TABLE `tbl_conteudo_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lojas`
--

DROP TABLE IF EXISTS `tbl_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lojas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPagina` int(11) NOT NULL,
  `nomeLoja` varchar(40) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(4) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPagina` (`idPagina`),
  CONSTRAINT `tbl_lojas_ibfk_1` FOREIGN KEY (`idPagina`) REFERENCES `tbl_pagina_loja` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lojas`
--

LOCK TABLES `tbl_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_lojas` DISABLE KEYS */;
INSERT INTO `tbl_lojas` VALUES (3,1,'Padoka Hill Valley','(11)97571-3996','Av. Luis Carlos Berrini',666,'SÃ£o Paulo','SP','arquivos/8eedfdf710443cf92067f4ddea59e95c.jpg',1),(4,1,'Padoka Hill Valley 2','(11) 4756-4567','Rua Alameda',345,'Jandira','SP','arquivos/e90d4b95366ee4f06afdc7498d68bc18.jpg',1),(5,1,'Hill Valley PÃ£es','(11) 4756-3333','Av.ManÃ© Garrincha',221,'Barueri','SP','arquivos/f6becebae8969735d5630d53fbe84520.jpg',1);
/*!40000 ALTER TABLE `tbl_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel_usuario`
--

DROP TABLE IF EXISTS `tbl_nivel_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeNivel` varchar(50) DEFAULT NULL,
  `descricao` text,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_usuario`
--

LOCK TABLES `tbl_nivel_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_usuario` DISABLE KEYS */;
INSERT INTO `tbl_nivel_usuario` VALUES (1,'Administrador','Responsavel por realizar todo o gerenciamento do conteudo do site',1),(2,'Cataloguista','Responsavel por alimentar as informaaoes do modulo 2 do\r\nprojeto que sera desenvolvido posteriormente.\r\nEsse nivel de autenticacao sera responsavel por administrar\r\napenas o menu Modulo de Administrar os Produtos que irao alimentar\r\na pagina Home do site',1),(35,'Operador Basico','Opera coisas basicas',1),(36,'teste do marcel 666','alguma coisa',1);
/*!40000 ALTER TABLE `tbl_nivel_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagina_loja`
--

DROP TABLE IF EXISTS `tbl_pagina_loja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pagina_loja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tituloPagina` varchar(30) NOT NULL,
  `subtitulo` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagina_loja`
--

LOCK TABLES `tbl_pagina_loja` WRITE;
/*!40000 ALTER TABLE `tbl_pagina_loja` DISABLE KEYS */;
INSERT INTO `tbl_pagina_loja` VALUES (1,'Nossas Lojas','Encontre a Padoka mais proxima','arquivos/964b4702d91d047b30634cc2382c717a.jpg');
/*!40000 ALTER TABLE `tbl_pagina_loja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagina_sobre`
--

DROP TABLE IF EXISTS `tbl_pagina_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pagina_sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `imagem_promo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagina_sobre`
--

LOCK TABLES `tbl_pagina_sobre` WRITE;
/*!40000 ALTER TABLE `tbl_pagina_sobre` DISABLE KEYS */;
INSERT INTO `tbl_pagina_sobre` VALUES (1,'Sobre a Padoka','arquivos/8c8a7b2b1a477cb48412770d6d530132.jpg');
/*!40000 ALTER TABLE `tbl_pagina_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto_promocao`
--

DROP TABLE IF EXISTS `tbl_produto_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto_promocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `idPromocao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduto` (`idProduto`),
  KEY `idPromocao` (`idPromocao`),
  CONSTRAINT `tbl_produto_promocao_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `tbl_produtos` (`id`),
  CONSTRAINT `tbl_produto_promocao_ibfk_2` FOREIGN KEY (`idPromocao`) REFERENCES `tbl_promocao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto_promocao`
--

LOCK TABLES `tbl_produto_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_produto_promocao` DISABLE KEYS */;
INSERT INTO `tbl_produto_promocao` VALUES (1,12,2),(2,13,2),(3,14,2),(4,15,2),(5,17,2),(6,18,2),(7,19,2),(8,21,2);
/*!40000 ALTER TABLE `tbl_produto_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produtos`
--

DROP TABLE IF EXISTS `tbl_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `preco` float(4,2) DEFAULT NULL,
  `idSubcategoria` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `produtoMes` tinyint(1) DEFAULT NULL,
  `qtdCliques` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idSubcategoria` (`idSubcategoria`),
  CONSTRAINT `tbl_produtos_ibfk_1` FOREIGN KEY (`idSubcategoria`) REFERENCES `tbl_subcategoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produtos`
--

LOCK TABLES `tbl_produtos` WRITE;
/*!40000 ALTER TABLE `tbl_produtos` DISABLE KEYS */;
INSERT INTO `tbl_produtos` VALUES (12,'arquivos/a8a9380dd944ae4b96a11893a3ff9811.jpg','PÃ£o Frances','PÃ£o Frances quentinho',0.20,12,1,0,12),(13,'arquivos/12099a5ebfa29e798cf147b36e8550c8.jpg','Pao Doce','Pao Doce delicioso, derrete na boca...',0.40,16,1,0,12),(14,'arquivos/5ac6be5452f87844a421c3d68cd6a472.jpg','Croissant de Chocolate','Este produto tinha uma descriÃ§Ã£o massa, mas eu dei um update sem where e perdi tudo :(',3.99,16,1,0,19),(15,'arquivos/b7974352bdfa2e4c19bbd3d054e84eb0.jpg','Bolo de Morango','Bolo de Morango feito com amor e carinho',30.00,25,1,1,18),(16,'arquivos/477522df9c97bc58ac2faf45c397e2c3.jpg','Kibe de Carne','Esse Kibe Ã© de Carne eu juro',1.00,20,1,0,60),(17,'arquivos/7f75010c371458a09d64e84a8769da76.jpg','PÃ£o de Banha','PÃ£o de Banha saboroso',3.00,13,1,0,111),(18,'arquivos/1bd1ea691ccfcdecdd4d745b923189d1.jpg','PÃ£o de Metro','PÃ£o de Metro, mas sÃ³ vende aqui, no metro nao vende nao',15.00,15,1,0,15),(19,'arquivos/344e39a27eb9b18c3df1b2453c8ffbca.jpg','Pao de Queijo Recheado','Pao de Queijo recheado com....isso mesmo, queijo ',3.00,17,1,0,41),(20,'arquivos/3d70fd24fc01d47629522027e1639d46.jpg','Pudim de Chocolate','Pudim de leite com chocolate...hmmmm',20.00,22,1,0,45),(21,'arquivos/1c3f997dfd45fe6887516f8a6119fdf2.jpg','Pudim Leite Condensado','Pudim de leite condensado, feito pra voce e sua familia',20.00,22,1,0,340),(22,'arquivos/7fe61bb3ef9fb7d96710b0b57e44ed48.jpg','Bolo de Chocolate','Bolo de Chocolate recheadocom chocolate com cobertura de chocolate e granulado de chocolate e cereja que vai em cima disso tudo.',20.00,25,1,0,688),(23,'arquivos/5f63c18f798da0eccf8a16e10a4d3942.jpg','Misto Quente','Misto Quente, queijo, presunto e muita mas muita boniteza.',2.00,12,1,0,61),(24,'arquivos/7fc79e166e4e46f81a6ef19b6da01dcb.jpeg','Sonho com recheio','Sonho com recheio de chocolate ao leite das melhores vacas do pais',5.00,24,1,0,41),(25,'arquivos/f32bbb6754c90ddde43f58814b5ac962.jpg','CafÃ© Preto','Puro e doce cafe pele, mil gols e mil sensaÃ§Ãµes',3.00,28,1,0,16),(26,'arquivos/c13d10e9fd59a7685190f027973b39b2.jpg','Coxinha Catupiry','Coxinha de Frango com Catupiry',2.50,18,1,0,15),(27,'arquivos/36ae1f8fb4fb44bb1dd451cc0f65d2db.jpg','Pao de Frios','Pao de Frios super top mesmo',1.50,26,1,0,16),(28,'arquivos/62d7501c2a98ce7ac7a7ead0950db2f7.jpg','Cappuccino','Cappuccino Cafeinado com muita Cafeina',4.50,29,1,0,3),(29,'arquivos/03c34c78e19380b99b21503f6c686d72.jpg','Bolo de Carolina','Bolo de Carolina mas Ã© bolo, nÃ£o Ã© carolina',15.00,25,1,0,4),(30,'arquivos/3c940f4eb759da548170d25942ddb9b1.jpg','Carolina','Carolina com chocolate, não de doce de leite',1.00,23,1,0,3),(31,'arquivos/50ce9df4217b4ad73f21dd54e5d756a5.jpg','Esfiha de Frango','Esfihas de Frango da granja, sem hormônios e não é vegana',3.50,19,1,0,1),(33,'arquivos/130ab407319c5d0c6e12130e712680be.png','ChÃ¡ Gelado','ChÃ¡ gelado, mas da pra esquentar tambem',3.00,31,1,0,4),(34,'arquivos/d3ffc98b7f349aa9f8d0d57b4e70182d.jpg','Suco de Abacaxi','Suco de abacaxi, parece de laranja mas tem um abacaxi no copo entÃ£o eu acabei deduzindo que era de abacaxi',3.00,30,1,0,4);
/*!40000 ALTER TABLE `tbl_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text,
  `percentual` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (2,'arquivos/d7c24bf30f28fbb665188ae1a99d6731.jpg','PromoÃ§Ã£o do dia','Sem descricao',40,1),(3,'arquivos/e07af47347d4ab762fdda051a6a04220.jpg','eeeeeee','aaaaaaaaaaaa',35,0),(5,'arquivos/6a382d16fcad47ac3924070ace510a63.jpg','promoÃ§Ã£o de hoje','teste teste teste',50,0);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre_diferencial`
--

DROP TABLE IF EXISTS `tbl_sobre_diferencial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobre_diferencial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSobre` int(11) NOT NULL,
  `tituloSessao` varchar(40) DEFAULT NULL,
  `titulo1` varchar(40) DEFAULT NULL,
  `titulo2` varchar(40) DEFAULT NULL,
  `titulo3` varchar(40) DEFAULT NULL,
  `texto1` varchar(230) DEFAULT NULL,
  `texto2` varchar(230) DEFAULT NULL,
  `texto3` varchar(230) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idSobre` (`idSobre`),
  CONSTRAINT `tbl_sobre_diferencial_ibfk_1` FOREIGN KEY (`idSobre`) REFERENCES `tbl_pagina_sobre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre_diferencial`
--

LOCK TABLES `tbl_sobre_diferencial` WRITE;
/*!40000 ALTER TABLE `tbl_sobre_diferencial` DISABLE KEYS */;
INSERT INTO `tbl_sobre_diferencial` VALUES (1,1,'Nosso diferencial','DISPONIBILIDADE','QUALIDADE','DIVERSIDADE','Trabalhamos 24h por dia, Nossa equipe se revesa para atende-lo todos os dias em qualquer horÃ¡rio, alÃ©m disso possuimos estacionamento exclusivos para os clientes.','A Padoka sÃ³ trabalha com produtos de primeira qualidade e oferece seus serviÃ§os a seus clientes com fartura, compromisso e dedicaÃ§Ã£o.','Nossos ambientes sÃ£o variados, temos ambientes tematizados para nossos clientes, onde cada andar Ã© destinado a um tipo de ambiente. Nos preocupamos em garantir o melhor para vocÃª.',1),(2,1,'diferencial de teste','a','b','c','teste 123','teste 234','teste 345',0);
/*!40000 ALTER TABLE `tbl_sobre_diferencial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre_padoka`
--

DROP TABLE IF EXISTS `tbl_sobre_padoka`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobre_padoka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSobre` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `imagem01` varchar(255) NOT NULL,
  `imagem02` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idSobre` (`idSobre`),
  CONSTRAINT `tbl_sobre_padoka_ibfk_1` FOREIGN KEY (`idSobre`) REFERENCES `tbl_pagina_sobre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre_padoka`
--

LOCK TABLES `tbl_sobre_padoka` WRITE;
/*!40000 ALTER TABLE `tbl_sobre_padoka` DISABLE KEYS */;
INSERT INTO `tbl_sobre_padoka` VALUES (37,1,'Sobre a Padoka','arquivos/8c8bc19c4aed954267bcf0efb64cbe08.jpg','arquivos/dd46d9574d65773e5e4af8cff6da0efb.jpg','A Padoka Hill Valley, foi criada em 2018, com uma proposta inovadora e diferente de qualquer padaria antes vista,alem de funcionamos 24h por dia e possuimos um espaÃ§o bem amplo e ambientes temÃ¡ticos, com musica, tecnologia e conforto para receber e agradar nossos clientes que buscam por uma boa padaria com algum complemento.',1);
/*!40000 ALTER TABLE `tbl_sobre_padoka` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategoria`
--

DROP TABLE IF EXISTS `tbl_subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `tbl_subcategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbl_categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategoria`
--

LOCK TABLES `tbl_subcategoria` WRITE;
/*!40000 ALTER TABLE `tbl_subcategoria` DISABLE KEYS */;
INSERT INTO `tbl_subcategoria` VALUES (12,'PÃ£o frances ',1,1),(13,'PÃ£o de banha ',1,1),(14,'PÃ£o de Bisnaga',1,1),(15,'PÃ£o de Metro',1,2),(16,'PÃ£o da Padoka',1,2),(17,'PÃ£o de Queijo',1,3),(18,'Coxinhas',1,3),(19,'Esfihas',1,3),(20,'Kibes',1,3),(21,'Empadas',1,3),(22,'Pudim',1,4),(23,'Carolina',1,4),(24,'Doce de Leite',1,4),(25,'Bolos',1,4),(26,'PÃ£o de Frios',1,9),(28,'CafÃ©',1,8),(29,'Cafeinados',1,5),(30,'Sucos Naturais',1,6),(31,'ChÃ¡',1,6);
/*!40000 ALTER TABLE `tbl_subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `idNivelUsuario` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNivelUsuario` (`idNivelUsuario`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`idNivelUsuario`) REFERENCES `tbl_nivel_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (70,'gustavo','12345678','Gustavo dos Santos','gustavogugueira@gmail.com','(11) 4329-2339','(11) 97571-3996','M',1,1),(71,'gabriel','123','Gabriel Almeida','teste@gmail.com','(11) 4845-7745','(45) 34533-3333','M',2,1),(72,'marcelnt','123456','marcel nt','marcel@gmail.com','(011) 4772-470','(011) 97878-985','M',36,1),(73,'chicobrandao','photographer','Chico','chico@photographer.com','(11) 1111-1111','(11) 11111-1111','M',35,1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-01-01 23:48:13
