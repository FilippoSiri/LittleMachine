-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 24, 2022 alle 09:28
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettoSAW`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `idU` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `qtaProd` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`idU`, `idP`, `qtaProd`) VALUES
(15, 7, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `idC` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`idC`, `name`) VALUES
(3, 'Epoca'),
(4, 'Sportive'),
(5, 'Lusso'),
(6, 'Fuoristrada'),
(7, 'Utilitaria');

-- --------------------------------------------------------

--
-- Struttura della tabella `donation`
--

CREATE TABLE `donation` (
  `idD` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `anonimo` tinyint(1) NOT NULL DEFAULT 0,
  `valoreDonazione` int(11) NOT NULL,
  `dataDonazione` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `donation`
--

INSERT INTO `donation` (`idD`, `idU`, `anonimo`, `valoreDonazione`, `dataDonazione`) VALUES
(58, 2, 0, 500, '2022-02-13 16:36:03'),
(59, 2, 1, 1000, '2022-02-13 16:36:07'),
(60, 2, 0, 250000, '2022-02-13 16:36:16'),
(61, 2, 0, 2000, '2022-02-13 16:36:25');

-- --------------------------------------------------------

--
-- Struttura della tabella `model`
--

CREATE TABLE `model` (
  `idP` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `qta` int(11) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `imgPath` varchar(100) NOT NULL DEFAULT '/img/products/default.jpeg',
  `imgDescription` varchar(500) NOT NULL DEFAULT 'Descrizione di default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `model`
--

INSERT INTO `model` (`idP`, `name`, `description`, `qta`, `price`, `imgPath`, `imgDescription`) VALUES
(1, 'Mazda MX-5', 'Acquista il nuovo modello della storica Miata in scala 1/24!', 0, 2000, '/img/products/mx5.jpg', 'Foto del modellino di Mazda MX5'),
(2, 'Toyota GR86', 'Acquista il modellino della nuova Toyota GR86 ancora prima di vederla nei concessionari!', 0, 1500, '/img/products/gr86.jpg', 'Foto del modellino di Toyota GR86'),
(3, 'Ferrari F8 Tributo', 'Acquista il modellino in scala 1/24 dell\'ultima Ferrari uscita con il motore V8!', 0, 1600, '/img/products/f8.jpg', 'Foto del modellino di Ferrari F8'),
(4, 'Ferrari 812', 'La Ferrari 812 è uno dei modelli di Ferrari più potenti! Acquista il modellino in scala 1/24', 0, 2500, '/img/products/812.jpg', 'Foto del modellino di Ferrari 812'),
(5, 'Mercedes Classe G', 'Acquista il modellino della lussuosa Mercedes Classe G in scala 1/24', 0, 1000, '/img/products/classeg.jpg', 'Foto del modellino di Mercedes classe G'),
(6, 'Land Rover Defender', 'Acquista il modellino in scala 1/24 di uno dei fuoristrada più utilizzati', 0, 1100, '/img/products/defender.jpg', 'Foto del modellino di Land Rover Defender'),
(7, 'Mini', 'Acquista il modellino in scala 1/24 dell\'ultimo modello della Mini', 8, 1400, '/img/products/mini.jpg', 'Foto del modellino di Mini'),
(8, 'Volkswagen Golf', 'Acquista il modellino in scala 1/24 di una delle auto da città più famose', 0, 3000, '/img/products/golf.jpg', 'Foto del modellino di Volkswagen Golf'),
(9, 'Mercedes Classe A', 'Acquista il modellino in scala 1/24 della Mercedes Classe A', 0, 3100, '/img/products/classea.jpg', 'Foto del modellino di Mercedes Classe A'),
(11, 'Ferrari F40', 'Acquista il modellino in scala 1/24 dell\'ultima Ferrari presentata da Enzo Ferrari!', 0, 400, '/img/products/f40.jpg', 'Foto del modellino di Ferrari F40'),
(12, 'Mini d\'epoca', 'Acquista il modellino in scala 1/24 della storica Mini', 0, 400, '/img/products/miniepoca.jpg', 'Foto del modellino di Mini d\'epoca'),
(13, 'Ferrari 250 GTO', 'Acquista il modellino in scala 1/24 dell\'auto più costosa al mondo! Venduta all\'asta a 41 milioni di euro nel 2018.', 0, 50000, '/img/products/250gto.jpg', 'Foto del modellino di Ferrari 250 GTO');

-- --------------------------------------------------------

--
-- Struttura della tabella `model_category`
--

CREATE TABLE `model_category` (
  `idP` int(11) NOT NULL,
  `idC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `model_category`
--

INSERT INTO `model_category` (`idP`, `idC`) VALUES
(1, 4),
(2, 4),
(3, 4),
(3, 5),
(4, 4),
(4, 5),
(5, 5),
(5, 6),
(6, 6),
(7, 7),
(8, 7),
(9, 7),
(11, 3),
(11, 4),
(11, 5),
(12, 3),
(13, 3),
(13, 4),
(13, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `idO` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`idO`, `idU`, `city`, `address`) VALUES
(1, 4, 'Genova', 'Via Ravaschio 61'),
(2, 4, 'Genova', 'Via Ravaschio 61'),
(3, 2, 'Genova', 'Via Ravaschio 61'),
(4, 2, 'Genova', 'Via Ravaschio 61'),
(5, 2, 'Genova', 'Via Ravaschio 61'),
(6, 2, 'Genova', 'Via Ravaschio 61');

