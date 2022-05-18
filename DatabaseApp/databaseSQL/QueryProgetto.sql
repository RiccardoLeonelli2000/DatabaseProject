/*1(Inserrire un cliente)*/

INSERT INTO CLIENTI(PartitaIva, Nome, Telefono, Città, Via, Numerocivico)
VALUES(?,?,?,?,?,?);



/*2(Inserire un ordine)*/


INSERT INTO ORDINI(NumeroOrdine, 'Data', Descrizione, CostoTotale, PartitaIva)
VALUES(?,?,?,NULL,SELECT PartitaIva FROM CLIENTI WHERE PartitaIva = ?);

/*3(Inserire una spedizione)*/

INSERT INTO spedizioni(NumeroOrdine, 'Data', Matricola)
VALUES(SELECT NumeroOrdine FROM ORDINI WHERE NumeroOrdine = ?,?,
       SELECT Matricola FROM CAMIONISTI WHERE Matricola = ?);
      
UPDATE ORDINI SET Stato='consegnato' WHERE NumeroOrdine=?;

/*4(Ordini spediti in un mese con i rispettivi clienti in ordine temporale decrescente )*/

SELECT ORDINI.NumeroOrdine, ORDINI.Data, ORDINI.Descrizione, ORDINI.CostoTotale,
	ORDINI.PartitaIva, CLIENTI.Nome
FROM ORDINI JOIN CLIENTI 
ON (ORDINI.PartitaIva = CLIENTI.PartitaIva)
AND (ORDINI.Stato='consegnato') AND (ORDINI.Data > ? AND ORDINI.Data < ?)
ORDER BY ORDINI.Data DESC;


/*5 Tipo prodotto lavorato  */

SELECT LottoProdotto, NumeroOrdine, Tipo FROM PRODOTTI_LAVORATI
WHERE LottoProdotto = (SELECT LottoProdotto FROM PRODOTTI_LAVORATI WHERE LottoProdotto = ?);

/*6 Fatturato annuale  */

SELECT SUM(CostoTotale) FROM ORDINI WHERE `Data`>? AND `Data`<?;

/*7 Registrare un operaio che entra in produzione */

/* Trovo prima se l'operaio o il macchinario sono già in produzione */
SELECT Matricola, Targa ,OraFine FROM PRODUZIONI
WHERE (Matricola = ? OR Targa = ?) AND `Data` = ?;

INSERT INTO PRODUZIONI(Matricola, OraInizio, `Data`, Targa)
                       VALUES(SELECT Matricola FROM OPERAI WHERE Matricola = ?,?,?,?,
                              SELECT Targa FROM MACCHINARI WHERE Targa = ?);

/*8   Inserire una lavorazione */

/* Cerco se il prodotto lavorato è gia presente*/
SELECT * FROM PRODOTTI_LAVORATI WHERE LottoProdotto = ?

/* Da effetuare se il prodotto lavorato è nuovo */

INSERT INTO PRODOTTI_LAVORATI(LottoProdotto, Tipo, PesoComplessivo, PesoPerElemento, NumeroElementi,
                              Lunghezza, NumeroOrdine)
VALUES(?,?,?,?,?,(SELECT NumeroOrdine FROM ORDINI WHERE NumeroOrdine=?));

INSERT INTO LAVORAZIONI(LottoLavorazione, Ora, `Data`, LottoProdotto, Targa, Tipo, Descrizione)
VALUES(?,?,?,SELECT Targa FROM MACCHINARI WHERE Targa = ?,?)

/* Altrimenti modifico uno già esistente*/
UPDATE PRODOTTI_LAVORATI SET Tipo = ?, PesoComplessivo = ?, PesoPerElemento = ?, NumeroElementi= ?, Lunghezza = ?
WHERE LottoProdotto = ?;

/*9   Conoscere le lavorazioni eseguite su ogni prodotto lavorato di ogni ordine di un dato cliente*/

SELECT P.NumeroOrdine, L.LottoProdotto, L.LottoLavorazione,
       L.Ora, L.Data, L.Targa, L.Tipo, L.Descrizione
FROM LAVORAZIONI L JOIN PRODOTTI_LAVORATI P
ON L.LottoProdotto=P.LottoProdotto
JOIN ORDINI O ON P.NumeroOrdine=O.NumeroOrdine
JOIN CLIENTI C ON O.PartitaIva=C.PartitaIva
WHERE C.Nome=?
ORDER BY O.Data, L.LottoProdotto, L.Data DESC;




/*10  Conoscere tutti gli operai che hanno realizzato un prodotto lavorato */

/* Verifico prima l' esistenza del prodotto */
SELECT * FROM PRODOTTI_LAVORATI WHERE LottoProdotto = ?

SELECT *
FROM PRODOTTI_LAVORATI PL JOIN LAVORAZIONI L
ON PL.LottoProdotto=L.LottoProdotto
JOIN PRODUZIONI P
ON P.Targa=L.Targa AND L.Data=P.Data AND L.Ora>P.OraInizio AND L.Ora<P.OraFine
JOIN OPERAI O
ON O.Matricola=P.Matricola
WHERE PL.LottoProdotto=?
ORDER BY L.Data DESC;

/*11 Calcolare il costo per i materiali raggruppati per fornitori in un dato anno*/

SELECT F.PartitaIva, F.Nome, SUM(fo.Prezzo)
FROM FORNITORI F LEFT JOIN forniture fo
ON F.PartitaIva = fo.PartitaIva
WHERE fo.Data>? AND fo.Data<?
GROUP BY F.PartitaIva
ORDER BY fo.Data DESC; 
