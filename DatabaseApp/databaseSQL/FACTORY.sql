-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 18, 2022 alle 14:35
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FACTORY`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `CAMIONISTI`
--

CREATE TABLE `CAMIONISTI` (
  `Matricola` int(11) NOT NULL,
  `CodiceFiscale` varchar(15) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Salario` int(11) NOT NULL,
  `Città` varchar(15) NOT NULL,
  `Via` varchar(15) NOT NULL,
  `NumeroCivico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `CAMIONISTI`
--

INSERT INTO `CAMIONISTI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES
(1, 'LNLRCR1234', 'Roberto', 'Leonelli', '3458506840', 1500, 'Savigano', 'bellini', 60),
(2, 'DMMDFM1234', 'Davide', 'Marconi', '3406893402', 1500, 'Cesena', 'Alberti', 50),
(3, 'ARCRFS1234', 'Alessandro', 'Righini', '34967332', 1500, 'Rimini', 'Raggi', 21);

-- --------------------------------------------------------

--
-- Struttura della tabella `CLIENTI`
--

CREATE TABLE `CLIENTI` (
  `PartitaIva` varchar(15) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Città` varchar(15) NOT NULL,
  `Via` varchar(15) NOT NULL,
  `NumeroCivico` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `CLIENTI`
--

INSERT INTO `CLIENTI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES
('1111', 'RiccionePiadina', '05378371647', 'Riccione', 'Alfonsi', '31'),
('2222', 'Fabbri', '05488371735', 'Cesena', 'Bergamaschi', '51'),
('3333', 'CeserPiada', '0547890989', 'Cesena', 'Forti', '2'),
('4444', 'RicciCop', '0675843456', 'Salerno', 'Alfonso', '22'),
('5555', 'RossiUP', '027364820', 'Fano', 'Palmieri', '4');

-- --------------------------------------------------------

--
-- Struttura della tabella `FORNITORI`
--

CREATE TABLE `FORNITORI` (
  `PartitaIva` varchar(15) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Città` varchar(15) NOT NULL,
  `Via` varchar(15) NOT NULL,
  `NumeroCivico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `FORNITORI`
--

INSERT INTO `FORNITORI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES
('7777', 'RiminPlast', 547980089, 'Rimini', 'Settembre', 55),
('8888', 'FederPlast', 556786546, 'Milano', 'Verdi', 10),
('9999', 'CartoLeo', 437859696, 'Catania', 'Lorenzi', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `forniture`
--

CREATE TABLE `forniture` (
  `LottoMateriale` varchar(15) NOT NULL,
  `PartitaIva` varchar(15) NOT NULL,
  `Quantita` int(11) NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `forniture`
--

INSERT INTO `forniture` (`LottoMateriale`, `PartitaIva`, `Quantita`, `Prezzo`, `Data`) VALUES
('1221M', '7777', 2000, 3000, '2022-05-18'),
('1222M', '7777', 5000, 2000, '2022-05-03'),
('1234M', '8888', 3000, 1000, '2022-05-17');

-- --------------------------------------------------------

--
-- Struttura della tabella `LAVORAZIONI`
--

CREATE TABLE `LAVORAZIONI` (
  `LottoLavorazione` varchar(15) NOT NULL,
  `Ora` time NOT NULL,
  `Data` date NOT NULL,
  `LottoProdotto` varchar(15) NOT NULL,
  `Targa` varchar(15) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `Descrizione` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `LAVORAZIONI`
--

INSERT INTO `LAVORAZIONI` (`LottoLavorazione`, `Ora`, `Data`, `LottoProdotto`, `Targa`, `Tipo`, `Descrizione`) VALUES
('L0001', '11:05:06', '2022-02-04', 'P00003', 'M0078', 'accoppiamento', 'PO+PET'),
('L0002', '00:00:11', '2022-02-04', 'P00003', 'M1323', 'stampa', '3 gomme'),
('L0003', '00:00:11', '2022-03-04', 'P00002', 'M0078', 'accoppiamento', '3 gomme'),
('L0004', '00:00:11', '2022-02-04', 'P00002', 'M9999', 'taglio', '3 gomme'),
('L0022', '16:59:56', '2022-05-16', 'P00003', 'M0078', 'accoppiamento', 'PET+P8'),
('L0033', '14:09:09', '2022-05-17', 'P1234', 'M1323', 'stampa', 'Bio Integrale Magenta Oro 3fermiStampa');

-- --------------------------------------------------------

--
-- Struttura della tabella `MACCHINARI`
--

CREATE TABLE `MACCHINARI` (
  `Targa` varchar(15) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `NumeroGomme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `MACCHINARI`
--

INSERT INTO `MACCHINARI` (`Targa`, `Nome`, `Tipo`, `NumeroGomme`) VALUES
('M0078', 'Hp 3dh', 'Accoppiatrice', NULL),
('M0123', 'Elba 3000', 'Saldatrice', NULL),
('M1323', 'Oregon 500d', 'Stampatrice', 5),
('M9999', 'Axion 4000', 'Taglierina', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `MATERIALI`
--

CREATE TABLE `MATERIALI` (
  `LottoMateriale` varchar(15) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Misura` varchar(15) NOT NULL,
  `Quantità` int(11) NOT NULL,
  `IdTipo` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `MATERIALI`
--

INSERT INTO `MATERIALI` (`LottoMateriale`, `Nome`, `Misura`, `Quantità`, `IdTipo`) VALUES
('1221M', 'Pe Neutro 0033', '40x75', 20000, '1'),
('1222M', 'Pe Neutro 0033', '40x75', 30000, '1'),
('1234M', 'Pe Neutro 0012', '30x35', 20000, '1'),
('1333M', 'Pet 0012', '20x30', 20000, '2');

-- --------------------------------------------------------

--
-- Struttura della tabella `necessità`
--

CREATE TABLE `necessità` (
  `LottoLavorazione` varchar(15) NOT NULL,
  `LottoMateriale` varchar(15) NOT NULL,
  `Quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `necessità`
--

INSERT INTO `necessità` (`LottoLavorazione`, `LottoMateriale`, `Quantità`) VALUES
('L0001', '1234M', 500),
('L0002', '1222M', 700),
('L0002', '1234M', 300);

-- --------------------------------------------------------

--
-- Struttura della tabella `OPERAI`
--

CREATE TABLE `OPERAI` (
  `Matricola` int(11) NOT NULL,
  `CodiceFiscale` char(15) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Salario` int(11) NOT NULL,
  `Città` varchar(15) NOT NULL,
  `Via` varchar(15) NOT NULL,
  `NumeroCivico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `OPERAI`
--

INSERT INTO `OPERAI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES
(9000, 'GUUHKN234567', 'Guido', 'Rossi', '3458606728', 1600, 'Cesena', 'Polo', 32),
(9101, 'ADDFGS290568', 'Alessandro', 'Dosio', '3358392833', 1600, 'Bertinoro', 'Leonardi', 55),
(9821, 'ASFGRD234567', 'Alfonso', 'Sorrentino', '3467792345', 1600, 'Forli', 'Accademia', 22);

-- --------------------------------------------------------

--
-- Struttura della tabella `ORDINI`
--

CREATE TABLE `ORDINI` (
  `NumeroOrdine` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Descrizione` varchar(30) NOT NULL,
  `Stato` varchar(15) NOT NULL,
  `CostoTotale` int(11) DEFAULT NULL,
  `PartitaIva` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ORDINI`
--

INSERT INTO `ORDINI` (`NumeroOrdine`, `Data`, `Descrizione`, `Stato`, `CostoTotale`, `PartitaIva`) VALUES
(1122, '2022-05-05', 'Plastic Green 35x25', 'inEsecuzione', 0, '1111'),
(1234, '2022-05-26', '9Colori Pet', 'inEsecuzione', 0, '1111'),
(1313, '2022-05-17', 'Integrale002 300mc 500000m', 'iniziale', NULL, '1111'),
(1333, '2022-05-01', 'S pe 5000kg', 'consegnato', 5700, '2222'),
(1980, '2022-05-05', 'PO Neutro 25x35', 'iniziale', NULL, '2222'),
(1999, '2022-05-05', 'Pet Piadaregina Bio', 'consegnato', 5000, '2222'),
(3936, '2021-11-29', '7Colori Pol', 'inEsecuzione', 0, '1111'),
(9876, '2022-02-16', '3Colori Pe', 'iniziale', 0, '2222');

-- --------------------------------------------------------

--
-- Struttura della tabella `PRODOTTI_LAVORATI`
--

CREATE TABLE `PRODOTTI_LAVORATI` (
  `LottoProdotto` varchar(15) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `PesoComplessivo` int(11) NOT NULL,
  `PesoPerElemento` int(11) NOT NULL,
  `NumeroElementi` int(11) NOT NULL,
  `Lunghezza` int(11) DEFAULT NULL,
  `NumeroOrdine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `PRODOTTI_LAVORATI`
--

INSERT INTO `PRODOTTI_LAVORATI` (`LottoProdotto`, `Tipo`, `PesoComplessivo`, `PesoPerElemento`, `NumeroElementi`, `Lunghezza`, `NumeroOrdine`) VALUES
('P00001', 'stampato', 10000, 5000, 2, 50000, 1234),
('P00002', 'tagliato', 5000, 500, 10, NULL, 1333),
('P00003', 'stampato', 10000, 50, 100, 100000, 3936),
('P00005', 'accoppiato', 20000, 100, 200, 100000, 9876),
('P00006', 'stampato', 10000, 100, 100, 900, 1980),
('P1234', 'stampato', 90000, 10000, 9, 50000, 1234);

-- --------------------------------------------------------

--
-- Struttura della tabella `PRODUZIONI`
--

CREATE TABLE `PRODUZIONI` (
  `Matricola` int(11) NOT NULL,
  `OraInizio` time NOT NULL,
  `OraFine` time DEFAULT NULL,
  `Data` date NOT NULL,
  `Targa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `PRODUZIONI`
--

INSERT INTO `PRODUZIONI` (`Matricola`, `OraInizio`, `OraFine`, `Data`, `Targa`) VALUES
(9000, '00:00:06', '00:00:14', '2022-02-04', 'M0078'),
(9000, '00:00:06', '00:00:14', '2022-02-05', 'M0078'),
(9000, '00:00:06', '00:00:14', '2022-02-06', 'M0078'),
(9000, '00:00:09', '00:00:14', '2022-05-04', 'M0078'),
(9000, '13:51:30', '18:51:58', '2022-05-17', 'M1323'),
(9000, '18:39:34', NULL, '2022-05-15', 'M0078'),
(9101, '00:00:09', '00:00:17', '2022-02-04', 'M1323'),
(9101, '00:00:09', '00:00:17', '2022-02-05', 'M1323'),
(9101, '00:00:09', '00:00:17', '2022-03-04', 'M1323'),
(9101, '19:11:54', NULL, '2022-05-15', 'M0078'),
(9821, '00:00:06', '00:00:14', '2022-05-04', 'M0123'),
(9821, '00:00:10', '00:00:18', '2022-02-04', 'M9999'),
(9821, '00:00:14', '00:00:18', '2022-05-04', 'M0123'),
(9821, '19:29:46', NULL, '2022-05-15', 'M1323');

-- --------------------------------------------------------

--
-- Struttura della tabella `REVISIONI`
--

CREATE TABLE `REVISIONI` (
  `Targa` varchar(15) NOT NULL,
  `Data` date NOT NULL,
  `Ora` int(11) NOT NULL,
  `Descrizione` varchar(15) NOT NULL,
  `Costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `REVISIONI`
--

INSERT INTO `REVISIONI` (`Targa`, `Data`, `Ora`, `Descrizione`, `Costo`) VALUES
('M0078', '2021-06-22', 10, 'manutenzione01', 470),
('M0123', '2021-05-12', 11, 'manutenzione01', 350),
('M1323', '2021-07-23', 8, 'manutenzione03', 200);

-- --------------------------------------------------------

--
-- Struttura della tabella `spedizioni`
--

CREATE TABLE `spedizioni` (
  `NumeroOrdine` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Matricola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `spedizioni`
--

INSERT INTO `spedizioni` (`NumeroOrdine`, `Data`, `Matricola`) VALUES
(1333, '2022-05-31', 2),
(1980, '2022-05-13', 2),
(1999, '2022-05-13', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `TIPI_MATERIALE`
--

CREATE TABLE `TIPI_MATERIALE` (
  `IdTipo` int(11) NOT NULL,
  `Nome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `TIPI_MATERIALE`
--

INSERT INTO `TIPI_MATERIALE` (`IdTipo`, `Nome`) VALUES
(1, 'PE'),
(2, 'PET'),
(3, 'PO'),
(4, 'CA');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `CAMIONISTI`
--
ALTER TABLE `CAMIONISTI`
  ADD PRIMARY KEY (`Matricola`);

--
-- Indici per le tabelle `CLIENTI`
--
ALTER TABLE `CLIENTI`
  ADD PRIMARY KEY (`PartitaIva`);

--
-- Indici per le tabelle `FORNITORI`
--
ALTER TABLE `FORNITORI`
  ADD PRIMARY KEY (`PartitaIva`);

--
-- Indici per le tabelle `forniture`
--
ALTER TABLE `forniture`
  ADD PRIMARY KEY (`PartitaIva`,`LottoMateriale`),
  ADD KEY `FKfor_MAT` (`LottoMateriale`);

--
-- Indici per le tabelle `LAVORAZIONI`
--
ALTER TABLE `LAVORAZIONI`
  ADD PRIMARY KEY (`LottoLavorazione`),
  ADD UNIQUE KEY `IDLAVORAZIONE_1` (`Targa`,`LottoProdotto`,`Ora`,`Data`),
  ADD KEY `FKrealizzazione` (`LottoProdotto`);

--
-- Indici per le tabelle `MACCHINARI`
--
ALTER TABLE `MACCHINARI`
  ADD PRIMARY KEY (`Targa`);

--
-- Indici per le tabelle `MATERIALI`
--
ALTER TABLE `MATERIALI`
  ADD PRIMARY KEY (`LottoMateriale`);

--
-- Indici per le tabelle `necessità`
--
ALTER TABLE `necessità`
  ADD PRIMARY KEY (`LottoLavorazione`,`LottoMateriale`);

--
-- Indici per le tabelle `OPERAI`
--
ALTER TABLE `OPERAI`
  ADD PRIMARY KEY (`Matricola`);

--
-- Indici per le tabelle `ORDINI`
--
ALTER TABLE `ORDINI`
  ADD PRIMARY KEY (`NumeroOrdine`);

--
-- Indici per le tabelle `PRODOTTI_LAVORATI`
--
ALTER TABLE `PRODOTTI_LAVORATI`
  ADD PRIMARY KEY (`LottoProdotto`);

--
-- Indici per le tabelle `PRODUZIONI`
--
ALTER TABLE `PRODUZIONI`
  ADD PRIMARY KEY (`Matricola`,`OraInizio`,`Data`),
  ADD UNIQUE KEY `IDPRODUZIONE_1` (`Targa`,`OraInizio`,`Data`);

--
-- Indici per le tabelle `REVISIONI`
--
ALTER TABLE `REVISIONI`
  ADD PRIMARY KEY (`Targa`,`Data`);

--
-- Indici per le tabelle `spedizioni`
--
ALTER TABLE `spedizioni`
  ADD PRIMARY KEY (`NumeroOrdine`);

--
-- Indici per le tabelle `TIPI_MATERIALE`
--
ALTER TABLE `TIPI_MATERIALE`
  ADD PRIMARY KEY (`IdTipo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `TIPI_MATERIALE`
--
ALTER TABLE `TIPI_MATERIALE`
  MODIFY `IdTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `forniture`
--
ALTER TABLE `forniture`
  ADD CONSTRAINT `FKfor_FOR` FOREIGN KEY (`PartitaIva`) REFERENCES `FORNITORI` (`PartitaIva`),
  ADD CONSTRAINT `FKfor_MAT` FOREIGN KEY (`LottoMateriale`) REFERENCES `MATERIALI` (`LottoMateriale`);

--
-- Limiti per la tabella `LAVORAZIONI`
--
ALTER TABLE `LAVORAZIONI`
  ADD CONSTRAINT `FKesecuzione` FOREIGN KEY (`Targa`) REFERENCES `MACCHINARI` (`Targa`),
  ADD CONSTRAINT `FKrealizzazione` FOREIGN KEY (`LottoProdotto`) REFERENCES `PRODOTTI_LAVORATI` (`LottoProdotto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