-- --------------------------------------------------------

--
-- Struttura della tabella `orders_product`
--

CREATE TABLE `orders_product` (
  `idO` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `qta` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders_product`
--

INSERT INTO `orders_product` (`idO`, `idP`, `qta`, `price`) VALUES
(1, 4, 9, 2500),
(1, 5, 5, 1000),
(1, 6, 56, 1100),
(1, 8, 1, 3000),
(1, 9, 1, 3100),
(2, 8, 8, 3000),
(2, 9, 12, 3100),
(2, 11, 3, 400),
(2, 12, 24, 400),
(3, 4, 1, 2500),
(3, 9, 2, 3100),
(4, 4, 1, 2500),
(5, 5, 1, 1000),
(5, 6, 3, 1100),
(5, 7, 5, 1400),
(6, 7, 2, 1400),
(6, 13, 1, 50000);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `idU` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`idU`, `firstname`, `lastname`, `email`, `password`, `city`, `address`) VALUES
(1, 'Testa', 'test', 'test@gmail.com', '$2y$10$E4u74CKWARhVZj6Sj0TN8ulczmtjue7v3CYJGjeDVqmz6GREcd55K', '    Genova', 'Via Ravaschio 61'),
(2, 'Filippo', 'Siridasdsa', 'fsiri2000ddd@gmail.com', '$2y$10$APGPwerWXZAqLBe9tAF1QOKJELafxEmhNg./wUM.ywfM5Dnjmp7nC', 'Genovafds', 'Via Ravaschio 61'),
(4, '&lt;h1&gt;Filipfdsgfdgdfdfgdffdpo&lt;/h1&gt;', 'Sirifff', 'fsiri20001@gmail.com', '$2y$10$BbV0e2MFDHCiGLYOhxiaO.Wq5qZS2jIpUKBsd1KHT.ZxBuF7lf1Vu', 'Genova', 'Via Ravaschio 61'),
(5, 'Filipposssaa', 'Siri', 'testa@gmail.com', '$2y$10$ZSxMJsr9lPmTXlxk5zv3ceVBXD8KD1LYXUA8KkaUYm39EBycJDm3O', 'Genova', 'Via Ravaschio 61'),
(6, 'Filippo', 'Siri', 'a@a.it', '$2y$10$5KKtsA/8Zsk7oHZI6z9UEec0DE1hqWtyNUc9bxGDz.rOAZVTqHVT6', 'Genovagfdgfdgdf', 'Via Ravaschio 61'),
(7, 'AA', 'AA', 'prova4@gmail.com', '$2y$10$DwzpfKmdHrausPewoqQKheHQio43rS5p9Ep4n3I/KheJ6hyTZhI7G', 'aaaa', 'aaaa'),
(8, 'Filippo', 'Siri', 'testaa@gmail.com', '$2y$10$oiZ2EjzfFkEZoRhPG/N4AuUkeVtK29NIz0PQhuetOJlcemMsiHywG', 'Genova', 'Via Ravaschio 61'),
(15, 'Filippo', 'Siri', 'fsiri2000.1@gmail.com', '$2y$10$32SBMkaorvIEhFbklS.Ck..MsLOaLwrhIdF7pAu6EtyUiJ.bNlata', 'Genova', 'Via Ravaschio 61'),
(16, 'Filippo', 'Siri', 'fsiri2000@gmail.com', '$2y$10$JoEmgIJY66x6M7GUXjqMiusr8ulZ8fJsZeullnjl5n5n8HG3ZXoye', 'Genova', 'Via Ravaschio 61');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idU`,`idP`),
  ADD KEY `idP` (`idP`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idC`);

--
-- Indici per le tabelle `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`idD`),
  ADD KEY `idU` (`idU`);

--
-- Indici per le tabelle `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`idP`);

--
-- Indici per le tabelle `model_category`
--
ALTER TABLE `model_category`
  ADD PRIMARY KEY (`idP`,`idC`),
  ADD KEY `idC` (`idC`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idO`);

--
-- Indici per le tabelle `orders_product`
--
ALTER TABLE `orders_product`
  ADD PRIMARY KEY (`idO`,`idP`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `donation`
--
ALTER TABLE `donation`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT per la tabella `model`
--
ALTER TABLE `model`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `idO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `user` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `model` (`idP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `user` (`idU`);

--
-- Limiti per la tabella `model_category`
--
ALTER TABLE `model_category`
  ADD CONSTRAINT `model_category_ibfk_1` FOREIGN KEY (`idP`) REFERENCES `model` (`idP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `model_category_ibfk_2` FOREIGN KEY (`idC`) REFERENCES `category` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
