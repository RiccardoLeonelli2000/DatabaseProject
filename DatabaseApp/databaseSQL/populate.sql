/*CAMIONISTI*/
INSERT INTO `CAMIONISTI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES ('0002', 'DMMDFM1234', 'Davide', 'Marconi', '3406893402', '1500', 'Cesena', 'Alberti', '50');
INSERT INTO `CAMIONISTI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES ('0003', 'ARCRFS1234', 'Alessandro', 'Righini', '34967332', '1500', 'Rimini', 'Raggi', '21');

/*OPERAI*/
INSERT INTO `OPERAI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES ('9821', 'ASFGRD234567', 'Alfonso', 'Sorrentino', '3467792345', '1600', 'Forli', 'Accademia', '22');
INSERT INTO `OPERAI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES ('9000', 'GUUHKN234567', 'Guido', 'Rossi', '3458606728', '1600', 'Cesena', 'Polo', '32');
INSERT INTO `OPERAI` (`Matricola`, `CodiceFiscale`, `Nome`, `Cognome`, `Telefono`, `Salario`, `Città`, `Via`, `NumeroCivico`) VALUES ('9101', 'ADDFGS290568', 'Alessandro', 'Dosio', '3358392833', '1600', 'Bertinoro', 'Leonardi', '55');


/*CLIENTI*/
INSERT INTO `CLIENTI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES ('1111', 'RiccionePiadina', '05378371647', 'Riccione', 'Alfonsi', '31');
INSERT INTO `CLIENTI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES ('2222', 'Fabbri', '05488371735', 'Cesena', 'Bergamaschi', '51');



/*FORNITORI*/
INSERT INTO `FORNITORI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES ('7777', 'RiminPlast', '0547980089', 'Rimini', 'Settembre', '55');
INSERT INTO `FORNITORI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES ('8888', 'FederPlast', '0556786546', 'Milano', 'Verdi', '10');
INSERT INTO `FORNITORI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES ('9999', 'CartoLeo', '0437859696', 'Catania', 'Lorenzi', '2');

/*MATERIALI*/

INSERT INTO `MATERIALI` (`LottoMateriale`, `Nome`, `Misura`, `Quantità`, `IdTipo`) VALUES ('1234M', 'Pe Neutro 0012', '30x35', '20000', '1');
INSERT INTO `MATERIALI` (`LottoMateriale`, `Nome`, `Misura`, `Quantità`, `IdTipo`) VALUES ('1222M', 'Pe Neutro 0033', '40x75', '30000', '1');
INSERT INTO `MATERIALI` (`LottoMateriale`, `Nome`, `Misura`, `Quantità`, `IdTipo`) VALUES ('1333M', 'Pet 0012', '20x30', '20000', '2');

/*forniture*/

INSERT INTO `forniture` (`LottoMateriale`, `PartitaIva`, `Quantita`, `Prezzo`, `Data`) VALUES ('1222M', '7777', '5000', '2000', '2022-05-03');
INSERT INTO `forniture` (`LottoMateriale`, `PartitaIva`, `Quantita`, `Prezzo`, `Data`) VALUES ('1234M', '8888', '3000', '1000', '2022-05-17');

/*MACCHINARI*/

INSERT INTO `MACCHINARI` (`Targa`, `Nome`, `Tipo`, `NumeroGomme`) VALUES ('M0123', 'Elba 3000', 'Saldatrice', NULL);
INSERT INTO `MACCHINARI` (`Targa`, `Nome`, `Tipo`, `NumeroGomme`) VALUES ('M1323', 'Oregon 500d', 'Stampatrice', '5');
INSERT INTO `MACCHINARI` (`Targa`, `Nome`, `Tipo`, `NumeroGomme`) VALUES ('M0078', 'Hp 3dh', 'Accoppiatrice', NULL);
INSERT INTO `MACCHINARI` (`Targa`, `Nome`, `Tipo`, `NumeroGomme`) VALUES ('M9999', 'Axion 4000', 'Taglierina', NULL);

/*ORDINI*/

INSERT INTO `ORDINI` (`NumeroOrdine`, `Data`, `Descrizione`, `Stato`, `CostoTotale`, `PartitaIva`) VALUES ('9876', '2022-02-16', '3Colori Pe', 'iniziale', NULL, '2222');
INSERT INTO `ORDINI` (`NumeroOrdine`, `Data`, `Descrizione`, `Stato`, `CostoTotale`, `PartitaIva`) VALUES ('1234', '2022-05-26', '9Colori Pet', 'accoppiato', NULL, '1111');
INSERT INTO `ORDINI` (`NumeroOrdine`, `Data`, `Descrizione`, `Stato`, `CostoTotale`, `PartitaIva`) VALUES ('3936', '2021-11-29', '7Colori Pol', 'stampato1', NULL, '1111');
INSERT INTO `ORDINI` (`NumeroOrdine`, `Data`, `Descrizione`, `Stato`, `CostoTotale`, `PartitaIva`) VALUES ('1333', '2022-05-01', 'S pe 5000kg', 'consegnato', '5700', '2222')


/*PRODOTTI_LAVORATI*/

INSERT INTO `PRODOTTI_LAVORATI` (`LottoProdotto`, `Tipo`, `PesoComplessivo`, `PesoPerElemento`, `NumeroElementi`, `Lunghezza`, `NumeroOrdine`) VALUES ('P00001', 'accoppiato', '2000', '100', '20', '50000', '1234');
INSERT INTO `PRODOTTI_LAVORATI` (`LottoProdotto`, `Tipo`, `PesoComplessivo`, `PesoPerElemento`, `NumeroElementi`, `Lunghezza`, `NumeroOrdine`) VALUES ('P00002', 'tagliato', '5000', '500', '10', NULL, '1333');
INSERT INTO `PRODOTTI_LAVORATI` (`LottoProdotto`, `Tipo`, `PesoComplessivo`, `PesoPerElemento`, `NumeroElementi`, `Lunghezza`, `NumeroOrdine`) VALUES ('P00003', 'stampato', '10000', '50', '100', '100000', '3936');


/*PRODUZIONI*/
INSERT INTO `PRODUZIONI` (`Matricola`, `OraInizio`, `OraFine`, `Data`, `Targa`) VALUES ('9000', '6', '14', '2022-02-04', 'M0078'), ('9000', '6', '14', '2022-02-05', 'M0078'), ('9000', '6', '14', '2022-02-06', 'M0078'), ('9000', '9', '14', '2022-05-04', 'M0078'), ('9101', '9', '17', '2022-02-04', 'M1323'), ('9101', '9', '17', '2022-02-05', 'M1323'), ('9101', '9', '17', '2022-03-04', 'M1323'), ('9821', '6', '14', '2022-05-04', 'M0123'), ('9821', '14', '18', '2022-05-04', 'M0123'), ('9821', '10', '18', '2022-02-04', 'M9999')



/*REVISIONI*/
INSERT INTO `REVISIONI` (`Targa`, `Data`, `Ora`, `Descrizione`, `Costo`) VALUES ('M0123', '2021-05-12', '11', 'manutenzione01', '350');
INSERT INTO `REVISIONI` (`Targa`, `Data`, `Ora`, `Descrizione`, `Costo`) VALUES ('M0078', '2021-06-22', '10', 'manutenzione01', '470');
INSERT INTO `REVISIONI` (`Targa`, `Data`, `Ora`, `Descrizione`, `Costo`) VALUES ('M1323', '2021-07-23', '8', 'manutenzione03', '200');

/*SPEDIZIONI*/

INSERT INTO `spedizioni` (`NumeroOrdine`, `Data`, `Matricola`) VALUES ('1333', '2022-05-31', '0002');

/*TIPI_MATERIALE*/

INSERT INTO `TIPI_MATERIALE` (`IdTipo`, `Nome`) VALUES ('1', 'PE');
INSERT INTO `TIPI_MATERIALE` (`IdTipo`, `Nome`) VALUES ('2', 'PET');
INSERT INTO `TIPI_MATERIALE` (`IdTipo`, `Nome`) VALUES ('3', 'PO');
INSERT INTO `TIPI_MATERIALE` (`IdTipo`, `Nome`) VALUES ('4', 'CA');

/*LAVORAZIONI*/

INSERT INTO `LAVORAZIONI` (`LottoLavorazione`, `Ora`, `Data`, `LottoProdotto`, `Targa`, `Tipo`, `Descrizione`) VALUES ('L0001', '6', '2022-02-04', 'P00003', 'M0078', 'accoppiamento', '');
INSERT INTO `LAVORAZIONI` (`LottoLavorazione`, `Ora`, `Data`, `LottoProdotto`, `Targa`, `Tipo`, `Descrizione`) VALUES ('L0002', '11', '2022-02-04', 'P00003', 'M1323', 'stampa', '3 gomme');
INSERT INTO `LAVORAZIONI` (`LottoLavorazione`, `Ora`, `Data`, `LottoProdotto`, `Targa`, `Tipo`, `Descrizione`) VALUES ('L0003', '11', '2022-03-04', 'P00002', 'M0078', 'accoppiamento', '3 gomme');
INSERT INTO `LAVORAZIONI` (`LottoLavorazione`, `Ora`, `Data`, `LottoProdotto`, `Targa`, `Tipo`, `Descrizione`) VALUES ('L0004', '11', '2022-02-04', 'P00002', 'M9999', 'taglio', '3 gomme');
/*NECESSITA*/

INSERT INTO `necessità` (`LottoLavorazione`, `LottoMateriale`, `Quantità`) VALUES ('L0001', '1234M', '500');
INSERT INTO `necessità` (`LottoLavorazione`, `LottoMateriale`, `Quantità`) VALUES ('L0002', '1222M', '700');
INSERT INTO `necessità` (`LottoLavorazione`, `LottoMateriale`, `Quantità`) VALUES ('L0002', '1234M', '300');

